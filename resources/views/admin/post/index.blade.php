@extends('admin.base')
@section('content')
<?php
use App\PostCategory;
use App\ImageOfPost;
use App\User;
$cats = PostCategory::all();
?>
<style>
	.custom-label {
		margin-right: 1px;
	}

	.table {
		margin-top: 25px;
	}
	
	.btn {
		padding: 5px 15px !important;
	}

	
	a.delete ,button.delete ,a.delete:hover ,button.delete:hover {
		border:1px solid red;
		background: none;
	}

	.top_post {
		background: #0095FF !important;
		color: #fff;
	}


</style>
<div class="row">
	<div class="col-md-12">
		<br>
		@if( count($posts) == 0 )
		Ямар нэгэн пост олдсонгүй ... 		
		@endif
		<a href="/dashboard/post/create" class="btn btn-custom btn-sm">
			<i class="fa fa-plus"></i> Шинэ пост оруулах
		</a>
	</div>
</div>

<div class="container">
	<div class="col-md-12">
		@include('admin.partials.success')
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		@if(count($posts) > 0)
		<table id="table" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:50px;">#</th>
					<th style="width:200px;">Зураг</th>
					<th>Гарчиг</th>
					<th style="width:200px;">Ангилал</th>
					<th>Нийтэлсэн</th>
					<th style="width:250px;"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)

				@if((Auth::User()->id == $post->user_id) || (Auth::User()->user_type == 0))
				<div class="modal fade" id="myModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$post->id}}">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="    margin-top: 150px;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel{{$post->id}}" style="color:#000">Пост устгах</h4>
							</div>
							<div class="modal-body">
								<p style="color:#000">
									Энэ постыг устгахыг зөвшөөрч байна уу ?
								</p>
							</div>
							<div class="modal-footer">
								<form action="{{ URL::route('dashboard.post.destroy',$post->id) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="btn btn-danger">Устгах</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				@endif

				@if($post->is_top == 0)
				<div class="modal fade" id="myModaltop{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabels{{$post->id}}">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="    margin-top: 150px;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabels{{$post->id}}" style="color:#000">Топ мэдээ нэмэх</h4>
							</div>
							<div class="modal-body">
								<p style="color:#000">
									Энэ постыг топ мэдээнд нэмэхийг зөвшөөрч байна уу ?
								</p>
							</div>
							<div class="modal-footer">
								<a class="btn btn-success" href="/dashboard/post/addtop/{{$post->id}}">Нэмэх</a>
							</div>
						</div>
					</div>
				</div>
				@endif

				@if($post->is_top == 1)
				<div class="modal fade" id="myModaltop{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabels{{$post->id}}">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="    margin-top: 150px;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabels{{$post->id}}" style="color:#000">Топ мэдээ устгах</h4>
							</div>
							<div class="modal-body">
								<p style="color:#000">
									Энэ постыг топ мэдээнээс устгахыг зөвшөөрч байна уу ?
								</p>
							</div>
							<div class="modal-footer">
								<a class="btn btn-danger" href="/dashboard/post/deltop/{{$post->id}}">Устгах</a>
							</div>
						</div>
					</div>
				</div>
				@endif




				<?php
				$image = ImageOfPost::where('post_id','=',$post->id)->first();
				$cat = PostCategory::find($post->post_category);
				$user = User::find($post->user_id);
				?>
				<tr class="<?php if($post->is_top == 1){ echo 'top_post'; } ?>">
					<td>{{ $post->id }}</td>
					<td align="center">
						@if($image)
						<a href="{{$image->path}}" class="fancybox" rel="{{$post->id}}">
							<img src="{{$image->path}}" alt="" style="max-width:150px" class="img-thumbnail">
						</a>
						@endif
					</td>
					<td>{{ $post->title }}</td>
					<td>
						<a  href="/blog?cat={{$cat->id}}" target="_blank">{{$cat->name}}</a>
					</td>
					<td>
						<a href="/blog?user={{$user->id}}" style="color:orange">{{ $user->name }}</a> | {{$post->created_at}}
					</td>
					<td>
						<a  href="/blog/{{$post->slug}}" target="_blank" class="btn btn-lg btn-default">Дэлгэрэнгүй</a>
						@if((Auth::User()->id == $post->user_id) || (Auth::User()->user_type == 0))
						<button type="button" class="btn btn-default delete" data-toggle="modal" data-target="#myModal{{$post->id}}">
							<i class="fa fa-trash-o"></i> Устгах
						</button>
						@endif
						@if($post->is_top == 0)
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaltop{{$post->id}}">
							<i class="fa fa-star-o"></i> Топ мэдээ болгох
						</button>
						@endif
						@if($post->is_top == 1)
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaltop{{$post->id}}">
							<i class="fa fa-star"></i> Топ мэдээнээс хасах
						</button>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
	<div class="col-md-12">
		{{$posts->links()}}
	</div>
</div>


@stop

@section('javascript')

<link rel="stylesheet" href="/xyz/vendor/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/xyz/vendor/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>


@stop
