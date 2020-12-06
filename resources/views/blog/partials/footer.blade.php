<?php
use App\Post;
use App\PostCategory;
use App\MyTag;

use App\ContactInfo;
use App\Tag;

$tags = Tag::all()->take(20);
$cats = PostCategory::all();
$contact = ContactInfo::first();
?>
<style>
	footer h2.logo {
		font-weight: bolder;
		color:#FFF !important;
	}

	footer h2.logo span {
		color:#FFF;
	}
</style>
<footer id="footer">
	<div class="footer-menu">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="/">ЭХЛЭЛ</a></li>
				<li><a href="/about">БИДНИЙ ТУХАЙ</a></li>
				<li><a href="/terms">ҮЙЛЧИЛГЭЭНИЙ НӨХЦӨЛ</a></li>
				<li><a href="/ads">ЗАР СУРТАЛЧИЛГАА</a></li>
				<li><a href="/contact">ХОЛБОО БАРИХ</a></li>
			</ul>
		</div>
	</div>
	<div class="bottom-widgets">
		<div class="container">
			<div class="col-sm-4">
				<div class="widget">
					<!-- <h2 class="logo">
						Эдийнзасаг.<span>МН</span>
					</h2> -->
					<h2>Холбоо барих</h2>
					@if($contact)
					<ul>
						<li>
							<a><i class="fa fa-home"></i> {{$contact->location}}</a>
						</li>
						<li>
							<a><i class="fa fa-fax"></i> 8668-1030</a>
						</li>
						<li>
							<a href="mailto:"><i class="fa fa-envelope-o"></i> 8668-1030</a>
						</li>
					</ul>
					@else
					<ul>
						<li>
							<a>Монгол улс. Улаанбаатар хот</a>
						</li>
						<li>
							<a>(976) 9999-9999, (976) 8888-8888</a>
						</li>
						<li>
							<a href="mailto:">info@sodon.xyz</a>
						</li>
					</ul>
					@endif
				</div>
			</div>
			<div class="col-sm-4">
				<div class="widget">
					<h2>Мэдээний ангилал</h2>
					<ul>
						@foreach($cats as $cat)
						<li><a href="/blog?category={{$cat->id}}">{{$cat->name}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="widget">
					<h2>Tag</h2>
					<ul class="list-inline tag-cloud">
						@foreach($tags as $tag)
						<li><a href="/blog?tag={{$tag->slug}}">#{{$tag->name}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container text-center">
			<p><a href="">{{config('blog.title')}} </a>&copy; 2020 developed by <a href="https://www.facebook.com/zolbayr.bayraa.9?ref=bookmarks" target="_blank">app</a></p>
		</div>
	</div>
</footer>
