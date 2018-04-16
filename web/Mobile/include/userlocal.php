<?php

function jieqi_uregister_lprepare(&$params)
{
	global $jieqiConfigs;
	global $jieqiLang;
	global $query;
	global $users_handler;
	global $jieqiDeny;
	global $jieqiAction;

	if (!isset($jieqiAction['system'])) {
		jieqi_getconfigs('system', 'action', 'jieqiAction');
	}

	if (!isset($jieqiConfigs['system'])) {
		jieqi_getconfigs('system', 'configs');
	}

	if (!isset($jieqiLang['system'])) {
		jieqi_loadlang('users', 'system');
	}

	if (!is_a($query, 'JieqiQueryHandler')) {
		jieqi_includedb();
		$query = JieqiQueryHandler::getInstance('JieqiQueryHandler');
	}

	if (empty($params['uip']) || !is_numeric(str_replace('.', '', $params['uip']))) {
		$params['uip'] = jieqi_userip();
	}

	$jieqiConfigs['system']['regtimelimit'] = intval($jieqiConfigs['system']['regtimelimit']);

	if (0 < $jieqiConfigs['system']['regtimelimit']) {
		$sql = 'SELECT * FROM ' . jieqi_dbprefix('system_registerip') . ' WHERE ip=\'' . jieqi_dbslashes($params['uip']) . '\' AND regtime>' . (JIEQI_NOW_TIME - ($jieqiConfigs['system']['regtimelimit'] * 3600)) . ' LIMIT 0,1';
		$res = $query->execute($sql);

		if ($query->getRow()) {
			$params['error'] = sprintf($jieqiLang['system']['user_register_timelimit'], $jieqiConfigs['system']['regtimelimit']);

			if ($params['return']) {
				return false;
			}
			else {
				jieqi_printfail($params['error']);
			}
		}
	}

	$params['username'] = trim($params['username']);
	$fromstr = $params['username'];
	$strlen = strlen($fromstr);
	$tmpstr = '';
	$i = 0;

	for (; $i < $strlen; $i++) {
		if (128 < ord($fromstr[$i])) {
			$tmpstr .= $fromstr[$i] . $fromstr[$i + 1];
			$i++;
		}
		else {
			$tmpstr .= strtolower($fromstr[$i]);
		}
	}

	$params['username'] = $tmpstr;
	$params['email'] = trim($params['email']);
	$params['password'] = trim($params['password']);
	$params['repassword'] = trim($params['repassword']);
	$params['mobile'] = isset($params['mobile']) ? trim($params['mobile']) : '';

	if (empty($params['checkcode'])) {
		$params['checkcode'] = '';
	}
	else {
		$params['checkcode'] = trim($params['checkcode']);
	}

	$params['error'] = '';

	if (!is_a($users_handler, 'JieqiUsersHandler')) {
		include_once JIEQI_ROOT_PATH . '/class/users.php';
		$users_handler = &JieqiUsersHandler::getInstance('JieqiUsersHandler');
	}

	jieqi_getconfigs('system', 'deny', 'jieqiDeny');

	if (!empty($jieqiDeny['users'])) {
		include_once JIEQI_ROOT_PATH . '/include/checker.php';
		$checker = new JieqiChecker();
	}

	if (strlen($params['username']) == 0) {
		$params .= 'error';
	}
	else if (preg_match('/\\s+|^c:\\con\\con|[%,\\*"\\s\\<\\>\\&]|　||^Guest|^游客|笴/is', $params['username'])) {
		$params .= 'error';
	}
	else {
		if (($jieqiConfigs['system']['usernamelimit'] == 1) && !preg_match('/^[A-Za-z0-9]+$/', $params['username'])) {
			$params .= 'error';
		}
		else if (!empty($jieqiDeny['users'])) {
			$matchwords = $checker->deny_words($params['username'], $jieqiDeny['users'], true, true);

			if (is_array($matchwords)) {
				$params .= 'error';
			}
		}
	}

	if (!empty($jieqiAction['system']['register']['lenmin']) && (strlen($params['username']) < intval($jieqiAction['system']['register']['lenmin']))) {
		$params .= 'error';
	}

	if (!empty($jieqiAction['system']['register']['lenmax']) && (intval($jieqiAction['system']['register']['lenmax']) < strlen($params['username']))) {
		$params .= 'error';
	}

	if (isset($params['nickname'])) {
		if (strlen($params['nickname']) == 0) {
			$params .= 'error';
		}
		else if (preg_match('/\\s+|^c:\\con\\con|[%,\\*"\\s\\<\\>\\&]|　||^Guest|^游客|笴/is', $params['nickname'])) {
			$params .= 'error';
		}
		else if (!empty($jieqiDeny['users'])) {
			$matchwords = $checker->deny_words($params['nickname'], $jieqiDeny['users'], true, true);

			if (is_array($matchwords)) {
				$params .= 'error';
			}
		}
	}
	else {
		$params['nickname'] = $params['username'];
	}

	if (strlen($params['email']) == 0) {
		$params .= 'error';
	}
	else if (!preg_match('/^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@[a-z0-9-]+([\\.][a-z0-9-]+)+$/i', $params['email'])) {
		$params .= 'error';
	}

	if (strlen(0 < $params['mobile']) && !preg_match('/^(1[358][0-9]{9})$/', $params['mobile'])) {
		$params .= 'error';
	}

	if ((strlen($params['password']) == 0) || (strlen($params['repassword']) == 0)) {
		$params .= 'error';
	}
	else if ($params['password'] != $params['repassword']) {
		$params .= 'error';
	}

	if ($users_handler->getByname($params['username'], 3) != false) {
		$params .= 'error';
	}

	if (($params['nickname'] != $params['username']) && ($users_handler->getByname($params['nickname'], 3) != false)) {
		$params .= 'error';
	}

	if (0 < $users_handler->getCount(new Criteria('email', $params['email'], '='))) {
		$params .= 'error';
	}

	if (!empty($jieqiConfigs['system']['checkcodelogin']) && (empty($params['checkcode']) || empty($_SESSION['jieqiCheckCode']) || (strtolower($params['checkcode']) != strtolower($_SESSION['jieqiCheckCode'])))) {
		$params .= 'error';
	}

	if (!empty($params['error'])) {
		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}
	else {
		return true;
	}
}

