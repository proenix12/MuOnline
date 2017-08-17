
<?php if(!$mvcore['Statistics'] == 'on') {
    echo'<div class="mvcore-nNote mvcore-nFailure">'.eng_for_the_moment_tpi_disabled.'</div>';

} ?>
<?php if($mvcore['Statistics'] == 'on') { ?>
<?PHP

$sql100 = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." WHERE ConnectStat = :data");
$stmt = $sql100->execute( array('data' => 1) );
$stmt = $sql100->fetchAll();
$acr1 = count($stmt);

$sql101 = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_i."");
$stmt = $sql101->execute();
$stmt = $sql101->fetchAll();
$acr2 = count($stmt);

$sql102 = $mvcorex->prepare("SELECT Name FROM Character");
$stmt = $sql102->execute();
$stmt = $sql102->fetchAll();
$acr3 = count($stmt);

$sql103 = $mvcorex->prepare("SELECT G_Name FROM Guild WHERE G_Name = G_Name");
$stmt = $sql103->execute();
$stmt = $sql103->fetchAll();
$acr4 = count($stmt);

$sql104 = $mvcorex->prepare("SELECT Name FROM Character WHERE CtlCode = :data");
$stmt = $sql104->execute( array('data'=> 32) );
$stmt = $sql104->fetchAll();
$acr5 = count($stmt);

$sql105 = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." WHERE ConnectStat = :data");
$stmt = $sql104->execute( array( 'data' => 1) );
$stmt = $sql105->fetchAll();
$total['online']= count($stmt);

$month_today = date("M", time());
$day_today  = date("j", time());
$year_today  = date("Y", time());
$query   = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." 
WHERE ConnectTM LIKE '%".$month_today."%".$day_today."%" .$year_today."%' 
OR DisConnectTM LIKE '%".$month_today."%".$day_today."%".$year_today."%'"
);
$stmt = $query->execute();
$stmt = $query->fetchAll();
$online_today = count($stmt);

$sql = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." WHERE ConnectStat = :data");
$stmt = $sql->execute( array('data' => 1) );
$stmt = $sql->fetchAll();
$sql = $stmt;


$sql106 = $mvcorex->prepare("SELECT Owner_Guild FROM MuCastle_Data");
$stmt = $sql106->execute();
$stmt = $sql106->fetch();
$acr7 = $stmt;

$sql107 = $mvcorex->prepare("SELECT Siege_End_Date From MuCastle_Data");
$stmt = $sql107->execute();
$stmt = $sql107->fetch();
$acr8 = $stmt;
$acr8s = strtotime($acr8[0]) - 86400;

$sql108 = $mvcorex->prepare("SELECT G_Master FROM Guild WHERE G_Name = :data");
$stmt = $sql108->execute( array('data' => $acr7[0]));
$stmt = $sql108->fetch();
$acr9 = $stmt;

$Crywolfs = $mvcorex->prepare("SELECT CRYWOLF_OCCUFY FROM MuCrywolf_DATA WHERE MAP_SVR_GROUP = :data");
$stmt = $Crywolfs->execute( array('data' => 0));
$stmt = $Crywolfs->fetch();
$Crywolfs_Drop = $stmt;

if($Crywolfs_Drop[1] >= '1') {
    $dropStated = '<div color="green">'.main_p_statistics_protected.'</div>';

} else {
    $dropStated = '<div color="red">'.main_p_statistics_notprotected.'</div>';

};


$points_totak_vaneter = $mvcorex->prepare("SELECT sum(cast(".$mvcore['gens_contricol_name']." AS integer)) AS TotalVaneter FROM ".$mvcore['gens_tab_name']." WHERE ".$mvcore['gens_famicol_name']." = '2'");
$stmt = $points_totak_vaneter->execute();
$stmt = $points_totak_vaneter->fetchAll();
$points_totak_vaneter = $stmt;
print_r($points_totak_vaneter);

