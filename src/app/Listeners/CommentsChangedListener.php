<?php

namespace App\Listeners;

use App\Events\CommentsChangedEvent;
use App\Models\Comment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentsChangedListener
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
    public function handle(CommentsChangedEvent $event): void
    {
        Comment::cacheUpdate();
    }
}
