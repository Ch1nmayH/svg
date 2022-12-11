<?php
            
            if (isset($_POST['submit'])) 
            {
                $sub=$_POST['subject'];
                $year = $_POST['year'];
                $class=$_POST['class'];
                $fdate=$_POST['fdate'];
                $tdate=$_POST['tdate'];
                header('location: add_attendace.php?fdate='.$fdate.'&class=all&year=all');
            }


        ?>