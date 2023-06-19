<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SinglePageContoller extends Controller
{



    public function show($id, $slug){
        // echo $id;
        // echo $slug;


        $postData = Post::where('id', $id)->select([
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
        ])->first();
        return view('front.single', compact(['postData']));


    }

    public function store(Request $request){

        $request->validate([
            'comment_content' => 'required|max:255',
        ]);

        Comment::create([
            'content' => $request->input('comment_content'),
            'parent' => $request->input('parent_id'),
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
        ]);
        return back()->with('commentMessage' , 'message add sucess');
    }

    public function update(Request $request , $id){

        $request->validate([
            'comment_content' => 'required|max:255',
        ]);
        Comment::where('id', $id)->update([
            'content' => $request->input('comment_content'),
        ]);
        return back()->with('commentMessage' , 'message Update sucess');
    }


    public function destroy($id){
        DB::table('comments')
        ->where('id', $id)
        ->orWhere('parent', $id)
        ->delete();
        return back()->with('commentMessage' , 'Comment delete success');
    }


}
