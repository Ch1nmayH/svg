<?php
include './admin/app/db.php';
session_start();
error_reporting(0);
if (!isset($_SESSION)) {

    header("location:login.php");
}



$validated = true;
$email_already_exist = 'false';
$roll_already_exist = 'false';

if (isset($_POST['sub'])) {
    $rollno = $_POST['rollno'];
    $s_name = $_POST['fname'] . $_POST['lname'];
    $gender = 'male';
    $s_cls = $_POST['course'];
    $s_dob = $_POST['s_dob'];
    $pno = $_POST['parPh'];
    $phone = $_POST['perPh'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cPassword'];
    $s_year = $_POST['year'];
    $cr_date = date("Y-m-d");


    $s_dob = $_POST['s_dob'];
    // $dateOfBirth = "15-06-1995";
    $today = date("Y-m-d");
    $diff = date_diff(date_create($s_dob), date_create($today));
    $age = $diff->format('%y');




    //validations
    if (empty($s_cls)) {
        $validated = false;
        echo '<script>alert("Please fill in the course") </script
        window.location.href = "register.php";
        ';
    }

 
    if(empty($s_year)){
        $validated = false;

        echo '<script>alert("Please fill in the year") </script
        window.location.href = "register.php";
        ';
        
        
    }

    if($age<15){
        $validated = false;

        echo '<script>alert("You are too small to register, try changing your dob") </script
        window.location.href = "register.php";
        ';
        
        
    }

    

    
    if($password!= $cpassword){
        $validated = false;

        echo '<script>alert("Passwords donot match!") </script
        window.location.href = "register.php";
        ';
        
    }


    $sql = "SELECT * FROM `student`";
    $result3 = mysqli_query($con, $sql);
    while ($row1 = mysqli_fetch_array($result3)) {
        $stu_email = $row1['9'];
        $stu_rollno = $row1['1'];
        

        if ($email == $stu_email) {

            $email_already_exist = 'true';
        } 

        if ($rollno == $stu_rollno) {

            $roll_already_exist = 'true';
        } 
    }
    if ($email_already_exist == 'true') {
        echo '<script>alert("Email address already exists") </script
    window.location.href = "register.php";
    ';
    } elseif ($roll_already_exist == 'true') {
        echo '<script>alert("Roll no already exists") </script
    window.location.href = "register.php";
    ';
    } elseif ($roll_already_exist == 'false' && $email_already_exist == 'false') {

        if ($validated) {
            $insert = "INSERT INTO `student`(`rollno`, `sname`, `gender`, `class`,`year`, `dob`, `pno`, `phone`, `email`, `password`, `ad_date`,`status`) VALUES ('$rollno','$s_name','$gender','$s_cls','$s_year','$s_dob','$pno','$phone','$email','$password','$cr_date','pending')";
            $result = mysqli_query($con, $insert);

            $insert_2 = "INSERT INTO `login`( `username`, `pass`, `type`, `id_f`,`name`) VALUES ('$email','$password','S','$rollno','$s_name')";

            //  $insert_2="INSERT INTO `login`(`username`, `pass`, `type`,`id_f`,`name`) VALUES ('$email','$password','S','$rollno',$s_name')";
            $result_2 = mysqli_query($con, $insert_2);
            echo '<script>alert("Successfully Registered");
      window.location.href = "login.php";
      </script>';
        }
    } else {

        echo '<script>alert("something Went Wrong") </script';
    }
}
?>
<!DOCTYPE html>
<html lang="en">


    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <!-- Title Page-->
        <title>Sign In</title>

        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
            rel="stylesheet">

        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css_1/main.css" rel="stylesheet" media="all">
    </head>

    <body>
        <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
            <button class="back-btn"><a href="./index.php">Home</a></button>
            <div class="wrapper wrapper--w790">
                <div class="card card-5">
                    <div class="card-heading">
                        <h2 class="title">Registration Form</h2>
                    </div>
                    <div class="card-body">
                        <form action=" " method="post">

                            <div class="form-row m-b-55">
                                <div class="name">Name</div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="text" name="fname" required>
                                                <label class="label--desc">first name</label>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="text" name="lname" required>
                                                <label class="label--desc">last name</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="name">Email</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="email" name="email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row m-b-55">
                                <div class="name">Personal Phone Number</div>
                                <div class="value">
                                    <div class="row row-refine">

                                        <div class="col-9">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="text" name="perPh"
                                                    pattern="[6-9]{1}[0-9]{9}"
                                                    title="Phone number with 6-9 and remaing 9 digit with 0-9" required>
                                                <label class="label--desc">Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row m-b-55">
                                <div class="name">Parent's Phone Number</div>
                                <div class="value">
                                    <div class="row row-refine">

                                        <div class="col-9">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="text" name="parPh"
                                                    pattern="[6-9]{1}[0-9]{9}"
                                                    title="Phone number with 6-9 and remaing 9 digit with 0-9" required>
                                                <label class="label--desc">Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Course</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="course" required>
                                                <option disabled="disabled" selected="selected">Choose option</option>
                                                <option value="bca">BCA</option>
                                                <option value="bcom">BCOM</option>
                                                <option value="ba">BA</option>
                                                <option value="bba">BBA</option>
                                                <option value="bvoc">BVOC</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Year</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="year" required>
                                                <option disabled="disabled" selected="selected">Choose option</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>

                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">DOB</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input type="date" name="s_dob" id="s_dob" class="input--style-5" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Roll No</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="number" name="rollno" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Password</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="password" name="password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Confirm Password</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="password" name="cPassword" required>
                                    </div>
                                </div>
                            </div>




                            <div>
                                <button class="btn btn--radius-2 btn--green max-w" type="submit"
                                    name="sub">Register</button>
                            </div>
                        </form>
                        <div>
                            <h6 class="name te-xt pd-10">Already have an account?</h6>
                        </div>

                        <div>
                            <button class="btn btn--radius-2 btn--red te max-w" name="sub"><a
                                    href="login.php">Login</a></button>

                        </div>







                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>


        <!-- Main JS-->
        <script src="js/global.js"></script>

    </body>

</html>