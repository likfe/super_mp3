<?php
header("Content-type: text/html; charset=utf-8");
$con = include 'db.php';
$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1; // 当前页数
$pagesize = 5; // 每页显示的记录数
$offset = ($page - 1) * $pagesize;
$query = "select * from listmp3 ORDER BY `mid` DESC limit $offset, $pagesize ";
$result = mysqli_query ( $con, $query );
while ( (bool)$row = mysqli_fetch_assoc ( $result ) ) {
	echo "<tr><td>{$row['name']}</td><td>{$row['datetime']}</td><td><a target='_blank' href='{$row['url']}'>下载</a>&nbsp;&nbsp;<a href='detail.php?id={$row ['mid']}&&url={$row['url']}'>管理</a></td></tr>";
}
mysqli_close ( $con ) or die ( 'close error getmsg' );





