<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\BaseController;
use App\Services\StatisticsInterface;
use Illuminate\Http\JsonResponse;

class StatisticsMostPopularConversionsController extends BaseController
{
    public function __construct(private readonly StatisticsInterface $statistics)
    {
    }

    public function get(): JsonResponse
    {
        $data = $this->statistics->getMostPopularConversions();

        return new JsonResponse($data->all());
    }
}
