<?php
echo '
<script type="text/javascript">
var customprice = \''.$this->_tpl_vars['customprice'].'\';
function frmnewdraft_validate(){
  if(document.frmnewdraft.chaptername.value == ""){
    alert("请输入章节标题");
    document.frmnewdraft.chaptername.focus();
    return false;
  }
  if(document.frmnewdraft.chaptercontent.value == "" ){
	alert( "请输入章节内容" );
	document.frmnewdraft.chaptercontent.focus();
	return false;
  }
}
//统计输入字数
function show_inputsize(txt){
	txt = $_(txt);
	var size = (arguments.length > 1) ? $_(arguments[1]) : $_(txt.id + \'_size\');
	size.innerHTML = txt.value.replace(/\\s/g, \'\').length;
}
//显示默认字数
addEvent(window, \'load\', function(){show_inputsize(\'chaptercontent\');});
</script>
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>新建草稿</h4>
</div>
<form name="frmnewdraft" id="frmnewdraft" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/newdraft.php?do=submit" method="post" onsubmit="return frmnewdraft_validate();">
<div class="mail-zc">
<div class="phone-name">
	<h3>草稿类型：</h3>
	
	<input type="radio" class="radio" name=\'isvip\' value=\'0\' checked="checked" onclick="document.getElementById(\'selarticle\').style.display=\'block\';document.getElementById(\'selobook\').style.display=\'none\';if(customprice == \'1\') document.getElementById(\'sprice\').style.display=\'none\';" />免费章节 &nbsp; 
	<input type="radio" class="radio" name=\'isvip\' value=\'1\' onclick="document.getElementById(\'selarticle\').style.display=\'none\';document.getElementById(\'selobook\').style.display=\'block\';if(customprice == \'1\') document.getElementById(\'sprice\').style.display=\'\';" />VIP章节 &nbsp; 
  </tr>
<div class="phone-name">
  <h3>小说名称：</h3>
		<div id="selarticle" style="display:block;">
		<select class=\'select\'  size=\'1\' name=\'articleid\' id=\'articleid\'>
		<option value=\'0\'>--请选择--</option>
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
		<option value=\''.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articleid'].'\'>'.$this->_tpl_vars['articlerows'][$this->_tpl_vars['i']['key']]['articlename'].'</option>
		';
}
echo '
		</select>
		</div>
		<div id="selobook" style="display:none;">
		<select class=\'select\'  size=\'1\' name=\'obookid\' id=\'obookid\'>
		<option value=\'0\'>--请选择--</option>
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
		<option value=\''.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookid'].'\'>'.$this->_tpl_vars['obookrows'][$this->_tpl_vars['i']['key']]['obookname'].'</option>
		';
}
echo '
		</select>
		</div>
</div>
<div class="phone-name">
 <h3>章节标题：</h3>
  <input type="text" class="text" name="chaptername" id="chaptername" size="50" maxlength="50" value="" />
</div>
';
if($this->_tpl_vars['customprice'] > 0){
echo '
<div class="phone-name" id="sprice" style="display:none;">
	<h3>本章定价：</h3>
	<input type="text" class="text" name="saleprice" id="saleprice" size="10" maxlength="10" value="" /><span>'.$this->_tpl_vars['egoldname'].'(留空则自动按字数计价)</span>
</div>
';
}
if($this->_tpl_vars['authtypeset'] > 0){
echo '
<div class="phone-name">
  <h3>小说排版：</h3>
  <input type="radio" class="radio" name="typeset" value="1" checked="checked" />自动排版
<input type="radio" class="radio" name="typeset" value="0" />无需排版
</div>
';
}
echo '
<div class="phone-name">
	<h3>是否定时发表：</h3>
	<input type="radio" class="radio" name="uptiming" value="0" checked="checked" onclick="document.getElementById(\'pubtime\').style.display=\'none\';" />否 &nbsp; 
	<input type="radio" class="radio" name="uptiming" value="1" onclick="document.getElementById(\'pubtime\').style.display=\'\';" />是 &nbsp; 
</div>
<div class="phone-name" id="pubtime" style="display:none;">
	<h3>定时发表时间：</h3>
	<input type="text" class="text" name="pubyear" id="pubyear" size="4" maxlength="4" value="'.date('Y',$this->_tpl_vars['jieqi_time']).'" />年<input type="text" class="text" name="pubmonth" id="pubmonth" size="2" maxlength="2" value="'.date('m',$this->_tpl_vars['jieqi_time']).'" />月<input type="text" class="text" name="pubday" id="pubday" size="2" maxlength="2" value="'.date('d',$this->_tpl_vars['jieqi_time']).'" />日<input type="text" class="text" name="pubhour" id="pubhour" size="2" maxlength="2" value="" />时<input type="text" class="text" name="pubminute" id="pubminute" size="2" maxlength="2" value="" />分
</div>
<div class="phone-name">
  <h3>章节内容：<br />已输入 <span class="hot" id="chaptercontent_size">0</span> 字</h3>
  <textarea class="textarea" name="chaptercontent" id="chaptercontent" onkeyup="show_inputsize(this);" oninput="show_inputsize(this);" onpropertychange="show_inputsize(this);"></textarea>
</div>
<div class="ft"><input type="hidden" name="action" value="newdraft" />'.$this->_tpl_vars['jieqi_token_input'].'
  <input type="submit" class="btn btn-auto btn-blue" name="submit" value="提 交" />
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript">
$(function(){
		$(\'#frmnewdraft\').on(\'submit\', function(e){
		e.preventDefault();
		 var tips = layer.open({type: 2,content: \'加载中\'});
				GPage.postForm(\'frmnewdraft\', $("#frmnewdraft").attr("action"),
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