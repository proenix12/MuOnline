<?php
//------------------------------------------------------------------
// -== Security Checks ==- //
$_REQUEST = clean_variable($_REQUEST);
$_POST = clean_variable($_POST);
$_GET = clean_variable($_GET);
$_COOKIE = clean_variable($_COOKIE);
$_SESSION = clean_variable($_SESSION);
if($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok' || $t_acps_skip == 'yes') {
	$badwords = array("xp_cmdshell");
} else {
	$badwords = array("xp_cmdshell","EXEC","insert","INSERT","DROP", "SELECT", "UPDATE", "DELETE", "drop", "select", "update", "delete", "WHERE", "where");
}
foreach($_POST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0) {
header('Location: -id-News.html'); exit; };

foreach($_GET as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: -id-News.html'); exit; };

foreach($_COOKIE as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: -id-News.html'); exit; };

foreach($_REQUEST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: -id-News.html'); exit; };
//------------------------------------------------------------------
// -== Multi Database Support System ==- //

require('sql.php');
require('system/Multi_DBs_supp.php');

	$db_name_multi = $mvcore['db_name']; //Default
	$db_name_multi_news = $mvcore['db_name']; //Default
	$db_name_multi_item = $mvcore['db_name']; //Default
	$db_name_multi_annon = $mvcore['db_name']; //Default
	
if($mvcore['multi_dbs_supp'] == 'on') {
	
	if($_POST['database_load'] != '') {
		$_SESSION['database_load'] = $_POST['database_load']; // Saving POST In Session
		$db_name_multi = $_SESSION['database_load']; //Multi DB Support
		$db_name_multi_news = $_SESSION['database_load']; //Default
		$db_name_multi_item = $_SESSION['database_load']; //Default
		$db_name_multi_annon = $_SESSION['database_load']; //Default
	} else {
		$db_name_multi = $_SESSION['database_load']; //Multi DB Support
		$db_name_multi_news = $_SESSION['database_load']; //Default
		$db_name_multi_item = $_SESSION['database_load']; //Default
		$db_name_multi_annon = $_SESSION['database_load']; //Default
	};
	
	if($_POST['database_load'] == '' && $_SESSION['database_load'] == '') {
		$db_name_multi = $mvcore['db_name']; //Default
		$db_name_multi_news = $mvcore['db_name']; //Default
		$db_name_multi_item = $mvcore['db_name']; //Default
		$db_name_multi_annon = $mvcore['db_name']; //Default
	}
	
};

if(!file_exists("system/engine_configs".$db_name_multi."")) {
	$dirFrom = 'system/engine_configsDefault/';
	$dirTo = 'system/engine_configs'.$db_name_multi.'/';
	recurse_copy($dirFrom,$dirTo);
};

if(!file_exists("system/engine_ndb".$db_name_multi."")) {
	$dirFromn = 'system/engine_ndbDefault/';
	$dirTon = 'system/engine_ndb'.$db_name_multi.'/';
	recurse_copy($dirFromn,$dirTon);
};

if(!file_exists("system/engine_item_configs".$db_name_multi."")) {
	$dirFromi = 'system/engine_item_configsDefault/';
	$dirToi = 'system/engine_item_configs'.$db_name_multi.'/';
	recurse_copy($dirFromi,$dirToi);
};

if(!file_exists("system/engine_annou".$db_name_multi."")) {
	$dirFromi = 'system/engine_annouDefault/';
	$dirToi = 'system/engine_annou'.$db_name_multi.'/';
	recurse_copy($dirFromi,$dirToi);
};

//------------------------------------------------------------------
// -== Website Configs ==- //
	//Main Settings
	require('system/me_database_support.php');
	require('system/engine_configs'.$db_name_multi.'/md5_support.php');
	require('system/engine_configs'.$db_name_multi.'/db_season.php');
	require('system/engine_configs'.$db_name_multi.'/txt_note.php');
	require('system/engine_configs'.$db_name_multi.'/vote_bonus_cnf.php');
	require('system/engine_configs'.$db_name_multi.'/shop_drop_date.php');
	require('system/engine_configs'.$db_name_multi.'/lucknum_auto_cnf.php');
	require('system/engine_configs'.$db_name_multi.'/main_engine_settings.php');
	require('system/engine_configs'.$db_name_multi.'/enable_disable_pages_main.php');
	require('system/engine_configs'.$db_name_multi.'/enable_disable_pages_game_panel.php');
	require('system/engine_configs'.$db_name_multi.'/enable_disable_pages_game_master_panel.php');
	require('system/engine_configs'.$db_name_multi.'/game_master_settings.php');
	require('system/engine_configs'.$db_name_multi.'/vote_bonus_cnf.php');
	require('system/engine_configs'.$db_name_multi.'/vote_topv_cnf.php');
	require('system/engine_configs'.$db_name_multi.'/vote_settings.php');
	require('system/engine_configs'.$db_name_multi.'/top_voter_settings.php');
	require('system/engine_configs'.$db_name_multi.'/vote_bonus_settings.php');
	require('system/engine_configs'.$db_name_multi.'/Social_Settings.php');
	require('system/engine_configs'.$db_name_multi.'/announce_settings.php');
	require('system/engine_configs'.$db_name_multi.'/register_rule_settings.php');
	require('system/engine_configs'.$db_name_multi.'/exchange_system_settings.php');
	require('system/engine_configs'.$db_name_multi.'/lottery_system_settings.php');
	require('system/engine_configs'.$db_name_multi.'/reCAPTCHA.php');
	require('system/engine_configs'.$db_name_multi.'/top_entry_webshop_settings.php');
	require('system/engine_configs'.$db_name_multi.'/game_master_buy_settings.php');
	require('system/engine_configs'.$db_name_multi.'/game_master_rule_settings.php');
	require('system/engine_configs'.$db_name_multi.'/Friend_System_settings.php');
	require('system/engine_configs'.$db_name_multi.'/item_hide_settings.php');
	require('system/engine_configs'.$db_name_multi.'/caslte_siege_settings.php');
	require('system/engine_configs'.$db_name_multi.'/Advertise_Settings.php');
	require('system/engine_configs'.$db_name_multi.'/admincp_msg_output.php');
	require('system/engine_configs'.$db_name_multi.'/License_Expire_info.php');
	require('system/engine_configs'.$db_name_multi.'/My_Sponsor_settings.php');
	require('system/engine_configs'.$db_name_multi.'/scramble_event_settings.php');
	require('system/engine_configs'.$db_name_multi.'/news_settings.php');
	require('system/engine_configs'.$db_name_multi.'/forum_pt_settings.php');
	require('system/engine_configs'.$db_name_multi.'/Register_Page_Settings.php');
	require('system/engine_configs'.$db_name_multi.'/ItemSetType_Size.php');
	require('system/engine_configs'.$db_name_multi.'/ItemSetOption_Size.php');
	require('system/engine_configs'.$db_name_multi.'/Item_Size.php');
	require('system/engine_configs'.$db_name_multi.'/db_rr_gr_column_names.php');
	require('system/engine_configs'.$db_name_multi.'/item_max_ad_opt.php');
	require('system/engine_configs'.$db_name_multi.'/Poll_Vote_Settings.php');
	require('system/engine_configs'.$db_name_multi.'/Poll_DB_Data.php');
	require('system/engine_configs'.$db_name_multi.'/SMTP_Settings.php');
	require('system/engine_configs'.$db_name_multi.'/validation_timer.php');
	
	//Game Panel Settings
	require('system/engine_configs'.$db_name_multi.'/gp_add_stats.php');
	require('system/engine_configs'.$db_name_multi.'/gp_buy_level_up_points.php');
	require('system/engine_configs'.$db_name_multi.'/gp_change_class_settings.php');
	require('system/engine_configs'.$db_name_multi.'/gp_clear_pk.php');
	require('system/engine_configs'.$db_name_multi.'/gp_grand_reset_settings.php');
	require('system/engine_configs'.$db_name_multi.'/gp_rename_character.php');
	require('system/engine_configs'.$db_name_multi.'/gp_reset_character.php');
	require('system/engine_configs'.$db_name_multi.'/gp_buy_level.php');
	require('system/engine_configs'.$db_name_multi.'/gp_reset_skilltree.php');
	require('system/engine_configs'.$db_name_multi.'/gp_reset_stats.php');
	require('system/engine_configs'.$db_name_multi.'/gp_warp_character.php');
	require('system/engine_configs'.$db_name_multi.'/gp_sell_free_stats.php');
	require('system/engine_configs'.$db_name_multi.'/gp_master_grand_reset.php');
	require('system/engine_configs'.$db_name_multi.'/gp_clear_inventory.php');

	//Payment System Settings
	require('system/engine_configs'.$db_name_multi.'/paypal_settings.php');
	require('system/engine_configs'.$db_name_multi.'/paygol_settings.php');
	require('system/engine_configs'.$db_name_multi.'/paymentwall_settings.php');
	require('system/engine_configs'.$db_name_multi.'/super_rewards_settings.php');
	require('system/engine_configs'.$db_name_multi.'/smscoin_settings.php');
	require('system/engine_configs'.$db_name_multi.'/fortumo_settings.php');
	require('system/engine_configs'.$db_name_multi.'/pagseguro_settings.php');
	require('system/engine_configs'.$db_name_multi.'/interkassa_settings.php');
	
	//Webshop & Market Settings
	require('system/engine_configs'.$db_name_multi.'/item_upgrade_settings.php');
	require('system/engine_configs'.$db_name_multi.'/market_settings.php');
	require('system/engine_configs'.$db_name_multi.'/market_page_settings.php');
	require('system/engine_configs'.$db_name_multi.'/webshop_settings.php');
	require('system/engine_configs'.$db_name_multi.'/webshop_page_settings.php');
	require('system/engine_configs'.$db_name_multi.'/item_max_level.php');
	require('system/engine_configs'.$db_name_multi.'/max_excellent_options.php');
	require('system/engine_configs'.$db_name_multi.'/max_socket_options.php');
	require('system/engine_configs'.$db_name_multi.'/Ancient_Exchange_Settings.php');
	
	//Vip Settings
	require('system/engine_configs'.$db_name_multi.'/vip_main_settings.php');
	require('system/engine_configs'.$db_name_multi.'/vip_server_settings.php');
	require('system/engine_configs'.$db_name_multi.'/vip_website_settings.php');
	
	//Table Settings
	require('system/engine_configs'.$db_name_multi.'/Gens_table_Settings.php');
	require('system/engine_configs'.$db_name_multi.'/SkillTree_table_Settings.php');
	require('system/engine_configs'.$db_name_multi.'/Credits_table_Settings.php');
	require('system/engine_configs'.$db_name_multi.'/wCoins_table_Settings.php');
	
	//Image Settings
	require('system/engine_configs'.$db_name_multi.'/slider_img_count.php');
	
if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/slider_image_settings.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/slider_image_settings.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/slider_image_settings.php'); // Uniqe For Each Theme
};

	require('system/engine_configs'.$db_name_multi.'/gallery_image_settings.php');
//------------------------------------------------------------------
// -== Styling Configs ==- //
if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/table_styling.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/table_styling.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/table_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/button_styling.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/button_styling.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/button_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/news_styling.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/news_styling.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/news_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/input_select_styling.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/input_select_styling.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/input_select_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/webshop_styling.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/webshop_styling.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/webshop_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/game_panel_styling.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/game_panel_styling.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/game_panel_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/announce_styling.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/announce_styling.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/announce_styling.php'); // Uniqe For Each Theme
};

if (!file_exists('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/preview_background.php')) { // Checking If Exists
	require('system/engine_configs'.$db_name_multi.'/styling/preview_background.php'); // Default
} else {
	require('themes/'.$mvcore['theme_dir'].'/MvCoreStyling/preview_background.php'); // Uniqe For Each Theme
};
//------------------------------------------------------------------
// -== License System unPACKING ==- //

//Removed

$License_Expire = '( Never Expire )'; // License Expire output
$data .="\$mvcore['licExpInfo'] = \"".$License_Expire."\";\n";

//------------------------------------------------------------------
// -== Website Version File ==- //
require('system/engine_ver.php'); // Website Version File
//------------------------------------------------------------------
// -== Database Connection ==- //
function connection($dbServername, $dbUsername, $dbPassword, $db_name_multi) {
    $connection = new PDO("sqlsrv:server=$dbServername;Database=$db_name_multi", $dbUsername, $dbPassword);
    $connection->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES, false
    );
    return $connection;
}

