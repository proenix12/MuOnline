<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="MVCore, Mu Online, Mu, Game, Online, Server, Play, For, Free" />
<meta name="description" content="MuOnline Private Server" />
<link rel="shortcut icon" href="system/engine_images/favi.png" /> <!-- MVCore ICO -->

<title>MVCore AdminCP <?php echo $MVCoreVersion;?></title>

	<style>
		@charset utf-8;
		@import "validation.css";
		@import "notice.css";
		@import "ui.css";
	</style>
	
	<link rel="stylesheet" href="admincp/theme/css/css1.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css2.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css3.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css4.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css5.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css6.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css7.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css8.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css9.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css10.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css11.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css12.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css13.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/css14.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/stylesJS.css" type="text/css" />
	<link rel="stylesheet" href="admincp/theme/css/main.css" type="text/css" />
	<?php include('system/theme_inc/inc.item_viewer.php'); ?> <!-- Item View JS, ( Location: Body Top ) -->
	<?php include('system/engine_css/mvcore_style.php'); ?> <!-- Engine CSS -->

<script src="admincp/theme/js/css_browser_selector.js" type="text/javascript"></script>

<script type="text/javascript" src="admincp/theme/js/jquery.min.js"></script> 
<script type="text/javascript" src="admincp/theme/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.sortable.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.resizable.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.autosize.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.autotab.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.select2.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.dualListBox.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.cleditor.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.ibutton.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.plupload.queue.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.form.wizard.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.form.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.progress.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.colorpicker.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.fancybox.js"></script>
</head>
<body>
<div class="headerTop">
	<div class="logo"></div>
	<div style='float:right;font-size:25px;color:#FF8000;padding-top:16px;padding-right:15px;font-family: "Courier New", Courier, monospace;'><?php echo $MVCoreVersion;?></div>
