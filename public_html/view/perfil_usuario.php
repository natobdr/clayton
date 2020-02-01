<!DOCTYPE html>
<?php
if (!isset($_SESSION))
    session_start();

$socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
if ($socket)
{
    if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0)))
    {
        stream_set_timeout($socket, 1);
        $unpack0 = unpack("N12", fread($socket, 48));
        
    }

    fclose($socket);
}
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Cadastro de Carros</title>

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
        <script type="text/javascript" src="assets/js/demo/charts/chart_filled_blue.js"></script>

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
                                <a href="#" title="">Calendario</a>
                            </li>
                        </ul>					
                    </div>
                    <!-- /Breadcrumbs line -->

                    <!--=== Page Header ===-->
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Perfil do Usuário</h3>
                            <span>Bom dia/Boa tard/Boa noite, Usuário!</span>                          
                        </div>
                    <!-- /Page Header -->

                    <!--=== Page Content ===-->
                    <!--=== Inline Tabs ===-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Tabs-->
                            <div class="tabbable tabbable-custom tabbable-full-width">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_overview" data-toggle="tab">Visão geral</a></li>
                                    <li><a href="#tab_edit_account" data-toggle="tab">Editar conta</a></li>
                                </ul>
                                <div class="tab-content row">
                                    <!--=== Overview ===-->
                                    <div class="tab-pane active" id="tab_overview">
                                        <div class="col-md-3">
                                            <div class="list-group">
                                                <li class="list-group-item no-padding">
                                                    <img src="assets/img/demo/avatar-large.jpg" alt="">
                                                </li>
                                                <a href="javascript:void(0);" class="list-group-item">Projetos</a>
                                                <a href="javascript:void(0);" class="list-group-item">Mensagens</a>
                                                <a href="javascript:void(0);" class="list-group-item"><span class="badge">3</span>Amigos</a>
                                                <a href="javascript:void(0);" class="list-group-item">Configurações</a>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="row profile-info">
                                                <div class="col-md-7">
                                                    <div class="alert alert-info">You will receive all future updates for free!</div>
                                                    <h1>John Doe</h1>

                                                    <dl class="dl-horizontal">
                                                        <dt>Description lists</dt>
                                                        <dd>A description list is perfect for defining terms.</dd>
                                                        <dt>Euismod</dt>
                                                        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                                        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                                        <dt>Malesuada porta</dt>
                                                        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                                        <dt>Felis euismod semper eget lacinia</dt>
                                                        <dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                                                    </dl>

                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="widget">
                                                        <div class="widget-header">
                                                            <h4><i class="icon-reorder"></i> Sales</h4>
                                                        </div>
                                                        <div class="widget-content">
                                                            <div id="chart_filled_blue" class="chart"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.row -->

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="widget">
                                                        <div class="widget-content">
                                                            <table class="table table-hover table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>First Name</th>
                                                                        <th>Last Name</th>
                                                                        <th class="hidden-xs">Username</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Joey</td>
                                                                        <td>Greyson</td>
                                                                        <td class="hidden-xs">joey123</td>
                                                                        <td><span class="label label-success">Approved</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Wolf</td>
                                                                        <td>Bud</td>
                                                                        <td class="hidden-xs">wolfy</td>
                                                                        <td><span class="label label-info">Pending</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Darin</td>
                                                                        <td>Alec</td>
                                                                        <td class="hidden-xs">alec82</td>
                                                                        <td><span class="label label-warning">Suspended</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Andrea</td>
                                                                        <td>Brenden</td>
                                                                        <td class="hidden-xs">andry</td>
                                                                        <td><span class="label label-danger">Blocked</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Striped Table -->
                                            </div> <!-- /.row -->
                                        </div> <!-- /.col-md-9 -->
                                    </div>
                                    <!-- /Overview -->

                                    <!--=== Edit Account ===-->
                                    <div class="tab-pane" id="tab_edit_account">
                                        <form class="form-horizontal" action="#">
                                            <div class="col-md-12">
                                                <div class="widget">
                                                    <div class="widget-header">
                                                        <h4>Informação geral</h4>
                                                    </div>
                                                    <div class="widget-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Primeiro nome:</label>
                                                                    <div class="col-md-8"><input type="text" name="regular" class="form-control" value="John"></div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Último nome:</label>
                                                                    <div class="col-md-8"><input type="text" name="regular" class="form-control" value="Doe"></div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Gênero:</label>
                                                                    <div class="col-md-8">
                                                                        <select class="form-control">
                                                                            <option value="male" selected="selected">Masculino</option>
                                                                            <option value="female">Feminino</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Idade:</label>
                                                                    <div class="col-md-8"><input type="text" name="regular" class="form-control input-width-small" value="28"></div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- /.row -->
                                                    </div> <!-- /.widget-content -->
                                                </div> <!-- /.widget -->
                                            </div> <!-- /.col-md-12 -->

                                            <div class="col-md-12 form-vertical no-margin">
                                                <div class="widget">
                                                    <div class="widget-header">
                                                        <h4>Configurações</h4>
                                                    </div>
                                                    <div class="widget-content">
                                                        <div class="row">
                                                            <div class="col-md-4 col-lg-2">
                                                                <strong class="subtitle padding-top-10px">Nome de usuário permanente</strong>
                                                                <p class="text-muted">Mensagem...</p>
                                                            </div>

                                                            <div class="col-md-8 col-lg-10">
                                                                <div class="form-group">
                                                                    <label class="control-label padding-top-10px">Usuário:</label>
                                                                    <input type="text" name="username" class="form-control" value="john.doe" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div> <!-- /.row -->
                                                        <div class="row">
                                                            <div class="col-md-4 col-lg-2">
                                                                <strong class="subtitle">Mudar senha</strong>
                                                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                            </div>

                                                            <div class="col-md-8 col-lg-10">
                                                                <div class="form-group">
                                                                    <label class="control-label">Senha Antiga:</label>
                                                                    <input type="password" name="old_password" class="form-control" placeholder="Deixar vazio sem alteração de senha">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">Nova Senhas:</label>
                                                                    <input type="password" name="new_password" class="form-control" placeholder="Deixar vazio sem alteração de senha">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">Repita a nova senha:</label>
                                                                    <input type="password" name="new_password_repeat" class="form-control" placeholder="Deixar vazio sem alteração de senha">
                                                                </div>
                                                            </div>
                                                        </div> <!-- /.row -->
                                                    </div> <!-- /.widget-content -->
                                                </div> <!-- /.widget -->

                                                <div class="form-actions">
                                                    <input type="submit" value="Atualizar Conta" class="btn btn-primary pull-right">
                                                </div>
                                            </div> <!-- /.col-md-12 -->
                                        </form>
                                    </div>
                                    <!-- /Edit Account -->
                                </div> <!-- /.tab-content -->
                            </div>
                            <!--END TABS-->
                        </div>
                    </div> <!-- /.row -->
                    <!-- /Page Content -->

                </div>
                <!-- /.container -->
            </div>
        </div>
    </body>
</html>