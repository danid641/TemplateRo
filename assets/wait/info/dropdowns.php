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
    <section class="bgcolor p-top-100 p-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shortcode_modules">
                        <div class="modules__title">
                            <h3>Dropdown On Hover</h3>
                        </div>
                        <div class="modules__content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="has_dropdown">
                                        <button class="btn btn-outline-primary btn-md">Dropdown One</button>
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
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="has_dropdown">
                                        <button class="btn btn-outline-primary btn-md">Dropdown Two</button>
                                        <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li>
                                                    <a href="all-products.html">Recent Items</a>
                                                </li>
                                                <li>
                                                    <a href="all-products.html">Popular Items</a>
                                                </li>
                                                <li>
                                                    <a href="index3.html">Free Templates</a>
                                                </li>
                                                <li>
                                                    <a href="#">Follow Feed</a>
                                                </li>
                                                <li>
                                                    <a href="#">Top Authors</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shortcode_modules">
                        <div class="modules__title">
                            <h3>Dropdown On Click</h3>
                        </div>
                        <div class="modules__content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="inline">
                                        <a href="#" id="drop2" class="dropdown-toggle btn btn-outline-primary btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Dropdown One
                                        </a>
                                        <ul class="custom_dropdown messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                            <li>
                                                <a href="#">
                                                    <span class="icon-drawer"></span>Inbox</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="icon-star"></span>Starred</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="icon-paper-plane"></span>Sent</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="icon-trash"></span>Trash</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="inline">
                                        <a href="#" id="drop3" class="dropdown-toggle btn btn-outline-primary btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Dropdown One
                                        </a>
                                        <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop3">
                                            <li>
                                                <a href="#">Mark as unread</a>
                                            </li>
                                            <li>
                                                <a href="#">Dropdown link</a>
                                            </li>
                                            <li>
                                                <a href="#">All Attachments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
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