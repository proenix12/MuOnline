
<?php if(!$mvcore['Account_Settings'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Account_Settings'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?PHP
if (isset($_POST['change_user_pass'])){
	
	$old_pass 	= $_POST['old_password'];
	$new_pass 	= $_POST['new_password'];
	$rep_pass 	= $_POST['rep_password'];
	
	if($old_pass == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_changepassfail.'</div>'; } else {
			
				$check_user_existd = $mvcorex->prepare("Select memb___id from ".$mvcore_medb_i." where memb___id ='" .$_SESSION['username']."'");
				$stmt = $check_user_existd->execute();
				$stmt = $check_user_existd->fetch();
				$check_user_existssfaw = $stmt;

				if($mvcore['md5_support'] == 'yes') {
					if($mvcore['md5_hash_o'] == 'pw') { $pass_hash = hash('md5', $old_pass);

					} elseif($mvcore['md5_hash_o'] == 'pw_ur') {
					    $pass_hash = hash('md5', $old_pass.$check_user_existssfaw[0]);

					} elseif($mvcore['md5_hash_o'] == 'ur_pw') {
					    $pass_hash = hash('md5', $check_user_existssfaw[0].$old_pass);
					}
					elseif($mvcore['md5_hash_o'] == 'pw_sal') {
					    $pass_hash = hash('md5', $old_pass.$mvcore['md5_hs_salt']);

					} elseif($mvcore['md5_hash_o'] == 'pw_ur_sal') {
					    $pass_hash = hash('md5', $old_pass.$check_user_existssfaw[0].$mvcore['md5_hs_salt']);

					} elseif($mvcore['md5_hash_o'] == 'ur_pw_sal') {
					    $pass_hash = hash('md5', $check_user_existssfaw[0].$old_pass.$mvcore['md5_hs_salt']);

					} elseif($mvcore['md5_hash_o'] == 'dbo_fn_md5') {
					    $pass_hash = "dbo.fn_md5('".$old_pass."','".$check_user_existssfaw[0]."')";

					} else {
					    $pass_hash = hash('md5', $old_pass);

					}
				};
				
				if($mvcore['md5_support'] == 'yes') {
					$check_user_exist = $mvcorex->prepare("SELECT memb__pwd, memb___id, mvc_vip_date,smtp_block 
                    from " .$nmedb_data ." 
                    where memb___id = '".$_SESSION['username']."' 
                    and memb__pwd = ".$pass_hash."");
					$stmt = $check_user_exist->execute();
					$stmt = $check_user_exist->fetch();
					$check_user_existss = $stmt;

					if($check_user_existss[0] != ''){

                    } else {
					    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_cannotnotfound.'</div>';

					};
				} else {
					$check_user_exist = $mvcorex->prepare("Select memb__pwd from ".$mvcore_medb_i." where memb___id ='".$_SESSION['username']."'");
                    $stmt = $check_user_exist->execute();
                    $stmt = $check_user_exist->fetch();
                    $check_user_existss = $stmt;

					if($check_user_existss[0] == $old_pass){

                    } else {
					    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_cannotnotfound.'</div>';

					};
				};
				
				if($old_pass == '') {
				    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_oldpassforgot.'</div>';

				};
				if($new_pass == '') {
				    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_accnewpassmissing.'</div>';

				};
				if($new_pass != $rep_pass) {
				    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_passdidnotrepeat.'</div>';

				};
				
				if(strlen($old_pass) >= '11') {
				    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_oldpasstolarge.'</div>';

				};
				if(strlen($new_pass) >= '11') {
				    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_newpasstolarge.'</div>';

				};
				if(strlen($rep_pass) >= '11') {
				    $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_account_settings_reppasstolarge.'</div>';

				};
				
			if($has_error >= '1'){

            } else {
				
				if($mvcore['md5_support'] == 'yes') {
					$do_reg_insert = $mvcorex->prepare("update ".$mvcore_medb_i." set memb__pwd = 0x".md5($user_pass)." where memb___id = '".$_SESSION['username']."'");
                    $stmt = $do_reg_insert->execute();

				} else {
					$do_reg_insert = $mvcorex->prepare("update ".$mvcore_medb_i." set memb__pwd = '".$new_pass."' where memb___id = '".$_SESSION['username']."'");
                    $stmt = $do_reg_insert->execute();

				}
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_account_settings_passsucceschange.'</div>';

			};
	};
};
?>
<?PHP
if (isset($_POST['change_user_country'])){
	
	$mvc_flags 	= $_POST['ss_country'];
	
		if($mvc_flags == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">Please choose the country!</div>'; };
				
		if($has_error >= '1'){} else {
				
			$do_reg_insert = $mvcorex->prepare("update ".$mvcore_medb_i." set mvc_flag = '".$mvc_flags."' where memb___id = '" .$_SESSION['username']."'");
            $stmt = $do_reg_insert->execute();
			echo'<div class="mvcore-nNote mvcore-nSuccess">Your country successfully changed.</div>';

		};
};

$sql_flagca = $mvcorex->prepare("Select mvc_flag from ".$mvcore_medb_i." where memb___id = '".$_SESSION['username']."'");
$stmt = $sql_flagca->execute();
$stmt = $sql_flagca->fetch();
$sql_flag_outa = $stmt;
	
?>
<form method="POST" action="">
<input type="hidden" name="change_user_pass" >

<table id="oht" class="mvcore-table" cellpadding="0" cellspacing="0">
		<tr align="center"><td colspan="2">Change Password</td></tr>
		<tr align="center">
			<td style="background-color: transparent;" ><?php echo main_p_account_settings_oldpass;?></td>
			<td style="background-color: transparent;"><input class="mvcore-input-main" type="password" name="old_password" maxlength="10"/></td>
		</tr>
		<tr align="center">
			<td style="background-color: transparent;"><?php echo main_p_account_settings_newpass;?></td>
			<td style="background-color: transparent;"><input class="mvcore-input-main" type="password" name="new_password" maxlength="10"/></td>
		</tr>
		<tr align="center">
			<td style="background-color: transparent;"><?php echo main_p_account_settings_reppass;?></td>
			<td style="background-color: transparent;"><input class="mvcore-input-main" type="password" name="rep_password" maxlength="10"/></td>
		</tr>
		<tr align="center">
			<td colspan="2" align="center" style="background-color: transparent;padding-top:10px;"><button class="mvcore-button-style" type="submit"><?php echo main_p_account_settings_changepass;?></button></td>
		</tr>
</table>
</form>
<br>
<br>
<form method="POST" action="">
<input type="hidden" name="change_user_country" >

<table id="oht" class="mvcore-table" cellpadding="0" cellspacing="0">
		<tr align="center"><td colspan="2">Change Country</td></tr>
		<tr align="center">
			<td style="background-color: transparent;">Current Country: </td>
			<td style="background-color: transparent;"><b><?php echo''.$sql_flag_outa[0].'';?></b></td>
		</tr>
		<tr align="center">
			<td style="background-color: transparent;">Choose New Country</td>
			<td style="background-color: transparent;">
				<select name="ss_country" style=" width:370px; " class="mvcore-select-main">
							<option value="">-- <?php echo register_chosecountr;?></option>
							<option value="dz">Algeria</option>
							<option value="ao">Angola</option>
							<option value="bj">Benin</option>
							<option value="bw">Botswana</option>
							<option value="bf">Burkina Faso</option>
							<option value="bi">Burundi</option>
							<option value="cm"> Cameroon</option>
							<option value="cv">Cape Verde</option>
							<option value="cf">Central African Republic</option>
							<option value="td">Chad</option>
							<option value="km">Comoros</option>
							<option value="cg">Congo</option>
							<option value="cd">Congo, The Democratic Republic of the</option>
							<option value="ci">Côte d'Ivoire</option>
							<option value="dj">Djibouti</option>
							<option value="eg">Egypt</option>
							<option value="gq">Equatorial Guinea</option>
							<option value="er">Eritrea</option>
							<option value="et">Ethiopia</option>
							<option value="ga">Gabon</option>
							<option value="gm">Gambia</option>
							<option value="gh">Ghana</option>
							<option value="gn">Guinea</option>
							<option value="gw">Guinea-Bissau</option>
							<option value="ke">Kenya</option>
							<option value="ls">Lesotho</option>
							<option value="lr">Liberia</option>
							<option value="ly">Libya</option>
							<option value="mg">Madagascar</option>
							<option value="mw">Malawi</option>
							<option value="ml">Mali</option>
							<option value="mr">Mauritania</option>
							<option value="mu">Mauritius</option>
							<option value="yt">Mayotte</option>
							<option value="ma">Morocco</option>
							<option value="mz">Mozambique</option>
							<option value="na">Namibia</option>
							<option value="ne">Niger</option>
							<option value="ng">Nigeria</option>
							<option value="rw">Rwanda</option>
							<option value="re">Réunion</option>
							<option value="sh">Saint Helena</option>
							<option value="st">Sao Tome and Principe</option>
							<option value="sn">Senegal</option>
							<option value="sc">Seychelles</option>
							<option value="sl">Sierra Leone</option>
							<option value="so">Somalia</option>
							<option value="za">South Africa</option>
							<option value="ss">South Sudan</option>
							<option value="sd">Sudan</option>
							<option value="sz">Swaziland</option>
							<option value="tz">Tanzania</option>
							<option value="tg">Togo</option>
							<option value="tn">Tunisia</option>
							<option value="ug">Uganda</option>
							<option value="eh">Western Sahara</option>
							<option value="zm">Zambia</option>
							<option value="zw">Zimbabwe</option>
							
							<option value="ai">Anguilla</option>
							<option value="ag">Antigua and Barbuda</option>
							<option value="ar">Argentina</option>
							<option value="aw">Aruba</option>
							<option value="bs">Bahamas</option>
							<option value="bb">Barbados</option>
							<option value="bz">Belize</option>
							<option value="bm">Bermuda</option>
							<option value="bo">Bolivia, Plurinational State of</option>
							<option value="br">Brazil</option>
							<option value="ca">Canada</option>
							<option value="ky">Cayman Islands</option>
							<option value="cl">Chile</option>
							<option value="co">Colombia</option>
							<option value="cr">Costa Rica</option>
							<option value="cu">Cuba</option>
							<option value="cw">Curaçao</option>
							<option value="dm">Dominica</option>
							<option value="do">Dominican Republic</option>
							<option value="ec">Ecuador</option>
							<option value="sv">El Salvador</option>
							<option value="fk">Falkland Islands (Malvinas)</option>
							<option value="gf">French Guiana</option>
							<option value="gl">Greenland</option>
							<option value="gd">Grenada</option>
							<option value="gp">Guadeloupe</option>
							<option value="gt">Guatemala</option>
							<option value="gy">Guyana</option>
							<option value="ht">Haiti</option>
							<option value="hn">Honduras</option>
							<option value="jm">Jamaica</option>
							<option value="mq">Martinique</option>
							<option value="mx">Mexico</option>
							<option value="ms">Montserrat</option>
							<option value="an">Netherlands Antilles</option>
							<option value="ni">Nicaragua</option>
							<option value="pa">Panama</option>
							<option value="py">Paraguay</option>
							<option value="pe">Peru</option>
							<option value="pr">Puerto Rico</option>
							<option value="kn">Saint Kitts and Nevis</option>
							<option value="lc">Saint Lucia</option>
							<option value="pm">Saint Pierre and Miquelon</option>
							<option value="vc">Saint Vincent and the Grenadines</option>
							<option value="sx">Sint Maarten</option>
							<option value="sr">Suriname</option>
							<option value="tt">Trinidad and Tobago</option>
							<option value="tc">Turks and Caicos Islands</option>
							<option value="us">United States</option>
							<option value="uy">Uruguay</option>
							<option value="ve">Venezuela, Bolivarian Republic</option>
							<option value="vg">Virgin Islands, British</option>
							<option value="vi">Virgin Islands, U.S.</option>
							
							<option value="af">Afghanistan</option>
							<option value="am">Armenia</option>
							<option value="az">Azerbaijan</option>
							<option value="bh">Bahrain</option>
							<option value="bd">Bangladesh</option>
							<option value="bt">Bhutan</option>
							<option value="bn">Brunei Darussalam</option>
							<option value="kh">Cambodia</option>
							<option value="cn">China</option>
							<option value="cy">Cyprus</option>
							<option value="ge">Georgia</option>
							<option value="hk">Hong Kong</option>
							<option value="in">India</option>
							<option value="id">Indonesia</option>
							<option value="ir">Iran, Islamic Republic of</option>
							<option value="iq">Iraq</option>
							<option value="il">Israel</option>
							<option value="jp">Japan</option>
							<option value="jo">Jordan</option>
							<option value="kz">Kazakhstan</option>
							<option value="kp">Korea, Democratic People's Republic</option>
							<option value="kr">Korea, Republic</option>
							<option value="kw">Kuwait</option>
							<option value="kg">Kyrgyzstan</option>
							<option value="la">Lao People's Democratic Republic</option>
							<option value="lb">Lebanon</option>
							<option value="mo">Macao</option>
							<option value="my">Malaysia</option>
							<option value="mv">Maldives</option>
							<option value="mn">Mongolia</option>
							<option value="mm">Myanmar</option>
							<option value="np">Nepal</option>
							<option value="om">Oman</option>
							<option value="pk">Pakistan</option>
							<option value="ps">Palestinian Territory, Occupied</option>
							<option value="ph">Philippines</option>
							<option value="qa">Qatar</option>
							<option value="sa">Saudi Arabia</option>
							<option value="sg">Singapore</option>
							<option value="lk">Sri Lanka</option>
							<option value="sy">Syrian Arab Republic</option>
							<option value="tw">Taiwan, Province of China</option>
							<option value="tj">Tajikistan</option>
							<option value="th">Thailand</option>
							<option value="tl">Timor-Leste</option>
							<option value="tr">Turkey</option>
							<option value="tm">Turkmenistan</option>
							<option value="ae">United Arab Emirates</option>
							<option value="uz">Uzbekistan</option>
							<option value="vn">Viet Nam</option>
							<option value="ye">Yemen</option>
							
							<option value="as">American Samoa</option>
							<option value="au">Australia</option>
							<option value="ck">Cook Islands</option>
							<option value="fj">Fiji</option>
							<option value="pf">French Polynesia</option>
							<option value="gu">Guam</option>
							<option value="ki">Kiribati</option>
							<option value="mh">Marshall Islands</option>
							<option value="fm">Micronesia, Federated States of</option>
							<option value="nr">Nauru</option>
							<option value="nc">New Caledonia</option>
							<option value="nz">New Zealand</option>
							<option value="nu">Niue</option>
							<option value="nf">Norfolk Island</option>
							<option value="mp">Northern Mariana Islands</option>
							<option value="pw">Palau</option>
							<option value="pg">Papua New Guinea</option>
							<option value="pn">Pitcairn</option>
							<option value="ws">Samoa</option>
							<option value="sb">Solomon Islands</option>
							<option value="tk">Tokelau</option>
							<option value="to">Tonga</option>
							<option value="tv">Tuvalu</option>
							<option value="vu">Vanuatu</option>
							<option value="wf">Wallis and Futuna</option>
							
							<option value="al">Albania</option>
							<option value="ad">Andorra</option>
							<option value="at">Austria</option>
							<option value="by">Belarus</option>
							<option value="be">Belgium</option>
							<option value="ba">Bosnia and Herzegovina</option>
							<option value="bg">Bulgaria</option>
							<option value="hr">Croatia</option>
							<option value="cz">Czech Republic</option>
							<option value="dk">Denmark</option>
							<option value="ee">Estonia</option>
							<option value="fo">Faroe Islands</option>
							<option value="fi">Finland</option>
							<option value="fr">France</option>
							<option value="de">Germany</option>
							<option value="gi">Gibraltar</option>
							<option value="gr">Greece</option>
							<option value="va">Holy See (Vatican City State)</option>
							<option value="hu">Hungary</option>
							<option value="is">Iceland</option>
							<option value="ie">Ireland</option>
							<option value="it">Italy</option>
							<option value="xk">Kosovo</option>
							<option value="lv">Latvia</option>
							<option value="li">Liechtenstein</option>
							<option value="lt">Lithuania</option>
							<option value="lu">Luxembourg</option>
							<option value="mk">Macedonia, The Former Yugoslav Republic</option>
							<option value="mt">Malta</option>
							<option value="md">Moldova, Republic</option>
							<option value="mc">Monaco</option>
							<option value="me">Montenegro</option>
							<option value="nl">Netherlands</option>
							<option value="no">Norway</option>
							<option value="pl">Poland</option>
							<option value="pt">Portugal</option>
							<option value="ro">Romania</option>
							<option value="ru">Russian Federation</option>
							<option value="sm">San Marino</option>
							<option value="rs">Serbia</option>
							<option value="sk">Slovakia</option>
							<option value="si">Slovenia</option>
							<option value="es">Spain</option>
							<option value="se">Sweden</option>
							<option value="ch">Switzerland</option>
							<option value="ua">Ukraine</option>
							<option value="gb">United Kingdom</option>
							
							<option value="bv">Bouvet Island</option>
							<option value="io">British Indian Ocean Territory</option>
							<option value="ic">Canary Islands</option>
							<option value="catalonia">Catalonia</option>
							<option value="england">England</option>
							<option value="eu">European Union</option>
							<option value="tf">French Southern Territories</option>
							<option value="gg">Guernsey</option>
							<option value="hm">Heard Island and McDonald Islands</option>
							<option value="im">Isle of Man</option>
							<option value="je">Jersey</option>
							<option value="kurdistan">Kurdistan</option>
							<option value="scotland">Scotland</option>
							<option value="somaliland">Somaliland</option>
							<option value="gs">South Georgia and the South Sandwich Islands</option>
							<option value="tibet">Tibet</option>
							<option value="um">United States Minor Outlying Islands</option>
							<option value="wales">Wales</option>
							<option value="zanzibar">Zanzibar</option>
					</select>
			</td>
		</tr>
		<tr align="center">
			<td colspan="2" align="center" style="padding-top:10px;"><button class="mvcore-button-style" type="submit">Change Country</button></td>
		</tr>
</table>
</form>
	<?php } else {
	    echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>';

	}; ?>
<?php } ?>