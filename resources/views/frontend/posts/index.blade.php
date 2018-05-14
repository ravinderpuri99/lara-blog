@extends('frontend.layouts.master')
@section('title') 
Home
@endsection
@section('content')
	

	<div class="row">
		<!-- Blog Entries Column -->
	    <div class="col-md-8">

	        <h1 class="my-4">Laravel Blog</h1>

	        <!-- Blog Post -->
	        @forelse($posts as $post)
		        <div class="card mb-4">
		            <img class="card-img-top" src='{{ asset("images/posts/$post->image") }}' alt="Card image cap">
		            <div class="card-body">
		              	<h2 class="card-title">{{ $post->title }}</h2>
		              	<p class="card-text">{{ $post->content }}</p>
		              	<a href='{{ url("posts/show/{$post->slug}") }}' class="btn btn-primary">Read More &rarr;</a>
		            </div>
		            <div class="card-footer text-muted">
		              	Posted on  {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('j M Y , g:i a') }} by
		              	<a href="#">{{ $post->name }}</a>
		            </div>
		        </div>
		    @empty
		    	No posts available

		    @endforelse

	        {{ $posts->links() }}

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