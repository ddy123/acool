<?php

define('JIEQI_MODULE_NAME', 'pay');
require_once '../../global.php';

jieqi_checklogin();

include_once JIEQI_ROOT_PATH . '/header.php';

if (!empty($_REQUEST['t']) && preg_match('/^\\w+$/', $_REQUEST['t']) && (strlen($_REQUEST['t']) < 64))
{
	$tmpfile = $_REQUEST['t'];
}
else
{
	$tmpfile = 'buyegold';
}

$tmpfile = $jieqiModules['pay']['path'] . '/templates/' . $tmpfile . '.html';

if (is_file($tmpfile))
{
	$jieqiTset['jieqi_contents_template'] = $tmpfile;
}
else
{
	$jieqiTset['jieqi_contents_template'] = '';
}

$jieqiTpl->setCaching(0);

include_once JIEQI_ROOT_PATH . '/footer.php';

?>
