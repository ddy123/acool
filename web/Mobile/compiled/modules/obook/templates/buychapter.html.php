<?php
echo '<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>����VIP�½�</h4>
		</div>

<form name="frmbuychapter" id="frmbuychapter" method="post" action="'.$this->_tpl_vars['url_buychapter'].'" class="form-horizontal">
<div class="bd">
				<div class="item">
					<div class="item-label">�½����ƣ�</div>
					<div class="item-control">��'.$this->_tpl_vars['obookname'].' - '.$this->_tpl_vars['chaptername'].'��</div>
				</div>
				<div class="item">
					<div class="item-label">
                    �۸�</div>
					<div class="item-control">'.$this->_tpl_vars['saleprice'].$this->_tpl_vars['egoldname'].'</div>
				</div>
				<div class="item">
					<div class="item-label">�����û���</div>
					<div class="item-control">'.$this->_tpl_vars['username'].'</div>
				</div>
				<div class="item">
					<div class="item-label">������</div>
					<div class="item-control">'.$this->_tpl_vars['useremoney'].$this->_tpl_vars['egoldname'].'</div>
				</div>
				<div class="item">
					<div class="item-label">����ѡ�</div>
					<div class="item-control"><input type="checkbox" name="autobuy" value="1"> <span title="ѡ���Զ����ģ���������VIP�½��ڵ���Ķ�ʱ�Զ����򣬲���Ҫÿ�ι�������Ķ���">�Զ����ı�������VIP�½�</span></div>
			</div>
	<div class="ft">
	  <input type="hidden" name="action" value="buy">'.$this->_tpl_vars['jieqi_token_input'].'
      <input type="hidden" name="cid" value="'.$this->_tpl_vars['cid'].'">
	  <input type="submit" class="btn btn-auto btn-blue" value="ȷ�������Ķ�" name="submit">
	  </div>
</form>
	
</div>
</div>';
?>