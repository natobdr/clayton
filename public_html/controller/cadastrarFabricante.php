<?php

require_once '../functions/funcoes.php';
require_once '../model/Fabricante.php';

$nome_fabricante = ucfirst(RemoveSQLInjection($_POST['txtNome']));

if (isset($_POST['txtNome'])){
    $fabricante = new Fabricante();
    $fabricante->cadastrarFabricante($nome_fabricante);
}

