
<?php if(!$mvcore['Castle_Siege_Register'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Castle_Siege_Register'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<?php

//== Post Start ==//
if(isset($_POST['sub_button'])) {

//== Post Procedure Select ==//
$guild_list		= trim(isset($_POST['guild_list']) ? $_POST['guild_list'] : '');
$sign_count		= trim(isset($_POST['sign_count']) ? $_POST['sign_count'] : '');

$errors = array();
$success = array();

//== Main Info Get Script ==// 
$useracc = $_SESSION['username']; // Get Loged In Username
//== End Script ==//

$select_cred_check= mssql_query("Select ".$mvcore['credits_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']."='".$useracc."'");
$s_c_check= mssql_fetch_row($select_cred_check); // Character Acc Who Sold Item

$get_guild_reg_c = mssql_query("SELECT COUNT(*) FROM MuCastle_REG_SIEGE where IS_GIVEUP = '0'");
$output_g_reg_c =mssql_result($get_guild_reg_c, 0, 0);

if($output_g_reg_c >= '1'){ $count_seq_num = $output_g_reg_c + 1; } else { $count_seq_num = 1; };

if($guild_list == '' ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_castle_guild_reg_chooseguildreg.'</div>'; };
if($s_c_check[0] < $mvcore['regs_cost'] ) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_castle_guild_reg_needmore.' '.$mvcore['money_name1'].' '.main_p_castle_guild_reg_regtoguild.'</div>'; };

$sql107s = mssql_query("SELECT Siege_End_Date From MuCastle_Data");
$acr8s = mssql_fetch_row($sql107s);
$acr8ss = strtotime($acr8s[0]) - 172800;

if($acr8ss < time()) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_castle_guild_reg_cantregsiegoneday.'</div>'; };

$select_check_muCastle= mssql_query("Select OWNER_GUILD from MuCastle_DATA");
$s_c_muc= mssql_fetch_row($select_check_muCastle);

if($s_c_muc[0] == $guild_list) { $has_error = '1'; echo'<div class="mvcore-nNote mvcore-nFailure">'.main_p_castle_guild_reg_yareownercastle.'</div>'; };

if($has_error >= '1'){} else {

//== Procedure Update Or Insert ==//
$edit_site = mssql_query("INSERT INTO MuCastle_REG_SIEGE (MAP_SVR_GROUP,REG_SIEGE_GUILD,REG_MARKS,IS_GIVEUP,SEQ_NUM) VALUES ('0','".$guild_list."','".$sign_count."','0','".$count_seq_num."')");
$run = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$mvcore['regs_cost']."' where ".$mvcore['user_column']." ='".$useracc."'");
//== End Script ==// 

//== Success MSG ==//
echo'<div class="mvcore-nNote mvcore-nSuccess">'.main_p_castle_guild_reg_guildsuccessreg.'</div>';}		
//== End Script ==// 
}
?>
<form action="" method="POST">
<table id="oht" class="mvcore-table" cellpadding="0" cellspacing="0">
	<tr align="center"><td colspan="2"><?php echo main_p_castle_guild_reg_registercost;?> <?php echo $mvcore['regs_cost'];?> <?php echo $mvcore['money_name1'];?></td></tr>
	<tr align="center">
		<td><?php echo main_p_castle_guild_reg_chooseguild;?></td>
		<td>
			<select name="guild_list" style=" width:370px; " class="mvcore-select-main">
				<option value=""> - </option>
				<?php
					$useracc = $_SESSION['username']; // Get username
					$sys_start = mssql_query("select name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name'].",money,LevelUpPoint,class,Inventory,MapNumber,PkLevel,strength,dexterity,vitality,energy,Leadership,accountid from character where AccountID = '".$useracc."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
					for($i=0;$i < mssql_num_rows($sys_start);++$i) {
					$drop_info = mssql_fetch_row($sys_start);

					$get_memb = mssql_query("select G_Name,G_Status from GuildMember where Name = '".$drop_info[0]."'");
					$output_memb = mssql_fetch_row($get_memb);
					
						if($output_memb[1] == '128'){
							echo'<option value="'.$output_memb[0].'">'.$output_memb[0].'</option>';
						};
						
					};
				?>
			</select>
		</td>
	</tr>
	<tr align="center">
		<td><?php echo main_p_castle_guild_reg_selectsigns;?></td>
		<td>
			<select name="sign_count" style=" width:370px; " class="mvcore-select-main">
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="30">30</option>
				<option value="40">40</option>
				<option value="50">50</option>
				<option value="60">60</option>
				<option value="70">70</option>
				<option value="80">80</option>
				<option value="90">90</option>
				<option value="100">100</option>
			</select>
		</td>
	</tr>
	
	<tr align="center">
		<td align="center" colspan="2" style="padding-top:10px;" ><button class="mvcore-button-style" style="cursor:pointer" name="sub_button" type="submit"><?php echo main_p_castle_guild_reg_registerguild;?></button></td>
	</tr>
</table>
</form>
<br>
<br>
<?php
	$useracc = $_SESSION['username']; // Get Loged In Username
	$guild_query = mssql_query("SELECT top ".$mvcore['top_select']." REG_SIEGE_GUILD,REG_MARKS from MuCastle_REG_SIEGE order by SEQ_NUM desc");
	$row = mssql_fetch_row($guild_query);
	if($row[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_castle_guild_reg_listisempty.'</div>'; } else {
?>

					<table class="mvcore-table" cellpadding="0" cellspacing="0">
						<tr class="mvcore-tabletr">
							<td>#</td>
							<td><?php echo main_p_castle_guild_reg_guildname;?></td>
							<td><?php echo main_p_castle_guild_reg_master;?></td>
							<td><?php echo main_p_castle_guild_reg_signs;?></td>
						</tr>	
					<?PHP

					$Get_GName = clean_variable($_GET['op2']);

					$guild_query = mssql_query("SELECT top ".$mvcore['top_select']." REG_SIEGE_GUILD,REG_MARKS from MuCastle_REG_SIEGE order by SEQ_NUM desc");
					for($i=0;$i < mssql_num_rows($guild_query);++$i) {
					$row = mssql_fetch_row($guild_query);

					$get_membs = mssql_query("select G_Master from Guild where G_Name = '".$row[0]."'");
					$output_membs = mssql_fetch_row($get_membs);

					$rank = $i+1;
					echo "

								<tr style='border-collapse: collapse; border-spacing: 0px;'>
								<td style='padding: 6px 3px 6px 3px;'>$rank</td>
								<td style='padding:0;'>$row[0]</td>
								<td style='padding:0;'><a href='-id-character_view-id-$output_membs[0].html'>$output_membs[0]</a></td>
								<td style='padding:0;'>$row[1]</td>
								</tr>

					";
					}
					?>
					</table>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>