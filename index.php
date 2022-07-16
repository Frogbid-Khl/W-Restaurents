<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<head>
    <?php require_once 'includes/css.php'; ?>

    <title>Home - SK Halal Food</title>
</head>
<body class="counter-scroll header-fixed">

<div id="loading-overlay">
    <div class="loader"></div>
</div>
<div id="wrapper">
    <div id="page" class="clearfix">
        <?php require_once 'includes/header.php'; ?>

        <section class="page-title">
            <div class="slider">
                <div class="img-bg2">
                    <img src="assets/img/slider/img_bg2.png" alt="">
                </div>
                <div class="swiper-container mainslider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider-item">
                                <div class="container-fluid">
                                    <div class="page-tittle-slider distance">
                                        <div class="heading-tittle">
                                            <h1 class="title color-style4 margin-6 margin-bt30">Best <br>Quality<br>Foods
                                            </h1>
                                            <div class="flat-button">
                                                <a href="Menu" class="tf-button color-text color-style2">explore
                                                    our menu</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider-item">
                                <div class="container-fluid">
                                    <div class="page-tittle-slider">
                                        <div class="heading-tittle">
                                            <h1 class="title color-style4 margin-6 margin-bt30">Best <br>Quality<br>Foods
                                            </h1>
                                            <div class="flat-button">
                                                <a href="Menu" class="tf-button color-text color-style2">explore
                                                    our menu</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next btn-slide-next"></div>
                    <div class="swiper-button-prev btn-slide-prev active"></div>
                </div>
            </div>
        </section>

        <section class="tf-section wrap-category">
            <div class="overlay-bg-style01"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 cleafix">
                        <div class="content-heading-wrap">
                            <div class="tf-heading-bg color-style1 cleafix">
                                <h2 class="heading-bg-style">CATEGORY</h2>
                            </div>
                            <div class="tf-heading text-center">
                                <h4 class="tf-title wow zoomIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1200ms">choose your best category</h4>
                                <p class="tf-sub-heading">Best foods for you & family</p>
                            </div>
                        </div>
                    </div>
                    <div class="flat-tabs">
                        <ul class="menu-tab">

                            <li class="col-box col-16">
                                <div class="tf-icon-box tf-iconbox-category wow fadeInUp animated"
                                     data-wow-delay="0.3ms" data-wow-duration="500ms">
                                    <div class="icon-wrap margin-bt-2">
                                        <i class="flaticon-cheeseburger"></i>
                                    </div>
                                    <h6 class="heading">
                                        Breakfast
                                    </h6>
                                    <div class="btn-icon-box">
                                        <a class="color-style2" href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </li>

                            <li class="col-box col-16">
                                <div class="tf-icon-box tf-iconbox-category wow fadeInUp animated"
                                     data-wow-delay="0.3ms" data-wow-duration="700ms">
                                    <div class="icon-wrap margin-bt-2">
                                        <i class="flaticon-pizza"></i>
                                    </div>
                                    <h6 class="heading">
                                        Lunch/Dinner
                                    </h6>
                                    <div class="btn-icon-box">
                                        <a class="color-style2" href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </li>

                            <li class="col-box col-16">
                                <div class="tf-icon-box tf-iconbox-category wow fadeInUp animated"
                                     data-wow-delay="0.3ms" data-wow-duration="900ms">
                                    <div class="icon-wrap margin-bt-2">
                                        <i class="flaticon-coffee-cup"></i>
                                    </div>
                                    <h6 class="heading">
                                        Dessert
                                    </h6>
                                    <div class="btn-icon-box">
                                        <a class="color-style2" href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </li>

                            <li class="col-box col-16">
                                <div class="tf-icon-box tf-iconbox-category wow fadeInUp animated"
                                     data-wow-delay="0.3ms" data-wow-duration="1100ms">
                                    <div class="icon-wrap margin-bt-2">
                                        <i class="flaticon-chicken-leg"></i>
                                    </div>
                                    <h6 class="heading">
                                        Bakery
                                    </h6>
                                    <div class="btn-icon-box">
                                        <a class="color-style2" href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </li>

                            <li class="col-box col-16">
                                <div class="tf-icon-box tf-iconbox-category wow fadeInUp animated"
                                     data-wow-delay="0.3ms" data-wow-duration="1300ms">
                                    <div class="icon-wrap margin-bt-2">
                                        <i class="flaticon-drink"></i>
                                    </div>
                                    <h6 class="heading">
                                        Drinks
                                    </h6>
                                    <div class="btn-icon-box">
                                        <a class="color-style2" href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </li>

                            <li class="col-box col-16">
                                <div class="tf-icon-box tf-iconbox-category wow fadeInUp animated"
                                     data-wow-delay="0.3ms" data-wow-duration="1500ms">
                                    <div class="icon-wrap margin-bt-2">
                                        <i class="flaticon-shrimp"></i>
                                    </div>
                                    <h6 class="heading">
                                        Snacks
                                    </h6>
                                    <div class="btn-icon-box">
                                        <a class="color-style2" href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="content-tab style2">
                            <div class="content-inner">
                                <div class="wrap-img-food-inner flex">
                                    <div class="img-food-1">
                                        <img src="assets/img/food/category/2.png" alt="images">
                                    </div>
                                    <div class="img-food-2">
                                        <img class="img-style-bg" src="assets/img/food/category/1.png" alt="images">
                                    </div>
                                    <div class="img-food-3">
                                        <img src="assets/img/food/category/3.png" alt="images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tf-section wrap-about-us">
            <img class="iconbg_about" src="assets/img/about-us/iconbgabout.png" alt="images">
            <div class="container-fluid cleafix">
                <div class="row">
                    <div class="col-md-12 cleafix">
                        <div class="content-heading-wrap">
                            <div class="tf-heading-bg color-style1 cleafix">
                                <h2 class="heading-bg-style">About us</h2>
                            </div>
                            <div class="tf-heading text-center">
                                <h4 class="tf-title wow zoomIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1200ms">why choose us</h4>
                                <p class="tf-sub-heading">Best foods for you & family</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tf-img-about wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1500ms">
                            <img src="assets/img/about-us/img_aboutus_home1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 no-pd-left">
                        <div class="content-about-us">
                            <p>Everything we do is about you. From chefs
                                who create exciting new flavors, to crew members
                                who know exactly how you want your drink—we prioritize
                                what you need to get you on your way. We strive to
                                keep you at your best, and we remain loyal to you,
                                your tastes and your time. That’s what
                                America runs on.</p>
                            <div class="flat-button flat-button-style2">
                                <a href="About" class="tf-button color-style1">discover more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tf-section wrap-our-menu">
            <div class="overlay-bg-style01"></div>
            <img class="imgbg1" src="assets/img/food/menu/2.png" alt="images">
            <img class="imgbg2" src="assets/img/food/menu/1.png" alt="images">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 cleafix">
                        <div class="content-heading-wrap">
                            <div class="tf-heading-bg color-style1 cleafix">
                                <h2 class="heading-bg-style">our menu</h2>
                            </div>
                            <div class="tf-heading text-center">
                                <h4 class="tf-title wow zoomIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1200ms">Try Our Special Offers</h4>
                                <p class="tf-sub-heading">Best foods for you & family</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $product_data = $db_handle->runQuery("SELECT * FROM category as c,tblproduct as t where c.id=t.category_id and t.status=1 order by RAND() asc limit 8");
                        $row_count = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id and t.status=1 order by RAND() desc limit 8");

                        for ($i = 0; $i < 4; $i++) {
                            ?>
                            <div class="our-menu-box mb">
                                <div class="our-menu-item wow fadeInUp animated" data-wow-delay="0.2ms"
                                     data-wow-duration="1200ms">
                                    <div class="content-menu-item">
                                        <h4 class="heading"><?php echo $product_data[$i]["p_name"]; ?></h4>
                                    </div>
                                    <div class="pricing-menu-item"><span>$<?php echo $product_data[$i]["price"]; ?></span></div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        for ($i = 4; $i < $row_count; $i++) {
                        ?>
                        <div class="our-menu-box mb">
                            <div class="our-menu-item wow fadeInUp animated" data-wow-delay="0.2ms"
                                 data-wow-duration="1200ms">
                                <div class="content-menu-item">
                                    <h4 class="heading">Chicken Sandwiches</h4>
                                </div>
                                <div class="pricing-menu-item"><span>$4.00</span></div>
                            </div>
                        </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="tf-section wrap-gallery">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 cleafix">
                        <div class="content-heading-wrap">
                            <div class="tf-heading-bg color-style1 cleafix">
                                <h2 class="heading-bg-style">GALLERY</h2>
                            </div>
                            <div class="tf-heading text-center">
                                <h4 class="tf-title wow zoomIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1200ms">RESTAURANTS PHOTO GALLERY</h4>
                                <p class="tf-sub-heading">Best foods for you & family</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-box col-50">
                        <div class="gallery-box h-100 wow zoomIn animated" data-wow-delay="0.3ms"
                             data-wow-duration="1000ms">
                            <div class="hover-effect active h-100">
                                <div class="image h-100">
                                    <img src="assets/img/food/gallery/gallery_1/1.png" alt="">
                                </div>
                                <div class="content-box">
                                    <div class="icon">
                                        <a href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="heading letter-spacing-1">
                                            <a href="Menu">Family Package Dish</a>
                                        </h4>
                                        <div class="sub-heading">
                                            Popular Food Package
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-25">
                        <div class="gallery-box  h-100 wow zoomIn animated" data-wow-delay="0.3ms"
                             data-wow-duration="1000ms">
                            <div class="hover-effect h-100">
                                <div class="image h-100">
                                    <img src="assets/img/food/gallery/gallery_2/1.png" alt="">
                                </div>
                                <div class="content-box">
                                    <div class="icon">
                                        <a href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="heading letter-spacing-1">
                                            <a href="Menu">Family Package Dish</a>
                                        </h4>
                                        <div class="sub-heading">
                                            Popular Food Package
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-25">
                        <div class="gallery-box h-100 wow zoomIn animated" data-wow-delay="0.3ms"
                             data-wow-duration="1000ms">
                            <div class="hover-effect h-100">
                                <div class="image h-100">
                                    <img src="assets/img/food/gallery/gallery_2/2.png" alt="">
                                </div>
                                <div class="content-box">
                                    <div class="icon">
                                        <a href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="heading letter-spacing-1">
                                            <a href="Menu">Family Package Dish</a>
                                        </h4>
                                        <div class="sub-heading">
                                            Popular Food Package
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-25">
                        <div class="gallery-box h-100 wow zoomIn animated" data-wow-delay="0.3ms"
                             data-wow-duration="1000ms">
                            <div class="hover-effect h-100">
                                <div class="image h-100">
                                    <img src="assets/img/food/gallery/gallery_2/3.png" alt="">
                                </div>
                                <div class="content-box">
                                    <div class="icon">
                                        <a href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="heading letter-spacing-1">
                                            <a href="Menu">Family Package Dish</a>
                                        </h4>
                                        <div class="sub-heading">
                                            Popular Food Package
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-25">
                        <div class="gallery-box h-100 wow zoomIn animated" data-wow-delay="0.3ms"
                             data-wow-duration="1000ms">
                            <div class="hover-effect h-100">
                                <div class="image h-100">
                                    <img src="assets/img/food/gallery/gallery_2/4.png" alt="">
                                </div>
                                <div class="content-box">
                                    <div class="icon">
                                        <a href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="heading letter-spacing-1">
                                            <a href="Menu">Family Package Dish</a>
                                        </h4>
                                        <div class="sub-heading">
                                            Popular Food Package
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-50">
                        <div class="gallery-box h-100 wow zoomIn animated" data-wow-delay="0.3ms"
                             data-wow-duration="1000ms">
                            <div class="hover-effect h-100">
                                <div class="image h-100">
                                    <img src="assets/img/food/gallery/gallery_1/2.png" alt="">
                                </div>
                                <div class="content-box">
                                    <div class="icon">
                                        <a href="Menu"><i class="fal fa-arrow-right"></i></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="heading letter-spacing-1">
                                            <a href="Menu">Family Package Dish</a>
                                        </h4>
                                        <div class="sub-heading">
                                            Popular Food Package
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flat-button box-center">
                    <a href="Menu" class="tf-button color-style3">view more photos</a>
                </div>
            </div>
        </section>

        <?php require_once 'includes/footer.php'; ?>

    </div>
</div>
<?php require_once 'includes/js.php'; ?>
</body>
</html>
