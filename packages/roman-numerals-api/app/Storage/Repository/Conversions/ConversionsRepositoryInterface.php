<?php

namespace App\Storage\Repository\Conversions;

use App\Bridge\DTO\Statistics\MostPopularDTO;
use App\Bridge\DTO\Statistics\MostRecentDTO;
use App\Storage\Repository\RepositoryInterface;

interface ConversionsRepositoryInterface extends RepositoryInterface
{
    public function patchConvertedAtByIntegerValue(int $integerValue): bool;

    public function getMostRecentConversions(): MostRecentDTO;

    public function getMostPopularConversions(): MostPopularDTO;
}
