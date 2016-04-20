<?php
$con=include 'db.php';
// 每页显示的记录数
$pagesize = 5; 
$page=$_POST['page'];
// 求得总记录数
$query = "select count(*) from listmp3";
$result = mysqli_query ( $con, $query );
$row = mysqli_fetch_row ( $result );
$total = $row [0];
$total_page = ceil ( $total / $pagesize );

$pages=<<<STR
<ul class="pagination" >
STR;
for ($i=1;$i<=$total_page;$i++){
	if ($i==$page){
		$pages.= "<li class='active'><a href='?page={$i}'>{$i}</a></li>";
	}
	else
	$pages.= "<li><a href='?page={$i}'>{$i}</a></li>";
}
$pages.="</ul>";
echo $pages;

mysqli_close ( $con ) or die ( 'close error getpage' );

