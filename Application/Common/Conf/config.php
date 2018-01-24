<?php
return array(
	
	'DB_TYPE'   => 'mysql', 
	'DB_HOST'   => 'localhost', 
	'DB_NAME'   => 'pra', // 数据库名
	'DB_USER'   => 'caijunpeng', // 用户名
	'DB_PWD'    => 'Cjp123456.', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'p_',// 数据库表前缀 
	'DB_CHARSET'=> 'utf8',// 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

	'MAIL_HOST'     =>  'smtp.163.com',      // SMTP服务器地址
    'MAIL_AUTH'     =>  true,                // 是否邮箱认证
    'MAIL_HTML'     =>  true,                // 正文是否使用HTML代码
    'MAIL_PORT'     =>  25,                  // SMTP服务器端口号
    'MAIL_CHARSET'  =>  'UTF-8',             // 正文使用编码
    'MAIL_USERNAME' =>  'miecu_dev@163.com', // 邮箱登录帐号
    'MAIL_PASSWORD' =>  'a5533824',          // 邮箱登录密码
    'MAIL_FROMNAME' =>  '猿客栈',             // 显示名称


   
	'USER_PATH'  => './Uploads/User/',
    	'LOG_RECORD' => true,// 开启日志记录

    'URL_HTML_SUFFIX'=>'', //伪静态
);