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

<div class="container">
	<div class="col-md-12">
		@include('admin.partials.success')
	</div>
</div>

<div class="row">
	<br>
	<div class="col-md-12">
		<span class="tag">
			<a href="/dashboard/page/about">Бидний тухай</a>
		</span>
		<span class="tag">
			<a href="/dashboard/page/terms">Үйлчилгээний нөхцөл</a>
		</span>
		<span class="tag">
			<a href="/dashboard/page/ads">Зар сурталчилгаа</a>
		</span>
		<span class="tag">
			<a href="/dashboard/page/contact">Холбоо барих</a>
		</span>
	</div>
</div>


@stop

@section('javascript')
@stop
