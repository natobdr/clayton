<?php

require_once "../conexao/Conexao_BD.php";

class Seguradora{
    
    public function CadastrarSeguradora($nome_seguradora, $tel_seguradora) {
        $con = conexao_BD();
        try {
            $listar = $con->prepare("INSERT INTO seguradora (nome_seguradora, tel_seguradora) VALUES (?, ?)");
            $listar->bindValue(1, $nome_seguradora, PDO::PARAM_STR);
            $listar->bindValue(2, $tel_seguradora, PDO::PARAM_STR);
            $listar->execute();
            
            $_SESSION['msgSucesso'] = "Seguradora cadastrada com sucesso!";
            header("Location: ../view/consulta_seguradora.php");
            
        } catch (Exception $ex) {
            echo "Erro " . $e->getMessage();
        }
    }
    
    public function  buscarSeguradora(){
        $con = conexao_BD();
        
        try {
            $listar = $con->prepare("SELECT * FROM seguradora");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existem seguradoras cadastradas");
            }            
            
        } catch (PDOException $e) {
            echo "Eroo " . $e->getMessage();
        }
    }
}