function jieqi_uregister_lprocess(&$params)
{
	global $jieqiConfigs;
	global $jieqiLang;
	global $query;
	global $users_handler;
	global $jieqiAction;

	if (!isset($jieqiAction['system'])) {
		jieqi_getconfigs('system', 'action', 'jieqiAction');
	}

	$action_earnscore = intval($jieqiAction['system']['register']['earnscore']);

	if (!isset($jieqiConfigs['system'])) {
		jieqi_getconfigs('system', 'configs');
	}

	if (!isset($jieqiLang['system'])) {
		jieqi_loadlang('users', 'system');
	}

	if (!is_a($query, 'JieqiQueryHandler')) {
		jieqi_includedb();
		$query = JieqiQueryHandler::getInstance('JieqiQueryHandler');
	}

	if (!is_a($users_handler, 'JieqiUsersHandler')) {
		include_once JIEQI_ROOT_PATH . '/class/users.php';
		$users_handler = &JieqiUsersHandler::getInstance('JieqiUsersHandler');
	}

	include_once JIEQI_ROOT_PATH . '/lib/text/textfunction.php';
	$newUser = $users_handler->create();
	$newUser->setVar('siteid', JIEQI_SITE_ID);
	$newUser->setVar('uname', $params['username']);
	$newUser->setVar('name', $params['nickname']);
	$newUser->setVar('pass', $users_handler->encryptPass($params['password']));
	$newUser->setVar('groupid', JIEQI_GROUP_USER);
	$newUser->setVar('regdate', JIEQI_NOW_TIME);
	$newUser->setVar('initial', jieqi_getinitial($params['username']));
	$newUser->setVar('sex', intval($params['sex']));
	$newUser->setVar('email', $params['email']);
	$newUser->setVar('url', $params['url']);
	$newUser->setVar('avatar', 0);
	$newUser->setVar('workid', 0);
	$newUser->setVar('qq', $params['qq']);
	$newUser->setVar('icq', '');
	$newUser->setVar('msn', $params['msn']);
	$newUser->setVar('mobile', $params['mobile']);
	$newUser->setVar('sign', '');
	$newUser->setVar('intro', '');
	$userset = array('regip' => $params['uip']);
	$newUser->setVar('setting', serialize($userset));
	$newUser->setVar('badges', '');
	$newUser->setVar('lastlogin', JIEQI_NOW_TIME);
	$newUser->setVar('showsign', 0);

	if ($params['viewemail'] != 1) {
		$params['viewemail'] = 0;
	}

	$newUser->setVar('viewemail', $params['viewemail']);
	$newUser->setVar('notifymode', 0);
	$newUser->setVar('adminemail', intval($params['adminemail']));
	$newUser->setVar('monthscore', 0);
	$newUser->setVar('experience', $action_earnscore);
	$newUser->setVar('score', $action_earnscore);
	$newUser->setVar('egold', 0);
	$newUser->setVar('esilver', 0);
	$newUser->setVar('credit', 0);
	$newUser->setVar('goodnum', 0);
	$newUser->setVar('badnum', 0);
	$newUser->setVar('isvip', 0);
	$newUser->setVar('overtime', 0);
	$newUser->setVar('state', 0);

	if (!$users_handler->insert($newUser)) {
		$params['uid'] = $newUser->getVar('uid', 'n');
		$params['error'] = $jieqiLang['system']['register_failure'];

		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}
	else {
		if (0 < $jieqiConfigs['system']['regtimelimit']) {
			$sql = 'DELETE FROM ' . jieqi_dbprefix('system_registerip') . ' WHERE regtime<' . (JIEQI_NOW_TIME - ((72 < $jieqiConfigs['system']['regtimelimit'] ? $jieqiConfigs['system']['regtimelimit'] : 72) * 3600));
			$query->execute($sql);
			$sql = 'INSERT INTO ' . jieqi_dbprefix('system_registerip') . ' (ip, regtime, count) VALUES (\'' . jieqi_dbslashes($params['uip']) . '\', \'' . JIEQI_NOW_TIME . '\', \'0\')';
			$query->execute($sql);
		}

		include_once JIEQI_ROOT_PATH . '/class/online.php';
		$online_handler = &JieqiOnlineHandler::getInstance('JieqiOnlineHandler');
		include_once JIEQI_ROOT_PATH . '/include/visitorinfo.php';
		$online = $online_handler->create();
		$online->setVar('uid', $newUser->getVar('uid', 'n'));
		$online->setVar('siteid', JIEQI_SITE_ID);
		$online->setVar('sid', session_id());
		$online->setVar('uname', $newUser->getVar('uname', 'n'));
		$tmpvar = (0 < strlen($newUser->getVar('name', 'n')) ? $newUser->getVar('name', 'n') : $newUser->getVar('uname', 'n'));
		$online->setVar('name', $tmpvar);
		$online->setVar('pass', $newUser->getVar('pass', 'n'));
		$online->setVar('email', $newUser->getVar('email', 'n'));
		$online->setVar('groupid', $newUser->getVar('groupid', 'n'));
		$tmpvar = JIEQI_NOW_TIME;
		$online->setVar('logintime', $tmpvar);
		$online->setVar('updatetime', $tmpvar);
		$online->setVar('operate', '');
		$tmpvar = VisitorInfo::getIp();
		$online->setVar('ip', $tmpvar);
		$online->setVar('browser', VisitorInfo::getBrowser());
		$online->setVar('os', VisitorInfo::getOS());
		$location = VisitorInfo::getIpLocation($tmpvar);

		if (JIEQI_SYSTEM_CHARSET == 'big5') {
			include_once JIEQI_ROOT_PATH . '/include/changecode.php';
			$location = jieqi_gb2big5($location);
		}

		$online->setVar('location', $location);
		$online->setVar('state', '0');
		$online->setVar('flag', '0');
		$online_handler->insert($online);
		jieqi_setusersession($newUser);
		$jieqi_user_info = array();
		$jieqi_user_info['jieqiUserId'] = $_SESSION['jieqiUserId'];
		$jieqi_user_info['jieqiUserName'] = $_SESSION['jieqiUserName'];
		$jieqi_user_info['jieqiUserGroup'] = $_SESSION['jieqiUserGroup'];
		include_once JIEQI_ROOT_PATH . '/include/changecode.php';

		if (JIEQI_SYSTEM_CHARSET == 'gbk') {
			$jieqi_user_info['jieqiUserName_un'] = jieqi_gb2unicode($_SESSION['jieqiUserName']);
		}
		else {
			$jieqi_user_info['jieqiUserName_un'] = jieqi_big52unicode($_SESSION['jieqiUserName']);
		}

		$jieqi_user_info['jieqiUserLogin'] = JIEQI_NOW_TIME;
		$cookietime = 0;
		@setcookie('jieqiUserInfo', jieqi_sarytostr($jieqi_user_info), $cookietime, '/', JIEQI_COOKIE_DOMAIN, 0);
		$jieqi_visit_info['jieqiUserLogin'] = $jieqi_user_info['jieqiUserLogin'];
		$jieqi_visit_info['jieqiUserId'] = $jieqi_user_info['jieqiUserId'];
		@setcookie('jieqiVisitInfo', jieqi_sarytostr($jieqi_visit_info), JIEQI_NOW_TIME + 99999999, '/', JIEQI_COOKIE_DOMAIN, 0);
		if ((0 < JIEQI_PROMOTION_REGISTER) && !empty($_COOKIE['jieqiPromotion'])) {
			$users_handler->changeCredit(intval($_COOKIE['jieqiPromotion']), intval(JIEQI_PROMOTION_REGISTER), true);
			setcookie('jieqiPromotion', '', 0, '/', JIEQI_COOKIE_DOMAIN, 0);
		}
	}

	if (empty($params['jumpurl']) || !preg_match('/^(\\/\\w+|https?:\\/\\/)/i', $_REQUEST['jumpurl'])) {
		$params['jumpurl'] = JIEQI_URL . '/';
	}

	return true;
}

