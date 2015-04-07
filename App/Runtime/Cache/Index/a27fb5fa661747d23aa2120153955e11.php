<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title>2015年学生工作研讨班签到系统</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/common.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
	<script type="text/javascript" src="__PUBLIC__/js/addLoadEvent.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
</head>
<body>
<form action="<?php echo U('Index/Index/other');?>" method="post">
	<div class="container">
		<div class="head">
			<h1><span class="pen"></span>2015年大学生思想政治教育工作研讨培训班签到系统</h1>
		</div>
		<div class="chooser">
			<div id="school"><i></i><input style="width:80%;" type="text" value="请选择学校" name="school" readonly="readonly"></div>
			<div id="name"><i></i><input type="text" value="请选择姓名" name="joiner" readonly="readonly"><span>已签到</span></div>
		</div>
	</div>
	<div class="sub"><button id="sub" type="submit" disabled="disabled"> 确认签到</button></div>
</form>	
	<div class="school" id="sc">

		<h2><span><<返回</span>选择学校</h2>
		<div class="search"><input id="search" type="text" placeholder="快速查找"></div>
		<ul>
			<?php if(is_array($school)): foreach($school as $key=>$v): if($v['school'] == '学校党建与思想政治教育杂志社'): ?><li style="font-size:1em;"><?php echo ($v["school"]); ?></li>
			<?php else: ?>
				<li><?php echo ($v["school"]); ?></li><?php endif; endforeach; endif; ?>
		</ul>
	</div>
	<div class="name" id="na">
		<h2><span><<返回</span>选择姓名</h2>
		<ul>
			
		</ul>
	</div>
</body>
</html>