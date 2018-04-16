<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html xmlns:wb="http://open.weibo.com/wb">
	<head>
		<meta name="Generator"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="/Public/images/favicon.ico" />
		<title>巨子中文网</title>
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
		<link rel="stylesheet" type="text/css" href="/Template/mobile/default/Static/css/public.css"/>
		<link rel="stylesheet" type="text/css" href="/Template/mobile/default/Static/css/index.css"/>

		<script type="text/javascript" src="/Template/mobile/default/Static/js/jquery.js"></script>
		<script type="text/javascript" src="/Template/mobile/default/Static/js/TouchSlide.1.1.js"></script>
		<script type="text/javascript" src="/Template/mobile/default/Static/js/jquery.json.js"></script>
		<script type="text/javascript" src="/Template/mobile/default/Static/js/touchslider.dev.js"></script>
		<script type="text/javascript" src="/Template/mobile/default/Static/js/layer.js" ></script>
		<script type="text/javascript" src="/Template/mobile/default/Static/js/common.js"></script>
		<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2673436165" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div id="page" class="showpage">
			<div>
				<div id="fake-search" class="index_search">
					<form class="index_search_mid" id ="searchForm" action="<?php echo U('Index/searchBook');?>" method="POST">
						<span data-act="submit">
							<i></i>
	  					</span>
						<input  type="text" placeholder="书名/作者名" name="key_word" />
					</form>
				</div>

				<div id="scrollimg" class="scrollimg">
					<div class="bd">
						<ul>
							<?php if(is_array($slidebannerlist)): $i = 0; $__LIST__ = $slidebannerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo ($book["url"]); ?>" >
									<img src="<?php echo ($book["bookcover"]); ?>" title="<?php echo ($book["bookid"]); ?>"width="100%"/>
									</a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>

	  				<div class="hd">
						<ul></ul>
	  				</div>
				</div>
				<!--<div class="goBookshelf">-->
					<!--<a href="<?php echo U('Mobile/User/getBookCase');?>">-->
						<!--<dt>书架</dt>-->
						<!--<dd style="color:#aaaaaa;">&nbsp;</dd>-->
					<!--</a>-->
				<!--</div>-->
				<!--<div class="home_menu">-->
					<!--<a href="<?php echo U('Mobile/User/getBookCase');?>">-->
						<!--<em></em>-->
						<!--<span>书架</span>-->
					<!--</a>-->
				<!--</div>-->
				<script type="text/javascript">
					TouchSlide(
					{
						slideCell : "#scrollimg",
						titCell   : ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
						mainCell  : ".bd ul",
						effect    : "leftLoop",
						autoPage  : true,//自动分页
						autoPlay  : true //自动播放
					});
				</script>

				<section class="index_floor_lou">
					<?php if(is_array($hotcommondbooklist)): $i = 0; $__LIST__ = $hotcommondbooklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$booklist): $mod = ($i % 2 );++$i;?><div class="floor_body">
							<h2 style="margin-top: 10px;border-bottom: 1px solid #efefef">
								<em></em>
								<?php echo ($booklist["title"]); ?>

								<div class="geng">
									<a href="<?php echo U('Index/getHotCommendBookList',array('show_id'=> $booklist['showid']));?>">
									 	更多
									</a>
									<span></span>
								</div>
							</h2>

							<div id="scroll_promotion">
								<ul>
									<?php if(is_array($booklist["booklist"])): $i = 0; $__LIST__ = $booklist["booklist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><li>
											<a href="<?php echo ($book["url"]); ?>" title="1" class="flex">
												<div class="cover">
													<img  alt="<?php echo ($book["info"]["articlename"]); ?>" src="<?php echo ($book["cover"]); ?>">

												</div>

												<div class="bInfo" id="bookintro">
													<h4 class="bookname">
														<?php echo ($book["info"]["articlename"]); ?>
													</h4>

													<p class="bookinfo" >
														<?php echo ($book["info"]["intro"]); ?>
													</p>

													<p class="bookauthor" >
														<span>
															<?php echo ($book["info"]["author"]); ?>
														</span>

														<span class="booksize">
															<?php echo ($book["info"]["size"]); ?>
														</span>

														<span class="booksort">
															<?php echo ($book["info"]["sort"]); ?>
														</span>
													</p>
												</div>
											</a>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</section>
				<!--关注微信二维码-->
				<div align="center">
					<p style="font-size:14px;color:black;">关注微信公众号: nhjuzi ，方便下次阅读</p>
					<img style="margin:20px;" src="/Template/mobile/default/Static/images/weixin.jpg" width="200" height="200" title="" />
					<p style="font-size:14px;color:black;">微信内可长按扫码识别</p>
					<p style="font-size:14px;color:black;">客服QQ：1573526519</p>
					<p style="font-size:14px;color:black;">客服电话：17316923047</p>
				</div>
				
				<a href="<?php echo U('Mobile/User/getBookCase');?>" class="gotoBookshelf">
					<img src="/Template/mobile/default/Static/images/bottom_img/bookshelf.png">
				</a>
				<a href="javascript:goTop();" class="gotop">
					<img src="/Template/mobile/default/Static/images/topup.png">
				</a>
			</div>
			<div style="height:50px; line-height:50px; clear: both; background-color: rgb(246,246,246)"></div>
<div class="v_nav">
	<div class="vf_nav">
		<ul>
			<li style="margin-top: 3px">
				<a href="<?php echo U('Index/index');?>">
					<?php if($type == 1): ?><img src="/Template/mobile/default/Static/images/bottom_img/jingxuan1@3x.png" alt="" style="width: 25px">
					<?php else: ?>
						<img src="/Template/mobile/default/Static/images/bottom_img/jingxuan2@3x.png" alt="" style="width: 25px"><?php endif; ?>
				</a>
			</li>

			<li style="margin-top: 3px">
				<a href="<?php echo U('Index/getSortList');?>">
					<?php if($type == 2): ?><img src="/Template/mobile/default/Static/images/bottom_img/fenlei1@3x.png" alt="" style="width: 25px">
					<?php else: ?>
						<img src="/Template/mobile/default/Static/images/bottom_img/fenlei2@3x.png" alt="" style="width: 25px"><?php endif; ?>
				</a>
			</li>

			<li style="margin-top: 3px">
				<a href="<?php echo U('Index/getTopicList');?>">
					<?php if($type == 3): ?><img src="/Template/mobile/default/Static/images/bottom_img/zhuanti1@3x.png" alt="" style="width: 25px">
					<?php else: ?>
						<img src="/Template/mobile/default/Static/images/bottom_img/zhuanti2@3x.png" alt="" style="width: 25px"><?php endif; ?>
				</a>
			</li>

			<li style="margin-top: 3px">
				<a href="<?php echo U('User/index');?>">
					<?php if($type == 4): ?><img src="/Template/mobile/default/Static/images/bottom_img/wode1.png" alt="" style="width: 25px">
						<?php else: ?>
						<img src="/Template/mobile/default/Static/images/bottom_img/wode.png" alt="" style="width: 25px"><?php endif; ?>
				</a>
			</li>
		</ul>
	</div>
</div> 
			<script>
				function goTop()
				{
					$('html,body').animate({'scrollTop':0},600);
				}
			</script>
			<script type="text/javascript">
				$(function()
				{
					width = document.documentElement.clientWidth - 112;

					width = 0.9 * width;

					$('.bookleft').css({width:width});

					$('#search_text').click(function()
					{
						$(".showpage").children('div').hide();
						$("#search_hide").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
					})

					$('#get_search_box').click(function()
					{
						$(".showpage").children('div').hide();
						$("#search_hide").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
					})

					$("#search_hide .close").click(function()
					{
						$(".showpage").children('div').show();
						$("#search_hide").hide();
					})

					$("[data-act=submit]").click(function()
					{
						if($("input:text[name='key_word']").val()=="")
						{
							window.alert("请输入您要查询的内容！");
						}
						else
						{
							$('#searchForm').submit();
						}
					})
				});

			</script>
		</div>
	</body>
</html>