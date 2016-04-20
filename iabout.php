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
				<a class="navbar-brand" href="listmp3.php">破折号</a>
				<p class="navbar-text">—— 个人MP3管理系统 1.0</p>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="listmp3.php">首页</a></li>
					<li class="active"><a href="iabout.php">关于</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<div id="mylist" class="container-fluid">
		<blockquote>
			<p>管理：</p>
			<footer> 请在管理界面按照指示进行操作 </footer>
		</blockquote>
		<blockquote>
			<p>关于作者：</p>
		</blockquote>
		<dl class="dl-horizontal">
			<dt>昵称：</dt>
			<dd><strong>他叫自己MR.张</strong></dd>
			<dt>Email：</dt>
			<dd><a href="mailto:likfe@qq.com">likfe@qq.com</a></dd>
			<dt>新浪微博：</dt>
			<dd><a target="_blank" href="http://weibo.com/zyansen">新浪微博</a></dd>
		</dl>
		<blockquote>
			<p>使用说明：</p>
		</blockquote>
		<dl class="dl-horizontal">
			<dt>系统的版权说明：</dt>
			<dd>本系统借助第三方开源MP3播放器，播放器版权归原作者所有</dd>
			<dt>上传格式和大小：</dt>
			<dd>本系统Vers1.0只支持不超过10M的MP3格式的音频文件的上传</dd>
			<dt>七牛云项目要求：</dt>
			<dd>创建七牛云项目的时候应选择【公开】，本系统Vers1.0暂不支持盗链保护</dd>
			<dt>下载和管理功能：</dt>
			<dd>下载和管理目前只支持选择一条数据，本系统Vers1.0暂不支持项目多选功能</dd>
			<dt>系统的安全说明：</dt>
			<dd>系统开源，不提供任何安全保证，仅用于体现基本功能和想法，正式使用请注明版权并进行必要的封装</dd>
		</dl>
		

	</div>
</body>
</html>
