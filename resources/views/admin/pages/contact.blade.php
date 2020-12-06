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
use App\ContactInfo;
$about = ContactInfo::first();
$data = null;
if($about){
	$data = $about;
}
?>
<div class="row">
	<h3 class="heading-text">Холбоо барих хэсэг</h3>
	<div class="col-md-8">
		<form method="post" action="/dashboard/page/contact" role="form"  enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<div class="form-group">
				@include('admin.partials.errors')
			</div>
			<div class="form-group">
				<label for="location">Хаяг</label>
				<input type="text" name="location" id="location" class="form-control" placeholder="Хаяг оруулна уу..." value="<?php if($data){ echo $data->location; } ?>">
			</div>
			<div class="form-group">
				<label for="phonenumber">Утасны дугаар</label>
				<input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Холбогдох утас оруулна уу..." value="<?php if($data){ echo $data->phonenumber; } ?>">
			</div>
			<div class="form-group">
				<label for="email">И-мэйл</label>
				<input type="text" name="email" id="email" class="form-control" placeholder="И-мэйл оруулна уу..." value="<?php if($data){ echo $data->email; } ?>">
			</div>
			<div class="form-group">
				<label for="content">Дэлгэрэнгүй</label>
				@if($data)
				<textarea name="content" id="content" class="form-control" style="height:500px;"><?php echo htmlentities($data->data); ?></textarea>
				@else
				<textarea name="content" id="content" class="form-control" style="height:500px;"></textarea>
				@endif
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
