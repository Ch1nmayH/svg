<?php include "side.php";
include 'db.php';
include 'check_manager.php';
error_reporting(0);

session_start();
if (!isset($_SESSION)) {

    header("location:login.php");
}

$validated = true;

if (isset($_POST['submit'])) {
    $rollno = $_POST['rollno'];
    $s_name = $_POST['s_name'];
    $gender = 'Male';
    $s_cls = $_POST['class'];
    $s_dob = $_POST['s_dob'];
    $pno = $_POST['pno'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $batch = $_POST['batch'];
    $password = $_POST['pass'];
    $cr_date = date("Y-m-d");
    $class = $_POST['class'];
    $year = $_POST['year'];

   

    //validations

    $s_dob = $_POST['s_dob'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($s_dob), date_create($today));
    $age = $diff->format('%y');

    
    if (empty($s_cls)) {
        $validated = false;
        echo '<script>alert("Please fill in the course") </script
        window.location.href = "./add_cust.php";
        ';
    }


    if (empty($year)) {
        $validated = false;

        echo '<script>alert("Please fill in the year") </script
        window.location.href = "./add_cust.php";
        ';
        
    }

    if($age<15){
        $validated = false;

        echo '<script>alert("You are too small to register, try changing your dob") </script
        window.location.href = "./add_cust.php", "_blank";
        ';
        
        
    }

    $sql = "SELECT * FROM `student`";
    $result3 = mysqli_query($con, $sql);
    while ($row1 = mysqli_fetch_array($result3)) {
        $stu_rollno = $row1['1'];
        $stu_email = $row1['9'];

        if ($email == $stu_email) {

            $email_already_exist = 'true';
        } else {
            $email_already_exist = 'false';
        }

        if ($rollno == $stu_rollno) {

            $roll_already_exist = 'true';
        } else {
            $roll_already_exist = 'false';
        }
    }
    if ($email_already_exist == 'true') {
        echo '<script>alert("Email address already exists") </script
    window.location.href = "./add_cust.php";
    ';
    } elseif ($roll_already_exist == 'true') {
        echo '<script>alert("Roll no already exists") </script
    window.location.href = "./add_cust.php";
    ';
    } elseif ($roll_already_exist == 'false' && $email_already_exist == 'false') {

        if ($validated) {
            $insert = "INSERT INTO `student`(`rollno`, `sname`, `gender`, `class`, `year`,`dob`, `pno`, `phone`, `email`, `password`, `ad_date`,`status`,`batch`) VALUES ('$rollno','$s_name','$gender','$class','$year','$s_dob','$pno','$phone','$email','$password','$cr_date','Active','$batch')";

            $insert_2 = "INSERT INTO `login`( `username`, `pass`, `type`, `id_f`,`name`) VALUES ('$email','$password','S','$rollno','$s_name')";
            $result_2 = mysqli_query($con, $insert_2);
            $result = mysqli_query($con, $insert);

            echo '<script>alert("Successfully Added");
          window.location = "./crud.php";
        
            </script>';
        }
    }
}
?>
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
</style>
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5>Add Student</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action=" " method="post">
                    <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                            <center>
                                <h2 class="card-body-title">Add Student</h2>
                            </center>

                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Student
                                    roll no:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="rollno" name="rollno" class="form-control"
                                        placeholder="Enter rollno" style="margin-top: 23px;" pattern="[0-9]+"
                                        title="please enter number only" required>
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Student
                                    Name</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="s_name" name="s_name" class="form-control"
                                        placeholder="Enter Name" style="margin-top: 23px;" required pattern="[a-zA-Z ]+"
                                        title="Please Enter a Valid name with only A-Z alphabets">
                                </div>
                            </div><!-- row -->

                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                    Class</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <select id="class" name="class" class="form-control" placeholder="Enter class Name"
                                        style="margin-top: 23px;">
                                        <option disabled="disabled" selected="selected">Choose option</option>

                                        <option value="bca">BCA</option>
                                        <option value="bcom">BCOM</option>
                                        <option value="bba">BBA</option>
                                        <option value="ba">BA</option>
                                        <option value="bvoc">BVOC</option>

                                    </select>
                                    <!-- <input type="text" type="text" id="s_cls" name="s_dob"  class="form-control" placeholder="Enter class Name" style="margin-top: 23px;"> -->
                                </div>

                            </div>

                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                    year</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <select id="year" name="year" class="form-control" placeholder="Enter class Name"
                                        style="margin-top: 23px;">
                                        <option disabled="disabled" selected="selected">Choose option</option>

                                        <option value="1">|</option>
                                        <option value="2">||</option>
                                        <option value="3">|||</option>


                                    </select>
                                    <!-- <input type="text" type="text" id="s_cls" name="s_dob"  class="form-control" placeholder="Enter class Name" style="margin-top: 23px;"> -->
                                </div>

                            </div><br>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                    Batch</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <select id="batch" name="batch" class="form-control" placeholder="Enter class Name"
                                        style="margin-top: 23px;">
                                        <option>Select Batch</option>
                                        <?php
                                        $sel = "select * from batch ";
                                        $result = mysqli_query($con, $sel);
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<option value='$row[1]'>$row[1]</option>";
                                        }
                                        ?>
                                    </select>
                                    <!-- <input type="text" type="text" id="s_cls" name="s_dob"  class="form-control" placeholder="Enter class Name" style="margin-top: 23px;"> -->
                                </div>

                            </div><br>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Student
                                    DOB</label>
                                <div class="col-sm-7 mg-t-8 mg-sm-t-10">
                                    <input type="date" name="s_dob" id="s_dob" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Parents
                                    No</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" name="pno" id="pno" class="form-control"
                                        placeholder="Parent's number" required>
                                </div>
                            </div><!-- row -->
                            <br>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Phone
                                    Number</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Add Phone Number" name="Phone Number" pattern="[6-9]{1}[0-9]{9}"
                                        title="Phone number with 7-9 and remaing 9 digit with 0-9">
                                </div>
                            </div><!-- row -->
                            <br>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Email</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Add email " pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        required>
                                </div>
                            </div><!-- row -->
                            <br>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span
                                        class="tx-danger">*</span>Password</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" name="pass" id="pass" class="form-control"
                                        placeholder="Add password " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                        required>
                                </div>
                            </div><!-- row -->
                            <br>


                            <div class="row row-xs mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                    <div class="form-layout-footer">
                                        <input type="submit" style="font-size: 15px;font-weight: 700; float: right;"
                                            name="submit" class="btn btn-success" value="Add Student">
                                        <!-- <button class="btn btn-secondary">Cancel</button> -->
                </form>
            </div><!-- form-layout-footer -->
        </div><!-- col-8 -->
    </div>
</div><!-- card -->
</div><!-- col-6 -->
</div><!-- row -->
</div>

</body>

</html>