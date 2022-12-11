<?php include "side.php";
include 'db.php';
include 'check_manager.php';
$isvalid = true;

if (isset($_POST['add'])) {
    $b_name = $_POST['b_name'];
    $student = $_POST['s_name'];

    $check = "SELECT * FROM `batch` WHERE `batch` = '$b_name'";
    $result2 = mysqli_query($con, $check);
    $rowcount = mysqli_num_rows($result2);

    if ($rowcount > 0) {

        $isvalid = false;
        echo '<script>alert("Batch Name Already Exists");
    window.location.href = "add_batches.php";
    </script>';
    }

    if ($isvalid) {
        $insert = "INSERT INTO `batch`(`batch`) VALUES ('$b_name')";
        $result = mysqli_query($con, $insert);
        echo '<script>alert("Successfully Added");
    window.location.href = "add_batches.php";
    </script>';
    } else {
        echo '<script>alert("Something Went Wrong");
        window.location.href = "add_batches.php";
        </script>';
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title></title>
    </head>

    <body>
        <div class="kt-mainpanel">
            <div class="content-body">
                <div class="kt-pagetitle">

                    <h5>Add Batch</h5>
                </div><!-- kt-pagetitle -->

                <div class="kt-pagebody">

                    <div class="card pd-20 pd-sm-40">
                        <?php
                    if ($_SESSION["user"] == "A") {
                    ?>
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
                        <div class="form-layout">
                            <form action="" method="post">
                                <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                                    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                                        <center>
                                            <h2 class="card-body-title">Add Batch</h2>
                                        </center>

                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span
                                                    class="tx-danger">*</span>Batch Name:</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="text" id="name" name="b_name" class="form-control"
                                                    placeholder="Enter batch name" style="margin-top: 23px;" required>
                                            </div>
                                        </div>
                                        <br>


                                        <br>
                                        <div class="row row-xs">

                                        </div><!-- row -->

                                        <br>
                                        <br>
                                        <br>
                                        <input type="submit" name="add" class="btn btn-success" value="Add ">

                            </form>

                        </div><!-- form-layout-footer -->

                    </div>
                    <?php
                    }
            ?> <div class="table-wrapper">

                        <a href="add_students_batches.php"> <button class="btn btn-outline-primary"
                                style="width: 200   px;">Add
                                students to the batch
                            </button></a>

                        <a href="./view_batch.php"> <button class="btn btn-outline-primary"
                                style="width: 200px; margin-left: 50px;">view
                                students and batches
                            </button></a>
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Batch</th>
                                    <!-- <th>Student Names</th> -->
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <?php
                    $sel = "select * from batch";
                    $result = mysqli_query($con, $sel);
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $batch_name = $row["batch"];
                    ?>
                            <tr>
                                <td><?php echo $row["batch"]; ?></td>
                                <!-- <td><?php echo $row["s_name"]; ?></td> -->

                                <td><button type="button" class="btn btn-danger" style="cursor: pointer; "
                                        onclick="deleteAdmin(<?php echo $row['id']; ?>)">Delete</button> </td>

                            </tr>
                            <?php
                    }
                    ?>
                        </table>
                    </div>
                    <script type="text/javascript">
                    function deleteAdmin(id) {
                        var df = id
                        var con = confirm("Are you want to Delete");
                        if (con == true) {
                            window.open("delete_batch.php?id=" + df);
                        }
                    }
                    </script>

                </div><!-- col-8 -->
            </div>
        </div><!-- card -->
        </div><!-- col-6 -->
        </div><!-- row -->
        </div>
    </body>

</html>