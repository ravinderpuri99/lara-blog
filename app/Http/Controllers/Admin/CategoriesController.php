<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->paginate(10);
       
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
                    'name' => 'required',
                ]);

        $insertId = DB::table('categories')->insertGetId([
                    'name' => $request->name,
                    'live' => (boolean)($request->live),
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);

        if($insertId != ''){
            return redirect('admin/categories')->with([
                                                    'message' => 'Category created successfully!',
                                                    'alert-class' => 'alert-success'
                                                ]);
        }else{
            return redirect('admin/categories')->with([
                                                    'message' => 'Woops, Something went wrong!',
                                                    'alert-class' => 'alert-danger'
                                                ]);
        }
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                    'name' => 'required',
                ]);

        $category = DB::table('categories')
            ->where('id', $id)
            ->update([
                    'name' => $request->name,
                    'live' => (boolean)($request->live),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);

        if($category){
            return redirect('admin/categories')->with([
                                                    'message' => 'Category updated successfully!',
                                                    'alert-class' => 'alert-success'
                                                ]);
        }else{
            return redirect('admin/categories')->with([
                                                    'message' => 'Please try again!',
                                                    'alert-class' => 'alert-danger'
                                                ]);
        }
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect('admin/categories')->with([
                                                'message' => 'Category deleted successfully!',
                                                'alert-class' => 'alert-success'
                                            ]);
    }
}
