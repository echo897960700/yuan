<?php
return array(
'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true

'URL_HTML_SUFFIX'=>'', //伪静态

//图片上传
'UPLOAD_MAX_SIZE' => 2000000,	//最大上传大小
'UPLOAD_PATH' => './Uploads/',	//文件上传保存路径
'UPLOAD_EXTS' => array('jpg', 'jpeg', 'gif', 'png'),	//允许上传文件的后缀

/* 错误页面模板 */
'TMPL_ACTION_ERROR'     =>  MODULE_PATH.'View/Public/error.html', // 默认错误跳转对应的模板文件
'TMPL_ACTION_SUCCESS'   =>  MODULE_PATH.'View/Public/success.html', // 默认成功跳转对应的模板文件
//'TMPL_EXCEPTION_FILE'   =>  MODULE_PATH.'View/Public/exception.html',// 异常页面的模板文件

);