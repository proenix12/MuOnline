
<?php if(!$mvcore['Hide_Information'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Hide_Information'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?php

//== Post Start ==//
if(isset($_POST['hideinfos'])) {

//== Post Procedure Select ==//
$days		= trim(isset($_POST['days']) ? $_POST['days'] : '');

$errors = array();
$success = array();

$day_is = '86400';

if($days == '1'){ $can_cost = $mvcore['hide_iInfo_cost']; $timestampform = $day_is;}
elseif($days == '5'){ $can_cost = $mvcore['hide_iInfo_cost']*5; $timestampform = $day_is*5;}
elseif($days == '10'){ $can_cost = $mvcore['hide_iInfo_cost']*10; $timestampform = $day_is*10;}
elseif($days == '30'){ $can_cost = $mvcore['hide_iInfo_cost']*30; $timestampform = $day_is*30;};

$can_costdf = floor($can_cost + (( - $mvcore['hide_disc_perc'] * $can_cost ) / 100)); // Percent

//== Main Info Get Script ==// 
$useracc = $_SESSION['username']; // Get Loged In Username
$time_stamp = time(); //PC Time
//== End Script ==//
$hide_check = mssql_query("Select top 1 infohide from ".$mvcore_medb_i."");
if(!$hide_check){
	$add_hide = mssql_query("alter table ".$mvcore_medb_i." add infohide varchar(30) null");
};

$select_cred_check= mssql_query("Select ".$mvcore['credits_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']."='".$useracc."'");
$s_c_check= mssql_fetch_row($select_cred_check);

if($s_c_check[0] < $can_costdf ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_information_hide_youneedmore.' '.$mvcore['money_name1'].' '.main_p_information_hide_toideinto.'</div>'; };

$new_update_time = $timestampform + $time_stamp;

if($has_error >= '1'){} else {

//== Procedure Update Or Insert ==//
$edit_site = mssql_query("UPDATE ".$mvcore_medb_i." SET infohide = '".$new_update_time."' WHERE memb___id='".$useracc."'");
$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$can_costdf."' where ".$mvcore['user_column']." ='".$useracc."'");
//== End Script ==// 

//== Success MSG ==//
echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_information_hide_infosuccesshiden.'</div>';}		
//== End Script ==// 
}

$hide_checks = mssql_query("Select infohide from ".$mvcore_medb_i." where memb___id='".$_SESSION['username']."'");
$hide_check_drop= mssql_fetch_row($hide_checks);
if($hide_check_drop[0] == '' || $hide_check_drop[0] == '0') {} else {
$expire_date = date ("Y-m-d H:i", $hide_check_drop[0]); echo'<br><div style="font-size:20px;">'.main_p_information_hide_youhidenexpire.' '.$expire_date.'</div><br><br>';
};

$value1 = $mvcore['hide_iInfo_cost'];
$value5 = $mvcore['hide_iInfo_cost']*5;
$value10 = $mvcore['hide_iInfo_cost']*10;
$value30 = $mvcore['hide_iInfo_cost']*30;

$value1 = floor($value1 + (( - $mvcore['hide_disc_perc'] * $value1 ) / 100)); // Percent
$value5 = floor($value5 + (( - $mvcore['hide_disc_perc'] * $value5 ) / 100)); // Percent
$value10 = floor($value10 + (( - $mvcore['hide_disc_perc'] * $value10 ) / 100)); // Percent
$value30 = floor($value30 + (( - $mvcore['hide_disc_perc'] * $value30 ) / 100)); // Percent

 ?>

<form action="" method="POST">
<table id="oht" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr align="center"><td colspan="2"><?php echo main_p_information_hide_withthisyouhide;?></td></tr>
	<tr align="center">
		<td><?php echo main_p_information_hide_daystohide;?></td>
		<td><select name="days" style=" width:370px; " class="mvcore-select-main"><option value="1"> 1 <?php echo main_p_information_hide_day;?> <?php echo $value1; ?> <?php echo $mvcore['money_name1'];?></option><option value="5"> 5 <?php echo main_p_information_hide_days;?> <?php echo $value5; ?> <?php echo $mvcore['money_name1'];?></option><option value="10"> 10 <?php echo main_p_information_hide_days;?> <?php echo $value10; ?> <?php echo $mvcore['money_name1'];?></option><option value="30"> 1 <?php echo main_p_information_hide_month;?> <?php echo $value30; ?> <?php echo $mvcore['money_name1'];?></option></select></td>
	</tr>
	
	<tr align="center">
		<td colspan="2" align="center" style="padding-top:10px;"><button class="mvcore-button-style" style="cursor:pointer" name="hideinfos" type="submit"><?php echo main_p_information_hide_hideinfo; ?></button></td>
	</tr>
</table>
</form>

	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>