<?php include 'header.php';?>
<style>
#mynav {
	height: 50px;
}

#mymain {
	margin-top: 50px;
}
</style>
</head>
<body>
	<div id="main">
		<div id="mynav" class="navbar navbar-default navbar-fixed-top"
		role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">破折号</a>
				<p class="navbar-text">—— 个人MP3管理系统 1.0</p>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">首页</a></li>
					<li><a href="about.php">关于</a></li>
				</ul>
				<a type="button" class="btn btn-default navbar-btn navbar-right"
						href="login.php">Sign in</a>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
		<div class="jumbotron" id="mymain">
			<h1>破折号</h1>
			<p>本系统使用Bootstrap3.0和七牛云存储，迅速、快捷！</p>
			<p>系统运行于新浪SAE平台，基于PHP和MYSQL开发完成。</p>
			<p>系统使用第三方开源MP3播放器，完全免费，永远没有限制！</p>
			<p>破折号MP3管理系统，提供在线上传、查看、试听、一键分享、下载等功能......</p>
			<p>
				<a class="btn btn-primary btn-lg" role="button" href="login.php">开始使用</a>
			</p>
		</div>
	</div>
</body>
</html>

