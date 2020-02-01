<?php

require_once '../conexao/Conexao_BD.php';

class Mensagem{
    
    public function cadastrarMensagem($nome_mensagem, $descricao){
        $con = conexao_BD();        
        $dataAtual = date('Y-m-d H:i:s');
        try {
            $cadastrar = $con->prepare("INSERT INTO mensagem (nome_mensagem, descricao, dt_cadastro) VALUES (?, ?, ?)");
            $cadastrar->bindValue(1, $nome_mensagem, PDO::PARAM_STR);
            $cadastrar->bindValue(2, $descricao, PDO::PARAM_STR);
            $cadastrar->bindValue(3, $dataAtual);
            $cadastrar->execute();
            
            $_SESSION['msgSucessoMsg'] = "Mensagem cadastrada com sucesso!";
            header("Location: ../view/consulta_mensagem.php");
            
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();            
        }
    }
    
    public function buscarMensagem(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT * FROM mensagem");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existem mensagens cadastradas");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }
    
}

