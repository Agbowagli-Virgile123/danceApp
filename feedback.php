<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['student_role_id'])) {
    header('location:login.php');
}


if (isset($_POST['submitFeedback'])) {
    $user_id = $_SESSION['student_user_id'];
    $role_id = $_SESSION['student_role_id'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO feedback(feedback,user_id,user_role_id)
    VALUES ('$feedback',$user_id,$role_id)";

    if (mysqli_query($conn, $sql)) {
        header('location:feedback.php');

        $message[] = "Feedback submited successfully.";
    } else {
        header('location:feedback.php');
        $message[] = "Failed to submit feedback.";
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
        <h3>FEEDBACK</h3>
        <form action="feedback.php" method="post">

            <div class="box">
                <div class="row" style="padding: 0px 30px; margin-bottom:10px">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Enter Feedback</label>
                            <textarea name="feedback" id="" class="form-control" placeholder="Feedback" rows="5" cols="40"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding:0px 30px;">
                    <div class="col-md-5">
                        <div class="form-group">

                            <input type="submit" name="submitFeedback" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>


<?php include('inc/footer.php'); ?>