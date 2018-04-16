<?php
echo '    <div class="footer">
	<div class="section nav">
		<p>
			<a href="/">首页</a>
			<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/articlefilter.php">书库</a>
			';
if($this->_tpl_vars['jieqi_userid'] > 0){
echo '
			<a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php">充值</a>
			<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/bookcase.php">我追的书</a>
			<a href="/logout.php">退出</a>
			';
}
echo '
			</p>
	</div>
	
	<div class="section kefu">
		<h4>联系客服</h4>
		<p>
		工作时间：周一到周日 9:00-22:00<br />
		客服ＱＱ：2336060855<br />
                电脑版链接: www.mianfeidushu.com <br />
		</p>
	</div>
	<div class="section">
		豫ICP备16025525号-1
	</div>
	

	<div class="section copyright">
		<p class="copy">Copyright 2016 mianfeidushu.com All rights reserved.&nbsp;郑州心动文化传媒有限公司</p>
	</div>
</div>

<script>
    var require = {
        baseUrl: "/_res/js",
        urlArgs: "bust=" + 201510091636,
        waitSeconds: 15,
        deps: ["mobile_index"]
    }
</script>
        
';
if(basename($this->_tpl_vars['jieqi_thisfile']) != 'top.php'){
echo '
    <script>
        _inlineRun(function () {
            require(["mo/ui/Tabs"], function (Tabs) {
                new Tabs({
                    eventType: "click",
                    toggleItem: ".rank-switch ul",
                    handles: ".rank-switch .item",
                    handleCurrentClass: "active"
                });
            })
        });
		</script>
    <script>
        _inlineRun(function () {
            require(["mo/ui/Tabs"], function (Tabs) {
                new Tabs({
                    eventType: "click",
                    toggleItem: ".tab ul",
                    handles: ".c3 .item",
                    handleCurrentClass: "active"
                });
            })
        });
		</script>

    <script>
        $(function () {
            $(".top .nav a").eq(0).addClass("active");
            $(".headnavbar li").eq(1).addClass("active");
        })
	</script>

';
}
echo '

<script src="/_res/components/requirejs/require.js"></script>
';
?>