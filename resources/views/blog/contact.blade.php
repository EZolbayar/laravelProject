@extends('blog.base')

@section('meta')
<title>Холбоо барих - {{config('blog.title')}}</title>
<meta property="og:title" content="Холбоо барих - {{config('blog.title')}}" />
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
				<h1 class="section-title">Холбоо барих</h1>	
			</div>
		</div>
	</div>
	<?php
	use App\ContactInfo;
	$data = ContactInfo::first();
	?>
	<div class="row">
		<div class="col-md-12">
			@if($data)
			<ul>
				<li>
					<i class="fa fa-home"></i> {{$data->location}}
				</li>
				<li>
					<i class="fa fa-fax"></i> {{$data->phonenumber}}
				</li>
				<li>
					<i class="fa fa-envelope-o"></i> {{$data->email}}
				</li>
			</ul>
			<br>
			@endif
		</div>
		<div class="col-md-12 ck-data">
			@if($data)
			{!! $data->data !!}
			@endif
		</div>		
	</div>
</div>
@stop
