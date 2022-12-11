<?php include "side.php"; 
include 'db.php';
include 'check_manager.php';


session_start();

  $id= $_SESSION["id"];
  $email=$_SESSION["uname"];
  $type=$_SESSION["user"];
?>
<style type="text/css">
.card {
    margin-left: 17%;
    color: black;
    padding: 34px;
    border-radius: 17px;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: black;
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
    margin-top: 10%;
    max-width: 80%;
    margin-left: 10%;
    padding: 15px;
}
</style>

<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5> Report </h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

        <div class="card pd-20 pd-sm-40">

            <div class="form-layout">
                <form method="POST" action="ex_btn.php">
                    <div class="wrapper">
                        <div class="panel panel-default sammacmedia">
                            <div class="panel-heading" id="div_select">
                                <center><span class="emp">Income / Expense Report</span></center><br>

                                <label for="fdate">From:</label>
                                <input type="date" class="textfdt" id="fdate" name="fdate" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="tdate">To:</label>
                                <input type="date" class="textfdt" id="tdate" name="tdate" required>


                                <center>
                                    <input type="submit" name="btn_rpt" value="Submit">
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

<style>
span.emp {
    text-align: center;
    font-size: 25px;
    font-weight: 700;
    font-family: inherit;
}

.textfd {
    width: 45%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.textfdt {
    width: 21%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 22%;
    background-color: #007bff;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=button] {
    width: 15%;
    background-color: #007bff;
    color: white;
    padding: 15px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #007bff;
}

.form {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>