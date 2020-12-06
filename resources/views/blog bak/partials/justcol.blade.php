<?php
use App\Post;
use App\PostCategory;
use App\ImageOfPost;
$categories = PostCategory::all();
?>

@if(count($categories)>0)
<div class="section world-news">
	<div class="row">
		<div class="col-md-8 col-sm-6">
			<h1 class="section-title title">{{$categories[0]->name}}</h1>	
			<div class="world-nav cat-menu">         
				<ul class="list-inline">                       
					<li><a href="/blog?category={{$categories[0]->id}}">Нийт мэдээ</a></li>
				</ul> 					
			</div>
			<?php
			$post = Post::where('post_category','=',$categories[0]->id)->first();
			if($post){
				$originalDate = $post->created_at;
				$created_at = date("Y-m-d", strtotime($originalDate));
				$category = PostCategory::find($post->post_category);
				$images = ImageOfPost::where('post_id','=',$post->id)->get();
			}
			$r_posts = Post::orderByRaw("RAND()")->take(3)->get();
			?>

			@if($post)
			<div class="post large-post">
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
				<div class="list-post">
					<ul>
						@foreach($r_posts as $post)
						<?php
						$title = mb_substr($post->title,0, 40) . " ...";
						?>
						<li><a href="/blog/{{$post->slug}}">{{$title}} <i class="fa fa-angle-right"></i></a></li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif

		</div>
		<div class="col-md-4 col-sm-6">
			<div class="middle-content">
				@include('blog.partials.exchange')
				@include('blog.partials.ads1')
			</div>
		</div>
	</div>
</div>
@endif