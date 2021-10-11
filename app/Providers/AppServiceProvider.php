<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Paginator::defaultView('vendor.pagination.default');
//        Paginator::defaultSimpleView('vendor.pagination.simple-default');

        Paginator::defaultView('vendor.pagination.bootstrap-4');
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-4');


        view()->composer('layout.sidebar', function ($view) {
            if (Cache::has('popular_categories')) {
                $popular_categories = Cache::get('popular_categories');
            } else {
                $popular_categories = Category::withCount('posts')->having('posts_count', '>', 0)->orderBy('posts_count', 'desc')->limit(3)->get();
                Cache::put('popular_categories', $popular_categories, 30);
            }
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get())
                ->with('popular_categories', $popular_categories);
        });

    }
}
