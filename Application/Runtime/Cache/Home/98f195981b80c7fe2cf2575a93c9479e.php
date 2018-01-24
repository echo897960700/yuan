<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<!-- <link rel="stylesheet" href="/Hit/Public/style/PersonalCenter/edit.css" /> -->
	<script type="text/javascript" src='/Hit/Public/script/PersonalCenter/jquery-1.7.2.min.js'></script>
    <script type='text/javascript' src='/Hit/Public/script/PersonalCenter/city.js'></script>
	<script type='text/javascript' src='/Hit/Public/script/PersonalCenter/edit.js'></script>
    
    <!-- 头像 -->
    
    <!--<script type="text/javascript" src='/Hit/Public/Uploadify/jquery.uploadify.min.js'></script>
	<link rel="stylesheet" href="/Hit/Public/Uploadify/uploadify.css" />-->
   
    <script type='text/javascript'>
        var address = "<?php echo ($user["location"]); ?>";
        
        /*var PUBLIC = '/Hit/Public';
        var uploadUrl = '<?php echo U("Home/Common/uploadFace");?>';
        var sid = '<?php echo session_id();?>';
        var ROOT = '/Hit';*/

    </script>



</head>
<body>
<!--==========内容主体==========-->
	
 
    
    <!--=====右侧=====-->


    		<div>
    		<?php if(is_array($info)): foreach($info as $key=>$v): ?><form action="<?php echo U('Home/PersonalCenter/doEdit');?>" method='post'>
    				
    				<p>
    					<label>昵称：</label>
    					<input type="text" name='username' value='<?php echo ($v["username"]); ?>' />
    				</p>
    				<p>
    					<label>真实名称：</label>
    					<input type="text" name='truename' value='<?php echo ($v["truename"]); ?>' class='input'/>
    				</p>
    				<p>
    					<label>性别：</label>
    					<input type="radio" name='sex' value='1' <?php if($user["sex"] == "男"): ?>checked='checked'<?php endif; ?>/>&nbsp;男&nbsp;&nbsp;
    					<input type="radio" name='sex' value='2' <?php if($user["sex"] == "女"): ?>checked='checked'<?php endif; ?>/>&nbsp;女
    				</p>
    				<p>
    					<label>所在地：</label>
    					<select name="province" id="">
    						<option value="">请选择</option>
    					</select>&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="city">
                            <option value="">请选择</option>
                        </select>
    				</p>
    				<p>
    					<label>一句话介绍自己：</label>
    					<textarea name="sign"><?php echo ($v["sign"]); ?></textarea>
    				</p>
    				<p>
    					<input type="submit" value='保存修改'/>
    				</p>
    				
    			</form><?php endforeach; endif; ?>
    		</div>
    		<hr/>
    		<form action="/Hit/index.php/Home/PersonalCenter/upload" enctype="multipart/form-data" method="post" >
	    		<img src="/Hit/Uploads/Avater/<?php echo ($user["avater_path"]); ?>" width="80" height="80" alt="">
	    		<input type="text" name="name" />
	    		<input type="file" name="photo" />
	    		<input type="submit" value="提交" >
    		</form>

    		<hr/>

    		<div class='form hidden'>
    			<form action="<?php echo U('editPwd');?>" method='post' name='editPwd'>
    				<p class='account'>登录邮箱：<span><?php echo ($user["email"]); ?></span></p>
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
    					<input type="submit" value='确认修改' class='edit-sub'/>
    				</p>
    			</form>
    		</div>
    	</div>
   
<!--==========内容主体结束==========-->
</body>
</html>