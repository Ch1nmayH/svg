<?php 
include('../includes/dbconnection.php');
session_start();
error_reporting(0);
// if(!isset($_SESSION['cid']))
// { 
//         echo "<script>window.location='index.php';</script>";
// }
$sid=$_GET['sid'];
$id=$_SESSION['cid'];
$invid=intval($_GET['id']);
    $apt_no=$_GET['apt_no'];
if(isset($_POST['submit']))
  {
    $gt=$_POST['gt'];
    $apt_no=$_GET['apt_no'];
    // echo $query="update tblappointment set payment_status='Payment Succesfull' where cid='$id'";
    // mysqli_query($con,$query);
 echo "<script>window.location.href='../payment/index.php?apt_no=$apt_no&gtotal=$gt'</script>"; 
}
?>

<?php  sleep(3);?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>KROP SALONS INVOICE</title>

        <style>
            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

        /*  .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }
*/
            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }

            /** RTL **/
            .invoice-box.rtl {
                direction: rtl;
                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            }

            .invoice-box.rtl table {
                text-align: right;
            }

            .invoice-box.rtl table tr td:nth-child(2) {
                text-align: left;
            }
             .tablestyle{
                  border: 1px solid black;
                  border-collapse: collapse;
                }
                .theader{
                     background-color: #D6EEEE;
                }
                .thstyle{
                    border: 1px solid black;
                }
                .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;


        </style>
    </head>

    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <h1>KROP SALONS</H1>
                                </td>
<?php
    
    $query="SELECT ta.Name,ta.Email,ta.PhoneNumber,ta.gender,oi.userid,ta.services,oi.PostingDate FROM tblappointment ta,onlineinvoice oi where ta.AptNumber=oi.userid and ta.AptNumber=$apt_no GROUP BY ta.AptNumber";
$ret=mysqli_query($con,$query);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) 
{
?>  
 <form method="post">
                                <td>
                                    Invoice No:<?php echo $invid;?><br />
                                    <?php echo $row[6]?>
                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    For any queries contanct<br />
                                    <a href>kropsalons@gmail.com<br /></a>
                                    or visit <a href>www.kropsalons.com</a>
                                </td>

                                <td align="right">
                                    Customer Name : <?php echo $row[0]?><br />
                                    Phone Number : <?php echo $row[2]?><br />
                                    Email : <?php echo $row[1]?>
                                </td>
                            </tr>
                        
                    </td>
                </tr>
                </table>
<table class="tablestyle">
<tr class="theader" align="center">
<th class="thstyle" align="center">Service</th>
<th>Cost</th>
</tr>
<?php 
$query1="SELECT ta.Name,ta.Email,ta.PhoneNumber,ta.gender,oi.userid,ta.services,oi.PostingDate FROM tblappointment ta,onlineinvoice oi where ta.AptNumber=oi.userid and ta.AptNumber=$apt_no";
$ret1=mysqli_query($con,$query1);
while ($row1=mysqli_fetch_array($ret1)) 
{
?>  

                <tr class="thstyle">
                    
                                
                                <td class="thstyle" align="center"><?php echo $row1[5]?></td>
                                
                                
                                <?php 
                                
                                $query2="SELECT cost FROM tblservices where ServiceName='$row1[5]'";
                                $ret2=mysqli_query($con,$query2);
                                while ($row2=mysqli_fetch_array($ret2))
                                {
                                $cost=$row2['cost'];
                                $gt=$gt+$cost;
                                ?>
                                <td align="center"><?php echo $cost?></td>
                                
                                <?php } ?>

                            
                </tr>
                <?php
}
                ?>                     
<?php }?>
                <tr>
                            <td class="thstyle" align="center">
                                    <b>Grand Total</b>
                                </td>
                                
                    <input type='hidden' name='gt' value="<?php echo $gt?>">
                    <td align="center"><b>Rs. <?php echo $gt?></b></td>
                </tr>
    </table>
            <table>
                
    <img src="paid1.png" style="margin-top: -192px;
    margin-left: 208px;
    size: 17px;">
            </table>
            <div align="center" >
                <button class="btn"><i class="fa fa-download"></i> Download</button>
            </div>

<?php
$ret=mysqli_query($con,"select tblservices.ServiceName,tblservices.cost  
    from  tblinvoice 
    join tblservices on tblservices.ID=tblinvoice.ServiceId 
    where tblinvoice.BillingId='$invid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
    ?>

<tr>
<th><?php echo $cnt;?></th>
<td><?php echo $row['ServiceName']?></td>
<td><?php echo $subtotal=$row['cost']?></td>
</tr>

<?php 
$cnt=$cnt+1;
$gtotal+=$subtotal;
} ?>

                
    </body>

</html>
        </form>
<script>

var gtotal=document.getElementById('gtotal').value;
 gtotal1=gtotal*0.2;
 var tt= document.getElementById('gt1').innerHTML= gtotal1;
</script>