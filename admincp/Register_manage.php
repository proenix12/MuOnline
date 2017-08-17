
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		
		<ul class="middleNavA">
			<li <?php if($_GET['op3'] == 'register_settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Register_manage-id-register_settings.html" title=""><span style="height:30px;">Register Settings</span></a></li>
			<li <?php if($_GET['op3'] == 'register_smtp_settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Register_manage-id-register_smtp_settings.html" title=""><span style="height:30px;">Register SMTP Settings</span></a></li>
            <li <?php if($_GET['op3'] == 'manage_rules') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Register_manage-id-manage_rules.html" title=""><span style="height:30px;">Register Rule Manage</span></a></li>
       </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['reg_rules'] != 'on') { echo '<font color="red"><u><b>Reg Rules</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'register_smtp_settings') { ?> <!-- register_smtp_settings -->
		<div class="widget fluid" id="emailsmtpvalidp">
			<div class="whead"><h6>Register SMTP Settings ( <b>This will send account verify url to user email</b> )</h6></div>
					<div class="formRow" id="onChsubDBmd5">
						<div class="grid3"><label>SMTP On / Off:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="smtp_mode" name="smtp_mode" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['smtp_mode'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['smtp_mode'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>SMTP Host ( <b>If Multi Then Seperate with ;</b> ):</label></div>
                        <div class="grid9"><input id="smtp_host" name="smtp_host" type="text" value="<?php echo $mvcore['smtp_host']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>SMTP Username:</label></div>
                        <div class="grid9"><input id="smtp_username" name="smtp_username" type="text" value="<?php echo $mvcore['smtp_username']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>SMTP Password:</label></div>
                        <div class="grid9"><input id="smtp_password" name="smtp_password" type="password" value="<?php echo $mvcore['smtp_password']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>SMTP Encrypt Type ( <b>Default:TLS</b> ):</label></div>
                       <div class="grid9">
							<select style="width:100%;" id="smtp_encrypt" name="smtp_encrypt" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="tls" <?php if($mvcore['smtp_encrypt'] == 'tls') { echo 'selected'; } else { echo ''; }; ?>>TLS</option> 
								<option value="ssl" <?php if($mvcore['smtp_encrypt'] == 'ssl') { echo 'selected'; } else { echo ''; }; ?>>SSL</option> 
							</select>
						</div>  
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>SMTP Port ( <b>Default:21</b> ):</label></div>
                        <div class="grid9"><input id="smtp_port" name="smtp_port" type="text" value="<?php echo $mvcore['smtp_port']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Email Address Of Sender ( <b>You</b> ):</label></div>
                        <div class="grid9"><input id="smtp_sender_mail" name="smtp_sender_mail" type="text" value="<?php echo $mvcore['smtp_sender_mail']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Name Of Admin Who Sends Activation Link To User.:</label></div>
                        <div class="grid9"><input id="smtp_sender_title" name="smtp_sender_title" type="text" value="<?php echo $mvcore['smtp_sender_title']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'register_settings') { ?> <!-- register_settings -->
		<div class="widget fluid" id="onChewejsubEwngine">
			<div class="whead"><h6>Register Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Accounts Per User:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="acc_reg_limit" name="acc_reg_limit" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="off" <?php if( $mvcore['acc_reg_limit'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>OFF ( Unlimited )</option> 
								<option value="1" <?php if( $mvcore['acc_reg_limit'] == '1') { echo 'selected'; } else { echo ''; }; ?>>1</option> 
								<option value="2" <?php if( $mvcore['acc_reg_limit'] == '2') { echo 'selected'; } else { echo ''; }; ?>>2</option> 
								<option value="3" <?php if( $mvcore['acc_reg_limit'] == '3') { echo 'selected'; } else { echo ''; }; ?>>3</option> 
								<option value="4" <?php if( $mvcore['acc_reg_limit'] == '4') { echo 'selected'; } else { echo ''; }; ?>>4</option> 
								<option value="5" <?php if( $mvcore['acc_reg_limit'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5</option> 
								<option value="6" <?php if( $mvcore['acc_reg_limit'] == '6') { echo 'selected'; } else { echo ''; }; ?>>6</option> 
								<option value="7" <?php if( $mvcore['acc_reg_limit'] == '7') { echo 'selected'; } else { echo ''; }; ?>>7</option> 
								<option value="8" <?php if( $mvcore['acc_reg_limit'] == '8') { echo 'selected'; } else { echo ''; }; ?>>8</option> 
								<option value="9" <?php if( $mvcore['acc_reg_limit'] == '9') { echo 'selected'; } else { echo ''; }; ?>>9</option> 
								<option value="10" <?php if( $mvcore['acc_reg_limit'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10</option> 
								<option value="11" <?php if( $mvcore['acc_reg_limit'] == '11') { echo 'selected'; } else { echo ''; }; ?>>11</option> 
								<option value="12" <?php if( $mvcore['acc_reg_limit'] == '12') { echo 'selected'; } else { echo ''; }; ?>>12</option> 
								<option value="13" <?php if( $mvcore['acc_reg_limit'] == '13') { echo 'selected'; } else { echo ''; }; ?>>13</option> 
								<option value="14" <?php if( $mvcore['acc_reg_limit'] == '14') { echo 'selected'; } else { echo ''; }; ?>>14</option> 
								<option value="15" <?php if( $mvcore['acc_reg_limit'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15</option> 
								<option value="16" <?php if( $mvcore['acc_reg_limit'] == '16') { echo 'selected'; } else { echo ''; }; ?>>16</option> 
								<option value="17" <?php if( $mvcore['acc_reg_limit'] == '17') { echo 'selected'; } else { echo ''; }; ?>>17</option> 
								<option value="18" <?php if( $mvcore['acc_reg_limit'] == '18') { echo 'selected'; } else { echo ''; }; ?>>18</option> 
								<option value="19" <?php if( $mvcore['acc_reg_limit'] == '19') { echo 'selected'; } else { echo ''; }; ?>>19</option> 
								<option value="20" <?php if( $mvcore['acc_reg_limit'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20</option> 
							</select>
						</div>             
					</div>
		</div>
		<div class="widget fluid" id="recaaptchasd">
			<div class="whead"><h6>Register reCAPTCHA Keys</h6></div>
					<div class="formRow" id="onChsubDBmd5">
						<div class="grid3"><label>reCAPTCHA:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="reC_onoff" name="reC_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="on" <?php if($mvcore['reC_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['reC_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>reCAPTCHA Site Key:</label></div>
                        <div class="grid9"><input id="reC_sitekey" name="reC_sitekey" type="text" value="<?php echo $mvcore['reC_sitekey']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>reCAPTCHA Secret Key:</label></div>
                        <div class="grid9"><input id="reC_secretkey" name="reC_secretkey" type="text" value="<?php echo $mvcore['reC_secretkey']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'manage_rules') { ?> <!-- manage_rules -->
		<script type="text/javascript">
			tinymce.init({
				selector: "#reg_rule_file",
				menubar: false,
				theme: "modern",
				plugins: [
					"advlist autolink lists link image preview hr anchor pagebreak",
					"wordcount code",
					"media",
					"emoticons template textcolor colorpicker textpattern imagetools"
				],
				toolbar1: "bold italic underline | fontselect fontsizeselect | forecolor backcolor | alignleft aligncenter alignright | bullist numlist | link image | emoticons | preview",
				image_advtab: true,
				templates: [
					{title: 'Test template 1', content: 'Test 1'}
				]
			});
		</script>
		<div class="widget" style="opacity:0.8;">
					<textarea rows="20" cols="" id="reg_rule_file" name="reg_rule_file"><?php echo $mvcore['reg_rule_file']; ?></textarea>
		</div>
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="clicksgmrulesds(); return false;" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;margin-top:20px;margin-bottom:20px;font-size:12px;width:100%;float:left;color:#ffffff;">Save Register Rules</a>
		</div>
		<?php }; ?>
<script>
	function clicksgmrulesds() {
		var getAllValues = tinyMCE.activeEditor.getContent();
		
			$.post("acps.php", {
				onChsugmsettwhtergweef: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	}
$(document).ready(function() {
	$( "#onChewejsubEwngine" ).on('change', function() {
		var getAllValues = $("#acc_reg_limit option:selected").val();
		
			$.post("acps.php", {
				onChewejsubEwngine: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#recaaptchasd" ).on('change', function() {
		var getAllValues =
		
			$("#reC_onoff option:selected").val()+"-ids-"
			+$("#reC_sitekey").val()+"-ids-"
			+$("#reC_secretkey").val();
		
			$.post("acps.php", {
				recaaptchasd: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#emailsmtpvalidp" ).on('change', function() {
		var getAllValues =
		
			$("#smtp_mode option:selected").val()+"-ids-"
			+$("#smtp_host").val()+"-ids-"
			+$("#smtp_username").val()+"-ids-"
			+$("#smtp_password").val()+"-ids-"
			+$("#smtp_encrypt option:selected").val()+"-ids-"
			+$("#smtp_port").val()+"-ids-"
			+$("#smtp_sender_mail").val()+"-ids-"
			+$("#smtp_sender_title").val();
		
			$.post("acps.php", {
				emailsmtpvalidp: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>