function jieqi_ulogin_lprepare(&$params)
{
	$params['username'] = trim($params['username']);
	return true;
}

function jieqi_ulogin_lprocess(&$params)
{
	global $jieqiLang;
	global $query;

	if (!isset($jieqiLang['system'])) {
		jieqi_loadlang('users', 'system');
	}

	include_once JIEQI_ROOT_PATH . '/include/checklogin.php';
	if (isset($params['usecookie']) && is_numeric($params['usecookie'])) {
		$params['usecookie'] = intval($params['usecookie']);
	}
	else {
		$params['usecookie'] = 0;
	}

	if (empty($params['checkcode'])) {
		$params['checkcode'] = '';
	}

	$islogin = jieqi_logincheck($params['username'], $params['password'], $params['checkcode'], $params['usecookie']);

	if ($islogin == 0) {
		if (defined('JIEQI_ADMIN_LOGIN')) {
			$_SESSION['jieqiAdminLogin'] = 1;
			$jieqi_online_info = (empty($_COOKIE['jieqiOnlineInfo']) ? array() : jieqi_strtosary($_COOKIE['jieqiOnlineInfo']));
			$jieqi_online_info['jieqiAdminLogin'] = 1;
			@setcookie('jieqiOnlineInfo', jieqi_sarytostr($jieqi_online_info), 0, '/', JIEQI_COOKIE_DOMAIN, 0);
			include_once JIEQI_ROOT_PATH . '/class/logs.php';
			$logs_handler = JieqiLogsHandler::getInstance('JieqiLogsHandler');
			$logdata = array('logtype' => 1);
			$logs_handler->addlog($logdata);
		}

		if (defined('JIEQI_USER_USERAPI') && (0 < JIEQI_USER_USERAPI) && (0 < $_SESSION['jieqiUserId'])) {
			if (!is_a($query, 'JieqiQueryHandler')) {
				jieqi_includedb();
				$query = JieqiQueryHandler::getInstance('JieqiQueryHandler');
			}

			$sql = 'SELECT * FROM ' . jieqi_dbprefix('system_userapi') . ' WHERE uid = ' . intval($_SESSION['jieqiUserId']) . ' LIMIT 0,1';
			$query->execute($sql);
			$row = $query->getRow();
			if (is_array($row) && !empty($row['uid'])) {
				$tmpvar = unserialize($row['apidata']);
				if (is_array($tmpvar) && (0 < count($tmpvar))) {
					foreach ($tmpvar as $k => $v) {
						if (!isset($_SESSION['jieqiUserApi'][$k])) {
							$_SESSION[$k] = $v;
						}
					}
				}
			}
		}

		if (empty($params['jumpurl'])) {
			if (!empty($params['jumpreferer']) && !empty($_SERVER['HTTP_REFERER']) && (basename($_SERVER['HTTP_REFERER']) != 'login.php')) {
				$params['jumpurl'] = $_SERVER['HTTP_REFERER'];
			}
			else {
				$params['jumpurl'] = JIEQI_URL . '/';
			}
		}
	}
	else {
		switch ($islogin) {
		case -1:
			$params['error'] = $jieqiLang['system']['need_username'];
			break;

		case -2:
			$params['error'] = $jieqiLang['system']['need_password'];
			break;

		case -3:
			$params['error'] = $jieqiLang['system']['need_userpass'];
			break;

		case -4:
			$params['error'] = $jieqiLang['system']['no_this_user'];
			break;

		case -5:
			$params['error'] = $jieqiLang['system']['error_password'];
			break;

		case -6:
			$params['error'] = $jieqiLang['system']['error_userpass'];
			break;

		case -7:
			$params['error'] = $jieqiLang['system']['error_checkcode'];
			break;

		case -8:
			$params['error'] = $jieqiLang['system']['other_has_login'];
			break;

		case -9:
			$params['error'] = $jieqiLang['system']['user_has_denied'];
			break;

		default:
			$params['error'] = $jieqiLang['system']['login_failure'];
			break;
		}

		$params['errorno'] = $islogin;

		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}

	return true;
}

