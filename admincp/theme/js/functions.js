$(function() {
	
	//===== File manager =====//	
	/*
	var elf = $('#fileManager').elfinder({
		url : 'php/connector.php',  // connector URL (REQUIRED)
		uiOptions : {
			// toolbar configuration
			toolbar : [
				['back', 'forward'],
				['info'],
				['quicklook'],
				['search']
			]
		},
		contextmenu : {
		  // Commands that can be executed for current directory
		  cwd : ['reload', 'delim', 'info'], 
		  // Commands for only one selected file
		  files : ['select', 'open']
		}
	}).elfinder('instance');	
	
	
	//===== ShowCode plugin for <pre> tag =====//

	$('.code').sourcerer('js html css php'); // Display all languages
	
	*/
	
	//===== Left navigation styling =====//
	
	$('.subNav li a.this').parent('li').addClass('activeli');


	//===== Login pic hover animation =====//
	
	/*
	
	$(".loginPic").hover(
		function() { 
		
		$('.logleft, .logback').animate({left:10, opacity:1},200); 
		$('.logright').animate({right:10, opacity:1},200); },
		
		function() { 
		$('.logleft, .logback').animate({left:0, opacity:0},200);
		$('.logright').animate({right:0, opacity:0},200); }
	);
	
	
	//===== Image gallery control buttons =====//
	
	$(".gallery ul li").hover(
		function() { $(this).children(".actions").show("fade", 200); },
		function() { $(this).children(".actions").hide("fade", 200); }
	);
	
	
	
	//===== Autocomplete =====//
	
	var availableTags = [ "ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme" ];
	$( ".ac" ).autocomplete({
	source: availableTags
	});	

	

	//===== jQuery file tree =====//
	
	$('.filetree').fileTree({
        root: '../images/',
        script: 'php/jqueryFileTree.php',
        expandSpeed: 200,
        collapseSpeed: 200,
        multiFolder: true
    }, function(file) {
        alert(file);
    });
	
	*/
	
	//===== Sortable columns =====//
	
	$("table").tablesorter();
	
	
	//===== Resizable columns =====//
	
	$("#resize, #resize2").colResizable({
		liveDrag:true,
		draggingClass:"dragging" 
	});
	
	
	//===== Bootstrap functions =====//
	
	/*
	// Loading button
    $('#loading').click(function () {
        var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
          btn.button('reset')
        }, 3000)
      });
	  
	*/
	
	// Dropdown
	$('.dropdown-toggle').dropdown();
	
	/*
	//===== Animated progress bars (ID dependency) =====//
	
	var percent = $('#bar1').attr('title');
	$('#bar1').animate({width: percent},1000);
	
	var percent = $('#bar2').attr('title');
	$('#bar2').animate({width: percent},1000);

	var percent = $('#bar3').attr('title');
	$('#bar3').animate({width: percent},1000);

	var percent = $('#bar4').attr('title');
	$('#bar4').animate({width: percent},1000);

	var percent = $('#bar5').attr('title');
	$('#bar5').animate({width: percent},1000);

	var percent = $('#bar6').attr('title');
	$('#bar6').animate({width: percent},1000);
	
	var percent = $('#bar7').attr('title');
	$('#bar7').animate({width: percent},1000);
	
	var percent = $('#bar8').attr('title');
	$('#bar8').animate({width: percent},1000);
	
	var percent = $('#bar9').attr('title');
	$('#bar9').animate({width: percent},1000);

	var percent = $('#bar10').attr('title');
	$('#bar10').animate({width: percent},1000);
	
	*/

	//===== Fancybox =====//
	
	$(".lightbox").fancybox({
	'padding': 2
	});

		function rgb2hexasd(rgb) {
		rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		function hex(x) {
			return ("0" + parseInt(x).toString(16)).slice(-2);
		}
		return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
		}
	
		if(!$("#table_s_borcolor").css( "background-color" )) { var pickersa1 = 'rgb(0,0,0)'; } else { var pickersa1 = $("#table_s_borcolor").css( "background-color" ); };
		if(!$("#table_s_rcolc").css( "background-color" )) { var pickersa2 = 'rgb(0,0,0)'; } else { var pickersa2 = $("#table_s_rcolc").css( "background-color" ); };
		if(!$("#table_s_hoverrcolc").css( "background-color" )) { var pickersa3 = 'rgb(0,0,0)'; } else { var pickersa3 = $("#table_s_hoverrcolc").css( "background-color" ); };
		if(!$("#table_s_trowcolgra").css( "background-color" )) { var pickersa4 = 'rgb(0,0,0)'; } else { var pickersa4 = $("#table_s_trowcolgra").css( "background-color" ); };
		if(!$("#table_s_titletextcolor").css( "background-color" )) { var pickersa5 = 'rgb(0,0,0)'; } else { var pickersa5 = $("#table_s_titletextcolor").css( "background-color" ); };
		if(!$("#table_s_textcolor").css( "background-color" )) { var pickersa6 = 'rgb(0,0,0)'; } else { var pickersa6 = $("#table_s_textcolor").css( "background-color" ); };
		

	var pickers1 = rgb2hexasd(pickersa1);
	var pickers2 = rgb2hexasd(pickersa2);
	var pickers3 = rgb2hexasd(pickersa3);
	var pickers4 = rgb2hexasd(pickersa4);
	var pickers5 = rgb2hexasd(pickersa5);
	var pickers6 = rgb2hexasd(pickersa6);
	
		if(!$("#button_s_bordecolor").css( "background-color" )) { var pickersa7 = 'rgb(0,0,0)'; } else { var pickersa7 = $("#button_s_bordecolor").css( "background-color" ); };
		if(!$("#button_s_bgtcolor").css( "background-color" )) { var pickersa8 = 'rgb(0,0,0)'; } else { var pickersa8 = $("#button_s_bgtcolor").css( "background-color" ); };
		if(!$("#button_s_bgbcolor").css( "background-color" )) { var pickersa9 = 'rgb(0,0,0)'; } else { var pickersa9 = $("#button_s_bgbcolor").css( "background-color" ); };
		if(!$("#button_s_bgtcolorhover").css( "background-color" )) { var pickersa10 = 'rgb(0,0,0)'; } else { var pickersa10 = $("#button_s_bgtcolorhover").css( "background-color" ); };
		if(!$("#button_s_bgbcolorhover").css( "background-color" )) { var pickersa11 = 'rgb(0,0,0)'; } else { var pickersa11 = $("#button_s_bgbcolorhover").css( "background-color" ); };
		if(!$("#button_s_textcolor").css( "background-color" )) { var pickersa12 = 'rgb(0,0,0)'; } else { var pickersa12 = $("#button_s_textcolor").css( "background-color" ); };
		if(!$("#button_s_textcolorhover").css( "background-color" )) { var pickersa13 = 'rgb(0,0,0)'; } else { var pickersa13 = $("#button_s_textcolorhover").css( "background-color" ); };

	var pickers7 = rgb2hexasd(pickersa7);
	var pickers8 = rgb2hexasd(pickersa8);
	var pickers9 = rgb2hexasd(pickersa9);
	var pickers10 = rgb2hexasd(pickersa10);
	var pickers11 = rgb2hexasd(pickersa11);
	var pickers12 = rgb2hexasd(pickersa12);
	var pickers13 = rgb2hexasd(pickersa13);
	
	// 14 - 20 //
		if(!$("#news_s_titlebg").css( "background-color" )) { var pickersa14 = 'rgb(0,0,0)'; } else { var pickersa14 = $("#news_s_titlebg").css( "background-color" ); };
		if(!$("#news_s_titlebgHover").css( "background-color" )) { var pickersa15 = 'rgb(0,0,0)'; } else { var pickersa15 = $("#news_s_titlebgHover").css( "background-color" ); };
		if(!$("#news_s_dtextcolor").css( "background-color" )) { var pickersa16 = 'rgb(0,0,0)'; } else { var pickersa16 = $("#news_s_dtextcolor").css( "background-color" ); };
		if(!$("#news_s_dateColor").css( "background-color" )) { var pickersa17 = 'rgb(0,0,0)'; } else { var pickersa17 = $("#news_s_dateColor").css( "background-color" ); };
		if(!$("#news_s_bgcolor").css( "background-color" )) { var pickersa18 = 'rgb(0,0,0)'; } else { var pickersa18 = $("#news_s_bgcolor").css( "background-color" ); };
		if(!$("#news_s_titletextcolor").css( "background-color" )) { var pickersa19 = 'rgb(0,0,0)'; } else { var pickersa19 = $("#news_s_titletextcolor").css( "background-color" ); };
		if(!$("#news_s_bordcolor").css( "background-color" )) { var pickersa20 = 'rgb(0,0,0)'; } else { var pickersa20 = $("#news_s_bordcolor").css( "background-color" ); };

	var pickers14 = rgb2hexasd(pickersa14);
	var pickers15 = rgb2hexasd(pickersa15);
	var pickers16 = rgb2hexasd(pickersa16);
	var pickers17 = rgb2hexasd(pickersa17);
	var pickers18 = rgb2hexasd(pickersa18);
	var pickers19 = rgb2hexasd(pickersa19);
	var pickers20 = rgb2hexasd(pickersa20);
	
	// 21- 25 //
		if(!$("#inpSelec_s_borcolor").css( "background-color" )) { var pickersa21 = 'rgb(0,0,0)'; } else { var pickersa21 = $("#inpSelec_s_borcolor").css( "background-color" ); };
		if(!$("#inpSelec_s_bgcolor").css( "background-color" )) { var pickersa22 = 'rgb(0,0,0)'; } else { var pickersa22 = $("#inpSelec_s_bgcolor").css( "background-color" ); };
		if(!$("#inpSelec_s_bgcoloractiv").css( "background-color" )) { var pickersa23 = 'rgb(0,0,0)'; } else { var pickersa23 = $("#inpSelec_s_bgcoloractiv").css( "background-color" ); };
		if(!$("#inpSelec_s_textcolor").css( "background-color" )) { var pickersa24 = 'rgb(0,0,0)'; } else { var pickersa24 = $("#inpSelec_s_textcolor").css( "background-color" ); };
		if(!$("#inpSelec_s_textcoloractiv").css( "background-color" )) { var pickersa25 = 'rgb(0,0,0)'; } else { var pickersa25 = $("#inpSelec_s_textcoloractiv").css( "background-color" ); };

	var pickers21 = rgb2hexasd(pickersa21);
	var pickers22 = rgb2hexasd(pickersa22);
	var pickers23 = rgb2hexasd(pickersa23);
	var pickers24 = rgb2hexasd(pickersa24);
	var pickers25 = rgb2hexasd(pickersa25);
	
	
	// 26- 29 //
		if(!$("#webshop_s_textcolor").css( "background-color" )) { var pickersa26 = 'rgb(0,0,0)'; } else { var pickersa26 = $("#webshop_s_textcolor").css( "background-color" ); };
		if(!$("#webshop_s_bgcolor").css( "background-color" )) { var pickersa27 = 'rgb(0,0,0)'; } else { var pickersa27 = $("#webshop_s_bgcolor").css( "background-color" ); };
		if(!$("#webshop_s_itembgcolor").css( "background-color" )) { var pickersa28 = 'rgb(0,0,0)'; } else { var pickersa28 = $("#webshop_s_itembgcolor").css( "background-color" ); };
		if(!$("#webshop_s_itembgcolordivi").css( "background-color" )) { var pickersa29 = 'rgb(0,0,0)'; } else { var pickersa29 = $("#webshop_s_itembgcolordivi").css( "background-color" ); };

	var pickers26 = rgb2hexasd(pickersa26);
	var pickers27 = rgb2hexasd(pickersa27);
	var pickers28 = rgb2hexasd(pickersa28);
	var pickers29 = rgb2hexasd(pickersa29);
	
	// 30- 33 //
		if(!$("#gp_s_borcolor").css( "background-color" )) { var pickersa30 = 'rgb(0,0,0)'; } else { var pickersa30 = $("#gp_s_borcolor").css( "background-color" ); };
		if(!$("#gp_s_ltextcolor").css( "background-color" )) { var pickersa31 = 'rgb(0,0,0)'; } else { var pickersa31 = $("#gp_s_ltextcolor").css( "background-color" ); };
		if(!$("#gp_s_infotcolor").css( "background-color" )) { var pickersa32 = 'rgb(0,0,0)'; } else { var pickersa32 = $("#gp_s_infotcolor").css( "background-color" ); };
		if(!$("#gp_s_bgcolor").css( "background-color" )) { var pickersa33 = 'rgb(0,0,0)'; } else { var pickersa33 = $("#gp_s_bgcolor").css( "background-color" ); };

	var pickers30 = rgb2hexasd(pickersa30);
	var pickers31 = rgb2hexasd(pickersa31);
	var pickers32 = rgb2hexasd(pickersa32);
	var pickers33 = rgb2hexasd(pickersa33);
	
	// 34- 37 //
		if(!$("#annon_s_bordcolor").css( "background-color" )) { var pickersa34 = 'rgb(0,0,0)'; } else { var pickersa34 = $("#annon_s_bordcolor").css( "background-color" ); };
		if(!$("#annon_s_textcolor").css( "background-color" )) { var pickersa35 = 'rgb(0,0,0)'; } else { var pickersa35 = $("#annon_s_textcolor").css( "background-color" ); };
		if(!$("#annon_s_bgcolor").css( "background-color" )) { var pickersa36 = 'rgb(0,0,0)'; } else { var pickersa36 = $("#annon_s_bgcolor").css( "background-color" ); };
		if(!$("#annon_s_bgcolor2").css( "background-color" )) { var pickersa37 = 'rgb(0,0,0)'; } else { var pickersa37 = $("#annon_s_bgcolor2").css( "background-color" ); };

	var pickers34 = rgb2hexasd(pickersa34);
	var pickers35 = rgb2hexasd(pickersa35);
	var pickers36 = rgb2hexasd(pickersa36);
	var pickers37 = rgb2hexasd(pickersa37);
	
		if(!$("#preview_bg").css( "background-color" )) { var pickersa38 = 'rgb(0,0,0)'; } else { var pickersa38 = $("#preview_bg").css( "background-color" ); };

	var pickers38 = rgb2hexasd(pickersa38);
	
	//===== Color picker =====//
	
	$('#cPicker').ColorPicker({
		color: pickers1,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker div').css('backgroundColor', '#' + hex);
		}
	});

		
	$('#cPicker2').ColorPicker({
		color: pickers2,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker2 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker3').ColorPicker({
		color: pickers3,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker3 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker4').ColorPicker({
		color: pickers4,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker4 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker5').ColorPicker({
		color: pickers5,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker5 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker6').ColorPicker({
		color: pickers6,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker6 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker7').ColorPicker({
		color: pickers7,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker7 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker8').ColorPicker({
		color: pickers8,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker8 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker9').ColorPicker({
		color: pickers9,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker9 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker10').ColorPicker({
		color: pickers10,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker10 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker11').ColorPicker({
		color: pickers11,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker11 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker12').ColorPicker({
		color: pickers12,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker12 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker13').ColorPicker({
		color: pickers13,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker13 div').css('backgroundColor', '#' + hex);
		}
	});
	
	//New Line 14 - 18 News Page //
	$('#cPicker14').ColorPicker({
		color: pickers14,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker14 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker15').ColorPicker({
		color: pickers15,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker15 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker16').ColorPicker({
		color: pickers16,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker16 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker17').ColorPicker({
		color: pickers17,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker17 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker18').ColorPicker({
		color: pickers18,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker18 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker19').ColorPicker({
		color: pickers19,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker19 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker20').ColorPicker({
		color: pickers20,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker20 div').css('backgroundColor', '#' + hex);
		}
	});
	//End//
	
	$('#cPicker21').ColorPicker({
		color: pickers21,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker21 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker22').ColorPicker({
		color: pickers22,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker22 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker23').ColorPicker({
		color: pickers23,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker23 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker24').ColorPicker({
		color: pickers24,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker24 div').css('backgroundColor', '#' + hex);
		}
	});
	$('#cPicker25').ColorPicker({
		color: pickers25,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker25 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker26').ColorPicker({
		color: pickers26,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker26 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker27').ColorPicker({
		color: pickers27,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker27 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker28').ColorPicker({
		color: pickers28,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker28 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker29').ColorPicker({
		color: pickers29,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker29 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker30').ColorPicker({
		color: pickers30,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker30 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker31').ColorPicker({
		color: pickers31,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker31 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker32').ColorPicker({
		color: pickers32,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker32 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker33').ColorPicker({
		color: pickers33,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker33 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker34').ColorPicker({
		color: pickers34,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker34 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker35').ColorPicker({
		color: pickers35,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker35 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker36').ColorPicker({
		color: pickers36,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker36 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker37').ColorPicker({
		color: pickers37,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker37 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#cPicker38').ColorPicker({
		color: pickers38,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker38 div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#flatPicker').ColorPicker({flat: true});


	//===== Time picker =====//
	/*
	$('.timepicker').timeEntry({
		show24Hours: true, // 24 hours format
		showSeconds: true, // Show seconds?
		spinnerImage: 'images/elements/ui/spinner.png', // Arrows image
		spinnerSize: [19, 26, 0], // Image size
		spinnerIncDecOnly: true // Only up and down arrows
	});
	

	//===== Usual validation engine=====//

	$("#usualValidate").validate({
		rules: {
			firstname: "required",
			minChars: {
				required: true,
				minlength: 3
			},
			maxChars: {
				required: true,
				maxlength: 6
			},
			mini: {
				required: true,
				min: 3
			},
			maxi: {
				required: true,
				max: 6
			},
			range: {
				required: true,
				range: [6, 16]
			},
			emailField: {
				required: true,
				email: true
			},
			urlField: {
				required: true,
				url: true
			},
			dateField: {
				required: true,
				date: true
			},
			digitsOnly: {
				required: true,
				digits: true
			},
			enterPass: {
				required: true,
				minlength: 5
			},
			repeatPass: {
				required: true,
				minlength: 5,
				equalTo: "#enterPass"
			},
			customMessage: "required",
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			customMessage: {
				required: "Bazinga! This message is editable",
			},
			agree: "Please accept our policy"
		}
	});
	
	
	//===== Validation engine =====//
	
	$("#validate").validationEngine();
	
	*/
	
	//===== iButtons =====//
	
	$('.on_off :checkbox, .on_off :radio').iButton({
		labelOn: "",
		labelOff: "",
		enableDrag: false 
	});
	
	$('.yes_no :checkbox, .yes_no :radio').iButton({
		labelOn: "On",
		labelOff: "Off",
		enableDrag: false
	});
	
	$('.enabled_disabled :checkbox, .enabled_disabled :radio').iButton({
		labelOn: "Enabled",
		labelOff: "Disabled",
		enableDrag: false
	});
	
	
	
	//===== Notification boxes =====//
	
	$(".nNote").click(function() {
		$(this).fadeTo(200, 0.00, function(){ //fade
			$(this).slideUp(200, function() { //slide up
				$(this).remove(); //then remove from the DOM
			});
		});
	});	
	
	
	//===== Animate current li when closing button clicked =====//
	
	$(".remove").click(function() {
		$(this).parent('li').fadeTo(200, 0.00, function(){ //fade
			$(this).slideUp(200, function() { //slide up
				$(this).remove(); //then remove from the DOM
			});
		});
	});	
	
	
	
	//===== Check all checbboxes =====//
	
	$(".titleIcon input:checkbox").click(function() {
		var checkedStatus = this.checked;
		$("#checkAll tbody tr td:first-child input:checkbox").each(function() {
			this.checked = checkedStatus;
				if (checkedStatus == this.checked) {
					$(this).closest('.checker > span').removeClass('checked');
					$(this).closest('table tbody tr').removeClass('thisRow');
				}
				if (this.checked) {
					$(this).closest('.checker > span').addClass('checked');
					$(this).closest('table tbody tr').addClass('thisRow');
				}
		});
	});	
	
	$(function() {
    $('#checkAll tbody tr td:first-child input[type=checkbox]').change(function() {
        $(this).closest('tr').toggleClass("thisRow", this.checked);
		});
	});


	//===== File uploader =====//
	/*
	$("#uploader").pluploadQueue({
		runtimes : 'html5,html4',
		url : 'php/upload.php',
		max_file_size : '100kb',
		unique_names : true,
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"}
		]
	});
	*/
	
	//===== Wizards =====//
	/*
	$("#wizard1").formwizard({
		formPluginEnabled: true, 
		validationEnabled: false,
		focusFirstInput : false,
		disableUIStyles : true,
	
		formOptions :{
			success: function(data){$("#status1").fadeTo(500,1,function(){ $(this).html("<span>Form was submitted!</span>").fadeTo(5000, 0); })},
			beforeSubmit: function(data){$("#w1").html("<span>Form was submitted with ajax. Data sent to the server: " + $.param(data) + "</span>");},
			resetForm: true
		}
	});
	
	$("#wizard2").formwizard({ 
		formPluginEnabled: true,
		validationEnabled: true,
		focusFirstInput : false,
		disableUIStyles : true,
	
		formOptions :{
			success: function(data){$("#status2").fadeTo(500,1,function(){ $(this).html("<span>Form was submitted!</span>").fadeTo(5000, 0); })},
			beforeSubmit: function(data){$("#w2").html("<span>Form was submitted with ajax. Data sent to the server: " + $.param(data) + "</span>");},
			dataType: 'json',
			resetForm: true
		},
		validationOptions : {
			rules: {
				bazinga: "required",
				email: { required: true, email: true }
			},
			messages: {
				bazinga: "Bazinga. This note is editable",
				email: { required: "Please specify your email", email: "Correct format is name@domain.com" }
			}
		}
	});
	
	$("#wizard3").formwizard({
		formPluginEnabled: false, 
		validationEnabled: false,
		focusFirstInput : false,
		disableUIStyles : true
	});
	
	*/
	
	//===== WYSIWYG editor =====//
	/*
	$("#editor").cleditor({
		width:"100%", 
		height:"250px",
		bodyStyle: "margin: 10px; font: 12px Arial,Verdana; cursor:text",
		useCSS:true
	});
	*/
	
	//===== Dual select boxes =====//
	
	$.configureBoxes();


	//===== Select2 dropdowns =====//

	$(".select").select2();
		
	$(".selectMultiple").select2();
		
	$("#loadingdata").select2({
		placeholder: "Enter at least 1 character",
        allowClear: true,
        minimumInputLength: 1,
        query: function (query) {
            var data = {results: []}, i, j, s;
            for (i = 1; i < 5; i++) {
                s = "";
                for (j = 0; j < i; j++) {s = s + query.term;}
                data.results.push({id: query.term + i, text: s});
            }
            query.callback(data);
        }
    });		
		
	$("#maxselect").select2({ maximumSelectionSize: 3 });
		
	$("#minselect").select2({
        minimumInputLength: 2,
		width: 'element'
    });
	
	$("#minselect2").select2({
        minimumInputLength: 2
    });
	
	$("#disableselect, #disableselect2").select2(
        "disable"
    );
	
	
	//===== Autotabs. Inline data rows =====//
	/*
	$('.onlyNums input').autotab_magic().autotab_filter('numeric');
	$('.onlyText input').autotab_magic().autotab_filter('text');
	$('.onlyAlpha input').autotab_magic().autotab_filter('alpha');
	$('.onlyRegex input').autotab_magic().autotab_filter({ format: 'custom', pattern: '[^0-9\.]' });
	$('.allUpper input').autotab_magic().autotab_filter({ format: 'alphanumeric', uppercase: true });
	
	
	//===== Masked input =====//
	
	$.mask.definitions['~'] = "[+-]";
	$(".maskDate").mask("99/99/9999",{completed:function(){alert("Callback when completed");}});
	$(".maskPhone").mask("(999) 999-9999");
	$(".maskPhoneExt").mask("(999) 999-9999? x99999");
	$(".maskIntPhone").mask("+33 999 999 999");
	$(".maskTin").mask("99-9999999");
	$(".maskSsn").mask("999-99-9999");
	$(".maskProd").mask("a*-999-a999", { placeholder: " " });
	$(".maskEye").mask("~9.99 ~9.99 999");
	$(".maskPo").mask("PO: aaa-999-***");
	$(".maskPct").mask("99%");
	
	*/
	//===== Tags =====//	
	/*
	$('.tags').tagsInput({width:'100%'});
	*/
	
	//===== Input limiter =====//
	/*
	$('.lim').inputlimiter({
		limit: 100,
		boxId: 'limitingtext',
		boxAttach: false
	});
	
	*/
	
	//===== Elastic textarea =====//
	
	$('.auto').autosize();


	//===== Full width sidebar dropdown =====//
	/*
	$('.fulldd li').click(function () {
		$(this).children("ul").slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("has"))
		$('.fulldd li').children("ul").slideUp(150);
	});
	
	
	//===== Top panel search field =====//
	
	$('.userNav a.search').click(function () {
		$('.topSearch').fadeToggle(150);
	});
	
	
	//===== 2 responsive buttons (320px - 480px) =====//
	
	$('.iTop').click(function () {
		$('#sidebar').slideToggle(100);
	});
	
	$('.iButton').click(function () {
		$('.altMenu').slideToggle(100);
	});

	*/
	
	//===== Animated dropdown for the right links group on breadcrumbs line =====//
	
	$('.breadLinks ul li').click(function () {
		$(this).children("ul").slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("has"))
		$('.breadLinks ul li').children("ul").slideUp(150);
	});
	
	
	//===== Easy tabs =====//
	
	$('#tab-container').easytabs({
		animationSpeed: 300,
		collapsible: false,
		tabActiveClass: "clicked"
	});
		
	
	//===== Tabs =====//
		
	$( ".tabs" ).tabs();

	var tabs = $( ".tabs-sortable" ).tabs();
    tabs.find( ".ui-tabs-nav" ).sortable({
        axis: "x",
        stop: function() {
        tabs.tabs( "refresh" );
        }
    });

	//===== Dynamic data table =====//
	
	oTable = $('.dTable').dataTable({
		"bJQueryUI": false,
		"bAutoWidth": false,
		"sPaginationType": "full_numbers",
		"sDom": '<"tablePars"fl>t<"tableFooter"ip>',
		"oLanguage": {
			"sLengthMenu": "<span class='showentries'>Show entries:</span> _MENU_"
		}
	});
	

	//===== Dynamic table toolbars =====//		
	
	$('#dyn .tOptions').click(function () {
		$('#dyn .tablePars').slideToggle(200);
	});	
	
	$('#dyn2 .tOptions').click(function () {
		$('#dyn2 .tablePars').slideToggle(200);
	});	
	
	
	$('.tOptions').click(function () {
		$(this).toggleClass("act");
	});
	

	//== Adding class to :last-child elements ==//
		
	$(".subNav li:last-child a, .formRow:last-child, .userList li:last-child, table tbody tr:last-child td, .breadLinks ul li ul li:last-child, .fulldd li ul li:last-child, .niceList li:last-child").addClass("noBorderB")

	/*
	//===== Add classes for sub sidebar detection =====//
	
	if ($('div').hasClass('secNav')) {
		$('#sidebar').addClass('with');
		//$('#content').addClass('withSide');
	}
	else {
		$('#sidebar').addClass('without');
		$('#content').css('margin-left','100px');//.addClass('withoutSide');
		$('#footer > .wrapper').addClass('fullOne');
		};


	//===== Collapsible elements management =====//
	
	$('.exp').collapsible({
		defaultOpen: 'current',
		cookieName: 'navAct',
		cssOpen: 'subOpened',
		cssClose: 'subClosed',
		speed: 200
	});

	$('.opened').collapsible({
		defaultOpen: 'opened,toggleOpened',
		cssOpen: 'inactive',
		cssClose: 'normal',
		speed: 200
	});
	
	$('.closed').collapsible({
		defaultOpen: '',
		cssOpen: 'inactive',
		cssClose: 'normal',
		speed: 200
	});
	
	
	//===== Accordion =====//		
	
	$('div.menu_body:eq(0)').show();
	$('.acc .whead:eq(0)').show().css({color:"#2B6893"});
	
	$(".acc .whead").click(function() {	
		$(this).css({color:"#2B6893"}).next("div.menu_body").slideToggle(200).siblings("div.menu_body").slideUp("slow");
		$(this).siblings().css({color:"#404040"});
	});



	//===== Breadcrumbs =====//
	
	$('#breadcrumbs').xBreadcrumbs();
	
	
		//===== Sparklines =====//
	
	$('.balBars').sparkline(
	'html', {type: 'bar', barColor: '#db6464', height: '18px'}
	 );
	 

	//===== User nav dropdown =====//		
	
	$('a.leftUserDrop').click(function () {
		$('.leftUser').slideToggle(200);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("leftUserDrop"))
		$(".leftUser").slideUp(200);
	});
	
	
	//===== Tooltips =====//

	$('.tipN').tipsy({gravity: 'n',fade: true, html:true});
	$('.tipS').tipsy({gravity: 's',fade: true, html:true});
	$('.tipW').tipsy({gravity: 'w',fade: true, html:true});
	$('.tipE').tipsy({gravity: 'e',fade: true, html:true});
	
	
	//===== Calendar =====//
	
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		editable: true,
		events: [
			{
				title: 'All Day Event',
				start: new Date(y, m, 1)
			},
			{
				title: 'Long Event',
				start: new Date(y, m, d-5),
				end: new Date(y, m, d-2)
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d-3, 16, 0),
				allDay: false
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d+4, 16, 0),
				allDay: false
			},
			{
				title: 'Meeting',
				start: new Date(y, m, d, 10, 30),
				allDay: false
			},
			{
				title: 'Lunch',
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d, 14, 0),
				allDay: false
			},
			{
				title: 'Birthday Party',
				start: new Date(y, m, d+1, 19, 0),
				end: new Date(y, m, d+1, 22, 30),
				allDay: false
			},
			{
				title: 'Click for Google',
				start: new Date(y, m, 28),
				end: new Date(y, m, 29),
				url: 'http://google.com/'
			}
		]
	});



	//===== Spinner options =====//
	
	$( "#spinner-default" ).spinner();
	
	$( "#spinner-decimal" ).spinner({
		step: 0.01,
		numberFormat: "n"
	});
	
	$( "#culture" ).change(function() {
		var current = $( "#spinner-decimal" ).spinner( "value" );
		Globalize.culture( $(this).val() );
		$( "#spinner-decimal" ).spinner( "value", current );
	});
	
	$( "#currency" ).change(function() {
		$( "#spinner-currency" ).spinner( "option", "culture", $( this ).val() );
	});
	
	$( "#spinner-currency" ).spinner({
		min: 5,
		max: 2500,
		step: 25,
		start: 1000,
		numberFormat: "C"
	});
		
	$( "#spinner-overflow" ).spinner({
		spin: function( event, ui ) {
			if ( ui.value > 10 ) {
				$( this ).spinner( "value", -10 );
				return false;
			} else if ( ui.value < -10 ) {
				$( this ).spinner( "value", 10 );
				return false;
			}
		}
	});
	
	$.widget( "ui.timespinner", $.ui.spinner, {
		options: {
			// seconds
			step: 60 * 1000,
			// hours
			page: 60
		},

		_parse: function( value ) {
			if ( typeof value === "string" ) {
				// already a timestamp
				if ( Number( value ) == value ) {
					return Number( value );
				}
				return +Globalize.parseDate( value );
			}
			return value;
		},

		_format: function( value ) {
			return Globalize.format( new Date(value), "t" );
		}
	});

	$( "#spinner-time" ).timespinner();
	$( "#culture-time" ).change(function() {
		var current = $( "#spinner-time" ).timespinner( "value" );
		Globalize.culture( $(this).val() );
		$( "#spinner-time" ).timespinner( "value", current );
	});
	
	*/

	//===== jQuery UI dialog =====//
	
    $('#dialog').dialog({
        autoOpen: false,
        width: 400,
        buttons: {
            "Gotcha": function () {
                $(this).dialog("close");
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }
    });
	
    // Dialog Link
    $('#dialog_open').click(function () {
        $('#dialog').dialog('open');
        return false;
    });
	
	// Dialog
    $('#formDialog').dialog({
        autoOpen: false,
        width: 400,
        buttons: {
            "Nice stuff": function () {
                $(this).dialog("close");
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }
    });
	
    // Dialog Link
    $('#formDialog_open').click(function () {
        $('#formDialog').dialog('open');
        return false;
    });
	
	// Dialog
    $('#customDialog').dialog({
        autoOpen: false,
        width: 650,
        buttons: {
            "Very cool!": function () {
                $(this).dialog("close");
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }
    });
	
    // Dialog Link
    $('#customDialog_open').click(function () {
        $('#customDialog').dialog('open');
        return false;
    });

	/*
	
	//===== Vertical sliders =====//
	
	$( "#eq > span" ).each(function() {
		// read initial values from markup and remove that
		var value = parseInt( $( this ).text(), 10 );
		$( this ).empty().slider({
			value: value,
			range: "min",
			animate: true,
			orientation: "vertical"
		});
	});
	
	*/
	
	//===== Modal =====//
	
    $('#dialog-modal').dialog({
		autoOpen: false, 
		width: 400,
		modal: true,
		buttons: {
				"Yep!": function() {
					$( this ).dialog( "close" );
				}
			}
		});
		
    $('#modal_open').click(function () {
        $('#dialog-modal').dialog('open');
        return false;
    });
	
	
	//===== jQuery UI stuff =====//
	
	// default mode
	$('#progress1').anim_progressbar();
	
	// from second #5 till 15
	var iNow = new Date().setTime(new Date().getTime() + 5 * 1000); // now plus 5 secs
	var iEnd = new Date().setTime(new Date().getTime() + 15 * 1000); // now plus 15 secs
	$('#progress2').anim_progressbar({start: iNow, finish: iEnd, interval: 1});
	
	// Progressbar
    $("#progress").progressbar({
        value: 80
    });
	
    // Modal Link
    $('#modal_link').click(function () {
        $('#dialog-message').dialog('open');
        return false;
    });
	
	// Datepicker
    $('.inlinedate').datepicker({
        inline: true,
		showOtherMonths:true
    });
	
	$( ".datepicker" ).datepicker({ 
		defaultDate: +7,
		showOtherMonths:true,
		autoSize: true,
		appendText: '(dd-mm-yyyy)',
		dateFormat: 'dd-mm-yy'
	});	
	
	$(function() {
			var dates = $( "#fromDate, #toDate" ).datepicker({
				defaultDate: "+1w",
				changeMonth: false,
				showOtherMonths:true,
				numberOfMonths: 3,
				onSelect: function( selectedDate ) {
					var option = this.id == "fromDate" ? "minDate" : "maxDate",
						instance = $( this ).data( "datepicker" ),
						date = $.datepicker.parseDate(
							instance.settings.dateFormat ||
							$.datepicker._defaults.dateFormat,
							selectedDate, instance.settings );
					dates.not( this ).datepicker( "option", option, date );
				}
			});
		});
	
	
	$( ".uSlider" ).slider(); /* Usual slider */
	
	
	$( ".uRange" ).slider({ /* Range slider */
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
		slide: function( event, ui ) {
			$( "#rangeAmount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	$( "#rangeAmount" ).val( "$" + $( ".uRange" ).slider( "values", 0 ) +" - $" + $( ".uRange" ).slider( "values", 1 ));
	

	$( ".uMin" ).slider({ /* Slider with minimum */
		range: "min",
		value: 37,
		min: 1,
		max: 700,
		slide: function( event, ui ) {
			$( "#minRangeAmount" ).val( "$" + ui.value );
		}
	});
	$( "#minRangeAmount" ).val( "$" + $( ".uMin" ).slider( "value" ) );


	$( ".uMax" ).slider({ /* Slider with maximum */
		range: "max",
		min: 1,
		max: 100,
		value: 20,
		slide: function( event, ui ) {
			$( "#maxRangeAmount" ).val( ui.value );
		}
	});
	$( "#maxRangeAmount" ).val( $( ".uMax" ).slider( "value" ) );
	
	
	
	/* Uniqe Slider Buttons */
	//----------------------------------
	$( ".uMaxUnical212" ).slider({
		range: "value",
		min: 5,
		max:  60,
		value: $( "#inpSelec_s_vsize" ).val(),
		slide: function( event, ui ) {
			$( "#inpSelec_s_vsize" ).val( ui.value );
		}
	});
	$( "#inpSelec_s_vsize" ).val( $( ".uMaxUnical212" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical235" ).slider({
		range: "value",
		min: 50,
		max: 800,
		value: $( "#inpSelec_s_hsize" ).val(),
		slide: function( event, ui ) {
			$( "#inpSelec_s_hsize" ).val( ui.value );
		}
	});
	$( "#inpSelec_s_hsize" ).val( $( ".uMaxUnical235" ).slider( "value" ) );
	//------------------------------
	
	
	$( ".uMaxUnical" ).slider({
		range: "value",
		min: 1,
		max: 35,
		value: $( "#button_s_vsize" ).val(),
		slide: function( event, ui ) {
			$( "#button_s_vsize" ).val( ui.value );
		}
	});
	$( "#button_s_vsize" ).val( $( ".uMaxUnical" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical2" ).slider({
		range: "value",
		min: 1,
		max: 80,
		value: $( "#button_s_hsize" ).val(),
		slide: function( event, ui ) {
			$( "#button_s_hsize" ).val( ui.value );
		}
	});
	$( "#button_s_hsize" ).val( $( ".uMaxUnical2" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical3" ).slider({
		range: "value",
		min: 0,
		max: 40,
		value: $( "#button_s_bradius" ).val(),
		slide: function( event, ui ) {
			$( "#button_s_bradius" ).val( ui.value );
		}
	});
	$( "#button_s_bradius" ).val( $( ".uMaxUnical3" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical4" ).slider({
		range: "value",
		min: 0,
		max: 12,
		value: $( "#button_s_bsizes" ).val(),
		slide: function( event, ui ) {
			$( "#button_s_bsizes" ).val( ui.value );
		}
	});
	$( "#button_s_bsizes" ).val( $( ".uMaxUnical4" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical5" ).slider({
		range: "value",
		min: 0,
		max: 40,
		value: $( "#news_s_bradous" ).val(),
		slide: function( event, ui ) {
			$( "#news_s_bradous" ).val( ui.value );
		}
	});
	$( "#news_s_bradous" ).val( $( ".uMaxUnical5" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical6" ).slider({
		range: "value",
		min: 0,
		max: 12,
		value: $( "#news_s_bsize" ).val(),
		slide: function( event, ui ) {
			$( "#news_s_bsize" ).val( ui.value );
		}
	});
	$( "#news_s_bsize" ).val( $( ".uMaxUnical6" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical7" ).slider({
		range: "value",
		min: 0,
		max: 40,
		value: $( "#inpSelec_s_bradius" ).val(),
		slide: function( event, ui ) {
			$( "#inpSelec_s_bradius" ).val( ui.value );
		}
	});
	$( "#inpSelec_s_bradius" ).val( $( ".uMaxUnical7" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical8" ).slider({
		range: "value",
		min: 0,
		max: 12,
		value: $( "#inpSelec_s_bsizes" ).val(),
		slide: function( event, ui ) {
			$( "#inpSelec_s_bsizes" ).val( ui.value );
		}
	});
	$( "#inpSelec_s_bsizes" ).val( $( ".uMaxUnical8" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical9" ).slider({
		range: "value",
		min: 0,
		max: 40,
		value: $( "#webshop_s_borderradi" ).val(),
		slide: function( event, ui ) {
			$( "#webshop_s_borderradi" ).val( ui.value );
		}
	});
	$( "#webshop_s_borderradi" ).val( $( ".uMaxUnical9" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical10" ).slider({
		range: "value",
		min: 0,
		max: 12,
		value: $( "#gp_s_borradiu" ).val(),
		slide: function( event, ui ) {
			$( "#gp_s_borradiu" ).val( ui.value );
		}
	});
	$( "#gp_s_borradiu" ).val( $( ".uMaxUnical10" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical11" ).slider({
		range: "value",
		min: 0,
		max: 40,
		value: $( "#gp_s_borsize" ).val(),
		slide: function( event, ui ) {
			$( "#gp_s_borsize" ).val( ui.value );
		}
	});
	$( "#gp_s_borsize" ).val( $( ".uMaxUnical11" ).slider( "value" ) );
	
	//------------
	$( ".uMaxUnical12" ).slider({
		range: "value",
		min: 100,
		max: 400,
		value: $( "#gp_s_width" ).val(),
		slide: function( event, ui ) {
			$( "#gp_s_width" ).val( ui.value );
		}
	});
	$( "#gp_s_width" ).val( $( ".uMaxUnical12" ).slider( "value" ) );
	
	//------------
	$( ".uMaxUnical13" ).slider({
		range: "value",
		min: 50,
		max: 200,
		value: $( "#gp_s_height" ).val(),
		slide: function( event, ui ) {
			$( "#gp_s_height" ).val( ui.value );
		}
	});
	$( "#gp_s_height" ).val( $( ".uMaxUnical13" ).slider( "value" ) );
	/* END */
	
	//-=====================================================================================

	//------------
	$( ".uMaxUnical01" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#table_bg_trans" ).val(),
		slide: function( event, ui ) {
			$( "#table_bg_trans" ).val( ui.value );
		}
	});
	$( "#table_bg_trans" ).val( $( ".uMaxUnical01" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical02" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#table_bg_transhov" ).val(),
		slide: function( event, ui ) {
			$( "#table_bg_transhov" ).val( ui.value );
		}
	});
	$( "#table_bg_transhov" ).val( $( ".uMaxUnical02" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical03" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#news_bg_trans" ).val(),
		slide: function( event, ui ) {
			$( "#news_bg_trans" ).val( ui.value );
		}
	});
	$( "#news_bg_trans" ).val( $( ".uMaxUnical03" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical04" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#webshop_bg_trans" ).val(),
		slide: function( event, ui ) {
			$( "#webshop_bg_trans" ).val( ui.value );
		}
	});
	$( "#webshop_bg_trans" ).val( $( ".uMaxUnical04" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical05" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#webshop_bg_transMenu" ).val(),
		slide: function( event, ui ) {
			$( "#webshop_bg_transMenu" ).val( ui.value );
		}
	});
	$( "#webshop_bg_transMenu" ).val( $( ".uMaxUnical05" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical06" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#gameP_bg_trans" ).val(),
		slide: function( event, ui ) {
			$( "#gameP_bg_trans" ).val( ui.value );
		}
	});
	$( "#gameP_bg_trans" ).val( $( ".uMaxUnical06" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical07" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#inpSelect_bg_trans" ).val(),
		slide: function( event, ui ) {
			$( "#inpSelect_bg_trans" ).val( ui.value );
		}
	});
	$( "#inpSelect_bg_trans" ).val( $( ".uMaxUnical07" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical08" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#inpSelect_bg_transHover" ).val(),
		slide: function( event, ui ) {
			$( "#inpSelect_bg_transHover" ).val( ui.value );
		}
	});
	$( "#inpSelect_bg_transHover" ).val( $( ".uMaxUnical08" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical09" ).slider({
		range: "value",
		min: 0,
		max: 12,
		value: $( "#annon_s_bradous" ).val(),
		slide: function( event, ui ) {
			$( "#annon_s_bradous" ).val( ui.value );
		}
	});
	$( "#annon_s_bradous" ).val( $( ".uMaxUnical09" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical010" ).slider({
		range: "value",
		min: 0,
		max: 40,
		value: $( "#annon_s_bsize" ).val(),
		slide: function( event, ui ) {
			$( "#annon_s_bsize" ).val( ui.value );
		}
	});
	$( "#annon_s_bsize" ).val( $( ".uMaxUnical010" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical011" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#annon_bg_trans" ).val(),
		slide: function( event, ui ) {
			$( "#annon_bg_trans" ).val( ui.value );
		}
	});
	$( "#annon_bg_trans" ).val( $( ".uMaxUnical011" ).slider( "value" ) );
	//------------
	$( ".uMaxUnical012" ).slider({
		range: "value",
		min: 0,
		max: 10,
		value: $( "#news_title_bg_trans" ).val(),
		slide: function( event, ui ) {
			$( "#news_title_bg_trans" ).val( ui.value );
		}
	});
	$( "#news_title_bg_trans" ).val( $( ".uMaxUnical012" ).slider( "value" ) );
	//-=====================================================================================

	//===== Add class on #content resize. Needed for responsive grid =====//
	
	$(window).resize(function () {
	  var width = $("#content").width();
		if (width < 769) {
			$("#content").addClass('under');
		}
		else { $("#content").removeClass('under') }
	}).resize(); // Run resize on window load
	
	
	//===== Button for showing up sidebar on iPad portrait mode. Appears on right top =====//
				
	$("ul.userNav li a.sidebar").click(function() { 
		$(".secNav").toggleClass('display');
	});


	//===== Form elements styling =====//
	
	$(".styled, input:radio, input:checkbox, .dataTables_length select").uniform();

	
});

	
