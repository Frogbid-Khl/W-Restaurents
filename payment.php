<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();

if (isset($_SESSION["cart_item"])&&isset($_POST['cashon_submit'])) {

    $f_name = $db_handle->checkValue($_POST['f_name']);
    $l_name = $db_handle->checkValue($_POST['l_name']);
    $email = $db_handle->checkValue($_POST['email']);
    $phone_number = $db_handle->checkValue($_POST['phone_number']);
    $address = $db_handle->checkValue($_POST['address']);
    $city = $db_handle->checkValue($_POST['city']);
    $zip_code = $db_handle->checkValue($_POST['zip_code']);
    $state = $db_handle->checkValue($_POST['state']);

    $payment_type = 'Cash-On';

    $billing_insert = $db_handle->insertQuery("INSERT INTO `billing_details`(`f_name`, `l_name`, `email`, `phone_number`, `address`, `city`, `zip_code`,`state`,`payment_type`) VALUES
                               ('$f_name','$l_name','$email','$phone_number','$address','$city','$zip_code','$state','$payment_type')");

    $billing_id = $db_handle->runQuery("SELECT * FROM billing_details order by id desc limit 1");

    $id = $billing_id[0]["id"];

    $total_quantity_new = 0;
    $total_price_new = 0;
    foreach ($_SESSION["cart_item"] as $item) {
        $name = $item["name"];
        $item_price = $item["quantity"] * $item["price"];
        $quantity = $item["quantity"];
        $unit_price = $item["price"];

        $billing_id = $db_handle->insertQuery("INSERT INTO `invoice_details`(`billing_id`, `product_name`, `product_quantity`, `product_unit_price`, `product_total_price`) VALUES ('$id','$name','$quantity','$unit_price','$item_price')");
    }
    unset($_SESSION["cart_item"]);


    $email_to = $email;
    $subject = 'Email From SK Halal Food';
    $userName = $f_name;
    $l = strtolower($userName);
    $u = ucfirst($l);

    $headers = "From: SK Halal Food <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi $u!</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>Thank you for purchasing food</p>   
                        
                            <p style='color:black'>Wait For the confirmation.<br>
                                Our team is excited to join you on your journey with us!<br>
                                We look forward to speaking with you.<br>
                                If there are any changes to your contact information or availability, please let us know by<br>
                                Reaching us at <a href='callto:13476491899'>+1-(347)-649-1899</a> or <a href='mailto:skhalalfoodny@gmail.com'>skhalalfoodny@gmail.com</a>
                            </p>
                            
                            <p style='color:black;font-weight:bold'>We look forward to speaking with you!<br>
                                SK Halal Food Team
                             </p> 
                             <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/contact.png' width='100%' height='auto' alt=''>
                             <h3 style='color:black;text-align: center;'>Please follow us on</h3>
                             <p style='text-align: center;'>
                                <a href='#' style='margin-right: 5px;'><img src='" . $_SERVER['SERVER_NAME'] . "/images/social-media/facebook.png' height='auto' alt=''></a>
                                <a href='#' style='margin-right: 5px;'><img src='" . $_SERVER['SERVER_NAME'] . "/images/social-media/instagram.png' height='auto' alt=''></a>
                                <a href='#' style='margin-right: 5px;'><img src='" . $_SERVER['SERVER_NAME'] . "/images/social-media/twitter.png' height='auto' alt=''></a>
                                <a href='#' style='margin-right: 5px;'><img src='" . $_SERVER['SERVER_NAME'] . "/images/social-media/linkedin.png' height='auto' alt=''></a>
                             </p>
                        </div>
                    </body>
                </html>
                ";

    $notify_messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi SK Halal Food</h3>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>You have a new order from $u</p>   
                        </div>
                    </body>
                </html>
                ";

   /* if (mail($email_to, $subject, $messege, $headers) && mail($db_handle->notify_email(), $subject, $notify_messege, $headers)) {

    }*/
    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='/';
                </script>";
}
