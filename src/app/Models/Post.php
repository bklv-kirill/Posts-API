<?php

namespace App\Models;

use App\Http\Filters\Traits\Filterable;
use App\Models\Traits\Cacheable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use Filterable;
    use Cacheable;

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

    public static function getCacheRelations(): array
    {
        return ["user", "categories", "comments" => fn (Builder $builder) => $builder->with(["user"])];
    }

    public function deleteCategories(): void
    {
        CategoryPost::query()->where("post_id", $this->id)->delete();
    }

    public function updateCategories(array $categories): void
    {
        $this->deleteCategories();
        $this->addCategories($categories);
    }
    public function addCategories(array $categories): void
    {
        foreach ($categories as $category) {
            CategoryPost::query()->create([
                "category_id" => $category,
                "post_id" => $this->id,
            ]);
        }
    }
}
