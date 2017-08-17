<?php
require_once('_config.php');
require_once('util.php');
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $Config['Title'] ?></title>
<meta name="robots" content="noindex"/>
<style>
	body{font-family: 'Arial', 'sans-serif'; background: #222; color: #fff;}
	*{font-size: 14px;}
	h2{font-size: 26px;}
	td{padding: 3px;}
	a{color: #fff;}
	#PaymentBox{margin: 0 auto; overflow: hidden; max-width: 350px;}
</style>
</head>
<body>
	<div id="PaymentBox">
		<h2>Doações &raquo; PagSeguro</h2>
		<td>Seu pagamento está sendo processado pelo PagSeguro, e você será notificado por e-mail quando a transação for concluída.</td>
		<br><br>
		<br><a href="<?php echo $Config['Website']; ?>">Voltar ao site</a>
	</div>
</body>