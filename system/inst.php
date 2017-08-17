<?php if (!file_exists("sql.php")) {
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
session_start(); 
ob_start();
header("Cache-control: private");
ob_end_flush();

include('system/engine_lang/eng.php');
require('system/Multi_DBs_supp.php');

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

define("LOG_FILE_ENTERDPAGE", "system/engine_logs/Install_Page.log"); // Log Save
error_log(date('[Y-m-d H:i e] '). "Page entered from IP: ".getUserIP()."". PHP_EOL, 3, LOG_FILE_ENTERDPAGE);

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="MVCore, Mu Online, Mu, Game, Online, Server, Play, For, Free" />
<meta name="description" content="MuOnline Private Server" />
<link rel="shortcut icon" href="system/engine_images/favi.png" /> <!-- MVCore ICO -->

<title>MVCore Install System</title>

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
	<?php include(system/theme_inc/inc.item_viewer.php); ?> <!-- Item View JS, ( Location: Body Top ) -->
	<?php include(system/engine_css/mvcore_style.php); ?> <!-- Engine CSS -->

	<style>
		@charset utf-8;
		@import "validation.css";
		@import "notice.css";
		@import "ui.css";
		
		.sideright{
			background: #444;
			position:absolute;
			margin-left:100px;
			margin-top:55px;
			width:340px;
			height: auto !important;
			z-index:1;
		}
		.contentIN {
			z-index:30;
			margin-right:30px;
			margin-left:30px;
			margin-top:126px;
		}

		.contentINTop {
			position:fixed;
			z-index:60;
			min-width:100%;
			margin-left:90px;
			margin-top:1px;
		}
		.sidemenus {
			position:fixed;
			margin: 0;
			width:440px;
			min-height: 100%;
			z-index:9;
			background: url(admincp/theme/images/side2.jpg) repeat-y top left;
			border-right: 1px solid #cdcdcd;
		}
	</style>
	
<script src="admincp/theme/js/css_browser_selector.js" type="text/javascript"></script>

<script type="text/javascript" src="admincp/theme/js/jquery.min.js"></script> 
<script type="text/javascript" src="admincp/theme/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/excanvas.min.js"></script>
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
<?php
if(!extension_loaded('gd')){
	include('system/error_page.php');
	define("LOG_FILE_GDDIS", "system/engine_logs/gd_disabled.log"); // Log Save
	error_log(date('[Y-m-d H:i e] '). "PHP Version: ".phpversion()." Error: GD extenstion is disabled, remove ; in php.ini where 'extension=php_gd2.dll'". PHP_EOL, 3, LOG_FILE_GDDIS);
	mvcore_error('gd disabled', '<font color="black"><b>Possible solutions</b><br>1) remove ; in php.ini where "extension=php_gd2.dll"</font>');
	exit;
};
if(!extension_loaded('PDO')){
	include('system/error_page.php');
	define("LOG_FILE_MSSQLDIS", "system/engine_logs/pdo_disabled.log"); // Log Save
	error_log(date('[Y-m-d H:i e] '). "PHP Version: ".phpversion()." Error: mssql extenstion is disabled, remove ; in php.ini where 'extension=php_mssql.dll'". PHP_EOL, 3, LOG_FILE_MSSQLDIS);
	mvcore_error('mssql disabled', '<font color="black"><b>Possible solutions</b><br>1) remove ; in php.ini where "extension=php_pdo_odbc.dll"</font>');
	exit;
};
if(!extension_loaded('pdo')){
	include('system/error_page.php');
	define("LOG_FILE_MYSQLDIS", "system/engine_logs/pdo_disabled.log"); // Log Save
	error_log(date('[Y-m-d H:i e] '). "PHP Version: ".phpversion()." Error: mysql extenstion is disabled, remove ; in php.ini where 'extension=php_mysql.dll'". PHP_EOL, 3, LOG_FILE_MYSQLDIS);
	mvcore_error('mysql disabled', '<font color="black"><b>Possible solutions</b><br>1) remove ; in php.ini where "extension=php_pdo_odbc.dll"</font>');
	exit;
};
if(!extension_loaded('openssl')){
	include('system/error_page.php');
	define("LOG_FILE_OPENSSLDIS", "system/engine_logs/mssql_disabled.log"); // Log Save
	error_log(date('[Y-m-d H:i e] '). "PHP Version: ".phpversion()." Error: openssl extenstion is disabled, remove ; in php.ini where 'extension=php_openssl.dll'". PHP_EOL, 3, LOG_FILE_OPENSSLDIS);
	mvcore_error('openssl disabled', '<font color="black"><b>Possible solutions</b><br>1) remove ; in php.ini where "extension=php_openssl.dll"</font>');
	exit;
};
?>
<div class="content">
	<div class="contentINTop">
		<div class="contentTop" style="margin-left:-93px;">
			<div style="font-size:30px;padding-top:12px;"><div style="float:left;margin-top:7px;"><font color="red">MVCore Website Install System</font></div><div style="float:right;padding-right:100px;"><a href="-id-News.html"><button class="buttonS bGreen grid2" type="submit" style="font-size:13px;width:100%;height:40px;">Refresh Page</button></a></div></div>
		</div>
		
		<!-- Breadcrumbs line -->
		<div class="breadLine" style="margin-left:-93px;">
			<div class="bc" style="float:right;color:black;margin-top:3px;padding-right:110px;" title="By Disabling MSG The AdminCP Speed Increases In Several Pages">
				Each visitor in this page is saved in log files.
			</div>
		</div>
	</div>
	<div class="contentIN">
				<form method="POST" action="">
					<div class="widget fluid">		
						<input type="hidden" name="r_reg_form">

								<div class="whead" style="font-size:13px;padding:8px;">MD5 Password ( <b><font color="red">Important!</font> Choose Yes If Your DB Has MD5 Passwords</b> )</div>
								<div class="formRow"><div class="grid12"><label><b>WARNING: If You Are Using MultiDB Setup & One Of Your DBs Has MD5 Then Install Each DB Seperate Or Manualy Setup MD5 In Config Folder</b></label></div></div>
								<div class="formRow">
									<div class="grid3"><label>MD5 Password:</label></div>
									<div class="grid9">
										<select style="width:100%;" id="md5" name="md5" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes">Yes</option> 
											<option value="no" selected>No</option> 
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>MD5 Hash:</label></div>
									<div class="grid9">
										<select style="width:100%;" id="md5_hash_o" name="md5_hash_o" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option>
											<option value="pw" selected>Password</option>
											<option value="pw_ur">Password + Username</option>
											<option value="ur_pw">Username + Password</option>
											<option value="pw_sal">Password + Salt</option>
											<option value="pw_ur_sal">Password + Username + Salt</option>
											<option value="ur_pw_sal">Username + Password + Salt</option>
											<option value="dbo_fn_md5">dbo.fn_md5('Password','Username')</option>
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>MD5 Salt ( <b>Leave Empty If Salt Not Selected</b> ):</label></div>
									<div class="grid9"><input id="md5_hs_salt" name="md5_hs_salt" type="text" value=""></div>
								</div>
								
								<div class="whead" style="font-size:13px;padding:8px;">Server File Season ( <b><font color="red">Important!</font> Depending On Season Some Options Might Be Added Or Removed.</b> )</div>
								<div class="formRow">
									<div class="grid3"><label>Server - Season:</label></div>
									<div class="grid9">
										<select style="width:100%;" id="db_season" name="db_season" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option>
											<option value="2">MultiDB Case ( Change Season Later )</option>
											<option value="1" selected>Season 1</option>
											<option value="2">Season 2</option>
											<option value="3">Season 3</option>
											<option value="4">Season 4</option>
											<option value="5">Season 5</option>
											<option value="6">Season 6</option>
											<option value="7">Season 7</option>
											<option value="8">Season 8</option>
											<option value="9">Season 9</option>
											<option value="9">Season 10 ( On TEST )</option>
										</select>
									</div>             
								</div>
								
								<div class="whead" style="font-size:13px;padding:8px;">MSSQL Connection Data</div>
								<div class="formRow">
									<div class="grid3"><label>SQL - IP ( <b>Default: 127.0.0.1</b> ):</label></div>
									<div class="grid9"><input id="sql_ip" name="sql_ip" type="text" value="127.0.0.1"></div>
								</div>
								<div class="formRow">
									<div class="grid3"><label>SQL - User ( <b>Default: sa</b> ):</label></div>
									<div class="grid9"><input id="sql_user" name="sql_user" type="text" value="sa"></div>
								</div>
								<div class="formRow">
									<div class="grid3"><label>SQL - Password:</label></div>
									<div class="grid9"><input id="sql_pass" name="sql_pass" type="password" value=""></div>
								</div>
								<div class="formRow">
									<div class="grid3"><label>SQL - Database Names ( <b>MultiDB Or Single DB</b> ):</label></div>
									<div class="grid9"><input id="sql_db" name="sql_db" type="text" placeholder="MuOnlineDefault,Muonline1,MuOnline2" value=""></div>
								</div>
								<div class="formRow">
									<div class="grid3"><label>SQL - Me Database ( <b>Only If Me_MuOnline Exists</b> ):</label></div>
									<div class="grid9">
										<select style="width:100%;" id="medb" name="medb" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes">Yes</option> 
											<option value="no" selected>No</option> 
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>SQL - ME Database Name:</label></div>
									<div class="grid9"><input id="sql_medb" name="sql_medb" type="text" value="Me_MuOnline"></div>
								</div>
								
								
								<div class="whead" style="font-size:13px;padding:8px;">Install Configuration ( <b>First Install ? Then Leave All To 'YES'</b> )</div>
								<div class="formRow">
									<div class="grid3"><label>Table Create & Data Insert ( <b>MVCore_</b> ):</label></div>
									<div class="grid9">
										<select style="width:100%;" id="inst_table_create_insert" name="inst_table_create_insert" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes" selected>Yes</option> 
											<option value="no">No</option> 
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>Column Create In Memb_info:</label></div>
									<div class="grid9">
										<select style="width:100%;" id="inst_column_create_memb_info" name="inst_column_create_memb_info" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes" selected>Yes</option> 
											<option value="no">No</option> 
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>Column Create In Character:</label></div>
									<div class="grid9">
										<select style="width:100%;" id="inst_column_create_character" name="inst_column_create_character" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes" selected>Yes</option> 
											<option value="no">No</option> 
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>Memb_Stat Table Recreate:</label></div>
									<div class="grid9">
										<select style="width:100%;" id="inst_memb_stat_table_recreate" name="inst_memb_stat_table_recreate" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes" selected>Yes</option> 
											<option value="no">No</option> 
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>Procedure Modify ( <b>WZ_CONNECT, WZ_DISCONNECT</b> ):</label></div>
									<div class="grid9">
										<select style="width:100%;" id="inst_procedure_modify" name="inst_procedure_modify" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes" selected>Yes</option> 
											<option value="no">No</option> 
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>Webshop Item & Item Option Install ( <b>Old Data Will Be Lost</b> ):</label></div>
									<div class="grid9">
										<select style="width:100%;" id="inst_websh_item_opt_install" name="inst_websh_item_opt_install" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes" selected>Yes</option> 
											<option value="no">No</option> 
										</select>
									</div>             
								</div>
								<div class="formRow">
									<div class="grid3"><label>Config File Creation ( <b>Sql.php / DB_Season.php / MD5_Support.php</b> ):</label></div>
									<div class="grid9">
										<select style="width:100%;" id="inst_config_file_create" name="inst_config_file_create" style="display: none;" data-placeholder="Choose a Season..." class="select" tabindex="2">
											<option value=""></option> 
											<option value="yes" selected>Yes</option> 
											<option value="no">No</option> 
										</select>
									</div>             
								</div>
								
								<div class="whead" style="font-size:13px;padding:8px;">Administration account create ( <b>Can leave empty if already have Admin Account</b> )</div>
								<div class="formRow">
									<div class="grid3"><label>Admin Account - Username:</label></div>
									<div class="grid9"><input id="r_username" name="r_username" type="text" value=""></div>
								</div>
								<div class="formRow">
									<div class="grid3"><label>Admin Account - Password:</label></div>
									<div class="grid9"><input id="r_password" name="r_password" type="password" value=""></div>
								</div>
								<div class="formRow">
									<div class="grid3"><label>Admin Account - Repeat Password:</label></div>
									<div class="grid9"><input id="r_repassword" name="r_repassword" type="password" value=""></div>
								</div>
								<div class="formRow">
									<div class="grid3"><label>Admin Account - Email:</label></div>
									<div class="grid9"><input id="r_email" name="r_email" type="text" value=""></div>
								</div>
								<input type="hidden" name="s_question" value="1">
								<input type="hidden" name="s_answer" value="null">
					</div>
				<br>
				<div class="invList fluid">
					<button name="db_inst_1" class="buttonS bGreen grid2" type="submit" style="font-size:13px;width:100%;height:40px;">Install Website</button>
				</div>
				</form>
		<div style="height:30px;"></div>
	</div>
</div>
<?php if(isset($_POST['r_reg_form'])){

	function recurse_copy($dirFrom,$dirTo) {
		$dir = opendir($dirFrom); //Maybe need chmod
		@mkdir($dirTo);
		while(false !== ( $file = readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($dirFrom . '/' . $file) ) {
					recurse_copy($dirFrom . '/' . $file,$dirTo . '/' . $file);
				}
				else {
					//Maybe need chmod
					copy($dirFrom . '/' . $file,$dirTo . '/' . $file); 
				}
			}
		}
		closedir($dir);
		return 1;
	};

	function execQuery($file, PDO $mvcore) {
		$open = fopen($file, "r");
		$content = fread($open, filesize($file)); chmod($file, 0777);
        chmod($file, 0777);

		if($test = $mvcore->query($content) == true) {
			return true;

		} else {
			return false;

		}
	};
		
	function checkTable($name, $dir, PDO $mvcore) {
			$query = execQuery($dir.''.$name.'.sql', $mvcore);

			if($query == true) {
				echo'<script>$.jGrowl("Table: '.$name.' installed", { header: "<font color=green>Success</font>" });</script>';

			}
			else {
				echo'<script>$.jGrowl("Table '.$name.' = '.$mvcore->errorInfo().'", { header: "<font color=red>Error</font>" });</script>';

				return $error = true;
			}
	};
		
	function checkTable2($name, $dir, PDO $mvcore) {
        $query = execQuery($dir.''.$name.'.sql', $mvcore);
	};
		
	function checkColumn($table, $name, $type, $null, $default, PDO $mvcore) {
        if ($select = $mvcore->query('SELECT '.$name.' FROM '.$table.'') != false) {
            echo '<script>$.jGrowl("Alter ' . $name . ' Already exists", { header: "<font color=green>Success</font>" });</script>';

        } else {
            if ($null == 1) {
                $null = 'NULL';
            }
            if ($select1 = $mvcore->query('ALTER TABLE '.$table.' ADD '.$name.' '.$type.' '.$null.' '.$default.'')) {
                echo '<script>$.jGrowl("Alter ' . $name . ' installed", { header: "<font color=green>Success</font>" });</script>';

            } else {
                echo '<script>$.jGrowl("Alter ' . $name . ' = ' . $mvcore->errorInfo() . '", { header: "<font color=red>Error</font>" });</script>';
                return $error = true;

            }
        }
	};
		
if($_POST['medb'] == 'yes') {
    $createstringmesup = ''.$_POST['sql_db'].','.$_POST['sql_medb'].'';

} else {
    $createstringmesup = $_POST['sql_db'];

};
$fdbname = explode(',',$createstringmesup);

if(count($fdbname) == 1 && $createstringmesup == '') {
    $eror_cant_install = 1; echo'<script>$.jGrowl("Fields are empty, fill and try again.", { header: "<font color=red>Error</font>" });</script>';

};

if($eror_cant_install != 1) {
echo'<script>$.jGrowl("Starting installation, this might take a while.", { header: "<font color=green>Processing...</font>" });</script>';

for($i=0;$i < count($fdbname);++$i) {

	$file_dir = "system/engine_install/Table Create/";
	$file_dirInsrt = "system/engine_install/Data Insert/";

	if(isset($_POST['r_reg_form'])){
		if($_POST['sql_ip'] == ''){ echo'<script>$.jGrowl("SQL IP field is empty", { header: "<font color=red>Error</font>" });</script>'; };
		if($_POST['sql_user'] == ''){ echo'<script>$.jGrowl("SQL user field is empty", { header: "<font color=red>Error</font>" });</script>'; };
		if($_POST['sql_pass'] == ''){ echo'<script>$.jGrowl("SQL password field is empty", { header: "<font color=red>Error</font>" });</script>'; };
		if($fdbname[$i] == ''){ echo'<script>$.jGrowl("SQL database field is empty", { header: "<font color=red>Error</font>" });</script>'; };
	};
	
	if($_POST['sql_user'] == '' || $_POST['sql_pass'] == '' || $fdbname[$i] == '' || $_POST['sql_ip'] == '') {
        echo'<script>$.jGrowl("Error", { header: "<font color=red>Error</font>" });</script>';
    } else {


        function connection($servername, $username, $password, $multiple_db) {
            $connection = new PDO("sqlsrv:server=$servername;Database=$multiple_db", $username, $password);
            $connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES, false
            );
            return $connection;
        }

		$servername       = $_POST['sql_ip'];
        $username         = $_POST['sql_user'];
        $password         = $_POST['sql_pass'];
        $multiple_db = $fdbname[$i];

        $mvcore = connection($servername, $username, $password, $multiple_db);


		
		$stop_forward = '0';
		
		if(!$mvcore){
			echo'<script>$.jGrowl("<b>'.database_connect_info.' '.$fdbname[$i].'</b><br><b>'.database_reasons.'</b><br>1) '.database_reason1.'<br>2) '.database_reason2.'<br>2) '.database_reason3.'", { header: "<font color=red>Error</font>" });</script>';
			$stop_forward = '1';
		};
		
	if($stop_forward == '0') {
	
	
		//Create Config Folder
		$POST = $fdbname[$i];
		if($POST == '') { $has_error = 1; };
		if(strlen($POST) >= 85) { $has_error = 1; };
		
		$cmulti_dbs = $POST;
		
		if($fdbname[$i] != $_POST['sql_medb']) {
			if($has_error >= '1'){

            } else {
				
					if(!file_exists("system/engine_configs".$cmulti_dbs."")) {
						$dirFrom = 'system/engine_configsDefault/';
						$dirTo = 'system/engine_configs'.$cmulti_dbs.'/';
						recurse_copy($dirFrom,$dirTo);
					};
					
					if(!file_exists("system/engine_ndb".$cmulti_dbs."")) {
						$dirFromn = 'system/engine_ndbDefault/';
						$dirTon = 'system/engine_ndb'.$cmulti_dbs.'/';
						recurse_copy($dirFromn,$dirTon);
					};
					
					if(!file_exists("system/engine_item_configs".$cmulti_dbs."")) {
						$dirFromi = 'system/engine_item_configsDefault/';
						$dirToi = 'system/engine_item_configs'.$cmulti_dbs.'/';
						recurse_copy($dirFromi,$dirToi);
					};
					
					if(!file_exists("system/engine_annou".$cmulti_dbs."")) {
						$dirFromi = 'system/engine_annouDefault/';
						$dirToi = 'system/engine_annou'.$cmulti_dbs.'/';
						recurse_copy($dirFromi,$dirToi);
					};
					
				echo'<script>$.jGrowl("Folders for databases has been added.", { header: "<font color=green>Success</font>" });</script>';
				
			};
		};
		//End

		if(isset($_POST['db_inst_1'])){

//-----------------------------------------------------------------------	
if($_POST['inst_table_create_insert'] == 'yes' && $fdbname[$i] != $_POST['sql_medb']){
			$run = checkTable('Market_Items', $file_dir, $mvcore);
			$run = checkTable('Market_Sold_Item_List', $file_dir, $mvcore);
			$run = checkTable('MVCore_Banned_PPL', $file_dir, $mvcore);
			$run = checkTable('MVCore_Download', $file_dir, $mvcore);
			$run = checkTable('MVCore_Lottery_Data', $file_dir, $mvcore);
			$run = checkTable('MVCore_Lottery_Win_List', $file_dir, $mvcore);
			$run = checkTable('MVCore_PayGol_Pack', $file_dir, $mvcore);
			$run = checkTable('MVCore_Friend_List', $file_dir, $mvcore);
			$run = checkTable('MVCore_PayPal_Pack', $file_dir, $mvcore);
			$run = checkTable('MVCore_Reward_Data', $file_dir, $mvcore);
			$run = checkTable('MVCore_Reward_Player', $file_dir, $mvcore);
			$run = checkTable('MVCore_Item_Upgrade', $file_dir, $mvcore);
			$run = checkTable('MVCore_Transaction_Log', $file_dir, $mvcore);
			$run = checkTable('MVCore_Income_Logs', $file_dir, $mvcore);
			$run = checkTable('MVCore_Money_Data', $file_dir, $mvcore);
			$run = checkTable('MVCore_Vote', $file_dir, $mvcore);
			$run = checkTable('MVCore_Vote_Log', $file_dir, $mvcore);
			$run = checkTable('MVCore_Event_Post', $file_dir, $mvcore);
			$run = checkTable('MVCore_MultiAcc_Voters', $file_dir, $mvcore);
			$run = checkTable('wm_Item_Log', $file_dir, $mvcore);
			$run = checkTable('wm_Item_Table', $file_dir, $mvcore);
			$run = checkTable('wm_Ancient', $file_dir, $mvcore);
			$run = checkTable('wm_Ancient_Option', $file_dir, $mvcore);
			$run = checkTable('wm_Harmony', $file_dir, $mvcore);
			$run = checkTable('wm_Socket', $file_dir, $mvcore);
			$run = checkTable('wm_Ertel', $file_dir, $mvcore);
			$run = checkTable('MVCore_Ancient_Exchange_Log', $file_dir, $mvcore);
			$run = checkTable('MVCore_Register_Count', $file_dir, $mvcore);
			$run = checkTable('MVCore_Event_Timer_Date', $file_dir, $mvcore);
			$run = checkTable('MVCore_Event_Timer', $file_dir, $mvcore);
};			
//-----------------------------------------------------------------------		
			
			if($_POST['medb'] == 'yes') {
				$mvcore_medb_i = '['.$_POST['sql_medb'].'].[dbo].[MEMB_INFO]';
				$mvcore_medb_s = '['.$_POST['sql_medb'].'].[dbo].[MEMB_STAT]';
			} else {
				$mvcore_medb_i = '['.$fdbname[$i].'].[dbo].[MEMB_INFO]';
				$mvcore_medb_s = '['.$fdbname[$i].'].[dbo].[MEMB_STAT]';
			};
			print_r($mvcore_medb_i);
			
//-----------------------------------------------------------------------	
if($_POST['inst_column_create_memb_info'] == 'yes'){		
		$run = checkColumn(''.$mvcore_medb_i.'','admincp','int','NOT NULL','DEFAULT 0', $mvcore);
        $run = checkColumn(''.$mvcore_medb_i.'','credits','int','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','credits2','int','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','m_Grand_Resets','int','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','acc_ip','varchar(150)','1','', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','mvc_vip_date','varchar(150)','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','SecretQuestion','int','1','', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','SecretAnswer','varchar(100)','1','', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','acc_info_text','text','NULL','', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','msponsor_limit','int','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','msponsor_date','varchar(100)','1','', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','mvc_flag','varchar(100)','1','', $mvcore);
		$run = checkColumn(''.$mvcore_medb_i.'','smtp_block','int','NOT NULL','DEFAULT 0', $mvcore);
		
		//For Scramble Only
			$run = checkColumn(''.$mvcore_medb_i.'','scrable_word','varchar(255)','1','', $mvcore);
			$run = checkColumn(''.$mvcore_medb_i.'','scrable_original','varchar(255)','1','', $mvcore);
			$run = checkColumn(''.$mvcore_medb_i.'','scrable_wrong','int','NOT NULL','DEFAULT 0', $mvcore);
			$run = checkColumn(''.$mvcore_medb_i.'','scrable_level','int','NOT NULL','DEFAULT 0', $mvcore);
		//end
    print_r($run);
};		
//-----------------------------------------------------------------------
if($_POST['inst_column_create_character'] == 'yes' && $fdbname[$i] != $_POST['sql_medb']){		
		$run = checkColumn('Character','GM_ExpireD','varchar(150)','1','', $mvcore);
		$run = checkColumn('Character','sell_cost','int','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn('Character','selling_char','varchar(150)','1','', $mvcore);
		$run = checkColumn('Character','Resets','int','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn('Character','Grand_Resets','int','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn('Character','m_Grand_Resets','int','NOT NULL','DEFAULT 0', $mvcore);
		$run = checkColumn('Character','Active_char','int','NOT NULL','DEFAULT 0', $mvcore);
};
//-----------------------------------------------------------------------
if($_POST['inst_websh_item_opt_install'] == 'yes' && $fdbname[$i] != $_POST['sql_medb']){
		$run = checkTable2('Harmony_Data_Insert', $file_dirInsrt, $mvcore);
		$run = checkTable2('Ertel_Data_Insert', $file_dirInsrt,  $mvcore);
		$run = checkTable2('Socket_Data_Insert', $file_dirInsrt, $mvcore);
};		
//-----------------------------------------------------------------------
if($_POST['inst_memb_stat_table_recreate'] == 'yes'){	
		$run = checkTable('Memb_Stat', $file_dir, $mvcore);
};		
//-----------------------------------------------------------------------
if($_POST['inst_procedure_modify'] == 'yes'){	
		if($stm = $mvcore->query("
			ALTER PROCEDURE [dbo].[WZ_DISCONNECT_MEMB]
			@memb___id varchar(10)
			AS
			Begin	
			set nocount on
				Declare  @find_id varchar(10)
				Declare @ConnectStat tinyint
				Set @ConnectStat = 0 
				Set @find_id = 'NOT'
				select @find_id = S.memb___id COLLATE DATABASE_DEFAULT from ".$mvcore_medb_s." S INNER JOIN ".$mvcore_medb_i." I ON S.memb___id = I.memb___id COLLATE DATABASE_DEFAULT
					   where I.memb___id = @memb___id

				if( @find_id <> 'NOT' )
				begin		
					update ".$mvcore_medb_s." set ConnectStat = @ConnectStat, DisConnectTM = getdate(), OnlineHours = OnlineHours + DATEDIFF(hh,ConnectTM,getdate())
					 where memb___id = @memb___id
				end 
			end

		")) {
			echo'<script>$.jGrowl("Alter WZ_DISCONNECT_MEMB installed", { header: "<font color=green>Success</font>" });</script>';
			
		}
		else { 
			echo'<script>$.jGrowl("Alter WZ_DISCONNECT_MEMB = '.$mvcore->errorInfo().'", { header: "<font color=red>Error</font>" });</script>';
			
		};
		
		if($stm = $mvcore->query("

			ALTER PROCEDURE [dbo].[WZ_CONNECT_MEMB]
			@memb___id varchar(10) , 
			@ServerName  varchar(50),
			@IP varchar(20)	
			 AS
			Begin	
			set nocount on
				Declare  @find_id varchar(10) 	
				Declare  @ConnectStat tinyint
				Set @find_id = 'NOT'
				Set @ConnectStat = 1

				select @find_id = S.memb___id COLLATE DATABASE_DEFAULT from ".$mvcore_medb_s." S INNER JOIN ".$mvcore_medb_i." I ON S.memb___id = I.memb___id COLLATE DATABASE_DEFAULT
					   where I.memb___id = @memb___id COLLATE DATABASE_DEFAULT

				if( @find_id = 'NOT' )
				begin		
					insert into ".$mvcore_medb_s." (memb___id,ConnectStat,ServerName,IP,ConnectTM)
					values(@memb___id,  @ConnectStat, @ServerName, @IP, getdate())
				end
				else		
					update ".$mvcore_medb_s." set ConnectStat = @ConnectStat,
								 ServerName = @ServerName,IP = @IP,
								 ConnectTM = getdate()
					 where memb___id = @memb___id COLLATE DATABASE_DEFAULT
			end

		")) {
			echo'<script>$.jGrowl("Alter WZ_CONNECT_MEMB  installed", { header: "<font color=green>Success</font>" });</script>';
			
		}
		else { 
			echo'<script>$.jGrowl("Alter WZ_CONNECT_MEMB = '.$mvcore->errorInfo().'", { header: "<font color=red>Error</font>" });</script>';
			
		};
};		
//-----------------------------------------------------------------------	
if($_POST['inst_websh_item_opt_install'] == 'yes' && $fdbname[$i] != $_POST['sql_medb']){	
		
							$handle = file_get_contents("system/engine_item_configs".$cmulti_dbs."/ItemSetType.txt");
							if($handle) {
								
								$delete_data = $mvcore->prepare("DELETE FROM MVCore_Wshopp_Ancient");
								$delete_data->execute();
								$expl_category = explode('EndOfCat', $handle);
								
								for( $isa = 0 ; $isa < count($expl_category); $isa++ ) {
									
									$separator = "\r\n";
									$line = strtok($expl_category[$isa], $separator);
									while ($line !== false) {

										$line = strtok( $separator );
										
										$line_read = explode('	', $line);

										if($line == '' || $line == ' ' || !$line >= '16' || substr($line,0,2) == '//') { 
											//Disables empty and useless lines
										} else {
                                            $Insert_DB = $mvcore->prepare("INSERT INTO MVCore_Wshopp_Ancient (anc_name,anc_name2,item_id,item_cat)VALUES (".$line_read[1].",".$line_read[2].",".$line_read[0].",".$isa.")");
                                            $Insert_DB->execute();
										}
									}
								}
								fclose($handle);
							} else {

                            }

							$handletwo = file_get_contents("system/engine_item_configs".$cmulti_dbs."/ItemSetOption.txt");
							if($handletwo) {
									
									$delete_data = $mvcore->prepare("DELETE FROM MVCore_Wshopp_Ancient_Opt");
									$delete_data->execute();
									
									$separator = "\r\n";
									$line = strtok($handletwo, $separator);
									while ($line !== false) {

										$line = strtok( $separator );
										
										$line_read = explode('	', $line);

										$repl_name = str_replace('"','',$line_read[1]);
										$repl_name = str_replace("'",'',$repl_name);
										
										if($line == '' || $line == ' ' || $line == '	' || $line == 'EndOfCat' || $line == 'end' || !$line >= '16' || substr($line,0,2) == '//') { 
											//Disables empty and useless lines
										} else {

										for( $isa = 0 ; $isa < 39; $isa++ ) { //19 Options Posible
											
											$fs = $isa + 1;
											if($isa >= '2' && $isa <= '39') {
												switch ($line_read[$isa]) {
												case -1: $dfo[$isa] = "" ; break;
												case 0 : $dfo[$isa] = "Strength + ".$line_read[$fs]."<br>" ; break;
												case 1 : $dfo[$isa] = "Agility + ".$line_read[$fs]."<br>" ; break;
												case 2 : $dfo[$isa] = "Energy + ".$line_read[$fs]."<br>" ; break;
												case 3 : $dfo[$isa] = "Stamina + ".$line_read[$fs]."<br>" ; break;
												case 5 : $dfo[$isa] = "Increase minimum attack Damage + ".$line_read[$fs]."<br>" ; break;
												case 6 : $dfo[$isa] = "Increase maximum attack Damage + ".$line_read[$fs]."<br>" ; break;
												case 7 : $dfo[$isa] = "Increase Wizardry Damage + ".$line_read[$fs]."<br>" ; break;
												case 8 : $dfo[$isa] = "Increase Damage + ".$line_read[$fs]."<br>" ; break;
												case 9 : $dfo[$isa] = "Increase attack successfull Rate + ".$line_read[$fs]."<br>" ; break;
												case 10 : $dfo[$isa] = "Increase defence + ".$line_read[$fs]."<br>" ; break;
												case 11 : $dfo[$isa] = "Increase maximum life + ".$line_read[$fs]."<br>" ; break;
												case 12 : $dfo[$isa] = "Increase maximum mana + ".$line_read[$fs]."<br>" ; break;
												case 13 : $dfo[$isa] = "Increase maximum AG + ".$line_read[$fs]."<br>" ; break;
												case 14 : $dfo[$isa] = "Increase AG + ".$line_read[$fs]."<br>" ; break;
												case 15 : $dfo[$isa] = "Increase Critical Damage Rate + ".$line_read[$fs]."<br>" ; break;
												case 16 : $dfo[$isa] = "Increase critical Damage + ".$line_read[$fs]."<br>" ; break;
												case 17 : $dfo[$isa] = "Increase Excellent Damage Rate + ".$line_read[$fs]."<br>" ; break;
												case 18 : $dfo[$isa] = "Increase Excellent Damage + ".$line_read[$fs]."<br>" ; break;
												case 19 : $dfo[$isa] = "Increase Skill Damage + ".$line_read[$fs]."<br>" ; break;
												case 20 : $dfo[$isa] = "Double Damage Rate + ".$line_read[$fs]."<br>" ; break;
												case 21 : $dfo[$isa] = "Ignore Enemy Defense Skill + ".$line_read[$fs]."<br>" ; break;
												case 22 : $dfo[$isa] = "Increase defensive skill while using shields + ".$line_read[$fs]."<br>" ; break;
												case 23 : $dfo[$isa] = "Increase damage with 2 handed weapons + ".$line_read[$fs]."<br>" ; break;
												};

											};
											
											
										};
										
										$options_list = ''.$dfo[2].''.$dfo[4].''.$dfo[6].''.$dfo[8].''.$dfo[10].''.$dfo[12].''.$dfo[14].''.$dfo[16].''.$dfo[18].''.$dfo[20].''.$dfo[22].''.$dfo[24].''.$dfo[26].''.$dfo[28].''.$dfo[30].''.$dfo[32].''.$dfo[34].''.$dfo[36].''.$dfo[38].'';
										
										$Insert_DB = $mvcore->prepare("INSERT INTO MVCore_Wshopp_Ancient_Opt (anc_id,anc_name, options)VALUES (".$line_read[0].",'".$repl_name."','".$options_list."')");
										$Insert_DB->execute();

										}
									}
								fclose($handletwo);
							} else {}

								$handlef = file_get_contents("system/engine_item_configs".$cmulti_dbs."/Item.txt");
								if($handlef) {
									
									$handle = str_replace('				','	',$handlef);
									$handle = str_replace('			','	',$handle);
									$handle = str_replace('		','	',$handle);
									
									$delete_data = $mvcore->prepare("DELETE FROM MVCore_Wshopp");
                                    $delete_data->execute();
										
									for( $isa = 0 ; $isa < 16; $isa++ ) {
										$expl_category = explode('EndOfCat', $handle);
									
										$separator = "\r\n";
										$line = strtok($expl_category[$isa], $separator);
										while ($line !== false) {
											
											$line = strtok( $separator );
											
											$line_read = explode('	', $line);
											if($line_read[8] == '' || $line == '' || $line == ' ' || $line == '	' || $line == 'EndOfCat' || $line == 'end' || !$line >= '16' || substr($line,0,2) == '//') { //Disables empty and useless lines
											} else {

												if($line_read[1] == '1') {
												    $isluck = '1';
												} else {
												    $isluck = '0';
												}; //Luck
												if($line_read[2] >= '1') {
												    $iskill = $line_read[2];
												} else {
												    $iskill = '0';
												}; //Skill
												if($line_read[9] <= '0') {
												    $cost = '1';
												} else {
												    $cost = $line_read[9];
												}; //Cost
													
												switch ($line_read[18]) {case 0: $class1="-1"; break;case 1: $class1="00"; break;case 2: $class1="01"; break;case 3: $class1="02"; break;default: $class1="-1"; break;};
												switch ($line_read[19]) {case 0: $class2="-1"; break;Case 1: $class2="016"; break;case 2: $class2="017"; break;case 3: $class2="018"; break;default: $class2="-1"; break;};
												switch ($line_read[20]) {case 0: $class3="-1"; break;Case 1: $class3="032"; break;case 2: $class3="033"; break;case 3: $class3="034"; break;default: $class3="-1"; break;};
												switch ($line_read[21]) {case 0: $class4="-1"; break;Case 1: $class4="048"; break;case 3: $class4="050"; break;default: $class4="-1"; break;};
												switch ($line_read[22]) {case 0: $class5="-1"; break;Case 1: $class5="064"; break;case 3: $class5="066"; break;default: $class5="-1"; break;};
												switch ($line_read[23]) {case 0: $class6="-1"; break;Case 1: $class6="080"; break;case 2: $class6="081"; break;case 3: $class6="082"; break;default: $class6="-1"; break;};
												switch ($line_read[24]) {case 0: $class7="-1"; break;case 1: $class7="096"; break;case 2: $class7="097"; break;default: $class7="-1"; break;};
												switch ($line_read[25]) {case 0: $class8="-1"; break;case 1: $class8="0112"; break;case 2: $class8="0113"; break;default: $class8="-1"; break;};
													
												$classes = ''.$class1.','.$class2.','.$class3.','.$class4.','.$class5.','.$class6.','.$class7.','.$class8.''; //Classes

												$item_name = str_replace('"','',$line_read[8]); //Name
												$item_name = str_replace("'",'',$item_name); //Name
												$item_cost = $cost; //Item Cost Calculation
												$item_cost_zen = $cost * 100; //Item Cost Calculation As Zen
												
													$Insert_DB = $mvcore->prepare("INSERT INTO MVCore_Wshopp (category, id, x, y, item_name, item_cost, zen_cost, max_level, has_luck, has_skill, is_ancient, is_harmony, is_socket, has_refinery, max_excellent, clases, durability, equip_level, can_buy, can_buy_w_money1, can_buy_w_money2, can_buy_w_zen, bought_count) VALUES (".$isa.",".$line_read[0].",".$line_read[3].",".$line_read[4].",'".$item_name."',".$item_cost.",".$item_cost_zen.",".$line_read[6].",".$isluck.",".$iskill.",".$line_read[5].",".$line_read[16].",".$line_read[15].",".$line_read[14].",6,'".$classes."',".$line_read[13].",	".$line_read[17].",	".$line_read[7].",	".$line_read[11].",	".$line_read[12].",	".$line_read[10].",	0)");
													$Insert_DB->execute();
											}
										}
									}
									fclose($handle);
								} else {}
								
};		
//-----------------------------------------------------------------------		
		if (isset($_POST['r_reg_form'])){
			
			$user_name = $_POST['r_username'];
			$e_mail = $_POST['r_email'];
			$user_pass = $_POST['r_password'];
			$rep_pass = $_POST['r_repassword'];
			$s_ques = $_POST['s_question'];
			$s_answ = $_POST['s_answer'];

			if($user_name != ''){
                $check_user_exist = $mvcore->prepare("Select top 1 memb___id from " . $mvcore_medb_i . " where memb___id ='" . $user_name . "'");
                $check_user_exist->execute();
                $check_user_existss = $check_user_exist->fetch();
                    //mssql_fetch_row($check_user_exist);
                if ($check_user_existss[0] == '') {

                } else {
                    $has_error = '3';
                };
                $check_email_exist = $mvcore->prepare("Select top 1 mail_addr from " . $mvcore_medb_i . " where mail_addr ='" . $e_mail . "'");
                $check_email_exist->execute();
                $check_email_existss = $check_email_exist->fetch();

                if ($check_email_existss[0] == '') {

                } else {
                    $has_error = '4';
                };
						if(strlen($user_name) >= '11') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - username is to large! max length: 10", { header: "<font color=red>Error</font>" });</script>'; };
						if(strlen($user_pass) >= '11') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - password is to large! max length: 10", { header: "<font color=red>Error</font>" });</script>'; };
						
						if(strlen($user_name) <= '5') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - username is to small! min length: 4", { header: "<font color=red>Error</font>" });</script>'; };
						if(strlen($user_pass) <= '5') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - password is to small! min length: 4", { header: "<font color=red>Error</font>" });</script>'; };
						
						if(strlen($s_answ) >= '21') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - Secret answer is to large! max length: 20", { header: "<font color=red>Error</font>" });</script>'; };
						
						if($e_mail == '') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - You forgot to enter email!", { header: "<font color=red>Error</font>" });</script>'; };
						if($user_pass == '') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - password is missing!", { header: "<font color=red>Error</font>" });</script>'; };
						if($s_ques == '') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - Select secret question from drop down!", { header: "<font color=red>Error</font>" });</script>'; };
						if($s_answ == '') {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - Enter secret answer!", { header: "<font color=red>Error</font>" });</script>'; };
							if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
							    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - Email is not valid.", { header: "<font color=red>Error</font>" });</script>'; };
						if($user_pass != $rep_pass) {
						    $has_error = '1'; echo'<script>$.jGrowl("Admin Account - Can not register, repeat password did not mach!", { header: "<font color=red>Error</font>" });</script>'; };
						
						if($has_error == '3') {
						    echo'<script>$.jGrowl("Admin Account - Can not register, account username already exists.", { header: "<font color=red>Error</font>" });</script>'; };
						if($has_error == '4') {
						    echo'<script>$.jGrowl("Admin Account - Your email already in use.", { header: "<font color=red>Error</font>" });</script>'; };
						
						if($_POST['md5'] == 'yes') {
							if($_POST['md5_hash_o'] == 'pw') { $pass_hash = hash('md5', $user_pass); } 
							elseif($_POST['md5_hash_o'] == 'pw_ur') { $pass_hash = hash('md5', $user_pass.$user_name); } 
							elseif($_POST['md5_hash_o'] == 'ur_pw') { $pass_hash = hash('md5', $user_name.$user_pass); } 
							elseif($_POST['md5_hash_o'] == 'pw_sal') { $pass_hash = hash('md5', $user_pass.$_POST['md5_hs_salt']); }
							elseif($_POST['md5_hash_o'] == 'pw_ur_sal') { $pass_hash = hash('md5', $user_pass.$user_name.$_POST['md5_hs_salt']); } 
							elseif($_POST['md5_hash_o'] == 'ur_pw_sal') { $pass_hash = hash('md5', $user_name.$user_pass.$_POST['md5_hs_salt']); }
							elseif($_POST['md5_hash_o'] == 'dbo_fn_md5') { $pass_hash = "dbo.fn_md5('".$user_pass."','".$user_name."')"; }
							else { $pass_hash = hash('md5', $user_pass); } 
						};
						
					if($has_error >= '1'){

                    } else {
						if($_POST['md5'] == 'yes') {

						    $do_reg_insert = $mvcore->prepare("insert into ".$mvcore_medb_i." (memb___id,memb__pwd,memb_name,sno__numb,mail_addr,appl_days,modi_days,out__days,true_days,bloc_code,ctl1_code,admincp,SecretQuestion,SecretAnswer,acc_ip) VALUES ('".$user_name."', 0x".$pass_hash." ,'MVCore','1111111111111','".$e_mail."','".date('m/d/Y')."','".date('m/d/Y')."','2015-01-01','2015-01-01','0','0','1','".$s_ques."','".$s_answ."','".getUserIP()."')");
						    $do_reg_insert->execute();
						} else {
							$do_reg_insert = $mvcore->prepare("insert into ".$mvcore_medb_i." (memb___id,memb__pwd,memb_name,sno__numb,mail_addr,appl_days,modi_days,out__days,true_days,bloc_code,ctl1_code,admincp,SecretQuestion,SecretAnswer,acc_ip) VALUES ('".$user_name."','".$user_pass."','MVCore','1111111111111','".$e_mail."','".date('m/d/Y')."','".date('m/d/Y')."','2015-01-01','2015-01-01','0','0','1','".$s_ques."','".$s_answ."','".getUserIP()."')");
						    $do_reg_insert->execute();
						};
						$do_reg_insert = $mvcore->prepare("insert into [".$fdbname[$i]."].[dbo].[AccountCharacter] (id) VALUES ('".$user_name."')");
						$do_reg_insert->execute();
						$has_error = 0; echo'<script>$.jGrowl("Administrator account successful made.", { header: "<font color=green>Success</font>" });</script>';
					};
			};
		};

		if($cev == 0) {
			if($_POST['inst_config_file_create'] == 'yes'){
				$new_db = fopen("sql.php", "w");
				$data = "<?php\n";
				$data .="\$mvcore['db_host'] = '".$_POST['sql_ip']."';\n";
				$data .="\$mvcore['db_name'] = '".$fdbname[$i]."';\n";
				$data .="\$mvcore['medb_name'] = '".$_POST['sql_medb']."';\n";
				$data .="\$mvcore['db_user'] = '".$_POST['sql_user']."';\n";
				$data .="\$mvcore['db_pass'] = '".$_POST['sql_pass']."';\n";
				$data .="?>";
				fwrite($new_db,$data); fclose($new_db); chmod("sql.php", 0777);
				
				$new_db = fopen("system/engine_configs".$fdbname[$i]."/db_season.php", "w");
				$data = "<?php\n";
				$data .="\$mvcore['db_season'] = \"".$_POST['db_season']."\";\n";
				$data .="?>";
				fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$fdbname[$i]."/db_season.php", 0777);
				
				$new_db = fopen("system/engine_configs".$fdbname[$i]."/md5_support.php", "w");
				$data = "<?php\n";
				$data .="\$mvcore['md5_support'] = \"".$_POST['md5']."\";\n";
				$data .="\$mvcore['md5_hash_o'] = \"".$_POST['md5_hash_o']."\";\n";
				$data .="\$mvcore['md5_hs_salt'] = \"".$_POST['md5_hs_salt']."\";\n";
				$data .="?>";
				fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$fdbname[$i]."/md5_support.php", 0777);
				
				$new_db = fopen("system/me_database_support.php", "w");
				$data = "<?php\n";
				$data .="\$mvcore['medb_supp'] = \"".$_POST['medb']."\";\n";
				$data .="?>";
				fwrite($new_db,$data); fclose($new_db); chmod("system/me_database_support.php", 0777);
				
				if(count($fdbname) >= 2) {
					$new_db = fopen("system/Multi_DBs_supp.php", "w");
					$data = "<?php\n";
					$data .="\$mvcore['multi_dbs_supp'] = \"on\";\n";
					$data .="\$mvcore['multi_dbs_names'] = \"".$_POST['sql_db']."\";\n";
					$data .="\$mvcore['multi_dbs_titlen'] = \"".$mvcore['multi_dbs_titlen']."\";\n";
					$data .="\$mvcore['multi_dbs_app_t_sw'] = \"".$mvcore['multi_dbs_app_t_sw']."\";\n";
					$data .="?>";
					fwrite($new_db,$data); fclose($new_db); chmod("system/Multi_DBs_supp.php", 0777);
				};
			};
			
		};
		
		};
		$installed_success = 0;
		$mvcore = null;
		$lt = $i + 1;
		if($lt >= count($fdbname)) {
			echo'<script>$.jGrowl("Website has been Successfully installed", { header: "<font color=green>Success</font>" });</script>';
			echo'<script>$.jGrowl("<b>Refresh page to load website!</b>", { header: "<font color=green>Success</font>" });</script>';
			$installed_success = 1;
		}else{
			echo'<script>$.jGrowl("Loading next database '.$fdbname[$lt].'", { header: "<font color=green>Loading...</font>" });</script>';
		};
		
	};
	
	};
};
}; 
};
?>
<script type="text/javascript" src="admincp/theme/js/jquery.fileTree.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.sourcerer.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="admincp/theme/js/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="admincp/theme/js/bootstrap.js"></script>
<script type="text/javascript" src="admincp/theme/js/functions.js"></script>
<script type="text/javascript" src="admincp/theme/js/chart.js"></script>
<script type="text/javascript" src="admincp/theme/js/hBar_side.js"></script>

</body>
</html>
<?php } ?>