<?php

require_once '../conexao/Conexao_BD.php';

class Editora{
    
    public function cadastrarEditora($nome_editora, $telefone_editora){
        $con = conexao_BD();
        
        try {
            $cadastrar = $con->prepare("INSERT INTO editora (editora_nome, editora_telefone) VALUES (?,?)");
            $cadastrar->bindValue(1, $nome_editora, PDO::PARAM_STR);
            $cadastrar->bindValue(2, $telefone_editora, PDO::PARAM_STR);
            $cadastrar->execute();
            
            $_SESSION['msgSucessoEditora'] = "Editora cadastrada com sucesso!";
            header("Location: ../view/consulta_editora.php");
            
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();            
        }
    }
    
    public function buscarEditora(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT * FROM editora");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existe editora cadastrado");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }
    
}

