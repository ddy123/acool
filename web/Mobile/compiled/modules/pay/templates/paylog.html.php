<?php
echo '
<style>
/* table */
table {
	border-collapse: collapse;
	border-spacing: 0;
}
table.fix {
	table-layout: fixed;
}
table.fix td {
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	-o-text-overflow: ellipsis;
}
table.grid {
	border: 1px solid #d2d2d2;
	background: #fff;
}
table.grid caption, .gridtop {
	height: 2.5em;
	line-height: 2.5em;
	background: #fff;
	border: 1px solid #d2d2d2;
	_border-right: 1px solid #d2d2d2;
	_border-bottom: 1px solid #d2d2d2;
	font-weight: bold;
	font-size: 18px;
	color: #239eda;
	text-align: left;
	padding-left: 10px;

}
table.grid th {
	border-bottom: 1px solid #d2d2d2;
	color: #666666;
	line-height: 2.5;
	padding: 0 0.3em;
	text-align: center;
}
table.grid tr {
	border-bottom: 1px dashed #dedede;
}
table.grid td {
	padding: 0.4em;
}
table.hide, table.hide caption, table.hide tr, table.hide th, table.hide td, table.nb {
	border: 0;
}
/* table add-ons */
</style>
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>财务充值记录</h4>
			<!--span>[<a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/paylog.php">全部记录</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/paylog.php?status=finish">充值成功</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/paylog.php?status=cancel">充值失败</a>]</span-->
		</div>
		<form class="form-horizontal">
			<div class="bd">
				<table class="grid" width="100%" align="center">
  <tr align="center" valign="middle">
    <th width="20%">序号</th>
    <th width="20%">交易时间</th>
    <th width="20%">购买点数</th>
    <th width="20%">支付方式</th>
    <th width="20%">交易状态</th>
  </tr>
  ';
if (empty($this->_tpl_vars['paylogrows'])) $this->_tpl_vars['paylogrows'] = array();
elseif (!is_array($this->_tpl_vars['paylogrows'])) $this->_tpl_vars['paylogrows'] = (array)$this->_tpl_vars['paylogrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['paylogrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['paylogrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['paylogrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['paylogrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['paylogrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr valign="middle">
    <td align="center">'.$this->_tpl_vars['paylogrows'][$this->_tpl_vars['i']['key']]['payid'].'</td>
    <td align="center">'.date('Y-m-d H:i:s',$this->_tpl_vars['paylogrows'][$this->_tpl_vars['i']['key']]['buytime']).'</td>
    <td align="center">'.$this->_tpl_vars['paylogrows'][$this->_tpl_vars['i']['key']]['egold'].'</td>
    <td align="center">'.$this->_tpl_vars['paylogrows'][$this->_tpl_vars['i']['key']]['paytype'].'</td>
    <td align="center">'.$this->_tpl_vars['paylogrows'][$this->_tpl_vars['i']['key']]['payflag'].'</td>
  </tr>
  ';
}
echo '
</table>
			</div>
		</form>
	</div>
</div>';
?>