$dbServername = $mvcore['db_host'];
$dbUsername = $mvcore['db_user'];
$dbPassword = $mvcore['db_pass'];

$mvcorex = connection($dbServername, $dbUsername, $dbPassword, $db_name_multi);

	$db_name_drop = $db_name_multi; //Database Name

	if($mvcore['medb_supp'] == 'yes') { 
		$mvcore_medb_i = ''.$mvcore['medb_name'].'.dbo.MEMB_INFO';
		$mvcore_medb_s = ''.$mvcore['medb_name'].'.dbo.MEMB_STAT';
		$dbname_newd = ''.$mvcore['medb_name'].'';
	} else {
		$mvcore_medb_i = ''.$db_name_multi.'.dbo.MEMB_INFO';
		$mvcore_medb_s = ''.$db_name_multi.'.dbo.MEMB_STAT';
		$dbname_newd = ''.$db_name_multi.'';
	};
			
if(!$mvcorex){
	include('system/error_page.php');
	define("LOG_FILE_DBCONERROR", "system/engine_logs/Database_Connection_error.log"); // Log Save
	error_log(date('[Y-m-d H:i e] '). "Database: ".$db_name_drop." Error: ".database_connect_info." ". PHP_EOL, 3, LOG_FILE_DBCONERROR);
	mvcore_error(''.database_connect_info.'', '<font color="black"><b>'.database_reasons.'</b><br>1) '.database_reason1.'<br>2) '.database_reason2.'<br>2) '.database_reason3.'</font>');
	exit;
};
//------------------------------------------------------------------
// -== Item Data Convert System ==- //
//include('system/engine_iconv.php');
//------------------------------------------------------------------
// -== Logout ==- //
if($_GET['op1'] == 'exitacc') {
	unset($_SESSION['username']); 
	unset($_SESSION['user_login']);
	unset($_SESSION['admin_panel']); 
	unset($_SESSION['gm_panel']);
	header('Location: -id-News.html'); 
};
//------------------------------------------------------------------
// -== Check VIP ==- //
$quardy = $mvcorex->prepare('SELECT memb___id, mvc_vip_date from '.$mvcore_medb_i.' where memb___id = "'.$_SESSION['username']
    .'"');
$quary_drop = $quardy->fetchAll(PDO::FETCH_ASSOC);


