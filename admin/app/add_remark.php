<?php include "side.php"; 
include 'db.php';
include 'check_manager.php';
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

                    <!-- <h5>Add Remark</h5> -->
                </div><!-- kt-pagetitle -->

                <div class="kt-pagebody">

                    <div class="card pd-20 pd-sm-40">
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
                            <form action="ins_remark.php" method="post">
                                <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                                    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                                        <center>
                                            <h2 class="card-body-title">Add Remark</h2>
                                        </center>

                                        <div class="row row-xs">
                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <select id="name" name="s_name" class="form-control" required>
                                                    <option disabled>Select Student</option>
                                                    <?php
                   $sel="select * from student";
                   $result = mysqli_query($con,$sel);
                    while($row = mysqli_fetch_array($result)) 
                    {
                      echo "<option value='$row[1].$row[2]'>$row[1] $row[2]</option>";
                    }
                  ?>
                                                </select>

                                            </div>

                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                <textarea id="remark" name="remark" class="form-control"
                                                    placeholder="Add remark" style="margin-top: 23px;"
                                                    required></textarea>
                                            </div>

                                        </div>
                                    </div><!-- row -->
                                    <div class="row row-xs">
                                    </div><!-- row -->

                                    <br>
                                    <input type="submit" name="add" class="btn btn-success" value="Add ">

                            </form>

                        </div><!-- form-layout-footer -->

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