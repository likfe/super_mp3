<?php include 'header.php';?>
<style>
#mynav {
	height: 50px;
}

#mylist {
	margin-top: 50px;
}
</style>
</head>
<body>
	<div id="mynav" class="navbar navbar-default navbar-fixed-top"
		role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">破折号</a>
				<p class="navbar-text">—— 个人MP3管理系统 1.0</p>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">首页</a></li>
					<li class="active"><a href="about.php">关于</a></li>
				</ul>
				<a type="button" class="btn btn-default navbar-btn navbar-right"
					href="login.php">Sign in</a>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<div id="mylist" class="container-fluid">
		<blockquote>
			<p>关于作者：</p>
		</blockquote>
		<dl class="dl-horizontal">
			<dt>昵称：</dt>
			<dd><strong>他叫自己MR.张</strong></dd>
			<dt>Email：</dt>
			<dd><a href="mailto:likfe@qq.com">likfe#qq.com</a></dd>
			<dt>新浪微博：</dt>
			<dd><a target="_blank" href="http://weibo.com/zyansen">新浪微博</a></dd>
		</dl>
		<blockquote>
			<p>系统说明：</p>
		</blockquote>
		<dl class="dl-horizontal">
			<dt>版权说明：</dt>
			<dd>本系统借助第三方开源MP3播放器，播放器版权归原作者所有</dd>
			<dt>安全说明：</dt>
			<dd>系统开源，不提供任何安全保证，仅用于体现基本功能和想法，正式使用请注明版权并进行必要的封装</dd>
			<dt>上传格式和大小：</dt>
			<dd>本系统Vers1.0只支持MP3格式的音频文件的上传，大小根据服务器有所不同如有特殊的需要，请自行修改相应的代码</dd>
			<dt>对七牛云项目的要求：</dt>
			<dd>创建七牛云项目的时候应选择【公开】模式，否则将无法使用，本系统未对防盗链进行相应测试，请自行测试</dd>
		</dl>
	</div>
</body>
</html>
