<?php
session_start();
require_once '../conexao/Conexao_BD.php';?>
<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Sisweb</title>

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
        <script type="text/javascript" src="plugins/flot/jquery.flot.growraf.min.js"></script>
        <script type="text/javascript" src="plugins/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

        <script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>

        <script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>

        <!-- Noty -->
        <script type="text/javascript" src="plugins/noty/jquery.noty.js"></script>
        <script type="text/javascript" src="plugins/noty/layouts/top.js"></script>
        <script type="text/javascript" src="plugins/noty/themes/default.js"></script>

        <!-- Forms -->
        <script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="plugins/select2/select2.min.js"></script>

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
        <script type="text/javascript" src="assets/js/demo/pages_calendar.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_filled_blue.js"></script>
        <script type="text/javascript" src="assets/js/demo/charts/chart_simple.js"></script>
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
                                <a href="index.php">Usuário</a>
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
                            <h3>Encomenda de Livros</h3>
                            <span>Olá, <?php echo$_SESSION['login'];?>!</span>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!--=== Page Content ===-->
                    <!--=== Statboxes ===-->
                    <div class="row row-bg"> <!-- .row-bg -->
                        <div class="col-sm-6 col-md-3">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content">
                                    <div class="visual cyan">
                                        <div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>
                                    </div>
                                    <div class="title">Livros</div>
                                    <div class="value">4 501</div>
                                    <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
                                </div>
                            </div> <!-- /.smallstat -->
                        </div> <!-- /.col-md-3 -->

                        <div class="col-sm-6 col-md-3">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content">
                                    <div class="visual green">
                                        <div class="statbox-sparkline">20,30,30,29,22,15,20,30,32</div>
                                    </div>
                                    <div class="title">Editoras</div>
                                    <div class="value">714</div>
                                    <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
                                </div>
                            </div> <!-- /.smallstat -->
                        </div> <!-- /.col-md-3 -->

                        <div class="col-sm-6 col-md-3 hidden-xs">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content">
                                    <div class="visual yellow">
                                        <div class="statbox-sparkline">30,30,30,29,22,15,20,30,32</div>
                                    </div>
                                    <div class="title">Encomendas</div>
                                    <div class="value">42,512.61</div>
                                    <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
                                </div>
                            </div> <!-- /.smallstat -->
                        </div> <!-- /.col-md-3 -->

                        <div class="col-sm-6 col-md-3 hidden-xs">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content">
                                    <div class="visual red">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="title">Usuários</div>
                                    <div class="value">2 521 719</div>
                                    <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
                                </div>
                            </div> <!-- /.smallstat -->
                        </div> <!-- /.col-md-3 -->
                    </div> <!-- /.row -->
                    <!-- /Statboxes -->

                    <!--=== Blue Chart ===-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Total Clicks (<span class="blue">+29%</span>)</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="chart_filled_blue" class="chart"></div>
                                </div>
                                <div class="divider"></div>
                                <div class="widget-content">
                                    <ul class="stats"> <!-- .no-dividers -->
                                        <li>
                                            <strong>4,853</strong>
                                            <small>Total Views</small>
                                        </li>
                                        <li class="light hidden-xs">
                                            <strong>271</strong>
                                            <small>Last 24 Hours</small>
                                        </li>
                                        <li>
                                            <strong>1,025</strong>
                                            <small>Unique Users</small>
                                        </li>
                                        <li class="light hidden-xs">
                                            <strong>105</strong>
                                            <small>Last 24 Hours</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- /.col-md-12 -->
                    </div> <!-- /.row -->
                    <!-- /Blue Chart -->
                </div>
                <!-- /.container -->
            </div>
        </div>
    </body>
</html>