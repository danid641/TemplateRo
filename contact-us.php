<?php
include 'inc/connect.php';
require_once("inc/banned_ip_russia.php");
session_start();

$sql_publicInfo = "SELECT * FROM public_info";
$sql_publicInfo_result = mysqli_query($conn, $sql_publicInfo);
$sql_publicInfo_Row = mysqli_fetch_array($sql_publicInfo_result);

if(isset($_POST['validate_data'])){
    $user = $_POST['user'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(!empty($user) && !empty($email) && !empty($message)){
        $sql_message = "INSERT INTO `contact-us` (username, email, message) VALUE ('$user', '$email', '$message')";
        $sql_message_result = mysqli_query($conn, $sql_message);
    }
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
    <section class="contact-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h1>How can We <span class="highlighted">Help?</span></h1>
                                <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis
                                    fugats. Lid est laborum dolo rumes fugats untras.</p>
                            </div>
                        </div><!-- ends: .col-md-12 -->
                    </div><!-- ends: .row -->
                                <div class="alert alert-secondary" role="alert" bis_skin_checked="1">
                                <strong>We would really like to ask you to please not submit multiple support tickets regarding the same issue, as that will only delay a reply even further.</strong>
                                </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact_tile">
                                <span class="tiles__icon icon-location-pin"></span>
                                <h4 class="tiles__title">Office Address</h4>
                                <div class="tiles__content">
                                    <p><?php echo $sql_publicInfo_Row['bussines adress']; ?></p>
                                </div>
                            </div><!-- ends: .contact_tile -->
                        </div><!-- ends: col-md-4 -->
                        <div class="col-md-4">
                            <div class="contact_tile">
                                <span class="tiles__icon icon-earphones"></span>
                                <h4 class="tiles__title">Phone Number</h4>
                                <div class="tiles__content">
                                    <p>
                                    <p><?php echo $sql_publicInfo_Row['phone']; ?></p>                                </p>
                                </div>
                            </div><!-- ends: .contact_tile -->
                        </div><!-- ends: col-md-4 -->
                        <div class="col-md-4">
                            <div class="contact_tile">
                                <span class="tiles__icon icon-envelope-open"></span>
                                <h4 class="tiles__title">Email adress</h4>
                                <div class="tiles__content">
                                    <p>
                                    <p><?php echo $sql_publicInfo_Row['support']; ?></p>
                                    </p>
                                </div>
                            </div><!-- ends: .contact_tile -->
                        </div><!-- ends: .col-md-4 -->
                        <div class="col-md-12">
                            <div class="contact_form cardify">
                                <div class="contact_form__title">
                                    <h2>Leave Your Messages</h2>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="contact_form--wrapper">
                                            <form action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="user" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="email" placeholder="Email">
                                                        </div>
                                                    </div>
                                                </div>                                               
                                                <textarea cols="30" rows="10" name="message" placeholder="Yout text here"></textarea>
                                                <div class="sub_btn">
                                                    <button type="submit" name="validate_data" class="btn btn--md btn-primary">Send Request
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- ends: .col-md-8 -->
                                </div><!-- ends: .row -->
                            </div><!-- ends: .contact_form -->
                        </div><!-- ends: .col-md-12 -->
                    </div>
                </div>
            </div>
        </div><!-- ends: .container -->
    </section><!-- ends: .contact-area -->
    <div id="map"></div><!-- ends: .map -->
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