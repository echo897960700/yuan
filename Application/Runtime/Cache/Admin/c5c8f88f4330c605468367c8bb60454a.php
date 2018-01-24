<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/Css/style.css" />
    <script type="text/javascript" src="/Public/admin/Js/jquery.js"></script>
    <script type="text/javascript" src="/Public/admin/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Public/admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/admin/Js/ckform.js"></script>
    <script type="text/javascript" src="/Public/admin/Js/common.js"></script>

 

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form action="<?php echo U('User/editAction');?>" method="post" class="definewidth m20" id="editForm">
<input type="hidden" name="id" value="<?php echo ($userInfo["id"]); ?>" />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">登录名</td>
            <td><input type="text" name="username" value="<?php echo ($userInfo["username"]); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="text" name="password" value="" /></td>
        </tr>
        <tr>
            <td class="tableleft">真实姓名</td>
            <td><input type="text" name="truename" value="<?php echo ($userInfo["truename"]); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">邮箱</td>
            <td><input type="text" name="email" value="<?php echo ($userInfo["email"]); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">状态</td>
            <td>
                <input type="radio" name="status" value="1"
                    <?php if(($userInfo["status"]) == "1"): ?>checked<?php endif; ?> /> 启用

              <input type="radio" name="status" value="0"
                    <?php if(($userInfo["status"]) == "0"): ?>checked<?php endif; ?> /> 禁用
            </td>
        </tr>
        <tr>
            <td class="tableleft">角色</td>
            <td>
                <select name="group_id" id="">
                    <?php if(is_array($groupInfo)): $i = 0; $__LIST__ = $groupInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" 
                    <?php if(($userInfo["group_id"]) == $vo["id"]): ?>selected<?php endif; ?> >
                    <?php echo ($vo["title"]); ?>
                    </option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>				 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="<?php echo U('User/index');?>";
		 });
        
    });
</script>