<?php

namespace App\Services;

use App\Bridge\DTO\Statistics\MostPopularDTO;
use App\Bridge\DTO\Statistics\MostRecentDTO;
use App\Storage\Repository\Conversions\ConversionsRepositoryInterface;

final readonly class StatisticsService implements StatisticsInterface
{
    public function __construct(private ConversionsRepositoryInterface $conversionsRepository)
    {}

    public function getMostRecentConversions(): MostRecentDTO
    {
        try {
            return $this->conversionsRepository->getMostRecentConversions();
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());
            return new MostRecentDTO();
        }
    }

    public function getMostPopularConversions(): MostPopularDTO
    {
        try {
            return $this->conversionsRepository->getMostPopularConversions();
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());
            return new MostPopularDTO();
        }
    }
}
