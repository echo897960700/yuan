<?php 

namespace  Home\Controller;
use Think\Controller;
Class AttributeController extends Controller{
	//属性列表
	Public function index(){
		$this->attr=M('attr')->select();
		$this->display();
	}

	//添加属性
	Public function addAttr(){
		$this->display();
	}

	//添加属性表单处理
	Public function runAttr(){
		if (M('attr')->add($_POST)) {
			$this->success('添加成功',U('/Home/Attribute/index'));
		}else{
			$this->error('添加失败');
		}
	}
}



 ?>