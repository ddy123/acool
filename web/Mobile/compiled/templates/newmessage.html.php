<?php
echo '

<script type="text/javascript">
function frmnewmessage_validate(){
  if(typeof(document.frmnewmessage.receiver) != "undefined"){
    if(document.frmnewmessage.receiver.value == "" ){
      alert("�������ռ���");
	  document.frmnewmessage.receiver.focus();
	  return false;
    }
  }
  if(document.frmnewmessage.title.value == ""){
    alert("���������");
	window.document.frmnewmessage.title.focus();
	return false;
  }
}
</script>
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>д����Ϣ</h4>
</div>
<form name="frmnewmessage" id="frmnewmessage" action="'.$this->_tpl_vars['jieqi_url'].'/newmessage.php?do=submit" method="post" onsubmit="return frmnewmessage_validate();">
<div class="mail-zc">
<div class="phone-name">
  <h3>�ռ��ˣ�</h3>
  ';
if($this->_tpl_vars['tosys'] > 0){
echo '
  ��վ����Ա<input type="hidden" name="tosys" value="'.$this->_tpl_vars['tosys'].'" />
  ';
}else{
echo '
  <input type="text" class="text" name="receiver" size="30" value="'.$this->_tpl_vars['receiver'].'" />
  ';
}
echo '
</div>
<div class="phone-name">
  <h3>���⣺</h3>
  <input type="text" class="text" name="title" size="60" value="'.$this->_tpl_vars['title'].'" />
</div>
<div class="phone-name">
  <h3>���ݣ�</h3>
  <textarea class="textarea" name="content" >'.$this->_tpl_vars['content'].'</textarea>
</div>
<div class="ft">
	<input type="submit" class="btn btn-auto btn-blue" name="submit" value="�� ��" />
	<input type="hidden" name="act" value="add" />
	'.$this->_tpl_vars['jieqi_token_input'].'
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript">
$(function(){
		$(\'#frmnewmessage\').on(\'submit\', function(e){
		e.preventDefault();
		 var tips = layer.open({type: 2,content: \'������\'});
				GPage.postForm(\'frmnewmessage\', $("#frmnewmessage").attr("action"),
			   function(data){
					if(data.status==\'OK\'){
                        $.ajaxSetup ({ cache: false });
					    layer.close(tips);
                        openMsgs(data.msg);
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