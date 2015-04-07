<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title>网络文化建设工作例会签到系统</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/common.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/view.css">
	<script type="text/javascript">
	var rootURL = '__ROOT__';

	</script>
	<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/view.js"></script>
</head>
<body>
<div class="" id="control">
	<div class="main">
	<h1>学生工作例会签到系统</h1>
	<div class="num"><span><?php echo ($percent); ?></span><i>%</i><b>已签到</b></div>
	<div class="people"><span><?php echo ($doneCount); ?>/<?php echo ($all); ?></span>人已完成签到</div>
	</div>
	<div class="time">最近更新<span></span></div>
	<ul class="view">
		<li class="viewAlr">查看已签到<span><i class="alreadyI"><?php echo ($doneCount); ?></i>人</span></li>
		<li class="viewDon">查看未签到<span><i class="donotI"><?php echo ($undoneCount); ?></i>人</span></li>
		<li class="viewOther">查看代签<span><i class="otherI"><?php echo ($otherCount); ?></i>人</span></li>
		<li class="viewLate">查看迟到<span><i class="lateI"><?php echo ($lateCount); ?></i>人</span></li>
	</ul>
	<div class="hid" id="alreadyDiv">
	<h2>已签到<span><i class="alreadyI"><?php echo ($doneCount); ?></i><i>人</i></span></h2>
	<ul>
	<?php if(is_array($done)): foreach($done as $key=>$v): ?><li>
			<p><?php echo ($v["username"]); ?></p>
			<p class="smallp"><span class="school"><?php echo ($v["school_id"]); ?></span>
			<span class="signtime"><?php echo (date("Y-m-d H:i:s", $v['login_time'] )); ?> </span></p>
		</li><?php endforeach; endif; ?>
	</ul>
	</div>
	<div class="hid" id="donotDiv">
	<h2>未签到<span><i class="donotI"><?php echo ($undoneCount); ?></i><i>人</i></span></h2>
	<ul>
	<?php if(is_array($undone)): foreach($undone as $key=>$v): ?><li>
			<p><?php echo ($v["username"]); ?></p>
			<p class="smallp"><span class="school"><?php echo ($v["school_id"]); ?></span>
			<span class="signtime"><?php echo (date("Y-m-d H:i:s", $v['login_time'] )); ?> </span></p>
		</li><?php endforeach; endif; ?>
	</ul>
	</div>
	<div class="hid" id="otherDiv">
	<h2>代签<span><i class="donotI"><?php echo ($otherCount); ?></i><i>人</i></span></h2>
	<ul>
	<?php if(is_array($other)): foreach($other as $key=>$v): ?><li>
			<p><?php echo ($v["username"]); ?></p>
			<p class="smallp"><span class="school"><?php echo ($v["school_id"]); ?></span>
			<span class="signtime"><?php echo (date("Y-m-d H:i:s", $v['login_time'] )); ?> </span></p>
		</li><?php endforeach; endif; ?>
	</ul>
	</div>
	<div class="hid" id="lateDiv">
	<h2>迟到<span><i class="donotI"><?php echo ($lateCount); ?></i><i>人</i></span></h2>
	<ul>
	<?php if(is_array($late)): foreach($late as $key=>$v): ?><li>
			<p><?php echo ($v["username"]); ?></p>
			<p class="smallp"><span class="school"><?php echo ($v["school_id"]); ?></span>
			<span class="signtime"><?php echo (date("Y-m-d H:i:s", $v['login_time'] )); ?> </span></p>
		</li><?php endforeach; endif; ?>
	</ul>
	</div>
</div>
</body>
</html>