<?php
require_once("inc/banned_ip_russia.php");

/* paypal payment
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ItemList;
require 'add-credits-config.php';
*/
require 'inc/connect.php';

session_start();

$card_method = true;
$paypal_method = false;
$paypal_method = false;

if (isset($_SESSION['account']['userData']['username'])) {
    $username = $_SESSION['account']['userData']['username'];
} else {
    header("location: https://" . $_SERVER['SERVER_NAME'] . "/login.php");
}

/* paypal payment
if (isset($_POST['paypal-validate']) && !empty($_POST['price']) && $_POST['price'] > 0) {
    $total = $_POST['price'];
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    // Set some example data for the payment.
    $currency = 'EUR';
    $item_qty = 1;
    $amountPayable = $total;
    $product_name = $username . " added " . $total . $currency . " from www.templatero.rf.gd";
    $item_code = 2;
    $description = 'Paypal transaction';
    $invoiceNumber = uniqid();
    $my_items = array(
        array('name' => $product_name, 'quantity' => $item_qty, 'price' => $amountPayable, 'sku' => $item_code, 'currency' => $currency)
    );

    $amount = new Amount();
    $amount->setCurrency($currency)
        ->setTotal($amountPayable);

    $items = new ItemList();
    $items->setItems($my_items);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setDescription($description)
        ->setInvoiceNumber($invoiceNumber)
        ->setItemList($items);

    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl($paypalConfig['return_url'])
        ->setCancelUrl($paypalConfig['cancel_url']);

    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction])
        ->setRedirectUrls($redirectUrls);

    try {
        $payment->create($apiContext);
    } catch (Exception $e) {
        throw new Exception('Unable to create link for payment');
    }

    header('location:' . $payment->getApprovalLink());
    exit(1);
}*/
$fee = 10;
$product_names = "add found";
$id_gen = uniqid();
$new_generated_id = md5($id_gen, PASSWORD_DEFAULT);
$currency = "EUR";

/*
if (isset($_SESSION['price']) && isset($_SESSION['total_amount']) && isset($_SESSION['currency_code']) && isset($_SESSION['item_details']) && isset($_SESSION['item_number']) && isset($_SESSION['order_number'])) {
    unset($_SESSION['item_details']);
    unset($_SESSION['item_number']);
    unset($_SESSION['currency_code']);
    unset($_SESSION['order_number']);
}
*/

