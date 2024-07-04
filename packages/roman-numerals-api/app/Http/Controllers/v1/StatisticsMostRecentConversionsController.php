<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\BaseController;
use App\Services\StatisticsInterface;
use Illuminate\Http\JsonResponse;

class StatisticsMostRecentConversionsController extends BaseController
{
    public function __construct(private readonly StatisticsInterface $statistics)
    {
    }

    public function get(): JsonResponse
    {
        $data = $this->statistics->getMostRecentConversions();

        return new JsonResponse($data->all());
    }
}
