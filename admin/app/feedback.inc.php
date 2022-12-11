<?php

session_start();

if (!isset($_SESSION['id'])) {


    echo "<script> 
    
    alert('You need to first log in to give the feedback'); 
    location.href = '../../login.php';
    </script>";
} else {
    include "db.php";

    if (isset($_POST['feedbackSend'])) {





       
        $feedback = $_POST['feedback'];
        $id = $_SESSION['id'];
        $name=$_SESSION["name"];

       
       $sql2 = "INSERT INTO feedback(`id`,`name`,`feedback`) VALUES('$id', '$name', '$feedback')";

        if ($result2 = mysqli_query($con, $sql2)) {

            echo
            "<script> 
        alert('Feedback Submitted');
        location.href = '../../index.php';
        </script>";
        } else {

            echo
            "<script> 
        alert('There was an error, please try again.');
        location.href = '../../index.php';
        </script>";
        }
    }
}