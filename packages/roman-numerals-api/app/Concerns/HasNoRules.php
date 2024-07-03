<?php

namespace App\Concerns;

trait HasNoRules
{
    public function rules(): array
    {
        return [];
    }
}
