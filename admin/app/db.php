<?php
date_default_timezone_set("Asia/Calcutta");

$hostname="localhost";
$username="root";
$password="";
$db="svgg";
$con=mysqli_connect($hostname,$username,$password,$db) or die("error connecting db");
?>