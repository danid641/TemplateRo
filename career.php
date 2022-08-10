<?php
require 'inc/connect.php';
require_once("inc/banned_ip_russia.php");
session_start();

$sql = "SELECT * FROM public_info";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
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
    <section class="job_hero_area bgimage">
        <div class="bg_image_holder">
            <img src="img/job_hero.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="job_hero_content">
                        <h1 class="display-3">Get A Job At <?php echo $row['site_name']; ?></h1>
                        <p><?php echo $row['site_name']; ?> Host passionate people who value our mission - giving you the power to create your much desired website.</p>
                    </div><!-- ends: .job_hero_content -->
                    <a href="#" class="btn btn--lg btn-primary">Open Positions</a>
                </div><!-- ends: .col-lg-8 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section><!-- ends: .job_hero_area -->
    <section class="feature_area section--padding">
        <div class="container">
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Our Benefits</h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats.
                            Lid
                            est laborum dolo rumes fugats untras.</p>
                    </div>
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="single_feature">
                        <div class="feature__icon">
                            <span class="icon-home"></span>
                        </div><!-- end .feature__icon -->
                        <div class="feature__content">
                            <h3>Work From Anywhere</h3>
                            <p>we offer flexible opportunities, such as full-time jobs, with alternative programs and partial availability of remote work.</p>
                        </div><!-- end .feature__content -->
                    </div><!-- end .single_feature -->
                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-6 col-sm-12">
                    <div class="single_feature">
                        <div class="feature__icon">
                            <span class="icon-badge"></span>
                        </div><!-- end .feature__icon -->
                        <div class="feature__content">
                            <h3>Mentoring Program</h3>
                            <p>We have a mentoring program for beginners.</p>
                        </div><!-- end .feature__content -->
                    </div><!-- end .single_feature -->
                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-6 col-sm-12">
                    <div class="single_feature">
                        <div class="feature__icon">
                            <span class="icon-eyeglass"></span>
                        </div><!-- end .feature__icon -->
                        <div class="feature__content">
                            <h3>Kick back</h3>
                            <p>Stay refreshed with over 19 paid holidays, use-what-you-need sick days, and four weeks of PTO.</p>
                        </div><!-- end .feature__content -->
                    </div><!-- end .single_feature -->
                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-6 col-sm-12">
                    <div class="single_feature">
                        <div class="feature__icon">
                            <span class="icon-cup"></span>
                        </div><!-- end .feature__icon -->
                        <div class="feature__content">
                            <h3>The loadout</h3>
                            <p>When we’re back in the office, enjoy daily catered lunches and snacks, a desk fund to make your space yours, and whatever you need for your computer setup, including a headphone allowance.</p>
                        </div><!-- end .feature__content -->
                    </div><!-- end .single_feature -->
                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-6 col-sm-12">
                    <div class="single_feature">
                        <div class="feature__icon">
                            <span class="icon-speedometer"></span>
                        </div><!-- end .feature__icon -->
                        <div class="feature__content">
                            <h3>Flexible Hours</h3>
                            <p>Spend some quality time with the next generation with parental leave, fertility, adoption, and surrogacy benefits.</p>
                        </div><!-- end .feature__content -->
                    </div><!-- end .single_feature -->
                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-6 col-sm-12">
                    <div class="single_feature">
                        <div class="feature__icon">
                            <span class="icon-plane"></span>
                        </div><!-- end .feature__icon -->
                        <div class="feature__content">
                            <h3>Work and Travel</h3>
                            <p>In a non-COVID world, get up to $270 per month for your commuting and parking needs.</p>
                        </div><!-- end .feature__content -->
                    </div><!-- end .single_feature -->
                </div><!-- ends: .col-lg-6 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section><!-- ends: .feature_area -->
    <section class="job_area p-top-95 p-bottom-70">
        <div class="container">
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Open Positions</h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats.
                            Lid
                            est laborum dolo rumes fugats untras.</p>
                    </div>
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
            <div class="row">
                <?php
                $fetch_product = "SELECT * FROM career";

                //execute the query

                $result = $conn->query($fetch_product);

                if ($result->num_rows > 0) {
                    //output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card_style2">
                                <div class="save_job" title="Save Job" data-toggle="tooltip">
                                    <span class="icon-heart"></span>
                                </div>
                                <h4 class="card_style2__title"><?php echo $row['job_title']; ?></h4>
                                <div class="card_style2__location_type">
                                    <p>
                                        <span class="icon-location-pin"></span><?php echo $row['job_adress']; ?>
                                    </p>
                                    <p>
                                        <?php //<span class="icon-wallet"></span>&euro; <?php echo $row['job_wallet'];  - <?php echo $row['job_wallet2']; ?>
                                    </p>
                                    <span class="type mcolorbg1"><?php echo $row['job_type'] ?></span>
                                </div>
                                <a href="job-detail.html">Learn More and Apply
                                    <span class="icon-arrow-right-circle"></span>
                                </a>
                            </div><!-- end /.single_job -->
                        </div><!-- ends: .col-lg-6 -->
                <?php
                    }
                }
                ?>
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section><!-- ends: .job_area -->
    <div class="content_block5 section--padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 v_middle">
                    <div class="content_block5_content m-bottom-md">
                        <h1>Find Out More About
                            <span class="highlighted"><?php echo $row['site_name']; ?></span>
                        </h1>
                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra justo ut sceler isque the mattis,
                            leo quam aliquet congue this there placerat mi id nisi they interdum mollis. Praesent phare
                            tra justo ut sceleris que the mattis, leo quam aliquet. Nunc placer atmi id nisi interdum
                            mollis quam.
                        </p>
                        <a href="about.html" class="btn btn--md btn--round btn-primary">About Us</a>
                    </div>
                </div><!-- end .col-md-5 -->
                <div class="col-xl-6 offset-xl-1 col-lg-6 v_middle">
                    <img src="img/knous.jpg" alt="The Image is broken or not available">
                </div><!-- end .col-md-6 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </div><!-- ends: .content_block5 -->
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