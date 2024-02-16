<?php

namespace App\Http\Filters;

abstract class AbstrackFilter
{
    private array $callBacks = [];

    public function __construct(array $queryParams)
    {
        foreach ($queryParams as  $queryParamKey => $queryParam) {
            if ($queryParam) $this->callBacks[$queryParamKey] = $queryParam;
        }
    }

    public function getCallBacks(): array
    {
        return $this->callBacks;
    }
}
