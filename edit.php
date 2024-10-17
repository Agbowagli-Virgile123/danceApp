<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['admin_user_id'])) {
    header('location:login.php');
}



$ID = $_GET['edit_id'];

$sql1 = "SELECT * FROM danace_categories WHERE category_id = '$ID'";

$result = mysqli_query($conn, $sql1);

$count = mysqli_num_rows($result);

if ($count > 0) {
    $row = mysqli_fetch_assoc($result);

    $category_id = $row['category_id'];
    $category_name = $row['category_name'];
    $tag_name = $row['tag_name'];
    $category_image = $row['category_image'];
}



$ID = $_GET['edit_id'];
if (isset($_POST['submit'])) {

    //$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    echo $ID;
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

            $sql = "UPDATE danace_categories SET category_name='$category_name' WHERE category_id= $ID";

            mysqli_query($conn, $sql);

            move_uploaded_file($tmp, $folder);

            header('location:danceCategories.php');

            // $message[] = 'Dance category added successfully';
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
        <div class="modal-body">
            <div class="modal-header">
                <h4 class="modal-title">Edit Dance Category</h4>
            </div>
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_name; ?>"> -->
                    <div class="form-group">
                        <label for="">Category</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category" required="" value="<?php echo $category_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tag Name</label>
                        <input type="text" name="tag_name" id="tag_name" class="form-control tag_name" placeholder="Tag Name" required="" value="<?php echo $tag_name; ?>">
                    </div>

                    <div class="form-group">
                        <div id="category_image"><img src="uploads/categories/<?php echo $category_image; ?>" alt="" style="width:20%;height:2%"></div>
                        <label for="">Upload Image</label>
                        <input type="file" name="category_image" class="form-control" required="" accept="image/*" value="<?php echo $category_image; ?>">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='danceCategories.php';return false " value="Escape">Close</button>
                    <input type="submit" name="submit" value="Save Change" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

</div>


<?php include('inc/footer.php') ?>