<?php
session_start();
require_once("../includes/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Product Admin | Food Island</title>
    <meta name="description" content="Some description for the page"/>
    <?php require_once('include/css.php'); ?>
</head>
<body>
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<div id="main-wrapper">
    <div class="nav-header">
        <a href="dashboard.php" class="brand-logo">
            <img class="logo-abbr" src="public/images/logo_icon.png" alt="">
            <img class="logo-compact" src="public/images/logo_text.png" alt="">
            <img class="brand-title" src="public/images/logo_text.png" alt="">
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Product
                        </div>
                    </div>

                    <!--Top Header Common Part Start-->
                    <?php require_once('include/header.php'); ?>
                    <!--Top Header Common Part End-->
                </div>
            </nav>
        </div>
    </div>

    <!--Side nav Start-->
    <?php require_once('include/navbar.php'); ?>
    <!--Side nav end-->

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
                </ol>
            </div>
            <?php if (isset($_GET['add'])) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Insert" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="p_name"
                                                       placeholder="Name..."
                                                       value="" required/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Category</label>
                                                <div class="dropdown bootstrap-select form-control">
                                                    <select class="form-control" id="category_id" name="category_id"
                                                            required>
                                                        <option value="0">
                                                            Select Category
                                                        </option>
                                                        <?php
                                                        $category_data = $db_handle->runQuery("SELECT * FROM category order by id asc");
                                                        $row_count = $db_handle->numRows("SELECT * FROM category order by id desc");

                                                        for ($i = 0; $i < $row_count; $i++) {
                                                            ?>

                                                            <option value="<?php echo $category_data[$i]["id"]; ?>">
                                                                <?php echo $category_data[$i]["name"]; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Product Price</label>
                                                <input type="text" class="form-control" name="price"
                                                       placeholder="5.99"
                                                       value="" required/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <label>Menu Image</label>
                                            <div class="form-group col-md-12">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="menu_image"
                                                               required>
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <label>Shop Image</label>
                                            <div class="form-group col-md-12">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="shop_image"
                                                               required>
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <label>Extended Image</label>
                                            <div class="form-group col-md-12">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                               name="extended_image[]" multiple>
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="product_add" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else if (isset($_GET['product_id'])) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="p_name"
                                                       placeholder="Name..."
                                                       value="<?php $data = $db_handle->runQuery("SELECT * FROM category as c,tblproduct as t where c.id=t.category_id and t.id={$_GET['product_id']}");
                                                       echo $data[0]["p_name"]; ?>"/>
                                                <input type="hidden" name="id"
                                                       value="<?php echo $data[0]["id"]; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Category</label>
                                                <div class="dropdown bootstrap-select form-control">
                                                    <select class="form-control" id="category_id" name="category_id"
                                                            required>
                                                        <option value="<?php echo $data[0]["category_id"]; ?>" selected>
                                                            <?php echo $data[0]["name"]; ?>
                                                        </option>
                                                        <?php
                                                        $category_data = $db_handle->runQuery("SELECT * FROM category order by id desc");
                                                        $row_count = $db_handle->numRows("SELECT * FROM category order by id desc");

                                                        for ($i = 0; $i < $row_count; $i++) {
                                                            ?>

                                                            <option value="<?php echo $category_data[$i]["id"]; ?>">
                                                                <?php echo $category_data[$i]["name"]; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Product Price</label>
                                                <input type="text" class="form-control" name="price"
                                                       placeholder="5.99"
                                                       value="<?php echo $data[0]["price"]; ?>" required/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Menu Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="menu_image">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <img src="../<?php echo $data[0]["menu_image"]; ?>" alt=""
                                                     height="250px"/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Shop Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="shop_image">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <img src="../<?php echo $data[0]["product_image"]; ?>" alt=""
                                                     height="250px"/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Extended Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                               name="extended_image[]" multiple>
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <?php $sb = explode(',', $data[0]["extended_image"]);
                                                $k = 1;
                                                foreach ($sb as $bb) {
                                                    if ($bb == '') {
                                                        echo '';
                                                    } else {
                                                        ?>
                                                        <img src="../<?php echo $bb; ?>" alt="" height="250px"/>
                                                        <?php
                                                    }
                                                    $k++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="dropdown bootstrap-select form-control">
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="1" <?php echo ($data[0]["status"] == 1) ? "selected" : ""; ?>>
                                                            Available
                                                        </option>
                                                        <option value="0" <?php echo ($data[0]["status"] == 0) ? "selected" : ""; ?>>
                                                            Not Available
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="product_update" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product List</h4>
                                <a href="Product?add=" class="btn btn-primary">Add Product</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>Menu Image</th>
                                            <th>Shop Image</th>
                                            <th>EX Image</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $product_data = $db_handle->runQuery("SELECT * FROM category as c,tblproduct as t where c.id=t.category_id order by t.id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM tblproduct as t, category as c where c.id=t.category_id order by t.id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $product_data[$i]["p_name"]; ?></td>
                                                <td><?php echo $product_data[$i]["name"]; ?></td>
                                                <td><?php echo $product_data[$i]["code"]; ?></td>
                                                <td><?php echo $product_data[$i]["price"]; ?></td>
                                                <td><a href="../<?php echo $product_data[$i]["menu_image"]; ?>"
                                                       target="_blank">m_i</a></td>
                                                <td><a href="../<?php echo $product_data[$i]["product_image"]; ?>"
                                                       target="_blank">p_i</a></td>
                                                <td class="text-center">
                                                    <?php $sb = explode(',', $product_data[$i]["extended_image"]);
                                                    $k = 1;
                                                    foreach ($sb as $bb) {
                                                        if ($bb == '') {
                                                            echo '';
                                                        } else {
                                                            ?>
                                                            <a href="../<?php echo $bb; ?>"
                                                               target="_blank">ex_<?php echo $k; ?></a>
                                                            <?php
                                                        }
                                                        $k++;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php

                                                    $datetime = new DateTime($product_data[$i]["updated_at"]);
                                                    $la_time = new DateTimeZone('America/New_York');
                                                    $datetime->setTimezone($la_time);

                                                    echo $datetime->format('d/m/Y h:i A'); ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($product_data[$i]["status"] == 0) {
                                                        ?>
                                                        <span class="badge light badge-danger">Not Available</span>
                                                        <?php
                                                    } else if ($product_data[$i]["status"] == 1) {
                                                        ?>
                                                        <span class="badge light badge-success">Available</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Product?product_id=<?php echo $product_data[$i]["id"]; ?>"
                                                           class="btn btn-info shadow btn-xs sharp mr-1"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        <button onclick="productDelete(<?php echo $product_data[$i]["id"]; ?>);"
                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-times-circle"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!--footer Start-->
    <?php require_once('include/footer.php'); ?>
    <!--footer End-->
</div>
<?php require_once('include/js.php'); ?>

<script>
    function productDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: 'Delete',
                    data: {
                        product_id: id
                    },
                    success: function (data) {
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        ).then((result) => {
                            window.location = 'Product';
                        });
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Product is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Product';
                });
            }
        })
    }
</script>
</body>
</html>
