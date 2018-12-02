@extends('cashier.layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap.min.css')}}">
    <style>
        #piechart, #linechart {
            width: 100%;
            height: 500px;
        }

    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>DASHBOARD</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Profit Today</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ rupiah(5000000) }}</h5> <!-- TODO:: PUT PROFIT HARIAN DISINI -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Transaction Today</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ 30 }}</h5> <!-- TODO:: PUT JUMLAH TRANSAKSI HARIAN DISINI -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Transaction Today</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="piechart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Transaction Today</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="linechart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    <script>
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("piechart", am4charts.PieChart);

        // Add data
        chart.data = [ {
            "country": "Lithuania",
            "litres": 501.9
        }, {
            "country": "Czech Republic",
            "litres": 301.9
        }, {
            "country": "Ireland",
            "litres": 201.1
        }, {
            "country": "Germany",
            "litres": 165.8
        }, {
            "country": "Australia",
            "litres": 139.9
        }, {
            "country": "Austria",
            "litres": 128.3
        }, {
            "country": "UK",
            "litres": 99
        }, {
            "country": "Belgium",
            "litres": 60
        }, {
            "country": "The Netherlands",
            "litres": 50
        } ];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;
    </script>
    <script>
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("linechart", am4charts.XYChart);

        // Add data
        chart.data = [{
            "year": "1930",
            "italy": 1,
            "germany": 5,
            "uk": 3
        }, {
            "year": "1934",
            "italy": 1,
            "germany": 2,
            "uk": 6
        }, {
            "year": "1938",
            "italy": 2,
            "germany": 3,
            "uk": 1
        }, {
            "year": "1950",
            "italy": 3,
            "germany": 4,
            "uk": 1
        }, {
            "year": "1954",
            "italy": 5,
            "germany": 1,
            "uk": 2
        }, {
            "year": "1958",
            "italy": 3,
            "germany": 2,
            "uk": 1
        }, {
            "year": "1962",
            "italy": 1,
            "germany": 2,
            "uk": 3
        }, {
            "year": "1966",
            "italy": 2,
            "germany": 1,
            "uk": 5
        }, {
            "year": "1970",
            "italy": 3,
            "germany": 5,
            "uk": 2
        }, {
            "year": "1974",
            "italy": 4,
            "germany": 3,
            "uk": 6
        }, {
            "year": "1978",
            "italy": 1,
            "germany": 2,
            "uk": 4
        }];

        // Create category axis
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "year";
        categoryAxis.renderer.opposite = true;

        // Create value axis
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.inversed = true;
        valueAxis.title.text = "Place taken";
        valueAxis.renderer.minLabelPosition = 0.01;

        // Create series
        var series1 = chart.series.push(new am4charts.LineSeries());
        series1.dataFields.valueY = "italy";
        series1.dataFields.categoryX = "year";
        series1.name = "Italy";
        series1.strokeWidth = 3;
        series1.bullets.push(new am4charts.CircleBullet());
        series1.tooltipText = "Place taken by {name} in {categoryX}: {valueY}";
        series1.legendSettings.valueText = "{valueY}";
        series1.visible  = false;

        var series2 = chart.series.push(new am4charts.LineSeries());
        series2.dataFields.valueY = "germany";
        series2.dataFields.categoryX = "year";
        series2.name = 'Germany';
        series2.strokeWidth = 3;
        series2.bullets.push(new am4charts.CircleBullet());
        series2.tooltipText = "Place taken by {name} in {categoryX}: {valueY}";
        series2.legendSettings.valueText = "{valueY}";

        var series3 = chart.series.push(new am4charts.LineSeries());
        series3.dataFields.valueY = "uk";
        series3.dataFields.categoryX = "year";
        series3.name = 'United Kingdom';
        series3.strokeWidth = 3;
        series3.bullets.push(new am4charts.CircleBullet());
        series3.tooltipText = "Place taken by {name} in {categoryX}: {valueY}";
        series3.legendSettings.valueText = "{valueY}";

        // Add chart cursor
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.behavior = "zoomY";

        // Add legend
        chart.legend = new am4charts.Legend();
    </script>
@endpush