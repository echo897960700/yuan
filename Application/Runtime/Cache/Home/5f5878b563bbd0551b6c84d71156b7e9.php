<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/Hit/Public/Index/Index/css/index.css" />
<link rel="stylesheet" href="/Hit/Public/Index/Index/css/font-awesome.min.css" />
<script src="/Hit/Public/Index/Index/js/jquery.min.js"></script>
<script src="/Hit/Public/Index/Index/js/jquery.kinMaxShow-1.0.min.js"></script>
</head>
    <body>
<!--     	<header>
    		<div class="main">
    			<div class="logo">LOGO</div>
    			<ul class="nav">
    				<li><a href="#">话题</a></li>
    				<li><a href="#">活动</a></li>
    				<li><a href="#">产品</a></li>
    				<li><a href="#">小组</a></li>
    				<li><a href="#">发现</a></li>
    			</ul>
                                <form action="" class="search_form">
                                <input type="text" class="search" name="" placeholder="请输入搜索内容"/>
                                <a href="#" class="search_btn"><i class="fa fa-search"></i></a>
                                </form>
    			<div class="login">
                                        <a href="#">登录</a>
                                        <a href="#">注册</a>
                </div>
                </div>
    	</header> -->
      <header>
    <div class="main">
        <div class="logo">
            <a href="<?php echo U('Home/Index/index');?>">
                <img src="/Hit/Public/images/logo.jpg" width="40px" height="40px;" />
            </a>
        </div>
        <ul class="nav">
            <li><a href="<?php echo U('Home/Blog/index');?>">文章</a></li>
            <li><a href="<?php echo U('Home/Exper/index');?>">心得</a></li>
            <li><a href="<?php echo U('Home/Share/index');?>">共享</a></li>
            <li><a href="<?php echo U('Home/Search/sechUser');?>">发现</a></li>
            <?php if(empty($_SESSION['username'])): else: ?>
            <li><a href="<?php echo U('Home/PersonalCenter/index');?>">个人空间</a></li><?php endif; ?>
        </ul>
                        <form action="" class="search_form">
                        <input type="text" class="search" placeholder="请输入搜索内容"/>
                        <input type="button" class="search_btn" value="搜索"/>
                        </form>
        <div class="login">
			<?php if(empty($_SESSION['username'])): ?><a href="<?php echo U('Home/User/login/');?>">登录</a>
                <a href="<?php echo U('Home/User/userReg');?>">注册</a>
                <a href="<?php echo U('Admin/public/login');?>">后台登录</a>
            <?php else: ?>
            <?php if($_SESSION['group_id']== 3 ): ?><a href=""><?php echo (session('username')); ?><span>，你好！</span></a>
			<!-- <a href="<?php echo U('Home/PersonalCenter/index');?>">个人中心</a> -->
			<a href="<?php echo U('Home/User/logout');?>">用户注销</a>
			<!-- <a href="<?php echo U('Admin/public/login');?>">后台登录</a> -->
			<?php else: ?>
				<if condition="$Think.session.group_id eq 3 ">	
				<a href=""><?php echo (session('username')); ?><span>，你好！</span></a>
				<!-- <a href="<?php echo U('Home/VipCenter/index');?>">个人中心</a> -->
				<a href="<?php echo U('Home/User/logout');?>">用户注销</a>
				<a href="<?php echo U('Admin/public/login');?>">后台登录</a><?php endif; endif; ?>
		</div>
    </div>
