<?php
session_start();

$id= $_SESSION["id"];
$email=$_SESSION["uname"];
$type=$_SESSION["user"];




if (isset($_POST['btn_rpt'])) 
    {

            $fdate=$_POST['fdate'];
            $tdate=$_POST['tdate'];
            $class=$_POST['class'];
            $year=$_POST['year'];

           


            if(strtotime($fdate) > strtotime($tdate)){

                echo "<script>alert('To date cannot be older than from date');</script>";
                echo"  <script>
                window.location = './report.php';
                  </script>";
            }

            else {

                header("location:pdf_date.php?fdate=$fdate&tdate=$tdate&class=$class&year=$year");

            }

           
        
           
            
            

          
            
     
        
    }

 
   


?>