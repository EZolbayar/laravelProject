@extends('admin.base')
@section('content')
<style>
	.tag {
		background: #2B579A !important;
		margin: 5px;
		padding: 2px 15px;
		display: inline-block;
	}

	.tag:first-child {
		margin-left:0;
	}

	.tag a {
		color:#fff !important;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<br>
		<a href="/dashboard/post/create" class="btn btn-custom btn-sm">
			<i class="fa fa-plus"></i> Шинэ пост оруулах
		</a>
	</div>
</div>

<div class="container">
	<div class="col-md-12">
		@include('admin.partials.success')
	</div>
</div>

<div class="row">
	<br>
	<div class="col-md-12">
		@foreach($tags as $tag)
		<span class="tag">
			<a href="/blog?tag={{$tag->slug}}">#{{$tag->name}}</a>
		</span>
		@endforeach
		@if(count($tags) == 0)
		<div class="text-center">
			No tags avalaible...
		</div>
		@endif
	</div>
</div>


@stop

@section('javascript')
@stop
