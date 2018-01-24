<?php 
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class IndexController extends Controller{
	public function index(){
		/*推荐文章（按照点赞数）*/
		$this->tuijian = M('blog')->where(array('del'=>0))->order('good desc')->limit(4)->select();
		/*热门文章（按照浏览量）*/
		$this->remen = D('BlogRelation')->where(array('del'=>0))->order('click desc')->limit(3)->getBlogs();
		/*学习心得（按照浏览量）*/
		$this->xuexi = M('exper')->where(array('del'=>0))->order('click desc')->limit(3)->select();
		/*网址*/
		$this->wangzhi = M('share')->where(array('sta'=>2))->limit(5)->select();

		$this->display();
	}

	Public function test(){
		$this->display();
	}
}






 ?>