</header>

        <div class="banner">
            <div id="kinMaxShow">
               <div> <img src="/Hit/Public/Index/Index/images/1_1.jpg" />
                  <div> <img class="sub_1_1" src="/Hit/Public/Index/Index/images/sub_1_1.png"  /> 
                          <img class="sub_1_2" src="/Hit/Public/Index/Index/images/sub_1_2.png" usemap="#Map_1_2"  border="0" />
                          <map name="Map_1_2" id="Map_1_2">
                              <area shape="rect" coords="2,96,106,123" href="#"/>
                          </map>
                  </div>
               </div>
               <div> <img src="/Hit/Public/Index/Index/images/2_2.jpg" />
                  <div> <img class="sub_2_1" src="/Hit/Public/Index/Index/images/sub_2_1.png"  /> 
                           <img class="sub_2_2" src="/Hit/Public/Index/Index/images/sub_2_2.png" usemap="#Map_2_2"  border="0" />
                          <map name="Map_2_2" id="Map_2_2">
                              <area shape="rect" coords="3,97,104,124" href="#" target="_blank"/>
                          </map>
                  </div>
               </div>
               <div> <img src="/Hit/Public/Index/Index/images/3_3.jpg"  />
                  <div> <img class="sub_3_1" src="/Hit/Public/Index/Index/images/sub_3_1.png"  /> 
                          <img class="sub_3_2" src="/Hit/Public/Index/Index/images/sub_3_2.png" usemap="#Map_3_2"  border="0" />
                           <map name="Map_3_2" id="Map_3_2">
                               <area shape="rect" coords="1,98,106,124" href="#" target="_blank"/>
                           </map>
                  </div>
               </div>
              </div>
        </div>
        <div class="content">
          <div class="content_top">
              <div class="story">
                    <a href="#" class="stoty_a">
                        <h2 class="text">
                           <span>12个强大的web服务器测试工具</span>
                        </h2>
                        <img src="/Hit/Public/Index/Index/images/pic1.jpg" alt="" />
                    </a>
              </div>
               <div class="story">
                    <a href="#" class="stoty_a">
                        <h2 class="text">
                           <span>12个强大的web服务器测试工具</span>
                        </h2>
                        <img src="/Hit/Public/Index/Index/images/pic2.jpg" alt="" />
                    </a>
              </div>
               <div class="story">
                    <a href="#" class="stoty_a">
                        <h2 class="text">
                           <span>12个强大的web服务器测试工具</span>
                        </h2>
                        <img src="/Hit/Public/Index/Index/images/pic3.jpg" alt="" />
                    </a>
              </div>
               <div class="story">
                    <a href="#" class="stoty_a">
                        <h2 class="text">
                           <span>12个强大的web服务器测试工具</span>
                        </h2>
                        <img src="/Hit/Public/Index/Index/images/pic4.jpg" alt="" />
                    </a>
              </div>
          </div>
          <div class="content_bottom">
              <div class="left">
                  <div class="left_top">
                       <div class="title1">
                           <img src="/Hit/Public/Index/Index/images/title1.png" alt="" />
                       </div>
                       <div class="con">
                              <a href="#">
                              <div class="pic">
                                  <img src="/Hit/Public/Index/Index/Images/pic.png" alt="" />
                              </div>
                              </a>
                              <div class="info">
                                    <a href="#">
                                    <h2>古典风情创意剪辑延时摄影 《品味维也纳》</h2>
                                    </a>
                                    <span><i class="fa fa-user"></i>  陈国龙</span>
                                    <p>岁月流转间，邂逅一曲蓝色多瑙河</p>
                                    <span class="tag"><i class="fa fa-tag"></i>&nbsp;javascript&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i>&nbsp;2016-03-11</span>
                                    <span class="comment"><i class="fa fa-comment-o"></i>&nbsp;0&nbsp;<i class="fa fa-heart"></i>&nbsp;30&nbsp;<i class="fa fa-map-marker"></i>&nbsp;0&nbsp;</span>
                              </div>
                              <div class="clear"></div>
                       </div>
                       <div class="con">
                              <a href="#">
                              <div class="pic">
                                  <img src="/Hit/Public/Index/Index/images/pic.png" alt="" />
                              </div>
                              </a>
                              <div class="info">
                                    <a href="#">
                                    <h2>古典风情创意剪辑延时摄影 《品味维也纳》</h2>
                                    </a>
                                    <span><i class="fa fa-user"></i>  陈国龙</span>
                                    <p>岁月流转间，邂逅一曲蓝色多瑙河</p>
                                    <span class="tag"><i class="fa fa-tag"></i>&nbsp;javascript&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i>&nbsp;2016-03-11</span>
                                    <span class="comment"><i class="fa fa-comment-o"></i>&nbsp;0&nbsp;<i class="fa fa-heart"></i>&nbsp;30&nbsp;<i class="fa fa-map-marker"></i>&nbsp;0&nbsp;</span>
                              </div>
                              <div class="clear"></div>
                       </div>
                       <div class="con">
                              <a href="#">
                              <div class="pic">
                                  <img src="/Hit/Public/Index/Index/images/pic.png" alt="" />
                              </div>
                              </a>
                              <div class="info">
                                    <a href="#">
                                    <h2>古典风情创意剪辑延时摄影 《品味维也纳》</h2>
                                    </a>
                                    <span><i class="fa fa-user"></i>  陈国龙</span>
                                    <p>岁月流转间，邂逅一曲蓝色多瑙河</p>
                                    <span class="tag"><i class="fa fa-tag"></i>&nbsp;javascript&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i>&nbsp;2016-03-11</span>
                                    <span class="comment"><i class="fa fa-comment-o"></i>&nbsp;0&nbsp;<i class="fa fa-heart"></i>&nbsp;30&nbsp;<i class="fa fa-map-marker"></i>&nbsp;0&nbsp;</span>
                              </div>
                              <div class="clear"></div>
                       </div>
                  </div>
                  <div class="left_bottom">
                      <div class="title1">
                          <img src="/Hit/Public/Index/Index/Images/title2.png" alt="" />
                      </div>
                      <div class="con1">
                          <ul>
                            <li>
                                <div class="img">
                                      <img src="/Hit/Public/Index/Index/images/img1.jpg" alt="" />
                                </div>
                                <div class="info1">
                                    <h2>创业内功:你凭什么说自己的产品必火</h2>
                                    <p>移动互联网产品打造过程中，产品经理们往往只按照boss的要求设计，很少有人会对产品逻辑的形成产生质疑。</p>
                                    <span><i class="fa fa-comment-o"></i>&nbsp;0&nbsp;<i class="fa fa-thumbs-o-up"></i>&nbsp;0&nbsp; <i class="fa fa-share"></i>&nbsp;0&nbsp; </span>
                                    <span class="time">1天前</span>
                                </div>
                            </li>
                            <li>
                               <div class="img">
                                      <img src="/Hit/Public/Index/Index/images/img2.jpg" alt="" />
                                </div>
                                <div class="info1">
                                    <h2>创业内功:你凭什么说自己的产品必火</h2>
                                    <p>移动互联网产品打造过程中，产品经理们往往只按照boss的要求设计，很少有人会对产品逻辑的形成产生质疑。</p>
                                    <span><i class="fa fa-comment-o"></i>&nbsp;0&nbsp;<i class="fa fa-thumbs-o-up"></i>&nbsp;0&nbsp; <i class="fa fa-share"></i>&nbsp;0&nbsp; </span>
                                    <span class="time">1天前</span>
                                </div>
                            </li>
                            <li>
                               <div class="img">
                                      <img src="/Hit/Public/Index/Index/images/img3.jpg" alt="" />
                                </div>
                                <div class="info1">
                                    <h2>创业内功:你凭什么说自己的产品必火</h2>
                                    <p>移动互联网产品打造过程中，产品经理们往往只按照boss的要求设计，很少有人会对产品逻辑的形成产生质疑。</p>
                                    <span><i class="fa fa-comment-o"></i>&nbsp;0&nbsp;<i class="fa fa-thumbs-o-up"></i>&nbsp;0&nbsp; <i class="fa fa-share"></i>&nbsp;0&nbsp; </span>
                                    <span class="time">1天前</span>
                                </div>
                            </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <!-- <dic class="clear"></dic> -->
              <div class="right">
                <div class="blog">
                    <a href="#">开通博客</a>
                </div>
                <div class="bq">
                    <div class="bq_title">
                      <h2>
                          热门标签
                      </h2>
                    </div>
                    <ul class="bq_con">
                            <li><a href="#">JavaScript</a></li>
                              <li><a href="#">HTML</a></li>
                              <li><a href="#">CSS</a></li>
                              <li><a href="#">JQuery</a></li>
                              <li><a href="#">PHP</a></li>  
                              <div class="clear"></div>
                    </ul>
                </div>
                <div class="tz">
                    <div class="tz_img">
                      <img src="/Hit/Public/Index/Index/images/tz.png" alt="" />
                    </div>
                    <ul class="tz_con">
                            <li><a href="#">[休闲娱乐]个性网址导航源码</a></li>
                            <li><a href="#">[文化传媒]高仿短文学网源码 含手机端</a></li>
                            <li><a href="#">[休闲娱乐]天天手游 thinkphp+html</a></li>
                            <li><a href="#">[休闲娱乐]美就购-淘宝天猫折扣网</a></li>
                            <li><a href="#">梦雪实体小店收款系统v2.8</a></li>
                    </ul>
                </div>
              </div>
          </div>
        </div>
    </body>
    <script type="text/javascript">
    $(function(){
  
            $("#kinMaxShow").kinMaxShow({
            
              height:560,
              button:{
                showIndex:false,
                normal:{background:'url(/Hit/Public/Index/Index/images/button.png) no-repeat -14px 0',marginRight:'8px',border:'0',right:'44%',bottom:'20px'},
                focus:{background:'url(/Hit/Public/Index/Index/images/button.png) no-repeat 0 0',border:'0'}
              },
            
              callback:function(index,action){
                switch(index){
                  case 0 :
                  if(action=='fadeIn'){
                    $(this).find('.sub_1_1').animate({left:'70px'},600)
                    $(this).find('.sub_1_2').animate({top:'140px'},600)
                    
                  }else{
                    $(this).find('.sub_1_1').animate({left:'110px'},600)
                    $(this).find('.sub_1_2').animate({top:'220px'},600)
                    
                  };
                  break;
                      
                  case 1 :
                  if(action=='fadeIn'){
                    $(this).find('.sub_2_1').animate({left:'-100px'},600)
                    $(this).find('.sub_2_2').animate({top:'150px'},600)
                  }else{
                    $(this).find('.sub_2_1').animate({left:'-160px'},600) 
                    $(this).find('.sub_2_2').animate({top:'100px'},600)
                  };
                  break;
                      
                  case 2 :
                  if(action=='fadeIn'){
                    $(this).find('.sub_3_1').animate({right:'350px'},600)
                    $(this).find('.sub_3_2').animate({left:'180px'},600)
                  }else{
                    $(this).find('.sub_3_1').animate({right:'180px'},600) 
                    $(this).find('.sub_3_2').animate({left:'30px'},600)
                  };
                  break;                      
                }
              }
            
            });
     });
</script>
</html>