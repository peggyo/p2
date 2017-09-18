<?php

require('helpers.php');

// initialize variables
$newTransaction = false;
$totalBill = 0;

dump($_GET);

if (empty($_GET)) {
   $pleasePay = false;
   $billAmount = '';
   $newTransaction = true;
   return;
}

// initialize variable - I am 'using' the nature of a loosely typed language. Should I?
$pleasePay = 0;

if (isset($_GET['billAmount'])) {
  $billAmount = $_GET['billAmount'];
}

if ($billAmount == '') {
   return $billAmount;
}

if (isset($_GET['tip'])) {
  $tip = $_GET['tip'];
}

if (isset($_GET['round'])) {        // if 'round' is set we should round
  $round = true;
}
else {                              // if 'round' is not set, we should round
   $round = false;
}

if (isset($_GET['divideBy'])) {     // get the amount to divide by
  $divideBy = $_GET['divideBy'];
}

//dump($billAmount);
//dump($tip);
//dump($totalBill);

$totalBill = ($billAmount + ($billAmount * $tip));
dump($totalBill);

$pleasePay = ($totalBill / $divideBy);
if ($round) {
   $pleasePay = round($pleasePay);  // round defaults to whole numbers
}

dump($pleasePay);
