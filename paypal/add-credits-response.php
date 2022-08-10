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

           // Payment successfully added, redirect to the payment complete page.
           $inserids =$db->insert_id;
           header("location: https://".$_SERVER['SERVER_NAME']."/invoice.php?paymentid=$pay_id");
           exit(1);
        } else {
            // Payment failed
			header("location: https://".$_SERVER['SERVER_NAME']."/checkout.php");
             exit(1);
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