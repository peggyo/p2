<?php

require('helpers.php');
require('CheckSplit.php');
require('Form.php');
require('MyForm.php'); # <--- NEW

use Dwa15PegProj2\CheckSplit;
use DWA\Form;
#use Buck\MyForm;          (left in this commented out code so I can easily recall the namespace problem/solution)
use Dwa15PegProj2\MyForm;

$form = new MyForm($_GET);

# initialize variables
$newTransaction = false;
$totalBill = 0;
$pleasePay = 0;

#dump($_GET);

if (empty($_GET)) {        #If $_GET is empty it's a new page. Set some default values and return.
   $billAmount = '';       #This code block may be possible to replace using the Form class - may revisit
   $newTransaction = true;
   $round = false;
   $tip = 15;
   $divideBy = 2;
   #dump($tip);
   return;
}

$billAmount = $form->get('billAmount', '');
$tip = $form->get('tip', 15);
$divideBy = $form->get('divideBy', 2);

$round = $form->isChosen('round');

if ($form->issubmitted()) {
   $errors = $form->validate([
      'billAmount'=>'numericDec|required|min:0|max:5001',
      'tip' => 'numeric|min:0|max:101',
      'divideBy' => 'numeric|min:0|max:21'
   ]);
}

if (!empty($errors)) {
   #dump($errors);
   return;
}

$check = new CheckSplit;

$result = $check->calculatePayAmount($billAmount, $tip, $round, $divideBy);

$totalBill = $result['total'];
$pleasePay = $result['payment'];
