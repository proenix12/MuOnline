
<?php if($_SESSION['admin_panel'] == 'ok') { ?>
				<div class="widget" style="width: 100%;height: 600px;">
					<div class="whead"><h6>Live Support Chat! Around MVCore Administrators.</h6></div>
					<script id="cid0020000103758791365" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 100%;height: 100%;">{"handle":"mvcoreweb","arch":"js","styles":{"a":"C8C8C8","b":54,"c":"000000","d":"000000","f":54,"i":54,"k":"C8C8C8","l":"C8C8C8","m":"C8C8C8","o":54,"p":"10","q":"C8C8C8","r":54,"allowpm":0}}</script>
				</div>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>