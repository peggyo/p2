<?php

require('helpers.php');
require('CheckSplit.php');
require('Form.php');
require('MyForm.php'); # <--- NEW

use Dwa15PegProj2\CheckSplit;
use DWA\Form;
#use Buck\MyForm;
use DWA\MyForm;

$form = new MyForm($_GET); # <--- CHANGED
#$form = new Form($_GET);

// initialize variables
$newTransaction = false;
$totalBill = 0;
$pleasePay = 0;

dump($_GET);

if (empty($_GET)) {        //If $_GET is empty it's a new page. Set some default values and return.
   $billAmount = '';
   $newTransaction = true;
   $round = false;
   $tip = 15;
   $divideBy = 2;
   //dump($tip);
   return;
}

$billAmount = $form->get('billAmount', '');
$tip = $form->get('tip', 15);
$divideBy = $form->get('divideBy', 2);

$round = $form->isChosen('round');

if ($form->issubmitted()) {
   $errors = $form->validate([
      'billAmount'=>'numericDec|required|min:0|max:5001',
      'tip' => 'numeric',
      'divideBy' => 'numeric|min:0|max:21'
   ]);
}

/*if ($billAmount == '')
{
   dump('in if billAmount if statement');
   return $billAmount;
}*/

if (!empty($errors)) {
   dump($errors);
   return;
}

$check = new CheckSplit;

$result = $check->calculatePayAmount($billAmount, $tip, $round, $divideBy);

$totalBill = $result['total'];
$pleasePay = $result['payment'];
