<?php 
include "db.php";
$s_roll=$_POST['s_roll'];
$s_name=$_POST['s_name'];
$cls=$_POST['class'];
$fees=$_POST['fees'];
$paid=$_POST['paid'];
$mode=$_POST['mode'];
$due=$_POST['due'];
$query1="select * from student where sid='$s_roll'";
$result = mysqli_query($con,$query1);
echo $rowcount=mysqli_num_rows($result);
if($rowcount<=0)
{
	echo "<script>window.location='fees_pay.php';alert('Invalid Roll Number')</script>";
}

echo $query="INSERT INTO fees_payment(s_roll, s_name, class, fees,paid,mode,due) VALUES ('$s_roll','$s_name','$cls','$fees','$paid','$mode','$due')";
$con->query($query);

$query1="Update student set fees_status='paid' where sid='$s_roll'";
$con->query($query1);

echo "<script>window.location='fees_pay.php';alert('Added successfully')</script>";
?>