//改变阅读背景、字体大小和颜色的javascript
var ReadSet = {
	bgcolor : ["#f3f3f3", "#ffffed", "#efefef", "#fcefff", "#ffffff", "#eefaee"],
	bgcname : ["默认", "明黄淡雅", "灰色世界", "红粉世家", "白雪天地", "绿意春色"],
	bgcvalue : "#f3f3f3",
	fontcolor : ["#000000", "#ff0000", "#008000", "#ffc0cb", "#0000ff", "#ffffff"],
	fontcname : ["经典黑色", "红色激情", "春意盎然", "红粉世家", "蓝色海洋", "白色天使"],
	fontcvalue : "#000000",
	fontsize : ["12px", "14px", "16px", "20px", "28px"],
	fontsname : ["很小", "较小", "中等", "较大", "很大"],
	fontsvalue : "16px",
	contentid : "ChapterContent924915",
	SetBgcolor : function(color){
		//document.bgColor = color;
		document.getElementById(this.contentid).style.backgroundColor = color;
		if(this.bgcvalue != color) this.SetCookies("bgcolor",color);
		this.bgcvalue = color;
	},
	SetFontcolor : function(color){
		document.getElementById(this.contentid).style.color = color;
		if(this.fontcvalue != color) this.SetCookies("fontcolor",color);
		this.fontcvalue = color;
	},
	SetFontsize : function(size){
		document.getElementById(this.contentid).style.fontSize = size;
		if(this.fontsvalue != size) this.SetCookies("fontsize",size);
		this.fontsvalue = size;
	},
	LoadCSS : function(){
			var style = "";
			style +=".readSet{padding:3px;clear:both;line-height:35px;width:100%;margin:auto;}\n";
			style +=".readSet .rc{color:#333333;float:left;padding-left:20px;}\n";
			style +=".readSet a.ra{border:1px solid #cccccc;display:block;width:16px;height:16px;float:left;margin-left:6px;overflow:hidden;margin-top:7px;}\n";
			style +=".readSet .rf{float:left;}\n";
			style +=".readSet .rt{padding:0px 5px;}\n";
			
			if (document.all){
				var oStyle=document.styleSheets[0];
				var a=style.split("\n");	
				for(var i=0;i<a.length;i++){
					if(a[i]=="") continue;
					var ad=a[i].replace(/([\s\S]*)\{([\s\S]*)\}/,"$1|$2").split("|");
					oStyle.addRule(ad[0],ad[1]);
				}
			}else{
				var styleobj = document.createElement('style');
				styleobj.type = 'text/css';
				styleobj.innerHTML=style;
				document.getElementsByTagName('HEAD').item(0).appendChild(styleobj);
			}
	},
	Show : function(){
		var output;
		output = '<div class="readSet">';
		output += '<span class="rc">背景色:</span>';
		for(i=0; i<this.bgcolor.length; i++){
			output += '<a style="background-color: '+this.bgcolor[i]+'" class="ra" title="'+this.bgcname[i]+'" onclick="ReadSet.SetBgcolor(\''+this.bgcolor[i]+'\')" href="javascript:;"></a>';
		}
		output += '<span class="rc">前景色:</span>';
		for(i=0; i<this.fontcolor.length; i++){
			output += '<a style="background-color: '+this.fontcolor[i]+'" class="ra" title="'+this.fontcname[i]+'" onclick="ReadSet.SetFontcolor(\''+this.fontcolor[i]+'\')" href="javascript:;"></a>';
		}
		output += '<span class="rc">字体:</span><span class="rf">[';
		for(i=0; i<this.fontsize.length; i++){
			output += '<a class="rt" onclick="ReadSet.SetFontsize(\''+this.fontsize[i]+'\')" href="javascript:;">'+this.fontsname[i]+'</a>';
		}
		output += ']</span>';
		output += '<div style="font-size:0px;clear:both;"></div></div>';
		document.write(output);
	},
	SetCookies : function(cookieName,cookieValue, expirehours){
		var today = new Date();
		var expire = new Date();
		expire.setTime(today.getTime() + 3600000 * 356 * 24);
		document.cookie = cookieName+'='+escape(cookieValue)+ ';expires='+expire.toGMTString()+'; path=/';
	},
	ReadCookies : function(cookieName){
		var theCookie=''+document.cookie;
		var ind=theCookie.indexOf(cookieName);
		if (ind==-1 || cookieName=='') return ''; 
		var ind1=theCookie.indexOf(';',ind);
		if (ind1==-1) ind1=theCookie.length;
		return unescape(theCookie.substring(ind+cookieName.length+1,ind1));
	},
	SaveSet : function(){
		this.SetCookies("bgcolor",this.bgcvalue);
		this.SetCookies("fontcolor",this.fontcvalue);
		this.SetCookies("fontsize",this.fontsvalue);
	},
	LoadSet : function(){
		tmpstr = this.ReadCookies("bgcolor");
		if(tmpstr != "") this.bgcvalue = tmpstr;
		this.SetBgcolor(this.bgcvalue);
		tmpstr = this.ReadCookies("fontcolor");
		if(tmpstr != "") this.fontcvalue = tmpstr;
		this.SetFontcolor(this.fontcvalue);
		tmpstr = this.ReadCookies("fontsize");
		if(tmpstr != "") this.fontsvalue = tmpstr;
		this.SetFontsize(this.fontsvalue);
	}
}

ReadSet.LoadCSS();
ReadSet.Show();
function LoadReadSet(){
	ReadSet.LoadSet();
}
if (document.all){
	window.attachEvent('onload',LoadReadSet);
}else{
	window.addEventListener('load',LoadReadSet,false);
} 