<?php
# Filename: MyForm.php

/* This code is by Susan Buck w/ minor mods by peggyo, changing function name, and namespace (after more help from Susan)
*/

namespace Dwa15PegProj2;

class MyForm extends \DWA\Form
{
    /**
    * Returns boolean if given value contains only numbers
    */
    protected function numericDec($value)
    {
        # Check if value (sans decimals) is numeric
        $numeric = ctype_digit(str_replace([' ', '.'], '', $value));

        # A valid number should have either 0 or 1 decimals
        $oneOrNoneDecimal = in_array(substr_count($value, '.'), [0, 1]);

        return $numeric and $oneOrNoneDecimal;
    }
}
