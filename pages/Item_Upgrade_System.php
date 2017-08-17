<?php if(!$mvcore['Item_Upgrade_System'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Item_Upgrade_System'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
		<?php
			if(isset($_POST['item_tbu'])){
				$get_item_name = $_POST['item_name'];
				$get_item_hex = $_POST['item_hexc'];
				
				$iop 			= hexdec(substr($get_item_hex,2,2));
				
				if ($iop<128) { $iops	= $iop; } else { $iops	= $iop-128; }
				$itemlevel	= floor($iops/8); if($pvsItemUpgradeSystem != 'ok6436') { exit; };
				$item_level_left = $mvcore['it_max_lev'] - $itemlevel; //Calculate Item Level To be Added
				echo'<input id="inputhidenval" type="hidden" value="'.$item_level_left.'">';
				
				echo'
				<form action="" method="POST">
				<input name="item_hexcs" type="hidden" value="'.$get_item_hex.'">
				<div style="font-size:15px;padding:5px;">Item: '.$get_item_name.'</div>
				<table class="mvcore-table" cellpadding="0" cellspacing="0">
					<tr style="border-collapse: collapse; border-spacing: 0px;">
						<td style="padding: 6px 3px 6px 3px;">
							<select name="optupgrade" id="optupgrade" class="mvcore-select-main">
								<option value="1" selected> - '.main_p_item_upg_sys_choseopt.' - </option>
								<option value="23">'.main_p_item_upg_sys_levelupgr.'</option>
								
								<option value="24">'.main_p_item_upg_sys_luckupgr.'</option>
								<option value="25">'.main_p_item_upg_sys_skillupgr.'</option>
								<option value="26">'.main_p_item_upg_sys_refinarupgr.'</option>
							</select>
						</td>
						<td style="padding:0;"><button class="mvcore-button-style" name="item_tbu_process" type="submit">'.main_p_item_upg_sys_upgradebutton.'</button></td>
					</tr>
					<tr>
						<td><div id="OutputCosts">'.main_p_item_upg_sys_cost.': 0 '.$mvcore['money_name1'].'</div></td>
						<td><div id="OutputTime">'.main_p_item_upg_sys_time.': 0h 0m 0s</div></td>
					</tr>
				</table>
				<br>
				</form>
				';
			};
			
			if(isset($_POST['item_tbu_process'])){
				$get_item_hex = $_POST['item_hexcs'];
				$get_item_up_data = $_POST['optupgrade'];
				$useracc = $_SESSION['username']; // Get Loged In Username
				
				
				//Item Hex Recreate
					$id 			= substr($get_item_hex,0,2); 			// Item ID
					$iop 			= hexdec(substr($get_item_hex,2,2)); 		// Item Level/Skill/Option Data
					$dur			= substr($get_item_hex,4,2); 			// Item Durability
					$serial 		= substr($get_item_hex,6,8); 			// Item Serial
					$ioo 			= substr($get_item_hex,14,2); 			// Item Excellent Info/ Option
					$ioos 			= hexdec(substr($get_item_hex,14,2)); 	// Item Excellent Info/ Option
					$anc 			= substr($get_item_hex,16,2); 			// Ancient data
					$cat 			= substr($get_item_hex,18,1); 			// Item Type
					$ref 			= hexdec(substr($get_item_hex,19,1)); 		// Item Refinery
					$harmo 			= substr($get_item_hex,20,2); 			// Item harmony
					$sk 			= substr($get_item_hex,22,10); 			// Socket
		
$sy2 			= hexdec(substr($get_item_hex,0,2));		// Item ID
$itt2 			= hexdec(substr($get_item_hex,18,2));		// Item Type
$itemtype2 		= floor($itt2/16);								// Item Type Fix

			//FOR Item ID 256+ 
			$iooaa 			= hexdec(substr($get_item_hex,14,2)); 		// Item Excellent Info/ Option

		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($get_item_hex, 0,2))/32; // Category
			$ioosd = hexdec(substr($get_item_hex, 14,2)); // Excelent
			$ids = hexdec(substr($get_item_hex, 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioosd >= 128) { $iooaa = $ioosd - 128; $type = $type + 8; }; $itemtype2 = round($type); $sy2 = floor($syfd);
		};
			
			if( $iooaa >= '128' && $itemtype2 == '12' && $sy2 >= '0' ){
				
				$sy2 = 256 + $sy2;
				$ioo = hexdec($ioo) + 128;
				$ioo = dechex($ioo);
			}
			
$check_item_data = mssql_query("Select item_name, has_refinery, has_skill, category, id from MVCore_Wshopp where id='".$sy2."' and category='".$itemtype2."'");
$check_item_dat = mssql_fetch_row($check_item_data);
	
				if ($iop<128) { $iops	= $iop; } else { $iops	= $iop-128; }
				$itemlevel	= floor($iops/8);
				$item_level_left = $mvcore['it_max_lev'] - $itemlevel;//Calculate Item Level To be Added
	
				//calculate
				switch($get_item_up_data){
					case 23: $result_c = $mvcore['upsys_cost_1level'] * $item_level_left; $result_time = ($mvcore['upsys_cost_1level'] * $mvcore['upsys_int']) * $item_level_left; break;
					case 24: $result_c = $mvcore['upsys_cost_luck']; $result_time = $mvcore['upsys_cost_luck'] * $mvcore['upsys_int']; break;
					case 25: $result_c = $mvcore['upsys_cost_skill']; $result_time = $mvcore['upsys_cost_skill'] * $mvcore['upsys_int']; break;
					case 26: $result_c = $mvcore['upsys_cost_ref']; $result_time = $mvcore['upsys_cost_ref'] * $mvcore['upsys_int']; break;
					default: $result_c = 0; $result_time = 0; break;
				};
				
				//Time Result
				if($pvsItemUpgradeSystem != 'ok6436') { exit; };
				$new_time_expire = time() + $result_time;
					$time_calc_sec = $new_time_expire - time();
				$init = $time_calc_sec;
				$hours = floor($init / 3600);
				$minutes = floor(($init / 60) % 60);
				$seconds = $init % 60;

				$output_hms = "".main_p_item_upg_sys_in." $hours ".main_p_item_upg_sys_hour." $minutes ".main_p_item_upg_sys_minute." $seconds ".main_p_item_upg_sys_seconds.".";
				
	if(
		$check_item_dat[3] == '0' ||
		$check_item_dat[3] == '1' ||
		$check_item_dat[3] == '2' ||
		$check_item_dat[3] == '3' ||
		$check_item_dat[3] == '4' ||
		$check_item_dat[3] == '5' ||
		$check_item_dat[3] == '6' ||
		$check_item_dat[3] == '7' ||
		$check_item_dat[3] == '8' ||
		$check_item_dat[3] == '9' ||
		$check_item_dat[3] == '10' ||
		$check_item_dat[3] == '11' ||
		$check_item_dat[3] == '12' && $check_item_dat[4] >= '0' && $check_item_dat[4] <= '6' ||
		$check_item_dat[3] == '12' && $check_item_dat[4] >= '36' && $check_item_dat[4] <= '43' ||
		$check_item_dat[3] == '12' && $check_item_dat[4] >= '49' && $check_item_dat[4] <= '50' ||
		$check_item_dat[3] == '12' && $check_item_dat[4] >= '262' && $check_item_dat[4] <= '300' ||
		
		$check_item_dat[3] == '13' && $check_item_dat[4] >= '8' && $check_item_dat[4] <= '9' ||
		$check_item_dat[3] == '13' && $check_item_dat[4] >= '12' && $check_item_dat[4] <= '13' ||
		$check_item_dat[3] == '13' && $check_item_dat[4] >= '21' && $check_item_dat[4] <= '28'
		
	) { } else { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_sorritemcannot.'</div>';};
	
//Option data
if($get_item_up_data == '25') {
	if($check_item_dat[2] == '0'){ $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_upgrstpdosntexit.'</div>'; };
	if ($iop<128) { } else { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_alreadyehasskill.'</div>'; }
	$item_skill = '128';
} else { $item_skill = '0'; };

if($get_item_up_data == '23') { 
	if ($iop<128) { $iopsx	= $iop; } else { $iopsx	= $iop-128; }
	$itemlevel	= floor($iopsx/8);
	$itemLevelMinusOne = $mvcore['it_max_lev'];
	if($mvcore['it_max_lev'] == '13') {
		if($itemlevel >= $itemLevelMinusOne) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_haslevelopt.' 13</div>'; };
	} elseif($mvcore['it_max_lev'] == '15') {
		if($itemlevel >= $itemLevelMinusOne) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_haslevelopt.' 15</div>'; };
	}
	
	$item_level_left = $mvcore['it_max_lev'] - $itemlevel;//Calculate Item Level To be Added
		
	$item_level = 8 * $item_level_left;
	
} else { $item_level = '0'; };
if($pvsItemUpgradeSystem != 'ok6436') { exit; };
if($get_item_up_data == '24') {
	if ($iop<128) { $iops	= $iop; } else { $iops	= $iop-128; }
	$itemlevel	= floor($iops/8);
	$iopsad		= $iops-$itemlevel*8;
	if($iopsad<4){ } else { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_hasluckopt.'</div>'; }
	$item_luck = '4'; 
} else { $item_luck = '0';  };

