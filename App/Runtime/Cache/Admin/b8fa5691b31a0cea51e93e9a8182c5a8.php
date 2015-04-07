<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
<form method="post" action="<?php echo U('Admin/School/search');?>">
	<input type="text" name="key" placeholder="请输入与会人员姓名" />
	<input type="submit" />
</form>
<table class="table">
	<tr>
		<th>ID</th>
		<th>与会人员姓名</th>
		<th>单位</th>
		<th>是否签到</th>
		<th>签到时间</th>
		<?php if($lock == '2'): else: ?>
		<th colspan="2">操作</th><?php endif; ?>
	</tr>
	<?php if(is_array($name)): foreach($name as $key=>$v): ?><tr>
		<td><?php echo ($v["id"]); ?></td>
		<td><?php echo ($v["username"]); ?></td>
		<td><?php echo ($v["school_id"]); ?></td>
		<td><?php echo ($v["time"]); ?></td>
		<td><?php echo (date("Y-m-d H:i:s" , $v['login_time'] )); ?></td>
		<?php if($lock == '2'): else: ?>
		<td><a href="<?php echo U('Admin/School/edit', array('id' => $v['id']));?>">编辑</a></td>
		<td><a href="<?php echo U('Admin/School/delete', array('id' => $v['id']));?>">删除</a></td><?php endif; ?>
	</tr><?php endforeach; endif; ?>
	<tr>
		<td colspan="8" align="center"><?php echo ($page); ?></td>
	</tr>
</table>
<a href="<?php echo U('Admin/Excel/exports_excel');?>">输出为Excel表格</a>
</body>
</html>