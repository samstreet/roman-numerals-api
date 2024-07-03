<?php

namespace App\Services;

use App\Bridge\DTO\Statistics\MostPopularDTO;
use App\Bridge\DTO\Statistics\MostRecentDTO;

interface StatisticsInterface
{
    public function getMostRecentConversions(): MostRecentDTO;
    public function getMostPopularConversions(): MostPopularDTO;
}
