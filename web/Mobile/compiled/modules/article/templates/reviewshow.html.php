<?php
echo '

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
								
		    	        		<h5>
		    	        			<span>��'.$this->_tpl_vars['articlename'].'��-'.$this->_tpl_vars['title'].'�ظ�</span>
		    	        		</h5>
		    	            </div>
		    	            <div class="bd">
	    	            		<ul>
								
		    	                	';
if (empty($this->_tpl_vars['replyrows'])) $this->_tpl_vars['replyrows'] = array();
elseif (!is_array($this->_tpl_vars['replyrows'])) $this->_tpl_vars['replyrows'] = (array)$this->_tpl_vars['replyrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['replyrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['replyrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['replyrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['replyrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['replyrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '  
<li class="column-2 "><div class="left"> <p> <a href="'.jieqi_geturl('system','user',$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['userid']).'"><img src="'.jieqi_geturl('system','avatar',$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['userid'],'l',$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['avatar']).'" alt="'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['username'].'" width="50" height="50"></a>  </p> <a class="name" href="'.jieqi_geturl('system','user',$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['userid']).'" title="'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['username'].'">'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['username'].'</a><img src="/sink/image/vip/lv'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['vipid'].'.gif" width="20" class="fans-level-icon" title="'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['vip'].'">
<p class="identity"><i class="rk'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['honorid'].'"></i></p>  
</div> 
<div class="right">
 <h3>'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['subject'].'</h3>  <p class="summary"> '.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['posttext'].' </p>  
 <div class="controls"><span class="time">'.date('Y-m-d H:i:s',$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['posttime']).'</span><a href="#write" class="reply">�ظ�</a>
 ';
if($this->_tpl_vars['jieqi_userid'] == $this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['posterid'] || $this->_tpl_vars['jieqi_userstatus'] == 2){
echo ' | 
		<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviewedit.php?yid='.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['postid'].'">�༭</a>
		';
}
echo '
		';
if($this->_tpl_vars['ismaster'] == 1){
echo ' | ';
if($this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['istopic'] == 1){
echo '
		<a id="act_delt_'.$this->_tpl_vars['topicid'].'" href="javascript:;" onclick="if(confirm(\'ȷʵҪɾ��������ô��\')) Ajax.Tip(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'&rid='.$this->_tpl_vars['topicid'].'&act=del'.$this->_tpl_vars['jieqi_token_url'].'\', {method: \'POST\'});">ɾ��</a>
		';
}else{
echo '
		<a id="act_delp_'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['postid'].'" href="javascript:;" onclick="if(confirm(\'ȷʵҪɾ���ûظ�ô��\')) Ajax.Tip(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviewshow.php?aid='.$this->_tpl_vars['articleid'].'&rid='.$this->_tpl_vars['topicid'].'&did='.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['postid'].'&act=del'.$this->_tpl_vars['jieqi_token_url'].'\', {method: \'POST\'});">ɾ��</a>
		';
}
}
echo '
		 | <a href="#yid'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['postid'].'" name="yid'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['postid'].'">'.$this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['order'].'#</a>';
if($this->_tpl_vars['replyrows'][$this->_tpl_vars['i']['key']]['display'] == 1){
echo '����';
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
						<form class="form-base" name="frmreview" id="frmreview" method="post" action="'.$this->_tpl_vars['article_dynamic_url'].'/reviewshow.php?tid='.$this->_tpl_vars['topicid'].'&aid='.$this->_tpl_vars['articleid'].'" onsubmit="return frmpost_validate();" enctype="multipart/form-data" target="_blank"> 
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
						<input type="hidden" name="act" value="newpost" />'.$this->_tpl_vars['jieqi_token_input'].'
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
						</div>
						<script type="text/javascript">
function frmpost_validate(){
  if(document.frmpost.pcontent.value == ""){
    alert("����������");
    document.frmpost.pcontent.focus();
    return false;
  }
}
</script>';
?>