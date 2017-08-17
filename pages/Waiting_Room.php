
<?php if(!$mvcore['Waiting_Room'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Waiting_Room'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<div style="font-size:20px;" align="left"><table width="100%"><tr><td align="left"><?php echo''; ?></td><td align="right"><a href="-id-Game_Panel.html"><?php echo'Back To Game Panel'; ?></a></td></tr></table></div>
<div><?php echo main_p_waiting_room_charwaitroom; ?></div>
<div><?php echo main_p_waiting_room_choosechargameused; ?><br> <?php echo main_p_waiting_room_eptyslotcreate; ?></div>
<br>
<div id="charslotselect">
			<?php
				$check_onlinesd = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$_SESSION['username']."'");
				$check_onlinessd = mssql_fetch_row($check_onlinesd);
				if( $check_onlinessd[0] == '0' || $check_onlinessd[0] == '' ) {
			?>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr class="mvcore-table-disabled-td" align="center">
		<td ><?php echo main_p_waiting_room_charslot; ?> 1</td>
		<td >
			<select id="ch_slot_1" name="ch_slot_1" style=" width:370px; " class="mvcore-select-main">
			<div id="slot_opt_1" >
				<?php
					$useracc = $_SESSION['username']; // Get username
					
					$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
					$check_onlines = mssql_fetch_row($check_online);
					if( $check_onlines[0] == '1' ) { echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>'; } else {

					$act_char = mssql_query("select name,accountid from character where AccountID = '".$useracc."'");
					$act_char_if = mssql_fetch_row($act_char);
					$chars_selected = mssql_query("select GameID1,GameID2,GameID3,GameID4,GameID5 from AccountCharacter where ID = '".$useracc."'");
					$cselc_output = mssql_fetch_row($chars_selected);
					$act_char_for = mssql_query("select name,Active_char,accountid from character where AccountID = '".$useracc."'");
						if($cselc_output[0] == '') {
							echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_info = mssql_fetch_row($act_char_for);
								if($cselc_output[1] == $act_char_info[0] || $cselc_output[2] == $act_char_info[0] || $cselc_output[3] == $act_char_info[0] || $cselc_output[4] == $act_char_info[0]) {} else {
									echo'<option value="'.$act_char_info[0].'">'.$act_char_info[0].'</option>';
								}
							};
						} else {
							echo'<option value="0"> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_infod = mssql_fetch_row($act_char_for);
								if($cselc_output[0] == $act_char_infod[0]) { $opt_selecteds = 'selected'; } else { $opt_selecteds = ''; };
								if($cselc_output[1] == $act_char_infod[0] || $cselc_output[2] == $act_char_infod[0] || $cselc_output[3] == $act_char_infod[0] || $cselc_output[4] == $act_char_infod[0]) {} else {
									echo'<option value="'.$act_char_infod[0].'" '.$opt_selecteds.'>'.$act_char_infod[0].'</option>';
								}
							};
						}
					};
				?>
			</div>
			</select>
		</td>
	</tr>
	<tr class="mvcore-table-disabled-td" align="center">
		<td ><?php echo main_p_waiting_room_charslot; ?> 2</td>
		<td >
			<select id="ch_slot_2" name="ch_slot_2" style=" width:370px; " class="mvcore-select-main">
			<div id="slot_opt_2" >
				<?php
					$useracc = $_SESSION['username']; // Get username
					
					$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
					$check_onlines = mssql_fetch_row($check_online);
					if( $check_onlines[0] == '1' ) { echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>'; } else {
						
					$act_char = mssql_query("select name,accountid from character where AccountID = '".$useracc."'");
					$act_char_if = mssql_fetch_row($act_char);
					$chars_selected = mssql_query("select GameID2,GameID1,GameID3,GameID4,GameID5 from AccountCharacter where ID = '".$useracc."'");
					$cselc_output = mssql_fetch_row($chars_selected);
					$act_char_for = mssql_query("select name,Active_char,accountid from character where AccountID = '".$useracc."'");
						if($cselc_output[0] == '') {
							echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_info = mssql_fetch_row($act_char_for);
								if($cselc_output[1] == $act_char_info[0] || $cselc_output[2] == $act_char_info[0] || $cselc_output[3] == $act_char_info[0] || $cselc_output[4] == $act_char_info[0]) {} else {
									echo'<option value="'.$act_char_info[0].'">'.$act_char_info[0].'</option>';
								}
							};
						} else {
							echo'<option value="0"> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_infod = mssql_fetch_row($act_char_for);
								if($cselc_output[0] == $act_char_infod[0]) { $opt_selectedswq = 'selected'; } else { $opt_selectedswq = ''; };
								if($cselc_output[1] == $act_char_infod[0] || $cselc_output[2] == $act_char_infod[0] || $cselc_output[3] == $act_char_infod[0] || $cselc_output[4] == $act_char_infod[0]) {} else {
									echo'<option value="'.$act_char_infod[0].'" '.$opt_selectedswq.'>'.$act_char_infod[0].'</option>';
								}
							};
						}
					};
				?>
			</div>
			</select>
		</td>
	</tr>
	<tr class="mvcore-table-disabled-td" align="center">
		<td ><?php echo main_p_waiting_room_charslot; ?> 3</td>
		<td >
			<select id="ch_slot_3" name="ch_slot_3" style=" width:370px; " class="mvcore-select-main">
			<div id="slot_opt_3" >
				<?php
					$useracc = $_SESSION['username']; // Get username
					
					$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
					$check_onlines = mssql_fetch_row($check_online);
					if( $check_onlines[0] == '1' ) { echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>'; } else {
						
					$act_char = mssql_query("select name,accountid from character where AccountID = '".$useracc."'");
					$act_char_if = mssql_fetch_row($act_char);
					$chars_selected = mssql_query("select GameID3,GameID1,GameID2,GameID4,GameID5 from AccountCharacter where ID = '".$useracc."'");
					$cselc_output = mssql_fetch_row($chars_selected);
					$act_char_for = mssql_query("select name,Active_char,accountid from character where AccountID = '".$useracc."'");
						if($cselc_output[0] == '') {
							echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_info = mssql_fetch_row($act_char_for);
								if($cselc_output[1] == $act_char_info[0] || $cselc_output[2] == $act_char_info[0] || $cselc_output[3] == $act_char_info[0] || $cselc_output[4] == $act_char_info[0]) {} else {
									echo'<option value="'.$act_char_info[0].'">'.$act_char_info[0].'</option>';
								}
							};
						} else {
							echo'<option value="0"> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_infod = mssql_fetch_row($act_char_for);
								if($cselc_output[0] == $act_char_infod[0]) { $opt_selectedswq = 'selected'; } else { $opt_selectedswq = ''; };
								if($cselc_output[1] == $act_char_infod[0] || $cselc_output[2] == $act_char_infod[0] || $cselc_output[3] == $act_char_infod[0] || $cselc_output[4] == $act_char_infod[0]) {} else {
									echo'<option value="'.$act_char_infod[0].'" '.$opt_selectedswq.'>'.$act_char_infod[0].'</option>';
								}
							};
						}
					};
				?>
			</div>
			</select>
		</td>
	</tr>
	<tr class="mvcore-table-disabled-td" align="center">
		<td ><?php echo main_p_waiting_room_charslot; ?> 4</td>
		<td >
			<select id="ch_slot_4" name="ch_slot_4" style=" width:370px; " class="mvcore-select-main">
			<div id="slot_opt_4" >
				<?php
					$useracc = $_SESSION['username']; // Get username
					
					$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
					$check_onlines = mssql_fetch_row($check_online);
					if( $check_onlines[0] == '1' ) { echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>'; } else {
						
					$act_char = mssql_query("select name,accountid from character where AccountID = '".$useracc."'");
					$act_char_if = mssql_fetch_row($act_char);
					$chars_selected = mssql_query("select GameID4,GameID1,GameID2,GameID3,GameID5 from AccountCharacter where ID = '".$useracc."'");
					$cselc_output = mssql_fetch_row($chars_selected);
					$act_char_for = mssql_query("select name,Active_char,accountid from character where AccountID = '".$useracc."'");
						if($cselc_output[0] == '') {
							echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_info = mssql_fetch_row($act_char_for);
								if($cselc_output[1] == $act_char_info[0] || $cselc_output[2] == $act_char_info[0] || $cselc_output[3] == $act_char_info[0] || $cselc_output[4] == $act_char_info[0]) {} else {
									echo'<option value="'.$act_char_info[0].'">'.$act_char_info[0].'</option>';
								}
							};
						} else {
							echo'<option value="0"> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_infod = mssql_fetch_row($act_char_for);
								if($cselc_output[0] == $act_char_infod[0]) { $opt_selectedswq = 'selected'; } else { $opt_selectedswq = ''; };
								if($cselc_output[1] == $act_char_infod[0] || $cselc_output[2] == $act_char_infod[0] || $cselc_output[3] == $act_char_infod[0] || $cselc_output[4] == $act_char_infod[0]) {} else {
									echo'<option value="'.$act_char_infod[0].'" '.$opt_selectedswq.'>'.$act_char_infod[0].'</option>';
								}	
							};
						}
					};
				?>
			</div>
			</select>
		</td>
	</tr>
	<tr class="mvcore-table-disabled-td" align="center">
		<td ><?php echo main_p_waiting_room_charslot; ?> 5</td>
		<td >
			<select id="ch_slot_5" name="ch_slot_5" style=" width:370px; " class="mvcore-select-main">
			<div id="slot_opt_5" >
				<?php
					$useracc = $_SESSION['username']; // Get username
					
					$check_online = mssql_query("Select ConnectStat from ".$mvcore_medb_s." where memb___id='".$useracc."'");
					$check_onlines = mssql_fetch_row($check_online);
					if( $check_onlines[0] == '1' ) { echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>'; } else {
						
					$act_char = mssql_query("select name,accountid from character where AccountID = '".$useracc."'");
					$act_char_if = mssql_fetch_row($act_char);
					$chars_selected = mssql_query("select GameID5,GameID1,GameID2,GameID3,GameID4 from AccountCharacter where ID = '".$useracc."'");
					$cselc_output = mssql_fetch_row($chars_selected);
					$act_char_for = mssql_query("select name,Active_char,accountid from character where AccountID = '".$useracc."'");
						if($cselc_output[0] == '') {
							echo'<option value="0" selected> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_info = mssql_fetch_row($act_char_for);
								if($cselc_output[1] == $act_char_info[0] || $cselc_output[2] == $act_char_info[0] || $cselc_output[3] == $act_char_info[0] || $cselc_output[4] == $act_char_info[0]) {} else {
									echo'<option value="'.$act_char_info[0].'">'.$act_char_info[0].'</option>';
								}
							};
						} else {
							echo'<option value="0"> - '.main_p_waiting_room_emptyslot.' - </option>';
							for($i=0;$i < mssql_num_rows($act_char_for);++$i) {
							$act_char_infod = mssql_fetch_row($act_char_for);
								if($cselc_output[0] == $act_char_infod[0]) { $opt_selectedswq = 'selected'; } else { $opt_selectedswq = ''; };
								if($cselc_output[1] == $act_char_infod[0] || $cselc_output[2] == $act_char_infod[0] || $cselc_output[3] == $act_char_infod[0] || $cselc_output[4] == $act_char_infod[0]) {} else {
									echo'<option value="'.$act_char_infod[0].'" '.$opt_selectedswq.'>'.$act_char_infod[0].'</option>';
								}	
							};
						}
					};
				?>
			</div>
			</select>
		</td>
	</tr>
