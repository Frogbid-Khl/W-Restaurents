<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();

if (isset($_POST["Submit"])) {

    $email = $db_handle->checkValue($_POST['email']);

    $newsletter_insert = $db_handle->insertQuery("INSERT INTO `newsletter`( `email`) VALUES ('$email')");


    $email_to = $email;
    $subject = 'Email From Food Island';

    $headers = "From: Food Island <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $messege = "<html>
                    <body style='background-color: #eee; font-size: 16px;'>
                        <div style='max-width: 600px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto;'>
                        
                            <img src='" . $_SERVER['SERVER_NAME'] . "/images/email/logo.png' style='max-width: 300px;display: block;margin-left: auto;margin-right: auto;'>
                                
                            <p style='text-align: center;color:green;font-weight:bold'>Thank you for newsletter subscription</p>   
                        
                            <p style='color:black'>Our team is excited to join you on your journey with us!<br>
                                We look forward to speaking with you.<br>
                                If there are any changes to your contact information or availability, please let us know by<br>
                                Reaching us at <a href='callto:13476491899'>+1-(347)-649-1899</a> or <a href='mailto:skhalalfoodny@gmail.com'>skhalalfoodny@gmail.com</a>
                            </p>
                            
                            <p style='color:black;font-weight:bold'>We look forward to speaking with you!<br>
                                Food Island Team
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

    if ( mail($email_to, $subject, $messege, $headers)) {
        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Home';
                </script>";
    }
}
?>
