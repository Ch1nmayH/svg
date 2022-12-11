<?php 
include 'db.php';
include 'check_manager.php';

 if(isset($_POST["btn_attendance"])) 
        {
            $class=$_POST["class"];
            $year=$_POST["year"];
            $value=$_POST["date"];
          echo $value;
               if($class && $year == "all"){

                $sql_s = "select * from student where `status`='Active'";
                $query_s= mysqli_query($con,$sql_s);
                while($row_s=mysqli_fetch_array($query_s))
                {
                    $attendance='Absent';
                    $stu_sid=$row_s['rollno'];
                    $stu_name= $row_s['sname'];
                    $stu_class = $row_s['class'];
                    $stu_year = $row_s['year'];
                        foreach($_POST['check_list'] as $checked)
                        {
                             "---------";
                            $checked;
                            $all_data=explode('_',$checked);
                            $id=$all_data[0];
                            $date=$all_data[1];
                            echo $date; 
                             $id."-----".$stu_sid;
                            echo "<br>";
                            if($id==$stu_sid && $value==$date)
                            {
                                $attendance='Present';
                            }
                        }
                    $query="SELECT * FROM `attendance` WHERE `sid`='$stu_sid' and `date`='$date'";     
                    $result= mysqli_query($con,$query);
                    $rowcount=mysqli_num_rows($result);
                    if($rowcount==0)
                    {
                        echo  $ins="INSERT INTO `attendance`(`sid`,`sname`, `date`, `status`,`class`,`year`) VALUES ('$stu_sid','$stu_name','$value','$attendance','$stu_class','$stu_year')";
                        
                        $result = mysqli_query($con,$ins);
                    }
                    else{
                        echo '<script>alert("Attendance Already Added");
                          window.location.href = "select_att.php";
                          </script>';
                    }
                    $rowcount=0;
                    
                    
                }
               }

               elseif($class == "all"){

                $sql_s = "select * from student where `status`='Active' and `year`= '$year'";
                $query_s= mysqli_query($con,$sql_s);
                while($row_s=mysqli_fetch_array($query_s))
                {
                    $attendance='Absent';
                    $stu_sid=$row_s['rollno'];
                    $stu_name= $row_s['sname'];
                    $stu_class = $row_s['class'];
                    $stu_year = $row_s['year'];
                        foreach($_POST['check_list'] as $checked)
                        {
                             "---------";
                            $checked;
                            $all_data=explode('_',$checked);
                            $id=$all_data[0];
                            $date=$all_data[1];
                            echo $date; 
                             $id."-----".$stu_sid;
                            echo "<br>";
                            if($id==$stu_sid && $value==$date)
                            {
                                $attendance='Present';
                            }
                        }
                    $query="SELECT * FROM `attendance` WHERE `sid`='$stu_sid' and `date`='$date' and `year`='$year'";     
                    $result= mysqli_query($con,$query);
                    $rowcount=mysqli_num_rows($result);
                    if($rowcount==0)
                    {
                       echo  $ins="INSERT INTO `attendance`(`sid`,`sname`, `date`, `status`,`class`,`year`) VALUES ('$stu_sid','$stu_name','$value','$attendance','$stu_class','$stu_year')";
                        
                        $result = mysqli_query($con,$ins);
                    }
                    else{
                        echo '<script>alert("Attendance Already Added");
                          window.location.href = "select_att.php";
                          </script>';
                    }
                    $rowcount=0;
                    
                    
                }
               }

               elseif($year == "all"){

                $sql_s = "SELECT * from `student` where `status`='active' and `class`= '$class'";
                $query_s= mysqli_query($con,$sql_s);
                while($row_s=mysqli_fetch_array($query_s))
                {
                    $attendance='Absent';
                    $stu_sid=$row_s['rollno'];
                    $stu_name= $row_s['sname'];
                    $stu_class = $row_s['class'];
                    $stu_year = $row_s['year'];
                        foreach($_POST['check_list'] as $checked)
                        {
                             "---------";
                            $checked;
                            $all_data=explode('_',$checked);
                            $id=$all_data[0];
                            $date=$all_data[1];
                            echo $date; 
                             $id."-----".$stu_sid;
                            echo "<br>";
                            if($id==$stu_sid && $value==$date)
                            {
                                $attendance='Present';
                            }
                        }
                    $query="SELECT * FROM `attendance` WHERE `sid`='$stu_sid' and `date`='$date' and $stu_class = '$class'";     
                    $result= mysqli_query($con,$query);
                    $rowcount=mysqli_num_rows($result);
                    if($rowcount>0)
                    {

                        echo '<script>alert("Attendance Already Added");
                        window.location.href = "select_att.php";
                        </script>';
                        
                        
                        
                    }
                    elseif($rowcount<0){
                        echo '<script>alert("Attendance Already Added");
                          window.location.href = "select_att.php";
                          </script>';
                    }
                    // $rowcount=0;

                    else {
                    // echo "this iteration";
                       echo  $ins="INSERT INTO `attendance`(`sid`,`sname`, `date`, `status`,`class`,`year`) VALUES ('$stu_sid','$stu_name','$value','$attendance','$stu_class','$stu_year')";
                    
                       $result = mysqli_query($con,$ins);
                    }
                }
               }

         

               else {

                $sql_s = "select * from student where `status`='Active' and `class`= '$class' and `year`='$year'";
                $query_s= mysqli_query($con,$sql_s);
                while($row_s=mysqli_fetch_array($query_s))
                {
                    $attendance='Absent';
                    $stu_sid=$row_s['rollno'];
                    $stu_name= $row_s['sname'];
                    $stu_class = $row_s['class'];
                    $stu_year = $row_s['year'];
                        foreach($_POST['check_list'] as $checked)
                        {
                             "---------";
                            $checked;
                            $all_data=explode('_',$checked);
                            $id=$all_data[0];
                            $date=$all_data[1];
                            echo $date; 
                             $id."-----".$stu_sid;
                            echo "<br>";
                            if($id==$stu_sid && $value==$date)
                            {
                                $attendance='Present';
                            }
                        }
                    $query="SELECT * FROM `attendance` WHERE `sid`='$stu_sid' and `date`='$date' and `class`='$class' and `year` = '$year'";     
                    $result= mysqli_query($con,$query);
                    $rowcount=mysqli_num_rows($result);
                    if($rowcount==0)
                    {
                       echo  $ins="INSERT INTO `attendance`(`sid`,`sname`, `date`, `status`,`class`,`year`) VALUES ('$stu_sid','$stu_name','$value','$attendance','$class','$year')";
                        
                        $result = mysqli_query($con,$ins);
                    }
                    else{
                        echo '<script>alert("Attendance Already Added");
                          window.location.href = "select_att.php";
                          </script>';
                    }
                    $rowcount=0;
                    
                    
                }
               }
            }
echo '<script>alert("Successfully Inserted");
      window.location.href = "select_att.php";
      </script>';
                                
?>