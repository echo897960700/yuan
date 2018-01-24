<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>猿客栈--在线Web学习交互新阵地</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Public/Index/common/images/bitbug_favicon.ico">
<link rel="stylesheet" type="text/css" href="/Public/Index/common/css/common.css"/>
<link rel="stylesheet" href="/Public/Index/common/css/font-awesome.min.css" />
<link rel="stylesheet" href="/Public/Index/blog/css/main.css" />


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
<div class="content">
	<div class="left">
		<!-- 心得展示 -->
        <?php if(is_array($result)): foreach($result as $key=>$v): ?><div class="left1">
			<h1><?php echo ($v["title"]); ?></h1>
			<div class="info">
				<span><?php echo ($v["username"]); ?></span>&nbsp;&nbsp;
				发布于&nbsp;<span><?php echo (date('Y-m-d H:i:s',$v["addtime"])); ?></span>&nbsp;&nbsp;专攻:&nbsp;<span><?php echo ($v["specialize"]); ?></span>&nbsp;&nbsp;点击量：<span><script type='text/javascript' src='<?php echo U("Exper/clickNum",array("id"=>$v["id"]));?>'></script></span>
			</div>
			<div class="text">
                <div class="content_pic">
                    <img src="
                        <?php if($v[experpic]): ?>/Uploads/experpic/<?php echo ($v["experpic"]); ?>
                        <?php else: ?>
                        /Uploads/experpic/default.jpg<?php endif; ?>" alt="<?php echo ($v["title"]); ?>">
                </div>
				<?php echo ($v["story"]); ?>
                <div class="dianping">
                <a href='<?php echo U("Home/Exper/clickgood",array("id"=>$v["id"]));?>'><i class="fa fa-thumbs-o-up"></i></a><?php echo ($v["good"]); ?>
                &nbsp;&nbsp;
               <a href='<?php echo U("Home/Exper/clickbad",array("id"=>$v["id"]));?>'> <i class="fa fa-thumbs-o-down"></i></a>&nbsp;<?php echo ($v["bad"]); ?> 
               </div>
			</div>
		</div>
    <!-- 心得展示结束 -->
    <!-- 评论区 -->
    <div class="left2">
        <div class="pinglun">
            <h4>网友评论<span>让点评成为一种习惯！</span></h4>
            <form action="<?php echo U('Home/Exper/doSay');?>" method="post">
                <textarea name="content" id="p_l" cols="30" rows="10"></textarea>
                <input type="hidden" name="eid" value="<?php echo ($v["id"]); ?>">
                 <input type="hidden" name="uid" value="<?php echo session('UID') ?>">
                <input type="submit" class="fs" value="发送"/>
            </form>
        </div>

        
        <div class="liuyan">
            <div class="liuyan_title">
                <h4>全部留言</h4>
            </div>
            <ul class="liuyan_nav">
               <!--<foreach name="say" item="v">
               <li>
                    <div class="pic">
                        <img src="
                        <?php if($v[avater_path]): ?>/Uploads/Avater/<?php echo ($v["avater_path"]); ?>
                        <?php else: ?>
                        /Uploads/Avater/youke.jpg<?php endif; ?>
                        " alt="" />
                    </div>

                    <div class="con">
                        <h5><?php echo ($v["username"]); echo ($v["youke"]); ?></h5><span><?php echo (date('Y-m-d H:i:s',$v["time"])); ?></span>
                        <p><?php echo ($v["content"]); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>&nbsp;(0)&nbsp;&nbsp;
                        <i class="fa fa-share"></i>&nbsp;(0)&nbsp;&nbsp;
                        <a href="#"><i></i><span><?php echo ($selfadd); ?></span></a>
                    </div>
                    <div class="clear"></div>
                </li><?php endforeach; endif; ?>
				-->
				<?php if(is_array($say)): foreach($say as $key=>$v): ?><li>
						<div class="pic">
							<img src="
							<?php if($v[avater_path]): ?>/Uploads/Avater/<?php echo ($v["avater_path"]); ?>
							<?php else: ?>
							/Uploads/Avater/youke.jpg<?php endif; ?>
							" alt="" />
						</div>

						<div class="con">
							<h5><?php echo ($v["username"]); echo ($v["youke"]); ?></h5><span><?php echo (date('Y-m-d H:i:s',$v["time"])); ?></span>
							<p><?php echo ($v["content"]); ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-thumbs-up"></i>&nbsp;(0)&nbsp;&nbsp;
							<i class="fa fa-share"></i>&nbsp;(0)&nbsp;&nbsp;
							<a href="#"><i></i><span><?php echo ($selfadd); ?></span></a>
						</div>
						<div class="clear"></div>
					</li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    <!-- 评论区结束 -->
</div> 
	
	<div class="right">
        <div class="right1">
            <h4 class="right1_title">
                热门心得
                <a href="/index.php/Home/Exper/index/id/<?php echo ($id); ?>">更多热门心得</a>
            </h4>
            <div class="clear"></div>
            <ul class="right1_nav">
                <?php if(is_array($connectexper)): foreach($connectexper as $key=>$v): ?><li>
                        <a href="/index.php/Home/Exper/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>" class="remen_pic search-works-img">
                            <img src="
                                <?php if($v[experpic]): ?>/Uploads/experpic/<?php echo ($v["experpic"]); ?>
                                <?php else: ?>
                                /Uploads/experpic/default.jpg<?php endif; ?>" alt="<?php echo ($v["title"]); ?>">
                        </a>
                        <a href="/index.php/Home/Exper/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>" class="remen_text">
                            <?php echo ($v["title"]); ?>
                        </a>
                    </li><?php endforeach; endif; ?>
            </ul>
            <div class="clear"></div>
        </div>
   </div>
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