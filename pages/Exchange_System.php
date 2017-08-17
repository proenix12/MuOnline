
<?php if(!$mvcore['Exchange_System'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Exchange_System'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?PHP
if (isset($_POST['exsys_sub'])){
	
define("LOG_FILE_ExchangeSystem", "system/engine_logs/ExchangeSystem.log"); // Log Save

	$exval1 = $_POST['exval1'];
	$exval2 = $_POST['exval2'];
	$exval3 = $_POST['exval3'];
	$exval4 = $_POST['exval4'];
	$exval5 = $_POST['exval5'];
	$exval6 = $_POST['exval6'];
	
	$exval1 = stripSTCheck($exval1);
	$exval2 = stripSTCheck($exval2);
	$exval3 = stripSTCheck($exval3);
	$exval4 = stripSTCheck($exval4);
	$exval5 = stripSTCheck($exval5);
	$exval6 = stripSTCheck($exval6);

		if($exval1 >= '1') { $value1 = $exval1; } else { $value1 = '0'; };
		if($exval2 >= '1') { $value2 = $exval2; } else { $value2 = '0'; };
		if($exval3 >= '1') { $value3 = $exval3; } else { $value3 = '0'; };
		if($exval4 >= '1') { $value4 = $exval4; } else { $value4 = '0'; };
		if($exval5 >= '1') { $value5 = $exval5; } else { $value5 = '0'; };
		if($exval6 >= '1') { $value6 = $exval6; } else { $value6 = '0'; };
	
		$Count_val = $value1 + $value2 + $value3 + $value4 + $value5 + $value6;
		$useracc = $_SESSION['username']; // Get username
		
				if($exval1 >= '1') {
						$calculate_rew = $Count_val * $mvcore['c_t_g_rate'];
						
					$get_tokens_data = mssql_query("SELECT ".$mvcore['credits_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." = '".$useracc."'");
					$drop_tokens_data = mssql_fetch_row($get_tokens_data);
					$isokreport = 'Yes';
						if($drop_tokens_data[0] < $Count_val) { $isokreport = 'No'; $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_needmore.' '.$mvcore['money_name1'].' '.main_p_exchange_system_toexchange.'.</div>'; };
					
					error_log(date('[Y-m-d H:i e] '). "Credits To Gold Credits: ".$exval1." to ".$calculate_rew." / Is OK? - ".$isokreport."". PHP_EOL, 3, LOG_FILE_ExchangeSystem);
					
				} elseif($exval2 >= '1') {
					
						$calculate_rew = $Count_val * $mvcore['c_t_w_rate'];
					
					$get_tokens_data = mssql_query("SELECT ".$mvcore['credits_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." = '".$useracc."'");
					$drop_tokens_data = mssql_fetch_row($get_tokens_data);
					$isokreport = 'Yes';
						if($drop_tokens_data[0] < $Count_val) { $isokreport = 'No'; $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_needmore.' '.$mvcore['money_name1'].' '.main_p_exchange_system_toexchange.'.</div>'; };
						
						$select_charwcv_info= mssql_query("Select memb_guid from ".$mvcore_medb_i." where memb___id='".$useracc."'");
						$s_charwcv_i= mssql_fetch_row($select_charwcv_info); // Seller Guid Check

						if($mvcore['guid_column'] == 'memb_guid' || $mvcore['guid_column'] == 'MemberGuid'){ $fix_wcoins_uadse = $s_charwcv_i[0]; } else { $fix_wcoins_uadse = $useracc; };
					
					error_log(date('[Y-m-d H:i e] '). "Credits To wCoins: ".$exval2." to ".$calculate_rew." / Is OK? - ".$isokreport."". PHP_EOL, 3, LOG_FILE_ExchangeSystem);
					
				} elseif($exval3 >= '1') {
					
						$calculate_rew = $Count_val * $mvcore['oh_t_c_rate'];
					
					$get_hours_data = mssql_query("SELECT onlinehours from ".$mvcore_medb_s." where memb___id = '".$useracc."'");
					$drop_hours_data = mssql_fetch_row($get_hours_data);
					$isokreport = 'Yes';
						if($drop_hours_data[0] < $Count_val) { $isokreport = 'No'; $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_morehoursonline.'</div>'; };
					
					error_log(date('[Y-m-d H:i e] '). "Online Hours To Credits: ".$exval3." to ".$calculate_rew." / Is OK? - ".$isokreport."". PHP_EOL, 3, LOG_FILE_ExchangeSystem);
					
				} elseif($exval4 >= '1') {
					
						$calculate_rew = $Count_val * $mvcore['g_t_c_rate'];
						
					$get_tokens_data = mssql_query("SELECT ".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." = '".$useracc."'");
					$drop_tokens_data = mssql_fetch_row($get_tokens_data);
					$isokreport = 'Yes';
						if($drop_tokens_data[0] < $Count_val) { $isokreport = 'No'; $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_needmore.' '.$mvcore['money_name2'].' '.main_p_exchange_system_toexchange.'.</div>'; };
					
					error_log(date('[Y-m-d H:i e] '). "Gold Credits To Credits: ".$exval4." to ".$calculate_rew." / Is OK? - ".$isokreport."". PHP_EOL, 3, LOG_FILE_ExchangeSystem);
					
				} elseif($exval5 >= '1') { // Cred to Zen
					
						$calculate_rew = $Count_val * $mvcore['c_t_z_rate'];
						
						if($calculate_rew >= '2000000000') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_valueempty.'</div>'; };
						
					$get_tokens_data = mssql_query("SELECT ".$mvcore['credits_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." = '".$useracc."'");
					$drop_tokens_data = mssql_fetch_row($get_tokens_data);
					$isokreport = 'Yes';
						if($drop_tokens_data[0] < $Count_val) { $isokreport = 'No'; $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_needmore.' '.$mvcore['money_name1'].' '.main_p_exchange_system_toexchange.'.</div>'; };
					
					error_log(date('[Y-m-d H:i e] '). "Credits To Zen: ".$exval5." to ".$calculate_rew." / Is OK? - ".$isokreport."". PHP_EOL, 3, LOG_FILE_ExchangeSystem);
					
				} elseif($exval6 >= '1') {  //Zen to Cred
					
						$calculate_rew = $Count_val * $mvcore['z_t_c_rate'];
						
					$get_tokens_data = mssql_query("SELECT money from warehouse where accountid = '".$useracc."'");
					$drop_tokens_data = mssql_fetch_row($get_tokens_data);
					$isokreport = 'Yes';
						if($drop_tokens_data[0] < $Count_val) { $isokreport = 'No'; $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_needmore.' Zen '.main_p_exchange_system_toexchange.'.</div>'; };
					
					error_log(date('[Y-m-d H:i e] '). "Zen To Credits: ".$exval6." to ".$calculate_rew." / Is OK? - ".$isokreport."". PHP_EOL, 3, LOG_FILE_ExchangeSystem);
					
				} else { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_valueempty.'</div>'; };
				
			if(!preg_match("/^\d*$/",$exval1) && !is_numeric($exval1)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_sorrybutnumallowed.'</div>'; };
			if(!preg_match("/^\d*$/",$exval2) && !is_numeric($exval2)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_sorrybutnumallowed.'</div>'; };
			if(!preg_match("/^\d*$/",$exval3) && !is_numeric($exval3)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_sorrybutnumallowed.'</div>'; };
			if(!preg_match("/^\d*$/",$exval4) && !is_numeric($exval4)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_sorrybutnumallowed.'</div>'; };
			if(!preg_match("/^\d*$/",$exval5) && !is_numeric($exval5)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_sorrybutnumallowed.'</div>'; };
			if(!preg_match("/^\d*$/",$exval6) && !is_numeric($exval6)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_sorrybutnumallowed.'</div>'; };
			 
$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
$check_onlines = mssql_fetch_row($check_online);
if( $check_onlines[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_exchange_system_characterisonline.'</div>'; };

			if($has_error >= '1'){} else {
				
				if($exval1 >= '1' && $mvcore['c_t_g_onoff'] == 'on') {
					$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$Count_val."' where ".$mvcore['user_column']." ='".$useracc."'");
						$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".floor($calculate_rew)."' where ".$mvcore['user_column']." ='".$useracc."'");
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_exchange_system_exchangesuccess.' '.floor($calculate_rew).' '.$mvcore['money_name2'].' '.main_p_exchange_system_added.'.</div>';
					$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','0','".floor($calculate_rew)."','".$mvcore['money_name1']." TO ".$mvcore['money_name2']." From Exchange System ','".time()."','0')");
				} elseif($exval2 >= '1' && $mvcore['c_t_w_onoff'] == 'on') {
					$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$Count_val."' where ".$mvcore['user_column']." ='".$useracc."'");
						$edit_site = mssql_query("UPDATE ".$mvcore['wcoins_table']." SET ".$mvcore['wcoins_column']." = ".$mvcore['wcoins_column']." + '".floor($calculate_rew)."' WHERE ".$mvcore['guid_column']."='".$fix_wcoins_uadse."'");
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_exchange_system_exchangesuccess.' '.floor($calculate_rew).' WCoins '.main_p_exchange_system_added.'.</div>';
				} elseif($exval3 >= '1' && $mvcore['oh_t_c_onoff'] == 'on') {
					$run = mssql_query("update ".$mvcore_medb_s." set onlinehours = onlinehours - '".$Count_val."' where memb___id ='".$useracc."'");
						$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".floor($calculate_rew)."' where ".$mvcore['user_column']." ='".$useracc."'");
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_exchange_system_exchangesuccess.' '.floor($calculate_rew).' '.$mvcore['money_name1'].' '.main_p_exchange_system_added.'.</div>';
					$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".floor($calculate_rew)."','0','OnlineHours TO ".$mvcore['money_name1']." From Exchange System ','".time()."','0')");
				} elseif($exval4 >= '1' && $mvcore['g_t_c_onoff'] == 'on') {
					$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$Count_val."' where ".$mvcore['user_column']." ='".$useracc."'");
						$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".floor($calculate_rew)."' where ".$mvcore['user_column']." ='".$useracc."'");
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_exchange_system_exchangesuccess.' '.floor($calculate_rew).' '.$mvcore['money_name1'].' '.main_p_exchange_system_added.'.</div>';
					$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".floor($calculate_rew)."','0','".$mvcore['money_name2']." TO ".$mvcore['money_name1']." From Exchange System ','".time()."','0')");
				} elseif($exval5 >= '1' && $mvcore['z_t_c_onoff'] == 'on') {
					$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$Count_val."' where ".$mvcore['user_column']." ='".$useracc."'");
						$run = mssql_query("update warehouse set money  = money + '".floor($calculate_rew)."' where accountid ='".$useracc."'");
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_exchange_system_exchangesuccess.' '.floor($calculate_rew).' Zen '.main_p_exchange_system_added.'.</div>';
				} elseif($exval6 >= '1' && $mvcore['c_t_z_onoff'] == 'on') {
					$run = mssql_query("update warehouse set money  = money - '".$Count_val."' where accountid ='".$useracc."'");
						$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".floor($calculate_rew)."' where ".$mvcore['user_column']." ='".$useracc."'");
					echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_exchange_system_exchangesuccess.' '.floor($calculate_rew).' '.$mvcore['money_name1'].' '.main_p_exchange_system_added.'.</div>';
					$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".floor($calculate_rew)."','0','Zen TO ".$mvcore['money_name1']." From Exchange System ','".time()."','0')");
				};

			};
};

$get_ohours_data = mssql_query("SELECT OnlineHours from ".$mvcore_medb_s." where memb___id = '".$_SESSION['username']."'");
$drop_ohours_data = mssql_fetch_row($get_ohours_data);

if($drop_ohours_data[0] == '') { $drop_ohours_dat = 0; } else { $drop_ohours_dat = $drop_ohours_data[0]; };
					
?>
<br>
<script>
$(document).ready(function(){
	var GcredName = '<?php echo $mvcore['money_name2'];?>';
	var TokenName = '<?php echo $mvcore['money_name1'];?>';
var exRateHours 	= '<?php echo $mvcore['oh_t_c_rate'];?>';
var exRateTokens 	= '<?php echo $mvcore['c_t_g_rate'];?>';
var exRateWCoins 	= '<?php echo $mvcore['c_t_w_rate'];?>';
var exRateGoldT 	= '<?php echo $mvcore['g_t_c_rate'];?>';
var exRateCredTZen 	= '<?php echo $mvcore['c_t_z_rate'];?>';
var exRateZenTCred 	= '<?php echo $mvcore['z_t_c_rate'];?>';

$("#oht").on("change keyup paste", function(){
	var calcTokens = $('#exval3').val() * parseInt(exRateHours);
		$("#showDivCost3").html(""+$('#exval3').val()+" Hours = "+parseInt(calcTokens)+" "+TokenName+"");
});

$("#twc").on("change keyup paste", function(){
		var difons = $('#exval2').val() ; if(difons <= '0' || difons == ''){ var difons = '0'; } else { var difons = difons; };
	var calcTokens = parseInt(difons) * exRateWCoins;
		$("#showDivCost2").html(""+$('#exval2').val()+" "+TokenName+" = "+parseInt(calcTokens)+" WCoins");
});

$("#tgc").on("change keyup paste", function(){
		var difons = $('#exval1').val() ; if(difons <= '0' || difons == ''){ var difons = '0'; } else { var difons = difons; };
	var calcTokens = parseInt(difons) * exRateTokens;
		$("#showDivCost1").html(""+$('#exval1').val()+" "+TokenName+" = "+parseInt(calcTokens)+" "+GcredName+"");
});

$("#gtc").on("change keyup paste", function(){
		var difons = $('#exval4').val() ; if(difons <= '0' || difons == ''){ var difons = '0'; } else { var difons = difons; };
	var calcTokens = parseInt(difons) * exRateGoldT;
		$("#showDivCost4").html(""+$('#exval4').val()+" "+GcredName+" = "+parseInt(calcTokens)+" "+TokenName+"");
});

$("#ctz").on("change keyup paste", function(){
		var difons = $('#exval5').val() ; if(difons <= '0' || difons == ''){ var difons = '0'; } else { var difons = difons; };
	var calcTokens = parseInt(difons) * exRateCredTZen;
		$("#showDivCost5").html(""+$('#exval5').val()+" "+TokenName+" = "+parseInt(calcTokens)+" Zen");
});

$("#ztc").on("change keyup paste", function(){
		var difons = $('#exval6').val() ; if(difons <= '0' || difons == ''){ var difons = '0'; } else { var difons = difons; };
	var calcTokens = parseInt(difons) * exRateZenTCred;
		$("#showDivCost6").html(""+$('#exval6').val()+" Zen = "+parseInt(calcTokens)+" "+TokenName+"");
});

});
</script>
<?php if($mvcore['oh_t_c_onoff'] == 'on') { ?>
<div style="font-size:20px;padding-left:10px;"><?php echo main_p_exchange_system_exchangeonlinehours;?> <?php echo $mvcore['money_name1'];?> ( <b><?php echo main_p_exchange_system_yourhours;?> <?php echo $drop_ohours_dat ;?></b> )</div>
<form action="" method="POST">
<table id="oht" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td style="background-color: transparent;"><input placeholder="0" maxlength="10" class="mvcore-input-main" id="exval3" name="exval3" type="text" value="" ></td>
		<td style="background-color: transparent;" align="right"><button class="mvcore-button-style" style="cursor:pointer" name="exsys_sub" type="submit"><?php echo main_p_exchange_system_exchange;?></button></td>
	</tr>
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td colspan="2"><div id="showDivCost3">0 <?php echo main_p_exchange_system_hours;?> = 0 <?php echo $mvcore['money_name1'];?></div></td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<?php if($mvcore['c_t_w_onoff'] == 'on') { ?>
<div style="font-size:20px;padding-left:10px;"><?php echo main_p_exchange_system_exchange;?> <?php echo $mvcore['money_name1'];?> <?php echo main_p_exchange_system_to;?> WCoins</div>
<form action="" method="POST">
<table id="twc" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td style="background-color: transparent;"><input placeholder="0" maxlength="10" class="mvcore-input-main" id="exval2" name="exval2" type="text" value="" ></td>
		<td style="background-color: transparent;" align="right"><button class="mvcore-button-style" style="cursor:pointer" name="exsys_sub" type="submit"><?php echo main_p_exchange_system_exchange;?></button></td>
	</tr>
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td colspan="2"><div id="showDivCost2">0 <?php echo $mvcore['money_name1'];?> = 0 WCoins</div></td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<?php if($mvcore['c_t_g_onoff'] == 'on') { ?>
<div style="font-size:20px;padding-left:10px;"><?php echo main_p_exchange_system_exchange;?> <?php echo $mvcore['money_name1'];?> <?php echo main_p_exchange_system_to;?> <?php echo $mvcore['money_name2'];?></div>
<form action="" method="POST">
<table id="tgc" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td style="background-color: transparent;"><input placeholder="0" maxlength="10" class="mvcore-input-main" id="exval1" name="exval1" type="text" value="" ></td>
		<td style="background-color: transparent;" align="right"><button class="mvcore-button-style" style="cursor:pointer" name="exsys_sub" type="submit"><?php echo main_p_exchange_system_exchange;?></button></td>
	</tr>
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td colspan="2" ><div id="showDivCost1">0 <?php echo $mvcore['money_name1'];?> = 0 <?php echo $mvcore['money_name2'];?></div></td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<?php if($mvcore['g_t_c_onoff'] == 'on') { ?>
<div style="font-size:20px;padding-left:10px;"><?php echo main_p_exchange_system_exchange;?> <?php echo $mvcore['money_name2'];?> <?php echo main_p_exchange_system_to;?> <?php echo $mvcore['money_name1'];?></div>
<form action="" method="POST">
<table id="gtc" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td style="background-color: transparent;"><input placeholder="0" maxlength="10" class="mvcore-input-main" id="exval4" name="exval4" type="text" value="" ></td>
		<td style="background-color: transparent;" align="right"><button class="mvcore-button-style" style="cursor:pointer" name="exsys_sub" type="submit"><?php echo main_p_exchange_system_exchange;?></button></td>
	</tr>
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td colspan="2"><div id="showDivCost4">0 <?php echo $mvcore['money_name2'];?> = 0 <?php echo $mvcore['money_name1'];?></div></td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<?php if($mvcore['z_t_c_onoff'] == 'on') { ?>
<div style="font-size:20px;padding-left:10px;"><?php echo main_p_exchange_system_exchange;?> <?php echo $mvcore['money_name1'];?> <?php echo main_p_exchange_system_to;?> Zen</div>
<form action="" method="POST">
<table id="ctz" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td style="background-color: transparent;"><input placeholder="0" maxlength="10" class="mvcore-input-main" id="exval5" name="exval5" type="text" value="" ></td>
		<td style="background-color: transparent;" align="right"><button class="mvcore-button-style" style="cursor:pointer" name="exsys_sub" type="submit"><?php echo main_p_exchange_system_exchange;?></button></td>
	</tr>
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td colspan="2"><div id="showDivCost5">0 <?php echo $mvcore['money_name1'];?> = 0 Zen</div></td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<?php if($mvcore['c_t_z_onoff'] == 'on') { ?>
<div style="font-size:20px;padding-left:10px;"><?php echo main_p_exchange_system_exchange;?> Zen <?php echo main_p_exchange_system_to;?> <?php echo $mvcore['money_name1'];?></div>
<form action="" method="POST">
<table id="ztc" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td style="background-color: transparent;"><input placeholder="0" maxlength="10" class="mvcore-input-main" id="exval6" name="exval6" type="text" value="" ></td>
		<td style="background-color: transparent;" align="right"><button class="mvcore-button-style" style="cursor:pointer" name="exsys_sub" type="submit"><?php echo main_p_exchange_system_exchange;?></button></td>
	</tr>
	<tr style="border-collapse: collapse; border-spacing: 0px;">
		<td colspan="2"><div id="showDivCost6">0 Zen = 0 <?php echo $mvcore['money_name1'];?></div></td>
	</tr>
</table>
</form>
<br>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>