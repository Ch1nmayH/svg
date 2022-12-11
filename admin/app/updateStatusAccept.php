<?php

require_once("db.php");
session_start();


	$eid = $_GET['eid'];
	$descr = $_GET['descr'];

	$add_to_db = mysqli_query($con,"UPDATE `leave`  SET `status`='Accepted' WHERE `sid`='".$eid."' AND `dec`='".$descr."'");

				if($add_to_db){	
					echo 'Saved!!';
					header("Location: leave_requset.php");
				}
				else{
					echo "Query Error : " . "UPDATE leave SET status='Accepted' WHERE sid='".$eid."' AND dec='".$descr."'" . "<br>" . mysqli_error($con);
				}
	

	ini_set('display_errors', true);
	error_reporting(E_ALL);  
         
?>