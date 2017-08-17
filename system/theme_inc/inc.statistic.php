
<?PHP
$sql100 = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." WHERE ConnectStat = '1'");
$stmt = $sql100->execute();
$stmt = $sql100->fetchALL(PDO::FETCH_BOTH);
$acr1 = count($stmt);
//print '<pre>'; print_r($stmt); print '</pre>';

$sql101 = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_i."");
$stmt = $sql101->execute();
$stmt = $sql101->fetchAll(PDO::FETCH_BOTH);
$acr2 = count($stmt);

$sql102 = $mvcorex->prepare("SELECT Name FROM Character");
$stmt = $sql102->execute();
$stmt = $sql102->fetchAll();
$acr3 = count($stmt);

$sql103 = $mvcorex->prepare("SELECT * FROM Guild");
$stmt = $sql103->execute();
$stmt = $sql103->fetchAll(PDO::FETCH_BOTH);
$acr4 = count($stmt);

$sql104 = $mvcorex->prepare("SELECT * FROM Character WHERE CtlCode = '32'");
$stmt = $sql104->execute();
$stmt = $sql104->fetchAll(PDO::FETCH_BOTH);
$acr5 = count($stmt);

$sql105 = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." WHERE ConnectStat = '1'");
$stmt = $sql105->execute();
$stmt = $sql105->fetchAll(PDO::FETCH_BOTH);
$total['online'] = count($stmt);

$month_today = date("M", time());
$day_today  = date("j", time());
$year_today  = date("Y", time());

$query   = $mvcorex->prepare("SELECT count(*) FROM ".$mvcore_medb_s." WHERE ConnectTM LIKE '%".$month_today."%"
    .$day_today."%".$year_today."%' OR DisConnectTM LIKE '%".$month_today."%".$day_today."%".$year_today."%'");
$stmt = $query->execute();
$stmt = $query->fetchAll();
$online_today = count($stmt);

$sql = $mvcorex->prepare("SELECT count(*) FROM ".$mvcore_medb_s." WHERE ConnectStat = 1");
$stmt = $sql->execute();
$stmt = $sql->fetchAll(PDO::FETCH_BOTH);

?>
<div width="100%" align="center">
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_total_accounts.'';?></td>
				<td style="float:right;padding-right:15px;"><?php echo $acr2;?></td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_total_characters.'';?></td>
				<td style="float:right;padding-right:15px;"><?php echo $acr3;?></td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_total_guilds.'';?></td>
				<td style="float:right;padding-right:15px;"><?php echo $acr4;?></td>
			</tr>
		</table>
	</div>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_total_gmasters.'';?></td>
				<td style="float:right;padding-right:15px;"><?php echo $acr5;?></td>
			</tr>
		</table>
	</div>
	<?php if($mvcore['onoff_player_count'] == 'show') { ?>
		<div class="latest-twitter-tweett">
			<table width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-left:15px;"><?php echo''.theme_inc_players_online.'';?></td>
					<td style="float:right;padding-right:15px;color:green;"><?php echo $acr1; ?></td>
				</tr>
			</table>
		</div>
	<?php } ?>
	<div class="latest-twitter-tweett">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-left:15px;"><?php echo''.theme_inc_today_active.'';?></td>
				<td style="float:right;padding-right:15px;color:red;"><?php echo $online_today;?></td>
			</tr>
		</table>
	</div>
</div>
