<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\BaseController;
use App\Http\Requests\v1\ConvertIntegerToNumeralRequest;
use App\Services\RomanNumeralConverter;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ConvertIntegerToNumeralController extends BaseController
{
    public function __construct(private readonly RomanNumeralConverter $romanNumeralConverter)
    {
    }

    public function post(ConvertIntegerToNumeralRequest $request): JsonResponse
    {
        if (! $numerals = $this->romanNumeralConverter->convertInteger($request->validated('integer')))
            return new JsonResponse(null, Response::HTTP_UNPROCESSABLE_ENTITY);


        if (! $this->romanNumeralConverter->persistIntegerConversion($request->validated('integer'), $numerals))
            return new JsonResponse(null, Response::HTTP_UNPROCESSABLE_ENTITY);

        $response = new JsonResponse([
            'numerals' => $numerals,
        ]);

        cache()->set('integer_'.$request->validated('integer'), $numerals, 300);

        return $response;
    }
}
