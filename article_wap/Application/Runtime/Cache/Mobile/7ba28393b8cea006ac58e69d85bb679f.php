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
                <div class="h-left">
                    <a class="sb-back" href="<?php echo U('Index/index');?>" title="返回"></a>
                </div>

                <div class="h-mid">
                    <?php echo ($site_title); ?>
                </div>
            </div>

            <section class="index_floor_lou">
                <?php if(is_array($resultbooklist)): $i = 0; $__LIST__ = $resultbooklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><div class="floor_body"  style="border-top: 0px;">
                        <div id="scroll_promotion">
                            <ul>
                                <li>
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
                                </li>
                            </ul>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </section>

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

            <a href="<?php echo U('Mobile/User/getBookCase');?>" class="gotoBookshelf">
                <img src="/Template/mobile/default/Static/images/bottom_img/bookshelf.png">
            </a>

            <a href="javascript:goTop();" class="gotop">
                <img src="/Template/mobile/default/Static/images/topup.png">
            </a>

        </div>
    </body>
</html>