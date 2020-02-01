<?php
session_start();
require_once('../conexao/config.php');
require_once ('../conexao/Conexao_BD.php');


$login = $_POST['login'];
$senha = md5($_POST['senha']);

$conectar = new PDO('mysql:host=' . servidor . ';dbname=' . database, usuario, senha, 
                                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$query = $conectar->prepare("SELECT * FROM usuario WHERE usuario.`usuario_login` = '$login' AND usuario.`usuario_senha` = '$senha'");
$query->execute();
$count = $query->rowCount();
$row = $count;



if ($row > 0) {

    while ($dados = $query->fetch()) {

        $_SESSION['login'] = $dados['usuario_login'];   
    }
    header('Location: ../view/home.php');
} else {

    header('Location: ../view/login.php?msg=1');
}

?>