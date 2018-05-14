<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	    @include('frontend.layouts.head')
	</head>
	<body>

		<!-- navbar section -->
	    @include('frontend.layouts.header')
	    
	    <div class="container">       
	       
			@yield('content')
	    
	    </div>

	        @include('frontend.layouts.footer')

	    <!-- Bootstrap core JavaScript -->
	    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	    <script src="{{ asset('edvendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	</body>
</html>

