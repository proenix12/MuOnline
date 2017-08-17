
<?php if(!$mvcore['Change_Class'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Change_Class'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo''.ucp_back_to_gpanel.''; ?></a></td></tr></table></div>
<?php

if($_GET['op3'] != ''){
	
	$character_name = $_GET['op3'];
	
	$new_class = $_POST['class'];


$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where name = '".$character_name."'");
$drop_info = mssql_fetch_row($sys_start);

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

if($new_class == '' || $new_class == ' ') { $new_class = $drop_info[6]; };
		
if($new_class == '0' || $new_class == '16' || $new_class == '32' || $new_class == '48' || $new_class == '64' || $new_class == '80' || $new_class == '96' || $new_class == '112') { $class_problm = 1; } else { $class_problm = 0; };

//checking system
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
$acc_statusx[0] == 0 ? $useron=1 : $useron=0; //Username
if($acc_statusx[0] == 1) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_char_online.'</div>'; };

strtoupper($drop_info[15]) == strtoupper($useracc) ? $usern=1 : $usern=0; //Username
$drop_info[0] == $character_name ? $name=1 : $name=0; //Name
if( $mvcore['changeclass_need_ress'] >= '1' ) { $drop_info[2] >= $mvcore['changeclass_need_ress'] ? $ress_need=1 : $ress_need=0; } else { $ress_need=1; }; //Need ress
$new_class != '' ? $emidss=1 : $emidss=0; //can not be empty
if($mvcore['changeclass_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['changeclass_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['changeclass_cost'] ? $cost=1 : $cost=0; //Zen
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more_zen.'</div>'; };
		}
		elseif($mvcore['changeclass_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['changeclass_cost'] ? $cost=1 : $cost=0; //Credits
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name1'].'!</div>'; };
		}
		elseif($mvcore['changeclass_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['changeclass_cost'] ? $cost=1 : $cost=0; //Credits2 
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name2'].'!</div>'; };
		};
};

if($mvcore['db_season'] >= '9') { $cvbins = '7680'; } elseif($mvcore['db_season'] == '1') { $cvbins = '1200'; } else { $cvbins = '3840'; }; // Warehouse
if($mvcore['db_season'] >= '9') { $cvbinsch = '7552'; } elseif($mvcore['db_season'] == '1') { $cvbinsch = '1080'; } else { $cvbinsch = '3776'; }; // Inventory

$sqll= mssql_query("declare @items varbinary(".$cvbinsch."); 
	set @items = (select [Inventory] from [Character] where [name]='".$drop_info[0]."');
	print @items;");
$sqll=mssql_get_last_message();

if($mvcore['db_season'] >= '9') { $hexlen = '64'; } elseif($mvcore['db_season'] == '1') { $hexlen = '20'; } else { $hexlen = '32'; };

$sqlls	= substr($sqll,2);
$item_check0		= substr($sqlls,($hexlen*0), $hexlen);	//Item 0
$item_check1		= substr($sqlls,($hexlen*1), $hexlen);	//Item 1
$item_check2		= substr($sqlls,($hexlen*2), $hexlen);	//Item 2
$item_check3		= substr($sqlls,($hexlen*3), $hexlen);	//Item 3
$item_check4		= substr($sqlls,($hexlen*4), $hexlen);	//Item 4
$item_check5		= substr($sqlls,($hexlen*5), $hexlen);	//Item 5
$item_check6		= substr($sqlls,($hexlen*6), $hexlen);	//Item 6
$item_check7		= substr($sqlls,($hexlen*7), $hexlen);	//Item 7
$item_check8		= substr($sqlls,($hexlen*8), $hexlen);	//Item 8
$item_check9		= substr($sqlls,($hexlen*9), $hexlen);	//Item 9
$item_check10		= substr($sqlls,($hexlen*10), $hexlen);	//Item 10
$item_check11		= substr($sqlls,($hexlen*11), $hexlen);	//Item 11

if($mvcore['db_season'] >= '9') { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; } elseif($mvcore['db_season'] == '1') { $hexlens = 'FFFFFFFFFFFFFFFFFFFF'; } else { $hexlens = 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'; };

if($item_check0 == $hexlens && $item_check1 == $hexlens && $item_check2 == $hexlens && $item_check3 == $hexlens && $item_check4 == $hexlens && $item_check5 == $hexlens && $item_check6 == $hexlens && $item_check7 == $hexlens && $item_check8 == $hexlens && $item_check9 == $hexlens && $item_check10 == $hexlens && $item_check11 == $hexlens) { $items_on_char = 1; } 
else { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_cc_remove_items.'</div>'; $items_on_char = 0; };

	if($useron == '1' && $cost == '1' && $name == '1' && $usern == '1' && $ress_need == '1' && $items_on_char == '1' && $class_problm == '1' && $emidss == '1') {
		
		$run_update = mssql_query("Update character set class = '".$new_class."' where name = '".$character_name."'"); //Change Class
		$run_update = mssql_query("Update character set Quest = NULL where name = '".$character_name."'"); //Quest Reset
		
		$run_update = mssql_query("delete from QuestKillCount where Name = '".$character_name."'"); //Quest Reset FIX
		
		$run_update = mssql_query("Update character set MagicList = NULL where name = '".$character_name."'"); //MagicList Reset
		$run_update = mssql_query("Update character set SCFMasterSkill = NULL where name = '".$character_name."'"); //SCFMasterSkill Reset

		$run_update = mssql_query("update T_SkillTree_Info set MASTER_LEVEL = '0', ML_EXP = '0', ML_NEXTEXP = '35507050', ML_POINT = '0' where CHAR_NAME = '".$character_name."'"); //SkilTree Data Reset ( zTeam )
		
		//Take Cost
		if($mvcore['changeclass_cost_type'] == '0') {
			$run = mssql_query("update character set money = money - '".$mvcore['changeclass_cost']."' where name ='".$character_name."'"); 
		}
		elseif($mvcore['changeclass_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$mvcore['changeclass_cost']."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		}
		elseif($mvcore['changeclass_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$mvcore['changeclass_cost']."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_cc_success_class_change.'</div>';
		
	} else { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_some_req_not_respected.'</div>'; } ;
};
?>
<?php
	$useracc = $_SESSION['username']; // Get Loged In Username
	$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where AccountID = '".$useracc."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
	$drop_infosd = mssql_fetch_row($sys_start);
	if($drop_infosd[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.ucp_char_list_empty.'</div>'; } else {
?>
<?php

if( $mvcore['changeclass_need_ress'] >= '1' ) { $ress_on_off = '<td>'.ucp_cpk_req.' Resets</td>'; } else { $ress_on_off = ''; }; //Need ress
if($mvcore['changeclass_cost'] == '0') { $zen_on_off = ''; } else {
	
		if($mvcore['changeclass_cost_type'] == '0') {
			$zen_on_off = '<td>'.ucp_cpk_req.' Zen</td>';
		}
		elseif($mvcore['changeclass_cost_type'] == '1') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name1'].'</td>';
		}
		elseif($mvcore['changeclass_cost_type'] == '2') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name2'].'</td>';
		} else { $zen_on_off = ''; };
};

echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tr class="mvcore-tabletr">
			<td>'.ucp_cpk_name.'</td>
			<td>'.ucp_class.'</td>
			'.$ress_on_off.'
			'.$zen_on_off.'
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_change_class.'</td>
		</tr>
';

$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where AccountID = '".$useracc."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
for($i=0;$i < mssql_num_rows($sys_start);++$i) {
$drop_info = mssql_fetch_row($sys_start);

//Static things
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
switch ($drop_info[9]) {
case 6: $hstatus="Phonoman"; break;
Case 5: $hstatus="Phonoman lvl 2"; break;
Case 4: $hstatus="Phonoman lvl 1"; break;
Case 3: $hstatus="Commoner"; break;
Case 2: $hstatus="Hero lvl 1"; break;
Case 1: $hstatus="Hero lvl 2"; break;
Case 0: $hstatus="Hero"; break;
};
switch ($acc_statusx[0]) {  case 0: $is_on_off="<font color='#58FA58'>".gs_status_offline."</font>"; break; case 1: $is_on_off="<font color='#FE2E2E'>".gs_status_online."</font>"; break; Default: $is_on_off="<font color='#58FA58'>".gs_status_offline."</font>"; break; };
$get_class = getClass($drop_info[6]);
$get_map = getMap($drop_info[8]);

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

//checking system
if( $mvcore['changeclass_need_ress'] >= '1' ) { $drop_info[2] >= $mvcore['changeclass_need_ress'] ? $ress_need=1 : $ress_need=0; } else { $ress_need=1; }; //Need ress
if($mvcore['changeclass_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['changeclass_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['changeclass_cost'] ? $cost=1 : $cost=0; //Zen
		}
		elseif($mvcore['changeclass_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['changeclass_cost'] ? $cost=1 : $cost=0; //Credits
		}
		elseif($mvcore['changeclass_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['changeclass_cost'] ? $cost=1 : $cost=0; //Credits2 
		};
};

if($cost == '1' && $ress_need == '1') { $module_ok = '<a onclick="showAddStats(\''.$drop_info[0].'\'); return false;" href="#"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_change_class.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };

if(!$mvcore['changeclass_cost'] >= '1' && !$mvcore['changeclass_need_ress'] >= '1') { $colsp = '4'; };

//Coloring ifs
if($drop_info[4] >= $mvcore['changeclass_cost']) { $zen_color = '#58FA58'; } else { $zen_color = '#FE2E2E'; }; // Req. Zen Color
if($get_creditss[0] >= $mvcore['changeclass_cost']) { $cred_color = '#58FA58'; } else { $cred_color = '#FE2E2E'; }; // Req. credits Color
if($get_creditss[1] >= $mvcore['changeclass_cost']) { $cred2_color = '#58FA58'; } else { $cred2_color = '#FE2E2E'; }; // Req. credits2 Color
if($drop_info[2] >= $mvcore['changeclass_need_ress']) { $resn_color = '#58FA58'; } else { $resn_color = '#FE2E2E'; }; // Req. ress Color

//Extra options
if($mvcore['changeclass_cost'] == '0') { $colsp = '4'; $zen_on_off = ''; } else {
	
		if($mvcore['changeclass_cost_type'] == '0') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$zen_color.'">'.number_format($mvcore['changeclass_cost'], 0, '', ',').' Zen</font></td>';
		}
		elseif($mvcore['changeclass_cost_type'] == '1') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$cred_color.'">'.number_format($mvcore['changeclass_cost'], 0, '', ',').' '.$mvcore['money_name1'].'</font></td>';
		}
		elseif($mvcore['changeclass_cost_type'] == '2') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$cred2_color.'">'.number_format($mvcore['changeclass_cost'], 0, '', ',').' '.$mvcore['money_name2'].'</font></td>';
		};
};
if( $mvcore['db_season'] >= '4'){ $SupSumClass = '<option value="80">Summoner</option>'; } else { $SupSumClass = ''; };
if( $mvcore['db_season'] >= '6'){ $SupRfClass = '<option value="96">Rage Fighter</option>'; } else { $SupRfClass = ''; };
if( $mvcore['db_season'] >= '10'){ $SupGlClass = '<option value="112">Grow Lancer</option>'; } else { $SupGlClass = ''; };

if($mvcore['changeclass_need_ress'] >= '1') { $colspqw = '4'; $colsp = '6'; $ress_on_off = '<td><font color="'.$resn_color.'">'.$mvcore['changeclass_need_ress'].'</font></td>'; } else { $colspqw = '3'; $colsp = '5'; $ress_on_off = ''; }; //Need ress
		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				<td>'.$get_class.'</td>
				'.$ress_on_off.'
				'.$zen_on_off.'
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
						<form method="POST" action="-id-user_cp-id-change_class-id-'.$drop_info[0].'.html" name="addstats">
							<tr id="hiddencclass1'.$drop_info[0].'" style="display:none;">
								<td colspan="2" align="center">&nbsp;&nbsp; Choose New Class: </td>
								<td colspan="'.$colspqw.'" align="center">
									<select style="width:338px;" class="mvcore-select-main" name="class">
										<option value="0">Dark Wizard</option>
										<option value="16">Dark Knight</option>
										<option value="32">Elf</option>
										<option value="48">Magic Gladiator</option>
										<option value="64">Dark Lord</option>
										'.$SupSumClass.'
										'.$SupRfClass.'
										'.$SupGlClass.'
									</select>
								</td>
							</tr>
							<tr id="hiddencclass2'.$drop_info[0].'" style="display:none;">
								<td colspan="'.$colsp.'"><div align="right"><button name="addstats" class="mvcore-button-style" type="submit">Submit</button></div></td>
							</tr>
						</form>
		';
};
?>
</table>
<?
if($mvcore['changeclass_cost'] >= '1') {

	if($mvcore['changeclass_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	elseif($mvcore['changeclass_cost_type'] == '2') { $cost_t_s = ''.$mvcore['money_name2'].''; }
	else{ $cost_t_s = 'Zen'; };
	
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.$cost_t_s.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['changeclass_cost'].'</td>
				</tr>
			</table>
		</div>
	';
};
if($mvcore['changeclass_need_ress'] >= '1') {

	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' Resets</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['changeclass_need_ress'].'</td>
				</tr>
			</table>
		</div>
	';
};
?>
<script>
function showAddStats(elmnts) {
	$("#hiddencclass1" + elmnts).toggle();
	$("#hiddencclass2" + elmnts).toggle();
};
</script>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>