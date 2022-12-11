<?php include "side.php"; 
include 'db.php';
include 'check_manager.php';

if(!isset($_SESSION))
{
    header("location:login.php"); 
}
?>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>

<script>
$(document).ready(function() {

    //selected value

    $('#b_name').change(function() {

        var batch = $(this).val();

        getBatch(batch);

    })

    $('#s_name').change(function() {

        var s_name = $(this).val();
        getRollno(s_name);

    })



})



function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function getBatch(b_name) {

    // alert(newB);
    // alert(b_name);
    window.batch = b_name;

}

function getRollno(s_name) {

    // alert(newB);
    // alert(s_name);
    window.rollno = s_name;


}
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




                                    <script>
                                    var i = 0;
                                    </script>
                                    <select id="s_name" name="s_name" class="form-control"
                                        placeholder=" select batch name" style="margin-top: 23px;" required>
                                        <option value='' hidden>Select Student Name</option>
                                        <?php 
                                          $query3="SELECT * from student WHERE `status` = 'active'";
                                          $result3 = mysqli_query($con,$query3);
                                                      while($row2 = mysqli_fetch_array($result3)) {   
                                                          echo "<option value='$row2[1]'>$row2[1] $row2[2] $row2[4] $row2[5]</option>";
                                                          ?>


                                        <?php
                                                          

                                                        }     
                                                    
                                          ?>
                                    </select>

                                    <select id="b_name" name="b_name" class="form-control"
                                        placeholder=" select batch name" style="margin-top: 23px;" required>
                                        <option value='' hidden>Select batch name</option>
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


                                    <td>

                                        <button name='ab' onclick="assignBatch()" class="btn btn-outline-primary"
                                            style="width: 90px;">Assign</button>
                                    </td>

                                    </tr>





                                </tbody>
                            </table>

                        </form>

                        <?php

                        ?>
                        <script>
                        function assignBatch() {

                            window.open("assign_s_batches.php?batch=" + window.batch + "&id=" + window.rollno + "");
                            // var con = confirm("Update the user?");
                            // if (con == true) {

                            // // alert(rnum);
                            // // alert(selectedValue);
                            // window.open("assign_s_batches.php?id=" + rnum + "&batch=" + inputValue, "");
                            // window.location("index.php");
                            // console.log("working");
                            // alert(window.rollno);
                            // alert(window.batch);
                            // window.location("assign_s_batches.php?id=" + window.rollno + "&batch=" + window.batch,
                            //     "");
                            // // newfunc(rnum, inputValue);
                        }
                        // }
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