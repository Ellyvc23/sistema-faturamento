<?php

namespace Controllers;
use Config\Database;
use Models\Cliente;
use Models\Fatura;

class FinanceiroController{
    public function index(){
        $db = new Database();
        $conexao = $db->conectar();

        $fats = new Fatura($conexao);
        $busca = (isset($_GET['busca'])) ? $_GET['busca'] : '';

        $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
        $listaFatura = $fats->buscarTodas($busca, $pagina);

        $totalPendente = $fats->obterTotalPorStatus('Pendente');
        $totalPago = $fats->obterTotalPorStatus('Pago');
        $totalVencido = $fats->obterTotalPorStatus('Vencido');
        $totalPrevisao = $fats->obterPrevisaoReceita();

        require_once('../views/dashboard.php');
    }
    public function nova(){
        $db = new Database();
        $conexao = $db->conectar();
        $modelClientes = new Cliente($conexao);
        $listaClientes = $modelClientes->listarTodos();
    
        require_once('../views/nova_fatura.php');
    }
    public function Cliente(){
        require_once('../views/novo_cliente.php');
    }
    public function salvarFatura(){
        $db = new Database();
        $conexao = $db->conectar();
        $clienteId =  $_POST['cliente_id'];
        $dataEmissao = $_POST['data_emissao'];
        $dataVencimento = $_POST['data_vencimento'];
        $valor = $_POST['valor'];

        $modelFatura = new Fatura($conexao);

        if($modelFatura->criarFatura($clienteId, $dataEmissao, $dataVencimento, $valor) == True){
            header("Location: index.php");
            exit();
        }
        else{
            echo    "<script> alert('Usuário/Empresa não existe!');
                    window.location.href = 'index.php'; </script>";
        }
    }

    public function salvarCliente(){
        $db = new Database();
        $conexao = $db->conectar();
        $modelCliente = new Cliente($conexao);
        $newCliente = $_POST['nome'];
        $cpf_cnpj = $_POST['cnpj_cpf'];
        $email = $_POST['email'];

        $modelCliente->criarCliente($newCliente, $cpf_cnpj, $email);

        header("Location: index.php");
        exit();
    }

    public function pagar(){
        $db = new Database();
        $conexao = $db->conectar();
        $id = $_GET['id'];
        $modelPagar = new Fatura($conexao);
        $modelPagar->marcarComoPaga($id);
        
        header('Location: index.php');
        exit;
    }
    public function vencida(){
        $db = new Database();
        $conexao = $db->conectar();
        $id = $_GET['id'];
        $modelVencida = new Fatura($conexao);
        $modelVencida->marcarComoVencida($id);

        header('Location: index.php');
        exit;
    }

    public function deletar(){
        $db = new Database();
        $conexao = $db->conectar();
        $id = $_GET['id'];
        $modelDeletar = new Fatura($conexao);
        $modelDeletar->deletarFatura($id);
        header('Location: index.php');
        exit;

    }

    public function imprimir(){
        $db = new Database();
        $conexao = $db->conectar();
        $modelFatura = new Fatura($conexao);
        $listaFatura = $modelFatura->buscarTodas('', 1, 99999);

        require_once('../views/relatorio_impressao.php');
    }
}