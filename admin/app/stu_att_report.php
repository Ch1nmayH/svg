<?php

include 'db.php';
session_start();


$id= $_SESSION["id"];





if (isset($_POST['btn_rpt'])) 
    {

            $fdate=$_POST['fdate'];
            $tdate=$_POST['tdate'];
            // $year=$_POST['year'];

           
//             // $sql = "SELECT FROM `student` WHERE `rollno` = '$id'";
//             // $result = mysqli_query($con,$sql);


// $search = "SELECT * FROM `student` WHERE `rollno` = '190928'";

// $result = mysqli_query($con, $search);

// $row = mysqli_fetch_array($result);



// $rowcount = mysqli_num_rows($result);
        
            if(strtotime($fdate) > strtotime($tdate)){

                echo "<script>alert('To date cannot be older than from date');</script>";
                echo"  <script>
                window.location = './report.php';
                  </script>";
            }

            else {

                header("location:pdf_date_stu.php?fdate=$fdate&tdate=$tdate&id=$id");

            }

           
        
           
            
            

          
            
     
        
    }

 
   


?>