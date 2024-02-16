<?php

namespace App\Models;

use App\Http\Filters\Traits\Filterable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "title",
        "content",
        "user_id",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "category_posts");
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public static function getAllFromCache(): Collection
    {
        return Cache::rememberForever("posts:all", fn () => self::query()->with(["user", "categories", "comments" => fn (Builder $builder) => $builder->with(["user"])])->latest("id")->get());
    }
}
