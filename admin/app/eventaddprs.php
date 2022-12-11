<?php 

include "db.php";
include 'check_manager.php';

$startdate=$_POST['sdate'];
$enddate=$_POST['edate'];
$eventname=$_POST['ename'];
$description=$_POST['edec'];
$query="INSERT INTO event(eventname, startdate, enddate, description) VALUES ('$eventname','$startdate','$enddate','$description')";
$con->query($query);
	echo '<script>alert("Successfully Inserted");
		window.location.href = "add_event.php";
		</script>';?>