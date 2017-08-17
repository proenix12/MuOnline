
<?php if(!$mvcore['Character_Market'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Character_Market'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo'Back To Game Panel'; ?></a></td></tr></table></div>

			<?php
				$check_onlinesd = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$_SESSION['username']."'");
				$check_onlinessd = mssql_fetch_row($check_onlinesd);
				if( $check_onlinessd[0] == '0' || $check_onlinessd[0] == '' ) {
			?>
			
<?php
if(isset($_POST['buytakechar'])) {
	
	$useracc = $_SESSION['username']; // Get Loged In Username
	
	$character_name		= $_POST['character_name'];

	$get_char_data= mssql_query("Select name,accountid,sell_cost,selling_char from character where name='".$character_name."'");
	$output_char_data= mssql_fetch_row($get_char_data); // Character Data

	$select_cred_check= mssql_query("Select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']."='".$useracc."'");
	$s_c_check= mssql_fetch_row($select_cred_check); // Check if Can BUY

	if($output_char_data[2] == '0' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_charactersold.'</div>'; };

	if($output_char_data[3] == $useracc) { } else {
		if($output_char_data[1] == 'CC' ) {
			if($s_c_check[0] <= $output_char_data[2] ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_notenoug.' '.$mvcore['money_name1'].' '.main_p_character_market_tobuychar.'</div>'; };
		}elseif($output_char_data[1] == 'GC' ) {
			if($s_c_check[1] <= $output_char_data[2] ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_notenoug.' '.$mvcore['money_name2'].' '.main_p_character_market_tobuychar.'</div>'; };
		};
	}
	
	if($has_error >= '1'){} else {

		$run = mssql_query("update character set AccountID = '".$useracc."', sell_cost = '0', selling_char = '".$useracc."' where name = '".$character_name."'");
		
	if($output_char_data[3] == $useracc) { } else {
		if($output_char_data[1] == 'CC' ) {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$output_char_data[2]."' where ".$mvcore['user_column']." ='".$useracc."'");
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$output_char_data[2]."' where ".$mvcore['user_column']." ='".$output_char_data[3]."'");
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$output_char_data[3]."','".$output_char_data[2]."','0','From Character Market','".time()."','0')");
		}elseif($output_char_data[1] == 'GC' ) {
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".$output_char_data[2]."' where ".$mvcore['user_column']." ='".$useracc."'");
			$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$output_char_data[2]."' where ".$mvcore['user_column']." ='".$output_char_data[3]."'");
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$output_char_data[3]."','0','".$output_char_data[2]."','From Character Market','".time()."','0')");
		};
	};

		if($output_char_data[3] == $useracc) {
			echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_character_market_successtakenba.'</div>';
		} else {
			echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_character_market_successbougth.'</div>';
		}
	}		
}

if(isset($_POST['charsellopt'])) {
	
	$useracc = $_SESSION['username']; // Get Loged In Username
	
	$character_name		= $_POST['character_name'];
	$cost				= $_POST['cost'];
	$cost_type			= $_POST['ctype'];
	
	$cost = stripSTCheck($cost);
	
	$get_char_data= mssql_query("Select name,accountid,sell_cost,selling_char,clevel from character where name='".$character_name."'");
	$output_char_data= mssql_fetch_row($get_char_data); // Character Data

		
		if($output_char_data[2] >= '1') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_charnotfound.'</div>'; };
	
	if($output_char_data[1] != $useracc) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_thischarnotyour.'</div>'; };  // Check if Its Sellers Character LOL
	
	if($output_char_data[4] <= '379') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_charlevellow.'</div>'; };
	
	if($output_char_data[0] == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_charnotfound.'</div>'; };
	if($cost == '') { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_costempty.'</div>'; };
	if(!preg_match("/^\d*$/",$cost)) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_character_market_onlynumallowed.'</div>'; };
	
	if($has_error >= '1'){} else {

		$run = mssql_query("update character set AccountID = '".$cost_type."', sell_cost = '".$cost."', selling_char = '".$useracc."' where name = '".$character_name."'");
		$run = mssql_query("update Accountcharacter set GameIDC = '', GameID1 = '' where ID = '".$useracc."' and GameID1 = '".$character_name."'");
		$run = mssql_query("update Accountcharacter set GameIDC = '', GameID2 = '' where ID = '".$useracc."' and GameID2 = '".$character_name."'");
		$run = mssql_query("update Accountcharacter set GameIDC = '', GameID3 = '' where ID = '".$useracc."' and GameID3 = '".$character_name."'");
		$run = mssql_query("update Accountcharacter set GameIDC = '', GameID4 = '' where ID = '".$useracc."' and GameID4 = '".$character_name."'");
		$run = mssql_query("update Accountcharacter set GameIDC = '', GameID5 = '' where ID = '".$useracc."' and GameID5 = '".$character_name."'");

		echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_character_market_successaddedmarket.'</div>';
		
	}		
}

