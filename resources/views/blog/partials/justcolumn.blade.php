<?php
use App\Post;
use App\PostCategory;
use App\ImageOfPost;
$categories = PostCategory::all();
?>

@if(count($categories)>1)
<div class="section technology-news visible-lg">
	<h1 class="section-title">{{$categories[1]->name}}</h1>
	<div class="cat-menu">
		<a href="/blog?category={{$categories[0]->id}}">Нийт мэдээ</a>
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<?php
			$post = Post::where('post_category','=',$categories[0]->id)->first();
			if($post){
				$originalDate = $post->created_at;
				$created_at = date("Y-m-d", strtotime($originalDate));
				$category = PostCategory::find($post->post_category);
				$images = ImageOfPost::where('post_id','=',$post->id)->get();
			}
			$r_posts = Post::orderByRaw("RAND()")->take(2)->get();
			?>
			@if($post)
			<div class="post medium-post-1">
				<div class="entry-header">
					@if(count($images)>0)
					<div class="entry-thumbnail" style="background:url({{$images[0]->path}})"></div>
					@else
					<div class="entry-thumbnail" style="background:url('/main/images/noimage.png')"></div>
					@endif
				</div>
				<div class="post-content">
					<div class="entry-meta">
						<ul class="list-inline">
							<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> {{$created_at}}</a></li>
						</ul>
					</div>
					<h2 class="entry-title">
						<a href="/blog/{{$post->slug}}" title="{{$post->title}}">{{$post->title}}</a>
					</h2>
				</div>
			</div>
			@endif
		</div>
		<div class="col-md-4 col-sm-12">
			@foreach($r_posts as $post)
			<?php
			$title = mb_substr($post->title,0, 40) . " ...";
			$images = ImageOfPost::where('post_id','=',$post->id)->get();
			$originalDate = $post->created_at;
			$created_at = date("Y-m-d", strtotime($originalDate));
			?>
			<div class="post small-post">
				<div class="entry-header">
					@if(count($images)>0)
					<div class="entry-thumbnail" style="background:url({{$images[0]->path}})"></div>
					@else
					<div class="entry-thumbnail" style="background:url('/main/images/noimage.png')"></div>
					@endif
				</div>
				<div class="post-content">
					<div class="entry-meta">
						<ul class="list-inline">
							<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> {{$created_at}}</a></li>
						</ul>
					</div>
					<h2 class="entry-title">
						<a href="/blog/{{$post->slug}}" title="{{$post->title}}">{{$title}}</a>
					</h2>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endif
