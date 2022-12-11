<?php
include "side.php";
include 'db.php';
session_start();

$id = $_SESSION["id"];
$email = $_SESSION["uname"];
$type = $_SESSION["user"];


$tdate = $_GET['tdate'];
$fdate = $_GET['fdate'];
$fdate = $_GET['fdate'];
$class = $_GET['class'];
$year = $_GET['year'];


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
                        <center>
                            <h1>Attendance Report</h1>
                        </center>
                        <center><span class="date" style="font-size:21px;color: black;">
                                <?php echo "From:&nbsp;" . $fdate . "&nbsp;TO:&nbsp;" . $tdate; ?></span></center>
                        <div class="right">

                        </div>
                        <?php $datt = date("Y-m-d");
                    ?>
                        <hr>
                        </hr>



                        <?php

                    //month=01&rtype=monthly&rpt=absent&year=2020

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




                    if ($class == 'all' && $year == "all") {

                        foreach ($dates as $value) {





                    ?>

                        <?php
                            //---------------------------- Teacher--------------------------------------------------------
                            if ($_SESSION["user"] == "M" || $_SESSION["user"] == "A") {
                                $search = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' ORDER BY `sid`";

                                $result = mysqli_query($con, $search);
                                $rowcount = mysqli_num_rows($result);
                            }
                            //---------------------------- end--------------------------------------------------------

                            //------------------------------end----------------------------------------------------------

                            //---------------------------- Admin--------------------------------------------------------
                            // if ($_SESSION["user"] == "A") {
                            //     $search = "SELECT * FROM `attendance` WHERE date(`date`)='$value'";

                            //     $result = mysqli_query($con, $search);
                            //     $rowcount = mysqli_num_rows($result);
                            // }
                            //---------------------------- end--------------------------------------------------------

                            if ($rowcount > 0) {
                            ?>

                        <table id="datatable1" class="table display responsive nowrap">
                            <tr>
                                <th>Reg Number</th>
                                <th>Name</th>

                                <th>Date</th>
                                <th>Status</th>
                                <th>Class</th>
                                <th>Year</th>

                            </tr>

                            <?php

                                    $searchp = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' and `status` = 'Present'";
                                    $resultp = mysqli_query($con, $searchp);
                                    $rowcountp = mysqli_num_rows($resultp);

                                    $searcha = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' and `status` = 'Absent'";
                                    $resulta = mysqli_query($con, $searcha);
                                    $rowcounta = mysqli_num_rows($resulta);
                                    echo "<span class='att'>Attendance Date:</span>" . $value . "</br>";
                                    // echo "<span class='att' style='display:inline; color:red;'>Attendance Date:</span>" . $value . "</br>";




                                    echo "</br>";
                                    echo "<span class='att'>Class:</span>" . $class . "</br>";
                                    echo "<span class='att'>Year:</span>" . $year . "</br>";

                                    echo "<center><span style='color:green'>Total Present = $rowcountp </span></center>";
                                    echo "<center><span style='color:red'>Total Absent = $rowcounta</span></center>";

                                    echo "</br>";


                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                            <tr>

                                <td><?php echo $row[1]; ?></td>

                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <?php
                                            if ($row[4] == "Absent") {
                                            ?>
                                <td style='color:red'><?php echo $row[4]; ?></td>
                                <?php
                                            }
                                            if ($row[4] == "Present") {
                                            ?>
                                <td style='color:green'><?php echo $row[4]; ?></td>
                                <?php
                                            }
                                            ?>
                                <td><?php echo $row[5]; ?></td>
                                <td><?php echo $row[6]; ?></td>

                            </tr>

                            <?php

                                    }
                                }

                                ?>
                        </table>

                        <?php
                            }
                        } elseif ($class == 'all' && $year != 'all') {

                            foreach ($dates as $value) {

                                //---------------------------- Teacher--------------------------------------------------------
                                if ($_SESSION["user"] == "M" || $_SESSION["user"] == "A") {
                                    $search = "SELECT * FROM `attendance`  WHERE `year`= '$year' and date(`date`)='$value' ORDER BY `sid`";

                                    $result = mysqli_query($con, $search);
                                    $rowcount = mysqli_num_rows($result);
                                }
                                //---------------------------- end--------------------------------------------------------

                                //------------------------------end----------------------------------------------------------

                                //---------------------------- Admin--------------------------------------------------------
                                // if ($_SESSION["user"] == "A") {
                                //     $search = "SELECT * FROM `attendance` WHERE date(`date`)='$value'";

                                //     $result = mysqli_query($con, $search);
                                //     $rowcount = mysqli_num_rows($result);
                                // }
                                //---------------------------- end--------------------------------------------------------

                                if ($rowcount > 0) {
                                ?>

                        <table id="datatable1" class="table display responsive nowrap">
                            <tr>
                                <th>Reg Number</th>
                                <th>Name</th>

                                <th>Date</th>
                                <th>Status</th>
                                <th>Class</th>
                                <th>Year</th>

                            </tr>

                            <?php
                                        $searchp = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' and `status` = 'Present' and `year`= '$year'";
                                        $resultp = mysqli_query($con, $searchp);
                                        $rowcountp = mysqli_num_rows($resultp);

                                        $searcha = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' and `status` = 'Absent' and `year`= '$year'";
                                        $resulta = mysqli_query($con, $searcha);
                                        $rowcounta = mysqli_num_rows($resulta);
                                        echo "<span class='att'>Attendance Date:</span>" . $value . "</br>";
                                        // echo "<span class='att' style='display:inline; color:red;'>Attendance Date:</span>" . $value . "</br>";




                                        echo "</br>";
                                        echo "<span class='att'>Class:</span>" . $class . "</br>";
                                        echo "<span class='att'>Year:</span>" . $year . "</br>";

                                        echo "<center><span style='color:green'>Total Present = $rowcountp </span></center>";
                                        echo "<center><span style='color:red'>Total Absent = $rowcounta</span></center>";

                                        echo "</br>";



                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                            <tr>

                                <td><?php echo $row[1]; ?></td>

                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <?php
                                                if ($row[4] == "Absent") {
                                                ?>
                                <td style='color:red'><?php echo $row[4]; ?></td>
                                <?php
                                                }
                                                if ($row[4] == "Present") {
                                                ?>
                                <td style="color:green"><?php echo $row[4]; ?></td>
                                <?php
                                                }
                                                ?>
                                <td><?php echo $row[5]; ?></td>
                                <td><?php echo $row[6]; ?></td>

                            </tr>

                            <?php

                                        }
                                    }

                                    ?>
                        </table>

                        <?php
                                }
                            } elseif ($year == 'all' && $class != 'all') {

                                foreach ($dates as $value) {

                                    //---------------------------- Teacher--------------------------------------------------------
                                    if ($_SESSION["user"] == "M" || $_SESSION["user"] == "A") {
                                        $search = "SELECT * FROM `attendance` WHERE `class`= '$class' and date(`date`)='$value' ORDER BY `sid`";

                                        $result = mysqli_query($con, $search);
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    //---------------------------- end--------------------------------------------------------

                                    //------------------------------end----------------------------------------------------------

                                    //---------------------------- Admin--------------------------------------------------------
                                    // if ($_SESSION["user"] == "A") {
                                    //     $search = "SELECT * FROM `attendance` WHERE date(`date`)='$value'";

                                    //     $result = mysqli_query($con, $search);
                                    //     $rowcount = mysqli_num_rows($result);
                                    // }
                                    //---------------------------- end--------------------------------------------------------

                                    if ($rowcount > 0) {
                                    ?>

                        <table id="datatable1" class="table display responsive nowrap">
                            <tr>
                                <th>Reg Number</th>
                                <th>Name</th>

                                <th>Date</th>
                                <th>Status</th>
                                <th>Class</th>
                                <th>Year</th>

                            </tr>

                            <?php
                                            $searchp = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' and `status` = 'Present' and `class`= '$class'";
                                            $resultp = mysqli_query($con, $searchp);
                                            $rowcountp = mysqli_num_rows($resultp);

                                            $searcha = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' and `status` = 'Absent' and `class`= '$class'";
                                            $resulta = mysqli_query($con, $searcha);
                                            $rowcounta = mysqli_num_rows($resulta);
                                            echo "<span class='att'>Attendance Date:</span>" . $value . "</br>";
                                            // echo "<span class='att' style='display:inline; color:red;'>Attendance Date:</span>" . $value . "</br>";




                                            echo "</br>";
                                            echo "<span class='att'>Class:</span>" . $class . "</br>";
                                            echo "<span class='att'>Year:</span>" . $year . "</br>";

                                            echo "<center><span style='color:green'>Total Present = $rowcountp </span></center>";
                                            echo "<center><span style='color:red'>Total Absent = $rowcounta</span></center>";

                                            echo "</br>";


                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                            <tr>

                                <td><?php echo $row[1]; ?></td>

                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <?php
                                                    if ($row[4] == "Absent") {
                                                    ?>
                                <td style='color:red'><?php echo $row[4]; ?></td>
                                <?php
                                                    }
                                                    if ($row[4] == "Present") {
                                                    ?>
                                <td style="color:green"><?php echo $row[4]; ?></td>
                                <?php
                                                    }
                                                    ?>
                                <td><?php echo $row[5]; ?></td>
                                <td><?php echo $row[6]; ?></td>

                            </tr>

                            <?php

                                            }
                                        }

                                        ?>
                        </table>

                        <?php
                                    }
                                } else {

                                    foreach ($dates as $value) {

                                        //---------------------------- Teacher--------------------------------------------------------
                                        if ($_SESSION["user"] == "M" || $_SESSION["user"] == "A") {
                                            $search = "SELECT * FROM `attendance` WHERE `class` = '$class'and `year` = '$year' and date(`date`)='$value' ORDER BY `sid`";

                                            $result = mysqli_query($con, $search);
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        //---------------------------- end--------------------------------------------------------

                                        //------------------------------end----------------------------------------------------------

                                        //---------------------------- Admin--------------------------------------------------------
                                        // if ($_SESSION["user"] == "A") {
                                        //     $search = "SELECT * FROM `attendance` WHERE date(`date`)='$value'";

                                        //     $result = mysqli_query($con, $search);
                                        //     $rowcount = mysqli_num_rows($result);
                                        // }
                                        //---------------------------- end--------------------------------------------------------

                                        if ($rowcount > 0) {
                                        ?>

                        <table id="datatable1" class="table display responsive nowrap">
                            <tr>
                                <th>Reg Number</th>
                                <th>Name</th>

                                <th>Date</th>
                                <th>Status</th>
                                <th>Class</th>
                                <th>Year</th>

                            </tr>

                            <?php
                                                  $searchp = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' and `status` = 'Present' and `class` = '$class' and `year` = '$year'";
                                                  $resultp = mysqli_query($con, $searchp);
                                                  $rowcountp = mysqli_num_rows($resultp);
      
                                                  $searcha = "SELECT * FROM `attendance`  WHERE date(`date`)='$value' and `status` = 'Absent' and `class` = '$class' and `year` = '$year'";
                                                  $resulta = mysqli_query($con, $searcha);
                                                  $rowcounta = mysqli_num_rows($resulta);
                                                  echo "<span class='att'>Attendance Date:</span>" . $value . "</br>";
                                                  // echo "<span class='att' style='display:inline; color:red;'>Attendance Date:</span>" . $value . "</br>";
      
      
      
      
                                                  echo "</br>";
                                                  echo "<span class='att'>Class:</span>" . $class . "</br>";
                                                  echo "<span class='att'>Year:</span>" . $year . "</br>";
      
                                                  echo "<center><span style='color:green'>Total Present = $rowcountp </span></center>";
                                                  echo "<center><span style='color:red'>Total Absent = $rowcounta</span></center>";
      
                                                  echo "</br>";
      


                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                            <tr>

                                <td><?php echo $row[1]; ?></td>

                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <?php
                                                        if ($row[4] == "Absent") {
                                                        ?>
                                <td style='color:red'><?php echo $row[4]; ?></td>
                                <?php
                                                        }
                                                        if ($row[4] == "Present") {
                                                        ?>
                                <td style="color: green;"><?php echo $row[4]; ?></td>
                                <?php
                                                        }
                                                        ?>
                                <td><?php echo $row[5]; ?></td>
                                <td><?php echo $row[6]; ?></td>

                            </tr>

                            <?php

                                                }
                                            }

                                            ?>
                        </table>

                        <?php
                                    }
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