?>
<?php
echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.main_p_character_market_name.'</td>
			<td>'.main_p_character_market_cost.'</td>
			<td>'.main_p_character_market_costtype.'</td>
			<td>'.main_p_character_market_sell.'</td>
		</tr>
';

$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid,m_Grand_Resets from character where AccountID = '".$useracc."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
for($i=0;$i < mssql_num_rows($sys_start);++$i) {
$drop_info = mssql_fetch_row($sys_start);

if($mvcore['market_credits_sell'] == '1'){$cred_sell = '<option value="CC">'.$mvcore['money_name1'].'</option>';};
if($mvcore['market_credits2_sell'] == '1'){$cred2_sell = '<option value="GC">'.$mvcore['money_name2'].'</option>';};

		echo'
			<tr>
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				<td><form action="" method="POST"><input type="hidden" name="character_name" value="'.$drop_info[0].'"><input style="width:80px !important;" class="mvcore-input-main" placeholder="0" value="" type="text" name="cost"></td>
				<td><select class="mvcore-select-main" style="width:150px !important;" name="ctype" class="mvcore-input-main">'.$cred_sell.''.$cred2_sell.'</select></td>
				<td><button name="charsellopt" class="mvcore-button-style" type="submit">'.main_p_character_market_sellchar.'</button></form></td>
			</tr>
		';
};
?>
</table>
<br>
<div class="mvcore-ucp-info" align="center" style="width:100%;padding-top: 15px; padding-bottom: 15px;">
<div align="center" style="text-align:center;">

				<?php if($mvcore['db_season'] >= '2') { echo"<a href='-id-Character_Market.html'>".main_p_character_market_allclasses."</a> - ";} ?>
				<?php if($mvcore['db_season'] >= '2') { echo"<a href='-id-Character_Market-id-0.html'>DW SM GrM</a> - ";} ?>
				<?php if($mvcore['db_season'] >= '2') { echo"<a href='-id-Character_Market-id-16.html'>DK BK BM</a> - ";} ?>
				<?php if($mvcore['db_season'] >= '2') { echo"<a href='-id-Character_Market-id-32.html'>ELF ME HE</a> - ";} ?>
				<?php if($mvcore['db_season'] >= '2') { echo"<a href='-id-Character_Market-id-48.html'>MG DM</a> - ";} ?>
				<?php if($mvcore['db_season'] >= '2') { echo"<a href='-id-Character_Market-id-64.html'>DL LE</a> - <br>";} ?>
				<?php if($mvcore['db_season'] >= '4') { echo"<a href='-id-Character_Market-id-80.html'>Sum BS DiM</a> - ";} ?>
				<?php if($mvcore['db_season'] >= '6') { echo"<a href='-id-Character_Market-id-96.html'>RF FM</a> - ";} ?>
				<?php if($mvcore['db_season'] >= '10') { echo"<a href='-id-Character_Market-id-112.html'>GL ML</a>";} ?>


</div>
</div>
<br>

			<?php
				} else { echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_character_market_exitgame.'</div>'; }
			?>
			
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td><?php echo main_p_character_market_name;?></td>
		<td><?php echo main_p_character_market_class;?></td>
		<td><?php echo main_p_character_market_cost;?></td>
		<td><?php echo main_p_character_market_buycharacter;?></td>
	</tr>
<?PHP

$useracc = $_SESSION['username']; // Get username

if($_GET['op2'] == '0') { $cat_drop = "and class >='0' and class <= '3'"; } 
elseif($_GET['op2'] == '16') { $cat_drop = "and class >='16' and class <= '19'"; } 
elseif($_GET['op2'] == '32') { $cat_drop = "and class >='32' and class <= '35'"; } 
elseif($_GET['op2'] == '48') { $cat_drop = "and class >='48' and class <= '51'"; } 
elseif($_GET['op2'] == '64') { $cat_drop = "and class >='64' and class <= '67'"; } 
elseif($_GET['op2'] == '80') { $cat_drop = "and class >='80' and class <= '83'"; } 
elseif($_GET['op2'] == '96') { $cat_drop = "and class >='96' and class <= '98'"; } 
elseif($_GET['op2'] == '112') { $cat_drop = "and class >='112' and class <= '114'"; } 
else { $cat_drop = ''; };

