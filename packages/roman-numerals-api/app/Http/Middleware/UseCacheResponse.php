<?php

namespace App\Http\Middleware;

use App\Storage\Repository\Conversions\ConversionsRepositoryInterface;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final readonly class UseCacheResponse
{
    public function __construct(private ConversionsRepositoryInterface $conversionsRepository)
    {
    }

    public function handle(Request $request, Closure $next, string ...$guards): JsonResponse
    {
        if (cache()->has($key = 'integer_'.$request->get('integer'))) {
            $this->conversionsRepository->patchConvertedAtByIntegerValue($request->get('integer'));

            return new JsonResponse([
                'numerals' => cache()->get($key)
            ]);
        }

        return $next($request);
    }
}
