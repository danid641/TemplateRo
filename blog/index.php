<?php
include 'inc/connect.php';

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

    <link rel="stylesheet" href="assets/css/plugin.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- endinject -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>/assets/img/logo/icon.png">
</head>

<body class="preload">
<?php include 'inc/menu.php'; ?>
    <!-- Breadcrumb Area -->
    <section class="blog_area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <?php
                    $blog_post = "SELECT * FROM post";

                    $blog_post_result = $conn->query($blog_post);

                    if ($blog_post_result->num_rows > 0) {
                        //output data of each row
                        while ($row = $blog_post_result->fetch_assoc()) {
                    ?>
                            <div class="single_blog blog--default">
                                <figure>
                                    <img src="assets/img/bb1.jpg" alt="Blog image">

                                    <figcaption>
                                        <div class="blog__content">
                                            <a href="single-blog.php?article=<?php echo $row['id']; ?>" class="blog__title">
                                                <h3><?php echo $row['Post Name']; ?></h3>
                                            </a>

                                            <div class="blog__meta">
                                                <div class="author">
                                                    <span class="icon-user"></span>
                                                    <p>by
                                                        <a href="http://localhost/author?creator=<?php echo $row['creator']; ?>"><?php echo $row['creator']; ?></a>
                                                    </p>
                                                </div>
                                                <div class="date_time">
                                                    <span class="icon-clock"></span>
                                                    <p><?php echo $row['posted_on']; ?></p>
                                                </div>
                                                <div class="comment_view">
                                                    <p class="comment">
                                                        <span class="icon-bubble"></span>45
                                                    </p>
                                                    <p class="view">
                                                        <span class="icon-eye"></span>345
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="btn_text">
                                            <p><?php echo $row['Description']; ?></p>
                                            <a href="single-blog.php?article=<?php echo $row['id']; ?>" class="btn btn--md btn-primary">Read More</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div><!-- ends: .single_blog -->
                    <?php
                        }
                    }
                    ?>



                    <div class="m-top-60">
                    </div>
                </div><!-- ends: .col-md-8 -->

                <div class="col-lg-4 col-md-12">
                    <aside class="sidebar sidebar--blog">

                        <div class="sidebar-card card--search card--blog_sidebar p-0">
                            <div class="card-title">
                                <h4>Search Product</h4>
                            </div><!-- ends: .card-title -->
                            <div class="card_content">
                                <form action="#">
                                    <div class="searc-wrap">
                                        <input type="text" placeholder="Search product here...">
                                        <button type="submit" class="search-wrap__btn">
                                            <span class="icon-magnifier"></span>
                                        </button>
                                    </div>
                                </form>
                            </div><!-- ends: .card_content -->
                        </div><!-- ends: .sidebar-card -->


                        <div class="sidebar-card sidebar--post card--blog_sidebar p-0">
                            <div class="card-title">
                                <!-- Nav tabs -->
                                <ul class="post-tab nav" role="tablist">
                                    <li>
                                        <a href="#popular" id="popular-tab" class="active" aria-controls="popular" role="tab" data-toggle="tab" aria-selected="true">Popular Posts</a>
                                    </li>
                                    <li>
                                        <a href="#latest" class="" id="latest-tab" aria-controls="latest" role="tab" data-toggle="tab" aria-selected="false">Latest Posts</a>
                                    </li>
                                </ul>
                            </div><!-- ends: .card-title -->

                            <div class="card_content">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active fade show" id="popular" aria-labelledby="popular-tab">
                                        <ul class="post-list">
                                            <li>
                                                <div class="thumbnail_img">
                                                    <span><img src="assets/img/blog_thumb1.jpg" alt="blog thumbnail"></span>
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h6>5 best jQuery form validation plugins</h6>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="icon-clock"></span>
                                                        <p>24 Feb 2017</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thumbnail_img">
                                                    <span><img src="assets/img/blog_thumb2.jpg" alt="blog thumbnail"></span>
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h6>Best free jQuery image gallery plugins 2017</h6>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="icon-clock"></span>
                                                        <p>24 Feb 2017</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thumbnail_img">
                                                    <img src="assets/img/blog_thumb1.jpg" alt="blog thumbnail">
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h6>10 Free Joomla! Templates</h6>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="icon-clock"></span>
                                                        <p>24 Feb 2017</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul><!-- ends: .post-list -->
                                    </div><!-- ends: .tabpanel -->

                                    <div role="tabpanel" class="tab-pane fade" id="latest" aria-labelledby="latest-tab">
                                        <ul class="post-list">
                                            <li>
                                                <div class="thumbnail_img">
                                                    <span><img src="assets/img/blog_thumb2.jpg" alt="blog thumbnail"></span>
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h6>Best free jQuery image gallery plugins 2017</h6>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="icon-clock"></span>
                                                        <p>24 Feb 2017</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thumbnail_img">
                                                    <span><img src="assets/img/blog_thumb1.jpg" alt="blog thumbnail"></span>
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h6>5 best jQuery form validation plugins you must try</h6>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="icon-clock"></span>
                                                        <p>24 Feb 2017</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thumbnail_img">
                                                    <span><img src="assets/img/blog_thumb2.jpg" alt="blog thumbnail"></span>
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h6>The story of revolution</h6>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="icon-clock"></span>
                                                        <p>24 Feb 2017</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul><!-- ends: .post-list -->
                                    </div><!-- ends: .tabpanel -->
                                </div><!-- ends: .tab-content -->
                            </div><!-- ends: .card_content -->
                        </div><!-- ends: .sidebar-card -->


                        <div class="sidebar-card card--blog_sidebar card--category p-0">
                            <div class="card-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="collapsible-content">
                                <ul class="card-content">
                                    <li>
                                        <a href="#">Wordpress
                                            <span class="item-count">35</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Support Center
                                            <span class="item-count"> 45</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">General Topics
                                            <span class="item-count">13</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Pre-Sales
                                            <span class="item-count">08</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Purchases
                                            <span class="item-count">34</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Billing
                                            <span class="item-count">78</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Testimonials
                                            <span class="item-count">26</span>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- ends: .collapsible_content -->
                        </div><!-- ends: .sidebar-card -->


                        <div class="sidebar-card card--blog_sidebar card--tags p-0">
                            <div class="card-title">
                                <h4>Tags</h4>
                            </div>

                            <ul class="tags">
                                <li>
                                    <a href="#">Branding</a>
                                </li>
                                <li>
                                    <a href="#">Design</a>
                                </li>
                                <li>
                                    <a href="#">Marketing</a>
                                </li>
                                <li>
                                    <a href="#">Development</a>
                                </li>
                                <li>
                                    <a href="#">Branding</a>
                                </li>
                                <li>
                                    <a href="#">Design</a>
                                </li>
                                <li>
                                    <a href="#">Marketing</a>
                                </li>
                                <li>
                                    <a href="#">Development</a>
                                </li>
                            </ul><!-- ends: .tags -->
                        </div><!-- ends: .sidebar-card -->


                        <div class="banner">
                            <img src="assets/img/banner.jpg" alt="Banner">
                            <div class="banner_content">
                                <h1>Banner</h1>
                                <p>360x270</p>
                            </div>
                        </div><!-- ends: .banner -->

                    </aside><!-- ends: .aside -->
                </div><!-- ends: .col-md-4 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section><!-- ends: .blog_area -->





    <footer class="footer-area footer--light">
        <div class="footer-big">
            <!-- start .container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">

                            <div class="widget-about">
                                <img src="assets/img/footer-logo.png" alt="" class="img-fluid">
                                <p>Pellentesque facilisis the ullamcorp keer sapien interdum is the magna pellentesque
                                    kequis
                                    hasellus keur condimentum eleifend.</p>
                                <ul class="contact-details">
                                    <li>
                                        <span class="icon-earphones"></span>
                                        Call Us:
                                        <a href="tel:344-755-111">344-755-111</a>
                                    </li>
                                    <li>
                                        <span class="icon-envelope-open"></span>
                                        <a href="mailto:support@aazztech.com">support@aazztech.com</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-md-4 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-menu footer-menu--1">
                                <h5 class="footer-widget-title">Popular Category</h5>
                                <ul>
                                    <li>
                                        <a href="#">Wordpress</a>
                                    </li>
                                    <li>
                                        <a href="#">Plugins</a>
                                    </li>
                                    <li>
                                        <a href="#">Joomla Template</a>
                                    </li>
                                    <li>
                                        <a href="#">Admin Template</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML Template</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.footer-menu -->
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-menu">
                                <h5 class="footer-widget-title">Our Company</h5>
                                <ul>
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">How It Works</a>
                                    </li>
                                    <li>
                                        <a href="#">Affiliates</a>
                                    </li>
                                    <li>
                                        <a href="#">Testimonials</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Plan & Pricing</a>
                                    </li>
                                    <li>
                                        <a href="#">Blog</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.footer-menu -->
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-lg-3 -->

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="footer-menu no-padding">
                                <h5 class="footer-widget-title">Help Support</h5>
                                <ul>
                                    <li>
                                        <a href="#">Support Forum</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#">Support Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Refund Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="#">Buyers Faq</a>
                                    </li>
                                    <li>
                                        <a href="#">Sellers Faq</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.footer-menu -->
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- Ends: .col-lg-3 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>&copy; 2018
                                <a href="#">TemplateRo</a>. All rights reserved. Created by
                                <a href="#">AazzTech</a>
                            </p>
                        </div>

                        <div class="go_top">
                            <span class="icon-arrow-up"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- inject:js-->

    <script src="js/plugins.min.js"></script>

    <script src="js/script.min.js"></script>

    <!-- endinject-->
</body>

</html>