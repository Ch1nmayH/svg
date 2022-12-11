<?php include "side.php"; 
include 'db.php';
session_start();
$branch_id=$_SESSION["branch"];
if(!isset($_SESSION))
{
    header("location:login.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">



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
                        <h6 class="card-body-title">Fees Payment Deatails</h6>
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
                        <div class="table-wrapper ">

                            <table id="datatable1" class="table display responsive nowrap ">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Student Roll Number</th>
                                        <th class="wd-15p">Student Name</th>
                                        <th class="wd-10p">Student Class</th>
                                        <th class="wd-25p">year</th>
                                        <th class="wd-25p">email</th>

                                        <th class="wd-25p"></th>
                                        <th class="wd-25p"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
              $cls='0';
                if(isset($_POST['submit']))
                {
                    $cls=$_POST['cls'];
                }
                $sel="SELECT * FROM `student`";
                $result = mysqli_query($con,$sel);
                    $i=1;
                    while($row = mysqli_fetch_array($result)) {

                        $reg_no=$row[1];
                        $name=$row[2];
                        $class=$row[4];
                        $year=$row[5];
                        $email=$row[9];
                       
                        
                    
                        if($cls=="all")
                        {
                             $query="Select * from student where rollno='$reg_no'";
                                 $result1_b = mysqli_query($con,$query);
                                 $rowcount = mysqli_num_rows($result1_b);
                            while($row1 = mysqli_fetch_array($result1_b)) {
                          
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $reg_no; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $class; ?></td>
                                        <td><?php echo $year; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <?php 
                     
                            
                     
                           $i++; 
                            }
                        }
                    }

                        if($cls =="bca")
                        {
                            $query="SELECT * FROM student WHERE `class` = 'bca'";
                            $result1 = mysqli_query($con,$query);

                     
                        while($row2 = mysqli_fetch_array($result1)) {
                           
                          
                            
                                ?>
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row2[1]; ?></td>
                                        <td><?php echo $row2[2]; ?></td>
                                        <td><?php echo $row2[4]; ?></td>
                                        <td><?php echo $row2[5]; ?></td>

                                        <?php 
                              
                               $i++; 
                                
                            
                       }
                        }
                      
                        if($cls =="bba")
                        {
                            $query="SELECT * FROM student WHERE `class` = 'bba'";
                            $result1 = mysqli_query($con,$query);

                     
                        while($row2 = mysqli_fetch_array($result1)) {
                           
                            
                            
                                ?>
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row2[1]; ?></td>
                                        <td><?php echo $row2[2]; ?></td>
                                        <td><?php echo $row2[4]; ?></td>
                                        <td><?php echo $row2[5]; ?></td>

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