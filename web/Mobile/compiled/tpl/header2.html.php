<?php
echo '<body class="chapter"  data-con="read_cont">
<div class="header">
	<a href="/" class="logo"><img src="/_res/css/heiyan/mobile/img/logo.png" width="135px" alt="'.$this->_tpl_vars['jieqi_sitename'].'" /></a>
	<div class="top">
		<div class="nav">
			<a href="/">��ҳ</a>
			
            <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/top.php">����</a>
<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/articlefilter.php" >���</a>
			<!--<a href="http://wap.mianfeidushu.com/">����</a>-->
			<a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php" >��ֵ</a>
		</div>
	</div>
	    ';
if($this->_tpl_vars['jieqi_userid'] == 0){
echo '
        <div class="bottom ">
		<div class="accounts">
			<span>
				<a href="'.$this->_tpl_vars['jieqi_user_url'].'/login.php">��¼</a>
                                <a href="'.$this->_tpl_vars['jieqi_url'].'/api/weixin/login.php"><img src="/_res/css/heiyan/img/weixin.png" width="24" height="24" alt="΢�ŵ�½"></a>
				<a href="'.$this->_tpl_vars['jieqi_url'].'/api/weibo/login.php"><img src="/_res/css/heiyan/img/weibo.png" width="24" height="24" alt="΢����¼"></a>
				<a href="'.$this->_tpl_vars['jieqi_url'].'/api/qq/login.php"><img src="/_res/css/heiyan/img/qq.png" width="24" height="24" alt="qq��¼"></a>
				<!-- <a href="#"><img src="/_res/css/heiyan/img/baidu.png" width="24" height="24" alt="�ٶȵ�¼"></a>-->
			</span>
			</div>
			</div>
		';
}else{
echo '
	<div class="bottom logined" id="jsunlogin">
		<div class="accounts">
			<a class="my-name" onclick=\'$("#jsuser").slideToggle(100);\'>'.$this->_tpl_vars['jieqi_username'].'</a>
			</div>
		<div class="nav">
				<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/bookcase.php">��׷����</a>
				<span class="divide">|</span>
				<a href="'.$this->_tpl_vars['jieqi_url'].'/message.php?box=inbox" style="">����</a>
			</div>
		</div>
</div>';
}
if($this->_tpl_vars['jieqi_userid'] ==0){
echo '
	<div id="jsuser">
		<div class="container">
		</div>
	</div>';
}else{
echo '
	<div id="jsuser">
		<div class="container">
			<div id="jsLogined" class="mod block" style="margin: 0 10px 0px;">
				<div class="bd" style="margin:0 10px;font-size:12px;line-height:20px">
					['.$this->_tpl_vars['jieqi_groupname'].']
					<span id="jsusername">'.$this->_tpl_vars['jieqi_username'].'</span> ���ã�
					<br/>����'.$this->_tpl_vars['egoldname'].':'.$this->_tpl_vars['jieqi_egold'].' ����ǰ���֣�'.$this->_tpl_vars['jieqi_score'].'
				</div>
				<div class="bd" style="margin:10px 10px 0">
					<table class="accountbtn">
					<tr>
						<td>
							<a href="/useredit.php">����</a>
						</td>
						<td>
							<a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/paylog.php">����</a>
						</td>

					<td>
							<a href="/personedit.php">ʵ����֤</a>
						</td>
					</tr>
					</table>
				</div>
				<div class="bd" style="margin:10px 10px 0">
					<table class="accountbtn">
					<tr>
						<td>
							<a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php">��ֵ</a>
						</td>
						<td>
							 ';
if($this->_tpl_vars['jieqi_groupid'] >= 6 ||$this->_tpl_vars['jieqi_groupid'] ==2){
echo '<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/myarticle.php">��������</a>
                             ';
}else{
echo ' <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/applywriter.php">��������</a>
							';
}
echo '
						</td>
					<td>
							<a href="/logout.php" onclick="return confirm(\'��ȷ��Ҫ�˳��\')">�˳�</a>
						</td>
					</tr>
					</table>
				</div>
			</div>
		</div>
	</div>';
}

?>