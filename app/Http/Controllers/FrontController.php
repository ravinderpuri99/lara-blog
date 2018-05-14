<?php

namespace App\Http\Controllers;

use App\front;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{   
    public function index()
    {
        //return view('admin.home');

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

    public function view($id){

        $categories = DB::table('categories')->where('live', '1')->get();

        $post = DB::table('posts')
                ->select('users.name', 'posts.*')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->where('id', '$id')
                ->first();

        return $post;
        return view('frontend.view', compact('categories', 'post'));
    }
}
