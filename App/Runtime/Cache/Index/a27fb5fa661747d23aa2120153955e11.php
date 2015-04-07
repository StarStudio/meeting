<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title>网络文化建设工作例会签到系统</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/common.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/layout.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/col2.css">
	<script type="text/javascript">
	var rootURL = '__ROOT__';
	</script>
	<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
</head>
<body>
	<div class="container">
		<div class="head">
			<h1><span class="pen"></span>网络文化建设工作例会签到系统</h1>
		</div>
		<div class="chooser">
			<div id="school"><i></i><input style="width:80%;" type="text" value="请选择单位" name="school" readonly="readonly"></div>
			<div id="name"><i></i><input type="text" value="请选择姓名" name="joiner" readonly="readonly"><span>已签到</span></div>
		</div>
	</div>
	<div class="sub">
		<button id="sub" disabled="disabled"> 签到</button>
		<button id="osub" disabled="disabled"> 代签</button>
	</div>
	<div class="school" id="sc">

		<h2><span>&lt;&lt;返回</span>选择单位</h2>
		<div class="search"><input id="search" type="text" placeholder="快速查找"></div>
		<ul>
			<?php if(is_array($school)): foreach($school as $key=>$v): if($v['school'] == '通信抗干扰技术国家级重点实验室'): ?><li style="font-size:1em;"><?php echo ($v["school"]); ?></li>
			<?php else: ?><li><?php echo ($v["school"]); ?></li><?php endif; endforeach; endif; ?>
		</ul>
	</div>
	<div class="name" id="na">
		<h2><span>&lt;&lt;返回</span>选择姓名</h2>
		<ul>
			
		</ul>
	</div>
	<div class="success">
		<h2>签到成功</h2>
		<div></div>
		<p><button>确定</button></p>
	</div>
</body>
</html>