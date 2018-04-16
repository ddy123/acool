//浮动菜单 menu-菜单对象id，box-浮动框对象id，参数3-right靠右对齐，默认靠左，参数4-top显示在上方，默认下方
function menubox(menu, box) {
	menu = $_(menu);
	box = $_(box);
	if (box.style.display == 'none') {
		box.style.display = 'block';
		box.style.position = 'absolute';
	} else {
		box.style.display = 'none';
		return;
	}
	var pos = menu.getPosition();
	if (arguments.length > 2 && arguments[2] == 'right') box.style.left = (pos.x + menu.offsetWidth - box.offsetWidth) + 'px';
	else box.style.left = pos.x + 'px';
	if (arguments.length > 3 && arguments[3] == 'top') box.style.top = (pos.y - box.offsetHeight + 1) + 'px';
	else box.style.top = (pos.y + menu.offsetHeight - 1) + 'px';
	return;
}
$(document).ready(function() {
	//分享
	$(".ulTop1 li").hover(function(){
		var $ids=$(".ulTop1 li").index(this);
			$(this).find(".h3Top").toggleClass("lth"+$ids);
	});
	//返回顶部
	function getck(e){for(var t=0;t<acookie.length;t++){var n=acookie[t].split("=");if(e==n[0])return n.length>1?unescape(n[1]):""}return""}function showbtmShareLayer(){if(is_open)return;if(getck("btmShareLayer")=="")$("#btmShareLayer").fadeIn(1e3),is_open=!0;else{var e=convertdate(getck("btmShareLayer")),t=new Date,n=Number(t.getTime())-Number(e.getTime());n>=864e5&&(document.cookie="btmShareLayer=",$("#btmShareLayer").fadeIn(1e3),is_open=!0)}}function convertdate(e){var t=e;t=t.replace(":","-"),t=t.replace(":","-"),t=t.replace(" ","-");var n=new Date(Number(t.split("-")[0]),Number(t.split("-")[1])-1,Number(t.split("-")[2]),Number(t.split("-")[3]),Number(t.split("-")[4]),Number(t.split("-")[5]));return n}function setbtmShareLayerck(){var e=new Date,t=e.getFullYear()+"-"+(Number(e.getMonth())+1)+"-"+e.getDate()+" "+e.getHours()+":"+e.getMinutes()+":"+e.getSeconds();document.cookie="btmShareLayer="+t}$(document).ready(function(){function i(e){var t;return((t=typeof e)=="object"?e==null&&"null"||Object.prototype.toString.call(e).slice(8,-1):t).toLowerCase()}function s(e,t){if(t.indexOf)return t.indexOf(e);for(var n=0,r=t.length;n<r;n++)if(t[n]===e)return n;return-1}function o(e,t){return s(e,t)>-1}function u(e){var t;return e=e.toUpperCase(),e=="TEXT"?t=document.createTextNode(""):e=="BUFFER"?t=document.createDocumentFragment():t=document.createElement(e),t}function a(e){e=e||document;var t=e.documentElement,n=e.body;return{top:Math.max(window.pageYOffset||0,t.scrollTop,n.scrollTop),left:Math.max(window.pageXOffset||0,t.scrollLeft,n.scrollLeft)}}function f(e,t){function n(e){var t=/\\'/g,n=e.replace(/(<(\/?)#(.*?(?:\(.*?\))*)>)|(')|([\r\n\t])|(\$\{([^\}]*?)\})/g,function(e,n,r,i,s,o,u,a){if(n)return"{|}"+(r?"-":"+")+i+"{|}";if(s)return"\\'";if(o)return"";if(u)return"'+("+a.replace(t,"'")+")+'"});return n}function r(e){var t,n,r,i,s,o,u,a=["var aRet = [];"];u=e.split(/\{\|\}/);var f=/\s/;while(u.length){r=u.shift();if(!r)continue;s=r.charAt(0);if(s!=="+"&&s!=="-"){r="'"+r+"'",a.push("aRet.push("+r+");");continue}i=r.split(f);switch(i[0]){case"+et":t=i[1],n=i[2],a.push('aRet.push("<!--'+t+' start-->");');break;case"-et":a.push('aRet.push("<!--'+t+' end-->");');break;case"+if":i.splice(0,1),a.push("if"+i.join(" ")+"{");break;case"+elseif":i.splice(0,1),a.push("}else if"+i.join(" ")+"{");break;case"-if":a.push("}");break;case"+else":a.push("}else{");break;case"+list":a.push("if("+i[1]+".constructor === Array){with({i:0,l:"+i[1]+".length,"+i[3]+"_index:0,"+i[3]+":null}){for(i=l;i--;){"+i[3]+"_index=(l-i-1);"+i[3]+"="+i[1]+"["+i[3]+"_index];");break;case"-list":a.push("}}}");break;default:}}return a.push('return aRet.join("");'),[n,a.join("")]}if(!e)return"";var i={};e!==i.template&&(i.template=e,i.aStatement=r(n(e)));var s=i.aStatement,o=function(e){return e&&(t=e),arguments.callee};return o.toString=function(){return(new Function(s[0],s[1]))(t)},o}function l(e){var t=i(e)=="string",n=e;t&&(n=u("div"),n.innerHTML=e);var r=e;if(t){r=u("buffer");while(n.children[0])r.appendChild(n.children[0])}return{box:r}}function c(i){function h(){var e=a(),t=e.top,i,s;t>0?(r.fadeIn(1e3),c&&(i=$(window).height(),s=t+i-190,n.css("top",s)),showbtmShareLayer()):r.fadeOut(1e3)}function p(){return document.body.scrollTop+document.documentElement.scrollTop}function d(e){document.documentElement&&document.documentElement.scrollTop?document.documentElement.scrollTop=e:document.body&&(document.body.scrollTop=e)}function v(){u!=null&&(new Date).getTime()-u<500&&(clearTimeout(o),o=null),u=(new Date).getTime(),o=setTimeout(h,100)}function m(){$("html, body").animate({scrollTop:0},1e3)}if(!i||!i.nodeType)return;if(!t){var s=l(f(e,{uid:"1764439395",online:!0}).toString()).box;i.appendChild(s),t=!0}n=$("#base_scrollToTop_area"),r=$("#base_scrollToTop");if(n==null)return{destroy:function(){}};var o,u,c=n.css("position")!="fixed";$(window).bind("scroll",v),r.bind("click",m)}var e=['<#et scrollToTop data><div id="base_scrollToTop_area" class="bottom-tools"><a id="base_scrollToTop" class="gotop" style="display: none;<#if (data.online !== true)>margin-top:279px;</#if>" href="javascript:void(0);" class="top" title="返回顶部"><i class="icon"></i></a></div></#et>'].join(""),t=!1,n=null,r=null;c(document.body)});var acookie=document.cookie.split("; "),is_open=!1
});
//首页焦点图

