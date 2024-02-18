<?php

namespace App\Models\Traits;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    public static function getAllFromCache(string $table, array $relations): Collection
    {
        return Cache::rememberForever("{$table}:all", fn () => self::query()->with($relations)->latest("id")->get());
    }

    public static function cacheUpdate(): void
    {
        $posts = Post::query()->with(["user", "categories", "comments" => fn (Builder $builder) => $builder->with(["user"])])->latest("id")->get();
        $categories = Category::query()->with(["posts"])->latest("id")->get();
        $comments = Comment::query()->with(["user", "post"])->latest("id")->get();

        Cache::forever("posts:all", $posts);
        Cache::forever("categories:all", $categories);
        Cache::forever("comments:all", $comments);
    }
}
