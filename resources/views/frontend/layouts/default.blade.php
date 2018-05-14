<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Array99">
<title>Front-end Layouts</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
    <header class="row">
        @include('frontend.layouts.header')
    </header>
    <div id="main" class="row">
            @yield('content')
    </div>
    <footer class="row">
        @include('frontend.layouts.footer')
    </footer>
</div>
</body>
</html>