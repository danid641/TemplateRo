<?php
require_once("inc/connect.php");
require_once("inc/banned_ip_russia.php");
session_start();

$username = $_SESSION['account']['userData']['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (!isset( $_SESSION['account']['userData']['username'])) {
    header("refresh:0; url=https://".$_SERVER['SERVER_NAME']."/signup.php");
}


if (isset($_POST['validate'])) {
    $card_number = $_POST['card_number'];
    $card_cvv = $_POST['card_cvv'];
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
    <!-- start menu-area -->
    <?Php include 'inc/menu.php'; ?>
    <section class="dashboard-area">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Dashboard Menu
                        </button>
                        <ul class="dashboard_menu">
                            <li>
                                <a href="dashboard.html"><span class="lnr icon-home"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-setting.html"><span class="lnr icon-settings"></span>Setting</a>
                            </li>
                            <li>
                                <a href="dashboard-purchase.html"><span class="lnr icon-basket"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.html"><span class="lnr icon-credit-card"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.html"><span class="lnr icon-chart"></span>Statements</a>
                            </li>
                            <li>
                                <a href="dashboard-upload.html"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                            </li>
                            <li>
                                <a href="dashboard-manage-item.html"><span class="lnr icon-note"></span>Manage Items</a>
                            </li>
                            <li class="active">
                                <a href="dashboard-withdrawal.html"><span class="lnr icon-briefcase"></span>Withdrawals</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
        <div class="dashboard_contents section--padding">
            <div class="container">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="payment_module">
                                <div class="modules__title">
                                    <h4>Add Payment Methods</h4>
                                </div>
                                <div class="payment_tabs p-bottom-sm">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li>
                                            <a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Credit Card</a>
                                        </li>
                                        <li>
                                            <a class="" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Paypal</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="modules__content">
                                                <ul class="cards-logo">
                                                    <li><img src="img/maste-rcard.jpg" alt=""></li>
                                                    <li><img src="img/visa.jpg" alt=""></li>
                                                    <li><img src="img/ae.jpg" alt=""></li>
                                                    <li><img src="img/discover.jpg" alt=""></li>
                                                </ul>
                                                <div class="payment_info modules__content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group select-wrap">
                                                                <select class="text_field">
                                                                    <option value="">Select Credit Card</option>
                                                                    <option value="">Visa</option>
                                                                    <option value="">Master Card</option>
                                                                    <option value="">American Express</option>
                                                                    <option value="">Discover</option>
                                                                </select>
                                                                <span class="lnr icon-arrow-down"></span>
                                                            </div>
                                                        </div><!-- ends: .col-md-6 -->
                                                        <div class="col-md-6">
                                                            <div class="form-group select-wrap">
                                                                <select class="text_field">
                                                                    <option value="">Currency - US Dollar</option>
                                                                    <option value="">GBP</option>
                                                                    <option value="">AUD</option>
                                                                </select>
                                                                <span class="lnr icon-arrow-down"></span>
                                                            </div>
                                                        </div><!-- ends: .col-md-6 -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="card_name">Card Holder Number</label>
                                                                <input id="card_name" type="text" name="number_c" class="text_field" placeholder="Card Holder Name">
                                                            </div><!-- ends: .col-md-6 -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="card_number">Card Number</label>
                                                                <input id="card_number" type="text" name="card_number" class="text_field" placeholder="Enter your card number here...">
                                                            </div>
                                                        </div><!-- ends: .col-md-6 -->
                                                        <div class="col-md-6">
                                                            <!-- lebel for date selection -->
                                                            <label for="name">Expire Date</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <div class="select-wrap">
                                                                            <select name="months" id="name">
                                                                                <option value="">Month</option>
                                                                                <option value="jan">jan</option>
                                                                                <option value="feb">Feb</option>
                                                                                <option value="mar">Mar</option>
                                                                                <option value="apr">Apr</option>
                                                                                <option value="may">May</option>
                                                                                <option value="jun">Jun</option>
                                                                                <option value="jul">Jul</option>
                                                                                <option value="aug">Aug</option>
                                                                                <option value="sep">Sep</option>
                                                                                <option value="oct">Oct</option>
                                                                                <option value="nov">Nov</option>
                                                                                <option value="dec">Dec</option>
                                                                            </select>
                                                                            <span class="lnr icon-arrow-down"></span>
                                                                        </div><!-- ends: .select-wrap -->
                                                                    </div><!-- ends: .form-group -->
                                                                </div><!-- ends: .col-md-6-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <div class="select-wrap">
                                                                            <select name="years" id="years">
                                                                                <option value="">Year</option>
                                                                                <option value="28">2028</option>
                                                                                <option value="27">2027</option>
                                                                                <option value="26">2026</option>
                                                                                <option value="25">2025</option>
                                                                                <option value="24">2024</option>
                                                                                <option value="23">2023</option>
                                                                                <option value="22">2022</option>
                                                                                <option value="21">2021</option>
                                                                                <option value="20">2020</option>
                                                                                <option value="19">2019</option>
                                                                                <option value="18">2018</option>
                                                                                <option value="17">2017</option>
                                                                            </select>
                                                                            <span class="lnr icon-arrow-down"></span>
                                                                        </div><!-- ends: .select-wrap -->
                                                                    </div><!-- ends: .form-group -->
                                                                </div><!-- ends: .col-md-6-->
                                                            </div><!-- ends: .row -->
                                                        </div><!-- ends: .col-md-6 -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="cv_code">CVV Code</label>
                                                                <input id="cv_code" type="text" name="card_cvv" class="text_field" placeholder="Enter code here...">
                                                            </div>
                                                        </div><!-- ends: .col-md-6 -->
                                                        <div class="col-md-12">
                                                            <div class="custom-radio m-bottom-25">
                                                                <input type="checkbox" id="opt8" class="" name="filter_opt">
                                                                <label for="opt8"><span class="circle"></span>Save card for next time</label>
                                                            </div>
                                                            <input type="submit" class="btn btn--md btn-primary" value="Add Credit Now">
                                                        </div>
                                                    </div>
                                                </div><!-- ends: .payment_info -->
                                            </div><!-- ends: .modules__content -->
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="modules__content">
                                                <ul class="cards-logo">
                                                    <li><img src="img/paypal.jpg" alt=""></li>
                                                </ul>
                                                <div class="payment_info modules__content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group m-bottom-30">
                                                                <label for="paypal_email">Paypal Email</label>
                                                                <input id="paypal_email" type="email" class="text_field" placeholder="Enter Emial">
                                                            </div><!-- ends: .col-md-6 -->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" name="validate" class="btn btn--md btn-primary">Add Paypal</button>
                                                        </div>
                                                    </div>
                                                </div><!-- ends: .payment_info -->
                                            </div><!-- ends: .modules__content -->
                                        </div>
                                    </div>
                                </div><!-- ends: .payment_tabs -->
                            </div><!-- ends: .payment_module -->
                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->
                </form><!-- ends: .add_credit_form -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_contents -->
    </section><!-- ends: .dashboard-area -->
    <?php include 'inc/footer.php'; ?>
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