if( $quary_drop[1] > time()){ // VIP SYS
	$mvcore['vip_sys_active'] = '1';
} else {
	$mvcore['vip_sys_active'] = '0';
	$edit_site = $mvcorex->prepare("UPDATE ".$mvcore_medb_i." SET mvc_vip_date = '0' WHERE memb___id = '".$_SESSION['username']."'");
};
//------------------------------------------------------------------
// -== VIP file username remove on expire ==- //
if($mvcore['vip_file_insert_onoff'] == 'on') {
	$sys_startadssdf = mssql_query("select ".$mvcore['vip_col1_name'].",".$mvcore['vip_col2_name'].",".$mvcore['vip_user_name']." from ".$mvcore['vip_table_name']." where ".$mvcore['vip_user_name']." = '".$_SESSION['username']."'");
	$drop_infoertjrds = mssql_fetch_row($sys_startadssdf);

	if($mvcore['vip_col2_val'] == '1') { if($drop_infoertjrds[0] >= '1' && $drop_infoertjrds[1] <= date("Y-m-d H:i:s",time())) { $esrror = '1'; } else { $esrror = '0'; }; } //getdate
	elseif($mvcore['vip_col2_val'] == '3') { if($drop_infoertjrds[0] >= '1' && $drop_infoertjrds[1] <= date("Y-d-m H:i:s",time())) { $esrror = '1'; } else { $esrror = '0'; }; } //getdate
	else { if($drop_infoertjrds[0] >= '1' && $drop_infoertjrds[1] <= time()) { $esrror = '1'; } else { $esrror = '0'; }; }; //timestamp

	if($esrror >= '1') {
		//Remove username from file.
		$file_path = $mvcore['vip_file_path'];
		$new_dbew = file_get_contents($file_path);
		$new_db = fopen($file_path, "w");
		$data = str_replace($drop_infoertjrds[2],'',$new_dbew);
		fwrite($new_db,$data);
		fclose($new_db); chmod($file_path, 0777);
	};
};
//------------------------------------------------------------------
// -== Main Login Checking ==- //
if(isset($_POST['loginacc'])) {
	$send_login = checklogin($_POST['usern'],$_POST['passn'],$mvcore['md5_support'],$mvcore_medb_i,$mvcore['go_to_page'],$_GET['op1'],$mvcore['md5_hash_o'],$mvcore['md5_hs_salt'], $mvcorex);
	
	if($send_login == '1'){
	    header('Location: -id-Login-id-er1.html');

	}
	if($send_login == '2'){
	    header('Location: -id-Login-id-er2.html');

	}

}
//------------------------------------------------------------------
// -== Check User Name & Pass ==- //
function checklogin($get_user,$getpass,$iMd5,$nmedb_data,$goToPage,$getdata,$mdformat,$mdsalt){
	global $mvcorex;
	define("LOG_FILE_UserLogin", "system/engine_logs/User_Login.log"); // Log Save
	
	if($iMd5 == 'yes') {  //MD5
	
		if($get_user == '' && $getpass == '') {
		    return 1;

		} else {
			
				if($mdformat == 'pw') { $pass_hash = hash('md5', $getpass); } 
				elseif($mdformat == 'pw_ur') { $pass_hash = hash('md5', $getpass.$get_user); } 
				elseif($mdformat == 'ur_pw') { $pass_hash = hash('md5', $get_user.$getpass); } 
				elseif($mdformat == 'pw_sal') { $pass_hash = hash('md5', $getpass.$mdsalt); }
				elseif($mdformat == 'pw_ur_sal') { $pass_hash = hash('md5', $getpass.$get_user.$mdsalt); } 
				elseif($mdformat == 'ur_pw_sal') { $pass_hash = hash('md5', $get_user.$getpass.$mdsalt); } 
				elseif($mdformat == 'dbo_fn_md5') { $pass_hash = "dbo.fn_md5('".$getpass."','".$get_user."')"; }
				else { $pass_hash = hash('md5', $getpass); } 
					
				if($mdformat == 'dbo_fn_md5') {
					$quardys = $mvcorex->prepare("SELECT memb__pwd, memb___id, mvc_vip_date,smtp_block from "
                        .$nmedb_data." where memb___id = '".$get_user."' and memb__pwd = ".$pass_hash."");
					$stmt = $quardys->execute();
                    $stmt = $quardys->fetchAll(PDO::FETCH_BOTH);
					$quary_dropsa = $stmt;
					
					if($quary_dropsa[3] == '1') {} else {
						if($quary_dropsa[0] != '' && $quary_dropsa[1] != ''){
						$_SESSION['username'] = $get_user;
						$_SESSION['user_login'] = 'ok';
						
						$send_admin = checkAdmin($get_user,$nmedb_data);
						$send_gm = checkGM($get_user,$nmedb_data);
						
							error_log(date('[Y-m-d H:i e] '). "MD5 User: ".$get_user." - ( Logged In With ID ".$_SERVER['REMOTE_ADDR']." )". PHP_EOL, 3, LOG_FILE_UserLogin);
						
							$ip_got = getUserIP();
							$update_user_ip = $mvcorex->prepare("UPDATE ".$nmedb_data." set acc_ip = '".$ip_got."' where memb___id = '".$get_user."'");
                            $update_user_ip->execute();
						
							if($goToPage == 'curp' || $goToPage == '') {
							    header('Location: -id-'.$getdata.'.html'); } else { header('Location: -id-'.$goToPage.'.html');
							};
							
						} else {
						    return 2;

						};
					};
					
				} else {
					$quardys = $mvcorex->prepare("SELECT memb___id, mvc_vip_date, smtp_block from ".$nmedb_data." where memb___id = '".$get_user."'");
					$stmt = $quardys->execute();
					$stmt = $quardys->fetchAll(PDO::FETCH_BOTH);
					$quary_dropsa = $stmt;
					
					$sqll= $mvcorex->prepare("declare @mdpasscheck varbinary(16); set @mdpasscheck = (select memb__pwd from "
                        .$nmedb_data." where memb___id='".$get_user."'); print @mdpasscheck;"); $mdPass = mssql_get_last_message(); $mdPass = substr($mdPass,2);
                        $stmt = $sqll->execute();
                        $stmt = $sqll->fetchAll(PDO::FETCH_BOTH);
                        $sqll = $stmt;
					
					if($quary_dropsa[2] == '1') {} else {
						if(strtoupper($pass_hash) == strtoupper($mdPass)){
						$_SESSION['username'] = $get_user;
						$_SESSION['user_login'] = 'ok';
						
						$send_admin = checkAdmin($get_user,$nmedb_data);
						$send_gm = checkGM($get_user,$nmedb_data);
						
							error_log(date('[Y-m-d H:i e] '). "MD5 User: ".$get_user." - ( Logged In With ID ".$_SERVER['REMOTE_ADDR']." )". PHP_EOL, 3, LOG_FILE_UserLogin);
						
							$ip_got = getUserIP();
							$update_user_ip = mssql_query("UPDATE ".$nmedb_data." set acc_ip = '".$ip_got."' where memb___id = '".$get_user."'");
						
							if($goToPage == 'curp' || $goToPage == '') { header('Location: -id-'.$getdata.'.html'); } else { header('Location: -id-'.$goToPage.'.html'); };
							
						} else { return 2; };
					};
				};
			}
			
	} else {
		
		if($get_user == '' && $getpass == '') { return 1;
		} else {
				$quary = $mvcorex->prepare("SELECT memb__pwd, memb___id, mvc_vip_date,smtp_block from ".$nmedb_data." where memb___id = '".$get_user."'");
				$stmt = $quary->execute();
				$stmt = $quary->fetch();
				$quary_drop = $stmt;

				print '<pre>'; print_r($quary_drop); print '</pre>';

				if($quary_drop[3] == '1') {

                } else {
					if($getpass == $quary_drop[0] && $quary_drop[1] != ''){
					$_SESSION['username'] = $get_user;
					$_SESSION['user_login'] = 'ok';
					
					$send_admin = checkAdmin($get_user, $nmedb_data, $mvcorex);
					$send_gm = checkGM($get_user, $nmedb_data, $mvcorex);
						
						error_log(date('[Y-m-d H:i e] '). "Non-MD5 User: ".$get_user." - ( Logged In With ID ".$_SERVER['REMOTE_ADDR']." )". PHP_EOL, 3, LOG_FILE_UserLogin);
					
						$ip_got = getUserIP();
						$update_user_ip = $mvcorex->prepare("UPDATE ".$nmedb_data." set acc_ip = '".$ip_got."' where memb___id = '".$get_user."'");
						$stmt = $update_user_ip->execute();
					
						if($goToPage == 'curp' || $goToPage == '') { header('Location: -id-'.$getdata.'.html'); } else { header('Location: -id-'.$goToPage.'.html'); };
						
					} else { return 2; };
				};
				
			}
			
	}
}
//------------------------------------------------------------------
// -== Disable Advertise If Webshop Page (Prevents Cost Loading Delay) ==- //
if($_GET['op1'] == 'Webshop') {
$mvcore['ads_spt_728x90'] = "";
$mvcore['ads_spt_468x60'] = "";
$mvcore['ads_spt_336x280'] = "";
$mvcore['ads_spt_320x100'] = "";
$mvcore['ads_spt_300x600'] = "";
$mvcore['ads_spt_300x250'] = "";
} else {};
//------------------------------------------------------------------
// -== Check Admin Access ==- //

