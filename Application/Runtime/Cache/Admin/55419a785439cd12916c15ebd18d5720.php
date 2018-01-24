<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/yuan/Public/admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/yuan/Public/admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/yuan/Public/admin/Css/style.css" />
    <script type="text/javascript" src="/yuan/Public/admin/Js/jquery.js"></script>
    <script type="text/javascript" src="/yuan/Public/admin/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/yuan/Public/admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/yuan/Public/admin/Js/ckform.js"></script>
    <script type="text/javascript" src="/yuan/Public/admin/Js/common.js"></script>

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
<form class="form-inline definewidth m20" action="index.html" method="get">
    菜单名称：
    <input type="text" name="menuname" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp; 
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增菜单</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>规则标题</th>
        <th>规则</th>
        <th>状态</th>
        <th>管理操作</th>
    </tr>
    </thead>
        <?php if(is_array($ruleList)): $i = 0; $__LIST__ = $ruleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["title"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["status"]); ?></td>
                <td><a href="/yuan/index.php/Admin/Rule/edit/id/<?php echo ($vo["id"]); ?>">编辑</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>

</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="add.html";
		 });


    });
	
</script>