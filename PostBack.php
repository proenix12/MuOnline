<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
session_start(); 
ob_start();
header("Cache-control: private");
require('sql.php');

function clean_variable($var)
{
	return $var;
}

//Bad word check in post,get,cokie,request ( anti Inject )
$_REQUEST = clean_variable($_REQUEST);
$_POST = clean_variable($_POST);
$_GET = clean_variable($_GET);
$_COOKIE = clean_variable($_COOKIE);
$_SESSION = clean_variable($_SESSION);
$badwords = array("xp_cmdshell","EXEC","insert","INSERT","DROP", "SELECT", "UPDATE", "DELETE", "drop", "select", "update", "delete", "WHERE", "where");
foreach($_POST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0) {
header('Location: -id-News.html');
$drop_access = '1';
};

foreach($_GET as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: -id-News.html');
$drop_access = '1';
};

foreach($_COOKIE as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: -id-News.html');
$drop_access = '1';
};

foreach($_REQUEST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: -id-News.html');
$drop_access = '1';
};

define("LOG_FILE_PostBackMain", "system/engine_logs/PostBack.log"); // Log Save

if($_POST['custom'] != '') { $db_p = $_POST['custom']; }
elseif($_REQUEST['uid'] != '') { $db_p = $_REQUEST['uid']; }
elseif($_GET['cuid'] != '') { $db_p = $_GET['cuid']; }
elseif($_GET['uid'] != '') { $db_p = $_GET['uid']; }
elseif($_GET['custom'] != '') { $db_p = $_GET['custom']; };

		$get_u_n_d_b = explode("49729", $db_p);
		$db_name = $get_u_n_d_b[1]; // Database
		$user_name = $get_u_n_d_b[0]; // Username
		

$ik_inv_st	= $_GET['ik_inv_st'];
$ik_pm_no	= $_GET['ik_pm_no'];
if($ik_inv_st == 'success' && $ik_pm_no != '') {
//Get all parameters
$money_amount	= $_GET['ik_am'];

	$int_log = mssql_query("SELECT custom, money, invoice, amount from MVCore_Tran_Log where invoice = '".$ik_pm_no."'");
	$int_log_check = mssql_fetch_row($int_log);
	
	if($int_log_check[3] == $money_amount && $int_log_check[2] == $ik_pm_no){
		
	$get_u_n_d_b = explode("49729", $int_log_check[0]);
	$db_name = $get_u_n_d_b[1]; // Database
	$user_name = $get_u_n_d_b[0]; // Username
	
	};
};

require('system/engine_configs'.$db_name.'/Credits_table_Settings.php');
require('system/engine_configs'.$db_name.'/paypal_settings.php');
require('system/engine_configs'.$db_name.'/paygol_settings.php');
require('system/engine_configs'.$db_name.'/paymentwall_settings.php');
require('system/engine_configs'.$db_name.'/super_rewards_settings.php');
require('system/engine_configs'.$db_name.'/fortumo_settings.php');

