<?php
require('inc/connect.php');
require_once("inc/banned_ip_russia.php");
session_start();

if(isset( $_SESSION['account']['userData']['username'])){
    $username = $_SESSION['account']['userData']['username'];
}else{
    header("location: https://".$_SERVER['SERVER_NAME']."/login.php");
}

$sql = "SELECT * FROM users WHERE username='$username'";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($query);

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
                            <li class="active">
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
        <div class="dashboard_contents dashboard_statement_area section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Sales Statements</h3>
                                <div class="date_area">
                                    <form action="#">
                                        <div class="input_with_icon">
                                            <input type="text" class="dattaPikkara" placeholder="From">
                                            <span class="icon-calendar"></span>
                                        </div>
                                        <div class="input_with_icon">
                                            <input type="text" class="dattaPikkara" placeholder="To">
                                            <span class="icon-calendar"></span>
                                        </div>
                                        <div class="select-wrap">
                                            <select name="transaction_type" id="#">
                                                <option value="all">All Transaction</option>
                                                <option value="sale">Sale</option>
                                                <option value="sale">Purchase</option>
                                                <option value="credited">Withdraw</option>
                                            </select>
                                            <span class="icon-arrow-down"></span>
                                        </div>
                                        <button type="submit" class="btn btn--sm btn-primary">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span>
                                    <span class="icon-handbag icon primarybg transparent-bg primary"></span>
                                </span>
                                <div class="info">
                                    <?php
                                            $totals = "SELECT * FROM library WHERE `creator`='$username'";
                                            $q = mysqli_query($conn, $totals);
                                            $f = mysqli_num_rows($q);
                                    ?>
                                    <p class="primary">&euro;<?php echo $f; ?></p>
                                    <span>Total Sales</span>
                                </div>
                            </div><!-- end .info_wrap -->
                        </div><!-- end .statement_info_card -->
                    </div><!-- end .col-lg-3 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span>
                                    <span class="icon-basket-loaded icon secondarybg transparent-bg secondary"></span>
                                </span>
                                <div class="info">
                                <?php
                                            $purchase = "SELECT * FROM library WHERE `owner`='$username'";
                                            $qu = mysqli_query($conn, $purchase);
                                            $p = mysqli_num_rows($qu);
                                    ?>
                                    <p class="secondary">&euro;<?php echo $p; ?></p>
                                    <span>Total Purchases</span>
                                </div>
                            </div>
                            <!-- end .info_wrap -->
                        </div>
                        <!-- end .statement_info_card -->
                    </div>
                    <!-- end .col-lg-3 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span>
                                    <span class="icon-wallet icon mcolorbg3 transparent-bg info"></span>
                                </span>
                                <div class="info">
                                    <p class="info">&euro;<?php echo $rows['balance']; ?></p>
                                    <span>Total Credited</span>                                  
                                </div>
                            </div><!-- end .info_wrap -->
                        </div><!-- end .statement_info_card -->
                    </div><!-- end .col-lg-3 -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span>
                                    <span class="icon-briefcase icon mcolorbg4 transparent-bg danger"></span>
                                </span>
                                <div class="info">
                                    <p class="danger">&euro;0</p>
                                    <span>Total Withdraw</span>
                                </div>
                            </div><!-- end .info_wrap -->
                        </div><!-- end .statement_info_card -->
                    </div><!-- end .col-lg-3 -->
                </div><!-- end .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Order ID</th>
                                        <th>Author</th>
                                        <th>Detail</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $fetch_product = "SELECT * FROM `transaction` WHERE username='$username'";
                                    $result = $conn->query($fetch_product);
                                    
                                    if ($result->num_rows > 0) {
                                        //output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                        $id = $row['product_id'];

                                        $creator = "SELECT * FROM products WHERE id='$id'";
                                        $quer = mysqli_query($conn, $creator);
                                        $fet = mysqli_fetch_array($quer);
                                    ?>
                                <tr>
                                        <td><?php echo $row['createdtime']; ?></td>
                                        <td><?php echo $row['invoice_id']; ?></td>
                                        <td class="author"><?php if(!empty($fet['creator'])){echo $fet['creator'];}else{echo "anonymus";} ?></td>
                                        <td class="detail">
                                            <a href="single-product.php"><?php echo $row['product_name']; ?></a>
                                        </td>
                                        <td class="type">
                                            <span class="sale"><?php echo $row['payment_status']; ?></span>
                                        </td>
                                        <td class="price">&euro;<?php echo $row['payment_amount']; ?></td>
                                        <td class="action">
                                            <a href="invoice.php?paymentid=<?php echo $row['invoice_id']; ?>">view</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }}
                                    ?>
                                </tbody>
                            </table>
                            <!-- Start Pagination -->
                            <!-- Start Pagination -->
                        </div><!-- ends: .statement_table -->
                    </div>
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->
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