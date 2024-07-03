<?php

namespace App\Bridge\DTO\Statistics;

use App\Bridge\DTO\CollectableDTO;

class MostPopularDTO extends CollectableDTO
{
    public function __construct(ConversionWithCountDTO ...$conversionWithCountDTO)
    {
        $this->list = $conversionWithCountDTO;
    }
}
