<?php
echo '<?xml version="1.0" encoding="'.$this->_tpl_vars['jieqi_charset'].'"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
    <title>'.$this->_tpl_vars['jieqi_pagetitle'].'</title>
    <meta content="zh-cn" http-equiv="Content-Language">
    <meta name="keywords" content="'.$this->_tpl_vars['meta_keywords'].'">
	<meta name="description" content="'.$this->_tpl_vars['meta_description'].'">
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset='.$this->_tpl_vars['jieqi_charset'].'" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
    <meta name="format-detection" content="telephone=no" />
	<link rel="shortcut  icon" href="'.$this->_tpl_vars['jieqi_url'].'/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/_res/css/heiyan/mobile/base.css?bust=20151021003" media="all" />
    <link rel="stylesheet" href="/_res/components/swiper/dist/css/swiper.min.css?1" media="all" />
	<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="/_res/layer/jquery.js"></script>
	<script type="text/javascript" src="/_res/layer/layer.m.js"></script>
    <script type="text/javascript" src="/_res/layer/bootstrap.min.js"></script>
    <script type="text/javascript" src="/_res/layer/pagewap.js"></script>
        
    <script type="text/javascript">
        var _Profile = {
            id: "0",
            type: "basic",
            icon: "",
		    name: \'\',
		    site: "'.str_replace('http://','',$this->_tpl_vars['jieqi_url']).'"
	    }
        var _inlineCodes = [];
        var _inlineRun = function (fn) {
            _inlineCodes.push(fn);
        };
        var isLogin = false;
		   ';
if($this->_tpl_vars['jieqi_userid'] > 0){
echo 'isLogin = true;';
}
echo '

		
		function checkLogin(){
			if(!isLogin){
				//alert("请先登录");
				location.href="'.$this->_tpl_vars['jieqi_url'].'/login.php";
			}
			return isLogin;
		}
		
    </script>
    </head>
';
$_template_tpl_vars = $this->_tpl_vars;
 $this->_template_include(array('template_include_tpl_file' => 'tpl/header.html', 'template_include_vars' => array()));
 $this->_tpl_vars = $_template_tpl_vars;
 unset($_template_tpl_vars);
echo ' 
      <div class="container">

';
if($this->_tpl_vars['jieqi_top_bar'] != ""){
echo '<div class="row"><div class="col12">'.$this->_tpl_vars['jieqi_top_bar'].'</div></div>';
}
echo '

';
if(empty($this->_tpl_vars['jieqi_sideblocks']) == false){
echo '
<div class="container">
				<div class="container-bd">
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
}
echo '
	';
}else{
echo '
		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['1']) == false){
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
		<div class="c-left">
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
           <h1 class="page-title">
			<i class="icon icon-rank"></i>'.$this->_tpl_vars['jieqi_sideblocks']['5'][$this->_tpl_vars['i']['key']]['title'].'</h1>
           <div data-collect-id="2550" class="mod mod-clean pattern-update-list">
							<div class="bd">
                             '.$this->_tpl_vars['jieqi_sideblocks']['5'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}else{
echo '
			<div class="blockc">'.$this->_tpl_vars['jieqi_sideblocks']['5'][$this->_tpl_vars['i']['key']]['content'].'</div>
			';
}
echo '
			</div>
</div>

			';
}
echo '
		';
}
echo '

			';
if($this->_tpl_vars['jieqi_contents'] != ""){
echo '<div class="c-left">'.$this->_tpl_vars['jieqi_contents'].'</div>';
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
		

		';
if(empty($this->_tpl_vars['jieqi_sideblocks']['1']) == false){
echo '
		<div class="c-right">
						<div class="mod mod-block sidebar-menu">
							<div class="hd"> 
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
			<h5><span>'.$this->_tpl_vars['jieqi_sideblocks']['1'][$this->_tpl_vars['i']['key']]['title'].'</span></h5>
			</div>
							<div class="bd">
								<ul>'.$this->_tpl_vars['jieqi_sideblocks']['1'][$this->_tpl_vars['i']['key']]['content'].'</ul>

			';
}else{
echo '
			</div>
							<div class="bd">
								<ul>'.$this->_tpl_vars['jieqi_sideblocks']['1'][$this->_tpl_vars['i']['key']]['content'].'</ul>
			';
}
echo '
			';
}
echo '
			</div>
						</div>
					</div>
		';
}
echo '
		

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
</div>
</div>
';
}else{
echo $this->_tpl_vars['jieqi_contents'];
}
echo '

';
if($this->_tpl_vars['jieqi_bottom_bar'] != ""){
echo '<div class="row"><div class="col12">'.$this->_tpl_vars['jieqi_bottom_bar'].'</div></div>';
}
echo '

</div>

';
$_template_tpl_vars = $this->_tpl_vars;
 $this->_template_include(array('template_include_tpl_file' => 'tpl/footer.html', 'template_include_vars' => array()));
 $this->_tpl_vars = $_template_tpl_vars;
 unset($_template_tpl_vars);
echo ' 
</body>
</html>';
?>