<?php
include 'db.php';

	echo $sid=$_POST['sid'];
	echo $t_name=$_POST['t_name'];
	echo $fback=$_POST['fback'];

	echo $ins="SELECT * FROM `student` WHERE `sid`='$sid'";
		 $result=mysqli_query($con,$ins);
		 $row=mysqli_fetch_array($result);
		 $sname=$row['sname'];
		$ins_1="INSERT INTO `manager_feedback`(`feedback`, `sid`, `m_name`, `s_name`) VALUES ('$fback','$sid','$t_name','$sname')";
		  $result_1=mysqli_query($con,$ins_1);
		  echo '<script>alert("Feed back added Sucesfully");
		 window.location.href = "teacher_feedback.php";
		 </script>';
	

?>