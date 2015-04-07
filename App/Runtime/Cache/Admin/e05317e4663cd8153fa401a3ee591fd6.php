<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="__PUBLIC__/Css/login.css" />
</head>
<body>
	<div class="login">	
		<form action="<?php echo U('Admin/School/join');?>" method="post" id="login">
		<table border="1" width="100%">
			<tr>
				<th>学校名称:</th>
				<td>
					<select name="school">
					<?php if(is_array($school)): foreach($school as $key=>$v): ?><option value="<?php echo ($v["school"]); ?>"><?php echo ($v["school"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<th>参与者姓名:</th>
				<td>
					<input style="width:490px;" type="text" name="joiner"/>
				</td>
			</tr>
			<tr>
				<th>住宿房间号:</th>
				<td>
					<input style="width:490px;" type="text" name="dom"/>
				</td>
			</tr>
			<tr>
				<th>面聊用户名:</th>
				<td>
					<input style="width:490px;" type="text" name="username"/>
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