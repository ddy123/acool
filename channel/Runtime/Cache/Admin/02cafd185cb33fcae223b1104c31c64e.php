<?php if (!defined('THINK_PATH')) exit(); if($ischannel == 1): ?><!DOCTYPE html>
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
	  		</header><?php endif; ?>

<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
		<link rel="shortcut icon" href="/Public/images/favicon.ico" />
    	<title>免费读书 | <?php echo ($web_name); ?></title>
    	<!-- Tell the browser to be responsive to screen width -->
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    	<!-- Bootstrap 3.3.4 -->
    	<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    	<!-- FontAwesome 4.3.0 -->
 		<link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    	<!-- Ionicons 2.0.0 --
    	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    	<!-- Theme style -->
    	<link href="/Public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    	<!-- AdminLTE Skins. Choose a skin from the css/skins 
    	folder instead of downloading all of them to reduce the load. -->
    	<link href="/Public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    	<!-- iCheck -->
    	<link href="/Public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />   
    	<!-- jQuery 2.1.4 -->
    	<!--<script src="/Public/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
		<script src="/Public/js/jQuery-1.8.2.min.js"></script>

    	<script src="/Public/js/common.js"></script>
    	<script src="/Public/js/myFormValidate.js"></script>    
    	<script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    	<script src="/Public/js/layer/layer-min.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
    	<script src="/Public/js/myAjax.js"></script>
    	<script type="text/javascript">
    		function delfunc(obj)
    		{
    			layer.confirm('确认删除？', 
				{
    		  		btn: ['确定','取消'] //按钮
    			}, 
    			function()
    			{
    		    	// 确定
   					$.ajax(
					{
   						type : 'post',
   						url : $(obj).attr('data-url'),
   						data : {act:'del',del_id:$(obj).attr('data-id')},
   						dataType : 'json',
   						success : function(data)
   						{
	   						if(data == 1)
	   						{
	   							layer.msg('操作成功', {icon: 1});
	   							$(obj).parent().parent().remove();
	   						}
	   						else
	   						{
	   							layer.msg(data, {icon: 2,time: 2000});
	   						}
	   						layer.closeAll();
						}
   					})
    			}, 
    			function(index)
    			{
    				layer.close(index);
    				return false;// 取消œ
    			});
    		}
    
    		function selectAll(name,obj)
    		{
    			$('input[name*='+name+']').prop('checked', $(obj).checked);
    		}    
    	</script>        
	</head>
  	<body style="background-color:#ecf0f5;display:block;overflow:auto;margin:0 auto;">


<div class="wrapper">
    <?php if($ischannel != 1): ?><div class="breadcrumbs" id="breadcrumbs">
	<ol class="breadcrumb">
		<?php if(is_array($navigate_admin)): foreach($navigate_admin as $k=>$v): if($k == '后台首页'): ?><li>
	        		<!-- burn修改，2016-07-26 -->
	        		<a href="<?php echo ($v); ?>">
	        			<i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo ($k); ?>
	        		</a>
	        	</li>
	    	<?php else: ?>    
	        	<li>
	        		<!-- burn修改，2016-07-26 -->
	        		<a href="<?php echo ($v); ?>"><?php echo ($k); ?></a>
	        		<!-- <?php echo ($k); ?> -->
	        	</li><?php endif; endforeach; endif; ?>          
	</ol>
