<!DOCTYPE html>
<?php
if (!isset($_SESSION))session_start();
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Charts &amp; Statistics | Melon - Flat &amp; Responsive Admin Template</title>

        <!--=== CSS ===-->

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- jQuery UI -->
        <!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
        <!--[if lt IE 9]>
                <link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
        <![endif]-->

        <!-- Theme -->
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
        <!--[if IE 7]>
                <link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
        <![endif]-->

        <!--[if IE 8]>
                <link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

        <!--=== JavaScript ===-->

        <script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="assets/js/libs/html5shiv.js"></script>
        <![endif]-->

        <!-- Smartphone Touch Events -->
        <script type="text/javascript" src="plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
        <script type="text/javascript" src="plugins/event.swipe/jquery.event.move.js"></script>
        <script type="text/javascript" src="plugins/event.swipe/jquery.event.swipe.js"></script>

        <!-- General -->
        <script type="text/javascript" src="assets/js/libs/breakpoints.js"></script>
        <script type="text/javascript" src="plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
        <script type="text/javascript" src="plugins/cookie/jquery.cookie.min.js"></script>
        <script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

        <!-- Page specific plugins -->
        <!-- Charts -->
        <!--[if lt IE 9]>
                <script type="text/javascript" src="plugins/flot/excanvas.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="plugins/sparkline/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
        <script type="text/javascript" src="plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
        <script type="text/javascript" src="plugins/flot/jquery.flot.time.min.js"></script>
        <script type="text/javascript" src="plugins/flot/jquery.flot.orderBars.min.js"></script>
        <script type="text/javascript" src="plugins/flot/jquery.flot.pie.min.js"></script>
        <script type="text/javascript" src="plugins/flot/jquery.flot.selection.min.js"></script>
        <script type="text/javascript" src="plugins/flot/jquery.flot.growraf.min.js"></script>
        <script type="text/javascript" src="plugins/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

        <script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>

        <!-- App -->
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/plugins.js"></script>
        <script type="text/javascript" src="assets/js/plugins.form-components.js"></script>

        <script>
            $(document).ready(function () {
                "use strict";

                App.init(); // Init layout and core plugins
                Plugins.init(); // Init all plugins
                FormComponents.init(); // Init all form-specific plugins
            });
        </script>

        <!-- Demo JS -->
        <script type="text/javascript" src="assets/js/custom.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_bars_horizontal.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_bars_vertical.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_donut.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_filled_blue.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_filled_green.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_filled_red.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_multiple.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_pie.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_simple.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_updating.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_widget.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_selection_zooming.js"></script>

    </head>
    <body>
<?php include_once "header.php"; ?>

        <div id="container">
