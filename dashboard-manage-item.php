<?php
require 'inc/connect.php';
require_once("inc/banned_ip_russia.php");
session_start();

if(isset( $_SESSION['account']['userData']['username'])){
    $username = $_SESSION['account']['userData']['username'];
}else{
    header("location: https://".$_SERVER['SERVER_NAME']."/login.php");
}

?>
<!doctype HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TemplateRo - Digital Products Marketplace ">
    <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">
    <title>TemplateRo - Digital Products Marketplace</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">
    <!-- inject:css-->
    <link rel="stylesheet" href="assets/vendor_assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/animate.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/slick.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/trumbowyg.min.css">
    <link rel="stylesheet" href="assets/vendor_assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png">
</head>

<body class="preload">
    <?php require_once("inc/menu.php"); ?>
    <section class="dashboard-area">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Dashboard Menu
                        </button>
                        <ul class="dashboard_menu">
                            <li>
                                <a href="dashboard.php"><span class="lnr icon-home"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-setting.php"><span class="lnr icon-settings"></span>Setting</a>
                            </li>
                            <li>
                                <a href="dashboard-purchase.php"><span class="lnr icon-basket"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.php"><span class="lnr icon-credit-card"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.php"><span class="lnr icon-chart"></span>Statements</a>
                            </li>
                            <li>
                                <a href="uploader.php"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                            </li>
                            <li class="active">
                                <a href="dashboard-manage-item.php"><span class="lnr icon-note"></span>Manage Items</a>
                            </li>
                            <li>
                                <a href="dashboard-withdrawal.php"><span class="lnr icon-briefcase"></span>Withdrawals</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
        <div class="dashboard_contents section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-bar dashboard_title_area clearfix filter-bar2">
                            <div class="dashboard__title">
                                <h3>Manage Items</h3>
                            </div>
                            <div class="filter__items">
                                <div class="filter__option filter--text py-0">
                                    <?php
                                      $total_product = "SELECT * FROM products WHERE creator='$username'";
                                      $res = mysqli_query($conn, $total_product);
                                      $n = mysqli_num_rows($res);
                                    ?>
                                    <p><span><?php echo $n; ?></span> Products</p>
                                </div>
                                <div class="filter__option filter--select py-0">
                                    <div class="select-wrap">
                                        <select name="price">
                                            <option value="low">Price : Low to High</option>
                                            <option value="high">Price : High to low</option>
                                        </select>
                                        <span class="lnr icon-arrow-down"></span>
                                    </div>
                                </div>
                            </div><!-- ends: .pull-right -->
                        </div><!-- ends: .filter-bar -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
                <div class="row">               
                    <?php
$fetch_product = "SELECT * FROM products WHERE creator='$username'";
$result = $conn->query($fetch_product);

if ($result->num_rows > 0) {
    //output data of each row
    while ($row = $result->fetch_assoc()) {
        $creators = $row['creator'];
        $id = $row['id'];

        $creator = "SELECT * FROM users WHERE username='$creators'";
        $query = mysqli_query($conn, $creator);
        $ro = mysqli_fetch_array($query);


        $totals = "SELECT * FROM library WHERE `Product id`='$id'";
        $q = mysqli_query($conn, $totals);
        $f = mysqli_num_rows($q);
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="product-single latest-single items--edit">
                            <div class="product-thumb">
                                <figure>
                                    <img src="view-image.php?image_id=<?php echo $row['Main Image']; ?>" alt="" class="img-fluid">
                                    <div class="prod_option show">
                                        <a href="" id="drop_6" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="icon-settings setting-icon"></span>
                                        </a>
                                        <div class="options dropdown-menu" aria-labelledby="drop_6">
                                            <ul>
                                                <li class="dropdown-item">
                                                    <a href="edit-item.php">
                                                        <span class="icon-pencil"></span>Edit</a>
                                                </li>
                                                <form action="" method="POST">
                                                <li class="dropdown-item">
                                                    <a href="#">
                                                        <span class="icon-eye"></span>Hide</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#" class="delete" data-target="#myModal2" data-toggle="modal">
                                                        <span class="icon-trash"></span>Delete</a>
                                                </li>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </div><!-- Ends: .product-thumb -->
                            <div class="product-excerpt">
                                <h5>
                                    <a href="single-product-v2?id=<?php echo $row['id']; ?>"><?php echo $row['Product Name']; ?></a>
                                </h5>
                                <ul class="titlebtm">
                                    <li>
                                        <img class="auth-img" src="<?php echo $ro['avatar']; ?>" alt="author image">
                                        <p>
                                            <a href="author?creator=<?php echo $row['creator']; ?>"><?php echo $row['creator']; ?></a>
                                        </p>
                                    </li>
                                </ul>
                                <ul class="product-facts clearfix">
                                  <?php if($row['status'] == "inactive"){ ?><li class="price" style="color:red;">INACTIVE</li> <?php }?><li class="price"><?php if($row['Product Price'] >= 1){echo "&euro;".$row['Product Price'];}else{echo "FREE";} ?></li>
                                    <li class="sells">
                                        <span class="icon-basket"></span><?php echo $f; ?>
                                    </li>
                                    <li class="product-rating">
                                        <ul class="list-unstyled">
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_active"></span></li>
                                            <li><span class="rate_disabled"></span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- Ends: .product-excerpt -->
                        </div><!-- Ends: .product-single -->
                    </div><!-- Ends: .col-md-4 -->
                    <?php
    }}
                    ?>
                </div><!-- Ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->
    <!-- Modal Delete -->
    <div class="modal fade delete_modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="modal-dialog modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title">Are you sure to delete this item?</h3>
                    <p>You will not be able to recover this file!</p>
                </div>
                <!-- end /.modal-header -->
                <div class="modal-body m-n1">
                    <button type="submit" class="btn btn-danger btn-md m-1">Delete</button>
                    <button class="btn modal_close m-1" data-dismiss="modal">Cancel</button>
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>
    <?php require_once("inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script src="assets/vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="assets/vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>
    <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/vendor_assets/js/chart.bundle.min.js"></script>
    <script src="assets/vendor_assets/js/grid.min.js"></script>
    <script src="assets/vendor_assets/js/jquery-ui.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendor_assets/js/owl.carousel.min.js"></script>
    <script src="assets/vendor_assets/js/select2.full.min.js"></script>
    <script src="assets/vendor_assets/js/slick.min.js"></script>
    <script src="assets/vendor_assets/js/tether.min.js"></script>
    <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>
    <script src="assets/vendor_assets/js/venobox.min.js"></script>
    <script src="assets/vendor_assets/js/waypoints.min.js"></script>
    <script src="assets/theme_assets/js/dashboard.js"></script>
    <script src="assets/theme_assets/js/main.js"></script>
    <script src="assets/theme_assets/js/map.js"></script>
    <!-- endinject-->
</body>

</html>