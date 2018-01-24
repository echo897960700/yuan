<?php  
namespace Admin\Model;
use Think\Model\RelationModel;
header("Content-type: text/html; charset=utf-8");
Class BlogRelationModel extends RelationModel{
	//博文属性和文章多对多模型
	Protected $tableName = 'blog';
	Protected $_link = array(
		'attr'=>array(
			'mapping_type'=>self::MANY_TO_MANY,
			'class_name'=>'attr',
			'mapping_name'=>'attr',
			'foreign_key'=>'bid',
			'relation_foreign_key'=>'aid',
			'relation_table'=>'p_blog_attr',
			),
		'cate'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'cate',
			'foreign_key'=>'cid',
			'mapping_fields'=>'name',
			'as_fields'=>'name:cate'
			)
		);

	//自定义getBlogs获取方法
	Public function getBlogs ($type=0){
		$field = array('del');
		$where = array('del'=>$type);
		return $this->field($field,true)->where($where)->relation(true)->select();
	}

	//视图表关联模型
    public $viewFields = array (
            'blog' => array (
                    'id','title','content','time','click','userid',
            		
            ),
            'user' => array(
                    'username','avater_path','location','sign',
                    '_type' => 'LEFT',
                    '_on' => 'blog.userid=user.id',
            ),

        );
	
}













?>