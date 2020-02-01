<!DOCTYPE html>
<?php
if (!isset($_SESSION)) session_start();

require_once '../model/CarroCliente.php';

$carroCliente = new CarroCliente();
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
        <script type="text/javascript" src="plugins/sparkline/jquery.sparkline.min.js"></script>

        <script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>

        <!-- Forms -->
        <script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
        <script type="text/javascript" src="plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->
        <script type="text/javascript" src="plugins/fileinput/fileinput.js"></script>
        <script type="text/javascript" src="plugins/bootstrap-inputmask/jquery.inputmask.min.js"></script>

        <!-- Form Validation -->
        <script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
        <script type="text/javascript" src="plugins/validation/localization/messages_pt_BR.js"></script>
        <script type="text/javascript" src="plugins/validation/additional-methods.min.js"></script>

        <!-- Noty -->
        <script type="text/javascript" src="plugins/noty/jquery.noty.js"></script>
        <script type="text/javascript" src="plugins/noty/layouts/top.js"></script>
        <script type="text/javascript" src="plugins/noty/themes/default.js"></script>

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
        <script type="text/javascript" src="assets/js/demo/form_validation.js"></script>
        <script type="text/javascript" src="assets/js/demo/ui_general.js"></script>

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
                            <h3>Cadastro de Carro</h3>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!--=== Page Content ===-->
                    <div class="row">
                        <!--=== Validation Example 1 ===-->
                        <div class="col-md-12">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i>Carro</h4>
                                </div>
                                <div class="widget-content">
                                    <form class="form-horizontal row-border" id="validate-1" action="../controller/cadastrarCarroCliente.php" method="POST">
                                        
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <label class="col-md-3 control-label">Carro <span class="required">*</span></label>
                                                <div class="col-md-6 clearfix">
                                                    <select name="idCarro" class="col-md-12 select2 full-width-fix required">
                                                        <option></option>
                                                        <?php                                                        
                                                        $carros_encontrados = $carroCliente->exibirCarrosSelect();
                                                        if (!empty($carros_encontrados)) {
                                                            foreach ($carros_encontrados as $local) {
                                                        ?>
                                                        <option value="<?php echo $local->id_carro ?>"><?php echo $local->modelo.' / '.$local->ano_fabricacao.' - '.$local->nome_fabricante?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <label class="col-md-3 control-label">Placa: <span class="required">*</span></label>
                                                <div class="col-md-2">
                                                    <input type="text" name="placa" class="form-control required" data-mask="aaa-9999" style="text-transform: uppercase">
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <label class="col-md-3 control-label">Vencimento IPVA <span class="required">*</span></label>
                                                <div class="input-group col-md-3">
                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                    <input type="text" name="vencimentoIpva" required class="form-control datepicker" placeholder="DD/MM/AAAA">
                                                </div>
                                            </div>
                                        </div>   
                                        
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <label class="col-md-3 control-label">Seguradora <span class="required">*</span></label>
                                                <div class="col-md-4 clearfix">
                                                    <select name="idSeguradora" class="col-md-12 select2 full-width-fix required">
                                                        <option></option>
                                                        <?php                                                        
                                                        $seguradoras_encontrados = $carroCliente->exibirSeguradorasSelect();
                                                        if (!empty($seguradoras_encontrados)) {
                                                            foreach ($seguradoras_encontrados as $local) {
                                                        ?>
                                                        <option value="<?php echo $local->id_seguradora ?>"><?php echo $local->nome_seguradora?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="idCliente">
                                        
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary pull-right"><i class="icon-save"></i> Salvar</button>
                                            <button type="button" class="btn btn-info pull-right" onClick="window.location = 'consulta_carro_cliente.php';" ><i class="icon-undo"></i> Voltar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /Validation Example 1 -->
                        </div>
                        <!-- /Page Content -->
                    </div>
                </div>
                <!-- /.container -->
            </div>
        </div>
    </body>
</html>