<?php

require_once '../conexao/Conexao_BD.php';

class Defeito{

    public function cadastrarDefeito($fabricante, $tipo_defeito, $descricao){
        $con = conexao_BD();
        $dataAtual = date('Y-m-d H:i:s');
        try {
            $cadastrar = $con->prepare("INSERT INTO defeito (id_fabricante, tipo_defeito, descricao, dataCadastro) VALUES (?, ?, ?, ?)");
            $cadastrar->bindValue(1, $fabricante, PDO::PARAM_STR);
            $cadastrar->bindValue(2, $tipo_defeito, PDO::PARAM_STR);
            $cadastrar->bindValue(3, $descricao, PDO::PARAM_STR);
            $cadastrar->bindValue(4, $dataAtual);
            $cadastrar->execute();

            $_SESSION['msgSucessoMsg'] = "Defeito cadastrado com sucesso!";
            header("Location: ../view/consulta_defeito.php");

        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }

    public function buscaDefeito(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT * FROM defeito INNER JOIN fabricante ON (defeito.id_fabricante = fabricante.id_fabricante)");
            $listar->execute();

            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existem defeitos cadastradas");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }

    public function buscarFabricanteSelect(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT * FROM fabricante");
            $listar->execute();
            return $listar->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }

    public function editarDefeito($fabricante, $tipo_defeito, $descricao, $id_defeito){
        $con = conexao_BD();
        try {
            $cadastrar = $con->prepare("UPDATE defeito SET id_fabricante=?, tipo_defeito=?, descricao=? WHERE id_defeito=?");
            $cadastrar->bindValue(1, $fabricante, PDO::PARAM_STR);
            $cadastrar->bindValue(2, $tipo_defeito, PDO::PARAM_STR);
            $cadastrar->bindValue(3, $descricao, PDO::PARAM_STR);
            $cadastrar->bindValue(4, $id_defeito, PDO::PARAM_STR);
            $cadastrar->execute();

            $_SESSION['msgSucessoMsg'] = "Defeito atualizado com sucesso!";
            header("Location: ../view/consulta_defeito.php");

        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }

}
