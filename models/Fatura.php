<?php

namespace Models;

class Fatura{
    private $db;

    public function __construct($conexaoRecebida){
        $this->db = $conexaoRecebida;
    }

    public function buscarTodas(){
        $sql = "SELECT faturas.*, clientes.nome
                FROM faturas
                INNER JOIN clientes ON faturas.cliente_id = clientes.id";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function obterTotalPorStatus($status){
        $sql = "SELECT SUM(valor) FROM faturas WHERE status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':status' => $status]);

        return $stmt->fetchColumn() ?: 0; #Se for nulo ou falso, retornara 0
    }
}