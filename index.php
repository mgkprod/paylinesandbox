<?php

use Payline\PaylineSDK;

require_once 'vendor/autoload.php';
include "config.php";
include "include.php";

?>

<s><a href="example1.php">Failed doWebPayment, without "version"</a></s><br>
<s><a href="example2.php">Failed doWebPayment, with "version"</a></s><br>
<a href="example3.php">Working doWebPayment (with buyerAddress on root level), Cofidis timeout</a><br>
<a href="example4.php">Failed doWebPayment (with buyerAddress inconsistency)</a>