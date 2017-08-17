
<?php if(!$mvcore['Market'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Market'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<style>
.trhowthis:hover {
  background-color: <?php echo''.$table_border.'';?>;
  cursor:pointer;
}
</style>
<?php
//== Post Start ==//
if(isset($_POST['subform'])) {

//== Post Procedure Select ==//
$hex		= trim(isset($_POST['hex']) ? $_POST['hex'] : '');
$serial		= trim(isset($_POST['serial']) ? $_POST['serial'] : '');
$name		= trim(isset($_POST['name']) ? $_POST['name'] : '');

if(strlen($hex) >= 34) { exit; }; // if S2 - S8
if(strlen($serial) >= 9) { exit; }; // if S2 - S8
if(strlen($name) >= 15) { exit; }; // if S2 - S8

$errors = array();
$success = array();

//== Main Info Get Script ==// 
$useracc = $_SESSION['username']; // Get Logedin Username

$select_hex_infof= mssql_query("Select serial,hex,soldby,cost,ptype from MVCore_Market_Items where hex='".$hex."'");
$s_hex_i= mssql_fetch_row($select_hex_infof); // Get Some Information

$select_hex_infofas= mssql_query("Select serial from MVCore_Market_Items where serial='".$serial."'");
$s_hex_ias= mssql_fetch_row($select_hex_infofas); // Check Hex Codes Else Error

$select_char_info= mssql_query("Select AccountID from Character where AccountID='".$s_hex_i[2]."'");
$s_char_i= mssql_fetch_row($select_char_info); // Check Seller Acc ID

$select_zen_info= mssql_query("Select money from warehouse where AccountID='".$useracc."'");
$s_zen_i= mssql_fetch_row($select_zen_info); // Check if Can BUY

$select_cred_check= mssql_query("Select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']."='".$useracc."'");
$s_c_check= mssql_fetch_row($select_cred_check); // Check if Can BUY

$select_charwcv_info= mssql_query("Select memb_guid from ".$mvcore_medb_i." where memb___id='".$s_char_i[0]."'");
$s_charwcv_i= mssql_fetch_row($select_charwcv_info); // Seller Guid Check

$select_charwcv_infos= mssql_query("Select acc_ip from ".$mvcore_medb_i." where memb___id='".$s_char_i[0]."'");
$s_charwcv_ia= mssql_fetch_row($select_charwcv_infos); // Seller Guid Check

if($mvcore['guid_column'] == 'memb_guid'  || $mvcore['guid_column'] == 'MemberGuid'){ $fix_wcoins_user_seller = $s_charwcv_i[0]; } else { $fix_wcoins_user_seller = $s_char_i[0]; };


$select_charwc_infs= mssql_query("Select acc_ip from ".$mvcore_medb_i." where memb___id='".$useracc."'");
$s_charwc_ia= mssql_fetch_row($select_charwc_infs); // get IP

$select_charwc_info= mssql_query("Select memb_guid from ".$mvcore_medb_i." where memb___id='".$useracc."'");
$s_charwc_i= mssql_fetch_row($select_charwc_info); // Check if Can BUY

if($mvcore['guid_column'] == 'memb_guid' || $mvcore['guid_column'] == 'MemberGuid'){ $fix_wcoins_user = $s_charwc_i[0]; } else { $fix_wcoins_user = $useracc; };

$check_online = mssql_query("Select connectstat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
$check_onlines = mssql_fetch_row($check_online);

if($check_onlines[0] == '1') { $errors[] = '<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_charonlineexit.'</div>'; };

$v_f_h= mssql_query("Select ".$mvcore['wcoins_column']." from ".$mvcore['wcoins_table']." where ".$mvcore['guid_column']."='".$fix_wcoins_user."'");
$v_f_hd= mssql_fetch_row($v_f_h); // Check if Can BUY

//== End Script ==//

//== Error MSG ==//
if($s_hex_ias[0] == '' || $s_hex_ias[0] == ' ') { $has_error = '1'; echo ''; }
if($s_hex_i[0] == '' || $s_hex_i[0] == ' ') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_hassoldalready.'</div>'; }

if($useracc == $s_char_i[0]) {} else {
	
	if($mvcore['mark_ip_check'] == 'on') {
		//Ip Check
			if($s_charwc_ia[0] == $s_charwcv_ia[0]){ $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_cannotbuyitemacc.'</div>'; }; 
		//End
	};
	
if($s_hex_i[4] == '1'){if($s_c_check[0] <= $s_hex_i[3]) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_youdonthaveenought.' '.$mvcore['money_name1'].' '.main_p_market_buythisitem.'</div>'; }};
if($s_hex_i[4] == '4'){if($s_c_check[1] <= $s_hex_i[3]) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_youdonthaveenought.' '.$mvcore['money_name2'].' '.main_p_market_buythisitem.'</div>'; }};
if($s_hex_i[4] == '2'){if($v_f_hd[0] <= $s_hex_i[3]) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_youdonthaveenought.' wcoins '.main_p_market_buythisitem.'</div>'; }};
if($s_hex_i[4] == '3'){if($s_zen_i[0] <= $s_hex_i[3]) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_youdonthaveenought.' zen '.main_p_market_buythisitem.'</div>'; }};
};if($pvsMarket != 'ok3472') { exit; };
if($s_hex_i[4] >= '5' || $s_hex_i[4] == '' || $s_hex_i[4] <= '0'){$has_error = '1'; echo '';};
//== End Script ==// 

if($mvcore['db_season'] >= '9' && strlen($hex) == '32') { $exHex = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } else { $exHex = ''; };
$Final_Result_hex = ''.$hex.''.$exHex.'';

$sy 			= hexdec(substr($Final_Result_hex,0,2)); 		// Item ID
$itt 			= hexdec(substr($Final_Result_hex,18,2)); 		// Item Type
$itemtype 		= floor($itt/16);						// Item Type Fix

			//FOR Item ID 256+
			$ioo 			= hexdec(substr($Final_Result_hex,14,2)); 		// Item Excellent Info/ Option
			
		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($Final_Result_hex, 0,2))/32; // Category
			$ioo = hexdec(substr($Final_Result_hex, 14,2)); // Excelent
			$ids = hexdec(substr($Final_Result_hex, 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};
		
			if( $ioo >= '128' && $itemtype == '12' && $sy >= '0' ){
				
				$sy = 255 + $sy;
			}
			
			if( $ioo >= '128' && $itemtype == '13' && $sy >= '0'){
			
				$sy = 256 + $sy;
				
			}
			
			if( $ioo >= '128' && $itemtype == '14' && $sy >= '0'){
				
				$sy = 256 + $sy;
				
			}
	
$nameselectsdd= mssql_query("Select x, y from MVCore_Wshopp  where id='".$sy."' and category='".$itemtype."'");
$nameselectsd= mssql_fetch_row($nameselectsdd);

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
$slot 		= smartsearch($mycuritems,$nameselectsd[0],$nameselectsd[1],$mvcore['db_season']);
$test		= $slot*$hexlen; if($pvsMarket != 'ok3472') { exit; };

$mynewitems = substr_replace($mycuritems, $newitem, ($test+2), $hexlen);

if($slot == '1337' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_wareseemsfull.'</div>'; };

$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
$check_onlines = mssql_fetch_row($check_online);
if( $check_onlines[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_market_charonlineexit.'</div>'; };

if($has_error >= '1'){} else {

//== Procedure Update Or Insert ==//
$edit_site = mssql_query("UPDATE warehouse SET Items = ".$mynewitems." WHERE AccountId='".$useracc."'");
$edit_site = mssql_query("DELETE from MVCore_Market_Items WHERE hex='".$hex."'");

if($useracc == $s_char_i[0]) {} else {
	
	if($s_hex_i[4] == '1'){
	$edit_site = mssql_query("UPDATE ".$mvcore['credits_table']." SET ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$s_hex_i[3]."' WHERE ".$mvcore['user_column']."='".$s_char_i[0]."'");
	$edit_site = mssql_query("UPDATE ".$mvcore['credits_table']." SET ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$s_hex_i[3]."' WHERE ".$mvcore['user_column']."='".$useracc."'");
	$edit_site = mssql_query("INSERT INTO MVCore_Market_Sold_Items (hex,memb___id,name,price,type,soldto,date) VALUES ('".$hex."','".$s_char_i[0]."','".$name."','".$s_hex_i[3]."','1','".$useracc."','".time()."')");
	$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$s_char_i[0]."','".$s_hex_i[3]."','0','From Market Item Buy','".time()."','0')");
	}
	elseif($s_hex_i[4] == '2'){
	$edit_site = mssql_query("UPDATE ".$mvcore['wcoins_table']." SET ".$mvcore['wcoins_column']." = ".$mvcore['wcoins_column']." + '".$s_hex_i[3]."' WHERE ".$mvcore['guid_column']."='".$fix_wcoins_user_seller."'");
	$edit_site = mssql_query("UPDATE ".$mvcore['wcoins_table']." SET ".$mvcore['wcoins_column']." = ".$mvcore['wcoins_column']." - '".$s_hex_i[3]."' WHERE ".$mvcore['guid_column']."='".$fix_wcoins_user."'");
	$edit_site = mssql_query("INSERT INTO MVCore_Market_Sold_Items (hex,memb___id,name,price,type,soldto,date) VALUES ('".$hex."','".$s_char_i[0]."','".$name."','".$s_hex_i[3]."','2','".$useracc."','".time()."')");
	}
	elseif($s_hex_i[4] == '3'){
	$edit_site = mssql_query("UPDATE warehouse SET money = money + '".$s_hex_i[3]."' WHERE AccountID='".$s_hex_i[2]."'");
	$edit_site = mssql_query("UPDATE warehouse SET money = money - '".$s_hex_i[3]."' WHERE AccountID='".$useracc."'");
	$edit_site = mssql_query("INSERT INTO MVCore_Market_Sold_Items (hex,memb___id,name,price,type,soldto,date) VALUES ('".$hex."','".$s_char_i[0]."','".$name."','".$s_hex_i[3]."','3','".$useracc."','".time()."')");
	}
	elseif($s_hex_i[4] == '4'){
	$edit_site = mssql_query("UPDATE ".$mvcore['credits_table']." SET ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$s_hex_i[3]."' WHERE ".$mvcore['user_column']."='".$s_char_i[0]."'");
	$edit_site = mssql_query("UPDATE ".$mvcore['credits_table']." SET ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$s_hex_i[3]."' WHERE ".$mvcore['user_column']."='".$useracc."'");
	$edit_site = mssql_query("INSERT INTO MVCore_Market_Sold_Items (hex,memb___id,name,price,type,soldto,date) VALUES ('".$hex."','".$s_char_i[0]."','".$name."','".$s_hex_i[3]."','4','".$useracc."','".time()."')");
	$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$s_char_i[0]."','0','".$s_hex_i[3]."','From Market Item Buy','".time()."','0')");
	};
	
};

//== End Script ==// 

//== Success MSG ==//
echo '<div class="mvcore-nNote mvcore-nSuccess">'.main_p_market_itemaddedinware.'</div>'; $message_edit = $success;}		
//== End Script ==// 
};
?>

		<div class="mvcore-ucp-info" align="center" style="width:100%;padding-top: 15px; padding-bottom: 15px;">
			<div align="center" style="text-align:center;">
				<?php if($mvcore['m_page0'] == '1') { echo"<a href='-id-market-id-gf.html'>".main_p_market_recent."</a> - ";} ?>
				<?php if($mvcore['m_page1'] == '1') { echo"<a href='-id-market-id-0.html'>".main_p_market_swords."</a> - ";} ?>
				<?php if($mvcore['m_page2'] == '1') { echo"<a href='-id-market-id-1.html'>".main_p_market_axes."</a> - ";} ?>
				<?php if($mvcore['m_page3'] == '1') { echo"<a href='-id-market-id-2.html'>".main_p_market_scepters."</a> - ";} ?>
				<?php if($mvcore['m_page4'] == '1') { echo"<a href='-id-market-id-3.html'>".main_p_market_spears."</a> - ";} ?>
				<?php if($mvcore['m_page5'] == '1') { echo"<a href='-id-market-id-4.html'>".main_p_market_bows."</a> - ";} ?>
				<?php if($mvcore['m_page6'] == '1') { echo"<a href='-id-market-id-5.html'>".main_p_market_staff."</a> - ";} ?>
				<?php if($mvcore['m_page7'] == '1') { echo"<a href='-id-market-id-6.html'>".main_p_market_shields."</a> - ";} ?>
				<?php if($mvcore['m_page8'] == '1') { echo"<a href='-id-market-id-7.html'>".main_p_market_helps."</a> - ";} ?>
				<?php if($mvcore['m_page9'] == '1') { echo"<a href='-id-market-id-8.html'>".main_p_market_armors."</a> - ";} ?>
				<?php if($mvcore['m_page10'] == '1') { echo"<a href='-id-market-id-9.html'>".main_p_market_pants."</a> - ";} ?>
				<?php if($mvcore['m_page11'] == '1') { echo"<a href='-id-market-id-10.html'>".main_p_market_gloves."</a> - ";} ?>
				<?php if($mvcore['m_page12'] == '1') { echo"<a href='-id-market-id-11.html'>".main_p_market_boots."</a> - ";} ?>
				<?php if($mvcore['m_page13'] == '1') { echo"<a href='-id-market-id-12.html'>".main_p_market_accesories."</a> - ";} ?>
				<?php if($mvcore['m_page14'] == '1') { echo"<a href='-id-market-id-13.html'>".main_p_market_miscitems."</a> - ";} ?>
				<?php if($mvcore['m_page15'] == '1') { echo"<a href='-id-market-id-14.html'>".main_p_market_miscitemstwo."</a> - ";} ?>
				<?php if($mvcore['m_page16'] == '1') { echo"<a href='-id-market-id-15.html'>".main_p_market_scrolls."</a>";} ?>
			</div>
		</div>
<br>
<table width="100%" cellpadding="0" cellspacing="0">
<tr><td><div style="float:right;"><form action="-id-market-id-MyItems.html" method="POST"><input name="myItemsSubmit" class="mvcore-button-style" type="submit" value="<?php echo ''.main_p_market_mysolditem.'';?>"></form></div></td></tr>
<tr style="border-collapse: collapse; border-spacing: 0px;">

		<td style="padding: 0px 0px 0px 0px;" valign="top">
		
		<center>
			<?php 
				$change_page_name = clean_variable($_GET['op2']);
				$default_category = $mvcore['mark_default'];
				if($_GET['op2'] == '') { $change_page_name = $default_category; } else { $change_page_name = clean_variable($_GET['op2']); };
				
				if($change_page_name == '0') {$add_text = ''.main_p_market_swords.'';}
				elseif($change_page_name == '1') {$add_text = ''.main_p_market_axes.'';}
				elseif($change_page_name == '2') {$add_text = ''.main_p_market_scepterss.'';}
				elseif($change_page_name == '3') {$add_text = ''.main_p_market_spears.'';}
				elseif($change_page_name == '4') {$add_text = ''.main_p_market_bowss.'';}
				elseif($change_page_name == '5') {$add_text = ''.main_p_market_staff.'';}
				elseif($change_page_name == '6') {$add_text = ''.main_p_market_shields.'';}
				elseif($change_page_name == '7') {$add_text = ''.main_p_market_helps.'';}
				elseif($change_page_name == '8') {$add_text = ''.main_p_market_armors.'';}
				elseif($change_page_name == '9') {$add_text = ''.main_p_market_pants.'';}
				elseif($change_page_name == '10') {$add_text = ''.main_p_market_gloves.'';}
				elseif($change_page_name == '11') {$add_text = ''.main_p_market_boots.'';}
				elseif($change_page_name == '12') {$add_text = ''.main_p_market_accesories.'';}
				elseif($change_page_name == '13') {$add_text = ''.main_p_market_miscitems.'';}
				elseif($change_page_name == '14') {$add_text = ''.main_p_market_miscitemstwo.'';}
				elseif($change_page_name == '15') {$add_text = ''.main_p_market_scrolls.'';}
				elseif($change_page_name == 'gf') {$add_text = ''.main_p_market_recentsitems.'';}
				elseif($change_page_name == 'MyItems') {$add_text = ''.main_p_market_mysolditem.'';}
				else {$add_text = ''.main_p_market_recentsitems.'';};
				
				echo'<h3>'.$add_text.'</h3><br>';
			?>
		</center>

		<?php
		
		$change_pages = clean_variable($_GET['op2']);
		if($change_pages >= '0') {
		    $add_wherea = 'where cate = '.$change_pages.'';

		} else {
		    $add_wherea = '';

		};
		if($_GET['op2'] == 'MyItems') { $add_wherea = "where soldby = '".$_SESSION['username']."'"; };
			$market_item_lista = $mvcorex->prepare("select * from MVCore_Market_Items ".$add_wherea."");
			$stmt = $market_item_lista->execute();
			$stmt = $market_item_lista->fetchAll();
			$acr4fd =count($stmt);
		?>
<center>
	<form action="" method="POST">
		<?php if($acr4fd >= $mvcore['top_select'] * 1 && $acr4fd != $mvcore['top_select']) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="<?php echo''.main_p_market_mainpag.'';?>"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 1 && $acr4fd != $mvcore['top_select']) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="1"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 2) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="2"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 3) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="3"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 4) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="4"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 5) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="5"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 6) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="6"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 7) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="7"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 8) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="8"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 9) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="9"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 10) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="10"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 11) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="11"><?php } ?>
	</form>
