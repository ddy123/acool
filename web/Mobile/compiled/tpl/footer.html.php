<?php
echo '    <div class="footer">
	<div class="section nav">
		<p>
			<a href="/">��ҳ</a>
			<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/articlefilter.php">���</a>
			';
if($this->_tpl_vars['jieqi_userid'] > 0){
echo '
			<a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php">��ֵ</a>
			<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/bookcase.php">��׷����</a>
			<a href="/logout.php">�˳�</a>
			';
}
echo '
			</p>
	</div>
	
	<div class="section kefu">
		<h4>��ϵ�ͷ�</h4>
		<p>
		����ʱ�䣺��һ������ 9:00-22:00<br />
		�ͷ��ѣѣ�2336060855<br />
                ���԰�����: www.mianfeidushu.com <br />
		</p>
	</div>
	<div class="section">
		ԥICP��16025525��-1
	</div>
	

	<div class="section copyright">
		<p class="copy">Copyright 2016 mianfeidushu.com All rights reserved.&nbsp;֣���Ķ��Ļ���ý���޹�˾</p>
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