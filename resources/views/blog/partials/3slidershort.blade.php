<?php
use App\Post;
use App\PostCategory;
use App\MyTag;
use App\Tag;
$tags = Tag::all();
$r_posts = Post::orderByRaw("RAND()")->take(2)->get();
?>

<div class="widget meta-widget">
	<h1 class="section-title title">#RANDOM</h1>
	<div class="meta-tab">
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="new">
				<ul class="comment-list">
					@foreach($r_posts as $post)
					<?php
					$originalDate = $post->created_at;
					$created_at = date("Y-m-d", strtotime($originalDate));
					$category = PostCategory::find($post->post_category);
					$title = mb_substr($post->title,0, 40) . " ...";
					?>
					<li>
						<div class="post small-post">
							<div class="post-content">	
								<div class="entry-meta">
									<ul class="list-inline">
										<li class="post-author"><a href="#">Zolbayar,</a></li>
										<li class="publish-date"><a href="#">{{$created_at}}</a></li>
									</ul>
								</div>
								<h2 class="entry-title">
									<a href="/blog/{{$post->slug}}"  title="{{$post->title}}">{{$title}}</a>
								</h2>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>