<?php
if (empty($this->_tpl_vars['actlogrows'])) $this->_tpl_vars['actlogrows'] = array();
elseif (!is_array($this->_tpl_vars['actlogrows'])) $this->_tpl_vars['actlogrows'] = (array)$this->_tpl_vars['actlogrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['actlogrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['actlogrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['actlogrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['actlogrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['actlogrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	if($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'redrose'){
echo '
					<li><span class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</span><span class="by">¡Á</span><span class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].' ¸ö</span><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv01.png" alt="ºì°ü" width="24" height="24" /></li>';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'yellowrose'){
echo '
					<li><span class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</span><span class="by">¡Á</span><span class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].' ±­</span><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv02.png" alt="ÃÀ¾Æ" width="24" height="24" /></li>';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'bluerose'){
echo '
					<li><span class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</span><span class="by">¡Á</span><span class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].' ¸ö</span><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nv-giv01.png" alt="ÏãÄÒ" width="24" height="24" /></li>';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'whiterose'){
echo '
					<li><span class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</span><span class="by">¡Á</span><span class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].' Ã¶</span><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv03.png" alt="×êÊ¯" width="24" height="24" /></li>';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'blackrose'){
echo '
					<li><span class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</span><span class="by">¡Á</span><span class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].' Á¾</span><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv04.png" alt="³¬ÅÜ" width="24" height="24" /></li>';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'greenrose'){
echo '
					<li><span class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</span><span class="by">¡Á</span><span class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].' ¶¥</span><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv05.png" alt="¹ð¹Ú" width="24" height="24" /></li>';
}
}

?>