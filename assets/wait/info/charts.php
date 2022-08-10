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

<body class="dashboard-page preload">
    <?php require_once("../../../inc/menu.php"); ?>
    <section class="section--padding2 bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shortcode_module_title">
                        <div class="dashboard__title">
                            <h3>Charts 1</h3>
                        </div>
                    </div>
                    <div class="dashboard_module statistics_module">
                        <div class="dashboard__title">
                            <h4>Sales and Views Statistics</h4>
                            <div id="stat_legend" class="legend"></div>
                            <div class="select-wrap">
                                <select name="mon" class="period_selector">
                                    <option value="jan">Jan 2018</option>
                                    <option value="feb">Feb 2018</option>
                                    <option value="mar">Mar 2018</option>
                                </select>
                                <span class="lnr icon-arrow-down"></span>
                            </div>
                        </div><!-- ends: .dashboard__title -->
                        <div class="dashboard__content">
                            <canvas id="myChart"></canvas>
                            <div class="statistics_data">
                                <div class="single_stat_data">
                                    <h4 class="single_stat__title">478</h4>
                                    <p>Total <span>Sales</span> This Month</p>
                                </div>
                                <div class="single_stat_data">
                                    <h4 class="single_stat__title color-primary">$2,478</h4>
                                    <p>Total <span>Earnings</span> This Month</p>
                                </div>
                                <div class="single_stat_data align-right">
                                    <h4 class="single_stat__title color-secondary">478</h4>
                                    <p>Total <span>Sales</span> This Month</p>
                                </div>
                            </div>
                        </div><!-- ends: .dashboard__content -->
                    </div><!-- ends: .statistics_module -->
                </div><!-- end .col-md-12 -->
                <div class="col-md-12 m-top-50">
                    <div class="shortcode_module_title">
                        <div class="dashboard__title">
                            <h3>Charts 2</h3>
                        </div>
                    </div>
                    <div class="dashboard_module single_item_visitor">
                        <div class="dashboard__title">
                            <h4>Single Items Visitors</h4>
                            <div class="pull-right">
                                <div class="select-wrap">
                                    <select name="months" class="period_selector">
                                        <option value="jan">Jan 2018</option>
                                        <option value="feb">Feb 2018</option>
                                        <option value="mar">Mar 2018</option>
                                    </select>
                                    <span class="lnr icon-arrow-down"></span>
                                </div>
                            </div>
                        </div><!-- ends: .dashboard__title -->
                        <div class="dashboard__content">
                            <div class="item_info">
                                <div class="select-wrap">
                                    <select name="item" class="period_selector">
                                        <option value="mattheme">Material Admin - Responsive Admin Theme</option>
                                        <option value="reactAdmin">Best Free Responsive ReactJS Admin Themes</option>
                                        <option value="design">Best YouTube Channels For UI/UX Designers</option>
                                    </select>
                                    <span class="lnr icon-arrow-down"></span>
                                </div>
                                <div class="info">
                                    <h2 class="indicate">+60%</h2>
                                    <p>Compared to Last Month</p>
                                </div>
                            </div>
                            <canvas id="single_item_visit"></canvas>
                        </div><!-- ends: .dashboard__content -->
                    </div><!-- ends: .single_item_visitor -->
                </div>
                <div class="col-md-12 m-top-50">
                    <div class="shortcode_module_title">
                        <div class="dashboard__title">
                            <h3>Charts 3</h3>
                        </div>
                    </div>
                    <div class="dashboard_module single_item_visitor total_revenue">
                        <div class="dashboard__title">
                            <h4>Total Revenue</h4>
                            <div class="pull-right">
                                <div class="select-wrap">
                                    <select name="months" class="period_selector">
                                        <option value="jan">2018</option>
                                        <option value="feb">2017</option>
                                        <option value="mar">2016</option>
                                    </select>
                                    <span class="lnr icon-arrow-down"></span>
                                </div>
                            </div>
                        </div><!-- ends: .dashboard__title -->
                        <div class="dashboard__content">
                            <canvas id="revenue"></canvas>
                        </div><!-- ends: .dashboard__content -->
                    </div><!-- ends: .total_revenue -->
                </div>
                <div class="col-md-12 m-top-50">
                    <div class="shortcode_module_title">
                        <div class="dashboard__title">
                            <h3>Charts 4</h3>
                        </div>
                    </div>
                    <div class="dashboard_module visit_data">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="dashboard_module visit_data ">
                                    <div class="dashboard__content">
                                        <div class="chart_top">
                                            <div class="v_refer">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li>
                                                        <a href="#visit_source" class="active" id="v-source" aria-controls="visit_source" role="tab" data-toggle="tab" aria-selected="true">Visit Source</a>
                                                    </li>
                                                    <li>
                                                        <a href="#referrals" id="v-referrals" aria-controls="referrals" role="tab" data-toggle="tab" aria-selected="false">Referrals</a>
                                                    </li>
                                                </ul>
                                                <div class="select-wrap">
                                                    <select name="month" class="period_selector">
                                                        <option value="jan">Apr 2018</option>
                                                        <option value="feb">Mar 2018</option>
                                                        <option value="mar">Feb 2018</option>
                                                    </select>
                                                    <span class="lnr icon-arrow-down"></span>
                                                </div>
                                            </div><!-- ends: .v_refer -->
                                            <div class="charts">
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade show active" id="visit_source" aria-labelledby="v-source">
                                                        <canvas id="piechart"></canvas>
                                                        <div id="pie-legend" class="legend"></div>
                                                    </div><!-- ends: .tabpanel -->
                                                    <div role="tabpanel" class="tab-pane fade referrals_data" id="referrals" aria-labelledby="v-referrals">
                                                        <ul>
                                                            <li>
                                                                <p class="site"><img src="img/google.jpg" alt="" class="rounded-circle">google.com</p>
                                                                <p class="visit">
                                                                    <span>visitors:</span>250
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="site"><img src="img/dribbble.jpg" alt="" class="rounded-circle">dribbble.com</p>
                                                                <p class="visit">
                                                                    <span>visitors:</span>450
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="site"><img src="img/be.jpg" alt="" class="rounded-circle">behance.com</p>
                                                                <p class="visit">
                                                                    <span>visitors:</span>341
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="site"><img src="img/up.jpg" alt="" class="rounded-circle">uplabs.com</p>
                                                                <p class="visit">
                                                                    <span>visitors:</span>98
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div><!-- ends: .tabpanel -->
                                                </div>
                                            </div><!-- ends: .charts -->
                                        </div>
                                    </div>
                                </div><!-- ends: .dashboard_module -->
                            </div><!-- ends: .col-lg-6 -->
                        </div>
                    </div><!-- ends: .visit_data -->
                </div>
                <!-- end .col-md-6 -->
            </div>
        </div>
    </section>
    <?php require_once("../../../inc/footer.php"); ?>

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