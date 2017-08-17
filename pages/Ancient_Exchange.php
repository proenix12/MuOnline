
<?php if(!$mvcore['anc_mob_onoff'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['anc_mob_onoff'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div align="left"><?php echo''.ancient_exc_excyouritems.'';?></div>
<?php

if(in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'localhost', ''.GetHostDoamin().''))){
	
//== Post Start ==//
if(isset($_POST['itemexchs'])) {

//== Post Procedure Select ==//
$itemHex		= trim(isset($_POST['itemHex']) ? $_POST['itemHex'] : '');

$errors = array();
$success = array();

//== Main Info Get Script ==// 
$useracc = $_SESSION['username']; // Get Loged In Username
$time_stamp = time(); //PC Time

$sy 			= hexdec(substr($itemHex,0,2)); 		// Item ID
$serial 		= hexdec(substr($itemHex,6,8)); 		// Item Serial
$itt 			= hexdec(substr($itemHex,18,2)); 		// Item Type
$itemtype 		= floor($itt/16);						// Item Type Fix
$iop 			= hexdec(substr($itemHex,2,2)); 		// Item Level/Skill/Option Data
$itemdur		= hexdec(substr($itemHex,4,2)); 		// Item Durability
$ioo 			= hexdec(substr($itemHex,14,2)); 		// Item Excellent Info/ Option
$ioosecon 		= hexdec(substr($itemHex,14,1)); 		// AD option 1 2 3 4 5 6 7
$ac 			= hexdec(substr($itemHex,16,2)); 		// Ancient data

$item_socket[1] = hexdec(substr($itemHex,22,2)); 		// Socket 1
$item_socket[2] = hexdec(substr($itemHex,24,2)); 		// Socket 2
$item_socket[3] = hexdec(substr($itemHex,26,2)); 		// Socket 3
$item_socket[4] = hexdec(substr($itemHex,28,2));		// Socket 4
$item_socket[5] = hexdec(substr($itemHex,30,2)); 		// Socket 5
			
$item_harmony 	= hexdec(substr($itemHex,20,1)); 		// Item harmony
$item_harm_val 	= hexdec(substr($itemHex,21,1)); 		// Item harmony Value
$item_refinary 	= hexdec(substr($itemHex,19,1)); 		// Item Refinery

		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($itemHex, 0,2))/32; // Category
			$ioo = hexdec(substr($itemHex, 14,2)); // Excelent
			$ids = hexdec(substr($itemHex, 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};
		
include"system/engine_s_fnc.php";

//--------------
//Deleting Item From Warehouse
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
	$itema[$i]		= substr($sqll,($hexlen*$i), $hexlen);			// item Type

	switch ($itema[$i]) {case $itemHex: $icok += 1; $item_now_empty[$i] = $hexlens; break; default: $icok += 0; $item_now_empty[$i] = $itema[$i]; break;};
	
	};

$check_item_exist = $icok;

if($check_item_exist >= '1') {} else { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_itemnotfound.'</div>'; };

if(
	$itemtype == '12' || 
	$itemtype == '13' && $sy >= '0' && $sy <= '7' || 
	$itemtype == '13' && $sy >= '10' && $sy <= '11' || 
	$itemtype == '13' && $sy >= '14' && $sy <= '20' || 
	$itemtype == '13' && $sy >= '14' && $sy <= '20' || 
	$itemtype == '13' && $sy >= '29' || 
	$itemtype == '14' || 
	$itemtype == '15' || 
	$ac == '0'
){ $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.ancient_exc_itemtrysellnotallo.'</div>'; };

$check_item_new_hex = implode(",", $item_now_empty); $check_item_new_hex = ('0x'.str_replace(",","",$check_item_new_hex).''); // Will set FOR Loop Array into single string
	
//--------------
//item Cost Calculation
$AE_level_cost = $AE_level_count * $mvcore['anc_level_cost'];
if($AE_luck_cost == '1') { $luck_cost = $mvcore['anc_luck_cost']; } else { $luck_cost = '0'; } ; // Luck Cost
if($AE_ad_cost != '') { $ad_cost = $mvcore['anc_ad_cost'] * $AE_ad_cost; } else { $ad_cost = '0'; } ; // AD Cost
if($AE_skill_cost == '1') { $skill_cost = $mvcore['anc_skill_cost']; } else { $skill_cost = '0'; } ; // Skill Cost
if($AE_joh_cost != '0') { $joh_cost = $AE_joh_cost; }  else { $joh_cost = '0'; }; // Harmony Cost
$AE_exc_cost = $AE_exc_count * $mvcore['anc_exc_cost'];

$total_anc_cost = $mvcore['anc_item_cost'] + $AE_level_cost + $luck_cost + $ad_cost + $skill_cost + $joh_cost + $AE_exc_cost; // Total Item Cost without bonus.
//end
//--------------

$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
$check_onlines = mssql_fetch_row($check_online);
if( $check_onlines[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_charisonline.'</div>'; };
	
	
if($has_error >= '1'){} else {

//== Procedure Update Or Insert ==//
$edit_db = mssql_query("UPDATE warehouse SET Items = ".$check_item_new_hex." WHERE AccountId='".$useracc."'"); // Update Warehouse
$edit_db = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$total_anc_cost."' where ".$mvcore['user_column']." ='".$useracc."'"); // Give Credis
$edit_db = mssql_query("INSERT INTO MVCore_Ancient_Exchange_Log (ItemHex,memb___id,CreditsGot,date) VALUES ('".$itemHex."','".$useracc."','".$total_anc_cost."','".$time_stamp."')"); //Save Log
$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".$total_anc_cost."','0','From Ancient Exchange','".time()."','0')");
//== End Script ==// 

//== Success MSG ==//
echo '<div class="mvcore-nNote mvcore-nSuccess">'.ancient_exc_itemsuccessexnage.'</div>'; $message_edit = $success;}		
//== End Script ==// 
};
};
?>
<?php
$useracc = $_SESSION['username']; // Get Loged In Username
$check_ware = mssql_query("Select Items from warehouse where AccountID='".$useracc."'");
$check_ware_s = mssql_fetch_row($check_ware);
if($mvcore['db_season'] >= '9') { $cvbins = '7680'; } elseif($mvcore['db_season'] == '1') { $cvbins = '1200'; } else { $cvbins = '3840'; }; // Warehouse
if($mvcore['db_season'] >= '9') { $cvbinsch = '7584'; } elseif($mvcore['db_season'] == '1') { $cvbinsch = '1080'; } else { $cvbinsch = '3776'; }; // Inventory
$query		= mssql_query("declare @it varbinary(".$cvbins."); set @it=(select [Items] from [warehouse] where [AccountID]='".$useracc."'); print @it");
$mycuritems	= mssql_get_last_message();
$sqll	= substr($mycuritems,2);
if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };
if($mvcore['db_season'] >= '9') { $ilc = '480'; } elseif($mvcore['db_season'] == '1') { $ilc = '62'; } else { $ilc = '240'; };
$counted = 0;
for( $i = 0 ; $i < $ilc ; $i++ ) {
$item[$i]		= substr($sqll,($hexlen*$i), $hexlen);			// item Type
$sy 			= hexdec(substr($item[$i],0,2)); 		// Item ID
$serial 		= hexdec(substr($item[$i],6,8)); 		// Item Serial
$itt 			= hexdec(substr($item[$i],18,2)); 		// Item Type
$itemtype 		= floor($itt/16);						// Item Type Fix
$iop 			= hexdec(substr($item[$i],2,2)); 		// Item Level/Skill/Option Data
$itemdur		= hexdec(substr($item[$i],4,2)); 		// Item Durability
$ioo 			= hexdec(substr($item[$i],14,2)); 		// Item Excellent Info/ Option
$ioosecon 		= hexdec(substr($item[$i],14,1)); 		// AD option 1 2 3 4 5 6 7
$ac 			= hexdec(substr($item[$i],16,2)); 		// Ancient data
		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($item[$i], 0,2))/32; // Category
			$ioo = hexdec(substr($item[$i], 14,2)); // Excelent
			$ids = hexdec(substr($item[$i], 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};	
if($mvcore['db_season'] >= '9') { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } elseif($mvcore['db_season'] == '1') { $hexlens = 'FFFFFFFFFFFFFFFFFFFF'; } else { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; };
if(
	$item[$i] == $hexlens || 
	$itemtype == '12' || 
	$itemtype == '13' && $sy >= '0' && $sy <= '7' || 
	$itemtype == '13' && $sy >= '10' && $sy <= '11' || 
	$itemtype == '13' && $sy >= '14' && $sy <= '20' || 
	$itemtype == '13' && $sy >= '14' && $sy <= '20' || 
	$itemtype == '13' && $sy >= '29' || 
	$itemtype == '14' || 
	$itemtype == '15' || 
	$nameselect[11] == '0' || 
	$check_ware_s[0] == '' || 
	$check_ware_s[0] == '0x' || 
	$ac == '0'
){} else { $counted +=1; };
};
	if($counted == 0) { echo'<div class="mvcore-nNote mvcore-nInformation">'.ancient_exc_elisemptancs.'</div>'; } else {
?>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody>
	<tr class="mvcore-tabletr">
		<td><?php echo''.ancient_exc_ancientitems.'';?></td>
		<td><?php echo''.ancient_exc_estedmatvalue.'';?></td>
		<td><?php echo''.ancient_exc_exhcnagetocred.'';?></td>
	</tr>
<?PHP

$useracc = $_SESSION['username']; // Get Loged In Username

$check_ware = mssql_query("Select Items from warehouse where AccountID='".$useracc."'");
$check_ware_s = mssql_fetch_row($check_ware);

if($mvcore['db_season'] >= '9') { $cvbins = '7680'; } elseif($mvcore['db_season'] == '1') { $cvbins = '1200'; } else { $cvbins = '3840'; }; // Warehouse
if($mvcore['db_season'] >= '9') { $cvbinsch = '7584'; } elseif($mvcore['db_season'] == '1') { $cvbinsch = '1080'; } else { $cvbinsch = '3776'; }; // Inventory

$query		= mssql_query("declare @it varbinary(".$cvbins."); set @it=(select [Items] from [warehouse] where [AccountID]='".$useracc."'); print @it");
$mycuritems	= mssql_get_last_message();

$sqll	= substr($mycuritems,2);

if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };
if($pvsAncientExchange != 'ok7232') { exit; };
if($mvcore['db_season'] >= '9') { $ilc = '480'; } elseif($mvcore['db_season'] == '1') { $ilc = '62'; } else { $ilc = '240'; };

