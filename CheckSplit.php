<?php

namespace Dwa15PegProj2;

class CheckSplit
{

   #properties
   public $payInfo =
   [
      'total' => 0,
      'payment' => 0,
   ];


   #methods
   public function __construct()
   {
      //echo 'Instantiated a new CheckSplit Object';
   }

   public function calculatePayAmount($billAmount, $tip = 15, $round = false, $divideBy = 2)
   {
      $percentage = ($tip / 100);
      $this->payInfo['total'] = $billAmount + ($billAmount * $percentage);
      $this->payInfo['payment'] = $this->payInfo['total'] / $divideBy;

      if ($round)
      {
         $this->payInfo['payment'] = round($this->payInfo['payment']);
      }
      #echo 'payment '.$this->payInfo['payment'];
      return $this->payInfo;

   }

}
