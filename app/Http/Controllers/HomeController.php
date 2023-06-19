<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $postData = Post::select([
            'id',
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'content_' . LaravelLocalization::getCurrentLocale() . ' as content',
            'slug_'  . LaravelLocalization::getCurrentLocale() . ' as slug',
            'img',
            'classified',
            'category_id',
            'user_id',
            'created_at',
            'updated_at'
        ])->orderByDesc('id')->get();

        $categoryData = Category::select([
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'slug_'  . LaravelLocalization::getCurrentLocale() . ' as slug',
            'img',
            'created_at',
            'updated_at'
        ])->orderByDesc('id')->get();

        return view('front.index', compact(['postData', 'categoryData']));
    }
}
