
<?php if(!$mvcore['Lottery_System'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Lottery_System'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
	
	<?php if($mvcore['web_shop_disc_vip'] > '0' && $mvcore['vip_sys_active'] == '1'){ echo'<br><center><div><b>'.main_p_lottery_sys_lottticketcost.' '.floor($mvcore['lot_ticket_cost'] + ((- $mvcore['web_lott_disc_vip'] * $mvcore['lot_ticket_cost']) / 100)).' '.main_p_lottery_sys_forviponly.'</b></div></center>'; }; ?>

<?php

	if(isset($_POST['add_bt2']))
	{
		$luck_numb		= trim(isset($_POST['lucky_number']) ? $_POST['lucky_number'] : '');

		$errors = array();
		$success = array();

//Random digits
function generateRandomDigits($length = 2) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
		
$new_luck_numb = generateRandomDigits();

if(!preg_match("/^\d*$/",$new_luck_numb)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lottery_sys_numbersallowed.'</div>'; };
if(strlen($new_luck_numb) != '2') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lottery_sys_2digmorelessa.'</div>'; };

$useracc = $_SESSION['username']; // Get username
$get_bt = mssql_query("Select ".$mvcore['credits_column'].", ".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$useracc."'");
$get_bte = mssql_fetch_row($get_bt);

if($mvcore['web_lott_disc_vip'] > '0' && $mvcore['vip_sys_active'] == '1'){
	$tickCostVip = floor($mvcore['lot_ticket_cost'] + ((- $mvcore['web_lott_disc_vip'] * $mvcore['lot_ticket_cost']) / 100));
} else {
	$tickCostVip = $mvcore['lot_ticket_cost'];
}

if($mvcore['lot_cost_type'] == '1') {
	if($get_bte[0] <= $tickCostVip) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lottery_sys_donthavenougt.' '.$mvcore['money_name1'].'.</div>'; };
} elseif($mvcore['lot_cost_type'] == '2') {
	if($get_bte[1] <= $tickCostVip) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lottery_sys_donthavenougt.' '.$mvcore['money_name2'].'.</div>'; };
};

$sql10wwfg = mssql_query("Select sum(ticket_cost) from MVCore_Lottert_Data where ticket = '1'");
$sql10wwfgesd = mssql_fetch_row($sql10wwfg);

$middle_price = $sql10wwfgesd[0] + $mvcore['lottery_start_money'];

		if($has_error >= '1'){} else {


		$add_data = mssql_query("INSERT INTO MVCore_Lottert_Data (username,ticket,lucky_number,ticket_cost) VALUES ('".$useracc."','1','".$new_luck_numb."','".$tickCostVip."')");

		//Take Cost
		if($mvcore['lot_cost_type'] == '1') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$tickCostVip."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		}
		elseif($mvcore['lot_cost_type'] == '2') {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$tickCostVip."' where ".$mvcore['user_column']." ='".$useracc."'"); 
		};
		//end
			
			
		if($new_luck_numb != $mvcore['lot_lucky_num']) {
			echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_lottery_sys_youlostluckynum.' '.$new_luck_numb.'.</div>';	
		} else {

			//Random digits
			function luckyNumber($length = 2) {
				$characters = '0123456789';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomString;
			}

							$new_db = fopen("system/engine_configs".$db_name_multi."/lucknum_auto_cnf.php", "w"); //configs patch 
							$data = "<?php\n";
							$data .="\$mvcore['lot_lucky_num'] = \"".luckyNumber()."\";\n";
							$data .="?>";
							fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$db_name_multi."/lucknum_auto_cnf.php", 0777);

			$run = mssql_query("INSERT INTO MVCore_Lottert_WinL (username,credits,date,l_num,cost_type) VALUES ('".$useracc."','".$middle_price."','".time()."','".$new_luck_numb."','".$mvcore['lot_cost_type']."')");
			$run = mssql_query("delete from MVCore_Lottert_Data");
				
			//Give Price
			if($mvcore['lot_cost_type'] == '1') {
				$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$middle_price."' where ".$mvcore['user_column']." ='".$useracc."'");
				$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".$middle_price."','0','From Lottery System','".time()."','0')");
			}
			elseif($mvcore['lot_cost_type'] == '2') {
				$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$middle_price."' where ".$mvcore['user_column']." ='".$useracc."'");
				$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','0','".$middle_price."','From Lottery System','".time()."','0')");
			};
			//end
				header('Location: -id-Lottery_System-id-Success.html');
		};
		
		}
	}
	