</table>
			<?php
				} else { echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_waiting_room_exitgamebefore.'</div>'; }
			?>
</div>
<br>
<br>
<?php
	$CharacterCount = mssql_query("select count(*) from character where AccountID = '".$useracc."'");
	$CharacterCountOut =mssql_result($CharacterCount, 0, 0);
?>
<div style="text-align:center;"><?php echo main_p_waiting_room_youhave;?> <?php echo $CharacterCountOut;?> <?php echo main_p_waiting_room_character;?></div>
<div><?php echo main_p_waiting_room_characrerinformation;?></div>
<?php


echo'
	<table class="mvcore-table" cellpadding="0" cellspacing="0">
		<tbody><tr class="mvcore-tabletr">
			<td>'.main_p_waiting_room_name.'</td>
			<td>'.main_p_waiting_room_class.'</td>
			<td>'.main_p_waiting_room_lvl.'</td>
			<td>'.main_p_waiting_room_rr.'</td>
			<td>'.main_p_waiting_room_gr.'</td>
			<td>'.main_p_waiting_room_mgr.'</td>
		</tr>
';

$useracc = $_SESSION['username']; // Get username
$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid,m_Grand_Resets from character where AccountID = '".$useracc."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
for($i=0;$i < mssql_num_rows($sys_start);++$i) {
$drop_info = mssql_fetch_row($sys_start);

if($mvcore['market_credits_sell'] == '1'){$cred_sell = '<option value="1">'.$mvcore['money_name1'].'</option>';};
if($mvcore['market_credits2_sell'] == '1'){$cred2_sell = '<option value="4">'.$mvcore['money_name2'].'</option>';};

		echo'
			<tr>
				<td><a href="-id-character_view-id-'.$drop_info[0].'.html"><b>'.$drop_info[0].'</b></a></td>
				<td>'.getClass($drop_info[6]).'</td>
				<td>'.$drop_info[1].' lvl</td>
				<td>'.$drop_info[2].' rr</td>
				<td>'.$drop_info[3].' gr</td>
				<td>'.$drop_info[16].' mgr</td>
			</tr>
		';
};
?>
</table>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>
<script>
$(document).ready(function() {
	
	$( "#charslotselect" ).on('change', function() {
		
		var getAllValues = 
		$("#ch_slot_1").val()+"-ids-"
		+$("#ch_slot_2").val()+"-ids-"
		+$("#ch_slot_3").val()+"-ids-"
		+$("#ch_slot_4").val()+"-ids-"
		+$("#ch_slot_5").val();
			$.post("acps.php", {
				charslotselect: getAllValues
			},
			function(data) {
				
				history.go(0);
				location.reload();

			});
				
	});
	
});
</script>