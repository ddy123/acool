<?php
echo '
<table class="grid" width="100%" align="center">
<caption>��Ʒ�б� - '.$this->_tpl_vars['groupname'].'Ƶ��</caption>
  <tr align="center">
    <th width="25%">С˵����</th>
    <th width="35%">�����½�</th>
    <th width="15%">����</th>
	<th width="9%">����</th>
    <th width="10%">';
if($this->_tpl_vars['_request']['order'] == 'postdate'){
echo '���';
}else{
echo '����';
}
echo '</th>
    <th width="6%">״̬</th>
  </tr>
'.$this->_tpl_vars['jieqi_pageblocks']['1']['content'].'
</table>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>';
?>