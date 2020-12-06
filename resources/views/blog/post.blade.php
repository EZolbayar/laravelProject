<?php

use App\PostCategory;
use App\ImageOfPost;
use App\Post;

$originalDate = $post->created_at;
$created_at = date("Y-m-d", strtotime($originalDate));
$category = PostCategory::find($post->post_category);
$images = ImageOfPost::where('post_id','=',$post->id)->get();

?>

@extends('blog.base')

@section('meta')
<title>{{$post->title}} - {{config('blog.title')}}</title>
<?php
$image = '/main/images/noimage.png';
$img = ImageOfPost::where('post_id','=',$post->id)->first();
if($img){
	$image = $img->path;
}

$link = config('blog.url').'/blog/'.$post->slug;

?>
<meta property="og:title" content="{{$post->title}} - {{config('blog.title')}}" />
<meta property="og:image" content="{{config('blog.url')}}{{$image}}" />
<meta property="og:description" content="" />
<style>
	.twitter-share-button {
		margin-top: 15px;
	}
</style>
@stop

@section('content')
<div class="section">
	<div class="row">
		<div class="col-sm-9">
			<div id="site-content" class="site-content">
				<div class="row">
					<div class="col-sm-12">
						<div class="left-content">
							<div class="details-news">											
								<div class="post">
									<div class="entry-header">
										@if(count($images)>0)
										<div class="entry-thumbnail">
											<img class="img-responsive" src="{{$images[0]->path}}" alt="" style="margin:auto" />
										</div>
										@else
										<div class="entry-thumbnail">
											<img class="img-responsive" src="/main/images/noimage.png" alt="" />
										</div>
										@endif
										<div class="catagory world"><a href="/blog?category={{$category->id}}">{{$category->name}}</a></div>
									</div>
									<div class="post-content">								
										<div class="entry-meta">
											<ul class="list-inline">
												<li class="posted-by"><i class="fa fa-user"></i> <a href="#">Zolbayar</a></li>
												<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> {{$created_at}} </a></li>
											</ul>
											<ul class="list-inline share-link">
												<li><a href="#" id="shareBtn"><img src="/main/images/others/s1.png" alt="" /></a></li>
												<li><a class="twitter-share-button" href="{{$link}}"><img src="/main/images/others/s2.png" alt="" /></a></li>
												<li><a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-custom="true" style="cursor:pointer"><img src="/main/images/others/s3.png" alt="" /></a></li>
												<li><a href="#" class="g-plus" data-action="share"><img src="/main/images/others/s4.png" alt="" /></a></li>
											</ul>
										</div>
										<h2 class="entry-title">
											{{$post->title}}
										</h2>
										<div class="entry-content">
											<div class="ck-data">
												{!! $post->content !!}
											</div>

											<ul class="list-inline share-link">
												<li><a href="#" id="shareBtn1"><img src="/main/images/others/s1.png" alt="" /></a></li>
												<li><a class="twitter-share-button" href="{{$link}}"><img src="/main/images/others/s2.png" alt="" /></a></li>
												<li><a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-custom="true" style="cursor:pointer"><img src="/main/images/others/s3.png" alt="" /></a></li>
												<li><a href="#" class="g-plus" data-action="share"><img src="/main/images/others/s4.png" alt="" /></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<?php
					use App\Ads;
					$ads = Ads::where('type','=',4)->orderByRaw("RAND()")->take(1)->get();
					?>
					
					@if(count($ads)>0)
					<div class="section add inner-add" style="background: url({{$ads[0]->image}}); height: 150px; background-position: center; margin: 0;">
						<a href="{{$ads[0]->link}}" target="_blank">
							<div class="shadow"></div>
						</a>
					</div>
					@else
					<div class="section add inner-add" style="background: url('http://www.placehold.it/2000x250/333333/ffffff/?text=longads'); height: 150px; background-position: center; margin: 0;">
						<a href="">
							<div class="shadow"></div>
						</a>
					</div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">								
					@include('blog.partials.featured_post')
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div id="sitebar">
				@include('blog.partials.tags')

				<!--@include('blog.partials.ads1')-->

				@include('blog.partials.follow')

				@include('blog.partials.3slider')
			</div>
		</div>
	</div>				
</div>
@stop
@section('javascript')
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
<script>window.twttr = (function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0],
	t = window.twttr || {};
	if (d.getElementById(id)) return t;
	js = d.createElement(s);
	js.id = id;
	js.src = "https://platform.twitter.com/widgets.js";
	fjs.parentNode.insertBefore(js, fjs);

	t._e = [];
	t.ready = function(f) {
		t._e.push(f);
	};
	return t;
}(document, "script", "twitter-wjs"));
</script>

<div id="fb-root"></div>
<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=244904602554594";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script>
	var slug = "<?php echo $post->slug; ?>";
	var url = "<?php echo config('blog.url').'/blog/' ?>";
	var link = url+slug;
	document.getElementById('shareBtn').onclick = function() {
		FB.ui({
			method: 'share',
			display: 'popup',
			href: link,
		}, function(response){});
	}
	document.getElementById('shareBtn1').onclick = function() {
		FB.ui({
			method: 'share',
			display: 'popup',
			href: link,
		}, function(response){});
	}
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="/main/js/main.js"></script>
@stop