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
                    <a class="sb-back" href="javascript:history.back(-1);" title="返回" target="_self">
                    </a>
                </div>

                <div class="h-mid">
                    目录
                </div>
            </div>

            <section class="index_floor_lou" >
                <div class="touchweb-com_searchListBox openList" id="chapter_list">
                    <?php if(empty($chapterlist)): ?><p class="goods_title">抱歉暂时没有相关结果！</p>
                    <?php else: ?>
                        <?php if(is_array($chapterlist)): foreach($chapterlist as $key=>$value): if($value['size'] != 0): ?><a href="<?php echo U('Article/readChapter',array('chapter_id' => $value['chapterid'],'book_id' => $bookid));?>" >
                                    <div style="padding-left: 20px;font-size: 14px;padding-top: 10px;padding-bottom: 10px;line-height: 24px;border-top: 1px solid #efefef;border-bottom: 1px solid #efefef;text-align: left" >
                                        <?php echo ($value["chaptername"]); ?>
                                        <span style="float: right;padding-right: 20px">
                                            <?php if($value['isvip'] == 1): ?><img width="15px"   src="/Template/mobile/default/Static/images/bottom_img/jiasuo.png"><?php endif; ?>
                                        </span>
                                    </div>
                                </a>
                            <?php else: ?>
                                <div style="padding-left: 20px;font-size: 14px;padding-top: 10px;padding-bottom: 10px;line-height: 24px;border-top: 1px solid #efefef;border-bottom: 1px solid #efefef;text-align: left;color: #960" >
                                    <?php echo ($value["chaptername"]); ?>
                                    <span style="float: right;padding-right: 20px">
                                        <?php if($value['isvip'] == 1): ?><img width="15px"   src="/Template/mobile/default/Static/images/bottom_img/jiasuo.png"><?php endif; ?>
                                    </span>
                                </div><?php endif; endforeach; endif; endif; ?>
                </div>

                <?php if(!empty($chapterlist)): ?><div id="getmore" style="font-size:.24rem;text-align: center;color:#888;padding:.25rem .24rem .4rem; clear:both">
                        <a href="javascript:void(0)" onClick="ajax_sourch_submit()">
                            点击加载更多
                        </a>
                    </div><?php endif; ?>
            </section>

            <script>
                $(function()
                {
                    width = document.documentElement.clientWidth - 160;

                    width = 0.9 * width;

                    $('.bookleft').css({width:width});
                });

                function goTop()
                {
                    $('html,body').animate({'scrollTop':0},600);
                }

                var  page = 1;

                /*** ajax 提交表单 查询订单列表结果*/
                function ajax_sourch_submit()
                {
                    page += 1;

                    pageIndex = page;

                    $.ajax(
                    {
                        type : "GET",
                        url  :  "/Article/ajaxDirectoryList/is_ajax/1/articleid/<?php echo ($value["articleid"]); ?>/p/" + pageIndex + ".html",//+tab,

                        success: function(data)
                        {
                            if($.trim(data) == '')
                            {
                                $('#getmore').hide();
                            }
                            else
                            {
                                $("#chapter_list").append(data);
                            }
                        }
                        });
                }
            </script>

            <a href="javascript:goTop();" class="gotop">
                <img src="/Template/mobile/default/Static/images/topup.png">
            </a>
        </div>
    </body>
</html>