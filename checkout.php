<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<head>
    <?php require_once 'includes/css.php'; ?>

    <title>Checkout - Food Island</title>

    <style>
        input{
            border: 1px solid green !important;
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
                        <h2 class="heading">Checkout</h2>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="Home">Home</a></li>
                            <li>Checkout</li>
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
                                <h2 class="heading-bg-style02 style3">Checkout</h2>
                            </div>
                            <div class="tf-heading text-center">
                                <h4 class="tf-title tf-title-style2 wow zoomIn animated" data-wow-delay="0.3ms"
                                    data-wow-duration="1200ms">Add your favorite Favourite Food</h4>
                                <p class="tf-sub-heading">Best foods for you & family</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-box col-120">
                        <div class="wrap-form-reservation wow fadeInUp animated" data-wow-delay="0.3ms"
                             data-wow-duration="1300ms">
                            <div class="form-reservation">
                                <div class="row">
                                    <form method="post" action="Payment"
                                          id="contact-form" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="sec-title mb-3">
                                                    <h2>DELIVERY DETAILS</h2>
                                                </div>
                                                <!--Contact Form-->
                                                <div class="contact-form">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="f_name"
                                                                   value=""
                                                                   placeholder="First Name" required>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="l_name"
                                                                   value=""
                                                                   placeholder="Last Name" required>
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <input type="text" class="form-control" name="email"
                                                                   value=""
                                                                   placeholder="Email Address" required>
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <input type="text" class="form-control" name="phone_number"
                                                                   value=""
                                                                   placeholder="Phone Number" maxlength="10"
                                                                   minlength="10" required>
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <input type="text" class="form-control" name="address"
                                                                   value=""
                                                                   placeholder="Street Address" required>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="city" value=""
                                                                   placeholder="City"
                                                                   required>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="zip_code"
                                                                   value=""
                                                                   placeholder="Zip Code" maxlength="5"
                                                                   minlength="5" required>
                                                        </div>
                                                        <input type="hidden" class="form-control" name="state"
                                                               value="NY" required>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <div class="sec-title mt-3 mb-5">
                                                                <h2>YOUR ORDER</h2>
                                                                <table class="table mt-4" width="100%">
                                                                    <tr>
                                                                        <td><strong>PRODUCT</strong></td>
                                                                        <td class="text-right"><strong>SUBTOTAL</strong>
                                                                        </td>
                                                                    </tr>


                                                                    <?php
                                                                    if (isset($_SESSION["cart_item"])) {
                                                                        $total_quantity_new = 0;
                                                                        $total_price_new = 0;
                                                                        foreach ($_SESSION["cart_item"] as $item) {
                                                                            $item_price = $item["quantity"] * $item["price"];
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $item["name"]; ?>
                                                                                    × <?php echo $item["quantity"]; ?></td>
                                                                                <td class="text-right"><?php echo "$ " . number_format($item_price, 2); ?></td>
                                                                            </tr>

                                                                            <?php
                                                                            $total_quantity_new += $item["quantity"];
                                                                            $total_price_new += ($item["price"] * $item["quantity"]);
                                                                        }
                                                                        ?>
                                                                        <tr>
                                                                            <td>Subtotal</td>
                                                                            <td class="text-right"><?php echo "$ " . number_format($total_price_new, 2); ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Total</td>
                                                                            <td class="text-right"><?php echo "$ " . number_format($total_price_new, 2); ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <div class="sec-title mt-3 mb-5">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend mr-1">
                                                                        <div class="input-group-text">
                                                                            <input type="radio" name="checkout"
                                                                                   aria-label="Radio button for following text input"
                                                                                   value="cash-on" checked>
                                                                        </div>
                                                                    </div>
                                                                    <label class="font-weight-bold">Cash On</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <button class="cs-btn-one btn-primary-color" type="submit"
                                                                    data-loading-text="Please wait..."
                                                                    name="cashon_submit" style="width: 100%">
                                                                <span>Place Order</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

        <?php require_once 'includes/footer.php'; ?>

    </div>
</div>

<?php require_once 'includes/js.php'; ?>
</body>
</html>
