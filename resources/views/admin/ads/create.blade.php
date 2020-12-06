@extends('admin.base')
@section('content')
<h3 class="heading-text">Шинэ ангилал оруулах хэсэг</h3>
<div class="row">
	<div class="col-md-6">
		<form method="post" action="/dashboard/ads" role="form"  enctype="multipart/form-data"  enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
			<div class="form-group">
				@include('admin.partials.errors')
			</div>
			<div class="form-group">
				<label for="name">Нэр</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Нэр оруулна уу...">
			</div>
			<div class="form-group">
				<label for="link">Холбоос | link</label>
				<input type="text" name="link" id="link" class="form-control" placeholder="Холбоос оруулна уу...">
			</div>
			<div class="form-group">
				<label for="type">Төрөл</label>
				<select name="type" id="type" class="form-control">
					<option value="0">Энгийн (500x500)</option>
					<option value="1">Урт (2000x250)</option>
					<option value="4">Post after (1000x250)</option>
					<option value="5">Fixed (300x800)</option>
				</select>
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
				<a href="/dashboard/ads" class="btn btn-lg btn-custom btn-cancel">Буцах</a>
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
@stop