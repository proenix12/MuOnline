<?php if(!$mvcore['Register'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Register'] == 'on' && $_SESSION['user_login'] != 'ok') { ?>
<?php
if($mvcore['smtp_mode'] == 'on') {
	if ($_GET['op2'] == 'ok'){
		$username = $_GET['op3'];
		$user_pass = $_GET['op4']; // MD5
			
		if($mvcore['md5_support'] == 'yes') {
			if($mvcore['md5_hash_o'] == 'pw') { $pass_hash = hash('md5', $user_pass); } 
			elseif($mvcore['md5_hash_o'] == 'pw_ur') { $pass_hash = hash('md5', $user_pass.$username); } 
			elseif($mvcore['md5_hash_o'] == 'ur_pw') { $pass_hash = hash('md5', $username.$user_pass); }
			elseif($mvcore['md5_hash_o'] == 'pw_sal') { $pass_hash = hash('md5', $user_pass.$mvcore['md5_hs_salt']); }
			elseif($mvcore['md5_hash_o'] == 'pw_ur_sal') { $pass_hash = hash('md5', $user_pass.$username.$mvcore['md5_hs_salt']); } 
			elseif($mvcore['md5_hash_o'] == 'ur_pw_sal') { $pass_hash = hash('md5', $username.$user_pass.$mvcore['md5_hs_salt']); }
			elseif($mvcore['md5_hash_o'] == 'dbo_fn_md5') { $pass_hash = "dbo.fn_md5('".$user_pass."','".$user_name."')"; }
			else { $pass_hash = hash('md5', $user_pass); } 
		};
				
		if($mdformat == 'dbo_fn_md5') {
			$quardys = mssql_query("SELECT memb__pwd, memb___id, mvc_vip_date, smtp_block from ".$nmedb_data." where memb___id = '".$username."' and memb__pwd = ".$pass_hash."");
			$quary_dropsa = mssql_fetch_row($quardys);
			
			if($quary_dropsa[0] != '' && $quary_dropsa[1] != '') {
				$RewardFriend = mssql_query("update ".$mvcore_medb_i." set smtp_block = '0' where memb___id ='".$quary_dropsa[1]."'");
				$send_login = checklogin($quary_dropsa[1],$quary_dropsa[0],$mvcore['md5_support'],$mvcore_medb_i,$mvcore['go_to_page'],$_GET['op1'],$mvcore['md5_hash_o'],$mvcore['md5_hs_salt']);
				$send_admin = checkAdmin($quary_dropsa[1],$mvcore_medb_i);
				$send_gm = checkGM($quary_dropsa[1],$mvcore_medb_i);
			};
		} else {
			$quardys = mssql_query("SELECT memb__pwd, memb___id, mvc_vip_date, smtp_block from ".$nmedb_data." where memb___id = '".$username."'");
			$quary_dropsa = mssql_fetch_row($quardys);
					
			if($mvcore['md5_support'] == 'yes') {
				$sqll= mssql_query("declare @mdpasscheck varbinary(16); set @mdpasscheck = (select memb__pwd from ".$nmedb_data." where memb___id='".$username."'); print @mdpasscheck;"); $mdPass = mssql_get_last_message(); $mdPass = substr($mdPass,2);
								
				if(strtoupper($pass_hash) == strtoupper($mdPass)) {
					$RewardFriend = mssql_query("update ".$mvcore_medb_i." set smtp_block = '0' where memb___id ='".$quary_dropsa[1]."'");
					$send_login = checklogin($quary_dropsa[1],$quary_dropsa[0],$mvcore['md5_support'],$mvcore_medb_i,$mvcore['go_to_page'],$_GET['op1'],$mvcore['md5_hash_o'],$mvcore['md5_hs_salt']);
					$send_admin = checkAdmin($quary_dropsa[1],$mvcore_medb_i);
					$send_gm = checkGM($quary_dropsa[1],$mvcore_medb_i);
				};
			} else {
				if(strtoupper($quary_dropsa[0]) == strtoupper($user_pass) && $quary_dropsa[1] != '') {
					$RewardFriend = mssql_query("update ".$mvcore_medb_i." set smtp_block = '0' where memb___id ='".$quary_dropsa[1]."'");
					$send_login = checklogin($quary_dropsa[1],$quary_dropsa[0],$mvcore['md5_support'],$mvcore_medb_i,$mvcore['go_to_page'],$_GET['op1'],$mvcore['md5_hash_o'],$mvcore['md5_hs_salt']);
					$send_admin = checkAdmin($quary_dropsa[1],$mvcore_medb_i);
					$send_gm = checkGM($quary_dropsa[1],$mvcore_medb_i);
				};
			};
		};
	};
};

if (isset($_POST['rs_reg_form'])){

	require_once('system/engine_plugins/recaptchalib.php');
	
	if($mvcore['reC_onoff'] == 'on') {
	$privatekey = $mvcore['reC_secretkey'];
	$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
	} else { $respdata = '1'; }
	if ($respdata == '1' || $resp->is_valid) {
		$user_name = $_POST['rs_username'];
		$e_mail = $_POST['rs_email'];
		$user_pass = $_POST['rs_password'];
		$rep_pass = $_POST['rs_repassword'];
		$s_ques = $_POST['ss_question'];
		$s_answ = $_POST['ss_answer'];
		$s_rules = $_POST['server_rules'];
		$ss_country = $_POST['ss_country'];
		
		if($user_name == '') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_eusername.'</div>'; } else {
			
				$check_user_exist = mssql_query("Select top 1 memb___id from ".$mvcore_medb_i." where UPPER(memb___id) ='".strtoupper($user_name)."'"); $check_user_existss = mssql_fetch_row($check_user_exist); if($check_user_existss[0] == ''){ } else { $has_error = '3'; };
				//$check_user_exist = mssql_query("Select top 1 memb___id from ".$mvcore_medb_i." where memb___id ='".$user_name."'"); $check_user_existss = mssql_fetch_row($check_user_exist); if($check_user_existss[0] == ''){ } else { $has_error = '3'; };
				$check_email_exist = mssql_query("Select top 1 mail_addr from ".$mvcore_medb_i." where mail_addr ='".$e_mail."'"); $check_email_existss = mssql_fetch_row($check_email_exist); if($check_email_existss[0] == ''){ } else { $has_error = '4'; }; if($pvsRegister != 'ok8125') { exit; };

				if(strtoupper($user_name) == strtoupper($check_user_existss[0]) ){ $has_error = '3'; };
				
					if($mvcore['reg_rules'] == 'on') {
						if($s_rules) {} else { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_rules.'</div>'; };
					}
				if(strlen($user_name) >= '11') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_maxuser.'</div>'; };
				if(strlen($user_pass) >= '11') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_maxpass.'</div>'; };
				
				if(strlen($user_name) <= '3') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_minuser.'</div>'; };
				if(strlen($user_pass) <= '3') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_minpass.'</div>'; };
				
				if(strlen($s_answ) >= '21') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_answmx.'</div>'; };
				
				if($e_mail == '') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_emaile.'</div>'; };
				if($user_pass == '') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_passmiss.'</div>'; };
				if($s_ques == '') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_secretquest.'</div>'; };
				if($s_answ == '') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_enteranw.'</div>'; };
					if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_emailvalid.'</div>'; };
				if($user_pass != $rep_pass) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_regpassmatch.'</div>'; };
				
				if($has_error == '3') { echo '<div class="mvcore-nNote mvcore-nFailure">'.register_alreadyexist.'</div>'; };
				if($has_error == '4') { echo '<div class="mvcore-nNote mvcore-nFailure">'.register_emailinuse.'</div>'; };
				
			if($mvcore['acc_reg_limit'] >= '1') {
				$check_existIp = mssql_query("Select count(*) from MVCore_Register_Count where UserIp ='".getUserIP()."'"); 
				$existsIpCount = mssql_result($check_existIp, 0, 0); if($pvsRegister != 'ok8125') { exit; };
				
				if($existsIpCount >= $mvcore['acc_reg_limit'] && $mvcore['acc_reg_limit'] != 'off') { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_regiplimit.' '.$mvcore['acc_reg_limit'].' '.register_regiplimitp2.'</div>'; };
				
			} else {}; 
						
			if($has_error >= '1'){} else { 
				
				
					if($_GET['op1'] == 'Register' && $_GET['op2'] != '' && $_GET['op3'] == '' && $mvcore['Friend_System'] == 'on') {
							$Username = $_GET['op2'];
							$GetVisitorIP = getUserIP();
							
						if($GetVisitorIP != ''){
							//Checking if exists
							
								$check_exist = mssql_query("Select memb___id,acc_ip from ".$mvcore_medb_i." where memb___id ='".$Username."'"); 
								$exists = mssql_fetch_row($check_exist); if($exists[0] != ''){ } else { $has_error = '1'; };
								
								$check_IP = mssql_query("Select acc_ip from ".$mvcore_medb_i." where acc_ip ='".$GetVisitorIP."'"); 
								$existsIP = mssql_fetch_row($check_IP); if($existsIP[0] == $GetVisitorIP){ $has_error = '2'; };
							
							if($has_error == '1') { echo '<div class="mvcore-nNote mvcore-nFailure">'.register_fs_somethingwrong.'</div>'; };
							if($has_error == '2') { echo '<div class="mvcore-nNote mvcore-nFailure">'.register_fs_ipfound.'</div>'; };
							
							$v_f_hfwews= mssql_query("SELECT friend_uid from MVCore_Friend_List where friend_uid = '".$user_name."'");
							$ewewrewa= mssql_fetch_row($v_f_hfwews);
							
							if($ewewrewa[0] == $user_name) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_friend_sys_alredfrendsomeone.'</div>'; };
							
							$sql103asd = mssql_query("SELECT count(*) FROM MVCore_Friend_List where to_who_uid = '".$user_name."'"); $acasfr4 =mssql_result($sql103asd, 0, 0);
							if($pvsRegister != 'ok8125') { exit; };
							if($acasfr4 >= $mvcore['friend_sys_limit']) { $has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.main_p_friend_sys_friendlimmaxinv.'</div>'; }; //Invite limit
							
							if($has_error >= '1'){} else {

								$do_insert = mssql_query("insert into MVCore_Friend_List (friend_uid,to_who_uid,date) VALUES ('".$user_name."','".$Username."','".time()."')");
							
							};
						} else {
							$has_error = '1'; echo '<div class="mvcore-nNote mvcore-nFailure">'.register_fs_wrongip.'</div>';
						};
					};
					
				if($mvcore['md5_support'] == 'yes') {
					if($mvcore['md5_hash_o'] == 'pw') { $pass_hash = hash('md5', $user_pass); } 
					elseif($mvcore['md5_hash_o'] == 'pw_ur') { $pass_hash = hash('md5', $user_pass.$user_name); } 
					elseif($mvcore['md5_hash_o'] == 'ur_pw') { $pass_hash = hash('md5', $user_name.$user_pass); } 
					elseif($mvcore['md5_hash_o'] == 'pw_sal') { $pass_hash = hash('md5', $user_pass.$mvcore['md5_hs_salt']); }
					elseif($mvcore['md5_hash_o'] == 'pw_ur_sal') { $pass_hash = hash('md5', $user_pass.$user_name.$mvcore['md5_hs_salt']); } 
					elseif($mvcore['md5_hash_o'] == 'ur_pw_sal') { $pass_hash = hash('md5', $user_name.$user_pass.$mvcore['md5_hs_salt']); }
					elseif($mvcore['md5_hash_o'] == 'dbo_fn_md5') { $pass_hash = "dbo.fn_md5('".$user_pass."','".$user_name."')"; }
					else { $pass_hash = hash('md5', $user_pass); } 
				};
					
				if($mvcore['smtp_mode'] == 'on') {
					$ilbc = '1';
					sendEmail($e_mail,''.register_accactivat.'', ''.register_greethi.' '.$user_name.' <br>'.register_thanksoreg.' '.$mvcore['surl'].' <br>'.register_youacclickb.' <br><a href="'.$mvcore['surl'].'/-id-Register-id-ok-id-'.$user_name.'-id-'.$user_pass.'.html"><b>'.$mvcore['surl'].'/-id-Register-id-ok-id-'.$user_name.'-id-'.$user_pass.'.html</b></a>',$mvcore['smtp_host'],$mvcore['smtp_username'],$mvcore['smtp_password'],$mvcore['smtp_encrypt'],$mvcore['smtp_port'],$mvcore['smtp_sender_mail'],$mvcore['smtp_sender_title']);
				} else {
					$ilbc = '0';
				};
					
				if($mvcore['md5_support'] == 'yes') {
					$do_reg_insert = mssql_query("insert into ".$mvcore_medb_i." (memb___id,memb__pwd,memb_name,sno__numb,mail_addr,appl_days,modi_days,out__days,true_days,bloc_code,ctl1_code,admincp,SecretQuestion,SecretAnswer,acc_ip,mvc_flag,smtp_block) VALUES ('".$user_name."', 0x".$pass_hash." ,'MVCore','1111111111111','".$e_mail."','".date('Y-m-d H:i:s',time())."','".date('Y-m-d H:i:s',time())."','2015-01-01','2015-01-01','0','0','0','".$s_ques."','".$s_answ."','".getUserIP()."','".$ss_country."','".$ilbc."')");
				} else {
					$do_reg_insert = mssql_query("insert into ".$mvcore_medb_i." (memb___id,memb__pwd,memb_name,sno__numb,mail_addr,appl_days,modi_days,out__days,true_days,bloc_code,ctl1_code,admincp,SecretQuestion,SecretAnswer,acc_ip,mvc_flag,smtp_block) VALUES ('".$user_name."','".$user_pass."','MVCore','1111111111111','".$e_mail."','".date('Y-m-d H:i:s',time())."','".date('Y-m-d H:i:s',time())."','2015-01-01','2015-01-01','0','0','0','".$s_ques."','".$s_answ."','".getUserIP()."','".$ss_country."','".$ilbc."')");
				}

						$do_ip_insert = mssql_query("insert into MVCore_Register_Count (UserIp) VALUES ('".getUserIP()."')"); // Allowed Ip System ( Saves IP At Any Reason )
						
						if(mssql_query("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." = '".$user_name."'")  != false ){} else {
							$do_insert = mssql_query("insert into ".$mvcore['credits_table']." (".$mvcore['user_column'].",".$mvcore['credits_column'].",".$mvcore['credits2_column'].") VALUES ('".$user_name."','0','0')"); // Create If Doesnt exist
						};
						
					$do_reg_insert = mssql_query("insert into AccountCharacter (id,GameID1,GameID2,GameID3,GameID4,GameID5) VALUES ('".$user_name."','','','','','')");
					$do_reg_insert = mssql_query("insert into ".$mvcore_medb_s." (memb___id,ConnectStat,ServerName,IP,ConnectTM,DisConnectTM,OnlineHours) VALUES ('".$user_name."','0','GS','0','','','0')");
				
			if($mvcore['smtp_mode'] == 'on') { echo'<div class="mvcore-nNote mvcore-nSuccess">'.register_checkmailaccact.'</div>'; } else {
				if($_GET['op1'] == 'Register' && $_GET['op2'] != '' && $_GET['op3'] == '' && $mvcore['Friend_System'] == 'on') {
					if($has_error >= '1') {} else {
						$send_login = checklogin($user_name,$user_pass,$mvcore['md5_support'],$mvcore_medb_i,$mvcore['go_to_page'],$_GET['op1'],$mvcore['md5_hash_o']);
						$send_admin = checkAdmin($user_name,$mvcore_medb_i);
						$send_gm = checkGM($user_name,$mvcore_medb_i);
						if($pvsRegister != 'ok8125') { exit; };
					}
				} else {
					$send_login = checklogin($user_name,$user_pass,$mvcore['md5_support'],$mvcore_medb_i,$mvcore['go_to_page'],$_GET['op1'],$mvcore['md5_hash_o'],$mvcore['md5_hs_salt']);
					$send_admin = checkAdmin($user_name,$mvcore_medb_i);
					$send_gm = checkGM($user_name,$mvcore_medb_i);
				}
			};
	
			};
		};
	} else {
		$has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.register_recaptchaerror.'</div>';
	};
};

