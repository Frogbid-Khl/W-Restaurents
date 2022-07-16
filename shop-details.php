<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<head>

    <?php require_once 'includes/css.php'; ?>

    <title>Product Details - Food Island</title>
    <style>
        .rate-area {
            float: left;
            border-style: none;
        }

        .rate-area:not(:checked) > input {
            position: absolute;
            top: 500px;
            clip: rect(0, 0, 0, 0);
        }

        .rate-area:not(:checked) > label {
            float: right;
            width: 0.8em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 120%;
            color: lightgrey;
        }

        .rate-area:not(:checked) > label:before {
            content: "★";
        }

        .rate-area > input:checked ~ label {
            color: #ffab50;
        }

        .rate-area:not(:checked) > label:hover,
        .rate-area:not(:checked) > label:hover ~ label {
            color: #ffab50;
        }

        .rate-area > input:checked + label:hover,
        .rate-area > input:checked + label:hover ~ label,
        .rate-area > input:checked ~ label:hover,
        .rate-area > input:checked ~ label:hover ~ label,
        .rate-area > label:hover ~ input:checked ~ label {
            color: #ffab50;
        }

        .checked {
            color: orange;
        }
    </style>
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
                        <h2 class="heading">Product Details</h2>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="Home">Home</a></li>
                            <li>Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <?php
        $product_data = '';
        if (isset($_GET['code'])) {
            $product_data = $db_handle->runQuery("SELECT * FROM tblproduct as t,category as c where c.id=t.category_id and t.code='{$_GET['code']}'");
        } else {
            header('location:Shop');
        }
        ?>


        <div class="tf-section product-details">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-details">
                            <div class="image wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1500ms">
                                <img src="<?php echo $product_data[0]["product_image"]; ?>" alt="images">
                            </div>
                            <div class="image-inner wow fadeInUp animated" data-wow-delay="0.5ms"
                                 data-wow-duration="1500ms">
                                <?php $sb = explode(',', $product_data[0]["extended_image"]);
                                $k = 1;
                                foreach ($sb as $bb) {
                                    if ($bb == '') {
                                        echo '';
                                    } else {
                                        ?>
                                        <div class="col-box col-33 style<?php echo $k; ?>">
                                            <a href="<?php echo $bb; ?>" class="popup-gallery">
                                                <img src="<?php echo $bb; ?>" alt="images">
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    $k++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details_content">
                            <h3 class="name-product"><?php echo $product_data[0]["p_name"]; ?></h3>
                            <p class="pricing">$<?php echo $product_data[0]["price"]; ?></p>
                            <p class="text">
                                <?php echo $product_data[0]["p_description"]; ?>
                            </p>
                            <div class="product-actions style2 flex">
                                <form method="post" action="Product-Detail?action=add&code=<?php echo $_GET['code']; ?>">
                                    <div class="quantity mb-3">
                                        <span class="btn-quantity minus-btn"><i class="fas fa-caret-down"></i></span>
                                        <input type="number" name="quantity" id="quantity" min="1" value="1">
                                        <span class="btn-quantity plus-btn"><i class="fas fa-caret-up"></i></span>
                                    </div>
                                    <button type="submit" class="tf-button color-text color-style1">ADD TO CART</button>
                                </form>
                            </div>
                            <div class="tag-category">
                                <ul class="category">
                                    <li>Category:</li>
                                    <li>
                                        <a href="Shop?category=<?php echo $product_data[0]["id"]; ?>"><?php echo $product_data[0]["name"]; ?></a>
                                    </li>
                                </ul>
                                <ul class="tag">
                                    <li class="margin-right-67">Tags:</li>
                                    <li>
                                        <a href="Shop?category=<?php echo $product_data[0]["id"]; ?>"><?php echo $product_data[0]["name"]; ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="comments" class="comments-area">
                            <h5 class="comments-title">People Comments</h5>
                            <ol class="comment-list">
                                <li class="comment wow fadeInUp animated" data-wow-delay="0ms"
                                    data-wow-duration="1500ms"
                                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                                    <?php
                                    if (isset($_GET['code'])) {
                                        $product_comments = $db_handle->runQuery("SELECT * FROM comment where product_code='{$_GET['code']}' and status=1 order by id asc");
                                        $row_count = $db_handle->numRows("SELECT * FROM comment where product_code='{$_GET['code']}' and status=1 order by id asc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>

                                            <article class="comment-wrap clearfix">
                                                <div class="gravatar">
                                                    <img alt="image"
                                                         src="<?php echo $product_comments[$i]["image"]; ?>">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <h6 class="comment-author">
                                                            <?php echo $product_comments[$i]["name"]; ?>
                                                            <span class="ml-5">
                                                                <?php
                                                                for ($j = 1; $j < 6; $j++) {
                                                                    if ($j <= $product_comments[$i]["rating"]) {
                                                                        ?>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <span class="fa fa-star"></span>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </span>

                                                        </h6>
                                                        <span class="comment-time">
                                                            <?php
                                                            $datetime = new DateTime($product_comments[$i]["updated_at"]);
                                                            $la_time = new DateTimeZone('America/New_York');
                                                            $datetime->setTimezone($la_time);

                                                            echo $datetime->format('j M Y'); ?>
                                                        </span>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p class="text">
                                                            <?php echo $product_comments[$i]["message"]; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </article>
                                            <?php
                                        }
                                    }
                                    ?>
                                </li>
                            </ol>
                            <div id="respond" class="comment-respond">
                                <h5 id="title">Leave Your Reviews</h5>
                                <form action="Insert" method="post" class="comment-form comment-form-style2"
                                      enctype="multipart/form-data">
                                    <div class="stars">
                                        <div class="heading text">Your Rating</div>
                                        <ul class="rate-area ml-5">
                                            <input type="radio" id="5-star" name="rating" value="5"
                                                   onclick="handleClick(this.value);"/><label for="5-star"
                                                                                              title="Amazing">5
                                                stars</label>
                                            <input type="radio" id="4-star" name="rating" value="4"
                                                   onclick="handleClick(this.value);"/><label for="4-star" title="Good">4
                                                stars</label>
                                            <input type="radio" id="3-star" name="rating" value="3"
                                                   onclick="handleClick(this.value);"/><label for="3-star"
                                                                                              title="Average">3
                                                stars</label>
                                            <input type="radio" id="2-star" name="rating" value="2"
                                                   onclick="handleClick(this.value);"/><label for="2-star"
                                                                                              title="Not Good">2
                                                stars</label>
                                            <input type="radio" id="1-star" name="rating" value="1"
                                                   onclick="handleClick(this.value);"/><label for="1-star" title="Bad">1
                                                star</label>
                                        </ul>
                                    </div>
                                    <input type="hidden" id="rating_num" name="rating_num" value="0"/>
                                    <input type="hidden" id="product_code" name="product_code"
                                           value="<?php echo $_GET['code'] ?>" required="">
                                    <fieldset class="name active">
                                        <input type="text" id="name" placeholder="Full Name" class="tb-my-input"
                                               name="name" tabindex="2" value="" aria-required="true" required=""/>
                                    </fieldset>
                                    <fieldset class="phone">
                                        <input type="number" id="phone" placeholder="Phone Number" class="tb-my-input"
                                               name="phone" tabindex="2" value="" aria-required="true" required=""/>
                                    </fieldset>
                                    <fieldset class="email">
                                        <input type="email" id="email" placeholder="Email Address" class="tb-my-input"
                                               name="email" tabindex="2" value="" aria-required="true" required=""/>
                                    </fieldset>
                                    <fieldset class="message">
                                        <input type="file" id="image" name="image" required=""/>
                                    </fieldset>
                                    <fieldset class="message">
                                        <textarea id="message" name="message" rows="4" placeholder="Write Message"
                                                  tabindex="4" aria-required="true" required=""></textarea>
                                    </fieldset>
                                    <div class="btn-submit flat-button flat-button-style2">
                                        <div class="btn-submit">
                                            <button id="comment-reply" name="submit_comment"
                                                    class="tf-button color-text color-style1" type="submit">
                                                SEND YOUR FEEDBACK
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="tf-section wrap-shop-details">
            <div class="container-fluid cleafix">
                <div class="row">
                    <div class="col-md-12 cleafix">
                        <div class="content-heading-wrap">
                            <div class="tf-heading-bg color-style1 cleafix">
                                <h2 class="heading-bg-style02 style3">shop</h2>
                            </div>
                            <div class="tf-heading text-center">
                                <h4 class="tf-title tf-title-style2 wow zoomIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1200ms">related products</h4>
                                <p class="tf-sub-heading">Best foods for you & family</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="swiper-container carousel-5">
                            <div class="swiper-wrapper">
                                <?php
                                $product_data = $db_handle->runQuery("SELECT * FROM category as c,tblproduct as t where c.id=t.category_id and t.status=1 and t.category_id= {$product_data[0]["id"]} order by RAND() limit 4");

                                // while there are rows to be fetched...
                                $row_count = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id and t.status=1 order by RAND() limit 4");

                                for ($i = 0; $i < $row_count; $i++) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="slider-item ">
                                            <div class="item style2">
                                                <div class="hover-effect">
                                                    <div class="image">
                                                        <img src="<?php echo $product_data[$i]["product_image"]; ?>"
                                                             alt="images">
                                                    </div>
                                                    <div class="product-actions">
                                                        <a href="Product-Detail?code=<?php echo $product_data[$i]["code"]; ?>"
                                                           class="tf-button color-text color-style1">
                                                            Details
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h6 class="name-product">
                                                        <?php echo substr($product_data[$i]["p_name"], 0, 18); ?>
                                                        <?php if (strlen($product_data[$i]["p_name"]) > 20) {
                                                            echo '...';
                                                        } ?>
                                                    </h6>
                                                    <p class="pricing">$<?php echo $product_data[$i]["price"]; ?></p>
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
            </div>
        </section>

        <?php require_once 'includes/footer.php'; ?>

    </div>
</div>
<script>
    function handleClick(val) {
        document.getElementById("rating_num").value = val;
        console.log(val);
    }
</script>
<?php require_once 'includes/js.php'; ?>
</body>
</html>
