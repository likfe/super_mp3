<?php include 'header.php';?>
<style type="text/css">
.form-signin {
	max-width: 330px;
	padding: 15px;
	margin: 0 auto;
}

.form-signin .form-signin-heading,.form-signin .checkbox {
	margin-bottom: 10px;
}

.form-signin .checkbox {
	font-weight: normal;
}

.form-signin .form-control {
	position: relative;
	height: auto;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 10px;
	font-size: 16px;
}

.form-signin .form-control:focus {
	z-index: 2;
}

.form-signin input[type="text"] {
	margin-bottom: -1px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
	margin-bottom: 10px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}
#mynav {
	height: 50px;
}
#mymain{
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
					<li><a href="about.php">关于</a></li>
				</ul>
				<a type="button" class="btn btn-default navbar-btn navbar-right"
						href="login.php">Sign in</a>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<div id="mymain" class="container">
		<br>
		<form class="form-signin" role="form" method="post" action="">
		<label id="error" class="label"></label>
			<h2 class="form-signin-heading">Please sign in</h2>
			<input name="user" type="text" class="form-control"
				placeholder="User Name" required autofocus> <input name="pwd"
				type="password" class="form-control" placeholder="Password" required>
			<div class="checkbox">
				<label> <input type="checkbox" value="remember-me">记住我
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign
				in</button>
		</form>
	</div>
	<!-- /container -->
<?php
if (isset ( $_POST ['user'] ) && isset ( $_POST ['pwd'] )) {
	$con = include 'mapi/db.php';
	$user = $_POST ['user'];
	$pwd = $_POST ['pwd'];
	$sql_str = <<<STR
SELECT * FROM user
WHERE user='{$user}'
AND pwd='{$pwd}'
STR;
	$user2 = null;
	$pwd2 = null;
	$uname = null;
	$rst = mysqli_query ( $con, $sql_str );
	if (( bool ) $row = mysqli_fetch_array ( $rst )) {
		do {
			$user2 = $row ['user'];
			$pwd2 = $row ['pwd'];
			$uname = $row ['name'];
		} while ( ( bool ) $row = mysqli_fetch_array ( $rst ) );
	}
	if ($user === $user2 && $pwd === $pwd2) {
		session_start ();
		$_SESSION ['user'] = $user;
		$_SESSION ['username'] = $uname;
		echo "<script language=\"javascript\">";
		echo "document.location=\"listmp3.php\"";
		echo "</script>";
	} else {
		echo "<script language=\"javascript\">";
		echo "alert('账号或密码错误！')";
		echo "</script>";
	}
	mysqli_close ( $con ) or die ( 'close error login' );
}
?>
</body>
</html>
