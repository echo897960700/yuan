<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>猿客栈--在线Web学习交互新阵地</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Yuan/Public/Index/common/images/bitbug_favicon.ico">
<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/common/css/common.css" />
<link rel="stylesheet" href="/Yuan/Public/Index/User/css/index.css" />

<link rel="stylesheet" type="text/css" href="/Yuan/Public/style/Plug/Validation-Engine/validationEngine.jquery.css">
    <link rel="stylesheet" type="text/css" href="/Yuan/Public/script/Plug/artDialog/css/ui-dialog.css"> 
    
    <script type="text/javascript">
        var root = "/Yuan/index.php";
    </script>

</head>
    <body>
    	<header>
            <div class="main">
                <!-- <div class="logo"></div> -->
                <div class="logo">
                    <a href="<?php echo U('Home/Index/index');?>">
                        <img src="/Yuan/Public/Index/Index/images/logo.png" title="在线Web学习交互新阵地" class="logo" />
                    </a>
                </div>
                <ul class="nav">
					<li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                    <li><a href="<?php echo U('Home/Blog/index');?>">文章</a></li>
                    <li><a href="<?php echo U('Home/Exper/index');?>">心得</a></li>
                    <li><a href="<?php echo U('Home/Share/index');?>">共享</a></li>                   
                    <?php if(empty($_SESSION['username'])): else: ?>
                    <li><a href="<?php echo U('Home/Search/sechUser');?>">发现</a></li>
                    <li><a href="<?php echo U('Home/PersonalCenter/index');?>">个人空间</a></li><?php endif; ?>
                </ul>
                <div class="login">
                    <?php if(empty($_SESSION['username'])): ?><a href="<?php echo U('Home/User/login/');?>">登录</a>
                        <a href="<?php echo U('Home/User/userReg');?>">注册</a>
                        <!--<a href="<?php echo U('Admin/public/login');?>">后台登录</a>-->
                    <?php else: ?>
                    <?php if($_SESSION['group_id']== 3 ): ?><a href=""><?php echo (session('username')); ?><span>，你好！</span></a>
                    <a href="<?php echo U('Home/User/logout');?>">注销</a>
                    <?php else: ?>
                        <if condition="$Think.session.group_id eq 3 ">  
                        <a href=""><?php echo (session('username')); ?><span>，你好！</span></a>
                        <a href="<?php echo U('Home/User/logout');?>">注销</a>
                        <!--<a href="<?php echo U('Admin/public/login');?>">后台登录</a>--><?php endif; endif; ?>
                </div>
                </div>
        </header>
<div id="main">
	<div class="content">
    <h1 class="ht" id="ht">猿客栈登录</h1>
        <div id="form1">		    
            <form id="login-form">
                <ul>
                    <li id="msg"></li><!-- 错误提示，请勿删 -->
                    <li>
                        <div>
                            <div class="yuan"><img src="/Yuan/Public/images/User/user.png" alt="" height="40px;" /></div>
                            <input type="text" name="uname" id="uname" class="login-input-style validate[required,minSize[4],maxSize[15]]">
                        </div>
                    </li>
                    <li>
                        <div class="login-input-box">
                            <div class="yuan"><img src="/Yuan/Public/images/User/pass.png" alt="" height="40px;" /></div>
                            <input type="password" name="pwd" id="pwd" class="login-input-style" class="login-input-style validate[required,minSize[6],maxSize[15]]">
                        </div>
                    </li>
                    <li>
                        <span class="auth"><input type="checkbox" name="auth" />自动登录</span>
                        <span class="forget"><a href="javascript:;" id="forgetPass">忘记密码?</a></span>
                    </li>
                    <li>
                        <input type="submit" class="login-btn" value="登录">
                    </li>
                    <li class="userReg">
                        <span>还不是会员？<a href="/Yuan/index.php/Home/User/userReg">立即注册</a></span>
                    </li>
                </ul>
            </form>
        </div>
	    <div class="right">
            <img src="/Yuan/Uploads/blogpic/default.jpg" alt="" width="500px" height="280"> 
        </div>
</div>
    <div id="forgetDiv" style="display:none">
        <form id="forgetForm" style="margin-top:10px;">
            <div class="error-msg" style="margin-bottom:10px;color:red;margin-left:120px;"> </div><br/>
            用户名：<input type="text" name="username" class="input-style validate[required]" style="width:300px;border-radius:0px;" />
            <br/>
            <br/>

            <br/>

            邮 &nbsp;&nbsp;箱：&nbsp;<input type="text" name="email" class="input-style validate[required,custom[email]]" style="width:300px;border-radius:0px;"/>
            <br/>
            <input type="submit" value="找回密码" class="button button-glow button-rounded button-raised button-primary" style="margin-top:30px;margin-left:120px;">
        </form>
    </div>
</div>
<script type="text/javascript" src="/Yuan/Public/script/Common/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="/Yuan/Public/script/Plug/Validation-Engine/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="/Yuan/Public/script/Plug/Validation-Engine/jquery.validationEngine-zh_CN.js"></script>
    <script type="text/javascript" src="/Yuan/Public/script/Plug/artDialog/dist/dialog-min.js"></script>
    <script type="text/javascript" src="/Yuan/Public/script/User/login.js"></script>
    </body>
</html>