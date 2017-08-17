
<?php if(!$mvcore['Scramble'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Scramble'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
	
<?php

if(isset($_POST['guessIt']))
{
	$answerString = $_POST['answerString'];

	$useracc = $_SESSION['username']; // Get username
	
	$srctlelvel = mssql_query("SELECT scrable_level, scrable_word, scrable_original from ".$mvcore_medb_i." where memb___id = '".$useracc."'");
	$srctlelvels = mssql_fetch_row($srctlelvel);
	$srctlelvelsegg = $srctlelvels[0] + 1;
	//new shuffle
		$file="system/Scramble Words.txt";
		$linecount = 0; $handle = fopen($file, "r"); chmod($file, 0777);
		while(!feof($handle)){ $line = fgets($handle); $linecount++;} fclose($handle);

		$rand_line = rand(0,$linecount); // Random line output

		$lcount = 0;
		$handle = fopen("system/Scramble Words.txt", "r"); chmod("system/Scramble Words.txt", 0777); 
		if ($handle) {
			while (($line = fgets($handle)) !== false) {
				if($lcount == $rand_line) { $lineString = $line; break; }
				$lcount++;
			}

			fclose($handle);
		} else {
			// error opening the file.
		} 

		$shufled = str_shuffle($lineString);
	//end
	
	if(strcmp($srctlelvels[2],$answerString) != 2){ // -1 = not match WHILE 2 = Ok ( weard i know )
		$has_error = '1';
		
		$run = mssql_query("update ".$mvcore_medb_i." set scrable_wrong = scrable_wrong + 1, scrable_word = '".$shufled."', scrable_original = '".$lineString."' where memb___id = '".$useracc."'"); // Saving in DB
	
		if($mvcore['scramble_lvldel'] == 'yes' && $srctlelvels[0] >= '1') {
			$run = mssql_query("update ".$mvcore_medb_i." set scrable_level = scrable_level - 1 where memb___id = '".$useracc."'");
		}; if($pvsScrambleEvent != 'ok7682') { exit; };
			
		echo'<div class="mvcore-nNote mvcore-nFailure">'.scramblevnt_unscrwordsorr.' <b>'.$srctlelvels[2].'</b></div>'; 
	};
	
	if($answerString == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.scramblevnt_wordinpwrong.'</div>'; };
	
		if($has_error >= '1'){} else {

			$run = mssql_query("update ".$mvcore_medb_i." set scrable_level = scrable_level + 1, scrable_word = '".$shufled."', scrable_original = '".$lineString."' where memb___id = '".$useracc."'");
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$mvcore['scramble_nreward']."' where ".$mvcore['user_column']." ='".$useracc."'");
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".floor($mvcore['scramble_nreward'])."','0','From Scramble Reward','".time()."','0')");
			echo'<div class="mvcore-nNote mvcore-nSuccess">'.scramblevnt_contrgayorcur.'</div>';
			
			if($srctlelvelsegg >= $mvcore['scramble_mlevel']) {
				$run = mssql_query("update ".$mvcore_medb_i." set scrable_level = 0, scrable_wrong = 0, scrable_word = '".$shufled."', scrable_original = '".$lineString."' where memb___id = '".$useracc."'");
				$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$mvcore['scramble_grandrew']."' where ".$mvcore['user_column']." ='".$useracc."'");
				$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$useracc."','".floor($mvcore['scramble_grandrew'])."','0','From Scramble Grand Reward','".time()."','0')");
				echo'<div class="mvcore-nNote mvcore-nSuccess">'.scramblevnt_congrugrandpric.' '.$mvcore['scramble_mlevel'].' '.scramblevnt_reseto.'</div>';
			}
		}
}

$useracc = $_SESSION['username']; // Get username
//Scramble word system ( saveing in DB so that after post there cant cheat )
$scrord = mssql_query("SELECT scrable_word, scrable_original, scrable_level from ".$mvcore_medb_i." where memb___id = '".$useracc."'");
$scrords = mssql_fetch_row($scrord);
$crambledword = $scrords[0];
$scrHint = $scrords[1];

if($scrords[0] == 'empty' || $scrords[1] == 'empty' || $scrords[0] == '' || $scrords[1] == '' || $scrords[0] == NULL || $scrords[1] == NULL) {
	$file="system/Scramble Words.txt";
	$linecount = 0; $handle = fopen($file, "r"); chmod($file, 0777);
	while(!feof($handle)){ $line = fgets($handle); $linecount++;} fclose($handle); 

	$rand_line = rand(0,$linecount); // Random line output

	$lcount = 0;
	$handle = fopen("system/Scramble Words.txt", "r"); chmod("system/Scramble Words.txt", 0777);
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			if($lcount == $rand_line) { $lineString = $line; break; }
			$lcount++;
		}

		fclose($handle);
	} else {
		// error opening the file.
	} 

	$shufled = str_shuffle($lineString);
	if($pvsScrambleEvent != 'ok7682') { exit; };
	$run = mssql_query("update ".$mvcore_medb_i." set scrable_word = '".$shufled."', scrable_original = '".$lineString."' where memb___id = '".$useracc."'"); // Saving in DB
	
	$crambledword = $shufled;
};
//End

?>
<?php 

	require('system/engine_configs'.$db_name_multi.'/Scramble_Timer.php');
	