$points_totak_duprain = $mvcorex->prepare("SELECT sum(cast(".$mvcore['gens_contricol_name']." AS integer)) AS TotalDuprain FROM ".$mvcore['gens_tab_name']." WHERE ".$mvcore['gens_famicol_name']." = '1'");
$stmt = $points_totak_duprain->execute();
$stmt = $points_totak_duprain->fetchAll();
$points_totak_duprain = $stmt;

$total_vanert =  $mvcorex->prepare("SELECT * FROM ".$mvcore['gens_tab_name']." WHERE ".$mvcore['gens_famicol_name']." = '2'");
$stmt = $total_vanert->execute();
$stmt = $total_vanert->fetchAll();
$sVener = count($stmt);

$total_duprian =  $mvcorex->prepare("SELECT * FROM ".$mvcore['gens_tab_name']." WHERE ".$mvcore['gens_famicol_name']." = '1'");
$stmt = $total_duprian->execute();
$stmt = $total_duprian->fetchAll();
$sDupri = count($stmt);

if($sDupri == '0') {
    $durpriDropPoints = '0';

} else {
    $durpriDropPoints = $points_totak_duprain[0];

};
if($sVener == '0') {
    $venriDropPoints = '0';

} else {
    $venriDropPoints = $points_totak_vaneter[0];

};


//Class Count Information
$class0 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '0'"); // DW
$stmt = $class0->execute();
$stmt = $class0->fetchAll();
$classD0 = count($stmt);

$class1 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '1'"); // SM
    $stmt = $class1->execute();
    $stmt = $class1->fetchAll();
$classD1 = count($stmt);

$class2 = $mvcorex->prepare("SELECT Name FROM Character WHERE class >= '2' and class <= '3'"); // GM
    $stmt = $class2->execute();
    $stmt = $class2->fetchAll();
$classD2 = count($stmt);


$class16 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '16'"); // DK
    $stmt = $class16->execute();
    $stmt = $class16->fetchAll();
$classD16 = count($stmt);

$class17 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '17'"); // BK
    $stmt = $class17->execute();
    $stmt = $class17->fetchAll();
$classD17 = count($stmt);

$class18 = $mvcorex->prepare("SELECT Name FROM Character WHERE class >= '18' and class <= '19'"); // BM
    $stmt = $class18->execute();
    $stmt = $class18->fetchAll();
$classD18 = count($stmt);


$class32 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '32'"); // Elf
    $stmt = $class32->execute();
    $stmt = $class32->fetchAll();
$classD32 = count($stmt);

$class33 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '33'"); // Muse Elf
    $stmt = $class33->execute();
    $stmt = $class33->fetchAll();
$classD33 = count($stmt);

$class34 = $mvcorex->prepare("SELECT Name FROM Character WHERE class >= '34' and class <= '35'"); // Hight Elf
    $stmt = $class34->execute();
    $stmt = $class34->fetchAll();
$classD34 = count($stmt);


$class48 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '48'"); // MG
    $stmt = $class48->execute();
    $stmt = $class48->fetchAll();
$classD48 = count($stmt);

$class49 = $mvcorex->prepare("SELECT Name FROM Character WHERE class >= '49' and class <= '51'"); // DM
    $stmt = $class49->execute();
    $stmt = $class49->fetchAll();
$classD49 = count($stmt);


$class64 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '64'"); // DL
    $stmt = $class64->execute();
    $stmt = $class64->fetchAll();
$classD64 = count($stmt);

$class65 = $mvcorex->prepare("SELECT Name FROM Character WHERE class >= '65' and class <= '67'"); // LE
    $stmt = $class65->execute();
    $stmt = $class65->fetchAll();
$classD65 =count($stmt);


$class80 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '80'"); // Sum
    $stmt = $class80->execute();
    $stmt = $class80->fetchAll();
$classD80 = count($stmt);

$class81 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '81'"); // Bloody Sum
    $stmt = $class81->execute();
    $stmt = $class81->fetchAll();
