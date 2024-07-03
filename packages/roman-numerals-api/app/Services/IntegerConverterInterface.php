<?php

namespace App\Services;

interface IntegerConverterInterface
{
    public function convertInteger(int $integer): ?string;
    public function persistIntegerConversion(int $integer, string $numeral): bool;
}
