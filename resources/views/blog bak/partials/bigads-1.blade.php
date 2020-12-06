

<?php
use App\Ads;
$ads = Ads::where('type','=',2)->orderByRaw("RAND()")->take(1)->get();
?>

<div class="col-md-3 visible-md visible-lg">
	@if(count($ads)>0)
	<div class="add featured-add">
		<a href="{{$ads[0]->link}}" target="_blank"><img class="img-responsive" src="{{$ads[0]->image}}" alt="" /></a>
	</div>
	@else
	<div class="add featured-add">
		<a href=""><img class="img-responsive" src="http://www.placehold.it/400x1100/333333/ffffff/?text=ads" alt="" /></a>
	</div>
	@endif
</div>