<?php include_once "menu.php"; ?>
            <div id="content">
                <div class="container">
                    <!-- Breadcrumbs line -->
                    <div class="crumbs">
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="home.php">Usuário</a>
                            </li>
                            <li class="current">
                                <a href="#" title="">Calendar</a>
                            </li>
                        </ul>					
                    </div>
                    <!-- /Breadcrumbs line -->

                    <!--=== Page Header ===-->
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Gráfico de Defeitos</h3>
                            <span>Todos defeitos</span>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget box">
                                <div class="widget-chart"> <!-- Possible colors: widget-chart-blue, widget-chart-blueLight (standard), widget-chart-green, widget-chart-red, widget-chart-yellow, widget-chart-orange, widget-chart-purple, widget-chart-gray -->
                                    <div id="chart_widget" class="chart chart-medium"></div>
                                </div>
                                <div class="widget-content">
                                    <ul class="stats"> <!-- .no-dividers -->
                                        <li>
                                            <strong>4,853</strong>
                                            <small>Total Views</small>
                                        </li>
                                        <li class="light">
                                            <strong>271</strong>
                                            <small>Last 24 Hours</small>
                                        </li>
                                        <li>
                                            <strong>1,025</strong>
                                            <small>Unique Users</small>
                                        </li>
                                        <li class="light">
                                            <strong>105</strong>
                                            <small>Last 24 Hours</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Widget Chart -->

                    <!--=== Multiple Statistics ===-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Multiple Statistics</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div id="chart_multiple" class="chart"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="progress-stats">
                                                <span class="title"><i class="icon-puzzle-piece"></i> Puzzles Completed <span>30/50</span></span>
                                                <div class="progress progress-mini progress-striped">
                                                    <div class="progress-bar progress-bar-info" style="width: 65%;"></div>
                                                </div>
                                            </div>
                                            <div class="progress-stats">
                                                <span class="title"><i class="icon-cloud-download"></i> Downloads <span>42/128 MB</span></span>
                                                <div class="progress progress-mini progress-success progress-striped">
                                                    <div class="progress-bar progress-bar-success" style="width: 30%;"></div>
                                                </div>
                                            </div>
                                            <div class="progress-stats">
                                                <span class="title"><i class="icon-cloud"></i> Space <span>2961/4096 MB</span></span>
                                                <div class="progress progress-mini progress-warning progress-striped">
                                                    <div class="progress-bar progress-bar-warning" style="width: 80%;"></div>
                                                </div>
                                            </div>
                                            <div class="spacing-10px"></div>
                                            <button type="button" class="btn btn-block btn-primary">Generate Report</button>
                                            <button type="button" class="btn btn-block btn-danger">Cancel Account</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="widget-content">
                                    <ul class="stats no-dividers">
                                        <li class="circular-chart-inline">
                                            <div class="circular-chart" data-percent="27" data-size="90">27%</div>
                                            <span class="description">Server Load</span>
                                        </li>
                                        <li class="circular-chart-inline">
                                            <div class="circular-chart" data-percent="75" data-size="90" data-bar-color="#e25856">75%</div>
                                            <span class="description">Used RAM</span>
                                        </li>
                                        <li class="circular-chart-inline">
                                            <div class="circular-chart" data-percent="10" data-size="90" data-bar-color="#8fc556">281 MB</div>
                                            <span class="description">Space</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Multiple Statistics -->

                    <!--=== Selection and Zooming ===-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Selection and Zooming</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_selection_zooming" class="chart"></div>
                                </div>
                                <div class="divider"></div>
                                <div class="widget-content widget-deeper">
                                    <div id="chart_selection_zooming_overview" class="chart chart-small"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Selection and Zooming -->

                    <!--=== Simple Chart ===-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Simple Chart</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_simple" class="chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Auto Updating Chart</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_updating" class="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Simple Chart -->

                    <!--=== Filled Charts ===-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Filled Chart (Green)</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_filled_green" class="chart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Filled Chart (Red)</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_filled_red" class="chart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Filled Chart (Blue)</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_filled_blue" class="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filled Charts -->

                    <!--=== Bars ===-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Vertical Bars</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_bars_vertical" class="chart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Horizontal Bars</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_bars_horizontal" class="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Bars -->

                    <!--=== Donut/ Pie ===-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Donut Chart</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_donut" class="chart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Pie Chart</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_pie" class="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Donut/ Pie -->

                    <!--=== Circular Charts ===-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Circular Charts</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs circular-charts-reload"><i class="icon-refresh"></i> Reload</span>
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <ul class="stats">
                                        <li>
                                            <div class="circular-chart demo-reload" data-percent="62"><span>62</span>%</div>
                                            <a href="javascript:void(0);" class="title">Used RAM <i class="icon-angle-right"></i></a>
                                        </li>
                                        <li>
                                            <div class="circular-chart demo-reload" data-percent="80" data-bar-color="#e25856">-<span>80</span>%</div>
                                            <a href="javascript:void(0);" class="title">Bounce Rate <i class="icon-angle-right"></i></a>
                                        </li>
                                        <li>
                                            <div class="circular-chart demo-reload" data-percent="26" data-bar-color="#8fc556"><span>26</span>%</div>
                                            <a href="javascript:void(0);" class="title">New Visitors <i class="icon-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="divider"></div>
                                <div class="widget-content">
                                    <ul class="stats">
                                        <li class="circular-chart-inline">
                                            <div class="circular-chart demo-reload" data-percent="62"><span>62</span>%</div>
                                            <a href="javascript:void(0);" class="description">Used RAM <i class="icon-angle-right"></i></a>
                                        </li>
                                        <li class="circular-chart-inline">
                                            <div class="circular-chart demo-reload" data-percent="80" data-bar-color="#e25856">-<span>80</span>%</div>
                                            <a href="javascript:void(0);" class="description">Bounce Rate <i class="icon-angle-right"></i></a>
                                        </li>
                                        <li class="circular-chart-inline">
                                            <div class="circular-chart demo-reload" data-percent="26" data-bar-color="#8fc556"><span>26</span>%</div>
                                            <a href="javascript:void(0);" class="description">New Visitors <i class="icon-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Circular Charts -->
                    <!-- /Page Content -->
                </div>
            </div>
    </body>
</html>