function checkAdmin($user, $nmedb_data, $mvcorex) {

	define("LOG_FILE_AdminLogin", "system/engine_logs/Admin_Login.log"); // Log Save
	
	$user = stripSTCheck($user);
	
	if($user == '') {
	    echo'';
	} else {
		$quary = $mvcorex->prepare("SELECT admincp from ".$nmedb_data." where memb___id = '".$user."'");
		$stmt = $quary->execute();
		$stmt = $quary->fetch();
        $quary_drop = $stmt;

			if ($quary_drop[0] == '1'){
				$_SESSION['admin_panel'] = 'ok';
				$_SESSION['gm_panel'] = 'ok';
				error_log(date('[Y-m-d H:i e] '). "Admin: ".$user." - ( Logged In With ID ".$_SERVER['REMOTE_ADDR']." )". PHP_EOL, 3, LOG_FILE_AdminLogin);
			} else {

            };
	}
}
//------------------------------------------------------------------
// -== Check Game Master Access ==- //
function checkGM($user,$nmedb_data, $mvcorex) {
	define("LOG_FILE_GMLogin", "system/engine_logs/GM_Login.log"); // Log Save
	
	$user = stripSTCheck($user);
	
	if($user == '') {
	    echo'';
	} else {
		$quary = $mvcorex->prepare("SELECT admincp from ".$nmedb_data." where memb___id = '".$user."'");
		$stmt = $quary->execute();
        $stmt = $quary->fetch();
		$quary_drop = $stmt;

			if ($quary_drop[0] == '2'){
				$_SESSION['gm_panel'] = 'ok';
				error_log(date('[Y-m-d H:i e] '). "GM: ".$user." - ( Logged In With ID ".$_SERVER['REMOTE_ADDR']." )". PHP_EOL, 3, LOG_FILE_GMLogin);
			} else { };
	}
}
//------------------------------------------------------------------
// -== Check Login Admin, User, Gm & Logout If Doesnt Exist In DB Anymore. ==- //
	$userrjtrejej = $_SESSION['username'];
	if($userrjtrejej == '') { } else {
		$quarysd = $mvcorex->prepare("SELECT admincp from ".$mvcore_medb_i." where memb___id = '".$userrjtrejej."'");
        $stmt = $quarysd->execute();
        $stmt = $quarysd->fetch();
		$quary_dropwge = $stmt;

			if ($quary_dropwge[0] == '0'){
			} else {
				if ($quary_dropwge[0] == '2'){
				} else {
					if ($quary_dropwge[0] == '1'){
					} else {
						unset($_SESSION['username']); 
						unset($_SESSION['user_login']);
						unset($_SESSION['admin_panel']); 
						unset($_SESSION['gm_panel']);
						header('Location: -id-News.html');
					};
				};
			};
	}
//------------------------------------------------------------------
// -== Lottery System ==- //
if($mvcore['lot_lucky_num'] == '' || $mvcore['lot_lucky_num'] == '0') {
//Random digits
function luckyNumber($length = 2) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

				$new_db = fopen("system/engine_configs".$db_name_multi."/lucknum_auto_cnf.php", "w"); //configs patch 
				$data = "<?php\n";
				$data .="\$mvcore['lot_lucky_num'] = \"".luckyNumber()."\";\n";
				$data .="?>";
				fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$db_name_multi."/lucknum_auto_cnf.php", 0777);
};
//------------------------------------------------------------------
// -== Account Info Send ==- //
$check_acc_logind = $mvcorex->prepare("select acc_info_text from ".$mvcore_medb_i." where memb___id = '"
    .$_SESSION['username']."'");
$check_acc_logind_out = $check_acc_logind->fetchAll(PDO::FETCH_ASSOC);


