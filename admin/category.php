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
    <title>Category Admin | Food Island</title>
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
                            Category
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
                </ol>
            </div>
            <?php if (isset($_GET['add'])) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Insert">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Category Name</label>
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="Name..."
                                                       value=""/>
                                            </div>
                                        </div>
                                        <button type="submit" name="category_add" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else if (isset($_GET['cat_id'])) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Category Name</label>
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="Name..."
                                                       value="<?php $data = $db_handle->runQuery("SELECT * FROM category where id={$_GET['cat_id']}");
                                                       echo $data[0]["name"]; ?>"/>
                                                <input type="hidden" name="id"
                                                       value="<?php echo $data[0]["id"]; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="dropdown bootstrap-select form-control">
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="1" <?php echo ($data[0]["status"] == 1) ? "selected" : ""; ?>>
                                                            Publish
                                                        </option>
                                                        <option value="0" <?php echo ($data[0]["status"] == 0) ? "selected" : ""; ?>>
                                                            Unpublished
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="category_update" class="btn btn-primary">
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
                                <h4 class="card-title">Category List</h4>
                                <a href="Category?add=" class="btn btn-primary">Add Category</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $category_data = $db_handle->runQuery("SELECT * FROM category order by id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM category order by id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $category_data[$i]["name"]; ?></td>
                                                <td>
                                                    <?php

                                                    $datetime = new DateTime($category_data[$i]["updated_at"]);
                                                    $la_time = new DateTimeZone('America/New_York');
                                                    $datetime->setTimezone($la_time);

                                                    echo $datetime->format('d/m/Y h:i A'); ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($category_data[$i]["status"] == 0) {
                                                        ?>
                                                        <span class="badge light badge-danger">UnPublish</span>
                                                        <?php
                                                    } else if ($category_data[$i]["status"] == 1) {
                                                        ?>
                                                        <span class="badge light badge-success">Publish</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Category?cat_id=<?php echo $category_data[$i]["id"]; ?>"
                                                           class="btn btn-info shadow btn-xs sharp mr-1"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        <button onclick="categoryDelete(<?php echo $category_data[$i]["id"]; ?>);"
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
    function categoryDelete(id) {
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
                        cat_id: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'Your have product in this category.',
                                'error'
                            ).then((result) => {
                                window.location = 'Category';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Category';
                            });
                        }
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Category is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Category';
                });
            }
        })
    }
</script>
</body>
</html>
