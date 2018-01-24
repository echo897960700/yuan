<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>猿客栈--在线Web学习交互新阵地</title>
	<link rel="shortcut icon" href="/yuan/Public/Index/common/images/bitbug_favicon.ico">
	<link rel="stylesheet" type="text/css" href="/yuan/Public/Index/common/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/yuan/Public/Index/blog/css/blog.css"> 
	<link rel="stylesheet" type="text/css" href="/yuan/Public/Index/blog/css/class.css"> 
	<link rel="stylesheet" type="text/css" href="/yuan/Public/Index/common/css/font-awesome.min.css" />
	<script type='text/javascript' src='<?php echo U("/Blog/clickNum",array("id"=>$blog["id"]));?>'></script> 
</head>
<body>
<!-- 头部 -->
<header>
            <div class="main">
                <!-- <div class="logo"></div> -->
                <div class="logo">
                    <a href="<?php echo U('Home/Index/index');?>">
                        <img src="/yuan/Public/Index/Index/images/logo.png" title="在线Web学习交互新阵地" class="logo" />
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
<!-- 头部结束 -->
<!-- 主体 -->
<div id="main-container" class="container clearfix">
	<!-- 频道 -->
	<div class="tag-head">
		<div class="cate-num">
			<?php echo ($cate); ?>共有文章
			<br>
			<span class="num"><?php echo ($catecount); ?></span>篇
		</div>
		<div class="tag-bread"><?php echo ($cate); ?></div>
	</div>
	<!-- 频道结束 -->

	<!-- 排序 -->
	<div class="sort" _hover-ignore="1">
		<span _hover-ignore="1">排序：</span>
		<?php $id =$_GET['id']; ?>
		<a href="<?php echo U('Home/Blog/Catelist/id/'.$id,array('id'=>$v['id']));?>">最新发布</a>
		<a href="<?php echo U('Home/Blog/clickList/id/'.$id,array('id'=>$v['id']));?>">浏览最多</a>
		<div class="channel-all">
			<span>所有频道
				<em class="arrow-bottom"><i></i></em>
			</span>
			<div class="channel-item clearfix">
				<?php if(is_array($allcate)): foreach($allcate as $key=>$v): ?><a href="<?php echo U('Home/Blog/Catelist',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
			</div>
		</div>		
	</div>
	<!-- 排序结束 -->

	<!-- 文章放置 -->
		<ul id="post-list" class="search-works-list clearfix">
		<li>
			<a href="<?php echo U('/Home/Blog/Blog/');?>" title="" class="search-works-img" target="_blank">
			<img src="/yuan/Public/Index/blog/images/add.png" alt="#">
				<div class="bottom-cover">
					<span class="film-time"></span>
				</div>
			</a>
		<div class="works-text">
        <h4><a href="<?php echo U('/Home/Blog/Blog/');?>">添加博文</a></h4>
        <div class="works-ope">
	          <div class="fr">
	          	<div class="rating"></div>
	          </div>
	        <!--   <span title="评论数" style="margin-left:0;"><i class="fa fa-paper-plane"></i>18</span>
	          <span title="喜欢数">70</span> -->
	          <span title="请登录"><i class="fa fa-plus-square" style="margin-right:5px;"></i>请登录后方可添加！</span>
	        </div>
  		</div>
		</li>
		<!-- --------------------------------- -->
		<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><li>
				<a href="/yuan/index.php/Home/Blog/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>&cid=<?php echo ($v["cid"]); ?>" title="<?php echo ($v["title"]); ?>" class="search-works-img">
				<img src="
				<?php if($v[blogpic]): ?>/yuan/Uploads/blogpic/<?php echo ($v["blogpic"]); ?>
				<?php else: ?>
				/yuan/Uploads/blogpic/default.jpg<?php endif; ?>" alt="<?php echo ($v["title"]); ?>" width="268px;" height="180px;">
					<div class="bottom-cover">
						<span class="film-time"><i class="fa fa-yelp"></i><?php echo ($cate); ?></span>
					</div>
				</a>
			<div class="works-text">
	        <h4><a href="/yuan/index.php/Home/Blog/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>&cid=<?php echo ($v["cid"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></h4>
	        	<div class="works-ope">
			          <div class="fr">
			          	<div class="rating"></div>

			          </div>
			          <span title="浏览数" style="margin-left:0px;"><i class="fa fa-eye"></i>&nbsp;<?php echo ($v["click"]); ?></span>
			          <span title="评论数" style="margin-left:5px;">
			          <i class="fa fa-pencil-square-o" >&nbsp;<?php echo ($v["saycount"]); ?></i>
			          </span>
			          <span title="作者" class="writerpos" style="margin-left:5px;"><i class="fa fa-user"></i>&nbsp;<?php echo ($v["username"]); ?></span>
		        </div>
	  		</div>
			</li><?php endforeach; endif; ?>

</ul>
	<!-- 文章放置结束 -->
	<?php echo ($page); ?>
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