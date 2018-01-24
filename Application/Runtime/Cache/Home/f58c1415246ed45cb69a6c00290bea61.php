<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="<?php echo U('Home/Exper/doEdit');?>" method="post">
<?php if(is_array($result)): foreach($result as $key=>$v): ?><table class="table table-bordered table-hover definewidth m10">
    
    <tr>
        <td width="10%" class="tableleft">title:</td>
        <td><input type="text" name="title" value="<?php echo ($v["title"]); ?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">start time：</td>
        <td><input type="text" name="starttime" value="<?php echo ($v["starttime"]); ?>" /></td>
    </tr>   
    <tr>
        <td class="tableleft">learntime：</td>
        <td><input type="text" name="learntime" value="<?php echo ($v["learntime"]); ?>" /></td>
    </tr>
    <tr>
        <td class="tableleft">specialize：</td>
        <td><input type="text" name="specialize" value="<?php echo ($v["specialize"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">identity：</td>
        <td><input type="text" name="identity" value="<?php echo ($v["identity"]); ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft">story:</td>
        <td>
            <textarea><?php echo ($v["story"]); ?></textarea>
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