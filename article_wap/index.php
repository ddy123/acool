<?php	ini_set('session.cookie_domain', ".kyread.com");	// 应用入口文件		// 检测PHP环境	if(version_compare(PHP_VERSION,'5.3.0','<'))  	{		die('require PHP > 5.3.0 !');	}	//微信站		error_reporting(E_ALL ^ E_NOTICE);//显示除去 E_NOTICE 之外的所有错误信息		// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false	define('APP_DEBUG',true);		//判断是否属手机	//代码看上去很多，其实就是数组里面显得多而乱，不要被表面现象所吓倒哦！	function is_mobile()	{		$user_agent = $_SERVER['HTTP_USER_AGENT'];			$mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");				$is_mobile = false;			foreach ($mobile_agents as $device)		{			//这里把值遍历一遍，用于查找是否有上述字符串出现过			if (stristr($user_agent, $device))			{				//stristr 查找访客端信息是否在上述数组中，不存在即为PC端。				$is_mobile = true;				break;			}		}				return $is_mobile;	}		// 绑定模块到当前入口文件	define('BIND_MODULE','Mobile');		// 定义应用目录	define('APP_PATH','./Application/');	//  定义插件目录	define('PLUGIN_PATH','plugins/');	//开启页面gzip压缩	ob_end_clean();	define ( "GZIP_ENABLE", function_exists ( 'ob_gzhandler' ) );	ob_start ( GZIP_ENABLE ? 'ob_gzhandler' : null );		define('UPLOAD_PATH','./Public/upload/'); // 编辑器图片上传路径	define('TPSHOP_CACHE_TIME',3); // TPshop 缓存时间	define('SITE_URL','http://'.$_SERVER['HTTP_HOST']); // 网站域名 	define('HTML_PATH','./Application/Runtime/Html/'); //静态缓存文件目录，HTML_PATH可任意设置，此处设为当前项目下新建的html目录	// 引入ThinkPHP入口文件    require './ThinkPHP/ThinkPHP.php';	?>