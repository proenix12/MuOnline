
<?php if(!$mvcore['Banned_Players'] == 'on') { echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>'; } ?>
<?php if($mvcore['Banned_Players'] == 'on') { ?>
<?php
	$banned_ppl = mssql_query("SELECT name,type,reason,banned_by,unban_date from MVCore_Banned_PPL");
	$bannedd_ppl_drop = mssql_fetch_row($banned_ppl);
	if($bannedd_ppl_drop[0] == '') { echo'<div class="mvcore-nNote mvcore-nInformation">'.main_p_banned_users_listempty.'</div>'; } else {
?>
<table class="mvcore-table" cellpadding="0" cellspacing="0">
	<tbody><tr class="mvcore-tabletr">
		<td><?php echo main_p_banned_users_name;?></td>
		<td><?php echo main_p_banned_users_type;?></td>
		<td><?php echo main_p_banned_users_reason;?></td>
		<td><?php echo main_p_banned_users_by;?></td>
		<td><?php echo main_p_banned_users_unban;?></td>
	</tr>
<?PHP

$banned_ppl = mssql_query("SELECT name,type,reason,banned_by,unban_date from MVCore_Banned_PPL");
for($i=0;$i < mssql_num_rows($banned_ppl);++$i) {
$banned_ppl_drop = mssql_fetch_row($banned_ppl);
$banned_ppl_num = mssql_num_rows($banned_ppl);

if($banned_ppl_drop[1] == '0'){ $ban_type=''.main_p_banned_users_character.''; } elseif($banned_ppl_drop[1] == '1') { $ban_type=''.main_p_banned_users_account.''; } elseif($banned_ppl_drop[1] == '2') { $ban_type='BFW'; };

if($banned_ppl_drop[4] == '0') { $decode_date = ''.main_p_banned_users_permanentban.''; } else {$decode_date = decode_time(time(),$banned_ppl_drop[4],'short',''.main_p_banned_users_unbaned.''); };

$fix_timestamp = ''.$banned_ppl_drop[4].'000';
echo "

	<tr style='border-collapse: collapse; border-spacing: 0px;'>
		<td style='padding: 6px 3px 6px 3px;color:red;'>$banned_ppl_drop[0]</td>
		<td style='padding:0;'>$ban_type</td>
		<td style='padding:0;'><u>$banned_ppl_drop[2]</u></td>
		<td style='padding:0;'>$banned_ppl_drop[3]</td>
		<td style='padding:0;'>$decode_date</td>
	</tr>

";
}
?>
</table>
<?php } ?>
<?php } ?>