$_SESSION['currency_code'] = $currency;
$_SESSION['item_details'] = $product_names;
$_SESSION['item_number'] = 1;
$_SESSION['order_number'] = $id_gen;

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
    <!-- inject js-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.0.0/jquery.creditCardValidator.js"></script>
    <script type="text/javascript" src="assets/js/payment.js"></script>
    <!-- endinject -->
    <!-- inject:css-->
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/trumbowyg.min.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/css/venobox.css">
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/css/style.css">
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
                            <li class="active">
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
        <div class="dashboard_contents section--padding">
            <div class="container">
                <?php //<form action="" target="_blank"  method="POST"> 
                ?>
                <form action="process.php" method="POST" id="paymentForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="credit_modules">
                                <div class="modules__title">
                                    <h4>Credit Amount</h4>
                                </div>
                                <div class="modules__content credit--contents">
                                    <div>
                                        <p class="subtitle">How much credit would you like to add?</p>
                                        <div class="amounts">
                                            <ul>
                                                <li data-price="10">
                                                    <p>&euro;10</p>
                                                </li>
                                                <li data-price="20">
                                                    <p>&euro;20</p>
                                                </li>
                                                <li data-price="50">
                                                    <p>&euro;50</p>
                                                </li>
                                                <li data-price="100">
                                                    <p>&euro;100</p>
                                                </li>
                                                <li data-price="500">
                                                    <p>&euro;500</p>
                                                </li>
                                            </ul>
                                            <div class="or">Or</div>
                                        </div>
                                    </div><!-- ends: .amounts -->
                                    <div>
                                        <p class="subtitle">Enter Custom amount</p>
                                        <div class="custom_amount">
                                            <div class="input-group">
                                                <input type="text" name="price" id="price" onchange="verify()" class="selected_price" id="rlicense" class="text_field" placeholder="&euro;250" value="">
                                                <input type="text" name="total_amount" style="display: none;" id="total_amount">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- ends: .modules__content -->
                            </div><!-- ends: .credit_modules -->
                        </div><!-- ends: .col-md-12 -->
                        <div class="col-md-12">
                            <div class="payment_module">
                                <div class="modules__title">
                                    <h4>Payment Method &amp; Confirmation</h4>
                                </div>
                                <div class="payment_tabs p-bottom-sm">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li>
                                            <a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Credit Card</a>
                                        </li>
                                        <li>
                                            <a class="" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="home" aria-selected="true">paypal</a>
                                        </li>
                                        <li style="<?php if ($paypal_method == false) {
                                                        echo 'display:none';
                                                    } ?>">
                                            <a class="" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Paypal</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="modules__content">
                                                <ul class="cards-logo">
                                                    <li><img src="img/maste-rcard.jpg" alt=""></li>
                                                    <li><img src="img/visa.jpg" alt=""></li>
                                                    <li><img src="img/ae.jpg" alt=""></li>
                                                    <li><img src="img/discover.jpg" alt=""></li>
                                                </ul>
                                                <?php
                                                if ($card_method == true) {
                                                ?>
                                                    <div class="payment_info modules__content">
                                                        <div class="alert alert-secondary" role="alert">
                                                            <strong id="fee_anonts">Operational fee: &euro;0.00</strong>
                                                            </button>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>Card Holder Name <span class="text-danger">*</span></b></label>
                                                                    <input type="text" name="customerName" id="customerName" class="text_field" value="">
                                                                    <span id="errorCustomerName" class="text-danger"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Card Number <span class="text-danger">*</span></label>
                                                                    <input type="tel" name="cardNumber" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="">
                                                                    <span id="errorCardNumber" class="text-danger"></span>
                                                                </div><!-- ends: .col-md-6 -->
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>Email Address <span class="text-danger">*</span></b></label>
                                                                    <input type="text" name="emailAddress" id="emailAddress" class="text_field" value="">
                                                                    <span id="errorEmailAddress" class="text-danger"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Expiry Month</label>
                                                                    <input type="tel" name="cardExpMonth" id="cardExpMonth" class="form-control" placeholder="MM" maxlength="2" onkeypress="return validateNumber(event);">
                                                                    <span id="errorCardExpMonth" class="text-danger"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>Address <span class="text-danger">*</span></b></label>
                                                                    <input type="text" name="customerAddress" id="customerAddress" class="text_field">
                                                                    <span id="errorCustomerAddress" class="text-danger"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Expiry Year</label>
                                                                    <input type="tel" name="cardExpYear" id="cardExpYear" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return validateNumber(event);">
                                                                    <span id="errorCardExpYear" class="text-danger"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>City <span class="text-danger">*</span></b></label>
                                                                    <input type="text" name="customerCity" id="customerCity" class="text_field" value="">
                                                                    <span id="errorCustomerCity" class="text-danger"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>CVC</label>
                                                                    <input type="tel" name="cardCVC" id="cardCVC" class="form-control" placeholder="123" maxlength="4" onkeypress="return validateNumber(event);">
                                                                    <span id="errorCardCvc" class="text-danger"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>Zip <span class="text-danger">*</span></b></label>
                                                                    <input type="text" name="customerZipcode" id="customerZipcode" class="text_field" value="">
                                                                    <span id="errorCustomerZipcode" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>Country <span class="text-danger">*</span></b></label>
                                                                    <input type="text" name="customerCountry" id="customerCountry" class="text_field">
                                                                    <span id="errorCustomerCountry" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>State </b></label>
                                                                    <input type="text" name="customerState" id="customerState" class="text_field" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="custom-radio m-bottom-25">
                                                                    <input type="checkbox" id="opt8" class="" name="filter_opt">
                                                                    <label for="opt8"><span class="circle"></span>Save card for next time</label>
                                                                </div>
                                                                <input type="submit" name="payNow" id="payNow" class="btn btn--md btn-primary" onclick="stripePay(event)" value="Pay Now">
                                                            </div>
                                                        </div>
                                                    </div><!-- ends: .payment_info -->
                </form>
            <?php
                                                } else {
            ?>
                <div class="alert alert-secondary" role="alert" bis_skin_checked="1">
                    <strong>credit card is unavalibe</strong>

                    </button>
                </div>
            <?php
                                                }
            ?>
            </div><!-- ends: .modules__content -->
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="<?php if ($paypal_method == false) {
                                                                                                            echo 'display:none';
                                                                                                        } ?>">
            <div class="modules__content">
                <ul class="cards-logo">
                    <li><img src="img/paypal.jpg" alt=""></li>
                </ul>
                <div class="payment_info modules__content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-bottom-30">

                                <style>
                                    .btn-paypal {
                                        background-color: #f6c557;
                                        background-image: url("https://companiesmarketcap.com/img/company-logos/256/PYPL.png");
                                        background-position: center;
                                        border-radius: 10px;
                                        background-size: 80px;
                                        background-repeat: no-repeat;
                                        justify-content: center;
                                        display: flex;
                                        width: 200px;
                                    }
                                </style>
                                <?php if ($paypal_method == true) { ?>

                                    <input type="submit" target="framename" class="btn-paypal" <?php if ($paypal_method == true) {
                                                                                                    echo 'name="paypal-validate"';
                                                                                                } ?> value="">

                                <?php } else { ?>
                                    <div class="alert alert-secondary" role="alert" bis_skin_checked="1">
                                        <strong>paypal method is unavalibe</strong>
                                    </div>
                                <?php } ?>
                                </form>
                            </div><!-- ends: .col-md-6 -->
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                </div><!-- ends: .payment_info -->
            </div><!-- ends: .modules__content -->
        </div>
        <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="profile-tab">
            <div class="modules__content">
                <ul class="cards-logo">
                    <li><img src="img/paypal.jpg" alt=""></li>
                </ul>
                <?php if ($paypal_method == false) { ?>
                    <div class="alert alert-secondary" role="alert" bis_skin_checked="1">
                        <strong>paypal method is unavalibe</strong>
                    </div>
                <?php } ?>
                <div class="payment_info modules__content">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group m-bottom-30">

                            </div><!-- ends: .col-md-6 -->
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                </div><!-- ends: .payment_info -->
            </div><!-- ends: .modules__content -->
        </div>
        </div>
        </div><!-- ends: .payment_tabs -->
        </div><!-- ends: .payment_module -->
        </div><!-- ends: .col-md-12 -->
        </div><!-- ends: .row -->
        </div><!-- ends: .container -->
        </div><!-- ends: .dashboard_contents -->
    </section><!-- ends: .dashboard-area -->
    <?php require_once("inc/footer.php"); ?>
    <script>
        function verify() {
            var x = document.querySelector('.selected_price').value;
            var total_amount = document.querySelector("#total_amount");
            total_amount.value = x;
            if (x == 0) {
                document.querySelector(".selected_price").style.border = "2px solid red";
            } else if (x == "") {} else {
                document.querySelector(".selected_price").style.border = "0px";
            }
            var fees = {
                USD: {
                    Percent: 2.9,
                    Fixed: 0.30
                },
                GBP: {
                    Percent: 2.4,
                    Fixed: 0.20
                },
                EUR: {
                    Percent: 2.4,
                    Fixed: 0.24
                },
                CAD: {
                    Percent: 2.9,
                    Fixed: 0.30
                },
                AUD: {
                    Percent: 2.9,
                    Fixed: 0.30
                },
                NOK: {
                    Percent: 2.9,
                    Fixed: 2
                },
                DKK: {
                    Percent: 2.9,
                    Fixed: 1.8
                },
                SEK: {
                    Percent: 2.9,
                    Fixed: 1.8
                },
                JPY: {
                    Percent: 3.6,
                    Fixed: 0
                },
                MXN: {
                    Percent: 3.6,
                    Fixed: 3
                }
            };

            function calcFee(amount, currency) {
                var _fee = fees[currency];
                var amount = parseFloat(amount);
                var total = (amount + parseFloat(_fee.Fixed)) / (1 - parseFloat(_fee.Percent) / 100);
                var fee = total - amount;

                return {
                    amount: amount,
                    fee: fee.toFixed(2),
                    total: total.toFixed(2)
                };
            }
            var x = document.querySelector('.selected_price').value;
            var service_fee = <?php echo $fee; ?>;
            var fee_s = service_fee + parseInt(x);

            var charge_data = calcFee(fee_s, 'EUR');
            const fee_anonts = document.querySelector("#fee_anonts");
            fee_anonts.innerHTML = "Operational fee: &euro;" + charge_data.fee;
        }
    </script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
    <!-- inject:js-->
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