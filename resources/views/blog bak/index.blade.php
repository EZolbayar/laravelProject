@extends('blog.base')

@section('meta')
<title>Эхлэл хуудас - {{config('blog.title')}}</title>
<?php
use App\ImageOfPost;
$post = null;
if(count($posts)){
	$post = $posts[0];
}
$image = '/main/images/noimage.png';
if($post){
	$img = ImageOfPost::where('post_id','=',$post->id)->first();
	if($img){
		$image = $img->path;
	}
}
?>
<meta property="og:title" content="Эхлэл хуудас - {{config('blog.title')}}" />
<meta property="og:image" content="{{config('blog.url')}}{{$image}}" />
<meta property="og:description" content="" />
@stop

@section('content')
<div class="section">
	<div class="row">
		@include('blog.partials.slider')
	</div>
</div>

@include('blog.partials.latestnews')

<div class="section">
	<div class="row">
		<div class="col-md-9 col-sm-8">
			<div id="site-content">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="left-content">
							@include('blog.partials.justcol')
							@include('blog.partials.justcolumn')
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-4">
			<div id="sitebar">
				@include('blog.partials.follow')

				@include('blog.partials.3slider')

			</div>
		</div>
	</div>				
</div>
@stop

@section('javascript')
<script type="text/javascript" src="/main/js/main.js"></script>
@stop