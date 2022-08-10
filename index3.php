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
    <section class="intro-area bgimage">
        <div class="bg_image_holder">
            <img src="img/shape_3.png" alt="">
        </div>
        <!-- start menu-area -->
        <div class="menu-area menu--light">
            <div class="top-menu-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-fullwidth">
                                <div class="logo-wrapper">
                                    <div class="logo logo-top">
                                        <a href="index.html"><img src="img/logo-light.png" alt="logo image" class="img-fluid"></a>
                                    </div>
                                </div>
                                <div class="menu-container">
                                    <div class="d_menu">
                                        <nav class="navbar navbar-expand-lg mainmenu__menu">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_collapse_3" aria-controls="navbar_collapse_3" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon icon-menu"></span>
                                            </button>
                                            <!-- Collect the nav links, forms, and other content for toggling -->
                                            <div class="collapse navbar-collapse" id="navbar_collapse_3">
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
                                                                                <a href="badges.html">Badges <span class="badge badge-primary">New</span></a>
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
                                                            <input type="text" class="form-control search_field" placeholder="Type words and hit enter...">
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
                                                                        <img src="img/notification_head.png" alt="">
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
                                                                        <img src="img/notification_head2.png" alt="">
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
                                                                        <img src="img/notification_head3.png" alt="">
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
                                                                        <img src="img/notification_head4.png" alt="">
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
                                                                <div class="notification__icons "><span class="icon-star reviewed noti_icon"></span>
                                                                </div>
                                                                <!-- end /.notifications -->
                                                            </div>
                                                            <!-- end /.notifications -->
                                                            <div class="text-center m-top-30 p-left-20 p-right-20"><a href="notification.html" class="btn btn-primary btn-md btn-block">View
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
                                                                        <img src="img/notification_head4.png" alt="">
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
                                                                        <img src="img/notification_head5.png" alt="">
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
                                                                        <img src="img/notification_head2.png" alt="">
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
                                                                        <img src="img/notification_head3.png" alt="">
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
                                                                        <img src="img/notification_head4.png" alt="">
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
                                                            <a href="message.html" class="btn btn-primary btn-md btn-block">View All</a>
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
                                                                            <img src="img/capro1.jpg" alt="cart product thumbnail">
                                                                        </div>
                                                                        <div class="info">
                                                                            <a class="title" href="single-product.html">Finance
                                                                                and Consulting Business Theme</a>
                                                                            <div class="cat">
                                                                                <a href="#">
                                                                                    <img src="img/catword.png" alt="">Wordpress</a>
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
                                                                            <img src="img/capro2.jpg" alt="cart product thumbnail">
                                                                        </div>
                                                                        <div class="info">
                                                                            <a class="title" href="single-product.html">Flounce
                                                                                - Multipurpose OpenCart Theme</a>
                                                                            <div class="cat">
                                                                                <a href="#">
                                                                                    <img src="img/catword.png" alt="">Wordpress</a>
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
                                                                    <span>Total :</span>$80
                                                                </p>
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
                                                <img src="img/user-avater.png" alt="user avatar" class="rounded-circle">
                                            </div>
                                            <div class="dropdown dropdown--author">
                                                <div class="author-credits d-flex">
                                                    <div class="author__avatar">
                                                        <img src="img/user-avater.png" alt="user avatar" class="rounded-circle">
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
                                                    <img src="img/user-avater.png" alt="user avatar">
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
        <div class="hero-area2">
            <div class="hero-content">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero__content__title">
                                    <h1>7,685 Premium Templates & Website Themes</h1>
                                    <p class="tagline">TemplateRo is the most powerful, & customizable template for Easy
                                        Digital Downloads Products</p>
                                </div><!-- end .hero__btn-area-->
                                <div class="search-area">
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <div class="search_box2">
                                                <form action="#">
                                                    <input type="text" class="text_field" placeholder="Search your products...">
                                                    <button type="submit" class="search-btn btn--lg btn-secondary">Search Now</button>
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
        </div><!-- End Hero Area -->
    </section><!-- ends: .intro-area -->
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
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">E-commerce Shopping Cart</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">Wordpress</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$59</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>85
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">TheBizz Wordpress Theme</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">Wordpress</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$49</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>74
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">TemplateRo EDD Template</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">HTML</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$18</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>341
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">AppPress PSD Template</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">PSD</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$20</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>112
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">Rida Wordpress Theme</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">Wordpress</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$59</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>551
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">TableGen Wordpress Plugin</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">Plugins</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$20</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>45
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">E-commerce Shopping Cart</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">Wordpress</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$59</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>85
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">TheBizz Wordpress Theme</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">Wordpress</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$49</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>74
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">TemplateRo EDD Template</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">HTML</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$18</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>341
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">AppPress PSD Template</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">PSD</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$20</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>112
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">Rida Wordpress Theme</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">Wordpress</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$59</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>551
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="product-single latest-single single--vendor">
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
                                    <h5><a href="">TableGen Wordpress Plugin</a></h5>
                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            in
                                            <a href="#">Plugins</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price">$20</li>
                                        <li class="sells">
                                            <span class="icon-basket"></span>45
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
                                </div><!-- Ends: .product-excerpt -->
                            </div><!-- Ends: .product-single -->
                        </div><!-- ends: .col-lg-4 -->
                    </div>
                    <div class="text-center m-top-30">
                        <a href="" class="btn btn--lg btn-primary">All New Products</a>
                    </div>
                </div><!-- ends: .col-lg-12 -->
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