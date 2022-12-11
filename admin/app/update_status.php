<?php 

include "side.php"; 
include 'db.php';
session_start();

if(!isset($_SESSION))
{
    header("location:login.php"); 
}

$status = $_GET['id'];

                
$sql = "UPDATE `student` SET `status` = 'Active' WHERE `rollno` = '$status'"   ;            
$result = mysqli_query($con,$sql);
if($result){


    echo '<script>alert("Successfully Accepted");
            window.location.href = "crud.php";
            </script>';
}

else{
    echo '<script>alert("Something went wrong");
    window.location.href = "crud.php";
    </script>';

}

	

?>