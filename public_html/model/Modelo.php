<?php

if (!isset($_SESSION))
    session_start();

require_once "../conexao/Conexao_BD.php";

class Modelo {

    public function cadastrarModelo($modelo, $ano_fabricacao) {
        $con = conexao_BD();
        try {
            $listar = $con->prepare("INSERT INTO modelo (modelo, ano_fabricacao) VALUES (?, ?) ");
            $listar->bindValue(1, $modelo);
            $listar->bindValue(2, $ano_fabricacao);
            $listar->execute();

            $_SESSION['msgSucesso'] = "Modelo cadastrado com sucesso!";
            header("Location: ../view/consulta_modelo.php");
//                var_dump($listar);            exit();
        } catch (Exception $e) {
            echo "Erro " . $e->getMessage();
        }
    }

    
    public function editarManutencao($id_munutencao, $id_carro, $id_tipo_manutencao, $id_oficina, $observacao){
        $con = conexao_BD();
        try {
            $update = $con->prepare("UPDATE manutencao SET id_carro = ?, id_oficina = ?, id_tipo_manutencao = ?, observacao = ? WHERE id_manutencao = ?");
            $update->bindValue(1, $id_carro);
            $update->bindValue(2, $id_oficina);
            $update->bindValue(3, $id_tipo_manutencao);
            $update->bindValue(4, $observacao);
            $update->bindValue(5, $id_munutencao);
            $update->execute();
            
            $_SESSION['msgUpdate'] = "Manutenção alterada com sucesso!";
            header("Location: ../view/consulta_manutencao.php");
            
        } catch (PDOException $e) {
            echo 'Erro '. $e->getMessage();
        }
    }
    public function editarModelo($id_modelo, $modelo1, $ano_fabricacao){
        
        $con = conexao_BD();
        try {
            $update = $con->prepare("UPDATE modelo SET modelo = ?, ano_fabricacao = ? WHERE id_modelo = ?");
            $update->bindValue(1, $modelo1);
            $update->bindValue(2, $ano_fabricacao);
            $update->bindValue(3, $id_modelo);
            $update->execute();
            
            $_SESSION['msgUpdate'] = "Modelo alterado com sucesso!";
            header("Location: ../view/consulta_modelo.php");
            
        } catch (PDOException $e) {
            echo 'Erro '. $e->getMessage();
        }
    }

    public function excluirModelo($id_modelo) {
        $con = conexao_BD();
        try {
            $deletar = $con->prepare("DELETE FROM modelo WHERE id_modelo = ?");
            $deletar->bindValue(1, $id_modelo);
            $deletar->execute();
           
            $_SESSION['msgDelete'] = " Modelo excluído com sucesso!";
            header("Location: ../view/consulta_modelo.php");
        } catch (PDOException $e) {
            echo 'Erro ';
            $e->getMessage();
        }
    }

    public function buscarModelo() {
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT * FROM modelo;");
            $listar->execute();

            if ($listar->rowCount() > 0) {
                return $listar->fetchAll(PDO::FETCH_OBJ);
            } else {
                throw new Exception("Não existem modelos cadastrados");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }


}

?>