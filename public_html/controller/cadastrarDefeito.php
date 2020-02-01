<?php

require_once '../functions/funcoes.php';
require_once '../model/Defeito.php';

$fabricante = RemoveSQLInjection($_POST['selectFabricante']);
$tipo_defeito = RemoveSQLInjection($_POST['txtTipo']);
$descricao = RemoveSQLInjection($_POST['txtDescricao']);

if (isset($_POST['txtTipo']) && isset($_POST['txtDescricao']) && isset($_POST['selectFabricante'])){
    $defeito = new Defeito();
    $defeito->cadastrarDefeito($fabricante, $tipo_defeito, $descricao);
}

