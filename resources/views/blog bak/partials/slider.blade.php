<?php
use App\PostCategory;
use App\ImageOfPost;
use App\Post;
?>
<div class="site-content col-md-12">
	<div class="row">
		<div class="col-sm-8">
			<div id="home-slider">
				@foreach($random_posts as $post)
				<?php
				$originalDate = $post->created_at;
				$created_at = date("Y-m-d", strtotime($originalDate));
				$category = PostCategory::find($post->post_category);
				$images = ImageOfPost::where('post_id','=',$post->id)->get();
				?>
				<div class="post feature-post">
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
							<a href="/blog/{{$post->slug}}">{{$post->title}}</a>
						</h2>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="col-sm-4">
			<?php
			$latest_post = Post::orderBy('created_at', 'desc')->take(1)->get();
			$latest_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
			?>
			@foreach($latest_post as $post)
			<?php
			$originalDate = $post->created_at;
			$created_at = date("Y-m-d", strtotime($originalDate));
			$category = PostCategory::find($post->post_category);
			$images = ImageOfPost::where('post_id','=',$post->id)->get();
			?>
			<div class="post feature-post">
				@if(count($images)>0)
				<div class="entry-thumbnail" style="background:url({{$images[0]->path}})"></div>
				@else
				<div class="entry-thumbnail" style="background:url('/main/images/noimage.png')"></div>
				@endif
				<div class="entry-header">
					<div class="catagory health"><span><a href="/blog?category={{$category->id}}">{{$category->name}}</a></span></div>
				</div>
				<div class="post-content">								
					<div class="entry-meta">
						<ul class="list-inline">
							<li class="publish-date"><i class="fa fa-clock-o"></i><a href="#"> {{$created_at}} </a></li>
						</ul>
					</div>
					<h2 class="entry-title">
						<a href="/blog/{{$post->slug}}">{{$post->title}}</a>
					</h2>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="row">
		@foreach($latest_posts as $post)
		<?php
		$originalDate = $post->created_at;
		$created_at = date("Y-m-d", strtotime($originalDate));
		$category = PostCategory::find($post->post_category);
		$images = ImageOfPost::where('post_id','=',$post->id)->get();
		?>
		<div class="col-sm-4">
			<div class="post feature-post">
				@if(count($images)>0)
				<div class="entry-thumbnail" style="background:url({{$images[0]->path}})"></div>
				@else
				<div class="entry-thumbnail" style="background:url('/main/images/noimage.png')"></div>
				@endif
				<div class="entry-header">
					<div class="catagory technology"><span><a href="/blog?category={{$category->id}}">{{$category->name}}</a></span></div>
				</div>
				<div class="post-content">								
					<div class="entry-meta">
						<ul class="list-inline">
							<li class="publish-date"><i class="fa fa-clock-o"></i><a href="#"> {{$created_at}} </a></li>
						</ul>
					</div>
					<h2 class="entry-title">
						<a href="/blog/{{$post->slug}}">{{$post->title}}</a>
					</h2>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>