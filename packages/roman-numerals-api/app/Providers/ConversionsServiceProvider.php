<?php

namespace App\Providers;

use App\Services\IntegerConverterInterface;
use App\Services\RomanNumeralConverter;
use App\Services\StatisticsInterface;
use App\Services\StatisticsService;
use App\Storage\Repository\Conversions\ConversionsRepository;
use App\Storage\Repository\Conversions\ConversionsRepositoryInterface;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

final class ConversionsServiceProvider extends BaseServiceProvider
{
    public array $singletons = [
        IntegerConverterInterface::class => RomanNumeralConverter::class,
        ConversionsRepositoryInterface::class => ConversionsRepository::class,
        StatisticsInterface::class => StatisticsService::class,
    ];

    public array $bindings = [
        IntegerConverterInterface::class,
        ConversionsRepositoryInterface::class,
        StatisticsInterface::class
    ];

    public function provides(): array
    {
        return array_merge(array_values($this->singletons), array_values($this->bindings));
    }
}
