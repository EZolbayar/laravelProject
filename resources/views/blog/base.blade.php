<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

    <!-- <meta property="article:publisher" content="https://www.facebook.com/oxbiuser"/>
    <meta property="article:author" content="https://www.facebook.com/oxb06261"/> -->

	<meta property="og:site_name" content="{{config('blog.title')}}" />
	<meta property="fb:app_id" content="1056214591084500" />
	<meta property="og:url" content="{{config('blog.url')}}" />
	<meta property="og:image:width" content="1085" />
	<meta property="og:image:height" content="550" />

	@yield('meta')

	@include('blog.partials.css')
</head>
<body>
	<div id="main-wrapper" class="homepage">
		@include('blog.partials.header')
		<div class="container">
			@yield('content')
		</div>
	</div>

	<!--@include('blog.partials.ads_fixed')-->

	@include('blog.partials.footer')

	@include('blog.partials.javascript') 

	@yield('javascript')
</body>
</html>
