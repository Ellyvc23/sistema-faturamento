<?php

namespace Controllers;
use Config\Database;
use Models\Fatura;

class FinanceiroController{
    public function index(){
        $db = new Database();
        $conexao = $db->conectar();

        $fats = new Fatura($conexao);
        $listaFatura = $fats->buscarTodas();

        $totalPendente = $fats->obterTotalPorStatus('Pendente');
        $totalPago = $fats->obterTotalPorStatus('Pago');
        $totalVencido = $fats->obterTotalPorStatus('Vencido');

        require_once('../views/dashboard.php');
    }
}