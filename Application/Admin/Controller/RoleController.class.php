<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends Controller {
    public function index()
    {
        //实例化数据库
        $db=M('admin');
        $this->list = $db->select();
    	$this->display();
    }

    public function add()
    {
    	$this->display();
    }

    public function edit()
    {
    	$this->display();
    }
}