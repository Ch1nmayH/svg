<?php include "side.php"; 
include 'db.php';

session_start();

$sid = $_SESSION['id'];
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
                        <h3 class="card-body-title">Batches</h3>
                    </center>

                    <div class="table-wrapper ">


                        <table id="datatable1" class="table display responsive nowrap ">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-15p">Student Id</th>
                                    <th class="wd-15p">Student Name</th>
                                    <th class="wd-10p">Student course</th>
                                    <th class="wd-10p">Student year</th>
                                    <th class="wd-25p">working Batch</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                
            if($_SESSION['user'] == 'A' ||$_SESSION['user'] == 'M' ){
                    $sel="SELECT * FROM `student`";
                
            }

            elseif($_SESSION['user'] == 'S'){
                $sel="SELECT * FROM `student` WHERE `rollno` = '$sid'";
                
            }
                $result = mysqli_query($con,$sel
                );
                    $i=1;
                    while($row = mysqli_fetch_array($result)) {
                   
                ?>
                                <tr>

                                    <td><?php echo $i; ?></td>



                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[2]; ?></td>
                                    <td><?php echo $row[4]; ?></td>
                                    <td><?php echo $row[5]; ?></td>
                                    <td><?php echo $row['batch']; 
                                   
                                   
                                    ?></td>







                                    <?php $i++; 
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


<style type="text/css">
.paginate_button {
    padding: 9px;
    color: black;
}

.dataTables_info {
    padding-bottom: 19px;
}
</style>