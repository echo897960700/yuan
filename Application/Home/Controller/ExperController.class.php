<?php 
namespace Home\Controller;
use Think\Controller;

/*讲经历，讲故事Experience*/
header("Content-type: text/html; charset=utf-8");
Class ExperController extends Controller{
	//展示故事
	Public function index(){
		$experDB = M('exper');
		$this->result = $experDB->where(array('del'=>0))->select();
		$this->display();
	}


	//添加故事处理
	Public function runAdd(){
	if (session('?UID')) {
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
			}/*else{// 上传成功 获取上传文件信息    */  
				foreach($info as $file){        
					 $file['savepath'].$file['savename'];  
				}

			//获取数据
			$inf = array(
				'title'=>$_POST['title'],
				/*'starttime'=>$_POST['starttime'],
				'learntime'=>$_POST['learntime'],*/
				'specialize'=>$_POST['specialize'],
				/*'identity'=>$_POST['identity'],*/
				'experpic'=>$file['savename'],
				'story'=>$_POST['story'],
				'addtime'=>time(),
				'userid'=>session('UID'),
				'username'=>session('username'),
				);
			/*var_dump($inf);exit;*/
			$infDB=M('exper');
			$result = $infDB->add($inf);
			if (fasle!==$result|| 0!==$result) {
				$this->success('添加成功！',U('Home/Exper/index'));
			}else{
				$this->error('添加失败！');
			}
		}else{
			$this->error('请登录！');
		}
	}

	//展示单条故事
	Public function one(){
		$Experid = I('get.id');
		$experDB = M('exper');
		$this->result = $experDB->where(array('id'=>$Experid))->select();
		//热门心得
		$this->connectexper = M('exper')->order('click desc')->limit(8)->select();
		//评论区
		$this->say = D('SayView')->where(array('eid'=>$Experid))->select();
		//var_dump($say);exit;
		$this->display();
	}

	

	//编辑Exper
	Public function edit(){
		$id = (int)$_GET['id'];
		$experDB = M('exper');
		$this->result=$experDB->where(array('del'=>0,'id'=>$id))->select();
		$this->display();
	}
	//编辑Exper处理   
	Public function doEdit(){
		$userDB = M('exper');
		$id = (int)$_POST['id']; 
		$data = array(
			'title'=>$_POST['title'],
			/*'starttime'=>$_POST['starttime'],
			'learntime'=>$_POST['learntime'],*/
			'specialize'=>$_POST['specialize'],
			/*'identity'=>$_POST['identity'],*/
			'story'=>$_POST['story'],
			);
		$result = $userDB->where(array('id='.$id))->save($data);
		if (false!==$result || 0 !== $result) {
			$this->success('修改成功',U('Home/PersonalCenter/index'));
		}else{
			$this->error('修改失败');
		}
	}

	//删除Exper到回收站/还原
	Public function toTrach(){
		$update=array(
			'id'=>(int)$_GET['id'],
			'del'=>1
			);
		if (M('exper')->save($update)) {
			$this->success('删除成功！',U('Home/PersonalCenter/index'));
		}else{
			$this->error('删除失败');
		}
	}

	//点击自增（浏览数）
	Public function clickNum(){
		$id=I('id');
		//var_dump($id);exit;
		$where = array('id'=>$id);

		//点击次数自增
		$click = M('exper')->where($where)->getField('click');
		M('exper')->where($where)->setInc('click');
		echo 'document.write('.$click.')';
	}

	/*评论区*/

	//添加评论
	Public function doSay(){
		//提取评论数据
		$data = array(
			'content'=>$_POST['content'],
			'time'=>time(),
			'eid'=>$_POST['eid'],
			'uid'=>$_POST['uid']
			);
		if (session('?UID')) {
			if (M('say')->add($data)) {
				$this->success('评论成功');
			}else{
				$this->error('评论失败');
			}
			$saycount = M("exper"); // 实例化saycount对象
			$saycount->where(array('id'=>$_POST['eid']))->setInc('saycount',1); // 文章评论数加1
		}else{
			/*$this->error('请您登录！',U('Home/User/login'));*/
			/*通过IP获取地址*/
			$difang = getCurrentIp();
			$location = $difang['province'].$difang['city'].'游客';
			$data = array(
			'content'=>$_POST['content'],
			'time'=>time(),
			'eid'=>$_POST['eid'],
			'youke'=>$location
			);
			
			if (M('say')->add($data)) {
				$this->success('评论成功');
			}else{
				$this->error('评论失败');
			}
			$saycount = M("exper"); // 实例化saycount对象
			$saycount->where(array('id'=>$_POST['eid']))->setInc('saycount',1); // 文章评论数加1
		}
	}

	//点赞
	Public function clickgood(){
		$id = I('id');
		$good = M('exper')->where(array('id'=>$id))->getField('good');
		M('exper')->where(array('id'=>$id))->setInc('good');
		//echo 'document.write('.$good.')';
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	//点渣
	Public function clickbad(){
		$id = I('id');
		$bad = M('exper')->where(array('id'=>$id))->getField('bad');
		M('exper')->where(array('id'=>$id))->setInc('bad');
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	//删除评论

	//回复评论
 
}









 ?>