if($check_acc_logind_out[0] != '' && $check_acc_logind_out[0] != ' ' && $_SESSION['user_login'] == 'ok') {
	if($check_acc_logind_out[0] == NULL) { } else {
		echo '<div class="msg_stu_bg">
				<div class="msg_sent_to_user" align="center" style="padding-top:30px;">
					<font color="red" size="4">'.$check_acc_logind_out[0].'</font> <a href="-id-exitacc.html"><font color="white"><b>'.theme_link_logout.'</b></font></a>
				</div>
			</div>';
	}
};
//------------------------------------------------------------------
// -== Language Change ==- //
if($_GET['op1'] == 'langc'){
		$_SESSION['mvcoreLang'] = $_GET['op2'];
		header('Location: '.$_SERVER['HTTP_REFERER'].'');
};
if($_POST['mvclangc'] != ''){
		$_SESSION['mvcoreLang'] = $_POST['mvclangc'];
		header('Location: '.$_SERVER['HTTP_REFERER'].'');
};
//------------------------------------------------------------------
// -== Webshop Discount Start Script ==- //
if($mvcore['shop_disc'] == 'on') {
	
		$date_calc = $mvcore['shop_new_date'];
		
			$convertTimedwd = date("Y-m-d",time());
			$convertNewTimedwd = date("Y-m-d",$mvcore['shop_new_date']);
			
			if($mvcore['shop_disc_start'] != '1'){ $OutPutDateOfDisct = date('l jS \of F Y',$date_calc); } else { $OutPutDateOfDisct = ''; }
		if( $convertTimedwd >= $convertNewTimedwd){
			
			$convertTime = date("g:i a",time());
			$convertNewTime = date("g:i a",$mvcore['shop_start_at']);

			$to5m = $mvcore['shop_start_at'] - 300;
			$convertNewTimes = date("g:i a",$to5m);
			
			if( $convertTime >= $convertNewTimes ){
				$mvcore['shop_disc_b5m_start'] = '1';
					if($mvcore['shop_disc_start'] == '1'){
						$mvcore['shop_disc_b5m_start'] = '0';
					}
			};
				
			if( $convertTime >= $convertNewTime ){ // Start AT
				//Do Process
					$mvcore['shop_disc_start'] = '1';
				//END
				
				//Set Timeout
					$time_nes = $date_calc + $mvcore['shop_disc_start'];
				//END
					
				if( time() >= $time_nes ){
							$DayName = date('l',time());

						if($DayName == 'Monday') {
							if($mvcore['shop_dayname'] == 'Monday') { $DayCalcD = time(); }
							elseif($mvcore['shop_dayname'] == 'Tuesday') { $DayCalcD = time() + 86400; }
							elseif($mvcore['shop_dayname'] == 'Wednesday') { $DayCalcD = time() + 172800; }
							elseif($mvcore['shop_dayname'] == 'Thursday') { $DayCalcD = time() + 259200; }
							elseif($mvcore['shop_dayname'] == 'Friday') { $DayCalcD = time() + 345600; }
							elseif($mvcore['shop_dayname'] == 'Saturday') { $DayCalcD = time() + 432000; }
							elseif($mvcore['shop_dayname'] == 'Sunday') { $DayCalcD = time() + 518400; };
						}
						elseif($DayName == 'Tuesday') {
							if($mvcore['shop_dayname'] == 'Monday') { $DayCalcD = time() - 86400; }
							elseif($mvcore['shop_dayname'] == 'Tuesday') { $DayCalcD = time(); }
							elseif($mvcore['shop_dayname'] == 'Wednesday') { $DayCalcD = time() + 86400; }
							elseif($mvcore['shop_dayname'] == 'Thursday') { $DayCalcD = time() + 172800; }
							elseif($mvcore['shop_dayname'] == 'Friday') { $DayCalcD = time() + 259200; }
							elseif($mvcore['shop_dayname'] == 'Saturday') { $DayCalcD = time() + 345600; }
							elseif($mvcore['shop_dayname'] == 'Sunday') { $DayCalcD = time() + 432000; };
						}
						elseif($DayName == 'Wednesday') {
							if($mvcore['shop_dayname'] == 'Monday') { $DayCalcD = time() - 172800; }
							elseif($mvcore['shop_dayname'] == 'Tuesday') { $DayCalcD = time() - 86400; }
							elseif($mvcore['shop_dayname'] == 'Wednesday') { $DayCalcD = time(); }
							elseif($mvcore['shop_dayname'] == 'Thursday') { $DayCalcD = time() + 86400; }
							elseif($mvcore['shop_dayname'] == 'Friday') { $DayCalcD = time() + 172800; }
							elseif($mvcore['shop_dayname'] == 'Saturday') { $DayCalcD = time() + 259200; }
							elseif($mvcore['shop_dayname'] == 'Sunday') { $DayCalcD = time() + 345600; };
						}
						elseif($DayName == 'Thursday') {
							if($mvcore['shop_dayname'] == 'Monday') { $DayCalcD = time() - 259200; }
							elseif($mvcore['shop_dayname'] == 'Tuesday') { $DayCalcD = time() - 172800; }
							elseif($mvcore['shop_dayname'] == 'Wednesday') { $DayCalcD = time() - 86400; }
							elseif($mvcore['shop_dayname'] == 'Thursday') { $DayCalcD = time(); }
							elseif($mvcore['shop_dayname'] == 'Friday') { $DayCalcD = time() + 86400; }
							elseif($mvcore['shop_dayname'] == 'Saturday') { $DayCalcD = time() + 172800; }
							elseif($mvcore['shop_dayname'] == 'Sunday') { $DayCalcD = time() + 259200; };
						}
						elseif($DayName == 'Friday') {
							if($mvcore['shop_dayname'] == 'Monday') { $DayCalcD = time() - 345600; }
							elseif($mvcore['shop_dayname'] == 'Tuesday') { $DayCalcD = time() - 259200; }
							elseif($mvcore['shop_dayname'] == 'Wednesday') { $DayCalcD = time() - 172800; }
							elseif($mvcore['shop_dayname'] == 'Thursday') { $DayCalcD = time() - 86400; }
							elseif($mvcore['shop_dayname'] == 'Friday') { $DayCalcD = time(); }
							elseif($mvcore['shop_dayname'] == 'Saturday') { $DayCalcD = time() + 86400; }
							elseif($mvcore['shop_dayname'] == 'Sunday') { $DayCalcD = time() + 172800; };
						}
						elseif($DayName == 'Saturday') {
							if($mvcore['shop_dayname'] == 'Monday') { $DayCalcD = time() - 432000; }
							elseif($mvcore['shop_dayname'] == 'Tuesday') { $DayCalcD = time() - 345600; }
							elseif($mvcore['shop_dayname'] == 'Wednesday') { $DayCalcD = time() - 259200; }
							elseif($mvcore['shop_dayname'] == 'Thursday') { $DayCalcD = time() - 172800; }
							elseif($mvcore['shop_dayname'] == 'Friday') { $DayCalcD = time() - 86400; }
							elseif($mvcore['shop_dayname'] == 'Saturday') { $DayCalcD = time(); }
							elseif($mvcore['shop_dayname'] == 'Sunday') { $DayCalcD = time() + 86400; };
						}
						elseif($DayName == 'Sunday') {
							if($mvcore['shop_dayname'] == 'Monday') { $DayCalcD = time() - 518400; }
							elseif($mvcore['shop_dayname'] == 'Tuesday') { $DayCalcD = time() - 432000; }
							elseif($mvcore['shop_dayname'] == 'Wednesday') { $DayCalcD = time() - 345600; }
							elseif($mvcore['shop_dayname'] == 'Thursday') { $DayCalcD = time() - 259200; }
							elseif($mvcore['shop_dayname'] == 'Friday') { $DayCalcD = time() - 172800; }
							elseif($mvcore['shop_dayname'] == 'Saturday') { $DayCalcD = time() - 86400; }
							elseif($mvcore['shop_dayname'] == 'Sunday') { $DayCalcD = time(); };
						};

						$update_this = $DayCalcD + $mvcore['shop_interv'] - $mvcore['shop_disc_start'];
						
					$new_db = fopen("system/engine_configs".$db_name_multi."/shop_drop_date.php", "w"); //configs patch 
					$data = "<?php\n";
					$data .="\$mvcore['shop_new_date'] = \"".$update_this."\";\n";
					$data .="?>";
					fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$db_name_multi."/shop_drop_date.php", 0777);
				};
			};
			
		};
		
};
//------------------------------------------------------------------
// -== Automatic Unban System ==- //
//$realtime = time();
//$banselectsa = $mvcorex->prepare("Select name,type,unban_date from MVCore_Banned_PPL where unban_date < ".$realtime."");
//for($i=0;$i < mssql_num_rows($banselectsa); ++$i) {
//$banselectsas = mssql_fetch_row($banselectsa);
//
//
//		if($realtime > $banselectsas[2] && $banselectsas[2] != '0'){
//				if($banselectsas[1] == '1') {
//					$edit_site = mssql_query("Update ".$mvcore_medb_i." set bloc_code = 0 where memb___id='".$banselectsas[0]."'");
//				} elseif($banselectsas[1] == '0') {
//					$edit_site = mssql_query("Update character set CtlCode = 0 where name='".$banselectsas[0]."'");
//				};
//					$edit_site = mssql_query("delete from MVCore_Banned_PPL where name ='".$banselectsas[0]."'");
//		}
//};
//------------------------------------------------------------------
// -== Automatic GM Status Remove ==- //
//$gm_kicking = mssql_query("select name,accountId,GM_ExpireD from character where GM_ExpireD >= '1'");
//$gm_kicking_check = mssql_fetch_row($gm_kicking);
//if($gm_kicking_check[2] <= time()){
//	$run_update = mssql_query("Update character set ctlcode = '0', GM_ExpireD = NULL where name = '".$gm_kicking_check[0]."'");
//	$run_update = mssql_query("Update ".$mvcore_medb_i." set admincp = '0' where memb___id = '".$gm_kicking_check[1]."'");
//}
//------------------------------------------------------------------
// -== Get File Size From Bytes ==- //
function human_filesize($bytes, $decimals = 2) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}
//------------------------------------------------------------------
// -== Multi DB System File Copy/Paste ==- //
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
//------------------------------------------------------------------
// -== Fake Account Create Script ==- //
$time_dctm = time() - 2629743;
if($mvcore['fake_acc_onoff'] == 'on') {
	$dctm_selc = mssql_query("select top ".$mvcore['fake_acc_count']." memb___id from memb_stat where DisConnectTM < '".date("Y-m-d H:i:s", $time_dctm)."' order by memb___id asc");
	for($i=0;$i < mssql_num_rows($dctm_selc);++$i) {
	$rowsfa = mssql_fetch_row($dctm_selc);
		$run_update = mssql_query("Update memb_stat set connectstat = '1', ServerName = 'fakeserv' where memb___id = '".$rowsfa[0]."'");
	};
} else { $run_update = $mvcorex->exec("Update memb_stat set connectstat = '0', ServerName = 'MVCore' where ServerName = 'fakeserv'"); };
//------------------------------------------------------------------
// -== Friend System Reward Script ==- //
if($_SESSION['user_login'] == 'ok') {
	$dctm_selcds = $mvcorex->prepare("SELECT top ".$mvcore['friend_sys_limit']." friend_uid,to_who_uid,date,friend_rewarded from MVCore_Friend_List where to_who_uid = '".$_SESSION['username']."' order by date desc");
	$stmt = $dctm_selcds->execute();
    $stmt = $dctm_selcds->fetchAll(PDO::FETCH_BOTH);
    $dctm_selcds = $stmt;
	for($i=0;$i < count($dctm_selcds);++$i) {
	$rowsfa = $dctm_selcds;
	
		$sys_startadss = mssql_query("select top 1 name,clevel,".$mvcore['rr_column_name'].",".$mvcore['gr_column_name']." from character where AccountID = '".$rowsfa[0]."' order by ".$mvcore['gr_column_name']." desc, ".$mvcore['rr_column_name']." desc, clevel desc");
		$drop_infdsao = mssql_fetch_row($sys_startadss);
		
		if($drop_infdsao[1] == '' || $drop_infdsao[2] == '') {} else { // Check if this account even has a character.
			if($mvcore['friend_sys_level_tgw'] == ''){ } else { if($drop_infdsao[1] >= $mvcore['friend_sys_level_tgw']) { } else { $error = '1'; }; };
			if($mvcore['friend_sys_reset_tgw'] == ''){ } else { if($drop_infdsao[2] >= $mvcore['friend_sys_reset_tgw']) { } else { $error = '1'; }; };
				
				if($mvcore['friend_sys_reset_tgw'] == '' && $mvcore['friend_sys_level_tgw'] == ''){ $error = '1'; }; // 1 must be active else dont reward...
				if($rowsfa[3] == '1'){ $error = '1'; }; // If Already Rewarded Then SKip
					
				if( $error >= '1' ) {} else {
					// Reset Only
					$run_update = mssql_query("Update MVCore_Friend_List set friend_rewarded = '1' where friend_uid = '".$rowsfa[0]."'");
					$RewardFriend = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$mvcore['friend_sys_inv_rew']."' where ".$mvcore['user_column']." ='".$rowsfa[0]."'"); //Invited
					$RewardFriend = mssql_query("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + '".$mvcore['friend_sys_reward']."' where ".$mvcore['user_column']." ='".$rowsfa[1]."'");
					$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$rowsfa[0]."','".$mvcore['friend_sys_inv_rew']."','0','From Friend System (Invited)','".time()."','0')"); //Invited
					$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$rowsfa[1]."','".$mvcore['friend_sys_reward']."','0','From Friend System','".time()."','0')");
				};
		};
		
	};
};
//------------------------------------------------------------------
// -== Time Decode From TimeStamp ==- //
function decode_time($s_t,$e_t,$type,$text){ 
	$difference = $e_t - $s_t; 
	$seconds = 0; 
	$hours = 0; 
	$minutes = 0; 
	
		if($difference % 86400 <= 0){ 
			$days = $difference / 86400; 
		};
		
		if($difference % 86400 > 0){ 
			$rest = ($difference % 86400); 
			$days = ($difference - $rest) / 86400; 
				if($rest % 3600 > 0){ 
					$rest_1 = ($rest % 3600); 
					$hours = ($rest - $rest_1) / 3600; 
						if($rest_1 % 60 > 0){ 
							$rest_2 = ($rest_1 % 60); 
							$minutes = ($rest_1 - $rest_2) / 60; 
							$seconds = $rest_2; 
						}else{
							$minutes = $rest_1 / 60; 
						}; 
				}
				else{ 
					$hours = $rest / 3600; 
				}; 
		};
		
		if($type == "short"){ 
			$time = (($days > 0) ? $days .' days ' : '' ). (($hours > 0 ) ? $hours .' h ' :'' ). (($minutes > 0 ) ? $minutes .' m ' :'' ). (($seconds > 0 ) ? $seconds .' s ' : ''). ((($seconds <= 0) AND ($minutes <= 0) AND ($hours <= 0) AND ($days <= 0)) ? $text : '');
		}
		else{ 
			$time = (($days > 0) ? $days .' days ' : '' ). (($hours > 0 ) ? $hours .' hours ' :'' ). (($minutes > 0 ) ? $minutes .' minutes ' :'' ). (($seconds > 0 ) ? $seconds .' seconds ' : ''). ((($seconds <= 0) AND ($minutes <= 0) AND ($hours <= 0) AND ($days <= 0)) ? $text : '');
		};
	return $time; 
}
//------------------------------------------------------------------
// -== Page Validation ==- //
$pvsCharacterView		="ok4581"; // Character View
$pvsItemUpgradeSystem	="ok6436"; // Item Upgrade System
$pvsMarket				="ok3472"; // Market
$pvsPaymentSystem		="ok6523"; // Payment System
$pvsRegister			="ok8125"; // Register
$pvsScrambleEvent		="ok7682"; // Scramble Event
$pvsWarehouse			="ok7844"; // Warehouse
$pvsWebshop				="ok4722"; // Webshop
$pvsAncientExchange		="ok7232"; // Ancient Exchange
//------------------------------------------------------------------
// -== Engine Post,Get Checking ==- //
function clean_variable($var)
{
	global $t_acps_skip;
	if($_GET['op1'] == 'admincp' && $_SESSION['admin_panel'] == 'ok' || $t_acps_skip == 'yes') {} else { 
		$var = preg_replace('/[^\p{L}\p{N}\_\ \-\@\=\%\/\+\&\.]/u', '', $var); // Something might not wirk properly with this
	};
	return $var;
}
//------------------------------------------------------------------
// -== Top Voter System ==- //
$winner_count = $mvcore['vote_top_top'];
$reward_wait = $mvcore['vote_top_int']; // Once a week 
$rewrite_reward = $mvcore['vote_top_reward'];

