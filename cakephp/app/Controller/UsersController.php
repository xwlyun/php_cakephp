<?php

class UsersController extends AppController
{
	public $name = 'Users';
	public $helpers = array('Html', 'Form');	// 使用一些helper

	/**
	 * 注册用户，访问地址：http://127.0.0.1/cakephp/users/register
	 */
	function register()
	{
		if($this->request->is('post'))	// 判断是post请求，而不是在判断模型名是post
		{
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash('注册成功');
				$this->redirect(array('controller'=>'posts','action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('注册失败');
			}
		}
	}

	/**
	 * 列出所有用户
	 */
	function listUsers()
	{
		$users = $this->User->find(
			'all',
			array(
				'fields'	=>	array('id','username','pwd'),
				'order'		=>	'id desc'
			)
		);
		$this->set('users',$users);
	}

}