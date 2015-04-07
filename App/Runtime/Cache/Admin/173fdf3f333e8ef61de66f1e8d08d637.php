<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>
	<form method="post" enctype="multipart/form-data" action="<?php echo U('Admin/Excel/upload');?>">
		<input type="file" name="excelData" />
		<input type="submit" value="导入" />
	</form>
</body>
</html>