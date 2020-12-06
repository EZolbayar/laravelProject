@extends('blog.base')

@section('meta')
<title>Бидний тухай - {{config('blog.title')}}</title>
<meta property="og:title" content="Бидний тухай - {{config('blog.title')}}" />
<meta property="og:image" content="{{config('blog.url')}}/main/images/noimage.png" />
<meta property="og:description" content="" />
@stop

@section('content')
<style>
	html,body {
		line-height: 2;
	}
	
	p ,li{
		font-weight: 100;
	}
</style>
<div class="section">
	<div class="row">
		<div class="col-md-12">
			<div class="page-breadcrumbs" style="margin-top:25px">
				<h1 class="section-title">Бидний тухай</h1>	
			</div>
		</div>
	</div>
	<?php
	use App\About;
	$data = About::first();
	?>
	<div class="row">
		<div class="col-md-12 ck-data">
			@if($data)
			{!! $data->data !!}
			@endif
		</div>		
	</div>
</div>
@stop
@section('javascript')
<script type="text/javascript" src="/main/js/main.js"></script>
@stop