<?php
echo '<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='.$this->_tpl_vars['jieqi_charset'].'" />
<meta name="keywords" content="'.$this->_tpl_vars['meta_keywords'].'" />
<meta name="description" content="'.$this->_tpl_vars['meta_description'].'" />
<meta name="author" content="'.$this->_tpl_vars['meta_author'].'" />
<meta name="copyright" content="'.$this->_tpl_vars['meta_copyright'].'" />
<meta name="generator" content="jieqi.com" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>'.$this->_tpl_vars['jieqi_pagetitle'].'</title>
<link rel="stylesheet" href="'.$this->_tpl_vars['jieqi_themeurl'].'style.css" type="text/css" media="all" />
<!--[if lt IE 9]><script type="text/javascript" src="'.$this->_tpl_vars['jieqi_url'].'/scripts/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script type="text/javascript" src="'.$this->_tpl_vars['jieqi_url'].'/scripts/css3-mediaqueries.js"></script><![endif]--> 
<script type="text/javascript" src="'.$this->_tpl_vars['jieqi_url'].'/scripts/common.js"></script>
<script type="text/javascript" src="'.$this->_tpl_vars['jieqi_url'].'/scripts/theme.js"></script>
'.$this->_tpl_vars['jieqi_head'].'
</head>
<body>
<div class="top cf">
	<div class="main">
	<div class="fl">
	';
if($this->_tpl_vars['jieqi_userid'] == 0){
echo '
	<form name="t_frmlogin" id="t_frmlogin" method="post" action="'.$this->_tpl_vars['jieqi_user_url'].'/login.php">
	&nbsp;�û�����<input type="text" class="text t_s" size="10" maxlength="30" style="width:70px;" name="username" onKeyPress="javascript: if (event.keyCode==32) return false;">
	���룺<input type="password" class="text t_s" size="10" maxlength="30" style="width:70px;" name="password">
	<!--
	��֤�룺<input type="text" class="text t_s" size="4" maxlength="8" style="width:35px;" name="checkcode" onfocus="if($_(\'t_imgccode\').style.display == \'none\'){$_(\'t_imgccode\').src = \''.$this->_tpl_vars['jieqi_url'].'/checkcode.php\';$_(\'t_imgccode\').style.display = \'\';}" title="�����ʾ��֤��"><img id="t_imgccode" src="" style="cursor:pointer;vertical-align:middle;margin-left:3px;display:none;" onclick="this.src=\''.$this->_tpl_vars['jieqi_url'].'/checkcode.php?rand=\'+Math.random();" title="���ˢ����֤��">
	-->
	<input type="checkbox" class="checkbox" name="usecookie" value="1" />��ס
	<input type="button" class="button b_s" value="��¼" name="t_btnlogin" id="t_btnlogin" onclick="Ajax.Tip(\'t_frmlogin\', {timeout:3000, onLoading:\'��¼��...\', onComplete:\'��¼�ɹ���ҳ����ת��...\'});">
	<input type="hidden" name="act" value="login">
	<input type="hidden" name="jumpreferer" value="1">
	<!--
	<a href="'.$this->_tpl_vars['jieqi_url'].'/api/qq/login.php" rel="nofollow" target="_top"><img src="'.$this->_tpl_vars['jieqi_url'].'/images/api/qq_ico.gif" title="��QQ�˺ŵ�¼" style="border:0;vertical-align:middle;"></a>
	<a href="'.$this->_tpl_vars['jieqi_url'].'/api/weibo/login.php" rel="nofollow" target="_top"><img src="'.$this->_tpl_vars['jieqi_url'].'/images/api/weibo_ico.gif" title="������΢���˺ŵ�¼" style="border:0;vertical-align:middle;"></a>
	<a href="'.$this->_tpl_vars['jieqi_url'].'/api/taobao/login.php" rel="nofollow" target="_top"><img src="'.$this->_tpl_vars['jieqi_url'].'/images/api/taobao_ico.gif" title="���Ա��˺ŵ�¼" style="border:0;vertical-align:middle;"></a>
	-->
	</form>
	';
}else{
echo '
	<ul class="topnav">
	<li><strong>'.$this->_tpl_vars['jieqi_username'].'��</strong></li>
	<li><a href="'.$this->_tpl_vars['jieqi_url'].'/message.php?box=inbox" class="droplink"><i class="iconfont">&#xf0138;</i>��Ϣ</a>';
if($this->_tpl_vars['jieqi_newmessage'] > 0){
echo '<sup>'.$this->_tpl_vars['jieqi_newmessage'].'</sup>';
}
echo '</li>
	<li class="dropdown"><a href="'.$this->_tpl_vars['jieqi_url'].'/userdetail.php" class="droplink"><i class="iconfont">&#xf012d;</i>��Ա<b></b></a>
		<ul class="droplist">
			';
if($this->_tpl_vars['jieqi_modules']['article']['publish'] > 0){
echo '<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/bookcase.php">�ҵ����</a></li>';
}
echo '
			';
if($this->_tpl_vars['jieqi_modules']['obook']['publish'] > 0){
echo '<li><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/buylist.php">�ҵĶ���</a></li>';
}
echo '
			';
if($this->_tpl_vars['jieqi_modules']['pay']['publish'] > 0){
echo '<li><a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php">�ʻ���ֵ</a></li>';
}
echo '
			<li><a href="'.$this->_tpl_vars['jieqi_url'].'/useredit.php">�޸�����</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_user_url'].'/logout.php">�˳���¼</a></li>
		</ul>
	</li>
	';
if($this->_tpl_vars['jieqi_modules']['article']['publish'] > 0){
echo '<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/bookcase.php" class="droplink"><i class="iconfont">&#xf00b1;</i>���</a></li>';
}
echo '
	';
if($this->_tpl_vars['jieqi_modules']['pay']['publish'] > 0){
echo '<li><a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php" class="droplink"><i class="iconfont">&#xf0029;</i>��ֵ</a></li>';
}
echo '
	<li><a href="'.$this->_tpl_vars['jieqi_user_url'].'/logout.php" class="droplink"><i class="iconfont">&#xf017c;</i>�˳�</a></li>
	</ul>
	';
}
echo '
	</div>
	<div class="fr">
		';
