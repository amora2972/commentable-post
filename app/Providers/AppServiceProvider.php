<?php

namespace App\Providers;

use App\Interfaces\IBaseRepository;
use App\Interfaces\ICommentRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ICommentRepository::class, function() {
            return new CommentRepository();
        });
    }

    public function boot()
    {
    }
}
