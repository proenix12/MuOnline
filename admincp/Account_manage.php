
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Find_By_Username') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Account_manage-id-Find_By_Username.html" title=""><span style="height:30px;">Search Account</span></a></li>
			<li <?php if($_GET['op3'] == 'Top_Credited_accs') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Account_manage-id-Top_Credited_accs.html" title=""><span style="height:30px;">Top Money Accounts</span></a></li>
			<li <?php if($_GET['op3'] == 'Add_Remove_Money') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Account_manage-id-Add_Remove_Money.html" title=""><span style="height:30px;">Add / Remove Money</span></a></li>
			<li <?php if($_GET['op3'] == 'track_user_money') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Account_manage-id-track_user_money.html" title=""><span style="height:30px;">User Incoming Money</span></a></li>
			<li <?php if($_GET['op3'] == 'Get_warehouse') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Account_manage-id-Get_warehouse.html" title=""><span style="height:30px;">Get Warehouse</span></a></li>
			<li <?php if($_GET['op3'] == 'Track_Items') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Account_manage-id-Track_Items.html" title=""><span style="height:30px;">Track Items</span></a></li>
			<li <?php if($_GET['op3'] == 'Get_User_IP') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Account_manage-id-Get_User_IP.html" title=""><span style="height:30px;">Search IP Or User</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
		
		<?php if($_GET['op3'] == 'track_user_money') { ?> <!-- track_user_money --> 
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="saqweqwhangerwechar(); return false;" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;font-size:12px;width:100%;float:left;color:#ffffff;">Click To Reset ( Clean ) All User Money Table Data</a>
		</div>
		<div class="widget">
            <div class="whead"><h6>List Where User Got Money ( <font color="red">List Selected Will be 1 Month Old</font>)</h6></div>
            <div class="tablePars">
					<div id="DataTables_Table_1_filter" class="dataTables_filter">
						<label>Search ( Character OR Account Name ): <input id="userchaergrnamesweach" type="text"></label>
					</div>
			</div>
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
						<td>Username</td>
						<td><?php echo $mvcore['money_name1'];?></td>
						<td><?php echo $mvcore['money_name2'];?></td>
						<td>Description From Where</td>
						<td>Date</td>
					</tr>
                </thead>
                <tbody id="sadsfaqwdsawggegw">
                </tbody>
            </table>
        </div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Get_User_IP') { ?> <!-- Get_User_IP -->
		<div class="widget fluid" id="aodsargsdwbrbrbew">
			<div class="whead"><h6>Get User IP By Char Or User Name.</h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter Character OR Account Name:</b></label></div>
                        <div class="grid9"><input id="acccharname" name="acccharname" type="text"></div>
                    </div>
					<div class="formRow">
                        <div class="grid12"><label>Account IP: <label id="dropeduip">-</label></label></div>
                    </div>
		</div>
		<div class="widget fluid" id="aodsargsdsdwbrbrbdsew">
			<div class="whead"><h6>Get Username By IP.</h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter IP:</b></label></div>
                        <div class="grid9"><input id="acccharnames" name="acccharnames" type="text"></div>
                    </div>
					<div class="formRow">
                        <div class="grid12">Account's: <textarea readonly="readonly" id="dropedusername"></textarea></div>
                    </div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Top_Credited_accs') { ?> <!-- Top_Credited_accs -->
		<div class="fluid">
			<div class="widget grid4">
				<div class="whead"><h6>Top Money <?php echo $mvcore['money_name2'];?></h6></div>
				<table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
					<thead>
						<tr>
							<td>Account</td>
							<td><?php echo $mvcore['money_name2'];?></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$select_cred_checker = mssql_query("Select top 100 ".$mvcore['user_column'].",".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." order by ".$mvcore['credits2_column']." desc");
							for($i=0;$i < mssql_num_rows($select_cred_checker);++$i) {
								$Money_credits= mssql_fetch_row($select_cred_checker);
								
								// -== Account Credits ==- //
									if($Money_credits[1] == ''){ $Money_creditss = '0'; } else { $Money_creditss = $Money_credits[1]; };
									
									if($Money_credits[2] == ''){ $Money_goldcredits = '0'; } else { $Money_goldcredits = $Money_credits[2]; };
									
								echo'
											<tr>
												<td>'.$Money_credits[0].'</td>
												<td>'.$Money_goldcredits.'</td>
											</tr>
								';
							};
						?>
					</tbody>
				</table>
			</div>
			<div class="widget grid4">
				<div class="whead"><h6>Top Money <?php echo $mvcore['money_name1'];?></h6></div>
				<table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
					<thead>
						<tr>
							<td>Account</td>
							<td><?php echo $mvcore['money_name1'];?></td>
						</tr>
					</thead>
					<tbody>
						<?php
							$select_cred_checker = mssql_query("Select top 100 ".$mvcore['user_column'].",".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." order by ".$mvcore['credits_column']." desc");
							for($i=0;$i < mssql_num_rows($select_cred_checker);++$i) {
								$Money_credits= mssql_fetch_row($select_cred_checker);
								
								// -== Account Credits ==- //
									if($Money_credits[1] == ''){ $Money_creditss = '0'; } else { $Money_creditss = $Money_credits[1]; };
									
									if($Money_credits[2] == ''){ $Money_goldcredits = '0'; } else { $Money_goldcredits = $Money_credits[2]; };
									
								echo'
											<tr>
												<td>'.$Money_credits[0].'</td>
												<td>'.$Money_creditss.'</td>
											</tr>
								';
							};
						?>
					</tbody>
				</table>
			</div>
			<div class="widget grid4">
				<div class="whead"><h6>Top wCoins</h6></div>
				<table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
					<thead>
						<tr>
							<td>Name</td>
							<td>wCoins</td>
						</tr>
					</thead>
					<tbody>
						<?php
								$v_f_hfwew= mssql_query("Select top 100 ".$mvcore['wcoins_column'].",".$mvcore['guid_column']." from ".$mvcore['wcoins_table']." order by ".$mvcore['wcoins_column']." desc");
							for($i=0;$i < mssql_num_rows($v_f_hfwew);++$i) {
								$Money_wcoins= mssql_fetch_row($v_f_hfwew);
								
									if($Money_wcoins[0] == ''){ $Money_wcoinsd = '0'; } else { $Money_wcoinsd = $Money_wcoins[0]; };
								
								echo'
											<tr>
												<td>'.$Money_wcoins[1].'</td>
												<td>'.$Money_wcoinsd.'</td>
											</tr>
								';
							};
						?>
					</tbody>
				</table>
			</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Find_By_Username') { ?> <!-- Find_By_Username -->
		<div class="widget fluid" id="onChsubaccfis">
			<div class="whead"><h6>Account Manage</h6><h6 style="float:right;color:#DF0101;">Make sure user is offline !!</h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter Character OR Account Name:</b></label></div>
                        <div class="grid9"><input id="accnames" name="accnames" type="text" value="<?php echo $_POST['from_dash_page'];?>"></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>VIP Status:</label></div>
						<div class="grid9">
							<select style="width:100%;padding-left:5px;opacity:0.6;" id="accvipsys" name="accvipsys" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="xc" id="accvipsysdiv"></option>
								<option value='0' style="padding-left:5px;">No</option>
								<option value='25' style="padding-left:5px;">25 Day VIP</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Account Block:</label></div>
						<div class="grid9">
							<select style="width:100%;padding-left:5px;opacity:0.6;" id="accblocs" name="accblocs" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value='0' style="padding-left:5px;">No</option>
								<option value='1' style="padding-left:5px;">Yes</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Account Access:</label></div>
						<div class="grid9">
							<select style="width:100%;padding-left:5px;opacity:0.6;" id="accacc" name="accacc" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value='0' style="padding-left:5px;">Normal User</option>
								<option value='2' style="padding-left:5px;">Game Master</option>
								<option value='1' style="padding-left:5px;">Administrator</option>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Username:</label></div>
                        <div class="grid9"><input id="userna" readonly="readonly" name="userna" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Password:</label></div>
                        <div class="grid9"><input id="pass" name="pass" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Email Address:</label></div>
                        <div class="grid9"><input id="emailaa" name="emailaa" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Secret question answer:</label></div>
                        <div class="grid9"><input id="sqa" name="sqa" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Information Text For User ( For Blocked Accounts! ):</label></div>
                        <div class="grid9">
							<textarea rows="8" cols="" id="acc_info_msg" name="acc_info_msg"></textarea>
						</div>
                    </div>
		</div>
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="savechangesaccchar(); return false;" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;margin-top:20px;margin-bottom:20px;font-size:12px;width:100%;float:left;color:#ffffff;">Save Account Settings</a>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Add_Remove_Money') { ?> <!-- Add_Remove_Money -->
		<div class="widget fluid" id="onChsubaccfisasad">
			<div class="whead"><h6>Account Money Manage</h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter Character OR Account Name:</b></label></div>
                        <div class="grid9"><input id="accnamesa" name="accnamesa" type="text"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label><?php echo $mvcore['money_name1'];?>:</label></div>
                        <div class="grid9"><input id="cred" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label><?php echo $mvcore['money_name2'];?>:</label></div>
                        <div class="grid9"><input id="gcred" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow" id="HidWCoin">
                        <div class="grid3"><label>wCoins:</label></div>
                        <div class="grid9"><input id="wCoins" name="title" type="text" value=""></div>
                    </div>
		</div>
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="savechangsaesaccschar(); return false;" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;margin-top:20px;margin-bottom:20px;font-size:12px;width:100%;float:left;color:#ffffff;">Save Account Money</a>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Get_warehouse') { ?> <!-- Get_warehouse -->
		<div class="widget fluid" id="onaccsubCharfacas">
			<div class="whead"><h6>Search Account Warehouse</h6><h6 id="echtabitemhsaadsa" style="float:right;"></h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter Character OR Account Name:</b></label></div>
                        <div class="grid7"><input id="saccname" name="saccname" type="text"></div>
						<div class="grid2"><a href="#" id="get_vault_clean" class="buttonM bGreen" style="float:right;color:#ffffff;">Clean User Vault ?</a></div>
                    </div>
		</div>
		<?php if($_GET['op4'] != '' && $_GET['op5'] != '') { ?> <!-- Get_Inventory Item_Edit -->
		<?php
		
			$CharName = $_GET['op4']; // Char Name
			$itemHex = $_GET['op5']; // Hex

			$item			= $itemHex;			// item Type
			$sy 			= hexdec(substr($item,0,2)); 		// Item ID
			$serial 		= hexdec(substr($item,6,8)); 		// Item Serial
			$serialEdit 	= substr($item,6,8); 		// Item Serial
			$serialdec 		= substr($item,6,8); 				// Item Serial2
			$itt 			= hexdec(substr($item,18,2)); 		// Item Type
			$itemtype 		= floor($itt/16);						// Item Type Fix
			$iop 			= hexdec(substr($item,2,2)); 		// Item Level/Skill/Option Data
			$itemdur		= hexdec(substr($item,4,2)); 		// Item Durability
			$ioo 			= hexdec(substr($item,14,2)); 		// Item Excellent Info/ Option
			$ioosecon 		= hexdec(substr($item,14,1)); 		// AD option 1 2 3 4 5 6 7
			$ac 			= hexdec(substr($item,16,2)); 		// Ancient data
			
			$item_socket[1] = hexdec(substr($item,22,2)); 		// Socket 1
			$item_socket[2] = hexdec(substr($item,24,2)); 		// Socket 2
			$item_socket[3] = hexdec(substr($item,26,2)); 		// Socket 3
			$item_socket[4] = hexdec(substr($item,28,2));		// Socket 4
			$item_socket[5] = hexdec(substr($item,30,2)); 		// Socket 5
			
			$item_harmony 	= hexdec(substr($item,20,1)); 		// Item harmony
			$item_harm_val 	= hexdec(substr($item,21,1)); 		// Item harmony Value
			$item_refinary 	= hexdec(substr($item,19,1)); 		// Item Refinery
			
		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($item, 0,2))/32; // Category
			$ioo = hexdec(substr($item, 14,2)); // Excelent
			$ids = hexdec(substr($item, 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};
		
			include"system/engine_s_fnc.php";

			$check_itema = mssql_query("Select item_name, item_cost, zen_cost, can_buy_w_money2, can_buy_w_money1, can_buy_w_zen, is_harmony, bought_count, clases, max_excellent, has_refinery, is_ancient, has_skill, is_socket, has_luck, category, id from MVCore_Wshopp  where id='".$sy."' and category='".$itemtype."'");
			$check_item_ok = mssql_fetch_row($check_itema);

		?>
		<script>
		$(document).ready(function() {
		var getAllValues = '<?php echo $CharName;?>';
		$('#saccname').val(getAllValues);
			$.post("acps.php", {
				onaccsubCharfacas: getAllValues
			},
			function(data) {
				$('#echotabledHere').html(data);
			});
		});
		</script>
		<div class="widget fluid" id="asdasdsawqwwqfw">
			<div class="whead" id="out_item_name"><h6 style="float:right;color:#DF0101;">Make sure user is offline !!</h6><h6>Item Edit: <?php echo $inamesa; ?></h6><h6 style="float:right;" >Account:<?php echo $CharName; ?> / Old Hex:<?php echo $itemHex; ?> / Serial:<?php echo $serialdec; ?></h6></div>
					<input id="charname" name="charname" type="hidden" value="<?php echo $CharName; ?>"> <!-- Char Name -->
					<input id="itemhex" name="itemhex" type="hidden" value="<?php echo $itemHex; ?>"> <!-- Hex -->
					<div class="formRow">
                        <div class="grid3"><label>Serial Number ( Only Hex & Min/Max 8 Lenght ):</label></div>
                        <div class="grid9"><input id="out_item_serial" name="out_item_serial" type="text" value="<?php echo $serialEdit;?>"></div>
                    </div>
					<?php if($check_item_ok[16] >= '1') { ?>
					<div class="formRow">
						<div class="grid3"><label>Item Level:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_level" name="out_item_level" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="0" style="padding-left:5px;" <?php if($acp_itemlevel == '1') { echo 'selected'; } else { echo ''; }; ?>>No Level</option>
									<option value="1" style="padding-left:5px;" <?php if($acp_itemlevel == '1') { echo 'selected'; } else { echo ''; }; ?>>Level + 1</option>
									<option value="2" style="padding-left:5px;" <?php if($acp_itemlevel == '2') { echo 'selected'; } else { echo ''; }; ?>>Level + 2</option>
									<option value="3" style="padding-left:5px;" <?php if($acp_itemlevel == '3') { echo 'selected'; } else { echo ''; }; ?>>Level + 3</option>
									<option value="4" style="padding-left:5px;" <?php if($acp_itemlevel == '4') { echo 'selected'; } else { echo ''; }; ?>>Level + 4</option>
									<option value="5" style="padding-left:5px;" <?php if($acp_itemlevel == '5') { echo 'selected'; } else { echo ''; }; ?>>Level + 5</option>
									<option value="6" style="padding-left:5px;" <?php if($acp_itemlevel == '6') { echo 'selected'; } else { echo ''; }; ?>>Level + 6</option>
									<option value="7" style="padding-left:5px;" <?php if($acp_itemlevel == '7') { echo 'selected'; } else { echo ''; }; ?>>Level + 7</option>
									<option value="8" style="padding-left:5px;" <?php if($acp_itemlevel == '8') { echo 'selected'; } else { echo ''; }; ?>>Level + 8</option>
									<option value="9" style="padding-left:5px;" <?php if($acp_itemlevel == '9') { echo 'selected'; } else { echo ''; }; ?>>Level + 9</option>
									<option value="10" style="padding-left:5px;" <?php if($acp_itemlevel == '10') { echo 'selected'; } else { echo ''; }; ?>>Level + 10</option>
									<option value="11" style="padding-left:5px;" <?php if($acp_itemlevel == '11') { echo 'selected'; } else { echo ''; }; ?>>Level + 11</option>
									<option value="12" style="padding-left:5px;" <?php if($acp_itemlevel == '12') { echo 'selected'; } else { echo ''; }; ?>>Level + 12</option>
									<option value="13" style="padding-left:5px;" <?php if($acp_itemlevel == '13') { echo 'selected'; } else { echo ''; }; ?>>Level + 13</option>
									<option value="14" style="padding-left:5px;" <?php if($acp_itemlevel == '14') { echo 'selected'; } else { echo ''; }; ?>>Level + 14</option>
									<option value="15" style="padding-left:5px;" <?php if($acp_itemlevel == '15') { echo 'selected'; } else { echo ''; }; ?>>Level + 15</option>
								</select>
							</div>                       
					</div>
					<?php } ?>
				<?php if($check_item_ok[14] >= '1') { ?>	
					<?php if($check_item_ok[15] >= 0 && $check_item_ok[15] <= 4) { // Swords, Axe, Spears, Mace, Scepters, Bows, Crossbows ?>
					<div class="formRow">
						<div class="grid3"><label>AD Option:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_ad" name="out_item_ad" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="0" style="padding-left:5px;" <?php if($acp_iop_ad == '0') { echo 'selected'; } else { echo ''; }; ?>>Additional Damage + 0</option>
									<option value="1" style="padding-left:5px;" <?php if($acp_iop_ad == '1') { echo 'selected'; } else { echo ''; }; ?>>Additional Damage + 4</option>
									<option value="2" style="padding-left:5px;" <?php if($acp_iop_ad == '2') { echo 'selected'; } else { echo ''; }; ?>>Additional Damage + 8</option>
									<option value="3" style="padding-left:5px;" <?php if($acp_iop_ad == '3') { echo 'selected'; } else { echo ''; }; ?>>Additional Damage + 12</option>
									<option value="4" style="padding-left:5px;" <?php if($acp_iop_ad == '4') { echo 'selected'; } else { echo ''; }; ?>>Additional Damage + 16</option>
									<option value="5" style="padding-left:5px;" <?php if($acp_iop_ad == '5') { echo 'selected'; } else { echo ''; }; ?>>Additional Damage + 20</option>
									<option value="6" style="padding-left:5px;" <?php if($acp_iop_ad == '6') { echo 'selected'; } else { echo ''; }; ?>>Additional Damage + 24</option>
									<option value="7" style="padding-left:5px;" <?php if($acp_iop_ad == '7') { echo 'selected'; } else { echo ''; }; ?>>Additional Damage + 28</option>
								</select>
							</div>                       
					</div>
					<?php } elseif($check_item_ok[15] == 13 && $check_item_ok[16] == 30 || $check_item_ok[15] == 5 || $check_item_ok[15] >= 6 && $check_item_ok[15] <= 11 || $check_item_ok[15] == 12 && $check_item_ok[16] >= 0 && $check_item_ok[16] <= 6) { // Stafs, Shield, Set Items, Wings Level 1 , Wings level 2 ?>
					<div class="formRow">
						<div class="grid3"><label>AD Option:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_ad" name="out_item_ad" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="0" style="padding-left:5px;" <?php if($acp_iop_ad == '0') { echo 'selected'; } else { echo ''; }; ?>>Additional Defense + 0</option>
									<option value="1" style="padding-left:5px;" <?php if($acp_iop_ad == '1') { echo 'selected'; } else { echo ''; }; ?>>Additional Defense + 4</option>
									<option value="2" style="padding-left:5px;" <?php if($acp_iop_ad == '2') { echo 'selected'; } else { echo ''; }; ?>>Additional Defense + 8</option>
									<option value="3" style="padding-left:5px;" <?php if($acp_iop_ad == '3') { echo 'selected'; } else { echo ''; }; ?>>Additional Defense + 12</option>
									<option value="4" style="padding-left:5px;" <?php if($acp_iop_ad == '4') { echo 'selected'; } else { echo ''; }; ?>>Additional Defense + 16</option>
									<option value="5" style="padding-left:5px;" <?php if($acp_iop_ad == '5') { echo 'selected'; } else { echo ''; }; ?>>Additional Defense + 20</option>
									<option value="6" style="padding-left:5px;" <?php if($acp_iop_ad == '6') { echo 'selected'; } else { echo ''; }; ?>>Additional Defense + 24</option>
									<option value="7" style="padding-left:5px;" <?php if($acp_iop_ad == '7') { echo 'selected'; } else { echo ''; }; ?>>Additional Defense + 28</option>
								</select>
							</div>                       
					</div>
					<?php } elseif($check_item_ok[15] == 12 && $check_item_ok[16] >= 36 && $check_item_ok[16] <= 43 || $check_item_ok[15] == 12 && $check_item_ok[16] >= 49 && $check_item_ok[16] <= 50 || $check_item_ok[15] == 12 && $check_item_ok[16] >= 262 && $check_item_ok[16] <= 267 || $check_item_ok[15] == 13 && $check_item_ok[16] >= 8 && $check_item_ok[16] <= 9 || $check_item_ok[15] == 13 && $check_item_ok[16] >= 12 && $check_item_ok[16] <= 13 || $check_item_ok[15] == 13 && $check_item_ok[16] >= 21 && $check_item_ok[16] <= 28) { // Rings, Pendant, Wings level 3 ?>
					<div class="formRow">
						<div class="grid3"><label>AD Option:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_ad" name="out_item_ad" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="0" style="padding-left:5px;" <?php if($acp_iop_ad == '0') { echo 'selected'; } else { echo ''; }; ?>>Automatic HP Recovery + 0%</option>
									<option value="1" style="padding-left:5px;" <?php if($acp_iop_ad == '1') { echo 'selected'; } else { echo ''; }; ?>>Automatic HP Recovery + 1%</option>
									<option value="2" style="padding-left:5px;" <?php if($acp_iop_ad == '2') { echo 'selected'; } else { echo ''; }; ?>>Automatic HP Recovery + 2%</option>
									<option value="3" style="padding-left:5px;" <?php if($acp_iop_ad == '3') { echo 'selected'; } else { echo ''; }; ?>>Automatic HP Recovery + 3%</option>
									<option value="4" style="padding-left:5px;" <?php if($acp_iop_ad == '4') { echo 'selected'; } else { echo ''; }; ?>>Automatic HP Recovery + 4%</option>
									<option value="5" style="padding-left:5px;" <?php if($acp_iop_ad == '5') { echo 'selected'; } else { echo ''; }; ?>>Automatic HP Recovery + 5%</option>
									<option value="6" style="padding-left:5px;" <?php if($acp_iop_ad == '6') { echo 'selected'; } else { echo ''; }; ?>>Automatic HP Recovery + 6%</option>
									<option value="7" style="padding-left:5px;" <?php if($acp_iop_ad == '7') { echo 'selected'; } else { echo ''; }; ?>>Automatic HP Recovery + 7%</option>
								</select>
							</div>                       
					</div>		
					<?php } elseif($check_item_ok[15] == 13 && $check_item_ok[16] == 24) { // Rings of Magic ?>
					<div class="formRow">
						<div class="grid3"><label>AD Option:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_ad" name="out_item_ad" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="0" style="padding-left:5px;" <?php if($acp_iop_ad == '0') { echo 'selected'; } else { echo ''; }; ?>>Max Mana Increase + 0%</option>
									<option value="1" style="padding-left:5px;" <?php if($acp_iop_ad == '1') { echo 'selected'; } else { echo ''; }; ?>>Max Mana Increase + 1%</option>
									<option value="2" style="padding-left:5px;" <?php if($acp_iop_ad == '2') { echo 'selected'; } else { echo ''; }; ?>>Max Mana Increase + 2%</option>
									<option value="3" style="padding-left:5px;" <?php if($acp_iop_ad == '3') { echo 'selected'; } else { echo ''; }; ?>>Max Mana Increase + 3%</option>
									<option value="4" style="padding-left:5px;" <?php if($acp_iop_ad == '4') { echo 'selected'; } else { echo ''; }; ?>>Max Mana Increase + 4%</option>
									<option value="5" style="padding-left:5px;" <?php if($acp_iop_ad == '5') { echo 'selected'; } else { echo ''; }; ?>>Max Mana Increase + 5%</option>
									<option value="6" style="padding-left:5px;" <?php if($acp_iop_ad == '6') { echo 'selected'; } else { echo ''; }; ?>>Max Mana Increase + 6%</option>
									<option value="7" style="padding-left:5px;" <?php if($acp_iop_ad == '7') { echo 'selected'; } else { echo ''; }; ?>>Max Mana Increase + 7%</option>
								</select>
							</div>                       
					</div>
					<?php } ?>
				<?php } ?>
					<?php if($check_item_ok[14] >= '1') { ?>
					<div class="formRow">
						<div class="grid3"><label>Luck:</label></div>
						<div class="grid9 on_off">
							<div class="floatL mr10">
								<div style="width: 49px;" class="ibutton-container">
									<span class="checked"><input <?php if($acp_luck == '1') { echo 'checked="checked"'; } else { echo ''; }; ?> style="opacity: 0;" id="out_item_luck" name="out_item_luck" type="checkbox"></span>
									<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
									<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
									<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($check_item_ok[12] >= '1') { ?>
					<div class="formRow">
						<div class="grid3"><label>Skill:</label></div>
						<div class="grid9 on_off">
							<div class="floatL mr10">
								<div style="width: 49px;" class="ibutton-container">
									<span class="checked"><input <?php if($acp_luck == '1') { echo 'checked="checked"'; } else { echo ''; }; ?> style="opacity: 0;" id="out_item_skill" name="out_item_skill" type="checkbox"></span>
									<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
									<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
									<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($check_item_ok[10] >= '1') { ?>
					<div class="formRow">
						<div class="grid3"><label>Refinary:</label></div>
						<div class="grid9 on_off">
							<div class="floatL mr10">
								<div style="width: 49px;" class="ibutton-container">
									<span class="checked"><input <?php if($acp_luck == '1') { echo 'checked="checked"'; } else { echo ''; }; ?> style="opacity: 0;" id="out_item_refin" name="out_item_refin" type="checkbox"></span>
									<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
									<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
									<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php $sanci= mssql_query("Select anc_name from MVCore_Wshopp_Ancient where item_id='".$sy."' and item_cat='".$itemtype."'");$sanci= mssql_fetch_row($sanci); if($sanci[0] != '') { ?>
					<div class="formRow">
						<div class="grid3"><label>Ancient Type:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_anc" name="out_item_anc" data-placeholder="Choose a option..." class="select" tabindex="2">
									<?php
										$select_anc_info= mssql_query("Select anc_name,anc_name2,item_id,item_cat from MVCore_Wshopp_Ancient where item_id='".$sy."' and item_cat='".$itemtype."'");
										$s_anc_i= mssql_fetch_row($select_anc_info);
	
										$select_anc_info1= mssql_query("Select anc_name,options from MVCore_Wshopp_Ancient_Opt where anc_id='".$s_anc_i[0]."'");
										$s_anc_opt1= mssql_fetch_row($select_anc_info1);
																	
										$select_anc_info2= mssql_query("Select anc_name,options from MVCore_Wshopp_Ancient_Opt where anc_id='".$s_anc_i[1]."'");
										$s_anc_opt2= mssql_fetch_row($select_anc_info2);
																	
										if($acp_anc_name == ''){ $seledcnul1 = 'selected'; } else { $seledcnul1 = ''; };
										if($acp_anc_name == $s_anc_i[0]){ $seledc1 = 'selected'; } else { $seledc1 = ''; };
										if($acp_anc_name == $s_anc_i[1]){ $seledc2 = 'selected'; } else { $seledc2 = ''; };
										echo'<option value="0" style="padding-left:5px;" '.$seledcnul1.'>No Ancient</option>';
																	
										if($s_anc_opt1[0] != '' && $s_anc_opt1[0] != ' ') { echo'<option value="5" style="padding-left:5px;" '.$seledc1.'>Set '.$s_anc_opt1[0].'</option>'; };
										if($s_anc_opt2[0] != '' && $s_anc_opt2[0] != ' ') { echo'<option value="10" style="padding-left:5px;" '.$seledc2.'>Set '.$s_anc_opt2[0].'</option>'; };
									?>
								</select>
							</div>                       
					</div>
					<?php } ?>
					<?php if($check_item_ok[6] >= '1') { ?>
					<div class="formRow">
						<div class="grid3"><label>Harmony:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_haro" name="out_item_haro" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="0" style="padding-left:5px;">No Harmony</option>
									<?php
									if($check_item_ok[15] >= 0 && $check_item_ok[15] <= 4) { // Swords
										$select_joh_info= mssql_query("Select top 99 joh_name,joh_id,joh_val,joh_type from MVCore_Wshopp_Harmony where joh_type='1'");
										for($i=0;$i < mssql_num_rows($select_joh_info);++$i) {
											$s_joh_i= mssql_fetch_row($select_joh_info);
											if($acp_harselected == $s_joh_i[0]){ $seledc = 'selected'; } else { $seledc = ''; };
											echo'<option value="'.$s_joh_i[1].','.$s_joh_i[2].','.$s_joh_i[3].'" style="padding-left:5px;" '.$seledc.'>'.$s_joh_i[0].'</option>';
										};
									} elseif($check_item_ok[15] == 5) { // Staffs
										$select_joh_info= mssql_query("Select top 99 joh_name,joh_id,joh_val,joh_type from MVCore_Wshopp_Harmony where joh_type='2'");
										for($i=0;$i < mssql_num_rows($select_joh_info);++$i) {
											$s_joh_i= mssql_fetch_row($select_joh_info);
											if($acp_harselected == $s_joh_i[0]){ $seledc = 'selected'; } else { $seledc = ''; };
											echo'<option value="'.$s_joh_i[1].','.$s_joh_i[2].','.$s_joh_i[3].'" style="padding-left:5px;" '.$seledc.'>'.$s_joh_i[0].'</option>';
										};
									} elseif($check_item_ok[15] >= 6 && $check_item_ok[15] <= 11) { // Sets & Shields
										$select_joh_info= mssql_query("Select top 99 joh_name,joh_id,joh_val,joh_type from MVCore_Wshopp_Harmony where joh_type='3'");
										for($i=0;$i < mssql_num_rows($select_joh_info);++$i) {
											$s_joh_i= mssql_fetch_row($select_joh_info);
											if($acp_harselected == $s_joh_i[0]){ $seledc = 'selected'; } else { $seledc = ''; };
											echo'<option value="'.$s_joh_i[1].','.$s_joh_i[2].','.$s_joh_i[3].'" style="padding-left:5px;" '.$seledc.'>'.$s_joh_i[0].'</option>';
										};
									}
									?>
								</select>
							</div>                       
					</div>
					<?php } ?>
					<?php 
						if($check_item_ok[15] >= 0 && $check_item_ok[15] <= 5 || $check_item_ok[15] == 13 && $check_item_ok[16] >= 12 && $check_item_ok[16] <= 13 || $check_item_ok[15] == 13 && $check_item_ok[16] >= 25 && $check_item_ok[16] <= 28) { // Weapons, Pendants
									if($mvcore['max_exc_opt'] >= '1') { if($acp_exc_opt1 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increases Mana After monster +Mana/8:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '2') { if($acp_exc_opt2 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increases Life After monster +Life/8:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '3') { if($acp_exc_opt3 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase attacking(wizardly)speed+7:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '4') { if($acp_exc_opt4 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase Damage +2%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '5') { if($acp_exc_opt5 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase Damage +level/20:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe5" name="exe5" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '6') { if($acp_exc_opt6 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Excellent Damage Rate +10%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe6" name="exe6" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
						} elseif($check_item_ok[15] >= 6 && $check_item_ok[15] <= 11) { // Sets & Shields
									if($mvcore['max_exc_opt'] >= '1') { if($acp_exc_opt1 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase MaxHP +4%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe6" name="exe6" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '2') { if($acp_exc_opt2 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase MaxMana +4%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe5" name="exe5" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '3') { if($acp_exc_opt3 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Damage decrease +4%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '4') { if($acp_exc_opt4 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Reflect damage +5%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '5') { if($acp_exc_opt5 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Defense success rate +10%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '6') { if($acp_exc_opt6 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase Zen After Hunt +40%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
						} elseif($check_item_ok[15] == 13 && $check_item_ok[16] == 30 || $check_item_ok[15] == 12 && $check_item_ok[16] >= 0 && $check_item_ok[16] <= 6 || $check_item_ok[15] == 12 && $check_item_ok[16] == 49) { // Wings level 1 & 2
									if($mvcore['max_exc_opt'] >= '1') { if($acp_exc_opt1 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>HP +115 Increase:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '2') { if($acp_exc_opt2 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>MP +115 Increase:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '3') { if($acp_exc_opt3 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Ignore enemys defensive power by 3%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '4') { if($acp_exc_opt4 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Max AG +50 Increase:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '5') { if($acp_exc_opt5 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase attacking(wizardly)speed+5:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe5" name="exe5" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
						} elseif($check_item_ok[15] == 12 && $check_item_ok[16] >= 36 && $check_item_ok[16] <= 43 || $check_item_ok[15] == 12 && $check_item_ok[16] == 49 || $check_item_ok[15] == 12 && $check_item_ok[16] >= 49 && $check_item_ok[16] <= 50 || $check_item_ok[15] == 12 && $check_item_ok[16] >= 262 && $check_item_ok[16] <= 267) { // Wings level 3
									if($mvcore['max_exc_opt'] >= '1') { if($acp_exc_opt1 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Ingore opponents defensive power by 5%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '2') { if($acp_exc_opt2 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Returns the enemys attack power in 5%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '3') { if($acp_exc_opt3 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Complete recovery of life in 5% rate:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '4') { if($acp_exc_opt4 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Complete recover of Mana in 5% rate:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
						} elseif($check_item_ok[15] == 13 && $check_item_ok[16] >= 8 && $check_item_ok[16] <= 9 || $check_item_ok[15] == 13 && $check_item_ok[16] >= 21 && $check_item_ok[16] <= 24) { // Rings
									if($mvcore['max_exc_opt'] >= '1') { if($acp_exc_opt1 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase MaxHP +4%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe6" name="exe6" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '2') { if($acp_exc_opt2 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase MaxMana +4%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe5" name="exe5" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '3') { if($acp_exc_opt3 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Damage decrease +4%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '4') { if($acp_exc_opt4 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Reflect damage +5%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '5') { if($acp_exc_opt5 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Defense success rate +10%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
									if($mvcore['max_exc_opt'] >= '6') { if($acp_exc_opt6 == '1'){ $seledc = 'checked="checked"'; } else { $seledc = ''; }; echo'
										<div class="formRow">
											<div class="grid3"><label>Increase Zen After Hunt +40%:</label></div>
											<div class="grid9 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input '.$seledc.' style="opacity: 0;" id="exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
									';};
						};
					?>
				<?php if($check_item_ok[13] >= '1') { ?>
					<div class="formRow">
						<div class="grid3"><label>Socket Opt1:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_sk1" name="out_item_sk1" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
									<?php
										$select_sk_info= mssql_query("Select top 200 sok_name, sok_id from MVCore_Wshopp_Socket ".$drop_sockets."");
										for($i=0;$i < mssql_num_rows($select_sk_info);++$i) {
											$s_sk_i= mssql_fetch_row($select_sk_info);
											if($acp_socket1 == $s_sk_i[0]){ $seledc = 'selected'; } else { $seledc = ''; };
												if($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] <= '36' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												} elseif($mvcore['sockets_opt_ep'] != 'yes') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												};
										};
									?>
								</select>
							</div>                       
					</div>
					<div class="formRow">
						<div class="grid3"><label>Socket Opt2:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_sk2" name="out_item_sk2" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
									<?php
										$select_sk_info= mssql_query("Select top 200 sok_name, sok_id from MVCore_Wshopp_Socket ".$drop_sockets."");
										for($i=0;$i < mssql_num_rows($select_sk_info);++$i) {
											$s_sk_i= mssql_fetch_row($select_sk_info);
											if($acp_socket2 == $s_sk_i[0]){ $seledc = 'selected'; } else { $seledc = ''; };
												if($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] <= '36' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												} elseif($mvcore['sockets_opt_ep'] != 'yes') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												};
										};
									?>
								</select>
							</div>                       
					</div>
					<div class="formRow">
						<div class="grid3"><label>Socket Opt3:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_sk3" name="out_item_sk3" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
									<?php
										$select_sk_info= mssql_query("Select top 200 sok_name, sok_id from MVCore_Wshopp_Socket ".$drop_sockets."");
										for($i=0;$i < mssql_num_rows($select_sk_info);++$i) {
											$s_sk_i= mssql_fetch_row($select_sk_info);
											if($acp_socket3 == $s_sk_i[0]){ $seledc = 'selected'; } else { $seledc = ''; };
												if($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] <= '36' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												} elseif($mvcore['sockets_opt_ep'] != 'yes') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												};
										};
									?>
								</select>
							</div>                       
					</div>
					<div class="formRow">
						<div class="grid3"><label>Socket Opt4:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_sk4" name="out_item_sk4" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
									<?php
										$select_sk_info= mssql_query("Select top 200 sok_name, sok_id from MVCore_Wshopp_Socket ".$drop_sockets."");
										for($i=0;$i < mssql_num_rows($select_sk_info);++$i) {
											$s_sk_i= mssql_fetch_row($select_sk_info);
											if($acp_socket4 == $s_sk_i[0]){ $seledc = 'selected'; } else { $seledc = ''; };
												if($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] <= '36' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												} elseif($mvcore['sockets_opt_ep'] != 'yes') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												};
										};
									?>
								</select>
							</div>                       
					</div>
					<div class="formRow">
						<div class="grid3"><label>Socket Opt5:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="out_item_sk5" name="out_item_sk5" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
									<?php
										$select_sk_info= mssql_query("Select top 200 sok_name, sok_id from MVCore_Wshopp_Socket ".$drop_sockets."");
										for($i=0;$i < mssql_num_rows($select_sk_info);++$i) {
											$s_sk_i= mssql_fetch_row($select_sk_info);
											if($acp_socket5 == $s_sk_i[0]){ $seledc = 'selected'; } else { $seledc = ''; };
												if($mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] <= '36' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												} elseif($mvcore['sockets_opt_ep'] != 'yes') {
													echo'<option value="'.$s_sk_i[1].'" style="padding-left:5px;" '.$seledc.'>'.$s_sk_i[0].'</option>';
												};
										};
									?>
								</select>
							</div>                       
					</div>
				<?php } ?>
					<div class="formRow"><a href="#" id="invitemeditsecondrunacc" class="buttonM bGreen" style="float:right;color:#ffffff;">Save Item New Options</a></div>
		</div>
		<?php }; ?>
		<div id="echotabledHereshow" style="display:none">
			<div class="fluid">
				<div class="widget grid8">
					<div class="whead"><h6>Warehouse</h6><h6 style="float:right;color:#DF0101;">Make sure user is offline !!</h6></div>
					<div class="gallery">
						<ul id="echotabledHere">
						</ul> 
					</div>
				</div>
				<div class="widget grid4">
					<div class="whead"><h6>New Item Create</h6></div>
					<div class="body">
					
					<div class="formRow">
						<div class="grid5"><label>Item Category:</label></div>
							<div class="grid7">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="item_c_category" name="item_c_category" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value=""></option>
									<option value="0" style="padding-left:5px;">Swords</option>
									<option value="1" style="padding-left:5px;">Axes</option>
									<option value="2" style="padding-left:5px;">Scepters</option>
									<option value="3" style="padding-left:5px;">Spears</option>
									<option value="4" style="padding-left:5px;">Bows</option>
									<option value="5" style="padding-left:5px;">Staffs</option>
									<option value="6" style="padding-left:5px;">Shields</option>
									<option value="7" style="padding-left:5px;">Helms</option>
									<option value="8" style="padding-left:5px;">Armor</option>
									<option value="9" style="padding-left:5px;">Pants</option>
									<option value="10" style="padding-left:5px;">Gloves</option>
									<option value="11" style="padding-left:5px;">Boots</option>
									<option value="12" style="padding-left:5px;">Wings</option>
									<option value="13" style="padding-left:5px;">Rings & Pendants</option>
								</select>
							</div>                       
					</div>
				<div id="item_c_Change">	
					<div class="formRow" id="c_create_s_1" style="display:none;">
						<div class="grid5"><label>Item Name:</label></div>
							<div class="grid7">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="item_c_name" name="item_c_name" data-placeholder="Choose a option..." class="select" tabindex="2">
								
								</select>
							</div>                       
					</div>
				</div>
					<div class="formRow" id="c_create_s_2" style="display:none;">
						<div class="grid5"><label>Item Level:</label></div>
							<div class="grid7">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_level" name="outc_item_level" data-placeholder="Choose a option..." class="select" tabindex="2">
								</select>
							</div>                       
					</div>
					<div class="formRow" id="c_create_s_3" style="display:none;">
						<div class="grid5"><label>AD Option:</label></div>
							<div class="grid7">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_ad" name="outc_item_ad" data-placeholder="Choose a option..." class="select" tabindex="2">
								</select>
							</div>                       
					</div>
					<div class="formRow" id="c_create_s_4" style="display:none;">
						<div class="grid3"><label>Luck:</label></div>
						<div class="grid9 on_off">
							<div class="floatL mr10">
								<div style="width: 49px;" class="ibutton-container">
									<span class="checked"><input style="opacity: 0;" id="outc_item_luck" name="outc_item_luck" type="checkbox"></span>
									<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
									<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
									<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow" id="c_create_s_5" style="display:none;">
						<div class="grid3"><label>Skill:</label></div>
						<div class="grid9 on_off">
							<div class="floatL mr10">
								<div style="width: 49px;" class="ibutton-container">
									<span class="checked"><input style="opacity: 0;" id="outc_item_skill" name="outc_item_skill" type="checkbox"></span>
									<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
									<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
									<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow" id="c_create_s_6" style="display:none;">
						<div class="grid3"><label>Refinary:</label></div>
						<div class="grid9 on_off">
							<div class="floatL mr10">
								<div style="width: 49px;" class="ibutton-container">
									<span class="checked"><input style="opacity: 0;" id="outc_item_refin" name="outc_item_refin" type="checkbox"></span>
									<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
									<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
									<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow" id="c_create_s_7" style="display:none;">
						<div class="grid5"><label>Ancient Type:</label></div>
							<div class="grid7">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_anc" name="outc_item_anc" data-placeholder="Choose a option..." class="select" tabindex="2">
								</select>
							</div>                       
					</div>
					<div class="formRow" id="c_create_s_8" style="display:none;">
						<div class="grid5"><label>Harmony:</label></div>
							<div class="grid7">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_haro" name="outc_item_haro" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="0" style="padding-left:5px;">No Harmony</option>
								</select>
							</div>                       
					</div>

					
					
					
										<div class="formRow" id="a_0_1" style="display:none;">
											<div class="grid7"><label>Increases Mana After monster +Mana/8:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="0exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_0_2" style="display:none;">
											<div class="grid7"><label>Increases Life After monster +Life/8:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="0exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_0_3" style="display:none;">
											<div class="grid7"><label>Increase attacking(wizardly)speed+7:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="0exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_0_4" style="display:none;">
											<div class="grid7"><label>Increase Damage +2%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="0exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_0_5" style="display:none;">
											<div class="grid7"><label>Increase Damage +level/20:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="0exe5" name="exe5" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_0_6" style="display:none;">
											<div class="grid7"><label>Excellent Damage Rate +10%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="0exe6" name="exe6" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>

										
										
										
										
										<div class="formRow" id="a_1_1" style="display:none;">
											<div class="grid7"><label>Increase MaxHP +4%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="1exe6" name="exe6" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_1_2" style="display:none;">
											<div class="grid7"><label>Increase MaxMana +4%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="1exe5" name="exe5" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_1_3" style="display:none;">
											<div class="grid7"><label>Damage decrease +4%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="1exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_1_4" style="display:none;">
											<div class="grid7"><label>Reflect damage +5%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="1exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_1_5" style="display:none;">
											<div class="grid7"><label>Defense success rate +10%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="1exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_1_6" style="display:none;">
											<div class="grid7"><label>Increase Zen After Hunt +40%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="1exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>

										
										
										
										<div class="formRow" id="a_2_1" style="display:none;">
											<div class="grid7"><label>HP +115 Increase:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="2exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_2_2" style="display:none;">
											<div class="grid7"><label>MP +115 Increase:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="2exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_2_3" style="display:none;">
											<div class="grid7"><label>Ignore enemys defensive power by 3%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="2exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_2_4" style="display:none;">
											<div class="grid7"><label>Max AG +50 Increase:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="2exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_2_5" style="display:none;">
											<div class="grid7"><label>Increase attacking(wizardly)speed+5:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="2exe5" name="exe5" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										
										
										
										<div class="formRow" id="a_3_1" style="display:none;">
											<div class="grid7"><label>Ingore opponents defensive power by 5%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="3exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_3_2" style="display:none;">
											<div class="grid7"><label>Returns the enemys attack power in 5%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="3exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_3_3" style="display:none;">
											<div class="grid7"><label>Complete recovery of life in 5% rate:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="3exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_3_4" style="display:none;">
											<div class="grid7"><label>Complete recover of Mana in 5% rate:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="3exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>

										
										
										<div class="formRow" id="a_4_1" style="display:none;">
											<div class="grid7"><label>Increase MaxHP +4%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="4exe6" name="exe6" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_4_2" style="display:none;">
											<div class="grid7"><label>Increase MaxMana +4%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="4exe5" name="exe5" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_4_3" style="display:none;">
											<div class="grid7"><label>Damage decrease +4%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="4exe4" name="exe4" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_4_4" style="display:none;">
											<div class="grid7"><label>Reflect damage +5%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="4exe3" name="exe3" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_4_5" style="display:none;">
											<div class="grid7"><label>Defense success rate +10%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="4exe2" name="exe2" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="formRow" id="a_4_6" style="display:none;">
											<div class="grid7"><label>Increase Zen After Hunt +40%:</label></div>
											<div class="grid5 on_off">
												<div class="floatL mr10">
													<div style="width: 49px;" class="ibutton-container">
														<span class="checked"><input checked="checked" style="opacity: 0;" id="4exe1" name="exe1" type="checkbox"></span>
													<div style="width: 44px;" class="ibutton-label-off"><span style="margin-right: 0px;"><label></label></span></div>
													<div style="width: 0px;" class="ibutton-label-on"><span style="margin-left: -28px;"><label></label></span></div>
													<div class="ibutton-padding-left"></div><div class="ibutton-padding-right"></div>
													</div>
												</div>
											</div>
										</div>
										
				<?php if( $mvcore['db_season'] <= '3'){ } else { ?>
					<div class="formRow" id="sk_1" style="display:none;">
						<div class="grid3"><label>Socket Opt1:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_sk1" name="outc_item_sk1" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
								</select>
							</div>                       
					</div>
					<div class="formRow" id="sk_2" style="display:none;">
						<div class="grid3"><label>Socket Opt2:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_sk2" name="outc_item_sk2" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
								</select>
							</div>                       
					</div>
					<div class="formRow" id="sk_3" style="display:none;">
						<div class="grid3"><label>Socket Opt3:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_sk3" name="outc_item_sk3" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
								</select>
							</div>                       
					</div>
					<div class="formRow" id="sk_4" style="display:none;">
						<div class="grid3"><label>Socket Opt4:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_sk4" name="outc_item_sk4" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
								</select>
							</div>                       
					</div>
					<div class="formRow" id="sk_5" style="display:none;">
						<div class="grid3"><label>Socket Opt5:</label></div>
							<div class="grid9">
								<select style="width:100%;padding-left:5px;opacity:0.6;" id="outc_item_sk5" name="outc_item_sk5" data-placeholder="Choose a option..." class="select" tabindex="2">
									<option value="254" style="padding-left:5px;">EMPTY (No Mounting Socket)</option>
								</select>
							</div>                       
					</div>
				<?php } ?>
					<div class="formRow" id="allOk_c" style="display:none;" ><a href="#" id="waremedit4354erweun" class="buttonM bGreen" style="float:right;color:#ffffff;">Add Item</a></div>
					</div>
				</div>
			</div>
        </div>
		<div id="infewvsearchitReasa" style="display:none;">
           <div class="nNote nInformation">
                <p>Nothing Found.</p>
            </div>
        </div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Track_Items') { ?> <!-- Track_Items -->
		<div class="widget fluid" id="onaccsubCharfacasas">
			<div class="whead"><h6>Track Item In Accounts And Characters</h6><h6 id="echtabitemhsadsa" style="float:right;"></h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter Item Serial Code:</b></label></div>
                        <div class="grid9"><input id="tracsaccname" name="saccname" type="text"></div>
                    </div>
		</div>
		<div class="widget" id="hideTrackRe" style="display:none;">
            <div class="whead"><h6>Track Result</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Item Name</td>
						<td>Hex Code</td>
						<td>Username</td>
						<td>Character</td>
                    </tr>
                </thead>
                <tbody id="echtabitemh">
                </tbody>
            </table>
        </div>
		<div id="hideTrackReasa" style="display:none;">
           <div class="nNote nInformation">
                <p>Nothing Found.</p>
            </div>
        </div>
		<?php }; ?>
<script>
function saqweqwhangerwechar() {
		var getAllValues = '1532';
			$.post("acps.php", {
				saqweqwhangerwechar: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});	
};

function savechangsaesaccschar() {
		var getAllValues = $("#accnamesa").val()+"-ids-"
		+$("#cred").val()+"-ids-"
		+$("#gcred").val()+"-ids-"
		+$("#wCoins").val();

			$.post("acps.php", {
				onChsubaccfisasada: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
};
function savechangesaccchar() {
		var getAllValues = $("#accnames").val()+"-ids-"
		+$("#accblocs option:selected").val()+"-ids-"
		+$("#accacc option:selected").val()+"-ids-"
		+$("#pass").val()+"-ids-"
		+$("#emailaa").val()+"-ids-"
		+$("#sqa").val()+"-ids-"
		+$("#acc_info_msg").val();
		
			$.post("acps.php", {
				onChsubaccfisa: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});	
};
$(document).ready(function() {
	
	//Clean Vault
	$("#get_vault_clean").on('click', function() {
		
		if (confirm('Are you sure want to clean vault?')) {

			var getAllValues = 
				$("#saccname").val()
			;
				$.post("acps.php", {
					ytheety45657jhgerhr: getAllValues
				},
				function(data) {
					$('#errorDrop').html(data);
					
					//MGS Sys --------------
					var getIsOnMSG = '<?php echo $mvcore['admincp_msg_output'];?>';
						var getPaneName2 = '<?php echo $_GET['op2'];?>';
						var getPaneName3 = '<?php echo $_GET['op3'];?>';
					if(getIsOnMSG != 'on') {
						window.location = "-id-admincp-id-"+getPaneName2+"-id-"+getPaneName3+".html";
					} else {
						setInterval(function(){ window.location = "-id-admincp-id-"+getPaneName2+"-id-"+getPaneName3+".html"; }, 4000);
					};
					//----------------------
				});
				
		} else {
			// Do nothing!
		}

	});
	
	//New Item Add
	$("#waremedit4354erweun").on('click', function() {
		
		var extraNum = '0';
		
		var isVisible0 = $('#a_0_1').is(':visible');
		var isVisible1 = $('#a_1_1').is(':visible');
		var isVisible2 = $('#a_2_1').is(':visible');
		var isVisible3 = $('#a_3_1').is(':visible');
		var isVisible4 = $('#a_4_1').is(':visible');
		
		 if(isVisible0 == true){ extraNum = '0'; }
		 else if(isVisible1 == true){ extraNum = '1'; }
		 else if(isVisible2 == true){ extraNum = '2'; }
		 else if(isVisible3 == true){ extraNum = '3'; }
		 else if(isVisible4 == true){ extraNum = '4'; }

		var getAllValues = 
		
			$("#saccname").val()+"-ids-"
			+$("#itemhex").val()+"-ids-" // SKiped
			+$("#outc_item_level option:selected").val()+"-ids-"
			+$("#outc_item_ad option:selected").val()+"-ids-"
			
			+$("#outc_item_luck:checked").length+"-ids-"
			+$("#outc_item_skill:checked").length+"-ids-"
			+$("#outc_item_refin:checked").length+"-ids-"
			
			+$("#outc_item_anc option:selected").val()+"-ids-"
			+$("#outc_item_haro option:selected").val()+"-ids-"
			+$("#"+extraNum+"exe1:checked").length+"-ids-"
			+$("#"+extraNum+"exe2:checked").length+"-ids-"
			+$("#"+extraNum+"exe3:checked").length+"-ids-"
			+$("#"+extraNum+"exe4:checked").length+"-ids-"
			+$("#"+extraNum+"exe5:checked").length+"-ids-"
			+$("#"+extraNum+"exe6:checked").length+"-ids-"
			+$("#outc_item_sk1 option:selected").val()+"-ids-"
			+$("#outc_item_sk2 option:selected").val()+"-ids-"
			+$("#outc_item_sk3 option:selected").val()+"-ids-"
			+$("#outc_item_sk4 option:selected").val()+"-ids-"
			+$("#outc_item_sk5 option:selected").val()+"-ids-"
			+$("#item_c_category").val()+"-ids-" // CAT
			+$("#item_c_name").val(); // ID

			$.post("acps.php", {
				waremedit4354erweun: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				
				$('#errorDrop').html(outputData[1]);
				
				$('#asdasdsawqwwqfw').hide();
				
				var getAllValues = outputData[0];
				$.post("acps.php", {
					onaccsubCharfacas: getAllValues
				},
				function(data) {
					
					if(data == '1') {
						$('#echotabledHereshow').show();
						$('#waregetdatReasa').hide();
						$('#echotabledHere').html('');
					} else if(data == '') {
						$('#waregetdatReasa').show();
						$('#echotabledHereshow').hide();
					} else {
						$('#echotabledHereshow').show();
						$('#waregetdatReasa').hide();
						$('#echotabledHere').html(data);
					}
					
				});
				
				setTimeout(function() {
					$('#errorDrop').html("");
				}, 3000);
				
			});
	});
	
	//Get item names....
	$("#item_c_category").on('change', function() {
		var getAllValues = 
			$("#item_c_category").val()
		;
			$.post("acps.php", {
				item_c_getName: getAllValues
			},
			function(data) {
				$('#c_create_s_1').show();
				
				$('#allOk_c').hide();
				$('#c_create_s_2').hide();
				$('#c_create_s_3').hide();
				$('#c_create_s_4').hide();
				$('#c_create_s_5').hide();
				$('#c_create_s_6').hide();
				$('#c_create_s_7').hide();
				$('#c_create_s_8').hide();
				$('#sk_1').hide();
				$('#sk_2').hide();
				$('#sk_3').hide();
				$('#sk_4').hide();
				$('#sk_5').hide();
				
				$('#a_0_1').hide(); $('#a_0_2').hide(); $('#a_0_3').hide(); $('#a_0_4').hide(); $('#a_0_5').hide(); $('#a_0_6').hide();
				$('#a_1_1').hide(); $('#a_1_2').hide(); $('#a_1_3').hide(); $('#a_1_4').hide(); $('#a_1_5').hide(); $('#a_1_6').hide();
				$('#a_2_1').hide(); $('#a_2_2').hide(); $('#a_2_3').hide(); $('#a_2_4').hide(); $('#a_2_5').hide(); $('#a_2_6').hide();
				$('#a_3_1').hide(); $('#a_3_2').hide(); $('#a_3_3').hide(); $('#a_3_4').hide(); $('#a_3_5').hide(); $('#a_3_6').hide();
				$('#a_4_1').hide(); $('#a_4_2').hide(); $('#a_4_3').hide(); $('#a_4_4').hide(); $('#a_4_5').hide(); $('#a_4_6').hide();
				
				$('#item_c_name').html(data);
				$("select").select2({ placeholder: "Choose a option..." });
			});
	});
	
	//Get Item Options Level,Luck,Ad,Skill,Refinary
	$("#item_c_Change").on('change', function() {
		var getAllValues = 
			$("#item_c_category").val()+"-ids-"
			+$("#item_c_name").val()
		;
			$.post("acps.php", {
				item_c_getLASR: getAllValues
			},
			function(data) {
				
				$('#allOk_c').show();
				
				$('#c_create_s_2').show();
				$('#c_create_s_3').show();
				
				var opdat = data.split("-ids-");
				
				$('#outc_item_level').html(opdat[0]);
				$('#outc_item_ad').html(opdat[1]);
			
				if(opdat[2] == '1') { $('#c_create_s_4').show(); } else { $('#c_create_s_4').hide(); };
				if(opdat[3] == '1') { $('#c_create_s_5').show(); } else { $('#c_create_s_5').hide(); };
				if(opdat[4] == '1') { $('#c_create_s_6').show(); } else { $('#c_create_s_6').hide(); };
				
				$("select").select2({ placeholder: "Choose a option..." });
			});
	});
	
	//Get Item Options Ancient,Harmony
	$("#item_c_Change").on('change', function() {
		var getAllValues = 
			$("#item_c_category").val()+"-ids-"
			+$("#item_c_name").val()
		;
			$.post("acps.php", {
				item_c_getAH: getAllValues
			},
			function(data) {
				
				var opdat = data.split("-ids-");
				
				if(opdat[0] == '') { $('#c_create_s_7').hide(); } else { $('#c_create_s_7').show(); $('#outc_item_anc').html(opdat[0]); }
				if(opdat[1] == '') { $('#c_create_s_8').hide(); } else { $('#c_create_s_8').show(); $('#outc_item_haro').html(opdat[1]); }

				$("select").select2({ placeholder: "Choose a option..." });
			});
	});
	
	//Get Item Options Exc
	$("#item_c_Change").on('change', function() {
		var getAllValues = 
			$("#item_c_category").val()+"-ids-"
			+$("#item_c_name").val()
		;
			$.post("acps.php", {
				item_c_getExc: getAllValues
			},
			function(data) {
					
				if(data == '0') {

				$('#a_0_1').show(); $('#a_0_2').show(); $('#a_0_3').show(); $('#a_0_4').show(); $('#a_0_5').show(); $('#a_0_6').show(); 
				
				$('#a_1_1').hide(); $('#a_1_2').hide(); $('#a_1_3').hide(); $('#a_1_4').hide(); $('#a_1_5').hide(); $('#a_1_6').hide();
				$('#a_2_1').hide(); $('#a_2_2').hide(); $('#a_2_3').hide(); $('#a_2_4').hide(); $('#a_2_5').hide(); $('#a_2_6').hide();
				$('#a_3_1').hide(); $('#a_3_2').hide(); $('#a_3_3').hide(); $('#a_3_4').hide(); $('#a_3_5').hide(); $('#a_3_6').hide();
				$('#a_4_1').hide(); $('#a_4_2').hide(); $('#a_4_3').hide(); $('#a_4_4').hide(); $('#a_4_5').hide(); $('#a_4_6').hide();
				
				}
				else if (data == '1') {

				$('#a_1_1').show(); $('#a_1_2').show(); $('#a_1_3').show(); $('#a_1_4').show(); $('#a_1_5').show(); $('#a_1_6').show(); 
				
				$('#a_0_1').hide(); $('#a_0_2').hide(); $('#a_0_3').hide(); $('#a_0_4').hide(); $('#a_0_5').hide(); $('#a_0_6').hide();
				$('#a_2_1').hide(); $('#a_2_2').hide(); $('#a_2_3').hide(); $('#a_2_4').hide(); $('#a_2_5').hide(); $('#a_2_6').hide();
				$('#a_3_1').hide(); $('#a_3_2').hide(); $('#a_3_3').hide(); $('#a_3_4').hide(); $('#a_3_5').hide(); $('#a_3_6').hide();
				$('#a_4_1').hide(); $('#a_4_2').hide(); $('#a_4_3').hide(); $('#a_4_4').hide(); $('#a_4_5').hide(); $('#a_4_6').hide();
				
				}
				else if (data == '2') {

				$('#a_2_1').show(); $('#a_2_2').show(); $('#a_2_3').show(); $('#a_2_4').show(); $('#a_2_5').show(); $('#a_2_6').show(); 
				
				$('#a_0_1').hide(); $('#a_0_2').hide(); $('#a_0_3').hide(); $('#a_0_4').hide(); $('#a_0_5').hide(); $('#a_0_6').hide();
				$('#a_1_1').hide(); $('#a_1_2').hide(); $('#a_1_3').hide(); $('#a_1_4').hide(); $('#a_1_5').hide(); $('#a_1_6').hide();
				$('#a_3_1').hide(); $('#a_3_2').hide(); $('#a_3_3').hide(); $('#a_3_4').hide(); $('#a_3_5').hide(); $('#a_3_6').hide();
				$('#a_4_1').hide(); $('#a_4_2').hide(); $('#a_4_3').hide(); $('#a_4_4').hide(); $('#a_4_5').hide(); $('#a_4_6').hide();
				
				}
				else if (data == '3') {

				$('#a_3_1').show(); $('#a_3_2').show(); $('#a_3_3').show(); $('#a_3_4').show(); $('#a_3_5').show(); $('#a_3_6').show();

				$('#a_0_1').hide(); $('#a_0_2').hide(); $('#a_0_3').hide(); $('#a_0_4').hide(); $('#a_0_5').hide(); $('#a_0_6').hide();
				$('#a_1_1').hide(); $('#a_1_2').hide(); $('#a_1_3').hide(); $('#a_1_4').hide(); $('#a_1_5').hide(); $('#a_1_6').hide();
				$('#a_2_1').hide(); $('#a_2_2').hide(); $('#a_2_3').hide(); $('#a_2_4').hide(); $('#a_2_5').hide(); $('#a_2_6').hide();
				$('#a_4_1').hide(); $('#a_4_2').hide(); $('#a_4_3').hide(); $('#a_4_4').hide(); $('#a_4_5').hide(); $('#a_4_6').hide();				
				
				}
				else if (data == '4') {

				$('#a_4_1').show(); $('#a_4_2').show(); $('#a_4_3').show(); $('#a_4_4').show(); $('#a_4_5').show(); $('#a_4_6').show(); 
				
				$('#a_0_1').hide(); $('#a_0_2').hide(); $('#a_0_3').hide(); $('#a_0_4').hide(); $('#a_0_5').hide(); $('#a_0_6').hide();
				$('#a_1_1').hide(); $('#a_1_2').hide(); $('#a_1_3').hide(); $('#a_1_4').hide(); $('#a_1_5').hide(); $('#a_1_6').hide();
				$('#a_2_1').hide(); $('#a_2_2').hide(); $('#a_2_3').hide(); $('#a_2_4').hide(); $('#a_2_5').hide(); $('#a_2_6').hide();
				$('#a_3_1').hide(); $('#a_3_2').hide(); $('#a_3_3').hide(); $('#a_3_4').hide(); $('#a_3_5').hide(); $('#a_3_6').hide();
				
				}
				else {
					
				$('#a_0_1').hide(); $('#a_0_2').hide(); $('#a_0_3').hide(); $('#a_0_4').hide(); $('#a_0_5').hide(); $('#a_0_6').hide();
				$('#a_1_1').hide(); $('#a_1_2').hide(); $('#a_1_3').hide(); $('#a_1_4').hide(); $('#a_1_5').hide(); $('#a_1_6').hide();
				$('#a_2_1').hide(); $('#a_2_2').hide(); $('#a_2_3').hide(); $('#a_2_4').hide(); $('#a_2_5').hide(); $('#a_2_6').hide();
				$('#a_3_1').hide(); $('#a_3_2').hide(); $('#a_3_3').hide(); $('#a_3_4').hide(); $('#a_3_5').hide(); $('#a_3_6').hide();
				$('#a_4_1').hide(); $('#a_4_2').hide(); $('#a_4_3').hide(); $('#a_4_4').hide(); $('#a_4_5').hide(); $('#a_4_6').hide();
					
				};
				
			});
	});
	
	//Get Item Options Socket
	$("#item_c_Change").on('change', function() {
		var getAllValues = 
			$("#item_c_category").val()+"-ids-"
			+$("#item_c_name").val()
		;
			$.post("acps.php", {
				item_c_getSocket: getAllValues
			},
			function(data) {
				
				var opdat = data.split("-ids-");
				
				if(opdat[0] == '1') {
					
				$('#sk_1').show();
				$('#sk_2').show();
				$('#sk_3').show();
				$('#sk_4').show();
				$('#sk_5').show();
				
				$('#outc_item_sk1').html(opdat[1]);
				$('#outc_item_sk2').html(opdat[1]);
				$('#outc_item_sk3').html(opdat[1]);
				$('#outc_item_sk4').html(opdat[1]);
				$('#outc_item_sk5').html(opdat[1]);
				
				$("select").select2({ placeholder: "Choose a option..." });
					
				} else {
				$('#sk_1').hide();
				$('#sk_2').hide();
				$('#sk_3').hide();
				$('#sk_4').hide();
				$('#sk_5').hide();
				};
				
			});
	});
	
});

	//Item Delete
	function invclickDeleteItemacc(elmnts) {
		$('#echtabitemhsaadsa').html("<font color='#DF0101'>Please Wait...</font>");
		var getAllValues = elmnts;
			$.post("acps.php", {
				invclickDeleteItemacc: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				
				var getAllValues = $("#saccname").val();
				$.post("acps.php", {
					onaccsubCharfacas: getAllValues
				},
				function(data) {
					$('#echtabitemhsaadsa').html("");
					if(data == '1') {
						$('#echotabledHereshow').show();
						$('#waregetdatReasa').hide();
						$('#echotabledHere').html('');
					} else if(data == '') {
						$('#waregetdatReasa').show();
						$('#echotabledHereshow').hide();
					} else {
						$('#echotabledHereshow').show();
						$('#waregetdatReasa').hide();
						$('#echotabledHere').html(data);
					}
					
				});
				
				setTimeout(function() {
					$('#errorDrop').html("");
				}, 3000);
				
			});
			
		$('#schname').html("admin");
	};
	
$(document).ready(function() {
	
	var gergrehher = "<?php echo $_POST['from_dash_page'];?>";
	if(gergrehher != '') { runCheckers(); };
	
	//page1
	$("#accnames").on('change keyup', function() {
		
		runCheckers();
		
	});

	//For VIP Only!
	$("#accvipsys").on('change', function() {
		var getAllValues = $("#accnames").val()+"-ids-"
		+$("#accvipsys option:selected").val();
		
			$.post("acps.php", {
				tytrwewrretrte: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				
				runCheckers();
				
			});
	});
	
	function runCheckers() {
		var getAllValues = $("#accnames").val();
			$.post("acps.php", {
				onChsubaccfisb: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				$('#accacc').val(outputData[1]);
				$('#pass').val(outputData[2]);
				$('#emailaa').val(outputData[3]);
				$('#sqa').val(outputData[4]);
				$('#userna').val(outputData[5]);
				$('#accvipsys').val(outputData[7]);
				$('#accvipsysdiv').text(outputData[8]);
				$('#acc_info_msg').val(outputData[9]);
				$('#accblocs').val(outputData[10]);
				
					$("select").select2({ placeholder: "Choose a option..." });
				
			});
	}
	
	//Page2
	$("#accnamesa").on('change', function() {
		runCheckersa();
	});

	function runCheckersa() {
		var getAllValues = $("#accnamesa").val();
			$.post("acps.php", {
				onChsubaccfisasadb: getAllValues
			},
			function(data) {
				var nShws = data.length;
				if(nShws >= 35) { $('#errorDrop').html(data); } else {
					var outputData = data.split("-ids-");
					$('#cred').val(outputData[0]);
					$('#gcred').val(outputData[1]);
					if(outputData[2] != '01') {
						$('#wCoins').val(outputData[2]);
					} else { $('#HidWCoin').hide; }
				};
			});
	}
	//Page3
	$("#onaccsubCharfacas").on('change', function() {
		$('#echtabitemhsaadsa').html("<font color='#DF0101'>Please Wait...</font>");
		var getAllValues = $("#saccname").val();
			$.post("acps.php", {
				onaccsubCharfacas: getAllValues
			},
			function(data) {
				$('#echtabitemhsaadsa').html("");
					if(data == '1') {
						$('#echotabledHereshow').show();
						$('#infewvsearchitReasa').hide();
						$('#echotabledHere').html('');
					} else if(data == '') {
						$('#infewvsearchitReasa').show();
						$('#echotabledHereshow').hide();
					} else {
						$('#echotabledHereshow').show();
						$('#infewvsearchitReasa').hide();
						$('#echotabledHere').html(data);
					}
				
			});
	});
	//Main Item Edit asdsadsadsa
	$("#invitemeditsecondrunacc").on('click', function() {
		var getAllValues = 
		
			$("#charname").val()+"-ids-"
			+$("#itemhex").val()+"-ids-"
			+$("#out_item_level option:selected").val()+"-ids-"
			+$("#out_item_ad option:selected").val()+"-ids-"
			
			+$("#out_item_luck:checked").length+"-ids-"
			+$("#out_item_skill:checked").length+"-ids-"
			+$("#out_item_refin:checked").length+"-ids-"
			
			+$("#out_item_anc option:selected").val()+"-ids-"
			+$("#out_item_haro option:selected").val()+"-ids-"
			+$("#exe1:checked").length+"-ids-"
			+$("#exe2:checked").length+"-ids-"
			+$("#exe3:checked").length+"-ids-"
			+$("#exe4:checked").length+"-ids-"
			+$("#exe5:checked").length+"-ids-"
			+$("#exe6:checked").length+"-ids-"
			+$("#out_item_sk1 option:selected").val()+"-ids-"
			+$("#out_item_sk2 option:selected").val()+"-ids-"
			+$("#out_item_sk3 option:selected").val()+"-ids-"
			+$("#out_item_sk4 option:selected").val()+"-ids-"
			+$("#out_item_sk5 option:selected").val()+"-ids-"
			+$("#out_item_serial").val();
			
			$.post("acps.php", {
				invitemeditsecondrunacc: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				
				$('#errorDrop').html(outputData[1]);
				
				$('#asdasdsawqwwqfw').hide();
				
				var getAllValues = outputData[0];
				$.post("acps.php", {
					onaccsubCharfacas: getAllValues
				},
				function(data) {
					
					if(data == '1') {
						$('#echotabledHereshow').show();
						$('#infewvsearchitReasa').hide();
						$('#echotabledHere').html('');
					} else if(data == '') {
						$('#infewvsearchitReasa').show();
						$('#echotabledHereshow').hide();
					} else {
						$('#echotabledHereshow').show();
						$('#infewvsearchitReasa').hide();
						$('#echotabledHere').html(data);
					}
					
				});
				
				setTimeout(function() {
					$('#errorDrop').html("");
				}, 3000);
				
			});
	});
	//Page4
	$("#onaccsubCharfacasas").on('change', function() {
		if($("#tracsaccname").val() == '') {} else {
			$('#echtabitemhsadsa').html("<font color='#DF0101'>Looking For Item! Process Might Take Up To 5 Minutes. Please Wait...</font>");
		var getAllValues = $("#tracsaccname").val()+"-ids-0-ids-0";
			$.post("acps.php", {
				onaccsubCharfacasas: getAllValues
			},
			function(data) {
				if(data == '') {
					$('#hideTrackReasa').show();
				} else {
					$('#hideTrackRe').show();
				};
				$('#echtabitemh').html(data);
				$('#echtabitemhsadsa').html("");
			});	
		}
	});
	
	//Get IP By User
	$("#aodsargsdwbrbrbew").on('change', function() {
		var getAllValues = $("#acccharname").val();

			$.post("acps.php", {
				aodsargsdwbrbrbew: getAllValues
			},
			function(data) {
				
				$('#dropeduip').html(data);
				
			});
	});
	
	//Get User By IP
	$("#aodsargsdsdwbrbrbdsew").on('change', function() {
		var getAllValues = $("#acccharnames").val();

			$.post("acps.php", {
				aodsargsdsdwbrbrbdsew: getAllValues
			},
			function(data) {
				
				$('#dropedusername').html(data);
				
			});
	});
	
	//Friend System
	$("#usercharnameseach").on('change keyup paste', function() {
			var getAllValues = $("#usercharnameseach").val();
			$.post("acps.php", {
				usercharnameseach: getAllValues
			},
			function(data) {
				if(data == ''){
					$('#sadsadsawggegw').html('<tr><td colspan="8"><div class="nNote nInformation" style="margin-top:0px;"><p>Nothing Found.</p></div></td></tr>'); //Output Result
				} else if(data == '0'){
					$('#sadsadsawggegw').html("");
				} else {
					$('#sadsadsawggegw').html(data);
				};
				$("select").select2({ placeholder: "Choose a option..." });
			});
	});
	//Money Track
	$("#userchaergrnamesweach").on('change keyup paste', function() {
			var getAllValues = $("#userchaergrnamesweach").val();
			$.post("acps.php", {
				userchaergrnamesweach: getAllValues
			},
			function(data) {
				if(data == ''){
					$('#sadsfaqwdsawggegw').html('<tr><td colspan="8"><div class="nNote nInformation" style="margin-top:0px;"><p>Nothing Found.</p></div></td></tr>'); //Output Result
				} else if(data == '0'){
					$('#sadsfaqwdsawggegw').html("");
				} else {
					$('#sadsfaqwdsawggegw').html(data);
				};
				$("select").select2({ placeholder: "Choose a option..." });
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>