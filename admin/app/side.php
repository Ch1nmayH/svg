<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>SVG Hostel </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
        <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
        <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">

    </head>

    <body>

        <!--*******************
        Preloader start
    ********************-->
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
        <!--*******************
        Preloader end
    ********************-->


        <!--**********************************
        Main wrapper start
    ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
            Nav header start
        ***********************************-->
            <div class="nav-header">
                <a href="index.php" class="brand-logo">
                    <h3 style="color: white">SVG Hostel</h3>
                    <!-- 
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt=""> -->
                </a>

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
            <!--**********************************
            Nav header end
        ***********************************-->

            <!--**********************************
            Header start
        ***********************************-->
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">
                                <div class="search_bar dropdown">
                                    <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                        <i class="mdi mdi-magnify"></i>
                                    </span>
                                    <div class="dropdown-menu p-0 m-0">

                                    </div>
                                </div>
                            </div>

                            <ul class="navbar-nav header-right">
                                <!-- <li class="nav-item dropdown notification_dropdown">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <i class="mdi mdi-bell"></i>
                                        <div class="pulse-css"></div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="list-unstyled">
                                            <li class="media dropdown-item">
                                                <span class="success"><i class="ti-user"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                            Successfully
                                                        </p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="primary"><i class="ti-shopping-cart"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="danger"><i class="ti-bookmark"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>Robin</strong> marked a <strong>ticket</strong> as
                                                            unsolved.
                                                        </p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="primary"><i class="ti-heart"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="success"><i class="ti-image"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong> James.</strong> has added a<strong>customer</strong>
                                                            Successfully
                                                        </p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                        </ul>
                                        <a class="all-notification" href="#">See all notifications <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </li> -->
                                <li class="nav-item dropdown header-profile">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <i class="mdi mdi-account"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">


                                        <?php
                      if ($_SESSION["user"] == "S" ) {
                      ?>
                                        <a href="prof.php" class="dropdown-item">
                                            <i class="icon-user"></i>
                                            <span class="ml-2">Profile </span>
                                        </a>
                                        <?php } ?>

                                        <!-- <a href="./email-inbox.html" class="dropdown-item">
                                            <i class="icon-envelope-open"></i>
                                            <span class="ml-2">Inbox </span>
                                        </a> -->
                                        <a href="./logout.php" class="dropdown-item">
                                            <i class="icon-key"></i>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

            <!--**********************************
            Sidebar start
        ***********************************-->
            <div class="quixnav">
                <div class="quixnav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label first" style="color:#affbff;">Main Menu</li>
                        <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                        <li><a class="has-arrow" href="index.php"><i class="icon icon-app-store"></i><span
                                    class="nav-text">Dashboard</span></a>

                        </li>

                        <li><a href="../../index.php"><i class="icon icon-home"></i><span
                                    class="nav-text">Home</span></a>

                        </li>

                        <?php
                      if ($_SESSION["user"] == "S" ) {
                      ?>
                        <li class="nav-item">
                            <a href="prof.php" class="nav-link">
                                <i class="icon icon-single-04"></i>
                                <span>profile</span>
                            </a>
                        </li>
                        <?php } ?>


                        <?php
                      if ($_SESSION["user"] == "A" || $_SESSION["user"] == "M" ) {
                      ?>
                        <li class="nav-item">
                            <a href="crud.php" class="nav-link">
                                <i class="icon icon-single-04"></i>
                                <span class="item">Student Details</span>
                            </a>
                        </li><!-- nav-item -->
                        <?php } ?>


                        <?php
                      if ($_SESSION["user"] == "A" ) {
                      ?>
                        <li class="nav-item">
                            <a href="Add_teacher.php" class="nav-link">
                                <i class="icon icon-single-04"></i>
                                <span>Add Manager</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="add_batches.php" class="nav-link">
                                <i class="icon icon-single-04"></i>
                                <span>Add Batch</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="assign_task.php" class="nav-link">
                                <i class="icon icon-single-04"></i>
                                <span>Assign Task</span>
                            </a>
                        </li>


                        <!-- nav-item -->
                        <?php } ?>

                        <?php
                          if ($_SESSION["user"] == "A" || $_SESSION["user"] == "M" ) {
                          ?>
                        <li class="nav-item">
                            <a href="select_att.php" class="nav-link">
                                <i class="icon icon-chart-bar-33"></i>
                                <span>Add Attendance</span>
                            </a>
                            <?php }
                            
                            if ($_SESSION["user"] == "A") {
                            
                            ?>

                        <li class="nav-item">
                            <a href="expn.php" class="nav-link">
                                <i class="icon icon-chart-bar-33"></i>
                                <span>Add Income / Expense</span>
                            </a>
                        <li class="nav-item">
                            <a href="ex_report.php" class="nav-link">
                                <i class="icon icon-chart-bar-33"></i>
                                <span>Income / Expense Report</span>
                            </a>
                            <?php }
                             if ($_SESSION["user"] == "A" || $_SESSION["user"] == "M" ) {
                                
                            ?>
                        <li class="nav-item">
                            <a href="view_feedback.php" class="nav-link">
                                <i class="ti-bookmark"></i>
                                <span>View Feedback</span>
                            </a>
                        </li>
                        <?php } ?>
                        <!-- nav-item
                          
                          if ($_SESSION["user"] == "A" || $_SESSION["user"] == "M" || $_SESSION["user"] == "S" ) {
                          ?>
                            </li> nav-item -->
                        <li class="nav-item">
                            <a href="report.php" class="nav-link">
                                <i class="ti-bookmark"></i>
                                <span>Attendance Report</span>
                            </a>
                        </li><!-- nav-item -->


                        <?php ?>
                        <?php
                              if ($_SESSION["user"] == "A"|| $_SESSION["user"] == "M" ) {
                              ?>
                        <li class="nav-item">
                            <a href="leave_requset.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Leave Request</span>
                            </a>
                        <li class="nav-item">
                            <a href="outing_acc.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Outing Request</span>
                            </a>
                            <?php }
                            if ($_SESSION["user"] == "A") {
                            ?>
                        <li class="nav-item">
                            <a href="apology_acc.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Apology letter</span>
                            </a>

                        </li>

                        <?php } 
                        
                        ?>
                        <!-- nav-item -->
                        <?php
                              if ($_SESSION["user"] == "A") {
                              ?>
                        <li class="nav-item">
                            <a href="fess_pay_details.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Fees Pay Details</span>
                            </a>

                            <?php }
                            if ($_SESSION["user"] == "A"|| $_SESSION["user"] == "M" ) {
                            ?>
                        <li class="nav-item">
                            <a href="add_remark.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Add Remark</span>
                            </a>
                        <li class="nav-item">
                            <a href="view_remark.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>View Remark</span>
                            </a>


                            <?php
                            }
                              if ($_SESSION["user"] == "A" || $_SESSION["user"] == "M" || $_SESSION["user"] == "S" ) {
                              ?>
                        <li class="nav-item">
                            <a href="add_event.php" class="nav-link">
                                <i class="icon icon-world-2"></i>
                                <span>Event and Details</span>
                            </a>
                        </li><!-- nav-item -->
                        <?php } ?>
                        <?php
                              if ($_SESSION["user"] == "S" ) {
                              ?>
                        <li class="nav-item">
                            <a href="leave.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Leave Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="outing_req.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Outing Request</span>
                            </a>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="apology_req.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Apology</span>
                            </a>
                        </li><!-- nav-item -->


                        <?php
                              }
                              ?>
                        <?php
                              if ($_SESSION["user"] == "S"  ) {
                              ?>
                        <li class="nav-item">
                            <a href="leave_App.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Leave Approval</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="outing_app.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Outing Approval</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_batch.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>View Batches</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_task.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>View tasks</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="onilne_feespay.php" class="nav-link">
                                <i class="icon icon-layout-25"></i>
                                <span>Online fees Payment</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index.php#feedback" class="nav-link">
                                <i class="ti-bookmark"></i>
                                <span>Feedback</span>
                            </a>
                        </li>


                        <?php }?>

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">

                                <i class="icon icon-single-04"></i>
                                <span>Logout</span>
                            </a>
                        </li>





                    </ul>
                </div>
            </div>
            <!--**********************************
            Sidebar end
        ***********************************-->
            <!-- Required vendors -->
            <script src="./vendor/global/global.min.js"></script>
            <script src="./js/quixnav-init.js"></script>
            <script src="./js/custom.min.js"></script>

            <script src="./vendor/chartist/js/chartist.min.js"></script>

            <script src="./vendor/moment/moment.min.js"></script>
            <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


            <script src="./js/dashboard/dashboard-2.js"></script>
            <!-- Circle progress -->