$(function(){
	var sWidth = $("#slider_name").width();
	var len = $("#slider_name .silder_panel").length;
	var index = 0;
	var picTimer;
	
	var btn = "";
	$("#slider_name").append(btn);

	$("#slider_name .silder_nav li").css({"opacity":"0.6","filter":"alpha(opacity=60)"}).mouseenter(function() {																		
		index = $("#slider_name .silder_nav li").index(this);
		showPics(index);
	}).eq(0).trigger("mouseenter");

	$("#slider_name .prev,#slider_name .next").css({"opacity":"0.2","filter":"alpha(opacity=20)"}).hover(function(){
		$(this).stop(true,false).animate({"opacity":"0.6","filter":"alpha(opacity=60)"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0.2","filter":"alpha(opacity=20)"},300);
	});
	$("#slider_name .silder_con").css("width",sWidth * (len));
	
	// mouse 
	$("#slider_name").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},3000); 
	}).trigger("mouseleave");
	
	// showPics
	function showPics(index) {
		var nowLeft = -index*sWidth; 
		$("#slider_name .silder_con").stop(true,false).animate({"left":nowLeft},300);
		$("#slider_name .silder_nav li").removeClass("current").eq(index).addClass("current"); 
		$("#slider_name .silder_nav li").stop(true,false).animate({"opacity":"0.5"},300).eq(index).stop(true,false).animate({"opacity":"1"},300);
		$("#slider_name .silder_intro").stop(true,false).animate({"opacity":"0"},300).eq(index).stop(true,false).animate({"opacity":"1"},300);
	}
});

$(function () {
            $(document).on("click", "#subscription .js-click-date,#newBook .js-click-date,#finerecommendation .js-click-date,#headerlist .js-list", function () {
                $(this).addClass("on").siblings().removeClass("on");
            });
            $(".imgs a.small-img").mouseover(function () {
                var i = $(this).index() - 1;
                var src = $(this).find("img").attr("src");
                var href=$(this).attr('href');
                var href = $(this).attr("href");
                $(this).addClass("on").siblings("a").removeClass("on");
                $(this).parents(".container-left").find(".left-bot").eq(i).show().siblings(".left-bot").hide();
                $(".imgs a.big-img img").attr("src", src);
                $(".big-img").attr("href", href);
            })
        });


