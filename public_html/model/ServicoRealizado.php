<?php
if (!isset($_SESSION)) session_start();
require_once "../conexao/Conexao_BD.php";

class ServicoRealizado{
        
    public function buscarManutencao(){
        $con = conexao_BD();
        try {
            $listar = $con->prepare("SELECT id_manutencao, modelo, ano_fabricacao, nome_fabricante, nome_manutencao, observacao, CONCAT(nome_oficina,  ' - ', tel_oficina) as nome_tel_oficina, manutencao.id_oficina, manutencao.id_carro, manutencao.id_tipo_manutencao, id_servico_realizado, dt_servico_realizado
                                    FROM manutencao
                                    JOIN carro ON carro.id_carro = manutencao.id_carro
                                    JOIN modelo ON modelo.id_modelo = carro.id_modelo
                                    JOIN fabricante ON fabricante.id_fabricante = carro.id_fabricante
                                    JOIN tipo_manutencao ON tipo_manutencao.id_tipo_manutencao = manutencao.id_tipo_manutencao
                                    JOIN oficina ON oficina.id_oficina = manutencao.id_oficina
                                    WHERE manutencao.id_servico_realizado = 1");
            $listar->execute();
            
            if ($listar->rowCount() > 0){
                return $listar->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception("Não existe serviço realizado");
            }            
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }    
        
}