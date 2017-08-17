<?php
require_once('_config.php');
require_once('util.php');
require_once('library/PagSeguroLibrary.php');

$username = escape(trim($_POST['Username'])); //Username From MVCore Engine.

$value = escape(trim($_POST['value']));
$message = null;

if(empty($username) || empty($value))
{
	$message = 'Todos os campos devem ser preenchidos.';
}

if(!is_numeric($value))
{
	$message = 'O valor informado é inválido.';
}

if($value < $Config['Payment']['Min'])
{
	$message = 'O valor doado deve ser superior a R$'.$Config['Payment']['Min'].',00';
}

if($value > $Config['Payment']['Max'])
{
	$message = 'O valor doado deve ser inferior a R$'.$Config['Payment']['Max'].',00';
}

SQLConnect();

if($message !== null)
{
	//header("Location: index.php?message=".urlencode($message));
	echo''.$message.'';
	exit;
}

$value = (int)$value;
$price = (int)$value+(($value/100)*$Config['Payment']['Tax']);

$payment = new PagSeguroPaymentRequest();
$payment->setCurrency("BRL");
$payment->addItem('0001', sprintf('Donation: %s', $username), 1, $price);
$payment->setReference(md5($username.rand()));
$payment->setShippingType(3);
$payment->addParameter('notificationURL', $Config['URL'].'/notification.php?account='.$username.'&price='.$value);
$payment->setRedirectUrl($Config['URL'].'/return.php'); 

try
{
    $credential = new PagSeguroAccountCredentials($Config['Payment']['Email'], $Config['Payment']['Token']);

    $code = $payment->register($credential, true);

    if($Config['Payment']['Type'] == 'sandbox')
    {
		$url = 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$code;
	}
	else
	{
		$url = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='.$code;
	}

	WriteLog(sprintf('Username: %s - Price: R$%d,00', $username, $value), 'request');

	exit("<script>window.location = '".$url."';</script>");
}
catch (PagSeguroServiceException $e)
{
    die($e->getMessage());
}