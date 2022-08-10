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
    <section class="about_hero bgimage">
        <div class="bg_image_holder">
            <img src="img/about_hero.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="about_hero_contents">
                        <h1 class="display-4">Welcome to
                            <span>TemplateRo</span>
                        </h1>
                        <p class="display-4">We Help Marketers Build Products</p>
                        <div class="about_hero_btns">
                            <a href="#" class="play_btn btn btn--lg btn-primary" data-toggle="modal" data-target="#myModal" data-theVideo="https://www.youtube.com/embed/lvtfD_rJ2hE">
                                <span class="icon-control-play"></span> Play Quick Video</a>
                            <a href="#" class="btn btn-light btn--lg">Join Us Today</a>
                        </div>
                    </div><!-- end .about_hero_contents -->
                </div><!-- end .col-md-12 -->
            </div><!-- end .row-->
        </div><!-- end .container -->
    </section><!-- ends: .about_hero -->
    <section class="about_mission">
        <div class="content_block1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="content_area m-bottom-md">
                            <h1 class="content_area--title">About
                                <span class="highlight">TemplateRo</span>
                            </h1>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra justo ut sceler isque the mattis,
                                leo quam aliquet congue this there placerat mi id nisi they interdum mollis. Praesent
                                pharetra
                                justo ut sceleris que the mattis, <br><br> leo quam aliquet. Nunc placer atmi id nisi interdum mollis
                                quam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt sanctus est Lorem ipsum dolor sit amet consetetur sadipscing.</p>
                        </div>
                    </div><!-- end .col-md-5 -->
                    <div class="col-xl-6 offset-xl-1 col-lg-6">
                        <img src="img/ab1.jpg" alt="" class="img-fluid">
                    </div>
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- ends: .content_block1 -->
        <div class="content_block2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <img src="img/ab2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-xl-6 offset-xl-1 col-lg-6">
                        <div class="content_area m-top-md">
                            <h1 class="content_area--title">TemplateRo
                                <span class="highlight">Mission</span>
                            </h1>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra justo ut sceler isque the mattis,
                                leo quam aliquet congue this there placerat mi id nisi they interdum mollis. Praesent
                                pharetra
                                justo ut sceleris que the mattis, leo quam aliquet. Nunc placer atmi id nisi interdum mollis
                                quam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt sanctus est Lorem ipsum dolor sit amet consetetur sadipscing.</p>
                        </div>
                    </div><!-- end .col-md-6 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- ends: .content_block2 -->
    </section><!-- ends: .about_mission -->
    <section class="counter-up-area counter-up--area2 p-top-40 p-bottom-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="counter-up">
                        <div class="counter warning">
                            <span class="icon-briefcase"></span>
                            <span class="count_up">38,436</span>
                            <p>Items for sale</p>
                        </div><!-- ends: .counter -->
                        <div class="counter info">
                            <span class="icon-basket"></span>
                            <span class="count_up">68,257</span>
                            <p>Total Sale</p>
                        </div><!-- ends: .counter -->
                        <div class="counter secondary">
                            <span class="icon-emotsmile"></span>
                            <span class="count_up">25,567</span>
                            <p>Happy Customers</p>
                        </div><!-- ends: .counter -->
                        <div class="counter danger">
                            <span class="icon-people"></span>
                            <span class="count_up">76,458</span>
                            <p>Members</p>
                        </div><!-- ends: .counter -->
                    </div><!-- ends: .counter-up -->
                </div><!-- end .col-md-12 -->
            </div>
        </div><!-- end .container -->
    </section><!-- ends: .counter-up-area -->
    <section class="team_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>The Team at <span class="highlighted">TemplateRo</span></h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats. Lid est laborum dolo rumes fugats untras.</p>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-single">
                        <figure>
                            <img src="img/team1.jpg" alt="" class="img-fluid rounded-circle">
                            <figcaption>
                                <h5>Douglus Khundu</h5>
                                <span class="member-title">CEO &amp; Founder</span>
                                <ul class="list-unstyled team-social">
                                    <li>
                                        <a href="">
                                            <span class="icon-envelope-open"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div><!-- ends: .team-single -->
                </div><!-- Ends: .col-lg-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-single">
                        <figure>
                            <img src="img/team2.jpg" alt="" class="img-fluid rounded-circle">
                            <figcaption>
                                <h5>Matt Kimel</h5>
                                <span class="member-title">Project Manager</span>
                                <ul class="list-unstyled team-social">
                                    <li>
                                        <a href="">
                                            <span class="icon-envelope-open"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div><!-- ends: .team-single -->
                </div><!-- ends: .col-lg-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-single">
                        <figure>
                            <img src="img/team3.jpg" alt="" class="img-fluid rounded-circle">
                            <figcaption>
                                <h5>Jason Bown</h5>
                                <span class="member-title">Web Developer</span>
                                <ul class="list-unstyled team-social">
                                    <li>
                                        <a href="">
                                            <span class="icon-envelope-open"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div><!-- ends: .team-single -->
                </div><!-- ends: .col-lg-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-single">
                        <figure>
                            <img src="img/team4.jpg" alt="" class="img-fluid rounded-circle">
                            <figcaption>
                                <h5>Bin Daisel</h5>
                                <span class="member-title">UI/UX Developer</span>
                                <ul class="list-unstyled team-social">
                                    <li>
                                        <a href="">
                                            <span class="icon-envelope-open"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div><!-- ends: .team-single -->
                </div><!-- ends: .col-lg-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-single">
                        <figure>
                            <img src="img/team3.jpg" alt="" class="img-fluid rounded-circle">
                            <figcaption>
                                <h5>Jason Bown</h5>
                                <span class="member-title">Web Developer</span>
                                <ul class="list-unstyled team-social">
                                    <li>
                                        <a href="">
                                            <span class="icon-envelope-open"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div><!-- ends: .team-single -->
                </div><!-- ends: .col-lg-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-single">
                        <figure>
                            <img src="img/team1.jpg" alt="" class="img-fluid rounded-circle">
                            <figcaption>
                                <h5>Douglus Khundu</h5>
                                <span class="member-title">CEO &amp; Founder</span>
                                <ul class="list-unstyled team-social">
                                    <li>
                                        <a href="">
                                            <span class="icon-envelope-open"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div><!-- ends: .team-single -->
                </div><!-- Ends: .col-lg-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-single">
                        <figure>
                            <img src="img/team4.jpg" alt="" class="img-fluid rounded-circle">
                            <figcaption>
                                <h5>Bin Daisel</h5>
                                <span class="member-title">UI/UX Developer</span>
                                <ul class="list-unstyled team-social">
                                    <li>
                                        <a href="">
                                            <span class="icon-envelope-open"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div><!-- ends: .team-single -->
                </div><!-- ends: .col-lg-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-single">
                        <figure>
                            <img src="img/team2.jpg" alt="" class="img-fluid rounded-circle">
                            <figcaption>
                                <h5>Matt Kimel</h5>
                                <span class="member-title">Project Manager</span>
                                <ul class="list-unstyled team-social">
                                    <li>
                                        <a href="">
                                            <span class="icon-envelope-open"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-social-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                    </div><!-- ends: .team-single -->
                </div><!-- ends: .col-lg-3 -->
            </div><!-- Ends: .row -->
        </div><!-- end .container -->
    </section><!-- ends: .team_area -->
    <section class="partner-area section--padding partner--area2">
        <div class="container">
            <!-- start row -->
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>We are <span class="highlighted">Featured on</span></h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats. Lid
                            est laborum dolo rumes fugats untras.</p>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="partners">
                        <div class="partner">
                            <img src="img/cl01.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl02.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl03.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl04.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl02.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl03.png" alt="partner image">
                        </div>
                        <div class="partner">
                            <img src="img/cl04.png" alt="partner image">
                        </div>
                    </div>
                </div>
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section>
    <section class="testimonial-area testimonial--2 section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Our Clients <span class="highlighted">Feedback</span></h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats. Lid
                            est laborum dolo rumes fugats untras.</p>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
            <!-- start row -->
            <div class="row">
                <!-- start .col-md-12 -->
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <div class="testimonials">
                            <div class="testimonials--author">
                                <img src="img/c4.jpg" alt="" class="img-fluid rounded-circle">
                                <h4>Bon Doe</h4>
                                <span>Product Designer</span>
                            </div>
                            <div class="testimonials--text">
                                <p>Investig ationes demons trave runt lectores legere lius quod klegunt saepi us clary tyitas
                                    Investig ationes demon trave rungt. Investig ationes trave lector ompanies that are leaders.</p>
                            </div>
                        </div><!-- Ends: .testimonial -->
                        <div class="testimonials">
                            <div class="testimonials--author">
                                <img src="img/c3.jpg" alt="" class="img-fluid rounded-circle">
                                <h4>Jason Smith</h4>
                                <span>Product Designer</span>
                            </div>
                            <div class="testimonials--text">
                                <p>Investig ationes demons trave runt lectores legere lius quod klegunt saepi us clary tyitas
                                    Investig ationes demon trave rungt. Investig ationes trave lector ompanies that are leaders.</p>
                            </div>
                        </div><!-- Ends: .testimonials -->
                    </div><!-- ends: .testimonial-slider -->
                    <div class="all-testimonial text-center">
                        <a href="testimonial.html" class="btn btn--lg btn-primary">View All Reviews</a>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end container -->
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