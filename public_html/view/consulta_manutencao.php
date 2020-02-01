<!DOCTYPE html>
<?php 
    if (!isset($_SESSION)) session_start();
    
require_once '../model/Manutencao.php';

?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Consulta de Manutenções</title>

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
                
                /*Script Modal Manutenção*/
            $('#myModalEditarManutencao').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var recipientid = button.data('whateverid')
                var recipientcarro = button.data('whateveridcarro')
                var recipientmanutencao = button.data('whateveridtipomanutencao')
                var recipientoficina = button.data('whateveridoficina')
                var recipientobservacao = button.data('whateverobservacao')

                var modal = $(this)
                modal.find('.modal-title').text('Editar Manutenção ' /*+ recipientnome*/)
                modal.find('#recipient-codigo').val(recipientid)
                modal.find('#recipient-carro').val(recipientcarro)
                modal.find('#recipient-manutencao').val(recipientmanutencao)
                modal.find('#recipient-oficina').val(recipientoficina)
                modal.find('#recipient-observacao').val(recipientobservacao)
            })
            
            $('#myModalDeletarManutencao').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var recipientid = button.data('whateverid')
                var recipientcarro = button.data('whatevercarro')
                var recipientmanutencao = button.data('whatevermanutencao')

                var modal = $(this)
                modal.find('.modal-title').text('Tem certeza que deseja excluir?')
                modal.find('#recipient-codigo').val(recipientid)
                modal.find('#recipient-carro').val(recipientcarro)
                modal.find('#recipient-manutencao').val(recipientmanutencao)
            })
            
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
                            <h3>Lista de Manutenções</h3>
                            <span>Manutenções cadastradas</span>
                        </div>
                    </div>
                    <!-- /Page Header -->
                                        
                    <!--=== Page Content ===-->
                    <!--=== Normal ===-->
                    <div class="row">
                        <div class="col-md-12">

                            <div style="padding: 5px 0px 5px; text-align: right;">
                                <button id="bntNovoUsuario" type="button" class="btn btn-success"  onclick="location.href = 'cadastro_manutencao.php'"><i class="icon-plus-sign"></i> Nova Manutenção</button>
                            </div>

                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-reorder"></i> Lista de Manutenções</h4>
                                    <div class="toolbar no-padding">
                                        <div class="btn-group">
                                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    
                                    <!--Mensagem de retorno - Sucesso ao cadastrar manutenção-->
                                    <?php if (isset($_SESSION['msgSucesso'])) { ?>
                                        <div class="alert alert-success fade in">
                                            <i class="icon-remove close" data-dismiss="alert"></i>
                                            <div style="text-align: center; font-size: 15px;">
                                                <?php
                                                echo $_SESSION['msgSucesso'];
                                                $_SESSION['msgSucesso'] = null;
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    
                                    <!--Mensagem de retorno - Sucesso ao alterar manutenção-->
                                    <?php if (isset($_SESSION['msgUpdate'])) { ?>
                                        <div class="alert alert-success fade in">
                                            <i class="icon-remove close" data-dismiss="alert"></i>
                                            <div style="text-align: center; font-size: 15px;">
                                                <?php
                                                echo $_SESSION['msgUpdate'];
                                                $_SESSION['msgUpdate'] = null;
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    
                                    <!--Mensagem de retorno - Sucesso ao deletar manutenção-->
                                    <?php if (isset($_SESSION['msgDelete'])) { ?>
                                        <div class="alert alert-success fade in">
                                            <i class="icon-remove close" data-dismiss="alert"></i>
                                            <div style="text-align: center; font-size: 15px;">
                                                <?php
                                                echo $_SESSION['msgDelete'];
                                                $_SESSION['msgDelete'] = null;
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    
                                    <!--Mensagem de retorno - Sucesso ao atualizar serviços-->
                                    <?php if (isset($_SESSION['msgUpdateServico'])) { ?>
                                        <div class="alert alert-success fade in">
                                            <i class="icon-remove close" data-dismiss="alert"></i>
                                            <div style="text-align: center; font-size: 15px;">
                                                <?php
                                                echo $_SESSION['msgUpdateServico'];
                                                $_SESSION['msgUpdateServico'] = null;
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php
                                    try {
                                        $manutencao = new Manutencao();
                                        $dados = $manutencao->buscarManutencao();
                                        $d = new ArrayIterator($dados);
                                    ?>
                                    
                                    <table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable">
                                        <thead>
                                            <tr>
                                                <th data-class="expand">Código</th>
                                                <th>Modelo</th>
                                                <th data-hide="phone">Ano</th>
                                                <th data-hide="phone">Fabricante</th>
                                                <th data-hide="phone">Manutenção</th>
                                                <th data-hide="phone">Oficina / Tel</th>
                                                <th data-hide="phone">Serviço Relazido</th>
                                                <th data-hide="phone,tablet" width="130">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php while ($d->valid()){ ?>
                                            <tr>
                                                <td><?php echo $d->current()->id_manutencao; ?></td>
                                                <td><?php echo $d->current()->modelo; ?></td>
                                                <td><?php echo $d->current()->ano_fabricacao; ?></td>
                                                <td><?php echo $d->current()->nome_fabricante; ?></td>
                                                <td><?php echo $d->current()->nome_manutencao; ?></td>
                                                <td><?php echo $d->current()->nome_tel_oficina; ?></td>
                                                <td>
                                                    <?php
                                                    if ($d->current()->id_servico_realizado == 1) {
                                                        $title = "Desativar Serviço";                                                
                                                    ?>
                                                    <span class="label label-success">FEITO</span> 
                                                    <?php }else{
                                                        $title = "Ativar Serviço";
                                                    ?>
                                                    <span class="label label-warning">PENDENTE</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#myModalEditarManutencao"
                                                            data-whateverid="<?php echo $d->current()->id_manutencao ?>"
                                                            data-whateveridcarro="<?php echo $d->current()->id_carro?>"
                                                            data-whateveridtipomanutencao="<?php echo $d->current()->id_tipo_manutencao?>"
                                                            data-whateveridoficina="<?php echo $d->current()->id_oficina?>"
                                                            data-whateverobservacao="<?php echo $d->current()->observacao?>"
                                                            class="btn-sm btn-primary bs-tooltip" data-placement="top" data-original-title="Editar Manutenção"><i class="icon-edit"></i></button>
                                                            
                                                    <button type="button" class="btn-sm btn-success bs-tooltip" data-placement="top" onClick="window.location='../controller/situacaoServicoManutencao.php?id=<?php echo $d->current()->id_manutencao;?>&servico=<?php  echo $d->current()->id_servico_realizado; ?>';" data-original-title="<?php echo $title;?>"><i class="icon-refresh"></i></button>
                                                            
                                                    <button type="button" data-toggle="modal" data-target="#myModalDeletarManutencao"
                                                            data-whateverid="<?php echo $d->current()->id_manutencao ?>"
                                                            data-whatevercarro="<?php echo $d->current()->modelo.' / '.$d->current()->ano_fabricacao.' - '.$d->current()->nome_fabricante ?>"
                                                            data-whatevermanutencao="<?php echo $d->current()->nome_manutencao ?>"
                                                            class="btn-sm btn-danger bs-tooltip" data-placement="top" data-original-title="Excluir"><i class="icon-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                                $d->next();
                                            }
                                        } catch (Exception $e) {
                                            echo $e->getMessage();                                    
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
        
        <!-- Modal Editar-->
        <div class="modal fade" id="myModalEditarManutencao" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                    </div>
                    <div class="modal-body">

                        <form action="../controller/editarManutencao.php" method="post">
                            <div class="form-group">                       
                                <label for="recipient-codigo" class="control-label">Código:</label>
                                <input type="text" class="form-control" id="recipient-codigo" name="txtCodigo" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="message-text" class="control-label">Carro:</label>
                                <select name="txtCarro" class="form-control" required id="recipient-carro">
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
                            </div>
                            
                            <div class="form-group">
                                <label for="message-text" class="control-label">Manutenção:</label>
                                <select name="txtManutencao" class="form-control" required id="recipient-manutencao">
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
                            </div>
                            
                            <div class="form-group">
                                <label for="message-text" class="control-label">Oficina:</label>
                                <select name="txtOficina" class="form-control" required id="recipient-oficina">
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
                            </div>
                            
                            <div class="form-group">
                                <label for="message-text" class="control-label">Observação:</label>
                                <textarea rows="5" cols="5" name="txtObservacao" class="form-control" maxlength="100" id="recipient-observacao"></textarea>
                                <!--<span class="help-block" id="limit-text"></span>-->
                                <span class="help-block" style="font-size: 11px;">Máximo 100 caracteres</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info">Editar</button>
                            </div>       
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Deletar-->
        <div class="modal fade" id="myModalDeletarManutencao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                    </div>
                    <div class="modal-body">
                        <form action="../controller/excluirManutencao.php" method="post">                                                                     
                            <div class="form-group">                       
                                <label for="recipient-codigo" class="control-label">Código:</label>
                                <input type="text" class="form-control" id="recipient-codigo" name="txtCodigo" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Carro:</label>
                                <input type="text" name="txtCarro" class="form-control" required id="recipient-carro" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Manutencao:</label>
                                <input type="text" name="txtManutencao" class="form-control" required id="recipient-manutencao" readonly>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                <button type="submit" class="btn btn-info">Sim</button>
                            </div>       
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>