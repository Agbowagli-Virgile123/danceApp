<?php include('inc/header.php') ?>

<div class="container" style="padding: 0px;">
    <img src="assets/img/img4.jpg" alt="" style="width: 100%; height:60vh">
</div>

<div class="row">
    <h2 style="text-align: center;">CONTACT US</h2>
</div>

<div class="row justify-content-between" style="background: #f4f4f4;">
    <div class="col-md-4 col-md-offset-4">

        <form action="contact.php" method="post" class="form-horizontal" style="padding-top:30px;">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="" id="" placeholder="Name" style="border-radius: 0px;height:40px;" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="" id="" placeholder="Email" style="border-radius: 0px;height:40px;" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Request</label>
                <textarea  name="" id="" placeholder="Request" style="border-radius:0" rows="8" cols="20" class="form-control"></textarea>
            </div>

            <div class="form-group">
               
                <input type="submit" name="" id="" placeholder="Email" style="width:100%;" value="Submit" class="btn btn-primary">
            </div>

        </form>

    </div>
</div>

<?php include('inc/footer.php') ?>