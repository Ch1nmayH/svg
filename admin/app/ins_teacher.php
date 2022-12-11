<?php
include 'db.php';


$validated = true;
$email_already_exist = false;
$id_already_exist = false;

	$t_name=$_POST['t_name'];
	$t_email=$_POST['t_email'];
	$t_id=$_POST['t_id'];
	$password=$_POST['pass'];


	$sql = "SELECT * FROM `manager`";
    $result3 = mysqli_query($con, $sql);
    while ($row1 = mysqli_fetch_array($result3)) {
        $email = $row1['2'];
        $id = $row1['3'];
        

        if ($t_email == $email) {

            $email_already_exist = true;
        } 

        if ($t_id == $id) {

            $id_already_exist = true;
        } 
    }
    if ($email_already_exist == 'true') {
		// echo "mail working";
        echo '<script> alert("Email address already exists"); 
		window.location.href ="./Add_teacher.php";

		</script>';
		
    //     echo '<script> alert("Email address already exists");
    // window.location.href = "Add_teacher.php";  </script
    // ';
    } elseif ($id_already_exist == 'true') {
		// echo "id working";
        echo '<script> alert("id already exists") 
		window.location.href ="./Add_teacher.php";
		</script>;
';
    //     echo '<script> alert("id already exists") ;
    // window.location.href = "Add_teacher.php";</script
    // ';
    } elseif ($id_already_exist == false && $email_already_exist == false) {
		if($validated){

			$ins="INSERT INTO `manager`(`t_name`, `email`, `teach_id`) VALUES ('$t_name','$t_email','$t_id')";
		   $result=mysqli_query($con,$ins);
	
			$insert_2="INSERT INTO `login`( `username`, `pass`, `type`,`id_f`,`name`) VALUES ('$t_email','$password','M','$t_id','$t_name')";
	 $result_2= mysqli_query($con,$insert_2);
			echo '<script> alert("Successfully Inserted");
		   window.location.href = "./Add_teacher.php";
		   </script>';
	
		}
    } else {


		echo '<script> alert("Something went wrong") 
		window.location.href ="./Add_teacher.php";
		</script>;';
    }