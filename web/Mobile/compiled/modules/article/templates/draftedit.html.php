<?php
echo '
<script type="text/javascript">
var customprice = \''.$this->_tpl_vars['customprice'].'\';
function frmchapteredit_validate(){
  if(document.frmchapteredit.chaptername.value == ""){
    alert("�������½ڱ���");
    document.frmchapteredit.chaptername.focus();
    return false;
  }
  if(document.frmchapteredit.chaptercontent.value == "" ){
	alert( "�������½�����" );
	document.frmchapteredit.chaptercontent.focus();
	return false;
  }
}
//ͳ����������
function show_inputsize(txt){
	txt = $_(txt);
	var size = (arguments.length > 1) ? $_(arguments[1]) : $_(txt.id + \'_size\');
	size.innerHTML = txt.value.replace(/\\s/g, \'\').length;
}
//��ʾĬ������
addEvent(window, \'load\', function(){show_inputsize(\'chaptercontent\');});
</script>
<link href="/sink/css/user.css" type="text/css" rel="stylesheet">

<!--wrap begin-->
<div class="wrap2">
  <script type="text/javascript">
$(function(){
	
  var ss = \'userhub\'+\'_\'+\'\';
  if(ss == \'userhub_inbox\' || ss == \'userhub_outbox\' || ss == \'userhub_draft\' || ss == \'userhub_toSysView\' || ss == \'userhub_messagedetail\'){
      $(\'#userhub_newmessage\').parent("dl.list_menu").show();
	  $(\'#userhub_newmessage\').children("a").addClass("focus");
  }
  if(ss == \'chapter_cmView\'){
      $(\'#article_masterPage\').parent("dl.list_menu").show();
	  $(\'#article_masterPage\').children("a").addClass("focus");
  }
//  if(\'\' == \'upaView\'){
//      $(\'#userhub_usereditView\').parent("dl.list_menu").show();
//	  $(\'#userhub_usereditView\').children("a").addClass("focus");
//  }
  if(\'\' == \'hotcomment\'){
      $(\'#userhub_comment\').parent("dl.list_menu").show();
	  $(\'#userhub_comment\').children("a").addClass("focus");
  }
  if(\'\' == \'uservip\'){
      $(\'#userhub_usermember\').parent("dl.list_menu").show();
	  $(\'#userhub_usermember\').children("a").addClass("focus");
  }
  if(\'\' == \'moderatorView\'){
      $(\'#userhub_review_view\').parent("dl.list_menu").show();
	  $(\'#userhub_review_view\').children("a").addClass("focus");
  }
  $(\'#\'+ss).parent("dl.list_menu").show();
  $(\'#\'+ss).children("a").addClass("focus");
  $("li#row em").click(function(){
  $(this).parent().parent().children("dl.list_menu").toggle(300);
  });
});

</script>
<!--sidebar2 begin-->
  <div class="sidebar2 fl bg4 fix">
	
		    <div class="user2 f_blue fix">
'.$this->_tpl_vars['jieqi_pageblocks']['3']['content'].'

	'.$this->_tpl_vars['jieqi_pageblocks']['2']['content'].'
  <div class="kf"></div>
  </div>
   <div class="article3 fr bg5">
       <div class="tabox">
    	<div class="t2 rel">
       		<h2>�༭�ݸ�</h2>
      </div>
     <dl class="box_form">
<form name="frmchapteredit" id="frmchapteredit" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/draftedit.php?do=submit" method="post" onsubmit="return frmchapteredit_validate();">
<dd class="fix">
          <em class="tt3">';
if($this->_tpl_vars['isvip'] == 0){
echo 'С˵���ƣ�';
}else{
echo 'VIPС˵���ƣ�';
}
echo '</em>
          <div class="int">
		';
if($this->_tpl_vars['isvip'] == 0){
echo '
		<select class=\'select\'  size=\'1\' name=\'articleid\' id=\'articleid\'>
		<option value=\'0\'>--��ѡ��--</option>
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
		<option value=\''.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'\'';
if($this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['checked'] > 0){
echo ' selected';
}
echo '>'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articlename'].'</option>
		';
}
echo '
		</select>
		';
}else{
echo '
		<select class=\'select\'  size=\'1\' name=\'obookid\' id=\'obookid\'>
		<option value=\'0\'>--��ѡ��--</option>
		';
if (empty($this->_tpl_vars['obookrows'])) $this->_tpl_vars['obookrows'] = array();
elseif (!is_array($this->_tpl_vars['obookrows'])) $this->_tpl_vars['obookrows'] = (array)$this->_tpl_vars['obookrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['obookrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['obookrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['obookrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['obookrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['obookrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
		<option value=\''.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookid'].'\'';
if($this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['checked'] > 0){
echo ' selected';
}
echo '>'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookname'].'</option>
		';
}
echo '
		</select>
		';
}
echo '
  </div>
         </dd>
<dd class="fix">
          <em class="tt3">�½ڱ��⣺</em>
          <div class="int"><input type="text" class="input1 fl" name="chaptername" id="chaptername" size="50" maxlength="50" value="'.$this->_tpl_vars['chaptername'].'" /></div>
         </dd>
';
if($this->_tpl_vars['isvip'] > 0 && $this->_tpl_vars['customprice'] > 0){
echo '
<dd class="fix">
          <em class="tt3">���¶��ۣ�</em>
          <div class="int"><input type=\'text\' class=\'input1 fl\' name=\'saleprice\' id=\'saleprice\' size=\'10\' maxlength=\'10\' value=\''.$this->_tpl_vars['saleprice'].'\' /><span class="hot">'.$this->_tpl_vars['egoldname'].'(�������Զ��������Ƽ�)</span><span class="hint cl">'.$this->_tpl_vars['egoldname'].'(�������Զ��������Ƽ�)</span></div>
         </dd>
';
}
echo '
<dd class="fix">
          <em class="tt3">�Ƿ�ʱ��</em>
          <div class="int">
		<input type="radio" class="radio" name="autopub" value="0"';
if($this->_tpl_vars['pubdate'] == 0){
echo ' checked="checked"';
}
echo ' onclick="document.getElementById(\'pubtime\').style.display=\'none\';" />�� &nbsp; 
		<input type="radio" class="radio" name="autopub" value="1"';
if($this->_tpl_vars['pubdate'] > 0){
echo ' checked="checked"';
}
echo ' onclick="document.getElementById(\'pubtime\').style.display=\'\';" />�� &nbsp; 
		</div>
         </dd>
<dd class="fix" id="pubtime" ';
if($this->_tpl_vars['pubdate'] == 0){
echo 'style="display:none;"';
}
echo '>
          <em class="tt3">����ʱ�䣺</em>
          <div class="int">
		<input type="text" class="text" name="pubyear" id="pubyear" size="4" maxlength="4" value="'.$this->_tpl_vars['pubyear'].'" />��<input type="text" class="text" name="pubmonth" id="pubmonth" size="2" maxlength="2" value="'.$this->_tpl_vars['pubmonth'].'" />��<input type="text" class="text" name="pubday" id="pubday" size="2" maxlength="2" value="'.$this->_tpl_vars['pubday'].'" />��<input type="text" class="text" name="pubhour" id="pubhour" size="2" maxlength="2" value="'.$this->_tpl_vars['pubhour'].'" />ʱ<input type="text" class="text" name="pubminute" id="pubminute" size="2" maxlength="2" value="'.$this->_tpl_vars['pubminute'].'" />��
		</div>
         </dd>

<dd class="fix">
          <em class="tt3">�½����ݣ�<br /><span class="hottext"><br /><input name="textstat" type="button" class="button" onclick="javascript:alert(\'��ǰ���� \'+ document.getElementById(\'chaptercontent\').value.replace(/\\s/g, \'\').length + \' �֡�\');" value="����ͳ��" /></span></em>
          <div class="int"><textarea class="inp4" name="chaptercontent" id="chaptercontent" rows="25" cols="80">'.$this->_tpl_vars['chaptercontent'].'</textarea></div>
         </dd>
		 


<dd class="fix">
          <em class="tt3">  <input type="hidden" name="act" value="update" />'.$this->_tpl_vars['jieqi_token_input'].'
  <input type="hidden" name="id" value="'.$this->_tpl_vars['id'].'" />
  <input type="hidden" name="isvip" value="'.$this->_tpl_vars['isvip'].'" />
  </em>
          <div class="int"><input type="submit" class="button" name="submit"  id="submit" value="�� ��" /></div>
         </dd>
</form>
</dl>
</div>
</div>';
?>