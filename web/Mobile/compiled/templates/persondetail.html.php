<?php
echo '
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>ʵ������</h4>
		</div>
<div class="mail-zc">

<div class="phone-name">  
  <h3>˵����</h3>
  <span>������������ʵ��ϵ��ʽ��������վ����Ա������ϵ��������㣬������⹫����</span>
  ';
if($this->_tpl_vars['personsvars']['denyedit'] != 0){
echo '<br /><span>������Ϣ�ѱ���������ֹ�޸ģ����ȷʵ��Ҫ�޸ģ�����ϵ����Ա����</span>';
}
echo '
  
</div>
<div class="phone-name">  
  <h3>�û���/�ǳƣ�</h3>
  '.$this->_tpl_vars['jieqi_useruname'].' / '.$this->_tpl_vars['jieqi_username'].'
</div>
<div class="phone-name">  
  <h3>��ʵ������</h3>
  '.$this->_tpl_vars['personsvars']['realname'].'
</div>
<div class="phone-name">  
<h3>�Ա�</h3>
'.$this->_tpl_vars['personsvars']['gender'].'
</div>
<div class="phone-name">  
  <h3>�绰��</h3>
  '.$this->_tpl_vars['personsvars']['telephone'].'
</div>
<div class="phone-name">  
  <h3>�ֻ���</h3>
  '.$this->_tpl_vars['personsvars']['mobilephone'].'
</div>
<div class="phone-name">  
  <h3>֤�����ͣ�</h3>
  ';
if($this->_tpl_vars['personsvars']['idcardtype'] == ''){
echo '���֤';
}else{
echo $this->_tpl_vars['personsvars']['idcardtype'];
}
echo '
</div>
<div class="phone-name">  
  <h3>֤�����룺</h3>
  '.$this->_tpl_vars['personsvars']['idcard'].'
</div>
<div class="phone-name">  
  <h3>��ϵ��ַ��</h3>
  '.$this->_tpl_vars['personsvars']['address'].'
</div>
<div class="phone-name">  
  <h3>�ʱࣺ</h3>
  '.$this->_tpl_vars['personsvars']['zipcode'].'
</div>
<div class="phone-name">  
  <h3>�տ����У�</h3>
  '.$this->_tpl_vars['personsvars']['banktype'].'
</div>
<div class="phone-name">  
  <h3>�������ڵأ�</h3>
  '.$this->_tpl_vars['personsvars']['bankname'].'
</div>
<div class="phone-name">  
  <h3>���ţ�</h3>
  '.$this->_tpl_vars['personsvars']['bankcard'].'
</div>
<div class="phone-name">  
  <h3>�ֿ���������</h3>
  '.$this->_tpl_vars['personsvars']['bankuser'].'
</div>
<div class="phone-name">  
  <h3>������Ϣ��</h3>
  '.$this->_tpl_vars['personsvars']['mynote'].'
</div>

<div class="ft">
  ';
if($this->_tpl_vars['personsvars']['denyedit'] == 0){
echo '<a class="btn btn-auto btn-blue" href="'.$this->_tpl_vars['jieqi_url'].'/personedit.php">����޸���ϵ��ʽ</a>';
}else{
echo '<span>������Ϣ�ѱ���������ֹ�޸ģ����ȷʵ��Ҫ�޸ģ�����ϵ����Ա����</span>';
}
echo '
  </div>
<div class="ft">  
  ';
if($this->_tpl_vars['jieqi_group'] == 3 && $this->_tpl_vars['jieqi_modules']['article']['publish'] > 0){
echo '&nbsp;&nbsp;<a class="btn btn-auto btn-blue" href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/applywriter.php">�����Ϊ����</a>';
}
echo '
  
</div>
	</div>
</div>';
?>