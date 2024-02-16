<?php

namespace App\Http\Filters\Posts;

use App\Http\Filters\AbstrackFilter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstrackFilter
{
    public static function id(Builder $builder, string $id): void
    {
        $builder->where("id", $id);
    }

    public static function title(Builder $builder, string $title): void
    {
        $builder->where("title", "LIKE", "%{$title}%");
    }

    public static function content(Builder $builder, string $title): void
    {
        $builder->where("content", "LIKE", "%{$title}%");
    }

    public static function order_by(Builder $builder, string $order_by): void
    {
        switch ($order_by){
            case "id":
                $builder->latest("id");
                break;
            case "date":
                $builder->latest("created_at")->latest("id");
                break;
            default:
                $builder->latest("id");
        }
    }
}
