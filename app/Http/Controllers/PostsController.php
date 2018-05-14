<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {

        $categories = DB::table('categories')->where('live', '1')->get();

        $posts = DB::table('posts')
                ->select('users.name', 'posts.*')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->where('live', '1')
                ->orderBy('posts.id', 'DESC')
                ->paginate(2);

        //return $categories;
        return view('frontend.posts.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = DB::table('posts')
                ->select('users.name', 'posts.*')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->where('posts.slug', $slug)
                ->first();

        $post_id = $post->id;
        
        $categories = DB::table('categories')->where('live', '1')->get();

        $comments = DB::table('comments')->where('post_id', $post_id)->get();

        

        return view('frontend.posts.view', compact('categories', 'post', 'comments'));
    }
}
