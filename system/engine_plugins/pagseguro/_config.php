<?php
require_once('../../../sql.php');
require_once('../../engine_configs'.$mvcore['db_name'].'/Credits_table_Settings.php');
require_once('../../engine_configs'.$mvcore['db_name'].'/pagseguro_settings.php');

$Config['URL'] = ''.$mvcore['surl'].'/system/engine_plugins/pagseguro/';
$Config['Website'] = $mvcore['surl'];

$Config['Connection']['Hostname'] = $mvcore['db_host'];
$Config['Connection']['Username'] = $mvcore['db_user'];
$Config['Connection']['Password'] = $mvcore['db_pass'];
$Config['Connection']['Database'] = $mvcore['db_name'];

$Config['Payment']['Email'] = $mvcore['pagseguro_email'];
$Config['Payment']['Token'] = $mvcore['pagseguro_token'];
$Config['Payment']['Type'] = $mvcore['pagseguro_type']; // production or sandbox
$Config['Payment']['Tax'] = $mvcore['pagseguro_tax_val']; // TAX! 10%
$Config['Payment']['Min'] = $mvcore['pagseguro_min_p_tag']; // VALUE MIN FOR TRANSACTION
$Config['Payment']['Max'] = $mvcore['pagseguro_max_p_tag']; // VALUE MAX FOR TRANSACTION
$Config['Payment']['Query'] = "UPDATE ".$mvcore['credits_table']." SET ".$mvcore['credits2_column']."=".$mvcore['credits2_column']."+{price} WHERE ".$mvcore['user_column']."='{account}'";