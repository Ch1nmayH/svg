<?php
include 'db.php';
include 'check_manager.php';

$id = $_GET['id'];

echo $del = "DELETE FROM `task` WHERE `id`=$id";
$result = mysqli_query($con, $del);
echo "<script>alert('Successfully Deleted')";
header("location: assign_task.php");
?>