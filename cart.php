<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<head>
    <?php require_once 'includes/css.php'; ?>

    <title>Cart - SK Halal Food</title>
</head>
<body class="header-fixed2">

<div id="loading-overlay">
    <div class="loader"></div>
</div>
<div id="wrapper">
    <div id="page" class="clearfix">
        <div id="top-bar" class="top-bar-inner-page">
            <div class="top-bar-content">
                <p>Welcome to SK Halal Food a Best Quality Restaurant</p>
            </div>
        </div>
        <?php require_once 'includes/header.php'; ?>

        <section class="page-title page-title-inner">
            <div class="overlay-pagetitle"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="page-title-heading">
                        <h2 class="heading">Cart</h2>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="Home">Home</a></li>
                            <li>Cart</li>
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
                                <h2 class="heading-bg-style02 style3">Cart</h2>
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
                                <a class="btn-danger mb-2" style="padding:10px 30px;float: right;"
                                   href="Cart?action=empty"><span>Clear Cart</span></a>
                                <table class="table mt-4">
                                    <?php
                                    if (isset($_SESSION["cart_item"])) {
                                        ?>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td style="text-align:right;"><strong>Quantity</strong></td>
                                            <td style="text-align:right;"><strong>Unit Price</strong></td>
                                            <td style="text-align:right;"><strong>Price</strong></td>
                                            <td style="text-align:center;"><strong>Remove</strong></td>
                                        </tr>
                                        <?php
                                        $total_quantity_new = 0;
                                        $total_price_new = 0;
                                        foreach ($_SESSION["cart_item"] as $item) {
                                            $item_price = $item["quantity"] * $item["price"];
                                            ?>
                                            <tr>
                                                <td><?php echo $item["name"]; ?></td>
                                                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                                <td style="text-align:right;"><?php echo "$ " . $item["price"]; ?></td>
                                                <td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
                                                <td style="text-align:center;"><a
                                                        href="Cart?action=remove&code=<?php echo $item["code"]; ?>"
                                                        class="btnRemoveAction"><i class="fa fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $total_quantity_new += $item["quantity"];
                                            $total_price_new += ($item["price"] * $item["quantity"]);
                                        }
                                        ?>
                                        <tr>
                                            <td style="text-align:right;">Total:</td>
                                            <td style="text-align:right;"><?php echo $total_quantity_new; ?></td>
                                            <td style="text-align:right;" colspan="2">
                                                <strong><?php echo "$ " . number_format($total_price_new, 2); ?></strong></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <strong>You have 0 items in the cart</strong>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                                <div class="link-btn">
                                    <a href="Checkout" class="tf-button color-text color-style1"
                                       style="float: right;"><span>Proceed to Checkout</span></a>
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
