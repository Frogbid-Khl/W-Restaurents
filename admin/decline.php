<?php
session_start();
require_once("../includes/dbcontroller.php");
$db_handle = new DBController();
if(isset($_GET['contact_id'])){
    $approve = $db_handle->insertQuery("update contact set approve=0 where id='{$_GET['contact_id']}'");
    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} decline this contact data id:{$_GET['contact_id']}')");
    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Contact-Data';
                </script>";
}

if(isset($_GET['sell_id'])){
    $approve = $db_handle->insertQuery("update billing_details set approve=0 where id='{$_GET['sell_id']}'");

    $package_sell_data = $db_handle->runQuery("SELECT * FROM billing_details where id='{$_GET["sell_id"]}'");

    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} decline this package data id:{$_GET['sell_id']}')");

    $email_to = $package_sell_data[0]["email"];
    $subject = 'Email From Aanandoo Driving School';
    $userName = $package_sell_data[0]["f_name"];
    $l = strtolower($userName);
    $u = ucfirst($l);

    $headers = "From: SK Halal Food <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                            
                            <h3 style='color:black'>Hi $u!</h3>
                                
                            <p style='text-align: center;color:red;font-weight:bold'>Your order has been cancel</p>   
                        
                            <p style='color:black'>Sorry! Currently, we can not complete your order<br>
                                We look forward to speaking with you.<br>
                                Please provide right information of your credit card.<br>
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

    if (mail($email_to, $subject, $messege, $headers)) {
        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Package-Sell-Data';
                </script>";
    }
}