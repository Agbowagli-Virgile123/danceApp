<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['student_role_id'])) {
    header('location:login.php');
}
?>


<?php include('inc/header.php'); ?>

<div class="container">
    <div class="row">
        <h1 style="text-align: center;margin:30px;">ENROLL WITH US</h1>
    </div>
    <div class="section">
        <div class="enrollBox">
            <form action="enroll.php" class="form-horizontal" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $username = $_SESSION['username'];
                        $user_id = $_SESSION['student_user_id'];
                        $user_role_id = $_SESSION['student_role_id'];
                        $category_id = $_GET['cat_id'];
                        $dance_id = $_GET['did'];

                        $sql = "SELECT danace_categories.category_name,dance_forms.dance_name,dance_forms.price From danace_categories JOIN dance_forms ON danace_categories.category_id =dance_forms.category_id WHERE danace_categories.category_id=$category_id AND dance_forms.category_id=$dance_id";

                        $result = mysqli_query($conn, $sql);

                        $num = mysqli_num_rows($result);

                        if ($num > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?> 
                                <label for="">Student Name</label>
                                <input type="text" name="student_name" value="<?php echo $username; ?>">
                                
                                <label for="" style="margin-top: 20px;">Category Name</label>
                                <input type="text" name="category_name" value="<?php echo $row['category_name']; ?>" class="form-control">

                        <?php  }
                        }

                        ?>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


<?php include('inc/footer.php'); ?>