<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Console\Command;

class btmseed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'btmseed:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::query()->get();

        foreach ($posts as $post) {
            CategoryPost::query()->create([
                "post_id" => $post->id,
                "category_id" => Category::query()->get()->random()->id,
            ]);
        }
    }
}
