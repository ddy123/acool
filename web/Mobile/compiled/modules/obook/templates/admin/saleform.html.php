<?php
echo '<table class="grid" width="100%" align="center">
<caption>销售报表</caption>
  <tr align="center">
	<td width="10%" class="head">统计月份</td>
    <td width="35%" class="head">共享销售统计</td>
	<td width="35%" class="head">代理销售统计</td>
	<td width="10%" class="head">充值金额</td>
    <td width="10%" class="head">状态</td>
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
    <td align="center">订阅：'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['shareegold']).' + 打赏：'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['sharetip']).' = 合计：'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['shareemoney']).'</td>
	<td align="center">订阅：'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['getegold']).' + 打赏：'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['gettip']).' = 合计：'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['getemoney']).'</td>
	<td align="center">'.fen2yuan($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['getinegold']).'</td>
	<td align="center">';
if($this->_tpl_vars['saleformrows'][$this->_tpl_vars['i']['key']]['ispaid'] > 0){
echo '已结算';
}else{
echo '未结算';
}
echo '</td>
  </tr>
  ';
}
echo '
</table>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>';
?>