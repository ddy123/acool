<?php
echo '
<div id="content"><link href="/sink/css/user.css" type="text/css" rel="stylesheet">

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
  <div class="article2 fr">
	<div class="boxm2">
'.jieqi_get_block(array('bid'=>'0', 'blockname'=>'��ֵ����', 'module'=>'pay', 'filename'=>'block_paylist_tab', 'classname'=>'BlockSystemCustom', 'side'=>'-1', 'title'=>'', 'vars'=>'', 'template'=>'', 'contenttype'=>'4', 'custom'=>'1', 'publish'=>'3', 'hasvars'=>'0'), 1).'

<script type="text/javascript">
//���п�ѡ��
function showpayselect() {
    var payselect = document.getElementById(\'payselect\');
    var banktypes = [[\'ICBC-NET-B2C\', \'��������\'], [\'CMBCHINA-NET-B2C\', \'��������\'], [\'ABC-NET-B2C\', \'�й�ũҵ����\'], [\'CCB-NET-B2C\', \'��������\'], [\'BCCB-NET-B2C\', \'��������\'], [\'BOCO-NET-B2C\', \'��ͨ����\'], [\'CIB-NET-B2C\', \'��ҵ����\'], [\'CMBC-NET-B2C\', \'�й���������\'], [\'CEB-NET-B2C\', \'�������\'], [\'BOC-NET-B2C\', \'�й�����\'], [\'PINGANBANK-NET-B2C\', \'ƽ������\'], [\'ECITIC-NET-B2C\', \'��������\'], [\'SDB-NET-B2C\', \'���ڷ�չ����\'], [\'GDB-NET-B2C\', \'�㷢����\'], [\'SHB-NET-B2C\', \'�Ϻ�����\'], [\'SPDB-NET-B2C\', \'�Ϻ��ֶ���չ����\'], [\'POST-NET-B2C\', \'�й�����\'], [\'BJRCB-NET-B2C\', \'����ũ����ҵ����\'], [\'HXB-NET-B2C\', \'��������\']];

	var html = \'\';
    html += \'<ul class="recnTul">\';
    for (var i = 0; i < banktypes.length; i++) {
        html += \'<li onclick="check_radio();"><input type="radio" name="pd_FrpId" value="\' + banktypes[i][0] + \'" class="radio"\';
		if(i == 0) html += \' checked="checked"\';
		html += \'> \' + banktypes[i][1] + \'</li>\';
    }
    html += \'</ul>\';
	payselect.innerHTML = html;
}

if (window.attachEvent) {
    window.attachEvent(\'onload\', showpayselect);
} else {
    window.addEventListener(\'load\', showpayselect, false);
}

function frmpay_validate(){
	var checked = false;
	var egolds = document.getElementsByName(\'egold\');
	for (var i=0; i<egolds.length; i++) {
		checked = checked || egolds[i].checked;
	}
	if(!checked){
		alert("��ѡ����Ҫ�ĳ�ֵ���");
		return false;
	}
	showMask();
	displayDialog(document.getElementById(\'paydialog\').innerHTML);
}

function check_radio(){
	var o = getTarget();
	$_(o).subTag(\'input\')[0].checked = true;
}
</script>

<div id="paydialog" style="display:none;">
<div>
	<div style="padding:20px;font-size:120%;">
	�ύ�ɹ���������ҳ����ɳ�ֵ���裡
	</div>
	<div style="text-align:center;padding:20px">
		<a class="btnlink" href="'.$this->_tpl_vars['jieqi_url'].'/userdetail.php">�鿴���ʻ�</a> &nbsp;&nbsp;&nbsp;&nbsp; 
		<a class="btnlink" href="javascript:;" onclick="closeDialog();">��ҳ������ֵ</a> &nbsp;&nbsp;&nbsp;&nbsp; 
	</div>
</div>
</div>

<form name="frmalipay" method="post" action="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/yeepay.php" target="_blank" onsubmit="return frmpay_validate();">
<table class="grid" width="100%" align="center">
  <caption>�������г�ֵ</caption>
  <tr>
    <td style="font-size:14px;line-height:200%;padding:20px;">
    <div id="payselect"></div>
	</td>
  </tr>
  <tr>
    <td style="font-size:14px;line-height:200%;padding:20px;">
	<strong>��ѡ����Ҫ�ĳ�ֵ��</strong><br />
	<div style="width:100%;clear:both;margin-bottom:10px;">
	<ul class="recnTul">
	  <li onclick="check_radio();"><input type="radio" name="egold" value="1000" class="radio" checked="checked"> 1000 '.$this->_tpl_vars['egoldname'].'<span>10Ԫ</span></li>
	  <li onclick="check_radio();"><input type="radio" name="egold" value="2000" class="radio"> 2000 '.$this->_tpl_vars['egoldname'].'<span>20Ԫ</span></li>
	  <li onclick="check_radio();"><input type="radio" name="egold" value="5000" class="radio"> 5000 '.$this->_tpl_vars['egoldname'].'<span>50Ԫ</span></li>
	  <li onclick="check_radio();"><input type="radio" name="egold" value="10000" class="radio"> 10000'.$this->_tpl_vars['egoldname'].'<span>100Ԫ</span></li>
	  <li onclick="check_radio();"><input type="radio" name="egold" value="20000" class="radio"> 20000'.$this->_tpl_vars['egoldname'].'<span>200Ԫ</span></li>
	  <li onclick="check_radio();"><input type="radio" name="egold" value="50000" class="radio"> 50000'.$this->_tpl_vars['egoldname'].'<span>500Ԫ</span></li>
	</ul>
	<div class="cb"></div>
	</div>
	<input type="submit" name="Submit" value="������һ��" class="button" >
    <input type="hidden" name="action" value="pay">'.$this->_tpl_vars['jieqi_token_input'].'
    </td>
  </tr>
</table>
</form>
<div class="textbox">
<strong>˵����</strong><br />
1���������г�ֵ���һ�������<span class="hot">1</span>Ԫ=<span class="hot">100</span>'.$this->_tpl_vars['egoldname'].'<br />
2��֧�ֹ��ڸ����������߳�ֵ����Ҫ�û������п���ͨ��������֧�����ܡ�<br />
</div>
</div>
</div></div></div>';
?>