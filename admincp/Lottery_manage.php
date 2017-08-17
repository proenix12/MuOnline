
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Lottery_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Lottery_manage-id-Lottery_Settings.html" title=""><span style="height:30px;">Lottery Settings</span></a></li>
            <li <?php if($_GET['op3'] == 'Lottery_winner_list') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Lottery_manage-id-Lottery_winner_list.html" title=""><span style="height:30px;">Lottery Winner List</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Lottery_System'] != 'on') { echo '<font color="red"><u><b>Lottery System</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
			
		<?php if($_GET['op3'] == 'Lottery_Settings') { ?> <!-- Lottery_Settings -->
		<div class="widget fluid" id="lotsyssett">
			<div class="whead"><h6>Lottery Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Ticket Cost:</label></div>
                        <div class="grid9"><input id="lot_ticket_cost" name="lot_ticket_cost" type="text" value="<?php echo $mvcore['lot_ticket_cost']; ?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Ticket Cost Type:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="lot_cost_type" name="lot_cost_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="1" <?php if($mvcore['lot_cost_type'] == '1') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name1'];?></option>
								<option value="2" <?php if($mvcore['lot_cost_type'] == '2') { echo 'selected'; } else { echo ''; }; ?>><?php echo $mvcore['money_name2'];?></option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Lottery Start Money:</label></div>
                        <div class="grid9"><input id="lottery_start_money" name="lottery_start_money" type="text" value="<?php echo $mvcore['lottery_start_money']; ?>"></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Lottery_winner_list') { ?> <!-- Lottery_Settings -->
		<div class="widget">
            <div class="whead"><h6>Lottery Winner List</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Username</td>
						<td>Reward Amount</td>
						<td>Lucky Number</td>
						<td width="400px">Date</td>
                    </tr>
                </thead>
                <tbody>
					<?php
						$sys_starts = mssql_query("select top 50 username,credits,date,l_num,cost_type from MVCore_Lottert_WinL order by date desc");
						for($i=0;$i < mssql_num_rows($sys_starts);++$i) {
							$drop_info = mssql_fetch_row($sys_starts);
								$date_convert = gmdate("F j, Y h:m:s", $drop_info[2]);
								
								if($drop_info[4] == '1') {
									$cost_type_name = ''.$mvcore['money_name1'].'';
								} elseif($drop_info[4] == '2') {
									$cost_type_name = ''.$mvcore['money_name2'].'';
								};
								
							echo'
										<tr>
											<td>'.$drop_info[0].'</td>
											<td>'.$drop_info[1].' '.$cost_type_name.'</td>
											<td>'.$drop_info[3].'</td>
											<td>'.$date_convert.'</td>
										</tr>
							';
						};
					?>
                </tbody>
            </table>
        </div>
		<?php }; ?>
<script>
$(document).ready(function() {
	//page1
	$( "#lotsyssett" ).on('change', function() {
		var getAllValues = 
		
				$("#lot_ticket_cost").val()+"-ids-"
				+$("#lot_cost_type option:selected").val()+"-ids-"
				+$("#lot_date_settings option:selected").val()+"-ids-"
				+$("#lottery_start_money").val()
			
			;
			
			$.post("acps.php", {
				lotsyssett: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>