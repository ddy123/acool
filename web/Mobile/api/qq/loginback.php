<?php

/**
 * burn添加，2017-02-05
 *
 * @param int $isregister
 * @return bool
 */
function jieqi_apiuser_bind($isregister = 0)
{
	global $query;
	global $apiName;
	global $apiOrder;
	global $apiConfigs;
	$apiField = jieqi_dbslashes($apiName) . "id";
	$apiOrder = intval($apiOrder);
	
	if (!is_a($query, "JieqiQueryHandler"))
	{
		jieqi_includedb();
		$query = JieqiQueryHandler::getInstance("JieqiQueryHandler");
	}
	
	$sql = "SELECT * FROM " . jieqi_dbprefix("system_userapi") . " WHERE uid = " . intval($_SESSION["jieqiUserId"]) . " LIMIT 0, 1";
	$query->execute($sql);
	$row = $query->getRow();
	$apiflag = pow(2, $apiOrder - 1);
	
	if (is_array($row))
	{
		$apiflag = $row["apiflag"] | $apiflag;
		$apidata = jieqi_unserialize($row["apidata"]);
		$apidata[$apiName] = array("expire_in" => $_SESSION["jieqiUserApi"][$apiName]["expire_in"], "access_token" => $_SESSION["jieqiUserApi"][$apiName]["access_token"], "openid" => $_SESSION["jieqiUserApi"][$apiName]["openid"], "openkey" => $_SESSION["jieqiUserApi"][$apiName]["openkey"], "unionid" => $_SESSION["jieqiUserApi"][$apiName]["unionid"]);
		$apiset = jieqi_unserialize($row["apiset"]);
		$apiset[$apiName] = array("isregister" => $isregister);
		$sql = "UPDATE " . jieqi_dbprefix("system_userapi") . " SET apiflag = " . $apiflag . ", apidata = '" . jieqi_dbslashes(serialize($apidata)) . "', apiset = '" . jieqi_dbslashes(serialize($apiset)) . "', " . $apiField . " = '" . jieqi_dbslashes($_SESSION["jieqiUserApi"][$apiName]["unionid"]) . "' WHERE uid = " . intval($_SESSION["jieqiUserId"]);
	}
	else
	{
		$apidata = array();
		$apidata[$apiName] = array("expire_in" => $_SESSION["jieqiUserApi"][$apiName]["expire_in"], "access_token" => $_SESSION["jieqiUserApi"][$apiName]["access_token"], "openid" => $_SESSION["jieqiUserApi"][$apiName]["openid"], "openkey" => $_SESSION["jieqiUserApi"][$apiName]["openkey"], "unionid" => $_SESSION["jieqiUserApi"][$apiName]["unionid"]);
		$apiset = array();
		$apiset[$apiName] = array("isregister" => $isregister);
		$sql = "INSERT INTO " . jieqi_dbprefix("system_userapi") . " (`uid` ,`apiflag`, `apidata` ,`apiset` ,`" . $apiField . "`) VALUES ('" . intval($_SESSION["jieqiUserId"]) . "', '" . intval($apiflag) . "', '" . jieqi_dbslashes(serialize($apidata)) . "', '" . jieqi_dbslashes(serialize($apiset)) . "', '" . jieqi_dbslashes($_SESSION["jieqiUserApi"][$apiName]["openid"]) . "');";
	}
	
	$ret = $query->execute($sql);
	
	if($ret)
	{
		//var_dump($ret);
		$sql = "UPDATE " . jieqi_dbprefix("system_users") . " SET conisbind = 1 WHERE uid = " . intval($_SESSION["jieqiUserId"]);
		$ret = $query->execute($sql);
		return true;
	}
	
	return false;
}

define('JIEQI_MODULE_NAME', 'system');
define('JIEQI_NEED_SESSION', 1);
require_once '../../global.php';
include_once './config.inc.php';
include_once './lang_api.php';
set_include_path(JIEQI_ROOT_PATH . '/lib/');
include_once JIEQI_ROOT_PATH . '/lib/OpenSDK/Tencent/SNS2.php';