$realtime = time();
$newtime = $realtime + $reward_wait;

if($mvcore['vote_top_voters'] == '0' || $mvcore['vote_top_voters'] == '') {} else{
		if($realtime > $mvcore['vote_top_voters']) {

		
	//Start AT!!!
		$Conv_date1 = date("g:i a",time());
		$Conv_date2 = date("g:i a",$mvcore['vote_top_at']);
	if($Conv_date1 >= $Conv_date2) {
				
		//SPECIAL reward update script		
		if($mvcore['reward_sys_vote'] == '1') {
		    $run = $mvcorex->prepare("Update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + ".$rewrite_reward." where ".$mvcore['user_column']." IN ( SELECT TOP 10 username COLLATE DATABASE_DEFAULT FROM MVCore_Vote_Log GROUP BY username ORDER BY SUM(votes) DESC )");
		    $run->execute();
		} elseif($mvcore['reward_sys_vote'] == '2') {
		    $run = $mvcorex->prepare("Update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + ".$rewrite_reward." where ".$mvcore['user_column']." IN ( SELECT TOP 10 username COLLATE DATABASE_DEFAULT FROM MVCore_Vote_Log GROUP BY username ORDER BY SUM(votes) DESC )");
		    $run->execute();
		} elseif($mvcore['reward_sys_vote'] == '3') {
		    $run = $mvcorex->prepare("Update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." + ".$rewrite_reward." where ".$mvcore['user_column']." IN ( SELECT TOP 10 username COLLATE DATABASE_DEFAULT FROM MVCore_Vote_Log GROUP BY username ORDER BY SUM(votes) DESC )");
			$run = $mvcorex->prepare("Update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + ".$rewrite_reward." where ".$mvcore['user_column']." IN ( SELECT TOP 10 username COLLATE DATABASE_DEFAULT FROM MVCore_Vote_Log GROUP BY username ORDER BY SUM(votes) DESC )");
		    $run->execute();
		};
		//END Special

				$run = $mvcorex->prepare("delete from MVCore_Vote_Log");
				$run->execute();
				
					$new_db = fopen("system/engine_configs".$db_name_multi."/vote_topv_cnf.php", "w"); //configs patch 
					$data = "<?php\n";
					$data .="\$mvcore['vote_top_voters'] = \"".$newtime."\";\n";
					$data .="?>";
					fwrite($new_db,$data); fclose($new_db); chmod("system/engine_configs".$db_name_multi."/vote_topv_cnf.php", 0777);
			
	};
};
};
//------------------------------------------------------------------
// -== Update "My Sponsor" Database Data ==- //
$db_get_ms = $mvcorex->prepare("select msponsor_limit, msponsor_date from ".$mvcore_medb_i." where memb___id = '"
    .$_SESSION['username']."'");
$db_out_ms = $db_get_ms->fetchAll();
$t_DayIs = date("m.d.y",time()); 

if($db_out_ms[1] < $t_DayIs) {
	// Setup new limit & new date day.
	$runUp = $mvcorex->prepare("update ".$mvcore_medb_i." set msponsor_limit = '".$mvcore['ms_day_limit']."', msponsor_date = '"
        .$t_DayIs."' where memb___id = '".$_SESSION['username']."'");
};
//------------------------------------------------------------------
// -== Get User IP ==- //
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
//------------------------------------------------------------------	
// -== Drop GS Status ==- //


if($mvcore['gs_port'] == '') { $fn_serverStatus_GS = '<div color="red">'.gs_status_offline.'</div>'; } else {
    $fn_serverStatus_GS = chkServer($mvcore['gs_port']); };
if($mvcore['gs2_port'] == '') {
    $fn_serverStatus_GS2 = '<div color="red">'.gs_status_offline.'</div>';
} else {
    $fn_serverStatus_GS2 = chkServer($mvcore['gs2_port']);

};
if($mvcore['js_port'] == '') {
    $fn_serverStatus_JS = '<div color="red">'.gs_status_offline.'</div>';
} else {
    $fn_serverStatus_JS = chkServer($mvcore['js_port']);

};
if($mvcore['cs_port'] == '') {
    $fn_serverStatus_CS = '<div color="red">'.gs_status_offline.'</div>';

} else {
    $fn_serverStatus_CS = chkServer($mvcore['cs_port']);

};

if(substr($fn_serverStatus_GS,0,20) == '<div color="green">') {
    $fn_serverStatus_GS_true_false ='1';

} else {
    $fn_serverStatus_GS_true_false ='0';

};
if(substr($fn_serverStatus_GS2,0,20) == '<div color="green">') {
    $fn_serverStatus_GS2_true_false ='1';

} else {
    $fn_serverStatus_GS2_true_false ='0';

};
if(substr($fn_serverStatus_JS,0,20) == '<div color="green">') {
    $fn_serverStatus_JS_true_false ='1';

} else {
    $fn_serverStatus_JS_true_false ='0';

};
if(substr($fn_serverStatus_CS,0,20) == '<div color="green">') {
    $fn_serverStatus_CS_true_false ='1';

} else {
    $fn_serverStatus_CS_true_false ='0';

};

function chkServer($port)
	{  
			if (!$x = @fsockopen('127.0.0.1', $port,$ERROR_NO,$ERROR_STR,(float)0.2)) // attempt to connect
			{
				$datse = '<div color="red">'.gs_status_offline.'</div>';
			}
			else
			{
				$datse = '<div color="green">'.gs_status_online.'</div>';
				if ($x)
				{
					@fclose($x); //close connection
				}
			}
		return $datse;
	}
	
// -== Users Online ==- //
	$select_onln_usrs= $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_s." WHERE ConnectStat = '1'");
	$mvc_Users_online = $select_onln_usrs->fetchAll(PDO::FETCH_ASSOC);
	
