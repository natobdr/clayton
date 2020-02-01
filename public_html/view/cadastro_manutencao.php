<!DOCTYPE html>
<?php
if (!isset($_SESSION)) session_start();

require_once '../model/Manutencao.php';
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Cadastro de Manutenções</title>

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
        <script type="text/javascript" src="plugins/inputlimiter/jquery.inputlimiter.min.js"></script>
        <script type="text/javascript" src="plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->
        <script type="text/javascript" src="plugins/fileinput/fileinput.js"></script>

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
                            <h3>Cadastro de Manutenções</h3>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!--=== Page Content ===-->
                    <div class="row">
                        <!--=== Validation Example 1 ===-->
                        <div class="col-md-12">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i>Manutenção</h4>
                                </div>
                                <div class="widget-content">
                                    <form class="form-horizontal row-border" id="validate-1" action="../controller/cadastrarManutencao.php" method="POST">
                                        
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <label class="col-md-3 control-label">Carro <span class="required">*</span></label>
                                                <div class="col-md-5 clearfix">
                                                    <select name="txtCarro" class="col-md-12 select2 full-width-fix required" data-msg-required>
                                                        <option></option>
                                                        <?php
                                                        $manutencao = new Manutencao();
                                                        $carros_encontrados = $manutencao->exibirCarrosSelect();
                                                        if (!empty($carros_encontrados)) {
                                                            foreach ($carros_encontrados as $local) {
                                                        ?>
                                                        <option value="<?php echo $local->id_carro ?>"><?php echo $local->modelo.' / '.$local->ano_fabricacao.' - '.$local->nome_fabricante?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;">Selecione o modelo do seu carro</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <label class="col-md-3 control-label">Manutenção <span class="required">*</span></label>
                                                <div class="col-md-5 clearfix">
                                                    <select name="txtManutencao" class="col-md-12 select2 full-width-fix required" data-msg-required>
                                                        <option></option>
                                                        <?php
                                                        $manutencao = new Manutencao();
                                                        $tipo_manutencoes_encontradas = $manutencao->exibirTipoManutencaoSelect();
                                                        if (!empty($tipo_manutencoes_encontradas)) {
                                                            foreach ($tipo_manutencoes_encontradas as $local) {
                                                        ?>
                                                        <option value="<?php echo $local->id_tipo_manutencao?>"><?php echo $local->nome_manutencao?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;">Selecione o tipo de manutenção para seu carro</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <label class="col-md-3 control-label">Oficina <span class="required">*</span></label>
                                                <div class="col-md-5 clearfix">
                                                    <select name="txtOficina" class="col-md-12 select2 full-width-fix required" data-msg-required>
                                                        <option></option>
                                                        <?php
                                                        $manutencao = new Manutencao();
                                                        $oficinas_encontradas = $manutencao->exibirOficinaSelect();
                                                        if (!empty($oficinas_encontradas)) {
                                                            foreach ($oficinas_encontradas as $local) {
                                                        ?>
                                                        <option value="<?php echo $local->id_oficina ?>"><?php echo $local->nome_oficina .' / '.$local->endereco.' / '.$local->tel_oficina?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;">Selecione a oficina mais próxima a você</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <label class="col-md-3 control-label">Observação <span class="required">*</span></label>
                                                <div class="col-md-6 clearfix">
                                                    <textarea rows="5" cols="5" name="txtObservacao" class="limited form-control" data-limit="100"></textarea>
                                                    <!--<span class="help-block" id="limit-text"></span>-->
                                                    <span class="help-block">Máximo 100 caracteres</span>
                                                </div>
                                            </div>
                                        </div>                                     

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary pull-right"><i class="icon-save"></i> Salvar</button>
                                            <button type="button" class="btn btn-info pull-right" onClick="window.location = 'consulta_manutencao.php';" ><i class="icon-undo"></i> Voltar</button>
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