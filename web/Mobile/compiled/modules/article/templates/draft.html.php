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
			<h4>管理草稿</h4>
</div>

<form action="" method="post" name="checkform" id="checkform">
<div class="bd">

<table class="grid" width="100%" align="center">
  <tr class="head">
    <th width="20%" class="head">小说名称</th>
    <th width="35%" class="head">章节标题</th>
	<th width="13%" class="head">定时发表</th>
	<th width="12%" class="head">草稿类型</th>
    <th width="20%" class="head">操作</th>
  </tr>
';
if (empty($this->_tpl_vars['draftrows'])) $this->_tpl_vars['draftrows'] = array();
elseif (!is_array($this->_tpl_vars['draftrows'])) $this->_tpl_vars['draftrows'] = (array)$this->_tpl_vars['draftrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['draftrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['draftrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['draftrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['draftrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['draftrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr valign="middle">
    <td><a href="';
if($this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['isvip_n'] == 1){
echo $this->_tpl_vars['jieqi_modules']['obook']['url'].'/obookmanage.php?id='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['obookid'];
}else{
echo $this->_tpl_vars['article_static_url'].'/articlemanage.php?id='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['articleid'];
}
echo '">'.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['articlename'].'</a></td>
    <td><a href="'.$this->_tpl_vars['article_static_url'].'/draftedit.php?id='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['draftid'].'">'.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</a></td>
	<td align="center">';
if($this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['pubdate'] > 0){
echo date('m-d H:i',$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['pubdate']);
}else{
echo '----------';
}
echo '</td>
	<td align="center">';
if($this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['isvip_n'] == 1){
echo '电子书';
}else{
echo '公众小说';
}
echo '</td>
    <td align="center"><a href="javascript:if(confirm(\'确实要删除该章节么？\')) document.location=\''.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['url_delete'].'\';">删除</a>';
if($this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['display_n'] == 0){
echo ' <a href="';
if($this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['isvip_n'] == 1){
echo $this->_tpl_vars['article_static_url'].'/newchapter.php?aid='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['articleid'].'&draftid='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['draftid'];
}else{
echo $this->_tpl_vars['article_static_url'].'/newchapter.php?aid='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['articleid'].'&draftid='.$this->_tpl_vars['draftrows'][$this->_tpl_vars['i']['key']]['draftid'];
}
echo '">发表</a>';
}
echo '</td>
';
}
echo '
  </tr>
</table>
</div>

</form>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>
</div>
</div>
';
?>