<?php
echo '

	
    <ul class="column">
     <li><a href="'.$this->_tpl_vars['jieqi_url'].'/user/"><em class="def b">��ҳ</em></a></li>
     <li id="row"><a href="javascript:void(0)"><em class="account">�ʺŹ���</em></a>
	 <dl class="list_menu" style="display:none">
       <dd id="userhub_usereditView"><a href="'.jieqi_geturl('users','users','useredit','0').'"><i>��</i>�޸�����</a></dd>
       <dd id="userhub_upaView"><a href="'.jieqi_geturl('users','users','setavatar','0').'"><i>��</i>�޸�ͷ��</a></dd>
       <dd id="userhub_pwdview"><a href="'.jieqi_geturl('users','users','passedit','0').'"><i>��</i>���뼰��ȫ</a></dd>
      </dl>
     </li>
     <li id="row"><a href="'.jieqi_geturl('article','bookcase','bookcase','0').'"><em class="trend">�ҵ����</em></a></li>
     <li id="row"><a href="javascript:void(0)"><em class="fiscal">��������</em></a>
      <dl class="list_menu" style="display:none">
       <dd id="home_main"><a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php"><i>��</i>��ֵ</a></dd>
       <dd id="userhub_czView"><a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/paylog.php"><i>��</i>�ҵĳ�ֵ��¼</a></dd>
       <dd id="userhub_dyView"><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/buylist.php"><i>��</i>���ļ�¼</a></dd>
      </dl>
     </li>
     <li id="row"><a href="javascript:;"><em class="task">��Ϣ����</em></a>
      <dl class="list_menu" style="display:none">
       <dd id="task_main"><a href="'.$this->_tpl_vars['jieqi_url'].'/message.php?box=inbox"><i>��</i>�ռ���</a></dd>
       <dd id="task_czView"><a href="'.$this->_tpl_vars['jieqi_url'].'/message.php?box=outbox"><i>��</i>������</a></dd>
	   <dd id="userhub_newmessage"><a href="'.$this->_tpl_vars['jieqi_url'].'/newmessage.php"><i>&middot;</i>д����Ϣ</a></dd>
       <dd id="userhub_usermember"><a href="'.$this->_tpl_vars['jieqi_url'].'/newmessage.php?tosys=1"><i>&middot;</i>д������Ա</a></dd>

      </dl>
     </li>     
     	<li id="row"><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/applywriter.php"><em class="apply">��������</em></a></li>
	  
  </ul>
';
?>