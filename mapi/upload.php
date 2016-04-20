<?php
if ($_POST ['name'] && $_POST ['url']) {
$name = $_POST ['name'];
$url = $_POST ['url'];
$con = include 'db.php';
$sqlstr = "INSERT INTO `listmp3` (name,size,datetime,url) VALUES ('{$name}',10,now(),'{$url}')";
echo $sqlstr;
$isok = mysqli_query ( $con, $sqlstr );
if ($isok) {
echo '上传成功！';
} else
echo '上传失败！';
mysqli_close ( $con ) or die ( 'close error upload' );
}