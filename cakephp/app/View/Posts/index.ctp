<h1>posts</h1>
<table>
	<tr>
		<th>id</th>
		<th>title</th>
		<th>content</th>
		<th>dated</th>
		<th>操作</th>
	</tr>

	<!-- 在控制器PostsController中，set的posts的值 -->

	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $post['Post']['id']; ?></td>
		<!-- <td><?php echo $post['Post']['title']; ?></td> -->
		<td>
			<!-- 创建一个link超链接，设置显示的内容，调用的 -->
			<?php echo $this->Html->link($post['Post']['title'],array('controller'=>'posts','action'=>'view',$post['Post']['id'])); ?>
		</td>
		<td><?php echo $post['Post']['content']; ?></td>
		<td><?php echo $post['Post']['dated']; ?></td>
		<td>
			<?php
				// 可以不写'controller'=>'posts'，默认调取当前所属的控制器PostsController
				echo $this->Html->link('编辑',array('action'=>'edit',$post['Post']['id']));
			?>
			&nbsp;|&nbsp;
			<?php
				// 不是一个简单的超链接，是提交一个post的请求（Javascript创建post请求）
				echo $this->Form->postLink(
					'删除',
					array('action' => 'delete', $post['Post']['id']),
					array('confirm' => '确定删除吗'));	// 带确认框
			?>
		</td>
	</tr>
	<?php endforeach; ?>

</table>