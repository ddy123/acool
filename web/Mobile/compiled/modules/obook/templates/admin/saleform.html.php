<?php
echo '<table class="grid" width="100%" align="center">
<caption>���۱���</caption>
  <tr align="center">
	<td width="10%" class="head">ͳ���·�</td>
    <td width="35%" class="head">��������ͳ��</td>
	<td width="35%" class="head">��������ͳ��</td>
	<td width="10%" class="head">��ֵ���</td>
    <td width="10%" class="head">״̬</td>
  </tr>
  ';
if (empty($this->_tpl_vars['saleformrows'])) $this->_tpl_vars['saleformrows'] = array();
elseif (!is_array($this->_tpl_vars['saleformrows'])) $this->_tpl_vars['saleformrows'] = (array)$this->_tpl_vars['saleformrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['saleformrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['saleformrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['saleformrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['saleformrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['saleformrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
	<td align="center">'.$this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['addmonth'].'</td>
    <td align="center">���ģ�'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['shareegold']).' + ���ͣ�'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['sharetip']).' = �ϼƣ�'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['shareemoney']).'</td>
	<td align="center">���ģ�'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['getegold']).' + ���ͣ�'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['gettip']).' = �ϼƣ�'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['getemoney']).'</td>
	<td align="center">'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['getinegold']).'</td>
	<td align="center">';
if($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['ispaid'] > 0){
echo '�ѽ���';
}else{
echo 'δ����';
}
echo '</td>
  </tr>
  ';
}
echo '
</table>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>';
?>