
<?php if(!$mvcore['Vote'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Vote'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
	
	
<?php if($mvcore['vote_ipcheck'] == 'yes') { echo'<h3>'.main_p_vote_warningipaddres.'</h3>'; }; ?>
			
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td>#</td>
		<td><?php echo main_p_vote_name;?></td>
		<td><?php echo main_p_vote_reward;?></td>
		<td><?php echo main_p_vote_nextvote;?></td>
		<td><?php echo main_p_vote_vote;?></td>
	</tr>
<?PHP
//------------------------------------------------------------
//Experimental php script.......
if($mvcore['vote_bonus_io'] == 'on') {
	
	if($mvcore['vote_tpday'] == '1'){ $set_plus_time = '86400'; } elseif($mvcore['vote_tpday'] == '3'){ $set_plus_time = '28800'; } elseif($mvcore['vote_tpday'] == '5'){ $set_plus_time = '17280'; };

		$date_calc = $mvcore['vote_new_date_drop'];
		
		if( time() >= $date_calc){
			
			//Start event process
			$time_nes = $date_calc + $mvcore['vote_rew_long'];
			$newForTest = ''.$time_nes.'000';
			$date_convertsss = decode_time(time(),$time_nes,'short','...');
			echo '<div>'.main_p_vote_votingbonus.' <font id="dropoutTime" color="red">'.main_p_vote_timeleft.' '.$date_convertsss.'</font></div>';
				$run_rest = '1';
			//end event process
				
			if( time() >= $time_nes ){
				
					$update_this = time() + $set_plus_time;
			
				$new_db = fopen("system/engine_configs".$db_name_multi."/vote_bonus_cnf.php", "w"); //configs patch 
				$data = "<?php\n";
				$data .="\$mvcore['vote_new_date_drop'] = \"".$update_this."\";\n";
				$data .="?>";
				fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$db_name_multi."/vote_bonus_cnf.php", 0777);
				header("Refresh:0");
			};
		};
		
		$date_convertsssdsv = decode_time(time(),$date_calc,'short','...');
		if($run_rest != '1') { echo '<div align="left"><font>'.main_p_vote_votingbonusstart.' </font><font color="red" style="text-transform: uppercase;">'.$date_convertsssdsv.'</font></div>'; } else {}
};
//------------------------------------------------------------

			
if (isset($_POST['vote_unid'])){
	
	$unq_id = $_POST['vote_unid'];
	
	if($unq_id == '') { } else {
			
			//Check for edited UnID.
			$vote_data = mssql_query("SELECT name,url,img_url,reward,un_id,date_int from MVCore_Vote where un_id = '".$unq_id."'");
			$vote_check = mssql_fetch_row($vote_data);
			if($unq_id != $vote_check[4]) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vote_cannotvoteuniqe.'</div>'; };
			
			$vote_logs = mssql_query("SELECT vote_date,un_id,vote_ip,username,votes from MVCore_Vote_Log where un_id = '".$unq_id."' and username='".$_SESSION['username']."'");
			$vote_logs_check = mssql_fetch_row($vote_logs);

			$get_ip = getUserIP();
			
			//Check Ip If Multi Acc Vote
			$vote_logsad = mssql_query("SELECT vote_date,username from MVCore_Vote_Log where un_id = '".$unq_id."' and vote_ip='".$get_ip."' and vote_date >= '".time()."'");
			$vote_logs_checkfd = mssql_fetch_row($vote_logsad);
			
			if(time() <= $vote_logs_checkfd[0]) { 
				$has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vote_waitsomeonevotef.' '.$get_ip.' '.main_p_vote_onlinkthiswaittime.'</div>'; 
			};
			//End
			
			$check_if_exist = mssql_query("Select top 1 vote_date from MVCore_Vote_Log where un_id ='".$unq_id."' and username='".$_SESSION['username']."'"); $check_if_existss = mssql_fetch_row($check_if_exist);
			if($check_if_existss[0] == ''){ } else { if($mvcore['vote_ipcheck'] == 'yes' && $get_ip != $vote_logs_check[2]){ $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vote_votingblocked.'</div>'; }; };
			
			if(time() <= $vote_logs_check[0]) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vote_waitfortimepass.'</div>'; };
			
			$vote_charrr = mssql_query("SELECT top 1 ".$mvcore['rr_column_name']." from character where AccountID = '".$_SESSION['username']."' order by ".$mvcore['rr_column_name']." desc");
			$vote_charrr_drop = mssql_fetch_row($vote_charrr);

			$CharCount = mssql_query("SELECT count(*) FROM character WHERE AccountID = '".$_SESSION['username']."'");$dCcount =mssql_result($CharCount, 0, 0);
			if($mvcore['vote_nchar'] == 'yes') {
				if($vote_charrr_drop[0] < $mvcore['vote_chneed_resets']) {
					$has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_vote_charneedress.' '.$mvcore['vote_chneed_resets'].' '.main_p_vote_chncharrr.'</div>'; 
				}
				if($dCcount <= '0') {
					$has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_vote_createcharacter.'</div>'; 
				};
			};

				//calculations
					$calcVotesNum = $vote_logs_check[4] + 1;
					$calc_date = time() + $vote_check[5]; //New Vote Time
					if($mvcore['vote_bonus_io'] == 'on' && $run_rest == '1') { $vote_val = $vote_check[3] + $mvcore['vote_rew_bonus']; } else { $vote_val = $vote_check[3]; };//Reward Credits with bonus system
			if($has_error >= '1'){} else {
		
				if($check_if_existss[0] == ''){
						$do_insert = mssql_query("insert into MVCore_Vote_Log (un_id,vote_date,username,vote_ip,votes) VALUES ('".$unq_id."','".$calc_date."','".$_SESSION['username']."','".$get_ip."','".$calcVotesNum."')");
						
	//SPECIAL reward update script		
	if($mvcore['reward_sys_vote'] == '1') { $run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$vote_val."' where ".$mvcore['user_column']." ='".$_SESSION['username']."'"); 
		echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_vote_votesuccess.' '.$mvcore['money_name1'].' '.main_p_vote_added.'</div>';
		$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$_SESSION['username']."','".$vote_val."','0','From Voting','".time()."','0')");
	}
	elseif($mvcore['reward_sys_vote'] == '2') { $run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$vote_val."' where ".$mvcore['user_column']." ='".$_SESSION['username']."'"); 
		echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_vote_votesuccess.' '.$mvcore['money_name2'].' '.main_p_vote_added.'</div>';
		$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$_SESSION['username']."','0','".$vote_val."','From Voting','".time()."','0')");
	};
	//END Special

				} else {
						$run = mssql_query("update MVCore_Vote_Log set votes = '".$calcVotesNum."', vote_ip = '".$get_ip."', vote_date = '".$calc_date."' where un_id ='".$unq_id."' and username='".$_SESSION['username']."'");
						
	//SPECIAL reward update script		
	if($mvcore['reward_sys_vote'] == '1') { $run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$vote_val."' where ".$mvcore['user_column']." ='".$_SESSION['username']."'"); 
		echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_vote_votesuccess.' '.$mvcore['money_name1'].' '.main_p_vote_added.'</div>';
		$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$_SESSION['username']."','".$vote_val."','0','From Voting','".time()."','0')");
	}
	elseif($mvcore['reward_sys_vote'] == '2') { $run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$vote_val."' where ".$mvcore['user_column']." ='".$_SESSION['username']."'"); 
		echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_vote_votesuccess.' '.$mvcore['money_name2'].' '.main_p_vote_added.'</div>';
		$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$_SESSION['username']."','0','".$vote_val."','From Voting','".time()."','0')");
	};
	//END Special

				};
				
			$vote_checkaa = mssql_query("SELECT top 1 un_id from MVCore_Vote order by un_id desc");
			$vote_checka = mssql_fetch_row($vote_checkaa);
			if($vote_checka[0] != $unq_id) {} else {
				//Fake Account Saving System
				//--------------------------------------------------
				$sasdsaa = mssql_query("select IP,memb___id from MVCore_MultiAcc_Voters where IP = '".$get_ip."'");
				$dfinfwefwefo = mssql_fetch_row($sasdsaa); 
				$accounts_found = explode(',' , $dfinfwefwefo[1]);
				
					if($dfinfwefwefo[0] == '') {
						$do_insert = mssql_query("insert into MVCore_MultiAcc_Voters (memb___id,IP,votes) VALUES ('".$_SESSION['username']."','".$get_ip."','1')");
					} else {
						$ivf = 0;
						$usernameData = $dfinfwefwefo[1];
						for($i=0;$i < count($accounts_found) ;++$i) {
							
							if($accounts_found[$i] == $_SESSION['username']) {
								$ivf += 1;
							} else { $ivf += 0; };

						};
						$total_acc_count = $ivf;
						if($total_acc_count >= 1) { $accNameData = $dfinfwefwefo[1]; } else { $accNameData = ''.$usernameData.','.$_SESSION['username'].''; };

						$run = mssql_query("update MVCore_MultiAcc_Voters set memb___id = '".$accNameData."', votes = votes + '1' where IP = '".$get_ip."'");		
					};
				//--------------------------------------------------	
			};			

			};
	};
};

