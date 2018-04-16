<?php
/**
 * Created by PhpStorm.
 * User: burn
 * Date: 2017/4/7
 * Time: 下午5:32
 *
 * 微信支付的配置文件
 *
 */

$weixinPay['appid']            = 'wx59a74fce34b72421'; //公众账号

$weixinPay['mch_id']           = '1495475732'; //微信支付分配的商户号

$weixinPay['opendkey']         = '7dcf98bc0d31e35b7a7d8cce3afc4ff9';//公众号key

$weixinPay['paykey']           = '20180226juzizhongwenwang1147burn';//支付key

$weixinPay['device_info']      = 'WEB';//设备号

$weixinPay['sign_type']        = 'MD5';

$weixinPay['body']             = '巨子中文网'; //商品描述

//$weixinPay['notify_url']       = 'http://m.kyread.com/User/weixinAppPayReturn.html'; //通知地址

$weixinPay['notify_url']       = 'http://m.juziread.com/User/weixinAppPayReturn/channelid/%s/secretkey/%s/channel/%s/type/%s.html'; //通知地址

$weixinPay['back_url']         = "http://m.juziread.com/User/buyEgold.html";

$weixinPay['ip']               = '47.96.146.134';//服务器ip

$weixinPay['trade_type']       = 'JSAPI';//交易类型,JSAPI-公众号支付

//这个参数不设置的话，用户可以购买任意值的虚拟货币，按照一元钱100币折算。如果设置了这个参数，则购买金额只能按照里面的设置，对应的也金钱按对应关系折算，如 '1000'=>'10' 是指 1000虚拟币需要10172438元
$weixinPay['paylimit']         = array('3000'=>'30', '8000'=>'50', '13000'=>'80', '20000'=>'100', '50000'=>'200','150000'=>'500');

$weixinPay['moneytype']        = '0';  //0 人民币 1表示美元

$weixinPay['paysilver']        = '0';   //0 表示冲值成金币 1表示银币

$weixinPay['payment_type']     = '1';  // 商品支付类型 1 ＝商品购买 2＝服务购买 3＝网络拍卖 4＝捐赠 5＝邮费补偿 6＝奖金

$weixinPay['unifiedorder_url'] = 'https://api.mch.weixin.qq.com/pay/unifiedorder';//微信支付的统一下单API

$weixinPay['orderquery_url']   = 'https://api.mch.weixin.qq.com/pay/orderquery';//微信支付的查询订单单API

$weixinPay['package']          = 'Sign=WXPay';

return array('WEIXIN_APP_PAY_CONF' => $weixinPay);

?>
