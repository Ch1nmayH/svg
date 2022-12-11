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
$sid = $_GET['id'];
// $class = $_GET['class'];
// $year = $_GET['year'];


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
                    <center>
                        <h1>Attendance Report</h1>
                    </center>
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

                    ?>

                        <?php

                 

                        foreach ($dates as $value) {

                                $search = "SELECT * FROM `attendance` WHERE date(`date`)='$value' and `sid` = '$sid'";

                                $result = mysqli_query($con, $search);
                                $rowcount = mysqli_num_rows($result);
                            

                            if ($rowcount > 0) {
                    ?>

                        <table id="datatable1" class="table display responsive nowrap">
                            <tr>
                                <th>Reg Number</th>
                                <th>Name</th>

                                <th>Date</th>
                                <th>Status</th>
                                <th>Class</th>

                            </tr>

                            <?php
                                    echo "<span class='att'>Attendance Date:</span>" . $value . "</br>";



                                    echo "</br>";
                                    echo "<span class='att'>Class:</span>" . $class . "</br>";
                                    echo "<span class='att'>Year:</span>" . $year . "</br>";



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
                                <td><?php echo $row[4]; ?></td>
                                <?php
                                            }
                                            ?>
                                <td><?php echo $row[5]; ?></td>

                            </tr>

                            <?php

                                    }
                                }

                                ?>
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