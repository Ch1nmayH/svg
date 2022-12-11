<?php include "side.php"; 
include 'db.php';
session_start();
$user = $_SESSION["user"];
if(!isset($_SESSION))
{
    header("location:login.php"); 
}
?>
<script>
function submit_form() {

    var startdate = document.getElementById("sdtae").value;
    var enddate = document.getElementById("edate").value;
    var eventname = document.getElementById("ename").value;
    var description = document.getElementById("edec").value;
    if (startdate == "") {
        alert("Please Select Event Start date");
    } else if (enddate == "") {
        alert("Please Select Event End date");
    } else if (eventname == "") {
        alert("Please Add Event Name");
    } else if (description == "") {
        alert("Please Add description");
    } else {
        document.reg_form.action = "eventaddprs.php";
        document.reg_form.method = "post";
        document.reg_form.submit();

    }


}
</script>
<div class="kt-mainpanel">
    <div class="kt-pagetitle">

    </div><!-- kt-pagetitle -->
    <style type="text/css">
    .card {
        margin-left: 2%;
        color: black;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #09090a;
    }

    .col-xl-6 {
        font-size: 17px;
        font-weight: 700;
        flex: 0 0 50%;
        max-width: 65%;
        padding-left: 0%;
        padding-top: 5%;
    }

    .kt-mainpanel {
        margin-top: 6%;
        max-width: 100%;
        margin-left: 0%;
        padding: 0px;
    }
    </style>

    <div class="kt-breadcrumb">
        <nav class="breadcrumb">
            <!-- <a class="breadcrumb-item" href="index.html">Katniss</a>
    <span class="breadcrumb-item active">Blank</span> -->
        </nav>
    </div>

    <div class="kt-pagebody">

        <div class="content-body">
            <center>
                <h3 style="color: blue;">Events and Details</h3>
            </center>
            <div class="card pd-20 pd-sm-40">

                <?php  if($user == 'A' || $user == 'M'  ){?>
                <div class="form-layout">
                    <form name="reg_form" method="POST">
                        <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                                <center>
                                    <h3>Add Event</h3>
                                </center>

                                <div class="row row-xs">
                                    <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Event
                                        Name:</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" type="text" id="ename" name="ename" class="form-control"
                                            placeholder="Enter Event Name" style="margin-top: 23px;">
                                    </div>
                                </div><!-- row -->
                                <div class="row row-xs">
                                    <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Event
                                        Descrption:</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" type="text" id="edec" name="edec" class="form-control"
                                            placeholder="Enter Descrption " style="margin-top: 23px;">
                                    </div>
                                </div>
                                <div class="row row-xs">
                                    <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Start
                                        Date</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="date" id="sdtae" name="sdate" class="form-control"
                                            placeholder="Start Date Name " style="margin-top: 23px;"
                                            onchange="validatetoday()" required>


                                    </div>
                                </div>

                                <script>
                                function validatetoday() {

                                    var date = document.getElementById("sdtae").value;
                                    var varDate = new Date(date);
                                    var today = new Date();
                                    today.setHours(0, 0, 0, 0);
                                    if (varDate <= today) {
                                        alert("Please Select Valid date");
                                        document.getElementById("sdtae").value = '';
                                    }
                                }
                                </script>
                                <div class="row row-xs">
                                    <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>End
                                        Date</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="date" type="text" id="edate" name="edate" class="form-control"
                                            placeholder="Enter End Date" style="margin-top: 23px;" onchange="compareD()"
                                            required>
                                    </div>
                                </div>

                                <script>
                                function compareD() {

                                    var date = document.getElementById('sdtae').value;
                                    var t = document.getElementById('edate').value;

                                    var varDate = new Date(t);
                                    var today = new Date();
                                    today.setHours(0, 0, 0, 0);
                                    if (varDate <= today) {
                                        alert("Please Select Valid date");
                                        document.getElementById("edate").value = '';
                                    }

                                    if (date > t) {

                                        alert("to date cannot be older than from date");
                                        document.getElementById("edatee").value = '';


                                    }

                                }
                                </script>
                                <br>
                                <button type="button" onclick="submit_form()" class="btn btn-success"
                                    value="Add">Submit</button>

                    </form>

                </div><!-- form-layout-footer -->
                <?php }?>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>Event ID</th>
                                <th>Event Name</th>
                                <th>Event Description</th>
                                <th>Event Start</th>
                                <th>Event End</th>
                                <?php  if($user == 'A' || $user == 'M'  ){?>
                                <th>Action</th>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <?php
                   $sel = "select * from event";
                                            $result = mysqli_query($con, $sel);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                  ?>
                        <tr>
                            <td><?php echo $row[0];?></td>
                            <td><?php echo $row[1];?></td>
                            <td><?php echo $row[4];?></td>
                            <td><?php echo $row[2];?></td>
                            <td><?php echo $row[3];?></td>
                            <?php  if($user == 'A' || $user == 'M'  ){?>
                            <td><button type="button" class="btn btn-danger" style="cursor: pointer; "
                                    onclick="deleteAdmin(<?php echo $row[0]; ?>)">Delete</button> </td>
                            <td><button type="button" class="btn btn-danger" style="cursor: pointer; "
                                    onclick="updatecust(<?php echo $row[0]; ?>)">Edit</button> </td>
                            <?php }?>
                        </tr>
                        <?php 
                
                  }
                  ?>
                    </table>
                </div>
            </div><!-- col-8 -->
        </div>
    </div><!-- card -->
</div><!-- col-6 -->
</div><!-- row -->
</div>
</body>

</html>
<script type="text/javascript">
function deleteAdmin(id) {

    var con = confirm("Are you want to Delete");
    if (con == true) {
        window.open("delete_event.php?id=" + id, "");
    }

}
</script>
<script type="text/javascript">
function updatecust(rnum) {


    var con = confirm("Are you want Update");
    if (con == true) {
        window.open("Update_event.php?id=" + rnum, "");
    }
}
</script>