function jieqi_ulogout_lprepare(&$params)
{
	$params['uid'] = intval($_SESSION['jieqiUserId']);
	return true;
}

function jieqi_ulogout_lprocess(&$params)
{
	include_once JIEQI_ROOT_PATH . '/class/online.php';
	$online_handler = &JieqiOnlineHandler::getInstance('JieqiOnlineHandler');
	$criteria = new CriteriaCompo(new Criteria('sid', session_id()));
	$criteria->add(new Criteria('uid', intval($_SESSION['jieqiUserId'])), 'OR');
	$online_handler->delete($criteria);
	header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');

	if (!empty($_COOKIE['jieqiUserInfo'])) {
		setcookie('jieqiUserInfo', '', 0, '/', JIEQI_COOKIE_DOMAIN, 0);
	}

	if (!empty($_COOKIE['jieqiOnlineInfo'])) {
		setcookie('jieqiOnlineInfo', '', 0, '/', JIEQI_COOKIE_DOMAIN, 0);
	}

	if (!empty($_COOKIE[session_name()])) {
		setcookie(session_name(), '', 0, '/', JIEQI_COOKIE_DOMAIN, 0);
	}

	@session_unset();
	@session_destroy();
	@session_write_close();
	@session_regenerate_id(true);
	return true;
}

