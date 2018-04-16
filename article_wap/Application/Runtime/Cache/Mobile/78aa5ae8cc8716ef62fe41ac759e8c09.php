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
        <link rel="stylesheet" type="text/css" href="/Template/mobile/default/Static/css/read.css">
        <script type="text/javascript" src="/Template/mobile/default/Static/js/jquery.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/TouchSlide.1.1.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/jquery.json.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/touchslider.dev.js"></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/layer.js" ></script>
        <script type="text/javascript" src="/Template/mobile/default/Static/js/common.js"></script>
       <!-- <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
    </head>

    <body class="chapter" data-con="read_cont">
        <div id="page">
            <div class="h-left">
                <!--<a class="sb-back"  href="javascript:history.go(-1);" title="返回" target="_self" onclick="goHtml()">-->
                <!--</a>-->
               <!-- <a class="sb-back"  href="" title="返回" target="_self" onclick="goHtml()" id="go_Html">
                </a>-->
            </div>

            <!--
            <div style="float: right;margin-top: 5px;margin-right: 20px;">
                <a href="/" title="主页" target="_self" >
                    <i class="fa fa-home" style="font-size: 30px;"></i>
                </a>

            </div>-->

            <div>
                <section>
                    <div>
                        <h1 class="read_title"  style="margin-bottom: 15px;" >
                            <?php echo ($chapter["chaptername"]); ?>
                        </h1>

                        <div class="read_instr">
                            <diV class="read_info">
                            <a href="<?php echo U('Article/index',array('id' => $chapter['articleid']));?>" >
                            <img src="<?php echo ($chapter["cover"]); ?>" style="width: 50px;height: 50px;float: left;margin-left: 30px;border-radius: 50%;" >  </a>
                           <div class="read_info_right" style="float: left;text-align: left;margin-top: 0px;">
                               <a href="<?php echo U('Article/index',array('id' => $chapter['articleid']));?>" style="text-decoration: none">
                                   <li style="margin-left: 10px;font-size: 15px;" ><?php echo ($chapter["articlename"]); ?></li>
                                   <li style="margin-left: 10px;font-size: 12px;margin-top:-10px;"><?php echo ($chapter["author"]); ?></li>
                             </a>
                           </div>
                            </diV>
                            <div class="config" style="margin-right:30px;" >
		                        <span class="night">
		                        	<a href="javascript:;" class="szbut_a" data-act="read_mode">
		                        		<i></i>
		                        	</a>
		                        </span>
                                <!--<span>
									<a href="javascript:;" data-act="read_act" data-name="plus">+A</a>
								</span>
                                <span>
									<a href="javascript:;" data-act="read_act" data-name="less">-A</a>
								</span>-->
                            </div>
                            <div class="chapter_content" data-act="read_content">
                                <p>
                                    <?php echo ($chapter["content"]); ?>
                                </p>
                            </div>
                        </div>

                    </div>
					<div align="center">
					<p style="font-size:14px;color:black;">关注微信公众号: nhjuzi ，方便下次阅读</p>
					<img style="margin:20px;" src="/Template/mobile/default/Static/images/weixin.jpg" width="200" height="200" title="" />
					<p style="font-size:14px;color:black;">微信内可长按扫码识别</p>
					<p style="font-size:14px;color:black;">客服QQ：1573526519</p>
					<p style="font-size:14px;color:black;">客服电话：17316923047</p>
				</div>

                </section>
                <a href="javascript:goTop();" class="gotop" style="bottom:170px;">
                    <img src="/Template/mobile/default/Static/images/topup.png">
                </a>
            </div>
            <div class="read_vf_nav tborder" style=" margin-top:30px;margin-bottom:30px;">

    <!--
    <div>
	<div align="center">
					<p style="font-size:14px;color:black;">关注微信公众号: nhjuzi ，方便下次阅读</p>
					<img style="margin:20px;" src="/Template/mobile/default/Static/images/weixin.jpg" width="200" height="200" title="" />
					<p style="font-size:14px;color:black;">微信内可长按扫码识别</p>
					<p style="font-size:14px;color:black;">客服QQ：1573526519</p>
					<p style="font-size:14px;color:black;">客服电话：17316923047</p>
				</div>
        <?php if($chapter['prechapter'] != -1): ?><span url="<?php echo U('Article/readChapter',array('chapter_id' => $chapter['prechapter'],'book_id' => $chapter['articleid']));?>">
                上一章
            </span>
        <?php else: ?>
            <span >
                已经是第一章
            </span><?php endif; ?>
    </div>
    <div class="catalogue">
        <span url="<?php echo U('Article/getDirectory',array('id' => $chapter['articleid']));?>">目录</span>
    </div>-->
    <a style="text-align: center; border: solid #666 1px;padding-top: 5px;margin-left: 20px;border-radius: 5px;width: 70%;" href="<?php echo U('Article/readChapter',array('chapter_id' => $chapter['nextchapter'],'book_id' => $chapter['articleid']));?>">

        <?php if($chapter['nextchapter'] != -1): ?><span url="<?php echo U('Article/readChapter',array('chapter_id' => $chapter['nextchapter'],'book_id' => $chapter['articleid']));?>">
                下一章
            </span>
        <?php else: ?>
            <span >
                已经是最后一章
            </span><?php endif; ?>
    </a>

    <a id="menu" href="javascript:void(0)" onclick="menudisplay()" style="text-align: center;border: solid #666 1px;padding-top: 5px;margin:0 20px;border-radius: 5px;width: 15%;">
            <span >
               菜单
            </span>
    </a>
