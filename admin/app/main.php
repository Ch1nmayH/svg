<?php
include('db.php');
session_start();
if(isset($_POST["submit"]))
{
   	$uname=$_POST['uname'];
  	$password=$_POST['psw'];
  	$sql="SELECT * from login";
	$query= mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($query))
	{
		if(($row['username']==$uname) && ($row['pass']==$password))
		{
			
			echo $_SESSION["uname"]=$row['username'];
			echo $_SESSION["user"] = $row['type'];
			echo $_SESSION["id"] = $row['id_f'];
			echo $_SESSION["name"] = $row['name'];
			 header('location:index.php');
		}
		else
		{
			echo "<script>alert('Wrong username/password Combination');
			 window.location.href= '../../login.php';</script>";

		}

		

	}
}

?>