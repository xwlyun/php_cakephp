<?php

class Group extends AppModel
{
	public $name = 'Group';

	/**
	 * 模型关联
	 * hasMany：每个板块都有若干个帖子
	 * @var array
	 */
	var $hasMany = array ('Post' => array(	// 关联的模型
	'className' => 'Post',	// 关联的模型
	'conditions' => '',
	'order' =>  '',
	'foreignKey'=>'group_id')
	);
}