<?php
include 'inc/connect.php';
require_once("inc/banned_ip_russia.php");
session_start();

error_reporting(E_PARSE);

$username = $_SESSION['account']['userData']['username'];

function refer($conn, $username)
{
    if (isset($_GET['refer'])) {

        $ip = $_SERVER['REMOTE_ADDR'];
        $refer_user = $_GET['refer'];
        $expire_premium = "100 days";
        $premium =  "1";

        $S_USER_REFER = "SELECT * FROM users WHERE username='$refer_user'";
        $query3 = mysqli_query($conn, $S_USER_REFER);
        $row = mysqli_fetch_array($query3);

        $link = $row['open_link'];

        $d_n_r = ++$link;

        $select_from_refer = "SELECT * FROM refer WHERE ip='$ip'";
        $refer_query = mysqli_query($conn, $select_from_refer);


        if (mysqli_num_rows($refer_query) == 0) {
            $affiliate_user = "UPDATE users SET open_link='$d_n_r' WHERE username='$refer_user'";
            $query2 = mysqli_query($conn, $affiliate_user);

            $sql = "INSERT INTO refer (creator, username, ip) VALUES ('$refer_user', '$username', '$ip')";
            $query4 = mysqli_query($conn, $sql);
        } else {
            header("location: https://".$_SERVER['SERVER_NAME']."/index");
        }
    }
}

refer($conn, $username);


$users = "SELECT * FROM users WHERE username='$username'";
$query5 = mysqli_query($conn, $users);
$rows = mysqli_fetch_array($query5);

