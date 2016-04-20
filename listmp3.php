<?php include 'header.php';
include 'mapi/qiniu.php';
$config = array (
		'ak'=>'<YOUR_APP_ACCESS_KEY>',
		'sk'=>'<YOUR_APP_SECRET_KEY>',
		'bucket'=>'<YOUR_BUCKET>'
);
$qiniu = new Qiniu ( $config );
$qiniu->put_policy->init();
// 设置上传策略
$policy = array ();
$expired = 7200;
$selfurl='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$policy ['scope'] = $config['bucket'];
$policy ['deadline'] = time () + $expired;
$policy['returnUrl']=$selfurl;
$policy['returnBody']='{"key": $(key)}';
$qiniu->put_policy->set_policy_array ( $policy );
// 获取Token
$token = $qiniu->put_policy->get_token ();
$mkey=time().'_'.mt_rand(100,999).'.mp3';?>
<style>
#mynav {
	height: 50px;
}

#mylist {
	margin-top: 54px;
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
					<li class="active"><a href="listmp3.php">首页</a></li>
					<li><a href="iabout.php">关于</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<div id="mylist" class="container-fluid">
		<blockquote>
			<p>
				请先点击 <a href="iabout.php">关于</a> 查看相关说明！
			</p>
		</blockquote>
		<div id="listmp3">
			<div id="mp3s">
				<table class="table table-hover table-condensed">
					<thead>
						<tr>
							<th>名称</th>
							<th>发布时间</th>
							<th>&nbsp;&nbsp;&nbsp;&nbsp;管&nbsp;&nbsp;理</th>
						</tr>
					</thead>
					<tbody id="tablemsg">
						<!-- Ajax获取数据  -->
					</tbody>
				</table>
			</div>
			<div id="pages" class="text-center">
				<!-- Ajax获取分页数据  -->
			</div>
			<div id="myupload">
				<fieldset>
					<legend>上传MP3文件</legend>
					<form role="form"  method="post" action="http://upload.qiniu.com/" enctype="multipart/form-data">
					<input name="key" id="key" type="hidden" value="<?php echo $mkey; ?>"> 
					<input name="token" type="hidden" value="<?php echo $token; ?>">
					<input type="file" name="file" id="file">
					<p class="help-block">上传本地MP3文件<span id="tip"></span></p>
					<button type="submit" class="btn btn-primary btn-xs" id="sub">上传</button>
					</form>
				</fieldset>
				
			</div>
		</div>
	</div>

<?php
// session_start ();
// echo "登记的用户为：" . $_SESSION ["user"];
// echo "登记的用户名为：" . $_SESSION ["username"];
?>

<script type="text/javascript">
$(document).ready(function (e){
	//获取分页
	$.getpages=function($mid,$page){
		$.ajax({
			url:"mapi/getpages.php",
			type:"POST",
			data:'page='+$page,
			success: function($msg){ $($mid).html($msg);},
			error: function(){alert('pages error!');}
			});
		};
	//请求第几页数据
	$.getmsg=function($mid,$page){
		$.ajax({
			url:"mapi/getmsg.php",
			type:"POST",
			data:'page='+$page,
			success: function($msg){ $($mid).html($msg);},
			error: function(){alert('getmsg error!');}
			});
		 };
	//获取url中的参数
	function getQueryString(name) {
			    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
			    var r = window.location.search.substr(1).match(reg);
			    if (r != null) return unescape(r[2]); return null;
			    };
	//获取文件名
	function getfname(){	
			var url=document.getElementById("file").value;
			url=url.split("\\");//这里要将 \ 转义一下
			return url[url.length-1];
		};
    //运行
	var page=getQueryString("page");
	if(null==page){
		page=1;
		}
	$.getpages('#pages',page);
	$.getmsg('#tablemsg',page);
    
    //上传后记录存入数据库
    $("#sub").click(function(){
		var filename = getfname();
		$.ajax({
			type: "POST",
			url: "mapi/upload.php",
			data:'name='+filename+'&url=http://supermp3.qiniudn.com/'+$("#key").val()
		});
        //没这一句就出错(在新浪SAE上，可能由于系统限制，此处必须有语句执行，才能等到POST完成，数据库才能插入成功！)
        alert('系统【只支持MP3】格式的文件，否则无法使用，继续请点击【确定】');
        
	});

});
    
</script>
    <label id="tbug" style="display: none;"></label>
</body>
</html>