<?php

namespace App\Providers;



use App\Models\Category;
use App\Models\Media_Account;
use App\Models\Post;
use App\Models\Socialaccount;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Illuminate\Cache\RateLimiting\Limit;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\DB;


class SharingDataServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        $PostShareData = Post::select([
            'id',
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'content_' . LaravelLocalization::getCurrentLocale() . ' as content',
            'slug_'  . LaravelLocalization::getCurrentLocale() . ' as slug',
            'img',
            'classified',
            'category_id',
            'user_id',
            'created_at',
        ])
        ->where('classified' , '=', 'trendding')
        ->orderByDesc('id')
        ->skip(0)
        ->take(10)
        ->get();

        // ->orderByDesc('id') will cause proplem


        $categoryShareData = Category::select([
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'slug_'  . LaravelLocalization::getCurrentLocale() . ' as slug',
            'img',
            'created_at',
            'updated_at'
        ])->orderByDesc('id')->get();

        $tagShareData = Tag::select([
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'slug_'  . LaravelLocalization::getCurrentLocale() . ' as slug',
            'created_at',
            'updated_at'
        ])->orderByDesc('id')->get();

        $mediaAccountShareData = Socialaccount::select([
            'id',
            'account',
            'link',
            'followers',
            'created_at',
            'updated_at'
        ])->orderByDesc('id')->get();

        //you will call it as a variable $postData
        View::share([
            'SHARAING_POSTS_DATA' => $PostShareData,
            'SHARAING_CATEGORIES_DATA' => $categoryShareData,
            'SHARAING_TAGS_DATA' => $tagShareData,
            'SHARING_MEDIA_ACCOUNTS_DATA' => $mediaAccountShareData,
        ]);
    }




}
