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
			<h4>管理小说</h4>
</div>

<form action="'.$this->_tpl_vars['url_article'].'" method="post" name="checkform" id="checkform">
<div class="ft fcc"><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/masterpage.php" class="btn btn-auto btn-blue" >全部小说</a></div>
<div class="ft fcc"><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/masterpage.php?display=author" class="btn btn-auto btn-blue" >原创小说</a></div>
<div class="ft fcc"><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/masterpage.php?display=poster" class="btn btn-auto btn-blue" >转载小说</a></div>
<div class="ft fcc"><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/masterpage.php?display=agent" class="btn btn-auto btn-blue" >代管小说</a></div>
<div class="bd">

<table class="grid" width="100%" align="center">
  <tr align="center">
    <th width="25%">小说名称</th>
    <th width="10%">作者</th>
    <th width="20%">操作</th>
  </tr>
  ';
if (empty($this->_tpl_vars['articlerows'])) $this->_tpl_vars['articlerows'] = array();
elseif (!is_array($this->_tpl_vars['articlerows'])) $this->_tpl_vars['articlerows'] = (array)$this->_tpl_vars['articlerows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['articlerows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['articlerows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['articlerows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['articlerows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['articlerows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
    <td><a href="'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['url_articleinfo'].'" target="_blank">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articlename'].'</a></td>
    <td align="center">';
if($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['authorid'] == 0){
echo $this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['author'];
}else{
echo '<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/authorpage.php?id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['authorid'].'" target="_blank">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['author'].'</a>';
}
echo '</td>
    <td align="center">
	<a href="'.$this->_tpl_vars['article_static_url'].'/articlemanage.php?id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'">管理</a>
	';
if($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['sourceid'] == 0){
echo '
	| <a href="'.$this->_tpl_vars['article_static_url'].'/newchapter.php?aid='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'">更新</a>
	';
if($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['issign_n'] == 0){
echo '
	| <a href="'.$this->_tpl_vars['jieqi_url'].'/newmessage.php?tosys=1&title=《'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articlename'].'》申请VIP签约" class="hottext" title="申请VIP签约">签约</a>
	';
}
echo '
	';
}
echo '
	</td>
  </tr>
  ';
}
echo '
</table>
</div>
</form>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>
	</div>
</div>

';
?>