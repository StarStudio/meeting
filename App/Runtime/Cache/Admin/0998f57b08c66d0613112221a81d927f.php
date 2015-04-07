<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
<table class="table">
	<tr>
		<th>ID</th>
		<th>用户名</th>
		<th>操作</th>
	</tr>
	<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
		<td><?php echo ($v["id"]); ?></td>
		<td><?php echo ($v["username"]); ?></td>
		<td><a href="<?php echo U('Admin/User/delete', array('id' => $v['id']));?>">删除</a></td>
	</tr><?php endforeach; endif; ?>
	<tr>
		<td colspan="6" align="center"><?php echo ($page); ?></td>
	</tr>
</table>
</body>
</html>