if($this->_tpl_vars['jieqi_userid'] == 0){
echo '
		<a class="hot" href="'.$this->_tpl_vars['jieqi_user_url'].'/register.php" onclick="openDialog(\''.$this->_tpl_vars['jieqi_user_url'].'/register.php?ajax_gets=jieqi_contents\', false);stopEvent();">ע���û�</a> �� <a class="hot" href="'.$this->_tpl_vars['jieqi_user_url'].'/getpass.php" onclick="openDialog(\''.$this->_tpl_vars['jieqi_user_url'].'/getpass.php?ajax_gets=jieqi_contents\', false);stopEvent();">�������룿</a> �� 
		';
}
echo '

		<a href="'.$this->_tpl_vars['url_gb2312'].'"';
if($this->_tpl_vars['jieqi_charset'] != 'gbk'){
echo ' class="hot"';
}
echo '>�����</a> �� <a href="'.$this->_tpl_vars['url_big5'].'"';
if($this->_tpl_vars['jieqi_charset'] == 'gbk'){
echo ' class="hot"';
}
echo '>�����</a>&nbsp;&nbsp;
	</div>
	</div>
</div>

<div class="main header cf">
	<div class="row cf">
		<div class="col3 logo">
			<a href="'.$this->_tpl_vars['jieqi_url'].'/"><img src="'.$this->_tpl_vars['jieqi_themeurl'].'logo.gif" border="0" alt="'.$this->_tpl_vars['jieqi_sitename'].'" /></a>
		</div>
		<div class="col9 last banner">
			';
if($this->_tpl_vars['jieqi_banner'] == ''){
echo '
			<div style="width:340px;margin:15px auto 0 auto;text-align:left;">
			<form name="t_frmsearch" method="post" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/search.php">
			<div style="float:left;width:250px;height:20px;margin:0;padding:3px 5px 7px 5px;overflow:hidden;border:2px solid #dddddd;">
			<select name="searchtype" style="width:56px;height:20px;vertical-align:middle;margin:0;padding:0;border:0;font-size:14px;color:#017AB6;">
			<option value="all" selected="selected">�ۺ�</option>
			<option value="articlename">����</option>
			<option value="author">����</option>
			<option value="keywords">��ǩ</option>
			</select>
			<input name="searchkey" type="text" style="width:180px;height:20px;line-height:20px;margin:0 0 0 5px;padding:0;border:0;font-size:14px;">
			</div>
			<input name="t_btnsearch" type="submit" value="����" style="float:left;width:75px;height:34px;line-height:34px;text-align:center;background:#3498db;color:#ffffff;margin:0;padding:0;cursor:pointer;border:0;font-size:14px;">
			</form>
			</div>
			';
}else{
echo '
			'.$this->_tpl_vars['jieqi_banner'].'
			';
}
echo '
		</div>
	</div>
