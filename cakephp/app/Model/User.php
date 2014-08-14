<?php

class User extends AppModel
{
	public $name = 'User';

	/**
	 * 模型关联
	 * hasMany：每个用户都有若干个帖子
	 * @var array
	 */
//	var $hasMany = array ('Post' => array(	// 关联的模型
//	'className' => 'Post',	// 关联的模型
//	'conditions' => '',
//	'order' =>  '',
//	'foreignKey'=>'user_id')
//	);

	// 更多验证规则参考：/cakephp/lib/Cake/Model/Validator/
	// 单个验证规则的申明方法
//	public $validate = array(
//		'username' => array(
//			'rule' => 'isunique',
//			'message' => '用户名已经被注册'
//		)
//	);

	public $validate = array(
		'username' => array(	// 多个验证规则的申明方法
			array(
				'rule' => '/^[a-z0-9]{6,40}$/i',	// 使用正则表达式验证
				'message' => '由字母和数字组成，长度6~40个字符'	// 当不满足正则验证时，给出的提示信息
			),
			array(
				'rule' => 'isunique',
				'message' => '用户名已经被注册',
			)
		),
		'pwd' => array(
			'rule' => 'notEmpty'
		),
		'email' => array(
			'rule' => 'email',
			'message' => '请输入正确的邮箱地址'
		)
	);
}