<?php 
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
Class PersonalCenterController extends Controller{

	Public function index(){
		/*Blog展示*/
		$field=array('del');
		$userid = session('UID');
		$where = array('del'=>0,'userid'=>$userid);	
		$blog=D('BlogRelation')->getBlogs();
		$this->blog=D('BlogRelation')->where($where)->getBlogs();
		$blogcount = M('blog')->where(array('userid'=>session('UID'),'del'=>0))->count();//统计博文数量
		$this->assign('blogcount',$blogcount);

		/*Exper展示*/
		$experDB = M('exper'); 
		$userid = session('UID');
		$this->result = $experDB->where(array('del'=>0,'userid'=>$userid))->select();
		$expercount = M('exper')->where(array('userid'=>session('UID'),'del'=>0))->count();//统计心得数量
		$this->assign('expercount',$expercount);

		/*共享资源*/
		$this->myshare = M('share')->where(array('userid'=>session('UID')))->select();
		$sharecount = M('share')->where(array('userid'=>session('UID')))->count();//统计资源数量
		$this->assign('sharecount',$sharecount);

		/*个人信息*/		
		$user = M('user');
		$this->userRes = $user->where(array('id'=>$userid))->select();
		$group_id= session('group_id');
		if ($group_id ==3) {
			$this->assign('group_id','普通用户');
		}else{
			$this->assign('group_id','VIP用户');
		}
		/*资料修改*/
		$user_id = array('id'=>session('UID'));
		$this->info = M('user')->where($user_id)->select();
		$this->zl_user = M('user')->field(array('location','sex','avater_path','email'))->where($user_id)->find();//find和select()的区别

		/*获取头像地址*/
		$this->user = M('user')->field(array('avater_path','username'))->where(array('id'=>session('UID')))->find(); 
		
		/*时光轴*/
		$this->shiguang=M('shiguang')->where(array('userid'=>session('UID')))->order('time desc')->select();


		$this->display();
	}

	//修改用户基本信息
	Public function doEdit(){
		$data = array(
			'username'=>$_POST['username'],
			'truename'=>$_POST['truename'],
			'sex'=>$_POST['sex'],
			'location'=>$_POST['province'].' '.$_POST['city'],
			'sign'=>$_POST['sign']
			);
		$where = array('id'=>session('UID'));
		if (M('user')->where($where)->save($data)) {
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
	}

	//用户基本信息
	Public function edit(){
		$where = array('id'=>session('UID'));
		$this->info = M('user')->where($where)->select();
		$this->user = M('user')->field(array('location','sex','avater_path','email'))->where($where)->find();//find和select()的区别
		$this->display();
	}

	
	// 设置头像
    public function upload(){
    	$config = array(    
    		'maxSize'    =>    3145728,    
    		'savePath'   =>    './Avater/',    
    		'saveName'   =>    array('uniqid',''),    
    		'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),    
    		'autoSub'    =>    false,    
    		'subName'    =>    array('date','Ymd'),
    		);    
	    $upload = new \Think\Upload($config);// 实例化上传类
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息    
	    $this->error($upload->getError());}else{// 上传成功 
	    	//获取上传文件信息    
	    	foreach($info as $file){
	    		$where = array('id'=>session('UID'));
	    		$field = array('avater_path'=>$file['savename']);
	    		if (M('user')->where($where)->field('avater_path')->save($field)) {
	    		        	$this->success('上传成功',U('Home/PersonalCenter/index'));
	    		    }else{
	    		    	$this->error('上传失败');
	    		    }
	    		$this->assign('avater_path',$field);        
	    		//echo $file['savepath'].$file['savename'];    
	    	}
	    }
	}
	
	//修改密码
	Public function editPwd(){
		$db = M('user');
		//验证旧密码
		$where = array('id'=>session('UID'));
		$old = $db -> where($where)->getField('password');
		$pold = md5($_POST['old']);
		
		if ($pold != $old ) {
			$this->error('旧密码错误');
		}
		
		if ($_POST['new'] != $_POST['newed']) {
			$this->error('两次密码不一致');
		}
		
		$newPwd = md5($_POST['new']);
		$data = array(
			'id'=>session('UID'),
			'password'=>$newPwd
			);
		
		if ($db->save($data)) {
			$this->success("修改成功");
		}else{
			$this->error('修改失败');
		}
	}

	/*时光轴添加*/
	Public function shiguangAdd(){
		$data = array(
			'content'=>I('content'),
			'time'=>time(),
			'userid'=>session('UID')
			);
		//var_dump($data);exit;
		if (M('shiguang')->add($data)) {
			$this->success('添加成功！');
			//header("Location: " . $_SERVER['HTTP_REFERER']);
		}else{
			$this->error('添加失败！');
		}
	}
	
		
} 


 ?>