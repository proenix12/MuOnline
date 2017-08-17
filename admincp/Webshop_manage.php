
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Webshop_Settings') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Webshop_manage-id-Webshop_Settings.html" title=""><span style="height:30px;">Webshop Settings</span></a></li>
            <li <?php if($_GET['op3'] == 'Webshop_Category_manage') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Webshop_manage-id-Webshop_Category_manage.html" title=""><span style="height:30px;">Category Manage</span></a></li>
            <li <?php if($_GET['op3'] == 'webshop_log') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Webshop_manage-id-webshop_log.html" title=""><span style="height:30px;">Bought Item Log</span></a></li>
		</ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?><?php if($mvcore['Webshop'] != 'on') { echo '<font color="red"><u><b>Webshop</b></u> Is Disabled In "<b>Enable/Disable Pages</b>"</font>'; }; ?>

		<?php if($_GET['op3'] == 'webshop_log') { ?> <!-- webshop_log -->
		<div class="widget">
            <div class="whead">
					<div class="formRow" style="height:0px;">
						<div class="grid2" style="margin-top:-17px;margin-left:-13px;"><h6>Webshop Bought Item Log</h6></div>
						<div class="grid3" style="margin-top:-14px;float:right;"><input id="ecoaSearch" name="ecoaSearch" type="text" placeholder="Enter Character Or Account" value=""></div>
                    </div>
			</div>
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>Item Name</td>
						<td>Item Hex ( Serial )</td>
						<td>Bought</td>
						<td>Item Cost</td>
						<td>Date</td>
						
                    </tr>
                </thead>
                <tbody id="echooutHere">
					<?php
						$sys_starts = mssql_query("select top 100 name,hex,cost,boughtby,date,type from MVCore_Wshopp_Item_Log order by date desc");
						for($i=0;$i < mssql_num_rows($sys_starts);++$i) {
							$drop_info = mssql_fetch_row($sys_starts);
					
							$sys_startold = mssql_query("select name from character where AccountId = '".$drop_info[3]."'");
							$drop_infsold = mssql_fetch_row($sys_startold);
							
							if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };
							
							$item[$i]		= substr($drop_info[1],(0), $hexlen);			// item Type
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
							
								if($drop_info[5] == '3') {
									$Cost_Type = ''.$drop_info[2].' Zen';
								}
								elseif($drop_info[5] == '2') {
									$Cost_Type = ''.$drop_info[2].' '.$mvcore['money_name1'].'';
								}
								elseif($drop_info[5] == '1') {
									$Cost_Type = ''.$drop_info[2].' '.$mvcore['money_name2'].'';
								};
								
								$date = date ("Y-m-d H:i", $drop_info[4]);
								
							echo'
										<tr '.$show_on_off[$i].'>
											<td>'.$inames.'</td>
											<td style="text-transform: uppercase;">'.$drop_info[1].' ( '.$itemSerial.' )</td>
											<td>'.$drop_infsold[0].' ( '.$drop_info[3].' )</td>
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
		<?php if($_GET['op3'] == 'Webshop_Settings') { ?> <!-- Webshop_Settings -->
		<div id="boidmwasdsaare">
		<div class="widget fluid">
			<div class="whead"><h6>Webshop Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Socket Options:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="sockets_parts" name="sockets_parts" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="no" <?php if($mvcore['sockets_parts'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>Set & Weapon Socket Opt. For All Socket Items ( Fire, Water, Wind, Ice, Lightning, Ground )</option> 
								<option value="yes" <?php if($mvcore['sockets_parts'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Set & Weapon Socket Opt. Separated ( Water, Wind, Ground ) & ( Fire, Ice, Lightning )</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Allow Equal Socket Buy:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="eqe_sockets" name="eqe_sockets" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['eqe_sockets'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['eqe_sockets'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Socket Sphere ( Changes Socket Option Values. ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="sockets_opt_ep" name="sockets_opt_ep" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['sockets_opt_ep'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Till Sphere 1</option> 
								<option value="no" <?php if($mvcore['sockets_opt_ep'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>Till Sphere 5 ( S5,6,7,8,9,10 )</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Socket Lib:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="socket_type" name="socket_type" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="webzen" <?php if($mvcore['socket_type'] == 'webzen') { echo 'selected'; } else { echo ''; }; ?>>Webzen</option> 
								<option value="scfmt" <?php if($mvcore['socket_type'] == 'scfmt') { echo 'selected'; } else { echo ''; }; ?>>SCFMT</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Difference Between <?php echo $mvcore['money_name2'];?> And <?php echo $mvcore['money_name1'];?>:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="gold_dif" name="gold_dif" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="5" <?php if($mvcore['gold_dif'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Percent Difference</option> 
								<option value="10" <?php if($mvcore['gold_dif'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Percent Difference</option> 
								<option value="15" <?php if($mvcore['gold_dif'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Percent Difference</option> 
								<option value="20" <?php if($mvcore['gold_dif'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Percent Difference</option> 
								<option value="25" <?php if($mvcore['gold_dif'] == '25') { echo 'selected'; } else { echo ''; }; ?>>25 Percent Difference</option> 
								<option value="30" <?php if($mvcore['gold_dif'] == '30') { echo 'selected'; } else { echo ''; }; ?>>30 Percent Difference</option> 
								<option value="35" <?php if($mvcore['gold_dif'] == '35') { echo 'selected'; } else { echo ''; }; ?>>35 Percent Difference</option> 
								<option value="40" <?php if($mvcore['gold_dif'] == '40') { echo 'selected'; } else { echo ''; }; ?>>40 Percent Difference</option> 
								<option value="45" <?php if($mvcore['gold_dif'] == '45') { echo 'selected'; } else { echo ''; }; ?>>45 Percent Difference</option> 
								<option value="50" <?php if($mvcore['gold_dif'] == '50') { echo 'selected'; } else { echo ''; }; ?>>50 Percent Difference</option> 
								<option value="55" <?php if($mvcore['gold_dif'] == '55') { echo 'selected'; } else { echo ''; }; ?>>55 Percent Difference</option> 
								<option value="60" <?php if($mvcore['gold_dif'] == '60') { echo 'selected'; } else { echo ''; }; ?>>60 Percent Difference</option> 
								<option value="65" <?php if($mvcore['gold_dif'] == '65') { echo 'selected'; } else { echo ''; }; ?>>65 Percent Difference</option> 
								<option value="70" <?php if($mvcore['gold_dif'] == '70') { echo 'selected'; } else { echo ''; }; ?>>70 Percent Difference</option> 
								<option value="75" <?php if($mvcore['gold_dif'] == '75') { echo 'selected'; } else { echo ''; }; ?>>75 Percent Difference</option> 
								<option value="80" <?php if($mvcore['gold_dif'] == '80') { echo 'selected'; } else { echo ''; }; ?>>80 Percent Difference</option> 
								<option value="85" <?php if($mvcore['gold_dif'] == '85') { echo 'selected'; } else { echo ''; }; ?>>85 Percent Difference</option> 
								<option value="90" <?php if($mvcore['gold_dif'] == '90') { echo 'selected'; } else { echo ''; }; ?>>90 Percent Difference</option> 
								<option value="95" <?php if($mvcore['gold_dif'] == '95') { echo 'selected'; } else { echo ''; }; ?>>95 Percent Difference</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Webshop Excellent Socket Item:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="socket_exc_item" name="socket_exc_item" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="drop_error" <?php if($mvcore['socket_exc_item'] == 'drop_error') { echo 'selected'; } else { echo ''; }; ?>>Disables Buy IF Socket Selected ( Will Drop Error )</option>
								<option value="yes" <?php if($mvcore['socket_exc_item'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option>
								<option value="no" <?php if($mvcore['socket_exc_item'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Webshop Excellent On Refinery Item:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="w_exc_refin_item" name="w_exc_refin_item" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="drop_error" <?php if($mvcore['w_exc_refin_item'] == 'drop_error') { echo 'selected'; } else { echo ''; }; ?>>Disables Buy IF Refinery Selected ( Will Drop Error )</option>
								<option value="yes" <?php if($mvcore['w_exc_refin_item'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['w_exc_refin_item'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option>  
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Webshop Excellent On Ancient Item:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="w_exc_anc_item" name="w_exc_anc_item" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="drop_error" <?php if($mvcore['w_exc_anc_item'] == 'drop_error') { echo 'selected'; } else { echo ''; }; ?>>Disables Buy IF Refinery Selected ( Will Drop Error )</option>
								<option value="yes" <?php if($mvcore['w_exc_anc_item'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['w_exc_anc_item'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option>  
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Webshop Harmony On Ancient Item:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="w_harm_anc_item" name="w_harm_anc_item" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="drop_error" <?php if($mvcore['w_harm_anc_item'] == 'drop_error') { echo 'selected'; } else { echo ''; }; ?>>Disables Buy IF Ancient Selected ( Will Drop Error )</option>
								<option value="yes" <?php if($mvcore['w_harm_anc_item'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['w_harm_anc_item'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option>  
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Allow Ancient Option Buy:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="anc_opt_buy" name="anc_opt_buy" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['anc_opt_buy'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['anc_opt_buy'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Allow Harmony Option Buy:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="har_opt_buy" name="har_opt_buy" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['har_opt_buy'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['har_opt_buy'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Allow Socket Option Buy:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="soc_opt_buy" name="soc_opt_buy" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['soc_opt_buy'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['soc_opt_buy'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Allow Refinery Option Buy:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="refi_opt_buy" name="refi_opt_buy" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['refi_opt_buy'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['refi_opt_buy'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Harmony Opt Cost Increase ( 0 = Off ):</label></div>
                        <div class="grid9"><input id="har_opt_inc" name="har_opt_inc" type="text" value="<?php echo $mvcore['har_opt_inc']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Socket Opt Cost Increase ( 0 = Off ):</label></div>
                        <div class="grid9"><input id="sock_opt_inc" name="sock_opt_inc" type="text" value="<?php echo $mvcore['sock_opt_inc']; ?>"></div>
                    </div>
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>Elemental System</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Pentagram Max Level:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="pentagram_it_max_lev" name="pentagram_it_max_lev" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['pentagram_it_max_lev'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Level 0 ( Level Buy Disabled )</option> 
								<option value="1" <?php if($mvcore['pentagram_it_max_lev'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Level 1</option> 
								<option value="2" <?php if($mvcore['pentagram_it_max_lev'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Level 2</option> 
								<option value="3" <?php if($mvcore['pentagram_it_max_lev'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Level 3</option> 
								<option value="4" <?php if($mvcore['pentagram_it_max_lev'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Level 4</option> 
								<option value="5" <?php if($mvcore['pentagram_it_max_lev'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Level 5</option> 
								<option value="6" <?php if($mvcore['pentagram_it_max_lev'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Level 6</option> 
								<option value="7" <?php if($mvcore['pentagram_it_max_lev'] == '7') { echo 'selected'; } else { echo ''; }; ?>>Level 7</option> 
								<option value="8" <?php if($mvcore['pentagram_it_max_lev'] == '8') { echo 'selected'; } else { echo ''; }; ?>>Level 8</option> 
								<option value="9" <?php if($mvcore['pentagram_it_max_lev'] == '9') { echo 'selected'; } else { echo ''; }; ?>>Level 9</option> 
								<option value="10" <?php if($mvcore['pentagram_it_max_lev'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Level 10</option>
								<option value="11" <?php if($mvcore['pentagram_it_max_lev'] == '11') { echo 'selected'; } else { echo ''; }; ?>>Level 11</option>
								<option value="12" <?php if($mvcore['pentagram_it_max_lev'] == '12') { echo 'selected'; } else { echo ''; }; ?>>Level 12</option>
								<option value="13" <?php if($mvcore['pentagram_it_max_lev'] == '13') { echo 'selected'; } else { echo ''; }; ?>>Level 13</option>
								<option value="14" <?php if($mvcore['pentagram_it_max_lev'] == '14') { echo 'selected'; } else { echo ''; }; ?>>Level 14</option>
								<option value="15" <?php if($mvcore['pentagram_it_max_lev'] == '15') { echo 'selected'; } else { echo ''; }; ?>>Level 15</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Pentagram Slot Max:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="element_socket_max" name="element_socket_max" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['element_socket_max'] == '1') { echo 'selected'; } else { echo ''; }; ?>>1 Slot</option> 
								<option value="2" <?php if($mvcore['element_socket_max'] == '2') { echo 'selected'; } else { echo ''; }; ?>>2 Slots</option> 
								<option value="3" <?php if($mvcore['element_socket_max'] == '3') { echo 'selected'; } else { echo ''; }; ?>>3 Slots</option> 
								<option value="4" <?php if($mvcore['element_socket_max'] == '4') { echo 'selected'; } else { echo ''; }; ?>>4 Slots</option> 
								<option value="5" <?php if($mvcore['element_socket_max'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Slots</option> 
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Ertel Max Level:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="ertel_max_level" name="ertel_max_level" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['ertel_max_level'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Level 0 ( Level Buy Disabled )</option> 
								<option value="1" <?php if($mvcore['ertel_max_level'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Level 1</option> 
								<option value="2" <?php if($mvcore['ertel_max_level'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Level 2</option> 
								<option value="3" <?php if($mvcore['ertel_max_level'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Level 3</option> 
								<option value="4" <?php if($mvcore['ertel_max_level'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Level 4</option> 
								<option value="5" <?php if($mvcore['ertel_max_level'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Level 5</option> 
								<option value="6" <?php if($mvcore['ertel_max_level'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Level 6</option> 
								<option value="7" <?php if($mvcore['ertel_max_level'] == '7') { echo 'selected'; } else { echo ''; }; ?>>Level 7</option> 
								<option value="8" <?php if($mvcore['ertel_max_level'] == '8') { echo 'selected'; } else { echo ''; }; ?>>Level 8</option> 
								<option value="9" <?php if($mvcore['ertel_max_level'] == '9') { echo 'selected'; } else { echo ''; }; ?>>Level 9</option> 
								<option value="10" <?php if($mvcore['ertel_max_level'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Level 10</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Ertel Slot Option Cost:</label></div>
                        <div class="grid9"><input id="ertel_slopt" name="ertel_slopt" type="text" value="<?php echo $mvcore['ertel_slopt']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Ertel Level Cost:</label></div>
                        <div class="grid9"><input id="ertel_level" name="ertel_level" type="text" value="<?php echo $mvcore['ertel_level']; ?>"></div>
                    </div>
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>Item Buy With <?php echo $mvcore['money_name1'];?></h6></div>
					<div class="formRow">
						<div class="grid3"><label>Allow Item Buy With <?php echo $mvcore['money_name1'];?>:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="cost_cred_to_creda" name="cost_cred_to_creda" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['cost_cred_to_creda'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['cost_cred_to_creda'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option>  
							</select>
						</div> 						
					</div>
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>Item Buy With Zen</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Allow Item Buy With Zen:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="cost_cred_to_zena" name="cost_cred_to_zena" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="yes" <?php if($mvcore['cost_cred_to_zena'] == 'yes') { echo 'selected'; } else { echo ''; }; ?>>Yes</option> 
								<option value="no" <?php if($mvcore['cost_cred_to_zena'] == 'no') { echo 'selected'; } else { echo ''; }; ?>>No</option>  
							</select>
						</div> 						
					</div>
					<div class="formRow" id="hideifsadqwdqw">
                        <div class="grid3"><label><?php echo $mvcore['money_name1'];?> Into Zen ( 1 <?php echo $mvcore['money_name1'];?> = ? zen ):</label></div>
                        <div class="grid9"><input id="cost_cred_to_zen" name="cost_cred_to_zen" type="text" value="<?php echo $mvcore['cost_cred_to_zen']; ?>"></div>
                    </div>
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>Item Options</h6></div>
					<div class="formRow" id="optfeeww">
						<div class="grid3"><label>Webshop Item Max Level:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="it_max_lev" name="it_max_lev" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['it_max_lev'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Max +0 ( Level Buy Hidden )</option> 
								<option value="1" <?php if($mvcore['it_max_lev'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Max +1</option> 
								<option value="2" <?php if($mvcore['it_max_lev'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Max +2</option> 
								<option value="3" <?php if($mvcore['it_max_lev'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Max +3</option> 
								<option value="4" <?php if($mvcore['it_max_lev'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Max +4</option> 
								<option value="5" <?php if($mvcore['it_max_lev'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Max +5</option> 
								<option value="6" <?php if($mvcore['it_max_lev'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Max +6</option> 
								<option value="7" <?php if($mvcore['it_max_lev'] == '7') { echo 'selected'; } else { echo ''; }; ?>>Max +7</option> 
								<option value="8" <?php if($mvcore['it_max_lev'] == '8') { echo 'selected'; } else { echo ''; }; ?>>Max +8</option> 
								<option value="9" <?php if($mvcore['it_max_lev'] == '9') { echo 'selected'; } else { echo ''; }; ?>>Max +9</option> 
								<option value="10" <?php if($mvcore['it_max_lev'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Max +10</option> 
								<option value="11" <?php if($mvcore['it_max_lev'] == '11') { echo 'selected'; } else { echo ''; }; ?>>Max +11</option> 
								<option value="12" <?php if($mvcore['it_max_lev'] == '12') { echo 'selected'; } else { echo ''; }; ?>>Max +12</option> 
								<option value="13" <?php if($mvcore['it_max_lev'] == '13') { echo 'selected'; } else { echo ''; }; ?>>Max +13 ( S3 S4 )</option>
								<option value="14" <?php if($mvcore['it_max_lev'] == '14') { echo 'selected'; } else { echo ''; }; ?>>Max +14</option> 
								<option value="15" <?php if($mvcore['it_max_lev'] == '15') { echo 'selected'; } else { echo ''; }; ?>>Max +15 ( S5 S6 S7 S8 S9 + )</option>  
							</select>
						</div> 						
					</div>
					<div class="formRow" id="htthyymnetr">
						<div class="grid3"><label>Webshop Max AD Option ( Jewel Of Life ):</label></div>
						<div class="grid9">
							<select style="width:100%;" id="max_ad_opt_jof" name="max_ad_opt_jof" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['max_ad_opt_jof'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Max 0 ( AD Buy Hidden )</option>
								<option value="1" <?php if($mvcore['max_ad_opt_jof'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Max 1</option>
								<option value="2" <?php if($mvcore['max_ad_opt_jof'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Max 2</option>
								<option value="3" <?php if($mvcore['max_ad_opt_jof'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Max 3</option>
								<option value="4" <?php if($mvcore['max_ad_opt_jof'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Max 4</option>
								<option value="5" <?php if($mvcore['max_ad_opt_jof'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Max 5</option>
								<option value="6" <?php if($mvcore['max_ad_opt_jof'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Max 6</option>
								<option value="7" <?php if($mvcore['max_ad_opt_jof'] == '7') { echo 'selected'; } else { echo ''; }; ?>>Max 7</option>
							</select>
						</div> 						
					</div>
					<div class="formRow" id="dssadqwqwq">
						<div class="grid3"><label>Webshop Max Excellent Options:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="max_exc_opt" name="max_exc_opt" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['max_exc_opt'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Max 1</option>
								<option value="2" <?php if($mvcore['max_exc_opt'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Max 2</option>
								<option value="3" <?php if($mvcore['max_exc_opt'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Max 3</option>
								<option value="4" <?php if($mvcore['max_exc_opt'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Max 4</option>
								<option value="5" <?php if($mvcore['max_exc_opt'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Max 5</option>
								<option value="6" <?php if($mvcore['max_exc_opt'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Max 6</option>
							</select>
						</div> 						
					</div>
					<div class="formRow" id="dssadqwqwqrggwe">
						<div class="grid3"><label>Webshop WINGS Max Excellent Options:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="wing_max_exc_opt" name="wing_max_exc_opt" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['wing_max_exc_opt'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Max 1</option>
								<option value="2" <?php if($mvcore['wing_max_exc_opt'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Max 2</option>
								<option value="3" <?php if($mvcore['wing_max_exc_opt'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Max 3</option>
								<option value="4" <?php if($mvcore['wing_max_exc_opt'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Max 4</option>
								<option value="5" <?php if($mvcore['wing_max_exc_opt'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Max 5</option>
								<option value="6" <?php if($mvcore['wing_max_exc_opt'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Max 6</option>
							</select>
						</div> 						
					</div>
					<div class="formRow" id="dssawdsdqqwq">
						<div class="grid3"><label>Webshop Max Socket Options:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="max_sock_opt" name="max_sock_opt" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1" <?php if($mvcore['max_sock_opt'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Max 1</option>
								<option value="2" <?php if($mvcore['max_sock_opt'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Max 2</option>
								<option value="3" <?php if($mvcore['max_sock_opt'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Max 3</option>
								<option value="4" <?php if($mvcore['max_sock_opt'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Max 4</option>
								<option value="5" <?php if($mvcore['max_sock_opt'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Max 5</option>
							</select>
						</div> 						
					</div>
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>Webshop Discount Settings</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Webshop Discount:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="shop_disc" name="shop_disc" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="on" <?php if($mvcore['shop_disc'] == 'on') { echo 'selected'; } else { echo ''; }; ?>>On</option> 
								<option value="off" <?php if($mvcore['shop_disc'] == 'off') { echo 'selected'; } else { echo ''; }; ?>>Off</option>  
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Discount Active Interval:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="shop_disc_start" name="shop_disc_start" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="300" <?php if($mvcore['shop_disc_start'] == '300') { echo 'selected'; } else { echo ''; }; ?>>5 Minutes</option>
								<option value="600" <?php if($mvcore['shop_disc_start'] == '600') { echo 'selected'; } else { echo ''; }; ?>>10 Minutes</option>
								<option value="1200" <?php if($mvcore['shop_disc_start'] == '1200') { echo 'selected'; } else { echo ''; }; ?>>20 Minutes</option>
								<option value="1800" <?php if($mvcore['shop_disc_start'] == '1800') { echo 'selected'; } else { echo ''; }; ?>>30 Minutes</option>
								<option value="3600" <?php if($mvcore['shop_disc_start'] == '3600') { echo 'selected'; } else { echo ''; }; ?>>1 Hour</option>
								<option value="7200" <?php if($mvcore['shop_disc_start'] == '7200') { echo 'selected'; } else { echo ''; }; ?>>2 Hours</option>
								<option value="10800" <?php if($mvcore['shop_disc_start'] == '10800') { echo 'selected'; } else { echo ''; }; ?>>3 Hours</option>
								<option value="14400" <?php if($mvcore['shop_disc_start'] == '14400') { echo 'selected'; } else { echo ''; }; ?>>4 Hours</option>
								<option value="18000" <?php if($mvcore['shop_disc_start'] == '18000') { echo 'selected'; } else { echo ''; }; ?>>5 Hours</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Discount Percent:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="shop_perc" name="shop_perc" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
								<option value=""></option> 
								<option value="5" <?php if($mvcore['shop_perc'] == '5') { echo 'selected'; } else { echo ''; }; ?>>5 Percent</option> 
								<option value="10" <?php if($mvcore['shop_perc'] == '10') { echo 'selected'; } else { echo ''; }; ?>>10 Percent</option> 
								<option value="15" <?php if($mvcore['shop_perc'] == '15') { echo 'selected'; } else { echo ''; }; ?>>15 Percent</option> 
								<option value="20" <?php if($mvcore['shop_perc'] == '20') { echo 'selected'; } else { echo ''; }; ?>>20 Percent</option> 
								<option value="25" <?php if($mvcore['shop_perc'] == '25') { echo 'selected'; } else { echo ''; }; ?>>25 Percent</option> 
								<option value="30" <?php if($mvcore['shop_perc'] == '30') { echo 'selected'; } else { echo ''; }; ?>>30 Percent</option> 
								<option value="35" <?php if($mvcore['shop_perc'] == '35') { echo 'selected'; } else { echo ''; }; ?>>35 Percent</option> 
								<option value="40" <?php if($mvcore['shop_perc'] == '40') { echo 'selected'; } else { echo ''; }; ?>>40 Percent</option> 
								<option value="45" <?php if($mvcore['shop_perc'] == '45') { echo 'selected'; } else { echo ''; }; ?>>45 Percent</option> 
								<option value="50" <?php if($mvcore['shop_perc'] == '50') { echo 'selected'; } else { echo ''; }; ?>>50 Percent</option> 
								<option value="55" <?php if($mvcore['shop_perc'] == '55') { echo 'selected'; } else { echo ''; }; ?>>55 Percent</option> 
								<option value="60" <?php if($mvcore['shop_perc'] == '60') { echo 'selected'; } else { echo ''; }; ?>>60 Percent</option> 
								<option value="65" <?php if($mvcore['shop_perc'] == '65') { echo 'selected'; } else { echo ''; }; ?>>65 Percent</option> 
								<option value="70" <?php if($mvcore['shop_perc'] == '70') { echo 'selected'; } else { echo ''; }; ?>>70 Percent</option> 
								<option value="75" <?php if($mvcore['shop_perc'] == '75') { echo 'selected'; } else { echo ''; }; ?>>75 Percent</option> 
								<option value="80" <?php if($mvcore['shop_perc'] == '80') { echo 'selected'; } else { echo ''; }; ?>>80 Percent</option> 
								<option value="85" <?php if($mvcore['shop_perc'] == '85') { echo 'selected'; } else { echo ''; }; ?>>85 Percent</option> 
								<option value="90" <?php if($mvcore['shop_perc'] == '90') { echo 'selected'; } else { echo ''; }; ?>>90 Percent</option> 
								<option value="95" <?php if($mvcore['shop_perc'] == '95') { echo 'selected'; } else { echo ''; }; ?>>95 Percent</option> 
							</select>
						</div>             
					</div>
					<div class="formRow">
						<div class="grid3"><label>Discount Start:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="shop_start_at" name="shop_start_at" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="1438999200" <?php if($mvcore['shop_start_at'] == '1438999200') { echo 'selected'; } else { echo ''; }; ?>>At 4:00 GMT+2</option>
								<option value="1438999200" <?php if($mvcore['shop_start_at'] == '1438999200') { echo 'selected'; } else { echo ''; }; ?>>At 5:00 GMT+2</option>
								<option value="1439002800" <?php if($mvcore['shop_start_at'] == '1439002800') { echo 'selected'; } else { echo ''; }; ?>>At 6:00 GMT+2</option>
								<option value="1439006400" <?php if($mvcore['shop_start_at'] == '1439006400') { echo 'selected'; } else { echo ''; }; ?>>At 7:00 GMT+2</option>
								<option value="1439010000" <?php if($mvcore['shop_start_at'] == '1439010000') { echo 'selected'; } else { echo ''; }; ?>>At 8:00 GMT+2</option>
								<option value="1439013600" <?php if($mvcore['shop_start_at'] == '1439013600') { echo 'selected'; } else { echo ''; }; ?>>At 9:00 GMT+2</option>
								<option value="1439017200" <?php if($mvcore['shop_start_at'] == '1439017200') { echo 'selected'; } else { echo ''; }; ?>>At 10:00 GMT+2</option>
								<option value="1439020800" <?php if($mvcore['shop_start_at'] == '1439020800') { echo 'selected'; } else { echo ''; }; ?>>At 11:00 GMT+2</option>
								<option value="1439024400" <?php if($mvcore['shop_start_at'] == '1439024400') { echo 'selected'; } else { echo ''; }; ?>>At 12:00 GMT+2</option>
								<option value="1439028000" <?php if($mvcore['shop_start_at'] == '1439028000') { echo 'selected'; } else { echo ''; }; ?>>At 13:00 GMT+2</option>
								<option value="1439031600" <?php if($mvcore['shop_start_at'] == '1439031600') { echo 'selected'; } else { echo ''; }; ?>>At 14:00 GMT+2</option>
								<option value="1439035200" <?php if($mvcore['shop_start_at'] == '1439035200') { echo 'selected'; } else { echo ''; }; ?>>At 15:00 GMT+2</option>
								<option value="1439038800" <?php if($mvcore['shop_start_at'] == '1439038800') { echo 'selected'; } else { echo ''; }; ?>>At 16:00 GMT+2</option>
								<option value="1439042400" <?php if($mvcore['shop_start_at'] == '1439042400') { echo 'selected'; } else { echo ''; }; ?>>At 17:00 GMT+2</option>
								<option value="1439046000" <?php if($mvcore['shop_start_at'] == '1439046000') { echo 'selected'; } else { echo ''; }; ?>>At 18:00 GMT+2</option>
								<option value="1439049600" <?php if($mvcore['shop_start_at'] == '1439049600') { echo 'selected'; } else { echo ''; }; ?>>At 19:00 GMT+2</option>
								<option value="1439053200" <?php if($mvcore['shop_start_at'] == '1439053200') { echo 'selected'; } else { echo ''; }; ?>>At 20:00 GMT+2</option>
								<option value="1439056800" <?php if($mvcore['shop_start_at'] == '1439056800') { echo 'selected'; } else { echo ''; }; ?>>At 21:00 GMT+2</option>
								<option value="1439060400" <?php if($mvcore['shop_start_at'] == '1439060400') { echo 'selected'; } else { echo ''; }; ?>>At 22:00 GMT+2</option>
								<option value="1439064000" <?php if($mvcore['shop_start_at'] == '1439064000') { echo 'selected'; } else { echo ''; }; ?>>At 23:00 GMT+2</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Webshop Discount Every Week:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="shop_dayname" name="shop_dayname" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="Monday" <?php if($mvcore['shop_dayname'] == 'Monday') { echo 'selected'; } else { echo ''; }; ?>>Monday</option>
								<option value="Tuesday" <?php if($mvcore['shop_dayname'] == 'Tuesday') { echo 'selected'; } else { echo ''; }; ?>>Tuesday</option>
								<option value="Wednesday" <?php if($mvcore['shop_dayname'] == 'Wednesday') { echo 'selected'; } else { echo ''; }; ?>>Wednesday</option>
								<option value="Thursday" <?php if($mvcore['shop_dayname'] == 'Thursday') { echo 'selected'; } else { echo ''; }; ?>>Thursday</option>
								<option value="Friday" <?php if($mvcore['shop_dayname'] == 'Friday') { echo 'selected'; } else { echo ''; }; ?>>Friday</option>
								<option value="Saturday" <?php if($mvcore['shop_dayname'] == 'Saturday') { echo 'selected'; } else { echo ''; }; ?>>Saturday</option>
								<option value="Sunday" <?php if($mvcore['shop_dayname'] == 'Sunday') { echo 'selected'; } else { echo ''; }; ?>>Sunday</option>
							</select>
						</div> 						
					</div>
					
		</div>
		<div class="widget fluid">
			<div class="whead"><h6>Webshop Option Cost Settings</h6></div>
					<div class="formRow">
                        <div class="grid3"><label>Level Cost:</label></div>
                        <div class="grid9"><input id="cost_level" name="cost_level" type="text" value="<?php echo $mvcore['cost_level']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>AD Option Cost:</label></div>
                        <div class="grid9"><input id="cost_opt" name="cost_opt" type="text" value="<?php echo $mvcore['cost_opt']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Luck Cost:</label></div>
                        <div class="grid9"><input id="cost_luck" name="cost_luck" type="text" value="<?php echo $mvcore['cost_luck']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Skill Cost:</label></div>
                        <div class="grid9"><input id="cost_skill" name="cost_skill" type="text" value="<?php echo $mvcore['cost_skill']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Refinery Cost:</label></div>
                        <div class="grid9"><input id="cost_ref" name="cost_ref" type="text" value="<?php echo $mvcore['cost_ref']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Excellent Option Cost:</label></div>
                        <div class="grid9"><input id="cost_exe" name="cost_exe" type="text" value="<?php echo $mvcore['cost_exe']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Ancient ( 5 ) Cost:</label></div>
                        <div class="grid9"><input id="cost_anc1" name="cost_anc1" type="text" value="<?php echo $mvcore['cost_anc1']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Ancient ( 10 ) Cost:</label></div>
                        <div class="grid9"><input id="cost_anc2" name="cost_anc2" type="text" value="<?php echo $mvcore['cost_anc2']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Black Fenrir Cost:</label></div>
                        <div class="grid9"><input id="cost_fenblack" name="cost_fenblack" type="text" value="<?php echo $mvcore['cost_fenblack']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Blue Fenrir Cost:</label></div>
                        <div class="grid9"><input id="cost_fenblue" name="cost_fenblue" type="text" value="<?php echo $mvcore['cost_fenblue']; ?>"></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Gold Fenrir Cost:</label></div>
                        <div class="grid9"><input id="cost_fengold" name="cost_fengold" type="text" value="<?php echo $mvcore['cost_fengold']; ?>"></div>
                    </div>
		</div>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Webshop_Category_manage') { ?> <!-- Webshop_Category_manage -->
		<div class="widget fluid" id="onChssasubewpages">
			<div class="whead"><h6>Webshop Category Pages</h6></div>
					<div class="formRow">
						<div class="grid3"><label>Default Webshop Category:</label></div>
						<div class="grid9">
							<select style="width:100%;" id="wshop_default" name="wshop_default" style="display: none;" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value="0" <?php if($mvcore['wshop_default'] == '0') { echo 'selected'; } else { echo ''; }; ?>>Swords Category</option>
								<option value="1" <?php if($mvcore['wshop_default'] == '1') { echo 'selected'; } else { echo ''; }; ?>>Axes Category</option>
								<option value="2" <?php if($mvcore['wshop_default'] == '2') { echo 'selected'; } else { echo ''; }; ?>>Scepters Category</option>
								<option value="3" <?php if($mvcore['wshop_default'] == '3') { echo 'selected'; } else { echo ''; }; ?>>Spears Category</option>
								<option value="4" <?php if($mvcore['wshop_default'] == '4') { echo 'selected'; } else { echo ''; }; ?>>Bows Category</option>
								<option value="5" <?php if($mvcore['wshop_default'] == '5') { echo 'selected'; } else { echo ''; }; ?>>Staffs Category</option>
								<option value="6" <?php if($mvcore['wshop_default'] == '6') { echo 'selected'; } else { echo ''; }; ?>>Shields Category</option>
								<option value="7" <?php if($mvcore['wshop_default'] == '7') { echo 'selected'; } else { echo ''; }; ?>>Helms Category</option>
								<option value="8" <?php if($mvcore['wshop_default'] == '8') { echo 'selected'; } else { echo ''; }; ?>>Armor Category</option>
								<option value="9" <?php if($mvcore['wshop_default'] == '9') { echo 'selected'; } else { echo ''; }; ?>>Pants Category</option>
								<option value="10" <?php if($mvcore['wshop_default'] == '10') { echo 'selected'; } else { echo ''; }; ?>>Gloves Category</option>
								<option value="11" <?php if($mvcore['wshop_default'] == '11') { echo 'selected'; } else { echo ''; }; ?>>Boots Category</option>
								<option value="12" <?php if($mvcore['wshop_default'] == '12') { echo 'selected'; } else { echo ''; }; ?>>Accessories Category</option>
								<option value="13" <?php if($mvcore['wshop_default'] == '13') { echo 'selected'; } else { echo ''; }; ?>>Miscellaneous 1 Category</option>
								<option value="14" <?php if($mvcore['wshop_default'] == '14') { echo 'selected'; } else { echo ''; }; ?>>Miscellaneous 2 Category</option>
								<option value="15" <?php if($mvcore['wshop_default'] == '15') { echo 'selected'; } else { echo ''; }; ?>>Scrolls Category</option>
							</select>
						</div> 						
					</div>
					<div class="formRow">
						<div class="grid3"><label>Webshop - Swords Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page1" <?php if($mvcore['wshop_page1'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Axes Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page2" <?php if($mvcore['wshop_page2'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Scepters Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page3" <?php if($mvcore['wshop_page3'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Spears Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page4" <?php if($mvcore['wshop_page4'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Bows Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page5" <?php if($mvcore['wshop_page5'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Staffs Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page6" <?php if($mvcore['wshop_page6'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Shields Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page7" <?php if($mvcore['wshop_page7'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Helms Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page8" <?php if($mvcore['wshop_page8'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Armor Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page9" <?php if($mvcore['wshop_page9'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Pants Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page10" <?php if($mvcore['wshop_page10'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Gloves Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page11" <?php if($mvcore['wshop_page11'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Boots Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page12" <?php if($mvcore['wshop_page12'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Accessories Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page13" <?php if($mvcore['wshop_page13'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Miscellaneous Items Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page14" <?php if($mvcore['wshop_page14'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Miscellaneous Items II Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page15" <?php if($mvcore['wshop_page15'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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
						<div class="grid3"><label>Webshop - Scrolls Page: </label></div>
						<div class="grid9 enabled_disabled">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="wshop_page16" <?php if($mvcore['wshop_page16'] == '1') { echo 'checked="checked"'; } ?> name="Login" type="checkbox">
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

	//Max Level
	$( "#optfeeww" ).on('change', function() {
			$.post("acps.php", {
				optfeeww: $("#it_max_lev option:selected").val()
			},
			function(data) {

			});
	});
	
	//Max AD
	$( "#htthyymnetr" ).on('change', function() {
			$.post("acps.php", {
				htthyymnetr: $("#max_ad_opt_jof option:selected").val()
			},
			function(data) {

			});
	});
	
	//Excellent Opt
	$( "#dssadqwqwq" ).on('change', function() {
		
		var getAllValues = 
		
				 $("#max_exc_opt option:selected").val()+"-ids-"
				+$("#wing_max_exc_opt option:selected").val()
			;
				
			$.post("acps.php", {
				dssadqwqwq: getAllValues
			},
			function(data) {

			});
	});
	
	//Excellent Opt 2 Wings
	$( "#dssadqwqwqrggwe" ).on('change', function() {
		
		var getAllValues = 
		
				 $("#max_exc_opt option:selected").val()+"-ids-"
				+$("#wing_max_exc_opt option:selected").val()
			;
				
			$.post("acps.php", {
				dssadqwqwq: getAllValues
			},
			function(data) {

			});
	});
	
	//Socket Opt
	$( "#dssawdsdqqwq" ).on('change', function() {
			$.post("acps.php", {
				dssawdsdqqwq: $("#max_sock_opt option:selected").val()
			},
			function(data) {

			});
	});
	
	if($("#cost_cred_to_zena option:selected").val() == 'no'){ $("#hideifsadqwdqw").hide() } else { $("#hideifsadqwdqw").show() };
	//page1
	$( "#boidmwasdsaare" ).on('change', function() {
		
		if($("#cost_cred_to_zena option:selected").val() == 'yes'){
			$("#hideifsadqwdqw").show()
			$.post("acps.php", {
				costcredtozena: 1
			},
			function(data) {

			});
		} else if($("#cost_cred_to_zena option:selected").val() == 'no'){
			$("#hideifsadqwdqw").hide()
			$.post("acps.php", {
				costcredtozena: 0
			},
			function(data) {

			});
		};
		
		if($("#cost_cred_to_creda option:selected").val() == 'yes'){
			$.post("acps.php", {
				costcredtocredaa: 1
			},
			function(data) {

			});
		} else if($("#cost_cred_to_creda option:selected").val() == 'no'){
			$.post("acps.php", {
				costcredtocredaa: 0
			},
			function(data) {

			});
		};
		
		var intdata = '604800';
		
		var getAllValues = 
		
				 $("#sockets_parts option:selected").val()+"-ids-"
				+$("#eqe_sockets option:selected").val()+"-ids-"
				+$("#socket_type option:selected").val()+"-ids-"
				+$("#gold_dif option:selected").val()+"-ids-"
				+$("#cost_cred_to_zen").val()+"-ids-"
				+$("#shop_disc option:selected").val()+"-ids-"
				+$("#shop_perc option:selected").val()+"-ids-"
				+intdata+"-ids-"
				+$("#cost_level").val()+"-ids-"
				+$("#cost_opt").val()+"-ids-"
				+$("#cost_luck").val()+"-ids-"
				+$("#cost_skill").val()+"-ids-"
				+$("#cost_ref").val()+"-ids-"
				+$("#cost_exe").val()+"-ids-"
				+$("#cost_anc1").val()+"-ids-"
				+$("#cost_anc2").val()+"-ids-"
				+$("#cost_fenblack").val()+"-ids-"
				+$("#cost_fenblue").val()+"-ids-"
				+$("#cost_fengold").val()+"-ids-"

				+$("#cost_cred_to_zena option:selected").val()+"-ids-"
				+$("#cost_cred_to_creda option:selected").val()+"-ids-"
				+$("#shop_start_at option:selected").val()+"-ids-"
				+$("#shop_dayname option:selected").val()+"-ids-"
				
				+$("#sockets_opt_ep option:selected").val()+"-ids-"
				+$("#socket_exc_item option:selected").val()+"-ids-"
				
				+$("#anc_opt_buy option:selected").val()+"-ids-"
				+$("#har_opt_buy option:selected").val()+"-ids-"
				+$("#soc_opt_buy option:selected").val()+"-ids-"
				+$("#refi_opt_buy option:selected").val()+"-ids-"
				+$("#har_opt_inc").val()+"-ids-"
				+$("#sock_opt_inc").val()+"-ids-"
				+$("#element_socket_max option:selected").val()+"-ids-"
				+$("#ertel_slopt").val()+"-ids-"
				+$("#ertel_level").val()+"-ids-"
				+$("#ertel_max_level option:selected").val()+"-ids-"
				+$("#pentagram_it_max_lev option:selected").val()+"-ids-"
				
				+$("#w_exc_refin_item option:selected").val()+"-ids-"
				+$("#w_exc_anc_item option:selected").val()+"-ids-"
				+$("#w_harm_anc_item option:selected").val()+"-ids-"
				
				+$("#shop_disc_start option:selected").val()
			
			;
			
			$.post("acps.php", {
				boidmwasdsaare: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	//page2
	$( "#onChssasubewpages" ).on('change', function() {
		var getAllValues = 
		
				$("#wshop_page1:checked").length+"-ids-"
				+$("#wshop_page2:checked").length+"-ids-"
				+$("#wshop_page3:checked").length+"-ids-"
				+$("#wshop_page4:checked").length+"-ids-"
				+$("#wshop_page5:checked").length+"-ids-"
				+$("#wshop_page6:checked").length+"-ids-"
				+$("#wshop_page7:checked").length+"-ids-"
				+$("#wshop_page8:checked").length+"-ids-"
				+$("#wshop_page9:checked").length+"-ids-"
				+$("#wshop_page10:checked").length+"-ids-"
				+$("#wshop_page11:checked").length+"-ids-"
				+$("#wshop_page12:checked").length+"-ids-"
				+$("#wshop_page13:checked").length+"-ids-"
				+$("#wshop_page14:checked").length+"-ids-"
				+$("#wshop_page15:checked").length+"-ids-"
				+$("#wshop_page16:checked").length+"-ids-"
				+$("#wshop_default option:selected").val()
			
			;
			
			$.post("acps.php", {
				onChssasubewpages: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
			});
	});
	
	//page2
	$( "#ecoaSearch" ).on('change', function() {
		var getAllValues = $("#ecoaSearch").val();
			
			$.post("acps.php", {
				acccharlogsearch: getAllValues
			},
			function(data) {
				$('#echooutHere').html(data);
			});
	});

});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>