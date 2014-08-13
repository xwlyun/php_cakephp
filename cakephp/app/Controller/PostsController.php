<?php

/**
 * Class PostsController
 * 控制器，对应模型Post
 */
class PostsController extends AppController{
	public $name = 'Posts';
	public $helpers = array('Html', 'Form');

	/**
	 * index首页，访问地址：http://127.0.0.1/cakephp/posts/index || 127.0.0.1/cakephp/posts
	 */
	public function index(){
		$this->set('posts', $this->Post->find('all'));
	}

	/**
	 * view查看页，访问地址：http://127.0.0.1/cakephp/posts/view/1
	 * @param null $id
	 */
	public function view($id=null){
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
	}

	public $components = array('Session');

	/**
	 * add添加页，访问地址：http://127.0.0.1/cakephp/posts/add
	 */
	public function add(){
		if($this->request->is('post')){	// 判断CakeRequest请求，当前http请求是否为posts类型
			if($this->Post->save(($this->request->data))){	// 调用Post模型，把表单提交来的数据保存到数据库
				$this->Session->setFlash('新文章创建完成');	// 显示提示语，在index上，刷新后消失
				$this->redirect(array('action' => 'index'));	// 跳转到index
			}else{
				$this->Session->setFlash('创建文章出错');
			}
		}
	}

	/**
	 * edit编辑页，访问地址：http://127.0.0.1/cakephp/posts/edit/1
	 * @param null $id
	 */
	function edit($id=null){	// 参数id，是访问编辑页时，地址栏中带的参数
		$this->Post->id = $id;
		if($this->request->is('get')){	// 是get方式，则是从index列表点击到文章编辑页
			$this->request->data = $this->Post->read();	// 获取数据，在表单域显示
		}else{	// 否则是响应，提交编辑的结果
			if($this->Post->save($this->request->data)){	// save方法既可以用来insert也可以用来update
				$this->Session->setFlash('文章更新成功');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('文章更新失败');
			}
		}
	}

	/**
	 * delete删除响应
	 * @param null $id
	 */
	function delete($id=null){
		if($this->request->is('get')){	// 过滤掉get方式的请求
			$this->Session->setFlash('get');
		}else{
			if($this->Post->delete($id)){
				$this->Session->setFlash('帖子 id: ' . $id . '已被删除');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('帖子 id: ' . $id . '删除失败');
			}
		}
	}
}