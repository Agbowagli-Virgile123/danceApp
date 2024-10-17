<?php

include('config/db.php');
session_start();

// $admin_role_id = $_SESSION['admin_role_id'];

if (!isset($_SESSION['student_role_id'])) {
    header('location:login.php');
}

?>

<?php include('inc/header.php'); ?>

<div class="container">
    <div class="col-md-3">
        <?php include('sidebar/studentSidebar.php'); ?>
    </div>
    <div class="col-md-9">
        <h3>DASHBOARD</h3>
        <div class="jumbotron" style="margin-top: 10px; background-color:#f9f9f9; border-radius:unset; padding-right:30px;padding-left:30px; border:1px solid grey">

            <div class="row">
                <div class="col-md-5">
                    <?php

                    $user_id = $_SESSION['student_user_id'];

                    $sql = "SELECT * FROM students WHERE user_id=$user_id";

                    $result = mysqli_query($conn, $sql);

                    $num = mysqli_num_rows($result);

                    if ($num > 0) {

                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <p style="text-align: center;">
                                <img src="uploads/students/<?php echo $row['student_image']; ?>" style="width: 50%; border-radius:50%; border:1px solid white;">
                            </p>

                            <h2 style="text-align: center; text-transform:uppercase; font-size:20px;">
                                <?php echo $_SESSION['username']; ?>
                            </h2>
                        <?php }
                    } else { ?>

                        <p style="text-align: center;">
                            <img src="assets/img/icons8_Male_User_100px.png" style="width: 50%; border-radius:50%; border:1px solid white;">
                        </p>


                        <h2 style="text-align: center; text-transform:uppercase; font-size:20px;">
                            <?php echo $_SESSION['username']; ?>
                        </h2>
                    <?php }

                    ?>

                </div>

                <div class="col-md-7">
                    <ul class="list-group">

                        <?php

                        $user_id = $_SESSION['student_user_id'];

                        $sql = "SELECT * FROM students WHERE user_id=$user_id";

                        $result = mysqli_query($conn, $sql);

                        $num = mysqli_num_rows($result);

                        if ($num > 0) {

                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center"> Age
                                    <span class="badge bg-primary rounded-pill"> <?php echo $row['age']; ?> </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Gender
                                    <span class="badge bg-primary rounded-pill"><?php echo $row['gender']; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php $doj=date('Y/m/d')?>    
                                Date Of Join
                                    <span class="badge bg-primary rounded-pill"><?php echo $doj; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Address
                                    <span class="badge bg-primary rounded-pill"><?php echo $row['address']; ?></span>
                                </li>

                        <?php }
                        }  ?>

                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
<?php include('inc/footer.php'); ?>