if($get_item_up_data == '26') {
	if($check_item_dat[1] == '0'){ $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_dosntsuprefinary.'</div>'; };
	if($ref >= 8){ $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_hasrefinaryopt.'</div>'; };
	$item_refin = '8'; 
} else { $item_refin = '0'; };

$result_dec = $iop + $item_luck + $item_level + $item_skill;
$result_deca = $item_luck + $item_level + $item_skill;

if(strlen(dechex($result_dec)) == '1') { $result_dec = '0'.dechex($result_dec).''; } else { $result_dec = dechex($result_dec); }; //Fix opts

if( $iooaa >= '128' && $itemtype2 == '12' && $sy2 >= '0' ){
				
	$ioo = dechex($iooaa);
	
}
			
				//building HEX
					$hexs = "".$id."".$result_dec."".$dur."".$serial."".$ioo."".$anc."".$cat."".dechex($item_refin)."".$harmo."".$sk."";
				
					if($mvcore['db_season'] == '1') {
						$hexs = "".$id."".$result_dec."".$dur."".$serial."".$ioo."".$anc."00";
					};
				//end
				
if($mvcore['db_season'] >= '9') { $cvbins = '7680'; } elseif($mvcore['db_season'] == '1') { $cvbins = '1200'; } else { $cvbins = '3840'; }; // Warehouse
if($mvcore['db_season'] >= '9') { $cvbinsch = '7584'; } elseif($mvcore['db_season'] == '1') { $cvbinsch = '1080'; } else { $cvbinsch = '3776'; }; // Inventory

				$query		= mssql_query("declare @it varbinary(".$cvbins."); set @it=(select [Items] from [warehouse] where [AccountID]='".$useracc."'); print @it");
				$mycuritems	= mssql_get_last_message();

				$sqll	= substr($mycuritems,2);

				if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };
				if($mvcore['db_season'] >= '9') { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } elseif($mvcore['db_season'] == '1') { $hexlens = 'FFFFFFFFFFFFFFFFFFFF'; } else { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; };
				$icok = '0';
				if($mvcore['db_season'] >= '9') { $ilc = '480'; } elseif($mvcore['db_season'] == '1') { $ilc = '62'; } else { $ilc = '240'; };
					for( $i = 0 ; $i < $ilc; $i++ ) {
					$item[$i]		= substr($sqll,($hexlen*$i), $hexlen);			// item Type

					switch ($item[$i]) {case $get_item_hex: $icok +="1"; $item_now_empty[$i] = $hexlens; break; default: $icok += "0"; $item_now_empty[$i] = $item[$i]; break;};
					
					};

				$check_item_exist = $icok;
			
				$check_item_new_hex = implode(",", $item_now_empty); $check_item_new_hex = ('0x'.str_replace(",","",$check_item_new_hex).''); // Will set FOR Loop Array into single string
				
				$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
				$check_onlines = mssql_fetch_row($check_online);
				if( $check_onlines[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_charonlineexitgame.'</div>'; };
				
				$select_cred_check= mssql_query("Select ".$mvcore['credits_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']."='".$useracc."'");
				$s_c_check= mssql_fetch_row($select_cred_check);
				
				if($check_item_exist == '1') {} else { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_warenotfoundin.'</div>'; };
				if($result_c == 0){ $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_closeupgrsys.'</div>';};
				if($s_c_check[0] < $result_c) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_needmore.' '.$mvcore['money_name1'].'.</div>'; };
				if($get_item_hex == ''){ $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_warenotfoundin.'</div>';};
				
				$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
				$check_onlines = mssql_fetch_row($check_online);
				if( $check_onlines[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_charonlineexitgame.'</div>'; }; if($pvsItemUpgradeSystem != 'ok6436') { exit; };

					if($has_error >= '1'){} else {
						$edit_site = mssql_query("INSERT INTO MVCore_Item_Upgrade (item_original_hex,item_hex,memb___id,int_time,up_type) VALUES ('".$get_item_hex."','".$hexs."','".$useracc."','".$new_time_expire."','".$get_item_up_data."')");
						$run_qe = mssql_query("UPDATE warehouse SET Items = ".$check_item_new_hex." WHERE AccountId='".$useracc."'");
						$edit_site = mssql_query("UPDATE ".$mvcore['credits_table']." SET ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$result_c."' WHERE ".$mvcore['user_column']."='".$useracc."'");
						
						echo '<div class="mvcore-nNote mvcore-nSuccess">'.main_p_item_upg_sys_upgradeset.' '.$output_hms.'.</div>';
					};
			};
			
			if(isset($_POST['item_tbu_process_checkUp'])){
				$get_interv = $_POST['interv']; // As ID
				$useracc = $_SESSION['username']; // Get Loged In Username
				
				$item_upg_querys = mssql_query("SELECT item_hex,item_original_hex,int_time from MVCore_Item_Upgrade where int_time = '".$get_interv."'");
				$drop_item_upgs = mssql_fetch_row($item_upg_querys);

					if($drop_item_upgs[2] <= time()){
						if($mvcore['db_season'] >= '9' && strlen($drop_item_upgs[0]) == '32') { $exHex = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } else { $exHex = ''; };
						$Final_Result_hex = ''.$drop_item_upgs[0].''.$exHex.'';
					} else {
						if($mvcore['db_season'] >= '9' && strlen($drop_item_upgs[1]) == '32') { $exHex = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } else { $exHex = ''; };
						$Final_Result_hex = ''.$drop_item_upgs[1].''.$exHex.'';
					};	
					
$sy 			= hexdec(substr($drop_item_upgs[1],0,2));		// Item ID
$itt 			= hexdec(substr($drop_item_upgs[1],18,2));		// Item Type
$itemtype 		= floor($itt/16);								// Item Type Fix
//FOR Item ID 256+ 
			$ioo 			= hexdec(substr($drop_item_upgs[1],14,2)); 		// Item Excellent Info/ Option
			
		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($drop_item_upgs[1], 0,2))/32; // Category
			$ioo = hexdec(substr($drop_item_upgs[1], 14,2)); // Excelent
			$ids = hexdec(substr($drop_item_upgs[1], 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};
		
			if( $ioo >= '128' && $itemtype == '12' && $sy >= '0' ){
				
				$sy = 256 + $sy;
			}
			
			if( $ioo >= '128' && $itemtype == '13' && $sy >= '0'){
			
				$sy = 256 + $sy;
				
			}
			
			if( $ioo >= '128' && $itemtype == '14' && $sy >= '0'){
				
				$sy = 256 + $sy;
			
			}
			
$check_item_data = mssql_query("Select item_name, item_cost, zen_cost, can_buy_w_money2, can_buy_w_money1, can_buy_w_zen, is_harmony, bought_count, id, category, x, y, durability, is_socket from MVCore_Wshopp  where id='".$sy."' and category='".$itemtype."'");
$check_item_dat = mssql_fetch_row($check_item_data);

function smartsearch($whbin,$itemX,$itemY,$incSeason) {
	
	if($incSeason >= '9') { $hexlen = '64'; } elseif($incSeason == '1') { $hexlen = '20'; } else { $hexlen = '32'; };
	if($incSeason >= '9') { $ilc = '480'; } elseif($incSeason == '1') { $ilc = '60'; } else { $ilc = '240'; };
		
	if (substr($whbin,0,2)=='0x') $whbin=substr($whbin,2);	
	$items 	= str_repeat('0', $ilc);
	$itemsm = str_repeat('1', $ilc);
	$i	= 0; 
	while ($i<$ilc) {
		$_item	= substr($whbin,($hexlen*$i), $hexlen);
		$check_ref = hexdec(substr($_item, 19,1))/16;	
		$check_wid = hexdec(substr($_item, 14,2));		
			if($check_ref == 0.5)
				$type	= floor(hexdec(substr($_item,18,2))/16);
			else
				$type	= round(hexdec(substr($_item,18,2))/16);

			if ($check_wid <= '127') { $last_try=hexdec(substr($_item,0,2)); $check_two = $last_try; }
			elseif ($check_wid >= '128') { $last_try=hexdec(substr($_item,0,2)); $check_two = $last_try+'256'; }

		if($incSeason == '1') {
			$type = hexdec(substr($_item, 0,2))/32; // Category
			$ioo = hexdec(substr($_item, 14,2)); // Excelent
			$ids = hexdec(substr($_item, 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $type = round($type); $check_two = floor($syfd);
		};
		
		$res= mssql_fetch_row(mssql_query("select [x],[y] from [MVCore_Wshopp] where [id]='".$check_two."' and [category]='".$type."'"));
		
		$y	= 0;
		while($y<$res[1]) {
			$y++;$x=0;
			while($x<$res[0]) {
				$items	= substr_replace($items, '1', ($i+$x)+(($y-1)*8), 1);
				$x++;	
			} 
		}	
		$i++;
	}
				
	$y	= 0;
	while($y<$itemY) {
		$y++;$x=0;
		while($x<$itemX) {
			$x++;
			$spacerq[$x+(8*($y-1))] = true;
		} 
	}
	$walked	= 0;
	$i	= 0;
	while($i<$ilc) {
		if (isset($spacerq[$i])) {
			$itemsm	= substr_replace($itemsm, '0', $i-1, 1);
			$last	= $i;
			$walked++;
		}
		if ($walked==count($spacerq)) $i=$ilc;
		$i++;
	}
	$useforlength	= substr($itemsm,0,$last);
	$findslotlikethis='^'.str_replace('++','+',str_replace('1','+[0-1]+', $useforlength));
	$i=0;$nx=0;$ny=0;
	while ($i<$ilc) {
		if ($nx==8) { $ny++; $nx=0; }
		if ((eregi($findslotlikethis,substr($items, $i, strlen($useforlength)))) && ($itemX+$nx<9) && ($itemY+$ny<16))
			return $i;
		$i++;
		$nx++;
	}
	return 1337;
}

if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };

if($mvcore['db_season'] >= '9') { $cvbins = '7680'; } elseif($mvcore['db_season'] == '1') { $cvbins = '1200'; } else { $cvbins = '3840'; }; // Warehouse
if($mvcore['db_season'] >= '9') { $cvbinsch = '7584'; } elseif($mvcore['db_season'] == '1') { $cvbinsch = '1080'; } else { $cvbinsch = '3776'; }; // Inventory

$query		= mssql_query("declare @it varbinary(".$cvbins."); set @it=(select [Items] from [warehouse] where [AccountID]='".$useracc."'); print @it");
$mycuritems	= mssql_get_last_message();

$newitem	= $Final_Result_hex;
$test		= 0;
$slot 		= smartsearch($mycuritems,$check_item_dat[10],$check_item_dat[11],$mvcore['db_season']);
$test		= $slot*$hexlen;

$mynewitems = substr_replace($mycuritems, $newitem, ($test+2), $hexlen); 
if($pvsItemUpgradeSystem != 'ok6436') { exit; };
				$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
				$check_onlines = mssql_fetch_row($check_online);
				if( $check_onlines[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_charonlineexitgame.'</div>'; };
				
				if( $drop_item_upgs[0] == '' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_movedtoware.'</div>'; };
				
				if($slot == 1337) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_item_upg_sys_wareisfull.'</div>'; };
				
				if($has_error >= '1'){ } else {
					$up_data = mssql_query("UPDATE warehouse SET Items = ".$mynewitems." WHERE AccountId='".$useracc."'");
					$up_data = mssql_query("delete from MVCore_Item_Upgrade where int_time='".$drop_item_upgs[2]."'");
					
					echo '<div class="mvcore-nNote mvcore-nSuccess">'.main_p_item_upg_sys_itemmoedtoware.'</div>';
					
				};
			};
		?>
<?php
	$useracc = $_SESSION['username']; // Get Loged In Username
	$item_upg_query = mssql_query("SELECT top ".$mvcore['top_select']." item_hex, int_time, item_original_hex, up_type from MVCore_Item_Upgrade where memb___id = '".$useracc."'");
	$drop_item_upgas = mssql_fetch_row($item_upg_query);
	if($drop_item_upgas[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_item_upg_sys_listemptwaretoupgr.'</div>'; } else {
?>
				<table class="mvcore-table" cellpadding="0" cellspacing="0">
					<tr class="mvcore-tabletr">
						<td><?php echo main_p_item_upg_sys_item;?></td>
						<td><?php echo main_p_item_upg_sys_upgradetime;?></td>
						<td><?php echo main_p_item_upg_sys_stoportake;?></td>
					</tr>
		<?php
			$useracc = $_SESSION['username']; // Get Loged In Username
			$item_upg_query = mssql_query("SELECT top ".$mvcore['top_select']." item_hex, int_time, item_original_hex, up_type from MVCore_Item_Upgrade where memb___id = '".$useracc."'");
			for($i=0;$i < mssql_num_rows($item_upg_query);++$i) {
			$drop_item_upg = mssql_fetch_row($item_upg_query);
			
			$sya 			= hexdec(substr($drop_item_upg[0],0,2));		// Item ID
			$itta 			= hexdec(substr($drop_item_upg[0],18,2));		// Item Type
			$itemtypea 		= floor($itta/16);								// Item Type Fix

		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($drop_item_upg[0], 0,2))/32; // Category
			$ioo = hexdec(substr($drop_item_upg[0], 14,2)); // Excelent
			$ids = hexdec(substr($drop_item_upg[0], 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtypea = round($type); $sya = floor($syfd);
		};
		
			$check_item_data = mssql_query("Select name, cost, cost_zen, pay_type_gc, pay_type_c, pay_type_zen, harmony, bought_times, item_exc_type, id, cat, x, y, dur, sk from MVCore_Wshopp  where id='".$sya."' and cat='".$itemtypea."'");
			$check_item_dat = mssql_fetch_row($check_item_data);

				$time_calc_sec = $drop_item_upg[1] - time();
				$init = $time_calc_sec;
				$hours = floor($init / 3600);
				$minutes = floor(($init / 60) % 60);
				$seconds = $init % 60;

					if($hours <= '0'){ $hours = '0'; };
					if($minutes <= '0'){ $minutes = '0'; };
					if($seconds <= '0'){ $seconds = '0'; };
				$output_hms = "$hours ".main_p_item_upg_sys_hour." $minutes ".main_p_item_upg_sys_minute." $seconds ".main_p_item_upg_sys_seconds.".";
				
				if($drop_item_upg[1] <= time()){ $drop_button = "".main_p_item_upg_sys_takeitem.""; } 
				else { $drop_button = "".main_p_item_upg_sys_stop.""; };
				
$sy 			= hexdec(substr($drop_item_upg[0],0,2)); 		// Item ID
$serial 		= hexdec(substr($drop_item_upg[2],6,8)); 		// Item Serial
$itt 			= hexdec(substr($drop_item_upg[2],18,2)); 		// Item Type
$itemtype 		= floor($itt/16);						// Item Type Fix
$iop 			= hexdec(substr($drop_item_upg[2],2,2)); 		// Item Level/Skill/Option Data
$itemdur		= hexdec(substr($drop_item_upg[2],4,2)); 		// Item Durability
$ioo 			= hexdec(substr($drop_item_upg[2],14,2)); 		// Item Excellent Info/ Option
$ioosecon 		= hexdec(substr($drop_item_upg[2],14,1)); 		// AD option 1 2 3 4 5 6 7
$ac 			= hexdec(substr($drop_item_upg[2],16,2)); 		// Ancient data

$item_socket[1] = hexdec(substr($drop_item_upg[2],22,2)); 		// Socket 1
$item_socket[2] = hexdec(substr($drop_item_upg[2],24,2)); 		// Socket 2
$item_socket[3] = hexdec(substr($drop_item_upg[2],26,2)); 		// Socket 3
$item_socket[4] = hexdec(substr($drop_item_upg[2],28,2));		// Socket 4
$item_socket[5] = hexdec(substr($drop_item_upg[2],30,2)); 		// Socket 5

$item_harmony 	= hexdec(substr($drop_item_upg[2],20,1)); 		// Item harmony
$item_harm_val 	= hexdec(substr($drop_item_upg[2],21,1)); 		// Item harmony Value
$item_refinary 	= hexdec(substr($drop_item_upg[2],19,1)); 		// Item Refinery

		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($drop_item_upg[2], 0,2))/32; // Category
			$ioo = hexdec(substr($drop_item_upg[2], 14,2)); // Excelent
			$ids = hexdec(substr($drop_item_upg[2], 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};
		
include"system/engine_s_fnc.php";

if($drop_item_upg[3] == '23'){ $drop_plus = '<font color=green><b>'.main_p_item_upg_sys_itemlevelupgrade.'</b></font><br><br>'; }
elseif($drop_item_upg[3] == '24'){ $drop_plus = '<font color=green><b>'.main_p_item_upg_sys_itemlckupgrade.'</b></font><br><br>'; }
elseif($drop_item_upg[3] == '26'){ $drop_plus = '<font color=green><b>'.main_p_item_upg_sys_itemrefinupgrade.'</b></font><br><br>'; }
elseif($drop_item_upg[3] == '25'){ $drop_plus = '<font color=green><b>'.main_p_item_upg_sys_itemskillupgrade.'</b></font><br><br>'; };

if (file_exists("system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif")) { 
	$image_load = "system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif"; 
} else { 
	$image_load = 'system/engine_images/webshop/item_images/no-img.gif'; 
};

// Item Information Combine
$drop_item_info ='<table><tr valign=top><td> '.$drop_plus.' <img src='.$image_load.'><br>'.$iname.' '.$item_has_def.''.$item_has_dmg.''.$item_need_dur.''.$item_need_level.''.$item_class_need.''.$other_item_infos.''.$fenrir.'<font color=#cc7fcc>'.$ref.'</font>'.$joh_info_drop.'<font color=#7fb2ff>'.$skill.''.$luck.''.$itemoptionname.''.$itemoptionnamess.''.$db_item_info.''.$itemoptionnames.''.$anc_option.'</font><font color=#ff19ff>'.$socketinfos.'</font>'.$sok_info_drop1.''.$sok_info_drop2.''.$sok_info_drop3.''.$sok_info_drop4.''.$sok_info_drop5.'</td></tr></table>';
					
				echo'
					<tr style="border-collapse: collapse; border-spacing: 0px;" onMouseover="ddrivetip(\''.$drop_item_info.'\')" onMouseout="hideddrivetip()">
					<td style="padding: 6px 3px 6px 3px;">'.$inames.'</td>
					<td style="padding:0;">'.$output_hms.'</td>
					<td style="padding:0;"><form action="" method="POST"><input name="interv" type="hidden" value="'.$drop_item_upg[1].'"><button class="mvcore-button-style" name="item_tbu_process_checkUp" type="submit">'.$drop_button.'</button></form></td>
					</tr>
				';
				
			};
		?>		
				</table>
	<?php } ?>
<br><div><?php echo main_p_item_upg_sys_itemcheaptaketime;?></div>
<script>
var SecondsTohhmmss = function(totalSeconds) {
  var hours   = Math.floor(totalSeconds / 3600);
  var minutes = Math.floor((totalSeconds - (hours * 3600)) / 60);
  var seconds = totalSeconds - (hours * 3600) - (minutes * 60);

  // round seconds
  seconds = Math.round(seconds * 100) / 100
  
	var timeTextName = '<?php echo main_p_item_upg_sys_time; ?>';
	
  var result = timeTextName + ": " + (hours < 10 ? "0" + hours : hours);
      result += "h " + (minutes < 10 ? "0" + minutes : minutes);
      result += "m " + (seconds  < 10 ? "0" + seconds : seconds) + "s";
  return result;
}

	$( "#optupgrade" ).on('change keyup paste', function() {
		var upIntSys = '<?php echo $mvcore['upsys_int']; ?>';
		var costLevel = '<?php echo $mvcore['upsys_cost_1level']; ?>';
			var reizLevel = $('#inputhidenval').val();
			var itemCostLev = costLevel * reizLevel;
		var costLuck = '<?php echo $mvcore['upsys_cost_luck']; ?>';
		var costSkill = '<?php echo $mvcore['upsys_cost_skill']; ?>';
		var costRef = '<?php echo $mvcore['upsys_cost_ref']; ?>';
		
		var costTextName = '<?php echo main_p_item_upg_sys_cost; ?>';

		var datSelected = $('#optupgrade option:selected').val();
			if(datSelected == '23') {
				var calcSeconds = Math.floor((costLevel * upIntSys) * reizLevel);
				
				var cTime = SecondsTohhmmss(calcSeconds);
				
				$('#OutputTime').html(cTime);
				$('#OutputCosts').html(costTextName + ": " + itemCostLev + " Credits");
			} else if(datSelected == '24') {
				var calcSeconds = Math.floor(costLuck * upIntSys);
				var cTime = SecondsTohhmmss(calcSeconds);
				
				$('#OutputTime').html(cTime);
				$('#OutputCosts').html(costTextName + ": " + costLuck + " Credits");
			} else if(datSelected == '25') {
				var calcSeconds = Math.floor(costSkill * upIntSys);
				var cTime = SecondsTohhmmss(calcSeconds);
				
				$('#OutputTime').html(cTime);
				$('#OutputCosts').html(costTextName + ": " + costSkill + " Credits");
			} else if(datSelected == '26') {
				var calcSeconds = Math.floor(costRef * upIntSys);
				var cTime = SecondsTohhmmss(calcSeconds);
				
				$('#OutputTime').html(cTime);
				$('#OutputCosts').html(costTextName + ": " + costRef + " Credits");
			}

	});
</script>		
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>