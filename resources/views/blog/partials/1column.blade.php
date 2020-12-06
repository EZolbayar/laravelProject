<?php
use App\Post;
use App\PostCategory;
use App\ImageOfPost;
$categories = PostCategory::all();
?>

@if(count($categories)>0)
<div class="section sports-section">
	<h1 class="section-title title">{{$categories[0]->name}}</h1>	
	<div class="cat-menu">         
		<a href="/blog?category={{$categories[0]->id}}">Нийт мэдээ</a>					
	</div>
	<?php
	$r_posts = Post::orderByRaw("RAND()")->take(2)->get();
	?>
	@foreach($r_posts as $post)
	<?php
	$originalDate = $post->created_at;
	$created_at = date("Y-m-d", strtotime($originalDate));
	$category = PostCategory::find($post->post_category);
	$images = ImageOfPost::where('post_id','=',$post->id)->get();
	$title = mb_substr($post->title,0, 40) . " ...";
	?>
	<div class="post medium-post">
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
				<a href="/blog/{{$post->slug}}">{{$title}}</a>
			</h2>
		</div>
	</div>
	@endforeach
</div>
@endif