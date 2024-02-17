<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function getCallBacks(): array;
    public static function order_by(Builder $builder, string $order_by): void;
}
