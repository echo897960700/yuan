<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>HouDun许愿墙</title>
	<link rel="stylesheet" href="/Hit/Public/Css/index.css" />
	<script type="text/javascript" src='/Hit/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='/Hit/Public/Js/index.js'></script>
	<script type="text/javascript">
		var handleUrl = '<?php echo U("Home/Wish/handle",'','');?>';
	</script>
	
</head>
<body>
	<div id='top'>
		<span id='send'></span>
	</div>
	<div id='main'>
	<?php if(is_array($wish)): foreach($wish as $k=>$v): ?><dl class='paper a<?php echo mt_rand(1,5);?>'>
			<dt>
				<span class='username'><?php echo ($v["username"]); ?></span>
				<span class='num'>No.<?php echo ($v["id"]); ?></span>
			</dt>
			<dd class='content'><?php echo ($v["content"]); ?></dd>
			<dd class='bottom'>
				<span class='time'><?php echo (date('y-m-d H:i', $v["time"])); ?></span>
				<a href="" class='close'></a>
			</dd>
		</dl><?php endforeach; endif; ?>	
	</div>

	<div id='send-form'>
		<p class='title'><span>许下你的愿望</span><a href="" id='close'></a></p>
		<form action="" name='wish'>
			<p>
				<label for="username">昵称：</label>
				<input type="text" name='username' id='username'/>
			</p>
			<p>
				<label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
				<textarea name="content" id='content'></textarea>
				<div id='phiz'>
					<img src="/Hit/Public/images/phiz/zhuakuang.gif" alt="抓狂" />
					<img src="/Hit/Public/images/phiz/baobao.gif" alt="抱抱" />
					<img src="/Hit/Public/images/phiz/haixiu.gif" alt="害羞" />
					<img src="/Hit/Public/images/phiz/ku.gif" alt="酷" />
					<img src="/Hit/Public/images/phiz/xixi.gif" alt="嘻嘻" />
					<img src="/Hit/Public/images/phiz/taikaixin.gif" alt="太开心" />
					<img src="/Hit/Public/images/phiz/touxiao.gif" alt="偷笑" />
					<img src="/Hit/Public/images/phiz/qian.gif" alt="钱" />
					<img src="/Hit/Public/images/phiz/huaxin.gif" alt="花心" />
					<img src="/Hit/Public/images/phiz/jiyan.gif" alt="挤眼" />
				</div>
			</p>
			<span id='send-btn'></span>
			<!-- <input type="submit" /> -->
		</form>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>
</html>