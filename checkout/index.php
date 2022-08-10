<?php
session_start();
require_once("../inc/banned_ip_russia.php");

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ItemList;

require '../paypal-checkout-config.php';

include '../inc/connect.php';

$infucient_money = false;
$eror_cart_money = false;
$eror_cart_empty = false;
$error_money = false;

if (!empty($_SESSION['cart']) or !empty($_SESSION['cart_price'])) {
    $id = $_SESSION['cart'];

    foreach ($id as $list) {
        $f = "'" . $list . "'";
        $nn[] = $f;
    }

    $where =  implode(',', $nn);

    $fetch_products = "SELECT * FROM products WHERE id IN ($where)";
    $product_id = implode('', $id);

    $product = "SELECT * FROM products WHERE id IN ($where)";
    $product_result = mysqli_query($conn, $product);
    $product_row = mysqli_fetch_array($product_result);

    $product_names = $product_row['Product Name'];
    $id_gen = uniqid();
    $new_generated_id = md5($id_gen, PASSWORD_DEFAULT);
    $currency = "EUR";
}

if (!empty($_SESSION['cart']) && !empty($_SESSION['cart_price']) && isset($_SESSION['account']['userData']['username'])) {
    $tax = 1;

    if (isset($_SESSION['account']['userData']['username'])) {
        $username = $_SESSION['account']['userData']['username'];
    } else {
        header("location: https://" . $_SERVER['SERVER_NAME'] . "/login.php");
    }

    if (!empty($_SESSION['cart']) or !empty($_SESSION['cart_price'])) {

        $tax = 1;

        $price = array_sum($_SESSION['cart_price']);

        $subTotal = $price;

        if (isset($_POST['donate_from_help_ukraine'])) {
            $ukraine_help = $_POST['donate_from_help_ukraine'];
            $total = $price + $tax + $ukraine_help;
        } else {
            $total = $price + $tax;
        }
    }

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);

    if (isset($_POST['paypal-validate'])) {

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // Set some example data for the payment.
        $currency = 'EUR';
        $item_qty = 1;
        $amountPayable = $total;
        $product_name = $_SESSION['item_details'];
        $item_code = $product_id;
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

        if (empty($_GET['paymentId']) || empty($_GET['PayerID'])) {
            throw new Exception('The response is missing the paymentId and PayerID');
        }

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        try {
            // Take the payment
            $payment->execute($execution, $apiContext);

            try {
                $db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);

                $payment = Payment::get($paymentId, $apiContext);

                $data = [
                    'product_id' => $payment->transactions[0]->item_list->items[0]->sku,
                    'transaction_id' => $payment->getId(),
                    'payment_amount' => $payment->transactions[0]->amount->total,
                    'currency_code' => $payment->transactions[0]->amount->currency,
                    'payment_status' => $payment->getState(),
                    'invoice_id' => $payment->transactions[0]->invoice_number,
                    'product_name' => $payment->transactions[0]->item_list->items[0]->name,
                    'description' => $payment->transactions[0]->description,
                ];
                if (addPayment($data) !== false && $data['payment_status'] === 'approved') {
                    // Payment successfully added, redirect to the payment complete page.
                    $inserids = $db->insert_id;
                    header("location: https://" . $_SERVER['SERVER_NAME'] . "/invoice.php");
                    exit(1);
                } else {
                    // Payment failed
                    header("location: https://" . $_SERVER['SERVER_NAME'] . "/checkout.php");
                    exit(1);
                }
            } catch (Exception $e) {
                // Failed to retrieve payment from PayPal

            }
        } catch (Exception $e) {
            // Failed to take payment

        }

        /**
         * Add payment to database
         *
         * @param array $data Payment data
         * @return int|bool ID of new payment or false if failed
         */
        function addPayment($data)
        {
            global $db;

            if (is_array($data)) {
                //'isdsssss' --- i - integer, d - double, s - string, b - BLOB
                $stmt = $db->prepare('INSERT INTO `payments` (product_id,transaction_id, payment_amount,currency_code, payment_status, invoice_id, product_name, createdtime) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->bind_param(
                    'isdsssss',
                    $data['product_id'],
                    $data['transaction_id'],
                    $data['payment_amount'],
                    $data['currency_code'],
                    $data['payment_status'],
                    $data['invoice_id'],
                    $data['product_name'],
                    date('Y-m-d H:i:s')
                );
                $stmt->execute();
                $stmt->close();

                return $db->insert_id;
            }

            return false;
        }
    }

    $creat = "SELECT * FROM users WHERE username='$username'";
    $crea_rest = mysqli_query($conn, $creat);
    $fetcht = mysqli_fetch_array($crea_rest);

    if (isset($_POST['credits'])) {
        if ($fetcht['balance'] >= $total) {
        } else {
            $infucient_money = true;
        }
    }

    if ($total < 1) {
        $eror_cart_money = true;
    }

    if (empty($_SESSION['cart'])) {
        $eror_cart_empty = true;
    }

    if (isset($_SESSION['price']) && isset($_SESSION['total_amount']) && isset($_SESSION['currency_code']) && isset($_SESSION['item_details']) && isset($_SESSION['item_number']) && isset($_SESSION['order_number']) && $_SESSION['total_amount'] != $total) {
        unset($_SESSION['item_details']);
        unset($_SESSION['item_number']);
        unset($_SESSION['price']);
        unset($_SESSION['total_amount']);
        unset($_SESSION['currency_code']);
        unset($_SESSION['order_number']);
        unset($_SESSION['cart']);
        unset($_SESSION['cart_price']);
    }

    if (!isset($_SESSION['price']) && !isset($_SESSION['total_amount']) && !isset($_SESSION['currency_code']) && !isset($_SESSION['item_details']) && !isset($_SESSION['item_number']) && !isset($_SESSION['order_number'])) {
        $_SESSION['price'] = $total;
        $_SESSION['total_amount'] = $total;
        $_SESSION['currency_code'] = $currency;
        $_SESSION['item_details'] = $product_names;
        $_SESSION['item_number'] = $where;
        $_SESSION['order_number'] = $new_generated_id;
    }

    //<------------------------------------------------------------------------>//

    if (isset($_POST['credits'])) {
        if ($rows['balance'] >= $total) {
            if (!empty($_SESSION['cart'])) {
                if ($total >= 1) {

                    $totals = $rows['balance'] - $subTotal;


                    //
                    $prod = "UPDATE users SET `balance`='$totals' WHERE username='$username'";
                    $res = mysqli_query($conn, $prod);

                    $where = implode(",", $_SESSION['cart']);

                    $id = $where;

                    //
                    $select = "SELECT * FROM products WHERE id IN ($where)";
                    $sel_query = mysqli_query($conn, $select);
                    $row = mysqli_fetch_array($sel_query);

                    $creator = $row['creator'];

                    $crea = "SELECT * FROM users WHERE username='$creator'";
                    $crea_res = mysqli_query($conn, $crea);
                    $fetch = mysqli_fetch_array($crea_res);

                    $user_id = $fetch['id'];

                    //

                    $addToLibrary = "INSERT INTO library (`Product id`,creator, owner) VALUE 
                    ('$id','$creator', '$username')";
                    $Query = mysqli_query($conn, $addToLibrary);

                    $add = $fetch['balance'] + $subTotal; // add creator money  


                    //

                    $generate_id = 1;
                    $transaction_id = 1;
                    $currency_code = "EUR";
                    $payment_status = "approved";
                    $invoice_id = uniqid();
                    $pay_id = uniqid("PAYID-");
                    $product_name = $row['Product Name'];
                    $date = date('d' . 'm' . 'y');

                    $sql2 = "INSERT INTO transaction (username, product_id, payment_amount, transaction_id, currency_code, payment_status, product_name, createdtime) VALUE ('$username', '$where', '$total', '$transaction_id', '$currency_code', '$payment_status', '$product_name', '$date')";
                    $query_sql2 = mysqli_query($conn, $sql2);

                    $creator_prod = "UPDATE users SET balance='$add' WHERE id='$user_id'";
                    $creator_res = mysqli_query($conn, $creator_prod);

                    //=======================================================================================================
                    // Create new webhook in your Discord channel settings and copy&paste URL
                    //=======================================================================================================

                    $webhookurl = "https://discord.com/api/webhooks/951158837958828092/NwnBnnJtAG40VY2xQu8bXEIafHltG8KddKyZIQkhlQrM3ICIdTDJ0qSrBg2Co1Qp5_E3";
                    $message = $username . " purcashed: " . $product_name;
                    $title = "new transaction";

                    //=======================================================================================================
                    // Compose message. You can use Markdown
                    // Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
                    //========================================================================================================

                    $timestamp = date("c", strtotime("now"));

                    $json_data = json_encode([

                        "username" => "TemplateRo",


                        "avatar_url" => "https://www.linkpicture.com/q/logov21.png",

                        "tts" => false,

                        // File upload
                        // "file" => "",

                        // Embeds Array
                        "embeds" => [
                            [
                                "title" => "$message",

                                "type" => "rich",

                                //"url" => "https://www.templatero.rf.gd",

                                //"timestamp" => $timestamp,

                                "color" => hexdec("6e4ff6"),

                                "footer" => [
                                    "text" => "TemplateRo. All rights reserved.",
                                    "icon_url" => "https://www.linkpicture.com/q/logov21.png"
                                ],

                                "image" => [
                                    "url" => "https://www.linkpicture.com/q/logov21.png"
                                ],

                                // Author
                                "author" => [
                                    "name" => "creator: danid#5249",
                                    "url" => "https://danid.rf.gd"
                                ],

                                "fields" => [
                                    // Field 1
                                    [
                                        "name" => "order id: $invoice_id",
                                        "value" => "**pay id: $pay_id**",
                                        "inline" => true
                                    ],
                                    // Field 2
                                    [
                                        "name" => "Total: $total",
                                        "value" => "**sub total: $subTotal**",
                                        "inline" => true
                                    ],
                                    [
                                        "name" => "method: templatero credits",
                                        "value" => "**currency: $currency_code**",
                                        "inline" => false
                                    ]
                                ]
                            ]
                        ]

                    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


                    $ch = curl_init($webhookurl);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                    $response = curl_exec($ch);
                    // If you need to debug, or find out why you can't send message uncomment line below, and execute script.
                    // echo $response;
                    curl_close($ch);
                    //======================================================================================================= whebook discord
                    unset($_SESSION['item_details']);
                    unset($_SESSION['item_number']);
                    unset($_SESSION['price']);
                    unset($_SESSION['total_amount']);
                    unset($_SESSION['currency_code']);
                    unset($_SESSION['order_number']);
                    unset($_SESSION['cart']);
                    unset($_SESSION['cart_price']);
                    header("location: index.php");
                }
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="TemplateRo - Digital Products Marketplace ">
        <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">
        <title>TemplateRo - Digital Products Marketplace</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">
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

        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-32x32.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.0.0/jquery.creditCardValidator.js"></script>
        <script type="text/javascript" src="https://localhost/assets/js/payment.js"></script>
    </head>

    <body class="preload">
        <?php require_once("../inc/menu.php"); ?>
        <section class="dashboard-area p-top-100 p-bottom-70">
            <div class="dashboard_contents">
                <div class="container">
                    <form action="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>process.php" method="POST" id="paymentForm">
                        <div class="row">
                            <div id="col_donate_page" class="col-md-12">
                                <div class="credit_modules">
                                    <a id="execute_donate_page" style="cursor: pointer;">
                                        <div class="modules__title">
                                            <h4 style="position:absolute;"><svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="" style="max-width: 18px; min-width: 18px; height: auto;">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0475 0.0775104C16.1294 -0.0754742 15.1894 -0.00131755 14.3041 0.293958C13.4233 0.587712 12.6211 1.09207 11.9622 1.76642L11 2.67862L10.0378 1.76635C9.37857 1.0921 8.57624 0.587903 7.69525 0.29438C6.80973 -0.00065463 5.86972 -0.07452 4.95156 0.0787833C4.0334 0.232087 3.16299 0.608235 2.41103 1.17668C1.65907 1.74512 1.04675 2.48982 0.623823 3.35031L0.622363 3.35331C0.0688988 4.4926 -0.122269 5.785 0.0763907 7.04439C0.249311 8.14061 0.70982 9.16257 1.403 9.99998H20.5946C21.2891 9.16204 21.7505 8.139 21.9236 7.04153C22.1223 5.78214 21.9311 4.48975 21.3776 3.35045L21.376 3.3472C20.9528 2.48696 20.3403 1.74255 19.5882 1.17443C18.8361 0.606308 17.9656 0.230495 17.0475 0.0775104ZM11.0048 20H10.9952C10.9968 20 10.9984 20 11.0001 20C11.0016 20 11.0032 20 11.0048 20Z" fill="#3667A8"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5915 10H1.3999C1.5013 10.1225 1.60769 10.2411 1.71887 10.3553L10.5029 19.7825C10.6324 19.9215 10.8107 20 10.9969 20C11.1832 20 11.3614 19.9215 11.4909 19.7824L20.275 10.3524C20.3853 10.239 20.4908 10.1215 20.5915 10Z" fill="#F5DE34"></path>
                                                </svg> Let's support freedom </h4>
                                            <div style="justify-content: right; display:flex; width: 100%; font-size: 20px;"><i class="bi bi-chevron-down" id="down"></i><i style="display: none;" id="up" class="bi bi-chevron-up"></i></div>
                                        </div>
                                        <div class="container">
                                            <br>
                                            <p class="subtitle">Add a donation and express your support to Ukraine.We'll add 100% of your contribution to our initial pledge.</p>
                                            <Br>
                                        </div>
                                    </a>
                                    <div class="modules__content credit--contents" style="display: none;" id="donate_page">
                                        <div>
                                            <div class="amounts" style="justify-content: center;">
                                                <ul>
                                                    <li data-price="0.50">
                                                        <p>€0.50</p>
                                                    </li>
                                                    <li data-price="1">
                                                        <p>€1</p>
                                                    </li>
                                                    <li data-price="2">
                                                        <p>€2</p>
                                                    </li>
                                                    <li data-price="5">
                                                        <p>€5</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- ends: .amounts -->
                                        <div>

                                        </div>
                                    </div><!-- ends: .modules__content -->
                                </div><!-- ends: .credit_modules -->
                            </div>
                        </div>
                        <div class="information_module order_summary">
                            <div class="toggle_title">
                                <h4>Order Summary</h4>
                            </div>
                            <ul>
                                <?Php
                                if (!empty($_SESSION['cart'])) {
                                    $id = $_SESSION['cart'];

                                    foreach ($id as $list) {
                                        $f = "'" . $list . "'";
                                        $nn[] = $f;
                                    }

                                    $where =  implode(',', $nn);


                                    $fetch_products = "SELECT * FROM products WHERE id IN ($where)";
                                    //execute the query

                                    $results = $conn->query($fetch_products);

                                    if ($results->num_rows > 0) {
                                        //output data of each row
                                        while ($rowss = $results->fetch_assoc()) {
                                ?>
                                            <li class="item">
                                                <a href="/single-product-v2?id=<?php echo $rowss['id']; ?>" target="_blank"><?php echo $rowss['Product Name']; ?></a>
                                                <span><?php echo '&euro;' . $rowss['Product Price']; ?></span>
                                            </li>
                                <?php
                                        }
                                    }
                                }

                                ?>

                                <li>
                                    <p>Estimated Taxes & Fees:</p>
                                    <span><?php echo '&euro;' . $tax; ?></span>
                                </li>
                                <li class="total_ammount">
                                    <p>Total</p>
                                    <span><?php if (!empty($total)) {
                                                echo '&euro;' . $total;
                                            } else {
                                                echo '&euro;0';
                                            } ?></span>
                                </li>

                            </ul>
                        </div><!-- ends: .information_module-->
                        <div class="row">
                            <div id="info_box" class="col-md-6">
                                <div class="information_module">
                                    <div class="toggle_title">
                                        <h4>Billing Information </h4>
                                    </div>
                                    <div class="information__set">
                                        <div class="information_wrapper form--fields">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><b>Card Holder Name <span class="text-danger">*</span></b></label>
                                                        <input type="text" name="customerName" id="customerName" class="text_field" value="">
                                                        <span id="errorCustomerName" class="text-danger"></span>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><b>Email Address <span class="text-danger">*</span></b></label>
                                                        <input type="text" name="emailAddress" id="emailAddress" class="text_field" value="">
                                                        <span id="errorEmailAddress" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><b>Address <span class="text-danger">*</span></b></label>
                                                        <input type="text" name="customerAddress" id="customerAddress" class="text_field">
                                                        <span id="errorCustomerAddress" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>City <span class="text-danger">*</span></b></label>
                                                            <input type="text" name="customerCity" id="customerCity" class="text_field" value="">
                                                            <span id="errorCustomerCity" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>Zip <span class="text-danger">*</span></b></label>
                                                            <input type="text" name="customerZipcode" id="customerZipcode" class="text_field" value="">
                                                            <span id="errorCustomerZipcode" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>State </b></label>
                                                            <input type="text" name="customerState" id="customerState" class="text_field" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>Country <span class="text-danger">*</span></b></label>
                                                            <input type="text" name="customerCountry" id="customerCountry" class="text_field">
                                                            <span id="errorCustomerCountry" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div style="height: 170px;">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end .information__set -->
                                </div><!-- end .information_module -->
                            </div>
                            <div class="" id="vox">
                                <?php if ($infucient_money == true) { ?>
                                    <div class="alert alert-warning" role="alert" bis_skin_checked="1">
                                        <strong>you don't have enough money!</strong><a href="dashboard-add-credit.php">add money</a>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="icon-close" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php if ($eror_cart_money == true) { ?>
                                    <div class="alert alert-warning" role="alert" bis_skin_checked="1">
                                        <strong>you must have at least 0.01 euros in your cart to be able to buy something</strong><a href="category-grid.php"> add a product</a>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="icon-close" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php if ($eror_cart_empty == true) { ?>
                                    <div class="alert alert-warning" role="alert" bis_skin_checked="1">
                                        <strong>your cart is empty!</strong><a href="category-grid.php"> add a product</a>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="icon-close" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="information_module payment_options">
                                    <div class="toggle_title">
                                        <h4>Select Payment Method</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="opt1" class="" name="filter_opt">
                                                <label for="opt1">
                                                    <span class="circle"></span>Credit Card</label>
                                            </div>
                                            <img src="https://logos-world.net/wp-content/uploads/2020/04/Visa-Logo.png" alt="Visa Cards" width="50" height="32">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/2560px-MasterCard_Logo.svg.png" alt="Visa Cards" width="50" height="32">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4d/Maestro_logo.png" alt="Visa Cards" width="50" height="32">
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="opt2" class="" name="filter_opt">
                                                <label for="opt2">
                                                    <span class="circle"></span>Paypal</label>
                                            </div>
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/2560px-PayPal.svg.png" alt="Visa Cards" width="100" height="32">
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="opt3" class="" name="filter_opt">
                                                <label for="opt3">
                                                    <span class="circle"></span>TemplateRo Credit</label>
                                            </div>
                                            <p>Balance
                                                <span class="bold">&euro;<?php if (!empty($rows['balance'])) {
                                                                                echo $rows['balance'];
                                                                            } else {
                                                                                echo "0";
                                                                            } ?></span>
                                            </p>
                                        </li>
                                    </ul>
                                    <div id="creditCard" class="payment_info modules__content">

                                        <div class="form-group">
                                            <label>Card Number <span class="text-danger">*</span></label>
                                            <input type="tel" name="cardNumber" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="">
                                            <span id="errorCardNumber" class="text-danger"></span>
                                        </div>
                                        <!-- lebel for date selection -->
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Expiry Month</label>
                                                    <input type="tel" name="cardExpMonth" id="cardExpMonth" class="form-control" placeholder="MM" maxlength="2" onkeypress="return validateNumber(event);">
                                                    <span id="errorCardExpMonth" class="text-danger"></span>
                                                </div><!-- end /.form-group -->
                                            </div><!-- end /.col-md-6-->
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Expiry Year</label>
                                                    <input type="tel" name="cardExpYear" id="cardExpYear" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return validateNumber(event);">
                                                    <span id="errorCardExpYear" class="text-danger"></span>
                                                </div><!-- ends: .form-group -->
                                            </div><!-- ends: .col-md-6-->
                                        </div><!-- ends: .row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>CVC</label>
                                                    <input type="tel" name="cardCVC" id="cardCVC" class="form-control" placeholder="123" maxlength="4" onkeypress="return validateNumber(event);">
                                                    <span id="errorCardCvc" class="text-danger"></span>
                                                </div>
                                                <input type="submit" name="payNow" id="payNow" class="btn btn--md btn-primary" onclick="stripePay(event)" value="Pay Now">
                                            </div>
                                        </div>
                                    </div><!-- ends: .payment_info -->
                    </form>
                    <div id="paypal" class="payment_info modules__content">

                        <div class="row">
                            <form action="" method="POST">
                                <style>
                                    .btn-paypal {
                                        background-color: #f6c557;
                                        background-image: url("https://companiesmarketcap.com/img/company-logos/256/PYPL.png");
                                        background-position: center;
                                        border-radius: 10px;
                                        background-size: 80px;
                                        background-repeat: no-repeat;
                                        width: 200px;
                                    }

                                    .c1 {
                                        width: 1000px;
                                        justify-content: center;
                                        align-items: center;
                                        display: flex;
                                    }
                                </style>
                                <div class="c1">
                                    <input type="tel" name="donate_from_help_ukraine" style="display: none;" id="price" class="selected_price" placeholder="€250" value="0" style="border: 0px;">
                                    <input type="submit" class="btn-paypal" name="paypal-validate" value="">
                                </div>
                            </form>
                        </div><!-- ends: .row -->

                        <form action="" method="POST">
                    </div><!-- ends: .payment_info -->
                    <div id="credits" class="payment_info modules__content">
                        <div class="row">
                        </div><!-- ends: .row -->
                        <div class="row">
                            <div class="col-md-6">

                                <?php

                                if ($rows['balance'] >= $total && !empty($_SESSION['cart']) && $total >= 1) {
                                    echo '<input type="submit" name="credits" class="btn btn--md btn-primary" value="Confirm Order">';
                                } else {
                                    $error_money = true;
                                } ?>
                                </form>
                            </div>
                        </div>
                        <?php
                        if ($error_money == true) {
                        ?>
                            <div class="alert alert-danger" role="alert" bis_skin_checked="1">
                                <strong>No available funds in a wallet</strong>
                            </div>
                        <?php } ?>
                    </div><!-- ends: .payment_info -->
                </div><!-- ends: .information_module-->
            </div>
            </div><!-- ends: .row -->
            </form><!-- ends: form -->
            </div>
            </div><!-- ends: .dashboard_contents -->
        </section><!-- ends: .dashboard-area -->
        <?php require_once("../inc/footer.php"); ?>
    </body>
    <!-- inject:js-->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/js/checkout.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery/uikit.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/bootstrap/popper.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/chart.bundle.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/grid.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.barrating.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.easing1.3.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/select2.full.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/slick.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/tether.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/trumbowyg.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/venobox.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/vendor_assets/js/waypoints.min.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/theme_assets/js/dashboard.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/theme_assets/js/main.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/"; ?>assets/theme_assets/js/map.js"></script>
    <!-- endinject-->

    </html>
<?php
} else {
    header("location: https://" . $_SERVER['SERVER_NAME'] . "/category-grid");
}
?>