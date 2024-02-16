<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstrackFilter implements FilterInterface
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

    public static function id(Builder $builder, string $id): void
    {
        $builder->where("id", $id);
    }
    public static function order_by(Builder $builder, string $order_by): void
    {
        switch ($order_by){
            case "id":
                $builder->latest("id");
                break;
            case "date":
                $builder->oldest("created_at")->latest("id");
                break;
            default:
                $builder->latest("id");
        }
    }
}
