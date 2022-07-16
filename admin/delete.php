<?php
session_start();
require_once("../includes/dbcontroller.php");
$db_handle = new DBController();
if (isset($_GET['cat_id'])) {
    $id = $db_handle->checkValue($_GET['cat_id']);

    $product = $db_handle->numRows("select * FROM `tblproduct` WHERE category_id='{$id}'");

    if ($product == 0) {
        $delete = $db_handle->insertQuery("DELETE FROM `category` WHERE id='{$id}'");

        $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} delete category id-'{$id})");

        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Category';
                </script>";
    } else {
        echo 'P';
    }

}

if (isset($_GET['product_id'])) {
    $id = $db_handle->checkValue($_GET['product_id']);

    $product = $db_handle->runQuery("select * FROM `tblproduct` WHERE id='{$id}'");

    unlink('../'.$product[0]["menu_image"]);
    unlink('../'.$product[0]["product_image"]);

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

    $delete = $db_handle->insertQuery("DELETE FROM `tblproduct` WHERE id='{$id}'");

    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} delete product id-'{$id})");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Product';
                </script>";
}
