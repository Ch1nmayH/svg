<?php

session_start();

if (!isset($_SESSION['id'])) {

    echo "<script> alert('You are not authorized to visit this page'); 
    location.href = '../index.php';</script>";
} elseif ($_SESSION['role'] != 'admin') {

    echo "<script> alert('You are not authorized to visit this page'); 
    location.href = '../index.php';</script>";
} elseif ($_SESSION['role'] == 'admin') {


    include("../includes/db_connection.php");


    if (isset($_POST['delete'])) {



        $id = $_POST['id'];



        $sql1 = "SELECT * FROM userdetails WHERE `id` = '$id'";

        if ($result = mysqli_query($con, $sql1)) {

            if (mysqli_num_rows($result) > 0) {

                $sql = "DELETE FROM userdetails WHERE `id` = '$id'";

                if (mysqli_query($con, $sql)) {

                    echo "<script> alert('Record Deleted'); 
                location.href = './managers.inc.php';</script>";;
                } else {

                    echo "<script> alert('error'); 
                location.href = './managers.inc.php';</script>";
                }
            }
        } else {
            echo "<script> alert('error'); 
        location.href = './managers.inc.php';</script>";
        }
    } else {
        echo "<script> alert('error'); 
    location.href = './managers.inc.php';</script>";
    }
} else {
    echo "<script> alert('error'); 
    location.href = './managers.inc.php';</script>";
}