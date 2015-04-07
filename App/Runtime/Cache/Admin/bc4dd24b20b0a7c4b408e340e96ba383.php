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
		<th>与会人员姓名</th>
		<th>所属学校</th>
		<th>是否签到</th>
		<th>住宿房间号</th>
		<th>面聊用户名</th>
		<th colspan="2">操作</th>
	</tr>
	<?php if(is_array($name)): foreach($name as $key=>$v): ?><tr>
		<td><?php echo ($v["id"]); ?></td>
		<td><?php echo ($v["joiner"]); ?></td>
		<td><?php echo ($v["school_id"]); ?></td>
		<td><?php echo ($v["time"]); ?></td>
		<td><?php echo ($v["dom"]); ?></td>
		<td><?php echo ($v["username"]); ?></td>
		<td><a href="<?php echo U('Admin/School/edit', array('id' => $v['id']));?>">编辑</a></td>
		<td><a href="<?php echo U('Admin/School/delete', array('id' => $v['id']));?>">删除</a></td>
	</tr><?php endforeach; endif; ?>
	<tr>
		<td colspan="8" align="center"><?php echo ($page); ?></td>
	</tr>
</table>
</body>
</html>