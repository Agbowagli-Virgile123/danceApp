<?php include("inc/header.php") ?>

<div class="container" style="width: 100%;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="assets/img/img5.jpg" alt="" style="height: 80vh;width: 100%;">
                <div class="carousel-caption">
                    <h3 style="font-size: 45px;">WELCOME TO AMAZING DANCE ACADEMY</h3>
                    <p style="font-size: 20px;">A place where your dreams get wings</p>
                </div>
            </div>

            <div class="item">
                <img src="assets/img/img2.jpg" alt="" style="height: 80vh;width: 100%;">
                <div class="carousel-caption">
                    <h3 style="font-size: 45px;">EXCELLENT SUPPORT</h3>
                    <p style="font-size: 20px;">Get guidance from skilled instructors.</p>
                </div>
            </div>

            <div class="item">
                <img src="assets/img/img3.jpg" alt="" style="height: 80vh;width: 100%;">
                <div class="carousel-caption">
                    <h3 style="font-size: 45px;">TALENTED INSTRUCTORS</h3>
                    <p style="font-size: 20px;">Leran from our experienced instructors.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="wrapper">
    <div class="row">
        <h2 style="text-align: center;margin-top:30px;">DANCE CATEGORIES</h2>
    </div>

    <div class="row">
        <div class="logo-slider">
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

                            <?php if ($row['tag_name'] != null) : ?>
                                <div class="trend"> <?php echo $row['tag_name']; ?> </div>
                            <?php else : ?>
                            <?php endif; ?>
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
</div>

<div class="container" style="background: #f7f7f7; margin-top:30px;padding-bottom:30px;">
    <div class="wrapper">
        <div class="row">
            <h2 style="text-align: center;margin-top:30px">POPULAR / TRENDING</h2>
        </div>

        <div class="row">
            <div class="logo-slider">
                <?php

                include('config/db.php');
                $sql = "SELECT dance_forms.dance_id, dance_forms.dance_image,dance_forms.dance_name,danace_categories.category_name 
            FROM dance_forms
            JOIN danace_categories ON danace_categories.category_id=dance_forms.category_id 
            WHERE dance_forms.tag_name='Popular'";

                $result = mysqli_query($conn, $sql);

                $num = mysqli_num_rows($result);

                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>

                        <div class="col-md-4" style="margin-top:10px;width:25%">
                            <div class="category-box">
                                <img src="uploads/dance/<?php echo $row['dance_image']; ?>" alt="Dance" style="width:85%;margin-left:14px;height:30vh">
                                <div class="category_name">
                                    <span> <?php echo $row['dance_name']; ?> </span>
                                </div>
                                <a href="enroll.php?did=<?php echo $row['dance_id'] ?>" class="btn btn-warning" style="background:#922bc0;border-color:#922bc0;">Enroll Now</a>
                            </div>

                        </div>


                <?php }
                }
                ?>
            </div>
        </div>
    </div>

</div>


<div class="wrapper">
    <div class="row">
        <h2 style="text-align: center;margin-top:45px;margin-bottom:15px;">COACHES & INSTRUCTORS</h2>
    </div>

    <div class="row">
        <div class="logo-slider">
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
</div>

<div class="row">
    <h2 style="text-align: center;margin-top:45px;margin-bottom:15px;">STUDENTS FEEDBACK</h2>
</div>

<div class="container">

    <div class="row">
        <div class="logo-slider">
            <?php

            include('config/db.php');
            $sql = "SELECT students.student_id, students.student_name,feedback.feedback,students.student_image
            FROM feedback JOIN students ON students.user_id= feedback.user_id";

            $result = mysqli_query($conn, $sql);

            $num = mysqli_num_rows($result);

            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>

                    <div class="col-md-4" style="margin-top:10px;width:25%">
                        <div class="category-box">
                            <img src="uploads/students/<?php echo $row['student_image']; ?>" alt="Dance" style="width:50%;margin:0 auto;border-radius:50%;">
                            <div class="category_name">
                                <span style="display: block;color:#000;padding:0px 7px"> <?php echo $row['feedback']; ?> </span>
                                <span style="color:#000;font-size:13px !important"><?php echo $row['student_name']; ?></span>
                            </div>

                        </div>

                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</div>

<?php include("inc/footer.php") ?>