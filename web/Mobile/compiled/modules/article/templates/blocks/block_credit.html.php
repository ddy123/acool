<?php
if (empty($this->_tpl_vars['creditrows'])) $this->_tpl_vars['creditrows'] = array();
elseif (!is_array($this->_tpl_vars['creditrows'])) $this->_tpl_vars['creditrows'] = (array)$this->_tpl_vars['creditrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['creditrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['creditrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['creditrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['creditrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['creditrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
<li title="'.$this->_tpl_vars['creditrows'][$this->_tpl_vars['i']['key']]['point'].'" class="top first">
	    	    							<span class="title">
												<img src="'.$this->_tpl_vars['creditrows'][$this->_tpl_vars['i']['key']]['img'].'" alt="'.$this->_tpl_vars['creditrows'][$this->_tpl_vars['i']['key']]['rank'].'">
	    	    									</span>
	    	    							<span class="index">'.$this->_tpl_vars['i']['order'].'</span>
	   	    								<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['creditrows'][$this->_tpl_vars['i']['key']]['uid'],'info').'" class="name">'.$this->_tpl_vars['creditrows'][$this->_tpl_vars['i']['key']]['uname'].'</a>
		    	        				</li>
';
}
echo '
</ul>
<p class="more">
	    	    					<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/creditlist.php?id='.$this->_tpl_vars['articleid'].'">¸ü¶àÅÅÃû&gt;&gt;</a>
	   	    					</p>
	   	    				</div>
';
?>