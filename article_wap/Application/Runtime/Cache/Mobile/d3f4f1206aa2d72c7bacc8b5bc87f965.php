<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
    <head>
        <meta name="Generator"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="/Public/images/favicon.ico" />
        <title>巨子中文网</title>
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
                    <a class="sb-back" href="javascript:history.go(-1);" title="返回" target="_self"></a>
                </div>

                <div class="h-mid">
                    <?php echo ($book_info["articlename"]); ?>
                </div>
            </div>

            <section class="index_floor_lou" >
                <div class="floor_body"  style="padding-top:8px;">
                    <div id="scroll_promotion">
                        <ul class="flex">
                            <div class="cover">
                                <img  alt="<?php echo ($book_info["articlename"]); ?>" src="<?php echo ($book_info["cover"]); ?>">
                            </div>
                            <div class="bInfo" id="bookintro">
                                <h4 class="bookname" style="line-height:17px">
                                    <?php echo ($book_info["articlename"]); ?>
                                </h4>

                                <p class="artcile_info" >
                                    作者：<?php echo ($book_info["author"]); ?>
                                </p>

                                <p class="artcile_info" >
                                    字数：<?php echo ($book_info["size"]); ?>
                                </p>

                                <p class="artcile_info" >
                                    价格：<?php echo ($book_info["price"]); ?>
                                </p>
                                <p class="artcile_info" >
                                    状态：<?php echo ($book_info["flag"]); ?>
                                </p>
                                <p class="artcile_info" >
                                    来源：<?php echo ($book_info["sourcename"]); ?>
                                </p>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="floor_body">
                    <h2 style="margin-top: 10px;border-bottom: 1px solid #efefef">
                        <em></em>
                        书籍简介
                    </h2>

                    <div style="margin: 10px 20px 10px 20px;font-size: 14px;line-height: 30px">
                        <?php echo ($book_info["intro"]); ?>
                    </div>
                </div>

                <div class="floor_body">
                    <h2 style="margin-top: 10px;border-bottom: 1px solid #efefef">
                        <em></em>
                        章节目录
                    </h2>

                    <a href="<?php echo U('Article/readChapter',array('book_id' => $book_info['articleid'],'chapter_id' => $book_info['lastchapterid']));?>" >
                        <div style="margin: 10px 20px 10px 20px;font-size: 14px;line-height: 30px">
                            最新章节：<?php echo ($book_info["lastchapter"]); ?>
                        </div>

                        <div style="margin: 0;font-size: 10px;padding-top: 10px;padding-bottom: 10px;line-height: 18px;border-top: 1px solid #efefef;border-bottom: 1px solid #efefef;text-align: center" >
                            <a href="<?php echo U('Article/getDirectory',array('id' => $book_info['articleid']));?>" >
                                点击查看更多章节（共<?php echo ($book_info["chaptersum"]); ?>章）
                            </a>
                        </div>
                    </a>
                </div>
            </section>

            <div style="height:50px; line-height:0px; clear: both; background-color: rgb(246,246,246)"></div>
<div class="artcile_nav"  style="background: #efa164; ">
    <ul>
        <li style="width: 50%">
            <!--<a style="color: white;font-size: 20px" href="<?php echo U('User/addBookCase',array('book_id' => $book_info['articleid']));?>" onClick="addBookCase(<?php echo ($book_info['articleid']); ?>)">-->
            <a style="color: white;font-size: 20px" onClick="addBookCase(<?php echo ($book_info['articleid']); ?>,'<?php echo ($book_info['articlename']); ?>')">
                <!--加入收藏-->
                <img width=100% src="/Template/mobile/default/Static/images/bottom_img/jiarushujia1@3x.png">
            </a>
        </li>

        <li style="width: 50%">
            <a style="color: white;font-size: 20px" href="<?php echo U('Article/readChapter',array('chapter_id' => $book_info['firstchapter'],'book_id' => $book_info['articleid']));?>">
                <!--开始阅读-->
                <img width=100% src="/Template/mobile/default/Static/images/bottom_img/kaishiyuedu1@3x.png">
            </a>
        </li>
    </ul>

    <script>
        function addBookCase(bookID,bookName)
        {
            $.ajax(
            {
                type : "GET",
                url  :  "/User/addBookCase/id/" + bookID + "/bookname/" + bookName + ".html",//+tab,
                success: function(data)
                {
                    alert(data.msg);
                }
            });
        }
    </script>
</div>

            <script>
                $(function()
                {
                    width = document.documentElement.clientWidth - 160;

                    width = 0.9 * width;

                    $('.bookleft').css({width:width});
                });

            </script>
        </div>
    </body>
</html>