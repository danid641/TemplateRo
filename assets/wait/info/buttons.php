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
                        <h2 class="page-title">Buttons</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Buttons</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->
    <section class="section--padding2 bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shortcode_modules">
                        <div class="modules__title">
                            <h3>Basic Buttons</h3>
                        </div>
                        <div class="modules__content">
                            <button class="btn btn-lg btn--round btn-primary">Primary</button>
                            <button class="btn btn-lg btn--round btn-secondary">Secondary</button>
                            <button class="btn btn-lg btn--round btn-success">Success</button>
                            <button class="btn btn-lg btn--round btn-info">Info</button>
                            <button class="btn btn-lg btn--round btn-warning">Warning</button>
                            <button class="btn btn-lg btn--round btn-danger">Danger</button>
                            <button class="btn btn-lg btn--round btn-light">Light</button>
                            <button class="btn btn-lg btn--round btn-dark">Dark</button>
                        </div>
                    </div><!-- ends: .shortcode_modules -->
                    <div class="shortcode_modules">
                        <div class="modules__title">
                            <h3>Buttons with Icons</h3>
                        </div>
                        <div class="modules__content">
                            <button class="btn btn-lg btn--icon btn--round btn-primary">
                                <span class="icon-home"></span>Large
                            </button>
                            <button class="btn btn--icon btn-default btn--round btn-secondary">
                                <span class="icon-settings"></span>Default
                            </button>
                            <button class="btn btn--icon btn-md btn--round btn-success">
                                <span class="icon-tag"></span>Medium
                            </button>
                            <button class="btn btn--icon btn-sm btn--round btn-info">
                                <span class="icon-like"></span>Small
                            </button>
                            <button class="btn btn--icon btn-sm btn-warning">
                                <span class="icon-bell"></span>Small
                            </button>
                        </div>
                    </div><!-- ends: .shortcode_modules -->
                    <div class="shortcode_modules">
                        <div class="modules__title">
                            <h3>Square Buttons</h3>
                        </div>
                        <div class="modules__content">
                            <button class="btn btn-lg btn-primary">Primary</button>
                            <button class="btn btn-lg btn-secondary">Secondary</button>
                            <button class="btn btn-lg btn-success">Success</button>
                            <button class="btn btn-lg btn-info">Info</button>
                            <button class="btn btn-lg btn-warning">Warning</button>
                            <button class="btn btn-lg btn-danger">Danger</button>
                            <button class="btn btn-lg btn-light">Light</button>
                            <button class="btn btn-lg btn-dark">Dark</button>
                        </div>
                    </div><!-- ends: .shortcode_modules -->
                    <div class="shortcode_modules">
                        <div class="modules__title">
                            <h3>Border Buttons</h3>
                        </div>
                        <div class="modules__content">
                            <button class="btn btn--round btn-outline-primary btn-lg">Primary</button>
                            <button class="btn btn--round btn-outline-secondary btn--bordered btn-lg">Secondary</button>
                            <button class="btn btn--round btn-outline-success btn--bordered btn-lg">Success</button>
                            <button class="btn btn--round btn-outline-info btn--bordered btn-lg">Info</button>
                            <button class="btn btn--round btn-outline-warning btn--bordered btn-lg">Warning</button>
                            <button class="btn btn--round btn-outline-danger btn--bordered btn-lg">Danger</button>
                            <button class="btn btn--round btn-outline-dark btn--bordered btn-lg">Dark</button>
                        </div>
                    </div><!-- ends: .shortcode_modules -->
                    <div class="shortcode_modules">
                        <div class="modules__title">
                            <h3>Buttons Size</h3>
                        </div>
                        <div class="modules__content">
                            <div>
                                <button class="btn btn--round btn-lg btn-primary">Button Large</button>
                                <button class="btn btn--round btn-outline-secondary btn-lg">Button Large</button>
                                <button class="btn btn-lg btn-success">Button Large</button>
                                <button class="btn btn--icon btn-lg btn--round btn-secondary">
                                    <span class="icon-settings"></span>Button Large
                                </button>
                            </div>
                            <div>
                                <button class="btn btn--round btn-default btn-primary">Button Default</button>
                                <button class="btn btn--round btn-outline-secondary btn-default">Button Default</button>
                                <button class="btn btn-default btn-success">Button Default</button>
                                <button class="btn btn--icon btn-default btn--round btn-secondary">
                                    <span class="icon-settings"></span>Button Default
                                </button>
                            </div>
                            <div>
                                <button class="btn btn--round btn-md btn-primary">Button Medium</button>
                                <button class="btn btn--round btn-outline-secondary btn-md">Button Medium</button>
                                <button class="btn btn-md btn-success">Button Medium</button>
                                <button class="btn btn--icon btn-md btn--round btn-secondary">
                                    <span class="icon-settings"></span>Button Medium
                                </button>
                            </div>
                            <div>
                                <button class="btn btn--round btn-sm btn-primary">Button Small</button>
                                <button class="btn btn--round btn-outline-secondary btn-sm">Button Small</button>
                                <button class="btn btn-sm btn-success">Button Small</button>
                                <button class="btn btn--icon btn-sm btn--round btn-secondary">
                                    <span class="icon-settings"></span>Button Small
                                </button>
                            </div>
                        </div>
                    </div><!-- ends: .shortcode_modules -->
                </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: section -->
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