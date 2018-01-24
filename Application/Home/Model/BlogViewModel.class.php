<?php  
namespace Home\Model;
use Think\Model\ViewModel;
/**
 * 读取博文视图模型
 */
header("Content-type: text/html; charset=utf-8");
Class BlogViewModel extends ViewModel{
	//定义视图表关联关系
	Protected $viewFields = array(
		'blog'=>array(
			'id','title','content','time','click','userid','username',
			'_type'=>'LEFT'
			),
		'user'=>array(
			'avater_path','sign','sex','sign','location',
			'_on' => 'blog.userid = user.id'
			)
		);
}

?>