<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = '/Hit/Public/Ueditor/';
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth=800;
			window.UEDITOR_CONFIG.initialFrameHeight=500;
			window.UEDITOR_CONFIG.imageUrl="<?php echo U( 'Admin/Blog/upload');?>";
			UE.getEditor('content');
		}
	</script>
	<script type="text/javascript" src="/Hit/Public/Ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/Hit/Public/Ueditor/ueditor.all.min.js"></script>
	<link rel="stylesheet" href="/Hit/Public/admin/public/css/common.css" />
</head>
<body>
<form action="<?php echo U('/Home/Blog/addBlog');?>" method="post">
	<table>
		<tr>
			<th colspan="2">博文发布</th>
		</tr>
		<tr>
			<td>所属分类：</td>
			<td>
				<select name="cid">
					<option value="">===请选择分类===</option>
					<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
		</tr>
		<!-- <tr>
			<td>博文属性：</td>
			<td>
				<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><label style="margin-right:10px;">
						<input type="checkbox" name="aid[]" value="<?php echo ($v["id"]); ?>" />&nbsp;<?php echo ($v["name"]); ?>
					</label><?php endforeach; endif; ?>
			</td>
		</tr>
		<tr>
			<td>点击次数：</td>
			<td>
				<input type="text" name="click" value="0">
			</td>
		</tr> -->
		<tr>
			<td>标题：</td>
			<td>
				<input type="text" name="title">
			</td>
		</tr>
		<tr>
			<td>
				<textarea name="content" id="content"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="保存添加">
			</td>
		</tr>
	</table>
</form>


</body>
</html>