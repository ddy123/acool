<?php
echo '
						<h1 class="page-title">
							<i class="icon icon-rank"></i>
							';
if($this->_tpl_vars['sort'] == ''){
echo 'ȫ������';
}else{
echo $this->_tpl_vars['sort'];
}
echo '</h1>
<div data-collect-id="2550" class="mod mod-clean pattern-update-list">
							<div class="bd">
								<table>
										<thead>
											<tr>
												<th width="30">����</th>
												<th width="50">����</th>
												<th>����/�����½�</th>
												<th width="60">����</th>
												<th width="80">����</th>
												<th width="100">����ʱ��</th>
											</tr>
										</thead>
										<tbody>
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
											<tr';
if($this->_tpl_vars['i']['order'] % 2 == 0){
echo ' class="even"';
}
echo '>
													<td class="index">'.$this->_tpl_vars['i']['order'].'.</td>
													<td>
														<a target="_blank" href="'.jieqi_geturl('article','articlelist','1',$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['sortid']).'" class="tag" targe="_blank">'.truncate($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['sort'],'4','').'</a>
													</td>
													<td>
														<div class="range">
															<a data-collect-index="'.$this->_tpl_vars['i']['order'].'" target="_blank" href="'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['url_articleinfo'].'" targe="_blank" class="name">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articlename'].'</a>
															';
if($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['vipchapterid'] > 0){
echo '<a href="'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['url_vipchapter'].'"  class="chapter">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['vipvolume'].' '.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['vipchapter'].'</a>';
}else{
echo '<a href="'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['url_lastchapter'].'"  class="chapter">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['lastvolume'].' '.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['lastchapter'].'</a>';
}
echo '
														</div>
													</td>
													<td>
														<div class="range">
															<a target="_blank" href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/authorpage.php?id='.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['authorid'].'" targe="_blank" class="author">'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['author'].'</a>
														</div>
													</td>
													<td>
														<div>'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['size_k'].'K</div>
													</td>
													<td>
														<span class="time">'.date('Y-m-d',$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['lastupdate']).'</span>
													</td>
												</tr>
                                               ';
}
echo '
											</tbody>
									</table>
								</div>
						</div>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>
';
?>