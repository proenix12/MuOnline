
<?php if(!$mvcore['Friend_System'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Friend_System'] == 'on') { ?>
	<?php if($_SESSION['user_login'] == 'ok') { ?>
<center>
	<div style="font-size:20px;"><b><?php echo main_p_friend_sys_wish_to_earn; ?> <?php echo $mvcore['money_name1']; ?> <?php echo main_p_friend_sys_invfriends; ?></b></div>
	<div><b><?php echo main_p_friend_sys_simplecopyLINK; ?></b></div>
			<?php
					echo''.main_p_friend_sys_link.': <input class="mvcore-input-main" readonly="readonly" type="text" value="'.$mvcore['surl'].'/-id-Register-id-'.$_SESSION['username'].'.html">';
			?>
	<br>
	<br>
	<div><b><?php echo main_p_friend_sys_regfriendwhousedLink; ?> <font color="#808080"><?php echo $mvcore['friend_sys_reward']; ?> <?php echo $mvcore['money_name1']; ?></font> <?php echo main_p_friend_sys_refroeinvget; ?> <font color="#808080"><?php echo $mvcore['friend_sys_inv_rew']; ?> <?php echo $mvcore['money_name1']; ?></font></b></div>
	<div><b><?php echo main_p_friend_sys_ycanmaxinv; ?> <?php echo $mvcore['friend_sys_limit']; ?> <?php echo main_p_friend_sys_friendgiveurlhtem; ?></b></div>
<br>
<?php
	$useracc = $_SESSION['username']; // Get Loged In Username
	$guild_query = mssql_query("SELECT top 15 friend_uid,to_who_uid,date from MVCore_Friend_List where to_who_uid = '".$useracc."' order by date desc");
	$rosw = mssql_fetch_row($guild_query);
	if($rosw[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_friend_sys_frindListEmpty.'</div>'; } else {
?>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td><?php echo main_p_friend_sys_top; ?> <?php echo $mvcore['friend_sys_limit'];?></td>
		<td><?php echo main_p_friend_sys_frienUser; ?></td>
		<?php if($mvcore['friend_sys_level_tgw'] == ''){} else { ?><td><?php echo ucp_level; ?></td><?php } ?>
		<?php if($mvcore['friend_sys_reset_tgw'] == ''){} else { ?><td><?php echo ucp_resets; ?></td><?php } ?>
		<td><?php echo main_p_friend_sys_date; ?></td>
		<td><?php echo main_p_friend_sys_rewstatsg; ?></td>
	</tr>
<?PHP
$useracc = $_SESSION['username']; // Get Loged In Username
$guild_query = mssql_query("SELECT top ".$mvcore['friend_sys_limit']." friend_uid,to_who_uid,date,friend_rewarded from MVCore_Friend_List where to_who_uid = '".$useracc."' order by date desc");
for($i=0;$i < mssql_num_rows($guild_query);++$i) {
$row = mssql_fetch_row($guild_query);

$sys_startads = mssql_query("select top 1 name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name']." from character where AccountID = '".$row[0]."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
$drop_infdso = mssql_fetch_row($sys_startads);


$time_left = gmdate("F j, Y h:m:s", $row[2]);

$rank = $i+1;

if($mvcore['friend_sys_level_tgw'] == ''){ $addtdta_level = ''; } else { $addtdta_level = '<td style="padding: 5px 5px 5px 5px;"><b>'.$drop_infdso[1].' / '.$mvcore['friend_sys_level_tgw'].'</b></td>'; if($drop_infdso[1] == '') { $addtdta_level = '<td style="padding: 5px 5px 5px 5px;">-</td>'; }; };
if($mvcore['friend_sys_reset_tgw'] == ''){ $addtdta_resets = ''; } else { $addtdta_resets = '<td style="padding: 5px 5px 5px 5px;"><b>'.$drop_infdso[2].' / '.$mvcore['friend_sys_reset_tgw'].'</b></td>'; if($drop_infdso[2] == '') { $addtdta_resets = '<td style="padding: 5px 5px 5px 5px;">-</td>'; }; };
	
if($row[3] == 1) { $uerrewd = '<b><font color="green">Rewards Recived</font></b>'; } else { $uerrewd = '<b><font color="red">Rewards NOT Recived</font></b>'; };
	
$tr_color_2 = "even2"; 
$tr_color_1 = "even";
$tr_color = ($rank % 2) ? $tr_color_1 : $tr_color_2;
echo '

	<tr align="center">
		<td style="padding: 5px 5px 5px 5px;">'.$rank.'</td>
		<td style="padding: 5px 5px 5px 5px;"><b>'.$row[0].'</b></td>
		'.$addtdta_level.'
		'.$addtdta_resets.'
		<td style="padding: 5px 5px 5px 5px;">'.$time_left.'</td>
		<td style="padding: 5px 5px 5px 5px;"><b>'.$uerrewd.'</b></td>
	</tr>

';
}
?>
</table>
</center>
<?php } ?>
	<?php } else { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_please_ltut_page.'</div>'; }; ?>
<?php } ?>