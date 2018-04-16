<?php
define('JIEQI_MODULE_NAME', 'system');
require_once '../../../global.php';
$conn=mysql_connect(JIEQI_DB_HOST,JIEQI_DB_USER,JIEQI_DB_PASS) or die('链接失败');  
mysql_select_db(JIEQI_DB_NAME, $conn); 
@mysql_query("SET names gbk");
include_once JIEQI_ROOT_PATH . '/class/power.php';
$power_handler = &JieqiPowerHandler::getInstance('JieqiPowerHandler');
$power_handler->getSavedVars('system');
jieqi_checkpower($jieqiPower['article']['adminpersondetail'], $jieqiUsersStatus, $jieqiUsersGroup, false, true);
include_once JIEQI_ROOT_PATH . '/class/users.php';
$users_handler = &JieqiUsersHandler::getInstance('JieqiUsersHandler');


	include_once JIEQI_ROOT_PATH . '/admin/header.php';

$id=$_GET['id'];
	//获取作者实名记录
	$result1 = mysql_query("select * from `jieqi_article_author` where `uid`='$id'");
	$userAuthor = mysql_fetch_object($result1);
	$jieqiTpl->assign('realname',$userAuthor->realname);
	$jieqiTpl->assign('telephone',$userAuthor->telephone);
	$jieqiTpl->assign('mobilephone',$userAuthor->mobilephone);
	$jieqiTpl->assign('idcardtype',$userAuthor->idcardtype);
	$jieqiTpl->assign('idcard',$userAuthor->idcard);
	$jieqiTpl->assign('address',$userAuthor->address);
	$jieqiTpl->assign('zipcode',$userAuthor->zipcode);
	$jieqiTpl->assign('banktype',$userAuthor->banktype);
	$jieqiTpl->assign('bankname',$userAuthor->bankname);
	$jieqiTpl->assign('bankcard',$userAuthor->bankcard);
	$jieqiTpl->assign('bankuser',$userAuthor->bankuser);
	$jieqiTpl->setCaching(0);
	$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'] . '/templates/admin/auzl.html';
	include_once JIEQI_ROOT_PATH . '/admin/footer.php';
	break;
?>