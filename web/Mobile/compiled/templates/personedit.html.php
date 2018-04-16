<?php
echo '
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>实名资料</h4>
		</div>
<form name="useredit" id="useredit" action="'.$this->_tpl_vars['jieqi_url'].'/personedit.php?do=submit" method="post">
<div class="mail-zc">
    <div class="phone-name">  
      <h3>说明</h3>
      <span>以下请填写真实联系方式，用于网站管理员跟您联系及收入结算，不会对外公开！</span>
    </div>
    <div class="phone-name">  
      <h3>用户名</h3>
      '.$this->_tpl_vars['jieqi_useruname'].'
    </div>
    <div class="phone-name">  
      <h3>昵称</h3>
      '.$this->_tpl_vars['jieqi_username'].'
    </div>
    <div class="phone-name">  
      <h3>真实姓名</h3>
       ';
if($this->_tpl_vars['personsvars']['realname']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['realname'].'
        <input type="hidden" name="p_realname" value="'.$this->_tpl_vars['personsvars']['realname'].'" />
        <span> (不可更改)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_realname" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['realname'].'" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>性别</h3>
      <input type="radio" class="radio" name="p_gender" value="1"';
if($this->_tpl_vars['personsvars']['gender_n'] == 1){
echo ' checked="checked"';
}
echo '  />
        男
        <input type="radio" class="radio" name="p_gender" value="2"';
if($this->_tpl_vars['personsvars']['gender_n'] == 2){
echo ' checked="checked"';
}
echo ' />
        女<span> (*)</span>
    </div>
    <div class="phone-name">  
      <h3>电话</h3>
      <input type="text" class="text" name="p_telephone" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['telephone'].'" />
    </div>
    <div class="phone-name">  
      <h3>手机</h3>
      <input type="text" class="text" name="p_mobilephone" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['mobilephone'].'" />
        <span> (*)</span>
    </div>
    <div class="phone-name">  
      <h3>证件类型</h3>
      ';
if($this->_tpl_vars['personsvars']['idcardtype']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['idcardtype'].'
        <input type="hidden" name="p_idcardtype" value="'.$this->_tpl_vars['personsvars']['idcardtype'].'" />
        <span> (不可更改)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_idcardtype" size="25" maxlength="100" value="';
if($this->_tpl_vars['personsvars']['idcardtype'] == ''){
echo '身份证';
}else{
echo $this->_tpl_vars['personsvars']['idcardtype'];
}
echo '" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>证件号码</h3>
       ';
if($this->_tpl_vars['personsvars']['idcard'] !=""){
echo '
        '.$this->_tpl_vars['personsvars']['idcard'].'
        <input type="hidden" name="p_idcard" value="'.$this->_tpl_vars['personsvars']['idcard'].'" />
        <span> (不可更改)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_idcard" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['idcard'].'" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>收款银行</h3>
       ';
if($this->_tpl_vars['personsvars']['banktype']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['banktype'].'
        <input type="hidden" name="p_banktype" value="'.$this->_tpl_vars['personsvars']['banktype'].'" />
        <span> (不可更改)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_banktype" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['banktype'].'" />
        <span>(*) 填写 银行名称/支付宝/邮局汇款</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>银行所在地</h3>
       ';
if($this->_tpl_vars['personsvars']['bankname']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['bankname'].'
        <input type="hidden" name="p_bankname" value="'.$this->_tpl_vars['personsvars']['bankname'].'" />
        <span> (不可更改)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_bankname" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['bankname'].'" />
        <span>(*) 填写开户行的 省/市/区</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>卡号</h3>
       ';
if($this->_tpl_vars['personsvars']['bankcard']!=""){
echo '
        
        '.$this->_tpl_vars['personsvars']['bankcard'].'
        <input type="hidden" name="p_bankcard" value="'.$this->_tpl_vars['personsvars']['bankcard'].'" />
        <span> (不可更改)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_bankcard" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['bankcard'].'" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>持卡人姓名</h3>
       ';
if($this->_tpl_vars['personsvars']['bankuser']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['bankuser'].'
        <input type="hidden" name="p_bankuser" value="'.$this->_tpl_vars['personsvars']['bankuser'].'" />
        <span> (不可更改)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_bankuser" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['bankuser'].'" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>联系地址</h3>
      <input type="text" class="text" name="p_address" size="50" maxlength="250" value="'.$this->_tpl_vars['personsvars']['address'].'" />
    </div>
    <div class="phone-name">  
      <h3>邮编</h3>
      <input type="text" class="text" name="p_zipcode" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['zipcode'].'" />
    </div>
    <div class="phone-name">  
      <h3>补充信息</h3>
      <textarea class="textarea" name="p_mynote" rows="5" cols="50">'.$this->_tpl_vars['personsvars']['mynote'].'</textarea>
    </div>
    <div class="ft">
        <input type="hidden" name="action" value="update" />'.$this->_tpl_vars['jieqi_token_input'].'
      <input type="submit" class="btn btn-auto btn-blue" name="submit"  id="submit" value="保 存" />
    </div>
	</div>
</form>
	</div>
</div>
<script type="text/javascript">
$(function(){
		$(\'#useredit\').on(\'submit\', function(e){
		e.preventDefault();
		 var tips = layer.open({type: 2,content: \'加载中\'});
				GPage.postForm(\'useredit\', $("#useredit").attr("action"),
			   function(data){
					if(data.status==\'OK\'){
                        $.ajaxSetup ({ cache: false });
					    layer.close(tips);
                        jumpurl(data.jumpurl);
					}else{
					    layer.close(tips);
		                openMsgs(data.msg);
					}
			   });
//			}
		});
});
</script> ';
?>