for( $i = 0 ; $i < $ilc ; $i++ ) {

$item[$i]		= substr($sqll,($hexlen*$i), $hexlen);			// item Type
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

		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($item[$i], 0,2))/32; // Category
			$ioo = hexdec(substr($item[$i], 14,2)); // Excelent
			$ids = hexdec(substr($item[$i], 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};
		
if($mvcore['db_season'] >= '9') { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } elseif($mvcore['db_season'] == '1') { $hexlens = 'FFFFFFFFFFFFFFFFFFFF'; } else { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; };

if(
	$item[$i] == $hexlens || 
	$itemtype == '12' || 
	$itemtype == '13' && $sy >= '0' && $sy <= '7' || 
	$itemtype == '13' && $sy >= '10' && $sy <= '11' || 
	$itemtype == '13' && $sy >= '14' && $sy <= '20' || 
	$itemtype == '13' && $sy >= '14' && $sy <= '20' || 
	$itemtype == '13' && $sy >= '29' || 
	$itemtype == '14' || 
	$itemtype == '15' || 
	$nameselect[11] == '0' || 
	$check_ware_s[0] == '' || 
	$check_ware_s[0] == '0x' || 
	$ac == '0'
){} else {
	
include("system/engine_s_fnc.php");

//item Cost Calculation

$AE_level_cost = $AE_level_count * $mvcore['anc_level_cost'];
if($AE_luck_cost == '1') { $luck_cost = $mvcore['anc_luck_cost']; } else { $luck_cost = '0'; } ; // Luck Cost
if($AE_ad_cost != '') { $ad_cost = $mvcore['anc_ad_cost'] * $AE_ad_cost; } else { $ad_cost = '0'; } ; // AD Cost
if($AE_skill_cost == '1') { $skill_cost = $mvcore['anc_skill_cost']; } else { $skill_cost = '0'; } ; // Skill Cost
if($AE_joh_cost != '0') { $joh_cost = $AE_joh_cost; }  else { $joh_cost = '0'; }; // Harmony Cost
$AE_exc_cost = $AE_exc_count * $mvcore['anc_exc_cost'];

$total_anc_cost = $mvcore['anc_item_cost'] + $AE_level_cost + $luck_cost + $ad_cost + $skill_cost + $joh_cost + $AE_exc_cost; // Total Item Cost without bonus.

//end

if (file_exists("system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif")) { 
	$image_load = "system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif"; 
} else { 
	$image_load = 'system/engine_images/webshop/item_images/no-img.gif'; 
};

// Item Information Combine
$drop_item_info ='<table><tr valign=top><td><img src='.$image_load.'><br>'.$iname.' '.$item_has_def.''.$item_has_dmg.''.$item_need_dur.''.$item_need_level.''.$item_class_need.''.$other_item_infos.''.$fenrir.'<font color=#cc7fcc>'.$ref.'</font>'.$joh_info_drop.'<font color=#7fb2ff>'.$skill.''.$luck.''.$itemoptionname.''.$itemoptionnamess.''.$db_item_info.''.$itemoptionnames.''.$anc_option.'</font><font color=#ff19ff>'.$socketinfos.'</font>'.$sok_info_drop1.''.$sok_info_drop2.''.$sok_info_drop3.''.$sok_info_drop4.''.$sok_info_drop5.'</td></tr></table>'; if($pvsAncientExchange != 'ok7232') { exit; };

$rank = $i+1;
$tr_color_2 = 'style="padding: 3px 1px 3px 1px;"'; 
$tr_color_1 = 'style="padding: 3px 1px 3px 1px;"';
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;

echo '
		<tr class="trhowthis" onMouseover="ddrivetip(\''.$drop_item_info.'\')" onMouseout="hideddrivetip()">
			<td '.$tr_color.'>'.$inames.'</td>
			<td '.$tr_color.'>'.ancient_exc_estemated.' '.$mvcore['money_name1'].': '.$total_anc_cost.'</td>
			<td '.$tr_color.'><form action="" method="POST"><input value="54443" type="hidden" name="itemexchs"><input value="'.$item[$i].'" type="hidden" name="itemHex"><button style="width:120px;" class="mvcore-button-style" >'.ancient_exc_echangeitem.'</button></form></td>
		</tr>
';

}
} ?>
</table>
<?php } ?>
<br>
<!-- <font color="red" size="2"><?php echo''.ancient_exc_notedtexts.'';?></font> -->
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>
