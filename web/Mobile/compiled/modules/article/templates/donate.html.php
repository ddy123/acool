<?php
echo '
<h1 class="page-title">'.$this->_tpl_vars['articlename'].'��������¼</h1>
			<div class="mod block tab-switch comments donate-list">
				<div class="hd green">
					<span class="item active">������¼</span>
					</div>
				<div class="bd">
					<ul>
								';
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
	echo '
								';
if($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'redrose'||$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'yellowrose'||$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'greenrose'||$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'bluerose'||$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'whiterose'||$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'blackrose'){
echo '
		    	                	<li class="column-2" data-role="item" data-feed-storage="true" data-feed-id="458063" data-feed-type="22">
		    	                			<div class="left">
		    	                				<p>
		    	                					<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uid']).'" title="'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'">
														<img alt="'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'" width="50" height="50" src="'.jieqi_geturl('system','avatar',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uid'],'l',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['avatar']).'">
													</a>
		    	                				</p>
		    	                			</div>
											';
if($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'redrose'){
echo '
		    	                			<div class="right">
		    	                				<h3>
													<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uid']).'" class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</a>
													<span>Ϊ��Ʒ������<em class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].'��</em></span>
													<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv01.png" alt="���" title="���">
												</h3>
												<p class="summary">�ͺ�������ٽ���������ȡ����ʤ����</p>
												<div class="controls">
													<span class="time">'.date('Y-m-d H:i:s',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['addtime']).'</span>
												</div>
		    	                			</div>
											';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'yellowrose'){
echo '
											<div class="right">
		    	                				<h3>
													<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uid']).'" class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</a>
													<span>Ϊ��Ʒ������<em class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].'��</em></span>
													<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv02.png" alt="����" title="����">
												</h3>
												<p class="summary">�����ƣ����ٽ���������ȡ����ʤ����</p>
												<div class="controls">
													<span class="time">'.date('Y-m-d H:i:s',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['addtime']).'</span>
												</div>
		    	                			</div>
											';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'greenrose'){
echo '
											<div class="right">
		    	                				<h3>
													<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uid']).'" class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</a>
													<span>Ϊ��Ʒ������<em class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].'��</em></span>
													<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv05.png" alt="���" title="���">
												</h3>
												<p class="summary">�͹�ڣ����ٽ���������ȡ����ʤ����</p>
												<div class="controls">
													<span class="time">'.date('Y-m-d H:i:s',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['addtime']).'</span>
												</div>
		    	                			</div>
											';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'bluerose'){
echo '
											<div class="right">
		    	                				<h3>
													<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uid']).'" class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</a>
													<span>Ϊ��Ʒ������<em class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].'��</em></span>
													<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nv-giv01.png" alt="����" title="����">
												</h3>
												<p class="summary">�����ң����ٽ���������ȡ����ʤ����</p>
												<div class="controls">
													<span class="time">'.date('Y-m-d H:i:s',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['addtime']).'</span>
												</div>
		    	                			</div>
											';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'whiterose'){
echo '
											<div class="right">
		    	                				<h3>
													<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uid']).'" class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</a>
													<span>Ϊ��Ʒ������<em class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].'ö</em></span>
													<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv03.png" alt="��ʯ" title="��ʯ">
												</h3>
												<p class="summary">����ʯ�����ٽ���������ȡ����ʤ����</p>
												<div class="controls">
													<span class="time">'.date('Y-m-d H:i:s',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['addtime']).'</span>
												</div>
		    	                			</div>
											';
}elseif($this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actname'] == 'blackrose'){
echo '
											<div class="right">
		    	                				<h3>
													<a href="'.jieqi_geturl('system','user',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uid']).'" class="name">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['uname'].'</a>
													<span>Ϊ��Ʒ������<em class="count">'.$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['actnum'].'��</em></span>
													<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv04.png" alt="����" title="����">
												</h3>
												<p class="summary">�ͳ��ܣ����ٽ���������ȡ����ʤ����</p>
												<div class="controls">
													<span class="time">'.date('Y-m-d H:i:s',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['addtime']).'</span>
												</div>
		    	                			</div>
											';
}
echo '
		    	                		</li>
										';
}
echo '
									';
}
echo '
                        </ul>
                    </div>
			</div>
<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>
<div class="mod mod-back">
				<div class="bd">
					<a href="/" class="home"></a>
					<span class="divide"></span>
					<a href="'.jieqi_geturl('article','article',$this->_tpl_vars['actlogrows'][$this->_tpl_vars['i']['key']]['articleid'],'info').'">'.$this->_tpl_vars['articlename'].'</a>
				</div>
			</div>

';
?>