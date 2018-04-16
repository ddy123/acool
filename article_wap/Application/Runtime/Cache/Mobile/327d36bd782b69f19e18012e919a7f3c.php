<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
	<head>
		<meta name="Generator" content="TPSHOP v1.1" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="applicable-device" content="mobile">
		<link rel="shortcut icon" href="/Public/images/favicon.ico" />
		<title><?php echo ($site_title); ?></title>
		<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
		<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
		<link rel="stylesheet" href="/Template/mobile/default/Static/css/public.css">
		<link rel="stylesheet" href="/Template/mobile/default/Static/css/index.css">
		<link rel="stylesheet" href="/Template/mobile/default/Static/css/user.css">
		<script type="text/javascript" src="/Template/mobile/default/Static/js/jquery.js"></script>
		<script type="text/javascript" src="/Template/mobile/default/Static/js/common.js"></script>
		<script type="text/javascript" src="/Template/mobile/default/Static/js/modernizr.js"></script>
		<script type="text/javascript" src="/Template/mobile/default/Static/js/layer.js" ></script>
		<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js" ></script>
	</head>

<body>
    <div class="tab_nav">
        <div class="header">
            <div class="h-left">
                <a class="sb-back" href="javascript:history.back(-1);" title="返回" target="_self"></a>
            </div>

            <div class="h-mid" style="width: 80%;float: left">
                <span >
                    微信支付
                </span>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="/Template/mobile/default/Static/css/weixinpay.css">

    <div class="weixinpayinfo">
        <h3 align="center">
            <strong>
                请您及时付款，以便订单尽快处理！
            </strong>
        </h3>

        <h3 align="center">
            <p>
                订单号：
            </p>
            <p>
                <?php echo ($out_trade_no); ?>
            </p>
        </h3>

        <input type="hidden" name="out_trade_no" id="out_trade_no" value="<?php echo ($out_trade_no); ?>" />

        <div style="color:red;text-align:center;">
            <div>
                <span>充值金额<?php echo ($total_fee); ?>元</span>
            </div>

            <div>
                <span>
                    请在
                    <em id="time">
                        2
                    </em>
                    小时内完成支付
                </span>
            </div>
        </div>
    </div>
    <div align="center">
        <img alt="模式二扫码支付" class="weixinpayimg" src="http://www.juziread.com/lib/OpenSDK/WxpayAPI/example/qrcode.php?data=<?php echo ($imgUrl); ?>" />
    </div>
    <script>

        //设置每隔1000毫秒执行一次load() 方法
        var myIntval = setInterval(function(){load()},1000);

        function load()
        {
            //document.getElementById("timer").innerHTML = parseInt(document.getElementById("timer").innerHTML) + 1;

            var xmlhttp;

            if (window.XMLHttpRequest)
            {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else
            {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    trade_state = xmlhttp.responseText;

                    trade_state = trade_state.replace(/\ +/g,"");

                    trade_state = trade_state.replace(/[\r\n]/g,"");

                    trade_state = trade_state.replace(/[ ]/g,"");

                    if(trade_state == 'SUCCESS')
                    {
                        alert('支付成功，点击按钮跳转到首页');

                        //延迟3000毫秒执行tz() 方法
                        clearInterval(myIntval);

                        setTimeout("location.href='http://m.juziread.com'",0);
                    }
                }
            }

            //文件返回订单状态，通过订单状态确定支付状态
            xmlhttp.open("POST","http://m.juziread.com/User/weixinOrderQuery.html",false);

            //下面这句话必须有
            //把标签/值对添加到要发送的头文件。
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

            xmlhttp.send("out_trade_no=" + $('#out_trade_no').val());
        }
    </script>

</body>