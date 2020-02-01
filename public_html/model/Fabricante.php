<?php

require_once '../conexao/Conexao_BD.php';

class Fabricante{
    
    public function cadastrarFabricante($nome_fabricante){
        $con = conexao_BD();
        $dataAtual = date('Y-m-d H:i:s');
        try {
            $cadastrar = $con->prepare("INSERT INTO fabricante (nome_fabricante, dt_cadastro) VALUES (?,?)");
            $cadastrar->bindValue(1, $nome_fabricante, PDO::PARAM_STR);
            $cadastrar->bindValue(2, $dataAtual);
            $cadastrar->execute();
            
            $_SESSION['msgSucessoFabricante'] = "Fabricante cadastrado com sucesso!";
            header("Location: ../view/consulta_fabricante.php");
            
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();            
        }
    }
    
    public function buscarFabricante(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT * FROM fabricante");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existe fabricante cadastrado");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }
    
}

