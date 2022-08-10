<?php
require_once("inc/banned_ip_russia.php");
require_once("inc/connect.php");
session_start();

if (isset( $_SESSION['account']['userData']['username'])) {
    $username = $_SESSION['account']['userData']['username'];
}

$verify_aleready_own_product = "SELECT * FROM library WHERE owner='$username'";
$verify_aleready_own_product_result = mysqli_query($conn, $verify_aleready_own_product);
$verify_aleready_own_product_ver = mysqli_num_rows($verify_aleready_own_product_result);

if (isset($_GET['cart'])) {
    if ($verify_aleready_own_product_ver == 0) {
        $cart = $_GET['cart'];
        $sel = "SELECT * FROM products WHERE id='$cart'";
        $q = mysqli_query($conn, $sel);
        $num = mysqli_num_rows($q);

        $veri = "SELECT * FROM products WHERE id='$cart'";
        $q2 = mysqli_query($conn, $veri);
        $f1 = mysqli_fetch_array($q2);

        if ($num == 1 && $f1['creator'] != $username) {
            if (empty($_SESSION['cart']) or empty($_SESSION['cart_price'])) {
                $_SESSION['cart'] = array();
                $_SESSION['cart_price'] = array();
            }
            $marks = $_GET['cart'];

            $product = "SELECT * FROM products WHERE id='$marks'";
            $res = mysqli_query($conn, $product);
            $fetch = mysqli_fetch_array($res);

            if (in_array($marks, $_SESSION['cart'])) {
            } else {
                $add = array_push($_SESSION['cart'], $_GET['cart']);
                $add_price = array_push($_SESSION['cart_price'], $fetch['Product Price']);
                echo '<script>window.location.href = "";</script>';
            }
        }
    }
}

if (isset($_GET['r-favorite'])) {
    $ids = $_GET['r-favorite'];
    if (($ids = array_search($ids, $_SESSION['favorite'])) !== false) {
        unset($_SESSION['favorite'][$ids]);
    }
}

