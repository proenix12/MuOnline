
<?php if(!$mvcore['Add_Stats'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Add_Stats'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo''.ucp_back_to_gpanel.''; ?></a></td></tr></table></div>
<?php

if($_GET['op3'] != ''){
	
	$character_name = $_GET['op3'];
	
	$str = $_POST['str'];
	$agi = $_POST['agi'];
	$vit = $_POST['vit'];
	$ene = $_POST['ene'];
	$lead = $_POST['lead'];
	
	$str = stripSTCheck($str);
	$agi = stripSTCheck($agi);
	$vit = stripSTCheck($vit);
	$ene = stripSTCheck($ene);
	$lead = stripSTCheck($lead);

if( $str == '' ) { $str = '0'; };
if( $agi == '' ) { $agi = '0'; };
if( $vit == '' ) { $vit = '0'; };
if( $ene == '' ) { $ene = '0'; };
if( $lead == '' ) { $lead = '0'; };

$calc_points_remove = $str + $agi + $vit + $ene + $lead;
$calc_points_removes = $str + $agi + $vit + $ene + $lead - 1;

$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where name = '".$character_name."'");
$drop_info = mssql_fetch_row($sys_start);

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

//checking system
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
$acc_statusx[0] == 0 ? $useron=1 : $useron=0; //Username
if($acc_statusx[0] == 1) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_char_online.'</div>'; };

strtoupper($drop_info[15]) == strtoupper($useracc) ? $usern=1 : $usern=0; //Username
$drop_info[0] == $character_name ? $name=1 : $name=0; //Name
$drop_info[5] >= $calc_points_removes ? $points=1 : $points=0; //points

$max_str = $str + Show65kStats($drop_info[10]);
$max_agi = $agi + Show65kStats($drop_info[11]);
$max_vit = $vit + Show65kStats($drop_info[12]);
$max_ene = $ene + Show65kStats($drop_info[13]);
$max_lead = $lead + Show65kStats($drop_info[14]);

if($max_str > $mvcore['server_max_stat'] || $max_agi > $mvcore['server_max_stat'] || $max_vit > $mvcore['server_max_stat'] || $max_ene > $mvcore['server_max_stat'] || $max_lead > $mvcore['server_max_stat_dl'] ){ $max_points = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_ad_to_much.' '.$mvcore['server_max_stat'].' Com: '.$mvcore['server_max_stat_dl'].'</div>'; } else { $max_points = '1'; };

if($mvcore['addstat_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['addstat_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['addstat_cost'] ? $cost=1 : $cost=0; //Zen
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more_zen.'</div>'; };
		}
		elseif($mvcore['addstat_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['addstat_cost'] ? $cost=1 : $cost=0; //Credits
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name1'].'!</div>'; };
		}
		elseif($mvcore['addstat_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['addstat_cost'] ? $cost=1 : $cost=0; //Credits2 
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name2'].'!</div>'; };
		};
};
if(!preg_match("/^\d*$/",$str) || !preg_match("/^\d*$/",$agi) || !preg_match("/^\d*$/",$vit) || !preg_match("/^\d*$/",$ene) || !preg_match("/^\d*$/",$lead)) { $stat_falses = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_ad_only_numbers.'</div>'; } else { $stat_falses = '1';};
if ($str < 0 || $agi < 0 || $vit < 0 || $ene < 0 || $lead < 0 ) { $stat_false = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_ad_minus_not_allowed.'</div>'; } else { $stat_false = '1';};

	if($useron == '1' && $cost == '1' && $name == '1' && $usern == '1' && $stat_falses == '1' && $stat_false == '1' && $points == '1' && $max_points == '1') {
		
		$run_update = mssql_query("Update character set LevelUpPoint = LevelUpPoint - '".$calc_points_remove."', strength = '".$max_str."', dexterity = '".$max_agi."', vitality = '".$max_vit."', energy = '".$max_ene."' where name = '".$character_name."'"); //Add stats Normal
			if($drop_info[6] >= '64' && $drop_info[6] <= '67') { $run_update = mssql_query("Update character set Leadership = '".$max_lead."' where name = '".$character_name."'"); }; //DL Command add
		//Take Cost
		if($mvcore['addstat_cost_type'] == '0') {
			$run = mssql_query("update character set money = money - '".$mvcore['addstat_cost']."' where name ='".$character_name."'"); 
		}
		elseif($mvcore['addstat_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$mvcore['addstat_cost']."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		}
		elseif($mvcore['addstat_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$mvcore['addstat_cost']."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_ad_success_add.'</div>';
		
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


if($mvcore['addstat_cost'] == '0') { $zen_on_off = ''; } else {
	
		if($mvcore['addstat_cost_type'] == '0') {
			$zen_on_off = '<td>'.ucp_cpk_req.' Zen</td>';
		}
		elseif($mvcore['addstat_cost_type'] == '1') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name1'].'</td>';
		}
		elseif($mvcore['addstat_cost_type'] == '2') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name2'].'</td>';
		} else { $zen_on_off = ''; };
};

echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tr class="mvcore-tabletr">
			<td>'.ucp_cpk_name.'</td>
			<td>'.ucp_Level_up_points.'</td>
			'.$zen_on_off.'
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_add_stats.'</td>
		</tr>
';

$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where AccountID = '".$useracc."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
for($i=0;$i < mssql_num_rows($sys_start);++$i) {
$drop_info = mssql_fetch_row($sys_start);

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

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

//checking system

if($mvcore['addstat_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['addstat_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['addstat_cost'] ? $cost=1 : $cost=0; //Zen
		}
		elseif($mvcore['addstat_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['addstat_cost'] ? $cost=1 : $cost=0; //Credits
		}
		elseif($mvcore['addstat_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['addstat_cost'] ? $cost=1 : $cost=0; //Credits2 
		};
};

if($cost == '1') { $module_ok = '<a onclick="showAddStats(\''.$drop_info[0].'\'); return false;" href="#"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_add_stats.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };

//Coloring ifs
if($drop_info[4] >= $mvcore['addstat_cost']) { $zen_color = '#58FA58'; } else { $zen_color = '#FE2E2E'; }; // Req. Zen Color
if($get_creditss[0] >= $mvcore['addstat_cost']) { $cred_color = '#58FA58'; } else { $cred_color = '#FE2E2E'; }; // Req. credits Color
if($get_creditss[1] >= $mvcore['addstat_cost']) { $cred2_color = '#58FA58'; } else { $cred2_color = '#FE2E2E'; }; // Req. credits2 Color

//Extra options
if($drop_info[6] >= '64' && $drop_info[6] <= '67') { $add_cmd = '<tr id="hiddenStatsAdd6'.$drop_info[0].'" style="display:none;"><td align="center" colspan="1">&nbsp;&nbsp; Command: '.Show65kStats($drop_info[14]).'</td><td colspan="'.$colspanscr.'" align="center"><input class="mvcore-input-main" type="text" name="lead" maxlength="10"/></td></tr>'; }; //DL Command add

if($mvcore['addstat_cost'] == '0') { $colsp = '4'; $zen_on_off = ''; $colspanscr = '3'; } else { $colspanscr = '4';
	
		if($mvcore['addstat_cost_type'] == '0') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$zen_color.'">'.number_format($mvcore['addstat_cost'], 0, '', ',').' Zen</font></td>';
		}
		elseif($mvcore['addstat_cost_type'] == '1') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$cred_color.'">'.number_format($mvcore['addstat_cost'], 0, '', ',').' '.$mvcore['money_name1'].'</font></td>';
		}
		elseif($mvcore['addstat_cost_type'] == '2') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$cred2_color.'">'.number_format($mvcore['addstat_cost'], 0, '', ',').' '.$mvcore['money_name2'].'</font></td>';
		};
};

		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				<td>'.number_format($drop_info[5], 0, '', ',').'</td>
				'.$zen_on_off.'
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
				
						<form method="POST" action="-id-user_cp-id-add_stats-id-'.$drop_info[0].'.html" name="addstats">
							<tr id="hiddenStatsAdd1'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Strength: '.Show65kStats($drop_info[10]).'</td>
								<td colspan="'.$colspanscr.'" align="center"><input class="mvcore-input-main" type="text" name="str" maxlength="10"/></td>
							</tr>
							<tr id="hiddenStatsAdd2'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Agility: '.Show65kStats($drop_info[11]).'</td>
								<td colspan="'.$colspanscr.'" align="center"><input class="mvcore-input-main" type="text" name="agi" maxlength="10"/></td>
							</tr>
							<tr id="hiddenStatsAdd3'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Vitality: '.Show65kStats($drop_info[12]).'</td>
								<td colspan="'.$colspanscr.'" align="center"><input class="mvcore-input-main" type="text" name="vit" maxlength="10"/></td>
							</tr>
							<tr id="hiddenStatsAdd4'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Energy: '.Show65kStats($drop_info[13]).'</td>
								<td colspan="'.$colspanscr.'" align="center"><input class="mvcore-input-main" type="text" name="ene" maxlength="10"/></td>
							</tr>
							'.$add_cmd.'
						
							<tr id="hiddenStatsAdd5'.$drop_info[0].'" style="display:none;">
								<td colspan="'.$colsp.'"><div align="right"><button name="addstats" class="mvcore-button-style" type="submit">Add Points</button></div></td>
							</tr>
						</form>
				
		';
};
?>
</table>
<?
if($mvcore['addstat_cost'] >= '1') {
	
	if($mvcore['addstat_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	elseif($mvcore['addstat_cost_type'] == '2') { $cost_t_s = ''.$mvcore['money_name2'].''; }
	else{ $cost_t_s = 'Zen'; };
	
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.$cost_t_s.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['addstat_cost'].'</td>
				</tr>
			</table>
		</div>
	';
};
?>
<script>
function showAddStats(elmnts) {
	$("#hiddenStatsAdd1" + elmnts).toggle();
	$("#hiddenStatsAdd2" + elmnts).toggle();
	$("#hiddenStatsAdd3" + elmnts).toggle();
	$("#hiddenStatsAdd4" + elmnts).toggle();
	$("#hiddenStatsAdd5" + elmnts).toggle();
	$("#hiddenStatsAdd6" + elmnts).toggle();
};
</script>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>