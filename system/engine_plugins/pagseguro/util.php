<?php
include_once('_config.php');

function space_clear($input, $urlEncode = TRUE)
{
	$matches = array();
	
	if($urlEncode)
	{
		$matches[] = '/%0[0-8bcef]/';
		$matches[] = '/%1[0-9a-f]/';
	}
	
	$matches[] = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';

	do
	{
		$input = preg_replace($matches, '', $input, -1, $count);
	}
	while($count);

	return $input;
}

function escape($input)
{
	$input = str_replace('\'', '\'\'', space_clear($input));
	
	$input = str_replace('"', '""', space_clear($input));

	return $input;
}

function SQLConnect()
{
	
	global $Config;

	if(!mssql_connect($Config['Connection']['Hostname'], $Config['Connection']['Username'], $Config['Connection']['Password']))
	{
		exit('Unable to connect to server.');
	}

	mssql_select_db($Config['Connection']['Database']);
}

function WriteLog($message, $file)
{
	error_log(date('[Y-m-d H:i]').$message."\r\n".PHP_EOL, 3, __DIR__.'/log/'.$file.'.log');
}