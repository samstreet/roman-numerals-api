<?php

namespace App\Bridge\DTO\Statistics;

final readonly class ConversionWithCountDTO implements \JsonSerializable
{
    public function __construct(private string $numeral, private int $count)
    {
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getNumeral(): string
    {
        return $this->numeral;
    }

    public function jsonSerialize(): array
    {
        logger()->info(__METHOD__);
        return [
            'numeral' => $this->getNumeral(),
            'total_conversions_count' => $this->getCount()
        ];
    }
}
