<?php

namespace App\Providers\Routes\v1;

use App\Http\Controllers\v1\ConvertIntegerToNumeralController;
use App\Providers\Routes\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class ConvertIntegerToNumeralRouteServiceProvider extends RouteServiceProvider
{
    protected array $attributes = [
        'prefix' => '/v1/convert-integer-to-numeral',
        'middleware' => [],
    ];

    protected array $allowedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_OPTIONS,
        Request::METHOD_POST,
    ];

    protected string $controller = ConvertIntegerToNumeralController::class;

    protected string $routeNamePrefix = 'converter.int-to-numerals';
}
