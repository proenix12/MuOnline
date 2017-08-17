<?PHP
$dateis = 1;//time() - 2629743;
$market_item_list = $mvcorex->prepare("SELECT top 5 hex,soldby,cost,serial,ptype FROM MVCore_Market_Items where date > '"
        .$dateis."' order by date desc");
$stmt = $market_item_list->execute();
$stmt = $market_item_list->fetchAll(PDO::FETCH_BOTH);

print '<pre>'; print_r($stmt); print '</pre>';

for($i=0;$i < count($stmt);++$i) {
$nm_i_l = $stmt;

$sy 			= hexdec(substr($nm_i_l[0],0,2)); 		// Item ID
$serial 		= substr($nm_i_l[0],6,8); 				// Item Serial
$itt 			= hexdec(substr($nm_i_l[0],18,2)); 		// Item Type
$itemtype 		= floor($itt/16);						// Item Type Fix
$iop 			= hexdec(substr($nm_i_l[0],2,2)); 		// Item Level/Skill/Option Data
$itemdur		= hexdec(substr($nm_i_l[0],4,2)); 		// Item Durability
$ioo 			= hexdec(substr($nm_i_l[0],14,2)); 		// Item Excellent Info/ Option
$ioosecon 		= hexdec(substr($item[$i],14,1)); 		// AD option 1 2 3 4 5 6 7
$ac 			= hexdec(substr($nm_i_l[0],16,2)); 		// Ancient data
if($mvcore['socket_type'] == 'scfmt'){
$item_socket[1] = hexdec(substr($nm_i_l[0],22,2)) - 1; 	// Socket 1
$item_socket[2] = hexdec(substr($nm_i_l[0],24,2)) - 1; 	// Socket 2
$item_socket[3] = hexdec(substr($nm_i_l[0],26,2)) - 1; 	// Socket 3
$item_socket[4] = hexdec(substr($nm_i_l[0],28,2)) - 1;	// Socket 4
$item_socket[5] = hexdec(substr($nm_i_l[0],30,2)) - 1; 	// Socket 5
} else {
$item_socket[1] = hexdec(substr($nm_i_l[0],22,2)); 		// Socket 1
$item_socket[2] = hexdec(substr($nm_i_l[0],24,2)); 		// Socket 2
$item_socket[3] = hexdec(substr($nm_i_l[0],26,2)); 		// Socket 3
$item_socket[4] = hexdec(substr($nm_i_l[0],28,2));		// Socket 4
$item_socket[5] = hexdec(substr($nm_i_l[0],30,2)); 		// Socket 5
}
$item_harmony 	= hexdec(substr($nm_i_l[0],20,1)); 		// Item harmony
$item_harm_val 	= hexdec(substr($nm_i_l[0],21,1)); 		// Item harmony Value
$item_refinary 	= hexdec(substr($nm_i_l[0],19,1)); 		// Item Refinery

		if($mvcore['db_season'] == '1') {
			$type = hexdec(substr($nm_i_l[0], 0,2))/32; // Category
			$ioo = hexdec(substr($nm_i_l[0], 14,2)); // Excelent
			$ids = hexdec(substr($nm_i_l[0], 0,2));	$idss = $ids / 32; $syfd = $ids - (floor($idss) * 32); //ID Algoritm
			if($ioo >= 128) { $ioo = $ioo - 128; $type = $type + 8; }; $itemtype = round($type); $sy = floor($syfd);
		};
		
include"system/engine_s_fnc.php";

if($nm_i_l[4] == '1'){$ptype = $mvcore['money_name1'];}
elseif($nm_i_l[4] == '2'){$ptype = 'WCoins';}
elseif($nm_i_l[4] == '3'){$ptype = 'Zen';}
elseif($nm_i_l[4] == '4'){$ptype = $mvcore['money_name2'];}
else {$ptype = $mvcore['money_name1'];};

$select_char_info= mssql_query("Select top 1 name, AccountID from Character where AccountID='".$nm_i_l[1]."'");
$s_char_i= mssql_fetch_row($select_char_info); // Check Seller Acc ID

if (file_exists("system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif")) { 
	$image_load = "system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif"; 
} else { 
	$image_load = 'system/engine_images/webshop/item_images/no-img.gif'; 
};

// Item Information Combine
$drop_item_info ='<table><tr valign=top><td><img src='.$image_load.'><br>'.$iname.' '.$item_has_def.''.$item_has_dmg.''.$item_need_dur.''.$item_need_level.''.$item_class_need.''.$other_item_infos.''.$fenrir.'<font color=#cc7fcc>'.$ref.'</font>'.$joh_info_drop.'<font color=#7fb2ff>'.$skill.''.$luck.''.$itemoptionname.''.$itemoptionnamess.''.$db_item_info.''.$itemoptionnames.''.$anc_option.'</font><font color=#ff19ff>'.$socketinfos.'</font>'.$sok_info_drop1.''.$sok_info_drop2.''.$sok_info_drop3.''.$sok_info_drop4.''.$sok_info_drop5.'<br><font color=yellow><b>'.main_p_market_soldby.' '.$s_char_i[0].' '.main_p_market_for.' '.$nm_i_l[2].' '.$ptype.'</b></font><br></td></tr></table>';

$useracc = $_SESSION['username']; // Get Logedin Username

if($useracc == $s_char_i[1]) { $testssDrop = ''.main_p_market_takeback.''; } else { $testssDrop = ''.main_p_market_buyitem.''; };
	
$rank = $i+1;
$tr_color_2 = 'style="padding: 9px 3px 9px 3px;"'; 
$tr_color_1 = 'style="padding: 9px 3px 9px 3px;"';
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
if($nameselect[11] == '0'){} else {
echo '
			<div class="latest-twitter-tweett">
				<div class="trhowthis" onMouseover="ddrivetip(\''.$drop_item_info.'\')" onMouseout="hideddrivetip()">
					<div>'.$inames.'<font style="float:right;"><b>'.$nm_i_l[2].'</b> '.$ptype.'</font></div>
					<div>
						<form action="-id-market.html" method="POST" id="sfsn'.$i.'"><input name="name" type="hidden" value="'.$inames.'"><input name="serial" type="hidden" value="'.$serial.'"><input name="hex" type="hidden" value="'.$nm_i_l[0].'"><input name="subform" type="hidden" value="1"><a href="#" onclick="document.getElementById(\'sfsn'.$i.'\').submit();">'.$testssDrop.'</a></form>
					</div>
				</div>
			</div>
';
} } ?>