</div>

<div class="mainnav cf">
	<div class="main">
	<ul class="dropmenu">
	<li><a href="'.$this->_tpl_vars['jieqi_url'].'/">��ҳ</a></li>
	<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/articlefilter.php">���</a>
		<ul>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/articlelist.php">�����Ķ�</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/toplist.php">�� �� ��</a></li>
		</ul>
	</li>
	<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/group.php?id=1">Ƶ��</a>
		<ul>
			  <li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/group.php?id=1">����Ƶ��</a></li>
              <li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/group.php?id=2">Ů��Ƶ��</a></li>
		</ul>
	</li>
	<li><a href="'.jieqi_geturl('article','toplist','1','allvisit').'">����</a></li>
	<li><a href="'.jieqi_geturl('article','toplist','1','allvisit','','1').'">ȫ��</a></li>
	<li><a href="'.$this->_tpl_vars['jieqi_modules']['forum']['url'].'/">��̳</a>
		<ul>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['forum']['url'].'/index.php">��̳��ҳ</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['forum']['url'].'/search.php">��̳����</a></li>
		</ul>
	</li>
	<li><a href="'.$this->_tpl_vars['jieqi_modules']['pay']['url'].'/buyegold.php">��ֵ</a></li>
	<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/myarticle.php">����ר��</a>
		<ul>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/newarticle.php">����С˵</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/masterpage.php">����С˵</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/masterpage.php">�������</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/newdraft.php">�½��ݸ�</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/draft.php">����ݸ�</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_url'].'/ptopics.php?oid=self">�û�����</a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/authorpage.php">�ҵ�ר��</a></li>
		</ul>
	</li>
	</ul>
	</div>
</div>

<div class="subnav">
	<div class="main">
	<a href="'.jieqi_geturl('article','articlelist','1','1').'">���á�ħ��</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','2').'">����������</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','3').'">���С�����</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','4').'">��ʷ������</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','5').'">��Խ���ܿ�</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','6').'">��Ϸ������</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','7').'">�ƻá�����</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','8').'">ͬ�ˡ�����</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','9').'">��ᡤ��ѧ</a>|
	<a href="'.jieqi_geturl('article','articlelist','1','10').'">�ۺϡ�����</a>
	</div>
</div>

<div class="body">
<div class="main">
';
if($this->_tpl_vars['jieqi_top_bar'] != ""){
echo '<div class="row"><div class="col12">'.$this->_tpl_vars['jieqi_top_bar'].'</div></div>';
}
echo '

