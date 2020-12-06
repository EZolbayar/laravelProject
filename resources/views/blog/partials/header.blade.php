<?php
use App\PostCategory;
$cats = PostCategory::all()->take(8);
date_default_timezone_set('Asia/Ulaanbaatar');
$today = date("Y")." оны ".date("m")."-р сарын ".date("d")."&nbsp;&nbsp;".date("H").":".date("i");
?>
<style>
	img.logo {
		max-width: 250px;
		margin-top: -25px;
		margin-left: -20px;
	}
	.container-fluid ul.navbar-nav li:first-child {
		margin-left: 130px;
	}
	#date-time1 {
		color: #525b6e;
		font-size: 14px;
		line-height: 35px;
	}
	.no-border {
		border-bottom: 0 !important;
	}
	#proposal {
		color: #525b6e;
		font-size: 17px;
		line-height: 35px;
		text-transform: uppercase;
		text-align: center;
	}
	#social {
		text-align: right;
		line-height: 35px;
	}
	#social a {
		font-size: 17px;
		margin-left: 5px;
	}
	#social a.twitter {
		color:#1da1f2;
	}
	#social a.facebook {
		color: #365899;
	}
	#social a.youtube {
		color:red;
	}
	#social a.pinterest {
		color:#820a0f;
	}
	#social a:hover {
		color:#333 !important;
	}
	#menu {
		background: #039;
	}

	.navbar-nav li a{
		color:#fff;
	}

	.navbar-nav li:hover a{
		background:#fff;
	}

	.sticky-nav .topbar, .sticky-nav .topbar1 {
		display: none !important;
	}

	.sticky-nav #menu{
		background: #fff;
	}

	.sticky-nav .navbar-nav li a{
		color:#333;
	}
	.searchNlogin {
		margin-right: 0;
	}

	.search-form {
		padding: 5px;
		color:#333;
		background: #fff;
		height: 50px;
		font-size: 15px;
		font-weight: 300;
		outline: none;
		width: 100%;
		border: 1px solid #eee;
		background-color: #f2f3f5;
		border-right: 0;
		margin-right: 15px;
	}
}

</style>
<header id="navigation">
	<div class="navbar" role="banner">
		<div class="container">
			<a class="secondary-logo" href="/">
				{{-- <img class="main-logo img-responsive logo second" src="/main/images/logo.png" alt="logo"> --}}
				<h3 class="text-logo">SODON | <span>News</span></h3>
			</a>
		</div>
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-3" id="date-time1"><i class="fa fa-calendar"></i>&nbsp;{{$today}}</div>
					<div class="col-md-6" id="proposal"></div>
					<div class="col-md-3" id="social">
						<a href="http://www.facebook.com/oxbiuser" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
						<a href="http://www.twitter.com/oxb0626" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
						<a href="" class="youtube"><i class="fa fa-youtube"></i></a>
						<a href="" class="pinterest"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="topbar1 no-border">
			<div class="container">
				<div id="topbar" class="navbar-header">
					<a class="navbar-brand" href="/">
						{{-- <img class="main-logo img-responsive logo" src="/main/images/logo.png" alt="logo"> --}}
						<h3 class="text-logo">SODON | <span>News</span></h3>
					</a>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			</div>
		</div>
		<div id="menu">
			<div id="menubar" class="container">
				<nav id="mainmenu" class="navbar-left collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="home">
							<a href="/">Эхлэл</a>
						</li>
						@foreach($cats as $cat)
						<li class="home">
							<a href="/blog?category={{$cat->id}}">{{$cat->name}}</a>
						</li>
						@endforeach
						<li class="home">
							<a href="/exchange">Вальютын ханш</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>
<div class="container">
	<!--@include('blog.partials.longads')-->
</div>
