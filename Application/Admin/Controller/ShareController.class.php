<?php  
namespace Admin\Controller;
use Think\Controller;

Class ShareController extends Controller{
	//展示Share
	Public function index(){
		$shareDB = M('share');
		$this->result = $shareDB->select();
		$this->display();
	}

	//删除Share
	Public function delete(){
		$id = $_GET['id'];
		if (M('share')->delete($id)) {
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}



}















?>