$char_market = mssql_query("select top 100 name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",m_Grand_Resets,money,LevelUpPoint,class,Inventory,strength,dexterity,vitality,energy,Leadership,sell_cost,selling_char,AccountID from character where sell_cost >= '1' ".$cat_drop." order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
for($i=0;$i < mssql_num_rows($char_market);++$i) {
$drop_s_i = mssql_fetch_row($char_market);

if($drop_s_i[7] >= '0' && $drop_s_i[7] <= '3') {$gclassfx="sm";};
if($drop_s_i[7] >= '16' && $drop_s_i[7] <= '19') {$gclassfx="dk";};
if($drop_s_i[7] >= '32' && $drop_s_i[7] <= '35') {$gclassfx="he";};
if($drop_s_i[7] >= '48' && $drop_s_i[7] <= '51') {$gclassfx="mg";};
if($drop_s_i[7] >= '64' && $drop_s_i[7] <= '67') {$gclassfx="le";};
if($drop_s_i[7] >= '80' && $drop_s_i[7] <= '83') {$gclassfx="dim";};
if($drop_s_i[7] >= '96' && $drop_s_i[7] <= '98') {$gclassfx="rf";};
if($drop_s_i[7] >= '112' && $drop_s_i[7] <= '114') {$gclassfx="gl";};

if($drop_s_i[16] == 'CC') { $CostName = $mvcore['money_name1']; } elseif($drop_s_i[16] == 'GC') { $CostName = $mvcore['money_name2']; };
	
if($useracc == $drop_s_i[15]) { $testssDrop = ''.main_p_character_market_takeback.''; $charCostDrop = $drop_s_i[14]; } else { $testssDrop = ''.main_p_character_market_buy.''; $charCostDrop = $drop_s_i[14]; };

$drop_item_info ='<table><tr valign=top><td style=padding-right:10px;><img src=system/engine_images/Class/'.$gclassfx.'.png></td><td>'.main_p_character_market_char.': <b>'.$drop_s_i[0].'</b><br>'.main_p_character_market_class.': <b>'.getClass($drop_s_i[7]).'</b><br>Zen ( '.main_p_character_market_money.' ): <b>'.$drop_s_i[5].'</b><br>'.main_p_character_market_level.': <b>'.$drop_s_i[1].'</b><br>'.main_p_character_market_resets.': <b>'.$drop_s_i[2].'</b><br>'.main_p_character_market_grabdress.': <b>'.$drop_s_i[3].'</b><br>'.main_p_character_market_mastergr.': <b>'.$drop_s_i[4].'</b><br>'.main_p_character_market_leveluppoint.': <b>'.$drop_s_i[6].'</b><br><br>'.main_p_character_market_trength.': <b>'.$drop_s_i[9].'</b><br>'.main_p_character_market_agility.': <b>'.$drop_s_i[10].'</b><br>'.main_p_character_market_vitality.': <b>'.$drop_s_i[11].'</b><br>'.main_p_character_market_energy.': <b>'.$drop_s_i[12].'</b><br>'.main_p_character_market_leadership.': <b>'.$drop_s_i[13].'</b><br><br><font color=yellow><b>'.main_p_character_market_cgaractercost.': '.$charCostDrop.' '.$CostName.'</b></font><br></td></tr><tr><td colspan=2 align=center>'.main_p_character_market_clictoshowhide.'</td></tr></table>';

echo '
	<tr onMouseover="ddrivetip(\''.$drop_item_info.'\')" onMouseout="hideddrivetip()" >
		<td><a href="#" onclick="getUserInventory(\''.$drop_s_i[0].'\'); return false;"><b>'.$drop_s_i[0].'</b></a></td>
		<td>'.getClass($drop_s_i[7]).'</td>
		<td>'.$charCostDrop.' '.$CostName.'</td>
		<td><form action="-id-Character_Market.html" method="POST"><input type="hidden" name="character_name" value="'.$drop_s_i[0].'"><button class="mvcore-button-style" name="buytakechar" type="submit">'.$testssDrop.'</button></form></td>
	</tr>
	<tr id="user_Inv_hiddentr'.$drop_s_i[0].'" style="display:none;">
		<td colspan="4" id="user_Inv_data'.$drop_s_i[0].'">
		</td>
	</tr>
';
}
?>
</table>
<script>
	function getUserInventory(userName) {
		$.post("acps.php", {
				getUserInventory: userName
			},
			function(data) {
				$('#user_Inv_hiddentr' + userName).toggle();
				if(data == '') {
					var charinvtext = '<?php echo main_p_character_market_charinvempty;?>';
					$('#user_Inv_data' + userName).html("<div>"+charinvtext+"</div>");
				} else {
					$('#user_Inv_data' + userName).html(data);
				}
				
			});
	}
</script>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>