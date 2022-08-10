<?php
require 'autoload.php';

session_start();

class Controller extends users
{
    public function __construct()
    {
        global $transactionGetData;
        global $GetTransactionNumber;

        $this->db();
        $this->GetName();

        $conn = $this->conn;
        $username = $this->username;


        $paymentid = $_GET['paymentid'];
        $this->RunSql("SELECT * FROM `transaction` WHERE username='$username' AND `invoice_id`='$paymentid'", 'transactionGetData', 'normal', true);
        $this->RunSql("SELECT * FROM `transaction`", 'GetTransactionNumber', 'num', true);
        $transactionGetData = $this->transactionGetData;
        $GetTransactionNumber = $this->GetTransactionNumber;
    }
}

$controller = new Controller;


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
    <?php
    if (!empty($tran['payment_amount'])) {
        $tax = 1;

        $total = $tran['payment_amount'];
        $subTotal = $total - $tax;
    }
    ?>
    <section class="dashboard-area">
        <div class="dashboard_contents section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="">
                                <div class="dashboard__title">
                                    <h3>Invoice</h3>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <a href="#" class="btn btn-sm btn-secondary print_btn">
                                    <span class="icon-printer"></span>Print</a>
                                <a href="#" class="btn btn-sm btn-primary">Download</a>
                            </div>
                        </div>
                    </div><!-- ends: .col-md-12 -->
                    <div class="col-md-12">
                        <div class="invoice">
                            <div class="invoice__head">
                                <div class="invoice_logo">
                                    <img src="img/logo.png" alt="">
                                </div>
                                <div class="info">
                                    <h4>Invoice info</h4>
                                    <p>Order #<?php echo $GetTransactionNumber['row']; ?></p>
                                </div>
                            </div><!-- ends: .invoice__head -->
                            <div class="invoice__meta">
                                <div class="address">
                                    <h5 class="bold"><?php echo $transactionGetData['row']['username']; ?></h5>
                                    <p><?php echo $transactionGetData['row']['adress']; ?></p>
                                </div>
                                <div class="date_info">
                                    <p>
                                        <span>Invoice Date</span><?php echo $transactionGetData['row']['createdtime']; ?>
                                    </p>
                                    <p class="status">
                                        <span>Status</span><?php echo $transactionGetData['row']['payment_status']; ?>
                                    </p>
                                </div>
                            </div><!-- ends: .invoice__meta -->
                            <div class="table-responsive invoice__detail">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <?php
                                            if (!empty($tran['product_id'])) {
                                            ?>
                                                <th>creator</th>
                                            <?php
                                            }
                                            ?>
                                            <th>Item</th>
                                            <?php
                                            if (!empty($tran['product_id'])) {
                                            ?>
                                                <th>License</th>
                                            <?php
                                            }
                                            ?>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                </table>

                                <?php
                                if (!empty($tran['product_id'])) {

                                    $where = $tran['product_id'];
                                    if (!empty($where)) {
                                        $fetch_product = "SELECT * FROM `products` WHERE id IN ($where)";

                                        $result = $conn->query($fetch_product);

                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {
                                ?>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $row['posted_on']; ?></td>
                                                            <td class="author"><?php echo $row['creator']; ?></td>
                                                            <td class="detail">
                                                                <a href="#"><?php echo $row['Product Name']; ?></a>
                                                            </td>
                                                            <td>Regular</td>
                                                            <td>&euro;<?php echo $row['Product Price']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                    <?php }
                                        }
                                    }
                                } else { ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php if (!empty($tran['createdtime'])) {
                                                        echo $tran['createdtime'];
                                                    } ?></td>
                                                <td class="author"></td>
                                                <td class="detail">
                                                    <a href="#"><?php if (!empty($tran['product_name'])) {
                                                                    echo $tran['product_name'];
                                                                } ?></a>
                                                </td>
                                                <td>&euro;<?php echo $subTotal; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php
                                }
                                ?>
                                <div class="pricing_info">
                                    <p>Sub - Total amount: &euro;<?php echo $subTotal; ?></p>
                                    <p class="bold">Total : &euro;<?php echo $total; ?></p>
                                </div>
                            </div><!-- ends: .invoice_detail -->
                        </div><!-- ends: .invoice -->
                    </div><!-- ends: .col-md-12 -->
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