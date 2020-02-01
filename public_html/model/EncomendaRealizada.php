<?php

if (!isset($_SESSION))
    session_start();
require_once "../conexao/Conexao_BD.php";

class EncomendaRealizada {

    public function buscarEncomenda() {
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT encomenda.`encomenda_id`, usuario.`usuario_nome`, encomenda.`encomenda_data`, cliente.`cliente_nome`,
                            produtos.`produto_nome`, produtos.`produto_isbn`, cliente.`cliente_telefone`, encomenda.`encomenda_atendimento`, 
                            usuario.`usuario_funcao_id`, editora.`editora_nome` FROM encomenda
                            INNER JOIN usuario ON usuario.`usuario_id` = encomenda.`encomenda_usuario_id`
                            INNER JOIN cliente ON cliente.`cliente_id` = encomenda.`encomenda_cliente_id`
                            INNER JOIN produtos ON produtos.`produto_id` = encomenda.`encomenda_produto_id`
                            INNER JOIN editora ON editora.`editora_id` = produtos.`produto_editora_id`
                            WHERE encomenda.encomenda_status = 0
                            ORDER BY cliente.cliente_nome");
            $listar->execute();

            if ($listar->rowCount() > 0) {
                return $listar->fetchAll(PDO::FETCH_OBJ);
            } else {
                throw new Exception("Não existe serviço realizado");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }

    public function buscarEncomendaVendedor() {
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT encomenda.`encomenda_id`, usuario.`usuario_nome`, encomenda.`encomenda_data`, cliente.`cliente_nome`,
                            produtos.`produto_nome`, produtos.`produto_isbn`, cliente.`cliente_telefone`, encomenda.`encomenda_atendimento`, 
                            usuario.`usuario_funcao_id`, editora.`editora_nome` FROM encomenda
                            INNER JOIN usuario ON usuario.`usuario_id` = encomenda.`encomenda_usuario_id`
                            INNER JOIN cliente ON cliente.`cliente_id` = encomenda.`encomenda_cliente_id`
                            INNER JOIN produtos ON produtos.`produto_id` = encomenda.`encomenda_produto_id`
                            INNER JOIN editora ON editora.`editora_id` = produtos.`produto_editora_id`
                            WHERE encomenda.encomenda_status = 0
                            ORDER BY usuario.usuario_nome ASC");
            $listar->execute();

            if ($listar->rowCount() > 0) {
                return $listar->fetchAll(PDO::FETCH_OBJ);
            } else {
                throw new Exception("Não existe serviço realizado");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }

}
