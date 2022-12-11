<?php
session_start();
include 'config.php';
include '../../db.php';
$s_roll=$_POST['s_roll'];
$s_name=$_POST['s_name'];
$cls=$_POST['class'];
$fees=$_POST['fees'];
$paid=$_POST['paid'];
$mode=$_POST['mode'];
$due=$_POST['due'];
$query="INSERT INTO fees_payment(s_roll, s_name, class, fees,paid,mode,due) VALUES ('$s_roll','$s_name','$cls','$fees','$paid','$mode','$due')";
$con->query($query);

$query1="Update student set fees_status='paid' where rollno='$s_roll'";
$con->query($query1);
?>
<form action="submit.php" method="POST" class="form-group">
    <center>
        <br>
        <br>
        <div class="card">
            <input type="hidden" name="gt" value="<?php $gt ?>">
            <input type="hidden" name="apt" value="<?php $apt ?>">
            <div class="card-header">
                <h2>Please Click On The Below Link</h2>
            </div>

            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $publishableKey?>" data-amount="<?php echo str_replace(",","",$paid)*100?>"
                data-name="Stepping Stone" data-description="Online payment" data-image="" data-currency="inr"
                data-locale="auto">
            </script>

        </div>
    </center>
</form>