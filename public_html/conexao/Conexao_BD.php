<?php
    
    
    require_once('config.php');

    function conexao_BD(){

	try{
		$conectar = new PDO('mysql:host=' . servidor . ';dbname=' . database, usuario, senha, 
                                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$conectar->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conectar;
		session_start();
	}catch(PDOException $e){
		echo "Erro ao conectar ao banco" . $e->getMessage();
	}
    }


?>