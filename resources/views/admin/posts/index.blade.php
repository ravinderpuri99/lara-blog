@extends('admin._layouts.master')
@section('title')
    Blog Posts
@endsection
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            @if ($message = Session::get('message'))
                <div class="alert {{ Session::get('alert-class') }} alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Blog Posts</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('admin/dashboard') }}">Laravel Blog</a></li>
                        <li class="active">Blog Posts</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <a href="{{ url('admin/posts/create') }}" class="btn btn-success waves-effect waves-light"> Create Post</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>Category</th>
                                                <th>Slug</th>
                                                <th>Title</th>
                                                <th>Content</th> 
                                             <!-- <th>Status</th> 
                                                <th>Cover Image</th>-->
                                                <th width="21%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $i = 1; ?>
                                            @forelse($posts as $post)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $post->name }}</td>
                                                    <td>{{ $post->slug }}</td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ substr($post->content, 0, random_int(60, 150)). '...' }}</td> 
                                                <!--    <td>
                                                        @if($post->live == 1)
                                                            <a class="btn btn-primary" href="#">Active</a>
                                                        @else
                                                            <a class="btn btn-danger" href="#">Deactive</a> 
                                                        @endif
                                                    </td> 
                                                    <td><img src='{{ asset("images/posts/$post->image") }}' width="100px" height="80px"></td> -->
                                                    <td>
                                                        <a class="btn btn-info" href='{{ url("admin/posts/show/{$post->id}") }}'>Show</a>  
                                                        <a class="btn btn-success" href='{{ url("admin/posts/edit/{$post->id}") }}'>Edit</a>    
                                                        <a class="btn btn-danger" href='{{ url("admin/posts/delete/{$post->id}") }}'>Delete</a>

                                                    </td>
                                                </tr>
                                                <?php  $i++; ?>
                                            @empty
                                                No posts.
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
@endsection