</div>
<div class="sidemenu" style="margin-left:-93px;overflow-x: hidden;overflow-y: auto;" tabindex="5001">
	<div class="sideright" >
		<div style="height:93px;"></div>
		<div>
			<ul class="subNav">
				<li><a href="-id-admincp-id-Dashboard.html" title="" <?php if($_GET['op2'] == 'Dashboard') { echo'class="this"'; }; ?> ><span>Dashboard</span></a></li>
				<li><a href="-id-admincp-id-Main_Settings-id-Engine.html" title="" <?php if($_GET['op2'] == 'Main_Settings') { echo'class="this"'; }; ?> ><span>Main Settings</span></a></li>
				<li><a href="-id-admincp-id-Forum_Posts_And_Topics-id-Forum_Top.html" title="" <?php if($_GET['op2'] == 'Forum_Posts_And_Topics') { echo'class="this"'; }; ?> ><span>Forum Posts/Topics Settings</span></a></li>
				<li><a href="-id-admincp-id-Enable_Disable_pages-id-Main_Pages.html" title="" <?php if($_GET['op2'] == 'Enable_Disable_pages') { echo'class="this"'; }; ?> ><span>Enable/Disable Pages</span></a></li>
				<li><a href="-id-admincp-id-Database_Table_manage-id-Column_manage.html" title="" <?php if($_GET['op2'] == 'Database_Table_manage') { echo'class="this"'; }; ?> ><span>Database Table Settings</span></a></li>
				<li><a href="-id-admincp-id-Character_manage-id-Find_By_Name.html" title="" <?php if($_GET['op2'] == 'Character_manage') { echo'class="this"'; }; ?> ><span>Character Manage</span></a></li>
				<li><a href="-id-admincp-id-Account_manage-id-Find_By_Username.html" title="" <?php if($_GET['op2'] == 'Account_manage') { echo'class="this"'; }; ?> ><span>Account Manage</span></a></li>
				<li><a href="-id-admincp-id-Advertise_manage-id-Advertise_manage_p.html" title="" <?php if($_GET['op2'] == 'Advertise_manage') { echo'class="this"'; }; ?> ><span>Advertise Settings</span></a></li>
				<li><a href="-id-admincp-id-Game_Master_manage-id-gm_main_settings.html" title="" <?php if($_GET['op2'] == 'Game_Master_manage') { echo'class="this"'; }; ?> ><span>Game Master Manage</span></a></li>
				<li><a href="-id-admincp-id-Register_manage-id-register_settings.html" title="" <?php if($_GET['op2'] == 'Register_manage') { echo'class="this"'; }; ?> ><span>Register Manage</span></a></li>
				<li><a href="-id-admincp-id-News_manage-id-Add_Remove_News.html" title="" <?php if($_GET['op2'] == 'News_manage') { echo'class="this"'; }; ?> ><span>News Manage</span></a></li>
				<li><a href="-id-admincp-id-Announcement_manage-id-annon_add_edit_settings.html" title="" <?php if($_GET['op2'] == 'Announcement_manage') { echo'class="this"'; }; ?> ><span>Announcement Manage</span></a></li>
				<li><a href="-id-admincp-id-Downloads_manage-id-Link_manage.html" title="" <?php if($_GET['op2'] == 'Downloads_manage') { echo'class="this"'; }; ?> ><span>Downloads Manage</span></a></li>
				<li><a href="-id-admincp-id-Event_Timer_manage-id-Timer_manage.html" title="" <?php if($_GET['op2'] == 'Event_Timer_manage') { echo'class="this"'; }; ?> ><span>Event Timer Manage</span></a></li>
				<li><a href="-id-admincp-id-Scramble_Settings-id-Scramble_Event.html" title="" <?php if($_GET['op2'] == 'Scramble_Settings') { echo'class="this"'; }; ?> ><span>Scramble Settings</span></a></li>
				<li><a href="-id-admincp-id-Vote_manage-id-Vote_Settings.html" title="" <?php if($_GET['op2'] == 'Vote_manage') { echo'class="this"'; }; ?> ><span>Vote Manage</span></a></li>
				<li><a href="-id-admincp-id-Game_Panel_manage.html" title="" <?php if($_GET['op2'] == 'Game_Panel_manage') { echo'class="this"'; }; ?> ><span>Game Panel Manage</span></a></li>
				<li><a href="-id-admincp-id-Vip_Settings-id-Vip_Settings.html" title="" <?php if($_GET['op2'] == 'Vip_Settings') { echo'class="this"'; }; ?> ><span>Vip System Manage</span></a></li>
				<li><a href="-id-admincp-id-Poll_Settings-id-Poll_Vote_Settings.html" title="" <?php if($_GET['op2'] == 'Poll_Settings') { echo'class="this"'; }; ?> ><span>Poll Vote Manage</span></a></li>
				<li><a href="-id-admincp-id-Exchange_System_manage-id-Exchange_Settings.html" title="" <?php if($_GET['op2'] == 'Exchange_System_manage') { echo'class="this"'; }; ?> ><span>Exchange System Manage</span></a></li>
				<li><a href="-id-admincp-id-Ancient_Exchange_manage-id-AncExchange_Settings.html" title="" <?php if($_GET['op2'] == 'Ancient_Exchange_manage') { echo'class="this"'; }; ?> ><span>Ancient Exchange Manage</span></a></li>
				<li><a href="-id-admincp-id-Lottery_manage-id-Lottery_Settings.html" title="" <?php if($_GET['op2'] == 'Lottery_manage') { echo'class="this"'; }; ?> ><span>Lottery System Manage</span></a></li>
				<li><a href="-id-admincp-id-Other_Module_Settings-id-Friend_System.html" title="" <?php if($_GET['op2'] == 'Other_Module_Settings') { echo'class="this"'; }; ?> ><span>Other Module Settings</span></a></li>
				<li><a href="-id-admincp-id-Payment_System_manage-id-PayPal_Settings.html" title="" <?php if($_GET['op2'] == 'Payment_System_manage') { echo'class="this"'; }; ?> ><span>Payment System Manage</span></a></li>
				<li><a href="-id-admincp-id-Slider_manage-id-Slider_Settings.html" title="" <?php if($_GET['op2'] == 'Slider_manage') { echo'class="this"'; }; ?> ><span>Slider Manage</span></a></li>
				<li><a href="-id-admincp-id-Gallery_manage-id-Gallery_Settings.html" title="" <?php if($_GET['op2'] == 'Gallery_manage') { echo'class="this"'; }; ?> ><span>Gallery Manage</span></a></li>
				<li><a href="-id-admincp-id-Item_Upgrade_System_manage-id-Item_Upgrade_Settings.html" title="" <?php if($_GET['op2'] == 'Item_Upgrade_System_manage') { echo'class="this"'; }; ?> ><span>Item Upgrade System Manage</span></a></li>
				<li><a href="-id-admincp-id-Market_manage-id-Market_Settings.html" title="" <?php if($_GET['op2'] == 'Market_manage') { echo'class="this"'; }; ?> ><span>Market Manage</span></a></li>
				<li><a href="-id-admincp-id-Item_And_Option_manage-id-item_manage.html" title="" <?php if($_GET['op2'] == 'Item_And_Option_manage') { echo'class="this"'; }; ?> ><span>Item & Option Manage</span></a></li>
				<li><a href="-id-admincp-id-Webshop_manage-id-Webshop_Settings.html" title="" <?php if($_GET['op2'] == 'Webshop_manage') { echo'class="this"'; }; ?> ><span>Webshop Manage</span></a></li>
				<li><a href="-id-admincp-id-Query_Execute-id-Query_scripts.html" title="" <?php if($_GET['op2'] == 'Query_Execute') { echo'class="this"'; }; ?> ><span>Query Execute</span></a></li>
				<li><a href="-id-admincp-id-Theme_manage-id-Table_styling.html" title="" <?php if($_GET['op2'] == 'Theme_manage') { echo'class="this"'; }; ?> ><span>Theme Manage</span></a></li>
				<li><a href="-id-admincp-id-Support_Chat.html" title="" <?php if($_GET['op2'] == 'Support_Chat') { echo'class="this"'; }; ?> ><span>Live Support Chat</span></a></li>
			</ul>
			<br>
		</div>			
	</div>
