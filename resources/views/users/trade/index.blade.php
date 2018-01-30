@extends('layouts.tradelayout')

@section('content')
	<div class="col-md-9 col-xl-9 col-sm-9">
		<div class="full-height full-width">
			<div id="container" style="width:100%; height:100vh;"></div>
		</div>
	</div>

	<div class="col-md-3 col-xl-3 col-sm-3">
		<div class="trade-tool">
			<div class="sell-list">
				<div class="card card-default">
					<div class="card-header ">
						<div class="card-title">Sell List</div>
					</div>
					<div class="">
						<table class="table table-hover table-condensed table-striped" id="tableWithExportOptions">
							<thead>
								<tr>
									<th>Bid Price</th>
									<th>Qty</th>
									<th>BTC Price</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr class="odd gradeX">
								<td>132</td>
								<td>21</td>
								<td>0.912</td>
								<td class="center"><button class="btn btn-primary">-</button></td>
								</tr><tr class="odd gradeX">
								<td>132</td>
								<td>21</td>
								<td>0.912</td>
								<td class="center"><button class="btn btn-primary">-</button></td>
								</tr><tr class="odd gradeX">
								<td>132</td>
								<td>21</td>
								<td>0.912</td>
								<td class="center"><button class="btn btn-primary">-</button></td>
								</tr><tr class="odd gradeX">
								<td>132</td>
								<td>21</td>
								<td>0.912</td>
								<td class="center"><button class="btn btn-primary">-</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="buy-list">
				<div class="card card-default">
					<div class="card-header ">
						<div class="card-title">Buy List</div>
					</div>
					<div class="">
						<table class="table table-hover table-condensed table-striped" id="tableWithExportOptions">
							<thead>
								<tr>
									<th>Ask Price</th>
									<th>Qty</th>
									<th>BTC</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr class="odd gradeX">
								<td>120</td>
								<td>12</td>
								<td>0.811</td>
								<td class="center"><button class="btn btn-primary">+</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('after-scripts')

<script type="text/javascript">

setTimeout($.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=aapl-ohlcv.json&callback=?', function (data) {

    // split the data set into ohlc and volume
    var ohlc = [],
        volume = [],
        dataLength = data.length,
        // set the allowed units for data grouping
        groupingUnits = [[
            'week',                         // unit name
            [1]                             // allowed multiples
        ], [
            'month',
            [1, 2, 3, 4, 6, 7]
        ]],

        i = 0;

    for (i; i < dataLength; i += 1) {
        ohlc.push([
            data[i][0], // the date
            data[i][1], // open
            data[i][2], // high
            data[i][3], // low
            data[i][4] // close
        ]);

        volume.push([
            data[i][0], // the date
            data[i][5] // the volume
        ]);
    }


    // create the chart
    Highcharts.stockChart('container', {

        rangeSelector: {
            selected: 1
        },

        title: {
            text: 'AAPL Historical'
        },

        yAxis: [{
            labels: {
                align: 'right',
                x: -3
            },
            title: {
                text: 'OHLC'
            },
            height: '60%',
            lineWidth: 2,
            resize: {
                enabled: true
            }
        }, {
            labels: {
                align: 'right',
                x: -3
            },
            title: {
                text: 'Volume'
            },
            top: '65%',
            height: '35%',
            offset: 0,
            lineWidth: 2
        }],

        tooltip: {
            split: true
        },

        series: [{
            type: 'candlestick',
            name: 'AAPL',
            data: ohlc,
            dataGrouping: {
                units: groupingUnits
            }
        }, {
            type: 'column',
            name: 'Volume',
            data: volume,
            yAxis: 1,
            dataGrouping: {
                units: groupingUnits
            }
        }]
    });
}), 10000);
</script>
@endpush