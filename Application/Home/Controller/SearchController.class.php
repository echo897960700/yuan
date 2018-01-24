<?php  
namespace Home\Controller;
use Think\Controller;
/*搜索控制器*/
class SearchController extends Controller{
	//搜索找人
	Public function sechUser(){
		if (!session('UID')) {
			//echo "请登录";
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
		$keyword = $this->_getKeyword();
		
		if ($keyword) {
			//检索除自己以外昵称含有关键字的用户
			$where = array(
				'username'=>array('LIKE','%'.$keyword .'%'),
				'id'=>array('NEQ',session('UID'))
				);
			$field = array('id','username','sex','location','sign','	avater_path','follow','fans');
			$db = M('user');
			//$result = $db ->where($where)->field($field)->select();
			
			//导入分页
			//import('ORG.Util.Page');
			$count = $db->where($where)->count('id');
			$page = new  \Think\Page($count,8);
			$show = $page->show();
			$limit = $page->firstRow . ',' .$page->listRows;
			$result = $db->where($where)->field($field)->limit($limit)->select();
			$this->assign('page',$show);



			//重新组合结果集，得到是否已关注与是否互相关注
			$result = $this->_getMutual($result);

			//分配搜索结果到视图
			$this->result = $result ? $result:false;
			//页码
			//$this->page = $page->show();
		}

		$this->keyword = $keyword;
		$this->display();
	}

	//返回搜索关键字
	Private function _getKeyword(){
		return $_GET['keyword'] == '搜索找人、博文'?NULL:$_GET['keyword'];
	}

	//重新结果集得到是否互相关注与是否已关注
	Private function _getMutual($result){
		if (!$result) return false;
		$db = M('follow');

		foreach ($result as $k => $v) {
			//是否相互关注
			$sql = '(SELECT `follow` FROM `p_follow` WHERE `follow` = ' . $v['id'] . ' AND `fans` = ' . session('UID') . ') UNION (SELECT `follow` FROM `p_follow` WHERE `follow` = ' . session('UID') . ' AND `fans` = ' . $v['id'] . ')';
			$mutual = $db->query($sql);
			//echo $db->getLastSql();exit;
			//var_dump($mutual);exit;

			if (count($mutual)==2) {
				$result[$k]['mutual']=1;
				$result[$k]['followed']=1;
			}else{
				$result[$k]['mutual'] = 0;

				//未互相关注是检索是否已关注
				$where = array(
					'follow'=>$v['id'],
					'fans'=>session('UID')
					);
				$result[$k]['followed'] = $db->where($where)->count();
			}
		}
		return $result;
	}

	//异步创建新分组
	Public function addGroup(){
		$data = array(
			'name'=>$_POST['name'],
			'uid'=>session('UID')
			);
			if (session('UID')) {
				if (M('group')->add($data)) {
					echo json_encode(array('status' => 1, 'msg' => '创建成功'));
					//$this->success('创建分组成功',U('Home/Search/sechUser'));
				}else{
					//$this->error('创建失败');
					echo json_encode(array('status' => 0, 'msg' => '创建失败,请重试...'));
				}	
			}else{
				$this->error('请登录账号',U('Home/Search/sechUser'));
			}		
	}

	/**
	 * 异步创建新分组
	 */
/*	Public function addGroup () {
		if (!$this->isAjax()) {
			halt('页面不存在');
		}

		$data = array(
			'name' => $this->_post('name'),
			'uid' => session('UID')
			);
		if (M('group')->data($data)->add()) {
			echo json_encode(array('status' => 1, 'msg' => '创建成功'));
		} else {
			echo json_encode(array('status' => 0, 'msg' => '创建失败,请重试...'));
		}
	}*/
	/**
	 * 异步添加关注
	 */
	Public function addFollow () {
		/*if (!$this->isAjax()) {
			halt('页面不存在');
		}*/
		$data = array(
			'follow' => I('follow', 'intval'),//获取不到
			'fans' => (int) session('UID'),
			'gid' => I('gid', 'intval')
			);
		/*var_dump($data);exit;*/
		if (M('follow')->add($data)) {
			$db = M('user');
			$db->where(array('id' => $data['follow']))->setInc('fans');
			$db->where(array('id' => session('UID')))->setInc('follow');
			echo json_encode(array('status' => 1, 'msg' => '关注成功'));
		} else {
			echo json_encode(array('status' => 0, 'msg' => '关注失败请重试...'));
		}
	}


}








?>