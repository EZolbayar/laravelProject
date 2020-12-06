<?php
use App\PostCategory;
use App\ImageOfPost;
use App\Post;
?>
<div class="section">				
	<div class="latest-news-wrapper">
		<h1 class="section-title">Сүүлд нэмэгдсэн</h1>	
		<div id="latest-news">
			@foreach($posts as $post)
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
					<div class="catagory politics"><span><a href="/blog?category={{$category->id}}">{{$category->name}}</a></span></div>
				</div>
				<div class="post-content">								
					<div class="entry-meta">
						<ul class="list-inline">
							<li class="publish-date"><a href="/main/#"><i class="fa fa-clock-o"></i> {{$created_at}}</a></li>
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