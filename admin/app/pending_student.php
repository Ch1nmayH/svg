<?php include "side.php";
include 'db.php';
include 'check_manager.php';

session_start();
if (!isset($_SESSION)) {
    header("location:login.php");
}
?>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
$.fn.extend({
    disableSelection: function() {
        this.each(function() {
            if (typeof this.onselectstart != 'undefined') {
                this.onselectstart = function() {
                    return false;
                };
            } else if (typeof this.style.MozUserSelect != 'undefined') {
                this.style.MozUserSelect = 'none';
            } else {
                this.onmousedown = function() {
                    return false;
                };
            }
        });
    }
});

$(document).ready(function() {
    $('label').disableSelection();
});
</script>
<div class="kt-breadcrumb">
    <nav class="breadcrumb">

    </nav>
</div><!-- kt-breadcrumb -->

<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">

    <div class="kt-pagebody">
        <div style="-webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;">
            <style type="text/css">
            .card {
                margin-left: 2%;
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
            <div class="content-body">
                <div class="card pd-20 pd-sm-40"><br>
                    <center>
                        <h3 class="card-body-title">Students</h3>
                    </center>

                    <div class="table-wrapper ">
                        <form action='' method="POST">
                            <select id="cls" name="cls" class="form-control" style="width: 142px;margin-bottom: 11px;">
                                <option value="all">ALL</option>
                                <option value="bca">BCA</option>
                                <option value="bba">BBA</option>
                                <option value="bvoc">BVOC</option>
                                <option value="ba">BA</option>
                                <option value="bcom">BCOM</option>
                            </select>

                            <input type="submit" name="submit" class="btn btn-success"
                                style="padding-bottom: -22px;margin-top: -85px;margin-left: 159px;">
                        </form>
                        <a href="crud.php"> <button class="btn btn-outline-success"
                                style="width: 90px; margin-right:29px">Active
                            </button></a>
                        <a href="add_cust.php"> <button class="btn btn-outline-primary" style="width: 90px;">Add New
                            </button></a>


                        <table id="datatable1" class="table display responsive nowrap ">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-15p">Student Id</th>
                                    <th class="wd-15p">Student Name</th>
                                    <th class="wd-10p">Student course</th>
                                    <th class="wd-10p">Student year</th>
                                    <th class="wd-25p">Student DOB</th>
                                    <th class="wd-25p">Phone Number</th>
                                    <th class="wd-25p">Perents Number</th>
                                    <th class="wd-25p">email</th>


                                    <th class="wd-25p">Accept</th>
                                    <th class="wd-25p">Delete</th>
                                    <th class="wd-25p">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cls = 'all';
                                if (isset($_POST['submit'])) {
                                    $cls = $_POST['cls'];
                                }
                                $sel = "SELECT * FROM `student`";
                                $result = mysqli_query($con, $sel);
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {

                                    $reg_no = $row[1];
                                    $name = $row[2];
                                    $class = $row[4];
                                    $year = $row[5];
                                    $email = $row[9];
                                    $dob = $row[6];
                                    $phone = $row[8];
                                    $pno = $row[7];




                                    if ($cls == "all") {
                                        $query = "Select * from student where rollno='$reg_no' and `status`='pending'";
                                        $result1_b = mysqli_query($con, $query);
                                        $rowcount = mysqli_num_rows($result1_b);
                                        while ($row1 = mysqli_fetch_array($result1_b)) {

                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $reg_no; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $class; ?></td>
                                    <td><?php echo $year; ?></td>
                                    <td><?php echo $dob; ?></td>
                                    <td><?php echo $pno; ?></td>
                                    <td><?php echo $phone; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <button onclick='acceptstu(<?php echo $row[1]; ?>)'><i class="fa fa-user"
                                                style="font-size:24px"></i></button>
                                    </td>

                                    <td><button onclick='cancel(<?php echo $row[1]; ?>)' class="btn btn-secondary"><i
                                                class="fa fa-trash-o" style="font-size:24px"></i></button></td>

                                    <td>
                                        <button onclick='updatecust(<?php echo $row[1]; ?>)'><i class="fa fa-edit"
                                                style="font-size:24px"></i></button>
                                    </td>


                                    <?php



                                            $i++;
                                        }
                                    }
                                }

                                if ($cls == "bca") {
                                    $query = "SELECT * FROM student WHERE `class` = 'bca' and `status`='pending'";
                                    $result1 = mysqli_query($con, $query);


                                    while ($row2 = mysqli_fetch_array($result1)) {



                                            ?>
                                <tr>

                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row2[1]; ?></td>
                                    <td><?php echo $row2[2]; ?></td>
                                    <td><?php echo $row2[4]; ?></td>
                                    <td><?php echo $row2[5]; ?></td>
                                    <td><?php echo $row2[6]; ?></td>
                                    <td><?php echo $row2[8]; ?></td>
                                    <td><?php echo $row2[7]; ?></td>
                                    <td><?php echo $row2[9]; ?></td>

                                    <td>
                                        <button onclick='acceptstu(<?php echo $row2[1]; ?>)'><i class="fa fa-user"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <td><button onclick='cancel(<?php echo $row2[1]; ?>)' class="btn btn-secondary"><i
                                                class="fa fa-trash-o" style="font-size:24px"></i></button></td>

                                    <td>
                                        <button onclick='updatecust(<?php echo $row2[1]; ?>)'><i class="fa fa-edit"
                                                style="font-size:24px"></i></button>
                                    </td>


                                    <?php

                                            $i++;
                                        }
                                    }

                                    if ($cls == "bba") {
                                        $query = "SELECT * FROM student WHERE `class` = 'bba' and `status`='pending'";
                                        $result1 = mysqli_query($con, $query);


                                        while ($row2 = mysqli_fetch_array($result1)) {



                                            ?>
                                <tr>

                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row2[1]; ?></td>
                                    <td><?php echo $row2[2]; ?></td>
                                    <td><?php echo $row2[4]; ?></td>
                                    <td><?php echo $row2[5]; ?></td>
                                    <td><?php echo $row2[6]; ?></td>
                                    <td><?php echo $row2[8]; ?></td>
                                    <td><?php echo $row2[7]; ?></td>
                                    <td><?php echo $row2[9]; ?></td>

                                    <td>
                                        <button onclick='acceptstu(<?php echo $row2[1]; ?>)'><i class="fa fa-user"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <td><button onclick='cancel(<?php echo $row2[1]; ?>)' class="btn btn-secondary"><i
                                                class="fa fa-trash-o" style="font-size:24px"></i></button></td>

                                    <td>
                                        <button onclick='updatecust(<?php echo $row2[1]; ?>)'><i class="fa fa-edit"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <?php

                                            $i++;
                                        }
                                    }
                                    if ($cls == "ba") {
                                        $query = "SELECT * FROM student WHERE `class` = 'ba' and `status`='pending'";
                                        $result1 = mysqli_query($con, $query);


                                        while ($row2 = mysqli_fetch_array($result1)) {



                                            ?>
                                <tr>

                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row2[1]; ?></td>
                                    <td><?php echo $row2[2]; ?></td>
                                    <td><?php echo $row2[4]; ?></td>
                                    <td><?php echo $row2[5]; ?></td>
                                    <td><?php echo $row2[6]; ?></td>
                                    <td><?php echo $row2[8]; ?></td>
                                    <td><?php echo $row2[7]; ?></td>
                                    <td><?php echo $row2[9]; ?></td>

                                    <td>
                                        <button onclick='acceptstu(<?php echo $row2[1]; ?>)'><i class="fa fa-user"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <td><button onclick='cancel(<?php echo $row2[1]; ?>)' class="btn btn-secondary"><i
                                                class="fa fa-trash-o" style="font-size:24px"></i></button></td>

                                    <td>
                                        <button onclick='updatecust(<?php echo $row2[1]; ?>)'><i class="fa fa-edit"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <?php

                                            $i++;
                                        }
                                    }
                                    if ($cls == "bcom") {
                                        $query = "SELECT * FROM student WHERE `class` = 'bcom' and `status`='pending'";
                                        $result1 = mysqli_query($con, $query);


                                        while ($row2 = mysqli_fetch_array($result1)) {



                                            ?>
                                <tr>

                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row2[1]; ?></td>
                                    <td><?php echo $row2[2]; ?></td>
                                    <td><?php echo $row2[4]; ?></td>
                                    <td><?php echo $row2[5]; ?></td>
                                    <td><?php echo $row2[6]; ?></td>
                                    <td><?php echo $row2[8]; ?></td>
                                    <td><?php echo $row2[7]; ?></td>
                                    <td><?php echo $row2[9]; ?></td>

                                    <td>
                                        <button onclick='acceptstu(<?php echo $row2[1]; ?>)'><i class="fa fa-user"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <td><button onclick='cancel(<?php echo $row2[1]; ?>)' class="btn btn-secondary"><i
                                                class="fa fa-trash-o" style="font-size:24px"></i></button></td>

                                    <td>
                                        <button onclick='updatecust(<?php echo $row2[1]; ?>)'><i class="fa fa-edit"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <?php

                                            $i++;
                                        }
                                    }
                                    if ($cls == "bvoc") {
                                        $query = "SELECT * FROM student WHERE `class` = 'bvoc' and `status`='pending'";
                                        $result1 = mysqli_query($con, $query);


                                        while ($row2 = mysqli_fetch_array($result1)) {



                                            ?>
                                <tr>

                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row2[1]; ?></td>
                                    <td><?php echo $row2[2]; ?></td>
                                    <td><?php echo $row2[4]; ?></td>
                                    <td><?php echo $row2[5]; ?></td>
                                    <td><?php echo $row2[6]; ?></td>
                                    <td><?php echo $row2[8]; ?></td>
                                    <td><?php echo $row2[7]; ?></td>
                                    <td><?php echo $row2[9]; ?></td>

                                    <td>
                                        <button onclick='acceptstu(<?php echo $row2[1]; ?>)'><i class="fa fa-user"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <td><button onclick='cancel(<?php echo $row2[1]; ?>)' class="btn btn-secondary"><i
                                                class="fa fa-trash-o" style="font-size:24px"></i></button></td>

                                    <td>
                                        <button onclick='updatecust(<?php echo $row2[1]; ?>)'><i class="fa fa-edit"
                                                style="font-size:24px"></i></button>
                                    </td>
                                    <?php

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

<style type="text/css">
.paginate_button {
    padding: 9px;
    color: black;
}

.dataTables_info {
    padding-bottom: 19px;
}
</style>

<script type="text/javascript">
function acceptstu(rnum) {

    var con = confirm("Accept the user?");
    if (con == true) {
        window.open("Update_status.php?id=" + rnum, "");

    }
}

function cancel(rnum) {

    var con = confirm("Delete the user?");
    if (con == true) {
        window.open("student_delete.php?id=" + rnum, "");
    }
}

function updatecust(rnum) {

    var con = confirm("Update the user?");
    if (con == true) {
        window.open("Update_data.php?id=" + rnum, "");
    }
}
</script>