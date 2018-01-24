<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>猿客栈--在线Web学习交互新阵地</title>
	<link rel="shortcut icon" href="/Yuan/Public/Index/common/images/bitbug_favicon.ico">
	<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/common/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/common/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/Person/css/index.css">
	<script src="/Yuan/Public/Index/common/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Yuan/Public/Index/Person/js/index.js"></script>
	<!-- 资料修改 -->
	<script type="text/javascript" src='/Yuan/Public/script/PersonalCenter/jquery-1.7.2.min.js'></script>
    <script type='text/javascript' src='/Yuan/Public/script/PersonalCenter/city.js'></script>
	<script type='text/javascript' src='/Yuan/Public/script/PersonalCenter/edit.js'></script>
	<script type='text/javascript'>
        var address = "<?php echo ($zl_user["location"]); ?>";
    </script>
    <!-- 个人空间的记录 -->
    <link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/Person/css/scr.css">
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
<div id="userFrame">
	<div id="userSlide">
		<div class="myProduction" id="myblog">
			<span><i class="fa fa-bookmark-o"></i>&nbsp;我的文章</span>
		</div>
		<div class="myProduction" id="mythink">
			<span><i class="fa fa-bookmark-o"></i>&nbsp;我的心得</span>
		</div>
		<div class="myProduction" id="myshare">
			<span><i class="fa fa-bookmark-o"></i>&nbsp;我的共享</span>
		</div>
		<div class="myProduction" id="myinformation">
			<span><i class="fa fa-bookmark-o"></i>&nbsp;我的资料</span>
		</div>
		<div class="myProduction" id="writething">
			<span><i class="fa fa-bookmark-o"></i>&nbsp;记录点滴</span>
		</div>
		<!-- <div class="myProduction" id="shezhi">
			<span><i class="fa fa-bookmark-o"></i>&nbsp;我的猿友</span>
		</div> -->
	</div>
	<div id="userContent">
		<div id="userTitle">

			<span class="user-img"><img src="/Yuan/Uploads/Avater/<?php echo ($user["avater_path"]); ?>" alt="" width="50px" height="50px"></span>
			<span class="nickname"><?php echo ($user["username"]); ?></span>
		</div>
		
		<div class="right">
			<div class="myblog none">
				<!-- 我的文章 -->
				<div id="mb_blog">
					<div class="teddy-bear">
						<div class="teddy-text" style="height:204px;background:url(/Yuan/Uploads/Avater/<?php echo ($user["avater_path"]); ?>);background-size:cover;" >
							<!-- <h4>我的第一篇文章！</h4>
							<hr/>
							<span class="w-line"> </span>-->
							<!-- <img src="./images/a.jpeg" alt="" >  -->
					    </div>
					    <div class="teddy-follow">
					    	<ul>
					    		<li class="folw-h"><h3><?php echo ($blogcount); ?></h3>
					    			<p>文章篇数</p>
					    		</li>
					    		<li><a href="<?php echo U('Home/Blog/Blog');?>"><i class="fa fa-comments"></i></a>
					    			<p><a href="<?php echo U('Home/Blog/Blog');?>">添加</a></p>
					    		</li>
					    	</ul>
					    </div>
					</div>
					<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><div class="teddy-bear">
						<div class="teddy-text">							
							<h4><a href="/Yuan/index.php/Home/Blog/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>&cid=<?php echo ($v["cid"]); ?>"><?php echo ($v["title"]); ?>
				                <?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style='color:<?php echo ($value["color"]); ?>;padding:0 5px'>
				                        [<?php echo ($value["name"]); ?>]
				                    </strong><?php endforeach; endif; ?></a>
			                </h4>
							<hr/>
							<a href="/Yuan/index.php/Home/Blog/one/id/<?php echo ($v["id"]); ?>?id=<?php echo ($v["id"]); ?>&cid=<?php echo ($v["cid"]); ?>"><img src="/Yuan/Uploads/blogpic/<?php echo ($v["blogpic"]); ?>" alt=""  class="img-responsive"></a>							
					    </div>
					    <div class="teddy-follow">
					    	<ul>
					    		<li class="folw-h"><h3><?php echo ($v["click"]); ?></h3> 
					    			<p>浏览数</p>
					    		</li>
					    		<li class="folw-h"><h3><?php echo ($v["saycount"]); ?></h3>
					    			<p>评论数</p>
					    		</li>
					    		<li><a href="<?php echo U('Home/Blog/toTrach',array('id'=>$v['id'],'type'=>1));?>"><i class="fa fa-times"></i></a>
					    			<p><a href="<?php echo U('Home/Blog/toTrach',array('id'=>$v['id'],'type'=>1));?>">删除</a></p>
					    		</li>
					    	</ul>
					    </div>
					</div><?php endforeach; endif; ?>					
				</div>	
			</div>
			<!-- 我的文章结束 -->

			<!-- 我的心得 -->
			<div class="mythink none">
				<!-- 我的心得。欢迎你！ -->
				<div class="teddy-bear">
					<div class="teddy-text" style="height:204px;background:url(/Yuan/Uploads/Avater/<?php echo ($user["avater_path"]); ?>);background-size:cover;" >
				    </div>
				    <div class="teddy-follow">
				    	<ul>
				    		<li class="folw-h"><h3><?php echo ($expercount); ?></h3>
				    			<p>心得篇数</p>
				    		</li>
				    		<li><a href="<?php echo U('Home/Exper/index');?>"><i class="fa fa-comments"></i></a>
				    			<p><a href="<?php echo U('Home/Exper/index');?>">添加</a></p>
				    		</li>
				    	</ul>
				    </div>
				</div>

			<?php if(is_array($result)): foreach($result as $key=>$vo): ?><div class="teddy-bear">
					<div class="teddy-text">
						<h4><a href="/Yuan/index.php/Home/Exper/one/id/<?php echo ($vo["id"]); ?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></h4>
						<hr/>
						<span class="w-line"> </span>
						<a href="/Yuan/index.php/Home/Exper/one/id/<?php echo ($vo["id"]); ?>?id=<?php echo ($vo["id"]); ?>"><img src="/Yuan/Uploads/experpic/<?php echo ($vo["experpic"]); ?>" alt=""  class="img-responsive"></a>
				    </div>
				    <div class="teddy-follow">
				    	<ul>
				    		<li class="folw-h"><h3><?php echo ($vo["click"]); ?></h3>
				    			<p>浏览数</p>
				    		</li>
				    		<li class="folw-h"><h3><?php echo ($vo["saycount"]); ?></h3>
				    			<p>评论数</p>
				    		</li>
				    		<li><a href="<?php echo U('Home/Exper/toTrach/',array('id'=>$vo['id'],'type'=>1));?>"><i class="fa fa-times"></i></a>
				    			<p><a href="<?php echo U('Home/Exper/toTrach/',array('id'=>$vo['id'],'type'=>1));?>">删除</a></p>
				    		</li>
				    	</ul>
				    </div>
				</div><?php endforeach; endif; ?>	
		</div>
		<!-- 我的心得结束 -->
			<!-- 我的共享 -->
			<div class="myshare none">
				
				<div class="gx_kuang">
					<div class="teddy-text">
						<h4>我的共享，猿来有你！ </h4>
						<hr/>
						<span class="w-line"> </span>
						
				    </div>
				    <div class="teddy-follow">
				    	<ul>
				    		<li><a href="#"><?php echo ($sharecount); ?></a>
				    			<p>共享量</p>
				    		</li>
				    	</ul>
				    </div>
				</div>
				<?php if(is_array($myshare)): foreach($myshare as $key=>$v): ?><div class="gx_kuang">
						<div class="teddy-text">
							<h4>
								<?php if($v[sta] == 3): ?><a href="/Yuan/Uploads/share/<?php echo ($v["url"]); ?>" target="_blank"><?php echo ($v["name"]); ?></a>
								<?php else: ?>
									<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["name"]); ?></a><?php endif; ?>	
							</h4>
							<hr/>
							<span class="w-line"> </span>
							
					    </div>
					    <div class="teddy-follow">
					    	<ul>
					    		<li><a href="#"><i class="fa fa-times"></i></a>
					    			<p><a href="#">删除</a></p>
					    		</li>
					    	</ul>
					    </div>
					</div><?php endforeach; endif; ?>



			</div>
			<div class="myinformation none">
				<!-- 我的资料 -->
				<div id="zl_left">
					<div class="zl_nav">
						<ul>
							<li id="xg_zl"><a href="#">修改资料</a></li>
							<li id="xg_tx"><a href="#">修改头像</a></li>
							<li id="xg_mm"><a href="#">修改密码</a></li>
						</ul>
					</div>
					<div class="zl_caozuo">
						<div class="xg_zl">
							
					    		<?php if(is_array($info)): foreach($info as $key=>$v): ?><form action="<?php echo U('Home/PersonalCenter/doEdit');?>" method='post'>
					    				
					    				<p>
					    					<label>昵称：</label>
					    					<input type="text" name='username' class="input" value='<?php echo ($v["username"]); ?>' />
					    				</p>
					    				<p>
					    					<label>猿名：</label>
					    					<input type="text" name='truename' value='<?php echo ($v["truename"]); ?>' class='input'/>
					    				</p>
					    				<p>
					    					<label>性别：</label>
					    					<input type="radio" name='sex' value='1' <?php if($zl_user["sex"] == "男"): ?>checked='checked'<?php endif; ?>/>&nbsp;男&nbsp;&nbsp;
					    					<input type="radio" name='sex' value='2' <?php if($zl_user["sex"] == "女"): ?>checked='checked'<?php endif; ?>/>&nbsp;女
					    				</p>
					    				<p>
					    					<label>猿址：</label>
					    					<select name="province" id="" class="select">
					    						<option value="" >请选择</option>
					    					</select>&nbsp;&nbsp;&nbsp;&nbsp;
					                        <select name="city" class="select">
					                            <option value="">请选择</option>
					                        </select>
					    				</p>
					    				<p>
					    					<label>猿语：</label>
					    					<textarea name="sign" class="textarea"><?php echo ($v["sign"]); ?></textarea>
					    				</p>
					    				<p>
					    					<input type="submit" class="submit_btn" value='保存修改'/>
					    				</p>
					    				
					    			</form><?php endforeach; endif; ?>					    		
							</div>
						<div class="xg_tx"><br/>
							<form action="/Yuan/index.php/Home/PersonalCenter/upload" enctype="multipart/form-data" method="post" >
					    		<img src="/Yuan/Uploads/Avater/<?php echo ($user["avater_path"]); ?>" width="80" height="80" alt=""><br/><br/>
					    		<input type="file" name="photo" class="input" /><br/><br/>
					    		<input type="submit" class="submit_btn" value="提交" >
				    		</form>
						</div>
						<div class="xg_mm">
							<form action="<?php echo U('editPwd');?>" method='post' name='editPwd'>
			    				<p class='account'>登录邮箱：<span><?php echo ($zl_user["email"]); ?></span></p>
			    				<p>
			    					<label for=""><span class='red'>*</span>旧密码：</label>
			    					<input type="password" name='old' class='input'/>
			    				</p>
			    				<p>
			    					<label for=""><span class='red'>*</span>新密码：</label>
			    					<input type="password" name='new' class='input' id='new'/>
			    				</p>
			    				<p>
			    					<label for=""><span class='red'>*</span>确认密码：</label>
			    					<input type="password" name='newed' class='input'/>
			    				</p>
			    				<p>
			    					<input type="submit" value='确认修改' class='edit-sub submit_btn'/>
			    				</p>
			    			</form>
						</div>
					</div>
				</div>
				<div id="zl_right">
					<!-- 用户信息 -->
					<div class="userinfo">
					<?php if(is_array($userRes)): foreach($userRes as $key=>$vo): ?><ul>
							<li id="facebg">
								<div class="pic">
									<img src="/Yuan/Uploads/Avater/<?php echo ($vo["avater_path"]); ?>" width="80px;" height="80px;" alt="" />
								</div>
							</li>
						</ul>
						<ul class="usercontent">
									
								<li>
									昵称： <a href="#"><?php echo ($vo["username"]); ?></a>	
								</li>
								<li>
									地址：<a href="#"><?php echo ($vo["location"]); ?></a>
								</li>
								<li>
									签名：<a href="#"><?php echo ($vo["sign"]); ?></a>
								</li>
								<!-- <li>
									文章：<a href="#"><?php echo ($blogcount); ?></a>
								</li> -->
								<li>
									实名：<a href="#"><?php echo ($vo["truename"]); ?></a> 		
								</li>
								<li>
									注册时间： <a href="#"><?php echo floor(date(time()-$vo[reg_date])/(60*60*24)) ?>天</a>	
								</li>
								<li>
									最后登录IP：<a href="#"><?php echo ($vo["last_ip"]); ?></a>
								</li>
								<li>
									用户组：<a href="#"><?php echo ($group_id); ?></a>
								</li>
							
						</ul><?php endforeach; endif; ?>
					</div>					
					<!-- 用户信息结束 -->
				</div>
			</div>
			<div class="writething none">
				<h2>猿客栈，记录点滴</h2>
				<div class="box">
				<!--内容发布区域-->
					<div class="boxcenter">
						<form action="<?php echo U('Home/PersonalCenter/shiguangAdd');?>" method="post" >
						<div class="boxc_t"><h4>呐喊吧，吐槽吧...</h4></div>
						<textarea class="boxc_c" contenteditable="true" id="aa" name="content" style="margin-left:20px;resize: none;"></textarea>
						<input type="submit" class="submit_btn" style="margin-top:0px;" value="发布">	
						</form>
					</div>
				<!--时光轴线-->
					<div class="timeline">
						<div class="timeline_t" style="background:url(/Yuan/Uploads/Avater/yuan.png);background-size:cover;">				
						</div>
						<div class="allbox">
							<?php if(is_array($shiguang)): foreach($shiguang as $key=>$v): ?><div class="nextbox">
									<div class='a'>
									<div class='b'></div>
									<span id='time'><?php echo (date('Y-m-d',$v["time"])); ?></span>&nbsp;&nbsp;<span id="hour"><?php echo (date('H:s:i',$v["time"])); ?></span><br/>
									<p style='padding:4px'><?php echo ($v["content"]); ?></p>
									</div>
								</div><?php endforeach; endif; ?>
							<div class="start">猿</div><!-- 时光轴的开始 -->
						</div>
					</div>	 
				</div>
			</div>
			
			<!-- <div class="shezhi none">
				我的猿友正在建设中！
			</div> -->
		</div>

		
	</div>

</div>

</body>
</html>