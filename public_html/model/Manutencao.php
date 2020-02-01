<?php
if (!isset($_SESSION)) session_start();
require_once "../conexao/Conexao_BD.php";

class Manutencao{
    
    public function cadastrarManutencao($id_carro, $id_tipo_manutencao, $id_oficina, $observacao){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("INSERT INTO manutencao (id_carro, id_tipo_manutencao, id_oficina, observacao) VALUES (?, ?, ?, ?)");
            $listar->bindValue(1, $id_carro, PDO::PARAM_INT);
            $listar->bindValue(2, $id_tipo_manutencao, PDO::PARAM_INT);
            $listar->bindValue(3, $id_oficina, PDO::PARAM_INT);
            $listar->bindValue(4, $observacao, PDO::PARAM_STR);
            $listar->execute();
            
            $_SESSION['msgSucesso'] = "Manutenção cadastrada com sucesso!";
            header("Location: ../view/consulta_manutencao.php");
            
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
            header("Location: ../view/consulta_manutencao.php");
            
        } catch (PDOException $e) {
            echo 'Erro '; $e->getMessage();
        }
    }

    public function buscarManutencao(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT id_manutencao, modelo, ano_fabricacao, nome_fabricante, nome_manutencao, observacao, CONCAT(nome_oficina,  ' - ', tel_oficina) as nome_tel_oficina, manutencao.id_oficina, manutencao.id_carro, manutencao.id_tipo_manutencao, id_servico_realizado
                                    FROM manutencao
                                    JOIN carro ON carro.id_carro = manutencao.id_carro
                                    JOIN modelo ON modelo.id_modelo = carro.id_modelo
                                    JOIN fabricante ON fabricante.id_fabricante = carro.id_fabricante
                                    JOIN tipo_manutencao ON tipo_manutencao.id_tipo_manutencao = manutencao.id_tipo_manutencao
                                    JOIN oficina ON oficina.id_oficina = manutencao.id_oficina;");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existem manutenções cadastradas");
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
    
    public function exibirTipoManutencaoSelect(){
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