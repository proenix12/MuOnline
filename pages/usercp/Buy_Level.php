
<?php if(!$mvcore['Buy_Level'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Buy_Level'] == 'on') { ?>
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

//checking system
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
$acc_statusx[0] == 0 ? $useron=1 : $useron=0; //Username
if($acc_statusx[0] == 1) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_char_online.'</div>'; };

strtoupper($drop_info[15]) == strtoupper($useracc) ? $usern=1 : $usern=0; //Username
$drop_info[0] == $character_name ? $name=1 : $name=0; //Name
$optionID != '' ? $emid=1 : $emid=0; //can not be empty


if($optionID == '16') { $b_level = '16000'; $points_cost = $mvcore['buylevel_cost']; } 
elseif($optionID == '32') { $b_level = '32000'; $points_cost = $mvcore['buylevel_cost'] * 2; };

if( $drop_info[1] == '16000' ) { $level_is = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_bl_already_has_level.' 16000</div>'; } else { $level_is = '1'; };
if( $drop_info[1] == '32000' ) { $level_is = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_bl_already_has_level.' 32000</div>'; } else { $level_is = '1'; };

if($mvcore['buylevel_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['buylevel_cost_type'] == '1') {
			$get_creditss[0] >= floor($points_cost) ? $cost=1 : $cost=0; //Credits
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name1'].'!</div>'; };
		}
		elseif($mvcore['buylevel_cost_type'] == '2') {
			$get_creditss[1] >= floor($points_cost) ? $cost=1 : $cost=0; //Credits2 
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name2'].'!</div>'; };
		};
};

	if($useron == '1' && $name == '1' && $usern == '1' && $emid == '1' && $cost == '1' && $level_is == '1') {
		
		
		$run_update = mssql_query("Update character set clevel = '".$b_level."' where name = '".$character_name."'");

		
		//Take Cost
		if($mvcore['buylevel_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".floor($points_cost)."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		}
		elseif($mvcore['buylevel_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".floor($points_cost)."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_bl_success_added.'</div>';
		
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
			<td>'.ucp_level.'</td>
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_buy_level.'</td>
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

if( $drop_info[1] >= '16000' ) { $level_is = '1'; } else { $level_is = '0'; };

if($level_is == '0') { $module_ok = '<a onclick="showAddStats(\''.$drop_info[0].'\'); return false;" href="#"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_buy_level.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };
	
if($drop_info[4] >= $mvcore['buylevel_cost']) { $zen_color = '#58FA58'; } else { $zen_color = '#FE2E2E'; }; // Req. Zen Color
if($get_creditss[0] >= $mvcore['buylevel_cost']) { $cred_color = '#58FA58'; } else { $cred_color = '#FE2E2E'; }; // Req. credits Color
if($get_creditss[1] >= $mvcore['buylevel_cost']) { $cred2_color = '#58FA58'; } else { $cred2_color = '#FE2E2E'; }; // Req. credits2 Color

if($mvcore['buylevel_cost_type'] == '0') { $p_type = 'Zen'; } elseif($mvcore['buylevel_cost_type'] == '1') { $p_type = ''.$mvcore['money_name1'].''; } elseif($mvcore['buylevel_cost_type'] == '2') { $p_type = ''.$mvcore['money_name2'].''; };

$Cost32 = $mvcore['buylevel_cost'] * 2;

if($mvcore['buylevel_level_value'] == '16') { $opt16 = '<option value="16">Level 16000 For '.$mvcore['buylevel_cost'].' '.$p_type.'</option>'; } 
elseif($mvcore['buylevel_level_value'] == '32') { $opt32 = '<option value="32">Level 32000 For '.$Cost32.' '.$p_type.'</option>'; } 
elseif($mvcore['buylevel_level_value'] == 'both') { $both1 = '<option value="16">Level 16000 For '.$mvcore['buylevel_cost'].' '.$p_type.'</option>';  $both2 = '<option value="32">Level 32000 For '.$Cost32.' '.$p_type.'</option>'; };

		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				<td>'.$drop_info[1].'</td>
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
						<form method="POST" action="-id-user_cp-id-Buy_Level-id-'.$drop_info[0].'.html" name="buylevel">
							<tr id="hiddensfstats1'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Choose Level</td>
								<td colspan="3" align="center">
									<select style="width:338px;" class="mvcore-select-main" name="opt_id">
										'.$opt16.'
										'.$opt32.'
										'.$both1.'
										'.$both2.'
									</select>
								</td>
							</tr>
							<tr id="hiddensfstats2'.$drop_info[0].'" style="display:none;">
								<td colspan="4"><div align="right"><button name="buylevel" class="mvcore-button-style" type="submit">Buy Level</button></div></td>
							</tr>
						</form>
		';
};
?>
</table>
<?
if($mvcore['buylevel_cost'] >= '1' && $mvcore['buylevel_level_value'] == '16') {

	if($mvcore['buylevel_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	elseif($mvcore['buylevel_cost_type'] == '2') { $cost_t_s = ''.$mvcore['money_name2'].''; }
	else{ $cost_t_s = 'Zen'; };
	
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.$cost_t_s.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['buylevel_cost'].'</td>
				</tr>
			</table>
		</div>
	';
};
if($mvcore['buylevel_cost'] >= '1' && $mvcore['buylevel_level_value'] == '32') {

	if($mvcore['buylevel_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	elseif($mvcore['buylevel_cost_type'] == '2') { $cost_t_s = ''.$mvcore['money_name2'].''; }
	else{ $cost_t_s = 'Zen'; };
	$calctwos = $mvcore['buylevel_cost'] * 2;
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.$cost_t_s.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$calctwos.'</td>
				</tr>
			</table>
		</div>
	';
};
if($mvcore['buylevel_cost'] >= '1' && $mvcore['buylevel_level_value'] == 'both') {

	if($mvcore['buylevel_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	elseif($mvcore['buylevel_cost_type'] == '2') { $cost_t_s = ''.$mvcore['money_name2'].''; }
	else{ $cost_t_s = 'Zen'; };
	
	$calctwos = $mvcore['buylevel_cost'] * 2;
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_optbl.'</b>:</td>
					<td style="float:right;padding-right:15px;">16lvl '.ucp_askm.' '.$mvcore['buylevel_cost'].' '.$cost_t_s.'</td>
				</tr>
			</table>
		</div>
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_opttwbl.'</b>:</td>
					<td style="float:right;padding-right:15px;">32lvl '.ucp_askm.' '.$calctwos.' '.$cost_t_s.'</td>
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