</div>
<!--菜单项-->
<div  id='menu_nav' style="display: none">

    <div class="read_vf_nav tborder" style="margin: 40px 10px 10px ;">

        <?php if($chapter['prechapter'] != -1): ?><a  href="<?php echo U('Article/readChapter',array('chapter_id' => $chapter['prechapter'],'book_id' => $chapter['articleid']));?>" class="read_foot_a"  >
                上一章  </a>
            <?php else: ?>
            <a  href="javascript:void:(0)"  class="read_foot_a" onclick="alert('当前章节已经是第一章! ')" style="color:#999">
                上一章
            </a><?php endif; ?>

        <a  href="<?php echo U('Article/index',array('id' => $chapter['articleid']));?>" class="read_foot_a"  >
            返回封面
            </a>
            <a href="<?php echo U('Article/getDirectory',array('id' => $chapter['articleid']));?>" class="read_foot_a"  >
                           返回目录
            </a>
            <a href="/" class="read_foot_a"  >
                           返回首页
            </a>

    </div>
    <!--
        <div class="read_vf_nav tborder" style="margin: 10px;">

            <a  class="read_foot_a"  style="">
                签到送礼
            </a>
            <a  class="read_foot_a"  style="">
                评论
            </a>
            <a  class="read_foot_a"  style="">
               打赏
            </a>
            <a  class="read_foot_a"  style="">
                书架
            </a>

        </div>-->
    </div>

        <div class="read_set" style="display: none" >
            <li style="">
                <label >字体</label>
                    <label class="set_size" onclick="fontAdd();">A+</label>
                    <label class="set_size"  onclick="fontrev();">默认</label>
                    <label class="set_size"  onclick="fontdef();">A—</label>
            </li>
                <li>
                    <label style="color: #FFFFff">背景</label>
                    <label style="background-color:#f0f0f0" class="set_color" onclick="setcolor(1);"></label>
                    <label style="background-color:#e8dfc0" class="set_color" onclick="setcolor(2);"></label>
                    <label style="background-color:#c7edcc"  class="set_color"  onclick="setcolor(3);"></label>
                    <label style="background-color:#e0a5b4" class="set_color" onclick="setcolor(4);"></label>
                    <label style="background-color:#E7F4FE"  class="set_color"  onclick="setcolor(5);"></label>
                    </li>
        </div>

    <script>
        $(".read_vf_nav div span").click(function () {
            if(typeof($(this).attr("url"))=="undefined")
            {
            }
            else
            {
                window.location.replace($(this).attr("url"));
            }
        })

        var flag=false;
        function menudisplay(){
            flag=!flag;
            console.log(flag);
            if(flag){
                $('#menu_nav').css("display","block");
                var h = $(document).height()-$(window).height();
                $(document).scrollTop(h);
            }else{
                $('#menu_nav').css("display","none");
            }
        }

        //弹出设置菜单
        $(".chapter_content").click(
            function () {
                $(".read_set").slideToggle('fast');
            }
        );



        var _content = $("[data-act=read_content]");
        var _change=4;

        //设置字体加
        function fontAdd() {
            var _cont_size = $("[data-act=read_content]").children("p:first").css("font-size");
            var _cont_marg = $("[data-act=read_content]").children("p:first").css("margin");
            var _last_size = parseInt(_cont_size)+_change;
            var _chan_marg = parseInt(_cont_marg)+_change;
            console.log(_cont_size,_cont_marg);
            if (_last_size>=36) {
                _last_size = 36;
                _chan_marg = 20;
            }
            setFontsize(_last_size,_chan_marg);
        }

        //设置字体减
        function fontdef() {
            var _cont_size = $("[data-act=read_content]").children("p:first").css("font-size");
            var _cont_marg = $("[data-act=read_content]").children("p:first").css("margin");
            var _last_size = parseInt(_cont_size)-_change;
            var _chan_marg = parseInt(_cont_marg)-_change;
            if (_last_size<=12){
                _last_size=12;
                _chan_marg=6;
            }

            setFontsize(_last_size,_chan_marg);

        }


        //设置默认字体
        function fontrev () {
            _last_size=16;
            _chan_marg=6;
            setFontsize(_last_size,_chan_marg);

        }


        //设置字体
        function setFontsize(_last_size,_chan_marg) {
            console.log(_last_size,_chan_marg);
            var _last_lh = _last_size + _change*2;
            _content.children("p").css({"font-size":_last_size + "px","line-height":_last_lh + "px","margin":_chan_marg + "px 0"});
            var _read_str = '{"fs":"'+_last_size + '","lh":"'+_last_lh + '","pm":"' +_chan_marg + '"}';
            $.cookie('shuhai_read_fs',_read_str,{expires:30,path:"/"});

        }

        //设置背景色
        function setcolor(num){
            var _color={"bodybg":"url(/Template/mobile/default/Static/images/readbg_0"+num+".jpg)","nightcolor":"#333","conn":"#353434","conan":"#ffffff"};
            $("body").css("background",_color.bodybg);
            $(".read_vf_nav").css("background",_color.bodybg);
            $(".chapter_content p").css("color",_color.nightcolor);
            $(".read_vf_nav a").css("color",_color.nightcolor);
            _read_str = '{"bodybg":"'+_color.bodybg + '","con":"'+_color.con + '","conan":"'+_color.cona + '","mode":"day","fontColor":"'+_color.nightcolor + '"}';
            $.cookie('shuhai_read_mod',_read_str,{expires:30,path:"/"});
        }

    </script>
        </div>
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
            });
            function goTop()
            {
                $('html,body').animate({'scrollTop':0},600);
            }
        </script>
        <script type="text/javascript">
            $(function() {
                // 阅读页面设置
                var _content = $("[data-act=read_content]");
                // 文字样式
                $("[data-act=read_act]").live('click', function(event) {
                    var _mod = $(this).attr("data-name");
                    var _cont_size = $("[data-act=read_content]").children("p:first").css("font-size");
                    var _cont_marg = $("[data-act=read_content]").children("p:first").css("margin");
                    var _change = 4;
                    if ('plus' === _mod) {
                        var _last_size = parseInt(_cont_size)+_change;
                        var _chan_marg = parseInt(_cont_marg)+_change;
                        if (_last_size>=36){
                            _last_size=36;
                            _chan_marg=20;
                        }
                    } else {
                        var _last_size = parseInt(_cont_size)-_change;
                        var _chan_marg = parseInt(_cont_marg)-_change;
                        if (_last_size<=12){
                            _last_size=12
                            _chan_marg=6;
                        }
                    }
                    // 设置行高和段间距
                    var _last_lh = _last_size + _change*2;
                    //		alert(_last_pm);
                    _content.children("p").css({"font-size":_last_size + "px","line-height":_last_lh + "px","margin":_chan_marg + "px 0"});
                    var _read_str = '{"fs":"'+_last_size + '","lh":"'+_last_lh + '","pm":"' +_chan_marg + '"}';
                    //		_read_str = eval("("+_read_str+")");
                    //		console.log(_read_str);
                    $.cookie('shuhai_read_fs',_read_str,{expires:30,path:"/"});
                });
                // 夜间模式
                $("[data-act=read_mode]").live('click', function(event) {
                    var _this_cont = $("[data-con=read_cont]");
                    _this_cont.toggleClass("night");
                    var _color={"bodybg":"#f0f1f1","bodybgn":"#1f1c1d","conn":"#353434","conan":"#ffffff","con":"#ffffff","cona":"#0068b7","daycolor":"#999","nightcolor":"#333"};
                    var _read_str="";
                    if(_this_cont.hasClass("night")){
                        $("body").css("background",_color.bodybgn);
                        $(".read_vf_nav").css("background",_color.bodybgn);
                        $(".chapter_content p").css("color",_color.daycolor);
                        $(".read_vf_nav a").css("color",_color.daycolor);
						$(".read_info_right a").css("color",_color.daycolor);
                        //			$(".container").css("background",_color.conn);
                        //			$(".container a").css("color",_color.conan);
                        _read_str = '{"bodybg":"'+_color.bodybgn + '","con":"'+_color.conn + '","cona":"'+_color.conan + '","mode":"night","fontColor":"'+_color.daycolor + '"}';
                    }else{
                        $("body").css("background",_color.bodybg);
                        $(".read_vf_nav").css("background",_color.bodybg);
                        $(".chapter_content p").css("color",_color.nightcolor);
                        $(".read_vf_nav a").css("color",_color.nightcolor);
                        //			$(".container").css("background",_color.con);
                        //			$(".container a").css("color",_color.cona);
                        _read_str = '{"bodybg":"'+_color.bodybg + '","con":"'+_color.con + '","conan":"'+_color.cona + '","mode":"day","fontColor":"'+_color.nightcolor + '"}';
                    }
                    //		_read_str = eval("("+_read_str+")");
                    //		console.log(_read_str.bodybg);
                    $.cookie('shuhai_read_mod',_read_str,{expires:30,path:"/"});
                })

                //界面初始化
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
                       // console.log(_modObj);
                        _modObj = eval("("+_modObj+")");
                        $("[data-con=read_cont]").toggleClass(_modObj.mode);
                        $("body").css("background",_modObj.bodybg);
                        $(".read_vf_nav").css("background",_modObj.bodybg);
                        $(".chapter_content p").css("color",_modObj.fontColor);
                        $(".read_vf_nav a").css("color",_modObj.fontColor);
                        //			$(".content").css("background",_modObj.con);
                        //			$(".content a").css("color",_modObj.cona);
                    }
                }
            })

            function goHtml()
            {
                var backUrl = document.referrer;

                if(backUrl)
                {
                    //返回目录
                    $('#go_Html').attr('href',"javascript:history.go(-1)");
                }
                else
                {
                    $('#go_Html').attr('href',"http://m.kyread.com");
                }

//                if(!backUrl)
//                {
//                    $('#go_Html').attr('href',"http://m.kyread.com");
//                }

            }

        </script>
    </body>
</html>