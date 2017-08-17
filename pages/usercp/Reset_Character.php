
<?php if(!$mvcore['Reset_Character'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Reset_Character'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo''.ucp_back_to_gpanel.''; ?></a></td></tr></table></div>

<?php if($mvcore['web_shop_disc_vip'] > '0' && $mvcore['vip_sys_active'] == '1' && $mvcore['reset_reward_active'] == 'yes' && $mvcore['web_res_reward_vip'] > '0'){ echo'<br><center><div><b>'.ucp_rchar_redrewardd.' '.$mvcore['web_res_reward_vip'].' '.ucp_gr_for_vip_only.'</b></h2></center>'; }; ?>

<?php

//Other Configs
$mvcore['reset_lvl_reset'] = "yes"; //Reset Character level to 1 ? ( Yes / No )
//end

if($_GET['op3'] != ''){
	
	$character_name = $_GET['op3'];

$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where name = '".$character_name."'");
$drop_info = mssql_fetch_row($sys_start);

if($mvcore['reset_lvl_reset'] == 'yes'){ $new_level = '1'; } else { $new_level = $drop_info[1]; };

if($drop_info[3] >= '1') { $char_gr_val = $mvcore['greset_ress'] * $drop_info[3]; } else { $char_gr_val = 0; };
$char_gr_p_rr = $char_gr_val + $drop_info[2];

if($mvcore['reset_bonus_opt'] == 'pereach'){ $new_lvlupp = $mvcore['reset_bonus'] * $char_gr_p_rr + $mvcore['reset_bonus']; }
elseif($mvcore['reset_bonus_opt'] == 'staticval'){ $new_lvlupp = $mvcore['reset_bonus']; }
else { $new_lvlupp = '0'; };

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

//checking system
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
$acc_statusx[0] == 0 ? $useron=1 : $useron=0; //Username
if($acc_statusx[0] == 1) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_char_online.'</div>'; };


if($mvcore['web_rgm_level_vip'] > '0' && $mvcore['vip_sys_active'] == '1'){
	$LevelREQs = $mvcore['web_rgm_level_vip'];
} else {
	$LevelREQs = $mvcore['reset_level'];
}

//Level Increase System
if($mvcore['reset_lvl_inc'] == 'on'){
	if($drop_info[2] >= $mvcore['reset_lvl_inc1_min_ress'] && $drop_info[2] <= $mvcore['reset_lvl_inc1_max_ress']){ $LevelREQs = $mvcore['reset_lvl_inc1_reset_level']; } // Stage 1 ( Min Ress To Max Ress, if so then reset level is this )
	elseif($drop_info[2] >= $mvcore['reset_lvl_inc2_min_ress'] && $drop_info[2] <= $mvcore['reset_lvl_inc2_max_ress']){ $LevelREQs = $mvcore['reset_lvl_inc2_reset_level']; } // Stage 2 ( Min Ress To Max Ress, if so then reset level is this )
	elseif($drop_info[2] >= $mvcore['reset_lvl_inc3_min_ress'] && $drop_info[2] <= $mvcore['reset_lvl_inc3_max_ress']){ $LevelREQs = $mvcore['reset_lvl_inc3_reset_level']; } // Stage 3 ( Min Ress To Max Ress, if so then reset level is this )
	elseif($drop_info[2] >= $mvcore['reset_lvl_inc4_min_ress'] && $drop_info[2] <= $mvcore['reset_lvl_inc4_max_ress']){ $LevelREQs = $mvcore['reset_lvl_inc4_reset_level']; } // Stage 4 ( Min Ress To Max Ress, if so then reset level is this )
	else { $LevelREQs = '400'; }; // Simple Default
};
//End

strtoupper($drop_info[15]) == strtoupper($useracc) ? $usern=1 : $usern=0; //Username
$drop_info[0] == $character_name ? $name=1 : $name=0; //Name
$drop_info[1] >= $LevelREQs ? $level=1 : $level=0; //Level

if($drop_info[2] >= $mvcore['reset_limit']){ $rrlimit = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_rr_reslimits.'</div>'; } else { $rrlimit = '1'; } // Grand Reset Limit

if($mvcore['reset_item_check'] == 'yes') {
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
else { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_gr_items_on_character.'</div>'; $items_on_char = 0; };
} else { $items_on_char = 1; };

if($mvcore['web_res_reward_vip'] > '0' && $mvcore['vip_sys_active'] == '1'){
	$credits_inc = $mvcore['web_res_reward_vip'];
} else {
	$credits_inc = $mvcore['reset_reward'];
}

$zen_inc = $mvcore['reset_zen'];

//Increase Area
if($mvcore['reset_val_inc_opt'] == 'on' && $mvcore['reset_ask_money'] == 'yes' && $mvcore['reset_reward_active'] != 'yes') { 
	$credits_inc = $mvcore['reset_ask_value'] * $drop_info[2] + $mvcore['reset_ask_value'];  // Ask Cred
};

if($mvcore['reset_val_inc_opt'] == 'on' && $mvcore['reset_reward_active'] == 'yes') { 
	$credits_inc = $credits_inc * $drop_info[2] + $credits_inc; 
}; // Reward Cred

if($mvcore['reset_val_inc_opt'] == 'on') {
	$zen_inc = $mvcore['reset_zen'] * $drop_info[2] + $mvcore['reset_zen'];
}; // Zen

if($mvcore['reset_zen'] == '0') { $zen=1; } else { $drop_info[4] >= $zen_inc ? $zen=1 : $zen=0; }; //Zen

if($mvcore['reset_ask_money'] == 'yes' && $mvcore['reset_reward_active'] != 'yes') {
	$get_creditss[0] >= $credits_inc ? $costc=1 : $costc=0; //Credits
} else { $costc = 1; }

//End

	if($useron == '1' && $costc == '1' && $rrlimit == '1' && $level == '1' && $zen == '1' && $name == '1' && $usern == '1' && $items_on_char == '1') {
		
		if($mvcore['clean_lupw_reset_stats'] == 'yes'){ $rr_level_up_p = "LevelUpPoint = '',"; } else { $rr_level_up_p = ""; }; //Reset Level UP To
			
		if($mvcore['reset_stats'] == 'yes'){ $run_update = mssql_query("Update character set ".$rr_level_up_p." strength = '25', dexterity = '25', vitality = '25', energy = '25', Leadership = '25' where name = '".$character_name."'"); }; //Reset Stats
		
		$run_update = mssql_query("Update character set MapNumber = 0, LevelUpPoint = LevelUpPoint + '".$new_lvlupp."', ".$mvcore['rr_column_name']." = ".$mvcore['rr_column_name']." + '1', money = money - '".$zen_inc."', clevel = '".$new_level."' where name = '".$character_name."'"); //Update character
		
		//Ask Money For Reset.
		if($mvcore['reset_ask_money'] == 'yes' && $mvcore['reset_reward_active'] != 'yes') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$credits_inc."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		}
		
		//Reset Reward
		if($mvcore['reset_rew_cred'] == '1' && $mvcore['reset_reward_active'] == 'yes') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$credits_inc."' where ".$mvcore['user_column']." ='".$useracc."'"); 
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".$credits_inc."','0','From Character Reset','".time()."','0')");
		}
		elseif($mvcore['reset_rew_cred'] == '2' && $mvcore['reset_reward_active'] == 'yes') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$credits_inc."' where ".$mvcore['user_column']." ='".$useracc."'"); 
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','0','".$credits_inc."','From Character Reset','".time()."','0')");
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_gr_character_seccess_resetd.'</div>';
		
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

