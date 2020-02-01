<?php

require_once '../functions/funcoes.php';
require_once '../model/Manutencao.php';

$id_carro = RemoveSQLInjection($_POST['txtCarro']);
$id_tipo_manutencao = RemoveSQLInjection($_POST['txtManutencao']);
$id_oficina = RemoveSQLInjection($_POST['txtOficina']);
$observacao = ucfirst(RemoveSQLInjection($_POST['txtObservacao']));

if (isset($_POST['txtCarro']) && isset($_POST['txtManutencao'])){
    $manutencao = new Manutencao();
    $manutencao->cadastrarManutencao($id_carro, $id_tipo_manutencao, $id_oficina, $observacao);
}

