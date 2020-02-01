<?php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];

    switch ($msg) {
        case 1:
            ?>
            <div class="message">
                <div class="alert alert-danger">
                    <a href="index.php" class="close" data-dismiss="alert">&times</a>
                    Email ou Senha errados tente outra vez.
                </div>
            </div>
            <?php
            break;
        case 2:
            ?>
            <div class="message">
                <div class="alert alert-danger">
                    <a href="index.php" class="close" data-dismiss="alert">&times</a>
                    Você não tem permissão para acessar esta página.
                </div>
            </div>
            <?php
            break;
        case 3:
            ?>
            <div class="message">
                <div class="alert alert-success">
                    <a href="index.php" class="close" data-dismiss="alert">&times</a>
                    Logout realizado com sucesso.
                </div>
            </div>
            <?php
            break;
        case 4:
            ?>
            <div class="message">
                <div class="alert alert-success">
                    <a href="index.php" class="close" data-dismiss="alert">&times</a>
                    Você tentou burlar o sistema de autenticação, sua tentativa foi registrada assim tambem como seu IP.
                </div>
            </div>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Entrar | SisComenda</title>

        <!--=== CSS ===-->

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme -->
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

        <!-- Login -->
        <link href="assets/css/login.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
        <!--[if IE 7]>
                <link rel="stylesheet" href="/assets/css/fontawesome/font-awesome-ie7.min.css">
        <![endif]-->

        <!--[if IE 8]>
                <link href="/assets/css/ie8.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>-->

        <!--=== JavaScript ===-->

        <script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>

        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="/assets/js/libs/html5shiv.js"></script>
        <![endif]-->

        <!-- General -->
        <script type="text/javascript" src="assets/js/libs/breakpoints.js"></script>

        <!-- Forms -->
        <script type="text/javascript" src="plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->

        <!-- Beautiful Checkboxes -->
        <script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>

        <!-- Form Validation -->
        <script type="text/javascript" src="plugins/validation/jquery.validate.min.js" charset="utf-8"></script>

        <!-- Slim Progress Bars -->
        <script type="text/javascript" src="plugins/nprogress/nprogress.js"></script>

        <!-- App -->
        <script type="text/javascript" src="assets/js/login.js"></script>

        <!-- Forms -->
        <script type="text/javascript" src="plugins/bootstrap-inputmask/jquery.inputmask.min.js"></script>

        <!-- Personalizadas -->
        <script type="text/javascript" src="assets/js/funcoes.js"></script>

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

                Login.init(); // Init login JavaScript

                $('.back').hide();
                $('#btn_cadastrar').hide();
            });

            $(function () {
                $('#btn_cadastrar').prop('readonly', true);
            });

            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

        </script>
    </head>

    <body class="login" onKeyDown="if (event.keyCode == '13') { return false }">

        <!-- Logo -->
        <div class="logo">
            <strong>SisComenda</strong><br />
        </div>

        <!-- /Logo -->
        <div class="logo">
            <img src="assets/img/leitura-logo.png" alt=""/>
        </div>

        <!-- Login Box -->
        <div class="box">
            <div class="content">
                <!-- Login Formular -->
                <form class="form-vertical login-form" action="../controller/autenticar_usuario.php" method="post">
                    
                    <!-- Title -->
                    <h6 class="form-title">Sistema de Encomendas Livraria Leitura</h6>

                    <h3 class="form-title">Entre em sua conta</h3>

                    <!-- Error Message -->
                    <div class="alert fade in alert-danger" style="display: none;">
                        <i class="icon-remove close" data-dismiss="alert"></i>
                        Login e senha são obrigatórios.
                    </div>

                    <!-- Input Fields -->
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="icon-user"></i>
                            <input type="text" name="login" class="form-control" placeholder="Usuário"  data-rule-required="true" data-msg-required="Este campo é obrigatório."/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon">
                            <i class="icon-lock"></i>
                            <input type="password" name="senha" class="form-control" placeholder="Senha" data-rule-required="true" data-msg-required="Informe sua senha." maxlength="6" />
                        </div>
                    </div>
                    <!-- /Input Fields -->

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="submit" class="submit btn btn-success pull-right">
                            Acessar> <i class="icon-angle-right"></i>
                        </button>
                    </div>
                </form>

                <!-- Register Formular (hidden by default) -->
                <form class="form-vertical register-form" action="#" name="cadastro" id="cadastro" method="post" style="display: none;">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">

                                <div class="x_title">
                                    <h2>Cadastro<small></small></h2>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <label for="login">Login: <span class="required">*</span></label>
                                            <input type="text" name="login" id="login" class="form-control" data-rule-required="true" data-msg-required="Este campo é obrigatório." />
                                            <span id="resultado"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="senha">Senha: <span class="required">*</span></label>
                                            <input type="text" name="teste" id="teste" class="form-control" data-rule-required="true" data-msg-required="Este campo é obrigatório."/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="nome">Teste:</label>
                                            <input type="text" name="teste1" id="teste1" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="rg">Teste: <span class="required">*</span></label>
                                            <input type="text" name="teste2" id="rg" class="form-control required digits has-error" data-rule-required="true" data-msg-required="Este campo é obrigatório."/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="button" id="voltar" name="voltar" class="back btn btn-default pull-left"><i class="icon-angle-left"></i> Voltar</button>
                        <button type="button" id="btn_cadastrar" class="submit btn btn-primary pull-right" onClick="validarForm();">Cadastrar <i class="icon-angle-right"></i></button>
                    </div> 
                </form>
                <!-- /Register Formular -->
            </div> <!-- /.content -->

            <!-- Forgot Password Form -->
            <div class="inner-box">
                <div class="content">
                    <!-- Close Button -->
                    <i class="icon-remove close hide-default"></i>

                    <!-- Link as Toggle Button -->
                    <a href="#" onclick="redefinirSenha();" class="forgot-password-link">Esqueceu a senha?</a>
                </div> <!-- /.content -->
            </div>
            <!-- /Forgot Password Form -->
        </div>
        <!-- /Login Box -->

        <!-- Footer -->
        <div class="footer">
            <a href="#" class="sign-up">Não está cadastrado ainda? <strong>Cadastre-se</strong></a>
        </div>
        <!-- /Footer -->

    </body>
</html>