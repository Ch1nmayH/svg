<?php
include 'db.php';
include 'check_admin.php';

$id = $_GET['id'];

echo $del = "DELETE FROM `manager` WHERE `teach_id`=$id";
$result = mysqli_query($con, $del);
echo $del_2 = "DELETE FROM `login` WHERE `id_f`=$id";
$result_2= mysqli_query($con, $del_2);


echo "<script>alert('Successfully Deleted')";
header("location: Add_teacher.php");
?>