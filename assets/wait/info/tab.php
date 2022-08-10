<?php
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
        <link rel="stylesheet" href="../../vendor_assets/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="../../vendor_assets/css/animate.css">
        <link rel="stylesheet" href="../../vendor_assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../vendor_assets/css/jquery-ui.css">
        <link rel="stylesheet" href="../../vendor_assets/css/line-awesome.min.css">
        <link rel="stylesheet" href="../../vendor_assets/css/magnific-popup.css">
        <link rel="stylesheet" href="../../vendor_assets/css/owl.carousel.css">
        <link rel="stylesheet" href="../../vendor_assets/css/select2.min.css">
        <link rel="stylesheet" href="../../vendor_assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="../../vendor_assets/css/slick.css">
        <link rel="stylesheet" href="../../vendor_assets/css/trumbowyg.min.css">
        <link rel="stylesheet" href="../../vendor_assets/css/venobox.css">
        <link rel="stylesheet" href="../../css/style.css">
        <!-- endinject -->
        <!-- Favicon Icon -->
        <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png">
    </head>

<body class="preload">
    <?php require_once("../../../inc/menu.php"); ?>
    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-contents">
                        <h2 class="page-title">Tabs</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Tabs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->
    <section class="p-top-100 p-bottom-70 bgcolor">
        <div class="shortcode_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shortcode_module_title">
                            <div class="dashboard__title">
                                <h3>Tab 1</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shortcode_modules">
                            <div class="author-info-tabs ">
                                <ul class="nav nav-tabs" id="author-tab" role="tablist">
                                    <li>
                                        <a class="active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                    </li>
                                    <li>
                                        <a id="items-tab" data-toggle="tab" href="#items" role="tab" aria-controls="items" aria-selected="false">Author Items</a>
                                    </li>
                                    <li>
                                        <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                    </li>
                                    <li>
                                        <a id="followers-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="followers" aria-selected="false">Followers</a>
                                    </li>
                                    <li>
                                        <a id="following-tab" data-toggle="tab" href="#following" role="tab" aria-controls="following" aria-selected="false">Following</a>
                                    </li>
                                </ul><!-- Ends: .nav-tabs -->
                                <div class="tab-content" id="author-tab-content">
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="author_module about_author border-none">
                                            <h3>About
                                                <span>AazzTech</span>
                                            </h3>
                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                scelerisque
                                                the mattisleo quam aliquet congue. Nunc placerat mi id nisi interdum mollis.
                                                Praesent pharetra, justo ut scelerisque the mattisleo quam aliquet congue.
                                                Nunc placerat mi id nisi interdum mollis. Prae sent pharetra, justo ut
                                                scelerisque
                                                the mattisleo quam aliquet congue.</p>
                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                scelerisque
                                                the mattisleo quam aliquet congue. Nunc placerat mi id nisi interdum mollis.
                                                Praesent pharetra.</p>
                                        </div>
                                    </div><!-- Ends: .profile-tab -->
                                    <div class="tab-pane fade" id="items" role="tabpanel" aria-labelledby="items-tab">
                                        <div class="items-tab">
                                            <h3>All Items By
                                                <span>AazzTech</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
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
                                                <div class="col-md-6">
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
                                                <div class="col-md-6">
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
                                                <div class="col-md-6">
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
                                            </div>
                                            <!-- Start Pagination -->
                                            <nav class="pagination-default ">
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
                                    </div><!-- Ends: .items-tab -->
                                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="product-title-area product-title-area2">
                                                    <div class="product__title">
                                                        <h3>
                                                            <span class="bold">26</span> Customer Reviews
                                                        </h3>
                                                    </div>
                                                </div><!-- end .product-title-area -->
                                                <div class="thread thread_review thread_review2 border-none">
                                                    <ul class="media-list thread-list bbottom">
                                                        <li class="single-thread btop">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object" src="img/m1.png" alt="Commentator Avatar">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="d-flex flex-wrap">
                                                                        <div class="">
                                                                            <div class="media-heading">
                                                                                <a href="author.html">
                                                                                    <h4>Themexylum</h4>
                                                                                </a>
                                                                                <a href="#" class="rev_item">Mini - Responsive Bootstrap Dashboard</a>
                                                                            </div>
                                                                            <div class="rating product--rating">
                                                                                <ul>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star-half-o"></span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <span class="review_tag">support</span>
                                                                        </div>
                                                                        <div class="rev_time">9 Hours Ago</div>
                                                                    </div>
                                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                                        pharetra,
                                                                        justo ut sceleris que the mattis, leo quam aliquet
                                                                        congue placerat mi id nisi interdum mollis.</p>
                                                                </div>
                                                            </div>
                                                        </li><!-- ends: .single-thread -->
                                                        <li class="single-thread btop">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object" src="img/m4.png" alt="Commentator Avatar">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="d-flex flex-wrap">
                                                                        <div class="">
                                                                            <div class="media-heading">
                                                                                <a href="author.html">
                                                                                    <h4>Jhon Oliver</h4>
                                                                                </a>
                                                                                <a href="#" class="rev_item">Beidea - One Page Parallax</a>
                                                                            </div>
                                                                            <div class="rating product--rating">
                                                                                <ul>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star-half-o"></span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <span class="review_tag">Code Quality</span>
                                                                        </div>
                                                                        <div class="rev_time">3 Hours Ago</div>
                                                                    </div>
                                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                                        pharetra,
                                                                        justo ut sceleris que the mattis, leo quam aliquet
                                                                        congue placerat mi id nisi interdum mollis.</p>
                                                                </div>
                                                            </div>
                                                        </li><!-- ends: .single-thread -->
                                                        <li class="single-thread btop">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object" src="img/m5.png" alt="Commentator Avatar">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="d-flex flex-wrap">
                                                                        <div class="">
                                                                            <div class="media-heading">
                                                                                <a href="author.html">
                                                                                    <h4>PaglaGhora</h4>
                                                                                </a>
                                                                                <a href="#" class="rev_item">Carlos - Creative Agency Template</a>
                                                                            </div>
                                                                            <div class="rating product--rating">
                                                                                <ul>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star"></span>
                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="fa fa-star-half-o"></span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <span class="review_tag">design quality</span>
                                                                        </div>
                                                                        <div class="rev_time">4 Days Ago</div>
                                                                    </div>
                                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent
                                                                        pharetra,
                                                                        justo ut sceleris que the mattis, leo quam aliquet
                                                                        congue placerat mi id nisi interdum mollis.</p>
                                                                </div>
                                                            </div>
                                                        </li><!-- ends: .single-thread -->
                                                    </ul><!-- ends: .media-list -->
                                                </div><!-- ends: .thread -->
                                                <!-- end .comments -->
                                                <!-- Start Pagination -->
                                                <nav class="pagination-default ">
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
                                            </div><!-- end .col-md-12 -->
                                        </div><!-- end .row -->
                                    </div><!-- Ends: .reviews-tab -->
                                    <div class="tab-pane fade" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="product-title-area product-title-area2">
                                                    <div class="product__title">
                                                        <h3>
                                                            <span class="bold">67</span> Followers
                                                        </h3>
                                                    </div>
                                                </div><!-- end .product-title-area -->
                                                <div class="col-lg-12">
                                                    <div class="user_area">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c1.png" alt="" class="rounded-circle">
                                                                        <h6>Chris Bent</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c2.png" alt="" class="rounded-circle">
                                                                        <h6>James Doe</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status"><a href="#" class="btn btn-sm btn-primary">Follow</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c3.png" alt="" class="rounded-circle">
                                                                        <h6>Toni Stack</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status"><a href="#" class="btn btn-sm btn-primary">Follow</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c4.png" alt="" class="rounded-circle">
                                                                        <h6>Martin Croe</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c1.png" alt="" class="rounded-circle">
                                                                        <h6>Hames Anderson</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status"><a href="#" class="btn btn-sm btn-primary">Follow</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c5.png" alt="" class="rounded-circle">
                                                                        <h6>Kenny Robert</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status"><a href="#" class="btn btn-sm btn-primary">Follow</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                        </div>
                                                    </div>
                                                    <!-- end .user_area -->
                                                    <!-- Start Pagination -->
                                                    <nav class="pagination-default ">
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
                                            </div>
                                            <!-- end .col-md-12 -->
                                        </div>
                                        <!-- end .row -->
                                    </div>
                                    <!-- Ends: followers-tab -->
                                    <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="product-title-area product-title-area2">
                                                    <div class="product__title">
                                                        <h3>
                                                            <span class="bold">143</span> Following
                                                        </h3>
                                                    </div>
                                                </div>
                                                <!-- end .product-title-area -->
                                                <div class="col-lg-12">
                                                    <div class="user_area">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c1.png" alt="" class="rounded-circle">
                                                                        <h6>Chris Bent</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c2.png" alt="" class="rounded-circle">
                                                                        <h6>James Doe</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c3.png" alt="" class="rounded-circle">
                                                                        <h6>Toni Stack</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c4.png" alt="" class="rounded-circle">
                                                                        <h6>Martin Croe</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c1.png" alt="" class="rounded-circle">
                                                                        <h6>Hames Anderson</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                            <div class="col-lg-4 col-md-6">
                                                                <div class='user-single card color-dark'>
                                                                    <div class="card-body">
                                                                        <img src="img/c5.png" alt="" class="rounded-circle">
                                                                        <h6>Kenny Robert</h6>
                                                                        <p>Member Since: February 2018</p>
                                                                        <div class="ratings">
                                                                            <span>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            </span>
                                                                            <span>(52)</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <div class="stats">
                                                                            <p><span>868</span> Items</p>
                                                                            <p><span>9864</span> Sales</p>
                                                                        </div>
                                                                        <div class="user__status user--following"><a href="#" class="btn btn-sm btn-secondary">Following</a></div>
                                                                    </div>
                                                                </div><!-- ends: .user-single -->
                                                            </div><!-- ends: .col-lg-4 -->
                                                        </div>
                                                    </div>
                                                    <!-- end .user_area -->
                                                </div>
                                                <!-- Start Pagination -->
                                                <nav class="pagination-default ">
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
                                            <!-- end .col-md-12 -->
                                        </div>
                                        <!-- end .row -->
                                    </div>
                                    <!-- Ends: following-tab -->
                                </div>
                                <!-- ends: .tab-content -->
                            </div>
                            <!-- Ends: .author-info-tabs -->
                        </div>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- ends: .shortcode_wrapper -->
        <div class="shortcode_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shortcode_module_title">
                            <div class="dashboard__title">
                                <h3>Tab 2</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="shortcode_modules">
                            <div class="tab tab2">
                                <div class="item-navigation">
                                    <ul class="nav nav-tabs nav--tabs2" role="tablist">
                                        <li>
                                            <a class="active" href="#product-details1" aria-controls="product-details1" role="tab" data-toggle="tab">Item Details</a>
                                        </li>
                                        <li>
                                            <a href="#product-comment2" aria-controls="product-comment2" role="tab" data-toggle="tab">Comments </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end /.item-navigation -->
                                <div class="tab-content">
                                    <div class="tab-pane product-tab fade show active" id="product-details1">
                                        <h3>Landing Page Details</h3>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque
                                            the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                            Praesent
                                            pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut
                                            scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam
                                            aliquet
                                            congue justo ut scelerisque.</p>
                                    </div>
                                    <!-- end /.tab-content -->
                                    <div class="tab-pane fade product-tab" id="product-comment2">
                                        <div class="thread">
                                            <ul class="media-list thread-list">
                                                <li class="single-thread">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m1.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Themexylum</h4>
                                                                    </a>
                                                                    <span>9 Hours Ago</span>
                                                                </div>
                                                                <a href="#" class="reply-link">Reply</a>
                                                            </div>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                                interdum mollis. </p>
                                                        </div>
                                                    </div><!-- ends: .media -->
                                                    <!-- nested comment markup / replies -->
                                                    <!-- comment reply -->
                                                    <div class="media depth-2 reply-comment">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <form action="#" class="comment-reply-form">
                                                                <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                                <button class="btn btn--md btn-primary">Post Comment</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- comment reply -->
                                                </li><!-- ends: .single-thread-->
                                                <li class="single-thread">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>AutumnTheme</h4>
                                                                    </a>
                                                                    <span>9 Hours Ago</span>
                                                                </div>
                                                                <a href="#" class="reply-link">Reply</a>
                                                            </div>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                                interdum mollis. </p>
                                                        </div>
                                                    </div><!-- ends: .media -->
                                                    <!-- nested comment markup / replies -->
                                                    <!-- comment reply -->
                                                    <div class="media depth-2 reply-comment">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <form action="#" class="comment-reply-form">
                                                                <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                                <button class="btn btn--md btn-primary">Post Comment</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- comment reply -->
                                                </li><!-- ends: .single-thread-->
                                            </ul>
                                            <!-- end /.media-list -->
                                        </div>
                                        <!-- end /.comments -->
                                    </div>
                                    <!-- end /.product-comment -->
                                </div>
                                <!-- end /.tab-content -->
                            </div>
                        </div>
                    </div>
                    <!-- end .col-md-6 -->
                </div>
                <!-- end .row -->
            </div>
            <!-- end .container -->
        </div><!-- ends: .shortcode_wrapper -->
        <div class="shortcode_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shortcode_module_title">
                            <div class="dashboard__title">
                                <h3>Tab 3</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="shortcode_modules">
                            <div class="tab tab3">
                                <div class="item-navigation">
                                    <ul class="nav nav-tabs nav--tabs2" role="tablist">
                                        <li>
                                            <a class="active" href="#product-details2" aria-controls="product-details2" role="tab" data-toggle="tab">
                                                <span class="icon-home"></span> Home
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#product-comment3" aria-controls="product-comment3" role="tab" data-toggle="tab">
                                                <span class="icon-user"></span> Comments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tc3" aria-controls="tc3" role="tab" data-toggle="tab">
                                                <span class="icon-envelope"></span> Message
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tc4" aria-controls="tc4" role="tab" data-toggle="tab">
                                                <span class="icon-settings"></span> Setting
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end /.item-navigation -->
                                <div class="tab-content">
                                    <div class="tab-pane product-tab fade show active" id="product-details2">
                                        <h3>Landing Page Details</h3>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque
                                            the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                            Praesent
                                            pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut
                                            scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam
                                            aliquet
                                            congue justo ut scelerisque.</p>
                                    </div>
                                    <!-- end /.tab-content -->
                                    <div class="tab-pane fade product-tab" id="product-comment3">
                                        <div class="thread">
                                            <ul class="media-list thread-list">
                                                <li class="single-thread">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m1.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Themexylum</h4>
                                                                    </a>
                                                                    <span>9 Hours Ago</span>
                                                                </div>
                                                                <a href="#" class="reply-link">Reply</a>
                                                            </div>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                                interdum mollis. </p>
                                                        </div>
                                                    </div><!-- ends: .media -->
                                                    <!-- nested comment markup / replies -->
                                                    <!-- comment reply -->
                                                    <div class="media depth-2 reply-comment">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <form action="#" class="comment-reply-form">
                                                                <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                                <button class="btn btn--md btn-primary">Post Comment</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- comment reply -->
                                                </li><!-- ends: .single-thread-->
                                                <li class="single-thread">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>AutumnTheme</h4>
                                                                    </a>
                                                                    <span>9 Hours Ago</span>
                                                                </div>
                                                                <a href="#" class="reply-link">Reply</a>
                                                            </div>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                                interdum mollis. </p>
                                                        </div>
                                                    </div><!-- ends: .media -->
                                                    <!-- nested comment markup / replies -->
                                                    <!-- comment reply -->
                                                    <div class="media depth-2 reply-comment">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <form action="#" class="comment-reply-form">
                                                                <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                                <button class="btn btn--md btn-primary">Post Comment</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- comment reply -->
                                                </li><!-- ends: .single-thread-->
                                            </ul>
                                            <!-- end /.media-list -->
                                        </div>
                                        <!-- end /.comments -->
                                    </div>
                                    <!-- end /.product-comment -->
                                    <div class="tab-pane fade product-tab" id="tc3">
                                        <h3>The Message for the mars</h3>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque
                                            the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                            Praesent
                                            pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut
                                            scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam
                                            aliquet
                                            congue justo ut scelerisque.</p>
                                    </div>
                                    <!-- end /.tab-content -->
                                    <div class="tab-pane fade product-tab" id="tc4">
                                        <h3>When UX meets user expectancy.</h3>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque
                                            the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                            Praesent
                                            pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut
                                            scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam
                                            aliquet
                                            congue justo ut scelerisque.</p>
                                    </div>
                                    <!-- end /.tab-content -->
                                </div>
                                <!-- end /.tab-content -->
                            </div>
                        </div>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- ends: .shortcode_wrapper -->
        <div class="shortcode_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shortcode_module_title">
                            <div class="dashboard__title">
                                <h3>Tab 4</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="shortcode_modules">
                            <div class="tab tab4">
                                <div class="item-navigation">
                                    <ul class="nav nav-tabs nav--tabs2" role="tablist">
                                        <li>
                                            <a class="active" href="#tc5" aria-controls="tc5" role="tab" data-toggle="tab">
                                                <span class="icon-home"></span> Home
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tc6" aria-controls="tc6" role="tab" data-toggle="tab">
                                                <span class="icon-user"></span> Comments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tc7" aria-controls="tc7" role="tab" data-toggle="tab">
                                                <span class="icon-envelope"></span> Message
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tc8" aria-controls="tc8" role="tab" data-toggle="tab">
                                                <span class="icon-settings"></span> Setting
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end /.item-navigation -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show product-tab active" id="tc5">
                                        <h3>Landing Page Details</h3>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque
                                            the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                            Praesent
                                            pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut
                                            scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam
                                            aliquet
                                            congue justo ut scelerisque.</p>
                                    </div>
                                    <!-- end /.tab-content -->
                                    <div class="tab-pane fade product-tab" id="tc6">
                                        <div class="thread">
                                            <ul class="media-list thread-list">
                                                <li class="single-thread">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m1.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>Themexylum</h4>
                                                                    </a>
                                                                    <span>9 Hours Ago</span>
                                                                </div>
                                                                <a href="#" class="reply-link">Reply</a>
                                                            </div>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                                interdum mollis. </p>
                                                        </div>
                                                    </div><!-- ends: .media -->
                                                    <!-- nested comment markup / replies -->
                                                    <!-- comment reply -->
                                                    <div class="media depth-2 reply-comment">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <form action="#" class="comment-reply-form">
                                                                <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                                <button class="btn btn--md btn-primary">Post Comment</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- comment reply -->
                                                </li><!-- ends: .single-thread-->
                                                <li class="single-thread">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <div class="media-heading">
                                                                    <a href="author.html">
                                                                        <h4>AutumnTheme</h4>
                                                                    </a>
                                                                    <span>9 Hours Ago</span>
                                                                </div>
                                                                <a href="#" class="reply-link">Reply</a>
                                                            </div>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                                sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                                interdum mollis. </p>
                                                        </div>
                                                    </div><!-- ends: .media -->
                                                    <!-- nested comment markup / replies -->
                                                    <!-- comment reply -->
                                                    <div class="media depth-2 reply-comment">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <form action="#" class="comment-reply-form">
                                                                <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                                <button class="btn btn--md btn-primary">Post Comment</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- comment reply -->
                                                </li><!-- ends: .single-thread-->
                                            </ul>
                                            <!-- end /.media-list -->
                                        </div>
                                        <!-- end /.comments -->
                                    </div>
                                    <!-- end /.product-comment -->
                                    <div class="tab-pane fade product-tab" id="tc7">
                                        <h3>The Message for the mars</h3>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque
                                            the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                            Praesent
                                            pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut
                                            scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam
                                            aliquet
                                            congue justo ut scelerisque.</p>
                                    </div>
                                    <!-- end /.tab-content -->
                                    <div class="tab-pane fade product-tab" id="tc8">
                                        <h3>When UX meets user expectancy.</h3>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque
                                            the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                            Praesent
                                            pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut
                                            scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam
                                            aliquet
                                            congue justo ut scelerisque.</p>
                                    </div>
                                    <!-- end /.tab-content -->
                                </div>
                                <!-- end /.tab-content -->
                            </div>
                        </div>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- ends: .shordcode_wrapper -->
    </section>
    <?php require_once("../../../inc/footer.php"); ?>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script src="../../vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="../../vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="../../vendor_assets/js/bootstrap/popper.js"></script>
    <script src="../../vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="../../vendor_assets/js/chart.bundle.min.js"></script>
    <script src="../../vendor_assets/js/grid.min.js"></script>
    <script src="../../vendor_assets/js/jquery-ui.min.js"></script>
    <script src="../../vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="../../vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="../../vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="../../vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="../../vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../../vendor_assets/js/owl.carousel.min.js"></script>
    <script src="../../vendor_assets/js/select2.full.min.js"></script>
    <script src="../../vendor_assets/js/slick.min.js"></script>
    <script src="../../vendor_assets/js/tether.min.js"></script>
    <script src="../../vendor_assets/js/trumbowyg.min.js"></script>
    <script src="../../vendor_assets/js/venobox.min.js"></script>
    <script src="../../vendor_assets/js/waypoints.min.js"></script>
    <script src="../../theme_assets/js/dashboard.js"></script>
    <script src="../../theme_assets/js/main.js"></script>
    <script src="../../theme_assets/js/map.js"></script>
    <!-- endinject-->
</body>

</html>