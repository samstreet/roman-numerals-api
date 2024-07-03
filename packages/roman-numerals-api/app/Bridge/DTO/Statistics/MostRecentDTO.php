<?php

namespace App\Bridge\DTO\Statistics;

use App\Bridge\DTO\CollectableDTO;
use App\Bridge\DTO\ConversionDTO;

class MostRecentDTO extends CollectableDTO
{
    public function __construct(ConversionDTO ...$conversion)
    {
        $this->list = $conversion;
    }
}
