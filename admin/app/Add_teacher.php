<?php include "side.php"; 
include 'db.php';
include 'check_Admin.php';


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

                    <h5>Add Manager</h5>
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
                            <form action="ins_teacher.php" method="post">
                                <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                                    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                                        <center>
                                            <h2 class="card-body-title">Add Manager</h2>
                                        </center>

                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span
                                                    class="tx-danger">*</span>Manager Name:</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="text" type="text" id="name" name="t_name"
                                                    class="form-control" placeholder="Enter Manager name"
                                                    style="margin-top: 23px;" required pattern="^[a-zA-Z]*"
                                                    title="Please Enter a Valid name with only A-Z alphabets">
                                            </div>
                                        </div><!-- row -->
                                        <br>
                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span
                                                    class="tx-danger">*</span>Manager Email Id:</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="text" type="text" id="name" name="t_email"
                                                    class="form-control" placeholder="Enter email id"
                                                    style="margin-top: 23px;"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                            </div>
                                        </div><!-- row -->
                                        <br>
                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span
                                                    class="tx-danger">*</span>Manager Password:</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="password" id="pass" name="pass" class="form-control"
                                                    placeholder="Enter password" style="margin-top: 23px;"
                                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                                    required>
                                            </div>
                                        </div><!-- row -->
                                        <div class="row row-xs">
                                            <label class="col-sm-4 form-control-label"><span
                                                    class="tx-danger">*</span>Manager id:</label>
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <input type="text" type="text" id="name" name="t_id"
                                                    class="form-control" placeholder="Enter id"
                                                    style="margin-top: 23px;" required pattern="[0-9]+"
                                                    title="please enter number only">
                                            </div>
                                        </div><!-- row -->
                                        <br>
                                        <div class="row row-xs">
                                        </div><!-- row -->

                                        <br>
                                        <input type="submit" name="add" class="btn btn-success" value="Add ">

                            </form>

                        </div><!-- form-layout-footer -->

                    </div> <?php
      }
      ?> <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Manager Id</th>
                                    <th>Manager Name</th>
                                    <th>Manager email</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <?php
                  $sel="select * from manager";
                   $result = mysqli_query($con,$sel);
                  $i=1;
                  while($row = mysqli_fetch_array($result)) 
                  {
                  ?>
                            <tr>
                                <td><?php echo $row["teach_id"];?></td>
                                <td><?php echo $row["t_name"];?></td>
                                <td><?php echo $row["email"];?></td>
                                <td><button type="button" class="btn btn-danger" style="cursor: pointer; "
                                        onclick="deleteAdmin(<?php echo $row['teach_id']; ?>)">Delete</button> </td>
                                <td><button type="button" class="btn btn-danger" style="cursor: pointer; "
                                        onclick="updatecust(<?php echo $row['teach_id']; ?>)">Edit</button> </td>
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
                            window.open("delete_teacher.php?id=" + df);
                        }

                    }
                    </script>
                    <script type="text/javascript">
                    function updatecust(rnum) {


                        var con = confirm("Are you want Update");
                        if (con == true) {
                            window.open("Update_teach.php?id=" + rnum, "");
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