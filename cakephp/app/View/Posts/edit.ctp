<!-- 视图，编辑帖子 -->
<h1>编辑帖子</h1>
<?php
//echo $this->Form->create('Post',array('action'=>'edit'));	// 可以不写'action'=>'edit'，默认从当前文件edit.ctp调用到edit方法
echo $this->Form->create('Post');	// create的参数表明该表单提交给模型Post
echo $this->Form->input('title');
echo $this->Form->input('content', array('rows'=>'3'));
//echo $this->Form->input('id',array('type'=>'hidden'));	// 可以不用hidden这个id字段，因为edit页面地址栏中含有参数即是id
echo $this->Form->end('更新');