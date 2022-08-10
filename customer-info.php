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
    <section class="dashboard-area dashboard_purchase">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Dashboard Menu
                        </button>
                        <ul class="dashboard_menu dashboard_menu--two">
                            <li>
                                <a href="customer-dashboard.html"><span class="lnr icon-basket"></span>Purchase History</a>
                            </li>
                            <li>
                                <a href="customer-downloads.html"><span class="lnr icon-cloud-download"></span>Downloads</a>
                            </li>
                            <li class="active">
                                <a href="customer-info.html"><span class="lnr icon-settings"></span>Account Info</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
        <div class="dashboard_contents section--padding">
            <div class="container">
                <form action="#" class="setting_form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="information_module">
                                <a class="toggle_title">
                                    <h3>Personal Information</h3>
                                </a>
                                <div class="information__set toggle_module">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" id="fname" class="text_field" placeholder="First name" value="aazztech">
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" id="lname" class="text_field" placeholder="Last Name" value="Aazz Tech">
                                        </div>
                                        <div class="form-group">
                                            <label for="dname">Display Name</label>
                                            <input type="text" id="dname" class="text_field" placeholder="Display Name" value="AazzTech">
                                        </div>
                                        <div class="">
                                            <label for="emailad">Primary Email Address</label>
                                            <input type="text" id="emailad" class="text_field" placeholder="Email address" value="contact@aazztech.com">
                                        </div>
                                    </div><!-- ends: .information_wrapper -->
                                </div><!-- ends: .information__set -->
                            </div><!-- ends: .information_module -->
                            <div class="information_module">
                                <a class="toggle_title">
                                    <h3>Change Billing Address</h3>
                                </a>
                                <div class="information__set toggle_module">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="address1">Address Line 1</label>
                                            <input type="text" id="address1" class="text_field" placeholder="Address line one">
                                        </div>
                                        <div class="form-group">
                                            <label for="address2">Address Line 2</label>
                                            <input type="text" id="address2" class="text_field" placeholder="Address line two">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City / State
                                                <sup>*</sup>
                                            </label>
                                            <select name="city" id="city" class="text_field">
                                                <option value="">Select one</option>
                                                <option value="dhaka">Dhaka</option>
                                                <option value="sydney">Sydney</option>
                                                <option value="newyork">New York</option>
                                                <option value="london">London</option>
                                                <option value="mexico">New Mexico</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="zipcode">Zip / Postal Code
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="zipcode" class="text_field" placeholder="zip/postal code">
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country
                                                <sup>*</sup>
                                            </label>
                                            <select name="country" id="country" class="text_field">
                                                <option value="">Select one</option>
                                                <option value="dhaka">Dhaka</option>
                                                <option value="sydney">Sydney</option>
                                                <option value="newyork">New York</option>
                                                <option value="london">London</option>
                                                <option value="mexico">New Mexico</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <label for="zipcode">State / Province
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="state" class="text_field" placeholder="zip/postal code">
                                        </div>
                                    </div>
                                </div><!-- ends: .information__set -->
                            </div><!-- ends: .information_module -->
                            <div class="information_module">
                                <a class="toggle_title">
                                    <h3>Change Your Password</h3>
                                </a>
                                <div class="information__set toggle_module">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="fname2">New Password</label>
                                            <input type="password" id="fname2" class="text_field" placeholder="">
                                        </div>
                                        <div>
                                            <label for="lname2">Re-enter Password</label>
                                            <input type="password" id="lname2" class="text_field" placeholder="">
                                        </div>
                                    </div><!-- ends: .information_wrapper -->
                                </div><!-- ends: .information__set -->
                            </div><!-- ends: .information_module -->
                            <div class="dashboard_setting_btn text-left">
                                <button type="submit" class="btn btn--md btn-primary">Save Change</button>
                            </div>
                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->
                </form><!-- ends: form -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard_purchase -->
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