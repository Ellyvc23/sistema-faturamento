<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeiro - Sistema de Faturamento</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-container">
        <aside class="sidebar">
            <div class="logo-area">
                <h2><i class="fa-solid fa-wallet"></i> FinTech_Lab</h2>
            </div>
            
            <a href="index.php" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Sair do Painel</a>
            
            <nav class="menu-nav">
                <a href="index.php" class="nav-item active"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a href="index.php?acao=nova" class="nav-item"><i class="fa-solid fa-file-invoice-dollar"></i> Faturas</a>
                <a href="index.php?acao=cliente" class="nav-item"><i class="fa-solid fa-users"></i> Clientes</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-header">
                <div class="search-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <form method="GET" action="index.php">
                        <input type="text" name="busca" placeholder="Buscar por cliente ou código da fatura...">
                    </form>
                </div>
                
                <div class="header-actions">
                    <button class="icon-btn"><i class="fa-regular fa-sun"></i></button>
                    <button class="icon-btn"><i class="fa-regular fa-bell"></i></button>
                    <div class="user-profile">
                        <i class="fa-regular fa-circle-user"></i>
                        <span>Admin</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-body">
                <div class="page-title">
                    <div class="title-icon"><i class="fa-solid fa-dollar-sign"></i></div>
                    <div>
                        <h1>Gestão de Faturamento</h1>
                        <p>Controle de faturas, emissões e fluxo de recebimentos</p>
                    </div>
                </div>

                <div class="cards-grid">
                    <div class="card status-recebido">
                        <div class="card-icon"><i class="fa-regular fa-circle-check"></i></div>
                        <div class="card-info">
                            <span>Total Faturado (Mês)</span>
                            <strong>R$ <?= number_format($totalPago, 2, ',', '.'); ?></strong>
                        </div>
                    </div>
                    
                    <div class="card status-pendente">
                        <div class="card-icon"><i class="fa-regular fa-clock"></i></div>
                        <div class="card-info">
                            <span>Aguardando Pagamento</span>
                            <strong>R$ <?= number_format($totalPendente, 2, ',', '.'); ?></strong>
                        </div>
                    </div>

                    <div class="card status-vencido">
                        <div class="card-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                        <div class="card-info">
                            <span>Faturas Vencidas</span>
                            <strong>R$ <?= number_format($totalVencido, 2, ',', '.'); ?></strong>
                        </div>
                    </div>

                    <div class="card status-previsao">
                        <div class="card-icon"><i class="fa-solid fa-arrow-trend-up"></i></div>
                        <div class="card-info">
                            <span>Previsão de Receita</span>
                            <strong>R$ <?= number_format($totalPrevisao, 2, ',', '.'); ?></strong>
                        </div>
                    </div>
                </div>

                <div class="shortcuts-grid">
                    <a href="index.php?acao=nova" class="shortcut-box" style="text-decoration: none; color: inherit;">
                        <div class="shortcut-left">
                            <div class="shortcut-icon blue"><i class="fa-solid fa-plus"></i></div>
                            <div>
                                <h3>Nova Fatura</h3>
                                <p>Emitir nova cobrança para cliente</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-arrow-right arrow-go"></i>
                    </a>

                    <a href="index.php?acao=imprimir" target="_blank" class="shortcut-box" style="text-decoration: none; color: inherit;">
                        <div class="shortcut-left">
                            <div class="shortcut-icon green"><i class="fa-solid fa-file-export"></i></div>
                            <div>
                                <h3>Relatórios de Caixa</h3>
                                <p>Exportar dados e faturamento em PDF</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-arrow-right arrow-go"></i>
                    </a>
                </div>

                <div class="recent-requests">
                    <div class="requests-header">
                        <h2>Últimas Faturas Geradas</h2>
                        <a href="#">Visualizar todas <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    
                    <div class="table-container">
                        <table class="financial-table">
                            <thead>
                                <tr>
                                    <th>Cód.</th>
                                    <th>Cliente</th>
                                    <th>Data Emissão</th>
                                    <th>Vencimento</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($listaFatura)): ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center;">Nenhuma fatura encontrada.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($listaFatura as $fatura):?>
                                        <tr>
                                            <td><?= $fatura['id']; ?></td>
                                            <td><?= $fatura['nome'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($fatura['data_emissao'])); ?></td>
                                            <td><?= date('d/m/Y', strtotime($fatura['data_vencimento'])); ?></td>
                                            <td>R$ <?= number_format($fatura['valor'], 2, ',', '.'); ?></td>
                                            <td>
                                                <div class="status-cell-container">
                                                    <?php 
                                                    if($fatura['status'] == 'Pendente'){
                                                        echo '<span class="badge badge-pendente">Pendente</span>';
                                                        echo '<a href="index.php?acao=pagar&id=' . $fatura['id'] . '" class="btn-quick-pay" title="Marcar como pago"><i class="fa-solid fa-check"></i></a>';
                                                        echo '<a href="index.php?acao=vencida&id=' . $fatura['id'] . '" class="btn-quick-void" title="Marcar como vencido"><i class="fa-solid fa-xmark"></i></a>';
                                                    }
                                                    elseif($fatura['status'] == 'Vencido'){
                                                        echo '<span class="badge badge-vencido">Vencido</span>';
                                                        echo '<a href="index.php?acao=pagar&id=' . $fatura['id'] . '" class="btn-quick-pay" title="Marcar como pago"><i class="fa-solid fa-check"></i></a>';
                                                    }
                                                    elseif($fatura['status'] == 'Pago'){
                                                        echo '<span class="badge badge-pago">Pago</span>';
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="index.php?acao=excluir&id=<?= $fatura['id']; ?>" class="btn-quick-delete" title="Excluir Fatura"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        <a href="index.php?pagina=<?= $pagina - 1; ?>" class="pagination-btn <?= ($pagina <= 1) ? 'disabled' : ''; ?>">
                            <i class="fa-solid fa-angle-left"></i> Anterior
                        </a>
                        
                        <span class="pagination-info">Página <?= $pagina; ?></span>
                        
                        <a href="index.php?pagina=<?= $pagina + 1; ?>" class="pagination-btn">
                            Próximo <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>

</body>
</html>