<?php

require_once '../functions/funcoes.php';
require_once '../model/Usuario.php';

$usuario         = ucfirst($_POST['txtmodelo']);
$ano_fabricacao = ucfirst($_POST['ano_fabricacao']);


if (isset($_POST['txtmodelo']) && isset($_POST['ano_fabricacao'])){
    $modelo = new Modelo();
    $modelo->cadastrarModelo($modelo_ds,$ano_fabricacao);
}




