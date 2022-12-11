<?php
include "side.php";
include 'db.php';
include 'check_manager.php';
$temail = $_SESSION["uname"];
$tid = $_SESSION["id"];
if (!isset($_SESSION)) {
    header("location:login.php");
}

$query_3 = "SELECT * FROM `manager` WHERE `teach_id`='" . $tid . "'";
$result_3 = mysqli_query($con, $query_3);

$row_2 = mysqli_fetch_array($result_3);
$t_name = $row_2['t_name'];

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

                    <div class="form-layout">
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


                    $fdate = $_GET['fdate'];
                    $class = $_GET['class'];
                    $year = $_GET['year'];
                    //  $s=explode($s_year,$sclass);


                    $dates = getBetweenDates($fdate, $fdate);

                    foreach ($dates as $value) {
                    ?>

                        <?php
                    }
                    ?>
                        <form method="POST" action="att_ins.php">

                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <?php
                                        foreach ($dates as $value) {
                                        ?>
                                            <th> <?php echo $value; ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <?php
                                if ($class=='all' && $year == 'all') {

                                    $sel = "select * from student where `status`='active'";
                                    $result = mysqli_query($con, $sel);
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                        // $class = $row['class'];
                                        // $year = $row['year'];
                                ?>
                                    <tr>
                                        <td><?php echo $row['rollno']; ?></td>
                                        <td><?php echo $row['sname']; ?></td>
                                        <td><?php echo $row['class']; ?></td>
                                        <input type="hidden" value="<?php echo $fdate ?>" name='date'>
                                        <input type="hidden" value="<?php echo $class ?>" name='class'>
                                        <input type="hidden" value="<?php echo $year ?>" name='year'>
                                        <?php
                                            foreach ($dates as $value) {
                                            ?>
                                        <td>
                                            <input type="checkbox" name="check_list[]"
                                                value="<?php echo $row['rollno'] . '_' . $value; ?>" checked='checked'>
                                        </td>



                                        <?php
                                            }
                                            echo "</tr>";
                                        }
                                    }

                                    if ($class == 'all') {

                                        $sel = "select * from student where `status`='Active' and year='$year'";
                                        $result = mysqli_query($con, $sel);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                          
                                            ?>
                                    <tr>
                                        <td><?php echo $row['rollno']; ?></td>
                                        <td><?php echo $row['sname']; ?></td>
                                        <td><?php echo $row['class']; ?></td>
                                        <input type="hidden" value="<?php echo $fdate ?>" name='date'>
                                        <input type="hidden" value="<?php echo $class ?>" name='class'>
                                        <input type="hidden" value="<?php echo $year ?>" name='year'>
                                        <?php
                                            foreach ($dates as $value) {
                                            ?>
                                        <td>
                                            <input type="checkbox" name="check_list[]"
                                                value="<?php echo $row['rollno'] . '_' . $value; ?>" checked='checked'>
                                        </td>



                                        <?php
                                            }
                                            echo "</tr>";
                                        }
                                    }

                                    if ($year == 'all') {

                                        $sel = "select * from student where `status`='Active' and `class`='$class'";
                                        $result = mysqli_query($con, $sel);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {

                                            ?>
                                    <tr>
                                        <td><?php echo $row['rollno']; ?></td>
                                        <td><?php echo $row['sname']; ?></td>
                                        <td><?php echo $row['class']; ?></td>
                                        <input type="hidden" value="<?php echo $fdate ?>" name='date'>
                                        <input type="hidden" value="<?php echo $class ?>" name='class'>
                                        <input type="hidden" value="<?php echo $year ?>" name='year'>
                                        <?php
                                            foreach ($dates as $value) {
                                            ?>
                                        <td>
                                            <input type="checkbox" name="check_list[]"
                                                value="<?php echo $row['rollno'] . '_' . $value; ?>" checked='checked'>
                                        </td>



                                        <?php
                                            }
                                            echo "</tr>";
                                        }
                                    }
                                    $sel = "select * from student where `status`='Active' and class='$class' and year='$year'";
                                    $result = mysqli_query($con, $sel);
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {

                                        ?>
                                    <tr>
                                        <td><?php echo $row['rollno']; ?></td>
                                        <td><?php echo $row['sname']; ?></td>
                                        <td><?php echo $row['class']; ?></td>
                                        <input type="hidden" value="<?php echo $fdate ?>" name='date'>
                                        <input type="hidden" value="<?php echo $class ?>" name='class'>
                                        <input type="hidden" value="<?php echo $year ?>" name='year'>
                                        <?php
                                            foreach ($dates as $value) {
                                            ?>
                                        <td>
                                            <input type="checkbox" name="check_list[]"
                                                value="<?php echo $row['rollno'] . '_' . $value; ?>" checked='checked'>
                                        </td>



                                        <?php
                                            }
                                            echo "</tr>";
                                        } ?>


                                </table>
                            </div>


                            <input type="submit" name="btn_attendance" value="Submit">
                    </div><!-- form-layout-footer -->
                </div><!-- col-8 -->
            </div>
        </div>

        </form>
    </body>

</html>