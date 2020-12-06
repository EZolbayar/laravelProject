<html>
<head>
	<title>Dashboard :: {{config('blog.title')}}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/assets/css/admin.css" rel="stylesheet">
	<link rel="stylesheet" href="/xyz/css/style.css">
	<style>
		.btn {
			border-radius: 0;
		}
		.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
			vertical-align: middle;
		}
	</style>
	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
	<div class="main">
		<div class="topmenu">
			<ul>
				<li>
					<a href="/" style="color:green;text-transform:initial;border-left:2px solid;padding:5px 15px;text-decoration:none !important;border-bottom:0 !important;" target="_blank">Сайт руу очих</a>
				</li>
				<li class="{{ Active::pattern('dashboard/ads*') }}">
					<a href="/dashboard/ads">Ads</a>
				</li>
				<li class="{{ Active::pattern('dashboard/tag*') }}">
					<a href="/dashboard/tag">#tags</a>
				</li>
				@if(Auth::User()->user_type == 0)
				<li class="{{ Active::pattern('dashboard/category*') }}">
					<a href="/dashboard/category">Мэдээний ангилал</a>
				</li>
				@endif
				<li class="{{ Active::pattern('dashboard/post*') }}">
					<a href="/dashboard/post">Нийт мэдээ</a>
				</li>
				@if(Auth::User()->user_type == 0)
				<li class="{{ Active::pattern('dashboard/page*') }}">
					<a href="/dashboard/page">Статик хуудсуудыг засах</a>
				</li>
				<li class="{{ Active::pattern('dashboard/user*') }}">
					<a href="/dashboard/user"><i class="fa fa-user"></i> Админууд</a>
				</li>
				@endif
				<li class="pull-right">
					<a href="/auth/logout" style="color:blue"><i class="fa fa-sign-out"></i> гарах</a>
				</li>
			</ul>
		</div>
		<div class="content">
			@yield('content')
		</div>
	</div>
	<script src="/assets/js/admin.js"></script>
	@yield('javascript')
</body>
</html>