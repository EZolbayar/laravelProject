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
		@if( count($ads) == 0 )
		Ямар нэгэн зар олдсонгүй ... 		
		@endif
		<a href="/dashboard/ads/create" class="btn btn-custom btn-sm">
			<i class="fa fa-plus"></i> Шинэ зар оруулах
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
		@if(count($ads) > 0)
		<table id="table" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:50px;">#</th>
					<th>Төрөл</th>
					<th>Нэр</th>
					<th>Зураг</th>
					<th style="width:200px;"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($ads as $ad)
				<?php
					$str = $ad->link;

					if($str[0] != 'h' && $str[0] != 'H'){
						$str = 'http://'.$str;
					}
				?>
				<div class="modal fade" id="myModal{{$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$ad->id}}">
					<div class="modal-dialog" role="document">
						<div class="modal-content" style="    margin-top: 150px;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel{{$ad->id}}" style="color:#000">Ads устгах</h4>
							</div>
							<div class="modal-body">
								<p style="color:#000">
									Энэ ads-г устгахыг зөвшөөрч байна уу ?
								</p>
							</div>
							<div class="modal-footer">
								<form action="{{ URL::route('dashboard.ads.destroy',$ad->id) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="btn btn-danger">Устгах</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<tr>
					<td>{{ $ad->id }}</td>
					<td>
						@if($ad->type == 0)
						Энгийн /500x500/
						@endif
						@if($ad->type == 1)
						Урт /2000x250/
						@endif
						@if($ad->type == 5)
						Fixed /300x800/
						@endif
						@if($ad->type == 4)
						Post after /1000x250/
						@endif
					</td>
					<td>{{ $ad->name }}</td>
					<td>
						<a href="{{$str}}" target="_blank">
							@if($ad->image)
							<img src="{{$ad->image}}" alt="" style="max-width:200px;max-height:500px;">
							@else
							<img src="/main/images/noimage.png" alt="" style="max-width:200px;max-height:500px;">
							@endif
						</a>
					</td>
					<td>
						<button type="button" class="btn btn-default delete" data-toggle="modal" data-target="#myModal{{$ad->id}}">
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