if($_GET[op2] == 'error'){ echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vote_waitfortimepass.'</div>'; };

$vote_data = mssql_query("SELECT top ".$mvcore['top_select']." name,url,img_url,reward,un_id,date_int from MVCore_Vote order by reward desc");
for($i=0;$i < mssql_num_rows($vote_data);++$i) {
$vote = mssql_fetch_row($vote_data);

$vote_date = mssql_query("Select vote_date,vote_ip from MVCore_Vote_Log where username='".$_SESSION['username']."' and un_id = '".$vote[4]."'");
$vote_show_date = mssql_fetch_row($vote_date);

$convert_dates = ''.$vote_show_date[0].'000';
$date_convert = decode_time(time(),$vote_show_date[0],'short','...');

$get_ip = getUserIP();

$get_char_info_name= mssql_query("Select top 1 name from Character where AccountID='".$_SESSION['username']."'");
$vote_acc_check= mssql_fetch_row($get_char_info_name);

$vote_charrr = mssql_query("SELECT top 1 ".$mvcore['rr_column_name']." from character where AccountID = '".$_SESSION['username']."' order by ".$mvcore['rr_column_name']." desc");
$vote_charrr_drop = mssql_fetch_row($vote_charrr);
			
$check_if_exist = mssql_query("Select top 1 vote_date from MVCore_Vote_Log where un_id ='".$vote[4]."' and username='".$_SESSION['username']."'"); $check_if_existss = mssql_fetch_row($check_if_exist);
if($check_if_existss[0] == ''){
	
	if($mvcore['vote_nchar'] == 'yes') {
		if($vote_acc_check[0] == '') { 
			$onclick = "onclick='document.getElementById(\"submit-vote$vote[4]\").submit();'"; 
		} else {
			if($vote_charrr_drop[0] < $mvcore['vote_chneed_resets']) {
				$onclick = "onclick='document.getElementById(\"submit-vote$vote[4]\").submit();'";
			} else {
				$onclick = "onclick='document.getElementById(\"submit-vote$vote[4]\").submit();' target='_blank' href='$vote[1]'"; 
			};
		} 
	} else {
			$onclick = "onclick='document.getElementById(\"submit-vote$vote[4]\").submit();' target='_blank' href='$vote[1]'"; 
	};
	
}
else {
	if( time() <= $vote_show_date[0] || $mvcore['vote_ipcheck'] == 'yes' && $get_ip == $vote_show_date[1] ){ 
		$onclick = "title='".main_p_vote_cannotusevote."' href='-id-Vote-id-error.html'"; 
	}
	else {

		if($mvcore['vote_nchar'] == 'yes') {
			if($vote_acc_check[0] == '') { 
				$onclick = "onclick='document.getElementById(\"submit-vote$vote[4]\").submit();'"; 
			} else { 
				if($vote_charrr_drop[0] < $mvcore['vote_chneed_resets']) {
					$onclick = "onclick='document.getElementById(\"submit-vote$vote[4]\").submit();'";
				} else {
					$onclick = "onclick='document.getElementById(\"submit-vote$vote[4]\").submit();' target='_blank' href='$vote[1]'"; 
				};
			} 
		} else {
				$onclick = "onclick='document.getElementById(\"submit-vote$vote[4]\").submit();' target='_blank' href='$vote[1]'"; 
		};
	};
};

	
	if($mvcore['reward_sys_vote'] == '1') { if($mvcore['vote_bonus_io'] == 'on' && $run_rest == '1') { $vote_rew = ''.$vote[3].' '.$mvcore[money_name1].' + '.main_p_vote_bonus.' '.$mvcore['vote_rew_bonus'].' '.$mvcore[money_name1].''; } else { $vote_rew = ''.$vote[3].' '.$mvcore[money_name1].''; }; }
	elseif($mvcore['reward_sys_vote'] == '2') { if($mvcore['vote_bonus_io'] == 'on' && $run_rest == '1') { $vote_rew = ''.$vote[3].' '.$mvcore[money_name2].' + '.main_p_vote_bonus.' '.$mvcore['vote_rew_bonus'].' '.$mvcore[money_name2].''; } else { $vote_rew = ''.$vote[3].' '.$mvcore[money_name2].''; }; };

$rank = $i+1;

echo "
<form method='POST' action='' id='submit-vote$vote[4]'>
<input name='vote_unid' type='hidden' id='unidval' value='$vote[4]'>
<input name='nothing' type='hidden' id='dateTimeEtc$vote[4]' value='$convert_dates'>
	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td style='padding: 6px 3px 6px 3px;'>$rank</td>
		<td style='padding:0;'>$vote[0]</td>
		<td style='padding:0;'>$vote_rew</td>
		<td id='timeFixHehe$vote[4]' style='padding:0;text-transform: uppercase;'>".main_p_vote_timeleft." $date_convert</td>
		<td style='padding:0;'><a $onclick ><img src='$vote[2]'></a></td>
	</tr>
</form>
";
}
?>
</table>