//新tab切换
$(function($){
	//排行榜
	$(".pattern-rank").switchTab({defaultIndex: "0", titOnClassName: "active", titCell: "p span", mainCell: "div ol", effect: "slide"});
	//最近更新
	$(".pattern-update-list").switchTab({defaultIndex: "0", titOnClassName: "active", titCell: "p span", mainCell: "div li", effect: "slide"});
});

$(function () {
   $('.reviews .hd .tab-choose p').hover(function(){
        //获得当前被点击的元素索引值
         var Index = $(this).index();
		 var line=120*Index-120; 
		//给菜单添加选择样式
	    $(this).addClass('active').siblings().removeClass('active');
		 //$(".line").stop(true,true).animate({left:line},200);
		
		//显示对应的div
		$('.reviews .bd').children('div').eq(Index).show().siblings('div').hide();
   
   });
});




//tab效果
function selecttab(obj) {
	var i = 0;
	var n = 0;
	var tabs = obj.parentNode.parentNode.getElementsByTagName('li');
	for (i = 0; i < tabs.length; i++) {
		tmp = tabs[i].getElementsByTagName('a')[0];
		if (tmp == obj) {
			tmp.className = 'selected';
			n = i;
		} else {
			tmp.className = '';
		}
	}
	var tavdiv = obj.parentNode.parentNode.parentNode;
	var tabchilds = obj.parentNode.parentNode.parentNode.parentNode.childNodes;
	var tabcontent;
	for (i = tabchilds.length - 1; i >= 0; i--) {
		if (typeof tabchilds[i].tagName != 'undefined' && tabchilds[i].tagName.toLowerCase() == 'div' && tabchilds[i] != tavdiv) {
			tabcontent = tabchilds[i];
			break;
		}
	}
	var contents = tabcontent.childNodes;
	var k = 0;
	for (i = 0; i < contents.length; i++) {
		if (typeof contents[i].tagName != 'undefined' && contents[i].tagName.toLowerCase() == 'div') {
			contents[i].style.display = k == n ? 'block': 'none';
			k++;
		}
	}
}

//切换下一个tab
function nexttab(obj) {
	var i = 0;
	var n = 0;
	if (typeof obj == 'string') obj = document.getElementById(obj);
	var tabs = obj.getElementsByTagName('li');
	for (i = 0; i < tabs.length; i++) {
		tmp = tabs[i].getElementsByTagName('a')[0];
		if (tmp.className == 'selected') {
			n = i + 1;
			if (n >= tabs.length) n = 0;
			break;
		}
	}
	tmp = tabs[n].getElementsByTagName('a')[0];
	selecttab(tmp);
}

//tab 轮换
function slidetab(obj) {
	var i = 0;
	var n = 0;
	var time = 5000;
	if (arguments[1]) time = arguments[1];
	if (time == 0) return;
	if (typeof obj == 'string') obj = document.getElementById(obj);
	var tabs = obj.getElementsByTagName('li');
	for (i = 0; i < tabs.length; i++) {
		tmp = tabs[i].getElementsByTagName('a')[0];
		if (tmp.className == 'selected') {
			n = i + 1;
			if (n >= tabs.length) n = 0;
			break;
		}
	}
	tmp = tabs[n].getElementsByTagName('a')[0];
	selecttab(tmp);
	setTimeout(function() {
		slidetab(obj, time);
	},
	time);
}

//选择标签到文本框
function selecttag(txt, tag){
	txt = $_(txt);
	tag = $_(tag);
	var ts = tag.innerHTML.trim();
	var re = new RegExp('(^| )' + ts + '($| )', 'g');
	if(tag.className != 'taguse'){
		tag.className = 'taguse';
		if(!re.test(txt.value)){
		  if(txt.value != '') txt.value += ' ';
		  txt.value += ts;
		}
	}else{
		tag.className = '';
		txt.value = txt.value.replace(re, ' ');
	}
	txt.value = txt.value.replace(/\s{2,}/g, ' ').replace(/^\s+/g, '');
}

//单双行切换
function sheetrow(){
	var sheets = getByClass('sheet', document, 'table');
	for(var i = 0; i < sheets.length; i++){
		var trs = sheets[i].getElementsByTagName('tr'); 
		for(var j = 0; j < trs.length; j++){
			trs[j].className = (j % 2 == 1) ? 'even' : 'odd';
		}
	}
}
addEvent(window, 'load', sheetrow);