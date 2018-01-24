<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<!-- <link rel="stylesheet" type="text/css" href="/Hit/Public/style/Common/reset.css"> -->
	<link rel="stylesheet" type="text/css" href="/Hit/Public/style/Plug/Validation-Engine/validationEngine.jquery.css">
	<link rel="stylesheet" href="/Hit/Public/style/User/register.css" />
	<link rel="stylesheet" type="text/css" href="/Hit/Public/script/Plug/artDialog/css/ui-dialog.css">
	<title>用户注册</title>
</head>
<body>
<div id="top">
	<div class="top-box">
		<div class="logo">
   			<!-- <a href="/Hit/index.php"><img src="/Hit/Public/images/Common/logo.png" alt="logo"></a> -->
   			<div class="bor">账号注册</div>
   			
   		</div>
	</div>
</div>
 <!-- 网页头部结束 -->

   <!-- 主体容器 -->
<div id="container">
    <!-- 主体开始 -->
    <div id="main">
       <ul>
        <li>填写信息</li>
        <!-- <li>2 邮箱激活</li> -->
       </ul>
            
        
         <!-- 主体左边开始 -->
        <div id="left">
        	<form id="regdata">
	        <div class="frm_control_group">
	             <label for="uname" class="frm_lable"><span class="red">*</span>用户名</label>
	             <input type="text" name="uname"  class="validate[required,minSize[4],maxSize[15],ajax[checkFieldUnqiue]]" id="username" /><br/>
	             <span class="frm_input_box">
	                <p class="frm_tips">用户名由3到15个字符组成</p>
	             </span>
	        </div>

	        <div class="frm_control_group">
	             <label for="pwd" class="frm_lable"><span class="red">*</span>密码</label>
	             <input type="password" name="pwd" class="validate[required,minSize[6],maxSize[15],custom[onlyLetterNumber]]" id="password">
	             <br/>
	             <span class="frm_input_box">
	                 <p class="frm_tips">由6到15位字母、数字组成，区分大小写</p>
	             </span>
	        </div>

	        <div class="frm_control_group">
	             <label for="rqpwd" class="frm_lable"><span class="red">*</span>确认密码</label>
	             <input type="password" name="rqpwd" class="validate[required,equals[password]]" id="rqpassword"><br/>
	             <span class="frm_input_box">
	                 <p class="frm_tips">请再次输入密码</p>
	             </span>
	        </div>

	        <div class="frm_control_group">
	             <label for class="frm_lable"><span class="red">*</span>邮箱</label>
	             <input type="text" name="mail" class="validate[required,custom[email],ajax[checkFieldUnqiue]]" id="email"><br/>
	             <span class="frm_input_box">
	                 <p class="frm_tips">请输入你的邮箱,验证通过后才可登录</p>
	             </span>
	        </div>

	     <!--    <div class="frm_control_group">
	          <label for class="frm_lable"><span class="red">*</span>学号</label>
	          <input type="text" name="stuid" class="validate[required,custom[number],ajax[checkFieldUnqiue]]" id="stu_id" /><br/>
	          <span class="frm_input_box">
	              <p class="frm_tips">请输入你的学号,便于教师教学</p>
	          </span>
	     </div> -->

	         <div class="frm_control_group">
	             <label for class="frm_lable"><span class="red">*</span>姓名</label>
	             <input type="text" name="truename" class="validate[required,custom[chinese],ajax[checkFieldUnqiue]]" id="truename"><br/>
	             <span class="frm_input_box">
	                 <p class="frm_tips">请输入你的姓名,便于教师教学</p>
	             </span>
	        </div> 

	      <!--    <div class="frm_control_group">
	         <label for class="frm_lable"><span class="red">*</span>班级</label>
	         	<div class="class-select">
	      		            	<select id="user-dep" class="user-class validate[required]" name="userdep" id="user-dep">
	      		            		<option value="">选择系别</option>
	      		            		<option value="计算机系">计算机系</option>
	      		            		<?php if(is_array($deps)): $i = 0; $__LIST__ = $deps;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deps): $mod = ($i % 2 );++$i;?><option value="<?php echo ($deps["id"]); ?>"><?php echo ($deps["department"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	      		            	</select>
	      
	      		            	<select id="user-spe" class="user-class validate[required]" name="usersep"  id="user-spe">
	      		            		<option value="">选择专业</option>
	      		            	</select>
	      
	      		            	<select id="user-cla" class="user-class validate[required]" name="usercla"  id="user-cla">
	      		            		<option value="">选择班级</option>
	      		            	</select>
	         	</div>
	         
	         <span class="frm_input_box">
	             <p class="frm_tips">请选择你所在班级，便于教师教学</p>
	         </span>
	      	        </div> -->

	        <div class="frm_control_group">
	        	<label for class="frm_lable">
	        		<span class="red">*</span>验证码:
	        	</label>

	             <input type="text" name="verifyCode" class="validate[required,custom[onlyLetterNumber]]" id="verifyCodeText" />
	             &nbsp;&nbsp;&nbsp;
	             <img src="/Hit/index.php/Home/User/getVerifyCode" alt="" class="verifyCodeImg" id="verifyCodeImg" />
				<span>
	        		<a href="javascript:;" id="getVerifyCode">
	        			看不清？点击换一张
	        		</a>
	        	</span>
	             <span class="frm_input_box">
	                 <p class="frm_tips">请输入验证码，完成注册</p>
	             </span>
	        	
	        </div>

			<div class="reg-box">
				<input type="submit" value="注册" id="reg-button"/>
			</div>
		</form>
	 	</div>
        <!-- 主体左边结束 -->

        <!-- 主体右边开始 -->
        <div id="right">
        	<div>
        		<a href="/Hit/index.php/Home/User/Login">已有账号？点击登陆</a>
        	</div>
        </div>
        
    </div>
    <!-- 主体结束 -->
 

 <!-- 主体容器结束 -->
<script type="text/javascript">
	var root = "/Hit/index.php";
</script>

<script type="text/javascript" src="/Hit/Public/script/Common/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/Hit/Public/script/Plug/Validation-Engine/jquery.validationEngine.js"></script>
<script type="text/javascript" src="/Hit/Public/script/Plug/Validation-Engine/jquery.validationEngine-zh_CN.js"></script>
<script type="text/javascript" src="/Hit/Public/script/User/register.js"></script>
<script type="text/javascript" src="/Hit/Public/script/Plug/artDialog/dist/dialog-min.js"></script>

</body>
</html>