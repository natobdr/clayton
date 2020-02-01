<?php

require_once '../functions/funcoes.php';
require_once '../model/Manutencao.php';

$id_manutencao = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$id_servico_realizado = filter_input(INPUT_GET, 'servico', FILTER_SANITIZE_NUMBER_INT);

$editar_manutencao = new Manutencao();

if($id_servico_realizado == 1){
    $id_servico_realizado = 0;
    $editar_manutencao->editarServicoManutencao($id_manutencao, $id_servico_realizado);
}else{
    $id_servico_realizado = 1;
    $editar_manutencao->editarServicoManutencao($id_manutencao, $id_servico_realizado);
}

