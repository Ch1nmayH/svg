    <?php
    session_start();

    if (!isset($_SESSION['id'])) {

        echo "<script> alert('You are not authorized to visit this page'); 
        location.href = '../index.php';</script>";
    } elseif ($_SESSION['role'] != 'admin') {

        echo "<script> alert('You are not authorized to visit this page'); 
        location.href = '../index.php';</script>";
    }

    include('../includes/db_connection.php');
    ?>


    <!doctype html>
    <html lang="en" class="no-js">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <meta name="theme-color" content="#3e454c">
            <title>Managers</title>
            <link rel="stylesheet" href="css/font-awesome.min.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
            <link rel="stylesheet" href="css/bootstrap-social.css">
            <link rel="stylesheet" href="css/bootstrap-select.css">
            <link rel="stylesheet" href="css/fileinput.min.css">
            <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
            <link rel="stylesheet" href="css/style.css">
            <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
            <script type="text/javascript" src="js/validation.min.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

        </head>

        <body>
            <?php include('../includes/header.php'); ?>
            <div class="ts-main-content">
                <?php include('../includes/sidebar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-fluid">

                        <div>
                            <div>
                                <form action="./add_Manager.php" method="post">
                                    <button class="btn btn-sm btn-info" name="create_manager">Add new manager</button>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>



                                    <?php

                                $sql = "SELECT * FROM userdetails WHERE role = 'manager'";
                                if ($result = mysqli_query($con, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                ?>

                                    <tbody>
                                        <form action="./deleteManager.inc.php" method="POST">
                                            <tr>


                                                <input type="hidden" name="id" value="<?php echo $row['id'];  ?>">
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['role'] ?></td>
                                                <td><span
                                                        class="badge badge-warning"><?php echo $row['status'] ?></span>
                                                </td>
                                                <td><button class="btn btn-sm btn-danger" name="delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                        <?php
                                        }
                                    } else {
                                    }
                                }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </body>