if($mvcore['reset_ask_money'] == 'yes' && $mvcore['reset_reward_active'] != 'yes'){ $req_cred = '<td>'.ucp_rchar_rescost.' '.$mvcore['money_name1'].'</td>'; } else { $req_cred = ''; }; // echo'<br><div style="float:left;">'.ucp_rchar_rescost.' '.$mvcore['reset_ask_value'].' '.$mvcore['money_name1'].'</div>'; }; 
if($mvcore['reset_zen'] >= '1') { $zen_on_off = '<td>'.ucp_cpk_req.' Zen</td>'; } else { $zen_on_off = ''; }; //Req. Zen
if($mvcore['reset_reward'] >= '1' && $mvcore['reset_reward_active'] == 'yes') { $reward_on_off = '<td>'.ucp_rchar_reward.'</td>'; } else { $reward_on_off = ''; }; //Reset Reward
if($mvcore['reset_bonus_opt'] == 'pereach'){ $new_lvlupps = '<td>'.ucp_rchar_bonuss.'</td>'; }
elseif($mvcore['reset_bonus_opt'] == 'staticval'){ $new_lvlupps = '<td>'.ucp_rchar_bonuss.'</td>'; }
else { $new_lvlupps = ''; };

echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.ucp_cpk_name.'</td>
			<td>'.ucp_resets.'</td>
			'.$reward_on_off.'
			'.$req_cred.'
			'.$zen_on_off.'
			'.$new_lvlupps.'
			<td>'.ucp_cpk_req.' '.ucp_level.'</td>
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_reset.'</td>
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

if($mvcore['web_rgm_level_vip'] > '0' && $mvcore['vip_sys_active'] == '1'){
	$LevelREQs = $mvcore['web_rgm_level_vip'];
} else {
	$LevelREQs = $mvcore['reset_level'];
}

