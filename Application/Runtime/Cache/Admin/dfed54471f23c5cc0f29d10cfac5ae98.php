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
<form action="<?php echo U('Admin/Category/runEdit');?>" enctype="multipart/form-data" method="post">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="20%" class="tableleft">修改栏目名称：</td>
        <td><input type="text" name="name" value="<?php echo ($name); ?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">属性封面：</td>
        <td><input type="file" name="catepic" value="<?php echo ($catepic); ?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">排序：</td>
        <td><input type="text" name="sort" value="<?php echo ($sort); ?>" /></td>
    </tr>   
    <tr>
        <td class="tableleft"></td>
        <td>
            <input type="hidden" name="id" value="<?php echo ($id); ?>">
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