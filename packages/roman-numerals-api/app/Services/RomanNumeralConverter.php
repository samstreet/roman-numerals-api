<?php

namespace App\Services;

use App\Storage\Repository\Conversions\ConversionsRepositoryInterface;
use Exception;

final class RomanNumeralConverter implements IntegerConverterInterface
{
    public function __construct(private readonly ConversionsRepositoryInterface $conversionsRepository)
    {}

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


    public function persistIntegerConversion(int $integer, string $numeral): bool
    {
        try {
            $conversionModel = $this->conversionsRepository->create([
                'integer' => $integer,
                'numeral' => $numeral
            ]);

            return $this->conversionsRepository->save($conversionModel);
        } catch (\Exception $exception) {
            logger()->info('Error: ' . $exception->getMessage());
            return false;
        }
    }
}
