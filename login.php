<?php

include('config/db.php');

session_start();      

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count > 0) {

        $row = mysqli_fetch_assoc($result);

        if ($row['user_role_id'] == '1') {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['admin_user_id'] = $row['user_id'];
            $_SESSION['admin_role_id'] = $row['user_role_id'];
            header('Location:admin_dashboard.php');
        } elseif ($row['user_role_id'] == '2') {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['instructor_user_id'] = $row['user_id'];
            $_SESSION['instructor_role_id'] = $row['user_role_id'];
            header('Location:instructor_dashboard.php');
        } elseif ($row['user_role_id'] == '3') {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['student_user_id'] = $row['user_id'];
            $_SESSION['student_role_id'] = $row['user_role_id'];
            header('Location:student_dashboard.php');
        } else {
        }
    } else {
        $message[] = "Incorrect email or password";
    }
}


?>


<?php include('inc/header.php') ?>

<div class="container">

    <?php

    if (isset($message)) {
        foreach ($message as $msg) {
            echo '
            <div class="message">
                <span>' . $msg . '</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>';
        }
    }

    ?>

    <div class="row justify-content-between">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="margin: 20px;">
                <div class="panel-heading">
                    <strong>USER LOGIN</strong>
                </div>
                <div class="panel-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" required="" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" required="" placeholder="Password">
                        </div>

                        <input type="submit" value="Login now" name="submit" class="btn success-btn" style="width: 100%;">
                        <p>Don't have an account? <a href="register.php">Register now</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.php') ?>