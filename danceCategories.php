<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['admin_user_id'])) {
    header('location:login.php');
}

if (isset($_POST['hiddenInput'])) {
    $_SESSION['ID'] = $_POST['hiddenInput'];

    echo $_SESSION['ID'];
}
?>

<?php include('inc/header.php') ?>

<div class="container">
    <div class="col-md-3">
        <?php include('sidebar/adminSidebar.php') ?>
    </div>

    <div class="col-md-9">

        <div class="row" style="margin-left: 1px; margin-top:18px;">
            <a href="add.php" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add Category</a>


        </div>

        <section class="hiddenFormContainer">
            <form action="edit.php" method="post" name="hiddenForm" id="hiddenForm">
                <input type="hidden" id="hiddenInput" name="hiddenInput">
            </form>

        </section>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $sql = "SELECT * FROM danace_categories";

                $result = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($result);

                if ($count > 0) {

                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td style="width: 5%; font-size:14px;">
                                <?php echo $row['category_id']; ?>
                            </td>
                            <td style="width: 35%; font-size:14px;">
                                <?php echo $row['category_name']; ?>
                            </td>
                            <td style="width: 10%; font-size:14px;">
                                <?php echo $row['tag_name']; ?>
                            </td>
                            <td style="width: 10%; font-size:14px;" class="image">
                                <img src="uploads/categories/<?php echo $row['category_image']; ?>" alt="Dance" style="width:30%;">

                            </td>

                            <td style="width: 25%;" class="actions">

                                <a href="edit.php?edit_id=<?php echo $row['category_id']; ?>" class="btn-sm btn-primary editCategory" id="editCategory"> <i class="fa fa-edit"></i>Edit </a>

                                <a href="delete.php?delete_id=<?php echo $row['category_id']; ?>" class="btn-sm btn-danger deleteCategory"> <i class="fa fa-trash"></i>Delete </a>

                            </td>
                        </tr>

                    <?php }
                } else { ?>

                    <tr>
                        <td>No category added yet!</td>
                    </tr>

                <?php }
                ?>

            </tbody>

        </table>

    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js">
    $('.deleteCategory').click(function() {
        var id = $($this).attr('data-val');

        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                type: 1,
                id: id,
            },
            cache: false,
            success: function(data) {
                alert(data);
            }
        })

    })
</script> -->

<script src="assets/js/jquery-2.2.4.min.js">
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>

<!-- <script>
    function getCatID(ID1) {
        document.getElementById("hiddenInput").value = ID1;
        document.getElementById("hiddenForm").submit();



    }
</script> -->



<!-- <script type="text/javascript">
    $(document).ready(function() {

        $(".editCategory").click(function() {
            var id = $(this).attr('data-val');


            $.ajax({
                url: "edit.php",
                method: "POST",
                data: {
                    type: 1,
                    id: id,
                },
                cache: false,
                success: function(data) {
                    var jsonData = $.parseJSON(data);
                    $('#category_id').val(jsonData.category_id);
                    $('#category_name').val(jsonData.category_name);
                    $('.tag_name').val(jsonData.tag_name);
                    $('#category_image').append('<img src="updloads/categories/'+jsonData.category_image+'">');

                }
            });



        });

    });
</script> -->




<?php include('inc/footer.php') ?>