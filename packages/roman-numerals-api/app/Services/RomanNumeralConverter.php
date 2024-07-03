<?php

namespace App\Services;

use Exception;

class RomanNumeralConverter implements IntegerConverterInterface
{
    private array $numberMap = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    public function convertInteger(int $integer): ?string
    {
        try {
            $result = '';

            foreach ($this->numberMap as $value => $roman) {
                while ($integer >= $value) {
                    $result .= $roman;
                    $integer -= $value;
                }
            }

            return $result;
        } catch (Exception $exception) {
            logger()->info('Error: ' . $exception->getMessage());
            return null;
        }
    }
}
