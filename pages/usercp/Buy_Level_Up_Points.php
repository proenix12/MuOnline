
<?php if(!$mvcore['Buy_Level_Up_Points'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Buy_Level_Up_Points'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo''.ucp_back_to_gpanel.''; ?></a></td></tr></table></div>
<?php

if($_GET['op3'] != ''){
	
	$character_name = $_GET['op3'];
	
	$points_id = $_POST['points_id'];
	$on_to_add = $_POST['add_on'];


$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where name = '".$character_name."'");
$drop_info = mssql_fetch_row($sys_start);

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

$mwr_index=1;
$mwr_acps=1;
$mwr_engine_s_fnc=1;
$mwr_engine=1;

if($points_id == '6'){ $points_cost = $mvcore['blupoints_cost'] / 1; };
if($points_id == '5'){ $points_cost = $mvcore['blupoints_cost'] / 2; };
if($points_id == '4'){ $points_cost = $mvcore['blupoints_cost'] / 3; };
if($points_id == '3'){ $points_cost = $mvcore['blupoints_cost'] / 4; };
if($points_id == '2'){ $points_cost = $mvcore['blupoints_cost'] / 5; };
if($points_id == '1'){ $points_cost = $mvcore['blupoints_cost'] / 6; };

if($points_id == '6'){ $points_add = $mvcore['server_max_stat'] / 1; };
if($points_id == '5'){ $points_add = $mvcore['server_max_stat'] / 2; };
if($points_id == '4'){ $points_add = $mvcore['server_max_stat'] / 3; };
if($points_id == '3'){ $points_add = $mvcore['server_max_stat'] / 4; };
if($points_id == '2'){ $points_add = $mvcore['server_max_stat'] / 5; };
if($points_id == '1'){ $points_add = $mvcore['server_max_stat'] / 6; };

//checking system
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
$acc_statusx[0] == 0 ? $useron=1 : $useron=0; //Username
if($acc_statusx[0] == 1) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_char_online.'</div>'; };

strtoupper($drop_info[15]) == strtoupper($useracc) ? $usern=1 : $usern=0; //Username
$drop_info[0] == $character_name ? $name=1 : $name=0; //Name
$points_id != '' ? $emids=1 : $emids=0; //can not be empty
$on_to_add != '' ? $emida=1 : $emida=0; //can not be empty

		if($on_to_add == '1') {
			$points_add < $drop_info[10] ? $point_vin=0 : $point_vin=1; //Check STR
				if($point_vin == '0') { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_blup_your_char_str.'</div>'; };
		} elseif($on_to_add == '2') {
			$points_add < $drop_info[11] ? $point_vin=0 : $point_vin=1; //Check AGI
				if($point_vin == '0') { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_blup_your_char_agi.'</div>'; };
		} elseif($on_to_add == '3') {
			$points_add < $drop_info[12] ? $point_vin=0 : $point_vin=1; //Check VIT
				if($point_vin == '0') { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_blup_your_char_vit.'</div>'; };
		} elseif($on_to_add == '4') {
			$points_add < $drop_info[13] ? $point_vin=0 : $point_vin=1; //Check ENE
				if($point_vin == '0') { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_blup_your_char_ene.'</div>'; };
		} elseif($on_to_add == '5') {
			$points_add < $drop_info[14] ? $point_vin=0 : $point_vin=1; //Check CMD
				if($point_vin == '0') { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_blup_your_char_com.'</div>'; };
		};

if($mvcore['blupoints_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['blupoints_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['blupoints_cost'] ? $cost=1 : $cost=0; //Zen
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more_zen.'</div>'; };
		}
		elseif($mvcore['blupoints_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['blupoints_cost'] ? $cost=1 : $cost=0; //Credits
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name1'].'!</div>'; };
		}
		elseif($mvcore['blupoints_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['blupoints_cost'] ? $cost=1 : $cost=0; //Credits2 
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name2'].'!</div>'; };
		};
};


	if($useron == '1' && $cost == '1' && $name == '1' && $usern == '1' && $point_vin == '1' && $emids == '1' && $emida == '1') {
		
		if($on_to_add == '1') {
			$run_update = mssql_query("Update character set strength = '".number_format($points_add, 0, '', '')."' where name = '".$character_name."'"); //
		} elseif($on_to_add == '2') {
			$run_update = mssql_query("Update character set dexterity = '".number_format($points_add, 0, '', '')."' where name = '".$character_name."'"); //
		} elseif($on_to_add == '3') {
			$run_update = mssql_query("Update character set vitality = '".number_format($points_add, 0, '', '')."' where name = '".$character_name."'"); //
		} elseif($on_to_add == '4') {
			$run_update = mssql_query("Update character set energy = '".number_format($points_add, 0, '', '')."' where name = '".$character_name."'"); //
		} elseif($on_to_add == '5') {
			$run_update = mssql_query("Update character set Leadership = '".number_format($points_add, 0, '', '')."' where name = '".$character_name."'"); //
		};

		
		//Take Cost
		if($mvcore['blupoints_cost_type'] == '0') {
			$run = mssql_query("update character set money = money - '".number_format($points_cost, 0, '', '')."' where name ='".$character_name."'"); 
		}
		elseif($mvcore['blupoints_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".number_format($points_cost, 0, '', '')."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		}
		elseif($mvcore['blupoints_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".number_format($points_cost, 0, '', '')."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_blup_success_old_rem_n_added.'</div>';
		
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

if($mvcore['blupoints_cost'] == '0') { $zen_on_off = ''; } else {
	
		if($mvcore['blupoints_cost_type'] == '0') {
			$zen_on_off = '<td>'.ucp_cpk_req.' Zen</td>';
		}
		elseif($mvcore['blupoints_cost_type'] == '1') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name1'].'</td>';
		}
		elseif($mvcore['blupoints_cost_type'] == '2') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name2'].'</td>';
		} else { $zen_on_off = ''; };
};

echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tr class="mvcore-tabletr">
			<td>'.ucp_cpk_name.'</td>
			'.$zen_on_off.'
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_buy_points.'</td>
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
if($mvcore['blupoints_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['blupoints_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['blupoints_cost'] ? $cost=1 : $cost=0; //Zen
		}
		elseif($mvcore['blupoints_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['blupoints_cost'] ? $cost=1 : $cost=0; //Credits
		}
		elseif($mvcore['blupoints_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['blupoints_cost'] ? $cost=1 : $cost=0; //Credits2 
		};
};

if($cost == '1') { $module_ok = '<a onclick="showAddStats(\''.$drop_info[0].'\'); return false;" href="#"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_buy_points.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };

//Coloring ifs
if($drop_info[4] >= $mvcore['blupoints_cost']) { $zen_color = '#58FA58'; } else { $zen_color = '#FE2E2E'; }; // Req. Zen Color
if($get_creditss[0] >= $mvcore['blupoints_cost']) { $cred_color = '#58FA58'; } else { $cred_color = '#FE2E2E'; }; // Req. credits Color
if($get_creditss[1] >= $mvcore['blupoints_cost']) { $cred2_color = '#58FA58'; } else { $cred2_color = '#FE2E2E'; }; // Req. credits2 Color
if($drop_info[2] >= $mvcore['blupoints_need_ress']) { $resn_color = '#58FA58'; } else { $resn_color = '#FE2E2E'; }; // Req. ress Color

//Extra options
if($mvcore['blupoints_cost'] == '0') { $colspasas = '2'; $colsp = '3'; $zen_on_off = ''; } else { $colspasas = '3';
	
		if($mvcore['blupoints_cost_type'] == '0') {
		$colsp = '4';	$zen_on_off = '<td><font color="'.$zen_color.'">'.number_format($mvcore['blupoints_cost'], 0, '', ',').' Zen</font></td>';
		}
		elseif($mvcore['blupoints_cost_type'] == '1') {
		$colsp = '4';	$zen_on_off = '<td><font color="'.$cred_color.'">'.number_format($mvcore['blupoints_cost'], 0, '', ',').' '.$mvcore['money_name1'].'</font></td>';
		}
		elseif($mvcore['blupoints_cost_type'] == '2') {
		$colsp = '4';	$zen_on_off = '<td><font color="'.$cred2_color.'">'.number_format($mvcore['blupoints_cost'], 0, '', ',').' '.$mvcore['money_name2'].'</font></td>';
		};
};

if($mvcore['blupoints_cost'] == '0') { $cost_on_off = ''; } else {
	
		if($mvcore['blupoints_cost_type'] == '0') {
		$cost_on_off = 'Zen';
		}
		elseif($mvcore['blupoints_cost_type'] == '1') {
		$cost_on_off = ''.$mvcore['money_name1'].'';
		}
		elseif($mvcore['blupoints_cost_type'] == '2') {
		$cost_on_off = ''.$mvcore['money_name2'].'';
		};
};

$stats_cp6 = $mvcore['blupoints_cost'] / 1;
$stats_cp5 = $mvcore['blupoints_cost'] / 2;
$stats_cp4 = $mvcore['blupoints_cost'] / 3;
$stats_cp3 = $mvcore['blupoints_cost'] / 4;
$stats_cp2 = $mvcore['blupoints_cost'] / 5;
$stats_cp1 = $mvcore['blupoints_cost'] / 6;

$stats_c6 = $mvcore['server_max_stat'] / 1;
$stats_c5 = $mvcore['server_max_stat'] / 2;
$stats_c4 = $mvcore['server_max_stat'] / 3;
$stats_c3 = $mvcore['server_max_stat'] / 4;
$stats_c2 = $mvcore['server_max_stat'] / 5;
$stats_c1 = $mvcore['server_max_stat'] / 6;

if($drop_info[6] >= '64' && $drop_info[6] <= '67') { $dl_cmd = '<option value="5">Command</option>'; } else { $dl_cmd = ''; };

if($mvcore['blupoints_need_ress'] >= '1') { $ress_on_off = '<td><font color="'.$resn_color.'">'.$mvcore['blupoints_need_ress'].'</font></td>'; } else { $ress_on_off = ''; }; //Need ress
		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				'.$zen_on_off.'
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
						<form method="POST" action="-id-user_cp-id-buy_level_up_points-id-'.$drop_info[0].'.html" name="jsdfddstats">
							<tr id="hiddenvlup1'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Select Points: </td>
								<td colspan="'.$colspasas.'" align="center">
									<select style=" width:370px; " class="mvcore-select-main" name="points_id">
										<option value="1">'.number_format($stats_c1).' Level Up Points For '.number_format($stats_cp1, 0, '', ',').' '.$cost_on_off.'</option> 
										<option value="2">'.number_format($stats_c2).' Level Up Points For '.number_format($stats_cp2, 0, '', ',').' '.$cost_on_off.'</option> 
										<option value="3">'.number_format($stats_c3).' Level Up Points For '.number_format($stats_cp3, 0, '', ',').' '.$cost_on_off.'</option> 
										<option value="4">'.number_format($stats_c4).' Level Up Points For '.number_format($stats_cp4, 0, '', ',').' '.$cost_on_off.'</option> 
										<option value="5">'.number_format($stats_c5).' Level Up Points For '.number_format($stats_cp5, 0, '', ',').' '.$cost_on_off.'</option> 
										<option value="6">'.number_format($stats_c6).' Level Up Points For '.number_format($stats_cp6, 0, '', ',').' '.$cost_on_off.'</option>
									</select>
								</td>
							</tr>
							<tr id="hiddenvlup2'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Choose : </td>
								<td colspan="'.$colspasas.'" align="center">
									<select style=" width:370px; " class="mvcore-select-main" name="add_on">
										<option value="1">Strength</option>
										<option value="2">Agility</option>
										<option value="3">Vitality</option>
										<option value="4">Energy</option>
										'.$dl_cmd.'
									</select>
								</td>
							</tr>
							<tr id="hiddenvlup3'.$drop_info[0].'" style="display:none;">
								<td colspan="'.$colsp.'"><div align="right"><button name="jsdfddstats" class="mvcore-button-style" type="submit">Submit</button></div></td>
							</tr>
						</form>
		';
};
?>
</table>
<?
if($mvcore['blupoints_cost'] >= '1') {

	if($mvcore['blupoints_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	elseif($mvcore['blupoints_cost_type'] == '2') { $cost_t_s = ''.$mvcore['money_name2'].''; }
	else{ $cost_t_s = 'Zen'; };
	
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_fordss.' '.$mvcore['server_max_stat'].' '.ucp_statssd.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['blupoints_cost'].' '.$cost_t_s.'</td>
				</tr>
			</table>
		</div>
	';
};
?>
<script>
function showAddStats(elmnts) {
	$("#hiddenvlup1" + elmnts).toggle();
	$("#hiddenvlup2" + elmnts).toggle();
	$("#hiddenvlup3" + elmnts).toggle();
};
</script>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>