';
if(empty($this->_tpl_vars['jieqi_sideblocks']) == false){
echo '
	';
if(empty($this->_tpl_vars['jieqi_sideblocks']['7']) == false){
echo '
	<div class="row">
		<div class="col12">
		';
if (empty($this->_tpl_vars['jieqi_sideblocks']['7'])) $this->_tpl_vars['jieqi_sideblocks']['7'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['7'])) $this->_tpl_vars['jieqi_sideblocks']['7'] = (array)$this->_tpl_vars['jieqi_sideblocks']['7'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['7']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['7']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['7']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['7']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['7']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
		';
if($this->_tpl_vars['jieqi_sideblocks']['7'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
		<div class="block">
		<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['7'][$this->_tpl_vars['i']['key']]['title'].'</div>
		<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['7'][$this->_tpl_vars['i']['key']]['content'].'</div>
		</div>
		';
}else{
echo '
		<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['7'][$this->_tpl_vars['i']['key']]['content'].'</div>
		';
}
echo '
		';
}
echo '
		</div>
	</div>
	';
}
echo '

	';
if(empty($this->_tpl_vars['jieqi_sideblocks']['2']) == false || empty($this->_tpl_vars['jieqi_sideblocks']['3']) == false){
echo '
	<div class="row">
		<div class="col6">
			';
if (empty($this->_tpl_vars['jieqi_sideblocks']['2'])) $this->_tpl_vars['jieqi_sideblocks']['2'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['2'])) $this->_tpl_vars['jieqi_sideblocks']['2'] = (array)$this->_tpl_vars['jieqi_sideblocks']['2'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['2']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['2']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['2']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['2']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['2']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
			';
if($this->_tpl_vars['jieqi_sideblocks']['2'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
			<div class="block">
			<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['2'][$this->_tpl_vars['i']['key']]['title'].'</div>
			<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['2'][$this->_tpl_vars['i']['key']]['content'].'</div>
			</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['2'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			';
}
echo '
		</div>
		<div class="col6 last">
			';
if (empty($this->_tpl_vars['jieqi_sideblocks']['3'])) $this->_tpl_vars['jieqi_sideblocks']['3'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['3'])) $this->_tpl_vars['jieqi_sideblocks']['3'] = (array)$this->_tpl_vars['jieqi_sideblocks']['3'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['3']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['3']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['3']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['3']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['3']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
			';
if($this->_tpl_vars['jieqi_sideblocks']['3'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
			<div class="block">
			<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['3'][$this->_tpl_vars['i']['key']]['title'].'</div>
			<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['3'][$this->_tpl_vars['i']['key']]['content'].'</div>
			</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['3'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			';
}
echo '
		</div>
	</div>
	';
}
echo '

	<div class="row">
	';
if(empty($this->_tpl_vars['jieqi_sideblocks']['9']) == false){
echo '
		<div class="col2">
			';
if (empty($this->_tpl_vars['jieqi_sideblocks']['9'])) $this->_tpl_vars['jieqi_sideblocks']['9'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['9'])) $this->_tpl_vars['jieqi_sideblocks']['9'] = (array)$this->_tpl_vars['jieqi_sideblocks']['9'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['9']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['9']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['9']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['9']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['9']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
			';
if($this->_tpl_vars['jieqi_sideblocks']['9'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
			<div class="block">
			<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['9'][$this->_tpl_vars['i']['key']]['title'].'</div>
			<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['9'][$this->_tpl_vars['i']['key']]['content'].'</div>
			</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['9'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			';
}
echo '  
		</div>
		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['1']) == false){
echo '<div class="col7">';
}else{
echo '<div class="col10 last">';
}
echo '
	';
}elseif(empty($this->_tpl_vars['jieqi_sideblocks']['0']) == false){
echo '
		<div class="col3">
			';
if (empty($this->_tpl_vars['jieqi_sideblocks']['0'])) $this->_tpl_vars['jieqi_sideblocks']['0'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['0'])) $this->_tpl_vars['jieqi_sideblocks']['0'] = (array)$this->_tpl_vars['jieqi_sideblocks']['0'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['0']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['0']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['0']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['0']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['0']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
			';
if($this->_tpl_vars['jieqi_sideblocks']['0'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
			<div class="block">
			<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['0'][$this->_tpl_vars['i']['key']]['title'].'</div>
			<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['0'][$this->_tpl_vars['i']['key']]['content'].'</div>
			</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['0'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			';
}
echo '  
		</div>
		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['1']) == false){
echo '<div class="col6">';
}else{
echo '<div class="col9 last">';
}
echo '
	';
}else{
echo '
		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['1']) == false){
echo '<div class="col9">';
}else{
echo '<div class="col12">';
}
echo '
	';
}
echo '
		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['4']) == false){
echo '
			';
if (empty($this->_tpl_vars['jieqi_sideblocks']['4'])) $this->_tpl_vars['jieqi_sideblocks']['4'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['4'])) $this->_tpl_vars['jieqi_sideblocks']['4'] = (array)$this->_tpl_vars['jieqi_sideblocks']['4'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['4']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['4']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['4']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['4']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['4']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
			';
if($this->_tpl_vars['jieqi_sideblocks']['4'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
			<div class="block">
			<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['4'][$this->_tpl_vars['i']['key']]['title'].'</div>
			<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['4'][$this->_tpl_vars['i']['key']]['content'].'</div>
			</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['4'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			';
}
echo '
		';
}
echo '
		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['5']) == false){
echo '
			';
if (empty($this->_tpl_vars['jieqi_sideblocks']['5'])) $this->_tpl_vars['jieqi_sideblocks']['5'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['5'])) $this->_tpl_vars['jieqi_sideblocks']['5'] = (array)$this->_tpl_vars['jieqi_sideblocks']['5'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['5']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['5']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['5']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['5']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['5']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
			';
if($this->_tpl_vars['jieqi_sideblocks']['5'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
			<div class="block">
			<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['5'][$this->_tpl_vars['i']['key']]['title'].'</div>
			<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['5'][$this->_tpl_vars['i']['key']]['content'].'</div>
			</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['5'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			';
}
echo '
		';
}
echo '

			';
if($this->_tpl_vars['jieqi_contents'] != ""){
echo '<div id="content">'.$this->_tpl_vars['jieqi_contents'].'</div>';
}
echo '

		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['6']) == false){
echo '
			';
if (empty($this->_tpl_vars['jieqi_sideblocks']['6'])) $this->_tpl_vars['jieqi_sideblocks']['6'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['6'])) $this->_tpl_vars['jieqi_sideblocks']['6'] = (array)$this->_tpl_vars['jieqi_sideblocks']['6'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['6']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['6']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['6']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['6']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['6']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
			';
if($this->_tpl_vars['jieqi_sideblocks']['6'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
			<div class="block">
			<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['6'][$this->_tpl_vars['i']['key']]['title'].'</div>
			<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['6'][$this->_tpl_vars['i']['key']]['content'].'</div>
			</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['6'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			';
}
echo '
		';
}
echo '
		</div>

		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['1']) == false){
echo '
		<div class="col3 last">
			';
if (empty($this->_tpl_vars['jieqi_sideblocks']['1'])) $this->_tpl_vars['jieqi_sideblocks']['1'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['1'])) $this->_tpl_vars['jieqi_sideblocks']['1'] = (array)$this->_tpl_vars['jieqi_sideblocks']['1'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['1']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['1']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['1']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['1']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['1']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
			';
if($this->_tpl_vars['jieqi_sideblocks']['1'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
			<div class="block">
			<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['1'][$this->_tpl_vars['i']['key']]['title'].'</div>
			<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['1'][$this->_tpl_vars['i']['key']]['content'].'</div>
			</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['1'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			';
}
echo '
		</div>
		';
}
echo '
		<div class="cb"></div>
	</div>

	';
if(empty($this->_tpl_vars['jieqi_sideblocks']['8']) == false){
echo '
	<div class="row">
		<div class="col12">
		';
if (empty($this->_tpl_vars['jieqi_sideblocks']['8'])) $this->_tpl_vars['jieqi_sideblocks']['8'] = array();
elseif (!is_array($this->_tpl_vars['jieqi_sideblocks']['8'])) $this->_tpl_vars['jieqi_sideblocks']['8'] = (array)$this->_tpl_vars['jieqi_sideblocks']['8'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['jieqi_sideblocks']['8']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['jieqi_sideblocks']['8']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['jieqi_sideblocks']['8']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['jieqi_sideblocks']['8']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['jieqi_sideblocks']['8']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
		';
if($this->_tpl_vars['jieqi_sideblocks']['8'][$this->_tpl_vars['i']['key']]['title'] != ""){
echo '
		<div class="block">
		<div class="blocktitle">'.$this->_tpl_vars['jieqi_sideblocks']['8'][$this->_tpl_vars['i']['key']]['title'].'</div>
		<div class="blockcontent">'.$this->_tpl_vars['jieqi_sideblocks']['8'][$this->_tpl_vars['i']['key']]['content'].'</div>
		</div>
		';
}else{
echo '
		<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['8'][$this->_tpl_vars['i']['key']]['content'].'</div>
		';
}
echo '
		';
}
echo '
		</div>
	</div>
	';
}
echo '

';
}else{
echo '
	<div id="content" class="row">'.$this->_tpl_vars['jieqi_contents'].'</div>
';
}
echo '

';
if($this->_tpl_vars['jieqi_bottom_bar'] != ""){
echo '<div class="row"><div class="col12">'.$this->_tpl_vars['jieqi_bottom_bar'].'</div></div>';
}
echo '
<div class="cb"></div>
</div>
</div>

<div class="footer">
	<div class="main">
	Powered by <strong><a href="http://www.jieqi.com" target="_blank">JIEQI CMS</a></strong> &copy; 2004-2014 <a href="http://www.jieqi.com" target="_blank">�������磨jieqi.com��</a><br />
'.date('Y-m-d H:i:s',$this->_tpl_vars['jieqi_time']).', Processed in '.$this->_tpl_vars['jieqi_exetime'].' second(s).
	</div>
</div>

</body>
</html>';
?>