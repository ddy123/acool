<?php
echo '<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>购买VIP章节</h4>
		</div>

<form name="frmbuychapter" id="frmbuychapter" method="post" action="'.$this->_tpl_vars['url_buychapter'].'" class="form-horizontal">
<div class="bd">
				<div class="item">
					<div class="item-label">章节名称：</div>
					<div class="item-control">《'.$this->_tpl_vars['obookname'].' - '.$this->_tpl_vars['chaptername'].'》</div>
				</div>
				<div class="item">
					<div class="item-label">
                    价格：</div>
					<div class="item-control">'.$this->_tpl_vars['saleprice'].$this->_tpl_vars['egoldname'].'</div>
				</div>
				<div class="item">
					<div class="item-label">购买用户：</div>
					<div class="item-control">'.$this->_tpl_vars['username'].'</div>
				</div>
				<div class="item">
					<div class="item-label">现有余额：</div>
					<div class="item-control">'.$this->_tpl_vars['useremoney'].$this->_tpl_vars['egoldname'].'</div>
				</div>
				<div class="item">
					<div class="item-label">订阅选项：</div>
					<div class="item-control"><input type="checkbox" name="autobuy" value="1"> <span title="选择自动订阅，则本书所有VIP章节在点击阅读时自动购买，不需要每次购买后再阅读。">自动订阅本书其它VIP章节</span></div>
			</div>
	<div class="ft">
	  <input type="hidden" name="action" value="buy">'.$this->_tpl_vars['jieqi_token_input'].'
      <input type="hidden" name="cid" value="'.$this->_tpl_vars['cid'].'">
	  <input type="submit" class="btn btn-auto btn-blue" value="确定购买并阅读" name="submit">
	  </div>
</form>
	
</div>
</div>';
?>