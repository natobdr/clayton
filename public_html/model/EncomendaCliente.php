<?php
require_once '../conexao/Conexao_BD.php';
class EncomendaCliente{
     
    private $count; 
    
    public function getCount() {
    return $this->count;
  }
  
  public function setCount($count) {
    $this->count = $count;
  }
    
    public function cadastrarEncomenda($id_usuario, $id_produto, $id_cliente, $id_editora, $atendimento){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("INSERT INTO encomenda (encomenda-id-usuario, encomenda-id-produto, encomenda-id-cliente, encomenda-id-editora, "
                    . "encomenda-atendimento) VALUES (?, ?, ?, ?, ?)");
            $listar->bindValue(1, $id_usuario, PDO::PARAM_INT);
            $listar->bindValue(2, $id_produto, PDO::PARAM_INT);
            $listar->bindValue(3, $id_cliente, PDO::PARAM_STR);
            $listar->bindValue(4, $id_editora,PDO::PARAM_STR);
            $listar->bindValue(5, $atendimento, PDO::PARAM_INT);
            $listar->execute();
            
            $_SESSION['msgSucesso'] = "Encomenda cadastrada com sucesso!";
            header("Location: ../view/consulta_encomenda_cliente.php");
            
        } catch (Exception $e) {
            echo "Erro " . $e->getMessage();
        }
        
    }
    
    public function exibirEncomendaSelect() {
        $con = conexao_BD();
        $listar = $con->prepare("SELECT encomenda.`encomenda_id`, usuario.`usuario_nome`, encomenda.`encomenda-data`, cliente.`cliente-nome`,
                            produtos.`produto-nome`, produtos.`produto-isbn`, cliente.`cliente-telefone`, encomenda.`encomenda-atendimento`, usuario.`usuario-id-funcao` FROM encomenda
                            INNER JOIN usuario ON usuario.`usuario-id` = encomenda.`encomenda-id-usuario`
                            INNER JOIN cliente ON cliente.`cliente-id` = encomenda.`encomenda-id-cliente`
                            INNER JOIN produto ON produto.`produto-id` = encomenda.`encomenda-id-produto`");
        $listar->execute();
        $dados = $listar->fetchAll(PDO::FETCH_OBJ);
        return $dados;
    }

    public function exibirSeguradorasSelect(){
        $con = conexao_BD();
         $listar = $con->prepare("SELECT * FROM seguradora;");
         $listar->execute();
         $dados = $listar->fetchAll(PDO::FETCH_OBJ);
         return $dados;
    }
    
    public function buscarEncomendaCliente(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT encomenda.`encomenda_id`, usuario.`usuario_nome`, encomenda.`encomenda_data`, cliente.`cliente_nome`,
                            produtos.`produto_nome`, produtos.`produto_isbn`, cliente.`cliente_telefone`, encomenda.`encomenda_atendimento`, 
                            usuario.`usuario_funcao_id`, editora.`editora_nome` FROM encomenda
                            INNER JOIN usuario ON usuario.`usuario_id` = encomenda.`encomenda_usuario_id`
                            INNER JOIN cliente ON cliente.`cliente_id` = encomenda.`encomenda_cliente_id`
                            INNER JOIN produtos ON produtos.`produto_id` = encomenda.`encomenda_produto_id`
                            INNER JOIN editora ON editora.`editora_id` = produtos.`produto_editora_id`");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                $count = $listar->rowCount();
                return $listar->fetchAll(PDO::FETCH_OBJ);
                echo $count;
            }else{
                throw new Exception("Não existem carros cadastrados");
            }            
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }
    
}
