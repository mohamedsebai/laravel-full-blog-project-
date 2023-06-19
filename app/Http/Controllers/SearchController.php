<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {


        $searchKeyword = $request->searchKeyword;
        $searchPostsData = Post::select([
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
        ->where('title_' . LaravelLocalization::getCurrentLocale() , 'like', '%'.$searchKeyword.'%')
        ->orwhere('content_' . LaravelLocalization::getCurrentLocale() , 'like', '%'.$searchKeyword.'%')
        ->orderByDesc('id')
        ->skip(0)
        ->take(mt_getrandmax())
        ->paginate(20);
        return view('front.search', compact('searchKeyword','searchPostsData'));
    }
}
