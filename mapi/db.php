<?php

//For SAE
$host = SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT;
$user = SAE_MYSQL_USER;
$password = SAE_MYSQL_PASS;
$database = SAE_MYSQL_DB;

$con = mysqli_connect ( $host, $user,$password, $database ) or die('connecting error !');
return $con;
