<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Share:导航 sta:2
<form method="post" action="<?php echo U('Home/Share/doAdd');?>">      
    <div>
      <span>网站名称：</span>
      <input type="text" name="name">
    </div>
    <div>
      <span>网站链接：</span>
      <input type="text" name="url" value="http://">&nbsp;<!-- <input type="text" name="password" > -->
    </div>
    <!-- <div>
    	<span>密码：</span>
    	<input type="text" name="password" >
    </div> -->
    <div>
      <span>资源描述：</span>
      <textarea rows ="3" name="alt"> </textarea>
    </div>
    <!-- <input type="hidden" name="id" > 传送隐藏id -->            
    <div><input  type="submit" value="保存"></div>                        
</form>

Share:网盘 sta:1
<form method="post" action="<?php echo U('Home/Share/panAdd');?>">      
    <div>
      <span>网盘名称：</span>
      <input type="text" name="name">
    </div>
    <div>
      <span>网盘链接：</span>
      <input type="text" name="url" value="">&nbsp;<input type="text" name="password" >
    </div>
    <!-- <div>
    	<span>密码：</span>
    	<input type="text" name="password" >
    </div> -->
    <div>
      <span>资源描述：</span>
      <textarea rows ="3" name="alt"> </textarea>
    </div>
    <!-- <input type="hidden" name="id" > 传送隐藏id -->            
    <div><input  type="submit" value="保存"></div>                        
</form>
Share:文档 sta:3
<!-- <form action="/Hit/index.php/Home/Share/upload" enctype="multipart/form-data" method="post" > -->
<form method="post" action="<?php echo U('Home/Share/wordAdd');?>" enctype="multipart/form-data">
    <div>
      <span>文档名称：</span>
      <input type="text" name="name">
    </div>
    <div>
      <span>文档：</span>
      <input type="file" name="url" value="{url}">&nbsp;<!-- <input type="text" name="password" > -->
    </div>
    <div>
      <span>文档描述：</span>
      <textarea rows ="3" name="alt"> </textarea>
    </div>
    <!-- <input type="hidden" name="id" > 传送隐藏id -->            
    <div><input  type="submit" value="保存"></div>  
</form>
<!-- Share:图片 sta:3
<form action="<?php echo U('Home/Share/wordAdd');?>" enctype="multipart/form-data" method="post" >
<input type="text" name="name" />
<input type="file" name="photo" />
<input type="submit" value="提交" > -->
</form>
</body>
</html>