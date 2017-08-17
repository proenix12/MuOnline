<?php if(!$mvcore['Warehouse'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Warehouse'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Market_Sold_Items.html"><?php echo main_p_warehouse_marketsolditems; ?></a></td></tr></table></div>
<?php
//== Post Start ==//
if(isset($_POST['sellitem']) && $_SERVER["REQUEST_METHOD"] == "POST") {

//== Post Procedure Select ==//
$hex		= trim(isset($_POST['hex']) ? $_POST['hex'] : '');
$item_cost	= trim(isset($_POST['cost']) ? $_POST['cost'] : '');
$ctype		= trim(isset($_POST['ctype']) ? $_POST['ctype'] : '');

$errors = array();
$success = array();

//== Main Info Get Script ==// 
$useracc = $_SESSION['username']; // Get Loged In Username
$time_stamp = time(); //PC Time

$get_char_info_name= $mvcorex->prepare("Select top 1 name from Character where AccountID= :useracc");
$stmt = $get_char_info_name->execute( array('useracc' => $useracc));
$stmt = $get_char_info_name->fetch();
$get_names= $stmt;

$check_online = $mvcorex->prepare("Select connectstat from ".$mvcore_medb_s." where memb___id= :useracc");
$stmt = $check_online->execute( array('useracc' => $useracc));
$stmt - $check_online->fetch();
$check_onlines = $stmt;

if($check_onlines[0] == '1') {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_charisonline.'</div>';

};

if($mvcore['db_season'] >= '9') {
    $cvbins = '7680';

} elseif($mvcore['db_season'] == '1') {
    $cvbins = '1200';

} else {
    $cvbins = '3840';

}; // Warehouse
if($mvcore['db_season'] >= '9') {
    $cvbinsch = '7584';

} elseif($mvcore['db_season'] == '1') {
    $cvbinsch = '1080';

} else {
    $cvbinsch = '3776';

}; // Inventory

$query	= $mvcorex->prepare("declare @it varbinary(".$cvbins."); set @it=(select [Items] from [warehouse] where [AccountID]='" .$useracc."'); print @it");
$mycuritems	= $mvcorex->errorInfo();

if($pvsWarehouse != 'ok7844') {
    exit;

};
$sqll	= substr($mycuritems,2);
$serials 		= substr($hex,6,8); 			// Item Serial
$itt 			= hexdec(substr($hex,18,2)); 	// Item Category
$itemtype 		= floor($itt/16);				// Item Category Fix

	if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };
	if($mvcore['db_season'] >= '9') { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } elseif($mvcore['db_season'] == '1') { $hexlens = 'FFFFFFFFFFFFFFFFFFFF'; } else { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; };
	
	if($mvcore['db_season'] >= '9') { $ilc = '480'; } elseif($mvcore['db_season'] == '1') { $ilc = '62'; } else { $ilc = '240'; };
	
	$icok = '0';
	
	for( $i = 0 ; $i < $ilc; $i++ ) {
	$item[$i]		= substr($sqll,($hexlen*$i), $hexlen);			// item Type

	switch ($item[$i]) {
	    case $hex: $icok +="1"; $item_now_empty[$i] = $hexlens; break;
	    default: $icok += "0"; $item_now_empty[$i] = $item[$i]; break;
	    };
	};

$check_item_exist = $icok;

$check_item_new_hex = implode(",", $item_now_empty); $check_item_new_hex = ('0x'.str_replace(",","",$check_item_new_hex).''); // Will set FOR Loop Array into single string

$select_cred_check= $mvcorex->prepare("Select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']."='".$useracc."'");
$stmt = $select_cred_check->execute();
$stmt = $select_cred_check->fetch();
$s_c_check= $stmt;

$select_zen_check = $mvcorex->prepare("Select money from warehouse where accountid='".$useracc."'");
$stmt = $select_zen_check->execute();
$stmt = $select_zen_check->fetch();
$s_zen_check= $stmt;

$calcc_fee = ($mvcore['ware_fee_take'] / 100) * $item_cost;
$calc_fee = round($calcc_fee);
//== End Script ==//

$select_charwc_info= $mvcorex->prepare("Select memb_guid from ".$mvcore_medb_i." where memb___id='".$useracc."'");
$stmt = $select_charwc_info->execute();
$stmt = $select_charwc_info->fetch();
$s_charwc_i= $stmt;

if($pvsWarehouse != 'ok7844') {
    exit;
};

if($mvcore['guid_column'] == 'memb_guid' || $mvcore['guid_column'] == 'MemberGuid'){
    $fix_wcoins_users = $s_charwc_i[0];

} else {
    $fix_wcoins_users = $useracc;

};

//== Error MSG ==//
if($mvcore['ware_affis'] == '1'){

if($ctype == '1'){if($s_c_check[0] < $calc_fee) {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_needmore.' '.$mvcore['money_name1'].' '.main_p_warehouse_payfee.' '.$calc_fee.' '.$mvcore['money_name1'].'.</div>'; };

} elseif($ctype == '2'){if($s_c_check[0] < $calc_fee) {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_needmore.' wcoins '.main_p_warehouse_payfee.' '.$calc_fee.' wcoins.</div>'; };

} elseif($ctype == '3'){if($s_zen_check[0] < $calc_fee) {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_needmore.' zen '.main_p_warehouse_payfee.' '.$calc_fee.' zen.</div>'; };

} elseif($ctype == '4'){if($s_c_check[1] < $calc_fee) {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_needmore.' '.$mvcore['money_name2'].' '.main_p_warehouse_payfee.' '.$calc_fee.' '.$mvcore['money_name2'].'.</div>'; };};

};
if($check_item_exist == '1') {

} else {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_itemnotfound.'</div>';

};

$CharCount = mssql_query("SELECT count(*) FROM character WHERE AccountID = '".$useracc."'");$dCcount =mssql_result($CharCount, 0, 0);
if($dCcount <= '0') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_createchar.'</div>'; };

if($ctype == '3' && $item_cost >= '1000000001') {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_maxzenval.'</div>';

};
if($ctype == '2' && $item_cost >= '999999') {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_maz.' wcoins '.main_p_warehouse_valuecanbe.'</div>';

};
if($ctype == '1' && $item_cost >= '999999') {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_maz.' '.$mvcore['money_name1'].' '.main_p_warehouse_valuecanbe.'</div>';

};
if($ctype == '4' && $item_cost >= '999999') {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_maz.' '.$mvcore['money_name2'].' '.main_p_warehouse_valuecanbe.'</div>';

};
if($item_cost == '' || $item_cost == ' ' || $item_cost == '0') {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_enteritemcost.'</div>';

};
if(preg_match('/[^0-9]/', $item_cost) === 0) {

} else {
    $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_warehouse_symbolsnotallowed.'</div>';

};
	
//== End Script ==// 

if($has_error >= '1'){} else {

//== Procedure Update Or Insert ==//
$edit_site = $mvcorex->prepare("UPDATE warehouse SET Items = ".$check_item_new_hex." WHERE AccountId= :useracc");
$stmt = $edit_site->execute( array( 'useracc' => $useracc ) );

$edit_site = $mvcorex->prepare("INSERT INTO MVCore_Market_Items (hex,serial,date,soldby,cost,cate,ptype) VALUES (:data, :data1, :data2,
:data3, :data4, :data5, :data6)");
$stmt = $edit_site->execute( array(
        'data' => $hex,
        'data1' => $serials,
        'data2' => $time_stamp,
        'data3' => $useracc,
        'data4' => $item_cost,
        'data5' => $itemtype,
        'data6' => $ctype
) );
if($mvcore['ware_affis'] == '1'){
	
	if($ctype == '1'){
	    $edit_site = $mvcorex->prepare("UPDATE ".$mvcore['credits_table']." SET ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$calc_fee."' WHERE ".$mvcore['user_column']."='".$useracc."'");
	    $stmt = $edit_site->execute();
	} elseif($ctype == '2'){
	    $edit_site = $mvcorex->prepare("UPDATE ".$mvcore['wcoins_table']." SET ".$mvcore['wcoins_column']." = ".$mvcore['wcoins_column']." - '".$calc_fee."' WHERE ".$mvcore['guid_column']."='".$fix_wcoins_users."'");
	    $stmt = $edit_site->execute();
	} elseif($ctype == '3'){
	    $edit_site = $mvcorex->prepare("UPDATE warehouse SET Money = Money - '".$calc_fee."' WHERE accountid='".$useracc
            ."'");
	    $stmt = $edit_site->execute();
	    if($pvsWarehouse != 'ok7844') {
	    exit;
	};
	} elseif($ctype == '4'){
	    $edit_site = $mvcorex->prepare("UPDATE ".$mvcore['credits_table']." SET ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$calc_fee."' WHERE ".$mvcore['user_column']."='".$useracc."'");};
        $stmt = $edit_site->execute();
};
//== End Script ==// 

//== Success MSG ==//
echo '<div class="mvcore-nNote mvcore-nSuccess">'.main_p_warehouse_itemsuccessold.'</div>'; $message_edit = $success;}		
//== End Script ==// 
}

?>
<div id="errorDrop"></div>
<?php
	$useracc = $_SESSION['username']; // Get Loged In Username
	$check_ware = $mvcorex->prepare("Select Items from warehouse where AccountID='".$useracc."'");
	$stmt = $check_ware->execute();
	$stmt = $check_ware->fetch();
	$check_ware_ss = $stmt;

	if($check_ware_ss[0] == '' || $check_ware_ss[0] == '0x') {
	    echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_warehouse_wareisempty.'</div>';

	} else {
?>
<?php if($mvcore['ware_affis'] == '1'){ echo'<div>'.main_p_warehouse_feesystemeach.' '.$mvcore['ware_fee_take'].'% '.main_p_warehouse_fromitsprice.'</div>'; }; ?>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody>
	<tr class="mvcore-tabletr">
		<td><?php echo main_p_warehouse_name; ?></td>
		<?php if($mvcore['Market'] == 'on') { echo '<td>'.main_p_warehouse_sellinmarket.'</td>'; }; ?>
		<?php if($mvcore['Item_Upgrade_System'] == 'on') { echo '<td>'.main_p_warehouse_upgradeitem.'</td>'; }; ?>
	</tr>
<?PHP

$useracc = $_SESSION['username']; // Get Loged In Username

$check_ware = $mvcorex->prepare("Select CONVERT(VARCHAR(MAX),Items) from warehouse where AccountID='".$useracc."'");
$stmt = $check_ware->execute();
$stmt = $check_ware->fetchAll();
$check_ware_s = $stmt;
$sth = $dbh->prepare('SELECT name, colour, calories
    FROM fruit
    WHERE calories < :calories AND colour = :colour');
$sth->bindParam(':calories', $calories, PDO::PARAM_INT);
$sth->bindParam(':colour', $colour, PDO::PARAM_STR, 12);
$sth->execute();

if($mvcore['db_season'] >= '9') {
    $cvbins = '7680';

} elseif($mvcore['db_season'] == '1') {
    $cvbins = '1200';

} else {
    $cvbins = '3840';

}; // Warehouse
if($mvcore['db_season'] >= '9') {
    $cvbinsch = '7584';

} elseif($mvcore['db_season'] == '1') {
    $cvbinsch = '1080';

} else {
    $cvbinsch = '3776';

}; // Inventory

$query		= $mvcorex->prepare("declare @it varbinary(".$cvbins."); set @it=(select [Items] from [warehouse] where [AccountID]='"
    .$useracc."'); print @it");
$stmt = $query->execute();

$mycuritems	= $mvcorex->errorInfo();

if($pvsWarehouse != 'ok7844') { exit; };
$sqll	= substr($mycuritems,2);

if($mvcore['db_season'] >= '9') {
    $hexlen = '64';

} elseif($mvcore['db_season'] == '1') {
    $hexlen = '20';

} else {
    $hexlen = '32';

};

if($mvcore['db_season'] >= '9') {
    $ilc = '480';

} elseif($mvcore['db_season'] == '1') {
    $ilc = '62';

} else {
    $ilc = '240';

};

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

if($item[$i] == $hexlens || $item[$i] == '' || $check_ware_s[0] == '' || $check_ware_s[0] == '0x'){} else {
	
include"system/engine_s_fnc.php";

if (file_exists("system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif")) { 
	$image_load = "system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif"; 
} else { 
	$image_load = 'system/engine_images/webshop/item_images/no-img.gif'; 
};

// Item Information Combine
$drop_item_info ='<table><tr valign=top><td><img src='.$image_load.'><br>'.$iname.' '.$item_has_def.''.$item_has_dmg.''.$item_need_dur.''.$item_need_level.''.$item_class_need.''.$other_item_infos.''.$fenrir.'<font color=#cc7fcc>'.$ref.'</font>'.$joh_info_drop.'<font color=#7fb2ff>'.$skill.''.$luck.''.$itemoptionname.''.$itemoptionnamess.''.$db_item_info.''.$itemoptionnames.''.$anc_option.'</font><font color=#ff19ff>'.$socketinfos.'</font>'.$sok_info_drop1.''.$sok_info_drop2.''.$sok_info_drop3.''.$sok_info_drop4.''.$sok_info_drop5.'</td></tr></table>';

$nItypeID = ''.$itemtype.''.$i.''.$sy.'';
if($pvsWarehouse != 'ok7844') { exit; };
if($mvcore['market_zen_sell'] == '1'){$zen_sell = '<option value="3">Zen</option>';};
if($mvcore['market_credits_sell'] == '1'){$cred_sell = '<option value="1">'.$mvcore['money_name1'].'</option>';};
if($mvcore['market_credits2_sell'] == '1'){$cred2_sell = '<option value="4">'.$mvcore['money_name2'].'</option>';};
if($mvcore['market_wcoins_sell'] == '1'){$wcoins_sell = '<option value="2">WCoins</option>';};

$rank = $i+1;
$tr_color_2 = 'style="padding: 3px 1px 3px 1px;"'; 
$tr_color_1 = 'style="padding: 3px 1px 3px 1px;"';
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;

$chsadsaata = $mvcorex->prepare("Select item_name, has_refinery, has_skill, category, id from MVCore_Wshopp where id='".$sy
    ."' and category='".$itemtype."'");
$stmt = $chsadsaata->execute();
$stmt = $chsadsaata->fetch();
$attrebbradas = $stmt;

if($mvcore['Item_Upgrade_System'] == 'on') { $uppof_colspan = '2';
	if(
		$attrebbradas[3] == '0' ||
		$attrebbradas[3] == '1' ||
		$attrebbradas[3] == '2' ||
		$attrebbradas[3] == '3' ||
		$attrebbradas[3] == '4' ||
		$attrebbradas[3] == '5' ||
		$attrebbradas[3] == '6' ||
		$attrebbradas[3] == '7' ||
		$attrebbradas[3] == '8' ||
		$attrebbradas[3] == '9' ||
		$attrebbradas[3] == '10' ||
		$attrebbradas[3] == '11' ||
		$attrebbradas[3] == '12' && $attrebbradas[4] >= '0' && $attrebbradas[4] <= '6' ||
		$attrebbradas[3] == '12' && $attrebbradas[4] >= '36' && $attrebbradas[4] <= '43' ||
		$attrebbradas[3] == '12' && $attrebbradas[4] >= '49' && $attrebbradas[4] <= '50' ||
		$attrebbradas[3] == '12' && $attrebbradas[4] >= '262' && $attrebbradas[4] <= '300' ||
		
		$attrebbradas[3] == '13' && $attrebbradas[4] >= '8' && $attrebbradas[4] <= '9' ||
		$attrebbradas[3] == '13' && $attrebbradas[4] >= '12' && $attrebbradas[4] <= '13' ||
		$attrebbradas[3] == '13' && $attrebbradas[4] >= '21' && $attrebbradas[4] <= '28'
		
	) { $ItemUpgradeOpt = '<form action="-id-Item_Upgrade_System.html" method="POST"><input name="item_name" type="hidden" value="'.$inames.'"><input name="item_hexc" type="hidden" value="'.$item[$i].'"><button style="width:120px;" class="mvcore-button-style" name="item_tbu" type="submit">'.main_p_warehouse_upgrade.'</button></form>'; } 
	else { $ItemUpgradeOpt = ' - '; };
	
	$item_upgradeonoff = '<td '.$tr_color.'>'.$ItemUpgradeOpt.'</td>';
} else { $item_upgradeonoff = ''; $uppof_colspan = '1'; };
	
if($mvcore['m_page1'] == '1') { $m_p1 = '0'; } else { $m_p1 = '00'; };
if($mvcore['m_page2'] == '1') { $m_p2 = '1'; } else { $m_p2 = '00'; };
if($mvcore['m_page3'] == '1') { $m_p3 = '2'; } else { $m_p3 = '00'; };
if($mvcore['m_page4'] == '1') { $m_p4 = '3'; } else { $m_p4 = '00'; };
if($mvcore['m_page5'] == '1') { $m_p5 = '4'; } else { $m_p5 = '00'; };
if($mvcore['m_page6'] == '1') { $m_p6 = '5'; } else { $m_p6 = '00'; };
if($mvcore['m_page7'] == '1') { $m_p7 = '6'; } else { $m_p7 = '00'; };
if($mvcore['m_page8'] == '1') { $m_p8 = '7'; } else { $m_p8 = '00'; };
if($mvcore['m_page9'] == '1') { $m_p9 = '8'; } else { $m_p9 = '00'; };
if($mvcore['m_page10'] == '1') { $m_p10 = '9'; } else { $m_p10 = '00'; };
if($mvcore['m_page11'] == '1') { $m_p11 = '10'; } else { $m_p11 = '00'; };
if($mvcore['m_page12'] == '1') { $m_p12 = '11'; } else { $m_p12 = '00'; };
if($mvcore['m_page13'] == '1') { $m_p13 = '12'; } else { $m_p13 = '00'; };
if($mvcore['m_page14'] == '1') { $m_p14 = '13'; } else { $m_p14 = '00'; };
if($mvcore['m_page15'] == '1') { $m_p15 = '14'; } else { $m_p15 = '00'; };
if($mvcore['m_page16'] == '1') { $m_p16 = '15'; } else { $m_p16 = '00'; };

	if(
		$attrebbradas[3] == $m_p1 ||
		$attrebbradas[3] == $m_p2 ||
		$attrebbradas[3] == $m_p3 ||
		$attrebbradas[3] == $m_p4 ||
		$attrebbradas[3] == $m_p5 ||
		$attrebbradas[3] == $m_p6 ||
		$attrebbradas[3] == $m_p7 ||
		$attrebbradas[3] == $m_p8 ||
		$attrebbradas[3] == $m_p9 ||
		$attrebbradas[3] == $m_p10 ||
		$attrebbradas[3] == $m_p11 ||
		$attrebbradas[3] == $m_p12 ||
		$attrebbradas[3] == $m_p13 ||
		$attrebbradas[3] == $m_p14 ||
		$attrebbradas[3] == $m_p15 ||
		$attrebbradas[3] == $m_p16
		
	) { if($mvcore['Market'] == 'on') { $canSellInMarket = '<td '.$tr_color.'><button style="width:120px;" class="mvcore-button-style" onclick="showAddStats(\''.$nItypeID.'\'); return false;" >'.main_p_warehouse_sell.'</button></td>'; } else { $canSellInMarket=''; } }
	else { $canSellInMarket = ' - '; }; if($pvsWarehouse != 'ok7844') { exit; };
	

echo '
	<tr class="trhowthis" onMouseover="ddrivetip(\''.$drop_item_info.'\')" onMouseout="hideddrivetip()">
		<td '.$tr_color.'>'.$inames.'</td>
		'.$canSellInMarket.'
		'.$item_upgradeonoff.'
	</tr>
	<tr id="hiddenshowwareitems'.$nItypeID.'" style="display:none;" >
		<td colspan="'.$uppof_colspan.'" '.$tr_color.'><form action="" method="POST"><input style="width:120px !important;" class="mvcore-input-main" placeholder="0" value="" type="text" name="cost"> <select class="mvcore-select-main" style="width:150px !important;" name="ctype" class="mvcore-input-main">'.$cred_sell.''.$cred2_sell.''.$wcoins_sell.''.$zen_sell.'</select></td>
		<td colspan="1" '.$tr_color.'><input name="hex" type="hidden" value="'.$item[$i].'"><button class="mvcore-button-style" name="sellitem" type="submit">'.main_p_warehouse_sellitem.'</button></form></td>
	</tr>
'; }
} ?>
</table>
<div align="left"><table width="100%"><tr><td align="left" style="padding-top:10px;"><button class="mvcore-button-style" onclick="subbitemdels(); return false;" name="cleanware" type="submit"><?php echo main_p_warehouse_clearware; ?></button></td></tr></table></div>
<?php } ?>
<script>
function showAddStats(elmnts) {
	$("#hiddenshowwareitems" + elmnts).toggle(1000);
};

function subbitemdels() {
	//Clean Vault
		if (confirm('Are you sure want to clean vault?')) {

			var getAllValues ='<?php echo $_SESSION['username'];?>';
				$.post("acps.php", {
					cleanwareergreg: getAllValues
				},
				function(data) {
					$('#errorDrop').html(data);
				});
				
		} else {
			// Do nothing!
		}

};
</script>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>
