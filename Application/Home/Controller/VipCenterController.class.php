<?php 
namespace Home\Controller;
use Think\Controller;
Class VipCenterController extends Controller{
	Public function index(){
		/*Blog展示*/
		$field=array('del');
		$userid = session('UID');
		$where = array('del'=>0,'userid'=>$userid);	
		$blog=D('BlogRelation')->getBlogs();
		$this->blog=D('BlogRelation')->where($where)->getBlogs();

		/*Exper展示*/
		$experDB = M('exper');
		$userid = session('UID');
		$this->result = $experDB->where(array('userid'=>$userid))->select();

		/*个人信息*/		
		$user = M('user');
		$this->userRes = $user->where(array('id'=>$userid))->select();
		$group_id= session('group_id');
		if ($group_id ==3) {
			$this->assign('group_id','普通用户');
		}else{
			$this->assign('group_id','VIP用户');
		}

		$this->display();
	}

	

		
} 


 ?>