$mvcore['scramble_starts'] = ($mvcore['scramble_starts'] * 60) * 60;
$mvcore['scramble_starts_int'] = $mvcore['scramble_starts_int'] * 60; // Interval

$date_calc = $mvcore['scramble_date_timer'];

if($date_calc <= time()) {
	
	$time_nes = $date_calc + $mvcore['scramble_starts_int'];
	$run_echo_stop = '1';
	?>
<table align="center" cellpadding="0" cellspacing="0" width="100%">
				<tr align="center">
					<td>
						<div align="left">
							<center><font color="green" size="3"><?php echo scramblevnt_unscthis;?></font><br></center>
							<center><font color="black" size="2"><?php echo scramblevnt_foreachcurans;?> <b><?php echo $mvcore['scramble_nreward'];?></b> <?php echo $mvcore['money_name1'];?>.</font><br></center>
							<br>
							<font color="black" size="2"><b><?php echo scramblevnt_unavcol;?></b> </font><font color="red" size="2"><b><?php echo $crambledword;?></b></font> ( <?php echo scramblevnt_hintths;?> <b><?php echo substr($scrHint, 0, 4);?></b></b> )<br>
							<br>
								<center>
								<form action="-id-Scramble_Event.html" method="post">
									<input maxlength="30" class="mvcore-input-main" name="answerString" type="text" value="" placeholder="<?php echo scramblevnt_enterwordhere;?>">
									<button name="guessIt" class="mvcore-button-style" type="submit"><?php echo scramblevnt_clicsublevel;?></button>
								</form>
								</center>
							<br>
							<font color="#61210B" size="3"><b><?php echo scramblevnt_cursslevel;?> <?php echo $scrords[2];?></b></font><br>
							<font color="black" size="2"><b><?php echo scramblevnt_oncegetlevle;?> <font color="violet"><?php echo $mvcore['scramble_mlevel'];?></font> <?php echo scramblevnt_youwillautorecg;?> <u><?php echo $mvcore['scramble_grandrew'];?> <?php echo $mvcore['money_name1'];?></u>.</b></font><br>
							<?php if($mvcore['scramble_lvldel'] == 'yes' && $scrords[2] >= '1') { ?> <font color="red" size="2"><b><?php echo scramblevnt_forewrongan;?></b></font><br> <?php }; ?>
						</div>
					</td> 
				</tr>
</table>
	<?php
		$date_convedss = decode_time(time(),$time_nes,'short','');
		if($mvcore['scramble_start_timer'] == 'on') { echo '<br><div align="center" style="color:red;font-size:12px;">'.scramblevnt_eventendin.' <b>'.$date_convedss.'</b></div>'; };
	if( time() >= $time_nes && $mvcore['scramble_start_timer'] == 'on'){
		
		$date_calcas = time() + $mvcore['scramble_starts']; //Fix If Date longer then last refresh
				
		$new_db = fopen("system/engine_configs".$db_name_multi."/Scramble_Timer.php", "w"); //configs patch  
		$data = "<?php\n";
		$data .="\$mvcore['scramble_date_timer'] = \"".$date_calcas."\";\n";
		$data .="?>";
		fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$db_name_multi."/Scramble_Timer.php", 0777);
		header("Refresh:0");
	};
};
$date_conveds = decode_time(time(),$date_calc,'short',''); if($pvsScrambleEvent != 'ok7682') { exit; };
if($run_echo_stop != '1' && $mvcore['scramble_start_timer'] == 'on') { echo '<div align="center" style="color:green;font-size:16px;"><b>'.scramblevnt_eventstartin.' '.$date_conveds.'</b></div>'; };
 ?>
<br>
<?php
	$guild_query = mssql_query("SELECT top 10 scrable_level from ".$mvcore_medb_i." order by scrable_level desc");
	$rosw = mssql_fetch_row($guild_query);
	if($rosw[0] == '' && $rosw[0] <= '0') { echo'<div class="mvcore-nNote mvcore-nInformation">'.scramblevnt_scrmaempty.'</div>'; } else {
?>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td><?php echo scramblevnt_topten;?></td>
		<td><?php echo scramblevnt_name;?></td>
		<td><?php echo scramblevnt_currlevel;?></td>
		<td><?php echo scramblevnt_wrongansw;?></td>
	</tr>
<?PHP
$scramble_query = mssql_query("SELECT top 10 memb___id, scrable_level, scrable_wrong from ".$mvcore_medb_i." where scrable_level >= '1' order by scrable_level desc");
for($i=0;$i < mssql_num_rows($scramble_query);++$i) {
$row = mssql_fetch_row($scramble_query);

$vote_displayN = mssql_query("Select Name from Character where AccountID='".$row[0]."'");
$vote_displayName = mssql_fetch_row($vote_displayN); if($pvsScrambleEvent != 'ok7682') { exit; };

if($vote_displayName[0] == ''){ $name_show = ''.main_p_lottery_sys_emptacc.'';} else { $name_show = $vote_displayName[0]; };

$rank = $i+1;

echo '

	<tr align="center">
		<td style="padding: 5px 5px 5px 5px;">'.$rank.'</td>
		<td style="padding: 5px 5px 5px 5px;"><b>'.$name_show.'</b></td>
		<td style="padding: 5px 5px 5px 5px;"><b>'.$row[1].'</b></td>
		<td style="padding: 5px 5px 5px 5px;"><b>'.$row[2].'</b></td>
	</tr>

';
}
?>
</table>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>