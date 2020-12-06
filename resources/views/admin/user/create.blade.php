@extends('admin.base')
@section('content')
<h3 class="heading-text">Шинэ админ бүртгэх хэсэг</h3>
<div class="row">
	<div class="col-md-6">
		<form method="post" action="/dashboard/user" role="form"  enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<div class="form-group">
				@include('admin.partials.errors')
			</div>
			<div class="form-group">
				<label for="name">Нэр</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Нэр оруулна уу...">
			</div>
			<div class="form-group">
				<label for="email">И-мэйл</label>
				<input type="text" name="email" id="email" class="form-control" placeholder="И-мэйл оруулна уу...">
			</div>
			<div class="form-group">
				<label for="user_type">Хэрэглэгчийн эрх</label>
				<select name="user_type" id="user_type" class="form-control">
					<option value="1">Модератор</option>
					<option value="0">Супер Админ</option>
				</select>
			</div>
			<div class="form-group">
				<label for="password">Нууц үг</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="password_confirmation">Нууц үг баталгаажуулалт</label>
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
			</div>
			<div class="form-group text-center">
				<button class="btn btn-lg btn-custom btn-ok" type="submit">Бүртгэх</button>
				<a href="/dashboard/user" class="btn btn-lg btn-custom btn-cancel">Буцах</a>
			</div>
		</form>
	</div>
</div>
@stop

@section('javascript')

@stop