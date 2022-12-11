<?php
include "side.php";

require_once("db.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo "<script>window.location='login.php';</script>";
}
$sid = $_GET["id"];


?>

<!DOCTYPE html>
<html lang="en">
    <style type="text/css">
    .container.rounded.bg-white.mt-5.mb-5 {
        margin-left: 20%;
    }
    </style>

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
    <?php
//   $result = mysqli_query($con,"SELECT * FROM `student` WHERE `rollno`='$sid'");
$result = mysqli_query($con, "SELECT * FROM `student` WHERE `rollno`= '$sid'");
$i = 1;
while ($row = mysqli_fetch_array($result)) {
?>

    ?>

    <body>
        <div class="kt-mainpanel">
            <div class="kt-pagetitle">

            </div><!-- kt-pagetitle -->
            <form action="" method="post">
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><span
                                    class="font-weight-bold"><?php echo $row[2] ?></span><span
                                    class="text-black-50"><?php echo $row[8] ?></span><span> </span></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Settings</h4>
                                </div>
                                <div class="col-md-12"><label class="labels">Roll no</label>
                                    <input type="text" class="form-control" name="rollno"
                                        placeholder="Enter the roll no" value="<?php echo $row[1] ?>" pattern="[0-9]+"
                                        title="please enter number only">
                                </div>
                                <div class="col-md-12"><label class="labels">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter the name"
                                        value="<?php echo $row[2] ?>" pattern="^[a-zA-Z]*"
                                        title="Please Enter a Valid name with only A-Z alphabets">
                                </div>
                                <div class="col-md-12"><label class="labels">Course</label>
                                    <input type="text" class="form-control" name="course" placeholder="Enter the name"
                                        value="<?php echo $row[4] ?>" pattern="^[a-zA-Z]*"
                                        title="Please Enter a Valid course with only A-Z alphabets">
                                </div>
                                <div class="col-md-12"><label class="labels">year</label>
                                    <input type="text" class="form-control" name="year" placeholder="Enter the name"
                                        value="<?php echo $row[5] ?>" pattern="^[1-3]*"
                                        title="Please Enter a Valid year with only 1-3 alphabets">
                                </div>
                                <div class="col-md-12"><label class="labels">Status</label>
                                    <input type="text" class="form-control" name="status" placeholder="Enter the status"
                                        value="<?php echo $row[13] ?>" pattern="^[a-zA-Z]*"
                                        title="Please Enter a Valid name with only A-Z alphabets">
                                </div>

                                <div class="row mt-3">
                                    <input type="hidden" class="form-control" name="idd" placeholder=""
                                        value="<?php echo $row[0] ?>">
                                    <input type="hidden" class="form-control" name="sid" placeholder=""
                                        value="<?php echo $row[1] ?>">
                                </div>
                                <div class="col-md-12"><label class="labels">DOB</label>
                                    <input type="date" class="form-control" name="dob"
                                        placeholder="enter address line 2" value="<?php echo $row[6] ?>">
                                </div>
                                <div class="col-md-12"><label class="labels">Parents No</label>
                                    <input type="text" class="form-control" name="pno" placeholder="Parent's Number"
                                        value="<?php echo $row[7] ?>" pattern="[6-9]{1}[0-9]{9}"
                                        title="Phone number with 6-9 and remaing 9 digit with 0-9">
                                </div>
                                <div class="col-md-12"><label class="labels">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Personal number"
                                        value="<?php echo $row[8] ?>" pattern="[6-9]{1}[0-9]{9}"
                                        title="Phone number with 6-9 and remaing 9 digit with 0-9">
                                </div>

                                <div class="col-md-12"><label class="labels">Email ID</label>
                                    <input type="email" class="form-control" name="email" placeholder="enter email id"
                                        value="<?php echo $row[9] ?>">
                                </div>
                                <div class="col-md-12"><label class="labels">Password</label>
                                    <input type="password" class="form-control" placeholder="enter password" name="pass"
                                        value="<?php echo $row[10] ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                </div>


                            </div>

                            <div class="row row-xs mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                    <div class="form-layout-footer">
                                        <center>

                                            <button class="btn btn-secondary" name="submit">Update</button>
                                        </center>


                                    </div>

            </form>
        </div>
        </div>

        </div>
        </div>
        </div>
        </div>
        </div>

    </body>

</html>

<?php
}


ini_set('display_errors', true);
error_reporting(E_ALL);
?>
<style type="text/css">
body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>


<?php

if (isset($_POST['cancel'])) {
    header("location:index.php");
}
$validated = true;
$email_taken = false;

if (isset($_POST['submit'])) {
    $ro_no = $_POST['rollno'];
    $s_name = $_POST['name'];
    $gender = $_POST['gender'];
    $s_cls = $_POST['course'];
    $year = $_POST['year'];
    $pno = $_POST['pno'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $dob = $_POST['dob'];
    $password = $_POST['pass'];
    $today = date("Y-m-d");

    //dob validation
    $diff = date_diff(date_create($dob), date_create($today));
    $age = $diff->format('%y');
    $sql4 = "SELECT * FROM `student`";
    $result4 = mysqli_query($con, $sql4);

    while ($row4 = mysqli_fetch_array($result4)) {

        if ($sid != $row4[1]) {

            if ($row4['9'] == $email) {

                $validated = false;
                $email_taken = true;
              
            }

            if ($row4['1'] == $ro_no) {
                $validated = false;
                $roll_already_exist = true;
            } 

            
       
        }

    }

    if($email_taken){

        echo '<script>alert("Email already Taken");
        </script>';
    }
    if($roll_already_exist){

        echo '<script>alert("roll no already Taken");
        </script>';
    }
    
    if ($age < 15) {
        $validated = false;

        echo '<script>alert("Minor dob detected, try changing the dob");

  </script>';
    }
if($validated){

    $update = " UPDATE `student` SET `rollno`='$ro_no',`sname`='$s_name',`class`='$s_cls',`year`='$year',`dob`='$dob',`pno`='$pno',`phone`='$phone',`email`='$email',`password` = '$password',`status`='$status' WHERE `rollno`='$sid'";
    $update2 = " UPDATE `login` SET `username`='$s_name',`pass` = '$password' WHERE `rollno`='$sid'";
    $result = mysqli_query($con, $update);
    $result2 = mysqli_query($con, $update);
    echo '<script>alert("Successfully Updated");
    window.location.href = "crud.php";
    </script>';
}

}
?>