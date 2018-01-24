<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>猿客栈--在线Web学习交互新阵地</title>
    <link rel="shortcut icon" href="/Yuan/Public/Index/common/images/bitbug_favicon.ico">
	<link rel="stylesheet" type="text/css" href="/Yuan/Public/Index/common/css/common.css">
    
	<link rel="stylesheet" href="/Yuan/Public/Index/search/css/sech_user.css" />
	<!-- <link rel="stylesheet" href="/Yuan/Public/Index/search/css/bottom.css" /> -->
	<script type="text/javascript" src='/Yuan/Public/Index/search/js/jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src='/Yuan/Public/Index/search/js/nav.js'></script>
<!--==========顶部固定导行条==========--> 
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
                        <?php if($_SESSION['group_id']== 3 ): ?><a href=""><?php echo (session('username')); ?><span>，你好！</span></a>
                        <a href="<?php echo U('Home/User/logout');?>">注销</a>
                        <!--<a href="<?php echo U('Admin/public/login');?>">后台登录</a>--><?php endif; endif; ?>
                </div>
                </div>
        </header>
<!--==========内容主体==========-->
	<div style='height:60px;opcity:10'></div>
    <!-- <div class="main"> -->
    <!--=====左侧=====-->
        <div id='right'>
    		<p ><img src="/Yuan/Public/Index/search/images/sech_logo.png" width="400px" height="150px" style="margin-left:300px;"></p> 
    		<div id='sech'>
    			<div>
	    			<form action="<?php echo U('sechUser');?>" method='get'>
	    				<input type="text" name='keyword' id='sech-cons' placeholder='搜索猿友' value='<?php if($keyword): echo ($keyword); else: endif; ?>'/>
	    				<input type="submit" value='搜&nbsp;索' id='sech-sub'/>
	    			</form>
    			</div>
    			<ul>
                    <li><span class='cur'>找人</span></li>
    				<!-- <li><span>文章</span></li>
                    <li><span>资源</span></li> -->
                    <li style="margin-left:-25px;margin-top:1px;"><span id='create_group'>创建新分组</span></li>
    			</ul>
    		</div>
    		<?php if(isset($result)): ?><div id='content'>
    			<if condition='$result'>
	    		<div class='yonghu'>
	                <span>搜索结果：</span>
	            </div>
	            <ul id="sousuo">
	            	<?php if(is_array($result)): foreach($result as $key=>$v): ?><li class="yinying">
    						<dl>
    							<dt>
                                    <img src="
                                    <?php if($v["avater_path"]): ?>/Yuan/Uploads/Avater/<?php echo ($v["avater_path"]); ?>
                                        
                                    <?php else: ?>
                                        /Yuan/Public/Uploads/Avater/default.gif<?php endif; ?>" width='100' height='100'/>
                                    <span><a href=""><?php echo (str_replace($keyword, '<font style="color:#0099FE;">' . $keyword . '</font>', $v["username"])); ?></a></span>
                                </dt>
    							<!--<dd>
    								 <a href=""><?php echo (str_replace($keyword, '<font style="color:red">' . $keyword . '</font>', $v["username"])); ?></a> 
    							</dd>-->
    							<dd>
    								<i class="fa fa-paper-plane"></i>
    								<span >
    									<?php if($v["location"]): echo ($v["location"]); ?> 
    									<?php else: ?>
    										该用户未填写所在地<?php endif; ?>
    								</span>
    							</dd>
    							<dd>
    								<span>关注 <a href=""><?php echo ($v["follow"]); ?></a></span>&nbsp;&nbsp;&nbsp;
    								<span class='bd-l'>粉丝 <a href=""><?php echo ($v["fans"]); ?></a></span>
    								<!-- <span class='bd-l'>微博 <a href=""><?php echo ($v["weibo"]); ?></a></span> -->
    							</dd>
    						</dl>
    	    				<dl class='list-right'>
    	    					<?php if($v["mutual"]): ?><dt>互相关注</dt>
    	    						<!-- <dd>移除</dd> -->
        						<?php elseif($v["followed"]): ?>
                                	<dt>√&nbsp;已关注</dt>
                                	<!-- <dd>移除</dd> -->
                            	<?php else: ?>
    	    						<dt class='add-fl' uid='<?php echo ($v["id"]); ?>'>+&nbsp;关注</dt>
                                    <input type="hidden" value="<?php echo ($v["uid"]); ?>"><?php endif; ?>
    	    				</dl>

    	    			</li><?php endforeach; endif; ?>
    			</ul>


    			<!-- <div style="text-align:center;padding:20px;"><?php echo ($page); ?></div> -->
    			<?php else: ?>
    				<!-- <p style="text-align:center;"></p> --><?php endif; ?>
                <?php echo ($page); ?>
	        </div><?php endif; ?>
    	<!-- </div> -->
    </div>
<!--==========内容主体结束==========-->
<!--=====左侧=====-->
   <!-- <div id="left" class='fleft'>
        <div class="group">
             <span id='create_group'>创建新分组</span>
        </div>
    </div> -->
    
    <!--==========创建分组==========-->
    <script type='text/javascript'>
        var addGroup = "<?php echo U('Home/Search/addGroup');?>";
    </script>
    <div id='add-group'>
        <div class="group_head">
            <span class='group_text fleft'>创建好友分组</span>
        </div>
        <div class='group-name'>
            <span>分组名称：</span>
            <input type="text" name='name' id='gp-name'>
        </div>
        <div class='gp-btn-wrap'>
            <span class='add-group-sub'>添加</span>
            <span class='group-cencle'>取消</span>
        </div>
    </div>
    <!--==========创建分组==========-->

<!--==========加关注弹出框==========-->

<?php  $group = M('group')->where(array('uid' => session('UID')))->select(); ?>
    <script type='text/javascript'>
        var addFollow = "<?php echo U('Home/Search/addFollow');?>";
    </script>

    <div id='follow'>
    <form action="<?php echo U('Home/Search/addFollow');?>" method="post">
        <div class="follow_head">
            <span class='follow_text fleft'>关注好友</span>
        </div>
        <div class='sel-group'>
            <span>好友分组：</span>
            <select name="gid">
                <option value="0">默认分组</option>
                <?php if(is_array($group)): foreach($group as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
            </select>
        </div>
        <div class='fl-btn-wrap'>
            <input type="hidden" name='follow'/>
            <!-- <span class='add-follow-sub'>关注</span> -->
           <span class='add-follow-sub' >关注</span>
            <span class='follow-cencle'>取消</span>
        </div>
        </form>
    </div>
<!--==========加关注弹出框==========-->
    </body>
</html>