// -== Account Credits ==- //
	$select_cred_checker= $mvcorex->prepare("Select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from "
        .$mvcore['credits_table']." where ".$mvcore['user_column']."='".$_SESSION['username']."'");
	$mvc_Money_credits= $select_cred_checker->fetch();
	if($mvc_Money_credits[0] == ''){
	    $mvc_Money_credits = '0';

	} else {
	    $mvc_Money_credits = $mvc_Money_credits[0];

	};
	
// -== Account Gold Credits ==- //
	$select_cred_chaseck= $mvcorex->prepare("Select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from "
        .$mvcore['credits_table']." where ".$mvcore['user_column']."='".$_SESSION['username']."'");
	$mvc_Money_goldcredits= $select_cred_chaseck->fetch();
	if($mvc_Money_goldcredits[1] == ''){
	    $mvc_Money_goldcredits = '0';

	} else {
	    $mvc_Money_goldcredits = $mvc_Money_goldcredits[1];

	};
	
// -== Account wCoins ==- //
	$select_charwc_infaso= $mvcorex->prepare("Select memb_guid,acc_ip from ".$mvcore_medb_i." where memb___id='"
        .$_SESSION['username']."'");
	$s_charwc_ias= $select_charwc_infaso->fetch();
	if($mvcore['guid_column'] == 'memb_guid'){
	    $fix_wcoins_useras = $s_charwc_ias[0];
	} else {
	    $fix_wcoins_useras = $_SESSION['username'];
	};
	$v_f_hfwew= $mvcorex->prepare("Select ".$mvcore['wcoins_column']." from ".$mvcore['wcoins_table']." where ".$mvcore['guid_column']."='".$fix_wcoins_useras."'");
	$mvc_Money_wcoins= $v_f_hfwew->fetch();
	if($mvc_Money_wcoins[0] == ''){
	    $mvc_Money_wcoins = '0';

	} else {
	    $mvc_Money_wcoins = $mvc_Money_wcoins[0];

	};
	
// -== Account Vault Zen ==- //
	$select_zen_chaseck= $mvcorex->prepare("Select money from warehouse where accountid ='".$_SESSION['username']."'");
	$mvc_Money_VaultZen= $select_zen_chaseck->fetchAll(PDO::FETCH_ASSOC);
	if($mvc_Money_VaultZen[0] == ''){
	    $mvc_Money_VaultZen = '0';

	} else {
	    $mvc_Money_VaultZen = $mvc_Money_VaultZen[0];

	};
	
// -== Total Account ==- //
	$total_accountsg = $mvcorex->prepare("SELECT * FROM ".$mvcore_medb_i."");
	$stmt = $total_accountsg->execute();
	$stmt = $total_accountsg->fetchAll();
	$mvc_total_Accounts = count($stmt);
	
// -== Total Characters ==- //
	$total_charactersg = $mvcorex->prepare("SELECT Name FROM Character");
	$stmt = $total_accountsg->execute();
	$stmt = $total_accountsg->fetchAll();
	$mvc_total_Characters = count($stmt);
	
// -== Total Guilds ==- //
	$total_guildsg = $mvcorex->prepare("SELECT G_Name FROM guild");
	$stmt = $total_guildsg->execute();
	$stmt = $total_guildsg->fetchAll();
	$mvc_total_Guilds = count($stmt);
//------------------------------------------------------------------
// -== 65k Stats Fix ==- //
function Show65kStats($stat_value) {
    if ($stat_value < 0) {
        $stat_value = $stat_value  + 65536; return $stat_value;

    }

    return $stat_value;
}
//------------------------------------------------------------------
// -== For TXT EDIT Strip Slashes ==- //
function stripslashes_deep($value){
	if(isset($value))
	{
		$value = is_array($value) ?
		array_map(' ', $value) :
		stripslashes($value);
	}
		
	return $value;
	
};
//------------------------------------------------------------------
// -== Get Host Domain ==- //

function returnedsd($value) {
	$elements = explode(',', $value);
	return trim(end($elements));
}
								
