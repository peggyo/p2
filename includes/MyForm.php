<?php
# Filename: MyForm.php

#namespace Buck; #
namespace DWA;

#class MyForm extends DWA\Form
class MyForm extends Form
{
    /**
    * Returns boolean if given value contains only numbers
    */
    #protected function numeric($value)
    protected function numericDec($value)
    {
        # Check if value (sans decimals) is numeric
        $numeric = ctype_digit(str_replace([' ', '.'], '', $value));

        # A valid number should have either 0 or 1 decimals
        $oneOrNoneDecimal = in_array(substr_count($value, '.'), [0, 1]);

        return $numeric and $oneOrNoneDecimal;
    }
}
