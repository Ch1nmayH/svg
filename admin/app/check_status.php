<?php 


session_start();

include 'db.php';
$sid = $_SESSION['id'];

$sql = "SELECT * FROM `student` WHERE `rollno` = '$sid'";
$query = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($query)){

    if($row['status'] == 'pending'){

        echo "
        <script>
        alert('Cannot access, Account still in pending status.');
        window.location= '../../index.php';
        </script>
        ";
    }
}

?>