<?php

namespace App\Listeners\Categories;

use App\Events\Categories\CategoriesChangedEvent;
use App\Models\Category;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CategoriesChangedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CategoriesChangedEvent $event): void
    {
        Category::cacheUpdate();
    }
}
