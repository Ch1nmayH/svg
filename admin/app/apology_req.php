<?php
include "side.php"; 
include "check_status.php";
require_once("db.php");
session_start();
if (!isset($_SESSION['uname'])) {
  echo "<script>window.location='../../login.php';</script>";
}
?>

<?php 
  $reasonErr = $absenceErr = "";
  global $leaveApplicationValidate;
  if(isset($_POST['submit'])){



    
    $reason = mysqli_real_escape_string($con,$_POST['reason']);
    if(empty($reason)){
      $reasonErr = "You cannot leave this field empty";
      $leaveApplicationValidate = false;
    }
    else{
      $absencePlusReason = " : ".$reason;
      $leaveApplicationValidate = true;
    }
    
    $status = "Submitted";
    
    if($leaveApplicationValidate){
      
    //   echo $username = $_SESSION["uname"];
       $username = $_SESSION["id"];
      $insss="SELECT rollno, email, sname FROM student WHERE rollno='".$username."'";
     
      $eid_query = mysqli_query($con,$insss);
      
      $row = mysqli_fetch_array($eid_query);
      $sid=$row['rollno'];
      $email=$row['email'];
      $sname=$row['sname'];
      $fromdate = date("Y/m/d");
      $o_time = date("h:i:sa");

      
     $query = "INSERT INTO `apology`(`s_name`, `email`, `desc`, `fromdate`, `o_time`, `status`, `sid`) VALUES ('$sname',' $email','$absencePlusReason', '$fromdate', '$o_time', '$status','$sid')";
      $execute = mysqli_query($con,$query);
      if($execute){
        echo '<script>alert("Apology submitted successfully!")</script>';
      }
      else{
        echo "Query Error : " . $query . "<br>" . mysqli_error($conn);;
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <title>Leave Application</title>
        <style>
        h1 {
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            padding-top: 1em;
            margin-bottom: -0.5em;
        }

        form {
            padding: 40px;
        }

        input,
        textarea {
            margin: 5px;
            font-size: 1.1em !important;
            outline: none;
        }

        label {
            margin-top: 2em;
            font-size: 1.1em !important;
        }

        label.form-check-label {
            margin-top: 0px;
        }

        #err {
            display: none;
            padding: 1.5em;
            padding-left: 4em;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 1em;
        }

        table {
            width: 90% !important;
            margin: 1.5rem auto !important;
            font-size: 1.1em !important;
        }

        .error {
            color: #FF0000;
        }
        </style>

        <script>
        const validate = () => {

            let desc = document.getElementById('leaveDesc').value;
            let checkbox = document.getElementsByClassName("form-check-input");
            let errDiv = document.getElementById('err');

            let checkedValue = [];
            for (let i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked === true)
                    checkedValue.push(checkbox[i].id);
            }

            let errMsg = [];

            if (desc === "") {
                errMsg.push("Please enter the reason and date of leave");
            }

            if (checkedValue.length < 1) {
                errMsg.push("Please select the type of Leave");
            }

            if (errMsg.length > 0) {
                errDiv.style.display = "block";
                let msgs = "";

                for (let i = 0; i < errMsg.length; i++) {
                    msgs += errMsg[i] + "<br/>";
                }

                errDiv.innerHTML = msgs;
                scrollTo(0, 0);
                return;
            }
        }
        </script>

    </head>

    <body>
        <style type="text/css">
        .card {
            margin-left: 17%;
            color: black;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #09090a;
        }

        .col-xl-6 {
            font-size: 17px;
            font-weight: 700;
            flex: 0 0 50%;
            max-width: 65%;
            padding-left: 0%;
            padding-top: 5%;
        }

        .kt-mainpanel {
            margin-top: 6%;
            max-width: 100%;
            margin-left: 0%;
            padding: 0px;
        }
        </style>
        <div class="kt-mainpanel">
            <div class="kt-pagetitle">
            </div><!-- kt-pagetitle -->

            <div class="kt-pagebody">

                <div class="card pd-20 pd-sm-40">
                    <!--Navbar-->



                    <h1>Apology Letter</h1>

                    <div class="container">
                        <div class="alert alert-danger" id="err" role="alert">
                        </div>

                        <form method="POST">



                            <!-- error message if type of absence isn't selected -->
                            <span class="error"><?php echo "&nbsp;".$absenceErr ?></span><br />


                            <div class="mb-3">

                                <label for="leaveDesc" class="form-label"><b>Write your apology here
                                        :</b></label>
                                <!-- error message if reason of the leave is not given -->
                                <span class="error"><?php echo "&nbsp;".$reasonErr ?></span>
                                <textarea class="form-control" name="reason" id="leaveDesc" rows="4"
                                    placeholder="Enter Here..."></textarea>
                            </div>


                            <input type="submit" name="submit" value="Submit Apology" class="btn btn-success">
                        </form>


                    </div>

                    <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
                        <div>
                            <p class="text-center">&copy; <?php echo date("Y"); ?> - Online Leave Application</p>
                            <p class="text-center">Developed By Yash Sojitra and Darshan Mamtani</p>
                        </div>
                    </footer>

    </body>

</html>

<?php


ini_set('display_errors', true);
error_reporting(E_ALL);
?>