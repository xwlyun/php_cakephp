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
			$this->request->data['User']['pwd'] = md5($this->request->data ['User']['pwd']);
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash('注册成功');
				$this->Session->write('username', $this->request->data['User']['username']);
				$this->redirect(array('controller'=>'users','action' => 'index'));
			}
			else
			{
				$this->request->data['User']['pwd'] = '';
				$this->Session->setFlash('注册失败');
			}
		}
	}

	/**
	 * 列出所有用户
	 */
	function index()
	{
		$username = $this->Session->read('username');	// 读取session判断是否登陆
		if($username)
		{
			$user = $this->User->findByUsername($username);
			$this->set('userinfo',$user['User']);
		}

		$users = $this->User->find(
			'all',
			array(
				'fields'	=>	array('id','username','pwd','email'),
				'order'		=>	'id desc'
			)
		);
		$this->set('users',$users);
	}


	function login()
	{
		if($this->request->is('post'))	// 有提交登陆信息
		{
			// findByUsername，数据库确有username字段，可以直接调用此方法
			$user = $this->User->findByUsername($this->request->data['User']['username']);
			// 注意查询结果的形式：array(1) { ["User"]=> array(4) { ["id"]=> string(1) "6" ["username"]=> string(11) "xiaoweilong" ["pwd"]=> string(32) "e10adc3949ba59abbe56e057f20f883e" ["email"]=> string(20) "xiaoweilong@test.com" } }
			if($user['User']['pwd'] == md5($this->request->data['User']['pwd']))
			{
				$this->Session->setFlash('登陆成功');
				$this->Session->write('username', $this->request->data['User']['username']);
				$this->redirect(array('controller'=>'users','action'=>'index'));
			}
			else
			{
				$this->Session->setFlash('登陆失败');
			}
		}
	}

	function logout()
	{
		$this->Session->delete('username');
		$this->Session->setFlash('已登出');
		$this->redirect(array('controller'=>'users','action'=>'index'));
	}

}