if($_GET['op1'] == 'Register' && $_GET['op2'] != '' && $_GET['op3'] == '' && $mvcore['Friend_System'] == 'on') {
	echo'<h2>'.register_helpfriendnow.'</h2>';
};
?>

<form action="" method="POST" name="rs_reg_form">
<table align="center" width="100%" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td><?php echo register_usern;?></td>
		<td><input type="text" name="rs_username" class="mvcore-input-main" value=""></td>
	</tr>
	
	<tr align="center">
		<td><?php echo register_passn;?></td>
		<td><input type="password" name="rs_password" class="mvcore-input-main" value=""></td>
	</tr>
	
	<tr align="center">
		<td><?php echo register_reppassn;?></td>
		<td><input type="password" name="rs_repassword" class="mvcore-input-main" value=""></td>
	</tr>
	
	<tr align="center">
		<td><?php echo register_eailn;?></td>
		<td><input type="text" name="rs_email" class="mvcore-input-main" value=""></td>
	</tr>
	
	<tr align="center">
		<td><?php echo register_secretquestt;?></td>
		<td>
						<select name="ss_question" style=" width:370px; " class="mvcore-select-main">
							<option value="0">-- <?php echo register_chooseopt;?></option>
							<option value="1"><?php echo register_mothermaidname;?></option>
							<option value="2"><?php echo register_firstshool;?></option>
							<option value="3"><?php echo register_fewsuperhero;?></option>
							<option value="4"><?php echo register_nfirstpet;?></option>
							<option value="5"><?php echo register_aschildfewplace;?></option>
							<option value="6"><?php echo register_cartooncharacter;?></option>
							<option value="7"><?php echo register_firstvideogamelayed;?></option>
							<option value="8"><?php echo register_nameoffteacher;?></option>
							<option value="9"><?php echo register_tvshowaschild;?></option>
							<option value="10"><?php echo register_citymotherborn;?></option>
						</select>
		</td>
	</tr>
	
	<tr align="center">
		<td><?php echo register_secreatansw;?></td>
		<td><input type="text" name="ss_answer" class="mvcore-input-main" value=""></td>
	</tr>
	
	<tr align="center">
		<td>Select Your Country</td>
		<td>
						<select name="ss_country" style=" width:370px; " class="mvcore-select-main">
							<option value="">-- <?php echo register_chosecountr;?></option>
								<option value="af">Afghanistan</option>
								<option value="al">Albania</option>
								<option value="dz">Algeria</option>
								<option value="as">American Samoa</option>
								<option value="ad">Andorra</option>
								<option value="ao">Angola</option>
								<option value="ai">Anguilla</option>
								<option value="ag">Antigua and Barbuda</option>
								<option value="ar">Argentina</option>
								<option value="am">Armenia</option>
								<option value="aw">Aruba</option>
								<option value="au">Australia</option>
								<option value="at">Austria</option>
								<option value="az">Azerbaijan</option>
								<option value="bs">Bahamas</option>
								<option value="bh">Bahrain</option>
								<option value="bd">Bangladesh</option>
								<option value="bb">Barbados</option>
								<option value="by">Belarus</option>
								<option value="be">Belgium</option>
								<option value="bz">Belize</option>
								<option value="bj">Benin</option>
								<option value="bm">Bermuda</option>
								<option value="bt">Bhutan</option>
								<option value="bo">Bolivia, Plurinational State of</option>
								<option value="ba">Bosnia and Herzegovina</option>
								<option value="bw">Botswana</option>
								<option value="bv">Bouvet Island</option>
								<option value="br">Brazil</option>
								<option value="io">British Indian Ocean Territory</option>
								<option value="bn">Brunei Darussalam</option>
								<option value="bg">Bulgaria</option>
								<option value="bf">Burkina Faso</option>
								<option value="bi">Burundi</option>
								<option value="kh">Cambodia</option>
								<option value="cm">Cameroon</option>
								<option value="ca">Canada</option>
								<option value="ic">Canary Islands</option>
								<option value="cv">Cape Verde</option>
								<option value="catalonia">Catalonia</option>
								<option value="ky">Cayman Islands</option>
								<option value="cf">Central African Republic</option>
								<option value="td">Chad</option>
								<option value="cl">Chile</option>
								<option value="cn">China</option>
								<option value="co">Colombia</option>
								<option value="km">Comoros</option>
								<option value="cd">Congo, The Democratic Republic of the</option>
								<option value="cg">Congo</option>
								<option value="ck">Cook Islands</option>
								<option value="cr">Costa Rica</option>
								<option value="ci">Cote d'Ivoire</option>
								<option value="hr">Croatia</option>
								<option value="cu">Cuba</option>
								<option value="cw">Curacao</option>
								<option value="cy">Cyprus</option>
								<option value="cz">Czech Republic</option>
								<option value="dk">Denmark</option>
								<option value="dj">Djibouti</option>
								<option value="dm">Dominica</option>
								<option value="do">Dominican Republic</option>
								<option value="ec">Ecuador</option>
								<option value="eg">Egypt</option>
								<option value="sv">El Salvador</option>
								<option value="england">England</option>
								<option value="gq">Equatorial Guinea</option>
								<option value="er">Eritrea</option>
								<option value="ee">Estonia</option>
								<option value="et">Ethiopia</option>
								<option value="eu">European Union</option>
								<option value="fk">Falkland Islands (Malvinas)</option>
								<option value="fo">Faroe Islands</option>
								<option value="fj">Fiji</option>
								<option value="fi">Finland</option>
								<option value="fr">France</option>
								<option value="gf">French Guiana</option>
								<option value="pf">French Polynesia</option>
								<option value="tf">French Southern Territories</option>
								<option value="ga">Gabon</option>
								<option value="gm">Gambia</option>
								<option value="ge">Georgia</option>
								<option value="de">Germany</option>
								<option value="gh">Ghana</option>
								<option value="gi">Gibraltar</option>
								<option value="gr">Greece</option>
								<option value="gl">Greenland</option>
								<option value="gd">Grenada</option>
								<option value="gp">Guadeloupe</option>
								<option value="gu">Guam</option>
								<option value="gt">Guatemala</option>
								<option value="gg">Guernsey</option>
								<option value="gn">Guinea</option>
								<option value="gw">Guinea-Bissau</option>
								<option value="gy">Guyana</option>
								<option value="ht">Haiti</option>
								<option value="hm">Heard Island and McDonald Islands</option>
								<option value="va">Holy See (Vatican City State)</option>
								<option value="hn">Honduras</option>
								<option value="hk">Hong Kong</option>
								<option value="hu">Hungary</option>
								<option value="is">Iceland</option>
								<option value="in">India</option>
								<option value="id">Indonesia</option>
								<option value="ir">Iran, Islamic Republic of</option>
								<option value="iq">Iraq</option>
								<option value="ie">Ireland</option>
								<option value="im">Isle of Man</option>
								<option value="il">Israel</option>
								<option value="it">Italy</option>
								<option value="jm">Jamaica</option>
								<option value="jp">Japan</option>
								<option value="je">Jersey</option>
								<option value="jo">Jordan</option>
								<option value="kz">Kazakhstan</option>
								<option value="ke">Kenya</option>
								<option value="ki">Kiribati</option>
								<option value="kp">Korea, Democratic People's Republic</option>
								<option value="kr">Korea, Republic</option>
								<option value="xk">Kosovo</option>
								<option value="kurdistan">Kurdistan</option>
								<option value="kw">Kuwait</option>
								<option value="kg">Kyrgyzstan</option>
								<option value="la">Lao People's Democratic Republic</option>
								<option value="lv">Latvia</option>
								<option value="lb">Lebanon</option>
								<option value="ls">Lesotho</option>
								<option value="lr">Liberia</option>
								<option value="ly">Libya</option>
								<option value="li">Liechtenstein</option>
								<option value="lt">Lithuania</option>
								<option value="lu">Luxembourg</option>
								<option value="mo">Macao</option>
								<option value="mk">Macedonia, The Former Yugoslav Republic</option>
								<option value="mg">Madagascar</option>
								<option value="mw">Malawi</option>
								<option value="my">Malaysia</option>
								<option value="mv">Maldives</option>
								<option value="ml">Mali</option>
								<option value="mt">Malta</option>
								<option value="mh">Marshall Islands</option>
								<option value="mq">Martinique</option>
								<option value="mr">Mauritania</option>
								<option value="mu">Mauritius</option>
								<option value="yt">Mayotte</option>
								<option value="mx">Mexico</option>
								<option value="fm">Micronesia, Federated States of</option>
								<option value="md">Moldova, Republic</option>
								<option value="mc">Monaco</option>
								<option value="mn">Mongolia</option>
								<option value="me">Montenegro</option>
								<option value="ms">Montserrat</option>
								<option value="ma">Morocco</option>
								<option value="mz">Mozambique</option>
								<option value="mm">Myanmar</option>
								<option value="na">Namibia</option>
								<option value="nr">Nauru</option>
								<option value="np">Nepal</option>
								<option value="an">Netherlands Antilles</option>
								<option value="nl">Netherlands</option>
								<option value="nc">New Caledonia</option>
								<option value="nz">New Zealand</option>
								<option value="ni">Nicaragua</option>
								<option value="ne">Niger</option>
								<option value="ng">Nigeria</option>
								<option value="nu">Niue</option>
								<option value="nf">Norfolk Island</option>
								<option value="mp">Northern Mariana Islands</option>
								<option value="no">Norway</option>
								<option value="om">Oman</option>
								<option value="pk">Pakistan</option>
								<option value="pw">Palau</option>
								<option value="ps">Palestinian Territory, Occupied</option>
								<option value="pa">Panama</option>
								<option value="pg">Papua New Guinea</option>
								<option value="py">Paraguay</option>
								<option value="pe">Peru</option>
								<option value="ph">Philippines</option>
								<option value="pn">Pitcairn</option>
								<option value="pl">Poland</option>
								<option value="pt">Portugal</option>
								<option value="pr">Puerto Rico</option>
								<option value="qa">Qatar</option>
								<option value="re">Reunion</option>
								<option value="ro">Romania</option>
								<option value="ru">Russian Federation</option>
								<option value="rw">Rwanda</option>
								<option value="sh">Saint Helena</option>
								<option value="kn">Saint Kitts and Nevis</option>
								<option value="lc">Saint Lucia</option>
								<option value="pm">Saint Pierre and Miquelon</option>
								<option value="vc">Saint Vincent and the Grenadines</option>
								<option value="ws">Samoa</option>
								<option value="sm">San Marino</option>
								<option value="st">Sao Tome and Principe</option>
								<option value="sa">Saudi Arabia</option>
								<option value="scotland">Scotland</option>
								<option value="sn">Senegal</option>
								<option value="rs">Serbia</option>
								<option value="sc">Seychelles</option>
								<option value="sl">Sierra Leone</option>
								<option value="sg">Singapore</option>
								<option value="sx">Sint Maarten</option>
								<option value="sk">Slovakia</option>
								<option value="si">Slovenia</option>
								<option value="sb">Solomon Islands</option>
								<option value="so">Somalia</option>
								<option value="somaliland">Somaliland</option>
								<option value="za">South Africa</option>
								<option value="gs">South Georgia and the South Sandwich Islands</option>
								<option value="ss">South Sudan</option>
								<option value="es">Spain</option>
								<option value="lk">Sri Lanka</option>
								<option value="sd">Sudan</option>
								<option value="sr">Suriname</option>
								<option value="sz">Swaziland</option>
								<option value="se">Sweden</option>
								<option value="ch">Switzerland</option>
								<option value="sy">Syrian Arab Republic</option>
								<option value="tw">Taiwan, Province of China</option>
								<option value="tj">Tajikistan</option>
								<option value="tz">Tanzania</option>
								<option value="th">Thailand</option>
								<option value="tibet">Tibet</option>
								<option value="tl">Timor-Leste</option>
								<option value="tg">Togo</option>
								<option value="tk">Tokelau</option>
								<option value="to">Tonga</option>
								<option value="tt">Trinidad and Tobago</option>
								<option value="tn">Tunisia</option>
								<option value="tr">Turkey</option>
								<option value="tm">Turkmenistan</option>
								<option value="tc">Turks and Caicos Islands</option>
								<option value="tv">Tuvalu</option>
								<option value="ug">Uganda</option>
								<option value="ua">Ukraine</option>
								<option value="ae">United Arab Emirates</option>
								<option value="gb">United Kingdom</option>
								<option value="um">United States Minor Outlying Islands</option>
								<option value="us">United States</option>
								<option value="uy">Uruguay</option>
								<option value="uz">Uzbekistan</option>
								<option value="vu">Vanuatu</option>
								<option value="ve">Venezuela, Bolivarian Republic</option>
								<option value="vn">Viet Nam</option>
								<option value="vg">Virgin Islands, British</option>
								<option value="vi">Virgin Islands, U.S.</option>
								<option value="wales">Wales</option>
								<option value="wf">Wallis and Futuna</option>
								<option value="eh">Western Sahara</option>
								<option value="ye">Yemen</option>
								<option value="zm">Zambia</option>
								<option value="zanzibar">Zanzibar</option>
								<option value="zw">Zimbabwe</option>
						</select>
		</td>
	</tr>
	
	<?php if($mvcore['reg_rules'] == 'on') { ?>
		<tr align="center">
			<td><input type="checkbox" name="server_rules"></td>
			<td> <?php echo register_iacknowtharead;?> <a href="-id-Rules.html"><b><?php echo register_serverrles;?></b></a>.</td>
		</tr>
	<?php } ?>
	
	<?php if($mvcore['reC_sitekey'] == '') {} else { if($mvcore['reC_onoff'] == 'on') { // if Captcha Enabled ?>
		<tr align="center">
			<td><?php echo register_entercaptcha;?></td>
			<td align="center"><div align="center"><?php
					require_once('system/engine_plugins/recaptchalib.php');
					$publickey = $mvcore['reC_sitekey'];
					if($pvsRegister != 'ok8125') { exit; };
					echo recaptcha_get_html($publickey);
				?></div>
			</td>
		</tr>
	<?php } } ?>
	
	<tr align="center">
		<td colspan="2" align="center" style="padding-top:10px;"><button class="mvcore-button-style" name="rs_reg_form" style="cursor:pointer" type="submit"><?php echo register_registeracc; ?></button></td>
	</tr>
</table>
</form>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

<?php } else { 

if($_SESSION['user_login'] == 'ok'){
	echo '<div class="mvcore-nNote mvcore-nSuccess">'.eng_success_reglis_page.'</div>';
} else {
	echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_reglis_page.'</div>'; 
}
}; ?>