function jieqi_udelete_lprepare(&$params)
{
	return true;
}

function jieqi_udelete_lprocess(&$params)
{
	global $users_handler;
	global $jieqiLang;

	if (!isset($jieqiLang['system'])) {
		jieqi_loadlang('users', 'system');
	}

	if (!is_a($users_handler, 'JieqiUsersHandler')) {
		include_once JIEQI_ROOT_PATH . '/class/users.php';
		$users_handler = &JieqiUsersHandler::getInstance('JieqiUsersHandler');
	}

	$user = $users_handler->get($params['uid']);

	if (!is_object($user)) {
		$params['error'] = LANG_NO_USER;
		$params['username'] = '';

		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}
	else {
		$params['username'] = $user->getVar('uname', 'n');
	}

	if (!$users_handler->delete($params['uid'])) {
		$params['error'] = $jieqiLang['system']['delete_user_failure'];

		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}
	else {
		if ((JIEQI_NOW_TIME - intval($user->getVar('lastlogin', 'n'))) < 2592000) {
			$userset = unserialize($user->getVar('setting', 'n'));

			if (!empty($userset['loginsid'])) {
				$mysid = session_id();
				@session_id(jieqi_headstr($userset['loginsid']));
				@session_destroy();
				@session_id($mysid);
			}
		}

		include_once JIEQI_ROOT_PATH . '/class/userlog.php';
		$userlog_handler = JieqiUserlogHandler::getInstance('JieqiUserlogHandler');
		$newlog = $userlog_handler->create();
		$newlog->setVar('siteid', JIEQI_SITE_ID);
		$newlog->setVar('logtime', JIEQI_NOW_TIME);
		$newlog->setVar('fromid', $_SESSION['jieqiUserId']);
		$newlog->setVar('fromname', $_SESSION['jieqiUserName']);
		$newlog->setVar('toid', $user->getVar('uid', 'n'));
		$newlog->setVar('toname', $user->getVar('uname', 'n'));
		$newlog->setVar('reason', $params['reason']);
		$newlog->setVar('chginfo', $jieqiLang['system']['delete_user']);
		$newlog->setVar('chglog', '');
		$newlog->setVar('isdel', '1');
		$newlog->setVar('userlog', serialize($user->getVars()));
		$userlog_handler->insert($newlog);
		return true;
	}
}

