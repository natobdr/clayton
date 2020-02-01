<?php

require_once '../conexao/Conexao_BD.php';

class CarroCliente{
    
    public function cadastrarCarroCliente($id_cliente, $id_carro, $placa_carro, $vencimento_ipva, $id_seguradora){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("INSERT INTO cliente_carro (id_cliente, id_carro, placa_carro, vencimento_ipva, id_seguradora) VALUES (?, ?, ?, ?, ?)");
            $listar->bindValue(1, $id_cliente, PDO::PARAM_INT);
            $listar->bindValue(2, $id_carro, PDO::PARAM_INT);
            $listar->bindValue(3, $placa_carro, PDO::PARAM_STR);
            $listar->bindValue(4, $vencimento_ipva);
            $listar->bindValue(5, $id_seguradora, PDO::PARAM_INT);
            $listar->execute();
            
            $_SESSION['msgSucesso'] = "Carro cadastrado com sucesso!";
            header("Location: ../view/consulta_carro_cliente.php");
            
        } catch (Exception $e) {
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
    
    public function exibirSeguradorasSelect(){
        $con = conexao_BD();
         $listar = $con->prepare("SELECT * FROM seguradora;");
         $listar->execute();
         $dados = $listar->fetchAll(PDO::FETCH_OBJ);
         return $dados;
    }
    
    public function buscarCarroCliente(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT nome_cliente, modelo, ano_fabricacao, placa_carro, vencimento_ipva, CONCAT(nome_seguradora,  ' - ', tel_seguradora) as nome_tel_seguradora
                                    FROM cliente_carro
                                    JOIN cliente ON cliente.id_cliente = cliente_carro.id_cliente
                                    JOIN carro ON carro.id_carro = cliente_carro.id_carro
                                    JOIN modelo ON modelo.id_modelo = carro.id_modelo
                                    JOIN seguradora ON seguradora.id_seguradora = cliente_carro.id_seguradora;");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existem carros cadastrados");
            }            
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }
    
}
