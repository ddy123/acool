<?php
echo '<ul class="ulnav">
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/myarticle.php">������ҳ</a></li>
  <li><a href="'.$this->_tpl_vars['article_static_url'].'/newarticle.php">����С˵</a></li>
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/masterpage.php">����С˵</a></li>
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/tool.php?id=1">����ǩԼ</a></li>
  ';
if($this->_tpl_vars['jieqi_modules']['obook']['publish'] > 0){
echo '
  <li><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/masterpage.php">�������</a></li>
  ';
}
echo '
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/newdraft.php">�ҵĲݸ�</a></li>
</ul>';
?>