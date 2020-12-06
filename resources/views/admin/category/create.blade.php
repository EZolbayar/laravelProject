@extends('admin.base')
@section('content')
<h3 class="heading-text">Шинэ ангилал оруулах хэсэг</h3>
<div class="row">
	<div class="col-md-6">
		<form method="post" action="/dashboard/category" role="form"  enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<div class="form-group">
				@include('admin.partials.errors')
			</div>
			<div class="form-group">
				<label for="name">Нэр</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Нэр оруулна уу...">
			</div>
			<div class="form-group text-center">
				<button class="btn btn-lg btn-custom btn-ok" type="submit">Постлох</button>
				<a href="/dashboard/category" class="btn btn-lg btn-custom btn-cancel">Буцах</a>
			</div>
		</form>
	</div>
</div>
@stop

@section('javascript')

@stop