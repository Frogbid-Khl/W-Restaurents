<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();

if (isset($_POST['submit_comment'])) {
    $name = $db_handle->checkValue($_POST['name']);

    $rating = $db_handle->checkValue($_POST['rating_num']);

    $product_code = $db_handle->checkValue($_POST['product_code']);

    $phone = $db_handle->checkValue($_POST['phone']);

    $email = $db_handle->checkValue($_POST['email']);

    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $image = '';
        } else {
            move_uploaded_file($file_tmp, "assets/img/comments_image/" . $file_name);
            $image = "assets/img/comments_image/" . $file_name;
        }
    }

    $message = $db_handle->checkValue($_POST['message']);

    $insert = $db_handle->insertQuery("INSERT INTO `comment`(`name`, `image`, `phone_no`, `email`, `message`, `product_code`, `rating`) VALUES ('$name','$image','$phone','$email','$message','$product_code','$rating')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Product-Detail?code=".$product_code."';
                </script>";

}