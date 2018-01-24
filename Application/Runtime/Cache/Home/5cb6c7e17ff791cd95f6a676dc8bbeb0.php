<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<!-- <form method="post" action="">
	    <ul>
	        <li><strong>当前密码：</strong><input type="password" name="pwd" id="password" class="text validate[required,minSize[6],maxSize[15],custom[onlyLetterNumber]]" ></li>
	        <li><strong>新的密码：</strong><input type="password" name="newpwd" class="text validate[required,minSize[6],maxSize[15],custom[onlyLetterNumber]]" id="new_password"></li>
	        <li><strong>确定密码：</strong><input type="password" name="rqpwd" class="text validate[required,equals[new_password]]" id="rq_passwd" ></li>
	        <input type="submit" value="更改密码" class="btn-green" >
	    </ul>
	</form> -->
</div>
<!-- 更改个性签名 -->
 <div>
 	<form method="post" action="<?php echo U('Home/User/doSign');?>">
 		<?php if(is_array($result)): foreach($result as $key=>$v): ?><textarea name="sign"><?php echo ($v["sign"]); ?></textarea>
		    <td>
		    	<input type="submit" value="提交"  >
		    </td><?php endforeach; endif; ?>
	</form>       
</div>
<!-- 结束 -->


<!-- 更改头像 -->
<div>
    <div class="old-avater fl">
       <img src="/Hit/Uploads/Avater/<?php echo (session('avaterPath')); ?>" alt="">
    </div>
    <form id="avater_form">
        <img src="" alt="" id="avater_image"  width="322px" height="236px" />
        <input type="file" name="avater" value="选择头像">
    </form>

    <form action="<?php echo U('Home/User/modifyAvater');?>" method="post">
        <input type="hidden" id="w" name="w">
        <input type="hidden" id="h" name="h">
        <input type="hidden" id="x" name="x">
        <input type="hidden" id="y" name="y">
        <input type="submit" value="更改头像" class="btn-green" style="display: block;">
    </form>
</div>
<!--  -->
</body>
</html>