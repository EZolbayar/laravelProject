@extends('blog.base')

@section('meta')
<title>Зар сурталчилгаа байршуулах - {{config('blog.title')}}</title>
<meta property="og:title" content="Зар сурталчилгаа байршуулах - {{config('blog.title')}}" />
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
				<h1 class="section-title">Зар сурталчилгаа байршуулах</h1>	
			</div>
		</div>
	</div>
	<?php
	use App\AdsInfo;
	$data = AdsInfo::first();
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