<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require 'autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AQCvk_u1C5aQ0aGWoUZwikSzTuyrlMiVkl7KhlYCmda_kxmgc87mJje_uIaHFuM0ZY7LrKNVnA_c4lat',
    'client_secret' => 'EPKV1VHMWQAVr1ZoWflTFLXPhiTN9Z-GOUUs6r9LperkDIPdaBBroqaZUTueFKCRKuCOQC1y02BwO3f3',
    'return_url' => 'http://localhost/paypal-checkout-response.php',
    'cancel_url' => 'http://localhost/checkout.php'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'digital'
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
