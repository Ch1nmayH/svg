<?php
 include "side.php"; 
include 'db.php';
session_start();

  $id= $_SESSION["id"];
  $email=$_SESSION["uname"];
  $type=$_SESSION["user"];


	$tdate=$_GET['tdate'];
	error_reporting(0);
?>
<!DOCTYPE html>
<html>

    <head>
        <title></title>
    </head>

    <body>
        <div class="kt-mainpanel">
            <div class="content-body">
                <div class="kt-pagetitle">


                </div><!-- kt-pagetitle -->

                <div class="kt-pagebody">
                    <center>
                        <h1>View Remarks</h1>
                    </center>
                    <div class="card pd-20 pd-sm-40">

                        <div class="right">

                        </div>
                        <?php $datt =date("Y-m-d");
	?>
                        <hr>
                        </hr>


                        <table id="datatable1" class="table display responsive nowrap">
                            <tr>

                                <th>Register number</th>

                                <th>Student Name</th>

                                <th>Remark</th>

                            </tr>

                            <?php
											$ins="select * from remark";
											$result=mysqli_query($con,$ins);
								  		while ($row = mysqli_fetch_array($result)) 
								  		{
								  			?>
                            <tr>

                                <td><?php echo $row['sreg']; ?></td>

                                <td><?php echo $row['sname']; ?></td>

                                <td><?php echo $row['remark']; ?></td>

                            </tr>

                            <?php

						  		
							}
									
							?>
                        </table>



    </body>

</html>
<script src="../lib/jquery/jquery.js"></script>
<script src="../lib/popper.js/popper.js"></script>
<script src="../lib/bootstrap/bootstrap.js"></script>
<script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../lib/moment/moment.js"></script>

<script src="../js/katniss.js"></script>

<script>
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
<style type="text/css">


</style>