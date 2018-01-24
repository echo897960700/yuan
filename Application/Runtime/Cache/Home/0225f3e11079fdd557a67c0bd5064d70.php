<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户登录</title>
	<link rel="stylesheet" type="text/css" href="/Hit/Public/style/Plug/Validation-Engine/validationEngine.jquery.css">
	<link rel="stylesheet" type="text/css" href="/Hit/Public/script/Plug/artDialog/css/ui-dialog.css"> 
	
	<script type="text/javascript">
		var root = "/Hit/index.php";
	</script>
</head>
<body>
	
	<div id="container">
			
		<form id="login-form">
			<ul>
				<li>用户登录</li>
				<li id="msg"></li><!-- 错误提示，请勿删 -->
				<li>
					<div>
						<img src="/Hit/Public/images/User/user.png" alt="" height="34px;" />
						<input type="text" name="uname" id="uname" class="login-input-style validate[required,minSize[4],maxSize[15]]">
					</div>
				</li>
				<li>
					<div class="login-input-box">
						<img src="/Hit/Public/images/User/pass.png" alt="" height="34px;" />
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
					<span>还不是会员？<a href="/Hit/index.php/Home/User/userReg">立即注册</a></span>
				</li>
			</ul>
		</form>

	</div>

	<div id="forgetDiv" style="display:none">
		<form id="forgetForm" style="margin-top:10px;">
			<div class="error-msg" style="margin-bottom:10px;color:red;margin-left:120px;">	</div><br/>
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

<script type="text/javascript" src="/Hit/Public/script/Common/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/Hit/Public/script/Plug/Validation-Engine/jquery.validationEngine.js"></script>
	<script type="text/javascript" src="/Hit/Public/script/Plug/Validation-Engine/jquery.validationEngine-zh_CN.js"></script>
	<script type="text/javascript" src="/Hit/Public/script/Plug/artDialog/dist/dialog-min.js"></script>
	<script type="text/javascript" src="/Hit/Public/script/User/login.js"></script>
</body>
</html>