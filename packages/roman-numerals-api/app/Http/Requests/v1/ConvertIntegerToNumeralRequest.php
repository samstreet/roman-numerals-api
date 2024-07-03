<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

final class ConvertIntegerToNumeralRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'integer' => 'required|integer|gt:0|lte:39999',
        ];
    }
}
