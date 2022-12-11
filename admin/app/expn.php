<?php include "side.php";
include 'db.php';
include 'check_manager.php';

session_start();
// $branch_id=$_SESSION["branch"];
if (!isset($_SESSION)) {
  
  header("location:login.php");
}

if (isset($_POST['submit'])) 
{
  $amt=$_POST['amt'];
  $des=$_POST['des'];
  $date=$_POST['date'];
  $type = $_POST['s_cls'];
  

  $insert="INSERT INTO `expens`( `type`,`amt`, `des`, `date`) VALUES ('$type','$amt','$des','$date')";
  $result = mysqli_query($con,$insert);
  echo '<script>alert("Successfully Added");
    window.location.href = "expn.php";
    </script>';
}
?>
<style type="text/css">
.card {
    margin-left: 17%;
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
</style>
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5>Add Student</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action=" " method="post">
                    <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                            <center>
                                <h2 class="card-body-title">Add Income / Expense </h2>
                            </center>

                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                    Type</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <select id="s_cls" name="s_cls" class="form-control" placeholder="Enter class Name"
                                        style="margin-top: 23px;">
                                        <!-- <option hidden>Select type</option> -->

                                        <option value='income'>Income</option>
                                        <option value='expense'>Expense</option>

                                    </select>
                                    <!-- <input type="text" type="text" id="s_cls" name="s_dob"  class="form-control" placeholder="Enter class Name" style="margin-top: 23px;"> -->
                                </div>

                            </div>
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Amount
                                </label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="amt" name="amt" class="form-control"
                                        placeholder="Income / Expense Amount" style="margin-top: 23px;" required
                                        pattern="[0-9]+" title="please enter number only">
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span
                                        class="tx-danger">*</span>Description</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <textarea type="text" type="text" id="des" name="des" class="form-control"
                                        placeholder="Description" style="margin-top: 23px;" required></textarea>
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Date </label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="date" type="text" id="date" name="date" class="form-control"
                                        placeholder="Enter Name" style="margin-top: 23px;" required>
                                </div>
                            </div><!-- row -->




                            <br>


                            <div class="row row-xs mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                    <div class="form-layout-footer">
                                        <input type="submit" style="font-size: 15px;font-weight: 700; float: right;"
                                            name="submit" class="btn btn-success" value="Add Income / Expense">
                                        <!-- <button class="btn btn-secondary">Cancel</button> -->
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