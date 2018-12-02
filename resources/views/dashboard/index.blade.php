@extends('_layout.blankon')

@section('content')
    <div class="row">
        <div class="col-md-9">

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="mini-stat-type-2 shadow border-danger">
                        <h3 class="text-center text-thin">Daily</h3>
                        <p class="text-center">
                            <span class="overview-icon bg-danger"><i class="fa fa-arrow-down"></i></span>
                        </p>
                        <p>
                            <b>$<span class="counter">2,452</span></b> <span class="fg-danger">-<span
                                    class="counter">35</span>%</span>
                        </p>
                        <p class="text-muted">
                            Last Month: 124,342/422,421
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="mini-stat-type-2 shadow border-success">
                        <h3 class="text-center text-thin">Weekly</h3>
                        <p class="text-center">
                            <span class="overview-icon bg-success"><i class="fa fa-arrow-up"></i></span>
                        </p>
                        <p>
                            <b>$<span class="counter">7,321</span></b> <span class="fg-success">+<span class="counter">15</span>%</span>
                        </p>
                        <p class="text-muted">
                            Last Month: 452,342/784,421
                        </p>
                    </div>
                </div>
                <div class="col-md-6">

                    <!-- Start list bank table -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Bank - <b>Capital One</b></h3>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body no-padding">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="pull-left text-capitalize">Estimated next deposit</span>
                                            <span class="pull-right text-strong fg-teals">$<span
                                                    class="counter">230.45</span></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="pull-left text-capitalize">Pending transactions:</span>
                                            <span class="pull-right text-strong fg-teals">$<span
                                                    class="counter">34.11</span></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="pull-left text-capitalize">Reserves & holds:</span>
                                            <span class="pull-right text-strong">$<span
                                                    class="counter">0.00</span></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.panel-body -->
                    </div>
                    <!--/ End list bank table -->

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
                                                            <span>$<span
                                                                    class="counter display-inline no-margin">1,201</span></span>
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
                                                            <span>$<span
                                                                    class="counter display-inline no-margin">2,671</span></span>
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
                                                            <span>$<span
                                                                    class="counter display-inline no-margin">23,671</span></span>
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
                                            <h4 class="no-margin">Market Status</h4>
                                            <p class="text-muted">Summary of the market status.</p>
                                            <div id="market-status-chart" class="resize-chart"></div>
                                        </div><!-- /.panel-body -->
                                        <div class="panel-footer">
                                            <span>Target Income ($23,671)</span><span
                                                class="pull-right hidden-sm hidden-xs">$1.000.000</span>
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

                    <!-- Start seller dashboard -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Seller Dashboard</h3>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-no-border table-middle table-lilac">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="http://img.djavaui.com/?create=50x50,6880B0?f=ffffff" alt="..."/>
                                        </td>
                                        <td>
                                            <b class="text-block">American team soccer</b>
                                        </td>
                                        <td>
                                            <b class="text-block">230 of 300</b>
                                            <span class="text-block text-muted">reserved</span>
                                            <div class="progress progress-xxs no-margin">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 75%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <b class="text-block">2d</b>
                                            <span class="text-block text-muted">remaining</span>
                                        </td>
                                        <td>
                                            <b class="text-block">$1,500</b>
                                            <span class="text-block text-muted">profit</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Settings"><i
                                                    class="fa fa-cog"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Message buyers"><i
                                                    class="fa fa-envelope"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Refresh data"><i
                                                    class="fa fa-refresh"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View detail"><i
                                                    class="fa fa-file"></i></a>
                                        </td>
                                        <td>
                                            <span class="label label-warning label-circle">&nbsp;</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="http://img.djavaui.com/?create=50x50,6880B0?f=ffffff" alt="..."/>
                                        </td>
                                        <td>
                                            <b class="text-block">USA Olympic Soccer</b>
                                            <span class="text-block text-muted">Large emblem</span>
                                        </td>
                                        <td>
                                            <b class="text-block">450 of 500</b>
                                            <span class="text-block text-muted">sold</span>
                                            <div class="progress progress-xxs no-margin">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 75%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <b class="text-block">5d</b>
                                            <span class="text-block text-muted">remaining</span>
                                        </td>
                                        <td>
                                            <b class="text-block">$5,530</b>
                                            <span class="text-block text-muted">profit</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Settings"><i
                                                    class="fa fa-cog"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Message buyers"><i
                                                    class="fa fa-envelope"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Refresh data"><i
                                                    class="fa fa-refresh"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View detail"><i
                                                    class="fa fa-file"></i></a>
                                        </td>
                                        <td>
                                            <span class="label label-success label-circle">&nbsp;</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="http://img.djavaui.com/?create=50x50,6880B0?f=ffffff" alt="..."/>
                                        </td>
                                        <td>
                                            <b class="text-block">USA Olympic Soccer</b>
                                            <span class="text-block text-muted">Pocket emblem</span>
                                        </td>
                                        <td>
                                            <b class="text-block">1,000 of 2,000</b>
                                            <span class="text-block text-muted">sold</span>
                                            <div class="progress progress-xxs no-margin">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 75%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <b class="text-block">5d</b>
                                            <span class="text-block text-muted">5d ago</span>
                                        </td>
                                        <td>
                                            <b class="text-block">$130,530</b>
                                            <span class="text-block text-muted">profit</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Settings"><i
                                                    class="fa fa-cog"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Message buyers"><i
                                                    class="fa fa-envelope"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Refresh data"><i
                                                    class="fa fa-refresh"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View detail"><i
                                                    class="fa fa-file"></i></a>
                                        </td>
                                        <td>
                                            <span class="label label-primary label-circle label-stroke">&nbsp;</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="http://img.djavaui.com/?create=50x50,6880B0?f=ffffff" alt="..."/>
                                        </td>
                                        <td>
                                            <b class="text-block">Team USA Soccer</b>
                                        </td>
                                        <td>
                                            <b class="text-block">75 of 100</b>
                                            <span class="text-block text-muted">want this</span>
                                            <div class="progress progress-xxs no-margin">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 75%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <b class="text-block">Ended</b>
                                            <span class="text-block text-muted">10d ago</span>
                                        </td>
                                        <td>
                                            <b class="text-block text-muted">N/A</b>
                                            <span class="text-block text-muted">not funded</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Settings"><i
                                                    class="fa fa-cog"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Message buyers"><i
                                                    class="fa fa-envelope"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Refresh data"><i
                                                    class="fa fa-refresh"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View detail"><i
                                                    class="fa fa-file"></i></a>
                                        </td>
                                        <td>
                                            <span class="label label-primary label-circle label-stroke">&nbsp;</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="http://img.djavaui.com/?create=50x50,6880B0?f=ffffff" alt="..."/>
                                        </td>
                                        <td>
                                            <b class="text-block">Team USA Eagle</b>
                                        </td>
                                        <td>
                                            <b class="text-block">25 of 30</b>
                                            <span class="text-block text-muted">want this</span>
                                            <div class="progress progress-xxs no-margin">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 75%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <b class="text-block">Ended</b>
                                            <span class="text-block text-muted">12d ago</span>
                                        </td>
                                        <td>
                                            <b class="text-block text-muted">N/A</b>
                                            <span class="text-block text-muted">not funded</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Settings"><i
                                                    class="fa fa-cog"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Message buyers"><i
                                                    class="fa fa-envelope"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Refresh data"><i
                                                    class="fa fa-refresh"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View detail"><i
                                                    class="fa fa-file"></i></a>
                                        </td>
                                        <td>
                                            <span class="label label-primary label-circle label-stroke">&nbsp;</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="http://img.djavaui.com/?create=50x50,6880B0?f=ffffff" alt="..."/>
                                        </td>
                                        <td>
                                            <b class="text-block">Worn USA Flag</b>
                                        </td>
                                        <td>
                                            <b class="text-block">13 of 15</b>
                                            <span class="text-block text-muted">want this</span>
                                            <div class="progress progress-xxs no-margin">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 75%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <b class="text-block">Ended</b>
                                            <span class="text-block text-muted">15d ago</span>
                                        </td>
                                        <td>
                                            <b class="text-block text-muted">N/A</b>
                                            <span class="text-block text-muted">not funded</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Settings"><i
                                                    class="fa fa-cog"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Message buyers"><i
                                                    class="fa fa-envelope"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="Refresh data"><i
                                                    class="fa fa-refresh"></i></a>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                               data-placement="top" data-original-title="View detail"><i
                                                    class="fa fa-file"></i></a>
                                        </td>
                                        <td>
                                            <span class="label label-primary label-circle label-stroke">&nbsp;</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.panel-body -->
                    </div>
                    <!--/ End seller dashboard -->

                    <div class="panel panel-tab shadow">
                        <div class="panel-heading no-border">
                            <div class="pull-left">
                                <h3 class="panel-title">World Map Retail</h3>
                            </div>
                            <div class="pull-right">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#visualization" aria-controls="visualization" role="tab" data-toggle="tab" class="no-border">Visualization</a></li>
                                    <li role="presentation"><a href="#markers" aria-controls="markers" role="tab" data-toggle="tab" class="no-border">Markers</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body no-padding">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="visualization">
                                    <div id="map-world-visualization" class="map" style="height: 500px;"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="markers" style="overflow: hidden">
                                    <div id="map-world-markers" class="map" style="height: 500px;"></div>
                                </div>
                            </div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->

                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="recent-activity">
                <h3>Recent Activity</h3>
                <!-- Start recent activity item -->
                <div class="recent-activity-item recent-activity-warning">
                    <div class="recent-activity-badge">
                        <span class="recent-activity-badge-userpic"></span>
                    </div>
                    <div class="recent-activity-body">
                        <div class="recent-activity-body-head">
                            <div class="recent-activity-body-head-caption">
                                <h3 class="recent-activity-body-title">New Order</h3>
                            </div>
                        </div>
                        <div class="recent-activity-body-content">
                            <p>
                                <a href="#">Grace Hudson</a> ordered 2 items ($34.45)
                                <span class="text-block text-muted">on 02/12/15</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End recent activity item -->

                <!-- Start recent activity item -->
                <div class="recent-activity-item recent-activity-primary">
                    <div class="recent-activity-badge">
                        <span class="recent-activity-badge-userpic"></span>
                    </div>
                    <div class="recent-activity-body">
                        <div class="recent-activity-body-head">
                            <div class="recent-activity-body-head-caption">
                                <h3 class="recent-activity-body-title">New Product</h3>
                            </div>
                        </div>
                        <div class="recent-activity-body-content">
                            <p>
                                <a href="#">Project Blankon AngularJS</a> <span class="text-muted">was added on 02/12/15 by</span>
                                Aaron Dias
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End recent activity item -->

                <!-- Start recent activity item -->
                <div class="recent-activity-item recent-activity-success">
                    <div class="recent-activity-badge">
                        <span class="recent-activity-badge-userpic"></span>
                    </div>
                    <div class="recent-activity-body">
                        <div class="recent-activity-body-head">
                            <div class="recent-activity-body-head-caption">
                                <h3 class="recent-activity-body-title">New Content Page</h3>
                            </div>
                        </div>
                        <div class="recent-activity-body-content">
                            <p>
                                <a href="#">About Us</a> <span class="text-muted">was edited on 02/12/15 by</span>
                                Michelle Watkins
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End recent activity item -->

                <!-- Start recent activity item -->
                <div class="recent-activity-item recent-activity-success">
                    <div class="recent-activity-badge">
                        <span class="recent-activity-badge-userpic"></span>
                    </div>
                    <div class="recent-activity-body">
                        <div class="recent-activity-body-head">
                            <div class="recent-activity-body-head-caption">
                                <h3 class="recent-activity-body-title">Theme Edit</h3>
                            </div>
                        </div>
                        <div class="recent-activity-body-content">
                            <p>
                                <a href="#">Dashboard Blankon</a> <span
                                    class="text-muted">was edited on 02/12/15 by</span> Ngadiono CR
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End recent activity item -->

                <!-- Start recent activity item -->
                <div class="recent-activity-item recent-activity-danger">
                    <div class="recent-activity-badge">
                        <span class="recent-activity-badge-userpic"></span>
                    </div>
                    <div class="recent-activity-body">
                        <div class="recent-activity-body-head">
                            <div class="recent-activity-body-head-caption">
                                <h3 class="recent-activity-body-title">New Product</h3>
                            </div>
                        </div>
                        <div class="recent-activity-body-content">
                            <p>
                                <a href="#">Project Blankon AngularJS</a> <span class="text-muted">was added on 02/12/15 by</span>
                                Aaron Dias
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End recent activity item -->

                <!-- Start recent activity item -->
                <div class="recent-activity-item recent-activity-lilac">
                    <div class="recent-activity-badge">
                        <span class="recent-activity-badge-userpic"></span>
                    </div>
                    <div class="recent-activity-body">
                        <div class="recent-activity-body-head">
                            <div class="recent-activity-body-head-caption">
                                <h3 class="recent-activity-body-title">New Order</h3>
                            </div>
                        </div>
                        <div class="recent-activity-body-content">
                            <p>
                                <a href="#">Grace Hudson</a> ordered 2 items ($34.45)
                                <span class="text-block text-muted">on 02/12/15</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End recent activity item -->

                <!-- Start recent activity item -->
                <div class="recent-activity-item recent-activity-danger recent-activity-last">
                    <div class="recent-activity-badge">
                        <span class="recent-activity-badge-userpic"></span>
                    </div>
                    <div class="recent-activity-body">
                        <div class="recent-activity-body-head">
                            <div class="recent-activity-body-head-caption">
                                <h3 class="recent-activity-body-title">New Order</h3>
                            </div>
                        </div>
                        <div class="recent-activity-body-content">
                            <p>
                                <a href="#">Kelly Newman</a> ordered 4 items ($234.45)
                                <span class="text-block text-muted">on 02/17/15</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End recent activity item -->
            </div>
        </div>
    </div><!-- /.row -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/morris.js/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquyer.gritter/css/jquery.gritter.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.canvas.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.errorbars.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.image.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.navigate.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.threshold.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('vendor/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('vendor/gmap3/gmap3.min.js') }}"></script>
    <script src="{{ asset('vendor/jquyer.gritter/js/jquery.gritter.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/jvectormap/jquery-jvectormap.js') }}"></script>
@endpush

@push('script')
    <script>
        if($('.counter').length){
            $('.counter').counterUp({
                delay: 10,
                time: 4000
            });
        }

        $(window).resize(function() {
            window.line.redraw();
        });

        function marketChart(){
            window.line = Morris.Line({
                element: 'market-chart',
                data: [
                    { y: '2008', a: 30, b: 20, c: 10 },
                    { y: '2009', a: 20,  b: 50, c: 67 },
                    { y: '2010', a: 25,  b: 40, c: 32 },
                    { y: '2011', a: 27,  b: 60, c: 78 },
                    { y: '2012', a: 34,  b: 50, c: 12 },
                    { y: '2013', a: 40,  b: 70, c: 78 },
                    { y: '2014', a: 41, b: 60, c: 52 }
                ],
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Apple', 'Android', 'Windows Phone'],
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
        }

        marketChart();

        var piedata = [
            { label: "Apple", data: [[1,40]], color: '#906094'},
            { label: "Android", data: [[1,20]], color: '#8CC152'},
            { label: "Windows Phone", data: [[1,50]], color: '#F6BB42'}
        ];

        function labelFormatter(label, series) {
            return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
        }

        $.plot('#market-status-chart', piedata, {
            series: {
                pie: {
                    show: true,
                    radius: 500,
                    label: {
                        show: true,
                        radius: 2/3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });

        $('#market-today-chart').sparkline('html',{
            type: 'bar',
            barColor: '#81b71a',
            height: '50px',
            barWidth: '5px'
        });
        $('#market-average-chart').sparkline('html',{
            type: 'bar',
            barColor: '#81b71a',
            height: '50px',
            barWidth: '5px'
        });
        $('#market-total-chart').sparkline('html',{
            type: 'bar',
            barColor: '#81b71a',
            height: '50px',
            barWidth: '5px'
        });

        if($('#map-order-locations').length){
            $('#map-order-locations').gmap3({
                map:{
                    options:{
                        center:[46.578498,2.457275],
                        zoom: 5
                    }
                },
                marker:{
                    values:[
                        {latLng:[48.8620722, 2.352047], data:"Windows phone sold 45"},
                        {address:"86000 Poitiers, France", data:"Apple sold 453"},
                        {address:"66000 Perpignan, France", data:"Android sold 344", options:{icon: "http://maps.google.com/mapfiles/marker_green.png"}}
                    ],
                    options:{
                        draggable: false
                    },
                    events:{
                        mouseover: function(marker, event, context){
                            var map = $(this).gmap3("get"),
                                infowindow = $(this).gmap3({get:{name:"infowindow"}});
                            if (infowindow){
                                infowindow.open(map, marker);
                                infowindow.setContent(context.data);
                            } else {
                                $(this).gmap3({
                                    infowindow:{
                                        anchor:marker,
                                        options:{content: context.data}
                                    }
                                });
                            }
                        },
                        mouseout: function(){
                            var infowindow = $(this).gmap3({get:{name:"infowindow"}});
                            if (infowindow){
                                infowindow.close();
                            }
                        }
                    }
                }
            });
        }

        var gdpData = {
            "AF": 16.63,
            "AL": 11.58,
            "DZ": 158.97,
            "AO": 85.81,
            "AG": 1.1,
            "AR": 351.02,
            "AM": 8.83,
            "AU": 1219.72,
            "AT": 366.26,
            "AZ": 52.17,
            "BS": 7.54,
            "BH": 21.73,
            "BD": 105.4,
            "BB": 3.96,
            "BY": 52.89,
            "BE": 461.33,
            "BZ": 1.43,
            "BJ": 6.49,
            "BT": 1.4,
            "BO": 19.18,
            "BA": 16.2,
            "BW": 12.5,
            "BR": 2023.53,
            "BN": 11.96,
            "BG": 44.84,
            "BF": 8.67,
            "BI": 1.47,
            "KH": 11.36,
            "CM": 21.88,
            "CA": 1563.66,
            "CV": 1.57,
            "CF": 2.11,
            "TD": 7.59,
            "CL": 199.18,
            "CN": 5745.13,
            "CO": 283.11,
            "KM": 0.56,
            "CD": 12.6,
            "CG": 11.88,
            "CR": 35.02,
            "CI": 22.38,
            "HR": 59.92,
            "CY": 22.75,
            "CZ": 195.23,
            "DK": 304.56,
            "DJ": 1.14,
            "DM": 0.38,
            "DO": 50.87,
            "EC": 61.49,
            "EG": 216.83,
            "SV": 21.8,
            "GQ": 14.55,
            "ER": 2.25,
            "EE": 19.22,
            "ET": 30.94,
            "FJ": 3.15,
            "FI": 231.98,
            "FR": 2555.44,
            "GA": 12.56,
            "GM": 1.04,
            "GE": 11.23,
            "DE": 3305.9,
            "GH": 18.06,
            "GR": 305.01,
            "GD": 0.65,
            "GT": 40.77,
            "GN": 4.34,
            "GW": 0.83,
            "GY": 2.2,
            "HT": 6.5,
            "HN": 15.34,
            "HK": 226.49,
            "HU": 132.28,
            "IS": 12.77,
            "IN": 1430.02,
            "ID": 695.06,
            "IR": 337.9,
            "IQ": 84.14,
            "IE": 204.14,
            "IL": 201.25,
            "IT": 2036.69,
            "JM": 13.74,
            "JP": 5390.9,
            "JO": 27.13,
            "KZ": 129.76,
            "KE": 32.42,
            "KI": 0.15,
            "KR": 986.26,
            "UNDEFINED": 5.73,
            "KW": 117.32,
            "KG": 4.44,
            "LA": 6.34,
            "LV": 23.39,
            "LB": 39.15,
            "LS": 1.8,
            "LR": 0.98,
            "LY": 77.91,
            "LT": 35.73,
            "LU": 52.43,
            "MK": 9.58,
            "MG": 8.33,
            "MW": 5.04,
            "MY": 218.95,
            "MV": 1.43,
            "ML": 9.08,
            "MT": 7.8,
            "MR": 3.49,
            "MU": 9.43,
            "MX": 1004.04,
            "MD": 5.36,
            "MN": 5.81,
            "ME": 3.88,
            "MA": 91.7,
            "MZ": 10.21,
            "MM": 35.65,
            "NA": 11.45,
            "NP": 15.11,
            "NL": 770.31,
            "NZ": 138,
            "NI": 6.38,
            "NE": 5.6,
            "NG": 206.66,
            "NO": 413.51,
            "OM": 53.78,
            "PK": 174.79,
            "PA": 27.2,
            "PG": 8.81,
            "PY": 17.17,
            "PE": 153.55,
            "PH": 189.06,
            "PL": 438.88,
            "PT": 223.7,
            "QA": 126.52,
            "RO": 158.39,
            "RU": 1476.91,
            "RW": 5.69,
            "WS": 0.55,
            "ST": 0.19,
            "SA": 434.44,
            "SN": 12.66,
            "RS": 38.92,
            "SC": 0.92,
            "SL": 1.9,
            "SG": 217.38,
            "SK": 86.26,
            "SI": 46.44,
            "SB": 0.67,
            "ZA": 354.41,
            "ES": 1374.78,
            "LK": 48.24,
            "KN": 0.56,
            "LC": 1,
            "VC": 0.58,
            "SD": 65.93,
            "SR": 3.3,
            "SZ": 3.17,
            "SE": 444.59,
            "CH": 522.44,
            "SY": 59.63,
            "TW": 426.98,
            "TJ": 5.58,
            "TZ": 22.43,
            "TH": 312.61,
            "TL": 0.62,
            "TG": 3.07,
            "TO": 0.3,
            "TT": 21.2,
            "TN": 43.86,
            "TR": 729.05,
            "TM": 0,
            "UG": 17.12,
            "UA": 136.56,
            "AE": 239.65,
            "GB": 2258.57,
            "US": 14624.18,
            "UY": 40.71,
            "UZ": 37.72,
            "VU": 0.72,
            "VE": 285.21,
            "VN": 101.99,
            "YE": 30.02,
            "ZM": 15.69,
            "ZW": 5.57
        };

        $('#map-world-visualization').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#81B71A', '#457619'],
                    normalizeFunction: 'polynomial'
                }]
            },
            onRegionTipShow: function(e, el, code){
                el.html(el.html()+' (GDP - $'+gdpData[code]+')');
            }
        });

        $('a[href="#markers"]').on('shown.bs.tab', function () {
            $('#map-world-markers').vectorMap({
                map: 'world_mill_en',
                scaleColors: ['#C8EEFF', '#0071A4'],
                normalizeFunction: 'polynomial',
                hoverOpacity: 0.7,
                hoverColor: false,
                markerStyle: {
                    initial: {
                        fill: '#81B71A',
                        stroke: '#383f47'
                    }
                },
                backgroundColor: '#383f47',
                markers: [
                    {latLng: [41.90, 12.45], name: 'Vatican City'},
                    {latLng: [43.73, 7.41], name: 'Monaco'},
                    {latLng: [-0.52, 166.93], name: 'Nauru'},
                    {latLng: [-8.51, 179.21], name: 'Tuvalu'},
                    {latLng: [43.93, 12.46], name: 'San Marino'},
                    {latLng: [47.14, 9.52], name: 'Liechtenstein'},
                    {latLng: [7.11, 171.06], name: 'Marshall Islands'},
                    {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
                    {latLng: [3.2, 73.22], name: 'Maldives'},
                    {latLng: [35.88, 14.5], name: 'Malta'},
                    {latLng: [12.05, -61.75], name: 'Grenada'},
                    {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
                    {latLng: [13.16, -59.55], name: 'Barbados'},
                    {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
                    {latLng: [-4.61, 55.45], name: 'Seychelles'},
                    {latLng: [7.35, 134.46], name: 'Palau'},
                    {latLng: [42.5, 1.51], name: 'Andorra'},
                    {latLng: [14.01, -60.98], name: 'Saint Lucia'},
                    {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
                    {latLng: [1.3, 103.8], name: 'Singapore'},
                    {latLng: [1.46, 173.03], name: 'Kiribati'},
                    {latLng: [-21.13, -175.2], name: 'Tonga'},
                    {latLng: [15.3, -61.38], name: 'Dominica'},
                    {latLng: [-20.2, 57.5], name: 'Mauritius'},
                    {latLng: [26.02, 50.55], name: 'Bahrain'},
                    {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
                ]
            });
        });
    </script>
@endpush
