<?php

namespace App\Concerns;

use Illuminate\Container\Container;
use Illuminate\Routing\Router;

trait HasRouter
{
    public function getRouter(): Router
    {
        return Container::getInstance()->make('router');
    }
}
