<?php

use App\PostCategory;
use App\ImageOfPost;
use App\Post;
?>

@extends('blog.base')

@section('meta')
<title>{{$title}} - {{config('blog.title')}}</title>
<?php
$post = $posts[0];
$image = '/main/images/noimage.png';
if($post){
	$img = ImageOfPost::where('post_id','=',$post->id)->first();
	if($img){
		$image = $img->path;
	}
}
?>
<meta property="og:title" content="{{$title}} - {{config('blog.title')}}" />
<meta property="og:image" content="{{config('blog.url')}}{{$image}}" />
<meta property="og:description" content="" />
@stop

@section('content')
<div class="section" style="margin-bottom:100px;">
	<div class="row">
		<div class="col-md-12">
			<div class="page-breadcrumbs" style="margin-top:25px">
				<h1 class="section-title">{{$title}}</h1>	
			</div>
		</div>
	</div>
	<div class="row">
		@if(count($posts) < 1)
		<div class="text-center" style="margin-bottom:280px;">
			<span style="color:red">Энэ хуудсанд пост бүртгэгдээгүй байна.</span>
		</div>
		@endif
		@foreach($posts as $post)
		<?php
		$originalDate = $post->created_at;
		$created_at = date("Y-m-d", strtotime($originalDate));
		$category = PostCategory::find($post->post_category);
		$images = ImageOfPost::where('post_id','=',$post->id)->get();
		$title = mb_substr($post->title,0, 25) . " ...";
		?>
		<div class="col-sm-4">
			<div class="post medium-post">
				<div class="entry-header">
					@if(count($images)>0)
					<div class="entry-thumbnail" style="background:url({{$images[0]->path}})"></div>
					@else
					<div class="entry-thumbnail" style="background:url('/main/images/noimage.png')"></div>
					@endif
					<div class="catagory world"><a href="/blog?category={{$category->id}}">{{$category->name}}</a></div>
				</div>
				<div class="post-content">								
					<div class="entry-meta">
						<ul class="list-inline">
							<li class="publish-date"><i class="fa fa-clock-o"></i><a href="#"> {{$created_at}} </a></li>
						</ul>
					</div>
					<h2 class="entry-title">
						<a href="/blog/{{$post->slug}}" title="{{$post->title}}">{{$title}}</a>
					</h2>
				</div>
			</div>
		</div>
		@endforeach
	</div>		
	<div class="text-center">
		{{$posts->links()}}
	</div>		
</div>
@stop

@section('javascript')
<script type="text/javascript" src="/main/js/main.js"></script>
@stop