$classD81 = count($stmt);

$class82 = $mvcorex->prepare("SELECT Name FROM Character WHERE class >= '82' and class <= '83'"); // Dimension Master
    $stmt = $class82->execute();
    $stmt = $class82->fetchAll();
$classD82 = count($stmt);


$class96 = $mvcorex->prepare("SELECT Name FROM Character WHERE class = '96'"); // RF
    $stmt = $class96->execute();
    $stmt = $class96->fetchAll();
$classD96 = count($stmt);

$class97 = $mvcorex->prepare("SELECT Name FROM Character WHERE class >= '97' and class <= '98'"); // FM
    $stmt = $class97->execute();
    $stmt = $class97->fetchAll();
$classD97 = count($stmt);


$class112 = $mvcorex->prepare("SELECT Name FROM Character WHERE class >= '112' and class <= '114'"); // GL
    $stmt = $class112->execute();
    $stmt = $class112->fetchAll();
$classD112 = count($stmt);

?>
<?php if( $mvcore['db_season'] >= '6') { ?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr width="100%" align="center">
		<td><img src="system/engine_images/gens/family.png" alt="duprian"></td>
	</tr>
</table>
<table class="mvcore-tablestat" width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr width="100%" align="center">
		<td colspan="4"><?php echo main_p_statistics_gensfamilypoints;?></td>
	</tr>
	<tr width="100%" align="center">
			<td><img src="system/engine_images/gens/DupriansFamily.png"></td>
		<td><?php echo main_p_statistics_members;?>: <?php echo $sDupri;?> <br> <?php echo main_p_statistics_points;?>: <?php echo $durpriDropPoints;?></td>
			<td><img src="system/engine_images/gens/StewardsFamily.png"></td>
		<td><?php echo main_p_statistics_members;?>: <?php echo $sVener;?><br><?php echo main_p_statistics_points;?>: <?php echo $venriDropPoints;?></td>
	</tr>
</table>
<br>
<br>
<?php } ?>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td colspan="2"><?php echo main_p_statistics_serverinfo;?></td>
	</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_maxstat;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $mvcore['server_max_stat'];?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_maxskslot;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $mvcore['max_sock_opt'];?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalacc;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $acr2;?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalchar;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $acr3;?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalguild;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $acr4;?></td>
				</tr>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalgmaster;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $acr5;?></td>
				</tr>
				<?php if($mvcore['onoff_player_count'] == 'show') { ?>
					<tr style='border-collapse: collapse; border-spacing: 0px;'>
						<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_totalonline;?></td>
						<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;color:green;"><?php echo $acr1;?></td>
					</tr>
				<?php } ?>
				<tr style='border-collapse: collapse; border-spacing: 0px;'>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_todayactive;?></td>
					<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;color:red;"><?php echo $online_today;?></td>
				</tr>

</table>
<br>
<?php 
$sys_startsas = $mvcorex->prepare("select top 1 event_name from MVCore_Event_Timer where type = '2'");
$stmt = $sys_startsas->execute();
$stmt = $sys_startsas->fetch();

if( $sys_startsass[0] != '') { ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td colspan="5" style="padding-left: 15px;"><?php echo''.main_p_statistics_staticeventi.'';?></td>
	</tr>
</table>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">

	<tr class="mvcore-tabletr">
		<td><?php echo''.main_p_statistics_eventname.'';?></td>
		<td><?php echo''.main_p_statistics_eventsarthr.'';?></td>
		<td><?php echo''.main_p_statistics_eventstartemin.'';?></td>
		<td><?php echo''.main_p_statistics_eventtime.'';?></td>
		<td><?php echo''.main_p_statistics_eventrewas.'';?></td>
	</tr>
<?php
$sys_startsa = $mvcorex->prepare("select top 100 event_name, event_hour, event_min, event_interval, event_run_time, event_reward_info, type, date, event_start_date from MVCore_Event_Timer where type = '2' order by date desc");
$stmt = $sys_startsa->execute();
$stmt = $sys_startsa->fetchAll();
$sys_startsa = $stmt;

for ($i = 0; $i < count($sys_startsa); ++$i) {
$drop_info = $sys_startsa;
								
echo'
		<tr style="border-collapse: collapse; border-spacing: 0px;">
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[$i][0].'</td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[$i][1].'</td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[$i][2].'</td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[$i][4].'</td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$drop_info[$i][5].'</td>
		</tr>
';
};
?>
</table>
<br>
<?php } ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td colspan="2"><?php echo main_p_statistics_crywolfinfo;?></td>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo main_p_statistics_statueoffortress;?></td>
			<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $dropStated;?></td>
		</tr>
