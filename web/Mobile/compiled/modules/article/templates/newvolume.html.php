<?php
echo '
<script type="text/javascript">
function frmnewvolume_validate(){
  if(document.frmnewvolume.chaptername.value == ""){
    alert("请输入新增分卷");
    document.frmnewvolume.chaptername.focus();
    return false;
  }
}
</script>
<div class="container">
	<div class="mod block form">
		<div class="hd">
			<h4>增加分卷</h4>
</div>
<form name="frmnewvolume" id="frmnewvolume" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/newvolume.php?do=submit" method="post" onsubmit="return frmnewvolume_validate();">
<div class="mail-zc">
<div class="phone-name"> 
  <h3>小说名称：</h3>
  <a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/articlemanage.php?id='.$this->_tpl_vars['articleid'].'">'.$this->_tpl_vars['articlename'].'</a>
</div>
<div class="phone-name"> 
  <h3>现有分卷：</h3>

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
  '.$this->_tpl_vars['volumerows'][$this->_tpl_vars['i']['key']]['chaptername'].'<br />
  ';
}
echo '

</div>
<div class="phone-name"> 
  <h3>新增分卷：</h3>
  <input type="text" class="text" name="chaptername" id="chaptername" size="50" maxlength="50" value="" />
</div>
<div class="ft">
  <input type="hidden" name="act" value="newvolume" />'.$this->_tpl_vars['jieqi_token_input'].'
  <input type="hidden" name="aid" value="'.$this->_tpl_vars['articleid'].'" />
  <input type="submit" class="btn btn-auto btn-blue" name="submit" value="提 交" />
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript">
$(function(){
		$(\'#frmnewvolume\').on(\'submit\', function(e){
		e.preventDefault();
		 var tips = layer.open({type: 2,content: \'加载中\'});
				GPage.postForm(\'frmnewvolume\', $("#frmnewvolume").attr("action"),
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