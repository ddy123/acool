<?php
echo '
<table class="grid" width="100%" align="center">
<caption>作品列表 - '.$this->_tpl_vars['groupname'].'频道</caption>
  <tr align="center">
    <th width="25%">小说名称</th>
    <th width="35%">最新章节</th>
    <th width="15%">作者</th>
	<th width="9%">字数</th>
    <th width="10%">';
if($this->_tpl_vars['_request']['order'] == 'postdate'){
echo '入库';
}else{
echo '更新';
}
echo '</th>
    <th width="6%">状态</th>
  </tr>
'.$this->_tpl_vars['jieqi_pageblocks']['1']['content'].'
</table>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>';
?>