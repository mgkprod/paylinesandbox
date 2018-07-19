<?php

use Payline\PaylineSDK;

require_once 'vendor/autoload.php';
include "config.php";
include "include.php";

$paylineSDK = new PaylineSDK($PAYLINE_MERCHANT_ID, $PAYLINE_ACCESS_KEY, '', '', '', '', PaylineSDK::ENV_HOMO);
$payment_id = 'inv_test3x_' . uniqid();

$doWebPayment = [
    'version' => 17,
    'returnURL' => 'https://website.com/payline/callback',
    'cancelURL' => 'https://website.com/payline/callback/cancel',
];

$doWebPayment['contracts'] = [$PAYLINE_3X_CONTRACT_NUMBER];

$doWebPayment['payment'] = [
    'amount' => (int) 50000,
    'currency' => 978,
    'action' => 101,
    'mode' => 'CPT',
    'contractNumber' => $PAYLINE_3X_CONTRACT_NUMBER,
];

$doWebPayment['order'] = [
    'ref' => $payment_id,
    'country' => 'FR',
    'amount' => 50000,
    'currency' => 978,
    'date' => date('d/m/Y H:i'),
    'deliveryMode' => 4,
];

$doWebPayment['buyer'] = [
    'title' => 'MR',
    'firstName' => 'ERIC',
    'lastName' => 'DUPONT',
    'mobilePhone' => '0654874564',
    'email' => 'eric.dupont@email.com',
    'billingAddress' => [
        'country' => 'FRANCE',
        'street1' => '72 RUE MICHEL ANGE',
        'zipCode' => '75016',
        'cityName' => 'PARIS',
    ],
];

echo 'SDK request:<br>';

echo "<pre>";
var_dump($doWebPayment);
echo "</pre>";

$doWebPaymentResponse = $paylineSDK->doWebPayment($doWebPayment);

echo 'WS reponse:<br>';

echo "<pre>";
var_dump($doWebPaymentResponse);
echo "</pre>";

if (isset($doWebPaymentResponse['redirectURL'])) {
    echo 'Success !<br><a href="' . $doWebPaymentResponse["redirectURL"] . '">' . $doWebPaymentResponse["redirectURL"] . '</a>';
}
