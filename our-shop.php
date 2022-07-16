<?php
session_start();
require_once("includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<head>
    <?php require_once 'includes/css.php'; ?>

    <title>Shop - SK Halal Food</title>
    <link rel='stylesheet' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <style>

        .slider {
            margin: 25px 0
        }

        .current {
            background-color: #0c7f40 !important;
            color: white !important;
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
                <p>Welcome to SK Halal Food a Best Quality Restaurant</p>
            </div>
        </div>
        <?php require_once 'includes/header.php'; ?>

        <section class="page-title page-title-inner">
            <div class="overlay-pagetitle"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="page-title-heading">
                        <h2 class="heading">Our Shop</h2>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="Home">Home</a></li>
                            <li>Our Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="tf-section our-shop">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-box col-25">

                        <div id="sidebar">

                            <div class="widget widget_search">
                                <form action="" method="get" role="search" class="search-form">
                                    <input type="search" class="search" placeholder="Search Foods" name="search_name" title="Search for" onkeyup="nameSearch(this.value)" onkeydown="nameSearch(this.value)"/>
                                    <a href="#" class="icon-search" id="search"></a>
                                </form>
                            </div>

                            <div class="widget widget-list-product">
                                <h6 class="widget-title">
                                    Our Menu
                                </h6>
                                <p>
                                    <?php
                                    $query = "";
                                    $sort="";
                                    if (isset($_GET['range'])) {
                                        function get_string_between($string, $start, $end)
                                        {
                                            $string = ' ' . $string;
                                            $ini = strpos($string, $start);
                                            if ($ini == 0) return '';
                                            $ini += strlen($start);
                                            $len = strpos($string, $end, $ini) - $ini;
                                            return substr($string, $ini, $len);
                                        }

                                        $start_value = get_string_between($_GET['range'], '$', '-');

                                        $end_value = substr($_GET['range'], strpos($_GET['range'], "- $") + 3);

                                        $query .= " and t.price>=" . $start_value." and t.price<=".$end_value;
                                    }

                                    if (isset($_GET['category'])) {
                                        $query .= " and t.category_id=" . $_GET['category'];
                                    }

                                    if (isset($_GET['search_name'])) {
                                        $query .= " and t.p_name like '%" . $_GET['search_name']."%'";
                                    }

                                    if (isset($_GET['price'])) {
                                        $sort .= " order by t.price asc";
                                    }else{
                                        $sort .= " order by t.p_name asc";
                                    }
                                    ?>
                                </p>
                                <ul>
                                    <li>
                                        <?php
                                        $category_data = $db_handle->runQuery("SELECT * FROM category where status=1 order by id asc");
                                        $row_count = $db_handle->numRows("SELECT * FROM category where status=1 order by id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <a href="Shop?category=<?php echo $category_data[$i]["id"]; ?>">
                                                <?php echo $category_data[$i]["name"]; ?>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="image">
                                <img src="assets/img/shop/img-shop.jpg" alt="images">
                                <h4 class="content">
                                    Juice
                                    Collection
                                </h4>
                            </div>
                            <div class="widget widget_filter">
                                <h6 class="widget-title">
                                    Filter By Price
                                </h6>
                                <div class="filter">
                                    <form action="" method="get">
                                        <div class="slider-box">
                                            <input type="text" id="priceRange" name="range" readonly
                                                   style="font-size: 20px;font-weight: bold"/>
                                            <div id="price-range" class="slider" style="font-size: 15px"></div>
                                        </div>
                                        <button class="tf-button color-text color-style1" type="submit">Filter</button>
                                    </form>

                                </div>
                            </div>
                            <div class="widget widget_tags">
                                <h6 class="widget-title">
                                    Popular Tags
                                </h6>
                                <ul>
                                    <?php
                                    $category_data = $db_handle->runQuery("SELECT * FROM category where status=1 order by id asc");
                                    $row_count = $db_handle->numRows("SELECT * FROM category where status=1 order by id desc");

                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <li>
                                            <a href="Shop?category=<?php echo $category_data[$i]["id"]; ?>" <?php if ($i == 0) {
                                                echo 'class="active"';
                                            } ?>>
                                                <?php echo $category_data[$i]["name"]; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-box col-box2 col-75">
                        <div class="view-items">
                            <span class="show-results float-left">Showing
                                <?php
                                $row_count = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id and t.status=1" . $query .$sort. " limit 12");
                                $total = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id and t.status=1" . $query . " order by t.id desc");

                                $rowsperpage = 12;

                                if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
                                    // cast var as int
                                    $currentpage = (int)$_GET['currentpage'];
                                } else {
                                    // default page num
                                    $currentpage = 1;
                                }
                                echo ($currentpage * $rowsperpage - $rowsperpage + 1) . '-';
                                if ($total <= $currentpage * $rowsperpage) {
                                    echo $total;
                                } else {
                                    echo $currentpage * $rowsperpage;
                                }
                                ?> of
                                <?php
                                echo $total;

                                $pagination = "";
                                if (isset($_GET['category'])) {
                                    $pagination .= "category=" . $_GET['category'] . '&';
                                }

                                if (isset($_GET['range'])) {
                                    $pagination .= "&range=" . $_GET['range'] . '&';
                                }

                                if (isset($_GET['price'])) {
                                    $pagination .= "&price=" . $_GET['price'] . '&';
                                }
                                ?>
                                results</span>
                            <div class="btn-show flat-button float-right">
                                <a href="Shop?<?php echo $pagination ?>price=1" class="tf-button color-text color-style3">PRICE SORTING</a>
                            </div>
                        </div>

                        <div class="items-shop">
                            <?php
                            $numrows = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id and t.status=1" . $query .$sort. "");;

                            // number of rows to show per page
                            $rowsperpage = 12;
                            // find out total pages
                            $totalpages = ceil($numrows / $rowsperpage);

                            // get the current page or set a default
                            if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
                                // cast var as int
                                $currentpage = (int)$_GET['currentpage'];
                            } else {
                                // default page num
                                $currentpage = 1;
                            } // end if

                            // if current page is greater than total pages...
                            if ($currentpage > $totalpages) {
                                // set current page to last page
                                $currentpage = $totalpages;
                            } // end if
                            // if current page is less than first page...
                            if ($currentpage < 1) {
                                // set current page to first page
                                $currentpage = 1;
                            } // end if

                            // the offset of the list, based on current page
                            $offset = ($currentpage - 1) * $rowsperpage;

                            // get the info from the db

                            $product_data = $db_handle->runQuery("SELECT * FROM category as c,tblproduct as t where c.id=t.category_id and t.status=1" . $query .$sort. " limit $offset, $rowsperpage");

                            // while there are rows to be fetched...
                            $row_count = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id and t.status=1" . $query . " order by t.id desc limit $offset, $rowsperpage");

                            for ($i = 0; $i < $row_count; $i++) {
                                ?>
                                <div class="item-box ">
                                    <div class="item">
                                        <div class="hover-effect">
                                            <div class="image">
                                                <img src="<?php echo $product_data[$i]["product_image"]; ?>"
                                                     alt="<?php echo $product_data[$i]["p_name"]; ?>">
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
                                <?php
                            }

                            /******  build the pagination links ******/
                            // range of num links to show
                            $range = 1;

                            ?>
                        </div>


                        <div class="themesflat-pagination clearfix">
                            <ul class="text-center">
                                <?php

                                // if not on page 1, don't show back links
                                if ($currentpage > 1) {
                                    // show << link to go back to page 1
                                    echo "<li><a href='Shop?" . $pagination . "currentpage=1' class='active page-numbers prev'><span><i class='fas fa-angle-double-left'></i></span></a></li>";
                                    // get previous page num
                                    $prevpage = $currentpage - 1;
                                    // show < link to go back to 1 page
                                    echo "<li><a href='Shop?" . $pagination . "currentpage=$prevpage' class='active page-numbers prev'><span><i class='fas fa-chevron-left'></i></span></a></li>";

                                } // end if

                                // loop to show links to range of pages around current page
                                for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
                                    // if it's a valid page number...
                                    if (($x > 0) && ($x <= $totalpages)) {
                                        // if we're on current page...
                                        if ($x == $currentpage) {
                                            // 'highlight' it but don't make a link
                                            echo "<li><a href='?" . $pagination . "currentpage=$x' class='page-numbers current'>$x</a></li>";
                                            // if not current page...
                                        } else {
                                            // make it a link
                                            echo "<li><a href='?" . $pagination . "currentpage=$x' class='page-numbers'>$x</a></li>";
                                        } // end else
                                    } // end if
                                } // end for

                                // if not on last page, show forward and last page links
                                if ($currentpage != $totalpages) {
                                    // get next page
                                    $nextpage = $currentpage + 1;
                                    // echo forward link for next page
                                    echo "<li><a href='Shop?" . $pagination . "currentpage=$nextpage' class='page-numbers next'><span><i class='fas fa-chevron-right'></i></span></a></li>";
                                    // echo forward link for lastpage
                                    echo "<li><a href='Shop?" . $pagination . "currentpage=$totalpages' class='page-numbers next'><span><i class='fas fa-angle-double-right'></i></span></a></li>";
                                } // end if
                                /****** end build pagination links ******/
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </section>

        <script>
            function nameSearch(val){
                document.getElementById("search").href="Shop?<?php echo $pagination; ?>search_name="+val;
            }
        </script>

        <?php require_once 'includes/footer.php'; ?>

    </div>
</div>

<?php require_once 'includes/js.php'; ?>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script>
    <?php
    $price = $db_handle->runQuery("SELECT MIN(price) as min_price FROM category as c,tblproduct as t where c.id=t.category_id and t.status=1 order by t.p_name asc");
    $min_price=round($price[0]["min_price"],2);

    $price = $db_handle->runQuery("SELECT MAX(price) as max_price FROM category as c,tblproduct as t where c.id=t.category_id and t.status=1 order by t.p_name asc");
    $max_price=round($price[0]["max_price"],2);
    ?>
    $(function () {
        $("#price-range").slider({
            step: 0.01,
            range: true,
            min: <?php echo $min_price; ?>,
            max: <?php echo round($max_price,2); ?>,
            values: [<?php echo round($min_price,2); ?>, parseFloat(<?php echo round((float)$max_price,3); ?>).toFixed(2)],
            slide: function (event, ui) {
                $("#priceRange").val("$" + ui.values[0] + " - $" + parseFloat(ui.values[1]).toFixed(2));
            }

        });
        $("#priceRange").val("$" + $("#price-range").slider("values", 0) + " - $" + parseFloat($("#price-range").slider("values", 1)).toFixed(2));
    });
</script>

</body>
</html>
