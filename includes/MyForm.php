<?php
# Filename: MyForm.php

/* This code is by Susan Buck w/ minor mods by peggyo, changing function name, and namespace (after more help from Susan)
 * I am leaving in the commented out original code so that I can reconstruct the problem/solution with namespace for my
 * own benefit. In a real world situation it would be removed.
*/
#namespace Buck;
namespace Dwa15PegProj2;

#class MyForm extends Form - changed to:

class MyForm extends \DWA\Form
{
    /**
    * Returns boolean if given value contains only numbers
    */
    #protected function numeric($value) - peggyo modified function name to add instead of overwrite. I need numeric for another field

    protected function numericDec($value)
    {
        # Check if value (sans decimals) is numeric
        $numeric = ctype_digit(str_replace([' ', '.'], '', $value));

        # A valid number should have either 0 or 1 decimals
        $oneOrNoneDecimal = in_array(substr_count($value, '.'), [0, 1]);

        return $numeric and $oneOrNoneDecimal;
    }
}
