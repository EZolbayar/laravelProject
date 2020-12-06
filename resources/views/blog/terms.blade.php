@extends('blog.base')

@section('meta')
<title>Үйлчилгээний нөхцөл - {{config('blog.title')}}</title>
<meta property="og:title" content="Үйлчилгээний нөхцөл - {{config('blog.title')}}" />
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
				<h1 class="section-title">Үйлчилгээний нөхцөл</h1>	
			</div>
		</div>
	</div>
	<?php
	use App\Term;
	$data = Term::first();
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