</table>
<br>
<br>

<?php
if ($acr7[0] == ' ' || $acr7[0] == ''){
	echo'
		<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
			<tr class="mvcore-tabletr">
				<td colspan="2">'.main_p_statistics_castleownerexit.'</td>
			</tr>
		</table>
	';
} else { 
	echo'
		<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
			<tr class="mvcore-tabletr">
				<td colspan="2" style="padding-left: 15px;">'.main_p_statistics_castlesiegeinfo.'</td>
			</tr>
						<tr style="border-collapse: collapse; border-spacing: 0px;">
							<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.main_p_statistics_castleownerguil.'</td>
							<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$acr7[0].'</td>
						</tr>
						<tr style="border-collapse: collapse; border-spacing: 0px;">
							<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.main_p_statistics_ownname.'</td>
							<td style="padding: 6px 3px 6px 3px;width:50%;text-align: center;border: 0;border-bottom: 1px solid '.$mvcore['table_s_borcolor'].';">'.$acr9[0].'</td>
						</tr>
		</table>
	'; 
}; ?>
<div class="mvcore-nNote mvcore-nInformation"><?php echo main_p_statistics_castlesieocupy;?> <?php echo date('m-d-Y',$acr8s);?></div>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Dark Wizard</td>
		<td>Soul Master</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Grand Master</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD0;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD1;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD2;?></td><?php } ?>
		</tr>
</table>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Dark Knight</td>
		<td>Blade Knight</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Blade Master</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD16;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD17;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD18;?></td><?php } ?>
		</tr>
</table>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Elf</td>
		<td>Muse Elf</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Hight Elf</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD32;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD33;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD34;?></td><?php } ?>
		</tr>
</table>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td> - </td>
		<td>Magic Gladiator</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Duel Master</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD48;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD49;?></td><?php } ?>
		</tr>
</table>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td> - </td>
		<td>Dark Lord</td>
		<?php if( $mvcore['db_season'] >= '3'){ ?><td>Lord Emperor</td><?php } ?>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD64;?></td>
			<?php if( $mvcore['db_season'] >= '3'){ ?><td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD65;?></td><?php } ?>
		</tr>
</table>
<?php if( $mvcore['db_season'] >= '4'){ ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Summoner</td>
		<td>Bloody Summoner</td>
		<td>Dimension Master</td>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD80;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD81;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD82;?></td>
		</tr>
</table>
<?php } ?>
<?php if( $mvcore['db_season'] >= '6'){ ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td> - </td>
		<td>Rage Fighter</td>
		<td>Fist Master</td>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD96;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD97;?></td>
		</tr>
</table>
<?php } ?>
<?php if( $mvcore['db_season'] >= '10'){ ?>
<br>
<table class="mvcore-tablestat" cellpadding="0" cellspacing="0">
	<tr class="mvcore-tabletr">
		<td>Grow Lancer</td>
		<td> - </td>
		<td> - </td>
	</tr>
		<tr style='border-collapse: collapse; border-spacing: 0px;'>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"><?php echo $classD112;?></td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
			<td style="text-align: center;border: 0;border-bottom: 1px solid <?php echo''.$mvcore['table_s_borcolor'].'';?>;"> - </td>
		</tr>
</table>
<?php } ?>
<?php } ?>