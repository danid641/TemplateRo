<?php

require 'autoload.php';

session_start();


class PageController extends users
{
    public function __construct()
    {
        global $conn;
        global $username;
        global $sql_r;

        $this->checkLogged();

        $username = $this->username;
        $conn = $this->conn;
        $this->RunSql("SELECT * FROM users WHERE username='$username'", 'sql_r', 'normal', true);
        $sql_r = $this->sql_r;
    }
}

new PageController;
$main = new main;
?>


<!doctype HTML>
<html lang="en">

<head>
    <?php $main->head(); ?>
    <title>TemplateRo - Digital Products Marketplace</title>

</head>

<body class="dashboard-page preload">
    <?php $main->menu(); ?>
    <section class="dashboard-area">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggler d-md-none">
                            <span class="icon-menu"></span> Dashboard Menu
                        </button>
                        <ul class="dashboard_menu">
                            <li class="active">
                                <a href="dashboard.php"><span class="lnr icon-home"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-setting.php"><span class="lnr icon-settings"></span>Setting</a>
                            </li>
                            <li>
                                <a href="dashboard-purchase.php"><span class="lnr icon-basket"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.php"><span class="lnr icon-credit-card"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.php"><span class="lnr icon-chart"></span>Statements</a>
                            </li>
                            <li>
                                <a href="uploader.php"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                            </li>
                            <li>
                                <a href="dashboard-manage-item.php"><span class="lnr icon-note"></span>Manage Items</a>
                            </li>
                            <li>
                                <a href="dashboard-withdrawal.php"><span class="lnr icon-briefcase"></span>Withdrawals</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
        <div class="dashboard_contents p-top-100 p-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="author-info author-info--dashboard">
                            <h1 class="primary">&euro;<?php if (!empty($sql_r['row']['balance'])) {
                                                            echo $sql_r['row']['balance'];
                                                        } else {
                                                            echo 0;
                                                        } ?></h1>
                            <p>Available Balance</p>
                        </div>
                    </div><!-- end .col-lg-3 -->
                    <?php
                    $month = date('m');
                    $year = date('Y');
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="author-info author-info--dashboard">
                            <h1 class="secondary">&euro;<?php
                                                        $month_Earnings = "SELECT SUM(payment_amount) as sum FROM transaction WHERE month='$month' && username = '$username'";
                                                        $result = $conn->query($month_Earnings);

                                                        if ($result->num_rows > 0) {
                                                            //output data of each row
                                                            while ($row = $result->fetch_assoc()) {
                                                                if (!empty($row['sum'])) {
                                                                    echo $row['sum'];
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                echo $row['sum'];
                                                            }
                                                        }
                                                        ?></h1>
                            <p>Monthly Earnings</p>
                        </div>
                    </div><!-- end .col-lg-3 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="author-info author-info--dashboard">
                            <h1 class="info">&euro;<?php
                                                    $yearly_Earnings = "SELECT SUM(payment_amount) as sum FROM transaction WHERE year='$year' && username = '$username'";
                                                    $results = $conn->query($yearly_Earnings);

                                                    if ($results->num_rows > 0) {
                                                        //output data of each row
                                                        while ($row = $results->fetch_assoc()) {
                                                            if (!empty($row['sum'])) {
                                                                echo $row['sum'];
                                                            } else {
                                                                echo 0;
                                                            }
                                                            echo $row['sum'];
                                                        }
                                                    }
                                                    ?></h1>
                            <p>Yearly Earnings</p>
                        </div>
                    </div><!-- end .col-lg-3 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="author-info author-info--dashboard">
                            <h1 class="danger">&euro;<?php
                                                        $lifetime_Earnings = "SELECT SUM(payment_amount) as sum FROM transaction WHERE username = '$username'";
                                                        $result = mysqli_query($conn, $lifetime_Earnings);
                                                        $lifetime = mysqli_fetch_assoc($result);

                                                        echo $lifetime['sum'];

                                                        ?></h1>
                            <p>Lifetime Earnings</p>
                        </div>
                    </div><!-- end .col-lg-3 -->
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="dashboard_module recent_sells">
                            <div class="dashboard__title">
                                <h4>Recent Items Sales</h4>
                                <div class="loading">
                                    <a href="#">Refresh <span class="lnr icon-refresh"></span></a>
                                </div>
                            </div><!-- ends: .dashboard__title -->
                            <div class="dashboard__content">
                                <ul>
                                    <li>
                                        <div class="single_sell">
                                            <div class="single_sell__thumb-title">
                                                <div class="prod_thumbnail">
                                                    <img src="assets/img/prodthumb1.jpg" alt="product thumbnail">
                                                </div>
                                                <div class="prod_title">
                                                    <h6>Finance and Consulting Business Theme</h6>
                                                    <div class="category">
                                                        <span>Wordpress</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ammount">
                                                <p>$34.25</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_sell">
                                            <div class="single_sell__thumb-title">
                                                <div class="prod_thumbnail">
                                                    <img src="assets/img/prodthumb2.jpg" alt="product thumbnail">
                                                </div>
                                                <div class="prod_title">
                                                    <h6>Best Free Responsive ReactJS Admin Themes</h6>
                                                    <div class="category">
                                                        <span>Wordpress</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ammount">
                                                <p>$34.25</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_sell">
                                            <div class="single_sell__thumb-title">
                                                <div class="prod_thumbnail">
                                                    <img src="assets/img/prodthumb3.jpg" alt="product thumbnail">
                                                </div>
                                                <div class="prod_title">
                                                    <h6>Best YouTube Channels For UI/UX Designers</h6>
                                                    <div class="category">
                                                        <span>Wordpress</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ammount">
                                                <p>$34.25</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_sell">
                                            <div class="single_sell__thumb-title">
                                                <div class="prod_thumbnail">
                                                    <img src="assets/img/prodthumb1.jpg" alt="product thumbnail">
                                                </div>
                                                <div class="prod_title">
                                                    <h6>Finance and Consulting Business Theme</h6>
                                                    <div class="category">
                                                        <span>Wordpress</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ammount">
                                                <p>$34.25</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- ends: .dashboard__content -->
                        </div><!-- ends: .dashboard_module -->
                    </div><!-- ends: .col-md-8 -->
                    <div class="col-lg-4 col-md-12">
                        <div class="dashboard_module recent_buyers">
                            <div class="dashboard__title">
                                <h4>Recent Buyers</h4>
                                <div class="loading">
                                    <a href="#">
                                        Refresh <span class="lnr icon-refresh"></span>
                                    </a>
                                </div>
                            </div><!-- ends: .dashboard__title -->
                            <div class="dashboard__content">
                                <ul>
                                    <li>
                                        <div class="single_buyer">
                                            <div class="buyer__thumb_title">
                                                <div class="thumb">
                                                    <img src="assets/img/buyr1.png" alt="Buyer Images">
                                                </div>
                                                <div class="title">
                                                    <h6>James Anderson</h6>
                                                    <p>United States</p>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <p>$29</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_buyer">
                                            <div class="buyer__thumb_title">
                                                <div class="thumb">
                                                    <img src="assets/img/buyr2.png" alt="Buyer Images">
                                                </div>
                                                <div class="title">
                                                    <h6>Tarashi Hamada</h6>
                                                    <p>Japan</p>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <p>$26</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_buyer">
                                            <div class="buyer__thumb_title">
                                                <div class="thumb">
                                                    <img src="assets/img/buyr3.png" alt="Buyer Images">
                                                </div>
                                                <div class="title">
                                                    <h6>Shah Hossain</h6>
                                                    <p>United Kingdom</p>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <p>$19</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_buyer">
                                            <div class="buyer__thumb_title">
                                                <div class="thumb">
                                                    <img src="assets/img/buyr4.png" alt="Buyer Images">
                                                </div>
                                                <div class="title">
                                                    <h6>James Anderson</h6>
                                                    <p>Germany</p>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <p>$29</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_buyer">
                                            <div class="buyer__thumb_title">
                                                <div class="thumb">
                                                    <img src="assets/img/buyr1.png" alt="Buyer Images">
                                                </div>
                                                <div class="title">
                                                    <h6>James Anderson</h6>
                                                    <p>Canada</p>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <p>$29</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- ends: .dashboard__content -->
                        </div><!-- ends: .dashboard_module -->
                    </div><!-- ends: .col-md-4 -->
                    <div class="col-lg-12">
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
                    </div><!-- ends: .col-md-12 -->
                    <div class="col-lg-8 col-md-12">
                        <div class="dashboard_module popular_sells">
                            <div class="dashboard__title">
                                <h4>Popular Products</h4>
                                <div class="loading">
                                    <a href="#">
                                        Refresh <span class="lnr icon-refresh"></span>
                                    </a>
                                </div>
                            </div><!-- ends: .dashboard__title -->
                            <div class="dashboard__content">
                                <ul>
                                    <li>
                                        <div class="single_sell">
                                            <div class="single_sell__thumb-title">
                                                <div class="prod_thumbnail">
                                                    <img src="assets/img/prodthumb1.jpg" alt="product thumbnail">
                                                </div>
                                                <div class="prod_title">
                                                    <h6>HTML5 Template</h6>
                                                    <div class="category">
                                                        <span>Templates</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ammount">
                                                <p>110 Sales</p>
                                                <p>$634.25</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_sell">
                                            <div class="single_sell__thumb-title">
                                                <div class="prod_thumbnail">
                                                    <img src="assets/img/prodthumb2.jpg" alt="product thumbnail">
                                                </div>
                                                <div class="prod_title">
                                                    <h6>Ecommerce Website</h6>
                                                    <div class="category">
                                                        <span>Wordpress</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ammount">
                                                <p>726 Sales</p>
                                                <p>$1334.25</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_sell">
                                            <div class="single_sell__thumb-title">
                                                <div class="prod_thumbnail">
                                                    <img src="assets/img/prodthumb3.jpg" alt="product thumbnail">
                                                </div>
                                                <div class="prod_title">
                                                    <h6>Wordpress Theme</h6>
                                                    <div class="category">
                                                        <span>Wordpress</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ammount">
                                                <p>190 Sales</p>
                                                <p>$1391.25</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_sell">
                                            <div class="single_sell__thumb-title">
                                                <div class="prod_thumbnail">
                                                    <img src="assets/img/prodthumb1.jpg" alt="product thumbnail">
                                                </div>
                                                <div class="prod_title">
                                                    <h6>Wordpress Plugin</h6>
                                                    <div class="category">
                                                        <span>Plugins</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ammount">
                                                <p>1027 Sales</p>
                                                <p>$7,189.21</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- ends: .dashboard__content -->
                        </div><!-- ends: .dashboard_module -->
                    </div><!-- ends: .col-md-8 -->
                    <div class="col-lg-4 col-md-12">
                        <div class="dashboard_module recent_activity">
                            <div class="dashboard__title">
                                <h4>Recent Activity</h4>
                                <div class="loading">
                                    <a href="#">
                                        Refresh <span class="lnr icon-refresh"></span>
                                    </a>
                                </div>
                            </div><!-- ends: .dashboard__title -->
                            <div class="dashboard__content">
                                <ul>
                                    <li>
                                        <div class="icon"><span class="bg-secondary">S</span></div>
                                        <div class="activity-contents">
                                            <h6>Sold an item</h6>
                                            <p>Amanta just purchased “Bizillion HTML Theme”!</p>
                                            <span>02.30 PM</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="bg-primary">P</span></div>
                                        <div class="activity-contents">
                                            <h6>Product on the Envato Market</h6>
                                            <p>David Gamae added Admin Dashboard</p>
                                            <span>Yesterday</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="bg-danger">C</span></div>
                                        <div class="activity-contents">
                                            <h6>Chris Bent</h6>
                                            <p>Chris Bent sent you a message</p>
                                            <span>Aug 14, 2018</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><span class="bg-info">J</span></div>
                                        <div class="activity-contents">
                                            <h5>Jimmy Yeasuku</h5>
                                            <p>Added a new task: Directorist Plugin</p>
                                            <span>Jun 02, 2018</span>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- ends: .dashboard__content -->
                        </div><!-- `ends: .recent_activity -->
                    </div><!-- ends: .col-md-4 -->
                    <div class="col-lg-6 col-md-12">
                        <div class="dashboard_module chart country_statistics">
                            <div class="dashboard__title">
                                <h4>Country Statistics</h4>
                                <div class="select-wrap">
                                    <select name="months" class="period_selector">
                                        <option value="jan">Mar 2018</option>
                                        <option value="feb">Feb 2018</option>
                                        <option value="mar">Jan 2018</option>
                                    </select>
                                    <span class="lnr icon-arrow-down"></span>
                                </div>
                            </div><!-- ends: .dashboard__title -->
                            <div class="dashboard__content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Country</th>
                                                <th>Visitors</th>
                                                <th>Sales</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="country_flag">
                                                        <img src="assets/img/flam.png" alt="Country Flag">
                                                    </div>
                                                    <span>United States</span>
                                                </td>
                                                <td>546</td>
                                                <td>$230</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="country_flag">
                                                        <img src="assets/img/flg2.png" alt="Country Flag">
                                                    </div>
                                                    <span>United Kingdom</span>
                                                </td>
                                                <td>246</td>
                                                <td>$80</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="country_flag">
                                                        <img src="assets/img/flg3.png" alt="Country Flag">
                                                    </div>
                                                    <span>Canada</span>
                                                </td>
                                                <td>170</td>
                                                <td>$65</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="country_flag">
                                                        <img src="assets/img/flg4.png" alt="Country Flag">
                                                    </div>
                                                    <span>Newzland</span>
                                                </td>
                                                <td>78</td>
                                                <td>$24</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="country_flag">
                                                        <img src="assets/img/flau.jpg" alt="Country Flag">
                                                    </div>
                                                    <span>Australia</span>
                                                </td>
                                                <td>246</td>
                                                <td>$480</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- ends: .dashboard__content -->
                        </div><!-- ends: .dashboard_module -->
                    </div><!-- ends: .col-md-6 -->
                    <div class="col-lg-6 col-md-12">
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
                                                        <p class="site"><img src="assets/img/google.jpg" alt="" class="rounded-circle">google.com</p>
                                                        <p class="visit">
                                                            <span>visitors:</span>250
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p class="site"><img src="assets/img/dribbble.jpg" alt="" class="rounded-circle">dribbble.com</p>
                                                        <p class="visit">
                                                            <span>visitors:</span>450
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p class="site"><img src="assets/img/be.jpg" alt="" class="rounded-circle">behance.com</p>
                                                        <p class="visit">
                                                            <span>visitors:</span>341
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p class="site"><img src="assets/img/up.jpg" alt="" class="rounded-circle">uplabs.com</p>
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
                    </div><!-- ends: .col-md-6 -->
                    <div class="col-lg-8 col-md-12">
                        <div class="dashboard_module recent_comment">
                            <div class="dashboard__title">
                                <h4>Recent Comments</h4>
                                <div class="loading">
                                    <a href="#">
                                        Refresh <span class="lnr icon-refresh"></span>
                                    </a>
                                </div>
                            </div><!-- ends: .dashboard__title -->
                            <div class="dashboard__content">
                                <div class="thread">
                                    <ul class="media-list thread-list">
                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="assets/img/buyr5.jpg" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-content">
                                                        <div>
                                                            <div class="media-heading">
                                                                <div class="dflex">
                                                                    <a href="author.php">
                                                                        <h4>Themexylum</h4>
                                                                    </a>
                                                                    <span class="comment-tag buyer">Purchased</span>
                                                                </div>
                                                                <p>at <a href="">Finance & Consulting Business Theme</a></p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span>9 Hours Ago</span>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                    </div>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra,
                                                        justo
                                                        ut sceleris que the mattis.</p>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="assets/img/buyr3.jpg" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn-primary">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li><!-- end single comment threads: .comment-->
                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="assets/img/buyr1.jpg" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-content">
                                                        <div>
                                                            <div class="media-heading">
                                                                <div class="dflex">
                                                                    <a href="author.php">
                                                                        <h4>Mark Kearney</h4>
                                                                    </a>
                                                                </div>
                                                                <p>at <a href="">Finance & Consulting Business Theme</a></p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span>9 Hours Ago</span>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                    </div>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra,
                                                        justo
                                                        ut sceleris que the mattis.</p>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="assets/img/m2.png" alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea name="reply-comment" placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--sm btn-primary">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div><!-- comment reply -->
                                        </li><!-- end single comment threads: .comment-->
                                    </ul><!-- ends: .media-list -->
                                </div><!-- ends: .comments -->
                            </div><!-- ends: .dashboard__content -->
                        </div><!-- ends: .recent_comment -->
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="dashboard_module product_que">
                            <div class="dashboard__title">
                                <h4>Items In Review</h4>
                            </div><!-- ends: .product_que -->
                            <div class="dashboard__content">
                                <ul>
                                    <li>
                                        <div class="uploaded_product">
                                            <h6>Bizillion Multipurpose Business HTML Template</h6>
                                            <p>8 days ago</p>
                                        </div>
                                        <a href="#" class="cross" data-toggle="modal" data-target="#myModal">
                                            <span class="lnr icon-trash"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="uploaded_product">
                                            <h6>WooCommerce Auto Order Print</h6>
                                            <p>12 days ago</p>
                                        </div>
                                        <a href="#" class="cross" data-toggle="modal" data-target="#myModal">
                                            <span class="lnr icon-trash"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="uploaded_product">
                                            <h6>Directorist – PayPal</h6>
                                            <p>8 days ago</p>
                                        </div>
                                        <a href="#" class="cross" data-toggle="modal" data-target="#myModal">
                                            <span class="lnr icon-trash"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- ends: .dashboard__content -->
                        </div><!-- ends: .dashboard_module -->
                    </div>
                    <div class="col-lg-12">
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
                    <div class="col-lg-12">
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
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->
    <!-- modal -->
    <div class="modal fade item_removal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Please confirm the removal of the item.</h4>
                    <div class="btns">
                        <a href="#" class="btn btn--md btn-danger">Confirm</a>
                        <a href="#" class="btn btn--md btn-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Cancel</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $main->footer(); ?>
</body>
<?php $main->script_src();   ?>

</html>