if($drop_access >= '1') {  } else {

$chup=mssql_connect($mvcore['db_host'],$mvcore['db_user'],$mvcore['db_pass']);
$mvcorex = mssql_select_db($db_name,$chup);

if(!$mvcorex){
	error_log(date('[Y-m-d H:i e] '). "Database: ".$db_name." && Username: ".$user_name." - ( Failed to connect to database )". PHP_EOL, 3, LOG_FILE_PostBackMain);
	header('Location: -id-News.html');
};

error_log(date('[Y-m-d H:i e] '). "Database: ".$db_name." && Username: ".$user_name." - ( Connected to database )". PHP_EOL, 3, LOG_FILE_PostBackMain);

//=============================================================================================================================================
//SuperRewards
define("LOG_FILE_SuperRewards", "system/engine_logs/SuperRewards.log"); // Log Save
$SECRET = $mvcore['superrewards_skey'];
$sig = md5($_REQUEST['id'] . ':' . $_REQUEST['new'] . ':' . $_REQUEST['uid'] . ':' .
$SECRET);

if($_REQUEST['sig'] == $sig) {

	error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Post data ok'". PHP_EOL, 3, LOG_FILE_SuperRewards);
	
	$calc_value = $_REQUEST['new'] / $mvcore['superrewards_eur_val'];
	$ad_rews = mssql_query("UPDATE ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$_REQUEST['new']."' where ".$mvcore['user_column']." = '".$user_name."'"); // Money Update Process
	$do_reg_insert = mssql_query("insert into MVCore_Income_Logs (cost_value,Income_type) VALUES ('".$calc_value."','5')");
	
	$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$user_name."','0','".$_REQUEST['new']."','From SuperRewards Donation','".time()."','0')");
	
	error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Credits added ( ".$_REQUEST['new']." )'". PHP_EOL, 3, LOG_FILE_SuperRewards);
	
	if($ad_rews){ print "1"; }else{ print "0"; }
	
}else{
	error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Request was not from/for supperrewards ( ".$_REQUEST['sig']." )'". PHP_EOL, 3, LOG_FILE_SuperRewards);
}

//=============================================================================================================================================
//Paymentwall
define("LOG_FILE_PaymentWall", "system/engine_logs/PaymentWall.log"); // Log Save
    if(!in_array($_SERVER['REMOTE_ADDR'], array('66.220.10.2', '66.220.10.3', '174.36.92.186', '174.36.96.66', '174.36.92.187', '174.36.92.192', '174.37.14.28'))){
		error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Request was not from/for paymentwall ( ".$_SERVER['REMOTE_ADDR']." )'". PHP_EOL, 3, LOG_FILE_PaymentWall);
    }
    else{
		
		error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Checking post data...'". PHP_EOL, 3, LOG_FILE_PaymentWall);
		
			if(isset($_GET['uid']) && isset($_GET['currency']) && isset($_GET['type']) && isset($_GET['ref']) && isset($_GET['sig'])){
	    
				error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Post data ok'". PHP_EOL, 3, LOG_FILE_PaymentWall);
				
                  $errors   = array();
                  $uid      = (!empty($_GET['uid'])) ?  $_GET['uid'] : '';
                  $currency = (is_numeric($_GET['currency'])) ? (int)$_GET['currency'] : '';
                  $type     = (is_numeric($_GET['type'])) ? $_GET['type'] : '';
                  $ref      = (!empty($_GET['ref'])) ?  $_GET['ref'] : '';
                  $reason 	= isset($_GET['reason']) ? (int)$_GET['reason'] : 0;
                  
				  
                  if($user_name == '')
                      $errors[] = 'Empty uid';
                  if($currency == '')
                      $errors[] = 'Empty or invalid currency';
                  if($type == '')
                      $errors[] = 'Empty or invalid type';
                  if($ref == '')
                      $errors[] = 'Empty ref';
                      

				if(count($errors) > 0){
                      foreach($errors as $error){
                          echo'Something went wrong. 1';
						  error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Something went wrong Nr.1'". PHP_EOL, 3, LOG_FILE_PaymentWall);
                      }
				}
				else{
					if($type != 2){
							$calc_value = $currency / $mvcore['paymentwall_eur_val'];
							$add_reward = mssql_query("UPDATE ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$currency."' where ".$mvcore['user_column']." = '".$user_name."'"); // Money Update Process
							$do_reg_insert = mssql_query("insert into MVCore_Income_Logs (cost_value,Income_type) VALUES ('".$calc_value."','4')");
							$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$user_name."','0','".$currency."','From PaymentWall Donation','".time()."','0')");
							
							if($add_reward != false){
								echo'OK';
								error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Credits added ( ".$currency." )'". PHP_EOL, 3, LOG_FILE_PaymentWall);
							}
							else{
								echo'Something went wrong. 2';
								error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Something went wrong Nr.2'". PHP_EOL, 3, LOG_FILE_PaymentWall);
							}
					} else{
                                       if($reason == 2 || $reason == 3){
                                            $ban = mssql_query("UPDATE ".$mvcore_medb_i." SET bloc_code = 1 WHERE memb___id = '".$user_name."'"); // Ban Account
                                            if($ban != false){
												$remove_reward = mssql_query("UPDATE ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".str_replace('-', '', $currency)."' where ".$mvcore['user_column']." = '".$user_name."'"); // Money Update Process
                                                if($remove_reward != false){
													echo'OK';
													error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Credits removed ( ".$currency." )'". PHP_EOL, 3, LOG_FILE_PaymentWall);
                                                }
                                                else{
                                                    echo'Something went wrong. 3';
													error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Something went wrong Nr.3'". PHP_EOL, 3, LOG_FILE_PaymentWall);
                                                }
                                            }
                                            else{
                                                 echo'Something went wrong. 4';
												 error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Something went wrong Nr.4'". PHP_EOL, 3, LOG_FILE_PaymentWall);
                                            }
                                       }
                                       else{
											$remove_reward = mssql_query("UPDATE ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".str_replace('-', '', $currency)."' where ".$mvcore['user_column']." = '".$user_name."'"); // Money Update Process
                                            if($remove_reward != false){
												echo'OK';
												error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Credits removed ( ".$currency." )'". PHP_EOL, 3, LOG_FILE_PaymentWall);
                                            }
                                            else{
                                                echo'Something went wrong. 5';
												error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Something went wrong Nr.5'". PHP_EOL, 3, LOG_FILE_PaymentWall);
                                            }
                                       }
					}
				}
			}
        };
		
//=============================================================================================================================================
//Paygol
define("LOG_FILE_PayGol", "system/engine_logs/PayGol.log"); // Log Save
if(!in_array($_SERVER['REMOTE_ADDR'], array('109.70.3.48', '109.70.3.146', '109.70.3.58'))) {
	error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Request was not from/for paygol ( ".$_SERVER['REMOTE_ADDR']." )'". PHP_EOL, 3, LOG_FILE_PayGol);
} else {
  
//Get all parameters from PayGol
$service_id	= $_GET['service_id'];
$message_id	= $_GET['message_id'];
$shortcode	= $_GET['shortcode'];
$keyword		= $_GET['keyword'];
$message		= $_GET['message'];
$sender			= $_GET['sender'];
$operator		= $_GET['operator'];
$country		= $_GET['country'];
$price			= $_GET['frmprice'];
$currency		= $_GET['currency'];
$points		  = $_GET['points'];

error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Post data recived'". PHP_EOL, 3, LOG_FILE_PayGol);

if($service_id == $mvcore['paygol_sid']) {
$ad_rew = mssql_query("UPDATE ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$points."' where ".$mvcore['user_column']." = '".$user_name."'"); // Money Update Process
$do_reg_insert = mssql_query("insert into MVCore_Income_Logs (Income_type,cost_value) VALUES ('2','".$price."')");
$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$user_name."','0','".$points."','From PayGol Donation','".time()."','0')");

error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Credits added ( ".$points." )'". PHP_EOL, 3, LOG_FILE_PayGol);
};

};

//=============================================================================================================================================
//Interkassa
define("LOG_FILE_Interkassa", "system/engine_logs/Interkassa.log"); // Log Save
$ik_inv_st	= $_GET['ik_inv_st'];
$ik_pm_no	= $_GET['ik_pm_no'];
if($ik_inv_st == 'success' && $ik_pm_no != '') {
//Get all parameters
$money_amount	= $_GET['ik_am'];
$co_id_no		= $_GET['ik_co_id'];

	$int_log = mssql_query("SELECT custom, money, invoice, amount from MVCore_Tran_Log where invoice = '".$ik_pm_no."'");
	$int_log_check = mssql_fetch_row($int_log);
	
	if($int_log_check[3] == $money_amount && $int_log_check[2] == $ik_pm_no){
		$ad_rew = mssql_query("UPDATE ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$int_log_check[1]."' where ".$mvcore['user_column']." = '".$user_name."'"); // Money Update Process
		$do_reg_insert = mssql_query("insert into MVCore_Income_Logs (Income_type,cost_value) VALUES ('9','".$money_amount."')");
		$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$user_name."','0','".$int_log_check[1]."','From Interkassa Donation','".time()."','0')");
		$rem = mssql_query("delete from MVCore_Tran_Log where invoice = '".$ik_pm_no."'"); // Remove Checked Data
		error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Credits added ( ".$int_log_check[1]." )'". PHP_EOL, 3, LOG_FILE_Interkassa); echo'success';
	} else {
		error_log(date('[Y-m-d H:i e] '). "Invoice ID did not mach. 'ID ( ".$ik_pm_no." )'". PHP_EOL, 3, LOG_FILE_Interkassa);
	};

};

//=============================================================================================================================================
//Fortumo
define("LOG_FILE_Fortumo", "system/engine_logs/Fortumo.log"); // Log Save

	function check_signature($params_array, $secret) {
		ksort($params_array);

		$str = '';
		foreach ($params_array as $k=>$v) {
		  if($k != 'sig') {
			$str .= "$k=$v";
		  }
		}
		$str .= $secret;
		$signature = md5($str);

		return ($params_array['sig'] == $signature);
	}
	
  if($_SERVER['REMOTE_ADDR'] == '54.72.6.27') { // One IP Moustly Used.
	  
	  $secret = $mvcore['fortumo_secre_id']; // insert your secret between ''
	  if(empty($secret)||!check_signature($_GET, $secret)) {
		error_log(date('[Y-m-d H:i e] '). "Not Found 404 ( Invalid signature )". PHP_EOL, 3, LOG_FILE_Fortumo);
	  };

	  $sender = $_GET['sender'];//phone num.
	  $amount = $_GET['amount'];//credit
	  $price = $_GET['price'];//credit
	  $payment_id = $_GET['payment_id'];//unique id
	  $test = $_GET['test']; // this parameter is present only when the payment is a test payment, it's value is either 'ok' or 'fail'
		
	  if(preg_match("/completed/i", $_GET['status'])) {
			$ad_rew = mssql_query("UPDATE ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$amount."' where ".$mvcore['user_column']." = '".$user_name."'"); // Money Update Process
			$do_reg_insert = mssql_query("insert into MVCore_Income_Logs (cost_value,Income_type) VALUES ('".$price."','7')");
			
			$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$user_name."','0','".$amount."','From Fortumo Donation','".time()."','0')");
					
			error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Credits added ( ".$amount." )'". PHP_EOL, 3, LOG_FILE_Fortumo);
	  };

	if($test){
		echo('TEST OK');
	} else {
		echo('OK');
	};
  } else { error_log(date('[Y-m-d H:i e] '). "Access Forbidden 403 ( Unknown IP )". PHP_EOL, 3, LOG_FILE_Fortumo); };
	
//=============================================================================================================================================
//Paypal
define("LOG_FILE_PayPal", "system/engine_logs/PayPal.log"); // Log Save

$req = 'cmd=_notify-validate'; // Initialize the $req variable and add CMD key value pair

// Read the post from PayPal
foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}

