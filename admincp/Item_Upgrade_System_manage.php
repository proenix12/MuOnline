
<?php if($_SESSION['admin_panel'] == 'ok') { ?>
	
		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Item_Upgrade_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Item_Upgrade_System_manage-id-Item_Upgrade_Settings.html" title=""><span style="height:30px;">Item Upgrade Settings</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Item_Upgrade_System'] != 'on') { echo '<font color="red"><u><b>Item Upgrade System</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'Item_Upgrade_Settings') { ?> <!-- Item_Upgrade_Settings -->
		<div class="widget fluid" id="pasadsfdsfsv">
			<div class="whead"><h6>Item Upgrade</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Seconds For 1 <?php echo $mvcore['money_name1'];?> ( Seconds * Upgrade Cost ):</label></div>
                        <div class="grid9"><input id="upsys_int" name="upsys_int" type="text" value="<?php echo $mvcore['upsys_int']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>ONE Level Upgrade Cost:</label></div>
                        <div class="grid9"><input id="upsys_cost_1level" name="upsys_cost_1level" type="text" value="<?php echo $mvcore['upsys_cost_1level']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Luck Upgrade Cost:</label></div>
                        <div class="grid9"><input id="upsys_cost_luck" name="upsys_cost_luck" type="text" value="<?php echo $mvcore['upsys_cost_luck']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Skill Upgrade Cost:</label></div>
                        <div class="grid9"><input id="upsys_cost_skill" name="upsys_cost_skill" type="text" value="<?php echo $mvcore['upsys_cost_skill']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Refinery Upgrade Cost:</label></div>
                        <div class="grid9"><input id="upsys_cost_ref" name="upsys_cost_ref" type="text" value="<?php echo $mvcore['upsys_cost_ref']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {
	//page1
	$( "#pasadsfdsfsv" ).on('change', function() {
		var getAllValues = 
		
				$("#upsys_int").val()+"-ids-"
				+$("#upsys_cost_1level").val()+"-ids-"
				+$("#upsys_cost_luck").val()+"-ids-"
				+$("#upsys_cost_skill").val()+"-ids-"
				+$("#upsys_cost_ref").val()
			
			;
			
			$.post("acps.php", {
				pasadsfdsfsv: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>