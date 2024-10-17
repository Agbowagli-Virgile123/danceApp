<?php include('inc/header.php') ?>

<?php

include('config/db.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $conf_password = mysqli_real_escape_string($conn, $_POST['conf_password']);
    $user_role_id = ($_POST['user_role_id']);


    $sql = "SELECT * FROM users WHERE mobile='$mobile'";

    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $message[] = "User already exist!";
    } else {

        if ($password != $conf_password) {
            $message[] = "Confirm password not matched!";
        } else {
            $sql = "INSERT INTO users(username,email,password,mobile,user_role_id) VALUES ('$username','$email',$password,$mobile,$user_role_id)";

            $result = mysqli_query($conn, $sql);

            header('location:login.php');
        }
    }
}

?>

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
            <div class="panel panel-default" style="margin-top: 20px;">
                <div class="panel-heading">
                    <strong>USER REGISTRATION</strong>
                </div>

                <div class="panel-body">
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="" class="form-control" required="" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" required="" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="text" name="mobile" id="" class="form-control" required="" placeholder="Mobile">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" required="" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="conf_password" id="" class="form-control" required="" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <label for="">User Role</label>
                            <select name="user_role_id" id="" class="form-control">
                                <?php

                                $sql = "SELECT user_role_id FROM users WHERE user_role_id='1' ";

                                $result = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($result);

                                if ($count > 0) { ?>
                                    <option value="2">Instructor</option>
                                    <option value="3">Student</option>
                                <?php } else { ?>
                                    <option value="1">Admin</option>
                                    <option value="2">Instructor</option>
                                    <option value="3">Student</option>
                                <?php } ?>

                            </select>
                        </div>

                        <input type="submit" value="Register now" name="submit" class="btn success-btn" style="width: 100%;">
                        <p>Already have an account? <a href="login.php">Login now</a></p>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include('inc/footer.php') ?>