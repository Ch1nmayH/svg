<?php
sleep(3);
include "side.php";
include 'db.php';
session_start();
// $branch_id=$_SESSION["branch"];
if (!isset($_SESSION)) {

    header("location:login.php");
}
$sid = $_SESSION["id"];
?>
<script>
function submit_form() {

    var s_roll = document.getElementById("s_roll").value;
    var s_name = document.getElementById("s_name").value;
    var cls = document.getElementById("class").value;
    var fees = document.getElementById("fees").value;
    var paid = document.getElementById("paid").value;
    var mode = document.getElementById("mode").value;
    var due = document.getElementById("due").value;
    if (s_roll == "") {
        alert("Please Add Student Id");
    } else if (s_name == "") {
        alert("Please Enter Student Name");
    } else if (cls == "") {
        alert("Please Select batch");
    } else if (fees == "") {
        alert("Please Add fees");
    } else if (mode == "") {
        alert("Please Select Mode");
    } else if (due == "") {
        alert("Please Add Due Amount");
    } else {
        document.reg_form.action = "stripe_pay/payment/index.php";
        document.reg_form.method = "post";
        document.reg_form.submit();

    }


}
</script>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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


    </head>

    <body">
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
                <h1> Fees Payment</h1> <br> <br>
            </div><!-- kt-pagetitle -->

            <div class="kt-pagebody">

                <div class="card pd-20 pd-sm-40">

                    <div class="form-layout">
                        <form name="reg_form" method="POST">
                            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                                    <!-- <h1 class="card-body-title">Pay Fees</h1> -->

                                    <?php
                                $query = "select * from student where rollno='$sid'";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    
                                    $feestatus = $row['fees_status'];
                                }

                                if($feestatus == 'paid'){
?>
                                    <div class="row row-xs">
                                        <center>
                                            <h1 style="color: green;">You have already paid the fees</h1>
                                        </center>
                                        <!-- <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" type="text" id="s_roll" name="s_roll"
                                                class="form-control" placeholder="Enter Roll Number"
                                                value="<?php echo $sid ?>" style="margin-top: 23px;" readonly>
                                        </div> -->
                                    </div><!-- row -->

                                    <?php
                            }

                            else {
                            ?>

                                    <div class="row row-xs">
                                        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                            Student Id:</label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" type="text" id="s_roll" name="s_roll"
                                                class="form-control" placeholder="Enter Roll Number"
                                                value="<?php echo $sid ?>" style="margin-top: 23px;" readonly>
                                        </div>
                                    </div><!-- row -->
                                    <div class="row row-xs">
                                        <?php
                                    $query = "select * from student where rollno='$sid'";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $sname = $row['sname'];
                                        $class = $row['class'];
                                        $fees = $row['fees'];
                                        $feestatus = $row['fees_status'];
                                    }
                                    ?>
                                        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                            Student Name</label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" type="text" id="s_name" name="s_name"
                                                class="form-control" placeholder="Enter Name"
                                                value="<?php echo $sname ?>" style="margin-top: 23px;" readonly>
                                        </div>
                                    </div><!-- row -->



                                    <div class="row row-xs mg-t-20">
                                        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                            Student batch</label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" type="text" id="class" name="class" class="form-control"
                                                placeholder="Enter Name" value="<?php echo $class ?>"
                                                style="margin-top: 23px;" readonly>
                                        </div>

                                    </div>

                                    <!-- <script>
                                    function myFunction() {







                                    }
                                    </script> -->


                                    <div class="row row-xs mg-t-20">
                                        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Fees
                                        </label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="fees" id="fees" class="form-control"
                                                placeholder="Fees" value="<?php echo $fees ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row row-xs mg-t-20">
                                        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Fees
                                            Paying</label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="paid" id="paid" value="<?php echo $fees ?>"
                                                readonly class="form-control" placeholder="Fees paid">
                                        </div>
                                    </div>
                                    <div class="row row-xs mg-t-20">
                                        <label class="col-sm-4 form-control-label"><span
                                                class="tx-danger">*</span>Payment
                                            Mode</label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="mode" id="mode" value="online" class="form-control"
                                                placeholder="Fees paid" readonly>
                                        </div>
                                    </div>
                                    <div class="row row-xs mg-t-20">
                                        <label class="col-sm-4 form-control-label"><span
                                                class="tx-danger">*</span>Due</label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="due" value="0" readonly id="due"
                                                class="form-control" placeholder="Due Amount">
                                        </div>
                                    </div>

                                    <div class="row row-xs mg-t-30">
                                        <div class="col-sm-8 mg-l-auto">
                                            <div class="form-layout-footer">
                                                <button type="button" onclick="submit_form()"
                                                    class="btn btn-success">Submit</button>


                        </form>
                        <?php }?>
                    </div><!-- form-layout-footer -->
                </div><!-- col-8 -->
            </div>
        </div><!-- card -->
        </div><!-- col-6 -->
        </div><!-- row -->
        </div>

        </body>

</html>