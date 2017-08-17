/**
 * Integration API for PagSeguro.
 * 
 * @author cin_ffaria
 */
(function() {
	/**
	 * Check compatibility with window.postMessage()
	 * 
	 * @author amarchina
	 */
	function checkCompatibility() {
		if(typeof window.postMessage == 'undefined' || typeof Element == 'undefined'){
			return false;
		}
		return true;
	}
	
	// case not compatible with window.postMessage(), returns a function that returns false and prevents
	// the code run
	if(!checkCompatibility()) {
		window.PagSeguroLightbox = function() {return false;}
		return false;
	}
	
	/**
	 * A vendor free DOM ready verifier
	 * 
	 * @function onDocumentReady
	 * @param callback {Function} 
	 * @return {null}
	 * 
	 * @author cin_ffaria
	 */
	function onDocumentReady(callback) {
	    var eventName = document.addEventListener ? 'DOMContentLoaded' : 'onreadystatechange';
	    if(document.readyState === "complete" || ( document.readyState !== "loading" && !document.attachEvent )){
	    	callback();
	    	return;
	    }
	    document[document.addEventListener ? 'addEventListener' : 'attachEvent'](eventName, function() {
	        if (eventName == 'DOMContentLoaded' || document.readyState === 'complete') {
	        	callback();
	        	document[document.removeEventListener ? 'removeEventListener' : 'detachEvent'](eventName, arguments.callee, false);
	        }
	    }, false);
	}
	
	var
		// iframe mediator
		lightbox = document.createElement('iframe'),
		// embedded styles
		styleNode = document.createElement('style'),
		// stylesheet
		styleSheets = [
		   '.uolPSMediator {position:fixed; left:0px; top:0px; width:100%; height:100%; background-color:transparent; border:0px none transparent; overflow:hidden; display:none; z-index:9999;}'
		].join(''),
		// namespace
		PagSeguro = PagSeguro || {};
	
	// config the iframe mediator properties
	lightbox.setAttribute('src', 'https://pagseguro.uol.com.br/checkout/embedded/i-ck.html');
	lightbox.setAttribute('width', '100%');
	lightbox.setAttribute('height', '100%');
	lightbox.setAttribute('id', 'uolPSMediator');
	lightbox.setAttribute('class', 'uolPSMediator');
	lightbox.setAttribute('allowtransparency', 'true');
	lightbox.setAttribute('frameborder', '0');
	
	// append the styles to the document
	document.getElementsByTagName('head')[0].appendChild(styleNode);
	if (styleNode.styleSheet) {
		styleNode.styleSheet.cssText = styleSheets; /* Opera */
	} else {
		styleNode.appendChild(document.createTextNode(styleSheets)); /* All others */
	}
	
	/**
	 * @chainable
	 * @constructor
	 * @class Uol.PagSeguro
	 * @param token {String}
	 * @author cin_ffaria
	 */
	PagSeguro.Lightbox = function() {
		this.token;
		this.lastSentToken = '';
		this.transactionCode;
		this.callback;
		this.recoveryCode = '';
		this.lightbox = lightbox;
		this.isMobile = false;
		this.ready = false;
		
		// It's the mediator of the application
		// The mediator only needs the lightbox as an 'access permission' to establishes communication
		this.mediator = new PagSeguro.APIMediator({
			lightbox : this.lightbox
		});
		
		this.listenChannels();
	}
	PagSeguro.Lightbox.prototype = {
		constructor : PagSeguro.Lightbox,
		/**
		 * Init the checkout.
		 * 
		 * @method checkout
		 * @param callback {Function} A callback function to apply in the returned checkout data
		 * @author cin_ffaria
		 */
		checkout : function() {
			var _that = this;
			
			if (!this.ready) {
				setTimeout(function() { _that.checkout() }, 150);
				return;
			}
			
			if (!this.isMobile) {
				this.showLightbox();
			}
			
			this.sendToken();
		},
		/**
		 * Show the lightbox
		 * 
		 * @method showLightbox
		 * @return {null}
		 * @author cin_ffaria
		 */
		showLightbox : function() {
			this.lightbox.style.display = 'block';
		},
		/**
		 * Hide the lightbox
		 * 
		 * @method hideLightbox
		 * @return {null}
		 * @author cin_ffaria
		 */
		hideLightbox : function() {
			this.lightbox.style.display = 'none';
		},
		/**
		 * @async
		 * @method execCallback
		 * @return {null}
		 * @author cin_ffaria
		 */
		execCallback : function() {
			if (this.transactionCode != 'ABORTED' && this.transactionCode != '') {
				if (this.callback['success']) {
					this.callback['success'](this.transactionCode);
				}
			} else {
				this.callback['abort'](this.recoveryCode);
			}
		},
		/**
		 * Send the URL of the vendor to the registry in the lightbox.
		 * It's necessary because the lightbox needs to configure the postMessage method, allowing
		 * communication between vendor and checkout application.
		 * 
		 * @method syntonize
		 * @return {null}
		 * @author cin_ffaria
		 */
		syntonize : function() {
			this.publish({
				command : 'syntonize',
				value : window.location.protocol + '//' + window.location.host
			}, 'lightbox');
		},
		/**
		 * Compute and set the vendor token.
		 * 
		 * @method setToken
		 * @param token {String, Object} Receive a string or an json object. The json object usually is computed when calling PagSeguroLightbox from an submit form event.
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		setToken : function(token) {
			this.token = (typeof(token) === 'string') ? 'code=' + token : (token instanceof HTMLFormElement ? this.serializeForm(token) : this.serialize(token));;
		},
		/**
		 * Send the vendor checkout token to the lightbox for config of the checkout application.
		 * if lightbox have been reopened with same data, recoveryCode is sent instead (if already seted by the mediator)
		 * if data changes, recoveryCode is reseted
		 * 
		 * @method sendToken
		 * @param token {String}
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		sendToken : function() {
			var tokenToSent = this.token;
			if(tokenToSent === this.lastSentToken && this.recoveryCode != ''){
				tokenToSent = this.serialize({recoveryCode: this.recoveryCode});
			}else{
				this.recoveryCode = '';
			}
			this.publish({
				command : 'setToken',
				value : tokenToSent
			}, 'lightbox');
			this.lastSentToken = this.token;
		},
		/**
		 * If the user is on protocol file:///, cannot complete the communication process.
		 * 
		 * @method catchCommunicationException
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		catchCommunicationException : function() {
			if (window.location.toString().indexOf('file:///') != -1) {
				this.publish({
					command : 'error',
					type : '1'
				}, 'lightbox');
			}
		},
		/**
		 * Publish a message to a "layer channel" across the mediator.
		 * It's the common interface method for publishes.
		 * 
		 * @method publish
		 * @param message {String, Object} The message that'll be send
		 * @param channel {String} The layer channel that'll receive the message
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		publish : function(message, channel) {
			this.mediator.postMessage(message, channel);
		},
		/**
		 * Subscribe to a "layer channel" across the mediator.
		 * It's the common interface method to subscribe.
		 * 
		 * @method subscribe
		 * @param channel {String} The layer channel to subscribe messages
		 * @param callback {Function} A callback that holds the message given by the layer channel
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		subscribe : function(channel, callback) {
			this.mediator.acceptMessage(channel, callback);
		},
		/**
		 * Serialize the object into an URL string
		 * 
		 * @method serialize
		 * @param obj {Object} The object to be serialized into a URL string
		 * @return {String} The serialized URL string
		 * 
		 * @author cin_ffaria
		 */
		serialize : function(obj) {
			var str = '', i;
			
			for (i in obj) { str += i + '=' + obj[i] + '&'; }
			
			return str.replace(/\&$/,'');
		},
		/**
		 * Serialize a form into an url string
		 * 
		 * @method serializeForm
		 * @param htmlForm {HTMLFormElement} An instance of HTMLFormElement
		 * @return {String} The serialized URL string of the inputs
		 * 
		 * @author cin_ffaria
		 */
		serializeForm : function(htmlForm) {
			var obj = {}, elements = htmlForm.elements, i, l;
			
			for (i = 0, l = elements.length; i < l; i++) {
				if (elements[i].type != 'submit' && elements[i].name && !obj[elements[i].name] && typeof elements[i].value != "undefined") {
					obj[elements[i].name] = elements[i].value;
				}
			}

			return this.serialize(obj);
		},
		/**
		 * Only to centralize initial subscriptions
		 * 
		 * @method listenChannels
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		listenChannels : function() {
			var _that = this;
			
			this.subscribe('lightbox', function(data) {
				switch (data.command) {
					case 'setTransactionCode':
						_that.transactionCode = data.value;
						_that.recoveryCode = '';
						break;
					case 'setRecoveryCode':
						_that.recoveryCode = data.value;
						break;
					case 'hide':
						_that.hideLightbox();
						_that.execCallback();
						break;
					case 'ready':
						_that.ready = data.value;
						_that.isMobile = data.isMobile
				}
			});
		}
	}
	
	/**
	 * Normalize the communication.
	 * This object is used to implements the core pub and sub methods.
	 * 
	 * @constructor
	 * @class Uol.PagSeguro.APIMediator
	 * @param core {Uol.PagSeguro}
	 * @return {null}
	 * 
	 * @author cin_ffaria
	 */
	PagSeguro.APIMediator = function(core) {
		/**
		 * The concept behind this is the "layer channel".
		 * A layer channel is an <iframe> that needs common interface methods to communicate
		 * with another windows, even across domains.
		 * As the PagSeguro architecture communication between vendor and checkout in this API is predefined
		 * by these "layers", we don't need a mediator that manages dynamic channels, so the channels
		 * are static.
		 * It's a "layer", because windows resembles it, and it's a "channel", because
		 * the method applied to manages it is a modified mediator pattern.
		 */		
		var channels = {
			lightbox : {
				context : core.lightbox.contentWindow,
				url : 'https://pagseguro.uol.com.br',
				callbacks : []
			}
		};
		
		/**
		 * @privileged
		 * @method postMessage
		 * @param message {String, Object}
		 * @param channel {String}
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		this.postMessage = function(message, channel) {
			if (channels[channel]) {
				channels[channel].context.postMessage(JSON.stringify(message), channels[channel].url);
			}
		};
		/**
		 * @privileged
		 * @method acceptMessage
		 * @param channel {String} The channel to grant permission
		 * @param callback {Function}
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		this.acceptMessage = function(channel, callback) {
			var _that = this, callbacks = channels[channel].callbacks;
			
			callbacks[callbacks.length] = function(event) {
				
				if (!channels[channel]) return;
				
				if (event.origin == channels[channel].url) {
					var data = JSON.parse(event.data);
					callback(data);
				}
			}
			
			window[window.addEventListener ? 'addEventListener' : 'attachEvent']((window.addEventListener ? 'message' : 'onmessage'), callbacks[callbacks.length - 1], false);
		};

		/**
		 * @privileged
		 * @method ignoreMessage
		 * @param channel {String}
		 * @return {null}
		 * 
		 * @author cin_ffaria
		 */
		this.ignoreMessage = function(channel) {
			var _that = this, i = channels[channel].callbacks.length;
			
			if (channels[channel]) {
				while (i--) {
					window[window.removeEventListener ? 'removeEventListener' : 'detachEvent']((window.removeEventListener ? 'message' : 'onmessage'), channels[channel].callbacks[i], false);
				}
			}
		};
	}
	
	function _logErrors(e, method){
		var i = new Image();
		i.src = 'https://pagseguro.uol.com.br/checkout/fe-logger.jhtml?log='+e.toString()+' at(l:'+e.lineNumber+', c:'+e.columnNumber+')'+'&jsMethod='+method+'&jsOrigin=pagseguro.lightbox.js'
	}

	// it's the facade of the API
	window.PagSeguroLightbox = (function() {
		var ltb;
		
		onDocumentReady(function() {
			document.getElementsByTagName('body')[0].appendChild(lightbox);
			
			function _onload() {
				try{
					ltb = new PagSeguro.Lightbox();
					ltb.syntonize();
				}catch(e){
					_logErrors(e, '_onload');
					throw e;
				}
			};
			
			if(!window.addEventListener) { /* IEs lt 9 */
				lightbox.attachEvent('onload', _onload);
			} else {
				lightbox.addEventListener('load', _onload, false);
			}
		});
		
		/**
		 * The function that initialize the PagSeguroLightbox
		 */
		function initLightbox(token, callback) {
			if (ltb === undefined) {
				setTimeout(function() { initLightbox(token, callback) }, 100);
				return;
			}
			
			ltb.setToken(token);
			ltb.transactionCode = 'ABORTED';
			ltb.callback = callback || { abort : function(){} };
			ltb.checkout();
		}
		
		return function(token, callback) {
			try{
				initLightbox(token, callback);
				return true;
			}catch(e){
				_logErrors(e, 'initLightbox');
				throw e;
			}
		};
	})();
})();