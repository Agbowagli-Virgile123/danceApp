<?php include('inc/header.php') ?>

<div class="container" style="padding: 0px;">
    <img src="assets/img/img3.jpg" alt="" style="width: 100%; height:60vh">
</div>

<div class="row">
    <h2 style="text-align: center;">OUR SERVICES </h2>
</div>



<div class="row">
    <div class="wrapper">
        <?php

        include('config/db.php');
        $sql = "SELECT * FROM danace_categories";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id'];
        ?>

                <div class="col-md-4" style="margin-top:10px;width:25%">
                    <div class="category-box">
                        <img src="uploads/categories/<?php echo $row['category_image']; ?>" alt="Dance" style="width:85%;margin-left:14px;height:30vh">

                        
                        <div class="category_name">
                            <span> <?php echo $row['category_name']; ?> </span>
                        </div>
                        <a href="viewDanceForm.php?id=<?php echo $category_id ?>" class="btn btn-warning" style="background:#922bc0;border-color:#922bc0;">View Dance Forms</a>
                    </div>

                </div>


        <?php }
        }
        ?>
    </div>
</div>


<?php include('inc/footer.php') ?>