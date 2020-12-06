@extends('admin.base')
@section('content')
<style>
	.selectize-control.multi .selectize-input > div {
		display: inline;
		background: #2B579A !important;
		color:#fff !important;
	}
</style>
<?php
use App\PostCategory;
$categories = PostCategory::all();
?>
<h3 class="heading-text">Шинэ пост оруулах хэсэг</h3>
<div class="row">
	<div class="col-md-6">
		<form method="post" action="/dashboard/post" role="form"  enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<div class="form-group">
				@include('admin.partials.errors')
			</div>
			<div class="form-group">
				<label for="title">Гарчиг</label>
				<input type="text" name="title" id="title" class="form-control" placeholder="Гарчиг оруулна уу...">
			</div>
			<div class="form-group">
				<label for="post_category">Ангилал</label>
				@if( count($categories) == 0 )
				<p>
					<a href="/dashboard/category/create" class="btn btn-custom btn-sm">
						<i class="fa fa-plus"></i> Шинэ ангилал нэмэх
					</a>
				</p>
				@else
				<select name="post_category" id="post_category" class="form-control">
					@foreach($categories as $cat)
					<option value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach
				</select>
				@endif
			</div>
			<div class="form-group">
				<label for="little_content">Хураангуй</label>
				<textarea name="little_content" id="little_content" class="form-control" style="height:150px;"></textarea>
			</div>
			<div class="form-group">
				<label for="content">Дэлгэрэнгүй</label>
				<textarea name="content" id="content" class="form-control" style="height:300px;"></textarea>
			</div>
			<div class="form-group">
				<label for="tags">Tags</label>
				<input type="text" name="tags" id="tags">
			</div>
			<div class="form-group">
				<label for="fileUpload">Зураг оруулах</label>
				<a class="choose_file">
					<i class="fa fa-plus"></i> сонгох ...
					<input name="images[]" type="file" multiple="multiple" id="fileUpload"/>
				</a>
				<div class="col-lg-12">
					<div id="image-holder" class="masonry"></div>
				</div>
			</div>
			<div class="form-group text-center">
				<button class="btn btn-lg btn-custom btn-ok" type="submit">Постлох</button>
				<a href="/dashboard/post" class="btn btn-lg btn-custom btn-cancel">Буцах</a>
			</div>
		</form>
	</div>
</div>
@stop

@section('javascript')
<link rel="stylesheet" href="/xyz/vendor/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/xyz/vendor/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

<script type="text/javascript" src="/ck/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ck/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
	CKEDITOR.replace("content",
	{
		language : 'mn',
		height: '400px',
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

<style>
	.choose_file{
		position:relative;
		display:block;    
		border-radius:8px;
		border:#000 solid 1px;
		width:150px;
		height: 25px; 
		padding: 4px 6px 4px 8px;
		font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
		color: #000;
		margin-top: 2px;
		background:white;
		cursor: pointer;
		font-weight: bolder;
	}

	.choose_file:hover{
		cursor: pointer;
		background: rgba(255,255,255,0.7);
	}

	.choose_file:hover .choose_file input[type="file"]{
		cursor: pointer;
	}
	.choose_file input[type="file"]{
		-webkit-appearance:none; 
		position:absolute;
		top:0; left:0;
		opacity:0; 
	}

	#image-holder {
		padding:25px 5px;
	}
</style>

<script>
	$("#fileUpload").on('change', function () {

		var countFiles = $(this)[0].files.length;

		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
		var image_holder = $("#image-holder");
		image_holder.empty();

		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			if (typeof (FileReader) != "undefined") {
				for (var i = 0; i < countFiles; i++) {
					var reader = new FileReader();
					reader.onload = function (e) {
						var string = "<div class='item'>" +"<a  class='fancybox' href="+e.target.result +" rel='group'><img src=" +e.target.result +"></a></div>";
						image_holder.append(string);
					}
					image_holder.show();
					reader.readAsDataURL($(this)[0].files[i]);
				}
			} else {
				alert("This browser does not support FileReader.");
			}
		} else {
			alert("Pls select only images");
		}
	});
</script>

<link href="/assets/selectize/css/selectize.css" rel="stylesheet">
<link href="/assets/selectize/css/selectize.bootstrap3.css" rel="stylesheet">
<script src="/assets/selectize/selectize.min.js"></script>
<script>
	$( document ).ready(function() {
		$('#tags').selectize({
			delimiter: ',',
			persist: false,
			valueField: 'tag',
			labelField: 'tag',
			searchField: 'tag',
			options: tags,
			create: function(input) {
				return {
					tag: input
				}
			}
		});
	});

	var tags = [
	@foreach ($tags as $tag)
	{tag: "{{$tag}}" },
	@endforeach
	];
</script>
@stop