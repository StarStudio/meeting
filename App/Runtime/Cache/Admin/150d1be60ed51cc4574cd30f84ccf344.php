<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/index.js"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
</head>
<body>
	<div id="top">
		<div class="menu">
			<!-- <a href="<?php echo U('Admin/Blog/add');?>">新增博客投票条目</a> -->
			<a href="<?php echo U('Admin/School/index');?>">新增学校</a>
			<a href="<?php echo U('Admin/School/joiner');?>">新增与会人员</a>
			<a href="<?php echo U('Admin/School/save');?>">清空签到数据</a>
		</div>
		<div class="exit">
			<a href="<?php echo U('Admin/Index/logout');?>" target="_self">退出</a>
		</div>
	</div>
	<div id="left">
		<dl>
			<dt>内容管理</dt>
			<dd><a href="<?php echo U('Admin/School/manage');?>">签到情况预览</a></dd>
			<dd><a href="<?php echo U('Admin/School/done');?>">查看已签到</a></dd>
			<dd><a href="<?php echo U('Admin/School/undone');?>">查看未签到</a></dd>
		</dl>
		<!-- <dl>
			<dt>内容管理</dt>
			<dd><a href="javascript:void(0)">编辑活动详情</a></dd>
			<dd><a href="<?php echo U('Admin/Blog/index');?>">博客信息管理</a></dd>
			<dd><a href="<?php echo U('Admin/Page/index');?>">博文信息管理</a></dd>
		</dl> -->
		<dl>
			<dt>权限管理</dt>
			<dd><a href="<?php echo U('Admin/User/index');?>">新增发布人员</a></dd>
			<dd><a href="<?php echo U('Admin/User/manage');?>">管理发布人员</a></dd>
			<dd><a href="<?php echo U('Admin/User/change');?>">修改用户密码</a></dd>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src=""></iframe>
	</div>
</body>
</html>