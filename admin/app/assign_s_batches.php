<?php
 
 include 'db.php';
 include 'check_manager.php';
  $isValid = true;


// $stu_id = $_POST['stuid'];

$batch = $_GET['batch'];
$stu_id = $_GET['id'];

if($batch == "undefined" || $stu_id == "undefined"){

  $isValid = false;
  echo "<script> alert('Invalid input!'); 
  window.location = './add_students_batches.php';
</script>";

}
// echo $batch;
// echo $stu_id;


if($isValid){
$sql = "UPDATE `student` SET `batch` = '$batch' WHERE `rollno` = '$stu_id'";

$result = mysqli_query($con,$sql);

if($result){

   

    echo "<script> alert('successfully added!'); 
    window.location = './add_students_batches.php';
  </script>";

}


else{

    echo "<script> 
    alert('Something went wrong!!'); 
    window.location = './add_students_batches.php';
    </script>";

}
}
?>