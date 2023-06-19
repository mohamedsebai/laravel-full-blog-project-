<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TagController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {

        $tagData = Tag::select([
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'slug_'  . LaravelLocalization::getCurrentLocale() . ' as slug',
            'created_at',
            'updated_at'
        ])->where('id', $id)->first();

        return view('front.tag', compact('tagData'));

    }
}
