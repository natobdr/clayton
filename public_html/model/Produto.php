<?php
if (!isset($_SESSION)) session_start();
require_once "../conexao/Conexao_BD.php";

class Produto{
    
    public function cadastrarProdutos($produto_nome, $produto_isbn){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("INSERT INTO produto (produto_nome, produto_isbn) VALUES (?, ?)");
            $listar->bindValue(1, $produto_nome, PDO::PARAM_INT);
            $listar->bindValue(2, $produto_isbn, PDO::PARAM_INT);
            
            $listar->execute();
            
            $_SESSION['msgSucesso'] = "Produto cadastrado com sucesso!";
            header("Location: ../view/consulta_produto.php");
            
        } catch (Exception $e) {
            echo "Erro " . $e->getMessage();
        }
        
    }
    
    public function editarManutencao($produto_nome, $produto_isb){
        $con = conexao_BD();
        try {
            $update = $con->prepare("UPDATE produto SET produto_id = ?, produto_nome = ?, produto_isbn = ?");
            $update->bindValue(1, $produto_nome);
            $update->bindValue(2, $produto_isb);
            
            $update->execute();
            
            $_SESSION['msgUpdate'] = "Produto alterado com sucesso!";
            header("Location: ../view/consulta_produto.php");
            
        } catch (PDOException $e) {
            echo 'Erro '. $e->getMessage();
        }
    }
    
    public function editarServicoManutencao($id_manutencao, $id_servico_realizado){
        $con = conexao_BD();
        try {
            
            if($id_servico_realizado == 1){
                $data = date('Y-m-d');
            }else{
                $data = null;
            }
            
            $update = $con->prepare("UPDATE manutencao SET id_servico_realizado = ?, dt_servico_realizado = ? WHERE id_manutencao = ?");
            $update->bindValue(1, $id_servico_realizado);
            $update->bindValue(2, $data);
            $update->bindValue(3, $id_manutencao);
            $update->execute();
            
            $_SESSION['msgUpdateServico'] = "Serviço alterado com sucesso!";
            header("Location: ../view/consulta_manutencao.php");
            
        } catch (PDOException $e) {
            echo 'Erro ' . $e->getMessage();
        }
    }

        public function excluirManutencao($id_manutencao){
        $con = conexao_BD();
        try {
            $deletar = $con->prepare("DELETE FROM manutencao WHERE id_manutencao = ?");
            $deletar->bindValue(1, $id_manutencao);
            $deletar->execute();
            
            $_SESSION['msgDelete'] = "Manutenção excluída com sucesso!";
            header("Location: ../view/consulta_produto.php");
            
        } catch (PDOException $e) {
            echo 'Erro '; $e->getMessage();
        }
    }

    public function buscarProduto(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT produtos.produto_nome, produtos.produto_id, produtos.produto_isbn, editora.editora_nome FROM produtos
                    INNER JOIN editora ON editora.editora_id = produtos.produto_editora_id
            ");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existem produtos cadastrados");
            }            
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }
    
    public function exibirCarrosSelect(){
        $con = conexao_BD();
         $listar = $con->prepare("SELECT id_carro, modelo, ano_fabricacao, nome_fabricante
                                FROM carro
                                INNER JOIN modelo ON modelo.id_modelo = carro.id_modelo
                                INNER JOIN fabricante ON fabricante.id_fabricante = carro.id_fabricante;");
         $listar->execute();
         $dados = $listar->fetchAll(PDO::FETCH_OBJ);
         return $dados;
    }
    
    public function exibirOficinaSelect(){
        $con = conexao_BD();
        $listar = $con->prepare("SELECT * FROM oficina");
        $listar->execute();
        $dados = $listar->fetchAll(PDO::FETCH_OBJ);
        return $dados;
    }
    
    public function exibirTipoProdutoSelect(){
        $con = conexao_BD();
        $listar = $con->prepare("SELECT * FROM tipo_manutencao");
        $listar->execute();
        $dados = $listar->fetchAll(PDo::FETCH_OBJ);
        return $dados;
    }

    public function buscarDicas(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT * FROM dicas;");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existem dicas cadastrada");
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage(); 
        }
    }
    
}