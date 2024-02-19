<?php

namespace App\Models\Traits;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    public static function getAllFromCache(string $table): Collection
    {
        return Cache::rememberForever("{$table}:all", fn() => self::query()->with(self::getCacheRelations())->latest("id")->get());
    }

    public static function getFromCache(string $table, $id): Model|null
    {
        if (Cache::has("{$table}:{$id}"))
            return Cache::get("{$table}:{$id}");
        else {
            if (!$model = self::query()->with(self::getCacheRelations())->find($id))
                return null;
            return Cache::rememberForever("{$table}:{$id}", fn() => $model);
        }
    }

    public function putOrUpdateCache(): void
    {
        Cache::forever("{$this->getTable()}:{$this->id}", self::query()->with(self::getCacheRelations())->find($this->id));
    }

    public function deleteFromCache(): void
    {
        Cache::forget("{$this->getTable()}:{$this->id}");
    }

    public static function cacheUpdate(): void
    {
        $posts = Post::query()->with(Post::getCacheRelations())->latest("id")->get();
        $categories = Category::query()->with(Category::getCacheRelations())->latest("id")->get();
        $comments = Comment::query()->with(Comment::getCacheRelations())->latest("id")->get();

        Cache::forever("posts:all", $posts);
        Cache::forever("categories:all", $categories);
        Cache::forever("comments:all", $comments);
    }
}
