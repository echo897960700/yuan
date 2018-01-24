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
<form action="<?php echo U('Admin/Exper/doEdit',array('id'=>$v['id']));?>" enctype="multipart/form-data" method="post">
<?php if(is_array($result)): foreach($result as $key=>$v): ?><table class="table table-bordered table-hover definewidth m10">
    <tr>
    <input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
        <td width="10%" class="tableleft">标题:</td>
        <td><input type="text" name="title" value="<?php echo ($v["title"]); ?>" /></td>
    </tr>
<!--     <tr>
        <td class="tableleft">start time：</td>
        <td><input type="text" name="starttime" value="<?php echo ($v["starttime"]); ?>" /></td>
    </tr>   
    <tr>
        <td class="tableleft">learntime：</td>
        <td><input type="text" name="learntime" value="<?php echo ($v["learntime"]); ?>" /></td>
    </tr> -->
    <tr>
        <td class="tableleft">版面：</td>
        <td>
            <input type="file" name="experpic" />
        </td>
    </tr>
    <tr>
        <td class="tableleft">专攻：</td>
        <td><input type="text" name="specialize" value="<?php echo ($v["specialize"]); ?>"/></td>
    </tr>
<!--     <tr>
        <td class="tableleft">identity：</td>
        <td><input type="text" name="identity" value="<?php echo ($v["identity"]); ?>"/></td>
    </tr> -->
    <tr>
        <td class="tableleft">经历:</td>
        <td>
            <textarea name="story"><?php echo ($v["story"]); ?></textarea>
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table><?php endforeach; endif; ?>
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