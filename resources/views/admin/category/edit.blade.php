@extends('admin.base')
@section('content')
<h3 class="heading-text">Ангилал засах хэсэг</h3>
<div class="row">
	<div class="col-md-6">
		{!! Form::model($category, array('route' => array('dashboard.category.update', $category->id), 'method' => 'PUT')) !!}
		<form method="put" action="/dashboard/category/{{ $category->id }}" role="form"  enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<div class="form-group">
				@include('admin.partials.errors')
			</div>
			<div class="formg-group">
				<div class="text-center">
					{{$category->name}}
				</div>
			</div>
			<div class="form-group">
				<label for="name">Нэр</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Нэр оруулна уу..." value="{{$category->name}}">
			</div>
			<div class="form-group text-center">
				<button class="btn btn-lg btn-custom btn-ok" type="submit">Засах</button>
				<a href="/dashboard/category" class="btn btn-lg btn-custom btn-cancel">Буцах</a>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@stop

@section('javascript')

@stop