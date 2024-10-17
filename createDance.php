<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['admin_user_id'])) {
    header('location:login.php');
}

?>

<?php include('inc/header.php'); ?>

<div class="container">
    <div class="col-md-3">
            <?php include('sidebar/adminSidebar.php'); ?>
    </div>
    
    <div class="col-md-9">

        <div class="row"  style="margin-left:10px;margin-top:18px;">
            <a href="addDance.php" class="btn btn-info" data-toggle="modal" data-target="#addDance">Add Dance Forms</a> 

        </div>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Dance Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $sql = "SELECT * FROM dance_forms
                JOIN danace_categories ON dance_forms.category_id = danace_categories.category_id";

                $result = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($result);

                if ($count > 0) {

                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td style="width: 20%; font-size:14px;">
                                <?php echo $row['dance_name']; ?>
                            </td>
                            <td style="width: 20%; font-size:14px;">
                                <?php echo $row['category_name']; ?>
                            </td>
                            <td style="width: 10%; font-size:14px;">
                                <?php echo $row['price']; ?>
                            </td>
                            <td style="width: 2 0%; font-size:14px;" class="image">
                                <img src="uploads/categories/<?php echo $row['dance_image']; ?>" alt="Dance" style="width:30%;">

                            </td>

                            <td style="width: 25%;" class="actions">

                                <a href="editDance.php?edit_id=<?php echo $row['dance_id']; ?>" class="btn-sm btn-primary editDance" id="editDance"> <i class="fa fa-edit"></i>Edit </a>

                                <a href="deleteDance.php?delete_id=<?php echo $row['dance_id']; ?>" class="btn-sm btn-danger deleteDance"> <i class="fa fa-trash"></i>Delete </a>

                            </td>
                        </tr>

                    <?php }
                } else { ?>

                    <tr>
                        <td>No Dance added yet!</td>
                    </tr>

                <?php }
                ?>

            </tbody>

        </table>


    </div>

</div>

<script src="assets/js/jquery-2.2.4.min.js">
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('.active');
</script>
<?php include('inc/footer.php'); ?>