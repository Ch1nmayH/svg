<?php
include "side.php"; 

require_once("db.php");
session_start();
if (!isset($_SESSION['uname'])) {
  echo "<script>window.location='login.php';</script>";
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
        <title></title>
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
        <div class="kt-mainpanel">
            <div class="kt-pagetitle">
            </div><!-- kt-pagetitle -->
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
            <div class="kt-pagebody">

                <div class="card pd-20 pd-sm-40">
                    <div class="mycontainer">
                        <h1>Feedback Report</h1>


                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <th>Id </th>
                                <th>Name</th>
                                <th>Feedback</th>
                            </thead>
                            <tbody>
                                <!-- loading all leave applications from database -->
                                <?php
                                $ins="SELECT * FROM `feedback`";
                                $query = mysqli_query($con,$ins);
                                
                              while ($row=mysqli_fetch_array($query)) {
?>


                                <tr>
                                    <td><?php echo $row[0] ?></td>
                                    <td><?php echo $row[2] ?></td>
                                    <td><?php echo $row[3] ?></td>
                                </tr>
                                <?php
                                     }

                                 
                               
                       ?>

                            </tbody>
                        </table>
                    </div>

    </body>

</html>

<?php


ini_set('display_errors', true);
error_reporting(E_ALL);
?>