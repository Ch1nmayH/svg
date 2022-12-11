<?php

if (isset($_POST['btn_rpt'])) 
    {

        echo $fdate=$_POST['fdate'];
        echo $tdate=$_POST['tdate'];
           
        if ($fdate!="" && $tdate!="") 
        {
            
             header("location:pdf_ex_date.php?fdate=$fdate&tdate=$tdate");
        }
        else{
            echo "<script>alert('Please select Valied Data');</script>";
        }
        
    }


?>