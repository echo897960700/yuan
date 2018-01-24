<?php  
namespace Home\Model;
use Think\Model\ViewModel;
/**
 * 读取评论视图模型
 */
header("Content-type: text/html; charset=utf-8");
Class SayViewModel extends ViewModel{
	//定义视图表关联关系
	Protected $viewFields = array(
		'say'=>array(
			'id','content','time','uid','bid','eid','youke',
			'_type'=>'LEFT'
			),
		'user'=>array(
			'username','avater_path','sign','location',
			'_on' => 'say.uid = user.id'
			)
		);
}

?>