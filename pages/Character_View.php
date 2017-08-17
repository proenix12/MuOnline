
<?php if(!$mvcore['Character_View'] == 'on') {
    echo'<div '.$mvcore['e_Warning'].'>'.eng_for_the_moment_tpi_disabled.'</div>';

} ?>
<?php if($mvcore['Character_View'] == 'on') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Rankings.html"><?php echo'Back To Rankings'; ?></a></td></tr></table></div>
<?PHP
$id = clean_variable($_GET['op2']);

$get_username = $mvcorex->prepare("Select AccountID from character where name= :data");
$stmt = $get_username->execute( array( 'data' => $id ));
$stmt = $get_username->fetch();
$get_username_check = $stmt;

$get_time = $mvcorex->prepare("Select infohide from ".$mvcore_medb_i." where memb___id= :data");
$stmt = $get_time->execute( array( 'data' => $get_username_check[0] ));
$stmt = $get_time->fetch();
$get_time_check = $stmt;

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

$sqll= $mvcorex->prepare("declare @items varbinary(".$cvbinsch."); 
	set @items = (select [Inventory] from [Character] where [name]='".$id."');
	print @items;");
$sqll=$mvcorex->errorInfo();

$sqll	= substr($sqll,2);

if($mvcore['db_season'] >= '9') {
    $hexlen = '64';

} elseif($mvcore['db_season'] == '1') {
    $hexlen = '20';

} else {
    $hexlen = '32';

};

for( $i = 0 ; $i < 12 ; $i++ ) {

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
		
include"system/engine_s_fnc.php";

if (file_exists("system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif")) { 
	$image_load = "system/engine_images/webshop/item_images/".$itemtype."/".$sy.".gif"; 
} else { 
	$image_load = 'system/engine_images/webshop/item_images/no-img.gif'; 
};
			
// Item Information Combine
if($get_time_check[0] < time()) {
if($mvcore['hide_iffe_imd'] == 'no') {
	$drop_item_info ='<table><tr valign=top><td><img src='.$image_load.'><br>'.$iname.' '.$item_has_def.

''
        .$item_has_dmg.''.$item_need_dur.''.$item_need_level.''.$item_class_need.''.$other_item_infos.''.$fenrir.'<div color=#cc7fcc>'.$ref.'</div>'.$joh_info_drop.'<div color=#7fb2ff>'.$skill.''.$luck.''.$itemoptionname.''.$itemoptionnamess.''.$db_item_info.''.$itemoptionnames.''.$anc_option.'</div><div color=#ff19ff>'.$socketinfos.'</div>'.$sok_info_drop1.''.$sok_info_drop2.''.$sok_info_drop3.''.$sok_info_drop4.''.$sok_info_drop5.'</td></tr></table>';

} else {
    $drop_item_info = ''.main_p_character_view_playeritemhiden.' <br><b>'.main_p_character_view_hidden.'</b>';

};
if($pvsCharacterView != 'ok4581') {
    exit;

};
} else {
    $drop_item_info = ''.main_p_character_view_playeritemhiden.' <br><b>'.main_p_character_view_hidden.'</b>';
};
$myusername = $_SESSION['username'];

if(
$itemtype == 0 && $sy == 108 ||
$itemtype == 0 && $sy >= 52 && $sy <= 62 ||
$itemtype == 1 && $sy >= 21 && $sy <= 106 ||
$itemtype == 6 && $sy >= 104 && $sy <= 105 ||
$itemtype == 12 && $sy >= 200 && $sy <= 217) { $imgtypesw = "png";}
else { $imgtypesw = "gif";};

$show_on_off = 'onMouseover="ddrivetip(\''.$drop_item_info.'\')" onMouseout="hideddrivetip()"';

if($mvcore['db_season'] >= '9') { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } elseif($mvcore['db_season'] == '1') { $hexlens = 'FFFFFFFFFFFFFFFFFFFF'; } else { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; };

if($i == '8' && $item[8] != $hexlens) { $pet='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[8] == $hexlens) { $pet=""; }

if($i == '2' && $item[2] != $hexlens) { $helm='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[2] == $hexlens) { $helm=""; }

if($i == '7' && $item[7] != $hexlens) { $wings='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.'.$imgtypesw.'" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[7] == $hexlens) { $wings=""; }

if($i == '0' && $item[0] != $hexlens) { $sword='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.'.$imgtypesw.'" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[0] == $hexlens) { $sword=""; }

if($i == '9' && $item[9] != $hexlens) { $pendant='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[9] == $hexlens) { $pendant=""; }

if($i == '3' && $item[3] != $hexlens) { $armor='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[3] == $hexlens) { $armor=""; }

if($i == '1' && $item[1] != $hexlens) { $shield='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.'.$imgtypesw.'" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[1] == $hexlens) { $shield=""; }

if($i == '5' && $item[5] != $hexlens) { $gloves='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[5] == $hexlens) { $gloves=""; }

if($i == '10' && $item[10] != $hexlens) { $ring_left='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[10] == $hexlens) { $ring_left=""; }

if($i == '4' && $item[4] != $hexlens) { $pants='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[4] == $hexlens) { $pants=""; }

if($i == '11' && $item[11] != $hexlens) { $ring_right='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[11] == $hexlens) { $ring_right=""; }

if($i == '6' && $item[6] != $hexlens) { $boots='<img src="system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif" '.$show_on_off.' style="max-height:80px;vertical-align: middle;"/>'; }
elseif($item[6] == $hexlens) { $boots=""; }

} 

$chname= mssql_query("Select name from character where name='".$id."'");
$chname= mssql_fetch_row($chname); if($pvsCharacterView != 'ok4581') { exit; };

?>

<?PHP

$sql_char32 = mssql_query("Select clevel,".$mvcore['rr_column_name'].",class,strength,dexterity,vitality,energy,leadership,accountid,MapNumber,".$mvcore['gr_column_name'].",MapPosX,MapPosY,PkLevel,m_Grand_Resets from character where name='$id'");
$show32 = mssql_fetch_row($sql_char32);

$status_reults33 = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='$show32[8]'");
$status33 = mssql_fetch_row($status_reults33);

switch ($status33[0]) { 
case 0: $SStatus32="<font color='red'>".gs_status_offline."</font>"; break;
case 1: $SStatus32="<font color='green'>".gs_status_online."</font>"; break;
Default: $SStatus32="<font color='red'>".gs_status_offline."</font>"; break;
};

switch ($show32[13]) { 
case 6: $hstatus="Phonoman"; break;
Case 5: $hstatus="Phonoman lvl 2"; break;
Case 4: $hstatus="Phonoman lvl 1"; break;
Case 3: $hstatus="Commoner"; break;
Case 2: $hstatus="Hero lvl 1"; break;
Case 1: $hstatus="Hero lvl 2"; break;
Case 0: $hstatus="Hero"; break;
};

if($show32[2] >= '0' && $show32[2] <= '3') {$gclassfx="sm";};
if($show32[2] >= '16' && $show32[2] <= '19') {$gclassfx="dk";};
if($show32[2] >= '32' && $show32[2] <= '35') {$gclassfx="he";};
if($show32[2] >= '48' && $show32[2] <= '51') {$gclassfx="mg";};
if($show32[2] >= '64' && $show32[2] <= '67') {$gclassfx="le";};
if($show32[2] >= '80' && $show32[2] <= '83') {$gclassfx="dim";};
if($show32[2] >= '96' && $show32[2] <= '98') {$gclassfx="rf";};
if($show32[2] >= '112' && $show32[2] <= '114') {$gclassfx="gl";};

$gclassf = getClass($show32[2]); 
if($pvsCharacterView != 'ok4581') { exit; };
$mapp = getMap($show32[9]);

?>
<?PHP

$sql144 = mssql_query("SELECT accountid FROM character WHERE name ='$id'");
$acr44 = mssql_fetch_row($sql144);

$sql158 = mssql_query("SELECT ConnectTM,DisConnectTM FROM ".$mvcore_medb_s." WHERE memb___id ='$acr44[0]'");
$acr59 = mssql_fetch_row($sql158);

?>
								
							<div style="margin-bottom: 20px;">
								<div>
										<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
											<tr>
												<td colspan="4"><?php echo main_p_character_view_character;?> <?php echo $chname[0];?> <?php echo main_p_character_view_info;?></td>
											</tr>
										
											<tr>
												<td rowspan="10" colspan="2">
													<img src="system/engine_images/Class/<?php echo $gclassfx; ?>.png" />
												</td>
											</tr>
														<tr>
															<td><?php echo main_p_character_view_character;?>:</td>
															<td><?php echo $chname[0];?></td>
														</tr>
														<tr>
															<td><?php echo main_p_character_view_class;?>:</td>
															<td><?php echo $gclassf;?></td>
														</tr>
														<tr>
															<td><?php echo main_p_character_view_level;?>:</td>
															<td><?php echo $show32[0];?></td>
														</tr>
														<?php if($mvcore['Reset_Character'] == 'on') { ?>
															<tr>
																<td><?php echo main_p_character_view_resets;?>:</td>
																<td><?php echo $show32[1];?></td>
															</tr>
														<?php } ?>
														<?php if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on') { ?>
															<tr>
																<td><?php echo main_p_character_view_grandresets;?>:</td>
																<td><?php echo $show32[10];?></td>
															</tr>
														<?php } ?>
														<?php if($mvcore['Reset_Character'] == 'on' && $mvcore['Grand_Reset'] == 'on' && $mvcore['Master_Grand_Reset'] == 'on') { ?>
															<tr>
																<td><?php echo main_p_character_view_mastereesets;?>:</td>
																<td><?php echo $show32[14];?></td>
															</tr>
														<?php } ?>
														<tr>
															<td><?php echo main_p_character_view_pkstatus;?>:</td>
															<td><?php echo $hstatus ;?></td>
														</tr>
														<tr>
															<td><?php echo main_p_character_view_location;?>:</td>
															<td><?php if($mvcore['hide_iffe_imd'] == 'yes' || $get_time_check[0] > time()) { echo'Map Hidden.'; } else { echo $mapp; }; ?></td>
														</tr>
														<tr>
															<td><?php echo main_p_character_view_status;?>:</td>
															<td><?php echo $SStatus32;?></td>
														</tr>
											
										</table>
									<div style="margin-top:10px;"></div>
										<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
											<tr>
												<td colspan="2"><?php echo main_p_character_view_accountinformaton;?></td>
											</tr>

											<tr>
												<td><?php echo main_p_character_view_characters;?>:</td>
												<td>
													<?php

														if($mvcore['hide_iffe_imd'] == 'yes' || $get_time_check[0] > time()) { echo'Character List Hidden.'; } else {
								
																$get_chars_ac = mssql_query("Select top 50 name from character where accountid ='$acr44[0]'");
																for($i=0;$i < mssql_num_rows($get_chars_ac);++$i) {
																$get_chars_drop = mssql_fetch_row($get_chars_ac);
																	echo ' <a href="-id-character_view-id-'.$get_chars_drop[0].'.html">'.$get_chars_drop[0].'</a> ';
																}
														}
														
													?>
												</td>
											</tr>
											<tr>
												<td><?php echo main_p_character_view_lastlogin;?>:</td>
												<td><?php echo $acr59[0];?></td>
											</tr>
											<tr>
												<td><?php echo main_p_character_view_lastlogout;?>:</td>
												<td><?php echo $acr59[1];?></td>
											</tr>
										
										</table>
										<div style="margin-top:10px;"></div>
										<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
												<tr>
													<td><?php echo main_p_character_view_equipment;?></td>
												</tr>
											
											<tr>
												<td style="padding:5px;">
													<div style="width: 100%;margin-top:10px;">
														<div style="display: inline-block;position:relative; height:407px;width:400px; background:url(system/engine_images/class/inv_<?php echo $gclassfx; ?>.png) no-repeat left top;">
														<div data-info="287FFF0007A9094F00C0000000000000" id="mvcore-wings"><?php echo $wings;?></div>
														<div data-info="6A7F96003F80D07F00707F010E170B1F" id="mvcore-helm"><?php echo $helm;?></div> 
														<div data-info="1A7B70000FEE0F7F09D0000000000000" id="mvcore-pendant"><?php echo $pendant;?></div>
														<div data-info="0EFF9200093F987F00289D0000000000" id="mvcore-sword"><?php echo $sword;?></div>
														<div data-info="65FF71001F18C47F00607F0D0B160A0C" id="mvcore-shield"><?php echo $shield;?></div>
														<div data-info="6A7F96003F808D7F00807F010E170B1F" id="mvcore-armor"><?php echo $armor;?></div>
														<div data-info="6A7F96003F81C07F00907F010E170B1F" id="mvcore-pants"><?php echo $pants;?></div>
														<div data-info="6A7F4B003F821A7F00A07F010E170B1F" id="mvcore-gloves"><?php echo $gloves;?></div>
														<div data-info="6A7F96003F826F7F00B07F010E170B1F" id="mvcore-boots"><?php echo $boots;?></div>
														<div data-info="157B7000132D7A7F00D0000000000000" id="mvcore-ring_left"><?php echo $ring_left;?></div>
														<div data-info="177B75000FEDC17F09D0000000000000" id="mvcore-ring_right"><?php echo $ring_right;?></div>
														</div>
													</div>
												</td>
											</tr>
										</table>
								</div>
							</div>
<?php } ?>