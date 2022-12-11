<?php include "side.php"; 
include 'db.php';
include 'check_manager.php';

if(!isset($_SESSION))
{
    header("location:login.php"); 
}
?>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>




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
                        <h3 class="card-body-title">Add Students to batches</h3>
                    </center>

                    <div class="table-wrapper ">
                        <form action="" method="POST">
                            <table id="datatable1" class="table display responsive nowrap ">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Student Id</th>
                                        <th class="wd-15p">Student Name</th>
                                        <th class="wd-10p">Student Course</th>
                                        <th class="wd-10p">Assign Batch</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                
            
                    $sel="SELECT * FROM `student` WHERE `status` = 'Active'";

                
                $result = mysqli_query($con,$sel
                );
                    $i=1;
                    while($row = mysqli_fetch_array($result)) {
                   
                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td id="stuid" name="stuid">
                                            <?php 
                                        echo $row[1]; 
                                        ?></td>
                                        <?php
                                        

                                            $_SESSION['stuid'] = $row[1];
?>
                                        <td><?php echo $row[2]; ?></td>
                                        <td><?php echo $row[4]; ?></td>
                                        <td>
                                            <select id="b_name" name="b_name" class="form-control" onchange="change()"
                                                placeholder=" select batch name" style="margin-top: 23px;">
                                                <option disabled>Select batch name</option>
                                                <?php 
                                          $query="select * from batch";
                                          $result2 = mysqli_query($con,$query);
                                                      while($row2 = mysqli_fetch_array($result2)) {   
                                                          echo "<option value='$row2[1]'>$row2[1]</option>";
                                                          ?>


                                                <?php
                                                          

                                                        }     
                                                    
                                          ?>
                                            </select>

                                        </td>
                                        <!-- <td> -->
                                        <!-- <button name="add_task"><i class="icon icon-single-04"
                                                    style="font-size:24px"></i></button> -->

                                        <!-- <button name="add_task" class="btn btn-outline-primary"
                                                style="width: 90px;">Assign
                                            </button>
                                        </td> -->


                                        <td>

                                            <button onclick='updatecust(<?php echo $row[1]?>)   '
                                                class="btn btn-outline-primary" style="width: 90px;">Assign</button>
                                        </td>

                                        <?php $i++; 
              }
              ?>
                                    </tr>





                                </tbody>
                            </table>

                        </form>

                        <?php

                        ?>
                        <script>
                        function change() {

                            var changed = document.getElementById('b_name');
                            // alert(changed);
                        }
                        var batch = document.getElementById['b_name'].value;

                        function updatecust(rnum, changed) {

                            var con = confirm("Update the user?");
                            if (con == true) {

                                // alert(rnum);
                                // alert(selectedValue);
                                window.open("assign_s_batches.php?id=" + rnum + "&batch=" + changed, "");
                            }
                        }
                        </script>
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