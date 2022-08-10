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
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-32x32.png">
</head>

<body class="preload">
    <?php require_once("inc/menu.php"); ?>
    <section class="single-product-desc">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="item-preview">
                        <img src="img/single2.jpg" alt="" class="img-fluid">
                        <div class="item-preview--excerpt">
                            <div class="item-preview--action">
                                <div class="action-btns m-n15">
                                    <a href="#" class="btn btn--lg btn-primary m-15">Live Preview</a>
                                    <a href="#" class="btn btn--lg btn--icon btn-outline-primary m-15">
                                        <span class="lnr icon-heart"></span>Add To Favorites</a>
                                </div>
                            </div><!-- ends: .item-preview--action -->
                            <div class="item-preview--activity">
                                <div class="activity-single">
                                    <p>
                                        <span class="icon-cloud-download"></span> Total Downloads
                                    </p>
                                    <p>2451</p>
                                </div>
                                <div class="activity-single">
                                    <p>
                                        <span class="icon-heart"></span> Favorities
                                    </p>
                                    <p>452</p>
                                </div>
                                <div class="activity-single">
                                    <p>
                                        <span class="icon-eye"></span>Views
                                    </p>
                                    <p>3425</p>
                                </div>
                            </div><!-- Ends: .item-activity -->
                        </div>
                    </div><!-- ends: .item-preview-->
                    <div class="item-info">
                        <div class="item-navigation">
                            <ul class="nav nav-tabs" role="tablist">
                                <li>
                                    <a href="#product-details" class="active" id="tab1" aria-controls="product-details" role="tab" data-toggle="tab" aria-selected="true">
                                        <span class="icon icon-docs"></span> Item Details</a>
                                </li>
                                <li>
                                    <a href="#product-comment" id="tab2" aria-controls="product-comment" role="tab" data-toggle="tab">
                                        <span class="icon icon-bubbles"></span> Comments </a>
                                </li>
                            </ul>
                        </div><!-- ends: .item-navigation -->
                        <div class="tab-content">
                            <div class="fade show tab-pane product-tab active" id="product-details" role="tabpanel" aria-labelledby="tab1">
                                <div class="tab-content-wrapper">
                                    <h3>Landing Page Details</h3>
                                    <p class="p-bottom-30">Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                        mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent
                                        pharetra,
                                        justo ut scel erisque the mattis, leo quam aliquet congue justo ut scelerisque.
                                        Praesent
                                        pharetra, justo ut scelerisque the mattis, leo quam aliquet congue justo ut
                                        scelerisque. <br><br>justo ut scel erisque the mattis, leo quam aliquet congue justo ut scelerisque.
                                        Praesent
                                        pharetra, justo ut scelerisque the mattis, leo quam aliquet congue justo ut
                                        scelerisque. leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent
                                        pharetra.</p>
                                </div>
                            </div><!-- ends: .tab-content -->
                            <div class="fade tab-pane product-tab" id="product-comment" role="tabpanel" aria-labelledby="tab2">
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
                                                            <a href="author.php">
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
                                            <ul class="children">
                                                <li class="single-thread depth-2">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m2.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h4>AazzTech</h4>
                                                                <span>6 Hours Ago</span>
                                                            </div>
                                                            <span class="comment-tag author">Author</span>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut sceleris que the mattis, leo quam aliquet congue
                                                                placerat mi id nisi interdum mollis. </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="single-thread depth-2">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/m1.png" alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h4>Themexylum</h4>
                                                                <span>9 Hours Ago</span>
                                                            </div>
                                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                                justo ut sceleris que the mattis, leo quam aliquet congue
                                                                placerat mi id nisi interdum mollis. </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul><!-- ends: .children -->
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
                                                            <a href="author.php">
                                                                <h4>EchoTheme</h4>
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
                                                        <img class="media-object" src="img/m3.png" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="author.php">
                                                                <h4>SnazzyTheme</h4>
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
                                                        <img class="media-object" src="img/m4.png" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="author.php">
                                                                <h4>ThemeValley</h4>
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
                                    </ul><!-- ends: .media-list -->
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
                                    <div class="comment-form-area">
                                        <h4>Leave a comment</h4>
                                        <div class="media comment-form">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/m7.png" alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea name="reply-comment" placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--sm btn-primary">Post Comment</button>
                                                </form>
                                            </div>
                                        </div><!-- ends: .comment-form -->
                                    </div><!-- ends: .comment-form-area -->
                                </div><!-- ends: .comments -->
                            </div><!-- ends: .product-comment -->
                        </div><!-- ends: .tab-content -->
                    </div><!-- ends: .item-info -->
                </div><!-- ends: .col-md-8 -->
                <div class="col-lg-4 col-md-12">
                    <aside class="sidebar sidebar--single-product">
                        <div class="sidebar-card card-pricing">
                            <div class="price border-none">
                                <h1>
                                    <sup>$</sup>
                                    <span>00.00</span>
                                </h1>
                            </div>
                            <div class="purchase-button">
                                <a href="#" class="btn btn--lg btn-primary">Download Now</a>
                            </div>
                        </div><!-- ends: .sidebar--card -->
                        <div class="sidebar-card card--product-infos">
                            <div class="card-title">
                                <h4>Product Information</h4>
                            </div>
                            <ul class="infos">
                                <li>
                                    <p class="data-label">Released</p>
                                    <p class="info">16 June 2015</p>
                                </li>
                                <li>
                                    <p class="data-label">Updated</p>
                                    <p class="info">28 July 2016 </p>
                                </li>
                                <li>
                                    <p class="data-label">Version</p>
                                    <p class="info">1.2</p>
                                </li>
                                <li>
                                    <p class="data-label">Category</p>
                                    <p class="info">Corporate & Business</p>
                                </li>
                                <li>
                                    <p class="data-label">Layout</p>
                                    <p class="info">Responsive</p>
                                </li>
                                <li>
                                    <p class="data-label">Retina Ready</p>
                                    <p class="info">No</p>
                                </li>
                                <li>
                                    <p class="data-label">Files Included</p>
                                    <p class="info">Html, CSS, JavaScript</p>
                                </li>
                                <li>
                                    <p class="data-label">Browser</p>
                                    <p class="info">IE10, IE11, Firefox, Safari, Opera, Chrome5</p>
                                </li>
                                <li>
                                    <p class="data-label">Bootstrap</p>
                                    <p class="info">Bootstrap 4</p>
                                </li>
                                <li>
                                    <p class="data-label">Tags</p>
                                    <p class="info">
                                        <a href="#">business</a>,
                                        <a href="#">template</a>,
                                        <a href="#">onepage</a>,
                                        <a href="#">creative</a>,
                                        <a href="#">responsive</a>,
                                        <a href="#">corporate</a>,
                                        <a href="#">Bootstrap3</a>,
                                        <a href="#">html5</a>
                                    </p>
                                </li>
                            </ul><!-- ends: .infos -->
                        </div><!-- ends: .card--product-infos -->
                        <div class="sidebar-card social-share-card">
                            <p>Social Share:</p>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- Ends: .social-share-card -->
                    </aside><!-- ends: .sidebar -->
                </div><!-- ends: .col-md-4 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section><!-- ends: .single-product-desc -->
    <section class="more_product_area p-top-105 p-bottom-75">
        <div class="container">
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>More Items by <span>Aazztech</span>
                        </h2>
                    </div>
                </div><!-- ends: .col-md-12 -->
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
        </div>
    </section><!-- ends: .more_product_area -->
    <?php require_once("inc/menu.php"); ?>

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