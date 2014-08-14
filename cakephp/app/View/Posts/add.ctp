<!-- 视图，新增帖子 -->
<h1>新增帖子</h1>
<?php
echo $this->Form->create('Post');	// create的参数表明该表单提交给模型Post，生成表单头，默认method=post，传递表单数据到当前控制器PostsController
echo $this->Form->input('title');	// input标签
echo $this->Form->input('content',array('rows'=>'3'));	// input标签
echo $this->Form->end('添加');	// 生成提交按钮，完成表单的结尾部分，参数是提交按钮上的文字
?>