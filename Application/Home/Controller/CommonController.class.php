<?php  

namespace Home\Controller;
use Think\Controller;

Class CommonController extends Controller{
	/*自动运行*/
	Public function _initialize(){
		//判断用户是否已登录
		if (!isset($_SESSION['UID'])) {
			redirect(U('Home/User/login'));
		}
	}

	
}



?>