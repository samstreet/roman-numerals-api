<?php

namespace App\Providers\Routes\v1;

use App\Http\Controllers\v1\StatisticsMostPopularConversionsController;
use App\Providers\Routes\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class StatisticsMosPopularConversionServiceProvider extends RouteServiceProvider
{
    protected array $attributes = [
        'prefix' => '/v1/statistics/most-popular',
        'middleware' => [],
    ];

    protected array $allowedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_OPTIONS,
        Request::METHOD_GET,
    ];

    protected string $controller = StatisticsMostPopularConversionsController::class;

    protected string $routeNamePrefix = 'converter.stats.most-popular';
}
