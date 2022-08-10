<?php
session_start();
require_once("inc/banned_ip_russia.php");
require_once("inc/connect.php");

if(isset( $_SESSION['account']['userData']['username'])){
    $username = $_SESSION['account']['userData']['username'];
}else{
    header("location: https://".$_SERVER['SERVER_NAME']."/login");
}

$sql = "SELECT * FROM users WHERE username='$username'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

$fee = 1;
$balance = $row['balance'];

if(isset($_POST['submit_Withdrawal'])){
    $balance - $fee;
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
                            <li>
                                <a href="dashboard-statement.php"><span class="lnr icon-chart"></span>Statements</a>
                            </li>
                            <li>
                                <a href="uploader.php"><span class="lnr icon-cloud-upload"></span>Upload Items</a>
                            </li>
                            <li>
                                <a href="dashboard-manage-item.php"><span class="lnr icon-note"></span>Manage Items</a>
                            </li>
                            <li class="active">
                                <a href="dashboard-withdrawal.php"><span class="lnr icon-briefcase"></span>Withdrawals</a>
                            </li>
                        </ul><!-- ends: .dashboard_menu -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
        <form action="" method="POST">
        <div class="dashboard_contents p-top-100 p-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Withdrawals</h3>
                            </div>
                            <div class="ml-auto add-payment-btn">
                                <a href="add-payment-method.php" class="btn btn--md btn-primary">Add Payment Method</a>
                            </div>
                        </div><!-- ends: .dashboard_title_area -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="withdraw_module">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-white payment-method-module">
                                        <div class="modules__title">
                                            <h4>Payment Methods</h4>
                                        </div>
                                        <div class="modules__content">
                                            <div class="options">
                                            <?php $fetch_product = "SELECT * FROM `method payment` "; ?>
<?Php $result = $conn->query($fetch_product); ?>
<?php   if ($result->num_rows > 0) { ?>
<?php     while ($row = $result->fetch_assoc()) { ?>
                                                <div class="option-single active">
                                                    <div class="custom-radio">
                                                        <input type="radio" id="opt1" class="" name="filter_opt">
                                                        <label for="opt1">
                                                            <span class="circle"></span>
                                                            <img src="img/maste-rcard.jpg" alt="">
                                                            <span class="card-name">Payoneer Debit Card, ending in ...5790</span>
                                                            <span class="c_active btn btn-secondary btn--xs">Primary</span>
                                                        </label>
                                                    </div>
                                                    <div class="op_action">
                                                        <span class="exp_date">Expires: 12/2019</span>
                                                        <div class="ac_btn">
                                                            <a href="#" class="dropdown-toggle" id="drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span><img src="assets/img/dotted.svg" alt="" class="svg"></span>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="drop1">
                                                                <a class="dropdown-item" href="#">Edit Card</a>
                                                                <a class="dropdown-item" href="#">Make Primary</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- ends: .option-single -->
                                                <?php } ?>
                                                <?php } ?>
                                                
                                            </div><!-- ends: .options -->
                                        </div><!-- ends: .modules__content -->
                                    </div><!-- ends: .payment-method-module -->
                                </div><!-- ends: .col-md-6 -->
                                <div class="col-md-12">
                                    <div class="withdraw_module--amount bg-white m-top-30 p-bottom-30">
                                        <div class="modules__title">
                                            <h4>Withdraw Amount</h4>
                                        </div><!-- ends: .modules__title -->
                                        <div class="modules__content">
                                            <p class="subtitle">How much amount would you like to Withdraw?</p>
                                            <div class="options">
                                                <div class="custom-radio">
                                                    <input type="radio" id="opt4" class="" name="filter_opt">
                                                    <label for="opt4">
                                                        <span class="circle"></span>Available balance:
                                                        <span class="bold color-primary">&euro;<?php echo $balance; ?></span>
                                                    </label>
                                                </div>
                                                <div class="custom-radio">
                                                    <input type="radio" id="opt5" class="" name="filter_opt">
                                                    <label for="opt5">
                                                        <span class="circle"></span>A partial amount...</label>
                                                </div>
                                                <div class="withdraw_amount" id="partial_amount">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">&euro;</span>
                                                        <input type="text" id="rlicense" onchange="verify()" class="text_field" placeholder="00.00">
                                                    </div>
                                                </div>
                                                <span class="fee">&euro;<?php echo $fee; ?> EURO Fee per withdrawal</span>
                                            </div>
                                            <div class="button_wrapper">
                                                <button type="submit" name="submit_Withdrawal" id="nmon" class="btn btn-md btn-primary">Submit Withdrawal
                                                </button>
                                                <a href="#" class="btn btn-md btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </div><!-- ends: .withdraw_module--amount -->
                                </div><!-- ends: .col-md-6 -->
                            </div><!-- ends: .row -->
                        </div><!-- ends: .withdraw_module -->
                    </div><!-- ends: .col-md-12 -->
                </div><!-- ends: .row -->
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="withdraw_module withdraw_history bg-white">
                            <div class="withdraw_table_header">
                                <h4>Withdrawal History</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table withdraw__table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $fetch_product = "SELECT * FROM withdraw WHERE user='$username'"; ?>
<?Php $result = $conn->query($fetch_product); ?>
<?php   if ($result->num_rows > 0) { ?>
<?php     while ($row = $result->fetch_assoc()) { ?>
<tr>
                                            <td><?php echo $row['Date']; ?></td>
                                            <td><?php echo $row['Payment Method']; ?></td>
                                            <td class="bold">&euro;<?php echo $row['Amount']; ?></td>
                                            <td class="<?Php echo $row['Status']; ?>"><span><?Php echo $row['Status']; ?></span></td>
<?php } ?>
<?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_menu_area -->
    </section><!-- ends: .dashboard-area -->
    <?php require_once("inc/footer.php"); ?>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
    <script>
       function verify(){
           var x = document.querySelector('#rlicense').value;
           if(x == 0){
            document.querySelector("#rlicense").style.border = "2px solid red";
            document.getElementById("nmon").disabled = true;
           }else if(x > <?php echo $balance; ?>){
            document.querySelector("#rlicense").style.border = "2px solid red";
            document.getElementById("nmon").disabled = true;
           }else if(x <= <?php echo $balance; ?>){
            document.querySelector("#rlicense").style.border = "0px";
            document.getElementById("nmon").disabled = false;
           }
       }
    </script>
    <script src="assets/vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="assets/vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>
    <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/vendor_assets/js/chart.bundle.min.js"></script>
    <script src="assets/vendor_assets/js/grid.min.js"></script>
    <script src="assets/vendor_assets/js/jquery-ui.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendor_assets/js/owl.carousel.min.js"></script>
    <script src="assets/vendor_assets/js/select2.full.min.js"></script>
    <script src="assets/vendor_assets/js/slick.min.js"></script>
    <script src="assets/vendor_assets/js/tether.min.js"></script>
    <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>
    <script src="assets/vendor_assets/js/venobox.min.js"></script>
    <script src="assets/vendor_assets/js/waypoints.min.js"></script>
    <script src="assets/theme_assets/js/dashboard.js"></script>
    <script src="assets/theme_assets/js/main.js"></script>
    <script src="assets/theme_assets/js/map.js"></script>
    <!-- endinject-->
</body>

</html>