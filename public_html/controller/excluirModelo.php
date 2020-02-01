<?php

require_once '../functions/funcoes.php';
require_once '../model/Modelo.php';

$id_modelo      = RemoveSQLInjection($_POST['txtIdModelo']);

if (isset($_POST['txtIdModelo'])){
    $modelo= new Modelo();
    $modelo->excluirModelo($id_modelo);
}



