<?php 
namespace  Home\Controller;
use Think\Controller;
	
/*博文控制器*/
header("Content-type: text/html; charset=utf-8");
Class BlogController extends Controller{
	//博文列表
	Public function index(){
		$this->cate=M('cate')->order('sort asc')->select();
		$this->display();
	}

	/*博文分类列表*/
	Public function Catelist(){ 
		$cid = $_GET['id'];
		$where = array('cid'=>$cid,'del'=>0);
		$cate = M('cate')->where(array('id'=>$cid))->field('name')->find();//Cate名称  #要用Find()
		
		/*分页处理*/
		$userDB = M('blog');
		$counts = $userDB->where(array('cid'=>$cid,'del'=>0))->count();
		$Page = new \Think\Page($counts,4);
		$show = $Page->show();
		$blog = $userDB->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('blog',$blog);
	
		//Cate名称
		$catename = $cate[name];
		$this->assign('cate',$catename);
		//不同Cate的列表信息
		//$this->blog = M('blog')->where($where)->order('time desc')->select();
		//所有cate
		$this->allcate = M('cate')->where(array('pid'=>0))->select();
		//博文统计数量
		$blogcount = M('blog')->where($where)->count();
		//cate统计数量
		$catecount = M('blog')->where(array('cid'=>$cid,'del'=>0))->count();
		$this->assign('catecount',$catecount);
		//评论数量
		$blogcount = M('blog')->where(array('userid'=>session('UID'),'del'=>0))->count();//统计博文数量

		$this->display();
		 	}


	//按点击量排序
	Public function clickList(){
		$cid = $_GET['id'];
		$where = array('cid'=>$cid,'del'=>0);
		$cate = M('cate')->where(array('id'=>$cid))->field('name')->find();//Cate名称  #要用Find()
		$catename = $cate[name];//Cate名称
		$this->assign('cate',$catename);
		$this->blog = M('blog')->where($where)->order('click desc')->select();//不同Cate的列表信息
		$this->allcate = M('cate')->where(array('pid'=>0))->select();//所有cate
		$blogcount = M('blog')->where($where)->count();//博文统计数量	
		$catecount = M('blog')->where(array('cid'=>$cid,'del'=>0))->count();//cate统计数量
		$this->assign('catecount',$catecount);
		$this->display('Catelist');
	}

	//点击自增
	Public function clickNum(){
		$id=I('id');
		$where = array('id'=>$id);

		//点击次数自增
		$click = M('blog')->where($where)->getField('click');
		M('blog')->where($where)->setInc('click');
		echo 'document.write('.$click.')';
	}

	//点赞
	Public function clickgood(){
		$id = I('id');
		$good = M('blog')->where(array('id'=>$id))->getField('good');
		M('blog')->where(array('id'=>$id))->setInc('good');
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	//点渣
	Public function clickbad(){
		$id = I('id');
		$bad = M('blog')->where(array('id'=>$id))->getField('bad');
		M('blog')->where(array('id'=>$id))->setInc('bad');
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}


	//博文添加
	Public function blog(){
		//所属分类
		if (session('?UID')) {//判断是否登录*/
			/*展现作者资料*/
			$this->user = M('user')->where(array('id'=>session('UID')))->select();
			$blogcount = M('blog')->where(array('userid'=>session('UID'),'del'=>0))->count();//统计博文数量
			$this->assign('blogcount',$blogcount);
			//展示自己最新发布4条博文
			$this->newblog = M('blog')->where(array('userid'=>session('UID'),'del'=>0))->limit(4)->select();
			/*博文添加*/
			import('Class.Categoryh',APP_PATH);
			$cate = M('cate')->order('sort')->select();
			$this->cate = Category::unlimitedForLevel($cate);
			//博文属性
			$this->attr=M('attr')->select();
			$this->display('blog');
		}else{
			$this->error('请您登录！',U('/Home/User/login'));
		}
		
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
		if (isset($_POST['aid'])) {
			$data['attr'] = $_POST['aid'];
			}
		if(D('BlogRelation')->relation(true)->add($data)){
				$this->success('添加成功',U('Home/Blog/index'));
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
			$this->success($msg.'成功',U('Home/PersonalCenter/index'));
		}else{
			$this->error($msg.'失败');
		}
	}

	Public function one(){
		//博文展示
		$blogID=I('id');
		$field=array('del');
		$where = array('del'=>0);
		$blog=D('BlogRelation')->getBlogs();
		$cate=D('BlogRelation')->where(array('id'=>$blogID))->field(array('cate'))->getBlogs();
		$this->userinfo = D('BlogView')->where(array('id'=>$blogID))->select();
		$this->blog=D('BlogRelation')->where(array('id'=>$blogID))->getBlogs();
		//相关推荐
		$cid = I('cid');
		$this->connectblog = M('blog')->where(array('cid'=>$cid,'del'=>0))->limit(8)->select();//不同Cate的列表信息
		$this->assign('cid',$cid);//传递$cid
		//var_dump($connectblog);exit;
		//评论展示
		$this->say = D('SayView')->where(array('bid'=>$blogID))->select();
		//判断本人发布留言
		$id = M('say')->where(array('uid'=>session('UID'),'bid'=>$blogID))->field('id')->select();
		//$selfadd = where('')
		//var_dump($selfadd);exit;
		/*if ($selfadd) {
			$this->assign('selfadd','删除');
		}else{
			$this->assign('selfadd','未显示');
		}*/
		$this->display();
	}


	/*评论区*/

	//添加评论
	Public function doSay(){
		//提取评论数据
		$data = array(
			'content'=>$_POST['content'],
			'time'=>time(),
			'bid'=>$_POST['bid'],
			'uid'=>$_POST['uid']
			);
		if (session('?UID')) {
			if (M('say')->add($data)) {
				$this->success('评论成功');
			}else{
				$this->error('评论失败');
			}
			$saycount = M("blog"); // 实例化saycount对象
			$saycount->where(array('id'=>$_POST['bid']))->setInc('saycount',1); // 文章评论数加1
		}else{
			/*$this->error('请您登录！',U('Home/User/login'));*/
			/*通过IP获取地址*/
			$difang = getCurrentIp();
			$location = $difang['province'].$difang['city'].'游客';
			$data = array(
			'content'=>$_POST['content'],
			'time'=>time(),
			'bid'=>$_POST['bid'],
			'youke'=>$location
			);
			
			if (M('say')->add($data)) {
				$this->success('评论成功');
			}else{
				$this->error('评论失败');
			}
			$saycount = M("blog"); // 实例化saycount对象
			$saycount->where(array('id'=>$_POST['bid']))->setInc('saycount',1); // 文章评论数加1
		}
	}

	/*pdf下载*/
	Public function pdf(){
		import('Org.tcpdf.Tcpdf');
		//实例化 
		$pdf = new \Tcpdf('P', 'mm', 'A4', true, 'UTF-8', false); 

		// 设置页眉和页脚信息
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('YuanHostel');
		$pdf->SetTitle('Welcome to YuanHostel.com!');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
		
		// 设置页眉和页脚信息
		$pdf->SetHeaderData('logo.png', 24, '猿客栈', '一个在线Web学习交互新阵地！',  
		      array(0,64,255), array(0,64,128)); 
		$pdf->setFooterData(array(0,64,0), array(0,64,128)); 

		// 设置页眉和页脚字体 
		//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->setHeaderFont(Array('stsongstdlight', '', '16')); 
		$pdf->setFooterFont(Array('stsongstdlight', '', '10')); 

		// 设置默认等宽字体 
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		/*$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);*/
		// 设置间距 
		$pdf->SetMargins(20, 35, 20); 
		$pdf->SetHeaderMargin(5); 
		$pdf->SetFooterMargin(10); 

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		$pdf->SetFont('stsongstdlight', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect 阴影
		//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		// Set some content to print
		$id = $_GET['id'];
		$html = M('blog')->where(array('id'=>$id))->field('content')->find();
		$html = $html['content'];

		/*$name = M('blog')->where(array('id'=>$id))->find();
		$name = $name['title'];*/


		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('YuanHostel.pdf', 'I');
	}

}













 ?>