error_log(date('[Y-m-d H:i e] '). "Data Sent Back: ".$req."". PHP_EOL, 3, LOG_FILE_PayPal);

// Now Post all of that back to PayPal's server using curl, and validate everything with PayPal
$url = "https://www.paypal.com/cgi-bin/webscr";
$curl_result = $curl_err = '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$curl_result = @curl_exec($ch);
$curl_err = curl_error($ch);
curl_close($ch);

//$req = str_replace("&", "\n", $req);  // Make it a nice list in case we want to email it to ourselves for reporting

error_log(date('[Y-m-d H:i e] '). "Valid?: ".$curl_result."". PHP_EOL, 3, LOG_FILE_PayPal);

// Check that the result verifies
if (strpos($curl_result, "VERIFIED") !== false) {
    //$req .= "Paypal Verified OK";
	//Do Credits Reward Process
	
	$get_business = $_POST['business'];
	$get_invoice = $_POST['invoice'];
	$payment_amount = $_POST['mc_gross'];
	$payment_tax = $_POST['tax'];
	
		if($payment_tax >= 0.1) {
			$new_calc_check_vall = $payment_amount - $payment_tax;
		} else {
			$new_calc_check_vall = $payment_amount;
		}
	
	error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Checking post data...'". PHP_EOL, 3, LOG_FILE_PayPal);
	
	$pp_log = mssql_query("SELECT custom,money,invoice,amount from MVCore_Tran_Log where invoice = '".$get_invoice."'");
	$pp_log_check = mssql_fetch_row($pp_log);
	
		if($get_business == $mvcore['paypal_email'] && $pp_log_check[0] == $user_name && $get_invoice == $pp_log_check[2] && $payment_amount >= '1' && $new_calc_check_vall == $pp_log_check[3]){
			
			error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Post data ok ( Invoice:".$get_invoice.", Amount:".$new_calc_check_vall." )'". PHP_EOL, 3, LOG_FILE_PayPal);
			
				$ad_rew = mssql_query("UPDATE ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." + '".$pp_log_check[1]."' where ".$mvcore['user_column']." = '".$user_name."'"); // Money Update Process
				$do_reg_insert = mssql_query("insert into MVCore_Income_Logs (cost_value,Income_type) VALUES ('".$pp_log_check[3]."','1')");
				$rem = mssql_query("delete from MVCore_Tran_Log where invoice = '".$get_invoice."'"); // Remove Checked Data
				
				$fInfoInt = mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$user_name."','0','".$pp_log_check[1]."','From PayPal Donation','".time()."','0')");
				
			error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Credits added ( ".$pp_log_check[1]." )'". PHP_EOL, 3, LOG_FILE_PayPal);
			
		} else { error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Checked post data did not match'". PHP_EOL, 3, LOG_FILE_PayPal); exit; }
		
} else {
    //$req .= "Data NOT verified from Paypal!";
	error_log(date('[Y-m-d H:i e] '). "Username: ".$user_name." - 'Request was not from/for paypal ( ".$_SERVER['REMOTE_ADDR']." )'". PHP_EOL, 3, LOG_FILE_PayPal);
    exit();
}

};
mssql_query($sql);
mssql_close($conn);
ob_end_flush()
?>
