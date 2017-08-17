
<?php if(!$mvcore['Sell_Free_Stats'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Sell_Free_Stats'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo''.ucp_back_to_gpanel.''; ?></a></td></tr></table></div>
<?php

if($_GET['op3'] != ''){
	
	$character_name = $_GET['op3'];
	
	$optionID = $_POST['opt_id'];
	
$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where name = '".$character_name."'");
$drop_info = mssql_fetch_row($sys_start);

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

if($optionID == '1'){$stats_points = 100;}
elseif($optionID == '2'){$stats_points = 100 * 5;}
elseif($optionID == '3'){$stats_points = 100 * 10;}
elseif($optionID == '4'){$stats_points = 100 * 15;}
elseif($optionID == '5'){$stats_points = 100 * 20;}
elseif($optionID == '6'){$stats_points = 100 * 25;}
elseif($optionID == '7'){$stats_points = 100 * 30;}
elseif($optionID == '8'){$stats_points = 100 * 50;}
elseif($optionID == '9'){$stats_points = 100 * 100;}
elseif($optionID == '10'){$stats_points = 100 * 200;}
elseif($optionID == '11'){$stats_points = 100 * 500;}
elseif($optionID == '12'){$stats_points = 100 * 1000;}
elseif($optionID == '13'){$stats_points = 100 * 1500;}
else{ $stats_points = 0; };

if($optionID == '1'){$points_cost = $mvcore['sellfstats_cost'];}
elseif($optionID == '2'){$points_cost = $mvcore['sellfstats_cost'] * 5;}
elseif($optionID == '3'){$points_cost = $mvcore['sellfstats_cost'] * 10;}
elseif($optionID == '4'){$points_cost = $mvcore['sellfstats_cost'] * 15;}
elseif($optionID == '5'){$points_cost = $mvcore['sellfstats_cost'] * 20;}
elseif($optionID == '6'){$points_cost = $mvcore['sellfstats_cost'] * 25;}
elseif($optionID == '7'){$points_cost = $mvcore['sellfstats_cost'] * 30;}
elseif($optionID == '8'){$points_cost = $mvcore['sellfstats_cost'] * 50;}
elseif($optionID == '9'){$points_cost = $mvcore['sellfstats_cost'] * 100;}
elseif($optionID == '10'){$points_cost = $mvcore['sellfstats_cost'] * 200;}
elseif($optionID == '11'){$points_cost = $mvcore['sellfstats_cost'] * 500;}
elseif($optionID == '12'){$points_cost = $mvcore['sellfstats_cost'] * 1000;}
elseif($optionID == '13'){$points_cost = $mvcore['sellfstats_cost'] * 1500;}
else { $points_cost = 0; };

//checking system
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
$acc_statusx[0] == 0 ? $useron=1 : $useron=0; //Username
if($acc_statusx[0] == 1) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_char_online.'</div>'; };

strtoupper($drop_info[15]) == strtoupper($useracc) ? $usern=1 : $usern=0; //Username
$drop_info[0] == $character_name ? $name=1 : $name=0; //Name
$optionID != '' ? $emid=1 : $emid=0; //can not be empty

if( $drop_info[5] >= $stats_points ) { 
	if( $drop_info[5] < $stats_points ) { $points_less = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.ucp_sfs_need_level_up_points.'</div>'; } else { $points_less = '1'; };
 } else { $points_less = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.ucp_sfs_need_level_up_points.'</div>'; };
 
if($mvcore['sellfstats_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['sellfstats_cost_type'] == '0') {
			$drop_info[4] >= floor($points_cost) ? $cost=1 : $cost=0; //Zen
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more_zen.'</div>'; };
		}
		elseif($mvcore['sellfstats_cost_type'] == '1') {
			$get_creditss[0] >= floor($points_cost) ? $cost=1 : $cost=0; //Credits
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name1'].'!</div>'; };
		}
		elseif($mvcore['sellfstats_cost_type'] == '2') {
			$get_creditss[1] >= floor($points_cost) ? $cost=1 : $cost=0; //Credits2 
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name2'].'!</div>'; };
		};
};

	if($useron == '1' && $name == '1' && $usern == '1' && $points_less == '1' && $emid == '1') {
		
		
		$run_update = mssql_query("Update character set LevelUpPoint = LevelUpPoint - '".$stats_points."' where name = '".$character_name."'");

		
		//Take Cost
		if($mvcore['sellfstats_cost_type'] == '0') {
			$run = mssql_query("update character set money = money + '".floor($points_cost)."' where name ='".$character_name."'"); 
		}
		elseif($mvcore['sellfstats_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".floor($points_cost)."' where ".$mvcore['user_column']." ='".$useracc."'");
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".floor($points_cost)."','0','From Sell Free Stats','".time()."','0')");
		}
		elseif($mvcore['sellfstats_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".floor($points_cost)."' where ".$mvcore['user_column']." ='".$useracc."'"); 
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','0','".floor($points_cost)."','From Sell Free Stats','".time()."','0')");
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_sfs_success_points.'</div>';
		
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

echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.ucp_cpk_name.'</td>
			<td>'.ucp_cpk_req.' '.ucp_min_points.'</td>
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_sell_stats.'</td>
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
if( $drop_info[5] >= '100' ) { $points_less = '1'; } else { $points_less = '0'; };

if($mvcore['sellfstats_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['sellfstats_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['sellfstats_cost'] ? $cost=1 : $cost=0; //Zen
		}
		elseif($mvcore['sellfstats_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['sellfstats_cost'] ? $cost=1 : $cost=0; //Credits
		}
		elseif($mvcore['sellfstats_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['sellfstats_cost'] ? $cost=1 : $cost=0; //Credits2 
		};
};

if($points_less == '1') { $module_ok = '<a onclick="showAddStats(\''.$drop_info[0].'\'); return false;" href="#"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_sell_stats.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };

//Coloring ifs
if($drop_info[5] >= '100') { $nedppl_color = '#58FA58'; } else { $nedppl_color = '#FE2E2E'; }; // Req. Ppl Color

if($drop_info[4] >= $mvcore['sellfstats_cost']) { $zen_color = '#58FA58'; } else { $zen_color = '#FE2E2E'; }; // Req. Zen Color
if($get_creditss[0] >= $mvcore['sellfstats_cost']) { $cred_color = '#58FA58'; } else { $cred_color = '#FE2E2E'; }; // Req. credits Color
if($get_creditss[1] >= $mvcore['sellfstats_cost']) { $cred2_color = '#58FA58'; } else { $cred2_color = '#FE2E2E'; }; // Req. credits2 Color

//Extra options
$stats_s1 = 100;
$stats_s2 = 100 * 5;
$stats_s3 = 100 * 10;
$stats_s4 = 100 * 15;
$stats_s5 = 100 * 20;
$stats_s6 = 100 * 25;
$stats_s7 = 100 * 30;
$stats_s8 = 100 * 50;
$stats_s9 = 100 * 100;
$stats_s10 = 100 * 200;
$stats_s11 = 100 * 500;
$stats_s12 = 100 * 1000;
$stats_s13 = 100 * 1500;

$stats_c1 = $mvcore['sellfstats_cost'];
$stats_c2 = $mvcore['sellfstats_cost'] * 5;
$stats_c3 = $mvcore['sellfstats_cost'] * 10;
$stats_c4 = $mvcore['sellfstats_cost'] * 15;
$stats_c5 = $mvcore['sellfstats_cost'] * 20;
$stats_c6 = $mvcore['sellfstats_cost'] * 25;
$stats_c7 = $mvcore['sellfstats_cost'] * 30;
$stats_c8 = $mvcore['sellfstats_cost'] * 50;
$stats_c9 = $mvcore['sellfstats_cost'] * 100;
$stats_c10 = $mvcore['sellfstats_cost'] * 200;
$stats_c11 = $mvcore['sellfstats_cost'] * 500;
$stats_c12 = $mvcore['sellfstats_cost'] * 1000;
$stats_c13 = $mvcore['sellfstats_cost'] * 1500;

if($mvcore['sellfstats_cost_type'] == '0') { $p_type = 'Zen'; } elseif($mvcore['sellfstats_cost_type'] == '1') { $p_type = ''.$mvcore['money_name1'].''; } elseif($mvcore['sellfstats_cost_type'] == '2') { $p_type = ''.$mvcore['money_name2'].''; };

if($drop_info[5] >= $stats_s1) { $echo_s1 = '<option value="1">Sell '.$stats_s1.' Level Up Points For '.floor($stats_c1).' '.$p_type.'</option>'; } else { $echo_s1 =''; };
if($drop_info[5] >= $stats_s2) { $echo_s2 = '<option value="2">Sell '.$stats_s2.' Level Up Points For '.floor($stats_c2).' '.$p_type.'</option>'; } else { $echo_s2 =''; };
if($drop_info[5] >= $stats_s3) { $echo_s3 = '<option value="3">Sell '.$stats_s3.' Level Up Points For '.floor($stats_c3).' '.$p_type.'</option>'; } else { $echo_s3 =''; };
if($drop_info[5] >= $stats_s4) { $echo_s4 = '<option value="4">Sell '.$stats_s4.' Level Up Points For '.floor($stats_c4).' '.$p_type.'</option>'; } else { $echo_s4 =''; };
if($drop_info[5] >= $stats_s5) { $echo_s5 = '<option value="5">Sell '.$stats_s5.' Level Up Points For '.floor($stats_c5).' '.$p_type.'</option>'; } else { $echo_s5 =''; };
if($drop_info[5] >= $stats_s6) { $echo_s6 = '<option value="6">Sell '.$stats_s6.' Level Up Points For '.floor($stats_c6).' '.$p_type.'</option>'; } else { $echo_s6 =''; };
if($drop_info[5] >= $stats_s7) { $echo_s7 = '<option value="7">Sell '.$stats_s7.' Level Up Points For '.floor($stats_c7).' '.$p_type.'</option>'; } else { $echo_s7 =''; };
if($drop_info[5] >= $stats_s8) { $echo_s8 = '<option value="8">Sell '.$stats_s8.' Level Up Points For '.floor($stats_c8).' '.$p_type.'</option>'; } else { $echo_s8 =''; };
if($drop_info[5] >= $stats_s9) { $echo_s9 = '<option value="9">Sell '.$stats_s9.' Level Up Points For '.floor($stats_c9).' '.$p_type.'</option>'; } else { $echo_s9 =''; };
if($drop_info[5] >= $stats_s10) { $echo_s10 = '<option value="10">Sell '.$stats_s10.' Level Up Points For '.floor($stats_c10).' '.$p_type.'</option>'; } else { $echo_s10 =''; };
if($drop_info[5] >= $stats_s11) { $echo_s11 = '<option value="11">Sell '.$stats_s11.' Level Up Points For '.floor($stats_c11).' '.$p_type.'</option>'; } else { $echo_s11 =''; };
if($drop_info[5] >= $stats_s12) { $echo_s12 = '<option value="12">Sell '.$stats_s12.' Level Up Points For '.floor($stats_c12).' '.$p_type.'</option>'; } else { $echo_s12 =''; };
if($drop_info[5] >= $stats_s13) { $echo_s13 = '<option value="13">Sell '.$stats_s13.' Level Up Points For '.floor($stats_c13).' '.$p_type.'</option>'; } else { $echo_s13 =''; };

		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				<td><font color="'.$nedppl_color.'">100+</font></td>
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
						<form method="POST" action="-id-user_cp-id-sell_free_stats-id-'.$drop_info[0].'.html" name="addstats">
							<tr id="hiddensfstats1'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Points value to sell: '.$drop_info[5].' >= '.$stats_s2.'</td>
								<td colspan="3" align="center">
									<select style="width:338px;" class="mvcore-select-main" name="opt_id">
										'.$echo_s1.'
										'.$echo_s2.'
										'.$echo_s3.'
										'.$echo_s4.'
										'.$echo_s5.'
										'.$echo_s6.'
										'.$echo_s7.'
										'.$echo_s8.'
										'.$echo_s9.'
										'.$echo_s10.'
										'.$echo_s11.'
										'.$echo_s12.'
										'.$echo_s13.'
									</select>
								</td>
							</tr>
							<tr id="hiddensfstats2'.$drop_info[0].'" style="display:none;">
								<td colspan="4"><div align="right"><button name="addstats" class="mvcore-button-style" type="submit">Submit</button></div></td>
							</tr>
						</form>
		';
};
?>
</table>
<?
if($mvcore['sellfstats_cost'] >= '1') {
	
	if($mvcore['sellfstats_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	elseif($mvcore['sellfstats_cost_type'] == '2') { $cost_t_s = ''.$mvcore['money_name2'].''; }
	else{ $cost_t_s = 'Zen'; };
	
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.$cost_t_s.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['sellfstats_cost'].'</td>
				</tr>
			</table>
		</div>
	';
};
?>
<script>
function showAddStats(elmnts) {
	$("#hiddensfstats1" + elmnts).toggle();
	$("#hiddensfstats2" + elmnts).toggle();
};
</script>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>