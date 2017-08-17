
<?php if(!$mvcore['Vip_Buy'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Vip_Buy'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?php

//== Post Start ==//
if(isset($_POST['buyvipstatus'])) {

//== Post Procedure Select ==//
$days		= $_POST['days'];

$vip_lvl_s = $mvcore['vip_col1_val'];

if($mvcore['vip_team_selct'] == 'muemu') { 
	$vip_lvl_s		= $_POST['viplevelmuemu'];
	switch($vip_lvl_s) {
		case 1: $lvl_coste = $mvcore['vip_col1_valt1_cost']; break;
		case 2: $lvl_coste = $mvcore['vip_col1_valt2_cost']; break;
		case 3: $lvl_coste = $mvcore['vip_col1_valt3_cost']; break;
		default: $lvl_costi = '0'; break;
	};
	if($vip_lvl_s >= '4') { $vip_lvl_s = '1'; };
};
if($mvcore['vip_team_selct'] == 'igcn') {
	$vip_lvl_s		= $_POST['vipleveligcn']; 
	switch($vip_lvl_s) {
		case 1: $lvl_costi = $mvcore['vip_col1_valt1_cost']; break;
		case 2: $lvl_costi = $mvcore['vip_col1_valt2_cost']; break;
		case 3: $lvl_costi = $mvcore['vip_col1_valt3_cost']; break;
		case 4: $lvl_costi = $mvcore['vip_col1_valt4_cost']; break;
		default: $lvl_costi = '0'; break;
	};
	if($vip_lvl_s >= '5') { $vip_lvl_s = '1'; };
};


$day_is = '86400';

if(!preg_match("/^\d*$/",$days)){ $has_error = '1'; };
	
$Cost_valuedf = $mvcore['vip_day_cost'] * $days;
if($mvcore['vip_team_selct'] == 'muemu') { $Cost_valuedf = $Cost_valuedf + $lvl_coste; }
elseif($mvcore['vip_team_selct'] == 'igcn') { $Cost_valuedf = $Cost_valuedf + $lvl_costi; }

$date_value = $day_is * $days;
$total_date_val = time() + $date_value;

if($mvcore['vip_cost_type'] == '1'){ $cost_type = $mvcore['money_name1']; } else { $cost_type = $mvcore['money_name2']; };

if($days > $mvcore['vip_day_counts']) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vip_buy_sometwrongday.'</div>'; };

//== Main Info Get Script ==// 
$useracc = $_SESSION['username']; // Get Loged In Username
//== End Script ==//

$sys_starts = mssql_query("select mvc_vip_date from ".$mvcore_medb_i." where memb___id = '".$_SESSION['username']."'");
$drop_infosd = mssql_fetch_row($sys_starts);
if($drop_infosd[0] >= time()) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vip_buy_youaleadyhaveactive.'</div>'; };

$select_cred_check= mssql_query("Select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']."='".$useracc."'");
$s_c_check= mssql_fetch_row($select_cred_check);
 
if($mvcore['vip_cost_type'] == '1'){
		if($s_c_check[0] < $Cost_valuedf ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vip_buy_needmore.' '.$cost_type.' '.main_p_vip_buy_ttobuyvip.'</div>'; };
	} else {
		if($s_c_check[1] < $Cost_valuedf ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_vip_buy_needmore.' '.$cost_type.' '.main_p_vip_buy_ttobuyvip.'</div>'; };
	};

//Check if char online.
	$check_onlinea = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$_SESSION['username']."'");
	$check_onlinesa = mssql_fetch_row($check_onlinea);
	if( $check_onlinesa[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_charisonline.'</div>'; };	
//end

if($has_error >= '1'){} else {

if($mvcore['Vip_System'] == 'Wvip'){
	//== Procedure Update Or Insert ==//
	$edit_site = mssql_query("UPDATE ".$mvcore_medb_i." SET mvc_vip_date = '".$total_date_val."' WHERE memb___id='".$useracc."'");

	if($mvcore['vip_cost_type'] == '1'){
		$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$Cost_valuedf."' where ".$mvcore['user_column']." ='".$useracc."'");
	} else {
		$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$Cost_valuedf."' where ".$mvcore['user_column']." ='".$useracc."'");
	};
	//== End Script ==// 
} else {
	
	//Calculate TimeStamp Cases
		if($mvcore['vip_col2_val'] == '1') { $timedatestamp = date("Y-m-d H:i:s",$total_date_val); } 
		elseif($mvcore['vip_col2_val'] == '3') { $timedatestamp = date("Y-d-m H:i:s",$total_date_val); }
		else { $timedatestamp = $total_date_val; };
	//End
	
	$edit_site = mssql_query("UPDATE ".$mvcore['vip_table_name']." SET ".$mvcore['vip_col1_name']." = ".$vip_lvl_s.", ".$mvcore['vip_col2_name']." = '".$timedatestamp."' WHERE ".$mvcore['vip_user_name']." = '".$useracc."'");
	
	if($mvcore['vip_file_insert_onoff'] == 'on') {
	//insert into file VIP User name.
		$file_path = $mvcore['vip_file_path'];
		$new_db = fopen($file_path, "a+");
		$size = filesize($file_path);
		$data = "\"".$useracc."\"\r\n"; // added \" for test.
		fwrite($new_db,$data);
		$text = fread($file_path, $size);
		fclose($new_db); chmod($file_path, 0777);
	//end
	};
	
	if($mvcore['Vip_System'] == 'wsvip'){ $edit_site = mssql_query("UPDATE ".$mvcore_medb_i." SET mvc_vip_date = '".$total_date_val."' WHERE memb___id='".$useracc."'"); };
	if($mvcore['vip_cost_type'] == '1'){
		$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$Cost_valuedf."' where ".$mvcore['user_column']." ='".$useracc."'");
	} else {
		$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$Cost_valuedf."' where ".$mvcore['user_column']." ='".$useracc."'");
	};
};
//== Success MSG ==//
echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_vip_buy_vipsuccessb.'</div>';}		
//== End Script ==// 
}

