<?php
require_once '../functions/funcoes.php';
require_once '../model/Modelo.php';

$id_modelo         = RemoveSQLInjection($_POST['txtIdModelo']);
$modelo_ds         = ucfirst(RemoveSQLInjection($_POST['txtModelo']));
$ano_fabricacao    = RemoveSQLInjection($_POST['txtAnoFabricacao']);

if (isset($id_modelo)){
    $modelo = new Modelo();
    $modelo->editarModelo($id_modelo, $modelo_ds, $ano_fabricacao);
}
