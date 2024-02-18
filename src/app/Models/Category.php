<?php

namespace App\Models;

use App\Http\Filters\Traits\Filterable;
use App\Models\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    use Filterable;
    use Cacheable;

    protected $fillable = [
        "name"
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, "category_posts");
    }

    public function deletePosts()
    {
        CategoryPost::query()->where("category_id", $this->id)->delete();
    }
    public function updatePosts(array $posts)
    {
        $this->deletePosts();
        $this->addPosts($posts);
    }
    public function addPosts(array $posts): void
    {
        foreach ($posts as $post) {
            CategoryPost::query()->create([
                "category_id" => $this->id,
                "post_id" => $post,
            ]);
        }
    }
}
