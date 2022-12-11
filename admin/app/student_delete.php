<?php
include 'db.php';
$id=$_GET['id'];
$sql = "DELETE FROM `student` WHERE `rollno`='$id'";
$query= mysqli_query($con,$sql);
$del_2 = "DELETE FROM `login` WHERE `id_f`=$id";
$result_2= mysqli_query($con, $del_2);
echo '<script>alert("Successfully Updated");
		window.location.href = "crud.php";
		</script>';
?>