<!DOCTYPE html>
<html>

    <head>
        <title>Student Attendance</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

    <body>
        <form method="POST">
            <table>
                <tr>
                    <th>SR</th>
                    <th>SID</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <?php

			function getBetweenDates($startDate, $endDate)
			{
			    $rangArray = [];

			    $startDate = strtotime($startDate);
			    $endDate = strtotime($endDate);

			    for (
			        $currentDate = $startDate;
			        $currentDate <= $endDate;
			        $currentDate += (86400)
			    ) {

			        $date = date('Y-m-d', $currentDate);
			        $rangArray[] = $date;
			    }

			    return $rangArray;
			}

			$dates = getBetweenDates('2022-06-10','2022-06-15');

			foreach ($dates as $value)
			{
				?>
                    <th><?php echo $value;?></th>
                    <?php
			}
			?>
                </tr>
                <?php
		$count=0;
		include 'db.php';
		$sql = "select * from student where `status`='Active'";
        $query= mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($query))
        {
        	$count=$count+1;
        	echo "<tr>";
        	echo "<td>".$count."</td>";
        	echo "<td>".$row['sid']."</td>";
        	echo "<td>".$row['sname']."</td>";
        	echo "<td>".$row['class']."</td>";
        	foreach ($dates as $value)
			{
					?>

                <?php
				
	        	?>

                <td>
                    <input type="checkbox" name="check_list[]" value="<?php echo $row['id'].'_'.$value;?>"
                        checked='checked'>
                </td>


                <?php
        	}
        	echo "</tr>";
        	
        }
        if(isset($_POST["btn_attendance"])) 
		{
			if(!empty($_POST['check_list']))
			{
				foreach($_POST['check_list'] as $checked) 
				{
					$all_data=explode('_',$checked);
					$id=$all_data[0];
					$date=$all_data[1];
					$ins="INSERT INTO `attendance`(`sid`, `sub_id`, `date`, `status`) VALUES ('$id','102','$date','Present')";
					$result = mysqli_query($con,$ins);
				}
				
			}
			else
			{
				echo "NOt cheked";
			}
		}
		?>
                <tr>

                </tr>
            </table>

            <input type="submit" name="btn_attendance" value="Submit">
        </form>
    </body>

</html>