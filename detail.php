<?php
include 'header.php';
$url=$_GET['url'];
$mid=$_GET['id'];
if($url)
{
	$bgmusic=$url;
}
$con=include 'mapi/db.php';
$sqlstr="select name from listmp3 where mid ='{$mid}'";
$result = mysqli_query ( $con, $sqlstr );
$row = mysqli_fetch_assoc ( $result );
$mp3name=$row['name'];
?>
<style>
#mynav {
	height: 50px;
}

#mylist {
	margin-top: 50px;
}
</style>
<link rel="stylesheet" href="js/skins/default.css" />
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
			<p><?php echo $mp3name ?></p>
			<footer>可以手动填写非本系统内的MP3网络地址,否则请保持系统的自动填写。</footer>
		</blockquote>
	<form action="" method="post" name="form_config" >
	<dl class="dl-horizontal">
			<dt>网络地址：</dt>
			<dd><input name="mp3file" class="form-control" type="text" value="<?php echo $url?>" size="50"><br>&nbsp;</dd>
			<dt>默认音量：</dt>
			<dd><input  name="dewvolume" class="form-control" type="text" value="100" size="6" style="width: 50px;display: inline;"> %<br>&nbsp;</dd>
			<dt>播放控制：</dt>
			<dd><input name="dewstart" type="radio" id="dewstart" value="1" checked="checked" /> 自动播放
                  &nbsp;&nbsp;<input name="dewstart" type="radio" id="dewstart" value="0" /> 手动播放<br>&nbsp;</dd>
            <dt>是否循环：</dt>
            <dd><input name="dewreplay" type="radio" value="1" checked="checked"> 循环播放
                    &nbsp;&nbsp;<input name="dewreplay" type="radio"  value="0" > 不循环<br>&nbsp;</dd>
             <dt>播放器样式：</dt>
            <dd><input type="radio"  name="dewversion" value="dewplayer" checked="checked"> 经典样式&nbsp;&nbsp;&nbsp;&nbsp;<object type="application/x-shockwave-flash" data="swf/dewplayer.swf?mp3=<?php echo $bgmusic?>&autostart=1&volume=100" width="200" height="20" id="dewplayer"><param name="movie" value="dewplayer.swf?mp3=<?php echo $bgmusic?>&autostart=1&volume=100" /></object><br>&nbsp;</dd>
            <dd><input type="radio"  name="dewversion" value="dewplayer_mini"> 迷你样式&nbsp;&nbsp;&nbsp;&nbsp;<object type="application/x-shockwave-flash" data="swf/dewplayer_mini.swf" width="160" height="20" id="dewplayer-mini"><param name="movie" value="dewplayer_mini.swf" /></object><br>&nbsp;</dd>
            <dd><input type="radio"  name="dewversion" value="dewplayer_multi"> 多首播放&nbsp;&nbsp;&nbsp;&nbsp;<object type="application/x-shockwave-flash" data="swf/dewplayer_multi.swf" width="240" height="20" id="dewplayer-multi"><param name="movie" value="dewplayer_multi.swf" /></object><br>&nbsp;</dd>
            <dd><input type="radio"  name="dewversion" value="dewplayer_rect"> 多首新版&nbsp;&nbsp;&nbsp;&nbsp;<object type="application/x-shockwave-flash" data="swf/dewplayer_rect.swf" width="240" height="20" id="dewplayer-rect"><param name="movie" value="dewplayer_rect.swf" /></object><br>&nbsp;</dd>
             <dt></dt>
            <dd><br><input type="button" class="btn" value="生成flash代码" onclick="create_code()"></dd>
             <dt></dt>
            <dd></dd>
		</dl>
    </form>
	</div>

<script src="js/artDialog.min.js"></script>
<script >
function create_code()
{
    var weburl="<?php echo 'http://'.$_SERVER['HTTP_HOST']?>";
    var Mp3file = document.form_config.mp3file.value;
    var Volume= document.form_config.dewvolume.value;
     for (i = 0; i < document.getElementsByName("dewstart").length; i++)
      {
        if(document.getElementsByName("dewstart")[i].checked)
         {
           Autostart= document.getElementsByName("dewstart")[i].value;
        }
      }
     for (i = 0; i < document.getElementsByName("dewreplay").length; i++)
      {
        if(document.getElementsByName("dewreplay")[i].checked)
         {
           Autoreplay= document.getElementsByName("dewreplay")[i].value;
        }
      }  
     for (i = 0; i < document.getElementsByName("dewversion").length; i++)
      {
        if(document.getElementsByName("dewversion")[i].checked)
         {
           Dewversion = document.getElementsByName("dewversion")[i].value;
        }
      }
    var content=" <textarea cols=\"140\"  rows=\"4\" style=\"margin: 10px 10px 10px; width: 440px; height: 77px;\">"+weburl+"/swf/"+Dewversion+".swf?mp3="+Mp3file+"&autostart="+Autostart+"&autoreplay="+Autoreplay+"&volume="+Volume+"</textarea><br>"+"请复制上面的代码到你所需要插入flash的地方，如论坛等。你也可以用浏览器<a href=\""+weburl+"/swf/"+Dewversion+".swf?mp3="+Mp3file+"&autostart="+Autostart+"&autoreplay="+Autoreplay+"&volume="+Volume+"\" target=\"_bank\" >预览</a><br>";
        art.dialog({
        title: '成功生成代码！', 
        content: content
    });  
}
</script>
</body>
</html>