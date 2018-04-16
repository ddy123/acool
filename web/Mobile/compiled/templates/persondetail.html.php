<?php
echo '
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>实名资料</h4>
		</div>
<div class="mail-zc">

<div class="phone-name">  
  <h3>说明：</h3>
  <span>以下是您的真实联系方式，用于网站管理员跟您联系及收入结算，不会对外公开！</span>
  ';
if($this->_tpl_vars['personsvars']['denyedit'] != 0){
echo '<br /><span>您的信息已被锁定，禁止修改！如果确实需要修改，请联系管理员处理。</span>';
}
echo '
  
</div>
<div class="phone-name">  
  <h3>用户名/昵称：</h3>
  '.$this->_tpl_vars['jieqi_useruname'].' / '.$this->_tpl_vars['jieqi_username'].'
</div>
<div class="phone-name">  
  <h3>真实姓名：</h3>
  '.$this->_tpl_vars['personsvars']['realname'].'
</div>
<div class="phone-name">  
<h3>性别：</h3>
'.$this->_tpl_vars['personsvars']['gender'].'
</div>
<div class="phone-name">  
  <h3>电话：</h3>
  '.$this->_tpl_vars['personsvars']['telephone'].'
</div>
<div class="phone-name">  
  <h3>手机：</h3>
  '.$this->_tpl_vars['personsvars']['mobilephone'].'
</div>
<div class="phone-name">  
  <h3>证件类型：</h3>
  ';
if($this->_tpl_vars['personsvars']['idcardtype'] == ''){
echo '身份证';
}else{
echo $this->_tpl_vars['personsvars']['idcardtype'];
}
echo '
</div>
<div class="phone-name">  
  <h3>证件号码：</h3>
  '.$this->_tpl_vars['personsvars']['idcard'].'
</div>
<div class="phone-name">  
  <h3>联系地址：</h3>
  '.$this->_tpl_vars['personsvars']['address'].'
</div>
<div class="phone-name">  
  <h3>邮编：</h3>
  '.$this->_tpl_vars['personsvars']['zipcode'].'
</div>
<div class="phone-name">  
  <h3>收款银行：</h3>
  '.$this->_tpl_vars['personsvars']['banktype'].'
</div>
<div class="phone-name">  
  <h3>银行所在地：</h3>
  '.$this->_tpl_vars['personsvars']['bankname'].'
</div>
<div class="phone-name">  
  <h3>卡号：</h3>
  '.$this->_tpl_vars['personsvars']['bankcard'].'
</div>
<div class="phone-name">  
  <h3>持卡人姓名：</h3>
  '.$this->_tpl_vars['personsvars']['bankuser'].'
</div>
<div class="phone-name">  
  <h3>补充信息：</h3>
  '.$this->_tpl_vars['personsvars']['mynote'].'
</div>

<div class="ft">
  ';
if($this->_tpl_vars['personsvars']['denyedit'] == 0){
echo '<a class="btn btn-auto btn-blue" href="'.$this->_tpl_vars['jieqi_url'].'/personedit.php">点击修改联系方式</a>';
}else{
echo '<span>您的信息已被锁定，禁止修改！如果确实需要修改，请联系管理员处理。</span>';
}
echo '
  </div>
<div class="ft">  
  ';
if($this->_tpl_vars['jieqi_group'] == 3 && $this->_tpl_vars['jieqi_modules']['article']['publish'] > 0){
echo '&nbsp;&nbsp;<a class="btn btn-auto btn-blue" href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/applywriter.php">申请成为作者</a>';
}
echo '
  
</div>
	</div>
</div>';
?>