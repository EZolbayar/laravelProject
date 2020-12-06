<?php
use App\Post;
?>
@extends('admin.base')
@section('content')
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


</style>
<div class="row">
	<div class="col-md-12">
		<br>
		@if( count($cats) == 0 )
		Ямар нэгэн ангилал олдсонгүй ... 		
		@endif
		<a href="/dashboard/category/create" class="btn btn-custom btn-sm">
			<i class="fa fa-plus"></i> Шинэ ангилал оруулах
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
		@if(count($cats) > 0)
		<table id="table" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:50px;">#</th>
					<th>Нэр</th>
					<th style="width:200px;"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cats as $category)
				
				<?php
					$posts = Post::where('post_category','=',$category->id)->get();
					$post_count = count($posts);
				?>
				<div class="modal fade" id="myModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$category->id}}">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="    margin-top: 150px;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel{{$category->id}}" style="color:#000">Пост устгах</h4>
							</div>
							<div class="modal-body">
								<p style="color:#000">
									Энэ постыг устгахыг зөвшөөрч байна уу ?
								</p>
							</div>
							<div class="modal-footer">
								<form action="{{ URL::route('dashboard.category.destroy',$category->id) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="btn btn-danger">Устгах</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>
						<a  href="/blog?cat={{$category->id}}" target="_blank">Нийт мэдээ ({{$post_count}})</a>&nbsp;&nbsp;&nbsp;
						<a href="/dashboard/category/{{$category->id}}/edit" class="btn btn-primary">Засах</a>
						<button type="button" class="btn btn-default delete" data-toggle="modal" data-target="#myModal{{$category->id}}">
							<i class="fa fa-trash-o"></i> Устгах
						</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>


@stop

@section('javascript')
@stop
