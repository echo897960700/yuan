<?php 
namespace Admin\Controller;
use Think\Controller;
function p($arr){
	echo '<pre>'.print_r($arr,true).'<pre>';
}
Class CategoryController extends Controller{
	//列表视图
	Public function index(){
		import('Class.Category',APP_PATH);//调用自定义类
		$cate=M('cate')->order('sort ASC')->select();//抽取数据，并且实例化
		$cate=Category::unlimitedForLevel($cate,"&nbsp;&nbsp;--");//
		$this->assign('cate',$cate)->display();
	}

	//添加分类视图
	Public function add(){
		/*添加子分类*/
		//$this->pid = isset($_GET['pid']) ? $_GET['pid']:0;  
		$this->pid = I('pid',0,'intval'); #同上#
		$this->display();
	}

	//添加分类处理
	Public function runAddCate(){
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './catepic/'; // 设置附件上传目录    
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
		$data = array(
			'name'=>$_POST['name'],
			'sort'=>$_POST['sort'],
			'catepic'=>$file['savename'],
			);
		if (M('cate')->add($data)) {
			$this->success("添加成功",U('Admin/Category/index'));
		}else{
			$this->error("添加错误");
		}
	}

	//排序
	Public function sortCate(){
		$db = M('cate');
		foreach ($_POST as $id => $sort) {
			$db->where(array('id'=>$id))->setField('sort',$sort);
		}
		$this->redirect('Admin/Category/index');
	}

	//修改分类展示
	Public function edit(){
		$userDB=M('cate');
		$userID=I('get.pid');
		$Inf = $userDB->where(array('id='.$userID))->field('id,name,catepic,sort')->find();
		//var_dump($Inf);exit;
		$id=$Inf[id];
		$name=$Inf[name];
		$sort=$Inf[sort];
		$catepic = $Inf[catepic];
		$this->assign('id',$id);
		$this->assign('name',$name);
		$this->assign('sort',$sort);
		$this->assign('catepic',$catepic);
		$this->display();
	}

	//修改分类处理
	Public function runEdit(){
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './catepic/'; // 设置附件上传目录    
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

		$userDB=M('cate');
		$userID=I('post.id');
		$data=array(
			'name'=>$_POST['name'],
			'catepic'=>$file['savename'],
			'sort'=>$_POST['sort'],
			);
		$result = $userDB->where(array('id='.$userID))->save($data);
		if (false!==$result || 0!==$result) {
			$this->success('修改成功',U('/Admin/Category/index'));
		}else{
			$this->error('修改失败');
		}
	}

	//删除分类
	Public function delete(){
		$userDB = M('cate');
		$userID = array('id'=>I('get.pid'));
		$result = $userDB->where($userID)->delete();
		if (false!==$result || 0 !== $result) {
			$this->success('删除成功',U('/Admin/Category/index'));
		}else{
			$this->error('删除失败');
		}
	}
} 





 ?>