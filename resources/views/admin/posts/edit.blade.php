
@extends('admin._layouts.master')
@section('title')
    Edit Post
@endsection
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('admin/dashboard') }}">Laravel Blog</a></li>
                        <li><a href="{{ url('admin/posts') }}">Posts</a></li>
                        <li class="active">Edit Post</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-sm-10 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Post</h3>
                        </div>
                        <div class="panel-body">
                            <form  enctype="multipart/form-data" class="form-horizontal" method="POST" action='{{ url("admin/posts/update/{$post->id}") }}'>
                                {{ csrf_field() }}

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"></input>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="title">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="category">Category</label>
                                    <div class="col-md-10">
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected="selected"' : ''}}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="content">Content</label>
                                    <div class="col-md-10">
                                        <textarea name="content" class="form-control" rows="5">{{ $post->content }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="live" class="control-label col-md-2">Live</label>
                                    <div class="col-md-10">
                                        <input style="width: 16px" class="checkbox form-control" id="live" type="checkbox" name="live" {{ $post->live == 1 ? 'checked' : '' }}>   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-md-2 control-label">Cover Image</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="col-md-12 post-img">
                                                <img class="cover-img" src='{{ asset("images/posts/".$post->image) }}'>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="fileUpload btn btn-primary waves-effect waves-light">
                                                    <span>Change</span>
                                                    <input type="file" class="upload" name="image">
                                                </div>      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-11">
                                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- End row-->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
