<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['student_role_id'])) {
    header('location:login.php');
}


if (isset($_POST['submitStudentProfile'])) {
    $student_name = $_SESSION['username'];
    $user_id = $_SESSION['student_user_id'];
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $student_role_id = $_SESSION['student_role_id'];


    $image = $_FILES['student_image']['name'];
    $size = $_FILES['student_image']['size'];
    $tmp = $_FILES['student_image']['tmp_name'];
    $folder = "uploads/students/$image";

    $doj = date('Y/m/d');




    if (!empty($image)) {
        if ($size > 2000000) {
            $massage = "Image file size is too large!";
        } else {
            $sql = "INSERT INTO students (user_id,student_name,age,gender,user_role_id,address,student_image,doj)
    VALUES ($user_id,'$student_name',$age,'$gender',$student_role_id, '$address','$image','$doj')";

            mysqli_query($conn, $sql);
            move_uploaded_file($tmp, $folder);

            header('location:student_dashboard.php');
        }
    }
}
?>

<?php include('inc/header.php'); ?>

<div class="container">
    <div class="col-md-3">

        <?php include('sidebar/studentSidebar.php'); ?>

    </div>
    <div class="col-md-9">

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
        <h3>UPLOAD PROFILE</h3>
        <form action="uploadStudentProfile.php" method="post" enctype="multipart/form-data">

            <div class="box">
                <div class="row" style="padding: 0px 30px; margin-bottom:10px">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="text" name="age" id="" class="form-control" placeholder="Age" required>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option>Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding:0px 30px;">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Date Of Joining</label>
                            <input type="text" name="doj" id="datepicker" class="form-control" placeholder="Date Of Join" required>
                        </div>
                    </div>


                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" class="form-control" placeholder="Address" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding:0px 30px;">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Upload Image</label>
                            <input type="file" name="student_image" id="" class="form-control" >
                        </div>
                    </div>
                </div>

                <div class="row" style="padding:0px 30px;">
                    <div class="col-md-5">
                        <div class="form-group">

                            <input type="submit" name="submitStudentProfile" class="btn btn-success" value="Upload Profile">
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>


<?php include('inc/footer.php'); ?>