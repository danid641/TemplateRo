<?php
require_once("inc/connect.php");
require_once("inc/banned_ip_russia.php");
session_start();

if (!isset( $_SESSION['account']['userData']['username'])) {
    header("location: https://".$_SERVER['SERVER_NAME']."/403.php");
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
    <section class="affiliate_area section--padding">
        <div class="container">
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Your Affiliate
                            <span class="highlighted">Link</span>
                        </h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats.
                            Lid est laborum dolo rumes fugats untras.</p>
                    </div>
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="cardify affiliate_form">
                        <form action="#">
                        </form><!-- ends: .form -->
                        <div class="generated">
                            <p>Affiliate Link</p>
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>.com?ref=<?php echo $_SESSION['account']['userData']['username']; ?>" class="link">http://<?php echo $_SERVER['SERVER_NAME']; ?>.com?ref=<?php echo $_SESSION['account']['userData']['username']; ?></a>
                        </div>
                    </div><!-- ends: .cardify -->
                </div><!-- ends: .col-md-6 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section><!-- ends: .affiliate_area -->
    <section class="affliate_rules section--padding">
        <div class="container">
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>How it <span class="highlighted">Works?</span></h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats.
                            Lid est laborum dolo rumes fugats untras.</p>
                    </div>
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="cardify affliate_rule_module">
                        <div class="affiliate_title">
                            <span class="primary icon-check"></span>
                            <h3 class="primary">Your Benefit</h3>
                        </div>
                        <div class="collapsible-content faq--card">
                            <ul class="card-content">
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                            </ul>
                        </div><!-- ends: .collapsible_content -->
                    </div><!-- ends: .sidebar-card -->
                </div><!-- ends: .col-md-6 -->
                <div class="col-md-6">
                    <div class="cardify affliate_rule_module">
                        <div class="affiliate_title">
                            <span class="danger icon-close"></span>
                            <h3 class="danger">You Can't</h3>
                        </div>
                        <div class="collapsible-content faq--card">
                            <ul class="card-content">
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Earn 50% on the initial purchase of every theme package, including our theme club.
                                    </a>
                                </li>
                            </ul>
                        </div><!-- ends: .collapsible_content -->
                    </div><!-- ends: .sidebar-card -->
                </div><!-- ends: .col-md-6 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section>
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