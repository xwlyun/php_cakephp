<?php

/**
 * Class Post
 * 模型，对应数据库的表posts
 * 命名规则，数据库表名posts，模型Post，控制器PostsController
 * $name='Post'指代数据库中的表posts
 * $validate=.rule.设置表单助手的验证
 * 外键命名规则user_id指代users表的id字段
 */
class Post extends AppModel
{
	// 数据库中表名posts
	public $name = 'Post';

	/**
	 * 模型关联
	 * belongsTo：外键group_id，每个post都属于一个特定的板块
	 * @var array
	 */
	var $belongsTo = array ('Group' => array(	// 关联的模型
		'className' => 'Group',	// 关联的模型
		'conditions' => '',
		'order' => '' ,
		'foreignKey'=>'group_id')
	);
//	var $belongsTo = array ('User' => array(	// 关联的模型
//		'className' => 'User',	// 关联的模型
//		'conditions' => '',
//		'order' => '' ,
//		'foreignKey'=>'user_id')
//	);

	// 只能验证FormHelper表单助手创建的表单form，自己写的html表单无法用这个方式验证
	// 验证表单，title、content非空
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty'
		),
		'content' => array(
			'rule' => 'notEmpty'
		)
	);
}