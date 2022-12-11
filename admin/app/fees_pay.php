<?php include "header.php";
include 'db.php';
include "check_status.php";
session_start();
// $branch_id=$_SESSION["branch"];
if (!isset($_SESSION)) {
  
  header("location:login.php");
}
?>
<script>
function submit_form() {

    var s_roll = document.getElementById("s_roll").value;
    var s_name = document.getElementById("s_name").value;
    var cls = document.getElementById("class").value;
    var fees = document.getElementById("fees").value;
    var paid = document.getElementById("paid").value;
    var mode = document.getElementById("mode").value;
    var due = document.getElementById("due").value;
    if (s_roll == "") {
        alert("Please Add Roll Number");
    } else if (s_name == "") {
        alert("Please Enter Student Name");
    } else if (cls == "") {
        alert("Please Select Class");
    } else if (fees == "") {
        alert("Please Add fees");
    } else if (mode == "") {
        alert("Please Select Mode");
    } else if (due == "") {
        alert("Please Add Due Amount");
    } else {
        document.reg_form.action = "fees_add_prs.php";
        document.reg_form.method = "post";
        document.reg_form.submit();

    }


}
</script>
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5>Pay Fees</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form name="reg_form" method="POST">
                    <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                            <h6 class="card-body-title">Pay Fees</h6>

                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Student Roll
                                    Number:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="s_roll" name="s_roll" class="form-control"
                                        placeholder="Enter Roll Number" style="margin-top: 23px;">
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Student
                                    Name</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="s_name" name="s_name" class="form-control"
                                        placeholder="Enter Name" style="margin-top: 23px;">
                                </div>
                            </div><!-- row -->

                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Student
                                    Class</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <select id="class" name="class" class="form-control" onchange="myFunction()">
                                        <option value=''>Select Class</option>
                                        <?php
                    $query="select * from class";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)) {
                      echo"<option value='$row[1]'>$row[1]</option>";
                    }
                  ?>
                                    </select>
                                </div>
                            </div>
                            <script>
                            function myFunction() {

                                var x = document.getElementById("class").value;

                                if (x == 'Lkg') {
                                    document.getElementById("fees").value = 10000;
                                    document.getElementById("fees").readOnly = true;
                                } else {
                                    document.getElementById('fees').value = 15000;
                                    document.getElementById("fees").readOnly = true;
                                }

                            }

                            function duecalculation() {
                                var fees = document.getElementById('fees').value;
                                var paid = document.getElementById('paid').value;
                                var due = fees - paid;
                                document.getElementById('due').value = due;
                                document.getElementById("due").readOnly = true
                            }
                            </script>
                            <div class="row row-xs mg-t-20">
                                <label class="text"><span class="tx-danger">*</span> Fees</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="texts" name="fees" id="fees" class="form-control"
                                        style="margin-left: 68px;">
                                </div>
                            </div>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Fees
                                    Paid</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" name="paid" id="paid" class="form-control"
                                        placeholder="Fees paid" onchange="duecalculation()">
                                </div>
                            </div>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Payment
                                    Mode</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" name="mode" id="mode" value="online" class="form-control"
                                        placeholder="Fees paid" readonly>
                                </div>
                            </div>
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Due</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" name="due" id="due" class="form-control"
                                        placeholder="Due Amount">
                                </div>
                            </div>

                            <div class="row row-xs mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                    <div class="form-layout-footer">
                                        <button type="button" onclick="submit_form()"
                                            class="btn btn-success">Submit</button>


                </form>
            </div><!-- form-layout-footer -->
        </div><!-- col-8 -->
    </div>
</div><!-- card -->
</div><!-- col-6 -->
</div><!-- row -->
</div>

</body>

</html>