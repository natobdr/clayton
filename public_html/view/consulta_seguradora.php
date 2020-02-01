<!DOCTYPE html>
<?php 
    if (!isset($_SESSION)) session_start();
    
    require_once '../model/Seguradora.php';
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Consulta de Seguradora</title>

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

        <!-- DataTables -->
        <script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="plugins/datatables/DT_bootstrap.js"></script>
        <script type="text/javascript" src="plugins/datatables/responsive/datatables.responsive.js"></script> <!-- optional -->

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
                            <h3>Lista de Seguradora</h3>
                            <span>Seguradora cadastradas</span>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!--=== Page Content ===-->
                    <!--=== Normal ===-->
                    <div class="row">
                        <div class="col-md-12">

                            <div style="padding: 5px 0px 5px; text-align: right;">
                                <button id="bntNovoUsuario" type="button" class="btn btn-success"  onclick="location.href = 'cadastro_seguradora.php'"><i class="icon-plus-sign"></i> Nova Seguradora</button>
                            </div>

                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Lista de Seguradora</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content no-padding">
                                    <table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable">
                                        <thead>
                                            <tr>
                                                <th data-class="expand">Código</th>
                                                <th>Nome</th>
                                                <th data-hide="phone,tablet">Telefone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                            $seguradora = new Seguradora();
                                            $dados = $seguradora->buscarSeguradora();
                                            $d = new ArrayIterator($dados);
                                            
                                            while ($d->valid()){ 
                                            ?>
                                            <tr>
                                                <td><?php echo $d->current()->id_seguradora; ?></td>
                                                <td><?php echo $d->current()->nome_seguradora; ?></td>
                                                <td><?php echo $d->current()->tel_seguradora; ?></td>
                                            </tr>
                                        <?php
                                                $d->next();
                                            }
                                        ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Normal -->
                    <!-- /Page Content -->
                </div>
                <!-- /.container -->
            </div>
        </div>

        <!-- Modal Deletar-->
        <!--
        <div class="modal fade" id="myModalDeletarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                    </div>
                    <div class="modal-body">
                        <form action="../acoes/acaoDeletarUsuario.php" method="get">                                                                     
                            <div class="form-group">                       
                                <label for="recipient-name" class="control-label">Código:</label>
                                <input type="text" class="form-control" id="recipient-codigo" name="txtCodigo" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Nome:</label>
                                <input type="text" name="txtNome" class="form-control" required id="recipient-nome" readonly>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                <button type="submit" class="btn btn-info">Sim</button>
                            </div>       
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
    </body>
</html>
