  <?php include "side.php";
include 'db.php';
// include 'check_admin.php';
include 'check_status.php';
// session_start();
$type=$_SESSION['user'];
if (!isset($_SESSION['uname'])) {
  echo "<script>window.location='../../login.php';</script>";
}            
                        $query="SELECT count(*)as number FROM `student`;";     
                    $result = mysqli_query($con, $query);
                      
                       $row= mysqli_fetch_array($result);
                     $number=$row['number'];

                         $query_1="SELECT count(*)as number FROM `manager`;";     
                    $result_1= mysqli_query($con, $query_1);
                      
                    $row_1= mysqli_fetch_array($result_1);
                     $number_1=$row_1['number'];

                         $query_2="SELECT count(*)as number FROM `leave` where status='Pending';";     
                    $result_2 = mysqli_query($con, $query_2);
                      
                       $row_2= mysqli_fetch_array($result_2);
                     $number_2=$row_2['number'];

                         $query_3="SELECT count(*)as number FROM `event`;";     
                    $result_3 = mysqli_query($con, $query_3);
                      
                       $row_3= mysqli_fetch_array($result_3);
                     $number_3=$row_3['number'];     

                         $query_4="SELECT count(*)as number FROM `attendance`;";     
                    $result_4 = mysqli_query($con, $query_4);
                      
                       $row_4= mysqli_fetch_array($result_4);
                     $number_4=$row_4['number'];       

?>

  <div class="kt-breadcrumb">
      <nav class="breadcrumb">
          <!-- <a class="breadcrumb-item" href="index.html">Katniss</a>
    <span class="breadcrumb-item active">Blank</span> -->
      </nav>
  </div>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


  <!-- ##### MAIN PANEL ##### -->
  <div class="content-body">
      <div class="container-fluid">
          <div class="row">
              <div class="stat-text">
                  <h1s> Dashboard</h1>
              </div>

          </div><!-- kt-pagebody -->
          <?php
      if ($_SESSION["user"] == "A" ) {
      ?>


          <div class="row">
              <div class="col-lg-3 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-graduation-cap" style="color:#4f19ed;" aria-hidden="true"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Student</h2>
                              </div>
                              <div class="stat-digit"><?php echo  $number;  ?></div>
                              <a href="crud.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>


              <div class="col-lg-3 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-money" style="color:#4fed19;" aria-hidden="true"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h3>Manager</h3>
                              </div>
                              <div class="stat-digit"><?php echo  $number_1;  ?></div>
                              <a href="Add_manager.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-lg-3 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-users" style="color:#fa1616;;"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h3> Pending Fees </h3>
                              </div>
                              <div class="stat-digit">Fees</div>
                              <a href="fess_pay_details.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">

              <div class="col-lg-3 col-sm-6">

                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-money" aria-hidden="true" style="color:#eced15;;"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h3> Attendance Reports </h3>
                              </div>
                              <div class="stat-digit"><?php echo  $number_4;  ?></div>
                              <a href="report.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-user-plus" aria-hidden="true" style="color:#15eded;;"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h3>Events</h3>
                              </div>

                              <div class="stat-digit"><?php echo  $number_3;?></div>
                              <a href="add_event.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php
    }
      ?>
      <?php
      if ($_SESSION["user"] == "M"  ) {
      ?>
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-graduation-cap" style="color:#4f19ed;" aria-hidden="true"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Student</h2>
                              </div>
                              <div class="stat-digit"><?php echo  $number;  ?></div>
                              <a href="crud.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-users"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Leave History</h2>
                              </div>
                              <div class="stat-digit"><?php echo  $number_2;  ?></div>
                              <a href="leave_App.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-4 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-users"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Leave Approval</h2>
                              </div>
                              <div class="stat-digit"><?php echo  $number_2;  ?></div>
                              <a href="leave_App.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-lg-4 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Attendance Reports</h2>
                              </div>
                              <div class="stat-digit"><?php echo  "1";  ?></div>
                              <a href="leave_App.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-lg-4 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-money" aria-hidden="true"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Events</h2>
                              </div>
                              <div class="stat-digit"><?php echo  $number_3;  ?></div>
                              <a href="leave_App.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php
    }
      ?>
      <?php
      if ($_SESSION["user"] == "S"  ) {
      ?>
      <div class="container">
          <div class="row">


              <div class="col-lg-4 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-money" aria-hidden="true"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Leave request</h2>
                              </div>
                              <div class="stat-digit"><?php echo  $number_2;  ?></div>
                              <a href="leave_App.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>


              </div>
              <div class="col-lg-4 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-user-plus" aria-hidden="true"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Attendance Reprts</h2>
                              </div>
                              <div class="stat-digit"><?php echo  "1";  ?></div>
                              <a href="report.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>



              </div>
              <div class="col-lg-4 col-sm-6">
                  <div class="card">
                      <div class="stat-widget-one card-body">
                          <div class="stat-icon d-inline-block">
                              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                          </div>
                          <div class="stat-content d-inline-block">
                              <div class="stat-text">
                                  <h2>Events</h2>
                              </div>
                              <div class="stat-digit"><?php echo $number_3;  ?></div>
                              <a href="add_event.php" class="card-box-footer">View More <i
                                      class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>


              </div>

          </div>


      </div>
      <?php
    }
      ?>
  </div><!-- kt-mainpanel -->

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

  </body>

  </html>
  <style>
.card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}

.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}

.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}

.card-box .inner {
    padding: 5px 10px 0 10px;
    color: black;
}

.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
    color: black;
}

.card-box p {
    font-size: 15px;
}

.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: #868e96;
}

.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: #868e96;
    background: #e9ecef;
    width: 100%;
    text-decoration: none;
}

.card-box:hover .card-box-footer {
    background: #e9ecef;
}

.bg-blue {
    background-color: #e9ecef;
}

.bg-green {
    background-color: #e9ecef;
}

.bg-orange {
    background-color: #e9ecef;
}

.bg-red {
    background-color: #e9ecef;
}
  </style>