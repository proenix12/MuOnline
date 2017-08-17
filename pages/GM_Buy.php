
<?php if(!$mvcore['GM_Buy'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['GM_Buy'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?php

//== Post Start ==//
if(isset($_POST['sub_button'])) {

//== Post Procedure Select ==//
$status_buy_val		= trim(isset($_POST['statusbuyopt']) ? $_POST['statusbuyopt'] : '');
$character_name		= trim(isset($_POST['charname']) ? $_POST['charname'] : '');

$status_Cost = $mvcore['buyGM_cost'] * $status_buy_val; // Cost
$status_days = 10 * $status_buy_val; // Days
$time_Date = $status_days * 86400;
$calcDate = time() + $time_Date;
if( $status_days == '10' || $status_days == '20' || $status_days == '30' || $status_days == '60') {} else { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_gm_buy_problemwithseldays.'</div>'; };

//== Main Info Get Script ==// 
$useracc = $_SESSION['username']; // Get Loged In Username
//== End Script ==//

$sys_starts = mssql_query("select name,GM_ExpireD from character where name = '".$character_name."'");
$drop_infoaa = mssql_fetch_row($sys_starts);

//Check if char online.
	$check_onlinea = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$_SESSION['username']."'");
	$check_onlinesa = mssql_fetch_row($check_onlinea);
	if( $check_onlinesa[0] == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_webshop_charisonline.'</div>'; };	
//end

$sys_startssds = mssql_query("select name,GM_ExpireD from character where accountid = '".$useracc."' and GM_ExpireD >= '1'");
$drop_infoaafewffew = mssql_fetch_row($sys_startssds);

$select_cred_check= mssql_query("Select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']."='".$useracc."'");
$get_creditss= mssql_fetch_row($select_cred_check);

if( $drop_infoaafewffew[1] != '' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.gmcp_bs_character.' '.$drop_infoaafewffew[0].' '.main_p_gm_buy_gasactivestatus.'</div>'; } else {

	if( $drop_infoaa[1] != '' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_gm_buy_gasactivestatussad.'</div>'; };
			
	if( $drop_infoaa[0] == '' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_gm_buy_notfoundchar.'</div>'; };

};

		if($mvcore['buyGM_cost_type'] == '1') {
			$get_creditss[0] >= floor($status_Cost) ? $has_errorf=0 : $has_errorf=1; //Credits
				if( $has_errorf == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_gm_buy_needmore.' '.$mvcore['money_name1'].'!</div>'; };
		}
		elseif($mvcore['buyGM_cost_type'] == '2') {
			$get_creditss[1] >= floor($status_Cost) ? $has_errorf=0 : $has_errorf=1; //Credits2 
				if( $has_errorf == '1' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_gm_buy_needmore.' '.$mvcore['money_name2'].'!</div>'; };
		};
		
if($has_error >= '1'){} else {

		$run_update = mssql_query("Update character set ctlcode = '".$mvcore['buyGM_ctlc']."', GM_ExpireD = '".$calcDate."' where name = '".$character_name."'");
		
		$run_update = mssql_query("Update ".$mvcore_medb_i." set admincp = '2' where memb___id = '".$useracc."'");
		
		//Take Cost
		if($mvcore['buyGM_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".floor($status_Cost)."' where ".$mvcore['user_column']." ='".$useracc."'");
		}
		elseif($mvcore['buyGM_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".floor($status_Cost)."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		};
		//end

echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_gm_buy_statussuccess.' '.$character_name.'.</div>';

}		

}

?>
<form action="" method="POST">
<table id="oht" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr align="center"><td colspan="2"><?php echo main_p_gm_buy_statusincludes;?></td></tr>
	<tr align="center">
		<td><?php echo main_p_gm_buy_selectchar;?></td>
		<td>
			<select name="charname" style=" width:370px; " class="mvcore-select-main">
				<?php
				
					$useracc = $_SESSION['username']; // Get username
					$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where AccountID = '".$useracc."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
					for($i=0;$i < mssql_num_rows($sys_start);++$i) {
					$drop_info = mssql_fetch_row($sys_start);
						echo'<option value="'.$drop_info[0].'">'.$drop_info[0].'</option>';
					}
				
				?>
			</select>
		</td>
	</tr>
	<tr align="center">
		<td><?php echo main_p_gm_buy_selectdays;?></td>
		<td>
			<select name="statusbuyopt" style=" width:370px; " class="mvcore-select-main">
				<?php
				
					if($mvcore['buyGM_cost_type'] == '1') { $p_type = ''.$mvcore['money_name1'].''; } elseif($mvcore['buyGM_cost_type'] == '2') { $p_type = ''.$mvcore['money_name2'].''; };

					if($mvcore['buyGM_expire_days'] >= '10') { $statusCost = $mvcore['buyGM_cost']; echo'<option value="1">10 Day Status For '.$statusCost.' '.$p_type.'</option>'; }
					
					if($mvcore['buyGM_expire_days'] >= '20') { $statusCost = $mvcore['buyGM_cost'] * 2; echo'<option value="2">20 Day Status For '.$statusCost.' '.$p_type.'</option>'; }
					
					if($mvcore['buyGM_expire_days'] >= '30') { $statusCost = $mvcore['buyGM_cost'] * 3; echo'<option value="3">1 Month Status For '.$statusCost.' '.$p_type.'</option>'; }
					
					if($mvcore['buyGM_expire_days'] >= '60') { $statusCost = $mvcore['buyGM_cost'] * 6; echo'<option value="6">2 Month Status For '.$statusCost.' '.$p_type.'</option>'; }
				
				?>
			</select>
		</td>
	</tr>
	<tr align="center">
		<td align="center" colspan="2" style="padding-top:10px;" ><button class="mvcore-button-style" style="cursor:pointer" name="sub_button" type="submit"><?php echo main_p_gm_buy_buygms;?></button></td>
	</tr>
</table>
</form>
<br>
<br>
<?php
	echo'<div>'.$mvcore['buyGM_rule_file'].'</div>';
?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>