<?php

require_once '../functions/funcoes.php';
require_once '../model/EncomendaCliente.php';

$cliente = RemoveSQLInjection($_POST['Cliente']);
$produto = RemoveSQLInjection($_POST['Produto']);
$usuario = RemoveSQLInjection($_POST['Usuario']);