//for vip website and or server
$sys_starts = mssql_query("select mvc_vip_date from ".$mvcore_medb_i." where memb___id = '".$_SESSION['username']."'");
$drop_infoer = mssql_fetch_row($sys_starts);
if($drop_infoer[0] >= '2') { $vipdateExpiretne = date ("Y-m-d H:i", $drop_infoer[0]); $vipdateExpireG = '1'; } else { $vipdateExpireG = '0'; };
if($vipdateExpireG == '1'){ echo'<br><div style="font-size:20px;color:green;">'.main_p_vip_buy_willexpire.' '.$vipdateExpiretne.'</div><br><br>'; } else { echo''; };

//for vip server
$sys_startssdf = mssql_query("select ".$mvcore['vip_col1_name'].", ".$mvcore['vip_col2_name']." from ".$mvcore['vip_table_name']." where ".$mvcore['vip_user_name']." = '".$_SESSION['username']."'");
$drop_infoerds = mssql_fetch_row($sys_startssdf);
if($drop_infoerds[0] >= '1' && $mvcore['Vip_System'] != 'Wvip'){ 

	if($mvcore['vip_col2_val'] == '1') { $timedatestamp = $drop_infoerds[1]; } 
	elseif($mvcore['vip_col2_val'] == '3') { $timedatestamp = $drop_infoerds[1]; }
	else { $timedatestamp = date("Y-m-d H:i",$drop_infoerds[1]); };
	
	echo'<br><div style="font-size:20px;color:green;">'.main_p_vip_buy_ingvipact.' '.$timedatestamp.'</div><br><br>';

 } else { echo''; };

if($mvcore['vip_cost_type'] == '1'){ $cost_type = $mvcore['money_name1']; } else { $cost_type = $mvcore['money_name2']; };

 ?>

