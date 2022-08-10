<?php
session_start();

include 'inc/connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TemplateRo - Digital Products Marketplace ">
    <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">
    <title>Stand with Ukraine</title>
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
    <style>
        .txt-white {
            color: #fff;
        }

        .hero-area4 .hero-content .hero__content__title h1 {
            color: #fff;
        }

        .hero-area4 .hero-content .hero__content__title .tagline {
            color: #fff;
        }

        .product-excerpt .product-facts {
            border-top: none;
        }

        .btn{
            width: 311px;
        }

        @media (max-width: 1198px) {
            .mobile {
                visibility: visible;
                display: block;
            }

            .pc {
                display: none;
            }
        }

        @media (max-width: 432px) {
            #btn_dontaion {
                width: 200px;
            }

            #btn_return {
                width: 200px;
            }
        }

        @media (max-width: 311px) {
            #btn_dontaion {
                width: 150px;
            }

            #btn_return {
                width: 150px;
            }
        }

        @media (max-width: 280px) {
            #btn_dontaion {
                width: 130px;
            }

            #btn_return {
                width: 130px;
            }
        }
    </style>
    <script type="text/javascript" src="./lib/jquery-3.3.1.min.js"></script>
</head>

<body>
    <?php
    include 'inc/menu.php';
    ?>
    <section class="hero-area4 bgimage" style="background-image: url('https://s3p.tmimgcdn.com/landings/stand_ukr_showcase_bg.png');  background-size:cover; height: 100vh;">

        <div class="col-md-6" style="margin-top: 15px;">
            <div class="hero__content__title">
                <div class="shortcode_module_title">
                    <div class="dashboard__title">
                        <div class="content-wrapper">


                            <div class="hero__content__title">
                                <h1 class="txt-white" style="color: black; margin-bottom: 50px;">How Can You Help Ukraine?</h1>
                                <p style="color:black; font-size: 18px;">TemplateRo company is donating a major share of its earnings to the Ukrainian army and helps contractors who live and work in the cities under attack.</p>
                                <a href="/"><button class="btn btn-lg btn-warning" id="btn_return" style="background-color: #f9430a; color: #fff; border: #f9430a solid 1px; font-weight:800; font-size: 20px; margin-top: 11px;">View Design</button></a>
                                <br>
                                <a href="#donation"> <button class="btn btn-lg btn-light" id="btn_dontaion" style="color:black; border: 1px solid black; font-size: 20px; font-weight: 800; margin-top: 11px; ">Donation Organizations</button></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="latest-product section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1 id="donation">Major Donation Organizations in Ukraine</h1>
                        <p>Make your contribution to support the people of Ukraine morally and financially.</p>
                    </div>
                </div><!-- Ends: .col-md-12 -->
                <div class="col-lg-12">
                    <div class="product-list">
                        <div class="tab-content" id="lp-tab-content">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="https://s3p.tmimgcdn.com/landings/stand_ukr_card_alive.png" alt="" class="img-fluid">
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">

                                                <ul class="product-facts clearfix">
                                                    <li>
                                                        <h4>Come Back Alive</h4>
                                                    </li>
                                                    <li class="product-rating">
                                                        <ul class="list-unstyled">
                                                            <li><a href="https://www.comebackalive.in.ua/"><button class="btn btn-lg btn-success">Donate</button></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="https://s3p.tmimgcdn.com/landings/stand_ukr_nbu.png" alt="" class="img-fluid">
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">

                                                <ul class="product-facts clearfix">
                                                    <li>
                                                        <h4>Nbu</h4>
                                                    </li>
                                                    <li class="product-rating">
                                                        <ul class="list-unstyled">
                                                            <li><a href="https://bank.gov.ua/en/news/all/natsionalniy-bank-vidkriv-rahunok-dlya-gumanitarnoyi-dopomogi-ukrayintsyam-postrajdalim-vid-rosiyskoyi-agresiyi"><button class="btn btn-lg btn-success">Donate</button></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="https://s3p.tmimgcdn.com/landings/stand_ukr_razom.png" alt="" class="img-fluid">
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">

                                                <ul class="product-facts clearfix">
                                                    <li>
                                                        <h4>Razom</h4>
                                                    </li>
                                                    <li class="product-rating">
                                                        <ul class="list-unstyled">
                                                            <li><a href="https://razomforukraine.org/"><button class="btn btn-lg btn-success">Donate</button></a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="https://s3p.tmimgcdn.com/landings/stand_ukr_icrc.png" alt="" class="img-fluid">
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">

                                                <ul class="product-facts clearfix">
                                                    <li>
                                                        <h4>ICRC</h4>
                                                    </li>
                                                    <li class="product-rating">
                                                        <ul class="list-unstyled">
                                                            <li><a href="https://www.icrc.org/en/donate/ukraine"><button class="btn btn-lg btn-success">Donate</button></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="https://s3p.tmimgcdn.com/landings/stand_ukr_nova.png" alt="" class="img-fluid">
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">

                                                <ul class="product-facts clearfix">
                                                    <li>
                                                        <h4>Nova Ukraine</h4>
                                                    </li>
                                                    <li class="product-rating">
                                                        <ul class="list-unstyled">
                                                            <li><a href="https://novaukraine.org/"><button class="btn btn-lg btn-success">Donate</button></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="https://s3p.tmimgcdn.com/landings/stand_ukr_mkip.png" alt="" class="img-fluid">
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">

                                                <ul class="product-facts clearfix">
                                                    <li>
                                                        <h4>MKIP</h4>
                                                    </li>
                                                    <li class="product-rating">
                                                        <ul class="list-unstyled">
                                                            <li><a href="https://mkip.gov.ua/en/content/volonterski--organizacii.html"><button class="btn btn-lg btn-success">Get Involved </button></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Ends: .product-excerpt -->
                                        </div><!-- Ends: .product-single -->
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                            </div><!-- Ends: .tab-pane -->
                        </div>
                    </div>
                    <!-- Ends: .product-list -->
                </div>

            </div>
        </div>
    </section>
    <section class="subscribe bgimage" style="background-image: url('https://s3p.tmimgcdn.com/landings/stand_ukr_showcase_bg.png'); height: 700px; background-size:cover; background-repeat:no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 subscribe-inner" style="text-align: center; align-items:center; display:flex; height: 600px;">
                    <h1>We can stop the war together!</h1>
                </div>
            </div>
        </div>
    </section>
    <?php include 'inc/footer.php'; ?>


</body>

</html>