<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  	<head>
	    <meta charset="UTF-8"/>
	    <link rel="shortcut icon" href="/Public/images/favicon.ico" />
	    <title>免费读书 | <?php echo ($web_name); ?></title>
	    <!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!-- Bootstrap 3.3.4 -->
	    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <!-- FontAwesome 4.3.0 -->
	 	<link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <!-- Ionicons 2.0.0 --
	    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
	    <!-- Theme style -->
	    <link href="/Public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	    <link href="/Public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	    <!-- iCheck -->
	    <link href="/Public/plugins/iCheck/flat/green.css" rel="stylesheet" type="text/css" /> 
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->   
	    <!-- jQuery 2.1.4 -->
	    <script src="/Public/js/jQuery-1.8.2.min.js"></script>
	    <script src="/Public/js/common.js"></script>
	    <!-- <script src="/Public/js/upgrade.js"></script> --><!-- 升级文件的js，burn修改，不添加升级接口，2016-08-09， -->
		<script src="/Public/js/layer/layer.js"></script><!--弹窗js 参考文档 http://layer.layui.com/--> 
		<style type="text/css">
	    	#riframe{min-height:inherit !important}
	    </style>
  	</head>
  	
	<!--<body class="skin-green-light sidebar-mini"   style="<?php if($ischannel) echo 'overflow:hidden;';?> margin:0 auto;display:block">-->

	<body class="skin-green-light sidebar-mini"   style="margin:0 auto;display:block">
			<div class="wrapper">
  			<header class="main-header">
      		    <!-- Logo -->
      			<a href="<?php echo U('Home/Index/Index');?>" class="logo">
        			<!-- mini logo for sidebar mini 50x50 pixels -->
        			<span class="logo-mini">
        				<b></b>
        			</span>
        			<!-- logo for regular state and mobile devices -->
        			<img src="/Public/images/newLogo.png" width="200" height="40">
      			</a>
      			
      			<!-- Header Navbar: style can be found in header.less -->
      			<nav class="navbar navbar-static-top" role="navigation">
        			<!-- Sidebar toggle button-->

					<?php if($ischannel != 1): ?><a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
							<span class="sr-only">Toggle navigation</span>
						</a><?php endif; ?>
        		
	        		<div class="navbar-custom-menu">
	          			<ul class="nav navbar-nav">
	          				<!-- burn修改，2016-08-10，取消升级功能 -->
	          				<!-- <?php if($upgradeMsg[0] != null): ?><li>
	                  				<a href="javascript:void(0);" id="a_upgrade">
	                      				<i class="glyphicon glyphicon-upload"></i>
	                      				<span  style="color:#FF0;"><?php echo ($upgradeMsg["0"]); ?>&nbsp;</span>
	                  				</a>
	               				</li><?php endif; ?> -->

	           				<li>
								<!--<?php if($ischannel == 1): ?>-->
								<!--<a href="<?php echo U('Channel/index');?>" target="_blank">-->
									<!--<i class="glyphicon glyphicon-home"></i>-->
									<!--<span>网站前台+<?php echo ($ischannel); ?></span>-->
								<!--</a>-->
								<!--<?php else: ?>-->
									<!--<a href="<?php echo ($web_domain_url); ?>" target="_blank">-->
										<!--<i class="glyphicon glyphicon-home"></i>-->
										<!--<span>网站前台&#45;&#45;<?php echo ($ischannel); ?></span>-->
									<!--</a>-->
								<!--<?php endif; ?>-->
	           				</li>

							<?php if($ischannel != 1): ?><li>
									<a target="_blank" onclick="clean()">
										<i class="glyphicon glyphicon glyphicon-refresh"></i>
										<span>清除缓存</span>
									</a>
								</li><?php endif; ?>

							<?php if($ischannel != 1): ?><li class="dropdown user user-menu">
									<a href="#" class="dropdown-toggle" id="user_name" data-toggle="dropdown">
										<!--  <img src="/Public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
										<i class="glyphicon glyphicon-user"></i>
										<span class="hidden-xs">欢迎：<?php echo ($admin_info["name"]); ?></span>
									</a>

									<ul class="dropdown-menu" id="user_option" style="display:none;width: 192px">
										<li class="user-footer" >
											<div class="pull-left">
												<a href="javascript:void(0)" data-url="<?php echo U('Index/map');?>" class="btn btn-default btn-flat model-map">网站地图</a>


												<a href="<?php echo U('Admin/logout');?>" class="btn btn-default btn-flat">安全退出</a>
											</div>
										</li>
									</ul>
								</li>
							<?php else: ?>
								<li class="dropdown user user-menu">
									<a class="dropdown-toggle" id="user_name" data-toggle="dropdown">
										<!--  <img src="/Public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
										<i class="glyphicon glyphicon-user"></i>
										<span class="hidden-xs">欢迎：<?php echo ($admin_info["name"]); ?></span>
									</a>
								</li>

								<li>
									<a data-toggle="control-sidebar" href="<?php echo U('Admin/logout');?>" >
										<i class="fa fa-street-view"></i>
										安全退出
									</a>
								</li><?php endif; ?>

							<?php if($ischannel != 1): ?><!-- Control Sidebar Toggle Button -->
								<li>
									<a href="#" data-toggle="control-sidebar">
										<i class="fa fa-street-view"></i>换肤
									</a>
								</li><?php endif; ?>
	          			</ul>
	        		</div>
	     		</nav>
	     		<script>
	     			$(function()
					{
	     				$('#user_name').mouseover(function() 
	     				{
	     					$('#user_option').show();
	     				});
	     				
	     				$('#user_name').mouseout(function() 
	    	     		{
	    	     			$('#user_option').hide();
	    				});
	     					
	   					$('#user_option').mouseover(function()
	         			{
		     	     	   	$('#user_option').show();
	     	       		});
	     					
	     				$('#user_option').mouseout(function()
	     			    {
	     	     			$('#user_option').hide();
	     	     		});
	     			})

					function clean()
					{
						var url = "<?php echo U('Index/clean');?>";

                        $.ajax(
						{
							type    : "GET",
							url     : url,
							success : function(data)
							{
								alert(data);
							},
							error   : function(data)
							{
								alert('error -- data = ' + data.responseText);
							}
						});
                    }
	     		</script>
	  		</header>
