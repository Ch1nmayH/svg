<?php
include "side.php";
include 'db.php';
session_start();

$id = $_SESSION["id"];
$email = $_SESSION["uname"];
$type = $_SESSION["user"];


$tdate = $_GET['tdate'];
$fdate = $_GET['fdate'];

if($tdate < $fdate){

    echo "<script> alert('To date cannot be older than from date');
    window.location.href = 'ex_report.php';
    </script>
    ";
}

error_reporting(0);
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


                </div><!-- kt-pagetitle -->

                <div class="kt-pagebody">

                    <div class="card pd-20 pd-sm-40">
                        <h2 class="center"><?php echo $addf; ?></h2>
                        <center><span class="date" style="font-size:21px;color: black;">
                                <?php echo "From:&nbsp;" . $fdate . "&nbsp;TO:&nbsp;" . $tdate; ?></span></center>
                        <div class="right">

                        </div>
                        <?php $datt = date("Y-m-d");
                    ?>
                        <hr>
                        </hr>



                        <?php



                    function getBetweenDates($startDate, $endDate)
                    {
                        $rangArray = [];

                        $startDate = strtotime($startDate);
                        $endDate = strtotime($endDate);

                        for (
                            $currentDate = $startDate;
                            $currentDate <= $endDate;
                            $currentDate += (86400)
                        ) {

                            $date = date('Y-m-d', $currentDate);
                            $rangArray[] = $date;
                        }

                        return $rangArray;
                    }


                    $dates = getBetweenDates($fdate, $tdate);

                    ?>

                        <form action='' method="POST">
                            <select id="exp_type" name="exp_type" class="form-control"
                                style="width: 142px;margin-bottom: 11px;">
                                <option value="all">ALL</option>
                                <option value="income">Income</option>
                                <option value="tincome">Total Income</option>
                                <option value="expense">Expense</option>
                                <option value="texpense">Total Expense</option>

                            </select>
                            <input type="submit" name="submit" class="btn btn-success"
                                style="padding-bottom: -22px;margin-top: -85px;margin-left: 159px;">
                        </form>

                        <table id="datatable1" class="table display responsive nowrap">

                            <?php

                            $exp_type = 'all';

                            if (isset($_POST['exp_type'])) {
                                $exp_type = $_POST['exp_type'];
                            }

                            if ($exp_type == 'all') {



                                foreach ($dates as $value) {
                                    //---------------------------- Admin--------------------------------------------------------

                                    $search = "SELECT * FROM `expens` WHERE  date(`date`)='$value'";

                                    $result = mysqli_query($con, $search);


                                    $rowcount = mysqli_num_rows($result);


                                    //---------------------------- end--------------------------------------------------------

                                    if ($rowcount>0) 
                                    {											
                                    ?>

                            <table id="datatable1" class="table display responsive nowrap">
                                <tr>

                                    <th>Expense type</th>
                                    <th>Expensive Amout</th>
                                    <th>Expensive Description</th>
                                    <th>Date</th>

                                </tr>

                                <?php
                                
                             
                                    
                                    
                                    echo "</br>";
                                    

                                        
								  		while ($row = mysqli_fetch_array($result)) 
								  		{
								  			?>
                                <tr>

                                    <td><?php echo $row[1]; ?></td>

                                    <td><?php echo $row[2]; ?></td>

                                    <td><?php echo $row[3]; ?></td>

                                    <td><?php echo $row[4]; ?></td>

                                </tr>



                                <?php

                                        }
                                    }

                ?>
                            </table>


                            <?php
                                }
                            }





                            if ($exp_type == 'income') {



                                foreach ($dates as $value) {
                                    //---------------------------- Admin--------------------------------------------------------

                                    $search = "SELECT * FROM `expens` WHERE  date(`date`)='$value' and `type` = 'income'";

                                    $result = mysqli_query($con, $search);


                                    $rowcount = mysqli_num_rows($result);


                                    //---------------------------- end--------------------------------------------------------

                                    if ($rowcount>0) 
                                    {											
                                    ?>

                            <table id="datatable1" class="table display responsive nowrap">
                                <tr>

                                    <th>Expense type</th>
                                    <th>Expensive Amout</th>
                                    <th>Expensive Description</th>
                                    <th>Date</th>

                                </tr>

                                <?php
                                
                             
                                    
                                    
                                    echo "</br>";
                                    

                                        
								  		while ($row = mysqli_fetch_array($result)) 
								  		{
								  			?>
                                <tr>

                                    <td><?php echo $row[1]; ?></td>

                                    <td><?php echo $row[2]; ?></td>

                                    <td><?php echo $row[3]; ?></td>

                                    <td><?php echo $row[4]; ?></td>

                                </tr>



                                <?php

                                        }
                                    }

                ?>
                            </table>


                            <?php
                                }
                            }

                            
                            if ($exp_type == 'expense') {



                                foreach ($dates as $value) {
                                    //---------------------------- Admin--------------------------------------------------------

                                    $search = "SELECT * FROM `expens` WHERE  date(`date`)='$value' and `type` = 'expense'";

                                    $result = mysqli_query($con, $search);


                                    $rowcount = mysqli_num_rows($result);


                                    //---------------------------- end--------------------------------------------------------

                                    if ($rowcount>0) 
                                    {											
                                    ?>

                            <table id="datatable1" class="table display responsive nowrap">
                                <tr>

                                    <th>Expense type</th>
                                    <th>Expensive Amout</th>
                                    <th>Expensive Description</th>
                                    <th>Date</th>

                                </tr>

                                <?php
                                
                             
                                    
                                    
                                    echo "</br>";
                                    

                                        
								  		while ($row = mysqli_fetch_array($result)) 
								  		{
								  			?>
                                <tr>

                                    <td><?php echo $row[1]; ?></td>

                                    <td><?php echo $row[2]; ?></td>

                                    <td><?php echo $row[3]; ?></td>

                                    <td><?php echo $row[4]; ?></td>

                                </tr>



                                <?php

                                        }
                                    }

                ?>
                            </table>


                            <?php
                                }
                            }

                            
                            if ($exp_type == 'tincome') {



                                    //---------------------------- Admin--------------------------------------------------------

                                    $search = "SELECT sum(amt) FROM `expens` WHERE `type` = 'income' and date('date') >= $fdate and date('date') <= $tdate";

                                    $result = mysqli_query($con, $search);




                                    //---------------------------- end--------------------------------------------------------

                                   									
                                    ?>

                            <table id="datatable1" class="table display responsive nowrap">
                                <tr align="center">

                                    <th>
                                        <h1>Total Income =
                                            <?php
                                
                             
                                    
                                    
                                

                                    
                                      while ($row = mysqli_fetch_array($result)) 
                                      {
                                          ?>


                                            <?php echo $row[0]; ?>



                                            <?php

                                    }
                                

            ?>

                                        </h1>
                                    </th>


                                </tr>


                            </table>


                            <?php
                                
                            }

                            if ($exp_type == 'texpense') {



                                //---------------------------- Admin--------------------------------------------------------

                                $search = "SELECT sum(amt) FROM `expens` WHERE `type` = 'expense' and date('date') >= $fdate and date('date') <= $tdate";

                                $result = mysqli_query($con, $search);




                                //---------------------------- end--------------------------------------------------------

                                                                   
                                ?>

                            <table id="datatable1" class="table display responsive nowrap">
                                <tr align="center">

                                    <th>
                                        <h1>Total Expense =
                                            <?php
                            
                         
                                
                                
                            

                                
                                  while ($row = mysqli_fetch_array($result)) 
                                  {
                                      ?>


                                            <?php echo $row[0]; ?>



                                            <?php

                                }
                            

        ?>

                                        </h1>
                                    </th>


                                </tr>


                            </table>


                            <?php
                            
                        }
            ?>

    </body>

</html>
<script src="../lib/jquery/jquery.js"></script>
<script src="../lib/popper.js/popper.js"></script>
<script src="../lib/bootstrap/bootstrap.js"></script>
<script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../lib/moment/moment.js"></script>

<script src="../js/katniss.js"></script>

<script>
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
<style type="text/css">
</style>