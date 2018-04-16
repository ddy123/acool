<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
    <head>
        <meta name="Generator"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="/Public/images/favicon.ico" />
        <title><?php echo ($site_title); ?></title>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <link rel="stylesheet" type="text/css" href="/Template/mobile/default/Static/css/public.css"/>
        <link rel="stylesheet" type="text/css" href="/Template/mobile/default/Static/css/index.css"/>

        <link rel="stylesheet" type="text/css" href="/Template/mobile/default/Static/css/category_list.css"/>

        <script type="text/javascript" src="/Template/mobile/default/Static/js/jquery.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/TouchSlide.1.1.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/jquery.json.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/touchslider.dev.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/layer.js" ></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/common.js"></script>
    </head>

    <body>
        <div id="page" class="showpage">
            <div class="header">
                <div class="h-mid" style="width: 100%">
                    <?php echo ($site_title); ?>
                </div>
            </div>

            <section class="index_floor_lou" >
                <?php if(is_array($resultbooklist)): foreach($resultbooklist as $key=>$value): ?><div class="floor_body"  style="border-top: 0px;">
                        <div id="scroll_promotion">
                            <a href="<?php echo U('Index/getBookListFromSortID',array('sort_id'=> $key));?>" title="1">
                                <ul>
                                    <li style="margin-top: 10px;">

                                        <div class="left">
                                            <img width="80px" height="112px" alt="<?php echo ($value["sortname"]); ?>" src="<?php echo ($value["cover"]); ?>">
                                        </div>

                                        <div class="bookleft" id="bookintro">
                                            <h4 class="bookname" style="padding-top: 10%">
                                                <?php echo ($value["sortname"]); ?>
                                            </h4>
                                        </div>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div><?php endforeach; endif; ?>
            </section>

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
                $(function()
                {
                    width = document.documentElement.clientWidth - 112;

                    width = 0.9 * width;

                    $('.bookleft').css({width:width});
                });

                function goTop()
                {
                    $('html,body').animate({'scrollTop':0},600);
                }
            </script>

            <a href="javascript:goTop();" class="gotop">
                <img src="/Template/mobile/default/Static/images/topup.png">
            </a>

        </div>
    </body>
</html>