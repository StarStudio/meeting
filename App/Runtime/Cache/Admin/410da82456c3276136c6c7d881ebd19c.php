<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="__PUBLIC__/Css/login.css" />
</head>
<body>
	<div class="login">	
		<form action="<?php echo U('Admin/User/save');?>" method="post" id="login">
		<table border="1" width="100%">
			<tr>
				<th>旧密码:</th>
				<td>
					<input style="width:490px;" type="password" name="oldpwd"/>
				</td>
			</tr>
			<tr>
				<th>新密码:</th>
				<td>
					<input style="width:490px;" type="password" name="password"/>
				</td>
			</tr>
			<tr>
				<th>确认密码:</th>
				<td>
					<input style="width:490px;" type="password" name="repwd"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;"> <input type="submit" class="submit" value="提交"/></td>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>