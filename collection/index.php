<?php
require_once("../inc/connect.php");
session_start();
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
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/trumbowyg.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/venobox.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/css/style.css">
    <!-- endinject -->
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-32x32.png">
    <style>
        .f-f-c {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .btn-pr {
            background-color: #f9430a;
            color: #fff;
        }
    </style>
</head>

<body class="preload">
    <?php require_once("../inc/menu.php"); ?>
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
                    </div><!-- ends: .filter-bar -->
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
        </div>
    </div><!-- ends: .filter-area -->
    <section class="latest-product p-bottom-100">
        <div class="container">

            <div class="row">
                <!-- Start .product-list -->
                <div class="col-md-12 product-list">
                    <div class="row">
                        <?php

                        if (isset($_GET['r-favorite'])) {
                            $ids = $_GET['r-favorite'];
                            if (($ids = array_search($ids, $_SESSION['favorite'])) !== false) {
                                unset($_SESSION['favorite'][$ids]);
                            }
                        }

                        if (!empty($_SESSION['favorite'])) {
                            $id = $_SESSION['cart'];

                            foreach ($id as $list) {
                                $f = "'" . $list . "'";
                                $nn[] = $f;
                            }

                            $where =  implode(',', $nn);

                            $fetch_products = "SELECT * FROM products WHERE id IN ($where)";
                            $result = $conn->query($fetch_products);

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
                                                    <img src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>view-image.php?image_id=<?php echo $row['Main Image']; ?>" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">

                                                            <li><a href="?cart=<?php echo $row['id']; ?>"><span class="icon-basket"></span></a></li>
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
                                                        <img class="auth-img" src="view-image.php?image_id=<?php echo $rows['avatar']; ?>" alt="author image">
                                                        <p><a href="author?creator=<?php echo $row['creator']; ?>"><?php echo $row['creator'];  ?></a></p>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price"><?php if ($row['Product Price'] == 0) {
                                                                            echo "Free";
                                                                        } else {
                                                                            echo $row['Product Price'] . '&euro;';
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
                                                        <a href="<?php if (in_array($row['id'], $_SESSION['favorite'])) {
                                                                        echo '?r-favorite=' . $row['id'];
                                                                    } else {
                                                                        echo '?favorite=' . $row['id'];
                                                                    } ?>"><span <?php if (!empty($_SESSION['favorite'])) {
                                                                                    if (in_array($row['id'], $_SESSION['favorite'])) {
                                                                                        echo 'style="color: red;"';
                                                                                    }
                                                                                } ?> class="icon-heart" title="Add to collection" data-toggle="tooltip"></span></A>
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
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-lg-4 -->
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <div class="f-f-c">
                                <div class="alert alert-warning" role="alert" bis_skin_checked="1">
                                    <strong>Collection is feeling lonely, don't leave it empty :(</strong>
                                    <Br>If you click the heart icon on the product card you will add this item to your collection!
                                </div>
                            </div>
                            <div style=" margin:auto; justify-content:Center; display:flex;">
                                <a href="category-grid.php" class="btn btn-lg btn-pr">View All Products</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div><!-- Ends: .product-list -->
            </div>
        </div>
    </section>

    <?php require_once("../inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/bootstrap/popper.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/chart.bundle.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/grid.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/select2.full.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/slick.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/tether.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/trumbowyg.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/venobox.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/waypoints.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/theme_assets/js/dashboard.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/theme_assets/js/main.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/theme_assets/js/map.js"></script>
    <!-- endinject-->
</body>

</html>