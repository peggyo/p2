<?php

require('helpers.php');

require('CheckSplit.php');    //(later libraries/CheckSplit.php....)

use Dwa15PegProj2\CheckSplit;

// initialize variables

$newTransaction = false;
$totalBill = 0;
$pleasePay = 0;

//dump($_GET);
if (empty($_GET)) {        //If $_GET is empty it's a new page. Set some default values and return.
   $billAmount = '';
   $newTransaction = true;
   $round = false;
   $tip = 15;
   $divideBy = 2;
   //dump($tip);
   return;
}

if (isset($_GET['billAmount'])) {
  $billAmount = $_GET['billAmount'];
}

if (isset($_GET['tip'])) {
  $tip = $_GET['tip'];
  //dump($tip);
  $percentage = $tip / 100;
  //dump($tip);
  //dump($percentage);
}

if (isset($_GET['round'])) {        // if 'round' is set we should round
  $round = true;
}
else {                              // if 'round' is not set, we should NOT round
   $round = false;
}

if (isset($_GET['divideBy'])) {     // get the amount to divide by
  $divideBy = $_GET['divideBy'];
}

//dump($billAmount);
//dump($tip);
//dump($totalBill
/* This is a place where an error should be shown - when we do validation. It is the
 * last check in the code because other values are set up to use defaults or are more
 * likely to be set because of the type of input (select list, for example) and
 * must be valid when the error returns so that the page can retain those entries.
*/
if ($billAmount == '') {
   return $billAmount;
}

$check = new CheckSplit;

$result = $check->calculatePayAmount($billAmount, $tip, $round, $divideBy);

$totalBill = $result['total'];
$pleasePay = $result['payment'];


/*

$totalBill = ((float) $billAmount + ((float) $billAmount * (float) $percentage));
//dump($totalBill);
$pleasePay = ($totalBill / $divideBy);

if ($round) {
   $pleasePay = round($pleasePay);  // round defaults to whole numbers
}
*/
//dump($divideBy);