<?php if($mvcore['vote_top_of'] == 'on') {  $date_convertsssas = decode_time(time(),$mvcore['vote_top_voters'],'short','...'); ?>

<br>
<div align="left"><?php if($mvcore['vote_top_int'] == '604800') {$showtxt = ''.main_p_vote_rewardonceaweek.'';}else{$showtxt = ''.main_p_vote_rewardonceamonth.'';}; echo'<font>'.main_p_vote_rewardgivenince.''.$showtxt.' </font><font id="topvotersReward" color="red" style="text-transform: uppercase;" >'.main_p_vote_nextreward.' '.$date_convertsssas.'</font>'; ?></div>

<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td>#</td>
		<td><?php echo main_p_vote_name;?></td>
		<td><?php echo main_p_vote_hasvotes;?></td>
		<td><?php echo main_p_vote_lasdtvoted;?></td>
		<td><?php echo main_p_vote_posiblerew;?></td>
	</tr>
<?PHP

$guild_querys = mssql_query("SELECT TOP 10 username, SUM(votes) FROM MVCore_Vote_Log GROUP BY username ORDER BY SUM(votes) DESC");
for($i=0;$i < mssql_num_rows($guild_querys);++$i) {
$row = mssql_fetch_row($guild_querys);

$vote_displayN = mssql_query("Select Name,CtlCode from Character where AccountID='".$row[0]."'"); $vote_displayName = mssql_fetch_row($vote_displayN);
if($vote_displayName[0] == ''){ $name_show = ''.main_p_vote_emptyacc.'';} else { $name_show = $vote_displayName[0]; };

$vote_date = mssql_query("Select vote_date from MVCore_Vote_Log where username='".$row[0]."' order by vote_date desc");
$vote_dat = mssql_fetch_row($vote_date);

$rank = $i+1;

$voteTime = $vote_dat[0] - 43200;

$today = date ("F j, Y, g:i a", $voteTime);

$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;

	//SPECIAL reward update script		
	if($mvcore['reward_sys_vote'] == '1') { if($rank >= '1' && $rank <= $mvcore['vote_top_top']){$rew_cred = ''.$mvcore['vote_top_reward'].' '.$mvcore['money_name1'].''; } else {$rew_cred = '-'; }; }
	elseif($mvcore['reward_sys_vote'] == '2') { if($rank >= '1' && $rank <= $mvcore['vote_top_top']){$rew_cred = ''.$mvcore['vote_top_reward'].' '.$mvcore['money_name2'].''; } else {$rew_cred = '-'; }; };
	//END Special

echo "
	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td style='padding: 6px 3px 6px 3px;'>$rank</td>
		<td style='padding:0;'>$name_show</td>
		<td style='padding:0;'><b>$row[1]</b></td>
		<td style='padding:0;'>$today</td>
		<td style='padding:0;'>$rew_cred</td>
	</tr>
";
};
?>
</table>
<?php } ?>

	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>