<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	A('Common');
        // dump($_SESSION);exit;
    	$this->display();
    }
}