if (isset($_GET['code']) && ($_SESSION['jieqiUserApi'][$apiName]['state'] == $_GET['state']))
{
	OpenSDK_Tencent_SNS2::init($apiConfigs[$apiName]['appid'], $apiConfigs[$apiName]['appkey']);
	$ret = OpenSDK_Tencent_SNS2::getAccessToken('code', array('code' => $_GET['code'], 'redirect_uri' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

	if (isset($ret['error']))
	{
		jieqi_printfail(sprintf($jieqiLang['system']['qq_access_token_failure'], $ret['error'], $ret['error_description']));
	}
}
else
{
	jieqi_printfail($jieqiLang['system']['qq_error_callback_params']);
}

//burn添加，2017-02-05
$url = 'https://graph.qq.com/user/get_user_info?oauth_consumer_key=' . $apiConfigs[$apiName]["appid"].'&access_token=' . OpenSDK_Tencent_SNS2::getParam(OpenSDK_Tencent_SNS2::ACCESS_TOKEN).'&openid='.OpenSDK_Tencent_SNS2::getParam(OpenSDK_Tencent_SNS2::OPENID).'&format=json';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_URL, $url);
$json = curl_exec($ch);
curl_close($ch);

$arr = json_decode($json,1);

if($arr['gender'] == '男')
{
	$sex = 1;
}
else if($arr['gender'] == '女')
{
	$sex = 2;
}
else
{
	$sex = 0;
}

$_SESSION['jieqiUserApi'][$apiName]['access_token'] = OpenSDK_Tencent_SNS2::getParam(OpenSDK_Tencent_SNS2::ACCESS_TOKEN);
$_SESSION['jieqiUserApi'][$apiName]['refresh_token'] = OpenSDK_Tencent_SNS2::getParam(OpenSDK_Tencent_SNS2::REFRESH_TOKEN);
$_SESSION['jieqiUserApi'][$apiName]['expire_in'] = JIEQI_NOW_TIME + OpenSDK_Tencent_SNS2::getParam(OpenSDK_Tencent_SNS2::EXPIRES_IN);
$_SESSION['jieqiUserApi'][$apiName]['openid'] = OpenSDK_Tencent_SNS2::getParam(OpenSDK_Tencent_SNS2::OPENID);
$_SESSION['jieqiUserApi'][$apiName]['openkey'] = '';

if (empty($_SESSION['jieqiUserApi'][$apiName]['openid']))
{
	jieqi_printfail($jieqiLang['system']['qq_error_callback_getvar']);
}

$apiField = jieqi_dbslashes($apiName) . 'id';
$apiOrder = intval($apiOrder);
jieqi_includedb();
$query = JieqiQueryHandler::getInstance('JieqiQueryHandler');
$sql = 'SELECT * FROM ' . jieqi_dbprefix('system_userapi') . ' WHERE ' . $apiField . ' = \'' . jieqi_dbslashes($_SESSION['jieqiUserApi'][$apiName]['openid']) . '\' LIMIT 0, 1';
$query->execute($sql);
$row = $query->getRow();
$userbind = false;

if (is_array($row) && !empty($row['uid']))
{
	include_once JIEQI_ROOT_PATH . '/class/users.php';
	$users_handler = &JieqiUsersHandler::getInstance('JieqiUsersHandler');
	$jieqiUsers = $users_handler->get($row['uid']);

	if (!is_object($jieqiUsers))
	{
		$flagnum = pow(2, $apiOrder - 1);
		$flagstr = str_repeat('1', 30);
		$flagstr[30 - $apiOrder] = '0';

		if ($row['apiflag'] == $flagnum)
		{
			$sql = 'DELETE FROM ' . jieqi_dbprefix('system_userapi') . ' WHERE ' . $apiField . ' = \'' . jieqi_dbslashes($_SESSION['jieqiUserApi'][$apiName]['openid']) . '\'';
		}
		else
		{
			$sql = 'UPDATE ' . jieqi_dbprefix('system_userapi') . ' SET apiflag = apiflag & ' . bindec($flagstr) . ' WHERE ' . $apiField . ' = \'' . jieqi_dbslashes($_SESSION['jieqiUserApi'][$apiName]['openid']) . '\'';
		}

		$query->execute($sql);
	}
	else
	{
		$apidata = jieqi_unserialize($row['apidata']);

		if (!is_array($apidata))
		{
			$apidata = array();
		}

		$apidata[$apiName] = array('expire_in' => $_SESSION['jieqiUserApi'][$apiName]['expire_in'], 'access_token' => $_SESSION['jieqiUserApi'][$apiName]['access_token'], 'openid' => $_SESSION['jieqiUserApi'][$apiName]['openid'], 'openkey' => $_SESSION['jieqiUserApi'][$apiName]['openkey']);
		$sql = 'UPDATE ' . jieqi_dbprefix('system_userapi') . ' SET apidata = \'' . jieqi_dbslashes(serialize($apidata)) . '\' WHERE ' . $apiField . ' = \'' . jieqi_dbslashes($_SESSION['jieqiUserApi'][$apiName]['openid']) . '\'';
		$query->execute($sql);
		include_once JIEQI_ROOT_PATH . '/include/checklogin.php';
		jieqi_loginprocess($jieqiUsers);
		if (defined('JIEQI_USER_INTERFACE') && preg_match('/^\\w+$/is', JIEQI_USER_INTERFACE)) {
			include_once JIEQI_ROOT_PATH . '/include/funuser_' . JIEQI_USER_INTERFACE . '.php';
		}
		else {
			include_once JIEQI_ROOT_PATH . '/include/funuser.php';
		}

		$ucsyncode = '';

		if (function_exists('uc_get_user'))
		{
			if ($data = uc_get_user($jieqiUsers->getVar('uname', 'n')))
			{
				$ucsyncode = uc_user_synlogin($uid);
			}
		}

		if (empty($_SESSION['jieqiUserApi'][$apiName]['jumpurl']))
		{
			$_SESSION['jieqiUserApi'][$apiName]['jumpurl'] = JIEQI_URL . '/';
		}

		if (defined('JIEQI_WAP_PAGE'))
		{
			jieqi_wapgourl($_SESSION['jieqiUserApi'][$apiName]['jumpurl']);
		}
		else if ($_REQUEST['jumphide'])
		{
			jieqi_jumppage($_SESSION['jieqiUserApi'][$apiName]['jumpurl'], '', $ucsyncode, true);
		}
		else
		{
			jieqi_jumppage($_SESSION['jieqiUserApi'][$apiName]['jumpurl'], $jieqiLang['system']['login_title'], sprintf($jieqiLang['system']['api_login_success'], $jieqiUsers->getVar('name', 'n')) . $ucsyncode);
		}
		
		//burn修改，2017-02-05
		jieqi_loadlang("users", JIEQI_MODULE_NAME);
		include_once (JIEQI_ROOT_PATH . "/include/useraction.php");
		$params = $arr['openid'];
		$jieqiConfigs["system"]["checkcodelogin"] = 0;
		jieqi_ulogin_lprepare($params);
		jieqi_ulogin_iprepare($params);
		jieqi_ulogin_lprocess($params);
		jieqi_apiuser_bind(1, 0);
		jieqi_ulogin_iprocess($params);
		
		$userbind = true;
		
		//		exit();
	}
}
//burn修改，2017-02-05
else
{
	jieqi_loadlang("users", JIEQI_MODULE_NAME);
	
	global $jieqiConfigs;
	global $jieqiLang;
	global $query;
	global $jieqiAction;
	
	$params['username'] = $_SESSION['jieqiUserApi'][$apiName]['openid'];
	$params['nickname'] = iconv("UTF-8","GBK//IGNORE",$arr['nickname']);
	$params['sex']      = $sex;
	$params['faceimg']  = $arr['headimgurl'];
	$params['uip']      = jieqi_userip();
	
	jieqi_includedb();
	
	$query            = JieqiQueryHandler::getInstance('JieqiQueryHandler');
	
	$userName         = $params['username'];
	
	$name             = $params['nickname'];
	
	$password         = '96e79218965eb72c92a549dd5a330112';
	
	$groupID          = '3';
	
	$redate           = time();//注册时间
	
	$setting['regip'] = jieqi_userip();
	
	$userset          = array('regip' => $params['uip']);
	
	$setting          = serialize($userset);
	
	$faceImg          = $params['faceimg'];
	
	$experience       = $score = '0';
	
	$sql = 'INSERT INTO `' . jieqi_dbprefix('system_users'). "` (`uname`,`name`,`pass`,`groupid`,`regdate`,`setting`,`sex`,`faceImg`,`mobile`,`logintype`) VALUES ('" . $userName . "', '" . $name . "', '" . $password . "', '" . $groupID . "', '" . $redate . "', '" . $setting .  "', '" . $sex . "', '" . $faceImg . "', '" . $phoneNum . "', '" . $loginType . "')";
	
	$result = $query->execute($sql);
	
	if (!$result)
	{
		$params['error'] = $jieqiLang['system']['register_failure'];
		
		if ($params['return'])
		{
			exit();
		}
		else
		{
			jieqi_printfail($params['error']);
		}
	}
	else
	{
		$uid = mysql_insert_id();
		
		if (0 < $jieqiConfigs['system']['regtimelimit'])
		{
			$sql = 'DELETE FROM ' . jieqi_dbprefix('system_registerip') . ' WHERE regtime<' . (JIEQI_NOW_TIME - ((72 < $jieqiConfigs['system']['regtimelimit'] ? $jieqiConfigs['system']['regtimelimit'] : 72) * 3600));
			$query->execute($sql);
			$sql = 'INSERT INTO ' . jieqi_dbprefix('system_registerip') . ' (ip, regtime, count) VALUES (\'' . jieqi_dbslashes($params['uip']) . '\', \'' . JIEQI_NOW_TIME . '\', \'0\')';
			
			$query->execute($sql);
		}
		
		include_once JIEQI_ROOT_PATH . '/class/online.php';
		$online_handler = &JieqiOnlineHandler::getInstance('JieqiOnlineHandler');
		include_once JIEQI_ROOT_PATH . '/include/visitorinfo.php';
		$online = $online_handler->create();
		
		$online->setVar('uid', $uid);
		
		$online->setVar('siteid', JIEQI_SITE_ID);
		
		$online->setVar('sid', session_id());
		
		$online->setVar('uname', $userName);
		
		$tmpvar = (0 < strlen($name) ? $userName : $name);
		
		$online->setVar('name', $tmpvar);
		
		$online->setVar('pass', $password);
		
		$online->setVar('groupid', $groupID);
		
		$tmpvar = JIEQI_NOW_TIME;
		$online->setVar('logintime', $tmpvar);
		$online->setVar('updatetime', $tmpvar);
		$online->setVar('operate', '');
		
		$tmpvar = VisitorInfo::getIp();
		
		$online->setVar('ip', $tmpvar);
		
		$online->setVar('browser', VisitorInfo::getBrowser());
		
		$online->setVar('os', VisitorInfo::getOS());
		
		$location = VisitorInfo::getIpLocation($tmpvar);
		
		if (JIEQI_SYSTEM_CHARSET == 'big5')
		{
			include_once JIEQI_ROOT_PATH . '/include/changecode.php';
			
			$location = jieqi_gb2big5($location);
		}
		
		$online->setVar('location', $location);
		$online->setVar('state', '0');
		$online->setVar('flag', '0');
		
		$online_handler->insert($online);
		
		include_once JIEQI_ROOT_PATH . '/class/users.php';
		
		$users_handler = &JieqiUsersHandler::getInstance("JieqiUsersHandler");
		
		$newUser = $users_handler->get($uid);
		
		jieqi_setusersession($newUser);
		
		$jieqi_user_info = array();
		$jieqi_user_info['jieqiUserId'] = $_SESSION['jieqiUserId'];
		$jieqi_user_info['jieqiUserName'] = $_SESSION['jieqiUserName'];
		$jieqi_user_info['jieqiUserGroup'] = $_SESSION['jieqiUserGroup'];
		include_once JIEQI_ROOT_PATH . '/include/changecode.php';
		
		if (JIEQI_SYSTEM_CHARSET == 'gbk')
		{
			$jieqi_user_info['jieqiUserName_un'] = jieqi_gb2unicode($_SESSION['jieqiUserName']);
		}
		else
		{
			$jieqi_user_info['jieqiUserName_un'] = jieqi_big52unicode($_SESSION['jieqiUserName']);
		}
		
		$jieqi_user_info['jieqiUserLogin'] = JIEQI_NOW_TIME;
		$cookietime = 0;
		@setcookie('jieqiUserInfo', jieqi_sarytostr($jieqi_user_info), $cookietime, '/', JIEQI_COOKIE_DOMAIN, 0);
		$jieqi_visit_info['jieqiUserLogin'] = $jieqi_user_info['jieqiUserLogin'];
		$jieqi_visit_info['jieqiUserId'] = $jieqi_user_info['jieqiUserId'];
		@setcookie('jieqiVisitInfo', jieqi_sarytostr($jieqi_visit_info), JIEQI_NOW_TIME + 99999999, '/', JIEQI_COOKIE_DOMAIN, 0);
		
		if ((0 < JIEQI_PROMOTION_REGISTER) && !empty($_COOKIE['jieqiPromotion']))
		{
			$users_handler->changeCredit(intval($_COOKIE['jieqiPromotion']), intval(JIEQI_PROMOTION_REGISTER), true);
			setcookie('jieqiPromotion', '', 0, '/', JIEQI_COOKIE_DOMAIN, 0);
		}
		
		jieqi_apiuser_bind(1, 1);
		
		$userbind = true;
	}
}

//burn修改，2017-02-05
//if (!$userbind)
//{
//	header("Location: " . jieqi_headstr(JIEQI_USER_URL . "/api/" . $apiName . "/bind.php"));
//}

if ($userbind)
{
	header("Location: " . jieqi_headstr(JIEQI_USER_URL));
}

?>
