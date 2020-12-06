
<?php
use App\Ads;
$ads = Ads::where('type','=',1)->orderByRaw("RAND()")->take(1)->get();
?>
<style>
	.shadow {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: rgba(0,0,0,0.124);
	}

	.shadow:hover {
		background: rgba(0,0,0,0);
	}
</style>

@if(count($ads)>0)
<div class="section add inner-add" style="background: url({{$ads[0]->image}}); height: 150px; background-position: center; margin: 0;">
	<a href="{{$ads[0]->link}}" target="_blank">
		<div class="shadow"></div>
	</a>
</div>
@else
<div class="section add inner-add" style="background: url('http://www.placehold.it/2000x250/333333/ffffff/?text=longads'); height: 150px; background-position: center; margin: 0;">
	<a href="">
		<div class="shadow"></div>
	</a>
</div>
@endif