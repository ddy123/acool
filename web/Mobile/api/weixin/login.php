<?php
define("JIEQI_MODULE_NAME", "system");
define('JIEQI_CHAR_SET', 'utf-8');  //本接口需要转换成utf-8编码输出
define("JIEQI_NEED_SESSION", 1);
require_once ("../../global.php");
include_once ("./config.inc.php");
include_once ("./lang_api.php");
//set_include_path(JIEQI_ROOT_PATH . "/lib/");
//include_once (JIEQI_ROOT_PATH . "/lib/OpenSDK/Weixin/SNS2.php");
//-------生成唯一随机串防CSRF攻击
//$state  = md5(uniqid(rand(), TRUE));
//$_SESSION["wx_state"]    =   $state; //存到SESSION
//$callback = urlencode($callback);
$_SESSION["jieqiUserApi"][$apiName]["state"] = md5(uniqid(rand(), true));
$user_agent = $_SERVER['HTTP_USER_AGENT'];

if ( strpos($user_agent, 'MicroMessenger') !== false) { 
$wxurl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$apiConfigs[$apiName]["appid"]."&redirect_uri=".$apiConfigs[$apiName]["callback"]."&response_type=code&scope=snsapi_login&state=".$_SESSION["jieqiUserApi"][$apiName]["state"]."#wechat_redirect";
}else{
$wxurl = "https://open.weixin.qq.com/connect/qrconnect?appid=".$apiConfigs[$apiName]["appid"]."&redirect_uri=".$apiConfigs[$apiName]["callback"]."&response_type=code&scope=snsapi_login&state=".$_SESSION["jieqiUserApi"][$apiName]["state"]."#wechat_redirect";
}
header("Location: $wxurl");  
?>
