<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="<?php echo U('Home/Exper/runAdd');?>">
	<table>
		<tr>
			<td>标题:</td>
			<td>
				<input type="text" name="title" value="">
			</td>
		</tr>
		<!-- <tr>
			<td>start time：</td>
			<td>
				<input type="text" name="starttime" value="">
			</td>
		</tr>
		<tr>
			<td>how long？</td>
			<td>
				<input type="text" name="learntime" value="">
			</td>
		</tr> -->
		<tr>
			<td>专攻:</td>
			<td>
				<input type="text" name="specialize" value="">
			</td>
		</tr>
		<!-- <tr>
			<td>identity:</td>
			<td>
				<input type="text" name="identity" value="">
			</td>
		</tr> -->
		<tr>
			<td>心得:</td>
			<td>
				<textarea name="story"></textarea>
			</td>
		</tr>
		<tr>
			<td>封面：</td>
			<td>
				<input type="file" name="experpic" />
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="提交">
			</td>
		</tr>
	</table>
</form>
</body>
</html>