</div>
<div class="content">
	<div class="contentINTop">
		<div class="contentTop" style="margin-left:-93px;">
			<div><a class="bwebbutton" href="-id-News.html"></a></div>
			<span class="pageTitle exphidesdsda"> <?php include('system/engine_ptext.php'); ?> <!-- Used To Output Page Names --></span>
			<span class="pageTitle exphidesd">
<?php
if($mvcore['multi_dbs_supp'] == 'on') {
		echo '<form action="" method="POST">
		<select id="database_load" name="database_load" onchange="this.form.submit()" style="display: none;width:200px;" data-placeholder="Choose a option..." class="select" tabindex="2"><option value=""></option>';
		$cmulti_dbs = explode(',',$mvcore['multi_dbs_names']);
		$cmulti_dbs_titl = explode(',',$mvcore['multi_dbs_titlen']);
		for($i=0;$i < count($cmulti_dbs);++$i) {
			if($_SESSION['database_load']==$cmulti_dbs[$i]){ $opdsvgf[$i] = 'selected'; }else{ $opdsvgf[$i] = ''; };
			echo '<option value="'.$cmulti_dbs[$i].'" '.$opdsvgf[$i].'>'.$cmulti_dbs_titl[$i].'</option>';
		};
		echo '</select></form>'; 
};
?>
			</span>
			<ul class="quickStats">
<?PHP
$Users_online = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." WHERE ConnectStat = :data");
$stmt = $Users_online->execute( array( 'data' => 1) );
$stmt = $Users_online->fetchAll();
$Users_online_drop = count($stmt);

$Total_Users = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_i."");
$stmt = $Total_Users->execute();
$stmt = $Total_Users->fetchAll();
$Total_Users_drop = count($stmt);

$Total_Characters = $mvcorex->prepare("SELECT Name FROM Character");
$stmt = $Total_Characters->execute();
$stmt = $Total_Characters->fetchAll();
$Total_Characters_drop = count($stmt);

$Total_charsban = $mvcorex->prepare("SELECT * FROM Character where CtlCode = '1'");
$stmt = $Total_charsban->execute();
$stmt = $Total_charsban->fetchAll();
$Total_Charsban_drop = count($stmt);

$Total_accban = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_i." where bloc_code = '1'");
$stmt = $Total_accban->execute();
$stmt = $Total_accban->fetchAll();
$Total_accban_drop = count($stmt);

$Total_Guilds = $mvcorex->prepare("SELECT * FROM Guild");
$stmt = $Total_Guilds->execute();
$stmt = $Total_Guilds->fetchAll();
$Total_Guilds_drop = count($stmt);

