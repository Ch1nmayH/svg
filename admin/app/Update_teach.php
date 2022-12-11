<?php include "side.php"; 
include 'db.php';
include 'check_admin.php';

error_reporting(0);
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
        <center>
            <h3>Update Manager</h3>
        </center>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">
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

        .kt-mainpanel {
            margin-top: 6%;
            max-width: 100%;
            margin-left: 0%;
            padding: 0px;
        }
        </style>

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form action="update_t.php" method="post">
                    <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                            <h6 class="card-body-title">Update Manager</h6>
                            <?php
              $result = mysqli_query($con,"SELECT * FROM `manager` WHERE  `teach_id`='$id'");
                $i=1;
                while($row = mysqli_fetch_array($result)) {
              ?>
                            <input type="hidden" value="<?php echo $row['teach_id']; ?>" id="id" name="id">.

                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>
                                    Name:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="name" name="name"
                                        value="<?php echo $row['t_name']; ?>" onchange="namevalidate(this)"
                                        class="form-control" placeholder="Enter Name" style="margin-top: 23px;">
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Manager
                                    Email</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" type="text" id="v_no" name="email"
                                        value="<?php echo $row['email']; ?>" onchange="srnovalidate(this)"
                                        class="form-control" placeholder="Enter Vehicle number"
                                        style="margin-top: 23px;">
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
        alert("Please Enter the valied Name");
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
        alert("Please Enter the valied Whatsapp Number");
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