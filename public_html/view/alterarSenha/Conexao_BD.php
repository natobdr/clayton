<?php
    
    
    require_once('config.php');

    function conexao_BD(){

	try{
		$conectar = new PDO('mysql:host=' . servidor . ';dbname=' . database, usuario, senha, 
                                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$conectar->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conectar;
	}catch(PDOException $e){
		echo "Erro ao conectar ao banco" . $e->getMessage();
	}
    }
    
    
    function geraChaveAcesso($email){
        $stmt = $this->pdo->prepare("SELECT * FROM cliente WHERE email = :email");
        $stmt ->bindValue(":email", $email);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($rs) {
        
        $chave = sha1($rs["id_cliente"].$rs["senha"]);
    
        return $chave;
                
        }
    }
    
    function validarChave($email){
        $stmt = $this->pdo->prepare("SELECT * FROM cliente WHERE email = :email");
        $stmt ->bindValue(":email", $email);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($rs) {
        
        $chaveCorreta = $chave = sha1($rs["id_cliente"].$rs["senha"]);
        if ($chave == $chaveCorreta){
            return $rs ["id_cliente"];
        }
    
        
                
        }
    }
    
    function setNovaSenha($novaSenha){
        $stmt = $this->pdo->prepare("UPDATE cliente SET senha = novaSenha WHERE id_cliente = :id_cliente");
        $stmt ->bindValue(":novaSenha", sha1($novaSenha));
        $stmt ->bindValue(":id_cliente", $id_cliente);
        $run = $stmt->execute();
        
        
        
        
                
        }
    


?>