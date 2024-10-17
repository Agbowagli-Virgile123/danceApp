<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['admin_role_id'])) {
    header('location:login.php');
}

?>

<?php include('inc/header.php'); ?>

<div class="container">
    <div class="col-md-3">

        <?php include('sidebar/adminSidebar.php'); ?>

    </div>
    <div class="col-md-9">
        <h2>INSTRUCTORS</h2>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">Image</th>
                    <th scope="col" style="width: 10%;">Instructor Name</th>
                    <th scope="col" style="width: 10%;">Age</th>
                    <th scope="col" style="width: 10%;">Gender</th>
                    <th scope="col" style="width: 10%;">Experience</th>
                    <th scope="col" style="width: 10%;">Address</th>
                </tr>
            </thead>

            <tbody>
                <?php $sql = "SELECT * FROM instructors";

                $result = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($result);

                if ($count > 0) {

                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td style="width: 10%; font-size:14px;" class="image">
                                <?php
                                if ($row['instructor_image'] == null) { ?>

                                    <p style="text-align: center; border-radius:50%;">

                                        <img src="assets/img/icons8_Male_User_100px.png" alt="Dance" style="width:50%;">
                                    </p>

                                <?php } else { ?>

                                    <p style="text-align: center;">

                                        <img src="uploads/instructors/<?php echo $row['instructor_image']; ?>" alt="Dance" style="width:50%;border-radius:50%">
                                    </p>
                                <?php } ?>
                            </td>

                            <td style="width: 25%; font-size:14px;">
                                <?php echo $row['instructor_name']; ?>
                            </td>
                            <td style="width: 35%; font-size:14px;">
                                <?php echo $row['age']; ?>
                            </td>
                            <td style="width: 10%; font-size:14px;">
                                <?php echo  $row['gender']; ?>
                            </td>
                            <td style="width: 10%; font-size:14px;">
                                <?php echo  $row['experience']; ?>
                            </td>
                            <td style="width: 10%; font-size:14px;">
                                <?php echo  $row['address']; ?>
                            </td>


                            <!-- <td style="width: 25%;" class="actions">

                                <a href="edit.php?edit_id=<?php echo $row['category_id']; ?>" class="btn-sm btn-primary editCategory" id="editCategory"> <i class="fa fa-edit"></i>Edit </a>

                                <a href="delete.php?delete_id=<?php echo $row['category_id']; ?>" class="btn-sm btn-danger deleteCategory"> <i class="fa fa-trash"></i>Delete </a>

                            </td> -->
                        </tr>

                    <?php }
                } else { ?>

                    <tr>
                        <td colspan="50px">No instructors registered yet!</td>
                    </tr>

                <?php }
                ?>

            </tbody>

        </table>
    </div>
</div>


<?php include('inc/footer.php'); ?>