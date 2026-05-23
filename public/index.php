<?php

use Controllers\FinanceiroController;

    require_once('../controllers/FinanceiroController.php');
    require_once('../config/Database.php');
    require_once('../models/Fatura.php');
    require_once('../models/Cliente.php');

    $teste = new FinanceiroController();
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';

    switch($acao){
        case 'nova':
                $teste->nova();
            break;
        case 'salvar':
                $teste->salvarFatura();
            break;
        case 'cliente':
                $teste->Cliente();
            break;
        case 'salvar_cliente':
                $teste->salvarCliente();
            break;
        case 'pagar':
                $teste->pagar();
            break;
        case 'vencer':
                $teste->vencida();
            break;
        case 'excluir':
                $teste->deletar();
            break;
        case 'imprimir':
                $teste->imprimir();
            break;
        default:
                $teste->index();
            break;
    }