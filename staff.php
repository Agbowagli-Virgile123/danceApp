<?php include('inc/header.php') ?>

<div class="container" style="padding: 0px;">
    <img src="assets/img/img4.jpg" alt="" style="width: 100%; height:60vh">
</div>

<div class="row">
    <h2 style="text-align: center;">STAFF & INSTRUCTORS</h2>
</div>


<div class="row">
    <div class="wrapper">
        <?php

        include('config/db.php');
        $sql = "SELECT * FROM instructors";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>

                <div class="col-md-4" style="margin-top:10px;width:25%">
                    <div class="category-box">
                        <img src="uploads/instructors/<?php echo $row['instructor_image']; ?>" alt="Dance" style="width:50%;margin:0 auto;border-radius:50%;">
                        <div class="category_name" style="background: #922bc0;">
                            <span style="display: block;color:#fff"> <?php echo $row['instructor_name']; ?> </span>
                            <span style="color:#fff">Experience: <?php echo $row['experience']; ?> Years </span>
                        </div>

                    </div>

                </div>


        <?php }
        }
        ?>
    </div>

</div>

<?php include('inc/footer.php') ?>