</center>

			<table class="mvcore-table" cellpadding="0" cellspacing="0">
				<tr><td colspan="3"></td></tr>
<?PHP

$default_category = $mvcore['mark_default'];
if($_GET['op2'] == '0' && $mvcore['m_page1'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '1' && $mvcore['m_page2'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '2' && $mvcore['m_page3'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '3' && $mvcore['m_page4'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '4' && $mvcore['m_page5'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '5' && $mvcore['m_page6'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '6' && $mvcore['m_page7'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '7' && $mvcore['m_page8'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '8' && $mvcore['m_page9'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '9' && $mvcore['m_page10'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '10' && $mvcore['m_page11'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '11' && $mvcore['m_page12'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '12' && $mvcore['m_page13'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '13' && $mvcore['m_page14'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '14' && $mvcore['m_page15'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '15' && $mvcore['m_page16'] != '1') { $change_page = $default_category; }
elseif($_GET['op2'] == '') { $change_page = $default_category; } 
else { $change_page = $_GET['op2']; };

$add_where = 'cate = '.$change_page.' and';
if($change_page == 'gf' || $_GET['op2'] == 'gf') { $add_where = ""; }

if($_GET['op2'] == 'MyItems') { $add_where = "soldby = '".$_SESSION['username']."' and"; }

//Paging System With POST
if($_POST['pageNr'] == '') { $pageNr = '0'; } else { $pageNr = $_POST['pageNr']; };
$row_num_first = $pageNr * $mvcore['top_select'];
$row_num_second = $pageNr * $mvcore['top_select'] + $mvcore['top_select'];

$market_item_list = $mvcorex->prepare("
SELECT  hex,soldby,cost,serial,ptype 
FROM ( SELECT ROW_NUMBER() OVER ( order by date desc ) 
AS RowNum, hex,soldby,cost,serial,ptype 
FROM MVCore_Market_Items 
WHERE ".$add_where." 
date >= '1' ) 
AS RowConstrainedResult 
WHERE RowNum > ".$row_num_first." 
AND RowNum <= ".$row_num_second." 
ORDER BY RowNum ");

if($pvsMarket != 'ok3472') {
    exit;

};
$stmt = $market_item_list->execute();
$stmt = $market_item_list->fetchAll(PDO::FETCH_BOTH);
$market_item_list = $stmt;
for ($i = 0; $i < count($market_item_list); ++$i) {
$nm_i_l = $market_item_list;

$sy 			= hexdec(substr($nm_i_l[$i][0],0,2)); 		// Item ID
$serial 		= substr($nm_i_l[$i][0],6,8); 				// Item Serial
$itt 			= hexdec(substr($nm_i_l[$i][0],18,2)); 		// Item Type
$itemtype 		= floor($itt/16);						            // Item Type Fix
$iop 			= hexdec(substr($nm_i_l[$i][0],2,2)); 		// Item Level/Skill/Option Data
$itemdur		= hexdec(substr($nm_i_l[$i][0],4,2)); 		// Item Durability
$ioo 			= hexdec(substr($nm_i_l[$i][0],14,2)); 		// Item Excellent Info/ Option
$ioosecon 		= hexdec(substr($item[$i],14,1)); 		    // AD option 1 2 3 4 5 6 7
$ac 			= hexdec(substr($nm_i_l[$i][0],16,2)); 		// Ancient data
$item_socket[$i][1] = hexdec(substr($nm_i_l[$i][0],22,2)); 	// Socket 1
$item_socket[$i][2] = hexdec(substr($nm_i_l[$i][0],24,2)); 	// Socket 2
$item_socket[$i][3] = hexdec(substr($nm_i_l[$i][0],26,2)); 	// Socket 3
$item_socket[$i][4] = hexdec(substr($nm_i_l[$i][0],28,2));	// Socket 4
$item_socket[$i][5] = hexdec(substr($nm_i_l[$i][0],30,2)); 	// Socket 5

$item_harmony 	= hexdec(substr($nm_i_l[$i][0],20,1)); 		// Item harmony
$item_harm_val 	= hexdec(substr($nm_i_l[$i][0],21,1)); 		// Item harmony Value
$item_refinary 	= hexdec(substr($nm_i_l[$i][0],19,1)); 		// Item Refinery

		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($nm_i_l[$i][0], 0,2))/32;  // Category
			$ioo = hexdec(substr($nm_i_l[$i][0], 14,2));     // Excelent
			$ids = hexdec(substr($nm_i_l[$i][0], 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) {
			    $ioo = $ioo - 128; $type = $type + 8;
			};
			$itemtype = round($type); $sy = floor($syfd);
		};
		
include"system/engine_s_fnc.php";

if($nm_i_l[$i][4] == '1'){
    $ptype = $mvcore['money_name1'];

}
elseif($nm_i_l[$i][4] == '2')
{$ptype = 'WCoins';

}
elseif($nm_i_l[$i][4] == '3'){
    $ptype = 'Zen';

}
elseif($nm_i_l[$i][4] == '4'){
    $ptype = $mvcore['money_name2'];

} else {
    $ptype = $mvcore['money_name1'];

};

$select_char_info= $mvcorex->prepare("Select top 1 name, AccountID from Character where AccountID='".$nm_i_l[1]."'");
$stmt = $select_char_info->execute();
$stmt = $select_char_info->fetch();
$s_char_i= $stmt; // Check Seller Acc ID

if (file_exists("system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif")) { 
	$image_load = "system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif"; 
} else { 
	$image_load = 'system/engine_images/webshop/item_images/no-img.gif'; 
};
if($pvsMarket != 'ok3472') { exit; };
// Item Information Combine
$drop_item_info ='<table><tr valign=top><td><img src='.$image_load.'><br>'.$iname.' '.$item_has_def.''.$item_has_dmg.''.$item_need_dur.''.$item_need_level.''.$item_class_need.''.$other_item_infos.''.$fenrir.'<font color=#cc7fcc>'.$ref.'</font>'.$joh_info_drop.'<font color=#7fb2ff>'.$skill.''.$luck.''.$itemoptionname.''.$itemoptionnamess.''.$db_item_info.''.$itemoptionnames.''.$anc_option.'</font><font color=#ff19ff>'.$socketinfos.'</font>'.$sok_info_drop1.''.$sok_info_drop2.''.$sok_info_drop3.''.$sok_info_drop4.''.$sok_info_drop5.'<br><font color=yellow><b>'.main_p_market_soldby.' '.$s_char_i[0].' '.main_p_market_for.' '.$nm_i_l[2].' '.$ptype.'</b></font><br></td></tr></table>';

$useracc = $_SESSION['username']; // Get Logedin Username

if($useracc == $s_char_i[1]) {
    $testssDrop = ''.main_p_market_takeback.'';

} else {
    $testssDrop = ''.main_p_market_buyitem.'';

};
	
$rank = $i+1;
$tr_color_2 = 'style="padding: 9px 3px 9px 3px;"'; 
$tr_color_1 = 'style="padding: 9px 3px 9px 3px;"';
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
if($nameselect[11] == '0'){} else {
echo '
				<tr class="trhowthis" onMouseover="ddrivetip(\''.$drop_item_info.'\')" onMouseout="hideddrivetip()">
					<td '.$tr_color.'>'.$inames.'</td>
					<td '.$tr_color.'>'.$nm_i_l[2].' '.$ptype.'</td>
					<td '.$tr_color.'><form action="-id-market.html" method="POST"><input name="name" type="hidden" value="'.$inames.'"><input name="serial" type="hidden" value="'.$serial.'"><input name="hex" type="hidden" value="'.$nm_i_l[0].'"><button class="mvcore-button-style" name="subform" type="submit">'.$testssDrop.'</button></form></td>
				</tr>
';
} } ?>
			</table>
			
<center>
	<form action="" method="POST">
		<?php if($acr4fd >= $mvcore['top_select'] * 1 && $acr4fd != $mvcore['top_select']) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="<?php echo''.main_p_market_mainpag.'';?>"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 1 && $acr4fd != $mvcore['top_select']) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="1"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 2) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="2"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 3) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="3"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 4) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="4"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 5) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="5"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 6) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="6"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 7) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="7"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 8) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="8"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 9) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="9"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 10) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="10"><?php } ?>
		<?php if($acr4fd >= $mvcore['top_select'] * 11) { ?><input name="pageNr" class="mvcore-button-style" type="submit" value="11"><?php } ?>
	</form>
</center>

		</td>
	</tr>
</table>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>