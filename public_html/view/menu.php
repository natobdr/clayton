<?php
require_once('../functions/funcoes.php');
$_SESSION["current"] = $_SERVER['PHP_SELF'];       
$menu = $_SESSION["current"];

$pagina = $menu;
$pagina = multiexplode(array("/","_"),$pagina);
?>
<div id="sidebar" class="sidebar-fixed">
    <div id="sidebar-content">

        <!--=== Menu ===-->
        <ul id="nav">
            <li class="<?php if(strpos($menu, "home.php")){ echo "current open"; } ?>">
                <a href="home.php">
                    <i class="icon-dashboard"></i>
                    Painel de Controle
                </a>
            </li>
            <li class="<?php if(($pagina[3] == 'consulta') || ($pagina[3] == "cadastro")){ echo "current open"; } ?>">
                <a href="javascript:void(0);">
                    <i class="icon-edit"></i>
                    Cadastros
                </a>
                <ul class="sub-menu">
                    <li class="<?php if ((strpos($menu, "consulta_encomenda_cliente.php")) || (strpos($menu, "cadastro_encomenda_cliente.php"))) { echo "current"; } ?>">
                        <a href="consulta_encomenda_cliente.php">
                            <i class="icon-angle-right"></i>
                            Encomenda
                        </a>
                    </li>
                    <li class="<?php if ((strpos($menu, "consulta_editora.php")) || (strpos($menu, "cadastro_editora.php"))) { echo "current"; } ?>">
                        <a href="consulta_editora.php">
                            <i class="icon-angle-right"></i>
                            Editora
                        </a>
                    </li>
                    <li class="<?php if ((strpos($menu, "consulta_usuario.php")) || (strpos($menu, "cadastro_usuario.php"))) { echo "current"; } ?>">
                        <a href="consulta_usuario.php">
                            <i class="icon-angle-right"></i>
                            Usuario
                        </a>
                    </li>
                    <li class="<?php if ((strpos($menu, "consulta_cliente.php"))) { echo "current"; } ?>">
                        <a href="consulta_cliente.php">
                            <i class="icon-angle-right"></i>
                            Cliente
                        </a>
                    </li>
                    <li class="<?php if ((strpos($menu, "consulta_produto.php")) || (strpos($menu, "cadastro_produto.php"))) { echo "current"; } ?>">
                        <a href="consulta_produto.php">
                            <i class="icon-angle-right"></i>
                            Produtos
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li class="<?php if($pagina[3] == 'relatorio'){ echo "current open"; } ?>">
                <a href="#">
                    <i class="icon-file-text-alt"></i>
                    Relatórios
                </a>
                <ul class="sub-menu">
                    <li class="<?php if (strpos($menu, "relatorio_serv_realizados.php")) { echo "current"; } ?>">
                        <a href="relatorio_serv_realizados.php">
                            <i class="icon-angle-right"></i>
                            Encomendas por Clientes
                        </a>
                    </li>
                    <li class="<?php if (strpos($menu, "relatorio_manutencoes.php")) { echo "current"; } ?>">
                        <a href="relatorio_manutencoes.php">
                            <i class="icon-angle-right"></i>
                            Encomendas por Vendedor
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php if($pagina[3] == 'grafico'){ echo "current open"; } ?>">
                <a href="grafico_defeitos.php">
                    <i class="icon-signal"></i>
                    Gráfico Encomendas
                </a>
            </li>
            <li class="<?php if($pagina[3] == 'perfil'){ echo "current open"; } ?>">
                <a href="perfil_usuario.php">
                    <i class="icon-user"></i>
                    Perfil
                </a>
            </li>
            
            <li>
                <a href="login.php">
                    <i class="icon-off"></i>
                    Sair (Tela Login)
                </a>
            </li>

        </ul>

        <!-- /Menu -->
        <div class="sidebar-title">
        </div>


        <div class="sidebar-widget align-center">
            <div class="btn-group" data-toggle="buttons" id="theme-switcher">
                <label class="btn active">
                    <input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Brilante
                </label>
                <label class="btn">
                    <input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Escuro
                </label>
            </div>
        </div>

    </div>
    <div id="divider" class="resizeable"></div>
</div>
<!-- /Sidebar -->