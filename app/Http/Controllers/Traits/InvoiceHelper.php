<?php

namespace App\Http\Controllers\Traits;

trait InvoiceHelper
{

    /**
     * @see https://www.hashbangcode.com/article/php-function-turn-integer-roman-numerals  Fungsi Integer Romawi
     * @param int $integer
     * @return string
     */
    private function integerToRoman($integer)
    {
        // Convert the integer into an integer (just to make sure)
        $integer = intval($integer);
        $result = '';

        // Create a lookup array that contains all of the Roman numerals.
        $lookup = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );

        foreach ($lookup as $roman => $value) {
            // Determine the number of matches
            $matches = intval($integer / $value);

            // Add the same number of characters to the string
            $result .= str_repeat($roman, $matches);

            // Set the integer to be the remainder of the integer and the value
            $integer = $integer % $value;
        }

        // The Roman numeral should be built, return it
        return $result;
    }

    /**
     * @param int $number
     * @return string $numberTemp
     */
    private function generateIncrement($number)
    {
        $digit = (string) $number;
        $numberTemp = "";
        for ($i = 0; $i < 3 - strlen($digit); $i++) {
            $numberTemp .= "0";
        }
        $numberTemp .= $digit;
        return $numberTemp;
    }

    /**
     * @param string $model
     * @return string
     */
    private function tableNameToUpper($model)
    {
        return strtoupper(substr(str_replace("_", "", $model), 0, strlen(str_replace("_", "", $model)) - 1));
    }
}
