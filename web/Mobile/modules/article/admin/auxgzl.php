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
$uid=$_GET['id'];
$action=$_POST['action'];
if ($action) {
    $realname = trim($_POST['p_realname']);
	$telephone = trim($_POST['p_telephone']);
	$mobilephone = trim($_POST['p_mobilephone']);
	$idcardtype = trim($_POST['p_idcardtype']);
	$idcard = trim($_POST['p_idcard']);
	$address = trim($_POST['p_address']);
	$zipcode = trim($_POST['p_zipcode']);
	$banktype = trim($_POST['p_banktype']);
	$bankname = trim($_POST['p_bankname']);
	$bankcard = trim($_POST['p_bankcard']);
	$bankuser = trim($_POST['p_bankuser']);
	$type  = 1;
	//$uid = $_SESSION['jieqiUserId'] ? $_SESSION['jieqiUserId'] : '';
//检测作者是否填写实名资料
	$isAuthor = mysql_query("select `id` from `jieqi_article_author` where `uid`='$uid' limit 1");
	$result = mysql_fetch_object($isAuthor);
	if(!$result->id){
		$sql = "INSERT INTO jieqi_article_author(uid,realname,telephone,mobilephone,idcardtype,idcard,address,zipcode,banktype,bankname,bankcard,bankuser,type)VALUES('$uid','$realname','$telephone','$mobilephone','$idcardtype','$idcard','$address','$zipcode','$banktype','$bankname','$bankcard','$bankuser',$type)";
		if(mysql_query($sql)){
         jieqi_jumppage('/modules/article/admin/auzl.php?id='.$uid.'', '资料添加成功！', '<font color="blue">正在跳转，请稍候...</font>');exit;
         } else {
         jieqi_jumppage('/modules/article/admin/auzl.php?id='.$uid.'', '资料添加失败，请联系管理员！', '<font color=blue">正在跳转，请稍候...</font>');
		 }
	}else{
    	mysql_query("UPDATE `jieqi_article_author` SET `realname`='$realname', `telephone`='$telephone', `mobilephone`='$mobilephone', `idcardtype`='$idcardtype', `idcard`='$idcard', `address`='$address', `zipcode`='$zipcode', `banktype`='$banktype', `bankname`='$bankname', `bankcard`='$bankcard', `bankuser`='$bankuser',`type`='$type' WHERE `uid`='$uid'");
		jieqi_jumppage('/modules/article/admin/auzl.php?id='.$uid.'', '资料修改成功！', '<font color="blue">正在跳转，请稍候...</font>');
	}
}
	include_once JIEQI_ROOT_PATH . '/admin/header.php';


	//获取作者实名记录
	$result1 = mysql_query("select * from `jieqi_article_author` where `uid`='$uid'");
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
	$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'] . '/templates/admin/auxgzl.html';
	include_once JIEQI_ROOT_PATH . '/admin/footer.php';
	break;
?>