function jieqi_uedit_lprepare(&$params)
{
	global $users_handler;
	global $jieqiPower;
	global $jieqiUsersStatus;
	global $jieqiUsersGroup;
	global $jieqiLang;
	global $jieqiConfigs;
	global $jieqiDeny;

	if (!isset($jieqiConfigs['system'])) {
		jieqi_getconfigs('system', 'configs');
	}

	if (!isset($jieqiLang['system'])) {
		jieqi_loadlang('users', 'system');
	}

	if (!is_a($users_handler, 'JieqiUsersHandler')) {
		include_once JIEQI_ROOT_PATH . '/class/users.php';
		$users_handler = &JieqiUsersHandler::getInstance('JieqiUsersHandler');
	}

	$user = $users_handler->get($params['uid']);

	if (!is_object($user)) {
		$params['error'] = LANG_NO_USER;

		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}
	else {
		$params['username'] = $user->getVar('uname', 'n');
	}

	$tmpstr = ($_SERVER['PHP_SELF'] ? basename($_SERVER['PHP_SELF']) : basename($_SERVER['SCRIPT_NAME']));
	if (empty($_SESSION['jieqiAdminLogin']) || strstr($tmpstr, 'useredit.php')) {
		$params['adminlevel'] = 0;
	}
	else {
		if (!isset($jieqiPower['system'])) {
			jieqi_getconfigs('system', 'power');
		}

		if (jieqi_checkpower($jieqiPower['system']['deluser'], $jieqiUsersStatus, $jieqiUsersGroup, true, true)) {
			$params['adminlevel'] = 5;
		}
		else if (jieqi_checkpower($jieqiPower['system']['adminvip'], $jieqiUsersStatus, $jieqiUsersGroup, true, true)) {
			$params['adminlevel'] = 4;
		}
		else if (jieqi_checkpower($jieqiPower['system']['changegroup'], $jieqiUsersStatus, $jieqiUsersGroup, true, true)) {
			$params['adminlevel'] = 3;
		}
		else if (jieqi_checkpower($jieqiPower['system']['adminuser'], $jieqiUsersStatus, $jieqiUsersGroup, true, true)) {
			$params['adminlevel'] = 2;
		}
		else {
			$params['adminlevel'] = 0;
		}
	}

	if ($params['adminlevel'] == 0) {
		if ($params['uid'] == $_SESSION['jieqiUserId']) {
			$params['adminlevel'] = 1;
		}
		else {
			if (!empty($params['oldpass']) && (($user->getVar('pass', 'n') == $params['oldpass']) || ($user->getVar('pass', 'n') == $users_handler->encryptPass($params['oldpass'])))) {
				$params['adminlevel'] = 1;
			}
		}
	}

	if ($params['adminlevel'] == 0) {
		$params['error'] = LANG_NO_PERMISSION;

		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}

	$params['error'] = '';

	if ($params['adminlevel'] == 1) {
		if (isset($params['email'])) {
			$params['email'] = trim($params['email']);

			if (strlen($params['email']) == 0) {
				$params .= 'error';
			}
			else if (!preg_match('/^[_a-z0-9-]+(\\.[_a-z0-9-]+)*@[a-z0-9-]+([\\.][a-z0-9-]+)+$/i', $params['email'])) {
				$params .= 'error';
			}

			if ($params['email'] != $user->getVar('email', 'n')) {
				if (0 < $users_handler->getCount(new Criteria('email', $params['email'], '='))) {
					$params .= 'error';
				}
			}
		}

		if (isset($params['mobile'])) {
			$params['mobile'] = trim($params['mobile']);

			if (!preg_match('/^(1[358][0-9]{9})$/', $params['mobile'])) {
				$params .= 'error';
			}
		}

		$params['changenick'] = false;
		if (isset($params['nickname']) && ($user->getVar('name', 'n') != $params['nickname'])) {
			if ($params['nickname'] != '') {
				jieqi_getconfigs('system', 'deny', 'jieqiDeny');

				if (!empty($jieqiDeny['users'])) {
					include_once JIEQI_ROOT_PATH . '/include/checker.php';
					$checker = new JieqiChecker();
				}

				if ($users_handler->getByname($params['nickname'], 3) != false) {
					$params .= 'error';
				}
				else if (!empty($jieqiDeny['users'])) {
					$matchwords = $checker->deny_words($params['nickname'], $jieqiDeny['users'], true, true);

					if (is_array($matchwords)) {
						$params .= 'error';
					}
				}
			}

			$params['changenick'] = true;
		}

		if (!empty($params['newpass'])) {
			$params['oldpass'] = trim($params['oldpass']);
			$params['newpass'] = trim($params['newpass']);
			$params['repass'] = trim($params['repass']);

			if ($params['newpass'] != $params['repass']) {
				$params .= 'error';
			}
			else if (strlen($params['newpass']) == 0) {
				$params .= 'error';
			}
			else {
				if (($user->getVar('pass', 'n') != $params['oldpass']) && ($user->getVar('pass', 'n') != $users_handler->encryptPass($params['oldpass']))) {
					$params .= 'error';
				}
			}
		}
	}

	if (!empty($params['error'])) {
		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}
	else {
		return true;
	}
}

