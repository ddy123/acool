<?php
echo '<?xml version="1.0" encoding="'.$this->_tpl_vars['jieqi_charset'].'"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
    <title>'.$this->_tpl_vars['jieqi_pagetitle'].'</title>
	<meta property="qc:admins" content="006307612271607" />
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

		
		function checkLogin()
                        {
			if(!isLogin)
                                    {
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
        

<form action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/search.php" class="search-form" method="post">
	<table>
		<tbody><tr>
			<td><input type="text" name="searchkey" placeholder="搜小说、搜作者" class="text-border vm" value=""></td>
			<td width="8"></td>
			<td width="70">
			<input type="hidden" name="searchtype" value="all" />
			<input type="submit" style="background-Color:#D94600;border:1px solid #ccc;color:#fff;height:31px" class="btn btn-auto" value="搜索">
			</td>
		</tr>
	</tbody></table> 
	
	</form>

<div class="mod  three-pic" boxid="ruochuMobile20_0">
						'.$this->_tpl_vars['jieqi_pageblocks']['1']['content'].'
</div>

<div style="clear:both;height:15px;"></div>
	<div class="mod block tab recommend">
		<div class="hd c3">
			<span index="0" class="item active">现言精选</span>
			<span index="1"class="item">古言精选</span>
			<span index="2" class="item">灵异精选</span>
		</div>
		<div class="bd">
			<ul class="item lists" style="">'.$this->_tpl_vars['jieqi_pageblocks']['243']['content'].'
			</ul>
			<ul class="item lists" style="display: none"">'.$this->_tpl_vars['jieqi_pageblocks']['253']['content'].'
			</ul>
			<ul class="item lists" style="display: none">'.$this->_tpl_vars['jieqi_pageblocks']['263']['content'].'
			</ul>
		</div>
	</div>	
		<div class="mod block recommend">
					<div class="hd" boxid="heiyanMobileIndexRemen">
						<h4>热门推荐</h4>
					</div>
					<div class="bd">
						<ul class="list">
							'.$this->_tpl_vars['jieqi_pageblocks']['200']['content'].'
								</ul>
					</div>
				</div>

	<div class="mod block">
					<div class="hd" boxid="heiyanHomeLizhi">
						<h4>精品专区</h4>
					</div>
					<div class="bd">
						<div class="column-list">
							<ul class="list">
								'.$this->_tpl_vars['jieqi_pageblocks']['201']['content'].'
								</ul>
						</div>
					</div>
				</div>	

<div class="mod block recommend">
					<div class="hd" boxid="heiyanMobileIndexShangjia">
						<h4>完本畅销</h4>
					</div>
					<div class="bd">
						<ul class="list">
							'.$this->_tpl_vars['jieqi_pageblocks']['202']['content'].'
								</ul>
					</div>
				</div>
<!-- <div class="mod block">
					<div class="hd" boxid="heiyanMobileIndexRexiao">
						<h4>热销佳作</h4>
					</div>
					<div class="bd">
						<div class="column-list">
							<ul class="list">
								'.$this->_tpl_vars['jieqi_pageblocks']['203']['content'].'
								</ul>
						</div>
					</div>
				</div> --> 




<div class="mod block">
					<div class="hd" boxid="heiyanMobileIndexXinshu">
						<h4>豪门总裁</h4>
					</div>
					<div class="bd">
						<div class="column-list">
							<ul class="list">
								'.$this->_tpl_vars['jieqi_pageblocks']['205']['content'].'
								</ul>
						</div>
					</div>
				</div>


<div class="mod block recommend">
					<div class="hd" boxid="heiyanMobileIndexShangjia">
						<h4>潜力新书</h4>
					</div>
					<div class="bd">
						<ul class="list">
							'.$this->_tpl_vars['jieqi_pageblocks']['204']['content'].'
								</ul>
					</div>
				</div>    



<div class="mod block">
					<div class="hd" boxid="heiyanMobileIndexWanben">
						<h4>灵异悬疑</h4>
					</div>
					<div class="bd">
						<div class="column-list">
							<ul class="list">
'.$this->_tpl_vars['jieqi_pageblocks']['206']['content'].'
								</ul>
						</div>
					</div>
				</div>


<div class="mod block rank-switch">
				<div class="hd tab-switch">
					<span index="0" class="item active">追书榜</span>
							<span index="1" class="item">打赏榜</span>
							<span index="2" class="item">热销榜</span>
							</div>
				<div class="bd">
					<ul class="list">
            '.$this->_tpl_vars['jieqi_pageblocks']['231']['content'].'
									</ul>
							<ul class="list" style="display: none;">
            '.$this->_tpl_vars['jieqi_pageblocks']['232']['content'].'
									</ul>
							<ul class="list" style="display: block;">
            '.$this->_tpl_vars['jieqi_pageblocks']['233']['content'].'
									</ul>
							</div>
			</div>




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