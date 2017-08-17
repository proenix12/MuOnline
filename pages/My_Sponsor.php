
<?php if(!$mvcore['My_Sponsor'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['My_Sponsor'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?PHP
if (isset($_POST['sub_ms'])){
	
	$char_name = $_POST['ms_char_name'];
	$cred_value = $_POST['ms_cred_val'];
	$useracc = $_SESSION['username']; // Get username
	
	$sys_startsg = mssql_query("select accountID from character where name = '".$char_name."'"); // Get Character Name.
	$drop_infog = mssql_fetch_row($sys_startsg);
	$char_name_acc = $drop_infog[0];
	
	$get_tokens_data = mssql_query("SELECT ".$mvcore['credits_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." = '".$useracc."'");
	$drop_tokens_data = mssql_fetch_row($get_tokens_data);
	
	$db_get_mss = mssql_query("select msponsor_limit from ".$mvcore_medb_i." where memb___id = '".$_SESSION['username']."'");
	$db_out_mss = mssql_fetch_row($db_get_mss);

	if($char_name_acc == ''){ $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.myspon_notexiestreenter.'</div>'; };
	if($drop_tokens_data[0] < $cred_value) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.myspon_yneed.' '.$cred_value.' '.$mvcore['money_name1'].' '.myspon_tsend.'</div>'; };
	if(!preg_match("/^\d*$/",$cred_value)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.myspon_onnumallow.'</div>'; };
	if($char_name == '' || $cred_value == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.myspon_forgortentercharn.'</div>'; };
	if($db_out_mss[0] <= 0) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.myspon_daylimend.'</div>'; };
	if($db_out_mss[0] < $cred_value) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.myspon_Moredenlim.'</div>'; };

		if($has_error >= '1'){} else {
			
			$runUp = mssql_query("update ".$mvcore_medb_i." set msponsor_limit = msponsor_limit - '".$cred_value."' where memb___id = '".$useracc."'");
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$cred_value."' where ".$mvcore['user_column']." ='".$useracc."'"); // From Sender
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$cred_value."' where ".$mvcore['user_column']." ='".$char_name_acc."'"); // To Sender
				
			echo'<div class="mvcore-nNote mvcore-nSuccess">'.myspon_tcharns.' '.$char_name.' '.$cred_value.' '.$mvcore['money_name1'].' '.myspon_sucbensent.'</div>';
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$char_name_acc."','".floor($cred_value)."','0','From Donation Send','".time()."','0')");
		};
};

$db_get_msd = mssql_query("select msponsor_limit from ".$mvcore_medb_i." where memb___id = '".$_SESSION['username']."'");
$db_out_msd = mssql_fetch_row($db_get_msd);

?>

<form action="" method="POST">
<table id="oht" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr align="center"><td colspan="3"><?php echo''.myspon_donst.'';?> <?php echo $mvcore['money_name1'];?> <font size="2">( <?php echo''.myspon_yurlims.'';?> <?php echo $db_out_msd[0];?> )</font></td></tr>
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td style="background-color: transparent;"><input maxlength="10" class="mvcore-input-main" style="width:80% !important;" name="ms_char_name" type="text" value="" placeholder="Character Name"></td>
		<td style="background-color: transparent;"><input maxlength="5" class="mvcore-input-main" style="width:60% !important;" name="ms_cred_val" type="text" value="" placeholder="Credits Value"></td>
		<td style="background-color: transparent;" align="right"><button class="mvcore-button-style" style="cursor:pointer" name="sub_ms" type="submit"><?php echo''.myspon_donst.'';?></button></td>
	</tr>
</table>
</form>
<br>
<div style="font-size:16px;"><?php echo''.myspon_thismodissenff.'';?> <?php echo''.myspon_transfoneacceasy.'';?></div>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>