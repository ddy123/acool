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

<body style="background-color: rgb(246,246,246);">
    <div class="tab_nav">
        <div class="header">
            <div class="h-left">
                <a class="sb-back" href="javascript:history.back(-1);" title="返回" target="_self"></a>
            </div>

            <div class="h-mid" style="width: 80%;float: left">
                用户信息
            </div>
        </div>
    </div>

    <div id="tbh5v0" style="margin-top: 45px">
        <div class="user_com">
            <div class="Wallet">
                <a href="<?php echo U('Mobile/User/setNickName');?>">
                    <dl class="b" style="margin-left: 10px">
                        <dt>
                            修改昵称
                        </dt>
                        <dd  style="margin-right: 40px">
                            &nbsp;
                        </dd>
                    </dl>
                </a>

                <a href="<?php echo U('Mobile/User/setPwd');?>">
                    <dl class="b" style="margin-left: 10px">
                        <dt>
                            修改密码
                        </dt>
                        <dd  style="margin-right: 40px">
                            &nbsp;
                        </dd>
                    </dl>
                </a>

                <a href="<?php echo U('Mobile/User/setSex');?>" >
                    <dl class="b" style="margin-left: 10px">
                        <dt>
                            修改性别
                        </dt>
                        <dd style="margin-right: 40px">
                            &nbsp;
                        </dd>
                    </dl>
                </a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function()
        {
            width = document.documentElement.clientWidth - 112;

            width = 0.9 * width;

            $('.bookleft').css({width:width});
        });
    </script>
</body>
</html>