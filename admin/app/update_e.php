<?php
// session_start();
// $branch_id=$_SESSION["branch"];
// if(!isset($_SESSION['uname'])) 
// {
//     echo "<script>window.location='login.php';</script>";
// }
include 'db.php';

	$id=$_POST['id'];
	$name=$_POST['name'];
	$dec=$_POST['dec'];
	$sdate=$_POST['sdate'];
	$edtae=$_POST['edate'];
	
		
		echo $ins="UPDATE `event` SET `eventname`='$name',`startdate`='$sdate',`enddate`='$edtae',`description`='$dec' WHERE  `id`='$id'";
		$result=mysqli_query($con,$ins);
		echo '<script>alert("Successfully Updated");
		window.location.href = "add_event.php";
		</script>';
?>