<h1>登陆</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('pwd',array('type'=>'password'));
echo $this->Form->end('登陆');
echo $this->html->link('注册',array('controller'=>'users','action'=>'register'))
?>