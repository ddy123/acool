<?php
echo '<div class="gridtop"><a href="'.$this->_tpl_vars['article_dynamic_url'].'/'.$this->_tpl_vars['articlepath'].'/searchcache.php">全部搜索关键字</a> | <a href="'.$this->_tpl_vars['article_dynamic_url'].'/'.$this->_tpl_vars['articlepath'].'/searchcache.php?flag=title">小说搜索关键字</a> | <a href="'.$this->_tpl_vars['article_dynamic_url'].'/'.$this->_tpl_vars['articlepath'].'/searchcache.php?flag=author">作者搜索关键字</a> | <a href="'.$this->_tpl_vars['article_dynamic_url'].'/'.$this->_tpl_vars['articlepath'].'/searchcache.php?flag=notitle">找不到的小说</a> | <a href="'.$this->_tpl_vars['article_dynamic_url'].'/'.$this->_tpl_vars['articlepath'].'/searchcache.php?flag=noauthor">找不到的作者</a></div>
<table class="grid" width="100%" align="center">
  <tr align="center">
    <th width="25%">搜索时间</th>
    <th width="40%">关键字</th>
    <th width="20%">搜索类型</th>
    <th width="15%">结果数</th>
    </tr>
  ';
if (empty($this->_tpl_vars['cacherows'])) $this->_tpl_vars['cacherows'] = array();
elseif (!is_array($this->_tpl_vars['cacherows'])) $this->_tpl_vars['cacherows'] = (array)$this->_tpl_vars['cacherows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['cacherows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['cacherows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['cacherows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['cacherows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['cacherows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
    <td height="14" align="center">'.$this->_tpl_vars['cacherows'][$this->_tpl_vars['i']['key']]['searchtime'].'</td>
    <td>'.$this->_tpl_vars['cacherows'][$this->_tpl_vars['i']['key']]['keywords'].'</td>
    <td align="center">'.$this->_tpl_vars['cacherows'][$this->_tpl_vars['i']['key']]['searchtype'].'</td>
    <td align="center">'.$this->_tpl_vars['cacherows'][$this->_tpl_vars['i']['key']]['results'].'</td>
  </tr>
  ';
}
echo '
</table>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>

';
?>