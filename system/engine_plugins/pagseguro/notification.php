<?php
require_once('_config.php');
require_once('util.php');
require_once('library/PagSeguroLibrary.php');

$code = isset($_POST['notificationCode']) ? trim($_POST['notificationCode']) : null;

$type = isset($_POST['notificationType']) ? trim($_POST['notificationType']) : null;

if($code && $type == 'transaction')
{
    global $Config;
    
	$credential = new PagSeguroAccountCredentials($Config['Payment']['Email'], $Config['Payment']['Token']);

    $transaction = PagSeguroNotificationService::checkTransaction($credential, $code);
}

$account = $_GET['account'];
$price = $_GET['price'];

$status = $transaction->getStatus();

switch($status->getTypeFromValue())
{
    case 'PAID':
        $syntax = str_ireplace('{account}', $account, $Config['Payment']['Query']);
        $syntax = str_ireplace('{price}', $price, $syntax);
        SQLConnect();
        WriteLog(sprintf('[PAID] [%s] [%d] [%s]', $account, $price, $syntax), 'notification');
        mssql_query($syntax);
		mssql_query("insert into MVCore_Income_Logs (cost_value,Income_type) VALUES ('".$price."','8')");
		mssql_query("insert into MVCore_Money_Data (Username,Credits,GoldCredits,Description,Date,VoteType) VALUES ('".$account."','0','".$price."','From PagSeguro Donation','".time()."','0')"); // Second Execution ( Saves Earned Credits )
    	break;
    default:
    	WriteLog(sprintf('[%s] [%s] [%d]', $status->getTypeFromValue(), $username, $price), 'notification');
    	break;
}