<?php
echo '
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>ʵ������</h4>
		</div>
<form name="useredit" id="useredit" action="'.$this->_tpl_vars['jieqi_url'].'/personedit.php?do=submit" method="post">
<div class="mail-zc">
    <div class="phone-name">  
      <h3>˵��</h3>
      <span>��������д��ʵ��ϵ��ʽ��������վ����Ա������ϵ��������㣬������⹫����</span>
    </div>
    <div class="phone-name">  
      <h3>�û���</h3>
      '.$this->_tpl_vars['jieqi_useruname'].'
    </div>
    <div class="phone-name">  
      <h3>�ǳ�</h3>
      '.$this->_tpl_vars['jieqi_username'].'
    </div>
    <div class="phone-name">  
      <h3>��ʵ����</h3>
       ';
if($this->_tpl_vars['personsvars']['realname']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['realname'].'
        <input type="hidden" name="p_realname" value="'.$this->_tpl_vars['personsvars']['realname'].'" />
        <span> (���ɸ���)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_realname" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['realname'].'" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>�Ա�</h3>
      <input type="radio" class="radio" name="p_gender" value="1"';
if($this->_tpl_vars['personsvars']['gender_n'] == 1){
echo ' checked="checked"';
}
echo '  />
        ��
        <input type="radio" class="radio" name="p_gender" value="2"';
if($this->_tpl_vars['personsvars']['gender_n'] == 2){
echo ' checked="checked"';
}
echo ' />
        Ů<span> (*)</span>
    </div>
    <div class="phone-name">  
      <h3>�绰</h3>
      <input type="text" class="text" name="p_telephone" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['telephone'].'" />
    </div>
    <div class="phone-name">  
      <h3>�ֻ�</h3>
      <input type="text" class="text" name="p_mobilephone" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['mobilephone'].'" />
        <span> (*)</span>
    </div>
    <div class="phone-name">  
      <h3>֤������</h3>
      ';
if($this->_tpl_vars['personsvars']['idcardtype']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['idcardtype'].'
        <input type="hidden" name="p_idcardtype" value="'.$this->_tpl_vars['personsvars']['idcardtype'].'" />
        <span> (���ɸ���)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_idcardtype" size="25" maxlength="100" value="';
if($this->_tpl_vars['personsvars']['idcardtype'] == ''){
echo '���֤';
}else{
echo $this->_tpl_vars['personsvars']['idcardtype'];
}
echo '" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>֤������</h3>
       ';
if($this->_tpl_vars['personsvars']['idcard'] !=""){
echo '
        '.$this->_tpl_vars['personsvars']['idcard'].'
        <input type="hidden" name="p_idcard" value="'.$this->_tpl_vars['personsvars']['idcard'].'" />
        <span> (���ɸ���)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_idcard" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['idcard'].'" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>�տ�����</h3>
       ';
if($this->_tpl_vars['personsvars']['banktype']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['banktype'].'
        <input type="hidden" name="p_banktype" value="'.$this->_tpl_vars['personsvars']['banktype'].'" />
        <span> (���ɸ���)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_banktype" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['banktype'].'" />
        <span>(*) ��д ��������/֧����/�ʾֻ��</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>�������ڵ�</h3>
       ';
if($this->_tpl_vars['personsvars']['bankname']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['bankname'].'
        <input type="hidden" name="p_bankname" value="'.$this->_tpl_vars['personsvars']['bankname'].'" />
        <span> (���ɸ���)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_bankname" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['bankname'].'" />
        <span>(*) ��д�����е� ʡ/��/��</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>����</h3>
       ';
if($this->_tpl_vars['personsvars']['bankcard']!=""){
echo '
        
        '.$this->_tpl_vars['personsvars']['bankcard'].'
        <input type="hidden" name="p_bankcard" value="'.$this->_tpl_vars['personsvars']['bankcard'].'" />
        <span> (���ɸ���)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_bankcard" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['bankcard'].'" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>�ֿ�������</h3>
       ';
if($this->_tpl_vars['personsvars']['bankuser']!=""){
echo '
        '.$this->_tpl_vars['personsvars']['bankuser'].'
        <input type="hidden" name="p_bankuser" value="'.$this->_tpl_vars['personsvars']['bankuser'].'" />
        <span> (���ɸ���)</span> ';
}else{
echo '
        <input type="text" class="text" name="p_bankuser" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['bankuser'].'" />
        <span> (*)</span> ';
}
echo ' 
    </div>
    <div class="phone-name">  
      <h3>��ϵ��ַ</h3>
      <input type="text" class="text" name="p_address" size="50" maxlength="250" value="'.$this->_tpl_vars['personsvars']['address'].'" />
    </div>
    <div class="phone-name">  
      <h3>�ʱ�</h3>
      <input type="text" class="text" name="p_zipcode" size="25" maxlength="100" value="'.$this->_tpl_vars['personsvars']['zipcode'].'" />
    </div>
    <div class="phone-name">  
      <h3>������Ϣ</h3>
      <textarea class="textarea" name="p_mynote" rows="5" cols="50">'.$this->_tpl_vars['personsvars']['mynote'].'</textarea>
    </div>
    <div class="ft">
        <input type="hidden" name="action" value="update" />'.$this->_tpl_vars['jieqi_token_input'].'
      <input type="submit" class="btn btn-auto btn-blue" name="submit"  id="submit" value="�� ��" />
    </div>
	</div>
</form>
	</div>
</div>
<script type="text/javascript">
$(function(){
		$(\'#useredit\').on(\'submit\', function(e){
		e.preventDefault();
		 var tips = layer.open({type: 2,content: \'������\'});
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