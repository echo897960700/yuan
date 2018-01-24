<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>猿客栈--在线Web学习交互新阵地</title>
	<link rel="shortcut icon" href="/Hit/Public/Index/common/images/bitbug_favicon.ico">
	<link rel="stylesheet" href="/Hit/Public/admin/public/css/common.css" />
</head>
<body>
	<form action="<?php echo U('Home/Category/sortCate');?>" method="post" >
		<table>
			<tr>
				<th>ID</th>
				<th>名称</th>
				<th>级别</th>
				<th>排序</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr>
					<th><?php echo ($v["id"]); ?></th>
					<th><?php echo ($v["html"]); echo ($v["name"]); ?></th>
					<th><?php echo ($v["level"]); ?></th>
					<th>
						<input type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>">
					</th>
					<th>
						<a href="<?php echo U('Home/Category/addCate', array('pid'=>$v['id']));?>">添加子分类</a>
						<a href="">修改</a>
						<a href="">删除</a>
					</th>
				</tr><?php endforeach; endif; ?>
			<tr>
				<td>
					<input type="submit" value="排序" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>