<?php include ('Protection.php'); ?>
<?php
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
session_start(); 
ob_start();

header("Cache-control: private");
if (isset($_GET['url_write'])){
	
	$url_fwd = explode('-id-',$_GET['url_write']);
	settype($url_fwd,'array');
	$_GET['op1'] = @$url_fwd[1]; 
	$_GET['op2'] = @$url_fwd[2];
	$_GET['op3'] = @$url_fwd[3];
	$_GET['op4'] = @$url_fwd[4];
	$_GET['op5'] = @$url_fwd[5];
	$_GET['op6'] = @$url_fwd[6];

}

if (!file_exists("sql.php")) { 
	require('system/inst.php');
	ob_end_flush();
	exit;
};

require('system/language.php');

if (file_exists("system/engine_lang/".$_SESSION["mvcoreLang"].".php")) { 
	require('system/engine_lang/'.$_SESSION["mvcoreLang"].'.php'); 
} else { 
	require('system/engine_lang/'.$mvcore['df_lang'].'.php'); 
};

require('system/engine.php');
	
if($mvcore['debug_mode'] == '1' && $_GET['op1'] != 'admincp' && $_SESSION['admin_panel'] != 'ok' ) { die('<center><br><br><br><img src="system/engine_images/under-maintenance.png"></center>'); };

if($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok') { 
	$dir_load = 'admincp/theme'; 
} else {
	$dir_load = 'themes/'.$mvcore['theme_dir'].''; 
};

if (file_exists("".$dir_load."/index.php")) {
	include("".$dir_load."/index.php");
}
else {
	Die("<center>Cant load theme.</center>"); 
};

mssql_close($link);
ob_end_flush();
?>