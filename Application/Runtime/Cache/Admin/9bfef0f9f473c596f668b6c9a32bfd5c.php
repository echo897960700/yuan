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
<form class="form-inline definewidth m20" action="<?php echo U('Admin/Category/sortCate');?>" method="post" style="text-indent:2em;">
    类型名称：
    <input type="text" name="rolename" id="rolename"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="button" class="btn btn-primary">查询</button>&nbsp;&nbsp;   
    <button type="submit" class="btn btn-primary">排序</button>&nbsp;&nbsp; 
    <button type="button" class="btn btn-success" id="addnew">新增类型</button>


<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>类型编号</th>
        <th>类型名称</th>
        <th>类型封面</th>
        <th>级别</th>
        <th>排序</th>
        <th>管理操作</th>
    </tr>
    </thead>
    <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["html"]); echo ($v["name"]); ?></td>
            <td><img src="/yuan/Uploads/catepic/<?php echo ($v["catepic"]); ?>" width="40px" height="30px;"></td>
            <td><?php echo ($v["level"]); ?></td>
            <th>
                <input style="width:40px;" type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>" />
            </th>
            <td>
                <a href="<?php echo U('Admin/Category/add',array('pid'=>$v['id']));?>">添加子分类</a>
                <a href="<?php echo U('Admin/Category/edit',array('pid'=>$v['id']));?>">修改</a>
                <a href="<?php echo U('Admin/Category/delete',array('pid'=>$v['id']));?>">删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
</form>
<!-- <div class="inline pull-right page">
         10122 条记录 1/507 页  <a href='#'>下一页</a>     <span class='current'>1</span><a href='#'>2</a><a href='/chinapost/index.php?m=Label&a=index&p=3'>3</a><a href='#'>4</a><a href='#'>5</a>  <a href='#' >下5页</a> <a href='#' >最后一页</a>    </div> -->
</body>
</html>
<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="add.html";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>