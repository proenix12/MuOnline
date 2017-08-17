
<?php if(!$mvcore['Rename_Character'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Rename_Character'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo''.ucp_back_to_gpanel.''; ?></a></td></tr></table></div>
<?php

if($_GET['op3'] != ''){
	
	$character_name = $_GET['op3'];
	
	$new_name = $_POST['new_name'];
	
	$new_name = stripSTCheck($new_name);
	
if( $new_name == '' ) { $new_name = $character_name; };

$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where name = '".$character_name."'");
$drop_info = mssql_fetch_row($sys_start);

$get_credits = mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$drop_info[15]."'"); 
$get_creditss = mssql_fetch_row($get_credits);

$mwr_acps=1;
$mwr_engine_s_fnc=1;

//fix new name
$new_names = preg_replace('/[^a-zA-Z0-9]/', '', $new_name);

//check if exists
$sys_start_exist = mssql_query("select name from character where name = '".$new_names."'");
$drop_info_exist = mssql_fetch_row($sys_start_exist);
$sys_guild_exist = mssql_query("select name from guildmember where name = '".$new_names."'");
$drop_infoguild_exist = mssql_fetch_row($sys_guild_exist);

if($drop_info_exist[0] == $new_names || $character_name == $new_names ) { $do_exist = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_rc_name_exists.'</div>'; } else { $do_exist = '1'; };
if($drop_infoguild_exist[0] == $character_name ) { $gdo_exist = '0'; echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_rc_can_not_change.'</div>'; } else { $gdo_exist = '1'; };

//checking system
$acc_status = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'"); $acc_statusx = mssql_fetch_row($acc_status);
$acc_statusx[0] == 0 ? $useron=1 : $useron=0; //Username
if($acc_statusx[0] == 1) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_char_online.'</div>'; };

strtoupper($drop_info[15]) == strtoupper($useracc) ? $usern=1 : $usern=0; //Username
$drop_info[15] == $useracc ? $usern=1 : $usern=0; //Username
$drop_info[0] == $character_name ? $name=1 : $name=0; //Name

if(strlen($new_name) >= '10' || strlen($new_name) <= '4' || $new_name == 'GM' || $new_name == 'Admin' || $new_name == 'admin' || $new_name == 'administrator' || $new_name == 'Administrator'){ $not_allowed = '0'; } else { $not_allowed = '1'; };

if($mvcore['renchar_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['renchar_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['renchar_cost'] ? $cost=1 : $cost=0; //Zen
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more_zen.'</div>'; };
		}
		elseif($mvcore['renchar_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['renchar_cost'] ? $cost=1 : $cost=0; //Credits
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name1'].'!</div>'; };
		}
		elseif($mvcore['renchar_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['renchar_cost'] ? $cost=1 : $cost=0; //Credits2 
				if( $cost == '0' ) { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_need_more.' '.$mvcore['money_name2'].'!</div>'; };
		};
};

	if($useron == '1' && $cost == '1' && $name == '1' && $usern == '1' && $not_allowed == '1' && $do_exist == '1' && $gdo_exist == '1') {
		
		$run_update = mssql_query("Update character set name = '".$new_names."' where name = '".$character_name."'"); //Change Name 1
		$run_update = mssql_query("Update AccountCharacter set GameID1 = '".$new_names."' where GameID1 = '".$character_name."'"); //Change Name 2
		$run_update = mssql_query("Update AccountCharacter set GameID2 = '".$new_names."' where GameID2 = '".$character_name."'"); //Change Name 3
		$run_update = mssql_query("Update AccountCharacter set GameID3 = '".$new_names."' where GameID3 = '".$character_name."'"); //Change Name 4
		$run_update = mssql_query("Update AccountCharacter set GameID4 = '".$new_names."' where GameID4 = '".$character_name."'"); //Change Name 5
		$run_update = mssql_query("Update AccountCharacter set GameID5 = '".$new_names."' where GameID5 = '".$character_name."'"); //Change Name 6
		$run_update = mssql_query("Update AccountCharacter set GameIDC = '".$new_names."' where GameIDC = '".$character_name."'"); //Change Name 7
		$run_update = mssql_query("Update -id-banned_ppl set name = '".$new_names."' where name = '".$character_name."'"); //Change Name 8
		$run_update = mssql_query("Update SCFS5Quest set name = '".$new_names."' where name = '".$character_name."'"); //Change Name 9
		$run_update = mssql_query("Update T_CGuid set name = '".$new_names."' where name = '".$character_name."'"); //Change Name 10
		$run_update = mssql_query("Update T_FriendList set FriendName = '".$new_names."' where FriendName = '".$character_name."'"); //Change Name 11
		$run_update = mssql_query("Update T_FriendMail set FriendName = '".$new_names."' where FriendName = '".$character_name."'"); //Change Name 12
		$run_update = mssql_query("Update T_FriendMain set name = '".$new_names."' where name = '".$character_name."'"); //Change Name 13
		$run_update = mssql_query("Update character set name = '".$new_names."' where name = '".$character_name."'"); //Change Name 14
		$run_update = mssql_query("Update character set name = '".$new_names."' where name = '".$character_name."'"); //Change Name 15
		$run_update = mssql_query("Update character set name = '".$new_names."' where name = '".$character_name."'"); //Change Name 16
		$run_update = mssql_query("Update T_SkillTree_Info set CHAR_NAME = '".$new_names."' where CHAR_NAME = '".$character_name."'"); //Change Name 17
		$run_update = mssql_query("Update T_MacroInfo set Name = '".$new_names."' where Name = '".$character_name."'"); //Change Name 18
		$run_update = mssql_query("Update T_LuckyCoinRegCount set Name = '".$new_names."' where Name = '".$character_name."'"); //Change Name 19
		$run_update = mssql_query("Update T_3rd_Quest_Info set CHAR_NAME = '".$new_names."' where CHAR_NAME = '".$character_name."'"); //Change Name 20
		$run_update = mssql_query("Update OptionData set Name = '".$new_names."' where Name = '".$character_name."'"); //Change Name 21
		$run_update = mssql_query("Update market_sold_items set Name = '".$new_names."' where Name = '".$character_name."'"); //Change Name 22
		$run_update = mssql_query("Update market_sold_items set soldto = '".$new_names."' where soldto = '".$character_name."'"); //Change Name 23
		$run_update = mssql_query("Update MVCore_Market_Items set soldby = '".$new_names."' where soldby = '".$character_name."'"); //Change Name 24
		
		//Extra For S8 zTeam DB 21.03.2016
		$run_update = mssql_query("Update T_QUEST_MONSTERKILL set CHAR_NAME = '".$new_names."' where CHAR_NAME = '".$character_name."'"); //Change Name 24
		$run_update = mssql_query("Update T_QuestEx_Info set memb_char = '".$new_names."' where memb_char = '".$character_name."'"); //Change Name 
		$run_update = mssql_query("Update Ertel_Inventory set UserName = '".$new_names."' where UserName = '".$character_name."'"); //Change Name 
		$run_update = mssql_query("Update T_PeriodItem_Data set memb__char = '".$new_names."' where memb__char = '".$character_name."'"); //Change Name 
		$run_update = mssql_query("Update T_MasterLevelSystem set CHAR_NAME = '".$new_names."' where CHAR_NAME = '".$character_name."'"); //Change Name 

		//Take Cost
		if($mvcore['renchar_cost_type'] == '0') {
			$run = mssql_query("update character set money = money - '".$mvcore['renchar_cost']."' where name ='".$character_name."'"); 
		}
		elseif($mvcore['renchar_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$mvcore['renchar_cost']."' where ".$mvcore['user_column']." ='".$useracc."'");			
		}
		elseif($mvcore['renchar_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$mvcore['renchar_cost']."' where ".$mvcore['user_column']." ='".$useracc."'");
		};
		//end
		
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.ucp_rc_change_success.' '.$new_name.'</div>';
		
	} else { echo'<div class="mvcore-nNote mvcore-nFailure">'.ucp_some_req_not_respected.'</div>'; } ;
}; $mwr_engine=1;
?>
<?php
	$useracc = $_SESSION['username']; // Get Loged In Username
	$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where AccountID = '".$useracc."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
	$drop_infosd = mssql_fetch_row($sys_start);
	if($drop_infosd[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.ucp_char_list_empty.'</div>'; } else {
?>
<?php


if($mvcore['renchar_cost'] == '0') { $zen_on_off = ''; } else {
	
		if($mvcore['renchar_cost_type'] == '0') {
			$zen_on_off = '<td>'.ucp_cpk_req.' Zen</td>';
		}
		elseif($mvcore['renchar_cost_type'] == '1') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name1'].'</td>';
		}
		elseif($mvcore['renchar_cost_type'] == '2') {
			$zen_on_off = '<td>'.ucp_cpk_req.' '.$mvcore['money_name2'].'</td>';
		} else { $zen_on_off = ''; };
};

echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.ucp_cpk_name.'</td>
			'.$zen_on_off.'
			<td>'.ucp_cpk_req.' '.ucp_cpk_offline.'</td>
			<td>'.ucp_change_name.'</td>
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

if($mvcore['renchar_cost'] == '0') { $cost=1; } else {
	
		if($mvcore['renchar_cost_type'] == '0') {
			$drop_info[4] >= $mvcore['renchar_cost'] ? $cost=1 : $cost=0; //Zen
		}
		elseif($mvcore['renchar_cost_type'] == '1') {
			$get_creditss[0] >= $mvcore['renchar_cost'] ? $cost=1 : $cost=0; //Credits
		}
		elseif($mvcore['renchar_cost_type'] == '2') {
			$get_creditss[1] >= $mvcore['renchar_cost'] ? $cost=1 : $cost=0; //Credits2 
		};
};

if($cost == '1') { $module_ok = '<a onclick="showAddStats(\''.$drop_info[0].'\'); return false;" href="#"><img src="system/engine_images/gear.png" width="11px"> <b>'.ucp_change_name.'</b></a>'; } 
	else { $module_ok = "<font color='red'>N/A</font>"; };

//Coloring ifs
if($drop_info[4] >= $mvcore['renchar_cost']) { $zen_color = '#58FA58'; } else { $zen_color = '#FE2E2E'; }; // Req. Zen Color
if($get_creditss[0] >= $mvcore['renchar_cost']) { $cred_color = '#58FA58'; } else { $cred_color = '#FE2E2E'; }; // Req. credits Color
if($get_creditss[1] >= $mvcore['renchar_cost']) { $cred2_color = '#58FA58'; } else { $cred2_color = '#FE2E2E'; }; // Req. credits2 Color

//Extra options
if($mvcore['renchar_cost'] == '0') { $colsasdp = '2'; $colsp = '3'; $zen_on_off = ''; } else { $colsasdp = '3';
	
		if($mvcore['renchar_cost_type'] == '0') {
		$colsp = '4';	$zen_on_off = '<td><font color="'.$zen_color.'">'.number_format($mvcore['renchar_cost'], 0, '', ',').' Zen</font></td>';
		}
		elseif($mvcore['renchar_cost_type'] == '1') {
		$colsp = '4';	$zen_on_off = '<td><font color="'.$cred_color.'">'.number_format($mvcore['renchar_cost'], 0, '', ',').' '.$mvcore['money_name1'].'</font></td>';
		}
		elseif($mvcore['renchar_cost_type'] == '2') {
		$colsp = '4';	$zen_on_off = '<td><font color="'.$cred2_color.'">'.number_format($mvcore['renchar_cost'], 0, '', ',').' '.$mvcore['money_name2'].'</font></td>';
		};
};

		echo'
			<tr style="border-collapse: collapse; border-spacing: 0px;">
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				'.$zen_on_off.'
				<td>'.$is_on_off.'</td>
				<td>'.$module_ok.'</td>
			</tr>
						<form method="POST" action="-id-user_cp-id-rename_character-id-'.$drop_info[0].'.html" name="addstats">
							<tr id="hiddenrenamchar1'.$drop_info[0].'" style="display:none;">
								<td colspan="1" align="center">&nbsp;&nbsp; Enter new character name!</td>
								<td colspan="'.$colsasdp.'" align="center"><input class="mvcore-input-main" type="text" name="new_name" maxlength="10"/></td>
							</tr>
							<tr id="hiddenrenamchar2'.$drop_info[0].'" style="display:none;">
								<td colspan="'.$colsp.'" ><div align="right"><button name="addstats" class="mvcore-button-style" type="submit">Submit</button></div></td>
							</tr>
						</form>
		';
};
?>
</table>
<?
if($mvcore['renchar_cost'] >= '1') {
	
	if($mvcore['renchar_cost_type'] == '1') { $cost_t_s = ''.$mvcore['money_name1'].''; }
	else { $cost_t_s = ''.$mvcore['money_name2'].''; };
	
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.ucp_cpk_req.' '.$cost_t_s.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['renchar_cost'].'</td>
				</tr>
			</table>
		</div>
	';
};
?>
<script>
function showAddStats(elmnts) {
	$("#hiddenrenamchar1" + elmnts).toggle();
	$("#hiddenrenamchar2" + elmnts).toggle();
};
</script>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>