function jieqi_uedit_lprocess(&$params)
{
	global $users_handler;
	global $jieqiLang;
	global $jieqiConfigs;
	global $jieqiHonors;
	global $jieqiUsersStatus;
	global $jieqiUsersGroup;

	if (!isset($jieqiConfigs['system'])) {
		jieqi_getconfigs('system', 'configs');
	}

	if (!isset($jieqiLang['system'])) {
		jieqi_loadlang('users', 'system');
	}

	if (!is_a($users_handler, 'JieqiUsersHandler')) {
		include_once JIEQI_ROOT_PATH . '/class/users.php';
		$users_handler = &JieqiUsersHandler::getInstance('JieqiUsersHandler');
	}

	$user = $users_handler->get($params['uid']);

	if (!is_object($user)) {
		$params['error'] = LANG_NO_USER;

		if ($params['return']) {
			return false;
		}
		else {
			jieqi_printfail($params['error']);
		}
	}

	$relogin = false;
	$chglog = array();
	$chginfo = '';
	$user->unsetNew();

	if (0 < $params['adminlevel']) {
		if (0 < strlen($params['newpass'])) {
			$user->setVar('pass', $users_handler->encryptPass($params['newpass']));
		}
	}

	if ($params['adminlevel'] == 1) {
		if (isset($params['nickname']) && (0 < strlen($params['nickname']))) {
			$user->setVar('name', $params['nickname']);
		}
		else {
			$user->setVar('name', $user->getVar('uname', 'n'));
		}

		$user->setVar('sex', intval($params['sex']));
		$user->setVar('email', $params['email']);

		if (isset($params['mobile'])) {
			$user->setVar('mobile', $params['mobile']);
		}

		$user->setVar('url', $params['url']);
		$user->setVar('qq', $params['qq']);
		$user->setVar('msn', $params['msn']);

		if ($params['viewemail'] != 1) {
			$params['viewemail'] = 0;
		}

		$user->setVar('viewemail', $params['viewemail']);
		$user->setVar('adminemail', intval($params['adminemail']));
		if (isset($params['workid']) && (intval($user->getVar('workid', 'n')) != intval($params['workid']))) {
			$user->setVar('workid', $params['workid']);
			$params['changework'] = true;
		}
		else {
			$params['changework'] = false;
		}

		$user->setVar('sign', $params['sign']);
		$user->setVar('intro', $params['intro']);

		if (!$users_handler->insert($user)) {
			$params['error'] = empty($params['lang_failure']) ? $jieqiLang['system']['user_edit_failure'] : $params['lang_failure'];

			if ($params['return']) {
				return false;
			}
			else {
				jieqi_printfail($params['error']);
			}
		}
		else {
			if ($params['changework'] && ($_SESSION['jieqiUserId'] == $user->getVar('uid'))) {
				jieqi_getconfigs('system', 'honors');
				$honorid = jieqi_gethonorid($user->getVar('score'), $jieqiHonors);
				$_SESSION['jieqiUserHonor'] = $jieqiHonors[$honorid]['name'][intval($user->getVar('workid', 'n'))];
			}

			if ($params['changenick'] && ($_SESSION['jieqiUserId'] == $user->getVar('uid'))) {
				$_SESSION['jieqiUserName'] = 0 < strlen($user->getVar('name', 'n')) ? $user->getVar('name', 'n') : $user->getVar('uname', 'n');
			}

			$user->saveToSession();
			return true;
		}
	}
	else if (1 < $params['adminlevel']) {
		if (2 <= $params['adminlevel']) {
			if (0 < strlen($params['pass'])) {
				$user->setVar('pass', $users_handler->encryptPass($params['pass']));
				$chginfo .= $jieqiLang['system']['userlog_change_password'];
				$relogin = true;
			}

			if (is_numeric($params['experience']) && ($params['experience'] != $user->getVar('experience'))) {
				$chglog['experience']['from'] = $user->getVar('experience');
				$chglog['experience']['to'] = $params['experience'];
				$user->setVar('experience', $params['experience']);

				if ($chglog['experience']['to'] < $chglog['experience']['from']) {
					$chginfo .= sprintf($jieqiLang['system']['userlog_less_experience'], $chglog['experience']['from'] - $chglog['experience']['to']);
				}
				else {
					$chginfo .= sprintf($jieqiLang['system']['userlog_add_experience'], $chglog['experience']['to'] - $chglog['experience']['from']);
				}
			}

			if (is_numeric($params['score']) && ($params['score'] != $user->getVar('score'))) {
				$chglog['score']['from'] = $user->getVar('score');
				$chglog['score']['to'] = $params['score'];
				$user->setVar('score', $params['score']);

				if ($chglog['score']['to'] < $chglog['score']['from']) {
					$chginfo .= sprintf($jieqiLang['system']['userlog_less_score'], $chglog['score']['from'] - $chglog['score']['to']);
				}
				else {
					$chginfo .= sprintf($jieqiLang['system']['userlog_add_score'], $chglog['score']['to'] - $chglog['score']['from']);
				}
			}
		}

		if (3 <= $params['adminlevel']) {
			if (is_numeric($params['groupid']) && ($params['groupid'] != $user->getVar('groupid'))) {
				if (($params['groupid'] == JIEQI_GROUP_ADMIN) && ($jieqiUsersGroup != JIEQI_GROUP_ADMIN)) {
					$params['error'] = $jieqiLang['system']['cant_set_admin'];

					if ($params['return']) {
						return false;
					}
					else {
						jieqi_printfail($params['error']);
					}
				}

				$chglog['groupid']['from'] = $user->getVar('groupid');
				$chglog['groupid']['to'] = $params['groupid'];
				$user->setVar('groupid', $params['groupid']);
				$chginfo .= sprintf($jieqiLang['system']['userlog_change_group'], $jieqiGroups[$chglog['groupid']['from']], $jieqiGroups[$chglog['groupid']['to']]);
				$relogin = true;
			}
		}

		if (4 <= $params['adminlevel']) {
			if (is_numeric($params['isvip']) && ($params['isvip'] != $user->getVar('isvip'))) {
				$tmpstr = $user->getViptype();
				$chglog['isvip']['from'] = $user->getVar('isvip');
				$chglog['isvip']['to'] = $params['groupid'];
				$user->setVar('isvip', $params['isvip']);
				$chginfo .= sprintf($jieqiLang['system']['userlog_change_vip'], $tmpstr, $user->getViptype());
			}

			$setting = unserialize($user->getVar('setting', 'n'));

			if (!is_array($setting)) {
				$setting = array();
			}

			$setupdate = false;
			if (is_numeric($params['vipvote']) && ($params['vipvote'] != intval($setting['gift']['vipvote']))) {
				$chglog['vipvote']['from'] = intval($setting['gift']['vipvote']);
				$chglog['vipvote']['to'] = $params['vipvote'];
				$setting['gift']['vipvote'] = $params['vipvote'];

				if ($chglog['vipvote']['to'] < $chglog['vipvote']['from']) {
					$chginfo .= sprintf($jieqiLang['system']['userlog_less_vipvote'], $chglog['vipvote']['from'] - $chglog['vipvote']['to']);
				}
				else {
					$chginfo .= sprintf($jieqiLang['system']['userlog_add_vipvote'], $chglog['vipvote']['to'] - $chglog['vipvote']['from']);
				}

				$setupdate = true;
			}

			if (is_numeric($params['flower']) && ($params['flower'] != intval($setting['gift']['flower']))) {
				$chglog['flower']['from'] = intval($setting['gift']['flower']);
				$chglog['flower']['to'] = $params['flower'];
				$setting['gift']['flower'] = $params['flower'];

				if ($chglog['flower']['to'] < $chglog['flower']['from']) {
					$chginfo .= sprintf($jieqiLang['system']['userlog_less_flower'], $chglog['flower']['from'] - $chglog['flower']['to']);
				}
				else {
					$chginfo .= sprintf($jieqiLang['system']['userlog_add_flower'], $chglog['flower']['to'] - $chglog['flower']['from']);
				}

				$setupdate = true;
			}

			if (is_numeric($params['egg']) && ($params['egg'] != intval($setting['gift']['egg']))) {
				$chglog['egg']['from'] = intval($setting['gift']['egg']);
				$chglog['egg']['to'] = $params['egg'];
				$setting['gift']['egg'] = $params['egg'];

				if ($chglog['egg']['to'] < $chglog['egg']['from']) {
					$chginfo .= sprintf($jieqiLang['system']['userlog_less_egg'], $chglog['egg']['from'] - $chglog['egg']['to']);
				}
				else {
					$chginfo .= sprintf($jieqiLang['system']['userlog_add_egg'], $chglog['egg']['to'] - $chglog['egg']['from']);
				}

				$setupdate = true;
			}

			if ($setupdate) {
				$user->setVar('setting', serialize($setting));
			}
		}

		if (!$users_handler->insert($user)) {
			$params['error'] = $jieqiLang['system']['change_user_failure'];

			if ($params['return']) {
				return false;
			}
			else {
				jieqi_printfail($params['error']);
			}
		}
		else {
			if (($relogin == true) && ((JIEQI_NOW_TIME - intval($user->getVar('lastlogin', 'n'))) < 2592000)) {
				$userset = unserialize($user->getVar('setting', 'n'));

				if (!empty($userset['loginsid'])) {
					$mysid = session_id();
					@session_id($userset['loginsid']);
					@session_destroy();
					@session_id($mysid);
				}
			}

			include_once JIEQI_ROOT_PATH . '/class/userlog.php';
			$userlog_handler = JieqiUserlogHandler::getInstance('JieqiUserlogHandler');
			$newlog = $userlog_handler->create();
			$newlog->setVar('siteid', JIEQI_SITE_ID);
			$newlog->setVar('logtime', JIEQI_NOW_TIME);
			$newlog->setVar('fromid', $_SESSION['jieqiUserId']);
			$newlog->setVar('fromname', $_SESSION['jieqiUserName']);
			$newlog->setVar('toid', $user->getVar('uid', 'n'));
			$newlog->setVar('toname', $user->getVar('uname', 'n'));
			$newlog->setVar('reason', $params['reason']);
			$newlog->setVar('chginfo', $chginfo);
			$newlog->setVar('chglog', serialize($chglog));
			$newlog->setVar('isdel', '0');
			$newlog->setVar('userlog', '');
			$userlog_handler->insert($newlog);
			return true;
		}
	}

	return true;
}


?>
