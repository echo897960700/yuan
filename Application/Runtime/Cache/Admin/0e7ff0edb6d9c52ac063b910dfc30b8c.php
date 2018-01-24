<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Hit/Public/admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Hit/Public/admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Hit/Public/admin/Css/style.css" />
    <script type="text/javascript" src="/Hit/Public/admin/Js/jquery.js"></script>
    <script type="text/javascript" src="/Hit/Public/admin/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Hit/Public/admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Hit/Public/admin/Js/ckform.js"></script>
    <script type="text/javascript" src="/Hit/Public/admin/Js/common.js"></script>
    <!-- 编辑器 -->
    <script type="text/javascript">
        window.UEDITOR_HOME_URL = '/Hit/Public/Ueditor/';
        window.onload = function(){
            window.UEDITOR_CONFIG.initialFrameWidth=800;
            window.UEDITOR_CONFIG.initialFrameHeight=500;
            window.UEDITOR_CONFIG.imageUrl="<?php echo U( 'Admin/Blog/upload');?>";
            UE.getEditor('content');
        }
    </script>
    <script type="text/javascript" src="/Hit/Public/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/Hit/Public/Ueditor/ueditor.all.min.js"></script>
    <!--结束 -->
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
<form action="<?php echo U('/Admin/Blog/addBlog');?>" method="post">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">所属分类</td>
        <td>
            <select name="cid">
                <option value="">===请选择分类===</option>
                <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>">
                        <?php echo ($v["html"]); echo ($v["name"]); ?>
                    </option><?php endforeach; endif; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="tableleft">博文属性：</td>
        <td>
            <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><label style="margin-right:10px;">
                        <input type="checkbox" name="aid[]" value="<?php echo ($v["id"]); ?>" />&nbsp;<?php echo ($v["name"]); ?>
                    </label><?php endforeach; endif; ?>
        </td>
    </tr>
    <tr>
        <td class="tableleft">博文封面：</td>
        <td>
            <input type="file" name="blogpic" />
        </td>
    </tr>   
    <tr>
        <td class="tableleft">点击次数：</td>
        <td>
            <input type="text" name="click" value="0">
        </td>
    </tr>
    <tr>
        <td class="tableleft">博文标题：</td>
        <td>
            <input type="text" name="title">
        </td>
    </tr>
    <tr>
        <td class="tableleft">博文内容：</td>
        <td>
            <textarea name="content" id="content"></textarea>
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });

    });
</script>