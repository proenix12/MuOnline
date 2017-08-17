
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'AncExchange_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Ancient_Exchange_manage-id-AncExchange_Settings.html" title=""><span style="height:30px;">Ancient Exchange Settings</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Exchange_System'] != 'on') { echo '<font color="red"><u><b>Exchange System</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'AncExchange_Settings') { ?> <!-- AncExchange_Settings -->
		<div id="ocexsetst">
		<div class="widget fluid" id="addstatsss">
			<div class="whead"><h6>Online Hours To <?php echo $mvcore['money_name1'];?> Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Ancient Exchange:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="anc_mob_onoff" name="anc_mob_onoff" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['anc_mob_onoff'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['anc_mob_onoff'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Ancient Option Main <?php echo $mvcore['money_name1'];?>:</label></div>
                        <div class="grid9"><input id="anc_item_cost" name="anc_item_cost" type="text" value="<?php echo $mvcore['anc_item_cost']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label><?php echo $mvcore['money_name1'];?> For Level:</label></div>
                        <div class="grid9"><input id="anc_level_cost" name="anc_level_cost" type="text" value="<?php echo $mvcore['anc_level_cost']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label><?php echo $mvcore['money_name1'];?> For Luck:</label></div>
                        <div class="grid9"><input id="anc_luck_cost" name="anc_luck_cost" type="text" value="<?php echo $mvcore['anc_luck_cost']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label><?php echo $mvcore['money_name1'];?> For Skill:</label></div>
                        <div class="grid9"><input id="anc_skill_cost" name="anc_skill_cost" type="text" value="<?php echo $mvcore['anc_skill_cost']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label><?php echo $mvcore['money_name1'];?> For Additional:</label></div>
                        <div class="grid9"><input id="anc_ad_cost" name="anc_ad_cost" type="text" value="<?php echo $mvcore['anc_ad_cost']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label><?php echo $mvcore['money_name1'];?> For Excellent:</label></div>
                        <div class="grid9"><input id="anc_exc_cost" name="anc_exc_cost" type="text" value="<?php echo $mvcore['anc_exc_cost']; ?>"></div>
                    </div>
		</div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {
	//page1
	$( "#ocexsetst" ).on('change', function() {
		var getAllValues = 
		
				$("#anc_mob_onoff option:selected").val()+"-ids-"
				+$("#anc_item_cost").val()+"-ids-"
				+$("#anc_level_cost").val()+"-ids-"
				+$("#anc_luck_cost").val()+"-ids-"
				+$("#anc_skill_cost").val()+"-ids-"
				+$("#anc_ad_cost").val()+"-ids-"
				+$("#anc_exc_cost").val()
			
			;
			
			$.post("acps.php", {
				asdwgerwerher: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>