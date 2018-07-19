<?php

use Payline\PaylineSDK;

require_once 'vendor/autoload.php';
include "config.php";
include "include.php";

$paylineSDK = new PaylineSDK($PAYLINE_MERCHANT_ID, $PAYLINE_ACCESS_KEY, '', '', '', '', PaylineSDK::ENV_HOMO);
$payment_id = 'inv_test3x_' . uniqid();

$doWebPayment = [
    'returnURL' => 'https://website.com/payline/callback',
    'cancelURL' => 'https://website.com/payline/callback/cancel',
    'selectedContractList' => $PAYLINE_CONTRACT_NUMBER,
    'secondSelectedContractList' => $PAYLINE_3X_CONTRACT_NUMBER,
];

$doWebPayment['payment'] = [
    'amount' => (int) 5000,
    'currency' => 978,
    'action' => 101,
    'mode' => 'CPT',
    'contractNumber' => $PAYLINE_CONTRACT_NUMBER,
];

$doWebPayment['order'] = [
    'ref' => 'ref',
    'country' => 'FR',
    'amount' => 5000,
    'currency' => 978,
    'date' => date('d/m/Y H:i'),
    'deliveryMode' => 4,
];

var_dump($doWebPayment);

$doWebPaymentResponse = $paylineSDK->doWebPayment($doWebPayment);

dd($doWebPaymentResponse);
