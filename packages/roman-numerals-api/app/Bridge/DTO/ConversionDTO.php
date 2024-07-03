<?php

namespace App\Bridge\DTO;

class ConversionDTO extends ImmutableDTO implements \JsonSerializable
{
    public function __construct(private readonly int $integer, private readonly string $numeral, private readonly ?\DateTime $convertedAt)
    {}

    public function getInteger(): int {
        return $this->integer;
    }

    public function getNumeral(): string {
        return $this->numeral;
    }

    public function getConvertedAt(): \DateTime|null {
        return $this->convertedAt;
    }


    public function jsonSerialize(): array
    {
        return [
            'integer' => $this->getInteger(),
            'numeral' => $this->getNumeral(),
            'converted_at' => $this->getConvertedAt()->format('Y-m-d H:i:s')
        ];
    }
}
