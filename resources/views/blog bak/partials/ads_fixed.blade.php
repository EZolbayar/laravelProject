<?php
use App\Ads;
$ads = Ads::where('type','=',5)->orderByRaw("RAND()")->take(1)->get();
?>

@if(count($ads)>0)
<div class="fixed_banner visible-lg">
	<a href="{{$ads[0]->link}}" target="_blank"><img class="img-responsive" src="{{$ads[0]->image}}" alt="" /></a>
</div>
@else
<div class="fixed_banner visible-lg">
	<img src="http://www.placehold.it/300x800/333333/ffffff/?text=fixed+ads" alt="">
</div>
@endif