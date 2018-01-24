<?php 
namespace  Admin\Controller;
use Think\Controller;
	
/*博文控制器*/
Class BlogController extends Controller{
	//博文列表
	Public function index(){
		$field=array('del');
		$where = array('del'=>0);	
		$blog=D('BlogRelation')->getBlogs();
		$this->blog=D('BlogRelation')->getBlogs();
		$this->display();
	}

	//博文添加
	Public function add(){
		//所属分类
			import('Class.Category',APP_PATH);
			$cate = M('cate')->order('sort')->select();
			$this->cate = Category::unlimitedForLevel($cate);
			//博文属性
			$this->attr=M('attr')->select();
			$this->display();	
	}

	//添加博文表单处理
	Public function addBlog(){
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './blogpic/'; // 设置附件上传目录    
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
		$data=array(
			'title'=>$_POST['title'],
			'blogpic'=>$file['savename'],
			'content'=>$_POST['content'],
			'time'=>time(),
			'click'=>(int) $_POST['click'],
			'cid'=>(int) $_POST['cid'],
			'userid'=> session('UID'),
			'username'=>session('username'),
						);
	/*if (isset($_POST['aid'])) {           #关联属性不需要循环#
		foreach ($_POST['aid'] as $v) {
			$data['attr'][]=$v;
		}
	}*/
		if (isset($_POST['aid'])) {
		$data['attr'] = $_POST['aid'];
		}
		if(D('BlogRelation')->relation(true)->add($data)){
			$this->success('添加成功',U('Admin/Blog/index'));
		}else{
			$this->error('添加失败');
		}
	}


	//删除到回收站/还原
	Public function toTrach(){
		$type=(int) $_GET['type'];
		$msg = $type ? '删除':'还原';
		$update = array(
			'id'=> (int)$_GET['id'],
			'del'=>$type
			);
		if(M('blog')->save($update)){
			$this->success($msg.'成功',U('Admin/Blog/index'));
		}else{
			$this->error($msg.'失败');
		}
	}

	//回收站
	Public function trach(){
		$this->blog=D('BlogRelation')->getBlogs(1);
		$this->display('index');
	}

	//彻底删除
	Public function delete(){
		$id=(int)$_GET['id'];
		if(D('BlogRelation')->relation('attr')->delete($id)){
			$this->success('彻底删除成功',U('Admin/Blog/trach'));
		}else{
			$this->error('彻底删除失败');
		}
	}

	//博文修改展示
	Public function edit(){		
		$userID = I('get.id');
		$where = array('id'=>$userID);	
		$blog=D('BlogRelation')->getBlogs();
		$this->blog=D('BlogRelation')->where($where)->getBlogs();
		//$this->cate= M('cate')->select();
		$this->attr=M('attr')->select();
		$this->display();		
	}

	//修改博文
	Public function doEdit(){		
		/*$userDB = M('blog');
		$userID = I('post.id');
		$data = array(
			'click'=>$_POST['click'],
			'title'=>$_POST['title'],
			'content'=>$_POST['content']
			);
		$result = $userDB->where(array('id='.$userID))->field('click,title,content')->save($data);
		if (false!==$result || 0 !== $result) {
			$this->success('修改成功',U('/Admin/Exper/index'));
		}else{
			$this->error('修改失败');
		}*/
		
		

		//if (isset($_POST['aid'])) {
		 //$data['attr'] = $_POST['aid'];
		// var_dump($_POST['aid']);
		//}
		/*$result = D('BlogRelation')->select();
		var_dump($result);exit;*/
		/*if(D('BlogRelation')->relation(true)->add($data)){
			$this->success('添加成功',U('Admin/Blog/index'));
		}else{
			$this->error('添加失败');
		}*/
		$bid = $_POST['aid'];
		var_dump($bid);exit;
		$data = array(
			'bid'=>$_POST['id'],
			'aid'=>$_POST['aid'],
			
			);
		var_dump($data);exit;
		if (M('blog_attr')->add($data)) {
			$this->success('添加成功',U('Admin/Blog/index'));
		}else{
			$this->error('添加失败');
		}
	}


}













 ?>