<?php
include 'db.php';
include 'check_manager.php';

$id = $_GET['id'];

echo $del = "DELETE FROM `event` WHERE `id`=$id";
$result = mysqli_query($con, $del);

echo "<script>alert('Successfully Deleted')";
header("location: add_event.php");
?>