<aside class="main-sidebar"   style="overflow:auto;margin:0 auto;display:block" >
	<section class="sidebar">
        <ul class="sidebar-menu">
			<?php if(is_array($menu_list)): foreach($menu_list as $k=>$vo): ?><li class="treeview">
					<a href="javascript:void(0)">
	              		<i class="fa <?php echo ($vo["icon"]); ?>"></i>
	              		<span><?php echo ($vo["title"]); ?></span>
	              		<i class="fa fa-angle-left pull-right"></i>
	            	</a>

	            	<ul class="treeview-menu">
	            		<?php if(is_array($vo["submenu"])): foreach($vo["submenu"] as $kk=>$vv): ?><li onclick="makecss(this,<?php echo ($vv["mod_id"]); ?>)" id="menu_<?php echo ($vv["mod_id"]); ?>">
	            				<a href="<?php echo ($vv["url"]); ?>" target='rightContent'>
		            				<i class="fa fa-circle-o"></i><?php echo ($vv["title"]); ?>
	            				</a>
	            			</li><?php endforeach; endif; ?>
	            	</ul>
        		</li><?php endforeach; endif; ?>     
		</ul>
	</section>
</aside>

<section class="content-wrapper right-side" id="riframe" style="margin:0px auto;padding:0px;margin-left:230px;">
    <iframe id='rightContent' name='rightContent' src="<?php echo U('Admin/Index/welcome');?>" width='100%'  height='100%' frameborder="0"></iframe>
</section>

			<footer class="main-footer">
			</footer>

     		<!-- Control Sidebar -->
     		<aside class="control-sidebar control-sidebar-dark">
       			<!-- Create the tabs -->
				<!--<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		         	<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-at"></i></a></li>
		         	<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
				</ul>-->
		       
       			<!-- Tab panes -->
       			<div class="tab-content">
	      			<!-- Home tab content -->
	         		<div class="tab-pane" id="control-sidebar-home-tab">
	         		</div><!-- /.tab-pane -->
	         		<!-- Stats tab content -->
         			<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
         			<!-- Settings tab content -->
         			<div class="tab-pane" id="control-sidebar-settings-tab">
         			</div>
       			</div>
     		</aside>
   			<div class="control-sidebar-bg"></div>
		</div>

		<script src="/Public/js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/Public/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="/Public/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
		<script src="/Public/dist/js/app.js" type="text/javascript"></script>
		<script src="/Public/dist/js/demo.js" type="text/javascript"></script>
 
		<script type="text/javascript">
			$(document).ready(function()
			{
				$("#riframe").height($(window).height()-100);//浏览器当前窗口可视区域高度
				$("#rightContent").height($(window).height()-100);
				$('.main-sidebar').height($(window).height()-50);
			});

			var tmpmenu = 1;

			function makecss(obj,mod_id)
			{
				$('#menu_'+tmpmenu).removeClass('active');
				$(obj).addClass('active');
				tmpmenu = mod_id;
			}

			$('.model-map').click(function()
			{
    			var url = $(this).attr('data-url');
    			
    			layer.open(
    			{
        			type: 2,
        			title: '网站地图',
        			shadeClose: true,
        			shade: 0.8,
        			area: ['70%', '60%'],
        			content: url, 
    			});
			});

			function callUrl(url)
			{
				layer.closeAll('iframe');
				rightContent.location.href = url;
			}
		</script>
	</body>
</html>