<?php
echo '
<script type="text/javascript" src="/scripts/common.js"></script>
<script type="text/javascript">
function check_confirm(){
	var checkform = document.getElementById(\'checkform\');
	var checknum = 0;
	for (var i=0; i < checkform.elements.length; i++){
	 if (checkform.elements[i].name == \'checkid[]\' && checkform.elements[i].checked == true) checknum++; 
	}
	if(checknum == 0){
		alert(\'����ѡ��Ҫ��������Ŀ��\');
		return false;
	}
	var newclassid = document.getElementById(\'newclassid\');
	if(newclassid.value == -1){
		if(confirm(\'ȷʵҪ��ѡ����Ŀ�Ƴ����ô��\')) return true;
		else return false;
	}else{
		return true;
	}
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
	if(confirm(\'ȷʵҪ�������Ƴ����ô��\')) Ajax.Tip(url, param);
	return false;
}
</script>
<form action="" method="post" name="checkform" id="checkform" onsubmit="return check_confirm();">
			<h1 class="page-title">��׷����</h1>
			<h1 style="float: right;margin-top: -40px;padding-right: 11px;font-size: 12px;">';
if($this->_tpl_vars['maxmarkclass'] > 0){
echo '
  &nbsp;&nbsp;&nbsp;&nbsp;ѡ�����
  <select name="classlist" onchange="javascript:document.location=\'bookcase.php?classid=\'+this.value;">
    <option value="0"';
if($this->_tpl_vars['classid'] == 0){
echo ' selected="selected"';
}
echo '>Ĭ�����</option>
	';
if (empty($this->_tpl_vars['markclassrows'])) $this->_tpl_vars['markclassrows'] = array();
elseif (!is_array($this->_tpl_vars['markclassrows'])) $this->_tpl_vars['markclassrows'] = (array)$this->_tpl_vars['markclassrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['markclassrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['markclassrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['markclassrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['markclassrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['markclassrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
    <option value="'.$this->_tpl_vars['markclassrows'][$this->_tpl_vars['i']['key']]['classid'].'"';
if($this->_tpl_vars['classid'] == $this->_tpl_vars['markclassrows'][$this->_tpl_vars['i']['key']]['classid']){
echo ' selected="selected"';
}
echo '>��'.$this->_tpl_vars['markclassrows'][$this->_tpl_vars['i']['key']]['classid'].'�����</option>
	';
}
echo '
  </select>
  ';
}
echo '</h1>
			<div class="mod block reading">
					<div class="bd">
						<ul class="list">
						';
if (empty($this->_tpl_vars['bookcaserows'])) $this->_tpl_vars['bookcaserows'] = array();
elseif (!is_array($this->_tpl_vars['bookcaserows'])) $this->_tpl_vars['bookcaserows'] = (array)$this->_tpl_vars['bookcaserows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['bookcaserows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['bookcaserows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['bookcaserows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['bookcaserows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['bookcaserows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
							<li>
									<a href="javascript:;" class="btn btn-blue read" onclick="act_delete(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/bookcase.php?bid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['caseid'].'&act=delete'.$this->_tpl_vars['jieqi_token_url'].'\');" id="act_delete_'.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['caseid'].'" style="margin-left: 20px;">ȡ���ղ�</a>
							';
if($this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['articlemark'] ==''){
echo '
									<a href="'.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['url_index'].'" title="'.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['articlename'].'" class="btn btn-blue read">��ʼ�Ķ�</a>
							';
}else{
echo '
							        <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/readbookcase.php?bid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['caseid'].'&aid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['articleid'].'&cid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['chapterid'].'" class="btn btn-blue read">�����Ķ�</a>
							';
}
echo '
											<p class="name">
                                                <a href="'.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['url_index'].'">'.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['articlename'].'</a><input type="checkbox" id="checkid[]" name="checkid[]" value="'.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['caseid'].'" style="margin-left: 5px;" />
									</p>
		 							<p class="update">
		 								<span class="time">�����½�:</span>
											';
if($this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['viptime'] > $this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['freetime']){
echo '
	<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/readbookcase.php?bid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['caseid'].'&aid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['articleid'].'&cid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['vipchapterid'].'" target="_blank">'.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['vipchapter'].'</a>
	';
}else{
echo '
	<a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/readbookcase.php?bid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['caseid'].'&aid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['articleid'].'&cid='.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['lastchapterid'].'" target="_blank">'.$this->_tpl_vars['bookcaserows'][$this->_tpl_vars['i']['key']]['lastchapter'].'</a>
	';
}
echo '
		 							</p>				
								</li>
						';
}
echo '
							</ul>
                        </div>
                    </div>
<h1 style="text-align: center;font-size: 12px;">
<table width="100%" align="center">
  <tr>
    <td colspan="6" align="center">ѡ����Ŀ
	<select name="newclassid" id="newclassid">
	<option value="-1" selected="selected">�Ƴ����</option>
	<option value="0">�Ƶ�Ĭ�����</option>
	';
if (empty($this->_tpl_vars['markclassrows'])) $this->_tpl_vars['markclassrows'] = array();
elseif (!is_array($this->_tpl_vars['markclassrows'])) $this->_tpl_vars['markclassrows'] = (array)$this->_tpl_vars['markclassrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['markclassrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['markclassrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['markclassrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['markclassrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['markclassrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
    <option value="'.$this->_tpl_vars['markclassrows'][$this->_tpl_vars['i']['key']]['classid'].'">�Ƶ���'.$this->_tpl_vars['markclassrows'][$this->_tpl_vars['i']['key']]['classid'].'�����</option>
	';
}
echo '
    </select> 
    <input name="btnsubmit" type="submit" value=" ȷ�� " style="background-Color:#97af2f;border:1px solid #ccc;color:#fff;height:21px" />
	<input type="hidden" name="clsssid" value="'.$this->_tpl_vars['classid'].'" />
	<input type="hidden" name="act" value="move">'.$this->_tpl_vars['jieqi_token_input'].'
	</td>
  </tr>
</table></h1>
</form>';
?>