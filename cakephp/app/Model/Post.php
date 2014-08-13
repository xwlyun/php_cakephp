<?php

/**
 * Class Post
 * 模型，对应数据库的表posts
 * 命名规则，数据库表名posts，模型Post，控制器PostsController
 */
class Post extends AppModel {
	// 数据库中表名posts
	public $name = 'Post';

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