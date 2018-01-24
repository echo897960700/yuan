<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>猿客栈--在线Web学习交互新阵地</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Yuan/Public/Index/common/images/bitbug_favicon.ico">
<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/common/css/common.css">
<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/common/css/font-awesome.min.css" />
<!-- 瀑布流css -->
<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/exper/css/default.css">
<!-- add弹出框 -->
<script type="text/javascript" src="/Yuan/Public/Index/common/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script> -->
<script type="text/javascript" src="/Yuan/Public/Index/exper/js/jquery.layerModel.js"></script>
<link type="text/css" rel="stylesheet" href="/Yuan/Public/Index/exper/css/layerModel.css"/>
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
<!-- 浏览次数 -->
<script type='text/javascript' src='<?php echo U("Home/Exper/clickNum",array("id"=>$result["id"]));?>'></script>
<!-- 打开心得展示 -->

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
        <div id="tit"> 
            <ul>
                <li>正视经历，直达巅峰</li>
            </ul>
        </div>
    	<!-- 瀑布流 -->
        <div class="pubuliu">
            
            <section id="gallery-wrapper">
                <article class="white-panel">
                    <a href="javascript:void(0)" id="demoBtn1"><img src="/Yuan/Uploads/experpic/add.jpg" class="thumb" title="我用经历告诉你！"/></a>
                    <h1><a href="javascript:void(0)" id="demoBtn1">我用经历告诉你！</a></h1>
                    <p></p>
                    <p id="biaofu">
                       <span title="请登录"><i class="fa fa-plus-square" style="margin-right:5px;"></i>请登录后方可添加！</span>
                    </p>
                </article>
            <?php if(is_array($result)): foreach($result as $key=>$v): ?><article class="white-panel"> 
                    <a href="/Yuan/index.php/Home/Exper/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>"><img src="/Yuan/Uploads/experpic/<?php echo ($v["experpic"]); ?>" class="thumb" title="<?php echo ($v["title"]); ?>"/></a>
                    <h1><a href="/Yuan/index.php/Home/Exper/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></h1>
                    <p><?php echo (msubstr($v["story"],0,41,'utf-8',true)); ?></p>
                    <p id="biaofu">
                        <span title="浏览数" ><i class="fa fa-eye"></i>&nbsp;<?php echo ($v["click"]); ?></span>&nbsp;&nbsp;
                        <span title="评论数">
                        <i class="fa fa-pencil-square-o" >&nbsp;<?php echo ($v["saycount"]); ?></i>
                        </span>
                    </p>
                </article><?php endforeach; endif; ?>
        </section>
    </div>
    
    
    <script>window.jQuery || document.write('<script src="/Yuan/Public/Index/exper/js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="/Yuan/Public/Index/exper/js/pinterest_grid.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#gallery-wrapper").pinterest_grid({
                no_columns: 5,/*一行几个*/
                padding_x: 10,
                padding_y: 10,
                margin_bottom: 50,
                single_column_breakpoint: 700
            });
            
        });
    </script>

    <!-- 心得添加弹出框 -->
    <div id="demo1">
    <form action="<?php echo U('Home/Exper/runAdd');?>" method="post" enctype="multipart/form-data" class="tk">
         <div class="pos">
             <div>
                    <label for="title">标题:</label>
                    <input type="text" id="title" name="title" placeholder="请输入你的标题"/>
             </div>
             <div>
                    <label for="zg">专攻:</label>
                    <input type="text" id="zg" name="specialize" placeholder="请输入你的专攻"/>
            </div>
            <div class="input-group xd">
                    <label for="xd" class="ha">心得:</label>
                    <textarea name="story" id="xd" rows="8" placeholder="在此分享你的学习相关心得"></textarea>
            </div>
            <div>
                    <label for="pic">封面:</label>
                    <input type="file" id="pic" name="photo"/>
                    <a href="#" class="pic_btn">上传封面</a>
            </div>
        </div>
        <input type="submit" class="form_btn" value="提交"/>
    </form>
</div>
    <!-- 心得添加弹出框结束 -->
    <!-- 心得展示 -->
    
<!-- 心得展示结束 -->
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