<?php if (!defined('THINK_PATH')) exit();?>
	<title>微博找人</title>
	<link rel="stylesheet" href="/Hit/Public/search/css/nav.css" />
	<link rel="stylesheet" href="/Hit/Public/search/css/sech_user.css" />
	<link rel="stylesheet" href="/Hit/Public/search/css/bottom.css" />
	<script type="text/javascript" src='/Hit/Public/search/js/jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src='/Hit/Public/search/js/nav.js'></script>
<!--==========顶部固定导行条==========-->

<!--==========内容主体==========-->
	<div style='height:60px;opcity:10'></div>
    <div class="main">
    <!--=====左侧=====-->
        
        <div id='right'>
    		<p id='sech-logo'></p>
    		<div id='sech'>
    			<div>
	    			<form action="<?php echo U('sechUser');?>" method='get'>
	    				<input type="text" name='keyword' id='sech-cons' value='<?php if($keyword): echo ($keyword); else: ?>搜索微博、找人<?php endif; ?>'/>
	    				<input type="submit" value='搜&nbsp;索' id='sech-sub'/>
	    			</form>
    			</div>
    			<ul>
                    <li><span class='cur'>找人</span></li>
    				<li><span>微博</span></li>
    			</ul>
    		</div>
    		<?php if(isset($result)): ?><div id='content'>
    			<?php if($result): ?><div class='view_line'>
	                <strong>用户</strong>
	            </div>
	            <ul>
	            	<?php if(is_array($result)): foreach($result as $key=>$v): ?><li>
						<dl class='list-left'>
							<dt>
								<img src="
								<?php if($v["face80"]): ?>/Hit/Uploads/Face/<?php echo ($v["face80"]); ?>
								<?php else: ?>
									/Hit/Public/Images/noface.gif<?php endif; ?>" width='80' height='80'/>
							</dt>
							<dd>
								<a href=""><?php echo (str_replace($keyword, '<font style="color:red">' . $keyword . '</font>', $v["username"])); ?></a>
							</dd>
							<dd>
								<i class='icon icon-boy'></i>&nbsp;
								<span>
									<?php if($v["location"]): echo ($v["location"]); ?>
									<?php else: ?>
										该用户未填写所在地<?php endif; ?>
								</span>
							</dd>
							<dd>
								<span>关注 <a href=""><?php echo ($v["follow"]); ?></a></span>
								<span class='bd-l'>粉丝 <a href=""><?php echo ($v["fans"]); ?></a></span>
								<span class='bd-l'>微博 <a href=""><?php echo ($v["weibo"]); ?></a></span>
							</dd>
						</dl>
	    				<dl class='list-right'>
	    					<?php if($v["mutual"]): ?><dt>互相关注</dt>
	    						<dd>移除</dd>
    						<?php elseif($v["followed"]): ?>
                            	<dt>√&nbsp;已关注</dt>
                            	<dd>移除</dd>
                        	<?php else: ?>
	    						<dt class='add-fl' uid='<?php echo ($v["uid"]); ?>'>+&nbsp;关注</dt><?php endif; ?>
	    				</dl>
	    			</li><?php endforeach; endif; ?>
    			</ul>
    			<div style="text-align:center;padding:20px;"><?php echo ($page); ?></div>
    			<?php else: ?>
    				<p style='text-indent:7em;'>未找到与<strong style='color:red'><?php echo ($keyword); ?></strong>相关的用户</p><?php endif; ?>
	        </div><?php endif; ?>
    	</div>
    </div>
<!--==========内容主体结束==========-->
<!--==========底部==========-->
    <div id="bottom">
        <div class='link'>
            <dl>
                <dt>后盾网论坛</dt>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
            </dl>
            <dl>
                <dt>后盾网论坛</dt>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
            </dl>
            <dl>
                <dt>后盾网论坛</dt>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
            </dl>
            <dl>
                <dt>后盾网论坛</dt>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
            </dl>
            <dl>
                <dt>后盾网论坛</dt>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
                <dd><a href="">后盾网免费视频教程</a></dd>
            </dl>
        </div>
        <div id="copy">
            <div>
                <p>
                    版权所有：后盾网 京ICP备10027771号-1 站长统计 All rights reserved, houdunwang.com services for Beijing 2008-2012 
                </p>
            </div>
        </div>
    </div>

<!--[if IE 6]>
    <script type="text/javascript" src="/Hit/Public/Js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#top','background');
        DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('#sech_text','background');
        DD_belatedPNG.fix('#sech_sub','background');
        DD_belatedPNG.fix('.send_title','background');
        DD_belatedPNG.fix('.icon','background');
        DD_belatedPNG.fix('.ta_right','background');
    </script>
<![endif]-->
</body>
</html>