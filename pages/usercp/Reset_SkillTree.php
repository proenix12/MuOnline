
<?php if(!$mvcore['Reset_SkillTree'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Reset_SkillTree'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo''.ucp_back_to_gpanel.''; ?></a></td></tr></table></div>
<?php

if($_GET['op3'] != ''){
	
	$character_name = $_GET['op3'];

$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where name = '".$character_name."'");
$drop_info = mssql_fetch_row($sys_start);

$sys_startd = mssql_query("select memb_guid from ".$mvcore_medb_i." where memb___id = '".$useracc."'");
$drop_infod = mssql_fetch_row($sys_startd);

if($mvcore['skilltree_userntable'] == 'name' || $mvcore['skilltree_userntable'] == 'CHAR_NAME'){ $fix_namec_uadse = $character_name; }
elseif($mvcore['skilltree_userntable'] == 'memb_guid'){ $fix_namec_uadse = $drop_infod[0]; }
 else { $fix_namec_uadse = $useracc; };

if($mvcore['skilltree_skill_userntable'] == 'name'){ $fix_namec_uadsed = $character_name; }
elseif($mvcore['skilltree_skill_userntable'] == 'memb_guid'){ $fix_namec_uadsed = $drop_infod[0]; } 
else { $fix_namec_uadsed = $useracc; };

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

//checking system
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
$acc_statusx[0] == 0 ? $useron=1 : $useron=0; //Username
if($acc_statusx[0] == 1) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_char_online.'</div>'; };

strtoupper($drop_info[15]) == strtoupper($useracc) ? $usern=1 : $usern=0; //Username
$drop_info[0] == $character_name ? $name=1 : $name=0; //Name

		if($mvcore['skilltreer_type'] == '1') {
			if($drop_info[4] >= $mvcore['skilltreer_cost']) { $zens=1; } else { $zens=0; }; // Req. Zen
				if( $zens == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more_zen.'</div>'; };
		}
		elseif($mvcore['skilltreer_type'] == '2') {
			if($get_creditss[0] >= $mvcore['skilltreer_cost']) { $zens=1; } else { $zens=0; }; // Req. Tokens
				if( $zens == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name1'].'!</div>'; };
		} 
		elseif($mvcore['skilltreer_type'] == '3') {
			if($get_creditss[1] >= $mvcore['skilltreer_cost']) { $zens=1; } else { $zens=0; }; // Req. Gold Credits
				if( $zens == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name2'].'!</div>'; };
		};
		

	if($useron == '1' && $zens == '1' && $name == '1' && $usern == '1') {
	
			$run = mssql_query("update ".$mvcore['skilltree_table']." set ".$mvcore['skilltree_col_level']." = '1', ".$mvcore['skilltree_col_points']." = '0' where ".$mvcore['skilltree_userntable']." = '".$fix_namec_uadse."'");
			$run = mssql_query("update ".$mvcore['skilltree_skill_table']." set ".$mvcore['skilltree_skill_column']." = NULL where ".$mvcore['skilltree_skill_userntable']." = '".$fix_namec_uadsed."'");
			
			if($mvcore['skilltree_skill_table'] == 'MasterSkillTree' || $mvcore['skilltree_skill_table'] == 'masterskilltree') { $run = mssql_query("update character set MagicList = NULL where name = '".$fix_namec_uadsed."'"); };

		//Reset Reward
		if($mvcore['skilltreer_type'] == '1') {
			$run = mssql_query("update character set money = money - '".$mvcore['skilltreer_cost']."' where name ='".$character_name."'");
		}
		elseif($mvcore['skilltreer_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$mvcore['skilltreer_cost']."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		} 
		elseif($mvcore['skilltreer_type'] == '3') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$mvcore['skilltreer_cost']."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_rst_success_reseted.'</div>';
		
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

		if($mvcore['skilltreer_type'] == '1') {
			$cost_on_off = '<td>'.ucp_cpk_req.' Zen</td>';
		}
		elseif($mvcore['skilltreer_type'] == '2') {
			$cost_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name1'].'</td>'; 
		} 
		elseif($mvcore['skilltreer_type'] == '3') {
			$cost_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name2'].'</td>';
			
		} else { $cost_on_off = ''; };
		
echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.ucp_cpk_name.'</td>
			'.$cost_on_off.'
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_skilltree.'</td>
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
		if($mvcore['skilltreer_type'] == '1') {
			if($drop_info[4] >= $mvcore['skilltreer_cost']) { $zen=1; } else { $zen=0; }; // Req. Zen
		}
		elseif($mvcore['skilltreer_type'] == '2') {
			if($get_creditss[0] >= $mvcore['skilltreer_cost']) { $zen=1; } else { $zen=0; }; // Req. Tokens
		} 
		elseif($mvcore['skilltreer_type'] == '3') {
			if($get_creditss[1] >= $mvcore['skilltreer_cost']) { $zen=1; } else { $zen=0; }; // Req. Gold Credits
			
		};

if($zen == '1') { $module_ok = '<a href="-id-user_cp-id-reset_skilltree-id-'.$drop_info[0].'.html"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_skilltree.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };

//Coloring ifs
		if($mvcore['skilltreer_type'] == '1') {
			if($drop_info[4] >= $mvcore['skilltreer_cost']) { $cost_color = '#58FA58'; } else { $cost_color = '#FE2E2E'; }; // Req. Zen Color
		}
		elseif($mvcore['skilltreer_type'] == '2') {
			if($get_creditss[0] >= $mvcore['skilltreer_cost']) { $cost_color = '#58FA58'; } else { $cost_color = '#FE2E2E'; }; // Req. Zen Color
		} 
		elseif($mvcore['skilltreer_type'] == '3') {
			if($get_creditss[1] >= $mvcore['skilltreer_cost']) { $cost_color = '#58FA58'; } else { $cost_color = '#FE2E2E'; }; // Req. Zen Color
			
		};
	

//Extra options

		if($mvcore['skilltreer_type'] == '1') {
			$costs_on_off = '<td><font color="'.$cost_color.'">'.$mvcore['skilltreer_cost'].' Zen</font></td>';
		}
		elseif($mvcore['skilltreer_type'] == '2') {
			$costs_on_off = '<td><font color="'.$cost_color.'">'.$mvcore['skilltreer_cost'].' '.$mvcore['money_name1'].'</font></td>';
		} 
		elseif($mvcore['skilltreer_type'] == '3') {
			$costs_on_off = '<td><font color="'.$cost_color.'">'.$mvcore['skilltreer_cost'].' '.$mvcore['money_name2'].'</font></td>';
		} else { $costs_on_off = ''; };

		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				'.$costs_on_off.'
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
		';
};
?>
</table>
<?
if($mvcore['skilltreer_cost'] >= '1') {
	
	if($mvcore['skilltreer_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	else { $cost_t_s = ''.$mvcore['money_name2'].''; };
	
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.$cost_t_s.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['skilltreer_cost'].'</td>
				</tr>
			</table>
		</div>
	';
};
?>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>