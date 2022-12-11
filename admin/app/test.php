<?php
include 'db.php';

// $sql = "select sum(amt) from amts";
// $q = mysqli_query($con,$sql);
// $row = mysqli_fetch_array($q);

// $sql = "select sum(amt) from expens";

// $q = mysqli_query($con,$sql);
// $row = mysqli_fetch_array($q);

// echo 'Sum: ' . $row[0];

$row = get_db_row("SELECT UNIX_TIMESTAMP(send_date) AS send_date_ts
  FROM table WHERE $condition");
$hours = (int) ($row['send_date_ts'] / 3600);
$current_hours = (int) (time() / 3600);
if ($hours == $current_hours) {
  // current hour
}
?>