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
		<a href="/dashboard/user/create" class="btn btn-custom btn-sm">
			<i class="fa fa-plus"></i> Шинэ админ нэмэх
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
		<table id="table" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:50px;">#</th>
					<th>Нэр</th>
					<th>И-мэйл</th>
					<th>Админ эрх</th>
					<th style="width:200px;"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				
				<?php
				$posts = Post::where('user_id','=',$user->id)->get();
				$post_count = count($posts);
				?>
				@if(Auth::User()->id != $user->id)
				<div class="modal fade" id="myModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$user->id}}">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="    margin-top: 150px;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel{{$user->id}}" style="color:#000">Хэрэглэгч устгах устгах</h4>
							</div>
							<div class="modal-body">
								<p style="color:#000">
									Энэ хэрэглэгчийг устгахыг зөвшөөрч байна уу ?
								</p>
							</div>
							<div class="modal-footer">
								<form action="{{ URL::route('dashboard.user.destroy',$user->id) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="btn btn-danger">Устгах</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				@endif
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</span></td>
					<td>{{ $user->email }}</td>
					<td>
						@if($user->user_type == 0 )
						<span style="color:orange">Супер Админ</span>
						@else
						<span style="color:brown">Модератор</span>
						@endif
					</td>
					<td>
						<a  href="/blog?user={{$user->id}}" target="_blank" style="color:green">Нийт мэдээ ({{$post_count}})</a>&nbsp;&nbsp;&nbsp;
						@if(Auth::User()->id != $user->id)
						<button type="button" class="btn btn-default delete" data-toggle="modal" data-target="#myModal{{$user->id}}">
							<i class="fa fa-trash-o"></i> Устгах
						</button>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@stop

@section('javascript')
@stop
