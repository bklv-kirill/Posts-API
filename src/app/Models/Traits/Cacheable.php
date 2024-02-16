<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    public static function getAllFromCache(string $table, array $relations): Collection
    {
        return Cache::rememberForever("{$table}:all", fn () => self::query()->with($relations)->latest("id")->get());
    }
}
