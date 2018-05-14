@extends('frontend.layouts.master')
@section('title') 
{{ $post->title }}
@endsection
@section('content')

    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4">{{ $post->title }}</h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#">{{ $post->name }}</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('j M Y, g:i a') }}</p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src='{{ asset("images/posts/{$post->image}") }}' alt="">

      <hr>

      <!-- Post Content -->
      <p class="lead">{{ $post->content }}</p>

      <hr>

      <!-- Comments Form -->
      <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <form method="post" action="{{ url('comments/create') }}">

            {{ csrf_field() }}

            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="slug" value="{{ $post->slug }}">  
            
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

        @forelse($comments as $comment)
        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{ $comment->name }}</h5>
                  
            {{ $comment->comment }}
          </div>
        </div>
        @empty
        <p>No Comments to display</p>
        @endforelse

      <!-- Comment with nested comments -->
      <!--  <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

          <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>
        </div>
      </div> -->

        </div>

        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach($categories as $category)
                  <li>
                    <a href="#">{{ $category->name }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
            </div>
        </div>
    </div>
@endsection