<?php
session_start();

// if (isset($_SESSION['id'])) {

//     echo "<script> alert('You are already Logged in.');
//     location.href = './index.php';
// </script>";
// }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <!-- Title Page-->
        <title>Sign In</title>

        <!-- Icons font CSS-->
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
            rel="stylesheet">

        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css_1/main.css" rel="stylesheet" media="all">
    </head>

    <body>
        <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
            <button class="back-btn"><a href="./index.php">Home</a></button>
            <div class="wrapper wrapper--w790">

                <div class="card card-5">
                    <div class="card-heading">
                        <h2 class="title">Login Form</h2>
                    </div>
                    <div class="card-body">
                        <form action="admin/app/main.php" method="post">

                            <div class="form-row">
                                <div class="name">Username</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="text" name="uname"
                                            Placeholder="Email Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Password</div>
                                <div class="value">
                                    <div class="input-group">
                                        <input class="input--style-5" type="password" name="psw" Placeholder="Password"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn--radius-2 btn--green max-w" type="submit"
                                    name="submit">Login</button>
                            </div>
                        </form>
                        <div>
                            <h6 class="name te-xt pd-10">New user?</h6>
                        </div>

                        <div>
                            <button class="btn btn--radius-2 btn--red te max-w" name="sub"><a
                                    href="register.php">Register</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>
        <script src="js/global.js"></script>

    </body>

</html>