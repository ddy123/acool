<?php
echo '<ul class="ulnav">
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/myarticle.php">作家首页</a></li>
  <li><a href="'.$this->_tpl_vars['article_static_url'].'/newarticle.php">发表小说</a></li>
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/masterpage.php">管理小说</a></li>
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/tool.php?id=1">申请签约</a></li>
  ';
if($this->_tpl_vars['jieqi_modules']['obook']['publish'] > 0){
echo '
  <li><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/masterpage.php">收入管理</a></li>
  ';
}
echo '
  <li><a href="'.$this->_tpl_vars['article_dynamic_url'].'/newdraft.php">我的草稿</a></li>
</ul>';
?>