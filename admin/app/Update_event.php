<?php include "side.php"; 
include 'db.php';
include 'check_manager';
// session_start();
// $branch_id=$_SESSION["branch"];
// if(!isset($_SESSION['uname'])) 
// {
//     echo "<script>window.location='login.php';</script>";
// }



echo $id = $_GET['id'];
?>
<div class="kt-mainpanel">
    <div class="kt-pagetitle">
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action="update_e.php" method="post">
                    <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                            <h6 class="card-body-title">Update event</h6>
                            <?php
              $result = mysqli_query($con,"SELECT * FROM `event` WHERE  `id`='$id'");
                $i=1;
                while($row = mysqli_fetch_array($result)) {
              ?>
                            <input type="hidden" value="<?php echo $row['id']; ?>" id="id" name="id">.

                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Event
                                    Name:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="name" name="name" value="<?php echo $row[1]; ?>"
                                        onchange="namevalidate(this)" class="form-control" placeholder="Enter Name"
                                        style="margin-top: 23px;">
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Event
                                    Descripttion</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="v_no" name="dec" value="<?php echo $row[4]; ?>"
                                        onchange="srnovalidate(this)" class="form-control" placeholder=""
                                        style="margin-top: 23px;">
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs mg-t-20">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Event Start
                                    Date</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="phone" name="sdate" id="w_number" value="<?php echo $row[2]; ?>"
                                        onchange="wnovalidate(this)" class="form-control" placeholder="">
                                </div>


                            </div><!-- row -->
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>End
                                    Date</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="v_no" name="edate" value="<?php echo $row[3]; ?>"
                                        onchange="srnovalidate(this)" class="form-control" placeholder=""
                                        style="margin-top: 23px;">
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>End
                                    Date</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="submit" id="v_no" name="upd" value="update""
                                         class=" form-control" placeholder="" style="margin-top: 23px;">
                                </div>
                            </div><!-- row -->


                            <?php 
            }
            ?>
                            <div class="row row-xs mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                    <div class="form-layout-footer">
                                        <button class="btn btn-default mg-r-5" name="add">Update</button>
                                        <button class="btn btn-secondary">Cancel</button>
                </form>
            </div>
        </div><!-- form-layout-footer -->
    </div><!-- col-8 -->
</div>
</div><!-- card -->
</div><!-- col-6 -->
</div><!-- row -->
</div>
<script>
function namevalidate(inputtxt) {
    var namepat = /^[A-Za-z\s]+$/;
    if ((inputtxt.value.match(namepat))) {
        allvalied = 0;
        return true;
    } else {
        allvalied = 1;
        return false;
    }

}

function wnovalidate(inputtxt) {
    var wnopat = /^\d{10}$/;
    if ((inputtxt.value.match(wnopat))) {
        allvalied = 0;
        return true;
    } else {
        allvalied = 1;
        return false;
    }

}

function convalidate(inputtxt) {
    var phoneno = /^\d{10}$/;
    if ((inputtxt.value.match(phoneno))) {
        allvalied = 0;
        return true;
    } else {
        alert("Please Enter the valied Contact Number");
        allvalied = 1;
        return false;
    }

}
</script>
</body>

</html>