<div class="section sports-section">
	<h1 class="section-title title">Вальют</h1>	

	<?php
	$url = "http://monxansh.appspot.com/xansh.json";

	$json = file_get_contents($url);
	$exchanges = json_decode($json);
	?>
	<style>
		.com-name {
			text-align: left;
			padding-left: 15px;
			line-height: 15px;
		}

		.current-price {
			color:#fd3e0a;
		}

		.stock-header {
			font-size:20px;
		}

		a.hed {
			font-size:20px;
			color:#fff;
		}

		a.more {
			margin:10px;
			font-size:15px;
			color:blue;
		}


	</style>
	<div class="stock-exchange">
		<div class="stock-exchange-zone">
			<a href="/exchange" class="hed">Вальютын ханш</a>
		</div>		
		<div class="stock-header">
			<div class="row">
				<div class="col-xs-6">НЭР</div>
				<div class="col-xs-6">Үнэ</div>
			</div>
		</div>
		<div class="stock-reports">
			<?php
			$i = 1;
			?>
			@foreach($exchanges as $exch)
			<div class="com-details">
				<div class="row">
					<div class="col-xs-6 com-name">{{$exch->name}}</div>
					<div class="col-xs-6 current-price"><b>{{$exch->code}}</b> {{$exch->rate}}</div>
				</div>
			</div>
			<?php
			$i++;
			if($i == 11){
				break;
			}
			?>	
			@endforeach
			<div class="text-center">
				<a href="/exchange" class="more">цааш үзэх...</a>
			</div>											
		</div>										
	</div>
</div>


