<?php

namespace Models;

class Fatura{
    private $db;

    public function __construct($conexaoRecebida){
        $this->db = $conexaoRecebida;
    }

    public function buscarTodas($termo = '', $pagina = 1, $itensPorPagina = 10){
        
        $sql = "SELECT faturas.*, clientes.nome
            FROM faturas
            INNER JOIN clientes ON faturas.cliente_id = clientes.id";
            $parametros = [];

        if ($termo != ''){
            $sql .= " WHERE clientes.nome LIKE :termo OR faturas.id LIKE :termo";
            $parametros['termo'] = '%'.$termo.'%';
        }
        $offset = ($pagina - 1) * $itensPorPagina;
        $sql .= " LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $itensPorPagina, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        if ($termo != ''){
            $stmt->bindValue(':termo', $parametros['termo']);
        }

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function obterTotalPorStatus($status){
        $sql = "SELECT SUM(valor) FROM faturas WHERE status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':status' => $status]); 

        return $stmt->fetchColumn() ?: 0; #Se for nulo ou falso, retornara 0
    }

    public function obterPrevisaoReceita(){
        $sql = "SELECT SUM(valor) FROM faturas WHERE status = 'Pendente' OR status = 'Pago'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn() ?: 0;
    }

    public function criarFatura($clienteId, $dataEmissao, $dataVencimento, $valor){
        
        $sql = "INSERT INTO faturas (cliente_id, data_emissao, data_vencimento, valor, status) VALUES (:id, :dataEmissao, :dataVencimento, :valor, :status)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $clienteId,':dataEmissao' => $dataEmissao, ':dataVencimento' => $dataVencimento, ':valor' => $valor, ':status' => 'Pendente']);
        return true;
    
    }

    public function marcarComoPaga($id){
        $sql = "UPDATE faturas
                SET status = :status
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':status' => 'Pago', ':id' => $id]);
        return true;
    }
    public function marcarComoVencida($id){
        $sql = "UPDATE faturas
                SET status = :status
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':status' => 'Vencido', ':id' => $id]);
        return true;
    }
    public function deletarFatura($id){
        $sql = "DELETE FROM faturas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return true;
    }
}