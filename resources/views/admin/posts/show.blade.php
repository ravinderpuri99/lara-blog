@extends('admin._layouts.master')
@section('title')
    {{ $post->title }}
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
                        <li class="active">{{ $post->title }}</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-sm-10 col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <h2>{{ $post->title }}</h2>
                            <small class="post-date">Posted on: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('j M Y , g:i a') }}</small> in <strong>{{ $post->name }}</strong>
                            <hr>
                            <img class="single-post-thumb" src='{{ asset("images/posts/$post->image") }}'>
                            <br/>
                            <span style="font-size: 15px; font-weight: bold;">Post Status: </span> 
                            @if($post->live == 1)
                                <span class="post-status-success"><strong>Active</strong></span>
                            @else
                                <span class="post-status-danger"><strong>Deactive</strong></span>
                            @endif
                            <br/><br/>
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- End row-->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
