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

	h3 {
		margin-left: 15px;
	}
</style>

<div class="row">
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
<?php
use App\AdsInfo;
$about = AdsInfo::first();
$data = null;
if($about){
	$data = $about->data;
}
?>
<div class="row">
	<h3 class="heading-text">Зар сурталчилгаа хэсэг</h3>
	<div class="col-md-8">
		<form method="post" action="/dashboard/page/ads" role="form"  enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<div class="form-group">
				@include('admin.partials.errors')
			</div>
			<div class="form-group">
				<label for="content">Дэлгэрэнгүй</label>
				<textarea name="content" id="content" class="form-control" style="height:500px;">{!!$data!!}</textarea>
			</div>
			<div class="form-group text-center">
				<button class="btn btn-lg btn-custom btn-ok" type="submit">Засах</button>
				<a href="/dashboard/page" class="btn btn-lg btn-custom btn-cancel">Буцах</a>
			</div>
		</form>
	</div>
</div>
@stop

@section('javascript')


<script type="text/javascript" src="/ck/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ck/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
	CKEDITOR.replace("content",
	{
		language : 'mn',
		height: '500px',
		extraPlugins: 'codesnippet',
		codeSnippet_theme: 'monokai_sublime',
		filebrowserBrowseUrl: '/ck/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl: '/ck/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl: '/ck/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl: '/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl: '/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl: '/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

	});

</script>



@stop