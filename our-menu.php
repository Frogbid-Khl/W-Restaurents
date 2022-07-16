<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<head>

    <?php require_once 'includes/css.php'; ?>

    <title>Menu - Food Island</title>
</head>
<body class="counter-scroll  header-fixed2">

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
                        <h2 class="heading">Menu Pages</h2>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="Home">Home</a></li>
                            <li>Our Menu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <section class="tf-section menu-product">
            <div class="container-fluid">
                <div class="row">
                    <div class="flat-tabs flat-tabs-menu">
                        <ul class="menu-tab">
                            <?php
                            $category_data = $db_handle->runQuery("SELECT * FROM category where status=1 order by id asc");
                            $row_count = $db_handle->numRows("SELECT * FROM category where status=1 order by id desc");

                            for ($i = 0; $i < $row_count; $i++) {
                                ?>
                                <li <?php if ($i == 0) {
                                    echo 'class="active"';
                                } ?>>
                                    <a href="#">
                                        <?php echo $category_data[$i]["name"]; ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                        <div class="content-tab">
                            <?php
                            $category_data = $db_handle->runQuery("SELECT * FROM category where status=1 order by id asc");
                            $row_count_category = $db_handle->numRows("SELECT * FROM category where status=1 order by id desc");

                            for ($j = 0; $j < $row_count_category; $j++) {
                            ?>

                            <div class="content-inner">
                                <div class="col-tab flex">
                                    <div class="col-box col-50">
                                        <div class="col-left-ourmenu">
                                            <?php
                                            $product_data = $db_handle->runQuery("SELECT * FROM category as c,tblproduct as t where c.id=t.category_id and t.status=1 and t.category_id ={$category_data[$j]["id"]} order by t.p_name asc");
                                            $row_count = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id and t.status=1 and t.category_id ={$category_data[$j]["id"]} order by t.id desc");

                                            for ($i = 0; $i < $row_count; $i++) {
                                                if ($i % 2 == 0) {
                                                    ?>
                                                    <div class="our-menu-box">
                                                        <div class="our-menu-item-style3 flex">
                                                            <div class="image">
                                                                <img class="image-inner"
                                                                     src="<?php echo $product_data[$i]["menu_image"]; ?>"
                                                                     alt="<?php echo $product_data[$i]["p_name"]; ?>">
                                                            </div>
                                                            <div class="content-menu-item">
                                                                <h4 class="heading">
                                                                    <?php echo $product_data[$i]["p_name"]; ?>
                                                                </h4>
                                                                <div class="pricing">
                                                                    $<?php echo $product_data[$i]["price"]; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-box col-50">
                                        <div class="col-right-ourmenu">
                                            <?php
                                            $product_data = $db_handle->runQuery("SELECT * FROM category as c,tblproduct as t where c.id=t.category_id and t.category_id ={$category_data[$j]["id"]} order by t.p_name asc");
                                            $row_count = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id and t.category_id ={$category_data[$j]["id"]} order by t.id desc");

                                            for ($i = 0; $i < $row_count; $i++) {
                                                if ($i % 2 == 1) {
                                                    ?>
                                                    <div class="our-menu-box">
                                                        <div class="our-menu-item-style3 flex">
                                                            <div class="image">
                                                                <img class="image-inner"
                                                                     src="<?php echo $product_data[$i]["menu_image"]; ?>"
                                                                     alt="<?php echo $product_data[$i]["p_name"]; ?>">
                                                            </div>
                                                            <div class="content-menu-item">
                                                                <h4 class="heading">
                                                                    <?php echo $product_data[$i]["p_name"]; ?>
                                                                </h4>
                                                                <div class="pricing">
                                                                    $<?php echo $product_data[$i]["price"]; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tf-section counter-chefs-about">
            <div class="overlay-inner"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="wrap-counter wow fadeInUp animated" data-wow-delay="0.3ms" data-wow-duration="1500ms">
                        <div class="col-box col-25">
                            <div class="box box-countter-chefs text-center padding-right-121">
                                <div class="wrap-icon">
                                    <i class="flaticon-chef"></i>
                                </div>
                                <div class="countter-box margin-top-3">
                                    <h6 class="heading">Professional Chefs</h6>
                                    <span class="number" data-from="0" data-to="309" data-speed="2500"
                                          data-inviewport="yes">309</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-box col-25">
                            <div class="box box-countter-chefs text-center padding-right-73">
                                <div class="wrap-icon">
                                    <i class="flaticon-fast-food"></i>
                                </div>
                                <div class="countter-box">
                                    <h6 class="heading">Items Of Foods</h6>
                                    <span class="number" data-from="0" data-to="453" data-speed="2500"
                                          data-inviewport="yes">453</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-box col-25">
                            <div class="box box-countter-chefs text-center padding-right-5">
                                <div class="wrap-icon">
                                    <i class="flaticon-fork"></i>
                                </div>
                                <div class="countter-box">
                                    <h6 class="heading">Years Of Experience</h6>
                                    <span class="number" data-from="0" data-to="64" data-speed="2500"
                                          data-inviewport="yes">64</span><span class="sub-number">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-box col-25 no-pd-right">
                            <div class="box box-countter-chefs text-center padding-left-106">
                                <div class="wrap-icon">
                                    <i class="flaticon-pizza-1"></i>
                                </div>
                                <div class="countter-box">
                                    <h6 class="heading">Saticfied Customers</h6>
                                    <span class="number" data-from="0" data-to="302" data-speed="2500"
                                          data-inviewport="yes">302</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tf-section wrap-gallery-our-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 cleafix">
                        <div class="content-heading-wrap">
                            <div class="tf-heading-bg color-style1 cleafix">
                                <h2 class="heading-bg-style02 magin-left-12">GALLERY</h2>
                            </div>
                            <div class="tf-heading text-center">
                                <h4 class="tf-title tf-title-style2 wow zoomIn animated" data-wow-delay="0.3ms"
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
                <div class="flat-button style2 box-center">
                    <a href="Shop" class="tf-button color-style3">VIEW MORE GALLERY</a>
                </div>
            </div>
        </section>

        <?php require_once 'includes/footer.php'; ?>

    </div>
</div>

<?php require_once 'includes/js.php'; ?>
</body>
</html>
