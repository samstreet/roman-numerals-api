<?php

namespace App\Providers\Routes\v1;

use App\Http\Controllers\v1\StatisticsMostRecentConversionsController;
use App\Providers\Routes\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class StatisticsMostRecentConversionServiceProvider extends RouteServiceProvider
{
    protected array $attributes = [
        'prefix' => '/v1/statistics/most-recent',
        'middleware' => [],
    ];

    protected array $allowedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_OPTIONS,
        Request::METHOD_GET,
    ];

    protected string $controller = StatisticsMostRecentConversionsController::class;

    protected string $routeNamePrefix = 'converter.stats.most-recent';
}
