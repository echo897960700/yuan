<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>猿客栈--在线Web学习交互新阵地</title>
<link rel="shortcut icon" href="/Public/Index/common/images/bitbug_favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Index/common/css/common.css">
<link rel="stylesheet" href="/Public/Index/share/css/user.css" />
<!-- add弹出框 -->
<script type="text/javascript" src="/Public/Index/common/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Index/share/js/jquery.layerModel.js"></script>
<link type="text/css" rel="stylesheet" href="/Public/Index/share/css/layerModel.css"/>
<script>
    $(function(){
        
        $("#demoBtn1").click(function(){
            $("#demo1").layerModel();
        });
        $("#demoBtn2").click(function(){
            $("#demo2").layerModel();
        });
    });
</script>
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
<div class="content" style="padding-top:150px;">
	<div class="left">
		<div class="user">			
			<div class="user_pic">
				<img src="/Uploads/Avater/<?php echo ($userface[avater_path]); ?>" alt="" />
			}
			</div>
			<div class="user_name">
				<h4>共享文档资源，猿来有你</h4>
			</div>
		
		<div class="user_web">
			<!-- <div class="web_header">
				<h2 style="text-align:center;">我的网站</h2>
			</div> -->
			<div class="web_content">
				<div class="wrapper">
				<a href="javascript:void(0)" id="demoBtn1" class="tag">共享文档资源，猿来有你！+</a>
					<?php if(is_array($myurl)): foreach($myurl as $key=>$v): ?><a href="<?php echo ($v["url"]); ?>" class="tag" target="_blank"><?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
	<div class="right">
		<h2 style="text-align:center;padding-top:15px;">文档客栈</h2>
		<section id="gallery-wrapper">
		<?php if(is_array($res)): foreach($res as $key=>$v): ?><article class="white-panel">
				<div class="content_info">
					<a href="/Uploads/share/<?php echo ($v["url"]); ?>" style="font-size:18px;font-weight:bold;" target="_blank"><?php echo ($v["name"]); ?></a>&nbsp;<?php echo ($v["alt"]); ?>
					<span></span>
				</div>
			</article><?php endforeach; endif; ?>
    </section>
	</div>
</div>    
<script>window.jQuery || document.write('<script src="/Public/Index/share/js/jquery-1.11.0.min.js"><\/script>')</script>
	<script src="/Public/Index/share/js/pinterest_grid.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#gallery-wrapper").pinterest_grid({
				no_columns: 4,/*一行几个*/
                padding_x: 10,
                padding_y: 10,
                margin_bottom: 50,
                single_column_breakpoint: 700
			});
			
		});
	</script>
	<!-- 心得添加弹出框 -->
    <div id="demo1">
   		<div class="xd_ku">
	    <form method="post" action="<?php echo U('Home/Share/wordAdd');?>" enctype="multipart/form-data">
		    <div>
		      <span>文档名称：</span>
		      <input type="text" class="p_input" name="name" placeholder="请输入文档名称" />
		    </div>
		    <div>
		      <span>文档封面：</span>
		      <input type="file" class="p_input" name="url" value="{url}" />&nbsp;
		    </div>
		    <div>
		      <span>文档描述：</span>
		      <textarea rows ="3" name="alt" class="p_text" style="margin-top:-17px;margin-left:84px;" placeholder="请输入文档名称" > </textarea>
		    </div>        
		    <div><input  type="submit" class="form_btn" value="保存"></div>  
		</form>
		</div>
	</div>
    <!-- 心得添加弹出框结束 -->	
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