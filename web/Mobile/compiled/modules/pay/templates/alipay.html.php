<?php
echo '<br />
<form method="post" name="post" action="'.$this->_tpl_vars['url_pay'].'">
 <table class="grid" width="600" align="center">
    <caption>欢迎使用在线支付系统</caption>
    <tr class="odd"> 
      <td>
	  <br />
	  您好，'.$this->_tpl_vars['buyname'].'!
	  <br /><br />
	  您选择的交易类型为：
	  <br /><br />
	  <span class="hottext">
	  * 购买'.$this->_tpl_vars['egold'].'点'.$this->_tpl_vars['egoldname'].'，合计人民币：'.$this->_tpl_vars['money'].'元</span>
	  <br /><br />
	  确认购买请点击“进入下一步”。
	  <br />
	  <br />
	  </td>
    </tr>
    <tr class="even"> 
      <td height="30" valign="middle">
	  <input type="hidden" name="service" value="'.$this->_tpl_vars['service'].'">
	  <input type="hidden" name="partner" value="'.$this->_tpl_vars['partner'].'">
	  <input type="hidden" name="return_url" value="'.$this->_tpl_vars['return_url'].'">
	  <input type="hidden" name="notify_url" value="'.$this->_tpl_vars['notify_url'].'">
	  <input type="hidden" name="_input_charset" value="'.$this->_tpl_vars['_input_charset'].'">
	  <input type="hidden" name="subject" value="'.$this->_tpl_vars['subject'].'">
	  <input type="hidden" name="out_trade_no" value="'.$this->_tpl_vars['out_trade_no'].'">
	  <input type="hidden" name="total_fee" value="'.$this->_tpl_vars['total_fee'].'">
	  <input type="hidden" name="payment_type" value="'.$this->_tpl_vars['payment_type'].'">
	  <input type="hidden" name="show_url" value="'.$this->_tpl_vars['show_url'].'">
	  <input type="hidden" name="seller_email" value="'.$this->_tpl_vars['seller_email'].'">
	  <input type="hidden" name="sign" value="'.$this->_tpl_vars['sign'].'">
	  <input type="hidden" name="sign_type" value="'.$this->_tpl_vars['sign_type'].'">
      <input type="submit" class="button" value=" 进入下一步 " name="v_action">
	  </td>
    </tr>
  </table>
</form>
<br /><br />';
?>