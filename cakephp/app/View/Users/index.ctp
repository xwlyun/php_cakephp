<!-- 更多Helper查看：/cakephp/lib/Cake/View/Helper/ -->
<!-- 使用html助手中的tableHeaders（表头）、tableCells（表数据），外层加个<table></table> -->
<h1>用户列表</h1>
<?php if($userinfo['id']){ ?>
	欢迎，<?php echo $userinfo['username']; ?>
	&nbsp;|&nbsp;
	<?php echo $this->html->link('登出',array('controller'=>'users','action'=>'logout')); ?>
<?php }else{ ?>
	<?php echo $this->html->link('登陆',array('controller'=>'users','action'=>'login')); ?>
	&nbsp;|&nbsp;
	<?php echo $this->html->link('注册',array('controller'=>'users','action'=>'register')); ?>
<?php } ?>

<table>
<?php
echo $this->html->tableHeaders(array_keys($users[0]['User']));
foreach($users as $user)
{
	echo $this->html->tableCells($user['User']);
}
?>
</table>