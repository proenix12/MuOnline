
<?php if($_SESSION['admin_panel'] == 'ok') { ?>

		<ul class="middleNavA">
            <li <?php if($_GET['op3'] == 'Find_By_Name') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Character_manage-id-Find_By_Name.html" title=""><span style="height:30px;">Search Character</span></a></li>
			<li <?php if($_GET['op3'] == 'Find_Acc_Chars') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Character_manage-id-Find_Acc_Chars.html" title=""><span style="height:30px;">Find Account Characters</span></a></li>
			<li <?php if($_GET['op3'] == 'Get_Inventory') { echo'style="opacity:0.6;color:#DF3A01;"'; }; ?>><a href="-id-admincp-id-Character_manage-id-Get_Inventory.html" title=""><span style="height:30px;">Get Inventory</span></a></li>
        </ul>
		
		<div class="divider"><span></span></div>
		
			<?php if($mvcore['admincp_msg_output'] == 'on') { ?><div id="errorDrop"></div><?php }; ?>
			
		<?php if($_GET['op3'] == 'Find_By_Name') { ?> <!-- Find_By_Name -->
		<div class="widget fluid" id="onChsubCharSM">
			<div class="whead"><h6>Character Manage</h6><h6 style="float:right;color:#DF0101;">Make sure user is offline !!</h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter Character Name:</b></label></div>
                        <div class="grid9"><input id="chname" name="chname" type="text"></div>
                    </div>
                    <div class="formRow">
                        <div class="grid3"><label>Username:</label></div>
                        <div class="grid9"><input id="username" readonly="readonly" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Character Status:</label></div>
						<div class="grid9">
							<select style="width:100%;padding-left:5px;opacity:0.6;" id="cstatus" name="cstatus" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value='0' style="padding-left:5px;">Normal (0)</option>
								<option value='1' style="padding-left:5px;">Banned (1)</option>
								<option value='8' style="padding-left:5px;">Game Master Test (8)</option>
								<option value='16' style="padding-left:5px;">Game Master (16)</option>
								<option value='32' style="padding-left:5px;">Administrator (32)</option>
							</select>
						</div>					
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Experience:</label></div>
                        <div class="grid9"><input id="exp" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Level Up Points:</label></div>
                        <div class="grid9"><input id="lup" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Zen ( Money ):</label></div>
                        <div class="grid9"><input id="zen" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>Class:</label></div>
						<div class="grid9">
							<select style="width:100%;padding-left:5px;opacity:0.6;" id="class" name="class" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value='0' style="padding-left:5px;">Dark Wizard</option>
								<option value='1' style="padding-left:5px;">Soul Master</option>
								<option value='2' style="padding-left:5px;">Grand Master</option>
								<option value='3' style="padding-left:5px;">Grand Master JPN</option>
								<option value='16' style="padding-left:5px;">Dark Knight</option>
								<option value='17' style="padding-left:5px;">Blade Knight</option>
								<option value='18' style="padding-left:5px;">Blade Master</option>
								<option value='19' style="padding-left:5px;">Blade Master JPN</option>
								<option value='32' style="padding-left:5px;">Elf</option>
								<option value='33' style="padding-left:5px;">Muse Elf</option>
								<option value='34' style="padding-left:5px;">Hight Elf</option>
								<option value='35' style="padding-left:5px;">Hight Elf JPN</option>
								<option value='48' style="padding-left:5px;">Magic Gladiator</option>
								<option value='49' style="padding-left:5px;">Duel Master</option>
								<option value='50' style="padding-left:5px;">Duel Master JPN</option>
								<option value='64' style="padding-left:5px;">Dark Lord</option>
								<option value='65' style="padding-left:5px;">Lord Emperor</option>
								<option value='66' style="padding-left:5px;">Lord Emperor JPN</option>
								<?php if( $mvcore['db_season'] >= '4'){ ?>
								<option value='80' style="padding-left:5px;">Summoner</option>
								<option value='81' style="padding-left:5px;">Bloody Summoner</option>
								<option value='82' style="padding-left:5px;">Dimension Master</option>
								<option value='83' style="padding-left:5px;">Dimension Master JPN</option>
								<?php } ?>
								<?php if( $mvcore['db_season'] >= '6'){ ?>
								<option value='96' style="padding-left:5px;">Rage Fighter</option>
								<option value='97' style="padding-left:5px;">Fist Master</option>
								<option value='98' style="padding-left:5px;">Fist Master JPN</option>
								<?php } ?>
								<?php if( $mvcore['db_season'] >= '10'){ ?>
								<option value='112' style="padding-left:5px;">Grow Lancer</option>
								<option value='113' style="padding-left:5px;">Grow Lancer</option>
								<option value='114' style="padding-left:5px;">Grow Lancer JPN</option>
								<?php } ?>
							</select>
						</div>             
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Level:</label></div>
                        <div class="grid9"><input id="level" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Resets:</label></div>
                        <div class="grid9"><input id="resets" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Grand Resets:</label></div>
                        <div class="grid9"><input id="gr" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Master Grand Resets:</label></div>
                        <div class="grid9"><input id="mgr" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
						<div class="grid3"><label>PK Status:</label></div>
						<div class="grid9">
							<select style="width:100%;padding-left:5px;opacity:0.6;" id="pk" name="WEWQ" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value='6' style="padding-left:5px;">Phonoman 2</option>
								<option value='5' style="padding-left:5px;">Killer</option>
								<option value='4' style="padding-left:5px;">Almost Killer</option>
								<option value='3' style="padding-left:5px;">Commoner</option>
								<option value='2' style="padding-left:5px;">Almost Hero</option>
								<option value='1' style="padding-left:5px;">Hero 1</option>
								<option value='0' style="padding-left:5px;">Hero 2</option>
							</select>
						</div>
					</div>
					<div class="formRow">
						<div class="grid3"><label>Location:</label></div>
						<div class="grid9">
							<select style="width:100%;padding-left:5px;opacity:0.6;" id="map" name="aa" data-placeholder="Choose a option..." class="select" tabindex="2">
								<option value=""></option>
								<option value='0' style="padding-left:5px;">Lorencia</option>
								<option value='1' style="padding-left:5px;">Dungeon</option>
								<option value='2' style="padding-left:5px;">Devias</option>
								<option value='3' style="padding-left:5px;">Noria</option>
								<option value='4' style="padding-left:5px;">LostTower</option>
								<option value='6' style="padding-left:5px;">Arena</option>
								<option value='7' style="padding-left:5px;">Atlans</option>
								<option value='8' style="padding-left:5px;">Tarkan</option>
								<option value='30' style="padding-left:5px;">ValleyOfLoren</option>
								<option value='31' style="padding-left:5px;">LandOfTrial</option>
								<option value='33' style="padding-left:5px;">Aida</option>
								<option value='34' style="padding-left:5px;">Crywolf</option>
								<option value='57' style="padding-left:5px;">Raklion</option>
								<option value='51' style="padding-left:5px;">Elbeland</option>
								<option value='56' style="padding-left:5px;">Swamp</option>
								<option value='37' style="padding-left:5px;">Kantru1</option>
								<option value='38' style="padding-left:5px;">Kantru2</option>
								<option value='41' style="padding-left:5px;">Barracks</option>
								<option value='42' style="padding-left:5px;">Refuge</option>
								<option value='63' style="padding-left:5px;">Vulcanus</option>
								<option value='79' style="padding-left:5px;">Loren Market</option>
								<?php if( $mvcore['db_season'] >= '6'){ ?>
								<option value='80' style="padding-left:5px;">Kalrutan</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="formRow">
                        <div class="grid3"><label>Map X:</label></div>
                        <div class="grid9"><input id="x" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Map Y:</label></div>
                        <div class="grid9"><input id="y" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Strength:</label></div>
                        <div class="grid9"><input id="str" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Agility:</label></div>
                        <div class="grid9"><input id="agi" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Vitality:</label></div>
                        <div class="grid9"><input id="vit" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Energy:</label></div>
                        <div class="grid9"><input id="ene" name="title" type="text" value=""></div>
                    </div>
					<div class="formRow">
                        <div class="grid3"><label>Command:</label></div>
                        <div class="grid9"><input id="cmd" name="title" type="text" value=""></div>
                    </div>
		</div>
		<div class="formRow" style="margin-right:30px;">
			<a href="#" onclick="savechangesaccchar(); return false;" class="buttonM bGreen" style="height:20px;padding-top:15px;text-align:center;margin-top:20px;margin-bottom:20px;font-size:12px;width:100%;float:left;color:#ffffff;">Save Character Settings</a>
		</div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Find_Acc_Chars') { ?> <!-- Find_Acc_Chars -->
		<div class="widget fluid" id="onChsubCharfac">
			<div class="whead"><h6>Find Account Characters</h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter Character OR Account Name:</b></label></div>
                        <div class="grid9"><input id="echname" name="chname" type="text"></div>
                    </div>
		</div>
		<div class="widget">
            <div class="whead"><h6>Account Characters</h6></div>
            
            <table class="tDefault" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
						<td>Username</td>
                        <td>Name</td>
						<td>Level</td>
                        <td>Resets</td>
						<td>Grand Resets</td>
						<td>Master GResets</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody id="echotabled">
                </tbody>
            </table>
        </div>
		<?php }; ?>
		<?php if($_GET['op3'] == 'Get_Inventory') { ?> <!-- Get_Inventory -->
		<div class="widget fluid" id="onChsubCharfacas">
			<div class="whead"><h6>Search Characters Inventory</h6><h6 id="echtabitemhsadssa" style="float:right;"></h6></div>
					<div class="formRow">
                        <div class="grid3"><label><b>Enter Character Name:</b></label></div>
                        <div class="grid7"><input id="schname" name="schname" type="text"></div>
						<div class="grid2"><a href="#" id="get_invent_clean" class="buttonM bGreen" style="float:right;color:#ffffff;">Clean Char Inventory ?</a></div>
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
			$serialdec 		= substr($item,6,8); 		// Item Serial2
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
		$('#schname').val(getAllValues);
			$.post("acps.php", {
				onChsubCharfacas: getAllValues
			},
			function(data) {
				$('#echotabledHere').html(data);
			});
		});
		</script>
		<div class="widget fluid" id="asdasdsawqwwqfw">
			<div class="whead" id="out_item_name"><h6 style="float:right;color:#DF0101;">Make sure user is offline !!</h6><h6>Item Edit: <?php echo $inamesa; ?></h6><h6 style="float:right;" >Character:<?php echo $CharName; ?> / Old Hex:<?php echo $itemHex; ?> / Serial:<?php echo $serialdec; ?></h6></div>
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
						} elseif($check_item_ok[15] == 12 && $check_item_ok[16] >= 36 && $check_item_ok[16] <= 43 || $check_item_ok[15] == 12 && $check_item_ok[16] == 50 || $check_item_ok[15] == 12 && $check_item_ok[16] >= 49 && $check_item_ok[16] <= 50 || $check_item_ok[15] == 12 && $check_item_ok[16] >= 262 && $check_item_ok[16] <= 267) { // Wings level 3
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
												if($mvcore['sockets_opt_ep'] == 'yes' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') { //&& $s_sk_i[1] <= '36'
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
												if($mvcore['sockets_opt_ep'] == 'yes' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
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
												if($mvcore['sockets_opt_ep'] == 'yes' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
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
												if($mvcore['sockets_opt_ep'] == 'yes' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
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
												if($mvcore['sockets_opt_ep'] == 'yes' || $mvcore['sockets_opt_ep'] == 'yes' && $s_sk_i[1] == '254') {
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
					<div class="formRow"><a href="#" id="invitemeditsecondrun" class="buttonM bGreen" style="float:right;color:#ffffff;">Save Item New Options</a></div>
		</div>
		<?php }; ?>
		<div id="echotabledHereshow" style="display:none">
			<div class="fluid">
				<div class="widget grid8">
					<div class="whead"><h6>Inventory</h6><h6 style="float:right;color:#DF0101;">Make sure user is offline !!</h6></div>
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
					<div class="formRow" id="allOk_c" style="display:none;" ><a href="#" id="invitemedit4354erweun" class="buttonM bGreen" style="float:right;color:#ffffff;">Add Item</a></div>
					</div>
				</div>
			</div>
        </div>
		<div id="invsearchitReasa" style="display:none;">
           <div class="nNote nInformation">
                <p>Nothing Found.</p>
            </div>
        </div>
		<?php }; ?>
<script>
function savechangesaccchar() {
		var getAllValues = $("#chname").val()+"-ids-"
		+$("#cstatus option:selected").val()+"-ids-"
		+$("#exp").val()+"-ids-"
		+$("#lup").val()+"-ids-"
		+$("#zen").val()+"-ids-"
		+$("#class option:selected").val()+"-ids-"
		+$("#level").val()+"-ids-"
		+$("#resets").val()+"-ids-"
		+$("#gr").val()+"-ids-"
		+$("#mgr").val()+"-ids-"
		+$("#pk option:selected").val()+"-ids-"
		+$("#map option:selected").val()+"-ids-"
		+$("#x").val()+"-ids-"
		+$("#y").val()+"-ids-"
		+$("#str").val()+"-ids-"
		+$("#agi").val()+"-ids-"
		+$("#vit").val()+"-ids-"
		+$("#ene").val()+"-ids-"
		+$("#cmd").val();
			$.post("acps.php", {
				onChsubCharSMa: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				
				runChecker();
				
			});
};
$(document).ready(function() {
	
	//Clean Inventory
	$("#get_invent_clean").on('click', function() {
		
		if (confirm('Are you sure want to clean inventory?')) {
			var getAllValues = 
				$("#schname").val()
			;
				$.post("acps.php", {
					ytheeregwgjhgerhr: getAllValues
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
	$("#invitemedit4354erweun").on('click', function() {
		
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
		
			$("#schname").val()+"-ids-"
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
				invitemedit4354erweun: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
	
				$('#errorDrop').html(outputData[1]);
			
				$('#asdasdsawqwwqfw').hide();
				
				var getAllValues = outputData[0];
				$.post("acps.php", {
					onChsubCharfacas: getAllValues
				},
				function(data) {

					if(data == '1') {
						$('#echotabledHereshow').show();
						$('#invsearchitReasa').hide();
						$('#echotabledHere').html('');
					} else if(data == '') {
						$('#invsearchitReasa').show();
						$('#echotabledHereshow').hide();
					} else {
						$('#echotabledHereshow').show();
						$('#invsearchitReasa').hide();
						$('#echotabledHere').html(data);
					};
					
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
					
				if(data == '0') { $('#a_0_1').show(); $('#a_0_2').show(); $('#a_0_3').show(); $('#a_0_4').show(); $('#a_0_5').show(); $('#a_0_6').show(); }
				else if (data == '1') { $('#a_1_1').show(); $('#a_1_2').show(); $('#a_1_3').show(); $('#a_1_4').show(); $('#a_1_5').show(); $('#a_1_6').show(); }
				else if (data == '2') { $('#a_2_1').show(); $('#a_2_2').show(); $('#a_2_3').show(); $('#a_2_4').show(); $('#a_2_5').show(); $('#a_2_6').show(); }
				else if (data == '3') { $('#a_3_1').show(); $('#a_3_2').show(); $('#a_3_3').show(); $('#a_3_4').show(); $('#a_3_5').show(); $('#a_3_6').show(); }
				else if (data == '4') { $('#a_4_1').show(); $('#a_4_2').show(); $('#a_4_3').show(); $('#a_4_4').show(); $('#a_4_5').show(); $('#a_4_6').show(); }
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
	function invclickDeleteItem(elmnts) {
		$('#echtabitemhsadssa').html("<font color='#DF0101'>Please Wait...</font>");
		var getAllValues = elmnts;
			$.post("acps.php", { 
				invclickDeleteItem: getAllValues
			},
			function(data) {
				$('#errorDrop').html(data);
				
				var getAllValues = $("#schname").val();
				$.post("acps.php", {
					onChsubCharfacas: getAllValues
				},
				function(data) {
					$('#echtabitemhsadssa').html("");
					if(data == '1') {
						$('#echotabledHereshow').show();
						$('#invsearchitReasa').hide();
						$('#echotabledHere').html('');
					} else if(data == '') {
						$('#invsearchitReasa').show();
						$('#echotabledHereshow').hide();
					} else {
						$('#echotabledHereshow').show();
						$('#invsearchitReasa').hide();
						$('#echotabledHere').html(data);
					};
					
				});
				
				setTimeout(function() {
					$('#errorDrop').html("");
				}, 3000);
				
			});
			
		$('#schname').html("admin");
	};
	
$(document).ready(function() {
	//page1
	
	$("#chname").on('change keyup', function() {
		
		runChecker();

	});
	
	function runChecker() {
		var getAllValues = $("#chname").val();
			$.post("acps.php", {
				onChsubCharSMb: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				$('#username').val(outputData[0]);
				$('#cstatus').val(outputData[1]);
				$('#exp').val(outputData[2]);
				$('#lup').val(outputData[3]);
				$('#zen').val(outputData[4]);
				$('#class').val(outputData[5]);
				$('#level').val(outputData[6]);
				$('#resets').val(outputData[7]);
				$('#gr').val(outputData[8]);
				$('#mgr').val(outputData[9]);
				$('#pk').val(outputData[10]);
				$('#map').val(outputData[11]);
				$('#x').val(outputData[12]);
				$('#y').val(outputData[13]);
				$('#str').val(outputData[14]);
				$('#agi').val(outputData[15]);
				$('#vit').val(outputData[16]);
				$('#ene').val(outputData[17]);
				$('#cmd').val(outputData[18]);
					
					$("select").select2({ placeholder: "Choose a option..." });
			});
	}
	//Page2
	$("#onChsubCharfac").on('change', function() {
		var getAllValues = $("#echname").val();
			$.post("acps.php", {
				onChsubCharfac: getAllValues
			},
			function(data) {
				$('#echotabled').html(data);
			});
	});
	//Page3
	$("#onChsubCharfacas").on('change', function() {
		$('#echtabitemhsadssa').html("<font color='#DF0101'>Please Wait...</font>");
		var getAllValues = $("#schname").val();
			$.post("acps.php", {
				onChsubCharfacas: getAllValues
			},
			function(data) {
				$('#echtabitemhsadssa').html("");
				var ddata = data.replace(" ", "");
				
					if(ddata == '1') {
						$('#echotabledHereshow').show();
						$('#invsearchitReasa').hide();
						$('#echotabledHere').html('');
					} else if(ddata == '') {
						$('#invsearchitReasa').show();
						$('#echotabledHereshow').hide();
					} else {
						$('#echotabledHereshow').show();
						$('#invsearchitReasa').hide();
						$('#echotabledHere').html(data);
					};
					
			});
	});
	//Main Item Edit asdsadsadsa
	$("#invitemeditsecondrun").on('click', function() {
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
				invitemeditsecondrun: getAllValues
			},
			function(data) {
				var outputData = data.split("-ids-");
				
				$('#errorDrop').html(outputData[1]);
				
				$('#asdasdsawqwwqfw').hide();
				
				var getAllValues = outputData[0];
				$.post("acps.php", {
					onChsubCharfacas: getAllValues
				},
				function(data) {

					var ddata = data.replace(" ", "");

					if(ddata == '1') {
						$('#echotabledHereshow').show();
						$('#invsearchitReasa').hide();
						$('#echotabledHere').html('');
					} else if(ddata == '') {
						$('#invsearchitReasa').show();
						$('#echotabledHereshow').hide();
					} else {
						$('#echotabledHereshow').show();
						$('#invsearchitReasa').hide();
						$('#echotabledHere').html(data);
					};
					
				});
				
				setTimeout(function() {
					$('#errorDrop').html("");
				}, 3000);
				
			});
	});
});
</script>
<?php } else { echo'<div class="e_note">Please login to use this page!</div>'; }; ?>