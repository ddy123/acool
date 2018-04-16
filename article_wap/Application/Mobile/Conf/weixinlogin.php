<?php
/**
 * Created by PhpStorm.
 * User: burn
 * Date: 2017/4/1
 * Time: 下午5:32
 */

$apiOrder = 2; //接口序号，请勿修改
$apiName  = 'weixin'; //接口名，请勿修改
$apiTitle = '微信'; //接口标题，请勿修改

$apiConfigs['weixin']               = array(); //初始化参数数组，请勿修改

$apiConfigs['weixin']['appid']      = 'wxb3065997223958f2';  //应用ID，根据实际申请的值修改

$apiConfigs['weixin']['appkey']     = '52febfbd80a587489d508ed9d8de54ec';  //接口密钥，根据实际申请的值修改

$apiConfigs['weixin']['return_url'] = "http://m.juziread.com/LoginApi/callback/oauth/weixin.html";

$apiConfigs['weixin']['scope']      = 'snsapi_login'; //允许授权哪些api接口，用英文逗号分隔

return array('WEIXIN_LOGIN_CONF' => $apiConfigs['weixin']);