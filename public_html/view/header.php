<?php
require_once '../conexao/Conexao_BD.php';
require_once '../conexao/config.php';
?>
<!-- Header -->
<header class="header navbar navbar-fixed-top" role="banner">
    <!-- Top Navigation Bar -->
    <div class="container">

        <!-- Only visible on smartphones, menu toggle -->
        <ul class="nav navbar-nav">
            <li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
        </ul>

        <!-- Logo -->
        <a class="navbar-brand" href="home.php">
            <!--img src="assets/img/logo.png" alt="logo" />-->
            <strong>Sis</strong>Web
        </a>
        <!-- /logo -->

        <!-- Sidebar Toggler -->
        <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
            <i class="icon-reorder"></i>
        </a>
        <!-- /Sidebar Toggler -->

        <!-- Top Left Menu -->
        <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
            <li>
                <a href="home.php">
                    Início
                </a>
            </li>				
        </ul>
        <!-- /Top Left Menu -->

        <!-- Top Right Menu -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Messages -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-envelope"></i>
                    <span class="badge">1</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <li class="title">
                        <p>Você tem 3 novas mensagens</p>
                    </li>
                    <li>
                        <a href="home.php">
                            <span class="photo"><img src="assets/img/demo/avatar-1.jpg" alt="" /></span>
                            <span class="subject">
                                <span class="from">Cebola</span>
                                <span class="time">Agora mesmo</span>
                            </span>
                            <span class="text">
                                Cadê você cara?
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="home.php">
                            <span class="photo"><img src="assets/img/demo/avatar-2.jpg" alt="" /></span>
                            <span class="subject">
                                <span class="from">Caroline</span>
                                <span class="time">45 mins</span>
                            </span>
                            <span class="text">
                                Vou me atrasar...
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="home.php">
                            <span class="photo"><img src="assets/img/demo/avatar-3.jpg" alt="" /></span>
                            <span class="subject">
                                <span class="from">Rodolfo</span>
                                <span class="time">6 horas</span>
                            </span>
                            <span class="text">
                                Morder demais, cadê você?
                            </span>
                        </a>
                    </li>
                    <li class="footer">
                        <a href="home.php">Visualizar todas as mensagens</a>
                    </li>
                </ul>
            </li>


            <!-- User Login Dropdown -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
                    <i class="icon-male"></i>
                    <span class="username"><?php echo $_SESSION['login']?></span>
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="home.php"><i class="icon-user"></i> Meu Perfil</a></li>
                    <li><a href="home.php"><i class="icon-calendar"></i> Meu Calendário</a></li>
                    <li><a href="home.php"><i class="icon-tasks"></i> Minhas Manutenções</a></li>
                    <li class="divider"></li>
                    <li><a href="login.php"><i class="icon-off"></i> Sair do Sistema</a></li>
                </ul>
            </li>
            <!-- /user login dropdown -->
        </ul>
        <!-- /Top Right Menu -->
    </div>
    <!-- /top navigation bar -->
</header> <!-- /.header -->