function GetHostDoamin() {
    $possibleHostSources = array('HTTP_X_FORWARDED_HOST', 'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR');
    $sourceTransformations = array(
        "HTTP_X_FORWARDED_HOST" => returnedsd($value)
    );
    $host = '';
    foreach ($possibleHostSources as $source)
    {
        if (!empty($host)) break;
        if (empty($_SERVER[$source])) continue;
        $host = $_SERVER[$source];
        if (array_key_exists($source, $sourceTransformations))
        {
            $host = $sourceTransformations[$source]($host);
        } 
    }

    // Remove port number from host
    $host = preg_replace('/:\d+$/', '', $host);

    return trim($host);
}
//------------------------------------------------------------------
// -== Email Send ==- //
function sendEmail($to,$subject,$body,$smtp_host,$smtp_username,$smtp_password,$smtp_encrypt,$smtp_port,$smtp_sender_mail,$smtp_sender_title)
{
	require 'system\engine_plugins\PHPMailer-master\PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = $smtp_host;  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $smtp_username;                 // SMTP username
	$mail->Password = $smtp_password;                           // SMTP password
	$mail->SMTPSecure = $smtp_encrypt;                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = $smtp_port;                                    // TCP port to connect to

	$mail->setFrom($smtp_sender_mail, $smtp_sender_title);
	$mail->addAddress($to);               // Name is optional

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $body;
	$mail->AltBody = $body;

		define("LOG_FILE_SMTPSys", "system/engine_logs/SMTP_Mailer.log"); // Log Save
	if(!$mail->send()) {
		error_log(date('[Y-m-d H:i e] '). "FAILED - Message could not be sent to ".$to.".". PHP_EOL, 3, LOG_FILE_SMTPSys);
	} else {
		error_log(date('[Y-m-d H:i e] '). "SUCCESS - Message sent to ".$to.".". PHP_EOL, 3, LOG_FILE_SMTPSys);
	}
};
//------------------------------------------------------------------
// -== Online Offline IMG Output ==- //
function chOnlineImg($Name, $mvcore_medb_s, $mvcore_onoff_style, $mvcorex )
{
	$getuseracc = $mvcorex->prepare("SELECT AccountID FROM character WHERE name ='".$Name."'");
	$stmt = $getuseracc->execute();
	$stmt = $getuseracc->fetch();

	$getuseraccs = $stmt;

	$resvaln = $mvcorex->prepare("SELECT ConnectStat FROM ".$mvcore_medb_s." WHERE memb___id = :data");
    $stmt = $getuseracc->execute(array(
        'data' => $getuseraccs[0]
    ));
    $stmt = $getuseracc->fetch();

    $resultVal = $stmt;
	
	if($mvcore_onoff_style == 'gif') {
		if($resultVal[0] == '1') { $result = '<br><img src="system/engine_images/on.gif">'; } else { $result = '<br><img src="system/engine_images/off.gif">'; };
	}
	elseif($mvcore_onoff_style == 'png') {
		if($resultVal[0] == '1') { $result = '<img src="system/engine_images/on.png">'; } else { $result = '<img src="system/engine_images/off.png">'; };
	}
	else {
		if($resultVal[0] == '1') { $result = ''; } else { $result = ''; };
	}

	return $result;
}
//------------------------------------------------------------------
// -== Get Character Class ==- //
function getClass($value) { switch ($value) { 
case 0: $gclass="Dark Wizard"; break;
case 1: $gclass="Soul Master"; break;
case 2: $gclass="Grand Master"; break;
case 3: $gclass="Grand Master"; break;
Case 16: $gclass="Dark Knight"; break;
case 17: $gclass="Blade Knight"; break;
case 18: $gclass="Blade Master"; break;
case 19: $gclass="Blade Master"; break;
Case 32: $gclass="Elf"; break;
case 33: $gclass="Muse Elf"; break;
case 34: $gclass="Hight Elf"; break;
case 35: $gclass="Hight Elf"; break;
Case 48: $gclass="Magic Gladiator"; break;
case 49: $gclass="Duel Master"; break;
case 50: $gclass="Duel Master"; break;
case 51: $gclass="Duel Master"; break;
Case 64: $gclass="Dark Lord"; break;
case 65: $gclass="Lord Emperor"; break;
case 66: $gclass="Lord Emperor"; break;
case 67: $gclass="Lord Emperor"; break;
Case 80: $gclass="Summoner"; break;
case 81: $gclass="Bloody Summoner"; break;
case 82: $gclass="Dimension Master"; break;
case 83: $gclass="Dimension Master"; break;
case 96: $gclass="Rage Fighter"; break;
case 97: $gclass="Fist Master"; break;
case 98: $gclass="Fist Master"; break;
case 112: $gclass="Grow Lancer"; break;
case 113: $gclass="Mirage Lancer"; break;
case 114: $gclass="Mirage Lancer"; break;
};
return $gclass;
};
//------------------------------------------------------------------
// -== Get Map Name ==- //
function getMap($value) { switch ($value) { 
case 0: $map="Lorencia"; break;
case 1: $map="Dungeon"; break;
case 2: $map="Devias"; break;
case 3: $map="Noria"; break;
case 4: $map="LostTower"; break;
case 5: $map="Exile"; break;
case 6: $map="Arena"; break;
case 7: $map="Atlans"; break;
case 8: $map="Tarkan"; break;
case 9: $map="DevilSquare"; break;
case 32: $map="DevilSquare"; break;
case 10: $map="Icarus"; break;
case 11: $map="BloodCastle1"; break;
case 12: $map="BloodCastle2"; break;
case 13: $map="BloodCastle3"; break;
case 14: $map="BloodCastle4"; break;
case 15: $map="BloodCastle5"; break;
case 16: $map="BloodCastle6"; break;
case 17: $map="BloodCastle7"; break;
case 52: $map="BloodCastle8"; break;
case 18: $map="ChaosCastle1"; break;
case 19: $map="ChaosCastle2"; break;
case 20: $map="ChaosCastle3"; break;
case 21: $map="ChaosCastle4"; break;
case 22: $map="ChaosCastle5"; break;
case 23: $map="ChaosCastle6"; break;
case 53: $map="ChaosCastle7"; break;
case 24: $map="Kalima1"; break;
case 25: $map="Kalima2"; break;
case 26: $map="Kalima3"; break;
case 27: $map="Kalima4"; break;
case 28: $map="Kalima5"; break;
case 29: $map="Kalima6"; break;
case 36: $map="Kalima7"; break;
case 30: $map="ValleyOfLoren"; break;
case 31: $map="LandOfTrial"; break;
case 40: $map="Silent"; break;
case 33: $map="Aida"; break;
case 34: $map="Crywolf"; break;
case 57: $map="Raklion"; break;
case 58: $map="Hatchery"; break;
case 51: $map="Elbeland"; break;
case 56: $map="Swamp"; break;
case 37: $map="Kantru1"; break;
case 38: $map="Kantru2"; break;
case 45: $map="Illusion Temple"; break;
case 39: $map="KantruTower"; break;
case 41: $map="Barracks"; break;
case 42: $map="Refuge"; break;
case 63: $map="Vulcanus"; break;
case 62: $map="Santa's Village"; break;
case 64: $map="DuelArena"; break;
case 79: $map="Loren Market"; break;
case 69: $map="Varka"; break;
case 80: $map="Kalrutan"; break;
case 81: $map="Kalrutan"; break;};
return $map;
};
//------------------------------------------------------------------
// -== Get Account Flag ==- //
function outMvcFlag($chname, $mvcore_medb_i, PDO $mvcorex) {
	$sql_accid = $mvcorex->prepare("SELECT accountid 
                                              FROM character 
                                              WHERE name = :data"
    );
	$stmt = $sql_accid->execute( array('data' => $chname) );
	$stmt = $sql_accid->fetchAll(PDO::FETCH_BOTH);
	$sql_accid_out = $stmt;

	$sql_flagc = $mvcorex->prepare("SELECT mvc_flag 
                                              FROM ".$mvcore_medb_i." 
                                              WHERE memb___id = :data"
    );
    $stmt = $sql_flagc->execute( array('data' => $sql_accid_out[0]) );
    $stmt = $sql_flagc->fetchAll(PDO::FETCH_BOTH);
	$sql_flag_out = $stmt;

	if($sql_flag_out[0] != '') {
	    $flag='<center><div align="center" title="'.$sql_flag_out[0].'" class="mvcoreflag mvcoreflag-'.$sql_flag_out[0].'"></div></center>';

	} else {
	    $flag='-';

	};
	return $flag;
};
//------------------------------------------------------------------
// -== Security Inject Check ==- //
function stripSTCheck($string) {
$string = stripslashes($string);
$string = strip_tags($string);
$string = preg_replace('/[^a-zA-Z0-9\[]/', '', $string);
return $string;
}
//------------------------------------------------------------------
?>