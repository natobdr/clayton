<?php

require_once '../functions/funcoes.php';
require_once '../model/Manutencao.php';

$id_manutencao = RemoveSQLInjection($_POST['txtCodigo']);

if (isset($_POST['txtCodigo'])){
    $manutencao = new Manutencao();
    $manutencao->excluirManutencao($id_manutencao);
}

