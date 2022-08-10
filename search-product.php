<?php
require_once("inc/banned_ip_russia.php");
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
                                <h1>7,685 Premium Templates & Themes</h1>
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
    <div class="filter-area product-filter-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-bar">
                        <div class="filter__option filter--dropdown">
                            <a href="#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories
                                <span class="icon-arrow-down"></span>
                            </a>
                            <ul class="custom_dropdown custom_drop2 dropdown-menu" aria-labelledby="drop1">
                                <li>
                                    <a href="#">Wordpress
                                        <span>35</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Landing Page
                                        <span>45</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Psd Template
                                        <span>13</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Plugins
                                        <span>08</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">HTML Template
                                        <span>34</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Components
                                        <span>78</span>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end .filter__option -->
                        <div class="filter__option filter--dropdown">
                            <a href="#" id="drop2" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By
                                <span class="icon-arrow-down"></span>
                            </a>
                            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop2">
                                <li>
                                    <a href="#">Trending items</a>
                                </li>
                                <li>
                                    <a href="#">Popular items</a>
                                </li>
                                <li>
                                    <a href="#">New items </a>
                                </li>
                                <li>
                                    <a href="#">Best seller </a>
                                </li>
                                <li>
                                    <a href="#">Best rating </a>
                                </li>
                            </ul>
                        </div><!-- end .filter__option -->
                        <div class="filter__option filter--dropdown filter--range">
                            <a href="#" id="drop3" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Price Range
                                <span class="icon-arrow-down"></span>
                            </a>
                            <div class="custom_dropdown dropdown-menu" aria-labelledby="drop3">
                                <div class="range-slider price-range"></div>
                                <div class="price-ranges">
                                    <span class="from rounded">$30</span>
                                    <span class="to rounded">$300</span>
                                </div>
                            </div>
                        </div><!-- end .filter__option -->
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
            </div>
        </div>
    </div><!-- end .filter-area -->
    <section class="product-grid p-bottom-100">
        <div class="container">
            <div class="row">
                <!-- Start .product-list -->
                <div class="col-md-12 product-list">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single">
                                <div class="product-thumb">
                                    <div class="s-promotion">-40%</div>
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
                        </div><!-- ends: .col-lg-4 -->
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
                        </div><!-- ends: .col-lg-4 -->
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
                        </div><!-- ends: .col-lg-4 -->
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
                        </div><!-- ends: .col-lg-4 -->
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
                                            <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                            <p><a href="#">EchoTheme</a></p>
                                        </li>
                                        <li class="product_cat">
                                            in
                                            <a href="#">Worpress</a>
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
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single">
                                <div class="product-thumb">
                                    <div class="s-promotion">-40%</div>
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
                                            <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                            <p><a href="#">Aaazztech</a></p>
                                        </li>
                                        <li class="product_cat">
                                            in
                                            <a href="#">Plugins</a>
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
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single">
                                <div class="product-thumb">
                                    <div class="s-promotion">-40%</div>
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
                        </div><!-- ends: .col-lg-4 -->
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
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single">
                                <div class="product-thumb">
                                    <div class="s-promotion">-40%</div>
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
                        </div><!-- ends: .col-lg-4 -->
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
                                            <img class="auth-img" src="img/auth-img2.png" alt="author image">
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
                        </div><!-- ends: .col-lg-4 -->
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
                                            <img class="auth-img" src="img/auth-img2.png" alt="author image">
                                            <p><a href="#">EchoTheme</a></p>
                                        </li>
                                        <li class="product_cat">
                                            in
                                            <a href="#">Worpress</a>
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
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single">
                                <div class="product-thumb">
                                    <div class="s-promotion">-40%</div>
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
                                            <p><a href="#">Aaazztech</a></p>
                                        </li>
                                        <li class="product_cat">
                                            in
                                            <a href="#">Plugins</a>
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
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single">
                                <div class="product-thumb">
                                    <div class="s-promotion">-40%</div>
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
                        </div><!-- ends: .col-lg-4 -->
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
                        </div><!-- ends: .col-lg-4 -->
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
                        </div><!-- ends: .col-lg-4 -->
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