</div><?php endif; ?>

    <style>#search-form > .form-group{margin-left: 10px;}</style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php if($ischannel != 1): ?><div class="pull-right">
                    <a href="javascript:history.go(-1)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="返回">
                        <i class="fa fa-reply">
                        </i>
                    </a>
                </div><?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-list"></i>
                        <?php if($ischannel == 1): echo ($ischannelname); ?>渠道信息
                        <?php else: ?>
                            渠道列表<?php endif; ?>
                    </h3>
                </div>

                <div class="panel-body">
                    <div class="navbar navbar-default">
                        <form action="" id="search-form2" class="navbar-form form-inline" method="post" onsubmit="return false">
                            <?php if($ischannel == 1): ?><label class="control-label" for="input-order-id">结算业务于渠道管理员线下沟通进行结算，暂不提供线上结算业务！</label>
                                <input type="hidden" name="ischannel" value="<?php echo ($ischannel); ?>" >

                                <a href="<?php echo U('Admin/Channel/showChannelInfo',array('id' => $channelid));?>" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="查看详情" target="rightContent">
                                    <span>查看信息</span>
                                </a>
                            <?php else: ?>
                                <div class="form-group">
                                    <label class="control-label" for="input-order-id">关键词</label>
                                    <div class="input-group">
                                        <input type="text" name="key_word" value="" placeholder="渠道名称" id="input-order-id" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="orderby1" value="articleid" />
                                <input type="hidden" name="orderby2" value="desc" />

                                <button type="submit" onclick="ajax_get_table('search-form2',1,0)" id="button-filter search-order" class="btn btn-primary">
                                    <i class="fa fa-search"></i> 筛选
                                </button>

                                <button type="button" onclick="location.href='<?php echo U('Admin/Channel/addEditChannel',array('action' => 'add'));?>'" class="btn btn-primary pull-right">
                                    <i class="fa fa-plus"></i>添加新渠道
                                </button><?php endif; ?>
                        </form>
                    </div>
                    <div id="ajax_return"></div>
                </div>
            </div>

            <div class="panel panel-default">
                <?php if($ischannel == 1): ?><div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-list"></i>
                            <?php echo ($channel["channelname"]); ?>渠道信息
                        </h3>
                    </div><?php endif; ?>
                <div class="panel-body">
                    <?php if($ischannel == 1): ?><div class="panel-heading">
                            <h3 class="panel-title">
                                渠道充值信息
                            </h3>

                            <form action="" id="search-form2" class="navbar-form form-inline" method="post" onsubmit="return false">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="hidden" name="key_word" value="<?php echo ($channel["channelname"]); ?>" id="input-order-id" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="orderby1" value="channelid" />
                                <input type="hidden" name="orderby2" value="desc" />
                            </form>
                        </div>

                        <div id="ajax_return_paylog"></div>

                        <div class="panel-heading">
                            <h3 class="panel-title">
                                渠道用户信息
                            </h3>
                        </div>

                        <div id="ajax_return_userinfo"></div><?php endif; ?>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function()
    {
        // ajax 加载商品列表
        ajax_get_table('search-form2',1);

        ajax_get_paylog('search-form2',1);

        ajax_get_userinfo('search-form2',1);
    });

    // ajax 抓取页面 form 为表单id  page 为当前第几页
    function ajax_get_table(form,page,ischannel)
    {
        cur_page = page; //当前页面 保存为全局变量

        $.ajax(
        {
            type    : "POST",
            url     : "./index.php?m=Admin&c=Channel&a=ajaxChannelList&p="+page,
            data    : $('#' + form).serialize(),// 你的formid
            success : function(data)
            {
                $("#ajax_return").html('');

                $("#ajax_return").append(data);
            },
            error   : function(data)
            {
                alert('error -- data = ' + data.responseText);
            }
        });
    }

    // 删除操作
    function del(id)
    {
        if(!confirm('确定要删除吗?'))
        {
            return false;
        }

        $.ajax(
        {
            url     : "/index.php?m=Admin&c=Channel&a=delChannel&id="+id,
            success : function(v)
            {
                var v =  eval('('+v+')');

                if(v.hasOwnProperty('status') && (v.status == 1))
                {
                    ajax_get_table('search-form2',cur_page);
                }
                else
                {
                    layer.msg(v.msg, {icon: 2,time: 1000}); //alert(v.msg);
                }
            }
        });

        return false;
    }

    // ajax 抓取页面 form 为表单id  page 为当前第几页
    function ajax_get_paylog(form,page)
    {
        cur_page = page; //当前页面 保存为全局变量

        $.ajax(
            {
                type    : "POST",
                url     : "./index.php?m=Admin&c=User&a=ajaxChannelPayLogList&p="+page,
                data    : $('#' + form).serialize(),// 你的formid
                success : function(data)
                {
                    $("#ajax_return_paylog").html('');

                    $("#ajax_return_paylog").append(data);
                },
                error   : function(data)
                {
                    alert('error -- data = ' + data.responseText);
                }
            });
    }

    // ajax 抓取页面 form 为表单id  page 为当前第几页
    function ajax_get_userinfo(form,page)
    {
        cur_page = page; //当前页面 保存为全局变量

        $.ajax(
            {
                type    : "POST",
                url     : "./index.php?m=Admin&c=User&a=ajaxChannelUserList&p="+page,
                data    : $('#' + form).serialize(),// 你的formid
                success : function(data)
                {
                    $("#ajax_return_userinfo").html('');

                    $("#ajax_return_userinfo").append(data);
                },
                error   : function(data)
                {
                    alert('error -- data = ' + data.responseText);
                }
            });
    }
</script>
</body>
</html>