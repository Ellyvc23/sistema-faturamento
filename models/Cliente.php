<?php

namespace Models;

class Cliente{
    private $db;

    public function __construct($conexaoRecebida){
        $this->db = $conexaoRecebida;
    }

    public function criarCliente($newCliente, $cpf_cnpj, $email){
        $sql = "INSERT INTO clientes (nome, cnpj_cpf, email) VALUES (:nome, :cpf, :email)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':nome' => $newCliente, ':cpf' => $cpf_cnpj, ':email' => $email]);
    }

    public function listarTodos(){
        $sql = "SELECT * FROM clientes ORDER BY nome ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}