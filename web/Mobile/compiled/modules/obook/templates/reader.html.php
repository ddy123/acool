<?php
echo '<?xml version="1.0" encoding="'.$this->_tpl_vars['jieqi_charset'].'"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
    <title>'.$this->_tpl_vars['articlename'].'-'.$this->_tpl_vars['chaptername'].'-'.$this->_tpl_vars['author'].'-'.$this->_tpl_vars['sort'].'-'.$this->_tpl_vars['jieqi_sitename'].'</title>
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
	<script type="text/javascript" src="/_res/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="/_res/layer/layer.m.js"></script>
    <script type="text/javascript" src="/_res/layer/bootstrap.min.js"></script>
    <script type="text/javascript" src="/_res/layer/pagewap.js"></script>
    <style>
			
	.share_hint {
    width: 100%;
    height: 100%;
    display: block;
    text-align: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 120;
    background-color: rgba(0,0,0,0.8);
}

.share_hint img {
    display: inline-block;
    width: 100%;
    max-width: 640px;
}
	
    .chapter .mod-page .page-content {
        display: block;
    }

    .collected {
            color:red;
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
 $this->_template_include(array('template_include_tpl_file' => 'tpl/header2.html', 'template_include_vars' => array()));
 $this->_tpl_vars = $_template_tpl_vars;
 unset($_template_tpl_vars);
echo ' 
      <div class="container">
	  
	  <div class="mod mod-back breadcrumb">
				<div class="bd">
					<a href="/" class="home"></a>
					<span class="divide"></span>
					<a href="'.jieqi_geturl('article','article',$this->_tpl_vars['articleid'],'info').'">'.$this->_tpl_vars['articlename'].'</a>
					<span class="divide"></span>
					<a href="'.$this->_tpl_vars['url_index'].'">章节目录</a>
				</div>
			</div>
			<h1 class="page-title">'.$this->_tpl_vars['chaptername'].'</h1>
			<div class="mod mod-page" 
				id="ChapterView"
				data-already-grab=""
				data-hongbao="-1"
			>
				<div class="hd">
					<div class="config">
                        <span class="night"><a href="javascript:;" class="szbut_a" data-act="read_mode"><i></i></a></span>
						<span><a href="javascript:;" data-act="read_act" data-name="plus">+A</a></span>
						<span><a href="javascript:;" data-act="read_act" data-name="less">-A</a></span>
					</div>
					<span class="time">时间：'.date('Y-m-d H:i',$this->_tpl_vars['chaptertime']).'</span>
					<span class="words">字数：'.$this->_tpl_vars['chaptersize_c'].'</span>
				</div>
				<div class="bd">
					<div class="page-content" data-act="read_content">
<p>'.$this->_tpl_vars['jieqi_content'].'</p>
					</div>
				</div>
				
				
			</div>
				
			
			<div class="mod page-control">
				<div class="bd">


					<a href="'.$this->_tpl_vars['url_preview'].'" class="prev"><span><</span>上一章</a>
                    					<a href="'.$this->_tpl_vars['url_next'].'" class="next">下一章<span>></span></a>
					</div>


			</div>

			<div class="chapter_tools">
			<ul>
			<li><a href="javascript:;"  onclick="GPage.addbook(\''.$this->_tpl_vars['jieqi_modules']['article']['url'].'/addbookcase.php?bid='.$this->_tpl_vars['articleid'].'&cid='.$this->_tpl_vars['cid'].'\',\'addbook\');" id="addbook" ><i></i><span id="favtext">书签</span></a></li>
			<li><a href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/addreward.php?id='.$this->_tpl_vars['articleid'].'"><i class="reward"></i>打赏</a></li>
			<li><a href="'.jieqi_geturl('article','article',$this->_tpl_vars['articleid'],'info').'#btn_pcontent"><i class="reply"></i>评论</a></li>
			</ul>
			<div class="clear"></div>
			</div>
			
			
			<div class="mod mod-back">
				<div class="bd">
					<a href="/" class="home"></a>
					<span class="divide"></span>
					<a href="'.jieqi_geturl('article','article',$this->_tpl_vars['articleid'],'info').'">'.$this->_tpl_vars['articlename'].'</a>
					<span class="divide"></span>
					<a href="'.$this->_tpl_vars['url_index'].'">章节目录</a>
				</div>
			</div>

<a href="javascript:void(0);" id="share_hint" class="share_hint zarkfx_toggle" style="display: none;">
    <img src="/_res/img/tips.png">
</a>




      </div>


';
$_template_tpl_vars = $this->_tpl_vars;
 $this->_template_include(array('template_include_tpl_file' => 'tpl/footer.html', 'template_include_vars' => array()));
 $this->_tpl_vars = $_template_tpl_vars;
 unset($_template_tpl_vars);
echo ' 
<script type="text/javascript">
$(function() {
    //当点击跳转链接后，回到页面顶部位置
    $("#backtop").click(function(){
        	$(\'body,html\').animate({scrollTop:0},1000);
        	return false;
    });
	// 阅读页面设置
	var _content = $("[data-act=read_content]");
	// 文字样式
	$("[data-act=read_act]").live(\'click\', function(event) {
		var _mod = $(this).attr("data-name");
		var _cont_size = $("[data-act=read_content]").children("p:first").css("font-size");
		var _cont_marg = $("[data-act=read_content]").children("p:first").css("margin");
		var _change = 4;
		if (\'plus\' === _mod) {
			var _last_size = parseInt(_cont_size)+_change;
			var _chan_marg = parseInt(_cont_marg)+_change;
			if (_last_size>=36){
				_last_size=36;
				_chan_marg=20;
			}
		} else {
			var _last_size = parseInt(_cont_size)-_change;
			var _chan_marg = parseInt(_cont_marg)-_change;
			if (_last_size<=16){
				_last_size=16
				_chan_marg=8;
			}
		}
		// 设置行高和段间距
		var _last_lh = _last_size + _change*2;
//		alert(_last_pm);
		_content.children("p").css({"font-size":_last_size + "px","line-height":_last_lh + "px","margin":_chan_marg + "px 0"});
		var _read_str = \'{\\"fs\\":\\"\'+_last_size + \'\\",\\"lh\\":\\"\'+_last_lh + \'\\",\\"pm\\":\\"\' +_chan_marg + \'\\"}\';
//		_read_str = eval("("+_read_str+")");
//		console.log(_read_str);
		$.cookie(\'shuhai_read_fs\',_read_str,{expires:30,path:"/"});
	});
	// 夜间模式
	$("[data-act=read_mode]").live(\'click\', function(event) {
		var _this_cont = $("[data-con=read_cont]");
		_this_cont.toggleClass("night");
		var _color={"bodybg":"#eaeaea","bodybgn":"#1f1c1d","conn":"#353434","conan":"#ffffff","con":"#ffffff","cona":"#0068b7"};
		var _read_str="";
		if(_this_cont.hasClass("night")){
//			$("body").css("background",_color.bodybgn);
//			$(".container").css("background",_color.conn);
//			$(".container a").css("color",_color.conan);
			_read_str = \'{\\"bodybg\\":\\"\'+_color.bodybgn + \'\\",\\"con\\":\\"\'+_color.conn + \'\\",\\"cona\\":\\"\'+_color.conan + \'\\",\\"mode\\":\\"night\\"}\';
		}else{
//			$("body").css("background",_color.bodybg);
//			$(".container").css("background",_color.con);
//			$(".container a").css("color",_color.cona);
			_read_str = \'{\\"bodybg\\":\\"\'+_color.bodybg + \'\\",\\"con\\":\\"\'+_color.con + \'\\",\\"conan\\":\\"\'+_color.cona + \'\\",\\"mode\\":\\"day\\"}\';
		}
//		_read_str = eval("("+_read_str+")");
//		console.log(_read_str.bodybg);
		$.cookie(\'shuhai_read_mod\',_read_str,{expires:30,path:"/"});
	})
	readInit();
	function readInit(){
		if($.cookie("shuhai_read_fs")){
			var _fsObj=$.cookie("shuhai_read_fs");
//			console.log(_fsObj);
			_fsObj = eval("("+_fsObj+")");
//			console.log(_fsObj.lh);
			$("[data-act=read_content]").children("p").css({"font-size":_fsObj.fs + "px","line-height":_fsObj.lh + "px","margin":_fsObj.pm + "px 0"});
		}
		if($.cookie("shuhai_read_mod")){
			var _modObj=$.cookie("shuhai_read_mod");
			_modObj = eval("("+_modObj+")");
			$("[data-con=read_cont]").toggleClass(_modObj.mode);
//			$("body").css("background",_modObj.bodybg);
//			$(".content").css("background",_modObj.con);
//			$(".content a").css("color",_modObj.cona);
		}
	}
})
</script>
<script language="JavaScript">
var preview_page = "'.$this->_tpl_vars['url_preview'].'";
var next_page = "'.$this->_tpl_vars['url_next'].'";
var index_page = "'.$this->_tpl_vars['url_index'].'";
var article_id = "'.$this->_tpl_vars['articleid'].'";
var chapter_id = "'.$this->_tpl_vars['chapterid'].'";

function jumpPage() {
  var event = document.all ? window.event : arguments[0];
  if (event.keyCode == 37) document.location = preview_page;
  if (event.keyCode == 39) document.location = next_page;
  if (event.keyCode == 13) document.location = index_page;
}
document.onkeydown=jumpPage;

  $(function(){
   var art_tit = "'.$this->_tpl_vars['articlename'].'";
   var chp_tit = "'.$this->_tpl_vars['chaptername'].'"
   var chp_url = document.URL;
   var art_url = "'.jieqi_geturl('article','chapter',$this->_tpl_vars['cid'],$this->_tpl_vars['articleid'],'1').'";
   var history;
   var json="[";
   var json1;
   var canAdd= true;
   if(!$.cookie("history")){
    history = $.cookie("history","[{art_tit:\\""+art_tit+"\\""+",art_url:\\""+art_url+"\\""+",chp_tit:\\""+chp_tit+"\\""+",chp_url:\\""+chp_url+"\\"}]",{expires:1, path: \'/\'});
   }else {
    history = $.cookie("history");
    json1 = eval("("+history+")");
    $(json1).each(function(){
     if(this.art_tit==art_tit&&this.chp_tit==chp_tit){
      canAdd=false;
      return false;
     }
    })
    if(canAdd){
     $(json1).each(function(){
	 if(this.art_tit!=art_tit){
      json = json + "{\\"art_tit\\":\\""+this.art_tit+"\\",\\"art_url\\":\\""+this.art_url+"\\",\\"chp_tit\\":\\""+this.chp_tit+"\\",\\"chp_url\\":\\""+this.chp_url+"\\"},";
	  }
     })
     json = json + "{\\"art_tit\\":\\""+art_tit+"\\",\\"art_url\\":\\""+art_url+"\\",\\"chp_tit\\":\\""+chp_tit+"\\",\\"chp_url\\":\\""+chp_url+"\\"}]";
     $.cookie("history",json,{expires:1, path: \'/\'});
    }
   }
  });
  
</script>
<script type="text/javascript">
function getx(e){ 
  var l=e.offsetLeft; 
  
  while(e=e.offsetParent){ 
    l+=e.offsetLeft; 
  } 
  return(l+\'px\'); 
} 
function gety(e){ 
  var l=e.offsetTop; 
  while(e=e.offsetParent){ 
    l+=e.offsetTop; 
  } 
  return(l+\'px\'); 
} 
function showfront(){
  var frontdiv=document.getElementById(\'frontdiv\');
  var frontimage=document.getElementById(\'frontimage\');
  var obookimage=document.getElementById(\'obookimage1\');
  var loadinginfo=document.getElementById(\'loadinginfo\');
  loadinginfo.style.visibility=\'hidden\';
  frontdiv.style.left=getx(obookimage);
  frontdiv.style.top=gety(obookimage);
  frontimage.width=obookimage.width;
  frontimage.height=obookimage.height;
}

</script>
<noscript><iframe src="*.html"></iframe></noscript>
</body>
</html>';
?>