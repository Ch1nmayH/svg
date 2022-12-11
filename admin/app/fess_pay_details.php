<?php include "side.php";
include 'db.php';
session_start();
$branch_id = $_SESSION["branch"];
if (!isset($_SESSION)) {
    header("location:login.php");
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
        <div class="kt-mainpanel">
            <div class="kt-pagetitle">
                <h5>Leave Application</h5>
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
                <div style="-webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">

                    <div class="card pd-20 pd-sm-40">
                        <center>
                            <h2 class="card-body-title">Fees Payment Details</h2>
                        </center>
                        <form action='' method="POST">
                            <select id="status" name="status" class="form-control"
                                style="width: 142px;margin-bottom: 11px;">
                                <option value="all">ALL</option>
                                <option value="Paid">Paid</option>
                                <!-- <option value="PartialyPaid">Partialy Paid</option> -->
                                <option value="NotPaid">Not Paid</option>
                            </select>

                            <input type="submit" name="submit" class="btn btn-primary"
                                style="padding-bottom: -22px;margin-top: -85px;margin-left: 159px;">
                            <?php
                            $tp = "SELECT * FROM `student` WHERE `fees_status` = 'paid'";
                            $resulttp = mysqli_query($con,$tp);
                            $numr = mysqli_num_rows($resulttp);
                            
                            

                        ?>
                            <input type="text" name="tp" value="total paid = <?php echo $numr ?>"
                                class="btn btn-success"
                                style="padding-bottom: -22px;margin-top: -85px;margin-left: 159px;" readonly>

                            <?php
                            $np = "SELECT * FROM `student` WHERE `fees_status` = 'not paid'";
                            $resultup = mysqli_query($con,$np);
                            $numru = mysqli_num_rows($resultup);
                            
                            
            
                        ?>
                            <input type="text" name="tup" value="total not paid =  <?php echo $numru ?>"
                                class="btn btn-danger"
                                style="padding-bottom: -22px;margin-top: -85px;margin-left: 159px;" readonly>
                        </form>
                        <div class="table-wrapper ">

                            <table id="datatable1" class="table display responsive nowrap ">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Student Roll Number</th>
                                        <th class="wd-15p">Student Name</th>
                                        <th class="wd-10p">Student Class</th>
                                        <th class="wd-10p">Student Year</th>
                                        <th class="wd-25p">Actual Fees</th>
                                        <th class="wd-25p">Fees Paid</th>
                                        <th class="wd-25p">Paid date</th>
                                        <th class="wd-25p">Due</th>
                                        <th class="wd-25p"></th>
                                        <th class="wd-25p"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $pay_status = 'all';
                                if (isset($_POST['submit'])) {
                                    $pay_status = $_POST['status'];
                                }
                                $sel = "SELECT * FROM `student`";
                                $result = mysqli_query($con, $sel);
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {

                                    $reg_no = $row[1];
                                    $name = $row[2];
                                    $class = $row[4];
                                    $year = $row[5];

                                    // $cquery="select fees from  student where class='$class' and year='$year'";
                                    // $result2 = mysqli_query($con,$cquery);
                                    // while($row2 = mysqli_fetch_array($result2)) {   
                                    $fees = $row[14];

                                    // }

                                    if ($pay_status == "all") {
                                        $query = "Select sum(paid),date(pay_date) from fees_payment where s_roll='$reg_no' group by s_roll";
                                        $result1_b = mysqli_query($con, $query);
                                        $rowcount_b = mysqli_num_rows($result1_b);
                                        while ($row1 = mysqli_fetch_array($result1_b)) {
                                            $paid = $row1[0];
                                            $pay_date = $row1[1];
                                            $due = $fees - $paid;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $reg_no; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $class; ?></td>
                                        <td><?php echo $year; ?></td>
                                        <td><?php echo $fees; ?></td>
                                        <?php


                                                echo "<td> $paid</td>";
                                                echo "<td> $pay_date</td>";
                                                echo "<td> $due</td>";
                                                $i++;
                                            }
                                        }
                                        if ($pay_status == "Paid") {
                                            $query = "Select sum(paid),date(pay_date) from fees_payment where s_roll='$reg_no' and (Select sum(paid) from fees_payment where s_roll='$reg_no')=$fees group by s_roll";
                                            $result1 = mysqli_query($con, $query);
                                            $rowcount2 = mysqli_num_rows($result1);
                                            while ($row1 = mysqli_fetch_array($result1)) {
                                                $paid = $row1[0];
                                                $pay_date = $row1[1];
                                                $due = $fees - $paid;
                                                if ($paid != '') {
                                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $reg_no; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $class; ?></td>
                                        <td><?php echo $year; ?></td>
                                        <td><?php echo $fees; ?></td>
                                        <?php
                                                    echo "<td> $paid</td>";
                                                    echo "<td> $pay_date</td>";
                                                    echo "<td> $due</td>";
                                                    // $i++;
                                                }
                                            }
                                        }

                                        if ($pay_status == "PartialyPaid") {

                                            $query = "Select sum(paid),date(pay_date) from fees_payment where s_roll='$reg_no' and (Select sum(paid) from fees_payment where s_roll='$reg_no')<$fees group by s_roll";
                                            $result1_c = mysqli_query($con, $query);
                                            $rowcount1 = mysqli_num_rows($result1_c);
                                            while ($row1 = mysqli_fetch_array($result1_c)) {
                                                $paid = $row1[0];
                                                $pay_date = $row1[1];
                                                $due = $fees - $paid;
                                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $reg_no; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $class; ?></td>
                                        <td><?php echo $year; ?></td>
                                        <td><?php echo $fees; ?></td>
                                        <?php


                                                echo "<td> $paid</td>";
                                                echo "<td> $pay_date</td>";
                                                echo "<td> $due</td>";
                                                $i++;
                                            }
                                        }



                                        if ($pay_status == "all") {

                                            if ($rowcount_b <= 0) {
                                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $reg_no; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $class; ?></td>
                                        <td><?php echo $year; ?></td>
                                        <td><?php echo $fees; ?></td>
                                        <?php
                                                echo "<td colspan='3' style='text-align: center;'>";
                                                echo "Not Paid";
                                                echo "</td>";
                                                $i++;

                                            }
                                        }
                                    }
                                    if ($pay_status == "NotPaid") {
                                        $query = "Select distinct rollno,sname,class,year from student where fees_status='not paid'";
                                        $result1_c = mysqli_query($con, $query);
                                        while ($row1 = mysqli_fetch_array($result1_c)) {
                                            $reg_no = $row1[0];
                                            $name = $row1[1];
                                            $class = $row1[2];
                                            $year = $row1[3];
                                            $cquery = "select fees from  student where class='$class' and year='$year'";
                                            $result2 = mysqli_query($con, $cquery);
                                            while ($row2 = mysqli_fetch_array($result2)) {
                                                $fees = $row2[0];
                                            }

                                            ?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $reg_no; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $class; ?></td>
                                        <td><?php echo $year; ?></td>
                                        <td><?php echo $fees; ?></td>
                                        <?php
                                            echo "<td colspan='3' style='text-align: center;'>";
                                            echo "Not Paid";
                                            echo "</td>";
                                            $i++;
                                        }
                                    }
                                        ?>
                                    </tr>




                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->


                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- kt-pagebody -->
        <div class="kt-footer">
            <span>Copyright &copy;. All Rights Reserved. Katniss Responsive Bootstrap 4 Admin Dashboard.</span>
            <span>Created by: ThemePixels, Inc.</span>
        </div><!-- kt-footer -->
        </div><!-- kt-mainpanel -->
        </div>
        <script src="../lib/jquery/jquery.js"></script>
        <script src="../lib/popper.js/popper.js"></script>
        <script src="../lib/bootstrap/bootstrap.js"></script>
        <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
        <script src="../lib/moment/moment.js"></script>
        <script src="../lib/highlightjs/highlight.pack.js"></script>
        <script src="../lib/datatables/jquery.dataTables.js"></script>
        <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
        <script src="../lib/select2/js/select2.min.js"></script>

        <script src="../js/katniss.js"></script>
        <script>
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            // $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
        </script>
        <style type="text/css">
        .paginate_button {
            padding: 9px;
            color: black;
        }

        .dataTables_info {
            padding-bottom: 19px;
        }
        </style>