<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<head>
    <?php require_once 'includes/css.php'; ?>

    <title>Reservation - Food Island</title>
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
                        <h2 class="heading">Reservation</h2>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="Home">Home</a></li>
                            <li>Reservation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="tf-section wrap-reservation">
            <div class="container-fluid cleafix">
                <div class="row">
                    <div class="col-md-12 cleafix">
                        <div class="content-heading-wrap">
                            <div class="tf-heading-bg color-style1 cleafix">
                                <h2 class="heading-bg-style02 style3">Reservation</h2>
                            </div>
                            <div class="tf-heading text-center">
                                <h4 class="tf-title tf-title-style2 wow zoomIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1200ms">Reserve your favorite table</h4>
                                <p class="tf-sub-heading">Best foods for you & family</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-30">
                        <div class="image-reservation padding-top134">
                            <img src="assets/img/banner/img1Reservation.jpg" alt="images">
                        </div>
                    </div>
                    <div class="col-box col-40">
                        <div class="wrap-form-reservation wow fadeInUp animated" data-wow-delay="0.3ms"
                             data-wow-duration="1300ms">
                            <div class="form-reservation">
                                <div class="overlay"></div>
                                <form action=""
                                      method="post" id="commentform" class="comment-form" novalidate="novalidate">
                                    <fieldset class="name">
                                        <input type="text" id="name" placeholder="Your Full Name" class="tb-my-input"
                                               name="name" tabindex="1" value="" aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="select">
                                        <select name="persons" id="persons" required>
                                            <option value="">Number Of Persons</option>
                                            <option value="Persons 01">02</option>
                                            <option value="Persons 01">04 Persons</option>
                                            <option value="Persons 01">05 Persons</option>
                                            <option value="Persons 01">10 Persons</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="select">
                                        <select name="date-booking" id="date-booking" required>
                                            <option value="">Choose Date</option>
                                            <option value="Persons 01">28//07/2021</option>
                                            <option value="Persons 01">02//8/2021</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="select">
                                        <select name="time-booking" id="time-booking" required>
                                            <option value="">Select Time</option>
                                            <option value="Persons 01">15h-17h</option>
                                            <option value="Persons 01">16h30-17h30</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="select">
                                        <select name="Occasion-booking" id="Occasion-booking" required>
                                            <option value="">Occasion</option>
                                            <option value="Persons 01">Occasion 01</option>
                                            <option value="Persons 01">Occasion 02</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="select">
                                        <select name="Requirement-booking" id="Requirement-booking" required>
                                            <option value="">Special Requirement</option>
                                            <option value="Persons 01">Change Tables</option>
                                            <option value="Persons 01">Reschedule</option>
                                            <option value="Persons 01">Cancel Table</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="email-wrap">
                                        <input type="email" id="email" placeholder="Your Email Address"
                                               class="tb-my-input" name="email" tabindex="1" value=""
                                               aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="phone-wrap">
                                        <input type="number" id="phone" placeholder="Enter Phone Number"
                                               class="tb-my-input" name="phone" tabindex="2" value=""
                                               aria-required="true" required="">
                                    </fieldset>
                                    <div class="btn-submit">
                                        <button id="comment-reply" name="submit"
                                                class="tf-button-submit tf-button color-text color-style1"
                                                type="submit">
                                            Reserve your table now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-30">
                        <div class="image-reservation style2">
                            <img src="assets/img/banner/img2Reservation.jpg" alt="images">
                        </div>
                    </div>
                    <div class="popup-thanks">
                        <div class="popup-thanks-overlay"></div>
                        <div class="popup-thanks-inner">
                            <div class="content-popup">
                                <i class="fas fa-heart"></i>
                                <p class="title">
                                    Thank You For Reservation
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="wrap-gallery-box-style02 style2">
            <div class="container-fluid">
                <div class="swiper-container carousel-6">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="gallery-box-style02 h-100">
                                <div class="hover-effect h-100">
                                    <div class="image h-100">
                                        <img src="assets/img/gallery/imggallery10.jpg" alt="">
                                    </div>
                                    <div class="content-box">
                                        <div class="icon">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-box-style02 h-100">
                                <div class="hover-effect active h-100">
                                    <div class="image h-100">
                                        <img src="assets/img/gallery/imggallery11.jpg" alt="">
                                    </div>
                                    <div class="content-box">
                                        <div class="icon">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-box-style02 h-100">
                                <div class="hover-effect h-100">
                                    <div class="image h-100">
                                        <img src="assets/img/gallery/imggallery12.jpg" alt="">
                                    </div>
                                    <div class="content-box">
                                        <div class="icon">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-box-style02 h-100">
                                <div class="hover-effect h-100">
                                    <div class="image h-100">
                                        <img src="assets/img/gallery/imggallery13.jpg" alt="">
                                    </div>
                                    <div class="content-box">
                                        <div class="icon">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery-box-style02 h-100">
                                <div class="hover-effect h-100">
                                    <div class="image h-100">
                                        <img src="assets/img/gallery/imggallery14.jpg" alt="">
                                    </div>
                                    <div class="content-box">
                                        <div class="icon">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require_once 'includes/footer.php'; ?>

    </div>
</div>

<?php require_once 'includes/js.php'; ?>
</body>
</html>
