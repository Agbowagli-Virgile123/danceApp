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
        <div class="admin" style="display: flex; margin-top:10px;">
            <div class="instructors">
                <i class="fa fa-user"></i>
                <span>Instructors (0)</span>
            </div>

            <div class="students">
                <i class="fa fa-graduation-cap"></i>
                <span>Students (0)</span>
            </div>

            <div class="enrolled">
                <i class="fa fa-user-plus"></i>
                <span>Enrolled Last Month (0)</span>
            </div>

            <div class="dance_forms">
                <i class="fa fa-film"></i>
                <span>Dance  Forms (0)</span>
            </div>

        </div>
    </div>
</div>

<script>
    $(.nav- <?php echo isset($_GET['page']) ? $_GET['page']: '' ?>).addClass('active')
</script>

<?php include('inc/footer.php'); ?>