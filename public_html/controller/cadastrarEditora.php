<?php

require_once '../functions/funcoes.php';
require_once '../model/Editora.php';

$nome_editora = ucfirst(RemoveSQLInjection($_POST['txtNome']));
$telefone_editora = ucfirst(RemoveSQLInjection($_POST['txtTelefone']));

if (isset($_POST['txtNome'])|| isset($_POST['txtTelefone'])){
    $editora = new Editora();
    $editora->cadastrarEditora($nome_editora, $telefone_editora);
}

