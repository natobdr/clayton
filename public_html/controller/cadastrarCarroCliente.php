<?php

require_once '../functions/funcoes.php';
require_once '../model/CarroCliente.php';

$id_carro = RemoveSQLInjection($_POST['idCarro']);
$placa_carro = strtoupper(RemoveSQLInjection($_POST['placa']));
$vencimento_ipva = date('Y-m-d', strtotime(RemoveSQLInjection($_POST['vencimentoIpva'])));
$id_seguradora = RemoveSQLInjection($_POST['idSeguradora']);
//$id_cliente = RemoveSQLInjection($_POST['idCliente']);
$id_cliente = 1;

if (isset($_POST['idCarro']) && isset($_POST['idCliente'])){
    $carroCliente = new CarroCliente();
    $carroCliente->cadastrarCarroCliente($id_cliente, $id_carro, $placa_carro, $vencimento_ipva, $id_seguradora);
}

