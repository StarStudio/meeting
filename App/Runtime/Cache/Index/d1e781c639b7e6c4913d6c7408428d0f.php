<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title>2015年学生工作研讨班签到系统</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/common.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/other.css">
	<script type="text/javascript" src="__PUBLIC__/js/addLoadEvent.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/other.js"></script>
</head>
<body>
	<div class="main">
		<div class="head">
			
		</div>
		<h1>欢迎参加2015年学生工作研讨班</h1>
		<div class="p"><p>电子科技大学是教育部直属、国家“985工程”“211工程”重点建设大学，坐落于有“天府之国”之称的西部经济、文化、交通中心——四川省成都市。学校以培养“基础知识厚、专业能力强、综合素质高、具有国际视野和社会责任感的拔尖创新人才”为根本任务，学生以素质全面、专业知识扎实、能力强、后劲足等鲜明特点受到了社会各界和用人单位的普遍赞誉，学生就业率一直保持在95%以上，本科生国内外深造比例在50%左右，成电学子遍布海内外IT领域。学校以“求实求真、大气大为”为校训，开拓进取，锐意创新，为建成以电子信息科学技术为特色的多科性研究型大学而不懈奋斗。</p></div>
	</div>
	<ul>
		<li id="need">与会须知</li>
		<li id="app">会议专享app</li>
		<li id="contact">会议联系</li>
	</ul>
	<div class="hid" id="ne">
		<h2>与会须知</h2>
		<p>尊敬的<b><?php echo ($result["joiner"]); ?></b>老师:<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好，欢迎您与会

<?php if($result['dom'] == 0): ?>。
<?php else: ?>，您的客房安排在<b>电子科技大学宾馆<?php echo ($result["dom"]); ?>。</b><?php endif; ?>
<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2015年大学生思想政治教育工作研讨培训班日程安排如下：<img src="__PUBLIC__/img/sch.png"></p>
		
	</div>
	<div class="hid" id="ap">
		<h2>会议专享app</h2>
		<p>尊敬的<b><?php echo ($result["joiner"]); ?></b>老师:<br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好,欢迎您参加2015年大学生思想政治教育工作研讨培训班。为了保证您能更便捷与会，同时便于与会人员的交流，请您下载本次会务专享app——面聊。<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此产品由电子科技大学学生团队自主研发，是一款面向高校师生的校园交互平台，目前该软件已与“易班”实现后台数据互通，即将全面展开合作，并在全国高校推广。<br/>
		<b>您的面聊登陆方式：</b><br/>
		账号：<?php echo ($result["username"]); ?> <br/>
		密码：123456<br/>
		<b>下载方式：</b>
		<br/>点击直接下载对应手机版本<br /></p>
		<a href="http://www.52mianliao.com">下载面聊</a>
	</div>
	<div class="hid" id="co">
		<h2>会议联系</h2>
		<p>尊敬的<b><?php echo ($result["joiner"]); ?></b>老师:<br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好,如果您在会议期间有任何需要，请及时和会务组相关负责人联系，联系方式如下：<br/>
		<b>会务组：</b><br/>
		<b>会议秘书：</b><br />电子科技大学 <br />任炀&nbsp;13550051663<br/>
        教育部<br />王帅&nbsp;15918786161<br/>
        <b>会议食宿：</b><br />电子科技大学<br />高盛楠  18328728920<br/>
        潘  杨  15908192317 <br/>
        <b>小组联络员：</b><br/>
        <b>第一组</b>&nbsp;于淼&nbsp;13880707524<br/>
		<b>第二组</b>&nbsp;李毅&nbsp;15928046745<br/>
		<b>第三组</b>&nbsp;王燕&nbsp;13550044088<br/>
		<b>第四组</b>&nbsp;洪磊&nbsp;13541036889<br/>
		预祝您在成都的旅途愉快。<br/>
		</p>
	</div>
</body>
</html>