<form action="" method="POST">
<table id="oht" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr align="center"><td colspan="2">Vip Status Buy</td></tr>
	<tr align="center">
		<td>Vip Days:</td>
		<td>
			<select name="days" class="mvcore-select-main">
				<?php
					for($i=1;$i <= $mvcore['vip_day_counts'];++$i) {
						$costi[$i] = $mvcore['vip_day_cost'] * $i;
						echo'<option value="'.$i.'"> '.$i.' '.main_p_vip_buy_dayvupfor.' '.$costi[$i].' '.$cost_type.'</option>';
					};
				?>
			</select>
		</td>
	</tr>
	<?php
		
		if($mvcore['vip_team_selct'] == 'muemu') {
			echo '<tr align="center">
					<td>Vip Pack:</td>
					<td>
						<select name="viplevelmuemu" class="mvcore-select-main">
							<option value="1">'.$mvcore['vip_col1_valt1'].' '.main_p_vip_costvd.' '.$mvcore['vip_col1_valt1_cost'].' '.$cost_type.'</option>
							<option value="2">'.$mvcore['vip_col1_valt2'].' '.main_p_vip_costvd.' '.$mvcore['vip_col1_valt2_cost'].' '.$cost_type.'</option>
							<option value="3">'.$mvcore['vip_col1_valt3'].' '.main_p_vip_costvd.' '.$mvcore['vip_col1_valt3_cost'].' '.$cost_type.'</option>
						</select>
					</td></tr>
			';
		};
		
		if($mvcore['vip_team_selct'] == 'igcn') {
			echo '<tr align="center">
					<td>Vip Pack:</td>
					<td>
						<select name="vipleveligcn" class="mvcore-select-main">
							<option value="1">'.$mvcore['vip_col1_valt1'].' '.main_p_vip_costvd.' '.$mvcore['vip_col1_valt1_cost'].' '.$cost_type.'</option>
							<option value="2">'.$mvcore['vip_col1_valt2'].' '.main_p_vip_costvd.' '.$mvcore['vip_col1_valt2_cost'].' '.$cost_type.'</option>
							<option value="3">'.$mvcore['vip_col1_valt3'].' '.main_p_vip_costvd.' '.$mvcore['vip_col1_valt3_cost'].' '.$cost_type.'</option>
							<option value="3">'.$mvcore['vip_col1_valt4'].' '.main_p_vip_costvd.' '.$mvcore['vip_col1_valt4_cost'].' '.$cost_type.'</option>
						</select>
					</td></tr>
			';
		};
		
	?>

	<tr align="center">
		<td colspan="3" align="center" style="padding-top:10px;"><button class="mvcore-button-style" style="cursor:pointer" name="buyvipstatus" type="submit"><?php echo main_p_vip_buy_buyvipstatus; ?></button></td>
	</tr>
</table>
</form>
<?php 

if($mvcore['Vip_System'] == 'svip') {
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_infgvip.'</b>:</td>
					<td style="float:right;padding-right:15px;">Yes</td>
				</tr>
			</table>
		</div>
	';
} elseif($mvcore['Vip_System'] == 'Wvip') {
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_webshdisck.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_shop_disc_vip'].'%</td>
				</tr>
			</table>
		</div>
	';
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_lotttickcost.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.floor($mvcore['lot_ticket_cost'] + ((- $mvcore['web_lott_disc_vip'] * $mvcore['lot_ticket_cost']) / 100)).'</td>
				</tr>
			</table>
		</div>
	'; 
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_grandresrews.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_gr_reward_vip'].'</td>
				</tr>
			</table>
		</div>
	'; 
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_masfgrrerew.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_master_gr_reward_vip'].'</td>
				</tr>
			</table>
		</div>
	'; 
	if($mvcore['web_res_reward_vip'] > '0' && $mvcore['reset_reward_active'] == 'yes'){ echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_rerws.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_res_reward_vip'].'</td>
				</tr>
			</table>
		</div>
	'; };
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_rggmrlvlre.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_rgm_level_vip'].'</td>
				</tr>
			</table>
		</div>
	';
} elseif($mvcore['Vip_System'] == 'wsvip') {
	echo '
		<br>
		
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_infgvip.'</b>:</td>
					<td style="float:right;padding-right:15px;">Yes</td>
				</tr>
			</table>
		</div>
	';
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_webshdisck.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_shop_disc_vip'].'%</td>
				</tr>
			</table>
		</div>
	';
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_lotttickcost.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.floor($mvcore['lot_ticket_cost'] + ((- $mvcore['web_lott_disc_vip'] * $mvcore['lot_ticket_cost']) / 100)).'</td>
				</tr>
			</table>
		</div>
	'; 
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_grandresrews.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_gr_reward_vip'].'</td>
				</tr>
			</table>
		</div>
	'; 
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_masfgrrerew.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_master_gr_reward_vip'].'</td>
				</tr>
			</table>
		</div>
	'; 
	if($mvcore['web_res_reward_vip'] > '0' && $mvcore['vip_sys_active'] == '1' && $mvcore['reset_reward_active'] == 'yes'){ echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_rerws.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_res_reward_vip'].'</td>
				</tr>
			</table>
		</div>
	'; };
	echo '
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><b>'.main_p_vip_rggmrlvlre.'</b>:</td>
					<td style="float:right;padding-right:15px;">'.$mvcore['web_rgm_level_vip'].'</td>
				</tr>
			</table>
		</div>
	';
};

 ?>

	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>