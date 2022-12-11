
<?php
include 'db.php';
	$s_det=$_POST['s_name'];
	$remark=$_POST['remark'];
	$s=explode(".",$s_det);
	$sname=$s[1];
	$sreg=$s[0];

	echo $ins="INSERT INTO `remark`( `sreg`, `sname`, `remark`) VALUES ('$sreg','$sname','$remark')";
	$result=mysqli_query($con,$ins);

	echo '<script>alert("Successfully Inserted");window.location.href = "add_remark.php";</script>';
	

?>
