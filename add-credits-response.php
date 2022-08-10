<?php
require '../inc/connect.php';
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require 'add-credits-config.php';

session_start();

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

        
        $select = "SELECT * FROM `transaction` WHERE transaction_id='" . $data['transaction_id'] . "'";
        $query = mysqli_query($conn, $select);
        $verify = mysqli_num_rows($query);
        if ($verify == 0) {
        if (addPayment($data) !== false && $data['payment_status'] === 'approved') {
            $add_balance = $data['payment_amount'];
            $username = $_SESSION['account']['userData']['username'];

           $select = "SELECT * FROM users WHERE username='$username'";
           $querys = mysqli_query($conn, $select);
           $row = mysqli_fetch_array($querys);

           $new_balance = $row['balance'] + $add_balance;
           $pay_id = $data['transaction_id'];

           $sql = "UPDATE users SET balance='$new_balance' WHERE username='$username'";
           $query = mysqli_query($conn, $sql);

           //=======================================================================================================
        // Create new webhook in your Discord channel settings and copy&paste URL
        //=======================================================================================================

        $webhookurl = "https://discord.com/api/webhooks/951158837958828092/NwnBnnJtAG40VY2xQu8bXEIafHltG8KddKyZIQkhlQrM3ICIdTDJ0qSrBg2Co1Qp5_E3";
        $message = $username . " added $new_balance euros to his account";

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
                            "name" => "order id: ". $data['invoice_id'],
                            "value" => "**pay id: ".$data['transaction_id']."**",
                            "inline" => true
                        ],
                        // Field 2
                        [
                            "name" => "Total: $total",
                            "value" => "**sub total: $sub_total**",
                            "inline" => true
                        ],
                        [
                            "name" => "method: paypal",
                            "value" => "**currency: ".$date['currency_code']. "**",
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

           // Payment successfully added, redirect to the payment complete page.
           $inserids =$db->insert_id;
           header("location: https://".$_SERVER['SERVER_NAME']."/invoice.php?paymentid=$pay_id");
           exit(1);
        } else {
            // Payment failed
			header("location: https://".$_SERVER['SERVER_NAME']."/checkout.php");
             exit(1);
        }

    }else{
        header("location: https://" . $_SERVER['SERVER_NAME'] . "/invoice?paymentid=$invoice_id");
    }

    } catch (Exception $e) {
        // Failed to retrieve payment from PayPal

    }

} catch (Exception $e) {
    // Failed to take payment

}

function addPayment($data)
{
    global $db;

    if (is_array($data)) {
		//'isdsssss' --- i - integer, d - double, s - string, b - BLOB
        $stmt = $db->prepare('INSERT INTO `transaction` (product_id,transaction_id, payment_amount,currency_code, payment_status, invoice_id, product_name, createdtime) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
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