<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['admin_user_id'])) {
    header('location:login.php');
}

$id = $_GET['edit_id'];

$sql = "SELECT * FROM dance_forms
                JOIN danace_categories ON dance_forms.category_id = danace_categories.category_id WHERE dance_id = $id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $dance_name = $row['dance_name'];
    $category_name = $row['category_name'];
    $price = $row['price'];
    $image = $row['dance_image'];
}

if (isset($_POST['updateDance'])) {
    $id = $_GET['edit_id'];
    $dance_name = mysqli_real_escape_string($conn, $_POST['dance_name']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $image = $_FILES['dance_image']['name'];
    $size = $_FILES['dance_image']['size'];
    $tmp = $_FILES['dance_image']['tmp_name'];
    $folder = "uploads/dance/$image";

    if (!empty($image)) {
        if ($size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            $sql = "UPDATE  dance_forms SET dance_name='$dance_name', category_id='$category_id',
            price='$price',
            dance_image='$image'
             WHERE dance_id = $id";

            $result = mysqli_query($conn, $sql);

            move_uploaded_file($tmp, $folder);

            header('location:createDance.php');
            $message[] = 'Dance Form updated successfully';
        }
    }
}


?>

<?php include('inc/header.php') ?>

<div class="container">


    <div class="col-md-3">
        <?php include('sidebar/adminSidebar.php') ?>
    </div>

    <div class="col-md-5">


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

        <div class="modal-header">
            <h4 class="modal-title">Edit Dance Forms</h4>
        </div>
        <div class="modal-body">
            <form action="editDance.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Enter Dance Form</label>
                        <input type="text" name="dance_name" id="" class="form-control" placeholder="Dance Form" required="" value="<?php echo $dance_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Select</option>
                            <!-- <option value="<?php echo $category_name; ?>" selected><?php echo $category_name; ?></option> -->

                            <?php
                            $sql = "SELECT * FROM danace_categories ";
                            $result = mysqli_query($conn, $sql);

                            $num = mysqli_num_rows($result);

                            if ($num > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <option value="<?php echo $row['category_id']; ?>">
                                        <?php echo $row['category_name']; ?>
                                    </option>

                            <?php }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Enter Price</label>
                        <input type="text" name="price" class="form-control" required="" placeholder="Price" value="<?php echo $price; ?>">
                    </div>

                    <div class="form-group">
                        <div id="category_image"><img src="uploads/dance/<?php echo $image; ?>" alt="" style="width:20%;height:"></div>
                        <label for="">Upload Image</label>
                        <input type="file" name="dance_image" class="form-control" required="" accept="image/*">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='createDance.php';return false " value="Escape">Close</button>
                    <input type="submit" name="updateDance" value="Save Change" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

</div>


<?php include('inc/footer.php') ?>