if ($rows['open_link'] >= 20) {
    $plan_premium = "UPDATE users SET premium='1', `expire premium`='permanent' WHERE username='$username'";
    $plan_q = mysqli_query($conn, $plan_premium);
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
    <section class="hero-area bgimage">
        <div class="bg_image_holder">
            <img src="img/hero-image01.png" alt="background-image">
        </div>
        <div class="hero-content content_above">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero__content__title">
                                <h1 class="display-3">
                                    Build A Better
                                    <br />
                                    Digital Product Marketplace
                                </h1>
                                <p class="tagline">TemplateRo is the most powerful, & customizable template for Easy Digital
                                    Downloads Products</p>
                            </div>
                            <!-- end .hero__btn-area-->
                            <div class="search-area">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="search_box">
                                            <form action="#">
                                                <input type="text" class="text_field" placeholder="Search your products...">
                                                <div class="search__select select-wrap">
                                                    <select name="category" class="select--field">
                                                        <option value="">All Categories</option>
                                                        <option value="">PSD</option>
                                                        <option value="">HTML</option>
                                                        <option value="">WordPress</option>
                                                        <option value="">Plugins</option>
                                                    </select>
                                                    <span class="icon-arrow-down"></span>
                                                </div><!-- ends: .select-wrap -->
                                                <button type="submit" class="search-btn btn--lg btn-primary">Search Now</button>
                                            </form>
                                        </div><!-- end .search_box -->
                                    </div>
                                </div>
                            </div>
                            <!--start .search-area -->
                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->
                </div><!-- ends: .container -->
            </div><!-- ends: .contact_wrapper -->
        </div><!-- ends: hero-content -->
    </section><!-- ends: .hero-area -->
    <section class="featured-area section--padding bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Featured Products</h1>
                        <p>Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus
                            condimentum eleifend kerat.</p>
                    </div>
                </div><!-- Ends: .col-md-12 -->
                <div class="col-md-12">
                    <div class="product-slide-area owl-carousel">
                        <div class="product-single">
                            <div class="featured-badge">
                                <span>Featured</span>
                            </div>
                            <div class="product-thumb">
                                <figure>
                                    <img src="img/fp01.png" alt="" class="img-fluid">
                                    <figcaption>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="">
                                                    <span class="icon-basket"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">Live Demo</a>
                                            </li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div><!-- Ends: .product-thumb -->

                        </div><!-- Ends: .product-single -->
                        <div class="product-single">
                            <div class="featured-badge">
                                <span>Featured</span>
                            </div>
                            <div class="product-thumb">
                                <figure>
                                    <img src="img/fp02.png" alt="" class="img-fluid">
                                    <figcaption>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="">
                                                    <span class="icon-basket"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">Live Demo</a>
                                            </li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div><!-- Ends: .product-thumb -->
                            <div class="product-excerpt">
                                <h3>
                                    <a href="">TheBizz Wordpress Theme</a>
                                </h3>
                                <ul class="titlebtm">
                                    <li>
                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                        <p>
                                            <a href="#">AazzTech</a>
                                        </p>
                                    </li>
                                    <li class="product_cat">
                                        in
                                        <a href="#">Wordpress</a>
                                    </li>
                                </ul>
                                <ul class="product-facts clearfix">
                                    <li class="price"><span>$59</span></li>
                                    <li class="sells">
                                        <span class="icon-basket"></span>171
                                    </li>
                                    <li class="product-fav">
                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
                                    </li>
                                    <li class="product-rating">
                                        <ul class="list-unstyled">
                                            <li class="stars">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </li>
                                            <li class="total-rating">
                                                <span>(4)</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- Ends: .product-excerpt -->
                        </div><!-- Ends: .product-single -->
                        <div class="product-single">
                            <div class="featured-badge">
                                <span>Featured</span>
                            </div>
                            <div class="product-thumb">
                                <figure>
                                    <img src="img/fp01.png" alt="" class="img-fluid">
                                    <figcaption>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="">
                                                    <span class="icon-basket"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">Live Demo</a>
                                            </li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div><!-- Ends: .product-thumb -->
                            <div class="product-excerpt">
                                <h3>
                                    <a href="">TemplateRo EDD Template</a>
                                </h3>
                                <ul class="titlebtm">
                                    <li>
                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                        <p>
                                            <a href="#">AazzTech</a>
                                        </p>
                                    </li>
                                    <li class="product_cat">
                                        in
                                        <a href="#">HTML</a>
                                    </li>
                                </ul>
                                <ul class="product-facts clearfix">
                                    <li class="price"><span>$22</span></li>
                                    <li class="sells">
                                        <span class="icon-basket"></span>364
                                    </li>
                                    <li class="product-fav">
                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
                                    </li>
                                    <li class="product-rating">
                                        <ul class="list-unstyled">
                                            <li class="stars">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </li>
                                            <li class="total-rating">
                                                <span>(4)</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- Ends: .product-excerpt -->
                        </div><!-- Ends: .product-single -->
                    </div>
                    <div class="more-item-btn">
                        <a href="" class="btn btn--lg btn-secondary">More Featured Items</a>
                    </div>
                </div><!-- Ends: .produ-slide-area -->
            </div>
        </div>
    </section><!-- ends: .featured-area -->
    <section class="latest-product section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Newest Products</h1>
                        <p>Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus
                            condimentum eleifend kerat.</p>
                    </div>
                </div><!-- Ends: .col-md-12 -->
                <div class="col-lg-12">
                    <div class="product-list">
                        <ul class="nav nav__product-list" id="lp-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-one" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">All Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-two" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">WordPress</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Site Template</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-four" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">PSD Template</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-five" data-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false">Joomla</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-six" data-toggle="tab" href="#tab6" role="tab" aria-controls="tab6" aria-selected="false">User Interface</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-seven" data-toggle="tab" href="#tab7" role="tab" aria-controls="tab7" aria-selected="false">Landing Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-eight" data-toggle="tab" href="#tab8" role="tab" aria-controls="tab8" aria-selected="false">Software</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="lp-tab-content">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-two">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab-three">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab-four">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab-five">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab-six">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <!-- Start .tab-pane -->
                            <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab-seven">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                            <!-- Start .tab-pane -->
                            <div class="tab-pane fade" id="tab8" role="tabpanel" aria-labelledby="tab-eight">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product1.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">E-commerce Shopping Cart</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">WordPress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product2.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TheBizz Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                                        <p><a href="#">Aaazztech</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product3.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TemplateRo EDD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">EchoTheme</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">HTML</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product4.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">AppPress PSD Template</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">PSD</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product5.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">Rida Wordpress Theme</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Wordpress</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="img/product6.png" alt="" class="img-fluid">
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><span class="icon-basket"></span></a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="">TableGen Wordpress Plugin</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img class="auth-img" src="img/auth-img3.png" alt="author image">
                                                        <p><a href="#">Theme-Valley</a></p>
                                                    </li>
                                                    <li class="product_cat">
                                                        in
                                                        <a href="#">Plugin</a>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">$24</li>
                                                    <li class="sells">
                                                        <span class="icon-basket"></span>141
                                                    </li>
                                                    <li class="product-fav">
                                                        <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
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
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                        </div>
                        <div class="text-center m-top-20">
                            <a href="" class="btn btn--lg btn-primary">All New Products</a>
                        </div>
                    </div>
                    <!-- Ends: .product-list -->
                </div>
            </div>
        </div>
    </section><!-- ends: .latest-product -->
    <section class="services ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-lock"></span>
                        <h4>Secure Paument</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-like"></span>
                        <h4>Quality Products</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-wallet"></span>
                        <h4>14 Days Money Backs</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-people"></span>
                        <h4>24/7 Customer Care</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
            </div>
        </div>
    </section><!-- ends: .services -->
    <section class="counter-up-area bgimage">
        <div class="bg_image_holder">
            <img src="img/countbg.png" alt="">
        </div><!-- start .container -->
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="counter-up">
                        <div class="counter warning">
                            <span class="icon-briefcase"></span>
                            <?php
                            $sql1 = "SELECT id FROM products";
                            $result = mysqli_query($conn, $sql1);
                            $num_product = mysqli_num_rows($result);
                            ?>
                            <span class="count_up"><?php echo $num_product;  ?></span>
                            <p>Items for sale</p>
                        </div><!-- ends: .counter -->
                        <div class="counter info">
                            <span class="icon-basket"></span>
                            <span class="count_up">68,257</span>
                            <p>Total Sale</p>
                        </div><!-- ends: .counter -->
                        <div class="counter secondary">
                            <span class="icon-emotsmile"></span>
                            <span class="count_up">25,567</span>
                            <p>Happy Customers</p>
                        </div><!-- ends: .counter -->
                        <?php
                        $user_count =  "SELECT id FROM users";
                        $result_cnt = mysqli_query($conn, $user_count);
                        $num_users = mysqli_num_rows($result_cnt);
                        ?>
                        <div class="counter danger">
                            <span class="icon-people"></span>
                            <span class="count_up"><?php echo $num_users; ?></span>
                            <p>Members</p>
                        </div><!-- ends: .counter -->
                    </div><!-- ends: .counter-up -->
                </div><!-- end .col-md-12 -->
            </div>
        </div><!-- end .container -->
    </section>
    <section class="working-process section--padding">
        <div class="container">
            <div class="row">
                <!-- Start Section Title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>It Works Really Easy</h1>
                        <p>Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus
                            condimentum
                            eleifend kerat.
                        </p>
                    </div>
                </div>
                <!-- Ends: .col-md-12/Section Title -->
                <div class="col-md-12 step-single">
                    <div class="step-count">
                        <span>Step 1</span>
                        <span><i class="fa fa-long-arrow-down"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6 step-text r-padding">
                            <div>
                                <h2>Choose Your Template</h2>
                                <p>Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis.
                                    Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien
                                    interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.</p>
                            </div>
                        </div>
                        <div class="col-md-6 step-image l-padding">
                            <div>
                                <img src="img/step01.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div><!-- Ends .step-single -->
                <div class="col-md-12 step-single">
                    <div class="step-count step-count2">
                        <span>Step 2</span>
                        <span><i class="fa fa-long-arrow-down"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6 step-image r-padding">
                            <div>
                                <img src="img/step01.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6 step-text l-padding">
                            <div>
                                <h2>Add it to Shopping Cart</h2>
                                <p>Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis.
                                    Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien
                                    interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- Ends .step-single -->
                <div class="col-md-12 step-single">
                    <div class="step-count step-last">
                        <span>Step 3</span>
                        <span class="icon-emotsmile"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6 step-text r-padding">
                            <div>
                                <h2>Purchase Your Product</h2>
                                <p>Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis.
                                    Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien
                                    interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.</p>
                            </div>
                        </div>
                        <div class="col-md-6 step-image l-padding">
                            <div>
                                <img src="img/step01.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div><!-- Ends .step-single -->
            </div>
        </div>
    </section><!-- ends: .wroking-process -->
    <section class="testimonial2 bgimage">
        <div class="bg_image_holder">
            <img src="img/testimonial-bg.png" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title section-title-light">
                        <h1>We’ve Made Happy Over 2 Million Customers</h1>
                    </div>
                </div><!-- Ends: .col-md-12 -->
                <div class="col-md-12 testimonial-carousel">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-md-12 slider-for">
                            <div class="tsingle">
                                <span class="quotei">
                                    <i class="fa fa-quote-right"></i>
                                </span>
                                <p>Pellentesque facilisis the ullamcorper sapien interdum is the magna over was kelleu pellen
                                    tesque kequis. The mate was a mighty sailing Skipper this knew it was much more walking.</p>
                                <h3>@Patrick Pool</h3>
                                <span class="auth-title">Product Designer</span>
                            </div><!-- Ends: .tsingle -->
                            <div class="tsingle">
                                <span class="quotei">
                                    <i class="fa fa-quote-right"></i>
                                </span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat exercitationem illo dolor
                                    animi a harum, mollitia quas suscipit sit voluptatibus facilis fugit, ullam consequuntur
                                    cumque.
                                </p>
                                <h3>@Jhonathan Scott</h3>
                                <span class="auth-title">UI Expert</span>
                            </div><!-- Ends: .tsingle -->
                            <div class="tsingle">
                                <span class="quotei">
                                    <i class="fa fa-quote-right"></i>
                                </span>
                                <p>Pellentesque facilisis the ullamcorper sapien interdum is the magna over was kelleu pellen
                                    tesque kequis. The mate was a mighty sailing Skipper this knew it was much more walking.
                                </p>
                                <h3>@Liam Planket</h3>
                                <span class="auth-title">Web Developer</span>
                            </div><!-- Ends: .tsingle -->
                            <div class="tsingle">
                                <span class="quotei">
                                    <i class="fa fa-quote-right"></i>
                                </span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat exercitationem illo dolor
                                    animi a harum, mollitia quas suscipit sit voluptatibus facilis fugit, ullam consequuntur
                                    cumque.
                                </p>
                                <h3>@Fizz Rahman</h3>
                                <span class="auth-title">UI Expert</span>
                            </div><!-- Ends: .tsingle -->
                            <div class="tsingle">
                                <span class="quotei">
                                    <i class="fa fa-quote-right"></i>
                                </span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, cupiditate, cumque iste
                                    eos delectus, nisi culpa doloremque cum impedit velit quibusdam! Sapiente deserunt debitis
                                    totam.
                                </p>
                                <h3>@Mash Mortaza</h3>
                                <span class="auth-title">UI Expert</span>
                            </div><!-- Ends: .tsingle -->
                            <div class="tsingle">
                                <span class="quotei">
                                    <i class="fa fa-quote-right"></i>
                                </span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat exercitationem illo dolor
                                    animi a harum, mollitia quas suscipit sit voluptatibus facilis fugit, ullam consequuntur
                                    cumque.
                                </p>
                                <h3>@Jhonathan Scott</h3>
                                <span class="auth-title">UI Expert</span>
                            </div><!-- Ends: .tsingle -->
                        </div><!-- Ends: .slider-for -->
                    </div>
                </div><!-- Ends: .testimonial-carousel -->
            </div>
        </div><!-- ends: .container -->
        <div class="slider-bottom-nav content_above">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 slider-nav">
                        <div>
                            <span>
                                <img src="img/c1.jpg" alt="" class="img-fluid rounded-circle">
                            </span>
                        </div>
                        <div>
                            <span>
                                <img src="img/c2.jpg" alt="" class="img-fluid rounded-circle">
                            </span>
                        </div>
                        <div>
                            <span>
                                <img src="img/c3.jpg" alt="" class="img-fluid rounded-circle">
                            </span>
                        </div>
                        <div>
                            <span>
                                <img src="img/c4.jpg" alt="" class="img-fluid rounded-circle">
                            </span>
                        </div>
                        <div>
                            <span>
                                <img src="img/c5.jpg" alt="" class="img-fluid rounded-circle">
                            </span>
                        </div>
                        <div>
                            <span>
                                <img src="img/c2.jpg" alt="" class="img-fluid rounded-circle">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Ends: .slider-bottom-nav -->
    </section><!-- ends: .testimonial2 -->
    <section class="cta">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Join Our Community Club</h1>
                    </div>
                </div>
                <!-- CTA Single -->
                <div class="col-md-5 cta-single">
                    <h3>Want to Sell Your Products</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga repudiandae veritatis qui officiis
                        molestiae
                        quas ipsa id sint quia amet consectetur adipisicing elit.</p>
                    <?php

                    if (!isset( $_SESSION['account']['userData']['username'])) {
                        echo '<a href="signup.php" class="btn btn--lg btn-primary">Become an Author</a>';
                    }

                    ?>
                </div>
                <div class="col-md-2 cta-divider">
                    <span>OR</span>
                </div>
                <div class="col-md-5 cta-single">
                    <h3>Start Shopping Today</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga repudiandae veritatis qui officiis
                        molestiae
                        quas ipsa id sint quia amet consectetur adipisicing elit.</p>
                    <?php

                    if (!isset( $_SESSION['account']['userData']['username'])) {
                        echo '<a href="signup.php" class="btn btn--lg btn-secondary">Create an Account</a>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </section><!-- ends: .cta -->
    <section class="clients-logo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="partners">
                        <div class="partner">
                            <img src="img/cl01.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl02.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl03.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl04.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl02.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl03.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl04.png" alt="partner image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ends: .clients-logo -->
    <section class="subscribe bgimage">
        <div class="bg_image_holder">
            <img src="img/subscribe-bg.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 subscribe-inner">
                    <div class="envelope-svg">
                        <img src="img/svg/newsletter.svg" alt="" class="svg">
                    </div>
                    <p>Subscribe to get the latest themes, templates and offer information. Don't worry, we won't send
                        spam!</p>
                    <form action="#" class="subscribe-form">
                        <div class="form-group">
                            <input type="text" placeholder="Enter your email address" required>
                            <button type="submit" class="btn btn--sm btn-primary">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- ends: .subscribe -->
    <?php require_once("inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script src="vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="vendor_assets/js/bootstrap/popper.js"></script>
    <script src="vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="vendor_assets/js/chart.bundle.min.js"></script>
    <script src="vendor_assets/js/grid.min.js"></script>
    <script src="vendor_assets/js/jquery-ui.min.js"></script>
    <script src="vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="vendor_assets/js/owl.carousel.min.js"></script>
    <script src="vendor_assets/js/select2.full.min.js"></script>
    <script src="vendor_assets/js/slick.min.js"></script>
    <script src="vendor_assets/js/tether.min.js"></script>
    <script src="vendor_assets/js/trumbowyg.min.js"></script>
    <script src="vendor_assets/js/venobox.min.js"></script>
    <script src="vendor_assets/js/waypoints.min.js"></script>
    <script src="theme_assets/js/dashboard.js"></script>
    <script src="theme_assets/js/main.js"></script>
    <script src="theme_assets/js/map.js"></script>
    <!-- endinject-->
</body>

</html>