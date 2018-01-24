<?php 

namespace  Home\Controller;
use Think\Controller;

Class CategoryController extends Controller{
	//列表视图
	Public function index(){
		import('Class.Categoryh',APP_PATH);//调用自定义类
		$cate=M('cate')->order('sort ASC')->select();//抽取数据，并且实例化
		$cate=Category::unlimitedForLevel($cate,"&nbsp;&nbsp;--");//
		$this->assign('cate',$cate)->display();
	}
} 





 ?>