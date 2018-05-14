@extends('admin._layouts.master')
@section('title')
    Categories
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
                    <h4 class="pull-left page-title">Categories</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('admin/dashboard') }}">Laravel Blog</a></li>
                        <li class="active">Categories</li>
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
                                        <a href="{{ url('admin/categories/create') }}" class="btn btn-success waves-effect waves-light"> Create Category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $i = 1; ?>
                                            @forelse($categories as $category)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        @if($category->live == 1)
                                                            <a class="btn btn-primary" href="#">Active</a>
                                                        @else
                                                            <a class="btn btn-danger" href="#">Deactive</a> 
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success" href='{{ url("admin/categories/edit/{$category->id}") }}'>Edit</a>    
                                                        <a class="btn btn-danger" href='{{ url("admin/categories/delete/{$category->id}") }}'>Delete</a>

                                                    </td>
                                                </tr>
                                                <?php  $i++; ?>
                                            @empty
                                                No Categories.
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
@endsection