<?php
/**
 * Created by PhpStorm.
 * User: burn
 * Date: 2017/4/1
 * Time: 下午5:32
 */

$apiConfigs['weibo']               = array(); //初始化参数数组，请勿修改

$apiConfigs['weibo']['appid']      = '3793059400';  //应用ID，根据实际申请的值修改
$apiConfigs['weibo']['appkey']     = '9d7291b4c1b4e3575d1102ef1efaafa4';  //接口密钥，根据实际申请的值修改

$apiConfigs['weibo']['return_url'] = "http://m.juziread.com/LoginApi/callback/oauth/weibo.html";  //登录后返回的本站地址，请勿修改

//$apiConfigs['qq']['return_url'] = "http://m.kyread.com?c=LoginApi&a=callback&oauth=weibo";

$apiConfigs['weibo']['scope']      = ''; //允许授权哪些api接口，用英文逗号分隔

return array('WEIBO_LOGIN_CONF' => $apiConfigs['weibo']);