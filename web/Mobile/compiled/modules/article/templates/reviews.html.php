<?php
echo '

<script type="text/javascript">
//�ö��ú�
function act_top(url){
	var o = getTarget();
	var param = {
		method: \'POST\', 
		onFinish: \'\'
	}
	if(o.getAttribute(\'switch\') == \'0\'){
		url = url.replace(\'act=untop\', \'act=top\');
		param.onFinish = function(res){
			if(res.match(\'�ɹ�\')){
				o.setAttribute(\'switch\', \'1\');
				o.innerHTML = \'�ú�\';
			}
		}
	}else{
		url = url.replace(\'act=top\', \'act=untop\');
		param.onFinish = function(res){
			if(res.match(\'�ɹ�\')){
				o.setAttribute(\'switch\', \'0\');
				o.innerHTML = \'�ö�\';
			}
		}
	}
	Ajax.Tip(url, param);
	return false;
}
//�Ӿ�ȥ��
function act_good(url){
	var o = getTarget();
	var param = {
		method: \'POST\', 
		onReturn: \'\'
	}
	if(o.getAttribute(\'switch\') == \'0\'){
		url = url.replace(\'act=normal\', \'act=good\');
		param.onFinish = function(res){
			if(res.match(\'�ɹ�\')){
			o.setAttribute(\'switch\', \'1\');
			o.innerHTML = \'ȥ��\';
			}
		}
	}else{
		url = url.replace(\'act=good\', \'act=normal\');
		param.onFinish = function(res){
			if(res.match(\'�ɹ�\')){
			o.setAttribute(\'switch\', \'0\');
			o.innerHTML = \'�Ӿ�\';
			}
		}
	}
	Ajax.Tip(url, param);
	return false;
}
//ɾ��
function act_delete(url){
	var o = getTarget();
	var param = {
		method: \'POST\', 
		onReturn: function(){
			$_(o.parentNode.parentNode).remove();
		}
	}
	if(confirm(\'ȷʵҪɾ��������ô��\')) Ajax.Tip(url, param);
	return false;
}
</script>

';
if($this->_tpl_vars['newpost'] > 0){
echo '
<div class="textbox hot" id="postresult">'.$this->_tpl_vars['postresult'].'</div>
<script type="text/javascript">
setTimeout(function(){$_(\'postresult\').hide()}, 3000);
</script>
';
}
echo '




<div class="c-left">
						<div class="mod mod-block comments reviews">
							<div class="hd">
								<a href="#write" class="add button-medium button-r-green">д����</a>
		    	                <div class="tab-choose handles fr">
		    	            		<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'&type=all" data-load-status="loaded" data-type="time" ';
if($this->_tpl_vars['type'] == 'all'){
echo ' class="active"';
}
echo '>��������</a>
		    	            		<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'&type=good" data-load-status="unload" data-type="best"';
if($this->_tpl_vars['type'] == 'good'){
echo ' class="active"';
}
echo '>��������</a>
		    	                    	</div>
		    	        		<h5>
		    	        			<span>'.$this->_tpl_vars['articlename'].'������</span>
		    	        		</h5>
		    	            </div>
		    	            <div class="bd">
	    	            		<ul>
								
		    	                	';
if (empty($this->_tpl_vars['reviewrows'])) $this->_tpl_vars['reviewrows'] = array();
elseif (!is_array($this->_tpl_vars['reviewrows'])) $this->_tpl_vars['reviewrows'] = (array)$this->_tpl_vars['reviewrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['reviewrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['reviewrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['reviewrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['reviewrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['reviewrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '	  
<li class="column-2 "><div class="left"> <p> <a href="'.jieqi_geturl('system','user',$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['posterid']).'"><img src="'.jieqi_geturl('system','avatar',$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['posterid'],'s').'" alt="'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['poster'].'" width="50" height="50"></a>  </p> <a class="name" href="'.jieqi_geturl('system','user',$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['posterid']).'" title="'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['poster'].'">'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['poster'].'</a><img src="/sink/image/vip/lv'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['vipid'].'.gif" width="20" class="fans-level-icon" title="'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['vip'].'">
<p class="identity"><i class="rk'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['honorid'].'"></i></p>  
</div> 
<div class="right">
 <h3><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviewshow.php?rid='.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'">';
if($this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['istop'] == 1){
echo '<span class="top">[�ö�]</span>';
}
if($this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['isgood'] == 1){
echo '<span class="good">[����]</span>';
}
echo truncate(str_replace('<br />',' ',$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['title']),'80','..').'</a></h3>  <p class="summary"> '.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['posttext'].' </p>  <div class="controls"><span class="time">'.date('Y-m-d H:i:s',$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['posttime']).'</span><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviewshow.php?rid='.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'" class="reply">�ظ�('.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['replies'].')</a>
 ';
if($this->_tpl_vars['ismaster'] == 1){
echo '
	';
if($this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['istop'] == 0){
echo '
	[<a id="act_top_'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'" href="javascript:;" onclick="act_top(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'&rid='.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'&act=top'.$this->_tpl_vars['jieqi_token_url'].'\');" switch="0">�ö�</a>]
	';
}else{
echo '
	[<a id="act_untop_'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'" href="javascript:;" onclick="act_top(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'&rid='.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'&act=untop'.$this->_tpl_vars['jieqi_token_url'].'\');" switch="1">�ú�</a>]
	';
}
echo ' 
	';
if($this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['isgood'] == 0){
echo '
	[<a id="act_good_'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'" href="javascript:;" onclick="act_good(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'&rid='.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'&act=good'.$this->_tpl_vars['jieqi_token_url'].'\');" switch="0">�Ӿ�</a>]
	';
}else{
echo '
	[<a id="act_normal_'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'" href="javascript:;" onclick="act_good(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'&rid='.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'&act=normal'.$this->_tpl_vars['jieqi_token_url'].'\');" switch="1">ȥ��</a>]
	';
}
echo ' 
	[<a id="act_del_'.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'" href="javascript:;" onclick="act_delete(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'&rid='.$this->_tpl_vars['reviewrows'][$this->_tpl_vars['i']['key']]['topicid'].'&act=del'.$this->_tpl_vars['jieqi_token_url'].'\');">ɾ��</a>]
	';
}
echo '
 </div>
 </div>
 </li>
 ';
}
echo '
									
									</ul>
		    	            </div>
		    	        </div>
						
		    	       <div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>
					   	<div id="write"><div class="mod mod-base comment-form book-comment-form">
						<div class="bd">
						';
if($this->_tpl_vars['jieqi_userid'] > 0){
echo '
						<div class="column-2"><div class="left"><p> <img src="'.jieqi_geturl('system','avatar',$this->_tpl_vars['jieqi_userid'],'s').'" alt="����" width="50" height="50" class="hy-is-placeholder"> </p> <span class="name">'.$this->_tpl_vars['jieqi_username'].'</span>
						</div> 
						<div class="right">
						<form class="form-base" name="frmreview" id="frmreview" method="post" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'" target="_blank"> 
						<div class="item"> 
						<input type="text" class="text" name="ptitle" placeholder="����" maxlength="100"> 
						</div> 
						<div class="item"> 
						<textarea name="pcontent" class="text" placeholder="����" style="overflow: hidden;"></textarea> 
						<div style="position: absolute; display: none; word-wrap: break-word; font-weight: 400; width: 584px; font-family: Simsun; line-height: normal; font-size: 14px; padding: 10px;">&nbsp;</div>
						</div> 
						';
if($this->_tpl_vars['postcheckcode'] > 0){
echo '
						<div class="buttons">
						<span class="codeimg"><img src="'.$this->_tpl_vars['jieqi_url'].'/checkcode.php" style="cursor:pointer;" onclick="this.src=\''.$this->_tpl_vars['jieqi_url'].'/checkcode.php?rand=\'+Math.random();"></span>
						<input type="text" class="text1 submit" name="checkcode" id="checkcode" size="8" maxlength="8" value="" /> 
						</div>
						';
}
echo '
						<div class="buttons"> 
						<input type="hidden" name="act" id="act" value="newpost" />'.$this->_tpl_vars['jieqi_token_input'].'
						<input type="button" value="�ύ" class="submit button-input button-red" style="cursor:pointer;" onclick="Ajax.Request(\'frmreview\',{onComplete:function(){alert(this.response.replace(/<br[^<>]*>/g,\'\\n\'));Form.reset(\'frmreview\');}});">
						</div>
						</form> 
						</div>
						</div>
						';
}else{
echo '
						<div class="alert alert-error">��ֻ��<a href="'.$this->_tpl_vars['jieqi_user_url'].'/login.php?jumpurl='.urlencode($this->_tpl_vars['jieqi_thisurl']).'" target="_blank" style="color:#09c">��½</a>��ſ��Է�������</div>
						';
}
echo '
						</div></div></div>
						</div>
						<div class="c-right">
						<div class="mod mod-back">
							<a href="'.$this->_tpl_vars['url_articleinfo'].'">������Ʒ����</a>
						</div>
						<div class="mod sidebar-book-cover">
							<div class="bd">
								<div class="pic">
									<a href="'.$this->_tpl_vars['url_articleinfo'].'"><img src="'.jieqi_geturl('article','cover',$this->_tpl_vars['articleid'],'s',$this->_tpl_vars['imgflag']).'" width="172" alt="243"></a>
								</div>
							</div>
						</div>
						</div>';
?>