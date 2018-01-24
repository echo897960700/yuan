<?php  
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
Class ShareController extends Controller{
	//展示Share
	Public function index(){
		$shareDB = M('share');
		$this->res = $shareDB->where(array('sta'=>2))->limit(6)->select();//网址
		$this->resu = $shareDB->where(array('sta'=>1))->limit(6)->select();//网盘
		$this->result = $shareDB->where(array('sta'=>3))->limit(6)->select();//文档


		$this->display();
	}

	//添加Share
	Public function add(){
		$this->display();
	}

	//导航添加
	Public function doAdd(){
		$data['name'] = $_POST['name'];		
		$data['url'] = $_POST['url'];
		$data['pass'] = $_POST['password'];
		$data['nameurl']= "<a href=".$data['url']." target=\"_blank\">".$data['name']."</a>";
		$data['alt'] = $_POST['alt'];
		$data['userid'] = session('UID');
		$data['username']=session('username');
		$data['sta'] = 2;
		$shareDB = M('share');
		$res = $shareDB->add($data);
		if (false!==$res || 0!==$res) {
			$this->success('添加成功',U('Home/Share/index'));
		}else{
			$this->error('添加失败',U('Home/Share/add'));
		}
	}

	//网盘添加
	Public function panAdd(){
		$data['name'] = $_POST['name'];		
		$data['url'] = $_POST['url'];
		$data['pass'] = $_POST['password'];
		$data['nameurl']= "<a href=".$data['url']." target=\"_blank\">".$data['name']."</a>";
		$data['alt'] = $_POST['alt'];
		$data['userid'] = session('UID');
		$data['username']=session('username');
		$data['sta'] = 1;
		//var_dump($data);exit;
		$shareDB = M('share');
		$res = $shareDB->add($data);
		if (false!==$res || 0!==$res) {
			$this->success('添加成功',U('Home/Share/index'));
		}else{
			$this->error('添加失败',U('Home/Share/add'));
		}
	}

	public function wordAdd(){    
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','docx','chm','html');// 设置附件上传类型    
		$upload->savePath  =      './share/'; // 设置附件上传目录    
		$upload->autoSub   =     false;//
		// 上传文件     
		$info   =   $upload->upload();    
		if(!$info) {
		// 上传错误提示错误信息        
			$this->error($upload->getError());    
		}/*else{// 上传成功 获取上传文件信息    */  
			foreach($info as $file){        
				echo $file['savepath'].$file['savename'];  
			}
		//
		$data['name'] = $_POST['name'];		
		$data['url'] = $file['savename'];
		$data['pass'] = $_POST['password'];
		/*$data['nameurl']= "<a href=".$data['url']." target=\"_blank\">".$data['name']."</a>";*/
		$data['alt'] = $_POST['alt'];
		$data['userid'] = session('UID');
		$data['username']=session('username');
		$data['sta'] = 3;
		/*var_dump($data);exit;*/
		$shareDB = M('share');
		$res = $shareDB->add($data);
		if (false!==$res || 0!==$res) {
			$this->success('添加成功',U('Home/Share/index'));
		}else{
			$this->error('添加失败',U('Home/Share/add'));
		}
	

	}

	/*public function download(){
        $uploadpath='./Public/Uploads/';//设置文件上传路径
        $id=$_GET['id'];//GET方式传到此方法中的参数id,即文件在数据库里的保存id.根据之查找文件信息。
        if($id==''){//如果id为空
            $this->error('下载失败！','',1);
        }
        $file=M('share');
        $result= $file->find($id);//根据id查询到文件信息
        if($result==false) //如果查询不到文件信息
        {
            $this->error('下载失败！', '', 1);
        }else{
            $savename=$file->savename;//文件保存名
            $showname=$file->savename;//文件原名
            $filename=$uploadpath.$savename;//完整文件名（路径加名字）
            import('Org.Net.Http');
            Http::download($filename,$showname);
        }
    }*/
    /*网址*/
    Public function learnweb(){
    	$shareDB = M('share');
		$this->res = $shareDB->where(array('sta'=>2))->select();//全部网址
    	/*获取头像地址*/		
		$userface = M('user')->field(array('avater_path'))->where($where)->find();
		/*var_dump($userface);exit; */
    	$this->assign('userface',$userface);
    	/*获取自己的网址*/
    	$where = array('userid'=>session('UID'),'sta'=>2);
    	$this->myurl = $shareDB->where($where)->select();
    	$this->display();
    }
    /*网盘*/
    Public function learnres(){
    	$shareDB = M('share');
		$this->res = $shareDB->where(array('sta'=>1))->select();//全部网址
    	/*获取头像地址*/		
		$userface = M('user')->field(array('avater_path'))->where($where)->find();
		/*var_dump($userface);exit; */
    	$this->assign('userface',$userface);
    	/*获取自己的网址*/
    	$where = array('userid'=>session('UID'),'sta'=>1);
    	$this->myurl = $shareDB->where($where)->select();
    	$this->display();
    }

    /*文档*/
     Public function learnbook(){
    	$shareDB = M('share');
		$this->res = $shareDB->where(array('sta'=>3))->select();//全部网址
    	/*获取头像地址*/		
		$userface = M('user')->field(array('avater_path'))->where($where)->find();
		/*var_dump($userface);exit; */
    	$this->assign('userface',$userface);
    	/*获取自己的网址*/
    	$where = array('userid'=>session('UID'),'sta'=>3);
    	$this->myurl = $shareDB->where($where)->select();
    	$this->display();
    }
}















?>