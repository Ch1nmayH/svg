<?php
session_start();

if (!isset($_SESSION['uname'])) {
	echo "<script>window.location='login.php';</script>";
}
include 'db.php';

$validated = true;
$email_already_exist = false;
$id_already_exist = false;

$name = $_POST['name'];
$email = $_POST['email'];
$id = $_POST['id'];




$sql = "SELECT * FROM `manager`";
$result3 = mysqli_query($con, $sql);
while ($row1 = mysqli_fetch_array($result3)) {
	$temail = $row1[2];
	$tid = $row1[3];
	


	if ($email == $temail) {


		if($tid != $id){
			$email_already_exist = true;
		}
		
	}
}
if ($email_already_exist == true) {
	echo "<script> alert('Email address already exists'); 
		window.location.href ='update_teach.php?id=$id';

		</script>";
} elseif ($email_already_exist == false) {
	if ($validated) {

		$ins = "UPDATE `manager` SET `t_name`='$name',`email`='$email' WHERE `teach_id`='$id';";
		$result = mysqli_query($con, $ins);

		$ins = "UPDATE `login` SET `username`='$email' WHERE `id_f`='$id';";
		$result = mysqli_query($con, $ins);

		echo '<script> alert("Successfully updated");
		   window.location.href = "./Add_teacher.php";
		   </script>';
	}
} else {


	echo '<script> alert("Something went wrong") 
		window.location.href ="./Add_teacher.php";
		</script>;';
}