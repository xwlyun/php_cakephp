<!-- 视图，用户注册 -->
<h1>注册</h1>
<?php
echo $this->Form->create('User');	// create的参数注意是模型名
echo $this->Form->input('username');
echo $this->Form->input('pwd',array('type'=>'password'));
echo $this->Form->end('提交');
?>