if (isset($_GET['favorite'])) {
    if (empty($_SESSION['favorite'])) {
        $_SESSION['favorite'] = array();
    }

    $fav = $_GET['favorite'];

    if (in_array($fav, $_SESSION['favorite'])) {
    } else {
        $adds = array_push($_SESSION['favorite'], $_GET['favorite']);
        echo '<script>window.location.href = "";</script>';
    }
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
    <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png"></head>
<body class="preload">
    <?php require_once("inc/menu.php"); ?>
    <section class="hero-area2 hero-area3 bgimage">
        <div class="bg_image_holder">
            <img src="img/hero-image01.png" alt="background-image">
        </div>
        <div class="hero-content content_above">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__content__title">
                                <?php
                                $sqls = "SELECT id FROM products";
                                $query = mysqli_query($conn, $sqls);
                                $ro = mysqli_num_rows($query);
                                ?>
                                <h1 id="raimb"><?php echo $ro; ?> Premium Templates & Themes</h1>
                            </div><!-- end .hero__btn-area-->
                            <div class="search-area">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <div class="search_box2">
                                            <form action="#">
                                                <input type="text" class="text_field" placeholder="Search your products...">
                                                <button type="submit" class="search-btn btn--lg btn-primary">Search Now</button>
                                            </form>
                                        </div><!-- end .search_box -->
                                    </div>
                                </div>
                            </div>
                            <!--start .search-area -->
                        </div><!-- end .col-md-12 -->
                    </div>
                </div>
            </div><!-- end .contact_wrapper -->
        </div><!-- end hero-content -->
    </section><!-- ends: .hero-area -->
    <div class="filter-area product-filter-area filter-area2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-bar">
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="price">
                                    <option value="12">12 Items per page</option>
                                    <option value="15">15 Items per page</option>
                                    <option value="25">25 Items per page</option>
                                </select>
                                <span class="icon-arrow-down"></span>
                            </div>
                        </div><!-- end .filter__option -->
                    </div><!-- end .filter-bar -->
                </div><!-- end .col-md-12 -->
            </div><!-- end filter-bar -->
        </div>
    </div><!-- end .filter-area -->
    <section class="product-grid p-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 order-lg-0 order-md-1 order-sm-1 order-1">
                    <aside class="sidebar product--sidebar">
                        <div class="sidebar-card card--category">
                            <a class="card-title" href="#collapse1" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                                <h5>Categories
                                    <span class="icon-arrow-down"></span>
                                </h5>
                            </a>
                            <div class="collapse show collapsible-content" id="collapse1">
                                <ul class="card-content">
                                    <?php
                                    $sql2 = "SELECT * FROM category";

                                    $result12 = $conn->query($sql2);

                                    if ($result12->num_rows > 0) {

                                        while ($row = $result12->fetch_assoc()) {
                                    ?>
                                            <li>
                                                <a href="?category=<?php echo $row['tag']; ?>">
                                                    <?php echo $row['category name']; ?>
                                                    <span class="item-count"> 45</span>
                                                </a>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div><!-- end .collapsible_content -->
                        </div><!-- end .sidebar-card -->
                        <div class="sidebar-card card--filter">
                            <a class="card-title" href="#collapse2" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                                <h5>Filter Products
                                    <span class="icon-arrow-down"></span>
                                </h5>
                            </a>
                            <div class="collapse show collapsible-content" id="collapse2">
                                <ul class="card-content">
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="opt1" class="custom-control-input" name="filter_opt">
                                            <label class="custom-control-label" for="opt1">Trending Products</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="opt2" class="custom-control-input" name="filter_opt">
                                            <label class="custom-control-label" for="opt2">Popular Products</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="opt3" class="custom-control-input" name="filter_opt">
                                            <label class="custom-control-label" for="opt3">New Products</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="opt4" class="custom-control-input" name="filter_opt">
                                            <label class="custom-control-label" for="opt4">Best Seller</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="opt5" class="custom-control-input" name="filter_opt">
                                            <label class="custom-control-label" for="opt5">Best Rating</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="opt6" class="custom-control-input" name="filter_opt">
                                            <label class="custom-control-label" for="opt6">Free Support</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="opt7" class="custom-control-input" name="filter_opt">
                                            <label class="custom-control-label" for="opt7">On Sale</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- end .sidebar-card -->
                        <div class="sidebar-card card--slider">
                            <a class="card-title" href="#collapse3" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                                <h5>Filter Products
                                    <span class="icon-arrow-down"></span>
                                </h5>
                            </a>
                            <div class="collapse show collapsible-content" id="collapse3">
                                <div class="card-content">
                                    <div class="range-slider price-range"></div>
                                    <div class="price-ranges">
                                        <span class="from rounded">$30</span>
                                        <span class="to rounded">$300</span>
                                    </div>
                                    <div class="search-update">
                                        <a href="" class="btn btn-sm btn-primary">Search Update</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end .sidebar-card -->
                        <div class="sidebar-card card--category card--date-range">
                            <a class="card-title" href="#collapse4" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">
                                <h5>Date Range
                                    <span class="icon-arrow-down"></span>
                                </h5>
                            </a>
                            <div class="collapse show collapsible-content" id="collapse4">
                                <ul class="card-content">
                                    <li>
                                        <a href="#">
                                            Last Week
                                            <span class="item-count">35</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Last Month
                                            <span class="item-count"> 45</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Last 6 Month
                                            <span class="item-count">13</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Last Year
                                            <span class="item-count">08</span>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- end .collapsible_content -->
                        </div><!-- end .sidebar-card -->
                    </aside><!-- end aside -->
                </div><!-- end .col-md-3 -->
                <div class="col-xl-9 col-lg-8 col-md-12 order-lg-1 order-md-0 order-sm-0 order-0 product-list">
                    <div class="row">
                        <?php
                        if (isset($_GET['all'])) {

                            unset($_SESSION['cart']);
                            unset($_SESSION['cart_price']);
                        }
                        ?>

                        <?php
                        $fetch_product = "SELECT * FROM products WHERE `Product Price` >= 1 AND `status` = 'active' LIMIT 3";

                        //execute the query

                        $result = $conn->query($fetch_product);

                        if ($result->num_rows > 0) {
                            //output data of each row
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <?php

                                $users = "SELECT * FROM users WHERE username ='" . $row['creator'] . "'";
                                $resultss = mysqli_query($conn, $users);
                                $rows = mysqli_fetch_array($resultss);

                                if (isset($_GET['favorite'])) {
                                    if (empty($_SESSION['favorite'])) {
                                        $_SESSION['favorite'] = array();
                                    }

                                    $fav = $_GET['favorite'];

                                    if (in_array($fav, $_SESSION['favorite'])) {
                                    } else {
                                        $adds = array_push($_SESSION['favorite'], $_GET['favorite']);
                                        echo '<script>window.location.href = "";</script>';
                                    }
                                }
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-single latest-single">
                                        <div class="featured-badge"><span>Featured</span></div>
                                        <div class="product-thumb">
                                            <figure>
                                                <img src="view-image.php?image_id=<?php echo $row['Main Image']; ?>" alt="" class="img-fluid">
                                                <figcaption>
                                                    <ul class="list-unstyled">
                                                        <?php if ($row['creator'] != $username) { ?><li><a href="?cart=<?php echo $row['id']; ?>"><span class="icon-basket"></span></a></li><?php } ?>
                                                        <li><a href="<?php echo $row['Live Demo']; ?>">Live Demo</a></li>
                                                    </ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <!-- Ends: .product-thumb -->
                                        <div class="product-excerpt">
                                            <h5>
                                                <a href="single-product-v2?id=<?php echo $row['id']; ?>"><?php echo $row['Product Name']; ?></a>
                                            </h5>
                                            <ul class="titlebtm">
                                                <li>
                                                    <?php if (!empty($rows['avatar'])) {
                                                        echo '<img  class="auth-img" src="https://cdn.templatero.rf.gd/view-image.php?image_id=' . $rows['avatar'] . '"alt="user avatar">';
                                                    } else {
                                                        echo '<style>.d {background-color:#' . $hex_string = bin2hex(openssl_random_pseudo_bytes(3)) . '; border-radius: 100%; width: 30px; height: 30px; justify-content: center; align-items: center; display: flex; font-size: 20px; text-transform: uppercase; color: white;}</style> <div class="auth-img d">' . $_SESSION['account']['userData']['username'][0] . '</div>';
                                                    } ?>
                                                    <p><a href="author?creator=<?php echo $row['creator']; ?>"><?php echo $row['creator'];  ?></a></p>
                                                </li>
                                            </ul>
                                            <ul class="product-facts clearfix">
                                                <li class="price"><?php if ($row['Product Price'] == 0) {
                                                                        echo "Free";
                                                                    } else {
                                                                        echo '&euro;' . $row['Product Price'];
                                                                    } ?></li>
                                                <li class="sells">
                                                    <?php
                                                    $sqls = "SELECT * FROM library WHERE `Product id`='" . $row['id'] . "'";
                                                    $res = mysqli_query($conn, $sqls);
                                                    $num = mysqli_num_rows($res);
                                                    ?>
                                                    <span class="icon-basket"></span><?php echo $num;    ?>
                                                </li>
                                                <li class="product-fav">
                                                    <a href="<?php

                                                                if (!empty($_SESSION['favorite'])) {

                                                                    if (in_array($row['id'], $_SESSION['favorite'])) {
                                                                        echo '?r-favorite=' . $row['id'];
                                                                    } else {
                                                                        echo '?favorite=' . $row['id'];
                                                                    }
                                                                } else {
                                                                    echo '?favorite=' . $row['id'];
                                                                }

                                                                ?>"><?php
                                                                if ($row['creator'] != $username) {
                                                                    if (!empty($_SESSION['favorite'])) {
                                                                        if (in_array($row['id'], $_SESSION['favorite'])) {
                                                                            echo '<i style="color: red;" class="bi bi-heart-fill" title="Add to collection" data-toggle="tooltip"></i>';
                                                                        } else {
                                                                            echo '<span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>';
                                                                        }
                                                                    } else {
                                                                        echo '<span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>';
                                                                    }
                                                                }

                                                                ?> </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Ends: .product-excerpt -->
                                    </div><!-- Ends: .product-single -->
                                </div><!-- ends: .col-lg-4 -->
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <!-- Start Pagination -->
                    <nav class="pagination-default mb-lg-0 mb-30">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav><!-- Ends: .pagination-default -->
                </div>
                <!-- Ends: .product-list -->
            </div>
        </div>
    </section><!-- ends: .product-grid -->
    <section class="cta2 bgimage">
        <div class="bg_image_holder">
            <img src="img/cta-bg.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cta-content">
                        <div class="cta-text">
                            <h2>Ready To Join Our Marketplace!</h2>
                            <p>Grow your marketing and be happy with your online business</p>
                        </div>
                        <div class="cta-btn">
                            <a href="" class="btn btn--md btn-primary">Join Us Today</a>
                        </div>
                    </div>
                </div><!-- ends: .col-md-12 -->
            </div>
        </div>
    </section><!-- ends: .cta2 -->
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