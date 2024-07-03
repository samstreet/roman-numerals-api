<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConvertIntegerToNumeralController extends BaseController
{
    public function post(Request $request): JsonResponse
    {
        return new JsonResponse();
    }
}
