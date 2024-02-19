<?php

namespace App\Providers;

use App\Events\Categories\CategoriesChangedEvent;
use App\Events\CommentsChangedEvent;
use App\Events\Posts\PostsChangedEvent;
use App\Listeners\Categories\CategoriesChangedListener;
use App\Listeners\CommentsChangedListener;
use App\Listeners\Posts\PostsChangedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostsChangedEvent::class => [
            PostsChangedListener::class,
        ],
        CategoriesChangedEvent::class => [
            CategoriesChangedListener::class
        ],
        CommentsChangedEvent::class => [
            CommentsChangedListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
