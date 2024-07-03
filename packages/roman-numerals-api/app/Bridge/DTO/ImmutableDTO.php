<?php

namespace App\Bridge\DTO;

use Exception;

abstract class ImmutableDTO implements DataObject
{
    public function __set(string $name, $value): void
    {
        throw new Exception('Object is immutable');
    }

    public function __unset(string $name): void
    {
        throw new Exception('Object is immutable');
    }
}