$month_today = date("M", time());
$day_today  = date("j", time());
$year_today  = date("Y", time());
$query   = $mvcorex->prepare("SELECT count(*) 
FROM ".$mvcore_medb_s." 
WHERE ConnectTM 
LIKE '%".$month_today."%".$day_today ."%" .$year_today."%' 
OR DisConnectTM 
LIKE '%".$month_today."%".$day_today."%".$year_today."%'");
$stmt = $query->execute();
$stmt = $query->fetchAll();
$online_today = count($stmt);
$sql = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." WHERE ConnectStat = 1");
$stmt = $sql->execute();
$stmt = $sql->fetch();
$sql = $stmt;
?>
				<li class="hmbitfl">
					<div class="floatR"><strong class="brown"><?php echo $Total_Charsban_drop;?></strong><span>Characters Banned</span></div>
				</li>
				<li class="hmbitfl">
					<div class="floatR"><strong class="violet"><?php echo $Total_accban_drop;?></strong><span>Users Banned</span></div>
				</li>
				<li>
					<div class="floatR"><strong class="blue"><?php echo $Total_Users_drop;?></strong><span>Users</span></div>
				</li>
				<li>
					<div class="floatR"><strong class="red"><?php echo $Total_Characters_drop;?></strong><span>Characters</span></div>
				</li>
				<li>
					<div class="floatR"><strong class="yellow"><?php echo $Total_Guilds_drop;?></strong><span>Guilds</span></div>
				</li>
				<li>
					<div class="floatR"><strong class="green"><?php echo $Users_online_drop;?></strong><span>Players Online</span></div>
				</li>
				<li>
					<div class="floatR"><strong class="orange"><?php echo $online_today;?></strong><span>Today Active</span></div>
				</li>
			</ul>
		</div>
		
		<!-- Breadcrumbs line -->
		<div class="breadLine optionbbredm">
			<div class="bc">
				<ul id="breadcrumbs" class="breadcrumbs">
					<?php if($_GET['op1'] != '') { echo'<li class=""><a href="#">'.str_replace('_',' ',$_GET['op1']).'</a></li>'; };?>
					<?php if($_GET['op2'] != '') { echo'<li class=""><a href="#">'.str_replace('_',' ',$_GET['op2']).'</a></li>'; };?>
					<?php if($_GET['op3'] != '') { echo'<li class=""><a href="#">'.str_replace('_',' ',$_GET['op3']).'</a></li>'; };?>
				</ul>
			</div>
			<div class="bc" style="float:right;margin-top:1px;padding-right:93px;">
						<div class="grid9 enabled_disabled" id="onChsubesndipagessd">
							<div class="floatL mr10">
								<div style="width: 123px;" class="ibutton-container chromexsize">
									<input style="opacity: 0;" id="admincp_msg_output" <?php if($mvcore['admincp_msg_output'] == 'on') { echo 'checked="checked"'; } ?> name="admincp_msg_output" type="checkbox">
									<div style="width: 119px;" class="ibutton-label-off">
										<span style="margin-right: 0px;"><label>DISABLED</label></span>
									</div>
									<div style="width: 0px;" class="ibutton-label-on">
										<span style="margin-left: -70px;"><label>ENABLED</label></span>
									</div>
									<div class="ibutton-padding-left"></div>
									<div class="ibutton-padding-right"></div>
								</div>
							</div>
						</div>   
						
				<div id="errorDropUniq"></div>
				
<script>
$(document).ready(function() {
	$( "#onChsubesndipagessd" ).on('change', function() {
		var getAllValues = $("#admincp_msg_output:checked").length;
		
			$.post("acps.php", {
				scascascsafdsfsfas: getAllValues
			},
			function(data) {
				$('#errorDropUniq').html(data);
			});
	});
});
</script>
				<!-- <b><?php echo'MVCore Expire Date: '.$License_Expire.''; ?></b> -->
			</div>
			<div class="bc" style="float:right;color:black;margin-top:3px;padding-right:10px;" title="By Disabling MSG The AdminCP Speed Increases In Several Pages">
				AdminCP MSG:
			</div>
		</div>
	</div>
	<div class="contentIN">
		<?php include('system/engine_pages.php'); ?> <!-- Used To Output Pages -->
		<div style="height:30px;"></div>
	</div>
</div>
<script type="text/javascript" src="admincp/theme/js/jquery.fileTree.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.sourcerer.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/bootstrap.js"></script>
<script type="text/javascript" src="admincp/theme/js/functions.js"></script>
<script type="text/javascript" src="admincp/theme/js/hBar_side.js"></script>

</body>
</html>