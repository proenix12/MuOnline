
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Market_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Market_manage-id-Market_Settings.html" title=""><span style="height:30px;">Market Settings</span></a></li>
            <li <?php if($_GET['op3'] == 'Market_Category_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Market_manage-id-Market_Category_manage.html" title=""><span style="height:30px;">Category Manage</span></a></li>
            <li <?php if($_GET['op3'] == 'market_log') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Market_manage-id-market_log.html" title=""><span style="height:30px;">Bought Item Log</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Market'] != 'on') { echo '<font color="red"><u><b>Market</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>
		
		<?php if($_GET['op3'] == 'market_log') { ?> <!-- market_log -->
		<div class="widget">
            <div class="whead"><h6>Market Bought Item Log</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Item Name</td>
						<td>Item Hex ( Serial )</td>
						<td>Sold</td>
						<td>Bought</td>
						<td>Item Cost</td>
						<td>Date</td>
						
                    </tr>
                </thead>
                <tbody>
					<?php
						$sys_starts = mssql_query("select top 50 hex,memb___id,name,price,type,soldto,date from MVCore_Market_Sold_Items order by date desc");
						for($i=0;$i < mssql_num_rows($sys_starts);++$i) {
							$drop_info = mssql_fetch_row($sys_starts);
							
						$sys_starts_name = mssql_query("select name from character where AccountId = '".$drop_info[1]."'");
						$drop_info_name = mssql_fetch_row($sys_starts_name);
						
						$sys_startold = mssql_query("select name from character where AccountId = '".$drop_info[5]."'");
						$drop_infsold = mssql_fetch_row($sys_startold);
					
						if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };
					
							$item[$i]		= substr($drop_info[0],(0), $hexlen);			// item Type
							$sy 			= hexdec(substr($item[$i],0,2)); 		// Item ID
							$serial 		= hexdec(substr($item[$i],6,8)); 		// Item Serial
							$itt 			= hexdec(substr($item[$i],18,2)); 		// Item Type
							$itemtype 		= floor($itt/16);						// Item Type Fix
							$iop 			= hexdec(substr($item[$i],2,2)); 		// Item Level/Skill/Option Data
							$itemdur		= hexdec(substr($item[$i],4,2)); 		// Item Durability
							$ioo 			= hexdec(substr($item[$i],14,2)); 		// Item Excellent Info/ Option
							$ioosecon 		= hexdec(substr($item[$i],14,1)); 		// AD option 1 2 3 4 5 6 7
							$ac 			= hexdec(substr($item[$i],16,2)); 		// Ancient data

							$item_socket[1] = hexdec(substr($item[$i],22,2)); 		// Socket 1
							$item_socket[2] = hexdec(substr($item[$i],24,2)); 		// Socket 2
							$item_socket[3] = hexdec(substr($item[$i],26,2)); 		// Socket 3
							$item_socket[4] = hexdec(substr($item[$i],28,2));		// Socket 4
							$item_socket[5] = hexdec(substr($item[$i],30,2)); 		// Socket 5

							$item_harmony 	= hexdec(substr($item[$i],20,1)); 		// Item harmony
							$item_harm_val 	= hexdec(substr($item[$i],21,1)); 		// Item harmony Value
							$item_refinary 	= hexdec(substr($item[$i],19,1)); 		// Item Refinery
							
								$itemSerial 		= substr($item[$i],6,8); 		// Item Serial

		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($item[$i], 0,2))/32; // Category
			$ioo = hexdec(substr($item[$i], 14,2)); // Excelent
			$ids = hexdec(substr($item[$i], 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};
		
							include"system/engine_s_fnc.php";
							
							$drop_item_info[$i] ='<table><tr valign=top><td><img src=system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif><br>'.$iname.' '.$item_has_def.''.$item_has_dmg.''.$item_need_dur.''.$item_need_level.''.$item_class_need.''.$other_item_infos.''.$fenrir.'<font color=#cc7fcc>'.$ref.'</font>'.$joh_info_drop.'<font color=#7fb2ff>'.$skill.''.$luck.''.$itemoptionname.''.$itemoptionnamess.''.$db_item_info.''.$itemoptionnames.''.$anc_option.'</font><font color=#ff19ff>'.$socketinfos.'</font>'.$sok_info_drop1.''.$sok_info_drop2.''.$sok_info_drop3.''.$sok_info_drop4.''.$sok_info_drop5.'</td></tr></table>';
							$show_on_off[$i] = 'onMouseover="ddrivetip(\''.$drop_item_info[$i].'\')" onMouseout="hideddrivetip()"';
							
								if($drop_info[4] == '3') {
									$Cost_Type = ''.$drop_info[3].' Zen';
								}
								elseif($drop_info[4] == '2') {
									$Cost_Type = ''.$drop_info[3].' '.$mvcore['money_name1'].'';
								}
								elseif($drop_info[4] == '1') {
									$Cost_Type = ''.$drop_info[3].' '.$mvcore['money_name2'].'';
								};
								
								$date = date ("Y-m-d H:i", $drop_info[6]);
								
								if($drop_info[1] == $drop_info[5]) { $semp = ''.$drop_info_name[0].' ( '.$drop_info[1].' )'; $semp2 = 'Took Item Back'; } else { $semp2 = ''.$drop_infsold[0].' ( '.$drop_info[5].' )'; $semp = ''.$drop_info_name[0].' ( '.$drop_info[1].' )';  }
									
							echo'
										<tr '.$show_on_off[$i].'>
											<td>'.$inames.'</td>
											<td style="text-transform: uppercase;">'.$drop_info[0].' ( '.$itemSerial.' )</td>
											<td>'.$semp.'</td>
											<td>'.$semp2 .'</td>
											<td>'.$Cost_Type.'</td>
											<td>'.$date.'</td>
											
										</tr>
							';
						};
					?>
                </tbody>
            </table>
        </div>
		<?php } ?>
		<?php if($_GET['op3'] == 'Market_Settings') { ?> <!-- Market_Settings -->
		<div id="boidmware">
		<div class="widget fluid">
			<div class="whead"><h6>Market Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Ask Fee For Item Sell:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="ware_affis" name="ware_affis" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['ware_affis'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="0" <?php if($mvcore['ware_affis'] == '0') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Fee Percent ( Of Entered Item Cost ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="ware_fee_take" name="ware_fee_take" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option>
								<option value="5" <?php if($mvcore['ware_fee_take'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Percent</option> 
								<option value="10" <?php if($mvcore['ware_fee_take'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Percent</option> 
								<option value="15" <?php if($mvcore['ware_fee_take'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Percent</option> 
								<option value="20" <?php if($mvcore['ware_fee_take'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Percent</option> 
								<option value="25" <?php if($mvcore['ware_fee_take'] == '25') { echo 'selected'; } else { echo ''; }; ?>>25 Percent</option> 
								<option value="30" <?php if($mvcore['ware_fee_take'] == '30') { echo 'selected'; } else { echo ''; }; ?>>30 Percent</option> 
								<option value="35" <?php if($mvcore['ware_fee_take'] == '35') { echo 'selected'; } else { echo ''; }; ?>>35 Percent</option> 
								<option value="40" <?php if($mvcore['ware_fee_take'] == '40') { echo 'selected'; } else { echo ''; }; ?>>40 Percent</option> 
								<option value="45" <?php if($mvcore['ware_fee_take'] == '45') { echo 'selected'; } else { echo ''; }; ?>>45 Percent</option> 
								<option value="50" <?php if($mvcore['ware_fee_take'] == '50') { echo 'selected'; } else { echo ''; }; ?>>50 Percent</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Req. IP Check Between Buyer & Seller ( Turn ON To Stop Credits Transfer In Market ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="mark_ip_check" name="mark_ip_check" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['mark_ip_check'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On ( Will Check User IPs & Block If Same )</option> 
								<option value="off" <?php if($mvcore['mark_ip_check'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off ( Wont Check IPs )</option> 
							</select>
						</div> 						
					</div>
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>Warehouse Options</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Allow Zen Use:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="market_zen_sell" name="market_zen_sell" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['market_zen_sell'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="0" <?php if($mvcore['market_zen_sell'] == '0') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Allow <?php echo $mvcore['money_name1'];?> Use:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="market_credits_sell" name="market_credits_sell" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['market_credits_sell'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="0" <?php if($mvcore['market_credits_sell'] == '0') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Allow <?php echo $mvcore['money_name2'];?> Use:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="market_credits2_sell" name="market_credits2_sell" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['market_credits2_sell'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="0" <?php if($mvcore['market_credits2_sell'] == '0') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Allow WCoins Use:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="market_wcoins_sell" name="market_wcoins_sell" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['market_wcoins_sell'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="0" <?php if($mvcore['market_wcoins_sell'] == '0') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div>
					</div>
		</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Market_Category_manage') { ?> <!-- Market_Category_manage -->
		<div class="widget fluid" id="onChsubeasdandigmpages">
			<div class="whead"><h6>Market Category Pages</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Default Market Category:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="mark_default" name="mark_default" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="gf" <?php if($mvcore['mark_default'] == 'gf') { echo 'selected'; } else { echo ''; }; ?>>Recent Category</option>
								<option value="0" <?php if($mvcore['mark_default'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Swords Category</option>
								<option value="1" <?php if($mvcore['mark_default'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Axes Category</option>
								<option value="2" <?php if($mvcore['mark_default'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Scepters Category</option>
								<option value="3" <?php if($mvcore['mark_default'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Spears Category</option>
								<option value="4" <?php if($mvcore['mark_default'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Bows Category</option>
								<option value="5" <?php if($mvcore['mark_default'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Staffs Category</option>
								<option value="6" <?php if($mvcore['mark_default'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Shields Category</option>
								<option value="7" <?php if($mvcore['mark_default'] == '7') { echo 'selected'; } else { echo ''; }; ?>>Helms Category</option>
								<option value="8" <?php if($mvcore['mark_default'] == '8') { echo 'selected'; } else { echo ''; }; ?>>Armor Category</option>
								<option value="9" <?php if($mvcore['mark_default'] == '9') { echo 'selected'; } else { echo ''; }; ?>>Pants Category</option>
								<option value="10" <?php if($mvcore['mark_default'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Gloves Category</option>
								<option value="11" <?php if($mvcore['mark_default'] == '11') { echo 'selected'; } else { echo ''; }; ?>>Boots Category</option>
								<option value="12" <?php if($mvcore['mark_default'] == '12') { echo 'selected'; } else { echo ''; }; ?>>Accessories Category</option>
								<option value="13" <?php if($mvcore['mark_default'] == '13') { echo 'selected'; } else { echo ''; }; ?>>Miscellaneous 1 Category</option>
								<option value="14" <?php if($mvcore['mark_default'] == '14') { echo 'selected'; } else { echo ''; }; ?>>Miscellaneous 2 Category</option>
								<option value="15" <?php if($mvcore['mark_default'] == '15') { echo 'selected'; } else { echo ''; }; ?>>Scrolls Category</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Recent Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page0" <?php if($mvcore['m_page0'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Swords Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page1" <?php if($mvcore['m_page1'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Axes Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page2" <?php if($mvcore['m_page2'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Scepters Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page3" <?php if($mvcore['m_page3'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Spears Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page4" <?php if($mvcore['m_page4'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Bows Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page5" <?php if($mvcore['m_page5'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Staffs Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page6" <?php if($mvcore['m_page6'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Shields Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page7" <?php if($mvcore['m_page7'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Helms Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page8" <?php if($mvcore['m_page8'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Armor Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page9" <?php if($mvcore['m_page9'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Pants Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page10" <?php if($mvcore['m_page10'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Gloves Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page11" <?php if($mvcore['m_page11'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Boots Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page12" <?php if($mvcore['m_page12'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Accessories Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page13" <?php if($mvcore['m_page13'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Miscellaneous Items Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page14" <?php if($mvcore['m_page14'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Miscellaneous Items II Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page15" <?php if($mvcore['m_page15'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Market - Scrolls Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="m_page16" <?php if($mvcore['m_page16'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>Disabled</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>Enabled</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>
					</div>
		</div>
		<?php }; ?>
<script>
$(document).ready(function() {
	//page1
	$( "#boidmware" ).on('change', function() {
		var getAllValues = 
		
				$("#ware_affis option:selected").val()+"-ids-"
				+$("#ware_fee_take option:selected").val()+"-ids-"
				+$("#market_zen_sell option:selected").val()+"-ids-"
				+$("#market_credits_sell option:selected").val()+"-ids-"
				+$("#market_credits2_sell option:selected").val()+"-ids-"
				+$("#market_wcoins_sell option:selected").val()+"-ids-"
				+$("#mark_ip_check option:selected").val()
			
			;
			
			$.post("acps.php", {
				boidmware: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//page2
	$( "#onChsubeasdandigmpages" ).on('change', function() {
		var getAllValues = 
		
				$("#m_page0:checked").length+"-ids-"
				+$("#m_page1:checked").length+"-ids-"
				+$("#m_page2:checked").length+"-ids-"
				+$("#m_page3:checked").length+"-ids-"
				+$("#m_page4:checked").length+"-ids-"
				+$("#m_page5:checked").length+"-ids-"
				+$("#m_page6:checked").length+"-ids-"
				+$("#m_page7:checked").length+"-ids-"
				+$("#m_page8:checked").length+"-ids-"
				+$("#m_page9:checked").length+"-ids-"
				+$("#m_page10:checked").length+"-ids-"
				+$("#m_page11:checked").length+"-ids-"
				+$("#m_page12:checked").length+"-ids-"
				+$("#m_page13:checked").length+"-ids-"
				+$("#m_page14:checked").length+"-ids-"
				+$("#m_page15:checked").length+"-ids-"
				+$("#m_page16:checked").length+"-ids-"
				+$("#mark_default option:selected").val()
			
			;
			
			$.post("acps.php", {
				onChsubeasdandigmpages: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>