
<?php if($_SESSION['gm_panel'] == 'ok') { ?>
<div id="rankings_select_DEFAULT" style="text-align:center;">
							<?php if($mvcore['Ban_System'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="topp"><?php echo''.theme_link_bansys.''; ?></button><?php } ?>
							<?php if($mvcore['Black_List_manage'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="topg"><?php echo''.theme_link_blacklmanage.''; ?></button><?php } ?>
							<?php if($mvcore['Reward_System'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="topk"><?php echo''.theme_link_rewsus.''; ?></button><?php } ?>
							<?php if($mvcore['Character_Information'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="cinfo"><?php echo''.gmcp_charinfos.''; ?></button><?php } ?>
							<?php if($mvcore['Event_Post'] == 'on') { ?><button href="javascript:;" class="mvcore-button-style" id="eventp"><?php echo''.gmcp_eventpostos.''; ?></button><?php } ?>
</div>
<br>
<script>
		$(document).ready(function(){
		
		$("#div-topp").show();
		
			$("#topp").click(function(){
				$("#div-topp").show();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-cinfo").hide();
				$("#div-eventp").hide();
			});
			$("#topg").click(function(){
				$("#div-topp").hide();
				$("#div-topg").show();
				$("#div-topk").hide();
				$("#div-cinfo").hide();
				$("#div-eventp").hide();
			});
			$("#topk").click(function(){
				$("#div-topp").hide();
				$("#div-topg").hide();
				$("#div-topk").show();
				$("#div-cinfo").hide();
				$("#div-eventp").hide();
			});
			$("#cinfo").click(function(){
				$("#div-topp").hide();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-cinfo").show();
				$("#div-eventp").hide();
			});
			$("#eventp").click(function(){
				$("#div-topp").hide();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-cinfo").hide();
				$("#div-eventp").show();
			});

		});
</script>
<?php if($mvcore['Event_Post'] == 'on') { ?>
<div id="div-eventp" style="display: none;">
<?php
if(isset($_POST['event_post_sub'])) {

//Post Procedure Select
$ep_title		= trim(isset($_POST['event_post_title']) ? $_POST['event_post_title'] : '');
$ep_min		= trim(isset($_POST['event_post_minutes']) ? $_POST['event_post_minutes'] : '');
$ep_msg	= trim(isset($_POST['event_post_msg']) ? $_POST['event_post_msg'] : '');

//Main Info Get Script
$useracc = $_SESSION['username']; // Get Loged In Username
$get_gm_data= mssql_query("Select name from character where AccountID='".$useracc."' and CtlCode >= '8'"); $get_gm_datas= mssql_fetch_row($get_gm_data); // Get GM/admin character name

echo'
<script>
	$(document).ready(function(){
		$("#div-topp").hide();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-cinfo").hide();
				$("#div-eventp").show();
	});
</script>
';

//not part of team.
if($get_gm_datas[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_you_were_not.'</div>'; };

if($ep_title == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_cannottitleempty.'</div>'; };
if($ep_min == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_cannntselecmin.'</div>'; };
if($ep_msg == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_cannotmsgempt.'</div>'; };

//Fix Problem with " and '
$titleFix = str_replace('"','',$ep_title);
$titleFix2 = stripslashes(str_replace("'",'',$titleFix));
$msgFix = str_replace('"','',$ep_msg);
$msgFix2 = stripslashes(str_replace("'",'',$msgFix));

$oneDay = '60';
$calcDate = $oneDay * $ep_min;
$dateExpire = $calcDate + time();
	
	if($has_error >= '1'){} else {
		$edit_site = mssql_query("INSERT INTO MVCore_Event_Post (title,message,game_master,expire_date) VALUES ('".$titleFix2."', '".$msgFix2."', '".$get_gm_datas[0]."', '".$dateExpire."')");
		echo'<div class="mvcore-nNote mvcore-nSuccess">'.gmcp_rs_successmscreat.'</div>';
	};
		
};
?>
<?php
if(isset($_POST['event_DeletePVal'])) {

//Post Procedure Select
$ep_delete_id		= trim(isset($_POST['event_DeletePVal']) ? $_POST['event_DeletePVal'] : '');

//Main Info Get Script
$useracc = $_SESSION['username']; // Get Loged In Username
$get_gm_data= mssql_query("Select name from character where AccountID='".$useracc."' and CtlCode >= '8'"); $get_gm_datas= mssql_fetch_row($get_gm_data); // Get GM/admin character name

echo'
<script>
	$(document).ready(function(){
		$("#div-topp").hide();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-cinfo").hide();
				$("#div-eventp").show();
	});
</script>
';

//not part of team.
if($get_gm_datas[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_you_were_not.'</div>'; };

	if($has_error >= '1'){} else {
		$delFromDB = mssql_query("delete from MVCore_Event_Post where expire_date = '".$ep_delete_id."'");
		echo'<div class="mvcore-nNote mvcore-nSuccess">'.gmcp_rs_successmgdele.'</div>';
	};
		
};
?>
<form method="POST" action="">
<input type="hidden" name="event_post_sub" >
<div><?php echo''.gmcp_rs_postinwebeventcreate.'';?></div>
	<table class="mvcore-table" align="center" width="100%" cellpadding="0" cellspacing="0">
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_rs_eventname.'';?></td>
			<td><input class="mvcore-input-main" type="text" name="event_post_title" maxlength="70"/></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_rs_msgdisapier.' ';?></td>
			<td><select name="event_post_minutes" style=" width:370px; " class="mvcore-select-main">
				<option value="10">10 <?php echo''.gmcp_rs_minutes.'';?></option>
				<option value="15">15 <?php echo''.gmcp_rs_minutes.'';?></option>
				<option value="20">20 <?php echo''.gmcp_rs_minutes.'';?></option>
				<option value="25">25 <?php echo''.gmcp_rs_minutes.'';?></option>
				<option value="30">30 <?php echo''.gmcp_rs_minutes.'';?></option>
				<option value="60">1 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="120">2 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="180">3 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="240">4 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="300">5 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="360">6 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="420">7 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="480">8 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="540">9 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="600">10 <?php echo''.gmcp_rs_hours.'';?></option>
				<option value="1440">24 <?php echo''.gmcp_rs_hours.' ( 1 '.gmcp_rs_days.' )';?></option>
				</select>
			</td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_rs_message.'';?></td>
			<td><input class="mvcore-input-main" type="text" name="event_post_msg" maxlength="200"></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td colspan="2" align="center" style="padding-top:10px;" ><button name="event_post_submit" class="mvcore-button-style" type="submit"><?php echo''.gmcp_rs_postmsg.'';?></button></td>
		</tr>
</table>
</form>
<br>
<?php
$useracc = $_SESSION['username']; // Get Loged In Username
$get_gm_data= mssql_query("Select name from character where AccountID='".$useracc."' and CtlCode >= '8'"); $get_gm_datas= mssql_fetch_row($get_gm_data); // Get GM/admin character name

	$guild_query = mssql_query("SELECT title,message,game_master,expire_date from MVCore_Event_Post where game_master = '".$get_gm_datas[0]."'");
	$rosw = mssql_fetch_row($guild_query);
	if($rosw[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.gmcp_rs_eventempty.'</div>'; } else {
?>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td><?php echo''.gmcp_rs_title.'';?></td>
		<td><?php echo''.gmcp_rs_msgexpire.'';?></td>
		<td><?php echo''.gmcp_rs_delet.'';?></td>
	</tr>
<?PHP

$useracc = $_SESSION['username']; // Get Loged In Username
$get_gm_data= mssql_query("Select name from character where AccountID='".$useracc."' and CtlCode >= '8'"); $get_gm_datas= mssql_fetch_row($get_gm_data); // Get GM/admin character name

$event_list = mssql_query("SELECT title,message,game_master,expire_date from MVCore_Event_Post where game_master = '".$get_gm_datas[0]."' order by expire_date desc");
for($i=0;$i < mssql_num_rows($event_list);++$i) {
$event_posted_list = mssql_fetch_row($event_list);

$decDate = decode_time(time(),$event_posted_list[3],'short',''.gmcp_rs_expireddot.'');

echo '
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td style="padding: 6px 3px 6px 3px;color:red;">'.$event_posted_list[0].'</td>
		<td style="padding:0;">'.$decDate.'</td>
		<td style="padding:0;"><form method="POST" action=""><input type="hidden" value="'.$event_posted_list[3].'" name="event_DeletePVal" ><button class="mvcore-button-style" type="submit">'.gmcp_rs_deletemessage.'</button></form></td>
	</tr>
';
}
?>
</table>
<?php } ?>
</div>
<?php } ?>
<?php if($mvcore['Character_Information'] == 'on') { ?>
<div id="div-cinfo" style="display: none;">
<?PHP
if (isset($_POST['get_char_name'])){
	
	$Char_Name 	= $_POST['char_name'];
	
	$get_username = mssql_query("Select AccountID from character where name='".$Char_Name."'");
	$get_username_check = mssql_fetch_row($get_username);

echo'
<script>
	$(document).ready(function(){
		$("#div-topp").hide();
			$("#div-topg").hide();
			$("#div-topk").hide();
			$("#div-cinfo").show();
			$("#div-eventp").hide();
	});
</script>
';

	if($get_username_check[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_char_was_not_found.'</div>'; } else {
			
			if($has_error >= '1'){} else {
				
				header('Location: -id-gm_cp-id-GM_Panel-id-'.$Char_Name.'.html'); //Link

			};
	};
};
?>

<form method="POST" action="">
<input type="hidden" name="get_char_name" >

<table class="mvcore-table" cellpadding="0" cellspacing="0" align="center" width="100%">
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo gmcp_bs_char_name;?></td>
			<td><input class="mvcore-input-main" type="text" name="char_name" maxlength="10"/></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td colspan="2" align="center" style="padding-top:10px;"><button class="mvcore-button-style" type="submit"><?php echo gmcp_bs_char_search;?></button></td>
		</tr>
</table>
</form>

<div style="margin-top:10px;"></div>

<?php if($_GET['op3'] != '') { ?>
<script>
		$(document).ready(function(){
		
			$("#div-topp").hide();
			$("#div-topg").hide();
			$("#div-topk").hide();
			$("#div-cinfo").show();
			$("#div-eventp").hide();
	
		});
</script>
<?PHP
$id = clean_variable($_GET['op3']);

$get_username = mssql_query("Select AccountID from character where name='".$id."'");
$get_username_check = mssql_fetch_row($get_username);

$get_time = mssql_query("Select infohide from ".$mvcore_medb_i." where memb___id='".$get_username_check[0]."'");
$get_time_check = mssql_fetch_row($get_time);

if($mvcore['db_season'] >= '9') { $cvbins = '7680'; } elseif($mvcore['db_season'] == '1') { $cvbins = '1200'; } else { $cvbins = '3840'; }; // Warehouse
if($mvcore['db_season'] >= '9') { $cvbinsch = '7552'; } elseif($mvcore['db_season'] == '1') { $cvbinsch = '1080'; } else { $cvbinsch = '3776'; }; // Inventory

$sqll= mssql_query("declare @items varbinary(".$cvbinsch."); 
	set @items = (select [Inventory] from [Character] where [name]='".$id."');
	print @items;");
$sqll=mssql_get_last_message();

$sqll	= substr($sqll,2);

if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };

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

$drop_item_info ='<table><tr valign=top><td><img src=system/engine_images/webshop/item_images/'.$itemtype.'/'.$sy.'.gif><br>'.$iname.' '.$item_has_def.''.$item_has_dmg.''.$item_need_dur.''.$item_need_level.''.$item_class_need.''.$other_item_infos.''.$fenrir.'<font color=#cc7fcc>'.$ref.'</font>'.$joh_info_drop.'<font color=#7fb2ff>'.$skill.''.$luck.''.$itemoptionname.''.$itemoptionnamess.''.$db_item_info.''.$itemoptionnames.''.$anc_option.'</font><font color=#ff19ff>'.$socketinfos.'</font>'.$sok_info_drop1.''.$sok_info_drop2.''.$sok_info_drop3.''.$sok_info_drop4.''.$sok_info_drop5.'</td></tr></table>';

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
$chname= mssql_fetch_row($chname);

?>

<?PHP

$sql_char32 = mssql_query("Select clevel,".$mvcore['rr_column_name'].",class,strength,dexterity,vitality,energy,leadership,accountid,MapNumber,".$mvcore['gr_column_name'].",MapPosX,MapPosY,PkLevel,m_Grand_Resets from character where name='$id'");
$show32 = mssql_fetch_row($sql_char32);

$status_reults33 = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='$show32[8]'");
$status33 = mssql_fetch_row($status_reults33);

switch ($status33[0]) { 
case 0: $SStatus32="<font color='red'>".gs_status_offline."</font>"; break;
case 1: $SStatus32="<font color='green'>".gs_status_online."</font>"; break;
Default: $is_on_off="<font color='#58FA58'>".gs_status_offline."</font>"; break;
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
												<td rowspan="15" colspan="2">
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
															<td><?php echo $mapp;?></td>
														</tr>
														<tr>
															<td><?php echo main_p_character_view_status;?>:</td>
															<td><?php echo $SStatus32;?></td>
														</tr>
														
														
														<tr>
															<td><?php echo gmcp_bs_char_str;?>:</td>
															<td><?php echo $show32[3];?></td>
														</tr>
														<tr>
															<td><?php echo gmcp_bs_char_agi;?>:</td>
															<td><?php echo $show32[4];?></td>
														</tr>
														<tr>
															<td><?php echo gmcp_bs_char_vit;?>:</td>
															<td><?php echo $show32[5];?></td>
														</tr>
														<tr>
															<td><?php echo gmcp_bs_char_ene;?>:</td>
															<td><?php echo $show32[6];?></td>
														</tr>
														<tr>
															<td><?php echo gmcp_bs_char_com;?>:</td>
															<td><?php echo $show32[7];?></td>
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
														$get_chars_ac = mssql_query("Select top 50 name from character where accountid ='$acr44[0]'");
														for($i=0;$i < mssql_num_rows($get_chars_ac);++$i) {
														$get_chars_drop = mssql_fetch_row($get_chars_ac);

															echo ' <a href="-id-character_view-id-'.$get_chars_drop[0].'.html">'.$get_chars_drop[0].'</a> ';
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
										<div style="margin-top:10px;"></div>
										<table class="mvcore-table" cellpadding="0" cellspacing="0">
											
											<tr style="cursor:pointer;" onclick="getUserInventory('<?php echo $chname[0];?>'); return false;">
												<td colspan="2"><?php echo gmcp_bs_charinvclcik;?></td>
											</tr>
 
											<tr id="user_Inv_hiddentr" style="display:none;">
												<td id="user_Inv_data"></td>
											</tr>
										</table>
								</div>
							</div>
<script>
	function getUserInventory(userName) {
		$.post("acps.php", {
				getUserInventory: userName
			},
			function(data) {
				$('#user_Inv_hiddentr').toggle();
				if(data == '') {
					var charinvtext = '<?php echo main_p_character_market_charinvempty;?>';
					$('#user_Inv_data').html("<div>"+charinvtext+"</div>");
				} else {
					$('#user_Inv_data').html(data);
				}
				
			});
	}
</script>
<?php } ?>
</div>
<?php } ?>

<?php if($mvcore['Ban_System'] == 'on') { ?>
<div id="div-topp" style="display: none;">
	<?php
if(isset($_POST['ban_user'])) {

//Post Procedure Select
$ban_type		= trim(isset($_POST['ban_type']) ? $_POST['ban_type'] : '');
$ban_days		= trim(isset($_POST['ban_days']) ? $_POST['ban_days'] : '');
$ban_acc_char	= trim(isset($_POST['ban_acc_char']) ? $_POST['ban_acc_char'] : '');
$ban_reason		= trim(isset($_POST['ban_reason']) ? $_POST['ban_reason'] : '');

$ban_type = stripSTCheck($ban_type);
$ban_days = stripSTCheck($ban_days);
$ban_acc_char = stripSTCheck($ban_acc_char);
$ban_reason = $ban_reason;

//calculation
$day_is = '86400';
$calc_date_ban = $day_is * $ban_days ;
$unban_time_drop = $calc_date_ban + time();

if($ban_days == '0') { $ban_date_fix = '0'; } else { $ban_date_fix = $unban_time_drop;}

echo'
<script>
	$(document).ready(function(){
		$("#div-topp").show();
				$("#div-topg").hide();
				$("#div-topk").hide();
				$("#div-cinfo").hide();
				$("#div-eventp").hide();
	});
</script>
';

//Main Info Get Script
$useracc = $_SESSION['username']; // Get Loged In Username
$get_gm_data= mssql_query("Select name from character where AccountID='".$useracc."' and CtlCode >= '8'"); $get_gm_datas= mssql_fetch_row($get_gm_data); // Get GM/admin character name

$get_chid_data= mssql_query("Select AccountID from character where name ='".$ban_acc_char."'"); $get_chid_datas= mssql_fetch_row($get_chid_data); // Get Acc ID From name

if($ban_acc_char == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_enter_char_name.'</div>'; };
if($ban_reason == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_enter_ban_reason.'</div>'; };

//check acc if banned.

	if($ban_type == '1'){
		$check_if_ban= mssql_query("Select bloc_code from ".$mvcore_medb_i." where memb___id='".$get_chid_datas[0]."'"); $check_if_bans= mssql_fetch_row($check_if_ban); //
			if($check_if_bans[0] == '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_this_user_already.'</div>'; };
	} elseif($ban_type == '0') {
		$check_if_ban= mssql_query("Select CtlCode from character where name='".$ban_acc_char."'"); $check_if_bans= mssql_fetch_row($check_if_ban); //
			if($check_if_bans[0] == '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_this_user_already.'</div>'; };
	};

//not part of team.
if($get_gm_datas[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_you_were_not.'</div>'; };

if($ban_type == '1'){
$check_acc_an_user= mssql_query("Select memb___id from ".$mvcore_medb_i." where memb___id='".$get_chid_datas[0]."'"); $check_accs_an_user= mssql_fetch_row($check_acc_an_user); // Check account username
if($check_accs_an_user[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_account_was_not_found.'</div>'; };
} elseif($ban_type == '0') {
$check_acc_an_user= mssql_query("Select name from character where name='".$ban_acc_char."'"); $check_accs_an_user= mssql_fetch_row($check_acc_an_user); // Check account username
if($check_accs_an_user[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_char_was_not_found.'</div>'; };
};

if($has_error >= '1'){} else {

//Procedure Update Or Insert
			if($ban_type == '1'){
				$edit_site = mssql_query("INSERT INTO MVCore_Banned_PPL (name,type,reason,banned_by,unban_date) VALUES ('".$get_chid_datas[0]."', '1', '".$ban_reason."', '".$get_gm_datas[0]."', '".$ban_date_fix."')");
				$edit_site = mssql_query("UPDATE ".$mvcore_medb_i." set bloc_code = '1' where memb___id='".$get_chid_datas[0]."'");
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.gmcp_bs_account.' '.$get_chid_datas[0].' '.gmcp_bs_seccess_ban.'</div>';
			} elseif($ban_type == '0') {
				$edit_site = mssql_query("INSERT INTO MVCore_Banned_PPL (name,type,reason,banned_by,unban_date) VALUES ('".$ban_acc_char."', '0', '".$ban_reason."', '".$get_gm_datas[0]."', '".$ban_date_fix."')");
				$edit_site = mssql_query("UPDATE character set CtlCode = '1' where name='".$ban_acc_char."'");
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.gmcp_bs_character.' '.$ban_acc_char.' '.gmcp_bs_seccess_ban.'</div>';
			};
};
		
};
 ?>
<form method="POST" action="">
<input type="hidden" name="ban_user" >
<div><?php echo''.gmcp_bs_ban_only_if.'';?></div>
	<table class="mvcore-table" align="center" width="100%" cellpadding="0" cellspacing="0">
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_bs_ban_acc_char_fweb.'';?></td>
			<td><select name="ban_type" style=" width:370px; " class="mvcore-select-main"><option value="0"><?php echo''.gmcp_bs__ban_char.'';?></option><option value="1"><?php echo''.gmcp_bs_ban_acc.'';?></option></select></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_bs_ban_time.'';?></td>
			<td><select name="ban_days" style=" width:370px; " class="mvcore-select-main">
				<option value="0"><?php echo''.gmcp_bs_permanent.'';?></option>
				<option value="1">1 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="2">2 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="3">3 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="4">4 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="5">5 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="6">6 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="7">7 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="8">8 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="9">9 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="10">10 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="11">11 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="12">12 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="13">13 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="14">14 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="15">15 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="16">16 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="17">17 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="18">18 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="19">19 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="20">20 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="21">21 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="22">22 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="23">23 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="24">24 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="25">25 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="26">26 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="27">27 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="28">28 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="29">29 <?php echo''.gmcp_bs_days.'';?></option>
				<option value="30">30 <?php echo''.gmcp_bs_days.'';?></option>
				</select>
			</td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_bs_char_name.'';?></td>
			<td><input class="mvcore-input-main" type="text" name="ban_acc_char" maxlength="10"/></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_bs_ban_reason.'';?></td>
			<td><input class="mvcore-input-main" type="text" name="ban_reason" maxlength="200"/></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td colspan="2" align="center" style="padding-top:10px;" ><button name="ban_user" class="mvcore-button-style" type="submit"><?php echo''.gmcp_bs_add_ban.'';?></button></td>
		</tr>
</table>
</form>
</div>
<?php } ?>
<?php if($mvcore['Black_List_manage'] == 'on') { ?>
<div id="div-topg" style="display: none;">
<div><?php echo''.gmcp_you_can_unban.'';?></div>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td><?php echo''.gmcp_name.'';?></td>
		<td><?php echo''.gmcp_type.'';?></td>
		<td><?php echo''.gmcp_by.'';?></td>
		<td><?php echo''.gmcp_date.'';?></td>
		<td><?php echo''.gmcp_own_ban.'';?></td>
	</tr>
<?PHP

if(isset($_POST['unban_user'])) {
	$unb_name		= trim(isset($_POST['unb_name']) ? $_POST['unb_name'] : '');
	$unb_type		= trim(isset($_POST['unb_type']) ? $_POST['unb_type'] : '');
	
				if($unb_type == '1') {
					$edit_site = mssql_query("Update ".$mvcore_medb_i." set bloc_code = 0 where memb___id='".$unb_name."'");
				} elseif($unb_type == '0') {
					$edit_site = mssql_query("Update character set CtlCode = 0 where name='".$unb_name."'");
				};
					$edit_site = mssql_query("delete from MVCore_Banned_PPL where name ='".$unb_name."'");
						echo'<div class="mvcore-nNote mvcore-nSuccess">Successfully unbanned.</div>';
};

$banned_ppl = mssql_query("SELECT name,type,reason,banned_by,unban_date from MVCore_Banned_PPL");
for($i=0;$i < mssql_num_rows($banned_ppl);++$i) {
$banned_ppl_drop = mssql_fetch_row($banned_ppl);
$banned_ppl_num = mssql_num_rows($banned_ppl);

$useracc = $_SESSION['username']; // Get Loged In Username
$get_gm_data= mssql_query("Select name from character where AccountID='".$useracc."' and CtlCode >= '8'"); $get_gm_datas= mssql_fetch_row($get_gm_data);

if($banned_ppl_drop[1] == '0'){ $ban_type='Character'; } elseif($banned_ppl_drop[1] == '1') { $ban_type='Account'; } elseif($banned_ppl_drop[1] == '2') { $ban_type='BFW'; };

if($banned_ppl_drop[4] == '0') { $decode_date = ''.gmcp_permn_ban.''; } else {$decode_date = decode_time(time(),$banned_ppl_drop[4],'short',''.gmcp_unbanned.''); };

if($banned_ppl_drop[3] != $get_gm_datas[0]) { $drop_this =''; } else { $drop_this =  "<form method='POST' action=''><input type='hidden' name='unb_type' value='$banned_ppl_drop[1]'><input type='hidden' name='unb_name' value='$banned_ppl_drop[0]'><button class='button-style' align='right' name='unban_user' type='submit'>".gmcp_unban."</button></form>";}
echo "
	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td style='padding: 6px 3px 6px 3px;color:red;'>$banned_ppl_drop[0]</td>
		<td style='padding:0;'>$ban_type</td>
		<td style='padding:0;'>$banned_ppl_drop[3]</td>
		<td style='padding:0;'>$decode_date</td>
		<td align='right' style='padding:0;'>$drop_this</td>
	</tr>

";
}
?>
</table>
</div>
<?php } ?>
<?php if($mvcore['Reward_System'] == 'on') { ?>
<div id="div-topk" style="display: none;">
	<?php

if(isset($_POST['reward_players'])) {

//Post Procedure Select
$reward_type	= trim(isset($_POST['reward_type']) ? $_POST['reward_type'] : '');
$reward_data	= trim(isset($_POST['reward_list']) ? $_POST['reward_list'] : '');
$char_name		= trim(isset($_POST['charname']) ? $_POST['charname'] : '');
$rew_reason		= trim(isset($_POST['rew_reason']) ? $_POST['rew_reason'] : '');

$reward_type = stripSTCheck($reward_type);
$reward_data = stripSTCheck($reward_data);
$char_name = stripSTCheck($char_name);
$rew_reason = $rew_reason;

//Main Info Get Script
$useracc = $_SESSION['username']; // Get Loged In Username
$get_gm_data= mssql_query("Select name from character where AccountID='".$useracc."' and CtlCode >= '8'"); $get_gm_datas= mssql_fetch_row($get_gm_data); // Get GM/admin character name

$get_chid_data= mssql_query("Select AccountID from character where name ='".$char_name."'"); $get_chid_datas= mssql_fetch_row($get_chid_data); // Get Acc ID From name

$get_chtc_datafsf= mssql_query("Select acc_ip from ".$mvcore_medb_i." where memb___id='".$get_chid_datas[0]."'"); $get_chtc_dataswe= mssql_fetch_row($get_chtc_datafsf); // Get IP

echo'
<script>
	$(document).ready(function(){
		$("#div-topp").hide();
				$("#div-topg").hide();
				$("#div-topk").show();
				$("#div-cinfo").hide();
				$("#div-eventp").hide();
	});
</script>
';

if($get_chid_datas[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_character_with_t_name.'</div>'; };

$one_day_back = time() - 86400;

$check_rew_data= mssql_query("Select Count(*) from MVCore_Rew_Data where gm_nick='".$get_gm_datas[0]."' and date > '".$one_day_back."'"); $check_rew_c =mssql_result($check_rew_data, 0, 0); // Check how many times rewarded player was.
if($check_rew_c > $mvcore['allowed_rew_c_p_day']) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_reward_player_day_limit.' '.$mvcore['allowed_rew_c_p_day'].' '.gmcp_rs_per_day.'</div>'; };

if($reward_type == 'gcred') { $rew_type_s = '2'; $info_is = ''.gmcp_rs_reward.' '.$reward_data.' '.$mvcore['money_name2'].''; } 
elseif($reward_type == 'cred') { $rew_type_s = '1'; $info_is = ''.gmcp_rs_reward.' '.$reward_data.' '.$mvcore['money_name1'].''; };

if($rew_type_s == '1') { // Credits
if($reward_data > $mvcore['allow_rew_tc']) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.$mvcore['money_name1'].' '.gmcp_rs_limit_reached.' '.$mvcore['allow_rew_tc'].'</div>'; };
}
				elseif($rew_type_s == '2' && $mvcore['allow_rew_gc'] == 'yes') { // Gold credits
if($reward_data > $mvcore['allow_rew_gc_val']) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.$mvcore['money_name2'].' '.gmcp_rs_limit_reached.' '.$mvcore['allow_rew_gc_val'].'</div>'; };
}
				
if($char_name == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_enter_name.'</div>'; };
if($rew_reason == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_enter_reason.'</div>'; };
if($reward_data == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_enter_reward.'</div>'; };

//not part of team.
if($get_gm_datas[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_you_were_not.'</div>'; };

$ip_get = getUserIP();

if($get_chtc_dataswe[0] == $ip_get) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_trying_reward_account.'</div>'; };
if($useracc == $get_chid_datas[0]) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_rs_trying_reward_account.'</div>'; };


if($has_error >= '1'){} else {
	
	$edit_site = mssql_query("INSERT INTO MVCore_Rew_Data (gm_nick,reason,information,rew_to,date,rew_toch) VALUES ('".$get_gm_datas[0]."', '".$rew_reason."', '".$info_is."', '".$get_chid_datas[0]."', '".time()."','".$char_name."')");

	if($mvcore['rew_gm_for_event'] == 'yes') { $run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$mvcore['rew_gm_reward']."' where ".$mvcore['user_column']." ='".$useracc."'");  };
		

				//Take Cost
				if($rew_type_s == '1') { // Credits
					$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$reward_data."' where ".$mvcore['user_column']." ='".$get_chid_datas[0]."'");
					$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$get_chid_datas[0]."','".$reward_data."','0','From GM Event Reward','".time()."','0')");					
				}
				elseif($rew_type_s == '2' && $mvcore['allow_rew_gc'] == 'yes') { // Gold credits
					$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$reward_data."' where ".$mvcore['user_column']." ='".$get_chid_datas[0]."'");
					$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$get_chid_datas[0]."','0','".$reward_data."','From GM Event Reward','".time()."','0')");					
				};
				//end
		
echo '<div class="mvcore-nNote mvcore-nSuccess">'.gmcp_rs_success_reward_added.'</div>'; $message_edit = $success;
};
		
};

if($mvcore['allow_rew_gc'] == 'yes'){
	$re_opt_1 = '<option value="gcred">'.$mvcore['money_name2'].'</option>'; 
};

if($mvcore['allow_rew_gc'] == 'yes'){
	$outTextGC = ''.gmcp_rs_and.' '.$mvcore['allow_rew_gc_val'].' '.$mvcore['money_name2'].''; 
};
	
 ?>
<form method="POST" action="">
<input type="hidden" name="ban_usersdf" >
<div><?php echo''.gmcp_rs_can_reward.'';?> <?php echo $mvcore['allowed_rew_c_p_day'];?> <?php echo''.gmcp_rs_users_per_day.'';?> <?php echo $mvcore['allow_rew_tc'];?> <?php echo $mvcore['money_name1'];?> <?php echo $outTextGC;?></div>
	<table class="mvcore-table" align="center" width="100%" cellpadding="0" cellspacing="0">
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_rs_select_reward.'';?></td>
			<td>
				<select name="reward_type" style=" width:370px; " class="mvcore-select-main">
					<option value="cred" selected><?php echo $mvcore['money_name1'];?></option>
					<?php echo $re_opt_1;?>
				</select>
			</td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_rs_enter_reward_value.'';?></td>
			<td><input class="mvcore-input-main" type="text" name="reward_list" maxlength="200"/></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_rs_enter_character_name.'';?></td>
			<td><input class="mvcore-input-main" type="text" name="charname" maxlength="10"/></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td><?php echo''.gmcp_rs_reward_reason.'';?></td>
			<td><input class="mvcore-input-main" type="text" name="rew_reason" maxlength="200"/></td>
		</tr>
		<tr class="mvcore-table-disabled-td" align="center">
			<td colspan="2" align="center" style="padding-top:10px;"><button name="reward_players" class="mvcore-button-style" type="submit"><?php echo''.gmcp_rs_add_reward.'';?></button></td>
		</tr>
</table>
</form>
</div>
<?php } ?>
<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>