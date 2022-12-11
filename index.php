<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>HOSTEL</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="./css_1/bootstrap.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="./css_1/style.css">
        <!-- Responsive-->
        <link rel="stylesheet" href="./css_1/responsive.css">
        <!-- fevicon -->
        <link rel="icon" href="./images/loading.gif" type="image/gif" />
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="css_1/jquery.mCustomScrollbar.min.css">
        <!-- Tweaks for older IEs-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
            media="screen">
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <!-- body -->

    <body class="main-layout">
        <!-- loader  -->
        <div class="loader_bg">
            <div class="loader"><img src="./images/loading.gif" alt="#" /></div>
        </div>
        <!-- end loader -->
        <!-- header -->
        <header>
            <!-- header inner -->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                        <?php
                                    if (isset($_SESSION['id'])) {

                                        echo "  <li class='nav-item'>
                                                <a class='nav-link' href='#'>Home</a>
                                            </li>
                                            <li class='nav-item'>
                                            <a class='nav-link' href='./admin/app/index.php'>Dashboard</a>
                                        </li>
                                            <li class='nav-item'>
                                            <a class='nav-link' href='./admin/app/add_event.php'>Events</a>
                                        </li>
                                            <li class='nav-item'>
                                            <a class='nav-link' href='#feedback'>Feedback</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='nav-link' href='#about'>About</a>
                                        </li>
                                        </ul>
                                <div class='sign_btn'><a href='logout.php'>Sign Out</a></div>";
                                    }

                                    if (!isset($_SESSION['id'])) {
                                        echo "
                                             <li class='nav-item'>
                                                <a class='nav-link' href='#'>Home</a>
                                            </li>
                                                <li class='nav-item'>
                                                <a class='nav-link' href='#feedback'>Feedback</a>
                                            </li>
                                            <li class='nav-item'>
                                                <a class='nav-link' href='#about'>About</a>
                                            </li>
                                            </ul>
                                    <div class='sign_btn'><a href='login.php'>Sign in</a></div>
                                             ";
                                    }
                                    ?>



                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header inner -->
        <!-- end header -->
        <!-- banner -->
        <section class="banner_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-bg">
                            <div class="padding_lert">
                                <h1>WELCOME TO SVG HOSTEL </h1>
                                <span>LANDING PAGE 2022</span>
                                <p>Siddhavana Gurukula is a unique styled and free hostel for students excelling in
                                    academics and sports. It was established in 1940, and has accomplished 75 years of
                                    effective fostering of selected meritorious students of SDM. With a capacity of
                                    about 250, the fully furnished hostel functions in the ancient Gurukula model.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner -->
        <!-- form_lebal -->

        <!-- end form_lebal -->
        <!-- choose  section -->


        <!-- end choose  section -->
        <!-- our  section -->
        <div class="our">
            <div class="container">
                <div class="row d_flex">
                    <div class="col-md-6">
                        <div class="img_box">
                            <figure><img src="./images/svg1.jpg" alt="#" /></figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="our_box">
                            <div class="titlepage">
                                <h2><span class="text_norlam">
                                        <center>HOSTEL
                                    </span> <br></h2>
                            </div>
                            <p>This hostel functions under the Gandhian concept of learning and the students attend
                                philosophy and Bhagvadgeeta classes every day. Their schedule extends from 5.30 AM to
                                10.30 PM.

                                It has a farm and a dairy managed entirely by the resident students. The diet plan here
                                is very complimentary to maintain good health. The wards enjoy the benefits of a
                                plethora of training initiatives for their overall development of personality.
                                Siddhavana has a long-standing reputation for being the apt place for fostering well
                                disciplined students.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end our  section -->
        <!-- about -->
        <div id="about" class="about">
            <div class="container-fluid">
                <div class="row d_flex">
                    <div class="col-md-6">
                        <div class="about_text">
                            <div class="titlepage">
                                <h2>About Our Hostel</h2>
                                <p>In 1940, with the ambition to revive Gurukula system, which is a landmark of ancient
                                    Indian culture , Kirtishesh Pujya Sri D. Manjaiah Heggade's Dharmasthala7 km from
                                    Sri Siddhavan Gurukula was established in distant Ujire. Apart from the worldly
                                    education required for modern life, it was his wish to arrange spiritual education
                                    in the Gurukula which would encourage moral values ​​and convey the excellence of
                                    our culture and heritage. Inspired by this ideal, he made it a model health
                                    facility. So far, thousands of students have acquired knowledge in this ideal
                                    institution and are currently serving in different fields of society in the country
                                    and abroad. After him, the deacons of Sri Kshetra Dharamsthala, The | D. Ratnavarma
                                    Heggade made the organization run on a more progressive path by providing many
                                    facilities to complement the basic mission-policies of this ideal organization.
                                    Today's President of Sri Siddhavan Gurukula, Reverend Dr. D. Virendra Heggade has
                                    made the institution a milestone in the field of education by providing more
                                    facilities in this institution. Also, the qualified students who are attracted from
                                    outside the state and get admission here are being nurtured by giving a more
                                    extensive form to the Gurukula by providing them with vocational education which is
                                    necessary to move forward independently along with college education. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about_img">
                            <figure><img src="images/svg2.jpg" alt="#" /></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end about -->

        <!--  footer -->
        <footer id="feedback">
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="titlepage">
                                <h2>FEED BACK</h2>
                            </div>
                            <div class="cont">
                                <h3>ABOUT HOSTEL/WEB SITE</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form id="request" class="main_form" action="./admin/app/feedback.inc.php" method="POST">
                                <div class="row">


                                    <div class="col-md-12">

                                        <textarea class="textarea" placeholder="FeedBack" type="text" Message="Name"
                                            name="feedback">Feedback </textarea>

                                    </div>
                                    <div class="col-sm-12">
                                        <button class="send_btn" name="feedbackSend">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Copyright &copy 2022 All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->
        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <script src="js/plugin.js"></script>
        <!-- sidebar -->
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    </body>

</html>