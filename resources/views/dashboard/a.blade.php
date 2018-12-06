<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat-type-2 shadow border-success">
                    <h3 class="text-center text-thin">Profit Today</h3>
                    <p class="text-center">
                        <span class="overview-icon bg-danger"><i class="fa fa-money"></i></span>
                    </p>
                    <h2 style="text-align: center;"><strong>Rp.<span class="counter">4,021000</span></strong></h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat-type-2 shadow border-success">
                    <h3 class="text-center text-thin">Profit Weekly</h3>
                    <p class="text-center">
                        <span class="overview-icon bg-success"><i class="fa fa-money"></i></span>
                    </p>
                    <h2 style="text-align: center;"><strong>Rp.<span class="counter">25,102700</span></strong></h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat-type-2 shadow border-success">
                    <h3 class="text-center text-thin">Profit Monthly</h3>
                    <p class="text-center">
                        <span class="overview-icon bg-warning"><i class="fa fa-money"></i></span>
                    </p>
                    <h2 style="text-align: center;"><strong>Rp.<span class="counter">78,940060</span></strong></h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="mini-stat-type-2 shadow border-success">
                    <h3 class="text-center text-thin">Profit Yearly</h3>
                    <p class="text-center">
                        <span class="overview-icon bg-info"><i class="fa fa-money"></i></span>
                    </p>
                    <h2 style="text-align: center;"><strong>Rp.<span class="counter">689,161130</span></strong></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Start market status chart -->
                <div class="panel stat-stack widget-market rounded shadow">
                    <div class="panel-body no-padding">
                        <div class="row row-merge">
                            <div class="col-sm-8">
                                <div class="panel stat-left no-margin no-box-shadow">
                                    <div class="panel-body bg-teal">
                                        <h4 class="no-margin">All transactions per year</h4>
                                        <div id="market-chart" class="resize-chart"></div>

                                    </div><!-- /.panel-body -->
                                    <div class="panel-footer no-border-top">
                                        <div class="row text-center mb-5 mt-5">
                                            <div class="col-xs-4 col-xs-override border-right dotted">
                                                <div class="mini-stat no-padding no-margin">
                                                            <span class="mini-stat-chart text-center">
                                                                <span id="market-today-chart">2,3,3,4,5,7,9,5</span>
                                                            </span><!-- /.mini-stat-chart -->
                                                    <div class="mini-stat-info text-right">
                                                            <span>Rp<span
                                                                    class="counter display-inline no-margin">4,021000</span></span>
                                                        <p class="text-muted no-margin">Today Sales</p>
                                                    </div><!-- /.mini-stat-info -->
                                                </div><!-- /.mini-stat -->
                                            </div>
                                            <div class="col-xs-4 col-xs-override border-right dotted">
                                                <div class="mini-stat no-padding no-margin">
                                                                            <span class="mini-stat-chart">
                                                                                <span id="market-average-chart">5,3,6,4,5,8,9,4</span>
                                                                            </span><!-- /.mini-stat-chart -->
                                                    <div class="mini-stat-info text-right">
                                                            <span>Rp<span
                                                                    class="counter display-inline no-margin">5,902394</span></span>
                                                        <p class="text-muted no-margin">Average Sales</p>
                                                    </div><!-- /.mini-stat-info -->
                                                </div><!-- /.mini-stat -->
                                            </div>
                                            <div class="col-xs-4 col-xs-override">
                                                <div class="mini-stat no-padding no-margin">
                                                                            <span class="mini-stat-chart">
                                                                                <span id="market-total-chart">5,7,2,3,8,8,9,5</span>
                                                                            </span><!-- /.mini-stat-chart -->
                                                    <div class="mini-stat-info text-right">
                                                            <span>Rp<span
                                                                    class="counter display-inline no-margin">90,203421</span></span>
                                                        <p class="text-muted no-margin">Total Sales</p>
                                                    </div><!-- /.mini-stat-info -->
                                                </div><!-- /.mini-stat -->
                                            </div>
                                        </div>
                                    </div><!-- /.panel-footer -->
                                </div><!-- /.panel -->
                            </div>
                            <div class="col-sm-4">
                                <div class="panel no-margin no-box-shadow stat-right">
                                    <div class="panel-body">
                                        <h4 class="no-margin">Most popular product</h4>
                                        <p class="text-muted"></p>
                                        <div id="market-status-chart" class="resize-chart"></div>
                                    </div><!-- /.panel-body -->
                                    <div class="panel-footer">
                                        <span>Target Income (Rp 90,203,421)</span><span
                                            class="pull-right hidden-sm hidden-xs">Rp 1,000,000,000</span>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 45%"></div>
                                        </div><!-- /.progress -->
                                    </div>
                                </div><!-- /.panel -->
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
                <!--/ End market status chart -->

            </div>
        </div>

    </div>
</div>

@push('script')
    <script>
        function marketChart(){
            window.line = Morris.Line({
                element: 'market-chart',
                data: [
                    { y: '2008', a: 120000000, b: 220000000, c: 130000000 },
                    { y: '2009', a: 250000000, b: 500000000, c: 670000000 },
                    { y: '2010', a: 250000000, b: 400000000, c: 320000000 },
                    { y: '2011', a: 270000000,  b: 600000000, c: 780000000 },
                    { y: '2012', a: 340000000,  b: 500000000, c: 120000000 },
                    { y: '2013', a: 400000000,  b: 700000000, c: 780000000 },
                    { y: '2014', a: 410000000, b: 600000000, c: 520000000 }
                ],
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Aqua', 'Vitacimin', 'Decolgen'],
                lineColors: ['#8CC152', '#F6BB42', '#906094'],
                pointFillColors: ['#8CC152', '#F6BB42', '#906094'],
                pointStrokeColors: ['#FFFFFF'],
                lineWidth: '5px',
                hideHover: true,
                grid: false,
                gridTextColor: '#FFFFFF',
                resize: true,
                redraw: true
            });
        }  marketChart();
    </script>
@endpush
