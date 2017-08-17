
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Friend_System') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Other_Module_Settings-id-Friend_System.html" title=""><span style="height:30px;">Friend System Settings</span></a></li>
			<li <?php if($_GET['op3'] == 'Item_info_hide') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Other_Module_Settings-id-Item_info_hide.html" title=""><span style="height:30px;">Item Information Hide</span></a></li>
			<li <?php if($_GET['op3'] == 'Castle_Siege_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Other_Module_Settings-id-Castle_Siege_manage.html" title=""><span style="height:30px;">Castle Siege Settings</span></a></li>
			<li <?php if($_GET['op3'] == 'My_Sponsor_sys') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Other_Module_Settings-id-My_Sponsor_sys.html" title=""><span style="height:30px;">My Sponsor Settings</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
			
		<?php if($_GET['op3'] == 'Friend_System') { ?> <!-- Friend_System -->
		<div class="widget fluid" id="FriendSystemsett">
			<div class="whead"><h6>Friend System Settings <?php if($mvcore['Friend_System'] != 'on') { echo '( <font color="red"><u><b>Friend System</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Max Friend LIMIT ( <b>Default: 50</b> ):</label></div>
                        <div class="grid9"><input id="friend_sys_limit" name="friend_sys_limit" type="text" value="<?php echo $mvcore['friend_sys_limit']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Invited Friend Reward ( <?php echo $mvcore['money_name1']; ?> ):</label></div>
                        <div class="grid9"><input id="friend_sys_inv_rew" name="friend_sys_inv_rew" type="text" value="<?php echo $mvcore['friend_sys_inv_rew']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Reward Who Invited ( <?php echo $mvcore['money_name1']; ?> ):</label></div>
                        <div class="grid9"><input id="friend_sys_reward" name="friend_sys_reward" type="text" value="<?php echo $mvcore['friend_sys_reward']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Need LEVEL To Get Reward ( <b>Default: 400</b>  / Leave Empty To Disable ):</label></div>
                        <div class="grid9"><input id="friend_sys_level_tgw" name="friend_sys_level_tgw" type="text" value="<?php echo $mvcore['friend_sys_level_tgw']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Need RESETS To Get Reward ( <b>Default: 1</b> / Leave Empty To Disable ):</label></div>
                        <div class="grid9"><input id="friend_sys_reset_tgw" name="friend_sys_reset_tgw" type="text" value="<?php echo $mvcore['friend_sys_reset_tgw']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'My_Sponsor_sys') { ?> <!-- My_Sponsor_sys -->
		<div class="widget fluid" id="mysponsorsett">
			<div class="whead"><h6>My Sponsor Settings <?php if($mvcore['My_Sponsor'] != 'on') { echo '( <font color="red"><u><b>My Sponsor</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Sponsor Day Limit ( <?php echo $mvcore['money_name1']; ?> ):</label></div>
                        <div class="grid9"><input id="ms_day_limit" name="ms_day_limit" type="text" value="<?php echo $mvcore['ms_day_limit']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Item_info_hide') { ?> <!-- Item_info_hide -->
		<div class="widget fluid" id="itemhidesett">
			<div class="whead"><h6>Item Information Hide Settings <?php if($mvcore['Hide_Information'] != 'on') { echo '( <font color="red"><u><b>Hide Item Iformation</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
                    <div class="formRow">
                        <div class="grid3"><label>Cost <?php echo $mvcore['money_name1']; ?> For 1 Day Info Hide:</label></div>
                        <div class="grid9"><input id="hide_iInfo_cost" name="hide_iInfo_cost" type="text" value="<?php echo $mvcore['hide_iInfo_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Item Hide Discount Percent:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="hide_disc_perc" name="hide_disc_perc" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="5" <?php if($mvcore['hide_disc_perc'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Percent Discount</option> 
								<option value="10" <?php if($mvcore['hide_disc_perc'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Percent Discount</option> 
								<option value="15" <?php if($mvcore['hide_disc_perc'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Percent Discount</option> 
								<option value="20" <?php if($mvcore['hide_disc_perc'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Percent Discount</option> 
								<option value="25" <?php if($mvcore['hide_disc_perc'] == '25') { echo 'selected'; } else { echo ''; }; ?>>25 Percent Discount</option> 
								<option value="30" <?php if($mvcore['hide_disc_perc'] == '30') { echo 'selected'; } else { echo ''; }; ?>>30 Percent Discount</option> 
								<option value="35" <?php if($mvcore['hide_disc_perc'] == '35') { echo 'selected'; } else { echo ''; }; ?>>35 Percent Discount</option> 
								<option value="40" <?php if($mvcore['hide_disc_perc'] == '40') { echo 'selected'; } else { echo ''; }; ?>>40 Percent Discount</option> 
								<option value="45" <?php if($mvcore['hide_disc_perc'] == '45') { echo 'selected'; } else { echo ''; }; ?>>45 Percent Discount</option> 
								<option value="50" <?php if($mvcore['hide_disc_perc'] == '50') { echo 'selected'; } else { echo ''; }; ?>>50 Percent Discount</option> 
								<option value="55" <?php if($mvcore['hide_disc_perc'] == '55') { echo 'selected'; } else { echo ''; }; ?>>55 Percent Discount</option> 
								<option value="60" <?php if($mvcore['hide_disc_perc'] == '60') { echo 'selected'; } else { echo ''; }; ?>>60 Percent Discount</option> 
								<option value="65" <?php if($mvcore['hide_disc_perc'] == '65') { echo 'selected'; } else { echo ''; }; ?>>65 Percent Discount</option> 
								<option value="70" <?php if($mvcore['hide_disc_perc'] == '70') { echo 'selected'; } else { echo ''; }; ?>>70 Percent Discount</option> 
								<option value="75" <?php if($mvcore['hide_disc_perc'] == '75') { echo 'selected'; } else { echo ''; }; ?>>75 Percent Discount</option> 
								<option value="80" <?php if($mvcore['hide_disc_perc'] == '80') { echo 'selected'; } else { echo ''; }; ?>>80 Percent Discount</option> 
								<option value="85" <?php if($mvcore['hide_disc_perc'] == '85') { echo 'selected'; } else { echo ''; }; ?>>85 Percent Discount</option> 
								<option value="90" <?php if($mvcore['hide_disc_perc'] == '90') { echo 'selected'; } else { echo ''; }; ?>>90 Percent Discount</option> 
								<option value="95" <?php if($mvcore['hide_disc_perc'] == '95') { echo 'selected'; } else { echo ''; }; ?>>95 Percent Discount</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Hide Info For Free Even If Module Disabled ( Privacy Fix ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="hide_iffe_imd" name="hide_iffe_imd" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="yes" <?php if($mvcore['hide_iffe_imd'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['hide_iffe_imd'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option>  
							</select>
						</div>             
					</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Castle_Siege_manage') { ?> <!-- Castle_Siege_manage -->
		<div class="widget fluid" id="castleregsett">
			<div class="whead"><h6>Castle Register Settings <?php if($mvcore['Castle_Siege_Register'] != 'on') { echo '( <font color="red"><u><b>Castle Siege Register</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font> )'; }; ?></h6></div>
                    <div class="formRow">
                        <div class="grid3"><label><?php echo $mvcore['money_name1']; ?> Cost For Castle Guild Register:</label></div>
                        <div class="grid9"><input id="regs_cost" name="regs_cost" type="text" value="<?php echo $mvcore['regs_cost']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {
	//page1
	$( "#FriendSystemsett" ).on('change', function() {
		var getAllValues = 
		
				$("#friend_sys_reward").val()+"-ids-"
				+$("#friend_sys_inv_rew").val()+"-ids-"
				+$("#friend_sys_limit").val()+"-ids-"
				+$("#friend_sys_level_tgw").val()+"-ids-"
				+$("#friend_sys_reset_tgw").val();
				
			$.post("acps.php", {
				FriendSystemsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//page2
	$( "#itemhidesett" ).on('change', function() {
		var getAllValues = 
		
				$("#hide_iInfo_cost").val()+"-ids-"
				+$("#hide_disc_perc option:selected").val()+"-ids-"
				+$("#hide_iffe_imd option:selected").val();
				
			$.post("acps.php", {
				itemhidesett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//page3
	$( "#castleregsett" ).on('change', function() {
		var getAllValues = 
		
				$("#regs_cost").val();
				
			$.post("acps.php", {
				castleregsett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	$( "#mysponsorsett" ).on('change', function() {
		var getAllValues = 
		
				$("#ms_day_limit").val();
				
			$.post("acps.php", {
				mysponsorsettasd: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>