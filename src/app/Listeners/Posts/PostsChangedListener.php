<?php

namespace App\Listeners\Posts;

use App\Events\Posts\PostsChangedEvent;
use App\Models\Post;
use App\Models\Traits\Cacheable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostsChangedListener
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
    public function handle(PostsChangedEvent $event): void
    {
        Post::cacheUpdate();
    }
}
