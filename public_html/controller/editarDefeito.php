<?php

require_once '../functions/funcoes.php';
require_once '../model/Defeito.php';

$fabricante = RemoveSQLInjection($_POST['selectFabricante']);
$tipo_defeito = RemoveSQLInjection($_POST['txtTipo']);
$descricao = RemoveSQLInjection($_POST['txtDescricao']);
$id_defeito = RemoveSQLInjection($_POST['id']);

if (isset($_POST['txtTipo']) && isset($_POST['txtDescricao']) && isset($_POST['selectFabricante']) && isset($_POST['id'])){
    $defeito = new Defeito();
    $defeito->editarDefeito($fabricante, $tipo_defeito, $descricao, $id_defeito);
}
