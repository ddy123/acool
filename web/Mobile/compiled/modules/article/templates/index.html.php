<?php
echo '<?xml version="1.0" encoding="'.$this->_tpl_vars['jieqi_charset'].'"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
    <title>'.$this->_tpl_vars['article_title'].'-'.$this->_tpl_vars['sortname'].'-'.$this->_tpl_vars['jieqi_sitename'].'</title>
    <meta content="zh-cn" http-equiv="Content-Language">
    <meta name="keywords" content="'.$this->_tpl_vars['meta_keywords'].'">
	<meta name="description" content="'.truncate($this->_tpl_vars['intro'],'500','..').'">
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
    <style>
	.chapter-list h5 {
				padding: 10px 0;
				font-size: 1em;
			}
    </style>
    
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

			<h1 class="page-title">'.$this->_tpl_vars['articlename'].'</h1>
			<div class="mod block tab chapter-list">
                <div class="hd tab-switch">
                </div>

								<div class="bd">
					<h5>全部章节</h5>
								<ul class="list">

';
if (empty($this->_tpl_vars['chapterrows'])) $this->_tpl_vars['chapterrows'] = array();
elseif (!is_array($this->_tpl_vars['chapterrows'])) $this->_tpl_vars['chapterrows'] = (array)$this->_tpl_vars['chapterrows'];
$this->_tpl_vars['i']=array();
$this->_tpl_vars['i']['columns'] = 1;
$this->_tpl_vars['i']['count'] = count($this->_tpl_vars['chapterrows']);
$this->_tpl_vars['i']['addrows'] = count($this->_tpl_vars['chapterrows']) % $this->_tpl_vars['i']['columns'] == 0 ? 0 : $this->_tpl_vars['i']['columns'] - count($this->_tpl_vars['chapterrows']) % $this->_tpl_vars['i']['columns'];
$this->_tpl_vars['i']['loops'] = $this->_tpl_vars['i']['count'] + $this->_tpl_vars['i']['addrows'];
reset($this->_tpl_vars['chapterrows']);
for($this->_tpl_vars['i']['index'] = 0; $this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['loops']; $this->_tpl_vars['i']['index']++){
	$this->_tpl_vars['i']['order'] = $this->_tpl_vars['i']['index'] + 1;
	$this->_tpl_vars['i']['row'] = ceil($this->_tpl_vars['i']['order'] / $this->_tpl_vars['i']['columns']);
	$this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['order'] % $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['column'] == 0) $this->_tpl_vars['i']['column'] = $this->_tpl_vars['i']['columns'];
	if($this->_tpl_vars['i']['index'] < $this->_tpl_vars['i']['count']){
		list($this->_tpl_vars['i']['key'], $this->_tpl_vars['i']['value']) = each($this->_tpl_vars['chapterrows']);
		$this->_tpl_vars['i']['append'] = 0;
	}else{
		$this->_tpl_vars['i']['key'] = '';
		$this->_tpl_vars['i']['value'] = '';
		$this->_tpl_vars['i']['append'] = 1;
	}
	echo '
	';
if($this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptertype'] > 0){
echo '
	';
}else{
echo '
		';
if($this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['isvip'] > 0){
echo '
		<li class="" id="chapter915844" createdate="'.date('Y-m-d H:i',$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['lastupdate']).'更新，共'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['size_c'].'字，价格：'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['saleprice'].'">
		<img src="/_res/css/heiyan/img/vip.png" alt="vip">
			<a href="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['url_chapter'].'" class="isvip name">'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</a>
		</li>
		';
}else{
echo '
		<li class="" id="chapter915844" createdate="'.date('Y-m-d H:i',$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['lastupdate']).'">
			<a href="'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['url_chapter'].'" class="name">'.$this->_tpl_vars['chapterrows'][$this->_tpl_vars['i']['key']]['chaptername'].'</a>
		</li>
		';
}
echo '
	';
}
}
echo '
											</ul>
									</div>
												
							</div>
'.$this->_tpl_vars['url_jumppage'].'
<div class="mod mod-back">
				<div class="bd">
					<a href="/" class="home"></a>
					<span class="divide"></span>
					<a href="'.$this->_tpl_vars['url_articleinfo'].'">'.$this->_tpl_vars['articlename'].'</a>
				</div>
			</div>

      </div>

';
$_template_tpl_vars = $this->_tpl_vars;
 $this->_template_include(array('template_include_tpl_file' => 'tpl/footer.html', 'template_include_vars' => array()));
 $this->_tpl_vars = $_template_tpl_vars;
 unset($_template_tpl_vars);
echo ' 

<script>
$.get("/extends/api/allvisit/allvisit.php", { articleid:'.$this->_tpl_vars['article_id'].', number:1 } );
</script>
</body>
</html>';
?>