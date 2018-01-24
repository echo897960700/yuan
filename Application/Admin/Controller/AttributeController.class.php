<?php 
namespace  Admin\Controller;
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
			$this->success('添加成功',U('/Admin/Attribute/index'));
		}else{
			$this->error('添加失败');
		}
	}

	//修改属性展示
	Public function edit(){
		//$id = I('pid',0,'intval');//获取哪一条
		$userID=array('id'=>I('get.pid'));//获取哪一条
		if (!$userID) {
            $this->error('参数错误');
        }
		$userDB=M('attr');
		$userInfo = $userDB->where($userID)->field('id,name,color')->find();
		$id=$userInfo[id];
		$name=$userInfo[name];
		$color=$userInfo[color];
		$this->assign('id',$id);
		$this->assign('name',$name);
		$this->assign('color',$color);
/*		var_dump($id);exit;*/
		$this->display();
	}

	//修改属性表单处理
	Public function runEdit(){
		$userDB=M('attr');
		$userID=I('post.id');
		$data=array(
			'name'=>$_POST['name'],
			'color'=>$_POST['color'],
			);
		$result= $userDB->where(array('id='.$userID))->save($data);
		if (false!==$result || 0 !== $result) {
			$this->success('修改成功',U('/Admin/Attribute/index'));
		}else{
			$this->error('修改失败');
		}
	}

	//删除属性
	Public function delete(){
		$userID=array('id'=>I('get.pid'));
		$userDB=M('attr');
		$result=$userDB->where($userID)->delete();
		if (false!==$result || 0 !== $result) {
			$this->success('删除成功',U('/Admin/Attribute/index'));
		}else{
			$this->error('删除失败');
		}
	}
}



 ?>