<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Post\PostUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryPostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "created_at" => $this->created_at->format("d.m.Y"),
            "title" => $this->title,
            "content" => $this->content,
            "owner" => new PostUserResource($this->user),
        ];
    }
}
