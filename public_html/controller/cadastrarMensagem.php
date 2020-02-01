<?php

require_once '../functions/funcoes.php';
require_once '../model/Mensagem.php';

$nome_mensagem = RemoveSQLInjection($_POST['txtNome']);
$descricao = RemoveSQLInjection($_POST['txtDescricao']);

if (isset($_POST['txtNome']) && isset($_POST['txtDescricao'])){
    $mensagem = new Mensagem();
    $mensagem->cadastrarMensagem($nome_mensagem, $descricao);
}

