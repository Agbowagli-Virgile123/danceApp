<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.min.css">

    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery-1.12.4.js"></script>

    <title>Dance Academy</title>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid" style="padding-left: 25px;">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toogle="collapse" data-target="#bs-example-navbar-collapse-1" arial-expanded="false">

                    <span class="icon-bar"></span>
                    <span class=" icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a href="index.php" class="navbar-brand">Amazing Dance Academy</a>
                <ul class="menubar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Our Services</a></li>
                    <li><a href="staff.php">Our Instructors</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <?php $url =  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>

                    <?php if (isset($_SESSION['student_user_id'])) { ?>


                        <li><a href="student_dashboard.php">Stutent</a></li>
                        <li><a href="logout.php">Logout</a></li>



                    <?php } elseif (isset($_SESSION['instructor_user_id'])) { ?>

                        <li><a href="instructor_dashboard.php">Instructor</a></li>
                        <li><a href="logout.php">Logout</a></li>

                    <?php } elseif (isset($_SESSION['admin_user_id'])) { ?>

                        <li><a href="admin_dashboard.php">Admin</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php } elseif (
                        !isset($_SESSION['admin_user_id'])
                        && !isset($_SESSION['instructor_user_id'])
                        && !isset($_SESSION['student_user_id'])
                        && $url == 'localhost/Danse/login.php'
                    ) { ?>


                        <li><a href="register.php">Register</a></li>

                    <?php } elseif (
                        !isset($_SESSION['admin_user_id'])
                        && !isset($_SESSION['instructor_user_id'])
                        && !isset($_SESSION['student_user_id'])
                        && $url == 'localhost/Danse/register.php'
                    ) { ?>

                        <li><a href="login.php">Login</a></li>

                    <?php } elseif (
                        !isset($_SESSION['admin_user_id'])
                        && !isset($_SESSION['instructor_user_id'])
                        && !isset($_SESSION['student_user_id'])
                        && ($url == 'localhost/Danse/index.php' ||$url == 'localhost/Danse/about.php' ||$url == 'localhost/Danse/staff.php' ||$url == 'localhost/Danse/services.php' ||$url == 'localhost/Danse/contact.php')
                    ) { ?>

                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>

                    <?php } ?>
                </ul>


            </div>
        </div>
    </nav>