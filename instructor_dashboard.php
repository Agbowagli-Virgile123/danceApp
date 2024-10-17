<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['instructor_role_id'])) {
    header('location:login.php');
}

?>

<?php include('inc/header.php'); ?>

<div class="container">
    <div class="col-md-3">

        <?php include('sidebar/instructorSidebar.php'); ?>

    </div>
    <div class="col-md-9">
        <h3>DASHBOARD</h3>
        <div class="jumbotron" style="margin-top: 10px; background-color:#f9f9f9; border-radius:unset; padding-right:30px;padding-left:30px; border:1px solid grey">

            <div class="row">
                <div class="col-md-4">

                    <?php
                    $user_id = $_SESSION['instructor_user_id'];

                    $sql = "SELECT * FROM instructors WHERE user_id=$user_id";

                    $result = mysqli_query($conn, $sql);

                    $num = mysqli_num_rows($result);

                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <p style="text-align: center;">
                                <img src="uploads/instructors/<?php echo $row['instructor_image']; ?>" style="width: 50%; border-radius:50%; border:1px solid white;">
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

                <div class="col-md-4">

                    <ul class="list-group">


                        <?php
                        $user_id = $_SESSION['instructor_user_id'];

                        $sql = "SELECT age,gender,experience,address FROM instructors WHERE user_id=$user_id";

                        $result = mysqli_query($conn, $sql);

                        $num = mysqli_num_rows($result);

                        if ($num > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>

                                <li class="list-group-item d-flex justify-content-between align-items-center"> Age
                                    <span class="badge bg-primary rounded-pill"><?php echo $row['age']; ?></span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">Experience
                                    <span class="badge bg-primary rounded-pill"><?php echo $row['experience']; ?> Years </span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">Gender
                                    <span class="badge bg-primary rounded-pill"><?php echo $row['gender']; ?></span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">Date Of Join
                                    <?php $doj = date('Y/m/d'); ?>
                                    <span class="badge bg-primary rounded-pill"><?php echo $doj; ?></span>
                                </li>


                                <li class="list-group-item d-flex justify-content-between align-items-center">Address
                                    <span class="badge bg-primary rounded-pill"><?php echo $row['address']; ?></span>
                                </li>

                            <?php
                            } ?>


                        <?php }

                        ?>

                    </ul>
                </div>

                <div class="col-md-4">
                    <ul class="list-group skill">
                        <form action="instructor_dashboard" method="post">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="display:flex;">
                                <select name="dance_name" id="" class="form-control" style="width: 90%; margin-right:10px;">
                                    <option value="">Select</option>
                                    <option value=""></option>
                                </select>
                                <input type="submit" value="ADD">

                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center" style="display:flex;">

                            </li>


                        </form>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>


<?php include('inc/footer.php'); ?>