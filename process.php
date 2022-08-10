<?php
include 'inc/connect.php';
session_start();
$paymentMessage = '';
if (!empty($_POST['stripeToken'])) {

    // get token and user details
    $stripeToken  = $_POST['stripeToken'];
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['emailAddress'];

    $customerAddress = $_POST['customerAddress'];
    $customerCity = $_POST['customerCity'];
    $customerZipcode = $_POST['customerZipcode'];
    $customerState = $_POST['customerState'];
    $customerCountry = $_POST['customerCountry'];

    $cardNumber = $_POST['cardNumber'];
    $cardCVC = $_POST['cardCVC'];
    $cardExpMonth = $_POST['cardExpMonth'];
    $cardExpYear = $_POST['cardExpYear'];

    //include Stripe PHP library
    require_once('stripe-php/init.php');

    //set stripe secret key and publishable key
    $stripe = array(
        "secret_key"      => "sk_test_51KMTKUJjFJ9S3qktY3YBVSlqtJhMUySU66XNXZWBb8TO1Mkljdnij3MdPxBmQpFGl6lCJT7D2ZjW2d13SxOuoFAx00PH3IqLuf",
        "publishable_key" => "pk_test_51KMTKUJjFJ9S3qktSegqV6cxmde04xPsvI4fDt8tHBREmBcF3zTjQwXUQdPX5jm2zsOtKPxXp4NLcMqx4sdSLjqw00EYQft4fu"
    );

    \Stripe\Stripe::setApiKey($stripe['secret_key']);

    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'name' => $customerName,
        'description' => 'test description',
        'email' => $customerEmail,
        'source'  => $stripeToken,
        "address" => ["city" => $customerCity, "country" => $customerCountry, "line1" => $customerAddress, "line2" => "", "postal_code" => $customerZipcode, "state" => $customerState]
    ));

    // item details for which payment made
    $itemName = $_SESSION['item_details'];
    $itemNumber = $_SESSION['item_number'];
    $currency = $_SESSION['currency_code'];
    $orderNumber = $_SESSION['order_number'];

    if (isset($_POST['price'])) {
        $itemPrice = $_POST['price'];
    } else {
        $itemPrice = $_SESSION['price'];
    }

    if ($_SESSION['item_details'] == "add found") {
        if ($itemPrice <= 100) {
            $itemPrice = $_POST['price'] . "00";
            $totalAmount = $_POST['total_amount'] . "00";
        } else {
            $itemPrice = $_POST['price'];
            $totalAmount = $_POST['total_amount'];
        }
    } else {
        if ($itemPrice <= 100) {
            $itemPrice = $_SESSION['price'] . "00";
            $totalAmount = $_SESSION['total_amount'] . "00";
        } else {
            $itemPrice = $_SESSION['price'];
            $totalAmount = $_SESSION['total_amount'];
        }
    }

    // details for which payment performed
    $payDetails = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $totalAmount,
        'currency' => $currency,
        'description' => $itemName,
        'metadata' => array(
            'order_id' => $orderNumber
        )
    ));

    // get payment details
    $paymenyResponse = $payDetails->jsonSerialize();

    // check whether the payment is successful
    if ($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1) {

        // transaction details 
        $amountPaid = $paymenyResponse['amount'];
        $balanceTransaction = $paymenyResponse['balance_transaction'];
        $paidCurrency = $paymenyResponse['currency'];
        $paymentStatus = $paymenyResponse['status'];
        $paymentDate = date("Y-m-d H:i:s");
        $pay_id = uniqid("PAYID-");
        $username = $_SESSION['account']['userData']['username'];
        $invoice_id = uniqid();
        $license = "premium";
        $fee = 1;

        if (isset($_POST['price'])) {
            $normal_itemPrice = $_POST['price'];
        } else {
            $normal_itemPrice = $_SESSION['price'];
        }

        $normal_itemPrice_fee = $normal_itemPrice - $fee;

        //insert tansaction details into databas

        $insertTransactionSQL = "INSERT INTO `transaction`(cust_name, cust_email, card_number, card_cvc, card_exp_month, card_exp_year, product_name, product_id, payment_amount, payment_status, createdtime, currency_code, transaction_id, username, invoice_id) 
		VALUES('$customerName','$customerEmail','$cardNumber','$cardCVC','$cardExpMonth','$cardExpYear','$itemName','$itemNumber','$normal_itemPrice','$paymentStatus','$paymentDate', '$paidCurrency', '$pay_id', '$username' , '$invoice_id')";

        mysqli_query($conn, $insertTransactionSQL);

        if ($itemName == "add found") {
            $sql2 = "SELECT * FROM users WHERE username = '$username'";
            $sql2_query = mysqli_query($conn, $sql2);
            $sql2_row = mysqli_fetch_array($sql2_query);

            $user_id = $sql2_row['id'];

            $balance = $sql2_row['balance'] + $normal_itemPrice;

            $sql = "UPDATE users SET balance = '$balance' WHERE id = '$user_id'";
            $quert = mysqli_query($conn, $sql);
        } else {
            $sql = "SELECT * FROM products WHERE id='$itemNumber'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);

            $creator = $row['creator'];

            $sql2 = "SELECT * FROM users WHERE username = '$creator'";
            $sql2_query = mysqli_query($conn, $sql2);
            $sql2_row = mysqli_fetch_array($sql2_query);
            $user_id = $sql2_row['id'];

            $balance = $sql2_row['balance'] + $normal_itemPrice_fee;

            $AddToLibrary = "INSERT INTO library (`Product id`, creator, `owner`) VALUES 
            ('$itemNumber','$license','$username')";

            $AddToLibrary_query = mysqli_query($conn, $AddToLibrary);

            $AddMoneyCreator = "UPDATE users SET balance='$balance' WHERE id='$user_id'";
            $query2 = mysqli_query($conn, $AddMoneyCreator);
        }

        //=======================================================================================================
        // Create new webhook in your Discord channel settings and copy&paste URL
        //=======================================================================================================

        $webhookurl = "https://discord.com/api/webhooks/951158837958828092/NwnBnnJtAG40VY2xQu8bXEIafHltG8KddKyZIQkhlQrM3ICIdTDJ0qSrBg2Co1Qp5_E3";
        if ($itemName == "add found") {
            $message = $username . " added " . $normal_itemPrice . " $paidCurrency " . " found from account: ";
        } else {
            $message = $username . " purcashed: " . $itemName;
        }

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
                            "name" => "Total: $normal_itemPrice",
                            "value" => "**sub total: $normal_itemPrice_fee**",
                            "inline" => true
                        ],
                        [
                            "name" => "method: credit-card",
                            "value" => "**currency: $paidCurrency**",
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

        header("location: order-confirm.php?id=$invoice_id");
        $lastInsertId = mysqli_insert_id($conn);
        //if order inserted successfully
        if ($lastInsertId && $paymentStatus == 'succeeded') {
            $paymentMessage = "The payment was successful. Order ID: {$orderNumber}";
        } else {
            $paymentMessage = "failed";
        }
    } else {
        $paymentMessage = "failed";
    }
} else {
    $paymentMessage = "failed";
}
$_SESSION["message"] = $paymentMessage;
header("location: index.php");
