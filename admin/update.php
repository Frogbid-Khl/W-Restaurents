<?php
session_start();
require_once("../includes/dbcontroller.php");
$db_handle = new DBController();
if (isset($_POST['pass_update'])) {
    $new_pass = $db_handle->checkValue($_POST['new_pass']);
    $cnfrm_pass = $db_handle->checkValue($_POST['cnfrm_pass']);
    $old_pass = $db_handle->checkValue($_POST['old_pass']);

    if ($new_pass == $cnfrm_pass) {
        $update = $db_handle->insertQuery("update admin_login set password='$new_pass' where id='{$_SESSION['user_id']}' and password='$old_pass'");

        $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} change his password')");


        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Change-Password';
                </script>";
    }
}

if (isset($_POST['category_update'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['name']);
    $status = $db_handle->checkValue($_POST['status']);

    $update = $db_handle->insertQuery("update category set name='$name', status='$status' where id='{$id}'");

    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} update category id-'{$id})");


    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Category';
                </script>";

}

if (isset($_POST['product_update'])) {
    $id = $db_handle->checkValue($_POST['id']);

    $status = $db_handle->checkValue($_POST['status']);

    $name = $db_handle->checkValue($_POST['p_name']);

    $category_id = $db_handle->checkValue($_POST['category_id']);

    $price = $db_handle->checkValue($_POST['price']);

    $update_value='';

    $menu_image = '';
    if (!empty($_FILES['menu_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['menu_image']['name'];
        $file_size = $_FILES['menu_image']['size'];
        $file_tmp = $_FILES['menu_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/img/sk-menu/" . $file_name);
            $menu_image = "assets/img/sk-menu/" . $file_name;
        }

        $product=$db_handle->runQuery("SELECT * FROM `tblproduct` WHERE id='$id'");
        unlink('../'.$product[0]["menu_image"]);

        $update_value.=",`menu_image`='".$menu_image."'";
    }

    $shop_image = '';
    if (!empty($_FILES['shop_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['shop_image']['name'];
        $file_size = $_FILES['shop_image']['size'];
        $file_tmp = $_FILES['shop_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/img/sk-shop/" . $file_name);
            $shop_image = "assets/img/sk-shop/" . $file_name;
        }

        $product=$db_handle->runQuery("SELECT * FROM `tblproduct` WHERE id='$id'");
        unlink('../'.$product[0]["product_image"]);

        $update_value.=",`product_image`='".$shop_image."'";
    }


    $error = array();
    $extension = array("jpeg", "jpg", "png", "gif");
    if (!empty($_FILES['extended_image']['name'])) {
        foreach ($_FILES["extended_image"]["tmp_name"] as $key => $tmp_name) {
            $RandomAccountNumber = mt_rand(1, 99999);
            $file_name = $RandomAccountNumber . "_" . $_FILES['extended_image']['name'][$key];
            $file_size = $_FILES['extended_image']['size'][$key];
            $file_tmp = $_FILES['extended_image']['tmp_name'][$key];

            $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            if (
                $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
                && $file_type != "gif"
            ) {
                $attach_files = '';
            } else {
                move_uploaded_file($file_tmp, "../assets/img/sk-shop-extended/" . $file_name);
                $error[] = "assets/img/sk-shop-extended/" . $file_name;
            }
        }
        if(!empty($error)){
            $product=$db_handle->runQuery("SELECT * FROM `tblproduct` WHERE id='$id'");

            $sb = explode(',', $product[0]["extended_image"]);
            $k = 1;
            foreach ($sb as $bb) {
                if ($bb == '') {
                    echo '';
                } else {
                    unlink('../'.$bb);
                }
                $k++;
            }

            $extended_image = implode(',', $error);
            $update_value.=",`extended_image`='".$extended_image."'";
        }
    }





    $update = $db_handle->insertQuery("UPDATE `tblproduct` SET `category_id`='$category_id',`p_name`='$name',`price`='$price'".$update_value.",`status`='$status' WHERE `id`='$id'");

    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} update product id-'{$id})");


    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Product';
                </script>";

}