//Level Increase System
if($mvcore['reset_lvl_inc'] == 'on'){
	if($drop_info[2] >= $mvcore['reset_lvl_inc1_min_ress'] && $drop_info[2] <= $mvcore['reset_lvl_inc1_max_ress']){ $LevelREQs = $mvcore['reset_lvl_inc1_reset_level']; } // Stage 1 ( Min Ress To Max Ress, if so then reset level is this )
	elseif($drop_info[2] >= $mvcore['reset_lvl_inc2_min_ress'] && $drop_info[2] <= $mvcore['reset_lvl_inc2_max_ress']){ $LevelREQs = $mvcore['reset_lvl_inc2_reset_level']; } // Stage 2 ( Min Ress To Max Ress, if so then reset level is this )
	elseif($drop_info[2] >= $mvcore['reset_lvl_inc3_min_ress'] && $drop_info[2] <= $mvcore['reset_lvl_inc3_max_ress']){ $LevelREQs = $mvcore['reset_lvl_inc3_reset_level']; } // Stage 3 ( Min Ress To Max Ress, if so then reset level is this )
	elseif($drop_info[2] >= $mvcore['reset_lvl_inc4_min_ress'] && $drop_info[2] <= $mvcore['reset_lvl_inc4_max_ress']){ $LevelREQs = $mvcore['reset_lvl_inc4_reset_level']; } // Stage 4 ( Min Ress To Max Ress, if so then reset level is this )
	else { $LevelREQs = '400'; }; // Simple Default
};
//End

//checking system
$drop_info[1] >= $LevelREQs ? $level=1 : $level=0; //Level
if($mvcore['reset_zen'] == '0') { $zen=1; } else { $drop_info[4] >= $mvcore['reset_zen'] ? $zen=1 : $zen=0; }; //Zen

if($level == '1' && $zen == '1') { $module_ok = '<a href="-id-user_cp-id-reset_character-id-'.$drop_info[0].'.html"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_reset.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };

//Coloring ifs
if($drop_info[1] >= $LevelREQs) { $level_color = '#58FA58'; } else { $level_color = '#FE2E2E'; }; // Req. Level Color

$zen_inc = $mvcore['reset_zen'];

//If Increase Echo Visual.!!!
if($mvcore['reset_val_inc_opt'] == 'on') {
	$zen_inc = $mvcore['reset_zen'] * $drop_info[2] + $mvcore['reset_zen'];
}; // Zen

if($drop_info[4] >= $zen_inc) { $zen_color = '#58FA58'; } else { $zen_color = '#FE2E2E'; }; // Req. Zen Color

//-----------------
$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);
if($mvcore['reset_val_inc_opt'] == 'on' && $mvcore['reset_ask_money'] == 'yes' && $mvcore['reset_reward_active'] != 'yes') { 
	$credits_inc = $mvcore['reset_ask_value'] * $drop_info[2] + $mvcore['reset_ask_value'];  // Ask Cred
} elseif($mvcore['reset_val_inc_opt'] != 'on' && $mvcore['reset_ask_money'] == 'yes' && $mvcore['reset_reward_active'] != 'yes') { 
	$credits_inc = $mvcore['reset_ask_value'];  // Ask Cred Without Increase
} else { $credits_inc = '0';  // Ask Cred default
};
if($get_creditss[0] >= $credits_inc) { $credw_color = '#58FA58'; } else { $credw_color = '#FE2E2E'; }; // Req. Credits Color
//-----------------

if($mvcore['web_res_reward_vip'] > '0' && $mvcore['vip_sys_active'] == '1' && $mvcore['reset_reward_active'] == 'yes'){
	$tickCostVip = $mvcore['web_res_reward_vip'];
} else {
	$tickCostVip = $mvcore['reset_reward'];
}


if($mvcore['reset_val_inc_opt'] == 'on' && $mvcore['reset_reward_active'] == 'yes') { 
	$tickCostVip = $tickCostVip * $drop_info[2] + $tickCostVip; 
}; // Reward Cred


if($drop_info[3] >= '1') { $char_gr_val = $mvcore['greset_ress'] * $drop_info[3]; } else { $char_gr_val = 0; };
$char_gr_p_rr = $char_gr_val + $drop_info[2];

//Extra options
if($mvcore['reset_reward'] >= '1' && $mvcore['reset_reward_active'] == 'yes' && $mvcore['reset_rew_cred'] == '1') { $reward2_on_off = '<td>'.$tickCostVip.' '.$mvcore['money_name1'].'</td>'; }
elseif($mvcore['reset_reward'] >= '1' && $mvcore['reset_reward_active'] == 'yes' && $mvcore['reset_rew_cred'] == '2') { $reward2_on_off = '<td>'.$tickCostVip.' '.$mvcore['money_name2'].'</td>'; } else { $reward2_on_off = ''; }; //Reset Reward

