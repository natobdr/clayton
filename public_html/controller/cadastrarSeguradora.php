<?php

require_once '../functions/funcoes.php';
require_once '../model/Seguradora.php';

$seguradora = new Seguradora();

$nome_seguradora = RemoveSQLInjection($_POST['nome_seguradora']);
$tel_seguradora = RemoveSQLInjection($_POST['tel_seguradora']);

if (isset($_POST['nome_seguradora'])){
    $seguradora->CadastrarSeguradora($nome_seguradora, $tel_seguradora);

}
