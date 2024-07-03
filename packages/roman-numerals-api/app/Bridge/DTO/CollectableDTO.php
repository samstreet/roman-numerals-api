<?php

namespace App\Bridge\DTO;

abstract class CollectableDTO extends ImmutableDTO
{
    protected array $list;

    public function all(): array
    {
        return $this->list;
    }
}
