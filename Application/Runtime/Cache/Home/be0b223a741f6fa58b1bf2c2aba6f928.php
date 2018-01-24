<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!--==========创建分组==========-->

<form method="post" action="<?php echo U('Home/Search/addGroup');?>">
<h4>创建好友分组</h4>
<span>分组名称：</span>
<input type="text" name='name' id='gp_name'><br/>
<input type="submit" value="提交" />
</form>
    <!--==========创建分组==========-->

<!--==========加关注弹出框==========-->
<hr/>
<?php  $group = M('group')->where(array('uid'=>session('UID')))->select(); ?>
<div>
	<span>关注好友</span>
	<div>
		<span>好友分组：</span>
		<select name="gid">
			<option value="0">默认分组</option>
			
			<?php if(is_array($group)): foreach($group as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
		</select>
	</div>
	<div>
		<input type="hidden" name="follow">
		<a href="#">关注</a>
		<a href="#">取消</a>
	</div>
</div>
</body>
</html>