<?php
//新浪微博登录接口参数设置

$apiOrder = 4; //接口序号，请勿修改
$apiName = 'weibo'; //接口名，请勿修改
$apiTitle = '新浪微博'; //接口标题，请勿修改

$apiConfigs[$apiName] = array(); //初始化参数数组，请勿修改

$apiConfigs[$apiName]['appid'] = '3793059400';  //应用ID，根据实际申请的值修改

$apiConfigs[$apiName]['appkey'] = ' 9d7291b4c1b4e3575d1102ef1efaafa4 ';  //接口密钥，根据实际申请的值修改

$apiConfigs[$apiName]['callback'] = JIEQI_LOCAL_URL.'/api/'.$apiName.'/loginback.php';  //登录后返回的本站地址，请勿修改

//$apiConfigs[$apiName]['callback'] = 'http://www.juziread.com/api/weibo/loginback.php';  //登录后返回的本站地址，请勿修改

$apiConfigs[$apiName]['scope'] = 'snsapi_login'; //允许授权哪些api接口，用英文逗号分隔
?>