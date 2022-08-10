<?php

class main extends users
{

    public function __construct()
    {
        ob_start();
        $users = new users;

        $username = $users->username;

        $this->RunSql("SELECT * FROM public_info", 'public_info', 'normal', true);
        $this->RunSql("SELECT * FROM users WHERE username='$username'", 'user_info', 'normal', true);
        $this->public_info;
        $this->user_info;
    }

    public function head()
    {
?>
        <meta charset="UTF-8">
        <!-- viewport meta -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="TemplateRo - Digital Products Marketplace ">
        <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">
        <!-- inject:css-->
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/animate.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/jquery-ui.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/line-awesome.min.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/magnific-popup.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/owl.carousel.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/select2.min.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/slick.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/trumbowygs.min.css">
        <link rel="stylesheet" href="/TemplateRo/assets/vendor_assets/css/venobox.css">
        <link rel="stylesheet" href="/TemplateRo/assets/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <!-- endinject -->
        <!-- Favicon Icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/logo/icon.png">
    <?php
    }

    public function menu()
    {
    ?>
        <?php
        $color_mauve = false;

        if (isset($_GET['remove-item'])) {
            header("location: https://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']);
        }

        $rows = $this->public_info;
        $user_data = $this->user_info;

        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <?php
        if ($color_mauve == true) {
        ?>
            <div class="bg-primary" bis_skin_checked="1">
                <div class="menu-area menu--light" bis_skin_checked="1">
                <?php } ?>
                <div class="top-menu-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="menu-fullwidth">
                                    <div class="logo-wrapper">
                                        <div class="logo logo-top">
                                            <a href="/">
                                                <img src="/assets/img/logo/mini-logo_120x120.png" alt="logo image" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="menu-container">
                                        <div class="d_menu">
                                            <nav class="navbar navbar-expand-lg mainmenu__menu">
                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#wb-example-navbar-collapse-1" aria-controls="wb-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                                    <span class="navbar-toggler-icon icon-menu"></span>
                                                </button>
                                                <!-- Collect the nav links, forms, and other content for toggling -->
                                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                                    <ul class="navbar-nav">
                                                        <li class="has_dropdown">
                                                            <a href="/">all product</a>
                                                            <div class="dropdown dropdown--menu">
                                                                <ul>
                                                                    <li>
                                                                        <a href="/index2.php">website templates</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/index2.php">Wordpress themes</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/index3.php">prestations</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/index4.php">graphics</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/index5.php">plugins</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/index5.php">3D</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/index5.php">Vdeo</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/index5.php">Audio</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/index5.php">Services</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://hosting-templatero.ro">recomanded hosting</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
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
                                            <div class="author__notification_area" style="border-left: 0px;">
                                                <ul>
                                                    <?php
                                                    if ("fasfh") {
                                                    ?>
                                                        <li> <a href="/TemplatePlus/index.php"><button class="btn btn-lg btn-primary" style="width: 300px; background-position: 20px; background-image: url('http://localhost/assets/img/logo/icon.png'); background-size: 20px 20px; background-repeat:no-repeat;">unlimited downloads</button></a></li>

                                                    <?php
                                                    }
                                                    ?>
                                                    <li><a href="/uploader.php"><button class="btn btn-lg btn-primary" style="width: 220px;"><span class="icon-wallet" style="float: left; margin-top:12%;"></span> start selling</button></a></li>

                                                </ul>
                                            </div>


                                            <div class="author__notification_area">
                                                <ul>
                                                    <li class="has_dropdown">

                                                        <div class="icon_wrap">
                                                            <a href="collection/">
                                                                <span class="icon-heart"></span>
                                                                <span class="notification_count purch"><?php if (isset($_SESSION['favorite'])) {
                                                                                                            echo count($_SESSION['favorite']);
                                                                                                        } else {
                                                                                                            echo 0;
                                                                                                        }  ?></span>
                                                            </a>
                                                        </div>

                                                    </li>
                                                    <!--
                                                <a href="">
                                                    <li><a href=""><span class="icon-user menu_icon"></span></a></li>

                                                </a>
                                                -->
                                                    <!-- Collect the nav links, forms, and other content for toggling -->

                                                    <li class="has_dropdown">

                                                        <div class="icon_wrap">
                                                            <a href="cart.php">
                                                                <span class="icon-basket-loaded"></span>
                                                                <span class="notification_count purch"><?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                                                                                            echo count($_SESSION['cart']);
                                                                                                        } else {
                                                                                                            echo 0;
                                                                                                        }  ?></span>
                                                            </a>
                                                        </div>

                                                    </li>
                                                </ul>

                                            </div>

                                            <?php

                                            if (!isset($_SESSION['account']) && !empty($_SESSION['account'])) {
                                            ?>
                                                <div class="author__access_area" bis_skin_checked="1">
                                                    <ul class="d-flex">
                                                        <li><a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/auth/"; ?>">Sign in</a></li>
                                                        <li><a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/auth/signup"; ?>">Sign up</a></li>
                                                    </ul>
                                                </div>

                                            <?php
                                            }
                                            ?>

                                            <div class="author-author__info has_dropdown">
                                                <?php
                                                if (!isset($_SESSION['account'])) {
                                                ?>
                                                    <div class="author">
                                                    <?php
                                                }
                                                    ?>
                                                    <a href="<?php if (!isset($_SESSION['account'])) { ?> <?php echo "https://" . $_SERVER['SERVER_NAME'] . "/auth/"; ?> <?Php } ?>"><span class="icon-user menu_icon" style="font-size: 16px; background-color: transparent; color:#000;"></span></a>
                                                    <?php
                                                    if (!isset($_SESSION['account'])) {

                                                    ?>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                                <?php
                                                if (isset($_SESSION['account'])) {
                                                ?>
                                                    <div class="dropdown dropdown--author">
                                                        <div class="author-credits d-flex">
                                                            <div class="author__avatar">
                                                                <img src="/view-image?image_id=<?php echo $user_data['row']['avatar']; ?>" alt="user avatar" class="rounded-circle" width="40" height="40">
                                                            </div>
                                                            <div class="autor__info">
                                                                <p class="name"><?php echo $_SESSION['account']['userData']['username']; ?></p>
                                                                <p class="amount">&euro;<?php echo $user_data['row']['balance']; ?></p>
                                                            </div>
                                                        </div>
                                                        <ul>
                                                            <li>
                                                                <a href="author.php">
                                                                    <span class="icon-user"></span>Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard.php">
                                                                    <span class="icon-home"></span> Dashboard</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-setting.php">
                                                                    <span class="icon-settings"></span> Setting</a>
                                                            </li>
                                                            <li>
                                                                <a href="cart.php">
                                                                    <span class="icon-basket"></span>Purchases</a>
                                                            </li>
                                                            <li>
                                                                <a href="favourites.php">
                                                                    <span class="icon-heart"></span> Favourite</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-add-credit.php">
                                                                    <span class="icon-credit-card"></span>Add Credits</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-statement.php">
                                                                    <span class="icon-chart"></span>Sale Statement</a>
                                                            </li>
                                                            <li>
                                                                <a href="uploader.php">
                                                                    <span class="icon-cloud-upload"></span>Upload Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-manage-item.php">
                                                                    <span class="icon-notebook"></span>Manage Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-withdrawal.php">
                                                                    <span class="icon-briefcase"></span>Withdrawals</a>
                                                            </li>
                                                            <li>
                                                                <a href="logout.php">
                                                                    <span class="icon-logout"></span>Logout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        <!-- end .author-area -->
                                        <!-- author area restructured for mobile -->
                                        <?php
                                        if (isset($_SESSION['account'])) {
                                        ?>
                                            <div class="mobile_content ">
                                                <span class="icon-user menu_icon"></span>
                                                <!-- offcanvas menu -->
                                                <div class="offcanvas-menu closed">
                                                    <span class="icon-close close_menu"></span>
                                                    <div class="author-author__info">
                                                        <div class="author__avatar v_middle">
                                                            <img src="/view-image?image_id=<?php echo $user_data['row']['avatar']; ?>" alt="user avatar" class="rounded-circle" width="40" height="40">
                                                        </div>
                                                    </div>
                                                    <!--end /.author-author__info-->
                                                    <div class="author__notification_area">
                                                        <ul>

                                                            <li>
                                                                <a href="message.php">
                                                                    <div class="icon_wrap">
                                                                        <span class="icon-heart"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="cart.php">
                                                                    <div class="icon_wrap">
                                                                        <span class="icon-basket"></span>
                                                                        <span class="notification_count purch"><?php if (isset($_SESSION['cart'])) {
                                                                                                                    echo count($_SESSION['cart']);
                                                                                                                } else {
                                                                                                                    echo 0;
                                                                                                                } ?></span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <!--start .author__notification_area -->
                                                    <div class="dropdown dropdown--author">
                                                        <ul>
                                                            <li>
                                                                <a href="author.php">
                                                                    <span class="icon-user"></span>Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard.php">
                                                                    <span class="icon-home"></span> Dashboard</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-setting.php">
                                                                    <span class="icon-settings"></span> Setting</a>
                                                            </li>
                                                            <li>
                                                                <a href="cart.php">
                                                                    <span class="icon-basket"></span>Purchases</a>
                                                            </li>
                                                            <li>
                                                                <a href="favourites.php">
                                                                    <span class="icon-heart"></span> Favourite</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-add-credit.php">
                                                                    <span class="icon-credit-card"></span>Add Credits</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-statement.php">
                                                                    <span class="icon-chart"></span>Sale Statement</a>
                                                            </li>
                                                            <li>
                                                                <a href="uploader.php">
                                                                    <span class="icon-cloud-upload"></span>Upload Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-manage-item.php">
                                                                    <span class="icon-notebook"></span>Manage Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-withdrawal.php">
                                                                    <span class="icon-briefcase"></span>Withdrawals</a>
                                                            </li>
                                                            <?Php
                                                            if (isset($_SESSION['account'])) {
                                                            ?>
                                                                <li>
                                                                    <a href="#">
                                                                        <span class="icon-logout"></span>Logout</a>
                                                                </li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>

                                                    <?php
                                                    if (!isset($_SESSION['account'])) {
                                                    ?>
                                                        <div class="text-center">
                                                            <a href="signup.php" class="author-area__seller-btn inline">Become a
                                                                Seller</a>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        <?Php
                                        } else {
                                        ?>

                                        <?php
                                        }
                                        ?>
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
                <?php
                if ($color_mauve == true) {
                ?>
            </div>
        <?Php
                }
        ?>
        <div class="dropdown dropdown--author" bis_skin_checked="1">
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
                        <span class="icon-wallet"></span>Add Credits</a>
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
                        <span class="icon-note"></span>Manage Item</a>
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
    <?php
    }

    public function footer()
    {
        $rows = $this->public_info;
        $footer_white = false;
        $users = new users;
    ?>
        <style>
            .widget-about img {
                margin-bottom: 0px;
            }
        </style>
        <footer class="footer-area <?php if ($footer_white == true) { ?>footer--light<?php } ?>" style="<?php if ($footer_white == false) { ?>background-color: #192027; <?php } ?>">
            <div class="footer-big">
                <!-- start .container -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget">
                                <div class="widget-about">
                                    <img src="/assets/img/logo/logov21.png" alt="" width="100" height="100">
                                    <p>Pellentesque facilisis the ullamcorp keer sapien interdum is the magna pellentesque
                                        kequis
                                        hasellus keur condimentum eleifend.</p>
                                    <ul class="contact-details">
                                        <li>
                                            <span class="icon-earphones"></span>
                                            Call Us:
                                            <a href="tel:<?php echo $rows['row']['phone']; ?>"><?php echo $rows['row']['phone']; ?></a>
                                        </li>
                                        <li>
                                            <span class="icon-envelope-open"></span>
                                            <a href="mailto:<?php echo $rows['row']['support']; ?>"><?php echo $rows['row']['support']; ?></a>
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
                                    <h5 class="footer-widget-title <?php if ($footer_white == false) { ?>text--white<?php } ?>">Popular Category</h5>
                                    <ul>
                                        <li>
                                            <a <?php if ($footer_white == false) { ?>style="color:#fff;" <?php } ?>>Wordpress</a>
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
                                    <h5 class="footer-widget-title <?php if ($footer_white == false) { ?> text--white<?php } ?>">Our Company</h5>
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
                                    <h5 class="footer-widget-title <?php if ($footer_white == false) { ?>text--white <?php } ?>">Support</h5>
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
                                <p>&copy; 2021 - <?php echo date('Y'); ?>
                                    <a><?Php echo $rows['row']['site_name']; ?></a>. All rights reserved. Created by
                                    <a href="https://danid.rf.gd">danid</a>
                                </p>
                            </div>
                            <div class="go_top" style="display: block;" bis_skin_checked="1">
                                <span class="icon-arrow-up"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php
        $users->CheckNewIpLogged();
        ?>
    <?php
    }

    public function script_src()
    {
    ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script async src="https://www.googletagmanager.com/gtag/js?id=G-068FHJ9J5N"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-068FHJ9J5N');
        </script>
        <script src="/TemplateRo/assets/vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/jquery/uikit.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/bootstrap/popper.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/chart.bundle.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/grid.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/jquery-ui.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/jquery.barrating.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/jquery.countdown.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/jquery.counterup.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/jquery.easing1.3.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/owl.carousel.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/select2.full.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/slick.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/tether.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/trumbowyg.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/venobox.min.js"></script>
        <script src="/TemplateRo/assets/vendor_assets/js/waypoints.min.js"></script>
        <script src="/TemplateRo/assets/theme_assets/js/dashboard.js"></script>
        <script src="/TemplateRo/assets/theme_assets/js/main.js"></script>
        <script src="/TemplateRo/assets/theme_assets/js/map.js"></script>
<?php
    }
}
