@extends('admin._layouts.master')
@section('title')
    Create Category
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
                        <li><a href="{{ url('admin/categories') }}">Categories</a></li>
                        <li class="active">Create Category</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-sm-10 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Create Category</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ url('admin/categories/insert') }}">

                                {{ csrf_field() }}

                                @if(count($errors) > 0)
                                    @foreach($errors()->all as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>

                                    @endforeach
                                @endif
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="live" class="control-label col-md-2">Live</label>
                                    <div class="col-md-10">
                                            <input id="live" type="checkbox" name="live" style="width: 16px" class="checkbox form-control">
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
