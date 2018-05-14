<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function create(Request $request)
    {
    	$this->validate($request, [
                    'name' => 'required',
                    'email' => 'required',
                    'comment' => 'required'
                ]);

        $insertId = DB::table('comments')->insertGetId([
                    'post_id' => $request->post_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'comment' => $request->comment,
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);

        if($insertId != ''){
        	return redirect('posts/show/'.$request->slug);
        }
    }
}
