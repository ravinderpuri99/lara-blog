<?php

namespace App\Http\Controllers\admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
                ->select('categories.name as name', 'categories.live as status', 'posts.*')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->orderBy('posts.id', 'DESC')
                ->paginate(10);
       
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                    'title' => 'required',
                    'content' => 'required',
                ]);

        $slug = str_slug($request->title, "-");

        $insertId = DB::table('posts')->insertGetId([
                    'user_id' => $request->user_id,
                    'slug' => $slug,
                    'title' => $request->title,
                    'category_id' => $request->category_id,
                    'content' => $request->content,
                    'live' => (boolean)($request->live),
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);

        if($insertId != ''){
            if($request->hasFile('image')){
                $this->validate($request, [
                                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096'
                                ]);

                if($request->file('image')->isValid()){
                    try{
                        // rename image name or file name 
                        $getimageName = time().'.'.$request->image->getClientOriginalExtension();

                        $request->image->move(public_path('images/posts/'), $getimageName);

                        $uploadImage = DB::table('posts')
                                            ->where('id', $insertId)
                                            ->update([
                                                'image' => $getimageName
                                            ]);
                    
                    }catch (Illuminate\Filesystem\FileNotFoundException $e) {

                    }
                }
            }
            return redirect('admin/posts')->with([
                                                'message' => 'Post created successfully!',
                                                'alert-class' => 'alert-success'
                                            ]);
        }else{
            return redirect('admin/posts/create')->with([
                                                    'message' => 'Woops, Something went wrong!',
                                                    'alert-class' => 'alert-danger'
                                                ]);
        }
    }

    public function edit($id)
    {   
        $categories = DB::table('categories')->get();

        $post = DB::table('posts')->where('id', $id)->first();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                            'title' => 'required',
                            'content' => 'required',
                        ]);

        $slug = str_slug($request->title, "-");

        if($request->hasFile('image')){
            $this->validate($request, [
                                // check validtion for image or file
                                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096'
                            ]);
            if($request->file('image')->isValid()){
                try{
                    // rename image name or file name 
                    $getimageName = time().'.'.$request->image->getClientOriginalExtension();

                    $request->image->move(public_path('images/posts/'), $getimageName);

                    $uploadImage = DB::table('posts')
                                        ->where('id', $id)
                                        ->update([
                                            'image' => $getimageName
                                        ]);
                    
                }catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }

        $post = DB::table('posts')
            ->where('id', $id)
            ->update([
                    'title' => $request->title,
                    'slug' =>$slug,
                    'category_id' => $request->category_id,
                    'content' => $request->content,
                    'live' => (boolean)($request->live),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
        if($post){
            return redirect('admin/posts')->with([
                                                'message' => 'Post updated successfully!',
                                                'alert-class' => 'alert-success'
                                            ]);
        }else{
            return redirect('admin/posts')->with([
                                                'message' => 'Please try again!',
                                                'alert-class' => 'alert-danger'
                                            ]);
        }
    }

    public function show($id)
    {   
        $post = DB::table('posts')
            ->select('categories.name as name', 'posts.*')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.id', $id)->first();

        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect('admin/posts')->with([
                                            'message' => 'Post deleted successfully!',
                                            'alert-class' => 'alert-success'
                                        ]);
    }
}
