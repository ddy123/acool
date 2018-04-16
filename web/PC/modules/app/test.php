<?php
/**
 * Created by PhpStorm.
 * User: burn
 * Date: 2017/1/7
 * Time: 下午5:14
 *
 * 小说测试接口
 *
 */

function getClientIp()
{
	if (!empty($_SERVER["HTTP_CLIENT_IP"]))
	{
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
	{
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	else if (!empty($_SERVER["REMOTE_ADDR"]))
	{
		$ip = $_SERVER["REMOTE_ADDR"];
	}
	else
	{
		$ip = "err";
	}
	
	return $ip;
}

echo "IP: " . getClientIp() . "";
echo "<br><br>referer: " . $_SERVER["HTTP_REFERER"];

echo '<br><br>$_SERVER.HTTP_USER_AGENT : ';

var_dump($_SERVER['HTTP_USER_AGENT']);

echo '<br><br>$_SERVER: ';

var_dump($_SERVER);

phpinfo();

?>