if($_GET[op2] == 'Success'){ echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_lottery_sys_congracwonlottery.'</div>'; };

$sql10wwfg = mssql_query("Select sum(ticket_cost) from MVCore_Lottert_Data where ticket = '1'");
//$sql10wwfge =mssql_result($sql10wwfg, 0, 0);
$sql10wwfge = mssql_fetch_row($sql10wwfg);

$Price = $sql10wwfge[0] + $mvcore['lottery_start_money'];

$tickCostVip = $mvcore['lot_ticket_cost'];

if($mvcore['lot_cost_type'] == '1') {
	$cost_type_name = ''.$mvcore['money_name1'].'';
} elseif($mvcore['lot_cost_type'] == '2') {
	$cost_type_name = ''.$mvcore['money_name2'].'';
};

?>
<table align="center" cellpadding="0" cellspacing="0" width="100%">
				<tr align="center">
					<td>
						<div align="center">
							<font color="green" size="3"><?php echo main_p_lottery_sys_checkluckatlott; ?></font><br>
							<font color="green" size="2"><?php echo main_p_lottery_sys_buyticket; ?> <?php echo $tickCostVip ;?> <?php echo $cost_type_name;?> <?php echo main_p_lottery_sys_winmucmore; ?></font><br>
							<font color="red" size="3"><?php echo main_p_lottery_sys_price; ?>: <b><?php echo $Price; ?> <?php echo $cost_type_name;?></b> <font color="red" size="1"><br><?php echo main_p_lottery_sys_igmatchyouwon; ?></font><br>
							<br>
							<font color="orange" size="2"><?php echo main_p_lottery_sys_lucknumare; ?> </font><font color="orange" size="3"><b><?php echo $mvcore['lot_lucky_num'];?></b></font><br>
							<div style="margin-top:20px;"></div>
							<br>
								<center>
								<form action="-id-Lottery_System.html" method="post">
								<button name="add_bt2" class="mvcore-button-style" type="submit"><?php echo main_p_lottery_sys_astlott; ?></button>
								</form>
								</center>
							<br>
							<br>
						</div>
					</td> 
				</tr>
</table>
<?php
	$useracc = $_SESSION['username']; // Get Loged In Username
	$guild_query = mssql_query("SELECT top 5 username,credits,date,l_num from MVCore_Lottert_WinL order by date desc");
	$rosw = mssql_fetch_row($guild_query);
	if($rosw[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_lottery_sys_winlitmepty.'</div>'; } else {
?>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td><?php echo main_p_lottery_sys_top; ?></td>
		<td><?php echo main_p_lottery_sys_winner; ?></td>
		<td><?php echo main_p_lottery_sys_lucknum; ?></td>
		<td><?php echo main_p_lottery_sys_amount; ?></td>
		<td><?php echo main_p_lottery_sys_date; ?></td>
	</tr>
<?PHP
$guild_query = mssql_query("SELECT top 5 username,credits,date,l_num from MVCore_Lottert_WinL order by date desc");
for($i=0;$i < mssql_num_rows($guild_query);++$i) {
$row = mssql_fetch_row($guild_query);

$vote_displayN = mssql_query("Select Name from Character where AccountID='".$row[0]."'");$vote_displayName = mssql_fetch_row($vote_displayN);
if($vote_displayName[0] == ''){ $name_show = ''.main_p_lottery_sys_emptacc.'';} else { $name_show = $vote_displayName[0]; };

$time_left = gmdate("F j, Y", $row[2]);

$rank = $i+1;

$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
echo '

	<tr align="center">
		<td style="padding: 5px 5px 5px 5px;">'.$rank.'</td>
		<td style="padding: 5px 5px 5px 5px;"><b>'.$name_show.'</b></td>
		<td style="padding: 5px 5px 5px 5px;"><b>'.$row[3].'</b></td>
		<td style="padding: 5px 5px 5px 5px;"><b>'.$row[1].'</b></td>
		<td style="padding: 5px 5px 5px 5px;">'.$time_left.'</td>
	</tr>

';
}
?>
</table>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>