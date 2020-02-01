<?php
if (!isset($_SESSION))
    session_start();

require_once "../conexao/Conexao_BD.php";

class Cliente {

    public function cadastrarCliente($Cliente_cpf, $cliente_nome, $cliente_telefone, $cliente_email) {
        $con = conexao_BD();
        try {
            $listar = $con->prepare("INSERT INTO cliente (cliente_cpf, cliente_nome, cliente_telefone, cliente_email"
                    . "usuario_status_id ) VALUES (?, ?, ?, ?) ");
            $listar->bindValue(1, $Cliente_cpf);
            $listar->bindValue(1, $cliente_nome);
            $listar->bindValue(2, $cliente_telefone);
            $listar->bindValue(2, $usuario_email);
            
            $listar->execute();

            $_SESSION['msgSucesso'] = "Cliente cadastrado com sucesso!";
            header("Location: ../view/consulta_cliente.php");
//                var_dump($listar);            exit();
        } catch (Exception $e) {
            echo "Erro " . $e->getMessage();
        }
    }

    
    public function editarCliente($usuario_nome, $usuario_email, $usuario_idfuncao, $usuario_senha, $usuario_login, $usuario_status){
        $con = conexao_BD();
        try {
            $update = $con->prepare("UPDATE usuario SET usuario_id = ?, usuario_nome = ?, usuario_email = ?, usuario_id_funcao = ?, usuario_senha = ?, "
                    . "usuario_login = ?, usuario_status_id = ? WHERE usuario_id = ?");
            $listar->bindValue(1, $usuario_nome);
            $listar->bindValue(2, $usuario_email);
            $listar->bindValue(2, $usuario_idfuncao);
            $listar->bindValue(2, $usuario_senha);
            $listar->bindValue(2, $usuario_login);
            $listar->bindValue(2, $usuario_status);
            $listar->execute();
            
            $_SESSION['msgUpdate'] = "Usuario alterado com sucesso!";
            header("Location: ../view/consulta_usuario.php");
            
        } catch (PDOException $e) {
            echo 'Erro '. $e->getMessage();
        }
    }
    public function editarUser($id_modelo, $modelo1, $ano_fabricacao){
        
        $con = conexao_BD();
        try {
            $update = $con->prepare("UPDATE modelo SET modelo = ?, ano_fabricacao = ? WHERE id_modelo = ?");
            $update->bindValue(1, $modelo1);
            $update->bindValue(2, $ano_fabricacao);
            $update->bindValue(3, $id_modelo);
            $update->execute();
            
            $_SESSION['msgUpdate'] = "Modelo alterado com sucesso!";
            header("Location: ../view/consulta_usuario.php");
            
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
            header("Location: ../view/consulta_usuario.php");
        } catch (PDOException $e) {
            echo 'Erro ';
            $e->getMessage();
        }
    }

    public function buscarCliente(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT * FROM `cliente`");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existem Clientes cadastrados");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }


}

?>