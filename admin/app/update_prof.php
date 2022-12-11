<?php
include 'db.php';
$validated = true;





  $id=$_POST['idd'];
  $s_name=$_POST['name'];
  $dob=$_POST['dob'];
  $pno=$_POST['pno'];
  $phone=$_POST['phone'];
  $email=$_POST['eid'];
  $password=$_POST['pass'];
  $sid=$_POST['sid'];

  //dob validation

$today = date("Y-m-d");
$diff = date_diff(date_create($dob), date_create($today));
$age = $diff->format('%y');

$sql4 = "SELECT * FROM `student`";
$result4 = mysqli_query($con,$sql4);

while($row4 = mysqli_fetch_array($result4)){

  if($sid != $row4[1]){

    if($row4['9'] == $email) {

      $validated = false;
      echo '<script>alert("Email already Taken");
      window.location.href = "prof.php";
      </script>';
    }

  }

}

if($age<15){
  $validated = false;

  echo '<script>alert("You are too small to register, try changing your dob");
  window.location.href = "prof.php";
  </script>';

  }

if($validated){

  $insert="UPDATE `student` SET `sname`='$s_name',`dob`='$dob',`pno`='$pno',`phone`='$phone',`email`='$email',`password`='$password' WHERE `id`='$id'";
  $result = mysqli_query($con,$insert);
  $ss="UPDATE `login` SET `username`='$email',`pass`='$password',`name`='$s_name' WHERE `id_f`='$sid'";
  $result = mysqli_query($con,$ss);
  echo '<script>alert("Successfully Updated");
   window.location.href = "prof.php";
   </script>';
}


?>