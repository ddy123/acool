<?php
echo '<br />
<form method="post" name="post" action="'.$this->_tpl_vars['url_pay'].'">
 <table class="grid" width="600" align="center">
    <caption>��ӭʹ������֧��ϵͳ</caption>
    <tr class="odd"> 
      <td>
	  <br />
	  ���ã�'.$this->_tpl_vars['buyname'].'!
	  <br /><br />
	  ��ѡ��Ľ�������Ϊ��
	  <br /><br />
	  <span class="hottext">
	  * ����'.$this->_tpl_vars['egold'].'��'.$this->_tpl_vars['egoldname'].'���ϼ�����ң�'.$this->_tpl_vars['money'].'Ԫ</span>
	  <br /><br />
	  ȷ�Ϲ���������������һ������
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
      <input type="submit" class="button" value=" ������һ�� " name="v_action">
	  </td>
    </tr>
  </table>
</form>
<br /><br />';
?>