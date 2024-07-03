<?php

namespace App\Providers\Routes;

interface RouteServiceProviderInterface
{
    public function boot(): void;
    public function getRouteCallback(): \Closure;
}
