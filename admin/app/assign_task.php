<?php include "side.php"; 
include 'db.php';
include 'check_manager.php';

$isvalid = true;

if (isset($_POST['add'])) 
{
    $task = $_POST['task'];
    $b_name=$_POST['b_name'];
    $from=$_POST['from'];
    $to=$_POST['to'];

    if($from > $to) {

        $isvalid = false;
        echo '<script>alert("From date cannot be bigger than to date");
        window.location.href = "assign_task.php";
        </script>';
    }
    if($isvalid){

        $insert="INSERT INTO `task`(`task`, `batch`, `from_date`, `to_date`) VALUES ('$task', '$b_name','$from','$to')";
      $result = mysqli_query($con,$insert);
        echo '<script>alert("Successfully Added");
        window.location.href = "assign_task.php";
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

                    <!-- <h5>Add Batch</h5> -->
                </div><!-- kt-pagetitle -->

                <div class="kt-pagebody">

                    <div class="card pd-20 pd-sm-40">
                        <?php
      if ($_SESSION["user"] == "A" ) {
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
                                            <h2 class="card-body-title">Add Tasks</h2>
                                        </center>



                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                                Batch Name</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <select id="b_name" name="b_name" class="form-control"
                                                    placeholder="select batch name" style="margin-top: 23px;" required>
                                                    <option hidden disabled>Select batch name</option>
                                                    <?php 
                                          $query="select * from batch";
                                          $result2 = mysqli_query($con,$query);
                                                      while($row2 = mysqli_fetch_array($result2)) {   
                                                          echo "<option value='$row2[1] $row2[3]'>$row2[1] $row2[3]</option>";
                                                      }
                                          
                                          ?>






                                                </select>
                                                <!-- <input type="text" type="text" id="s_cls" name="s_dob"  class="form-control" placeholder="Enter class Name" style="margin-top: 23px;"> -->
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span
                                                    class="tx-danger">*</span>Task name:</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="text" id="task" name="task" placeholder="fill in the  task"
                                                    class="form-control" style="margin-top: 23px;" required>
                                            </div>
                                        </div><!-- row -->
                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span
                                                    class="tx-danger">*</span>From Date:</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="date" id="from" name="from" class="form-control"
                                                    style="margin-top: 23px;" required>
                                            </div>
                                        </div><!-- row -->
                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span
                                                    class="tx-danger">*</span>To Date:</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="date" id="to" name="to" class="form-control"
                                                    style="margin-top: 23px;" required>
                                            </div>
                                        </div><!-- row -->
                                        <!-- row -->
                                        <br>
                                        <div class="row row-xs">

                                        </div><!-- row -->

                                        <br>
                                        <input type="submit" name="add" class="btn btn-success" value="Add ">

                            </form>

                        </div><!-- form-layout-footer -->

                    </div>
                    <?php
      }
      ?> <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Batch</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                </tr>
                            </thead>
                            <?php
                  $sel="select * from task";
                  $result = mysqli_query($con,$sel);
                  $i=1;
                  while($row = mysqli_fetch_array($result)) 
                  {
                  ?>
                            <tr>
                                <td><?php echo $row["task"];?></td>
                                <td><?php echo $row["batch"];?></td>
                                <td><?php echo $row["from_date"];?></td>
                                <td><?php echo $row["to_date"];?></td>
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
                            window.open("delete_task.php?id=" + df);
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