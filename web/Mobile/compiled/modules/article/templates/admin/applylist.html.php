<?php
echo '
<script type="text/javascript">
//���
function act_confirm(url, id){
	var param = {
		method: \'POST\', 
		onFinish: function(res){
			if(res.match(\'�ɹ�\')){
				$_(\'act_do_\' + id).hide();
				$_(\'info_status_\' + id).innerHTML = \'�����\';
			}
		}
	}
	Ajax.Tip(url, param);
	return false;
}
//�ܾ�
function act_refuse(url, id){
	var param = {
		method: \'POST\', 
		onFinish: function(res){
			if(res.match(\'�ɹ�\')){
				$_(\'act_do_\' + id).hide();
				$_(\'info_status_\' + id).innerHTML = \'δͨ��\';
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
	if(confirm(\'ȷʵҪɾ���������¼ô��\')) Ajax.Tip(url, param);
	return false;
}
</script>
<div class="gridtop">���������¼&nbsp;&nbsp;&nbsp; <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applylist.php">ȫ����¼</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applylist.php?display=ready">�����¼</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applylist.php?display=success">�����¼</a> | <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applylist.php?display=failure">���ܼ�¼</a></div>
<form id="form1" name="form1" method="post" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applylist.php" onSubmit="javascript:if(confirm(\'ȷʵҪɾ��ѡ�м�¼ô��\')) return true; else return false;">
<table class="grid" width="100%" align="center">
  <tr align="center">
    <th width="4%"><input type="checkbox" id="checkall" name="checkall" value="checkall" onclick="for (var i=0;i<this.form.elements.length;i++){ if (this.form.elements[i].name != \'checkkall\') this.form.elements[i].checked = this.form.checkall.checked; }"></th>
    <th width="14%">����ʱ��</th>
	<th width="11%">������</th>
	<th width="8%">��������</th>
    <th width="20%">���ʱ��/�����</th>
    <th width="8%">���״̬</th>
	<th width="22%">�����˲���</th>
    <th width="17%">��˲���</th>
  </tr>
  ';
if (empty($this->_tpl_vars['applyrows'])) $this->_tpl_vars['applyrows'] = array();
elseif (!is_array($this->_tpl_vars['applyrows'])) $this->_tpl_vars['applyrows'] = (array)$this->_tpl_vars['applyrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['applyrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['applyrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['applyrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['applyrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['applyrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
  <tr>
    <td align="center"><input name="applyid[]" type="checkbox" id="applyid[]" value="'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'" /></td>
    <td align="center">'.date('Y-m-d H:i',$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applytime']).'</td>
    <td><a href="'.$this->_tpl_vars['jieqi_url'].'/userinfo.php?id='.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyuid'].'" target="_blank">'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyname'].'</a></td>
	<td align="center"><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applyinfo.php?id='.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'" target="_blank">����鿴</a></td>
    <td>';
if($this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['authtime'] > 0){
echo date('m-d H:i',$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['authtime']).' / <a href="'.jieqi_geturl('system','user',$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['authuid']).'" target="_blank">'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['authname'].'</a>';
}
echo '</td>
    <td align="center"><span id="info_status_'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'">'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['authstatus'].'</span></td>
	<td align="center"><a href="'.$this->_tpl_vars['jieqi_url'].'/'.$this->_tpl_vars['adminpath'].'/usermanage.php?id='.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyuid'].'" target="_blank">������Ա</a> | <a href="'.$this->_tpl_vars['jieqi_url'].'/'.$this->_tpl_vars['adminpath'].'/personmanage.php?id='.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyuid'].'" target="_blank">��ϵ��ʽ</a> | <a href="'.$this->_tpl_vars['jieqi_url'].'/'.$this->_tpl_vars['adminpath'].'/newmessage.php?receiver='.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyname'].'" target="_blank">���Żظ�</a></td> 
    <td align="center">
	';
if($this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyflag'] == 0){
echo '
	<span id="act_do_'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'">
	<a id="act_confirm_'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'" href="javascript:;" onclick="act_confirm(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applylist.php?id='.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'&act=confirm'.$this->_tpl_vars['jieqi_token_url'].'\', \''.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'\');">���</a> | 
	<a id="act_refuse_'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'" href="javascript:;" onclick="act_refuse(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applylist.php?id='.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'&act=refuse'.$this->_tpl_vars['jieqi_token_url'].'\', \''.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'\');">�ܾ�</a> | 
	</span>
	';
}
echo '
	<a id="act_delete_'.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'" href="javascript:;" onclick="act_delete(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/'.$this->_tpl_vars['articlepath'].'/applylist.php?id='.$this->_tpl_vars['applyrows'][$this->_tpl_vars['i']['key']]['applyid'].'&act=delete'.$this->_tpl_vars['jieqi_token_url'].'\');">ɾ��</a></td>
  </tr>
  ';
}
echo '
  <tr>
    <td colspan="8" align="left">
	<input type="hidden" name="act" value="batchdel" />'.$this->_tpl_vars['jieqi_token_input'].'
	<input type="submit" name="Submit" value="����ɾ��" class="button" />
	</td>
    </tr>  
</table>
</form>

<div class="pages">'.$this->_tpl_vars['url_jumppage'].'</div>';
?>