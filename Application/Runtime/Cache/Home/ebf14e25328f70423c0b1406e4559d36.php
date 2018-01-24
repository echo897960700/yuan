<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>猿客栈--在线Web学习交互新阵地</title>
	<link rel="shortcut icon" href="/Yuan/Public/Index/common/images/bitbug_favicon.ico">
	<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/common/css/common.css">
	<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/share/css/index.css">
</head>
<body>
<header>
            <div class="main">
                <!-- <div class="logo"></div> -->
                <div class="logo">
                    <a href="<?php echo U('Home/Index/index');?>">
                        <img src="/Yuan/Public/Index/Index/images/logo.png" title="在线Web学习交互新阵地" class="logo" />
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
<div class="content">
	<div class="content_title">
		<h1>共享资源，让知识传递</h1>
	</div>
	<ul class="share_nav">
		<li class="share">
			<a href="<?php echo U('Home/share/learnweb');?>">
			    <div class="pic">
			     	<img src="/Yuan/Public/Index/share/images/left1.jpg" alt="" />
                    <div class="text">
                         <h3>学习网站</h3>
                    </div>
                    <div class="line"></div>
    			</div>
			</a>
			<ul class="text_nav">
			<?php if(is_array($res)): foreach($res as $key=>$v): ?><li>
               	 	<a href="<?php echo ($v["url"]); ?>" target="_blank">[<?php echo ($v["name"]); ?>]<?php echo ($v["alt"]); ?></a>
                </li><?php endforeach; endif; ?>                            
            </ul>
		</li>
            
        <li class="share">
			<a href="<?php echo U('Home/share/learnres');?>">
			    <div class="pic">
			     	<img src="/Yuan/Public/Index/share/images/left1.jpg" alt="" />
                    <div class="text">
                         <h3>网盘资源</h3>
                    </div>
                    <div class="line"></div>
    			</div>
			</a>
			<ul class="text_nav">
			<?php if(is_array($resu)): foreach($resu as $key=>$v): ?><li>
               	 	<a href="<?php echo ($v["url"]); ?>" target="_blank"><?php echo ($v["name"]); ?> <?php echo ($v["pass"]); ?></a>
                </li><?php endforeach; endif; ?>                            
            </ul>
		</li>
		    
		<li class="share">
			<a href="<?php echo U('Home/share/learnbook');?>">
			    <div class="pic">
			     	<img src="/Yuan/Public/Index/share/images/left1.jpg" alt="" />
                    <div class="text">
                         <h3>文档资源</h3>
                    </div>
                    <div class="line"></div>
    			</div>
			</a>
			<ul class="text_nav">
			<?php if(is_array($result)): foreach($result as $key=>$v): ?><li>
               	 	<a href="/Yuan/Uploads/share/<?php echo ($v["url"]); ?>"><?php echo ($v["name"]); ?> <?php echo ($v["pass"]); ?></a>
                </li><?php endforeach; endif; ?>                            
            </ul>
		</li> 

        

		    
        <div class="clear"></div>
	</ul>
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