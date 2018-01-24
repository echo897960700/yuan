<?php 
namespace Admin\Controller;
use Think\Controller;

/*讲经历，讲故事Experience*/
Class ExperController extends Controller{
	//展示Exper
	Public function index(){
		$experDB = M('exper');
		$this->result = $experDB->where(array('del'=>0))->select();
		$this->display();
	}

	//添加Exper
	Public function add(){
		$this->display();
	}
	//添加Exper处理
	Public function runAdd(){
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './experpic/'; // 设置附件上传目录    
		$upload->autoSub   =     false;//
		// 上传文件     
		$info   =   $upload->upload();    
		if(!$info) {
		// 上传错误提示错误信息        
			$this->error($upload->getError());    
		}
			foreach($info as $file){        
				 $file['savepath'].$file['savename'];  
			}

		//获取数据
		$inf = array(
			'title'=>$_POST['title'],
			/*'starttime'=>$_POST['starttime'],
			'learntime'=>$_POST['learntime'],*/
			'experpic'=>$file['experpic'],
			'specialize'=>$_POST['specialize'],
			/*'identity'=>$_POST['identity'],*/
			'story'=>$_POST['story'],
			'addtime'=>time(),
			'userid'=>session('UID'),
			'username'=>session('username'),
			);
		$infDB=M('exper');
		$result = $infDB->add($inf);
		if (fasle!==$result|| 0!==$result) {
			$this->success('添加成功！',U('Home/Exper/index'));
		}else{
			$this->error('添加失败！');
		}
	}

	//展示单条Exper
	Public function one(){
		$id = I('get.id');
		$experDB = M('exper');
		$this->result = $experDB->where(array('id'=>$id))->select();
		$this->display();
	}

	//删除Exper到回收站/还原
	Public function toTrach(){
		$type = (int) $_GET['type'];
		$exper = $type?'删除':'还原';
		$update=array(
			'id'=>(int)$_GET['id'],
			'del'=>$type
			);
		if (M('exper')->save($update)) {
			$this->success($exper.'成功！',U('Admin/Exper/index'));
		}else{
			$this->error($exper.'失败');
		}
	}

	//编辑Exper
	Public function edit(){
		$id = (int)$_GET['id'];
		$experDB = M('exper');
		$this->result=$experDB->where(array('del'=>0,'id'=>$id))->select();
		/*var_dump($result);exit;*/
		$this->display();
	}
	//编辑Exper处理   
	Public function doEdit(){
		$userDB = M('exper');
		$id = (int)$_POST['id'];

		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './experpic/'; // 设置附件上传目录    
		$upload->autoSub   =     false;//
		// 上传文件     
		$info   =   $upload->upload();    
		if(!$info) {
		// 上传错误提示错误信息        
			$this->error($upload->getError());    
		}
			foreach($info as $file){        
				 $file['savepath'].$file['savename'];  
			}
 
		$data = array(
			'title'=>$_POST['title'],
			/*'starttime'=>$_POST['starttime'],
			'learntime'=>$_POST['learntime'],*/
			'experpic'=>$file['savename'],
			'specialize'=>$_POST['specialize'],
			/*'identity'=>$_POST['identity'],*/
			'story'=>$_POST['story'],
			);
		
		$result = $userDB->where(array('id='.$id))->save($data);
		if (false!==$result || 0 !== $result) {
			$this->success('修改成功',U('/Admin/Exper/index'));
		}else{
			$this->error('修改失败');
		}
	}

	//Exper回收站   
	Public function trach(){
		$experDB = M('exper');
		$this->result = $experDB->where(array('del'=>1))->select();
		$this->display('index');
	}

	//彻底删除Exper
	Public function delete(){
		$id = (int)$_GET['id'];
		if (M('exper')->delete($id)) {
			$this->success('彻底删除成功',U('Admin/Exper/trach'));
		}else{
			$this->error('彻底删除失败');
		}
	}
	
	
}









 ?>