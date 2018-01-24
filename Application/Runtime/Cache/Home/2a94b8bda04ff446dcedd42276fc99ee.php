<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>猿客栈--在线Web学习交互新阵地</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/Yuan/Public/Index/common/images/bitbug_favicon.ico">
<link rel="stylesheet" href="/Yuan/Public/Index/common/css/common.css" />
<link rel="stylesheet" href="/Yuan/Public/Index/Index/css/index.css" />
<link rel="stylesheet" href="/Yuan/Public/Index/Index/css/font-awesome.min.css" />
<script src="/Yuan/Public/Index/Index/js/jquery.min.js"></script>
<script src="/Yuan/Public/Index/Index/js/jquery.kinMaxShow-1.0.min.js"></script>
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
      <div class="warp"></div>
      <!-- banner -->
        <div class="banner">
            <div id="kinMaxShow">
               <div> <img src="/Yuan/Public/Index/Index/images/1_1.jpg" class="pic1"/>
                  <div> <img class="sub_1_1" src="/Yuan/Public/Index/Index/images/sub_1_1.png"  /> 
                          <img class="sub_1_2" src="/Yuan/Public/Index/Index/images/sub_1_2.png" usemap="#Map_1_2"  border="0" />
                          <map name="Map_1_2" id="Map_1_2">
                              <area shape="rect" coords="2,96,106,123" href="#"/>
                          </map>
                  </div>
               </div>
               <div> <img src="/Yuan/Public/Index/Index/images/2_2.jpg" class="pic2" />
                  <div> <img class="sub_2_1" src="/Yuan/Public/Index/Index/images/sub_2_1.png"  /> 
                           <img class="sub_2_2" src="/Yuan/Public/Index/Index/images/sub_2_2.png" usemap="#Map_2_2"  border="0" />
                          <map name="Map_2_2" id="Map_2_2">
                              <area shape="rect" coords="3,97,104,124" href="#" target="_blank"/>
                          </map>
                  </div>
               </div>
               <div> <img src="/Yuan/Public/Index/Index/images/3_3.jpg" class="pic3" />
                  <div> <!-- <img class="sub_3_1" src="images/sub_3_1.png"  /> --> 
                          <img class="sub_3_2" src="/Yuan/Public/Index/Index/images/sub_3_2.png" usemap="#Map_3_2"  border="0" />
                           <map name="Map_3_2" id="Map_3_2">
                               <area shape="rect" coords="1,98,106,124" href="#" target="_blank"/>
                           </map>
                  </div>
               </div>
              </div>
        </div>
        <!-- banner结束 -->
        <!-- 内容 -->
        <div class="content">
          <!-- 推荐文章4 -->
          <div class="content_top">
              <?php if(is_array($tuijian)): foreach($tuijian as $key=>$v): ?><div class="story">
                      <a href="/Yuan/index.php/Home/Blog/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>&cid=<?php echo ($v["cid"]); ?>" class="stoty_a"> 
                          <h2 class="text">
                             <span><?php echo ($v["title"]); ?></span>
                          </h2>
                          <img src="/Yuan/Uploads/blogpic/<?php echo ($v["blogpic"]); ?>" alt="" />
                      </a>
                </div><?php endforeach; endif; ?>
          </div>
          <!-- 推荐文章4结束 -->
          <!-- 热门文章3 -->
          <div class="content_bottom">
              <div class="left">
                  <div class="left_top">
                       <div class="title1">
                           <img src="/Yuan/Public/Index/Index/images/title1.png" alt="" />
                       </div>
                       <?php if(is_array($remen)): foreach($remen as $key=>$v): ?><div class="con">
                                <a href="#">
                                <div class="pic">
                                    <img src="/Yuan/Uploads/blogpic/<?php echo ($v["blogpic"]); ?>" alt="" />
                                </div>
                                </a>
                                <div class="info">
                                      <a href="/Yuan/index.php/Home/Blog/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>&cid=<?php echo ($v["cid"]); ?>">
                                      <h2><?php echo ($v["title"]); ?></h2>
                                      </a>
                                      <span><i class="fa fa-user"></i> <?php echo ($v["username"]); ?></span>
                                      <p><?php echo (mb_substr($v["content"],0,300,'utf-8',false)); ?></p>
                                      <span class="tag"><i class="fa fa-tag"></i>&nbsp;<?php echo ($v["cate"]); ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i>&nbsp;<?php echo (date('Y-m-d',$v["time"])); ?></span>
                                      <span class="comment"><i class="fa fa-comment-o"></i>&nbsp;<?php echo ($v["saycount"]); ?>&nbsp;<i class="fa fa-heart"></i>&nbsp;<?php echo ($v["good"]); ?>&nbsp;</span>
                                </div>
                                <div class="clear"></div>
                         </div><?php endforeach; endif; ?>
                  </div>
                  <!-- 热门文章3结束 -->
                  <!-- 学习心得 -->
                  <div class="left_bottom">
                      <div class="title1">
                          <img src="/Yuan/Public/Index/Index/images/title2.png" alt="" />
                      </div>
                      <div class="con1">
                          <ul>
                            <?php if(is_array($xuexi)): foreach($xuexi as $key=>$v): ?><li>
                                <div class="img">
                                      <a href="/Yuan/index.php/Home/Exper/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>"><img src="/Yuan/Uploads/experpic/<?php echo ($v["experpic"]); ?>" alt="<?php echo ($v["title"]); ?>" /></a>
                                </div>
                                <div class="info1">
                                    <h2><a href="/Yuan/index.php/Home/Exper/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></h2>
                                    <p><?php echo (msubstr($v["story"],0,65,'utf-8',false)); ?></p>
                                    <span><i class="fa fa-comment-o"></i>&nbsp;0&nbsp;<i class="fa fa-thumbs-o-up"></i>&nbsp;<?php echo ($v["saycount"]); ?>&nbsp; <i class="fa fa-share"></i>&nbsp;<?php echo ($v["click"]); ?>&nbsp; </span>
                                    <span class="time"><?php echo (date('Y-m-d',$v["addtime"])); ?></span>
                                </div>
                            </li><?php endforeach; endif; ?>
                          </ul>
                      </div>
                  </div>
                  <!-- 学习心得 -->
              </div>
              <!-- <dic class="clear"></dic> -->
              <div class="right">
                <div class="blog">
                    <a href="<?php echo U('Home/User/userReg');?>">注册猿客栈</a>
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
                      <img src="/Yuan/Public/Index/Index/images/tz.png" alt="" />
                    </div>
                    <ul class="tz_con">
                          <?php if(is_array($wangzhi)): foreach($wangzhi as $key=>$v): ?><li><a href="<?php echo ($v["url"]); ?>" target="_blank">[<?php echo ($v["name"]); ?>]<?php echo ($v["alt"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </div>
              </div>
          </div>
        </div>
        <div class="clear"></div>
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
    <script type="text/javascript">
    $(function(){
  
            $("#kinMaxShow").kinMaxShow({
            
              height:560,
			  intervalTime:3,
              button:{
                showIndex:false,
                normal:{background:'url(/Yuan/Public/Index/Index/images/button.png) no-repeat -14px 0',marginRight:'8px',border:'0',right:'44%',bottom:'20px'},
                focus:{background:'url(/Yuan/Public/Index/Index/images/button.png) no-repeat 0 0',border:'0'}
              },
            
              callback:function(index,action){
                switch(index){
                  case 0 :
                  if(action=='fadeIn'){
                    $(this).find('.sub_1_1').animate({left:'20px'},600)
                    $(this).find('.sub_1_2').animate({right:'160px'},600)
                    
                  }else{
                    $(this).find('.sub_1_1').animate({left:'0px'},600)
                    $(this).find('.sub_1_2').animate({right:'-220px'},600)
                    
                  };
                  break;
                      
                  case 1 :
                  if(action=='fadeIn'){
                    $(this).find('.sub_2_1').animate({left:'100px'},600)
                    $(this).find('.sub_2_2').animate({top:'80px'},600)
                  }else{
                    $(this).find('.sub_2_1').animate({left:'0px'},600) 
                    $(this).find('.sub_2_2').animate({top:'30px'},600)
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