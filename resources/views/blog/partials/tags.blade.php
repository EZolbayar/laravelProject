<?php
use App\Post;
use App\MyTag;
$tags = MyTag::where('taggable_id','=',$post->id)->where('taggable_type','=','App\Post')->get();
?>


<div class="widget follow-us" style="margin-top:25px;">
	<h1 class="section-title title">#Hashtag</h1>
	<ul class="list-inline tag-cloud">
		@foreach($tags as $tag)
		<li><a href="/blog?tag={{$tag->tag_slug}}">#{{$tag->tag_name}}</a></li>
		@endforeach
	</ul>
</div>