<?php
include 'inc/connect.php';
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
    <section class="event_details_intro bgimage">
        <div class="bg_image_holder">
            <img src="img/ev_bg.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="je_hero_content">
                        <h1 class="display-3">TemplateRo Upcoming Event in Bangladesh</h1>
                        <div class="je_date">
                            <p><span class="icon-location-pin"></span> November 27, 2017</p>
                            <p><span class="icon-calendar"></span> Dhaka, Bangladesh</p>
                        </div>
                    </div><!-- ends: .job_hero_content -->
                    <a href="#" class="btn btn--lg btn-secondary">Signup Now</a>
                </div><!-- ends: .col-md-8 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
        <div class="social-share content_above">
            <p>Share on:</p>
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
                        <span class="fa fa-pinterest"></span>
                    </a>
                </li>
            </ul>
        </div><!-- ends: .social-share -->
    </section><!-- ends: event_detail_breadcrumb -->
    <section class="event_details section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="event_module">
                        <h2 class="event_module__title">Event Overview</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam blandit hendrerit faucibus.
                            Suspendisse
                            hendrerit turpis dui, eget ultricies erat consequat ut. Sed ac velit iaculis, condimentum neque
                            eu, maximus urna. Maecenas vitae nunc sit amet risus aliquet facilisis. Cum sociis natoque
                            penatibus
                            et magnis dis parturient montes, nascetur ridiculus mus. In facilisis mi sit amet metus sagittis
                            rhoncus. Fusce eros diam, finibus eget quam at, mattis placerat nulla. Nulla id est dignissim,
                            vehicula enim id, dapibus sem. Integer auctor, massa id rhoncus efficitur, sem magna dignissim
                            velit, ut facilisis enim neque nec velit. Ves tibulum posuere urna non ante commodo, quis
                            accumsan
                            orci hendrerit. Nulla bibendum orci mi, sit amet malesuada diam.</p>
                        <ul class="list_item list-unstyled">
                            <li>Nullam metus nisi, cursus sit amet metus cursus sit amet</li>
                            <li>Ut sit amet iaculis ex metus nisi, cursus sit amet</li>
                            <li>Sed ac odio aliquet, fringilla odio metus nisi cursus</li>
                            <li>Nullam metus nisi, cursus sit amet metus cursus sit amet</li>
                            <li>Ut sit amet iaculis ex metus nisi, cursus sit amet</li>
                            <li>Sed ac odio aliquet, fringilla odio metus nisi cursus</li>
                        </ul>
                    </div><!-- ends: .event_module -->
                    <div class="event_module">
                        <h2 class="event_module__title">Event Speakers</h2>
                        <div>
                            <div class="single_speaker">
                                <div class="speaker__thumbnail">
                                    <img src="img/speaker1.jpg" alt="">
                                </div>
                                <div class="speaker__detail">
                                    <h3>Joshua Barajas</h3>
                                    <span class="ocuup">Web Developer</span>
                                    <p>Nullam blandit hendrerit faucibus. Suspendisse hendrerit turpis dui Sed ac velit
                                        iaculis.
                                    </p>
                                    <div class="speaker_social">
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
                                                    <span class="fa fa-pinterest"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- end single_speaker-->
                            <div class="single_speaker">
                                <div class="speaker__thumbnail">
                                    <img src="img/speaker2.jpg" alt="">
                                </div>
                                <div class="speaker__detail">
                                    <h3>Thomas Rogers</h3>
                                    <span class="ocuup">Digital Marketer</span>
                                    <p>Nullam blandit hendrerit faucibus. Suspendisse hendrerit turpis dui Sed ac velit
                                        iaculis.
                                    </p>
                                    <div class="speaker_social">
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
                                                    <span class="fa fa-pinterest"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- end single_speaker-->
                            <div class="single_speaker">
                                <div class="speaker__thumbnail">
                                    <img src="img/speaker3.jpg" alt="">
                                </div>
                                <div class="speaker__detail">
                                    <h3>Muri Khan</h3>
                                    <span class="ocuup">Software Engineer</span>
                                    <p>Nullam blandit hendrerit faucibus. Suspendisse hendrerit turpis dui Sed ac velit
                                        iaculis.
                                    </p>
                                    <div class="speaker_social">
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
                                                    <span class="fa fa-pinterest"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- end single_speaker-->
                            <div class="single_speaker">
                                <div class="speaker__thumbnail">
                                    <img src="img/speaker4.jpg" alt="">
                                </div>
                                <div class="speaker__detail">
                                    <h3>Robert Barrathleon</h3>
                                    <span class="ocuup">Software Engineer</span>
                                    <p>Nullam blandit hendrerit faucibus. Suspendisse hendrerit turpis dui Sed ac velit
                                        iaculis.
                                    </p>
                                    <div class="speaker_social">
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
                                                    <span class="fa fa-pinterest"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- end single_speaker-->
                        </div>
                    </div><!-- ends: .event_module -->
                    <div class="event_module sponsor--area">
                        <h2 class="event_module__title">Event Sponsors</h2>
                        <ul class="sponsores">
                            <li>
                                <img src="img/spn1.jpg" alt="Sponsors image">
                            </li>
                            <li>
                                <img src="img/sp2.jpg" alt="Sponsors image">
                            </li>
                            <li>
                                <img src="img/sp3.jpg" alt="Sponsors image">
                            </li>
                            <li>
                                <img src="img/spn1.jpg" alt="Sponsors image">
                            </li>
                            <li>
                                <img src="img/spn1.jpg" alt="Sponsors image">
                            </li>
                            <li>
                                <img src="img/sp2.jpg" alt="Sponsors image">
                            </li>
                            <li>
                                <img src="img/sp3.jpg" alt="Sponsors image">
                            </li>
                            <li>
                                <img src="img/spn1.jpg" alt="Sponsors image">
                            </li>
                        </ul>
                    </div><!-- ends: .event_module -->
                </div><!-- ends: .col-md-12 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
        <div class="google_map">
            <div class="location_address">
                <div class="addres_module">
                    <h3>Victory Business Centre, Somers Road North, Portsmouth</h3>
                    <p><span class="icon-earphones"></span>800 567.890.849</p>
                    <p><span class="icon-envelope-open"></span>support@TemplateRo.com</p>
                </div>
            </div>
            <div id="map"></div><!-- ends: .map -->
        </div>
        <div class="sign_up_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-12">
                        <h2 class="sign_up_title text-center">Sign Up & Get Your Ticket</h2>
                        <div class="ticket_form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="m-bottom-30">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-bottom-30">
                                            <input type="text" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="m-bottom-30">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-bottom-30">
                                            <input type="text" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <textarea cols="30" rows="10" placeholder="Yout text here" class="m-bottom-25"></textarea>
                                <div class="sub_btn text-center">
                                    <button type="button" class="btn btn--md btn-primary">Submit Now</button>
                                </div>
                            </form>
                        </div><!-- ends: .ticket_form -->
                    </div><!-- ends: col -->
                </div>
            </div>
        </div><!-- ends: .sign_up_area -->
    </section><!-- ends: .event_details -->
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