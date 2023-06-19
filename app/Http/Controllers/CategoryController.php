<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {

        $categoryData = Category::select([
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'slug_'  . LaravelLocalization::getCurrentLocale() . ' as slug',
            'img',
            'created_at',
            'updated_at'
        ])->where('id', $id)->first();



        $categoryPostsData = Post::select([
            'id',
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'content_' . LaravelLocalization::getCurrentLocale() . ' as content',
            'slug_' . LaravelLocalization::getCurrentLocale() . ' as slug',
            'img',
            'classified',
            'category_id',
            'user_id',
            'created_at',
        ])
        ->where('category_id' , $id)
        ->orderByDesc('id')
        ->skip(0)
        ->take(mt_getrandmax())
        ->paginate(2);
        return view('front.category', compact('categoryData', 'categoryPostsData'));
    }
}
