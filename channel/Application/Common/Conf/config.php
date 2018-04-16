<?php
return array
(
	//'配置项'=>'配置值'
	'AUTH_CODE'       => "MIANFEIDUSHU_SHUMENG",//安装完毕之后不要改变，否则所有密码都会出错
	'LOAD_EXT_CONFIG' => 'db,html', // 加载数据库配置文件
	'URL_HTML_SUFFIX' => 'html',
	'URL_MODEL'       => 3,//URL模式为兼容模式
	'DEFAULT_FILTER'  => 'trim', // 系统默认的变量过滤机制

	/*
	 * RBAC认证配置信息
	 */
	'SESSION_AUTO_START'    => true,
	'USER_AUTH_ON'          => true,
	'USER_AUTH_TYPE'        => 1,         // 默认认证类型 1 登录认证 2 实时认证
	'USER_AUTH_KEY'         => 'authId',  // 用户认证SESSION标记
	'ADMIN_AUTH_KEY'        => 'administrator',
	'USER_AUTH_MODEL'       => 'User',    // 默认验证数据表模型
	'AUTH_PWD_ENCODER'      => 'md5',     // 用户认证密码加密方式
);