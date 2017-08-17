<?php
	if($_GET['op2'] == 'er1') {
		echo '<div class="mvcore-nNote mvcore-nFailure">'.login_error_forgot.'</div>';
	};
	if($_GET['op2'] == 'er2') {
		echo '<div class="mvcore-nNote mvcore-nFailure">'.login_error_incorrect.'</div>';
	};
?>
<form action="" method="POST">
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<?php
if($mvcore['multi_dbs_supp'] == 'on' && $mvcore['multi_dbs_app_t_sw'] == 'swsbl') {
		echo '<tr align="center"><td>Server </td><td><select name="database_load" class="mvcore-select-main">';
		$cmulti_dbs = explode(',',$mvcore['multi_dbs_names']);
		$cmulti_dbs_titl = explode(',',$mvcore['multi_dbs_titlen']);
		for($i=0;$i < count($cmulti_dbs);++$i) {
			if($_SESSION['database_load']==$cmulti_dbs[$i]){ $opdsvgf[$i] = 'selected'; }else{ $opdsvgf[$i] = ''; };
			echo '<option value="'.$cmulti_dbs[$i].'" '.$opdsvgf[$i].'>'.$cmulti_dbs_titl[$i].'</option>';
		};
		echo '</select></td></tr>';
}
?>
	<tr align="center">
		<td><?php echo main_p_user_login_username;?></td>
		<td><input type="text" name="usern" class="mvcore-input-main" value=""></td>
	</tr>
	
	<tr align="center">
		<td><?php echo main_p_user_login_password;?></td>
		<td><input type="password" name="passn" class="mvcore-input-main" value=""></td>
	</tr>
	
	<tr align="center">
		<td colspan="2" align="center" style="padding-top:10px;"><button class="mvcore-button-style" name="loginacc" style="cursor:pointer" type="submit"><?php echo main_p_user_login_login; ?></button></td>
	</tr>
</table>
</form>