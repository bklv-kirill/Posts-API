<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    public static function getAllFromCache(string $table, array $relations): Collection
    {
        return Cache::rememberForever("{$table}:all", fn () => self::query()->with($relations)->latest("id")->get());
    }

    public static function getFromCache($id, string $table, array $relations): Model | null
    {
        $model = self::query()->with($relations)->find($id);

        return $model ? Cache::rememberForever("{$table}:{$id}", fn () => $model) : $model;
    }
}
