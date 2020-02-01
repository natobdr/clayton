<?php

require_once '../conexao/Conexao_BD.php';

//Recupera ID da URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (empty($id)) {
  echo "ID não definido.";
  exit;
}

$con = conexao_BD();
$sql = "DELETE FROM defeito WHERE id_defeito=$id";
$result = $con->prepare($sql);

if ($result->execute()) {
  header("Location: ../view/consulta_defeito.php");
} else {
  echo "Erro ao excluir.";
  print_r($result->erroInfo);
}


 ?>
