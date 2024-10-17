<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['admin_user_id'])) {
    header('location:login.php');
}


if (isset($_POST['danceCategories'])) {
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $tag_name = mysqli_real_escape_string($conn, $_POST['tag_name']);

    $image = $_FILES['category_image']['name'];
    $tmp = $_FILES['category_image']['tmp_name'];
    $size = $_FILES['category_image']['size'];
    $folder = "uploads/categories/$image";

    if (!empty($image)) {
        if ($size > 2000000) { 
            $message[] = 'image file size is too large';
        } else {
            $sql = "INSERT INTO danace_categories(category_name,category_image,tag_name)
            VALUES('$category_name','$image','$tag_name') ";

            $result = mysqli_query($conn, $sql);

            move_uploaded_file($tmp, $folder);

            $message[] = 'Dance category added successfully';
        }
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

    <div class="col-md-3">
        <?php include('sidebar/adminSidebar.php'); ?>
    </div>
    <div class="col-md-5">
    <div class="modal-header">
                <h4 class="modal-title">Add Dance Category</h4>
            </div>
        <div class="modal-body">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="">Category</label>
                        <input type="text" name="category_name" id="" class="form-control" placeholder="Category" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Tag Name</label>
                        <input type="text" name="tag_name" id="tag_name" class="form-control" placeholder="Tag Name" required="">
                    </div>

                    <div class="form-group">
                        <label for="">Upload Image</label>
                        <input type="file" name="category_image" class="form-control" required="" accept="image/*">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='danceCategories.php';return false " value="Escape">Close</button>
                    <input type="submit" name="danceCategories" value="Save" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

</div>


<?php include('inc/footer.php') ?>