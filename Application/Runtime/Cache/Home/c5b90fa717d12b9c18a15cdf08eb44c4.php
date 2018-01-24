<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>猿客栈--在线Web学习交互新阵地</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Public/Index/common/images/bitbug_favicon.ico">
<link rel="stylesheet" type="text/css" href="/Public/Index/common/css/common.css" />
<link rel="stylesheet" href="/Public/Index/User/css/index.css" />

<link rel="stylesheet" type="text/css" href="/Public/style/Plug/Validation-Engine/validationEngine.jquery.css">
<link rel="stylesheet" type="text/css" href="/Public/script/Plug/artDialog/css/ui-dialog.css">
</head>
<body>
	<header>
            <div class="main">
                <!-- <div class="logo"></div> -->
                <div class="logo">
                    <a href="<?php echo U('Home/Index/index');?>">
                        <img src="/Public/Index/Index/images/logo.png" title="在线Web学习交互新阵地" class="logo" />
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
	<div id="main" style="height:500px;">
        <div class="content" style="height:450px;">
        <h1 class="ht" id="ht">猿客栈注册</h1>
            <!-- 主体左边开始 -->
        <div id="left">
            <form id="regdata">
            <div class="frm_control_group">
                 <label for="uname" class="frm_lable"><span class="red">*</span>用户名&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <input type="text" name="uname"  class="validate[required,minSize[4],maxSize[15],ajax[checkFieldUnqiue]]" id="username" />
                 <span class="frm_input_box">
                    用户名由3到15个字符组成
                 </span><br/>
            </div>

            <div class="frm_control_group">
                 <label for="pwd" class="frm_lable"><span class="red">*</span>密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <input type="password" name="pwd" class="validate[required,minSize[6],maxSize[15],custom[onlyLetterNumber]]" id="password">                
                 <span class="frm_input_box">
                     由6到15位字母、数字组成，区分大小写
                 </span><br/>
            </div>

            <div class="frm_control_group">
                 <label for="rqpwd" class="frm_lable"><span class="red">*</span>确认密码</label>
                 <input type="password" name="rqpwd" class="validate[required,equals[password]]" id="rqpassword">
                 <span class="frm_input_box">
                     请再次输入密码
                 </span><br/>
            </div>

            <div class="frm_control_group">
                 <label for class="frm_lable"><span class="red">*</span>邮箱&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <input type="text" name="mail" class="validate[required,custom[email],ajax[checkFieldUnqiue]]" id="email">
                 <span class="frm_input_box">
                     请输入你的邮箱,验证通过后才可登录
                 </span><br/>
            </div>

             <div class="frm_control_group">
                 <label for class="frm_lable"><span class="red">*</span>姓名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <input type="text" name="truename" class="validate[required,custom[chinese],ajax[checkFieldUnqiue]]" id="truename">
                 <span class="frm_input_box">
                     请输入你的姓名,便于管理！
                 </span><br/>
            </div> 


            <div class="frm_control_group">
                <label for class="frm_lable">
                    <span class="red">*</span>验证码&nbsp;&nbsp;&nbsp;&nbsp;
                </label>

                 <input type="text" name="verifyCode" class="validate[required,custom[onlyLetterNumber]]" id="verifyCodeText" />
                 &nbsp;&nbsp;&nbsp;
                 <img src="/index.php/Home/User/getVerifyCode" alt="" class="verifyCodeImg" id="verifyCodeImg" />
                <span>
                    <a href="javascript:;" id="getVerifyCode">
                        看不清？点击换一张
                    </a>
                </span>
                 <!-- <span class="frm_input_box">
                     <p class="frm_tips">请输入验证码，完成注册</p>
                 </span> -->
                
            </div>

            <div class="reg-box">
                <input type="submit" value="注册" id="reg-button" style="float:left;" />
                <a href="/index.php/Home/User/Login" class="login-btn" style="float:left;">已有账号？点击登陆</a>
            </div>
        </form>
        </div>
        <!-- 主体左边结束 -->

        <!-- 主体右边开始 -->
        <div id="right">
            <div class="right1">
                <img src="/Uploads/blogpic/default.jpg" alt="" width="280px" height="340"> 
            </div>
        </div>
        
    </div>
    <!-- 主体结束 -->
		
        </div>        
	</div>

<!-- 主体容器结束 -->
<script type="text/javascript">
    var root = "/index.php";
</script>

<script type="text/javascript" src="/Public/script/Common/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/Public/script/Plug/Validation-Engine/jquery.validationEngine.js"></script>
<script type="text/javascript" src="/Public/script/Plug/Validation-Engine/jquery.validationEngine-zh_CN.js"></script>
<script type="text/javascript" src="/Public/script/User/register.js"></script>
<script type="text/javascript" src="/Public/script/Plug/artDialog/dist/dialog-min.js"></script>
</body>
</html>