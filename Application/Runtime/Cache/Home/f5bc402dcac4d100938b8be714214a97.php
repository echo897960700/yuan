<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>猿客栈--在线Web学习交互新阵地</title>
	<link rel="shortcut icon" href="/Public/Index/common/images/bitbug_favicon.ico">
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = '/Public/Ueditor/';
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth=800;
			window.UEDITOR_CONFIG.initialFrameHeight=500;
			window.UEDITOR_CONFIG.imageUrl="<?php echo U( 'Admin/Blog/upload');?>";
			UE.getEditor('content');
		}
	</script>
	<script type="text/javascript" src="/Public/Ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/Public/Ueditor/ueditor.all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/Index/blog/css/blog.css"> 
	<link rel="stylesheet" type="text/css" href="/Public/Index/common/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Index/blog/css/add.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Index/blog/css/font-awesome.min.css" />
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
<div id="main">
	<!-- 添加表格 -->
	<div class="sendform">
		<form action="<?php echo U('/Home/Blog/addBlog');?>" enctype="multipart/form-data" method="post">
			<ul>
				<li id="title">文章发布</li>
			</ul>
			<br/>
			<table>
				<tr>
					<td>所属分类：</td>
					<td>
						<select name="cid" class="select">
							<option value="">===请选择分类===</option>
							<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>标题：</td>
					<td>
						<input type="text" name="title" class="input" >
					</td>
				</tr>
				<tr>
					<td>博文封面：</td>
		      		<td>
		      			<input type="file" name="blogpic" value="" class="input">
		      		</td>
		      	</tr>
				<tr>
					<td colspan="2">
						<textarea name="content" id="content" ></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="保存添加" class="submit_btn">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<!-- 添加表格结束 -->
	<!-- 用户信息 -->
	<div class="userinfo">
	<?php if(is_array($user)): foreach($user as $key=>$v): ?><ul>
			<li id="facebg">
				<div class="pic">
					<img src="/Uploads/Avater/<?php echo ($v["avater_path"]); ?>" width="80px;" height="80px;" alt="" />
				</div>
			</li>
		</ul>
		<ul class="usercontent">
					
				<li>
					昵称： <a href="#"><?php echo ($v["username"]); ?></a>	
				</li>
				<li>
					地址：<a href="#"><?php echo ($v["location"]); ?></a>
				</li>
				<li>
					签名：<a href="#"><?php echo ($v["sign"]); ?></a>
				</li>
				<li>
					文章：<a href="#"><?php echo ($blogcount); ?>篇</a>
				</li>
			
		</ul><?php endforeach; endif; ?>
	</div>
	
	<!-- 用户信息结束 -->
	<!-- 用户发表的文章 -->
	<div class="userblog">
		<ul>
			<li id="blogbg">
				<a href="#">我的发布</a>
			</li>
		</ul>
		<ul class="zx_blog">
			<?php if(is_array($newblog)): foreach($newblog as $key=>$v): ?><li>
					<i class="fa fa-paper-plane"></i>&nbsp;<a href="/index.php/Home/Blog/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>&cid=<?php echo ($v["cid"]); ?>"><?php echo ($v["title"]); ?></a>
				</li><?php endforeach; endif; ?>
		</ul>
	</div>
	<!--  -->
	<!-- 清浮动 -->
	<div class="clear"></div>
</div>

        <footer>
          <div class="main">
            <div class="yq">
                <h3 class="yq_tiltle">
                      友情链接
                </h3>
                <ul class="yq_content">
                      <li><a href="#">广东农工商</a></li>
                      <li><a href="#">2016多迪杯</a></li>
                      <li><a href="#">CSDN社区</a></li>
                      <li><a href="#">风雪之隅</a></li>
                      <li><a href="#">PHP之道</a></li>
                      <li><a href="#">自学IT网</a></li>
                      <li><a href="#">博客园</a></li>
                      <li><a href="#">前端开发仓库</a></li>
                </ul>
            </div>
            <div class="js">
               <ul class="js_nav">
                   <li><span>关于我们</span><span>用户服务</span><span>联系合作</span><span><a href="<?php echo U('Admin/public/login');?>">后台登录</a></span></li>
                   <li>猿客栈，一个在线Web学习交互新阵地，欢迎您的加入。</li>
                   <li>Copyright© 2014-2016 Miecu.net. All Rights Reserved.</li>
                   <li>粤ICP备16016138号</li>
               </ul>
            </div>
          </div>
        </footer>
</body>
</html>