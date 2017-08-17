
<?php if(!$mvcore['Lost_Password'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Lost_Password'] == 'on') { ?>
<?PHP

$enter_user = '0';

if (isset($_POST['lostpwd_form1'])){
	
	$acc_username 	= $_POST['acc_username'];
	
	$acc_username = stripSTCheck($acc_username);
	
	if($acc_username == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_enterusernameofacc.'</div>'; } else {
			
				if($mvcore['md5_support'] == 'yes') {
					$check_user_exist = mssql_query('SELECT CONVERT(NVARCHAR(32),memb__pwd,2) from '.$mvcore_medb_i.' where memb___id = "'.$acc_username.'"'); 
					$check_user_existss = mssql_fetch_row($check_user_exist);
					if($check_user_existss[0] != ''){ } else { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_account.' '.$acc_username.' '.main_p_lost_pass_wasnotfound.'</div>'; };
				} else {
					$check_user_exist = mssql_query("Select memb__pwd from ".$mvcore_medb_i." where memb___id ='".$acc_username."'"); 
					$check_user_existss = mssql_fetch_row($check_user_exist);
					if($check_user_existss[0] != ''){ } else { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_account.' '.$acc_username.' '.main_p_lost_pass_wasnotfound.'</div>'; };
				};

				if(strlen($acc_username) >= '11') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_usernametolarge.'</div>'; };
				
			if($has_error >= '1'){} else {
				$take_qa = mssql_query("Select memb__pwd, SecretQuestion, SecretAnswer from ".$mvcore_medb_i." where memb___id ='".$acc_username."'");
				$take_qas = mssql_fetch_row($take_qa);
				
				switch ($take_qas[1]) { 
				case 1: $ques_text="".main_p_lost_pass_mothermaidname.""; break;
				case 2: $ques_text="".main_p_lost_pass_firstshool.""; break;
				case 3: $ques_text="".main_p_lost_pass_fewsuperhero.""; break;
				case 4: $ques_text="".main_p_lost_pass_nfirstpet.""; break;
				case 5: $ques_text="".main_p_lost_pass_aschildfewplace.""; break;
				case 6: $ques_text="".main_p_lost_pass_cartooncharacter.""; break;
				case 7: $ques_text="".main_p_lost_pass_firstvideogamelayed.""; break;
				case 8: $ques_text="".main_p_lost_pass_nameoffteacher.""; break;
				case 9: $ques_text="".main_p_lost_pass_tvshowaschild.""; break;
				case 10: $ques_text="".main_p_lost_pass_citymotherborn.""; break;
				};
				
					$enter_user = '1';
					$rep_acc_username = $acc_username;
					
			};
	};
};

if (isset($_POST['lostpwd_form2'])){
	
	$acc_username 	= $_POST['user_name_rep'];
	$q_ans 	= $_POST['q_ans'];
	
	if($acc_username == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_enterusernameofacc.'</div>'; } else {
			
				if($mvcore['md5_support'] == 'yes') {
					$check_user_exist = mssql_query('SELECT CONVERT(NVARCHAR(32),memb__pwd,2) from '.$mvcore_medb_i.' where memb___id = "'.$acc_username.'"'); 
					$check_user_existss = mssql_fetch_row($check_user_exist);
					if($check_user_existss[0] != ''){ } else { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_account.' '.$acc_username.' '.main_p_lost_pass_wasnotfound.'</div>'; };
				} else {
					$check_user_exist = mssql_query("Select memb__pwd from ".$mvcore_medb_i." where memb___id ='".$acc_username."'"); 
					$check_user_existss = mssql_fetch_row($check_user_exist);
					if($check_user_existss[0] != ''){ } else { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_account.' '.$acc_username.' '.main_p_lost_pass_wasnotfound.'</div>'; };
				};

					$check_ques_exist = mssql_query("Select SecretAnswer from ".$mvcore_medb_i." where memb___id ='".$acc_username."'"); 
					$check_ques_existss = mssql_fetch_row($check_ques_exist);
					if($check_ques_existss[0] == $q_ans){ } else { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_questionancwer.'</div>'; };
					
					if($q_ans == "null") { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_sornotvalidanswer.'</div>'; };
							
				if(strlen($acc_username) >= '11') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lost_pass_usernametolarge.'</div>'; };
				
			if($has_error >= '1'){} else {
				
				$newPassword = rand(143454,943932);
				
				if($mvcore['md5_support'] == 'yes') {
					$do_reg_insert = mssql_query("update ".$mvcore_medb_i." set memb__pwd = 0x".md5($newPassword)." where memb___id = '".$acc_username."'");
					$PassRecover = $newPassword;
				} else {
					$do_reg_insert = mssql_query("update ".$mvcore_medb_i." set memb__pwd = ".$newPassword." where memb___id = '".$acc_username."'");
					$PassRecover = $newPassword;
				}

					$enter_user = 'drop_info';
					$rep_acc_usernameas = $acc_username;
					
			};
	};
};

if($enter_user == 'drop_info'){
echo'
<form method="POST" action="">
<input type="hidden" name="ss">
	<table align="center" width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td>&nbsp;&nbsp; '.main_p_lost_pass_accusername.': '.$rep_acc_usernameas.'</td>
			<td><b>'.main_p_lost_pass_password.': <font color="red">'.$PassRecover.'</font></b></td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="padding-top:10px;"><button class="mvcore-button-style" type="submit">'.main_p_lost_pass_blacktostart.'</button></td>
		</tr>
	</table>
</form>
'; 
} elseif($enter_user == '1') {
echo'
<form method="POST" action="">
<input type="hidden" name="lostpwd_form2">
<input type="hidden" name="user_name_rep" value="'.$rep_acc_username.'">

	<table align="center" width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td>&nbsp;&nbsp; '.main_p_lost_pass_secreatquaest.'</td>
			<td>Q: '.$ques_text.'</td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp; '.main_p_lost_pass_questansw.'</td>
			<td><input class="mvcore-input-main" type="text" name="q_ans" maxlength="10"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="padding-top:10px;"><button class="mvcore-button-style" type="submit">'.main_p_lost_pass_nexstep.'</button></td>
		</tr>
	</table>
</form>
';	
} elseif($enter_user == '0') {
echo'
<form method="POST" action="">
<input type="hidden" name="lostpwd_form1" >

	<table align="center" width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td>&nbsp;&nbsp; '.main_p_lost_pass_enteraccuser.'</td>
			<td><input class="mvcore-input-main" type="text" name="acc_username" maxlength="10"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="padding-top:10px;"><button class="mvcore-button-style" type="submit">'.main_p_lost_pass_nexstep.'</button></td>
		</tr>
	</table>
</form>
';
};

?>
<?php } ?>