if($mvcore['reset_val_inc_opt'] == 'on' && $mvcore['reset_ask_money'] == 'yes' && $mvcore['reset_reward_active'] != 'yes') { $crew_on_off = '<td><font color="'.$credw_color.'">'.number_format($credits_inc, 0, '', ',').' '.$mvcore['money_name1'].' </font></td>'; }
elseif($mvcore['reset_val_inc_opt'] != 'on' && $mvcore['reset_ask_money'] == 'yes' && $mvcore['reset_reward_active'] != 'yes') { $crew_on_off = '<td><font color="'.$credw_color.'">'.number_format($credits_inc, 0, '', ',').' '.$mvcore['money_name1'].' </font></td>'; } else { $crew_on_off = ''; }; //Req. Cred

if($mvcore['reset_zen'] >= '1') { $zen_on_off = '<td><font color="'.$zen_color.'">'.number_format($zen_inc, 0, '', ',').' Zen </font></td>'; } else { $zen_on_off = ''; }; //Req. Zen

if($mvcore['reset_bonus_opt'] == 'pereach'){ $new_lvlupp = $mvcore['reset_bonus'] * $char_gr_p_rr + $mvcore['reset_bonus']; $new_lvluppss = '<td>'.$new_lvlupp.' LvlUpPoints</td>'; }
elseif($mvcore['reset_bonus_opt'] == 'staticval'){ $new_lvlupp = $mvcore['reset_bonus']; $new_lvluppss = '<td>'.$new_lvlupp.' LvlUpPoints</td>'; }
else { $new_lvluppss = ''; };

		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				<td>'.$drop_info[2].' RR</td>
				'.$reward2_on_off.'
				'.$crew_on_off.'
				'.$zen_on_off.'
				'.$new_lvluppss.'
				<td><font color="'.$level_color.'">'.$drop_info[1].' / '.$LevelREQs.'</font></td>
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
		';
};
?>
</table>
<?
if($mvcore['reset_level'] >= '1') {
	
	if($mvcore['reset_rew_cred'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	else { $cost_t_s = ''.$mvcore['money_name2'].''; };
	
	if($mvcore['reset_reward_active'] == "yes") { echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_rchar_reward.' '.ucp_petresets.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['reset_reward'].' '.$cost_t_s.'</td>
				</tr>
			</table>
		</div>
	';}
	
	if($mvcore['reset_ask_money'] == "yes" && $mvcore['reset_reward_active'] != "yes") { echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_askm.' '.$mvcore['money_name1'].'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['reset_ask_value'].'</td>
				</tr>
			</table>
		</div>
	';}
	
	if($mvcore['reset_val_inc_opt'] == "yes") { echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_invbrrc.'</b>:</td>
					<td style="float:right;padding-right:15px;">Yes</td>
				</tr>
			</table>
		</div>
	';}
	
	echo'
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_reset_stats.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['reset_stats'].'</td>
				</tr>
			</table>
		</div>
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.ucp_level.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['reset_level'].'</td>
				</tr>
			</table>
		</div>
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' Zen</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['reset_zen'].'</td>
				</tr>
			</table>
		</div>
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_itemchelkc.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['reset_item_check'].'</td>
				</tr>
			</table>
		</div>
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_resetlimt.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['reset_limit'].'</td>
				</tr>
			</table>
		</div>
	';
};
?>
<?php
if($mvcore['reset_lvl_inc'] == 'on'){
echo'
	<br>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;">'.ucp_resets.' <b>'.$mvcore['reset_lvl_inc1_min_ress'].' - '.$mvcore['reset_lvl_inc1_max_ress'].'</b></td>
				<td style="float:right;padding-right:15px;">'.ucp_level.': '.$mvcore['reset_lvl_inc1_reset_level'].'</td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;">'.ucp_resets.' <b>'.$mvcore['reset_lvl_inc2_min_ress'].' - '.$mvcore['reset_lvl_inc2_max_ress'].'</b></td>
				<td style="float:right;padding-right:15px;">'.ucp_level.': '.$mvcore['reset_lvl_inc2_reset_level'].'</td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;">'.ucp_resets.' <b>'.$mvcore['reset_lvl_inc3_min_ress'].' - '.$mvcore['reset_lvl_inc3_max_ress'].'</b></td>
				<td style="float:right;padding-right:15px;">'.ucp_level.': '.$mvcore['reset_lvl_inc3_reset_level'].'</td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;">'.ucp_resets.' <b>'.$mvcore['reset_lvl_inc4_min_ress'].' - '.$mvcore['reset_lvl_inc4_max_ress'].'</b></td>
				<td style="float:right;padding-right:15px;">'.ucp_level.': '.$mvcore['reset_lvl_inc4_reset_level'].'</td>
			</tr>
		</table>
	</div>
';
};
?>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>