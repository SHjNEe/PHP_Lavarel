<?php

namespace App\Providers;

use App\Comment;
use App\BlogPost;
use App\Services\Counter;
use App\Observers\CommentObserver;
use App\Observers\BlogPostObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ActivityComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::component('components.badge', 'badge');
        Blade::component('components.updated', 'updated');
        Blade::component('components.card', 'card');
        Blade::component('components.tags', 'tags');
        Blade::component('components.errors', 'errors');
        Blade::component('components.comment-form', 'commentForm');
        Blade::component('components.comment-list', 'commentList');

        // view()->composer('*', ActivityComposer::class);
        view()->composer(['posts.index', 'posts.show'], ActivityComposer::class);

        BlogPost::observe(BlogPostObserver::class);
        Comment::observe(CommentObserver::class);

        // $this->app->bind(Counter::class, function ($app) {
        //     return new Counter(5);
        // });
        // $this->app->singleton(Counter::class, function ($app) {
        //     return new Counter(env('COUNTER_TIMEOUT'));
        // });
        $this->app->when(Counter::class)->needs('$timeout')->give(env('COUNTER_TIMEOUT'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
