<?php
echo '
<script type="text/javascript">
function frmnewchapter_validate(){
  if(document.frmnewchapter.chaptername.value == ""){
    alert("�������½ڱ���");
    document.frmnewchapter.chaptername.focus();
    return false;
  }
}
//ͳ����������
function show_inputsize(txt){
	txt = $_(txt);
	var size = (arguments.length > 1) ? $_(arguments[1]) : $_(txt.id + \'_size\');
	size.innerHTML = Math.ceil(txt.value.replace(/\\s/g, \'\').replace(/[^\\x00-\\xff]/gi, \'--\').length / 2);
}
//��ʱ�����½�����
function chapter_autosave(){
	if($_(\'chaptercontent\').value != \'\') Ajax.Request(\''.$this->_tpl_vars['jieqi_url'].'/autosave.php\',{method :\'POST\',parameters:\'savedata=\'+encodeURIComponent($_(\'chaptercontent\').value)});
}
AutoSaveTimer = setInterval(chapter_autosave, 60000);
</script>
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>�����½�</h4>
</div>
<script type="text/javascript" src="'.$this->_tpl_vars['jieqi_url'].'/scripts/attaches.js"></script>
<form name="frmnewchapter" id="frmnewchapter" action="'.$this->_tpl_vars['url_newchapter'].'" method="post" onsubmit="return frmnewchapter_validate();" enctype="multipart/form-data">
<div class="mail-zc">
<div class="phone-name"> 
  <h3>С˵���ƣ�</h3>
  <a href="'.$this->_tpl_vars['article_static_url'].'/articlemanage.php?id='.$this->_tpl_vars['articleid'].'">'.$this->_tpl_vars['articlename'].'</a>
</div>
<div class="phone-name"> 
  <h3>�־����ƣ�</h3>
  <select class="select"  size="1" name="chapterorder" id="chapterorder">
  ';
if (empty($this->_tpl_vars['volumerows'])) $this->_tpl_vars['volumerows'] = array();
elseif (!is_array($this->_tpl_vars['volumerows'])) $this->_tpl_vars['volumerows'] = (array)$this->_tpl_vars['volumerows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['volumerows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['volumerows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['volumerows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['volumerows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['volumerows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <option value="'.$this->_tpl_vars['volumerows'][$this->_tpl_vars['i']['key']]['chapterorder'].'"';
if($this->_tpl_vars['volumerows'][$this->_tpl_vars['i']['key']]['chapterorder'] == $this->_tpl_vars['chapterorder']){
echo ' selected="selected"';
}
echo '>'.$this->_tpl_vars['volumerows'][$this->_tpl_vars['i']['key']]['volumename'].'</option>
  ';
}
echo '
  </select>
</div>
<div class="phone-name"> 
  <h3>�½ڱ��⣺</h3>
  <input type="text" class="text" name="chaptername" id="chaptername" size="50" maxlength="50" value="'.$this->_tpl_vars['chaptername'].'" />
</div>
<div class="phone-name"> 
  <h3>�½����ݣ�<br />������ <span id="chaptercontent_size">0</span> ��</h3>
  <textarea class="textarea" name="chaptercontent" id="chaptercontent" onkeyup="show_inputsize(this);" oninput="show_inputsize(this);" onpropertychange="show_inputsize(this);">';
if($this->_tpl_vars['chaptercontent'] == ''){
echo $this->_tpl_vars['jieqi_autosave'];
}else{
echo $this->_tpl_vars['chaptercontent'];
}
echo '</textarea>
</div>
';
if($this->_tpl_vars['canupload'] == true && $this->_tpl_vars['maxattachnum'] > 0){
echo '
<div class="phone-name"> 
  <h3>�������ƣ�</h3>
  �ļ����ͣ�'.$this->_tpl_vars['attachtype'].', ͼƬ���'.$this->_tpl_vars['maximagesize'].'K, �ļ����'.$this->_tpl_vars['maxfilesize'].'K
</div>
<div class="phone-name"> 
  �����ϴ���</h3>
  <input type="file" class="file" name="attachfile[]" id="attachfile" onchange="Attaches.addFile(\'attachfile\', \'attachdiv\', true);" /><input type="button" class="filebutton" onclick="if(document.all){document.getElementById(\'attachfile\').outerHTML += \'\';}else{document.getElementById(\'attachfile\').value = \'\';}" value="���" />
  <div id="attachdiv"></div>
</div>
';
}
if($this->_tpl_vars['issign'] >= 10 && $this->_tpl_vars['isvip'] > 0){
echo '
<div class="phone-name"> 
 <h3>�Ƿ���ѣ�</h3>
  <input type="radio" class="radio" name="isvip" value="0"';
if($this->_tpl_vars['cvip'] == 0){
echo ' checked="checked"';
}
echo ' />����½�&nbsp;
  <input type="radio" class="radio" name="isvip" value="1"';
if($this->_tpl_vars['cvip'] > 0){
echo ' checked="checked"';
}
echo ' />VIP�½�&nbsp;';
if($this->_tpl_vars['customprice'] > 0){
echo '<input type="text" class="text" name="saleprice" id="saleprice" size="4" maxlength="10" value="'.$this->_tpl_vars['saleprice'].'" />'.$this->_tpl_vars['egoldname'].' <span>(�������Զ��������Ƽ�)</span>';
}
echo '
</div>
';
}
echo '
<div class="phone-name"> 
 <h3>�Ƿ��걾��</h3>
  <input type="radio" class="radio" name="fullflag" value="0" checked="checked" />δ�����&nbsp;
  <input type="radio" class="radio" name="fullflag" value="1" />���ƪ
</div>
';
if($this->_tpl_vars['authtypeset'] == 1){
echo '
<div class="phone-name"> 
  <h3>С˵�Ű棺</h3>
  <input type="radio" class="radio" name="typeset" value="1" checked="checked" />�Զ��Ű�&nbsp;
  <input type="radio" class="radio" name="typeset" value="0" />�����Ű�
</div>
';
}
echo '
<div class="phone-name"> 
  <h3>����ʽ��</h3>
  <input type="radio" class="radio" name="posttype" value="0" checked="checked" />ֱ�ӷ���&nbsp;
  <input type="radio" class="radio" name="posttype" value="1" />��Ϊ�ݸ�&nbsp;
  ';
if($this->_tpl_vars['uptiming'] > 0){
echo '
  <input type="radio" class="radio" name="posttype" value="2" />��ʱ����
  <input type="text" class="text" name="pubyear" id="pubyear" size="4" maxlength="4" value="'.date('Y',$this->_tpl_vars['jieqi_time']).'" />��<input type="text" class="text" name="pubmonth" id="pubmonth" size="2" maxlength="2" value="'.date('m',$this->_tpl_vars['jieqi_time']).'" />��<input type="text" class="text" name="pubday" id="pubday" size="2" maxlength="2" value="'.date('d',$this->_tpl_vars['jieqi_time']).'" />��<input type="text" class="text" name="pubhour" id="pubhour" size="2" maxlength="2" value="" />ʱ<input type="text" class="text" name="pubminute" id="pubminute" size="2" maxlength="2" value="" />��
  ';
}
echo '
</div>
<div class="ft">
<input type="hidden" name="token" value="'.$this->_tpl_vars['token'].'" />
  <input type="hidden" name="aid" value="'.$this->_tpl_vars['articleid'].'" />
  <input type="hidden" name="action" id="action" value="newchapter" />
  ';
if($this->_tpl_vars['draftid'] > 0){
echo '<input type="hidden" name="draftid" value="'.$this->_tpl_vars['draftid'].'" />';
}
echo '
  <input type="submit" class="btn btn-auto btn-blue" name="submit" value=" �� �� " />
  ';
if($this->_tpl_vars['needupaudit'] > 0){
echo '&nbsp;&nbsp;<span>ע�⣺ֱ�ӷ�����½�Ҳ���ȱ����ڲݸ�������½��б��У�����Ա��˺����������ʾ��</span>';
}
echo '
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript">
$(function(){
		$(\'#frmnewchapter\').on(\'submit\', function(e){
		e.preventDefault();
		 var tips = layer.open({type: 2,content: \'������\'});
				GPage.postForm(\'frmnewchapter\', $("#frmnewchapter").attr("action"),
			   function(data){
					if(data.status==\'OK\'){
                        $.ajaxSetup ({ cache: false });
					    layer.close(tips);
                        jumpurl(data.jumpurl);
					}else{
					    layer.close(tips);
		                openMsgs(data.msg);
					}
			   });
//			}
		});
});
</script> ';
?>