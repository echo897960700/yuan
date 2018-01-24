<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
    <thead>
    <tr>
        <th>博文编号</th>
        <th>博文标题</th>
        <th>博文作者</th>
        <th>所属分类</th>
        <th>点击次数</th>
        <th>发布时间</th>
        <th>管理操作</th>
    </tr>
    </thead>
    <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["title"]); ?>
                <?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style='color:<?php echo ($value["color"]); ?>;padding:0 5px'>
                        [<?php echo ($value["name"]); ?>]
                    </strong><?php endforeach; endif; ?>
            </td>
            <td><?php echo ($v["username"]); ?></td>
            <td><?php echo ($v["cate"]); ?></td>
            <td><?php echo ($v["click"]); ?></td>
            <td><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
            <td>
                <!-- <a href="<?php echo U('Home/Blog/edit',array('id'=>$v['id']));?>">编辑</a> -->
                <a href="<?php echo U('Home/Blog/toTrach',array('id'=>$v['id'],'type'=>1));?>">删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<hr/>
<!-- -------------------------------------------- -->
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>tilte</th>
        <th>starttime</th>
        <th>specialize</th>
        <th>identity</th>
        <th>story</th>
        <th>addtime</th>
        <th>username</th>
        <th>operation</th>
    </tr>
    </thead>
	<?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["title"]); ?></td>
            <td><?php echo ($vo["starttime"]); ?></td>
            <td><?php echo ($vo["specialize"]); ?></td>
            <td><?php echo ($vo["identity"]); ?></td>
            <td><?php echo (msubstr($vo["story"],0,30,'utf-8',true)); ?></td>
            <td><?php echo (date("Y-m-d",$vo["addtime"])); ?></td>
            <td><?php echo ($vo["username"]); ?></td>
            <td>
                <!-- <a href="<?php echo U('Admin/Exper/edit/',array('id'=>$v['id']));?>">编辑</a> --> <a href="<?php echo U('Home/Exper/toTrach/',array('id'=>$vo['id'],'type'=>1));?>">删除</a>               
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<hr/>
<!-- -------------------------------------------- -->
<?php if(is_array($userRes)): foreach($userRes as $key=>$voo): ?>head：<img src="/Hit/Uploads/Avater/<?php echo ($user["avater_path"]); ?>" width="80" height="80" alt=""><br/>
username:<?php echo ($voo["username"]); ?><br/>
sign:<?php echo ($voo["sign"]); ?><br/>
<br/>
truename:<?php echo ($voo["truename"]); ?><br/>
reg_date:<?php echo (date('Y-m-d H:i:s',$voo["reg_date"])); ?><br/>
last_login:<?php echo (date('Y-m-d H:i:s',$voo["last_login"])); ?><br/>
last_ip:<?php echo ($voo["last_ip"]); ?><br/>
group_id:<?php echo ($group_id); ?><br/><?php endforeach; endif; ?>
<a href="<?php echo U('Home/PersonalCenter/edit');?>">个人资料修改</a>
</body>
</html>