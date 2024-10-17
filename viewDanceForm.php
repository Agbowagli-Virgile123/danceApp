<?php include('inc/header.php') ?>

<div class="container" style="padding: 0px;">
    <img src="assets/img/img4.jpg" alt="" style="width: 100%; height:60vh">
</div>

<div class="row">
    <?php include('config/db.php');

    $id = $_GET['id'];

    $sql = "SELECT category_name FROM danace_categories WHERE category_id= $id";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>

            <h2 style="text-align: center; margin-top:30px;text-transform:uppercase;"> <?php echo $row['category_name']; ?> </h2>


    <?php    }
    }

    ?>

    <div class="row" style="padding:  15px; width:960px; margin: 0 auto">

        <?php

        $id = $_GET['id'];

        $sql = "SELECT * FROM dance_forms  WHERE category_id= $id";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4" style="margin-top: 10px;" >
                    <div class="category-box">
                        <img src="uploads/dance/<?php echo $row['dance_image'] ?>" alt="Dance" style="margin-left: 14px; width:85%;height:30vh">

                        <div class="category_name">
                            <span> <?php echo $row['dance_name'];  ?> </span>
                        </div>
                        <a href="enroll.php?cat_id=<?php echo $row['category_id']; ?> &did=<?php echo $row['dance_id']; ?>"
                         class=" btn btn-warning" style="background:#922bc0;border-color:#922bc0;">Enroll Now</a>
                    </div>

                </div>


        <?php    }
        }

        ?>


    </div>
</div>
<?php include('inc/footer.php') ?>