
<?php if(!$mvcore['Clear_PK_Status'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Clear_PK_Status'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo''.ucp_back_to_gpanel.''; ?></a></td></tr></table></div>
<?php
if($_GET['op3'] != ''){
	
	$character_name = $_GET['op3'];
	
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

if($drop_info[9] <= '3'){ $is_pk = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_cpk_char_dosnt_pk.'</div>'; } else{ $is_pk = '1'; };

if($mvcore['pkstatus_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['pkstatus_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['pkstatus_cost'] ? $cost=1 : $cost=0; //Zen
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more_zen.'</div>'; };
		}
		elseif($mvcore['pkstatus_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['pkstatus_cost'] ? $cost=1 : $cost=0; //Credits
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name1'].'!</div>'; };
		}
		elseif($mvcore['pkstatus_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['pkstatus_cost'] ? $cost=1 : $cost=0; //Credits2 
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name2'].'!</div>'; };
		};
};

	if($useron == '1' && $cost == '1' && $name == '1' && $usern == '1' && $is_pk == '1') {
		
		
		$run_update = mssql_query("Update character set PkLevel = '3' where name = '".$character_name."'");

		
		//Take Cost
		if($mvcore['pkstatus_cost_type'] == '0') {
			$run = mssql_query("update character set money = money - '".$mvcore['pkstatus_cost']."' where name ='".$character_name."'"); 
		}
		elseif($mvcore['pkstatus_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$mvcore['pkstatus_cost']."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		}
		elseif($mvcore['pkstatus_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$mvcore['pkstatus_cost']."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_cpk_pk_cleared.'</div>';
		
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


if($mvcore['pkstatus_cost'] == '0') { $zen_on_off = ''; } else {
	
		if($mvcore['pkstatus_cost_type'] == '0') {
			$zen_on_off = '<td>'.ucp_cpk_req.' Zen</td>';
		}
		elseif($mvcore['pkstatus_cost_type'] == '1') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name1'].'</td>';
		}
		elseif($mvcore['pkstatus_cost_type'] == '2') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name2'].'</td>';
		} else { $zen_on_off = ''; };
};

echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.ucp_cpk_name.'</td>
			<td>'.ucp_cpk_status.'</td>
			'.$zen_on_off.'
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_cpk_clearPK.'</td>
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
if($drop_info[9] <= '3'){ $is_pk = '0'; } else{ $is_pk = '1'; };

if($mvcore['pkstatus_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['pkstatus_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['pkstatus_cost'] ? $cost=1 : $cost=0; //Zen
		}
		elseif($mvcore['pkstatus_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['pkstatus_cost'] ? $cost=1 : $cost=0; //Credits
		}
		elseif($mvcore['pkstatus_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['pkstatus_cost'] ? $cost=1 : $cost=0; //Credits2 
		};
};

if($cost == '1' && $is_pk == '1') { $module_ok = '<a href="-id-user_cp-id-clear_pk_status-id-'.$drop_info[0].'.html"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_cpk_clearPK.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };

//Coloring ifs
if($drop_info[9] >= '3') { $pk_color = '#FE2E2E'; } else { $pk_color = '#58FA58'; }; // PK Color
if($drop_info[4] >= $mvcore['pkstatus_cost']) { $zen_color = '#58FA58'; } else { $zen_color = '#FE2E2E'; }; // Req. Zen Color
if($get_creditss[0] >= $mvcore['pkstatus_cost']) { $cred_color = '#58FA58'; } else { $cred_color = '#FE2E2E'; }; // Req. credits Color
if($get_creditss[1] >= $mvcore['pkstatus_cost']) { $cred2_color = '#58FA58'; } else { $cred2_color = '#FE2E2E'; }; // Req. credits2 Color

//Extra options

if($mvcore['pkstatus_cost'] == '0') { $colsp = '4'; $zen_on_off = ''; } else {
	
		if($mvcore['pkstatus_cost_type'] == '0') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$zen_color.'">'.number_format($mvcore['pkstatus_cost'], 0, '', ',').' Zen</font></td>';
		}
		elseif($mvcore['pkstatus_cost_type'] == '1') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$cred_color.'">'.number_format($mvcore['pkstatus_cost'], 0, '', ',').' '.$mvcore['money_name1'].'</font></td>';
		}
		elseif($mvcore['pkstatus_cost_type'] == '2') {
		$colsp = '5';	$zen_on_off = '<td><font color="'.$cred2_color.'">'.number_format($mvcore['pkstatus_cost'], 0, '', ',').' '.$mvcore['money_name2'].'</font></td>';
		};
};

		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				<td><font color="'.$pk_color.'">'.$hstatus.'</font></td>
				'.$zen_on_off.'
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
		';
};
?>
</table>
<?
if($mvcore['pkstatus_cost'] >= '1') {
	
	if($mvcore['pkstatus_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	elseif($mvcore['pkstatus_cost_type'] == '2') { $cost_t_s = ''.$mvcore['money_name2'].''; }
	else{ $cost_t_s = 'Zen'; };
	
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.$cost_t_s.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['pkstatus_cost'].'</td>
				</tr>
			</table>
		</div>
	';
};
?>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>