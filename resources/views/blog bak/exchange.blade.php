@extends('blog.base')

@section('meta')
<title>Вальютын ханш - {{config('blog.title')}}</title>
<meta property="og:title" content="Вальютын ханш - {{config('blog.title')}}" />
<meta property="og:image" content="{{config('blog.url')}}/main/images/noimage.png" />
<meta property="og:description" content="" />
@stop

@section('content')

<div class="section">
	<?php
	$url = "http://monxansh.appspot.com/xansh.json";

	$json = file_get_contents($url);
	$exchanges = json_decode($json);
	?>

	<style>
		h5.rate {
			font-size:33px;
			color:#fd3e0a;
		}
		.tab-content {
			margin-top: 25px;
		}

		.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover,.nav-tabs>li:hover>a {
			color: #fff;
			cursor: default;
			background-color: #fd3e0a;
			border: 1px solid #fd3e0a;
			border-bottom-color: transparent;
		}
		.nav-tabs>li:hover>a {
			cursor: pointer;
		}
		.nav-tabs>li>a {
			margin-right: 2px;
			line-height: 1.42857143;
			border: 1px solid transparent;
			border-radius: 4px 4px 0 0;
			background-color:#dbe1ea;
			color:#454d62;
			padding: 2px 5px;
			border-radius: 0;
		}

		.nav-tabs>li {
			float: none;
			display: inline-block;
			margin-bottom: 5px;
			font-size: 15px;
		}

		span.type {
			font-size:32px;
			color:#333;
		}
	</style>
	<div class="row">
		<div class="col-md-12">
			<div class="page-breadcrumbs" style="margin-top:25px">
				<h1 class="section-title">Вальютын ханшийн мэдээ</h1>	
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="mytab" data-example-id="togglable-tabs"> 
				<ul id="myTabs" class="nav nav-tabs" role="tablist"> 
					<?php
					$a = 0;
					$b = 0;
					?>
					@foreach($exchanges as $exch)
					@if($a == 0)
					<li role="presentation" class="active">
						<a href="#{{$exch->code}}" id="{{$exch->code}}-tab" role="tab" data-toggle="tab" aria-controls="{{$exch->code}}" aria-expanded="true">{{$exch->code}}</a>
					</li> 
					@else
					<li role="presentation" class="">
						<a href="#{{$exch->code}}" role="tab" id="{{$exch->code}}-tab" data-toggle="tab" aria-controls="{{$exch->code}}" aria-expanded="false">{{$exch->code}}</a>
					</li> 
					@endif 
					<?php
					$a++;
					?>
					@endforeach
				</ul> 
				<div id="myTabContent" class="tab-content">
					@foreach($exchanges as $exch)
					@if($b == 0)
					<div role="tabpanel" class="tab-pane fade active in" id="{{$exch->code}}" aria-labelledby="{{$exch->code}}-tab">
						<p>
							{{$exch->name}}&nbsp;-&nbsp;<span>{{$exch->code}}</span>
						</p>
						<h5 class="rate">
							{{$exch->rate}}<span class="type">₮</span>
						</h5>
					</div> 
					@else
					<div role="tabpanel" class="tab-pane fade" id="{{$exch->code}}" aria-labelledby="{{$exch->code}}-tab">
						<p>
							{{$exch->name}}&nbsp;-&nbsp;<span>{{$exch->code}}</span>
						</p> 
						<h5 class="rate">
							{{$exch->rate}}<span class="type">₮</span>
						</h5>
					</div>
					@endif 
					<?php
					$b++;
					?>
					@endforeach
				</div>
			</div>	
		</div>	
		<div class="col-md-12">
			<div id="chartdiv" style="width:100%; height:400px;"></div>
		</div>		
	</div>
</div>
@stop

@section('javascript')
<script src="/main/amcharts/amcharts.js" type="text/javascript"></script>
<script src="/main/amcharts/serial.js" type="text/javascript"></script>

<script>
	var chart;
	var graph;

	var chartData = [
	{
		"year": "1994",
		"value": 890
	},
	{
		"year": "1995",
		"value": 920
	},
	{
		"year": "1996",
		"value": 910
	},
	{
		"year": "1997",
		"value": 840
	},
	{
		"year": "1998",
		"value": 870
	},
	{
		"year": "1999",
		"value": 930
	},
	{
		"year": "2000",
		"value": 930
	},
	{
		"year": "2001",
		"value": 980
	},
	{
		"year": "2002",
		"value": 927
	},
	{
		"year": "2003",
		"value": 1001
	},
	{
		"year": "2004",
		"value": 1200
	},
	{
		"year": "2005",
		"value": 1250
	},
	{
		"year": "2006",
		"value": 1220
	},
	{
		"year": "2007",
		"value": 1300
	},
	{
		"year": "2008",
		"value": 1320
	},
	{
		"year": "2009",
		"value": 1250
	},
	{
		"year": "2010",
		"value": 1400
	},
	{
		"year": "2011",
		"value": 1500
	},
	{
		"year": "2012",
		"value": 1430
	},
	{
		"year": "2013",
		"value": 1578
	},
	{
		"year": "2014",
		"value": 1600
	},
	{
		"year": "2015",
		"value": 1980
	},
	{
		"year": "2016",
		"value": 2007
	}
	];


	AmCharts.ready(function () {
		chart = new AmCharts.AmSerialChart();

		chart.dataProvider = chartData;
		chart.marginLeft = 10;
		chart.categoryField = "year";
		chart.dataDateFormat = "YYYY";

		chart.addListener("dataUpdated", zoomChart);

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; 
                categoryAxis.minPeriod = "YYYY";
                categoryAxis.dashLength = 3;
                categoryAxis.minorGridEnabled = true;
                categoryAxis.minorGridAlpha = 0.1;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.inside = true;
                valueAxis.dashLength = 3;
                chart.addValueAxis(valueAxis);

                // GRAPH
                graph = new AmCharts.AmGraph();
                graph.type = "smoothedLine"; // this line makes the graph smoothed line.
                graph.lineColor = "#d1655d";
                graph.negativeLineColor = "#637bb6"; // this line makes the graph to change color when it drops below 0
                graph.bullet = "round";
                graph.bulletSize = 8;
                graph.bulletBorderColor = "#FFFFFF";
                graph.bulletBorderAlpha = 1;
                graph.bulletBorderThickness = 2;
                graph.lineThickness = 2;
                graph.valueField = "value";
                graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>";
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.cursorPosition = "mouse";
                chartCursor.categoryBalloonDateFormat = "YYYY";
                chart.addChartCursor(chartCursor);

                // SCROLLBAR
                var chartScrollbar = new AmCharts.ChartScrollbar();
                chart.addChartScrollbar(chartScrollbar);
                chart.creditsPosition = "bottom-right";
                chart.write("chartdiv");
            });

	function zoomChart() {
		chart.zoomToDates(new Date(2002, 0), new Date(2017, 0));
	}
</script>
<script type="text/javascript" src="/main/js/main.js"></script>
@stop