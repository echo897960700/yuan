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
    Exper名称：
    <input type="text" name="rolename" id="rolename"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增Exper</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>ID</th>
        <th>标题</th>
        <!-- <th>starttime</th> -->
        <th>版面</th>
        <th>专攻</th>
        <!-- <th>identity</th> -->
        <th>经历</th>
        <th>添加时间</th>
        <th>用户名</th>
        <th>操作</th>
    </tr>
    </thead>
	<?php if(is_array($result)): foreach($result as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["title"]); ?></td>
           <!--  <td><?php echo ($v["starttime"]); ?></td> -->
           <td><img src="/yuan/Uploads/experpic/<?php echo ($v["experpic"]); ?>" width="40px;" height="40px; "></td>
            <td><?php echo ($v["specialize"]); ?></td>
            <!-- <td><?php echo ($v["identity"]); ?></td> -->
            <td><?php echo (msubstr($v["story"],0,30,'utf-8',true)); ?></td>
            <td><?php echo (date("Y-m-d",$v["addtime"])); ?></td>
            <td><?php echo ($v["username"]); ?></td>
            <td>
                <?php if(ACTION_NAME == "index"): ?><a href="<?php echo U('Admin/Exper/edit/',array('id'=>$v['id']));?>">编辑</a> <a href="<?php echo U('Admin/Exper/toTrach/',array('id'=>$v['id'],'type'=>1));?>">删除</a>
                <?php else: ?>
                <a href="<?php echo U('Admin/Exper/toTrach',array('id'=>$v['id'],'type'=>0));?>">还原</a> <a href="<?php echo U('Admin/Exper/delete',array('id'=>$v['id']));?>">彻底删除</a><?php endif; ?>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
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