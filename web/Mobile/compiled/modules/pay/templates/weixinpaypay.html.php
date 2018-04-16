<?php
echo '<link rel="stylesheet" rev="stylesheet" href="/sink/css/login.css" type="text/css" media="all" />
<div class="container">
<h3 align="center">
    <strong>
        请您及时付款，以便订单尽快处理！
    </strong>
</h3>

<h3 align="center">
    <strong>
        订单号：'.$this->_tpl_vars['out_trade_no'].'
    </strong>
</h3>

<input type="hidden" name="out_trade_no" id="out_trade_no" value="'.$this->_tpl_vars['out_trade_no'].'" />

<div class="box_mid fix" style="width:100%;"">
    <div class="login" style="width:100%;">
        <div style="color:red;text-align:center;">
            <div>充值金额'.$this->_tpl_vars['total_fee'].'元</div>
            <div>请在<em id="time">2</em>小时内完成支付</div>
        </div>
    </div>
</div>
</div>
<div align="center">
	<img alt="模式二扫码支付" src="http://m.mianfeidushu.com/lib/OpenSDK/WxpayAPI/example/qrcode.php?data='.$this->_tpl_vars['imgUrl'].'" style="width:298px;height:298px;"/>
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

                if(trade_state == \'SUCCESS\')
                {
                    alert(\'支付成功，点击按钮跳转到首页\');

                    //延迟3000毫秒执行tz() 方法
                    clearInterval(myIntval);

                    setTimeout("location.href=\'http://m.mianfeidushu.com\'",0);
                }
            }
        }

        //orderquery.php 文件返回订单状态，通过订单状态确定支付状态
        xmlhttp.open("POST","http://m.mianfeidushu.com/modules/pay/weixinorderquery.php",false);

        //下面这句话必须有
        //把标签/值对添加到要发送的头文件。
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        xmlhttp.send("out_trade_no=" + $(\'#out_trade_no\').val());
    }
</script>

</body>';
?>