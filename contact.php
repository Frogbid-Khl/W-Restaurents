<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<head>
    <?php require_once 'includes/css.php'; ?>

    <title>Contact - Food Island</title>
</head>
<body class="header-fixed2">

<div id="loading-overlay">
    <div class="loader"></div>
</div>
<div id="wrapper">
    <div id="page" class="clearfix">
        <div id="top-bar" class="top-bar-inner-page">
            <div class="top-bar-content">
                <p>Welcome to Food Island a Best Quality Restaurant</p>
            </div>
        </div>
        <?php require_once 'includes/header.php'; ?>

        <section class="page-title page-title-inner">
            <div class="overlay-pagetitle"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="page-title-heading">
                        <h2 class="heading">Contact Us</h2>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="Home">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="tf-section contact-us">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-box col-45">
                        <div class="infor-contact border-style2">
                            <h4 class="heading">Contact Us</h4>
                            <div class="text">

                            </div>
                            <div class="widget widget-info flex">
                                <div class="icon icon-afress">
                                    <i class="icon-Food Islandmap"></i>
                                </div>
                                <div class="infor-text">
                                    <h6 class="title">Location</h6>
                                    <p>XXXX, XXXX, XXX</p>
                                    <p>NY 11377, XXXX</p>
                                </div>
                            </div>
                            <div class="widget widget-info flex">
                                <div class="icon icon-mail">
                                    <i class="icon-Food Islandemail"></i>
                                </div>
                                <div class="infor-text">
                                    <h6 class="title">Email Address</h6>
                                    <p>test@gmail.com
                                    </p>
                                </div>
                            </div>
                            <div class="widget widget-info style2 flex">
                                <div class="icon icon-call">
                                    <i class="icon-Food Islandcall"></i>
                                </div>
                                <div class="infor-text">
                                    <h6 class="title">Call Us</h6>
                                    <p>(XXX)-XXX-XXXX</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-55">
                        <div class="form-contact color-bg-style4">
                            <h4 class="heading">Leave a Message</h4>
                            <div class="text">We’re Ready To Help You</div>
                            <form action="contact-us.php" method="post" class="comment-form comment-form-style2 style2">
                                <fieldset class="name">
                                    <input type="text" id="name" placeholder="Full Name" class="tb-my-input" name="name"
                                           tabindex="2" value="" aria-required="true" required="">
                                </fieldset>
                                <fieldset class="email">
                                    <input type="email" id="email" placeholder="Email Address " class="tb-my-input"
                                           name="email" tabindex="2" value="" aria-required="true" required="">
                                </fieldset>
                                <fieldset class="message">
                                    <textarea id="message" name="message" rows="5" placeholder="Write Message"
                                              tabindex="4" aria-required="true" required=""></textarea>
                                </fieldset>
                                <div class="btn-submit flat-button flat-button-style2">
                                    <button id="comment-reply" name="Submit" class="tf-button color-style color-style1"
                                            type="submit">
                                        send message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--<section class="tf-section map">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d755.7250553116002!2d-73.89593017075175!3d40.74222101480095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f7a29b8e95f%3A0x45d09916db3c3711!2sSK%20Halal%20Food.!5e0!3m2!1sen!2sbd!4v1649521427396!5m2!1sen!2sbd" width="1720" height="655" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

        <?php require_once 'includes/footer.php'; ?>

    </div>
</div>
<?php require_once 'includes/js.php'; ?>
</body>
</html>
