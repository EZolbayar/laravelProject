@if (count($errors) > 0)
<div class="alert alert-danger">
	<strong>Алдаа гарлаа!</strong><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif