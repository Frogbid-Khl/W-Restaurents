<?php
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["p_name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
                echo "<script>
                document.cookie = 'alert = 10;';
                </script>";
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}

$total_quantity = 0;
$total_price = 0;
if (isset($_SESSION["cart_item"])) {
    foreach ($_SESSION["cart_item"] as $item) {
        $item_price = $item["quantity"] * $item["price"];
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"] * $item["quantity"]);
    }
}

if ($_SERVER['SERVER_NAME'] == "skhalalfood.com" || $_SERVER['SERVER_NAME'] == "www.skhalalfood.com") {
    $domain_name = '';
} else {
    $domain_name = "/W-SK-Halal-Food";
}


if ($_SERVER['REQUEST_URI'] == $domain_name . '/') {
    echo "<script>window.location.href = '".$domain_name."/Home';</script>";
}
?>
<header id="site-header"<?php if ($_SERVER['REQUEST_URI'] != $domain_name . '/Home') echo ' class="site-header-inner-page"'; ?>>
    <div id="site-header-inner" class="container-fluid">
        <div class="wrap-inner flex">
            <div id="site-logo" class="cleafix">
                <a href="Home" class="logo">
                    <img src="assets/img/logo/logo.png" alt="" style="height:80px;width: 100% !important;">
                </a>
            </div>
            <div class="mobile-button">
                <span></span>
            </div>
            <nav id="main-nav" class="main-nav">
                <ul id="menu-primary-menu" class="menu">
                    <li <?php if ($_SERVER['REQUEST_URI'] == $domain_name . '/Home') echo 'class="current-menu-item"'; ?>>
                        <a href="Home">Home</a>
                    </li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == $domain_name . '/About') echo 'class="current-menu-item"'; ?>>
                        <a href="#">About</a>
                    </li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == $domain_name . '/Menu') echo 'class="current-menu-item"'; ?>>
                        <a href="Menu">Menu</a>
                    </li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == $domain_name . '/Shop') echo 'class="current-menu-item"'; ?>>
                        <a href="Shop">Shop</a>
                    </li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == $domain_name . '/Contact') echo 'class="current-menu-item"'; ?>>
                        <a href="Contact">Contact</a>
                    </li>
                    <li id="cart-menu">
                        <a href="Cart">Cart (<?php echo $total_quantity; ?>)</a>
                    </li>
                </ul>
            </nav>
            <?php if ($_SERVER['REQUEST_URI'] == $domain_name . '/Home') { ?>
                <div class="header-contact">
                        <span class="address">
                        (XXX)-XXX-XXXX
                        </span>
                </div>
            <?php } ?>
            <div class="flat-button<?php if ($_SERVER['REQUEST_URI'] != $domain_name . '/Home') echo " flat-button-style3"; ?>">
                <a href="Cart" class="tf-button color-text color-style1">Cart (<?php echo $total_quantity; ?>)</a>
            </div>
        </div>
    </div>
</header>
