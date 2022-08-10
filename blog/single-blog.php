<?php
include 'inc/connect.php';
session_start();

if(isset($_GET['article'])){

$id = $_GET['article'];

$blog_article = "SELECT * FROM post WHERE id='$id'";
$blog_article_response = mysqli_query($conn, $blog_article);
$blog_article_row = mysqli_fetch_array($blog_article_response);

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
    <title></title>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="assets/css/plugin.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- endinject -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-32x32.png">
</head>
<body class="preload">
    
    
    <!-- start menu-area -->
    <div class="menu-area">
        <div class="top-menu-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-fullwidth">
                            <div class="logo-wrapper">
                                <div class="logo logo-top">
                                    <a href="index.html"><img src="assets/img/logo.png" alt="logo image" class="img-fluid"></a>
                                </div>
                            </div>

                            <div class="menu-container">
                                <div class="d_menu">
                                    
    <nav class="navbar navbar-expand-lg mainmenu__menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1"
                aria-controls="bs-example-navbar-collapse-1"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon icon-menu"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav">
                <li class="has_dropdown">
                    <a href="index.html">Home</a>
                    <div class="dropdown dropdown--menu">
                        <ul>
                            <li>
                                <a href="index.html">Home Multi Vendor</a>
                            </li>
                            <li>
                                <a href="index2.html">Home Two Single User</a>
                            </li>
                            <li>
                                <a href="index3.html">Home Three Product</a>
                            </li>
                            <li>
                                <a href="index4.html">Home Four Product</a>
                            </li>
                            <li>
                                <a href="index5.html">Home Five Product</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="has_dropdown">
                    <a href="all-products.html">All Product</a>
                    <div class="dropdown dropdown--menu">
                        <ul>
                            <li>
                                <a href="all-products.html">Recent Items</a>
                            </li>
                            <li>
                                <a href="all-products.html">Popular Items</a>
                            </li>
                            <li>
                                <a href="index5.html">Free Templates</a>
                            </li>
                            <li>
                                <a href="#">Follow Feed</a>
                            </li>
                            <li>
                                <a href="#">Top Authors</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="has_dropdown">
                    <a href="category-grid.html">Categories</a>
                    <div class="dropdown dropdown--menu">
                        <ul>
                            <li>
                                <a href="category-grid.html">Popular Items</a>
                            </li>
                            <li>
                                <a href="category-grid.html">Admin Templates</a>
                            </li>
                            <li>
                                <a href="category-grid.html">Blog / Magazine / News</a>
                            </li>
                            <li>
                                <a href="category-grid.html">Creative</a>
                            </li>
                            <li>
                                <a href="category-grid.html">Corporate Business</a>
                            </li>
                            <li>
                                <a href="category-grid.html">Resume Portfolio</a>
                            </li>
                            <li>
                                <a href="category-grid.html">eCommerce</a>
                            </li>
                            <li>
                                <a href="category-grid.html">Entertainment</a>
                            </li>
                            <li>
                                <a href="category-grid.html">Landing Pages</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="has_megamenu">
                    <a href="#">Elements</a>
                    <div class="dropdown_megamenu contained">
                        <div class="megamnu_module">
                            <div class="menu_items">
                                <div class="menu_column">
                                    <ul>
                                        <li>
                                            <a href="accordion.html">Accordion</a>
                                        </li>
                                        <li>
                                            <a href="alert.html">Alert</a>
                                        </li>
                                        <li>
                                            <a href="brands.html">Brands</a>
                                        </li>
                                        <li>
                                            <a href="buttons.html">Buttons</a>
                                        </li>
                                        <li>
                                            <a href="cards.html">Cards</a>
                                        </li>
                                        <li>
                                            <a href="charts.html">Charts</a>
                                        </li>
                                        <li>
                                            <a href="content-block.html">Content Block</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="menu_column">
                                    <ul>
                                        <li>
                                            <a href="dropdowns.html">Dropdowns</a>
                                        </li>
                                        <li>
                                            <a href="features.html">Features</a>
                                        </li>
                                        <li>
                                            <a href="info-box.html">Info Box</a>
                                        </li>
                                        <li>
                                            <a href="modal.html">Modal</a>
                                        </li>
                                        <li>
                                            <a href="peoples.html">Peoples</a>
                                        </li>
                                        <li>
                                            <a href="products.html">Products</a>
                                        </li>
                                        <li>
                                            <a href="social.html">Social</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="menu_column">
                                    <ul>
                                        <li>
                                            <a href="tab.html">Tabs</a>
                                        </li>
                                        <li>
                                            <a href="table.html">Table</a>
                                        </li>
                                        <li>
                                            <a href="testimonials.html">Testimonials</a>
                                        </li>
                                        <li>
                                            <a href="timeline.html">Timeline</a>
                                        </li>

                                        <li>
                                            <a href="typography.html">Typography</a>
                                        </li>

                                        <li>
                                            <a href="headers.html">Header Styles</a>
                                        </li>
                                        <li>
                                            <a href="pricing.html">Pricing</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="has_megamenu">
                    <a href="#">Pages</a>
                    <div class="dropdown_megamenu">
                        <div class="megamnu_module">
                            <div class="menu_items">
                                <div class="menu_column">
                                    <ul>
                                        <li class="title">Product</li>
                                        <li>
                                            <a href="all-products.html">Products Grid</a>
                                        </li>
                                        <li>
                                            <a href="category-grid.html">Category Grid</a>
                                        </li>
                                        <li>
                                            <a href="search-product.html">Search Product</a>
                                        </li>
                                        <li>
                                            <a href="single-product.html">Single Product
                                                V1</a>
                                        </li>
                                        <li>
                                            <a href="single-product-v2.html">Single Product
                                                V2</a>
                                        </li>
                                        <li>
                                            <a href="single-product-v3.html">Single Product
                                                V3</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">Shopping Cart</a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="menu_column">
                                    <ul>
                                        <li class="title">Author</li>
                                        <li>
                                            <a href="author.html">Author Profile</a>
                                        </li>

                                        <li>
                                            <a href="notification.html">Notifications</a>
                                        </li>
                                        <li>
                                            <a href="message.html">Message Inbox</a>
                                        </li>
                                        <li>
                                            <a href="message-compose.html">Message
                                                Compose</a>
                                        </li>
                                        <li>
                                            <a href="favourites.html">Favorites Items</a>
                                        </li>
                                        <li>
                                            <a href="career.html">Job Posts</a>
                                        </li>
                                        <li>
                                            <a href="job-detail.html">Job Details</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="menu_column">
                                    <ul>
                                        <li class="title">Dashboard</li>
                                        <li>
                                            <a href="dashboard.html">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-setting.html">Account
                                                Settings</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-purchase.html">Author
                                                Purchases</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-add-credit.html">Add
                                                Credits</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-statement.html">Statements</a>
                                        </li>
                                        <li>
                                            <a href="invoice.html">Invoice</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-upload.html">Upload Item</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-manage-item.html">Manage Items</a>
                                        </li>
                                        <li>
                                            <a href="edit-item.html">Edit Items</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-withdrawal.html">Withdrawals</a>
                                        </li>
                                        <li>
                                            <a href="add-payment-method.html">Add Payment
                                                Method</a>
                                        </li>
                                        <li>
                                            <a href="order-confirm.html">Order Confirm</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="menu_column">
                                    <ul>
                                        <li class="title">User</li>
                                        <li>
                                            <a href="support-forum.html">Support Forum</a>
                                        </li>
                                        <li>
                                            <a href="support-forum-detail.html">Forum
                                                Details</a>
                                        </li>
                                        <li>
                                            <a href="support-forum-form.html">Forum Form</a>
                                        </li>
                                        <li>
                                            <a href="login.html">Login</a>
                                        </li>
                                        <li>
                                            <a href="signup.html">Register</a>
                                        </li>
                                        <li>
                                            <a href="recover-pass.html">Recovery
                                                Password</a>
                                        </li>
                                        <li>
                                            <a href="customer-dashboard.html">Customer
                                                Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="customer-downloads.html">Customer
                                                Downloads</a>
                                        </li>
                                        <li>
                                            <a href="customer-info.html">Customer Info</a>
                                        </li>
                                    </ul>

                                    <ul>
                                        <li class="title">Blog</li>
                                        <li>
                                            <a href="blog1.html">Blog V-1</a>
                                        </li>
                                        <li>
                                            <a href="blog2.html">Blog V-2</a>
                                        </li>
                                        <li>
                                            <a href="single-blog.html">Single Blog</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="menu_column">
                                    <ul>
                                        <li class="title">Other</li>
                                        <li>
                                            <a href="how-it-works.html">How It Works</a>
                                        </li>
                                        <li>
                                            <a href="about.html">About Us</a>
                                        </li>
                                        <li>
                                            <a href="pricing.html">Pricing Plan</a>
                                        </li>
                                        <li>
                                            <a href="testimonial.html">Testimonials</a>
                                        </li>
                                        <li>
                                            <a href="faq.html">FAQs</a>
                                        </li>
                                        <li>
                                            <a href="faq-details.html">FAQ's Details</a>
                                        </li>
                                        <li>
                                            <a href="affiliate.html">Affiliates</a>
                                        </li>
                                        <li>
                                            <a href="term-condition.html">Terms &amp;
                                                Conditions</a>
                                        </li>
                                        <li>
                                            <a href="event.html">Event</a>
                                        </li>
                                        <li>
                                            <a href="event-detail.html">Event Detail</a>
                                        </li>
                                        <li class="has_badge">
                                            <a href="badges.html">Badges <span
                                                        class="badge badge-primary">New</span></a>

                                        </li>
                                        <li>
                                            <a href="404.html">404 Error page</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="contact.html">contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

                                </div>
                            </div>

                            
    <div class="author-menu">
        <!-- start .author-area -->
        <div class="author-area">
            <div class="search-wrapper">
                <div class="nav_right_module search_module">
                    <span class="icon-magnifier search_trigger"></span>

                    <div class="search_area">
                        <form action="#">
                            <div class="input-group input-group-light">
                                <span class="icon-left" id="basic-addon1">
                                    <i class="icon-magnifier"></i>
                                </span>
                                <input type="text" class="form-control search_field"
                                       placeholder="Type words and hit enter...">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="author__notification_area">
                <ul>
                    <li class="has_dropdown">
                        <div class="icon_wrap">
                            <span class="icon-bell"></span>
                            <span class="notification_status noti"></span>
                        </div>

                        <div class="dropdown notification--dropdown">

                            <div class="dropdown_module_header">
                                <h6>My Notifications</h6>
                            </div>

                            <div class="notifications_module">
                                <div class="notification">
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="assets/img/notification_head.png" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <span>Anderson</span> added to Favourite
                                                <a href="#">Mccarther Coffee Shop</a>
                                            </p>
                                            <p class="time">Just now</p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons ">
                                        <span class="icon-heart loved noti_icon"></span>
                                    </div>
                                    <!-- end /.notifications -->
                                </div>
                                <!-- end /.notifications -->

                                <div class="notification">
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="assets/img/notification_head2.png" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <span>Michael</span> commented on
                                                <a href="#">TemplateRo Extension Bundle</a>
                                            </p>
                                            <p class="time">Just now</p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons ">
                                        <span class="icon-bubble commented noti_icon"></span>
                                    </div>
                                    <!-- end /.notifications -->
                                </div>
                                <!-- end /.notifications -->

                                <div class="notification">
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="assets/img/notification_head3.png" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <span>Khamoka </span>purchased
                                                <a href="#"> Visibility Manager
                                                    Subscriptions</a>
                                            </p>
                                            <p class="time">Just now</p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons ">
                                        <span class="icon-basket-loaded purchased noti_icon"></span>
                                    </div>
                                    <!-- end /.notifications -->
                                </div>
                                <!-- end /.notifications -->

                                <div class="notification">
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="assets/img/notification_head4.png" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <span>Anderson</span> added to Favourite
                                                <a href="#">Mccarther Coffee Shop</a>
                                            </p>
                                            <p class="time">Just now</p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons "><span
                                                class="icon-star reviewed noti_icon"></span>
                                    </div>
                                    <!-- end /.notifications -->
                                </div>
                                <!-- end /.notifications -->
                                <div class="text-center m-top-30 p-left-20 p-right-20"><a
                                            href="notification.html"
                                            class="btn btn-primary btn-md btn-block">View
                                        All</a></div>
                                <!-- end /.notifications -->
                            </div>
                            <!-- end /.dropdown -->
                        </div>
                    </li>

                    <li class="has_dropdown">
                        <div class="icon_wrap">
                            <span class="icon-envelope-open"></span>
                            <span class="notification_status msg"></span>
                        </div>

                        <div class="dropdown messaging--dropdown">
                            <div class="dropdown_module_header">
                                <h6>My Messages</h6>
                            </div>

                            <div class="messages">
                                <a href="message.html" class="message recent">
                                    <div class="message__actions_avatar">
                                        <div class="avatar">
                                            <img src="assets/img/notification_head4.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="icon-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat mi ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </a>
                                <!-- end /.message -->

                                <a href="message.html" class="message recent">
                                    <div class="message__actions_avatar">
                                        <div class="avatar">
                                            <img src="assets/img/notification_head5.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Crazy Coder</p>
                                                <span class="icon-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </a>
                                <!-- end /.message -->

                                <a href="message.html" class="message">
                                    <div class="message__actions_avatar">
                                        <div class="avatar">
                                            <img src="assets/img/notification_head2.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Hybrid Insane</p>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </a>
                                <!-- end /.message -->

                                <a href="message.html" class="message">
                                    <div class="message__actions_avatar">
                                        <div class="avatar">
                                            <img src="assets/img/notification_head3.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>ThemeXylum</p>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </a>
                                <!-- end /.message -->

                                <a href="message.html" class="message">
                                    <div class="message__actions_avatar">
                                        <div class="avatar">
                                            <img src="assets/img/notification_head4.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="icon-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat mi ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </a>
                                <!-- end /.message -->
                            </div>
                            <div class="text-center m-top-30 m-bottom-30 p-left-20 p-right-20">
                                <a href="message.html"
                                   class="btn btn-primary btn-md btn-block">View All</a>
                            </div>
                        </div>
                    </li>
                    <li class="has_dropdown">
                        <div class="icon_wrap">
                            <span class="icon-basket-loaded"></span>
                            <span class="notification_count purch">2</span>
                        </div>

                        <div class="dropdown dropdown--cart">
                            <div class="cart_area">
                                <div class="cart_list">
                                    <div class="cart_product">
                                        <div class="product__info">
                                            <div class="thumbn">
                                                <img src="assets/img/capro1.jpg"
                                                     alt="cart product thumbnail">
                                            </div>

                                            <div class="info">
                                                <a class="title" href="single-product.html">Finance
                                                    and Consulting Business Theme</a>
                                                <div class="cat">
                                                    <a href="#">
                                                        <img src="assets/img/catword.png"
                                                             alt="">Wordpress</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product__action">
                                            <a href="#">
                                                <span class="icon-trash"></span>
                                            </a>
                                            <p>$60</p>
                                        </div>
                                    </div>
                                    <div class="cart_product">
                                        <div class="product__info">
                                            <div class="thumbn">
                                                <img src="assets/img/capro2.jpg"
                                                     alt="cart product thumbnail">
                                            </div>

                                            <div class="info">
                                                <a class="title" href="single-product.html">Flounce
                                                    - Multipurpose OpenCart Theme</a>
                                                <div class="cat">
                                                    <a href="#">
                                                        <img src="assets/img/catword.png"
                                                             alt="">Wordpress</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product__action">
                                            <a href="#">
                                                <span class="icon-trash"></span>
                                            </a>
                                            <p>$60</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="total">
                                    <p>
                                        <span>Total :</span>$80</p>
                                </div>
                                <div class="cart_action">
                                    <a class="btn btn-primary" href="cart.html">View
                                        Cart</a>
                                    <a class="btn btn-secondary" href="checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--start .author-author__info-->
            <div class="author-author__info has_dropdown">
                <div class="author__avatar online">
                    <img src="assets/img/user-avater.png" alt="user avatar"
                         class="rounded-circle">
                </div>

                <div class="dropdown dropdown--author">
                    <div class="author-credits d-flex">
                        <div class="author__avatar">
                            <img src="assets/img/user-avater.png" alt="user avatar"
                                 class="rounded-circle">
                        </div>
                        <div class="autor__info">
                            <p class="name">
                                Chris Bent
                            </p>
                            <p class="amount">$20.45</p>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <a href="author.html">
                                <span class="icon-user"></span>Profile</a>
                        </li>
                        <li>
                            <a href="dashboard.html">
                                <span class="icon-home"></span> Dashboard</a>
                        </li>
                        <li>
                            <a href="dashboard-setting.html">
                                <span class="icon-settings"></span> Setting</a>
                        </li>
                        <li>
                            <a href="cart.html">
                                <span class="icon-basket"></span>Purchases</a>
                        </li>
                        <li>
                            <a href="favourites.html">
                                <span class="icon-heart"></span> Favourite</a>
                        </li>
                        <li>
                            <a href="dashboard-add-credit.html">
                                <span class="icon-credit-card"></span>Add Credits</a>
                        </li>
                        <li>
                            <a href="dashboard-statement.html">
                                <span class="icon-chart"></span>Sale Statement</a>
                        </li>
                        <li>
                            <a href="dashboard-upload.html">
                                <span class="icon-cloud-upload"></span>Upload Item</a>
                        </li>
                        <li>
                            <a href="dashboard-manage-item.html">
                                <span class="icon-notebook"></span>Manage Item</a>
                        </li>
                        <li>
                            <a href="dashboard-withdrawal.html">
                                <span class="icon-briefcase"></span>Withdrawals</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon-logout"></span>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end /.author-author__info-->
        </div>
        <!-- end .author-area -->

        <!-- author area restructured for mobile -->
        <div class="mobile_content ">
            <span class="icon-user menu_icon"></span>

            <!-- offcanvas menu -->
            <div class="offcanvas-menu closed">
                <span class="icon-close close_menu"></span>
                <div class="author-author__info">
                    <div class="author__avatar v_middle">
                        <img src="assets/img/user-avater.png" alt="user avatar">
                    </div>
                </div>
                <!--end /.author-author__info-->

                <div class="author__notification_area">
                    <ul>
                        <li>
                            <a href="notification.html">
                                <div class="icon_wrap">
                                    <span class="icon-bell"></span>
                                    <span class="notification_count noti">25</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="message.html">
                                <div class="icon_wrap">
                                    <span class="icon-envelope"></span>
                                    <span class="notification_count msg">6</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="cart.html">
                                <div class="icon_wrap">
                                    <span class="icon-basket"></span>
                                    <span class="notification_count purch">2</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--start .author__notification_area -->

                <div class="dropdown dropdown--author">
                    <ul>
                        <li>
                            <a href="author.html">
                                <span class="icon-user"></span>Profile</a>
                        </li>
                        <li>
                            <a href="dashboard.html">
                                <span class="icon-home"></span> Dashboard</a>
                        </li>
                        <li>
                            <a href="dashboard-setting.html">
                                <span class="icon-settings"></span> Setting</a>
                        </li>
                        <li>
                            <a href="cart.html">
                                <span class="icon-basket"></span>Purchases</a>
                        </li>
                        <li>
                            <a href="favourites.html">
                                <span class="icon-heart"></span> Favourite</a>
                        </li>
                        <li>
                            <a href="dashboard-add-credit.html">
                                <span class="icon-credit-card"></span>Add Credits</a>
                        </li>
                        <li>
                            <a href="dashboard-statement.html">
                                <span class="icon-chart"></span>Sale Statement</a>
                        </li>
                        <li>
                            <a href="dashboard-upload.html">
                                <span class="icon-cloud-upload"></span>Upload Item</a>
                        </li>
                        <li>
                            <a href="dashboard-manage-item.html">
                                <span class="icon-notebook"></span>Manage Item</a>
                        </li>
                        <li>
                            <a href="dashboard-withdrawal.html">
                                <span class="icon-briefcase"></span>Withdrawals</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="icon-logout"></span>Logout</a>
                        </li>
                    </ul>
                </div>

                <div class="text-center">
                    <a href="signup.html" class="author-area__seller-btn inline">Become a
                        Seller</a>
                </div>
            </div>
        </div>
        <!-- end /.mobile_content -->
    </div>


                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end  -->
    </div>
    <!-- end /.menu-area -->


     
    
    <!-- Breadcrumb Area -->
    <section class="blog_area p-top-100 p-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="single_blog blog--default">
                        <article>
                            <figure>
                                <img src="assets/img/bb1.jpg" alt="Blog image">
                            </figure>
                            <div class="blog__content">
                                <a href="#" class="blog__title">
                                    <h3><?php echo $blog_article_row['Post Name']; ?></h3>
                                </a>

                                <div class="blog__meta">
                                    <div class="author">
                                        <span class="icon-user"></span>
                                        <p>by
                                            <a href="#"><?php echo $blog_article_row['creator']; ?></a>
                                        </p>
                                    </div>
                                    <div class="date_time">
                                        <span class="icon-clock"></span>
                                        <p><?php echo $blog_article_row['posted_on']; ?></p>
                                    </div>
                                    <div class="comment_view">
                                        <p class="comment">
                                            <span class="icon-bubble"></span>45</p>
                                        <p class="view">
                                            <span class="icon-eye"></span>345</p>
                                    </div>
                                </div>
                            </div>

                            <div class="single_blog_content">
                            <?php echo $blog_article_row['Description']; ?>
                            </div>
                        </article>
                    </div><!-- ends: .single_blog -->

                    <div class="author_info">
                        <div class="author__img">
                            <img src="assets/img/authi.jpg" alt="Auth Image">
                        </div>

                        <div class="author__info">
                            <h4>About Admin</h4>
                            <p>Passages and more recently with desktop publishing software like Aldus the PageMaker they
                                including
                                versions of Lorem Ipsum.</p>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-google-plus"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-linkedin"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- ends: .author_info -->

                    <div class="comment_area">
                        <div class="comment__title">
                            <h4>2 comments</h4>
                        </div>

                        <div class="comment___wrapper">
                            <ul class="media-list">
                                <li class="depth-1">
                                    <div class="media">
                                        <div class="pull-left no-pull-xs">
                                            <a href="#" class="cmnt_avatar">
                                                <img src="assets/img/comavatar.jpg" class="media-object" alt="Sample Image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="media_top">
                                                <div class="heading_left pull-left">
                                                    <a href="#">
                                                        <h4 class="media-heading">Thesera Minton</h4>
                                                    </a>
                                                    <span>April 29, 2016</span>
                                                </div>
                                                <a href="#" class="reply d-sm-none d-md-block">Reply</a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do they eiusmod
                                                tempor unt ut labore et dolore magna aliquat enim ad minim.</p>
                                            <a href="#" class="reply visible-xs-m ">Reply</a>
                                        </div>
                                    </div>

                                    <ul class="children">
                                        <!-- Nested media object -->
                                        <li class="depth-2">
                                            <div class="media">
                                                <div class="pull-left no-pull-xs">
                                                    <a href="#" class="cmnt_avatar">
                                                        <img src="assets/img/comavatar2.png" class="media-object"
                                                             alt="Sample Image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media_top">
                                                        <div class="heading_left pull-left">
                                                            <a href="#">
                                                                <h4 class="media-heading">Toriesta PingPong</h4>
                                                            </a>
                                                            <span>April 29, 2016</span>
                                                        </div>
                                                        <a href="#" class="reply d-sm-none d-md-block">Reply</a>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do they
                                                        eiusmod tempor unt ut labore et dolore magna aliquat enim ad
                                                        minim.</p>
                                                    <a href="#" class="reply visible-xs-m">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="depth-1">
                                    <div class="media">
                                        <div class="pull-left no-pull-xs">
                                            <a href="#" class="cmnt_avatar">
                                                <img src="assets/img/comavatar2.png" class="media-object" alt="Sample Image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="media_top">
                                                <div class="heading_left pull-left">
                                                    <a href="#">
                                                        <h4 class="media-heading">Thesera Minton</h4>
                                                    </a>
                                                    <span>April 29, 2016</span>
                                                </div>
                                                <a href="#" class="reply d-sm-none d-md-block">Reply</a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do they eiusmod
                                                tempor unt ut labore et dolore magna aliquat enim ad minim.</p>
                                            <a href="#" class="reply visible-xs-m">Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- ends: .comment___wrapper -->
                    </div><!-- ends: .col-md-8 -->

                    <div class="comment_area comment--form">
                        <!-- start reply_form -->
                        <div class="comment__title">
                            <h4>Leave A Reply</h4>
                        </div>
                        <div class="commnet_form_wrapper">
                            <!-- start form -->
                            <form class="cmnt_reply_form" action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input_field" type="text" placeholder="Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input_field" type="email" placeholder="Email" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <textarea class="input_field" name="name" placeholder="Your text here..."
                                                  rows="10" cols="80"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn--md btn-primary" name="btn">Submit Now</button>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div><!-- ends: .comment_form_wrapper -->
                    </div><!-- ends: .comment_area_wrapper -->
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
                    <a href="#popular" id="popular-tab" class="active" aria-controls="popular"
                       role="tab" data-toggle="tab" aria-selected="true">Popular Posts</a>
                </li>
                <li>
                    <a href="#latest" class="" id="latest-tab" aria-controls="latest" role="tab"
                       data-toggle="tab" aria-selected="false">Latest Posts</a>
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


    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->

     <script src="assets/js/plugins.min.js"></script>

     <script src="assets/js/script.min.js"></script>

     <!-- endinject-->
</body>
</html>
<?php
}
?>