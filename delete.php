<?php

include('config/db.php');
session_start();


if (!isset($_SESSION['admin_user_id'])) {
    header('location:login.php');
}

$category_id = $_GET['delete_id'];

$sql = "SELECT category_image FROM danace_categories WHERE category_id='$category_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $category_image = $row['category_image'];

        $img ="uploads/categories/$category_image";
    }

    $sqli = "DELETE FROM dance_categories WHERE category_id = '$category_id'";

    unlink($img);

    if (mysqli_query($conn, $sql)) {
        echo"<script> alert('Category deleted successfully.') </script>";
        // header('location:danceCategories.php');
        
        
    }
}
?>