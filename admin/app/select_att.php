<?php 
include "side.php";
include 'db.php';
session_start();
$temail=$_SESSION["uname"];
if (!isset($_SESSION)) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

    <head>

    </head>

    <body>
        <style type="text/css">
        .card {
            margin-left: 10%;
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
            margin-top: 10%;
            max-width: 80%;
            margin-left: 10%;
            padding: 15px;
        }
        </style>

        <div class="kt-mainpanel">
            <div class="kt-pagetitle">

            </div><!-- kt-pagetitle -->

            <div class="kt-pagebody">

                <div class="card pd-20 pd-sm-40" style="padding: 73Px;">
                    <center>
                        <h3>Add Attendance</h3>
                    </center>
                    <br>
                    <form method="POST" action="sel_date.php">

                        <!-- <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>class:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select name="class" class="form-control">
                                    <option value='all'>All</option>
                                    <option value='bca'>BCA</option>
                                    <option value='bcom'>BCOM</option>
                                    <option value='ba'>BA</option>
                                    <option value='bvoc'>BVOC</option>
                                    <option value='bba'>BBA</option>
                                </select>
                                <br>
                            </div>
                        </div> -->
                        <!-- <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>year:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0"> -->
                        <!-- <select name="year" class="form-control">
                                    <option value='all'>All</option>
                                    <option value='1'>|</option>
                                    <option value='2'>||</option>
                                    <option value='3'>|||</option> -->


                        <?php
               
                            
                 $today= date('Y-m-d');
                ?>
                        <!-- </select><br> -->
                        <!-- row -->
                        <!-- </div>
            </div> -->
                        <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Date:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="fdate" value="<?php echo $today ?>"
                                    readonly><br>
                            </div><br>
                        </div>
                        <input type="submit" class="btn btn-danger" name="submit" value="Submit">



                    </form>
                </div>
    </body>

</html>