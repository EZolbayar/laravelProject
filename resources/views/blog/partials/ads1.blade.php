

<?php
use App\Ads;
$ads = Ads::where('type','=',0)->orderByRaw("RAND()")->take(1)->get();
?>

@if(count($ads)>0)
<div class="widget">
	<div class="add">
		<a href="{{$ads[0]->link}}" target="_blank"><img class="img-responsive" src="{{$ads[0]->image}}" alt="" /></a>
	</div>
</div>
@else
<div class="widget">
	<div class="add">
	<a href=""><img class="img-responsive" src="http://www.placehold.it/500x500/333333/ffffff/?text=longads" alt="" /></a>
	</div>
</div>
@endif