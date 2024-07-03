<?php

namespace App\Storage\Repository\Conversions;

use App\Bridge\DTO\ConversionDTO;
use App\Bridge\DTO\Statistics\ConversionWithCountDTO;
use App\Bridge\DTO\Statistics\MostPopularDTO;
use App\Bridge\DTO\Statistics\MostRecentDTO;
use App\Storage\Entity\Conversion;
use App\Storage\Repository\Repository;
use Illuminate\Support\Facades\DB;

final class ConversionsRepository extends Repository implements ConversionsRepositoryInterface
{
    public function __construct(readonly Conversion $entity)
    {
        $this->setEntity($this->entity);
    }

    public function patchConvertedAtByIntegerValue(int $integerValue): bool
    {
        $entity = $this->builder()->newQuery()->where('integer', $integerValue)->firstOrFail();
        $entity->converted_at = now()->toDateTimeString();

        return $this->save($entity);
    }

    public function getMostRecentConversions(): MostRecentDTO
    {
        try {
            $results = $this->getEntity()
                ->newQuery()
                ->orderBy('conversions.converted_at', 'desc')
                ->limit(10)
                ->get()
                ->map(fn (Conversion $conversion) => new ConversionDTO($conversion->integer, $conversion->numeral, $conversion->converted_at));

            return new MostRecentDTO(...$results);
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());
            return new MostRecentDTO();
        }
    }

    public function getMostPopularConversions(): MostPopularDTO
    {
        try {
            $results = $this->getEntity()
                ->newQuery()
                ->select(['numeral', DB::raw('COUNT(*) as count')])
                ->groupBy('numeral')
                ->limit(10)
                ->orderByDesc('count')
                ->get()
                ->map(fn (Conversion $conversion) => new ConversionWithCountDTO($conversion->numeral, $conversion->count));

            return new MostPopularDTO(...$results);
        } catch (\Exception $exception) {
            logger()->error($exception->getMessage());
            return new MostPopularDTO();
        }
    }
}
